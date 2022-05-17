<?php
    if (isset($_POST['name'])) {
        require("../connection.php");
        require("../class/category.php");
        $category=new category();
        $cate['Name']=$_POST['name'];
        $cate['Description']=$_POST['des'];
        $category->add($cate);
        header('Location: index.php');
    }
?>