<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\KlasifikasiMitra;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SDamian\Larasort\Larasort;

class MitraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
        $this->middleware('admin', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->orderby == null && $request->search == null) {
            $mitras = Mitra::orderBy('id', 'desc')->paginate(10);
        } else if ($request->orderby != null) {
            $mitras = Mitra::whereNotNull('id')->autosort()->paginate(10);
        } else if ($request->search != null) {
            $mitras = Mitra::where('nama', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('mitra.mitra', [
            'mitras' => $mitras,
            'orderby' => $request->orderby,
            'order' => $request->order,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasis = KlasifikasiMitra::all();
        return view('mitra.add-mitra', [
            'klasifikasis' => $klasifikasis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'id_klasifikasi_mitra' => 'required',
            'country' => 'required',
            'address' => 'nullable',
            'telp' => 'nullable',
            'website' => 'nullable',
        ]);

        Mitra::create($validated);
        return redirect('/mitra')->with('success', 'Mitra berhasil dibuat');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     $mitra = DB::table('mitra')->where('id', $id);
    //     return view('mitra-detail', [
    //         'mitra' => $mitra,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mitra = Mitra::where('id', $id)->first();
        $klasifikasis = KlasifikasiMitra::all();
        return view('mitra.edit-mitra', [
            'mitra' => $mitra,
            'klasifikasis' => $klasifikasis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mitra = Mitra::where('id', $id)->first();
        $mitra->nama = $request->nama;
        $mitra->id_klasifikasi_mitra = $request->id_klasifikasi_mitra;
        $mitra->country = $request->country;
        $mitra->address = $request->address;
        $mitra->telp = $request->telp;
        $mitra->website = $request->website;

        $res = $mitra->save();
        if ($res) {
            return redirect('/mitra')->with('success', 'Mitra berhasil diubah');
        } else {
            return redirect('/mitra')->with('failed', 'Mitra gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kerjasama = Kerjasama::all();
        foreach ($kerjasama as $kerma) {
            if ($kerma->id_mitra == $id) {
                return back()->with('failed', 'Delete Failed, Silahkan cek kerjasama yang berhubungan dengan mitra ini.');
            }
        }
        Mitra::destroy($id);
        return back()->with('success', 'Delete Success');
    }

    public function klasifikasiMitra(Request $request)
    {
        if ($request->orderby == null && $request->search == null) {
            $klasifikasis = KlasifikasiMitra::orderBy('id', 'desc')->paginate(10);
        } else if ($request->orderby != null) {
            $klasifikasis = KlasifikasiMitra::whereNotNull('id')->autosort()->paginate(10);
        } else if ($request->search != null) {
            $klasifikasis = KlasifikasiMitra::where('klasifikasi', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('mitra.klasifikasi-mitra', [
            'klasifikasis' => $klasifikasis,
            'orderby' => $request->orderby,
            'order' => $request->order,
        ]);
    }

    public function addKlasifikasiMitra()
    {
        return view('mitra.add-klasifikasi-mitra');
    }

    public function storeKlasifikasiMitra(Request $request)
    {
        $validated = $request->validate([
            'klasifikasi' => 'required'
        ]);

        KlasifikasiMitra::create($validated);
        return redirect('/mitra/klasifikasi');
    }

    public function editKlasifikasiMitra(string $id)
    {
        $klasifikasi = KlasifikasiMitra::find($id);
        return view('mitra.edit-klasifikasi-mitra', [
            'klasifikasi' => $klasifikasi
        ]);
    }

    public function updateKlasifikasiMitra(Request $request, string $id)
    {
        $klasifikasi = KlasifikasiMitra::find($id);
        $klasifikasi->klasifikasi = $request->klasifikasi;
        $klasifikasi->save();
        return redirect('/mitra/klasifikasi')->with('success', 'Klasifikasi berhasil diubah');
    }

    public function deleteKlasifikasiMitra(Request $request, string $id)
    {
        $res = KlasifikasiMitra::destroy($id);
        if ($res) {
            return redirect('/mitra/klasifikasi')->with('success', 'Klasifikasi berhasil dihapus');
        } else {
            return redirect('/mitra/klasifikasi')->with('failed', 'Klasifikasi gagal dihapus');
        }
    }
}
