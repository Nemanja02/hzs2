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
            <input type="text" name="search" id="search" />
          </div>
          <i class="material-icons">search</i>
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
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
    <div class="card">
      <img src="https://www.fillmurray.com/640/360" alt="ne">
      <span class="about">
        <span class="name">mrtvi mi5</span>
        <br />
        Beograd, levo 
        <br />
        Ulaz besplatan

        <div class="links">
          <a class="buy" href="#" target="_blank">Kupi kartu</a>
        </div>
      </span>
    </div>
  </div>
  
  <i id="up" class="material-icons">keyboard_arrow_up</i>
  <script src="{{asset('js/scroll.js')}}"></script>
</body>

</html>