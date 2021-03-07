<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Basic page needs
    ============================================ -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title','Tinker') </title>
  <meta name="description" content="">

  <!-- Mobile specific metas
    ============================================ -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- favicon.ico -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <!-- ============== All CSS ================ -->
  <!-- normalize css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

  <!-- animate css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

  <!-- bootstrap css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <!-- meanmenu css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">

  <!-- font-awesome css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

  <!-- icofont css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/icofont.css') }}">

  <!-- change-text css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/change-text.css') }}">

  <!-- YTPlayer css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/jquery.mb.YTPlayer.min.css') }}">

  <!-- main css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <!-- owl.carousel css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">

  <!-- nivo-slider css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('lib/css/nivo-slider.css') }}">
  <link rel="stylesheet" href="{{ asset('lib/css/preview.css') }}">

  <!-- style css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- responsive css
    ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

  <!-- modernizr js
    ============================================ -->
  <script src="{{ asset("js/vendor/modernizr-2.8.3.min.js") }}"></script>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  @yield('styles')
  @livewireStyles
</head>
<body>

  @include('includes.header')

  <div id="app" style='min-height:700px;'>
    <main class="py-4">
      @yield('content')
    </main>
  </div>


  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
  @include('includes.book')
  @include('includes.footer')

  <!-- ============== All JS ================ -->
  <!-- jquery js================================ -->
  <script src="{{ asset("js/vendor/jquery-1.12.0.min.js") }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <!-- bootstrap js================================ -->
  <script src="{{ asset("js/bootstrap.min.js") }}"></script>

  <!-- meanmenu js================================ -->
  <script src="{{ asset("js/jquery.meanmenu.js") }}"></script>

  <!-- scrollUp js================================ -->
  <script src="{{ asset("js/jquery.scrollUp.min.js") }}"></script>

  <!-- wow js================================ -->
  <script src="{{ asset("js/wow.min.js") }}"></script>

  <!-- owl.carousel js================================ -->
  <script src="{{ asset("js/owl.carousel.min.js") }}"></script>

  <!-- change-text js================================ -->
  <script src="{{ asset("js/change-text.js") }}"></script>

  <!-- YTPlayer js================================ -->
  <script src="{{ asset("js/jquery.mb.YTPlayer.min.js") }}"></script>

  <!-- textillate js================================ -->
  <script src="{{ asset("js/jquery.lettering.js") }}"></script>
  <script src="{{ asset("js/jquery.textillate.js") }}"></script>

  <!-- nivo.slider js================================ -->
  <script src="{{ asset("lib/js/jquery.nivo.slider.js") }}"></script>
  <script src="{{ asset("lib/home.js") }}"></script>

  <!-- plugins js================================ -->
  <script src="{{ asset("js/plugins.js") }}"></script>

  <!-- main js================================ -->
  <script src="{{ asset("js/main.js") }}"></script>

  @yield('scripts')
  @livewireScripts

</body>

</html>

