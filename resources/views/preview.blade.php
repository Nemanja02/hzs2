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
  <link rel="stylesheet" href="{{ asset('styles/preview.css') }}" />
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
            <input type="text" name="search" id="search" />
          </div>
          <i class="material-icons">search</i>
        </span>
        <i class="material-icons" onclick="changeTheme()">brightness_6</i>
      </div>
    </nav>
  </header>
  <script src="{{ asset('js/hamburger.js') }}"></script>

  <div class="event">
    <div class="main">
      <img src="{{asset('image/' . $data->images[0])}}" alt="{{$data->name}}">
      <div class="body">
        <span class="name">{{$data->name}}</span>
        <span class="price">{{($data->price == 0)? "Ulaz besplatan" : "Cena: " . $data->price . " rsd"}}</span> 
        @if(date('d.m.Y.', $data->starting_time) == date('d.m.Y.', $data->ending_time))
          <span>
            Datum događaja: {{ date('d.m.Y.', $data->starting_time) }}
          </span>
          <span>
            Vreme:  {{ date('H:i', $data->starting_time) }} - {{ date('H:i', $data->ending_time) }} 
          </span>
        @else 
          <span>
            Datum početka: {{ date('d.m.Y. H:i', $data->starting_time) }}
          </span>
          <span>
            Datum završetka: {{ date('d.m.Y. H:i', $data->ending_time) }}
          </span>
        @endif
        <div class="links">
          <a href="{{ route('event.edit', $data->id) }}">Izmeni</a>
          <a class="buy" href="{{ $data->ticket }}" target="_blank">Naručite odmah</a>
        </div>
      </div>
      <i class="material-icons">{{$data->icon}}</i>
    </div>

    <span class="about">{{$data->description}}</span>
  </div>
</body>

</html> 