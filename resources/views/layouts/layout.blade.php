<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        table {
            font-size: 14px;
            border-radius: 10px;
            border-spacing: 0;
            text-align: center;
        }
        th {
            background: #BCEBDD;
            color: white;
            text-shadow: 0 1px 1px #2D2020;
            padding: 10px 20px;
        }
        th, td {
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: white;
        }
        th:first-child, td:first-child {
            text-align: left;
        }
        th:first-child {
            border-top-left-radius: 10px;
        }
        th:last-child {
            border-top-right-radius: 10px;
            border-right: none;
        }
        td {
            padding: 10px 20px;
            background: #F8E391;
        }
        tr:last-child td:first-child {
            border-radius: 0 0 0 10px;
        }
        tr:last-child td:last-child {
            border-radius: 0 0 10px 0;
        }
        tr td:last-child {
            border-right: none;
        }

        ul {
            list-style: none;
            margin: 0 auto;
        }
        a {
            text-decoration: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            transition: .5s linear;
        }
        i {
            margin-right: 10px;
        }
        nav {
            display: block;
            margin: 0 auto 30px;
        }
        .menu ul {
            padding: 1em 0;
            background: #BCEBDD;
        }
        .menu a {
            padding: 1em;
            background: rgba(177, 152, 145, .3);
            border-right: 1px solid #b19891;
            color: white;
            text-shadow: 0 1px 1px #2D2020;
        }
        .menu a:hover {background: #F8E391;}
        .menu li {
            display: inline;
            font-weight: bold;
            color: white;
        }
        .pagination li {
            display: inline-block;
        }

        form {
            display: inline;
        }

        .selectFigure {
            padding: 5px;
        }

        .alert {
            color:  red;
            padding: 5px;
        }

        .add {
            padding: 5px 5px;
        }
    </style>

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
