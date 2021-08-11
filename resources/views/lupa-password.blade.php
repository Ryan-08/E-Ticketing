@extends('layout.master')
@section('title') E-Ticketing | Lupa Password @endsection
@section('konten')
<div class="login-container">
    <div class="description-container">
        <div class="desc-top">
            <div class="logo">
                <img src="{{asset ('images/logo-diskominfotik-bna.png')}}" alt="logo" />
            </div>
            <div class="title">
                <div class="e-ticketing">E-Ticketing</div>
                <div class="diskominfotik">Diskominfotik Banda Aceh</div>
            </div>
            <div class="triangle">
                <img src="{{ asset('images/triangle.svg') }}" alt="" />
            </div>
        </div>
        <div class="desc-bottom">
            <div class="text-description">
                Aplikasi E-Ticketing Diskominfotik Kota Banda Aceh akan sangat membantu
                dalam pelaporan masalah terkait fasilitas yang sedang mengalami gangguan
                pada instansi anda.
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="triangle-top-left">
            <img src="{{ asset('images/triangle-top-left-corner.svg') }}" alt="" />
        </div>
        <div class="triangle-top-right">
            <img src="{{ asset('images/triangle-top-rightcorner.svg') }}" alt="" />
        </div>
        <div class="form-title">
            <h1>Atur Ulang Kata Sandi</h1>
        </div>
        <form id="formReset" action="{{ route('password.email') }}" method="POST" class="form" style="width: 65%;">
            @csrf
            <div class="text-description" style="color:#9FA2B4; margin-bottom: 20px;">
                Masukkan alamat email akun anda, untuk kami kirimkan tautan me-reset password.
            </div>
            <div class="form-input">
                <label for="email">
                    <span><i class="fas fa-envelope"></i></span>
                </label>
                @if(session()->has('email'))
                <input id="email" name="email" type="email" value="{{ session()->get('email') }}" />
                @else
                <input id="email" name="email" type="email" placeholder="Email">
                @endif
            </div>
            @if(session()->has('status'))
            <div class="text-resend" style="color:#9FA2B4; margin: 25px 0px; width: 100%;">
                Tidak mendapatkan email? Klik untuk
                <button type="button" id="resend"
                    style="color: blue; background: none; outline: none; border: none; cursor: pointer;">resend</button>
            </div>
            @endif
            <div class="form-button" style="margin-top: 20px;">
                <button class="btn btn-primary">Lanjutkan</button>
            </div>
        </form>
    </div>
</div>
<script>
    $("#resend").on('click', function () {
        $('#formReset').submit();
    });
</script>
@endsection