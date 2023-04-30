<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap&subset=cyrillic,cyrillic-ext"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="libs/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
    <title>Интернет магазин</title>
</head>

<body class="body">


<header class="header">
<div class="container">
    
    <div class="header__inner">

        <div class="header__logo">
            <a class="logo" href="#">
                <p>Флора</p>
            </a>
        </div>

        <ul class="header_links">
            <li>
                <a href="index.php">Каталог</a>
            </li>
            <li>
                <a href="#">О нас</a>
            </li>
            <li>
                <a href="#">Контакты</a>
            </li>
            <form action="ajax.php" method ="POST" id= "formCart">
            
            <li>
                <button type="submit" >Корзина</a>
            </li>
            </form>
        </ul>

        <div class="header__phone">
            <a class="phone" href="tel:+79256457725">+7 (925) 645-77-25</a>
        </div>

    </div>

</div>
</header> 

<main>

<section class="panel">
<div class="container">

    <div class="panel__inner">
        <aside class="panel__aside">
            <div class="panel__aside-wrapper">
                <div class="tabs">
                    <a class="tabs__item tabs__item--active" href="#tab-1">Описание</a>
                    <a class="tabs__item" href="#tab-2">Характеристики</a>
                    <a class="tabs__item" href="#tab-3">Отзывы</a>
                </div>
            </div>
            <a class="logout" href="#">Выход</a>
        </aside>
        
        
        <div class="panel__content">
            <div class="tabs__content">
                <div class="tabs__content-item tabs__content-item--active" id="tab-1">
                    content-1
                </div>
                <div class="tabs__content-item" id="tab-2">
                    content-2
                </div>
                <div class="tabs__content-item" id="tab-3">
                    content-3
                </div>
            </div>
        </div>

    </div>



</div>
</section>


</main>



<script src="js/main.js"></script>

</body>