<!DOCTYPE html>
<html lang="sr   ">
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
  <link rel="stylesheet" href="{{ asset('styles/new.css') }}" />
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
        <li><a href="./">mape.</a></li>
        <li><a href="#">about</a></li>
        <li><a href="#">123</a></li>
        <li><a href="#">123</a></li>
      </ul>
      <div class="right">
        <span id="search-icon"  tabindex="0">
          <div>
            <span>search</span>
            <input type="text" name="search" id="search" />
          </div>
          <i class="material-icons">search</i>
        </span>
        <i class="material-icons" onclick="changeTheme()">brightness_6</i>
      </div>
    </nav>
  </header>
  <script src="{{ asset('js/hamburger.js') }}"></script>
  <div class="form">
    {!! Form::open(['route' => 'event.create', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

        <h2>Napravite novi događaj</h2>

        {!! Form::label('name', 'Naziv događaja') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Predstava Romeo i Julija']) !!}

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
            )); 
        !!}

        {!! Form::label('loc', 'Mesto dešavanja') !!}
        {!! Form::text('loc', null, ['class' => 'form-control', 'placeholder' => 'Narodno pozorište']) !!}

        {!! Form::label('start', 'Vreme početka') !!}
        {!! Form::date('start', null, ['class' => 'form-control']) !!}

        {!! Form::label('end', 'Vreme kraja') !!}
        {!! Form::date('end', null, ['class' => 'form-control']) !!}

        {!! Form::label('ticket', 'Link za kupovinu karata') !!}
        {!! Form::text('ticket', null, ['class' => 'form-control', 'placeholder' => 'www.kupovina.karata']) !!}
        
        {!! Form::label('price', 'Cena (RSD)') !!}
        {!! Form::number('price', 0, ['class' => 'form-control', 'step' => '0.1']) !!}

        {!! Form::label('price', 'Izaberite sliku događaja') !!}
        <input type="file" name="images[]" multiple>

        {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'Prelepa predstava Romeo i Julija odigrana na narodnom pozorištu']) !!}

        {!! Form::submit('Pošalji', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}
  </div>
</body>
</html>