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
  <link rel="icon" href="{{ asset('favicon.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="{{ asset('styles/global.css') }}" />
  <link rel="stylesheet" href="{{ asset('styles/hamburger.css') }}" />
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('styles/index.css') }}" />
  <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body onload="themeLoad()" data-url="{{ asset('assets/') }}">
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

  <div class="banner" style="background-image: url({{ asset('assets/concert-photo.jpg') }}); backround-size:cover">
    <div>
      <h1>Najbolja zabava u gradu</h1>
      <h2>Sve na jednom mestu</h2>
    </div>
    <i id="down" class="material-icons">keyboard_arrow_down</i>
  </div>
  <!-- <div class="float">
    <i class="material-icons">nature</i>
    <i class="material-icons">speaker</i>
    <i class="material-icons">local_play</i>
  </div> -->
  <div id="starred">
    <h1>Popularni događaji</h1>
    @foreach ($data as $event)
    <div class="card">
      <img src='{{ asset("image/" . $event->images[0]) }}' alt="ne">
      <span class="about">
        <span class="name">{{$event->name}}</span>
        <br />
        {{$event->city_name}}, {{$event->dist}} km
        <br />
        {{($event->price == 0)? "Ulaz besplatan" : "Cena: " . $event->price . " rsd"}}

        <div class="links">
          <a class="buy" href="{{$event->ticket}}" target="_blank">{{($event->price == 0)? "Prijavi se" : "Kupi kartu"}}</a>
        </div>
      </span>
    </div>
    @endforeach
  </div>
  
  <i id="up" class="material-icons">keyboard_arrow_up</i>
  <script src="{{asset('js/scroll.js')}}"></script>
  <script>
    $("#oof").click(function(){
      $('form').submit();
    })
  </script>
</body>

</html>