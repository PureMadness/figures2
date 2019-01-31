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
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        table {
            border: 1px solid grey; /*устанавливаем для таблицы внешнюю границу серого цвета толщиной 1px*/
        }
    </style>

</head>
    <body>


    <select name="figure" disabled>
        <option >Выберите фигуру</option>
        <option value="circle">Круг</option>
        <option value="square">Квадрат</option>
        <option value="triangle">Треугольник</option>
        <option value="rectangle">Прямоугольник</option>
    </select>



    <form action="" method="post">
        <input type="text" name="name" placeholder="Что-то про фигуру"/>
        <input type="submit" name="my_button" value="Нажми"/>
    </form>


    <table>
        <tr>
            <td>Тип фигуры</td>
            <td>Площадь</td>
            <td>Удалить?</td>
        </tr>
    </table>
    <a href="/statistics">Статистика</a>
    </body>
</html>
<?php
