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
  <link rel="stylesheet" href="{{ asset('styles/search.css') }}" />
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
            {!! Form::close() !!}
          </div>
          <i class="material-icons" id="search">search</i>
        </span>
        <i class="material-icons" onclick="changeTheme()">brightness_6</i>
      </div>
    </nav>
  </header>
  <script src="{{ asset('js/hamburger.js') }}"></script>
  <script src="{{ asset('js/search_more.js') }}"></script>
  <div class="search">
  {!! Form::open(['route' => 'events', 'id' => 'form', 'method' => 'get']) !!}
    <input type="text" class="searchInput" name="query" placeholder="pretraga..."/>
    <i class="material-icons" onclick="toggleMore()">more_horiz</i>
    <i class="material-icons">send</i>
    <input type="number" name="mindist" id="" />
    <input type="number" name="maxdist" id="" />
    <input type="number" name="minprice" id="" />
    <input type="number" name="maxprice" id="" />
    {!! Form::label('type', 'Tip događaja') !!}
        {!! 
            Form::select('type', array(
                'Koncert' => 'Koncert',
                'Music Festival' => 'Music Festival',
                'Predstava' => 'Predstava',
                'Zurka' => 'Zurka',
                'Sajam' => 'Sajam',
                'Izlozba' => 'Izlozba',
                'Film' => 'Film',
                'Masterclass' => 'Masterclass'
            ), ['name' => 'type']); 
        !!}
  {{ Form::close() }}
  </div>
  <div id="more" class="is-active">

  </div>
  <div class="cards">
    @if (count($events) > 0)
    @foreach($events as $event)
    @if ($event->show)
    <a href="{{route('preview', $event->id)}}">
      <div class="card">
        <div class="img">
          <img src='{{ asset("image/" . $event->images[0]) }}' alt="">
        </div>
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
    @endif
    @endforeach
    @else
      Nema rezultata
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