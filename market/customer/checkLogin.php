<?php
    session_start();
    require("../connection.php");
    require("../class/customer.php");
    $customer=new customer();
    $user=array();
    if (isset($_POST["id"])) {
        $id=$_POST["id"];
        $password=$_POST['pwd'];
        $arr=array();
        $arr=json_decode($customer->getByID($id),true);
        if ($arr) {
            if ( $arr['Password'] == $password ) {
                $_SESSION['id']=$arr['CustomerID'];
                $_SESSION['ten']=$arr['Fullname'];
                header('location: ../vegetable/index.php');
            }
            else {
                echo '<div class="text-danger">Nhập mật khấu sai</div>';
            } 
        }
        else {
            echo '<div class="text-danger">Không tìm thấy tài khoản</div>';
        }
    }
?>