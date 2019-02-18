<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Test task</title>
</head>
<body>
<nav class="menu">
    <ul>
        <li ><a href="{{ route('index') }}"><i class="fa fa-home fa-fw"></i>Home</a></li>
        <li><a class="statistics" href="{{ route('statistics') }}">Statistics</a></li>
    </ul>
</nav>
    @yield('content')
</body>
</html>
