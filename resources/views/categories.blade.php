
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Категории</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://laravel-diplom-1.rdavydov.ru">Pizza-Shop</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="http://laravel-diplom-1.rdavydov.ru">Все товары</a></li>
                <li  class="active" ><a href="http://laravel-diplom-1.rdavydov.ru/categories">Категории</a>
                </li>
                <li ><a href="http://laravel-diplom-1.rdavydov.ru/basket">В корзину</a></li>
                <li><a href="http://laravel-diplom-1.rdavydov.ru/reset">Сбросить проект в начальное состояние</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://laravel-diplom-1.rdavydov.ru/admin/home">Панель администратора</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="starter-template">
        <div class="panel">
            <a href="/pizzas">
                <img src="img/pizzas.jpg">
                <h2>Пиццы</h2>
            </a>
            <p>
                В этом разделе вы найдёте самые изысканные на вкус пиццы!
            </p>
        </div>
        <div class="panel">
            <a href="/snacks">
                <img src="img/snacks.jpg">
                <h2>Закуски</h2>
            </a>
            <p>
                Здесь выбирайте самые разнообразные закуски под крепкие напитки!
            </p>
        </div>
        <div class="panel">
            <a href="/beverages">
                <img src="img/beverages.jpg">
                <h2>Напитки</h2>
            </a>
            <p>
                Напитки на любой вкус ждут вас!
            </p>
        </div>
    </div>
</div>
</body>
</html>
