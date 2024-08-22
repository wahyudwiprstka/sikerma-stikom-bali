<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\DokumenKerjasama;
use App\Models\TemplateDokumen;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function show(string $doc)
    {
        $kerjasama = Dokumen::where('dokumen', '=', $doc)->first();
        return response()->file(public_path('/storage/dokumen/' . $kerjasama->dokumen), ['content-type' => 'application/pdf']);
    }

    public function showTemplate(string $doc)
    {
        $template = TemplateDokumen::where('dokumen', '=', $doc)->first();
        return response()->file(public_path('/storage/template/dokumen/' . $template->dokumen), ['content-type' => 'application/pdf']);
    }
}
