@extends('layout.dashboard') 
@section('title') Daftar Laporan @endsection
@section('header-title') Daftar Laporan @endsection 
@section('konten')


<div class="pending-container">
    <div class="photo">
        <img src="{{asset ('images/pending.svg')}}" />
    </div>

    <div class="text-pending">
        Mohon maaf masalah anda saat ini sedang kami pending, dengan alasan :
        <br>
        {{$tiket->alasan_pending}}

    </div>
    <div class="back" style="margin-bottom: 120px">
        <a href="{{ route('dashboard')}}" style="color:blue">Kembali ke dashboard</a>
    </div>    
</div>
@endsection