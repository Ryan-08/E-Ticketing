@extends('layout.dashboard') @section('title') Daftar Laporan @endsection
@section('header-title') Daftar Laporan @endsection @section('konten')


<div class="pending-container">
    <div class="photo">
        <img src="{{asset ('images/close.svg')}}" />
    </div>

    <div class="text-pending">
        Selamat masalah anda telah kami selesaikan, silahkan lihat detail
        tiket anda menggunakan link dibawah. Jika terjadi masalah lainnya, silahkan
        lapor menggunakan website ini kembali.
    </div>
    <button class="btn">
        <a href="/user/close-tiket">Lihat detail tiket</a>
    </button>
</div>

@endsection