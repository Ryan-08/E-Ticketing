<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
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
Route::get('/', [LoginController::class, 'halamanLogin'])->name('login');
Route::get('login', [LoginController::class, 'halamanLogin'])->name('login');
Route::post('postlogin', [LoginController::class, 'login'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('dashboard/laporan', [HomeController::class, 'laporanInstansi'])->name('laporan');

        Route::get('/user/home', function () {
            return view('user/home');
        });
        Route::get('/user/profil', function () {
            return view('user/profil');
        });
        Route::get('/user/data-diri', function () {
            return view('user/data-diri');
        });
        Route::get('/user/ubah-password', function () {
            return view('user/ubah-password');
        });
        Route::get('/user/lapor-masalah', function () {
            return view('user/lapor-masalah');
        });
        Route::get('/user/daftar-masalah', function () {
            return view('user/daftar-masalah');
        });
        Route::get('/user/pending', function () {
            return view('user/pending');
        });
        Route::get('/user/close', function () {
            return view('user/close');
        });
        Route::get('/user/open-tiket', function () {
            return view('user/open-tiket');
        });
        Route::get('/user/close-tiket', function () {
            return view('user/close-tiket');
        });

        Route::get('daftar-pengguna', [HomeController::class, 'daftarPengguna'])->name('daftar-pengguna');
        Route::get('daftar-pengguna/cari', [HomeController::class, 'cari'])->name('cari');

        Route::get('daftar-pengguna/tambah', [UserController::class, 'adminTambahPengguna'])->name('tambah-pengguna');
        Route::post('daftar-pengguna/tambah/proses', [UserController::class, 'tambah'])->name('tambah');

        Route::get('daftar-pengguna/edit/{id}', [UserController::class, 'adminEditPengguna'])->name('edit-pengguna');
        Route::post('daftar-pengguna/edit/{id}/proses', [UserController::class, 'edit'])->name('edit');

        Route::get('daftar-pengguna/hapus/{id}', [UserController::class, 'hapus'])->name('hapus');

        Route::get('daftar-tiket/detail/{id}', [TicketController::class, 'detail'])->name('detail');
        Route::get('daftar-tiket/detail/{id}/response', [TicketController::class, 'tanggapan'])->name('response');
    });

    Route::group(['middleware' => ['role:user']], function () {
    });

    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');
    Route::get('daftar-tiket', [HomeController::class, 'daftarTiket'])->name('daftar-tiket');

    Route::get('chart', [ReportsChartController::class, 'index'])->name('chart');

    Route::get('welcome/{id}/{pass}', [MailController::class, 'new_user_mail'])->name('welcome');
});

// Route::get('reset-password/{id}', [MailController::class, 'reset_pass_mail'])->name('reset-password');
Route::get('/index', function () {
    return view('index');
});
Route::get('/chat', function () {
    return view('sticky-chat');
});

Route::get('/lupa-password', function () {
    return view('lupa-password');
})->middleware('guest')->name('password.request');

Route::get('/lupa-password', [UserController::class, 'lupa_password'])->middleware('guest')->name('password.request');

Route::post('/lupa-password', [UserController::class, 'send_reset_link'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [UserController::class, 'reset_password'])->middleware('guest')->name('password.reset');

Route::post('/reset-password', [UserController::class, 'update_password'])->middleware('guest')->name('password.update');

Route::get('/print', [HomeController::class, 'pdf']);
