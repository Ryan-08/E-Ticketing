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
  $(function () {
    $("a").click(function () {
      // remove classes from all
      $("a").removeClass("active");
      // add class to the one we clicked
      $(this).toggleClass("active");
    });
  });
</script>