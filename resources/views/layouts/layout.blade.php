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

    <style>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .current{
            color: red;
        }
    </style>
    <title>Test task</title>
</head>
<body>
<nav class="navbar bg-light mb-3">
    <ul class="nav">

        @guest
            <li class="nav-item">
                <a class="nav-link @if(\Illuminate\Support\Facades\Route::current()->action['as'] === 'login') current @endif" href="{{ route('login') }}">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Illuminate\Support\Facades\Route::current()->action['as'] === 'register') current @endif" href="{{ route('register') }}">Registration</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link @if(\Illuminate\Support\Facades\Route::current()->action['as'] === 'index') current @endif" href="{{ route('index') }}"><i class="fa fa-home fa-fw"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if( \Illuminate\Support\Facades\Route::current()->action['as'] === 'statistics') current @endif" href="{{ route('statistics') }}">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}">Log out</a>
            </li>
        @endguest
    </ul>
</nav>
@yield('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>
