<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset ('css/dashboard.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
  <link rel="stylesheet" href="{{asset ('css/header.css')}}" />
  <link rel="stylesheet" href="{{asset ('css/form.css')}}" />

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

  <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
    integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8a82831e73.js" crossorigin="anonymous"></script>
</head>

<body>
  @include('../snippet/sidebar') @include('../snippet/header')
  @yield('konten')

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
    integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
    crossorigin="anonymous"></script>

  @stack('custom-scripts')
  <script>
    // script for notif
    $('#bell').click(function (e) {
      e.preventDefault();
      e.stopPropagation();
      $('#notif').toggle();
      $('.notification-count').hide();
    });
    $(document).click(function () {
      $('#notif').hide();
    });
    $(".list-notif").click(function () {
      window.location = $(this).data("url");
    });
  </script>
  <script src="{{asset('js/simple.js')}}"></script>

</body>

</html>