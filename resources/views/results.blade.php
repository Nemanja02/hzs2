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
  <link rel="stylesheet" href="{{ asset('styles/search.css') }}" />
</head>

<body onload="themeLoad()">
<link rel="stylesheet" href="{{ asset('styles/navigation.css') }}" />
  <header>
    <div class="mobile-nav">
      <span>mape.</span>
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
        <li><a href="#">123</a></li>
      </ul>
      <div class="right">
        <span id="search-icon" tabindex="0">
          <div>
            <span>search</span>
            {!! Form::open(['route' => 'event.search', 'id' => 'form']) !!}
              <input type="text" name="search" id="" />
            {!! Form::close() !!}
          </div>
          <i class="material-icons" id="search">search</i>
        </span>
        <i class="material-icons" onclick="changeTheme()">brightness_6</i>
      </div>
    </nav>
  </header>
  <script src="{{ asset('js/hamburger.js') }}"></script>
  <div class="cards">
    @if (Session::get('data') != NULL)
    @foreach(Session::get('data') as $event)
    <a href="{{route('preview', $event->id)}}">
    <div class="card">
        <img src='{{ asset("image/" . $event->images[0]) }}' alt="">
        <i class="material-icons">{{$event->icon}}</i>
        <div class="body">
          <span class="name">{{ $event->name }}</span>
          <span class="about">
            {{ str_replace("%20", " ", $event->city_name) }}, {{ $event->dist }} km 
            <br />
            {{($event->price == 0)? "Ulaz besplatan" : "Cena: " . $event->price . " rsd"}}
          </span>
        </div>
        <div class="links"><a class="buy" href="{{ $event->ticket }}">Naručite odmah</a></div>
      </div>
    </a>
    @endforeach
    @else
        Dogadjaji pod navedenim kriterijumom ne postoje.
    @endif
  </div>
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script>
    $('#search').click(function(){
      $('#form').submit();
    })
  </script>
</body>
</html>