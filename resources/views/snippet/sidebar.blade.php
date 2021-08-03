<header>
  <div class="logo">
    <img src="{{asset ('images/logo-diskominfotik-bna.png')}}" alt="logo" />
    <span class="text-logo">
      E-Ticketing
    </span>
  </div>
  <ul class="nav-links">
    <li class="links">
      <a href="/admin/home">
        <span>
          <i class="fas fa-layer-group"></i>
        </span>
        Dashboard
      </a>
    </li>
    <li class="links">
      <a href="/admin/daftar-tiket">
        <span>
          <i class="fas fa-ticket-alt"></i>
        </span>
        Daftar Tiket
      </a>
    </li>
    <li class="links">
      <a href="/admin/daftar-pengguna">
        <span>
          <i class="fas fa-users"></i>
        </span>
        Daftar Pengguna
      </a>
    </li>
    <li class="links">
      <a href="/">
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
  $(function () {
    if (location.pathname.split("/")[2]) {
      $(
        'ul a[href^="/' +
          location.pathname.split("/")[1] +
          "/" +
          location.pathname.split("/")[2] +
          '"]'
      ).addClass("active");
    } else {
      $('ul a[href^="/' + location.pathname.split("/")[1] + '"]').addClass(
        "active"
      );
    }
  });
</script>
