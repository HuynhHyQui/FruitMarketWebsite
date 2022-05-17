<?php
if (isset($_POST['add'])) {
    require("../connection.php");
    require("../class/vegetable.php");
    $vegetable=new vegetable();
    $number=count(json_decode($vegetable->getAll(),true));
    $vege['VegetableName']=$_POST['name'];
    $vege['Unit']=$_POST['unit'];
    $vege['Amount']=$_POST['amount'];
    $vege['CategoryID']=$_POST['category'];
    $vege['Price']=$_POST['price'];
    if(isset($_FILES['image'])){
        $errors= "";
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $addr="images/" . basename($file_name);
        $vege['Image']=$addr;
        
        $imageFileType = pathinfo($addr,PATHINFO_EXTENSION);
        $expensions= array("jpg","png");
         
        if(!in_array($imageFileType,$expensions)){
           $errors=$errors."Chỉ hỗ trợ upload file JPG hoặc PNG.";
        }
         
        if($file_size > 2097152) {
           $errors=$errors.'Kích thước file không được lớn hơn 2MB';
        }
         
        if($errors=="") {
            move_uploaded_file($file_tmp,$addr);
            $vegetable->addVegetable($vege);
            header('Location: index.php');
        }
        else{
           echo $errors;
        }
     }
}
?>