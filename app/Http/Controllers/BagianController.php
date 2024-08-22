<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\KlasifikasiBagian;
use Illuminate\Http\Request;
use SDamian\Larasort\Larasort;

class BagianController extends Controller
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
            $bagian = Bagian::orderBy('id', 'desc')->paginate(10);
        } else if ($request->orderby != null) {
            $bagian = Bagian::whereNotNull('id')->autosort()->paginate(10);
        } else if ($request->search != null) {
            $bagian = Bagian::where('nama_bagian', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('bagian.bagian', [
            'bagians' => $bagian,
            'orderby' => $request->orderby,
            'order' => $request->order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasiBagians = KlasifikasiBagian::all();
        return view('bagian.add-bagian', ['klasifikasiBagians' => $klasifikasiBagians]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bagian' => 'required',
            'id_klasifikasi_bagian' => 'required',
        ]);

        Bagian::create($validated);
        return redirect('/bagian')->with('success', 'Bagian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $klasifikasiBagians = KlasifikasiBagian::all();
        $bagian = Bagian::find($id);
        return view('bagian.edit-bagian', [
            'bagian' => $bagian,
            'klasifikasiBagians' => $klasifikasiBagians,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bagian = Bagian::find($id);
        $bagian->nama_bagian = $request->nama_bagian;
        $bagian->id_klasifikasi_bagian = $request->id_klasifikasi_bagian;
        $bagian->save();
        return redirect('/bagian')->with('success', 'Bagian berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bagian = Bagian::where('id', $id)->delete();
        return redirect('/bagian');
    }

    public function addKlasifikasiBagian()
    {
        return view('bagian.add-klasifikasi-bagian');
    }

    public function storeKlasifikasiBagian(Request $request)
    {
        $validated = $request->validate([
            'klasifikasi' => 'required'
        ]);

        KlasifikasiBagian::create($validated);
        return redirect('/klasifikasi-bagian')->with('success', 'Klasifikasi Bagian Berhasil Ditambahkan');
    }

    public function klasifikasiBagian(Request $request)
    {
        if ($request->orderby == null && $request->search == null) {
            $klasifikasiBagian = KlasifikasiBagian::orderBy('id', 'desc')->paginate(10);
        } else if ($request->orderby != null) {
            $klasifikasiBagian = KlasifikasiBagian::whereNotNull('id')->autosort()->paginate(10);
        } else if ($request->search != null) {
            $klasifikasiBagian = KlasifikasiBagian::where('nama_bagian', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('bagian.klasifikasi-bagian', [
            'klasifikasiBagians' => $klasifikasiBagian,
            'orderby' => $request->orderby,
            'order' => $request->order
        ]);
    }

    public function editKlasifikasiBagian(string $id)
    {
        $klasifikasiBagian = KlasifikasiBagian::find($id);
        return view('bagian.edit-klasifikasi-bagian', [
            'klasifikasiBagian' => $klasifikasiBagian
        ]);
    }

    public function updateKlasifikasiBagian(Request $request, string $id)
    {
        $klasifikasiBagian = KlasifikasiBagian::find($id);
        $klasifikasiBagian->klasifikasi = $request->klasifikasi;
        $klasifikasiBagian->save();

        return redirect('/klasifikasi-bagian')->with('success', 'Berhasil mengubah data');
    }

    public function deleteKlasifikasiBagian(string $id)
    {
        $klasifikasiBagian = KlasifikasiBagian::find($id);
        $klasifikasiBagian->delete();

        return redirect('/klasifikasi-bagian')->with('success', 'Berhasil menghapus data');
    }
}
