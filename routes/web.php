<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DokumenKerjasamaController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TemplateDokumenController;
use App\Http\Controllers\UserController;
use App\Models\Bagian;
use App\Models\DokumenKerjasama;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard
Route::get('/', [Controller::class, 'home'])->middleware('auth', 'accepted');

// Auth
Route::get('/login', [AuthController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Mitra
Route::resource('/mitra', MitraController::class)->except(['show'])->middleware('auth', 'accepted');
Route::get('/mitra/klasifikasi', [MitraController::class, 'klasifikasiMitra']);
Route::get('/mitra/add-klasifikasi', [MitraController::class, 'addKlasifikasiMitra']);
Route::get('/mitra/klasifikasi/{id}/edit', [MitraController::class, 'editKlasifikasiMitra']);
Route::post('/mitra/add-klasifikasi', [MitraController::class, 'storeKlasifikasiMitra']);
Route::put('/mitra/klasifikasi/{id}', [MitraController::class, 'updateKlasifikasiMitra']);
Route::delete('/mitra/klasifikasi/{id}', [MitraController::class, 'deleteKlasifikasiMitra']);

// Kerjasama
Route::get('/kerjasama/hampir-kadaluarsa', [KerjasamaController::class, 'hampirKadaluarsa'])->middleware('admin');
Route::resource('/kerjasama', DokumenKerjasamaController::class)->only(['create', 'store', 'index', 'show', 'destroy', 'edit', 'update'])->middleware('auth', 'accepted');
Route::get('/kerjasama-report', [KerjasamaController::class, 'kerjasamaReport']);

// Bagian
Route::resource('/bagian', BagianController::class)->only(['create', 'store', 'index', 'destroy', 'edit', 'update'])->middleware('auth', 'accepted');
Route::get('/klasifikasi-bagian/create', [BagianController::class, 'addKlasifikasiBagian']);
Route::post('/klasifikasi-bagian', [BagianController::class, 'storeKlasifikasiBagian']);
Route::get('/klasifikasi-bagian', [BagianController::class, 'klasifikasiBagian']);
Route::get('/klasifikasi-bagian/{id}/edit', [BagianController::class, 'editKlasifikasiBagian']);
Route::put('/klasifikasi-bagian/{id}', [BagianController::class, 'updateKlasifikasiBagian']);
Route::delete('/klasifikasi-bagian/{id}', [BagianController::class, 'deleteKlasifikasiBagian']);

// Register
Route::resource('/register', RegisterController::class)->only(['index', 'store'])->middleware('register-redirect');

// Dokumen
Route::get('/document/{document}/preview', [PDFController::class, 'show'])->middleware('auth', 'accepted');
Route::get('/document/download/{document}', [PDFController::class, 'show'])->middleware('auth', 'accepted');

// User
Route::get('/user/profile/', [UserController::class, 'profile']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/request', [UserController::class, 'userRequest']);
Route::get('/user/request/{id}/accept', [UserController::class, 'acceptUser']);
Route::get('/user/edit-profile/', [UserController::class, 'editProfile']);
Route::get('/user/{id}/role', [UserController::class, 'changeRole']);
Route::get('/user/{id}/edit', [UserController::class, 'editUser']);
Route::put('/user/{id}/edit-user', [UserController::class, 'editUserProcess']);
Route::put('/user/edit-profile', [UserController::class, 'editProfileProcess']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

// Email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    // event(new Registered($request->user()));
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Unauthorized
Route::get('/user-not-accepted', [Controller::class, 'userNotAccepted']);
Route::get('/unauthorized', [Controller::class, 'unauthorized']);

// Template
Route::get('/template/add', [TemplateDokumenController::class, 'tambah']);
Route::get('/template', [TemplateDokumenController::class, 'view']);
Route::post('/template', [TemplateDokumenController::class, 'store']);
Route::get('/template/preview/{document}', [PDFController::class, 'showTemplate'])->middleware('auth', 'accepted');
Route::get('/template/download/{document}', [PDFController::class, 'showTemplate'])->middleware('auth', 'accepted');
