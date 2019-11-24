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
  <link rel="stylesheet" href="{{ asset('styles/new.css') }}" />
  <link rel="stylesheet" href="{{ asset('styles/jquery.datetimepicker.min.css') }}">
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
    {!! Form::open(['route' => 'event.edit.apply', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
        <span class="naslov">
          <h2>Izmeni događaj</h2>
          <i class="material-icons">delete</i>
        </span>
        {!! Form::label('name', 'Naziv događaja') !!}
        {!! Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'Predstava Romeo i Julija']) !!}

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
            ), $data->type); 
        !!}

        {!! Form::label('loc', 'Mesto dešavanja') !!}
        {!! Form::text('loc', $data->city_name, ['class' => 'form-control', 'placeholder' => 'Narodno pozorište', 'id' => 'place']) !!}
        <div id="results" ></div>

        {!! Form::label('loc_name', 'Ime mesta koje ce se prikazivati') !!}
        {!! Form::text('loc_name', $data->city_name, ['class' => 'form-control', 'placeholder' => 'Narodno pozorište', 'id' => 'place']) !!}

        <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="lon" name="lon">
        <input type="hidden" id="id" name="id" value="{{$data->id}}">

        {!! Form::label('start', 'Vreme početka') !!}
        {!! Form::text('start', date("Y/m/d H:i", $data->starting_time), ['class' => 'form-control', 'id' => 'start']) !!}

        {!! Form::label('end', 'Vreme kraja') !!}
        {!! Form::text('end', date("Y/m/d H:i", $data->ending_time), ['class' => 'form-control', 'id' => 'end']) !!}

        {!! Form::label('ticket', 'Link za kupovinu karata') !!}
        {!! Form::text('ticket', $data->ticket, ['class' => 'form-control', 'placeholder' => 'www.kupovina.karata']) !!}
        
        {!! Form::label('price', 'Cena (RSD)') !!}
        {!! Form::number('price', $data->price, ['class' => 'form-control', 'step' => '10', 'min' => '0']) !!}

        {!! Form::textarea('desc', $data->description, ['class' => 'form-control', 'placeholder' => 'Prelepa predstava Romeo i Julija odigrana na narodnom pozorištu']) !!}

        {!! Form::submit('Pošalji', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $('body').on('click', '#result', function(){
            $("#place").val($(this).text());
            $("#results").empty();
            $("#lat").val($(this).attr('lat'));
            $("#lon").val($(this).attr('lon'));
        });

        $("#place").keyup(function(){
            let val = $("#place").val();
            if (val.length > 3) {
                val = encodeURIComponent(val.trim());
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://us1.locationiq.com/v1/search.php?key=aaa9efdcf97bd5&q=" + val + "&format=json",
                    "method": "GET"
                }
                $.ajax(settings).done(function (response) {
                    $("#results").empty();
                    let limit = (response.length < 5) ? response.length : 5;
                    for (let i = 0; i < limit; i++) {
                        $("#results").append('<span id="result" lat="' + response[i].lat + '" lon="' + response[i].lon + '">' + response[i].display_name + '</span><br>')
                    }
                });
            } else {
                $("#results").empty();
            }
        });

    </script>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        jQuery('#end').datetimepicker();
        jQuery('#start').datetimepicker();
    </script>
  </div>
</body>
</html>