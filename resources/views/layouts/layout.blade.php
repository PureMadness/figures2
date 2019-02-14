<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Test task</title>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg">
        <ul class="nav">
            <li class="nav-item nav-pills">
                <a class="nav-link active" href="{{ route('index') }}"><i class="fa fa-home fa-fw"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('statistics') }}">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Log out</a>
            </li>
        </ul>
    </nav>

    @yield('content')
</div>
</body>
</html>
