@extends('/layout/dashboard') @section('title') Daftar Laporan @endsection
@section('header-title') Daftar Laporan @endsection @section('konten')


<div class="pending-container">
    <div class="photo"> 
        <img src="{{asset ('images/pending.svg')}}"/>
    </div>
      
    <div class="text-pending">
        Mohon maaf masalah anda saat ini sedang kami pending, dengan alasan :
    </div>

        <button class="btn">
            <a href="/user/home">Kembali ke dashboard</a>
        </button>
</div>
@endsection