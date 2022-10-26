<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/styles.css" />
    <title>@if (!empty($title))
            BOT | {{$title}}
        @else
            BOT
        @endif</title>
</head>
<body>
<div class="wrapper">
<div class="header">
        <div class="menu">
            @if (!empty(Auth::user()))
                <a href="/users/" class="btn">Пользователи</a>
                <a href="/bot/" class="btn">Управление ботом</a>
                @else
                <a href="/" class="btn">Главная</a>
                <a href="/registration/" class="btn">Регистрация</a>
            @endif

            </div>
        <div class="user-info">
            @if (!empty(Auth::user()))
                <span>{{Auth::user()->name}}</span>
                <a href="/logout/" class="btn">Выйти</a>
            @endif
        </div>
</div>
</div>
