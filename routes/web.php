<?php

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

Route::get('/', function () {
    return view('login');
});

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
