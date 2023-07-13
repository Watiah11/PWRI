<?php

use App\Http\Controllers\CekSaldoController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('login.store');

Route::middleware(['Auth'])->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
    
    // Menu Layanan
    Route::prefix('layanan')->group(function(){
        Route::get('',[LayananController::class,'index'])->name('layanan.index');
    });
    // Menu Penarikan
    Route::prefix('penarikan')->group(function(){
        Route::get('',[PenarikanController::class,'index'])->name('penarikan.index');
        Route::get('summary',[PenarikanController::class,'summary'])->name('penarikan.summary');
        Route::get('bayar',[PenarikanController::class,'bayar'])->name('penarikan.bayar');
    });
    
    // Menu Riwayat
    Route::prefix('riwayat')->group(function(){
        Route::get('',[RiwayatController::class,'index'])->name('riwayat.index');
        Route::get('/getData',[RiwayatController::class,'getData'])->name('riwayat.getData');
    });

    // Menu Profile
    Route::prefix('profile')->group(function(){
        Route::get('',[ProfileController::class,'index'])->name('profile.index');
        Route::post('edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
    });

    Route::get('about',function(){
        return view('about.index');
    })->name('about');

    Route::get('contact',function(){
        return view('contact.index');
    })->name('contact');

    Route::prefix('top-up')->group(function(){
        Route::get('',[TopUpController::class,'index'])->name('top-up.index');
        Route::get('bayar',[TopUpController::class,'bayar'])->name('top-up.bayar');
        Route::get('summary',[TopUpController::class,'summary'])->name('top-up.summary');
        Route::post('cek-pin',[TopUpController::class,'cekPin'])->name('top-up.pin');
        Route::post('session-va',[TopUpController::class,'sessionVa'])->name('top-up.va');
        
    });

    Route::prefix('saldo')->group(function(){
        Route::get('',[CekSaldoController::class,'index'])->name('saldo.index');
    });
    
    Route::get('logout',[LoginController::class,'logout'])->name('logout');

});

Route::get('register',[LoginController::class,'register'])->name('register');
Route::post('register',[LoginController::class,'connect'])->name('connect');
Route::post('response',[LoginController::class,'cekResponse'])->name('response');
Route::get('otp',[LoginController::class,'verifyOtp'])->name('verify-otp');
Route::post('send-otp',[LoginController::class,'sendOtp'])->name('send-otp');
Route::post('re-send-otp',[LoginController::class,'re_send_otp'])->name('re-send-otp');
Route::get('session',[LoginController::class,'getSession'])->name('session');