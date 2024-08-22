<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Kerjasama;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $user = User::all();
        $kerjasama = Kerjasama::orderBy('id', 'DESC')->paginate(5);
        $allkerjasama = Kerjasama::all();
        $yearcount = DB::table('kerjasama')->select(DB::raw('count(*) as count, year(tanggal_awal) as date'))->groupBy(DB::raw('year(tanggal_awal)'))->orderBy(DB::raw('year(tanggal_awal)'))->get();
        $yearcountMOU = DB::table('kerjasama')->select(DB::raw('count(*) as count, year(tanggal_awal) as date'))->where('jenis', 'mou')->groupBy(DB::raw('year(tanggal_awal)'))->orderBy(DB::raw('year(tanggal_awal)'))->get();
        $yearcountMOA = DB::table('kerjasama')->select(DB::raw('count(*) as count, year(tanggal_awal) as date'))->where('jenis', 'moa')->groupBy(DB::raw('year(tanggal_awal)'))->orderBy(DB::raw('year(tanggal_awal)'))->get();
        $yearcountRealisasi = DB::table('kerjasama')->select(DB::raw('count(*) as count, year(tanggal_awal) as date'))->where('jenis', 'realisasi')->groupBy(DB::raw('year(tanggal_awal)'))->orderBy(DB::raw('year(tanggal_awal)'))->get();
        $mou = Kerjasama::where('jenis', 'mou');
        $moa = Kerjasama::where('jenis', 'moa');
        $mouActive = Kerjasama::where('jenis', 'mou')->where('status', 'aktif');
        $moaActive = Kerjasama::where('jenis', 'moa')->where('status', 'aktif');
        $realisasi = Kerjasama::where('jenis', 'realisasi');
        $lpk = Kerjasama::where('jenis', 'laporan pelaksanaan kerjasama');
        $ia = Kerjasama::where('jenis', 'ia');
        $mitra = Mitra::all();

        $documentsHampirKadaluarsa = Kerjasama::where('status', 'aktif')->where('tanggal_berakhir', '<', Carbon::now()->addDays(30))->where('tanggal_berakhir', '>', Carbon::now())->paginate(10);
        $documentslewat = Kerjasama::where('status', 'aktif')->where('tanggal_berakhir', '<', Carbon::now())->paginate(10);

        return view('dashboard', [
            'user' => $user,
            'mou' => $mou,
            'mouActive' => $mouActive,
            'moaActive' => $moaActive,
            'moa' => $moa,
            'realisasi' => $realisasi,
            'lpk' => $lpk,
            'ia' => $ia,
            'kerjasama' => $kerjasama,
            'allkerjasama' => $allkerjasama,
            'yearcount' => $yearcount,
            'yearcountMOU' => $yearcountMOU,
            'yearcountMOA' => $yearcountMOA,
            'yearcountRealisasi' => $yearcountRealisasi,
            'mitra' => $mitra,
            'documentsHampirKadaluarsa' => $documentsHampirKadaluarsa,
            'documentslewat' => $documentslewat,
        ]);
    }

    public function userNotAccepted()
    {
        return view('must_accepted');
    }

    public function unauthorized()
    {
        return view('unauthorized');
    }
}
