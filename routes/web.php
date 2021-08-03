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

Route::get('/admin/home', function () {
    return view('admin/home');
});
Route::get('/admin/daftar-tiket', function () {
    return view('admin/daftar-tiket');
});
Route::get('/admin/daftar-pengguna', function () {
    return view('admin/daftar-pengguna');
});
Route::get('/admin/daftar-pengguna/tambah', function () {
    return view('admin/tambah-pengguna');
});
Route::get('/admin/daftar-pengguna/edit', function () {
    return view('admin/edit-pengguna');
});