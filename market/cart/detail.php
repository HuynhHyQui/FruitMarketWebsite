<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Cart detail</h1>
    <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Amount</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>

    <?php
    session_start();
    require("../connection.php");
    require("../class/vegetable.php");
    require("../class/order.php");
    $vegetable=new vegetable();
    $order=new order();
    if (isset($_GET['orderid'])) {
        $id=$_GET['orderid'];
        $t=1;
        $sl=0;
        $tong=0;
        $arr=json_decode($order->getOrderDetail($id),true);
        foreach ($arr as $key=>$value) {
            $vegeM=json_decode($vegetable->getByID($value['VegetableID']),true);
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
            <td>Total:</td>
            <td>'.$sl.'</td>
            <td>'.$tong.'</td>
        </tr>
    '
    ?>
    </div>
</body>
</html>