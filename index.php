<?php
session_start();
include('connection.php');

$quantity = 6;
$limit = 150;
if (array_key_exists('page',$_GET)){
    $page = $_GET['page'];
}else $page = 1;

if (!is_numeric($page)){
    $page = 1;
} if ($page < 1){
    $page = 1; 
}

$result2 = mysqli_query($mysqli,"SELECT `name`,`price` FROM `product`");
$num = mysqli_num_rows($result2);
$pages = $num/$quantity;
$pages = ceil($pages);
$pages++; 
                
if ($page > $pages){
    $page = 1;
}

if (!isset($list)){ 
    $list = 0;
}

$sort_list = array(
    'standart' => '`id`',
    'name_asc'  => '`name`',
    'name_desc' => '`name` DESC',
    'price_asc'  => '`price`',
    'price_desc' => '`price` DESC',   
);
                 

if(isset($_GET['sort']))
{
    $_SESSION['sort'] = @$_GET['sort'];
}

$sort = @$_SESSION['sort'];

if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}

$list=--$page*$quantity;
$result = mysqli_query($mysqli, "SELECT `id`, `name`,`description`, `price`,`img` FROM `product` ORDER BY".$sort_sql." LIMIT ".$quantity."  OFFSET ".$list);

?>

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


<section class="catalog">
<div class="container">

    <div class="catalog__inner">
        

    <aside class="filter">
        <div class="filter__wrapper">
        <form class="filter__search" action="search.php" method="post">
            <input class="filter__search-input" placeholder="Искать..." name="searchText">
            <button class="filter__search-button">КНОПКА</button>
        </form>

        <form action="" method="GET" class="form" >
            <select class="filter__select" name="sort">
                <option value="standart" <?php if (@$_GET['sort']=='standart') echo 'seleceted'; ?>>По умолчанию</option>
                <option value="name_asc" <?php if (@$_GET['sort']=='name_asc') echo 'seleceted'; ?>>Названию от А-Я</option>
                <option value="name_desc" <?php if (@$_GET['sort']=='name_desc') echo 'seleceted'; ?>>Названию от Я-А</option>
                <option value="price_asc" <?php if (@$_GET['sort']=='price_asc') echo 'seleceted'; ?>> Цена: по возрастанию </option>
                <option value="price_desc" <?php if (@$_GET['sort']=='price_desc') echo 'seleceted'; ?>>Цена: по убыванию </option>
            </select>
            <button class="filter__select-button" type="submit" >Сортировать</button>
        </form>

        <form>
            <div class="filter__inner">

                <div class="filter__item">
                    <h4 class="filter__item-title">Розы</h4>
                    <div class="filter__item-content">
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Белые</span>
                        </label>
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Красные</span>
                        </label> 
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Желтые</span>
                        </label>  
                    </div>
                </div>


                <div class="filter__item">
                    <h4 class="filter__item-title">Тюльпаны</h4>
                    <div class="filter__item-content">
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Красные</span>
                        </label>
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Фиолетовые</span>
                        </label> 
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Розовые</span>
                        </label>  
                    </div>
                </div>

                <div class="filter__item">
                    <h4 class="filter__item-title">Хризантемы</h4>
                    <div class="filter__item-content">
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Красные</span>
                        </label>
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Желтые</span>
                        </label> 
                        <label class="checkbox">
                            <input class="checkboxreal" type="checkbox">
                            <span class="checkboxfake"></span>
                            <span class="checkbox__title">Красные</span>
                        </label>  
                    </div>
                </div>

            </div>
        </form>
        </div>
    </aside> 

    <div class="catalog__cards">
                <?php                   
                for ($g=0; $g < $quantity*($page-1); $g++){
                    $qres = mysqli_fetch_assoc($result);
                }
                for ($i= 0; $i<$quantity;$i++){
                    $row = mysqli_fetch_array($result);
                    if ($row == true ){
                ?>        
        <div class="card">
            <span class="card__sale">Sale</span>

            <div class="card__img">
                <img src="<?php echo $row['img'] ?>" alt="">
            </div>

            <div class="card_content">
                <h3 class="card__title"><?php echo $row['name'] ?></h3>
                <p class="card__desc"><?php echo $row['description'] ?></p>
                <p class="card__price"><?php $formatted_price = number_format($row['price'], 0, ',', ' ');  echo $formatted_price;?>
                    <span> руб</span>
                </p>
            </div>
            <button class="card_button" onclick="addToCart(<?= $row['id'] ?>)" >Добавить в корзину </button>
            
            
            
                <script>

                function addToCart(id) {
                    
                    $('#formCart').append('<input type="hidden" name="product_id[]" value =\''+id+'\'>');
                    
                    alert('Товар добавлен')

                    }

                </script>
        </div>
        
        <?php 
            }
        }
        
        ?>
        
        <div class="d-none" id="precart" type ="hidden">
                
                
                
            
            
        </div>
        
        
        
        
        </div>
    
    </div>
</div>
</section>



</main>
        <footer class="footer">    

            <?php                   
                
                
                echo '<br>Страницы: <br>';

                if ($page >= 1) {
                    
                    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=1"><<</a> &nbsp; ';
                    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . $page . 
                    '">< </a> &nbsp; ';
                }

                $mod = $page + 1;
                $start = $mod - $limit;
                $end = $mod + $limit;
                for ($j = 1; $j < $pages; $j++) {
                    if ($j >= $start && $j <= $end) {
                        if ($j== ($page + 1)) echo '<a href="' . $_SERVER['SCRIPT_NAME'] . 
                        '?page=' . $j . '"><strong style="color: #df0000">' . $j . 
                        '</strong></a> &nbsp; ';
                        else echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . 
                        $j . '">' . $j . '</a> &nbsp; ';
                    }
                }

                if ($j > $page && ($page + 2) < $j) {
                    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($page + 2) . 
                    '"> ></a> &nbsp; ';
                    echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?page=' . ($j - 1) . 
                    '">>></a> &nbsp; ';
                }
            ?>
        </footer>
       
</body>

