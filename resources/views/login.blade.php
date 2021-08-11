@extends('/layout/master') @section('title') E-Ticketing | Masuk @endsection
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
      <h1>Selamat Datang</h1>
    </div>
    <form action="/user/home" class="form">
      <div class="form-input">
        <label for="username">
          <span><i class="fas fa-envelope"></i></span>
        </label>
        <input id="username" type="text" placeholder="Email" />
      </div>
      <div class="form-input">
        <label for="password">
          <span><i class="fas fa-lock"></i></span>
        </label>
        <input id="password" type="password" placeholder="Password" />
        <label for="password">
          <span><i class="fas fa-eye-slash"></i></span>
        </label>
      </div>
      <div class="form-extras">
        <div class="check-box">
          <input type="checkbox" name="remember" id="remember" />
          <label for="remember">Ingat Saya</label>
        </div>
        <div class="lupa-password">
          <a href="">Lupa Password?</a>
        </div>
      </div>
      <div class="form-button">
        <button class="btn btn-primary">Masuk</button>
      </div>
    </form>
  </div>
</div>
@endsection
