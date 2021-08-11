<header>
  <div class="logo">
    <img src="{{asset ('images/logo-diskominfotik-bna.png')}}" alt="logo" />
    <span class="text-logo">
      E-Ticketing
    </span>
  </div>
  <ul class="nav-links">
    <li class="links">
      <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard*') ? 'active' : '' }}">
        <span>
          <i class="fas fa-layer-group"></i>
        </span>
        Dashboard
      </a>
    </li>


      <li class="links">
        <a class="profil-btn">
          <span><i class="fas fa-user-circle"></i></span>
          Profil
          <span class="down"><i class="fas fa-chevron-down"></i></span>
        </a>

        <ul class="profil-show">
          <li><a href="/user/data-diri">Data Diri</a></li>
          <li><a href="/user/ubah-password">Ubah Password</a></li>
        </ul>
      </li>

    <li class="links">

      <a href="/user/lapor-masalah">
        <span><img src="{{asset ('images/Lapor-Masalah.svg')}}"/></span>
        Lapor Masalah
      </a>
    </li><li class="links">
      <a href="/user/daftar-masalah">
        <span><img src="{{asset ('images/Daftar-Laporan.svg')}}" alt="logo" /></span>
        Daftar Masalah
      <a href="{{ route('daftar-tiket') }}" class="{{ request()->is('daftar-tiket*') ? 'active' : '' }}">
        <span>
          <i class="fas fa-ticket-alt"></i>
        </span>
        Daftar Tiket
      </a>
    </li>
    @role('admin')
    <li class="links">
      <a href="{{ route('daftar-pengguna') }}" class="{{ request()->is('daftar-pengguna*') ? 'active' : ''}}">
        <span>
          <i class="fas fa-users"></i>
        </span>
        Daftar Pengguna
      </a>
    </li>
    @endrole
    <li class="links">
      <a href="{{ route('logout') }}">
        <span>
          <i class="fas fa-sign-out-alt"></i>
        </span>
        Logout
      </a>
    </li>
  </ul>
</header>
<script>
  $('.profil-btn').click(function () {
    $('.nav-links .links .profil-show').toggleClass("show");
  });


  $(function () {
    $("a").click(function () {
      // remove classes from all
      $("a").removeClass("active");
      // add class to the one we clicked
      $(this).toggleClass("active");
    });
  });
</script>
