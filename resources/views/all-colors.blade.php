<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/main.min.css" rel="stylesheet" />
    <style>
        body {
            -webkit-print-color-adjust: exact !important;
        }

    </style>
</head>
<body>
@php

$colors=\App\Color::all();

@endphp
<div style="background-image: url('/svg/Aras-Logo.png');height: 60px;
background-repeat: no-repeat;
background-position: center;
background-size: contain;
margin: 50px auto;"></div>
<div class="row" style="width: 80%;margin: 50px auto">
    @foreach($colors as $color)
        <div class="col-sm-3">
            <div style="background: {{$color->english_name}};
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;margin: 20px auto 5px auto;border:1px solid #d5d5d5"></div>
            <div style="text-align: center;font-family: 'roya';margin-bottom: 50px;font-size: 24px;">{{$color->name}}</div>
        </div>
        @endforeach


</div>

</body>
</html>