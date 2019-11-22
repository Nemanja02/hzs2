<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {!! Form::open(['route' => 'event.create', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

        {!! Form::label('name', 'Event name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('type', 'Event Type') !!}
        {!! 
            Form::select('type', array(
                'Koncert' => 'Koncert',
                'Festival' => 'Festival',
                'Predstava' => 'Predstava',
                'Zurka' => 'Zurka',
                'Sajam' => 'Sajam',
                'Izlozba' => 'Izlozba'
            )); 
        !!}

        {!! Form::label('loc', 'Location') !!}
        {!! Form::text('loc', null, ['class' => 'form-control']) !!}

        {!! Form::label('start', 'Starting time') !!}
        {!! Form::date('start', null, ['class' => 'form-control']) !!}

        {!! Form::label('end', 'Ending time') !!}
        {!! Form::date('end', null, ['class' => 'form-control']) !!}
        
        {!! Form::label('price', 'Price (RSD)') !!}
        {!! Form::number('price', 0, ['class' => 'form-control', 'step' => '0.1']) !!}
        {!! Form::file('image'); !!}

        {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}

        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}
</body>
</html>