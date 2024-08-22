<?php

namespace App\Http\Controllers;

use App\Models\TemplateDokumen;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TemplateDokumenController extends Controller
{
    public function tambah(Request $request)
    {
        return view('template.tambah-template', []);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                "judul" => "required",
                "dokumen" => "required|mimes:pdf|max:2048",
            ]);

            $filenamewithext = $request->file("dokumen")->getClientOriginalName();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $extension = $request->file("dokumen")->getClientOriginalExtension();
            $filesavename = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('dokumen')->storeAs('public/template/dokumen', $filesavename);

            $validated['dokumen'] = $filesavename;

            TemplateDokumen::create($validated);

            return redirect('/template')->with('success', 'Template dokumen berhasil diupload');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function view()
    {
        $templates = TemplateDokumen::all();
        return view('template.template', [
            'templates' => $templates,
        ]);
    }
}
