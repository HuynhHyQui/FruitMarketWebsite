<?php
    session_start();
    require("../connection.php");
    require("../class/order.php");
    require("../class/vegetable.php");
    $order=new order();
    $vegetable=new vegetable();
    if (isset($_SESSION['id'])) {
        $day=date("Y-m-d");
        $orderN['CustomerID']=$_SESSION['id'];
        $orderN['Date']=$day;
        $orderN['Note']="";
        $sl=0;
        $tong=0;
        $detail=array();
        foreach ($_SESSION['cart'] as $key=>$value) {
            $vegeM=json_decode($vegetable->getByID($key),true);
            $sp['VegetableID']=$key;
            $sp['Quantity']=$value['Quantity'];
            $sp['Price']=$vegeM['Price'];
            array_push($detail,$sp);
            $sl+=$value['Quantity'];
            $tong+=($value['Quantity']*$vegeM['Price']);
        }
        $orderN['Total']=$tong;
        $order->addOrder($orderN,$detail);
        unset($_SESSION['cart']);
        header('Location: ../vegetable/index.php');
    }
    else {
        echo "<h1>Vui lòng đăng nhập để mua hàng!</h1>";
        echo '<a href="../customer/login.php"><h2>Đăng nhập</h2></a>';
    }
?>