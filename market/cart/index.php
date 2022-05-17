<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>CART</title>
</head>
<body>
    <div class="container">
        <h1>Cart</h1>
        <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Picture</th>
            <th>Amount</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
    
        <?php
        session_start();
        require("../connection.php");
        require("../class/vegetable.php");
        $vegetable=new vegetable();
        $sl=0;
        $tong=0;
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            if (isset($_SESSION['cart'])) {
                if (isset($_SESSION['cart'][$id])) {
                    $vege=json_decode($vegetable->getByID($id),true);
                    if ($_SESSION['cart'][$id]['Quantity'] < $vege['Amount']) {
                        $_SESSION['cart'][$id]['Quantity']++;
                    }
                }
                else {
                    $_SESSION['cart'][$id]['Quantity']=1;
                }
            }
            else {
                $_SESSION['cart'][$id]['Quantity']=1;
            }
            $t=1;
            foreach ($_SESSION['cart'] as $key=>$value) {
                $vegeM=json_decode($vegetable->getByID($key),true);
                echo '
                <tr>
                    <td>'.$t.'</td>
                    <td>'.$vegeM['VegetableName'].'</td>
                    <td><img src="../'.$vegeM['Image'].'" class="img-fluid mx-auto" style="width: 50%;height: 100px;"></td>
                    <td>'.$value['Quantity'].'</td>
                    <td>'.$vegeM['Price'].'</td>
                </tr>
                ';
                $t++;
                $sl+=$value['Quantity'];
                $tong+=($value['Quantity']*$vegeM['Price']);
            }
        }
        echo '
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>'.$sl.'</td>
                <td>'.$tong.'</td>
            </tr>
        '
        ?>
        
        </tbody>
      </table>
        <button type="button" class="btn btn-danger d-block">
            <a href="../cart/saveorder.php" class="text-white">Order</a>
        </button>
    </div>
</body>
</html>