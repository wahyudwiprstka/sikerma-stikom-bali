<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Dokumen;
use App\Models\Kerjasama;
use App\Models\KlasifikasiMitra;
use App\Models\Mitra;
use Brick\Math\BigInteger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SDamian\Larasort\Larasort;

class DokumenKerjasamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'show']]);
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Larasort::setDefaultSortable('id');

        $klas_mitras = KlasifikasiMitra::all();
        $bagianAll = Bagian::all();

        $selected_bagian = Bagian::where('id', $request->bagian)->first();
        $selected_klasmitra = KlasifikasiMitra::where('id', $request->klas_mitra)->first();
        $selected_jenis = $request->jenis;
        if (str_contains($selected_jenis, 'Laporan')) {
            $selected_jenis = "Laporan Pelaksanaan Kerjasama";
        }
        $selected_status = $request->status;
        $selected_tahun = $request->tahun;

        $documents = Kerjasama::join('mitra', 'kerjasama.id_mitra', '=', 'mitra.id')
            ->join('bagian', 'kerjasama.bagian', '=', 'bagian.id')
            ->select('mitra.*', 'kerjasama.*', 'bagian.*')
            ->where('id_klasifikasi_mitra', 'LIKE', $request->klas_mitra)
            ->where('jenis', 'LIKE', $selected_jenis)
            ->where('status', 'LIKE', $selected_status)
            ->where(DB::raw('year(tanggal_awal)'), 'LIKE', $selected_tahun)
            ->where('bagian', 'LIKE', $request->bagian)
            ->paginate(10);

        $tahun_kerjasama = Kerjasama::select(DB::raw('year(tanggal_awal) AS tahun'))->groupBy(DB::raw('year(tanggal_awal)'))->orderBy(DB::raw('year(tanggal_awal)'))->get();

        if ($request->orderby != null) {
            $documents = Kerjasama::whereNotNull('id')->autosort()->paginate(10);
        }

        if ($request->search) {
            $documents = Kerjasama::join('mitra', 'kerjasama.id_mitra', '=', 'mitra.id')
                ->join('bagian', 'kerjasama.bagian', '=', 'bagian.id')
                ->where('judul', 'LIKE', '%' . $request->search . '%')
                ->orWhere('jenis', 'LIKE', "%{$request->search}%")
                ->orWhere('status', 'LIKE', "%{$request->search}%")
                ->orWhere('durasi', 'LIKE', "%{$request->search}%")
                ->orWhere('nama', 'LIKE', "%{$request->search}%")
                ->orWhere(DB::raw('year(tanggal_awal)'), 'LIKE', "%{$request->search}%")
                ->orWhere('nama_bagian', 'LIKE', "%{$request->search}%")
                ->paginate(10);
        }

        return view('kerjasama.kerjasama', [
            'documents' => $documents,
            'orderby' => $request->orderby,
            'order' => $request->order,
            'klas_mitras' => $klas_mitras,
            'selected_klasmitra' => $selected_klasmitra,
            'selected_jenis' => $selected_jenis,
            'selected_status' => $selected_status,
            'selected_tahun' => $selected_tahun,
            'selected_bagian' => $selected_bagian,
            'bagianAll' => $bagianAll,
            'tahun_kerjasama' => $tahun_kerjasama,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mitras = DB::select('select * from mitra');
        $mous = DB::select('select * from kerjasama where jenis="mou"');
        $bagian = DB::select('select * from bagian');
        return view('kerjasama.add-kerjasama', [
            'mitras' => $mitras,
            'mous' => $mous,
            'bagian' => $bagian
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'status' => 'required',
            'bagian' => 'required',
            'durasi' => 'required',
            'bentuk_kerjasama' => 'required',
            'tanggal_awal' => 'nullable',
            'tanggal_berakhir' => 'nullable',
            'id_mitra' => 'required',
            'ttd_pihak1' => 'nullable',
            'ttd_pihak2' => 'nullable',
            'jabatan_pihak1' => 'nullable',
            'jabatan_pihak2' => 'nullable',
            'pic_pihak_1' => 'nullable',
            'pic_pihak_2' => 'nullable',
            'deskripsi' => 'nullable',
            'id_mou' => 'nullable',
            'no_dokumen_stikom' => 'nullable',
            'no_dokumen_mitra' => 'nullable',
            'dokumen' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->jenis == 'mou' && $request->id_mou != null) {
            return back()->with('dokumenError', 'Jenis dokumen harus selain MOU untuk mengisi Dasar Dokumen Kerjasama');
        }

        $filenamewithext = $request->file('dokumen')->getClientOriginalName();
        $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
        $extension = $request->file('dokumen')->getClientOriginalExtension();
        $filesavename = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('dokumen')->storeAs('public/dokumen', $filesavename);

        $validated['dokumen'] = $filesavename;

        // Assign data ke tabel kerjasama
        $kerjasama = [];
        $kerjasama['judul'] = $validated['judul'];
        $kerjasama['jenis'] = $validated['jenis'];
        $kerjasama['status'] = $validated['status'];
        $kerjasama['bentuk_kerjasama'] = $validated['bentuk_kerjasama'];
        $kerjasama['durasi'] = $validated['durasi'];
        $kerjasama['bagian'] = $validated['bagian'];
        $kerjasama['tanggal_awal'] = $validated['tanggal_awal'];
        $kerjasama['tanggal_berakhir'] = $validated['tanggal_berakhir'];
        $kerjasama['ttd_pihak1'] = $validated['ttd_pihak1'];
        $kerjasama['ttd_pihak2'] = $validated['ttd_pihak2'];
        $kerjasama['jabatan_pihak1'] = $validated['jabatan_pihak1'];
        $kerjasama['jabatan_pihak2'] = $validated['jabatan_pihak2'];
        $kerjasama['pic_pihak_1'] = $validated['pic_pihak_1'];
        $kerjasama['pic_pihak_2'] = $validated['pic_pihak_2'];
        $kerjasama['id_mitra'] = $validated['id_mitra'];
        $kerjasama['deskripsi'] = $validated['deskripsi'];
        $kerjasama['id_mou'] = $validated['id_mou'];
        $kerjasama['id_user'] = $request->user()->id;

        // Assign data dokumen ke tabel dokumen
        $dokumen = [];
        $dokumen['no_dokumen_stikom'] = $validated['no_dokumen_stikom'];
        $dokumen['no_dokumen_mitra'] = $validated['no_dokumen_mitra'];
        $dokumen['dokumen'] = $validated['dokumen'];

        // Memasukkan data dokumen ke database
        $dokumenUpload = Dokumen::create($dokumen);

        $kerjasama['id_dokumen'] = $dokumenUpload['id'];

        Kerjasama::create($kerjasama);

        return redirect('/kerjasama')->with('success', 'Berhasil Upload Dokumen');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kerjasama = Kerjasama::where('id', '=', $id)->first();
        return view('kerjasama.detail-kerjasama', [
            'kerjasama' => $kerjasama,
        ]);
        // return response()->file(public_path('/storage/dokumen/' . $kerjasama->dokumen), ['content-type' => 'application/pdf']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kerjasama = Kerjasama::where('id', '=', $id)->first();
        $mitras = Mitra::all();
        $mous = Kerjasama::where('jenis', '=', 'mou')->get();
        return view('kerjasama.edit-kerjasama', [
            'kerjasama' => $kerjasama,
            'mitras' => $mitras,
            'mous' => $mous
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kerjasama = Kerjasama::find($id);
        $dokumen = Dokumen::find($kerjasama->dokumen->id);

        $kerjasama->judul = $request->judul;
        $kerjasama->jenis = $request->jenis;
        $kerjasama->status = $request->status;
        $kerjasama->tanggal_awal = $request->tanggal_awal;
        $kerjasama->tanggal_berakhir = $request->tanggal_berakhir;
        $kerjasama->tanggal_berakhir = $request->tanggal_berakhir;
        $kerjasama->id_mitra = $request->id_mitra;
        $kerjasama->deskripsi = $request->deskripsi;
        $kerjasama->id_mou = $request->id_mou;
        $dokumen->no_dokumen_stikom = $request->no_dokumen_stikom;
        $dokumen->no_dokumen_mitra = $request->no_dokumen_mitra;
        if ($request->dokumen != null) {
            $filenamewithext = $request->file('dokumen')->getClientOriginalName();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $extension = $request->file('dokumen')->getClientOriginalExtension();
            $filesavename = $filename . '_' . time() . '.' . $extension;

            $kerjasama->dokumen = $filesavename;

            $path = $request->file('dokumen')->storeAs('public/dokumen', $filesavename);
        }

        $kerjasama->save();
        $dokumen->save();

        return redirect('/kerjasama/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kerjasama = Kerjasama::find($id);
        Dokumen::destroy($kerjasama->dokumen->id);
        Kerjasama::destroy($id);
        Storage::delete($kerjasama->dokumen->dokumen);
        return back()->with('success', 'Delete Success');
    }
}
