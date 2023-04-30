<?php

include('connection.php');


$quantity = 6;
$limit = 150;
$searchText = $_POST['searchText'];



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
                 
                
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}

$list=--$page*$quantity;
$result = mysqli_query($mysqli, "SELECT * FROM product WHERE name like '%$searchText%' ORDER BY".$sort_sql);

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
    <link rel="stylesheet" href="css/style.css">
    <title>Интернет магазин</title>
</head>
<body class="body">


<header class="header">
<div class="container">
    
    <div class="header__inner">

        <div class="header__logo">
            <a class="logo" href="index.php">
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
        <form class="filter__search" action="index.php" method="post">
            <input class="filter__search-input" placeholder="<?php echo $searchText;?>" name="searchText" >  
            <button class="filter__search-button" >КНОПКА</button>
        </form>

        <form onsubmit="" action="" method="GET" class="form" >
            <select class="filter__select">
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
                <img src="img/content/1.jpg" alt="">
            </div>
            <div class="card_content">
                <h3 class="card__title"><?php echo $row['name'] ?></h3>
                <p class="card__desc"><?php echo $row['description'] ?></p>
                <p class="card__price"><?php echo $row['price'] ?>
                    <span> руб</span>
                </p>
            </div>
            <button class="card_button">В корзину</button>
        </div>
        
        <?php 
            }
        }
        
        ?>
        
    </div>
        


    </div>
</div>
</section>










</main>

            <?php                   
                for ($g=0; $g < $quantity*($page-1); $g++){
                    $qres = mysqli_fetch_assoc($result);
                }
                for ($i= 0; $i<$quantity;$i++){
                    $row = mysqli_fetch_array($result);
                    if ($row == true ){
                        
                        echo '<h2 style="margin-top:50px;">' . $row['name'] . '</h2>';
                        echo '<p>' . $row['price'] . '</p>';
                        echo '<p>' . $row['id'] . '</p>';
                        $id= $row['id'];
                        $_SESSION['id'] = $id;
                        echo '<button class = "add-to-cart" data-id ='.$row['id'].' class="UpperClass" >В корзину</button>';
                        
                    }
                }
                
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
    </div>    
</body>