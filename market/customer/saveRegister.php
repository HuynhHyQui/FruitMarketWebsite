<?php
    session_start();
    require("../connection.php");
    require("../class/customer.php");
    $customer=new customer();
    $user=array();
    if (isset($_POST["fname"])) {
        $cus=array();
        $cus['Fullname']=$_POST["fname"];
        $cus['Password']=$_POST["pwd"];
        $cus['Address']=$_POST['add'];
        $cus['City']=$_POST['city'];
        if ($cus['Fullname'] == ''||$cus['Password'] == ''||$cus['Address'] == ''||$cus['City'] == ''){
            echo '<div class="text-danger">Bạn chưa nhập đầy đủ thông tin</div>';
        }
        else {
            $customer->add($cus);
            header ('location: login.php');
        }
    }
?>