<!DOCTYPE html>
<html lang="sr">

<head>
  <script src="{{ asset('js/theme.js') }}"></script>
  <link
    href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet"
  />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="{{ asset('styles/global.css') }}" />
  <link rel="stylesheet" href="{{ asset('styles/hamburger.css') }}" />
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('styles/index.css') }}" />
</head>

<body onload="themeLoad()">
  <link rel="stylesheet" href="{{ asset('styles/navigation.css') }}" />
  <header>
    <div class="mobile-nav">
      <a href="{{route('index')}}">mape.</a>
      <div
        onclick="toggleBurger()"
        id="burger"
        class="hamburger hamburger--collapse"
        type="button"
      >
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>
    <nav id="nav">
      <ul>
        <li><a href="{{route('index')}}">mape.</a></li>
        <li><a href="{{route('events')}}">događaji</a></li>
        <li><a href="{{route('event.new')}}">dodaj</a></li>
      </ul>
      <div class="right">
        <span id="search-icon" tabindex="0">
          <div>
            <span>pretraga</span>
            {!! Form::open(['route' => 'events', 'id' => 'form', 'method' => 'get']) !!}
            <input type="text" name="query" id="search" />
            {{Form::close()}}
          </div>
          <i class="material-icons" id="oof">search</i>
        </span>
        <i class="material-icons" onclick="changeTheme()">brightness_6</i>
      </div>
    </nav>
  </header>
  <script src="{{ asset('js/hamburger.js') }}"></script>

  <div style="padding-top: 8rem">
    Tim Daredon je tim programera i dizajnera koji se bave svim stvarima iz IT sveta <br> 
    Od programiranja preko animacije do dizajna zvuka. <br>
  </div>

  <div style="position: absolute; top: 40%; left: 20%;">
    <div style="color: black;">
      Mozete nas kontaktirati na sledecim drustvenim mrezama
    </div>
    <ul type="none">
      <li><a href="https://facebook.com/daredoninc"><img src="assets/facebook.png" /></a></li>
      <li><a href="https://instagram.com/daredon_studios"><img src="assets/instagram.png" /></a></li>
      <li><a href="https://twitter.com/daredon_studios"><img src="assets/twitter.png" /></a></li>
    </ul>
  </div>

  <div class="lol">

  </div>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script>
    $("#oof").click(function(){
      $('form').submit();
    })
  </script>
</body>

</html>