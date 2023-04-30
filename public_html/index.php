<?php
session_start();
include('connection.php');

$quantity = 5;
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
                 
                
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}

$list=--$page*$quantity;
$result = mysqli_query($mysqli, "SELECT `id`, `name`, `price` FROM `product` ORDER BY".$sort_sql." LIMIT ".$quantity."  OFFSET ".$list);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap&subset=cyrillic,cyrillic-ext"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Интернет магазин</title>
</head>

<body class="body">
    <header class="header">
        <div class="header__inner">
            <nav class="LeftInf">
                <a class="UpperClass" href="/for_vega/html_registr/main_str/index_main.php">Каталог</a>
                <a class="UpperClass" href="/for_vega/html_registr/reg_portfolio/index_regport.html">Информация</a>
                <a class="UpperClass" href="connection.php">Контакты</a>
            </nav>
            <nav class = "CardRight">
                <a class="UpperClass" href=""  style="margin-right: 20px;">
                    <span>
                        <img class="MinCard" src="https://moscow.cvetovik.com/static/bs5/img/head-cart.svg" alt="Корзина">
                    </span>
                    <span>Корзина</span>
                </a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="product">
            <form action=" " method="get" class="form">
                <div class="sort">
                    <label for="sort-by">Сортировать по:</label>
                        <select name="sort">
                            <option value="standart" <?php if (@$_GET['sort']=='standart') echo 'selceted'; ?>>По умолчанию</option>
                            <option value="name_asc" <?php if (@$_GET['sort']=='name_asc') echo 'selceted'; ?>>Названию от А-Я</option>
                            <option value="name_desc" <?php if (@$_GET['sort']=='name_desc') echo 'selceted'; ?>>Названию от Я-А</option>
                            <option value="price_asc" <?php if (@$_GET['sort']=='price_asc') echo 'selceted'; ?>> Цена: по возрастанию </option>
                            <option value="price_desc" <?php if (@$_GET['sort']=='price_desc') echo 'selceted'; ?>>Цена: по убыванию </option>
                        </select>
                </div>
                <div class="filter">        
                    <label for="category">Категория:</label>
                        <select id="category" name="category">
                            <option value="">Все категории</option>
                        </select>
                </div>
                    <div class = "price1">
                        <label for="price">Цена:</label>
                            <input type="number" id="price" name="price" min="0">
                                <button type="submit">Сортировать</button>
            </form>
            </div> 

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
                        echo '<a href="card.php?id ='.$row['id'].' class="UpperClass" >В корзину</a>';
                        
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