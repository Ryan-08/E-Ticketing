<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportsChartController;
use App\Models\User;
use App\Models\Tiket;
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

        Route::get('daftar-pengguna', [HomeController::class, 'daftarPengguna'])->name('daftar-pengguna');
        Route::get('daftar-pengguna/cari', [UserController::class, 'cari'])->name('cari-user');

        Route::get('daftar-pengguna/tambah', [UserController::class, 'adminTambahPengguna'])->name('tambah-pengguna');
        Route::post('daftar-pengguna/tambah/proses', [UserController::class, 'tambah'])->name('tambah');

        Route::get('daftar-pengguna/edit/{id}', [UserController::class, 'adminEditPengguna'])->name('edit-pengguna');
        Route::post('daftar-pengguna/edit/{id}/proses', [UserController::class, 'edit'])->name('edit');

        Route::get('daftar-pengguna/hapus/{id}', [UserController::class, 'hapus'])->name('hapus');
        
        Route::get('Daftar Tiket/detail/{id}/response', [TicketController::class, 'tanggapan'])->name('response');

        Route::post('Daftar Tiket/detail/{id}/response', [NotificationController::class, 'notifikasi'])->name('send-notif'); 
        
        Route::post('Daftar Tiket/detail/{id}/response/update', [TicketController::class, 'updateQuest'])->name('update-quest'); 
        Route::get('Daftar Tiket/detail/{id}/response/delete/{quest}', [TicketController::class, 'deleteQuest'])->name('delete-quest'); 
        
        Route::get('Daftar Tiket/detail/{id}/close', [TicketController::class, 'closeTicket'])->name('close-ticket');        
    });

    Route::group(['middleware' => ['role:user']], function () {  
        Route::get('Profil/Data Diri', [HomeController::class, 'dataDiri'])->name('data-diri');                   
        Route::post('Profil/Data Diri', [UserController::class, 'gantiProfil'])->name('update-profile');                   

        Route::get('Profil/Ubah Password', [HomeController::class, 'ubahPass'])->name('ubah-pass');                   
        Route::post('Profil/Ubah Password', [UserController::class, 'newPass'])->name('update');                   

        Route::get('Lapor Masalah', [HomeController::class, 'laporMasalah'])->name('lapor-masalah');
        Route::post('Lapor Masalah', [TicketController::class, 'postLaporan'])->name('post-laporan');
               
        Route::get('Daftar Tiket/detail/{id}/tiket', [HomeController::class, 'detailTiket'])->name('user-tiket');
        Route::get('Daftar Tiket/detail/{id}', [HomeController::class, 'close'])->name('selesai');
        
        Route::get('Notifikasi/response/{status}/{id}', [NotificationController::class, 'response'])->name('user-response');
    });

    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');
    Route::get('Daftar Tiket', [HomeController::class, 'daftarTiket'])->name('daftar-tiket');
    Route::get('Daftar Tiket/cari', [HomeController::class, 'cari'])->name('cari-tiket');

    Route::get('Daftar Tiket/detail/{id}', [TicketController::class, 'detail'])->name('detail');    

    Route::get('chart', [ReportsChartController::class, 'index'])->name('chart');

    Route::get('print/{id}', [HomeController::class, 'pdf'])->name('cetak');
    Route::get('print', [HomeController::class, 'allPdf'])->name('cetak-semua');

    Route::get('welcome/{id}/{pass}', [MailController::class, 'new_user_mail'])->name('welcome');
});

Route::get('/lupa-password', [UserController::class, 'lupa_password'])->middleware('guest')->name('password.request');

Route::post('/lupa-password', [UserController::class, 'send_reset_link'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [UserController::class, 'reset_password'])->middleware('guest')->name('password.reset');

Route::post('/reset-password', [UserController::class, 'update_password'])->middleware('guest')->name('password.update');
