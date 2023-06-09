<?php
session_start();
include('connection.php');
error_reporting(E_ALL & ~E_WARNING);

$totalPrice = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {

    $_SESSION['id'] = $_POST['productsArray'];
}
    $idCard = $_SESSION['id'];
    
    $id_arrayCard= implode(",",$idCard); 
    
    $idCountsCard = array_count_values($idCard);
    
    $resultCard= mysqli_query($mysqli,"SELECT * FROM product WHERE id IN ($id_arrayCard)");

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="css/styleCard.php" type="text/css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <b> My Cart Detail </b>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class="table v-set">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id ="in-check">
                                       <?php  
                                            
                                            $num = mysqli_num_rows($resultCard);

                                            if ($num > 0){

                                                $totalPrice = "";
                                                
                                                while($item = mysqli_fetch_array($resultCard)){
                                                    
                                                    $price = $item['price'];
                                                    
                                                    $quantity = $idCountsCard[$item['id']];
                                                    
                                                    $subtotal = $quantity * $item['price'];
                                                    
                                                    $totalPrice += $subtotal;
                                                    
                                        ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td class = "card__img">
                                                <img src="<?php echo $item['img'] ?>" class="box-image-set-2" style="width: 200px; height: 150px;">
                                            </td>
                                            <td><?php echo $item['name'] ?> </td>
                                            <td><?php echo $quantity?></td>
                                            <td><?php echo $price ?></td>
                                            <td><?php echo $subtotal;?></td>
                                            <td>
                                                <form action="" method="GET">
                                                <button class="btn btn-sm btn-danger rm-val" type="submit" name="delItem" value="<? $item['id']?>">
                                                    <span><i class="far fa-trash-alt"></i></span>
                                                    <span>Remove</span>
                                                </button>
                                                </form>
                                                <?php if(isset($_GET['delItem'])){
                                                        $delId = $_GET['delItem'];
                                                        mysqli_query($mysqli,"DELETE FROM `card` WHERE id='$delId'");
                                                                                    
                                                    }?>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php }}       else {echo "Корзина пуста <br>";}  ?>
                                  
                                    <tfoot>
                                        <tr>
                                            <td colspan="7"><b> Total Amount :: <?php if ($totalPrice == true){ echo $totalPrice;} else { echo '- ';}?> </b> </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    
    </script>

</body>

</html>
