<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- Bootstrap css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset ('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/header.css')}}" />
    <link rel="stylesheet" href="{{asset ('css/form.css')}}" />

    <!-- Script -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.10.1/qs.min.js"
      integrity="sha512-aTKlYRb1QfU1jlF3k+aS4AqTpnTXci4R79mkdie/bp6Xm51O5O3ESAYhvg6zoicj/PD6VYY0XrYwsWLcvGiKZQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdn.socket.io/4.0.1/socket.io.min.js"
      integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/8a82831e73.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    @include('../snippet/sidebar') @include('../snippet/header')
    @yield('konten')

    <!-- <script src="js/main.js"></script> -->
  </body>
</html>
