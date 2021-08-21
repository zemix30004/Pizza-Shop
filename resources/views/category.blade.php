
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pizza-Shop</title>

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
                <li ><a href="http://laravel-diplom-1.rdavydov.ru/categories">Категории</a>
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
        <h1>
            @if($category == 'pizzas')
                Пиццы
            @elseif($category == 'snacks')
                Закуски
            @elseif($category == 'beverages')
                Напитки
            @endif
        </h1>
        <p>
            В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!
        </p>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
                    <div class="caption">
                        <h3>King пицца, 35см.</h3>
                        <p>150 грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/1/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/mobiles/iphone_x_64" class="btn btn-default"
                               role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_5.jpg" alt="iPhone 5SE">
                    <div class="caption">
                        <h3>Гавайская пицца, 25см.</h3>
                        <p>85грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/4/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/pizzas/iphone_5se" class="btn btn-default"
                               role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/delongi.jpg" alt="Кофемашина DeLongi">
                    <div class="caption">
                        <h3>Мексиканская пицца, 35см.</h3>
                        <p>134грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/8/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/appliances/delongi" class="btn btn-default"
                               role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/moulinex.jpg" alt="Блендер Moulinex">
                    <div class="caption">
                        <h3>Двойная пепперони пицца, 30см.</h3>
                        <p>117грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/10/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/appliances/moulinex" class="btn btn-default"
                               role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
