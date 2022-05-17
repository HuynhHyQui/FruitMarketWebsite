<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>VEGETABLE</title>
</head>
<body>
    <?php
        require("../menu.php");
        require("../connection.php");
        require("../class/category.php");
        require("../class/vegetable.php");
        $category=new category();
        $vegetable=new vegetable();
        $arrCate=json_decode($category->getAll(),true);
        $arrVege;
        $cateids=array();
        if (isset($_POST['filter'])) {
            foreach ($arrCate as $key=>$value) {
                if (isset($_POST[$value['CategoryID']])) {
                    array_push($cateids,$value['CategoryID']);
                }
            }
            $arrVege=json_decode($vegetable->getListByCateIDs($cateids),true);
        }
        else {
            $arrVege=json_decode($vegetable->getAll(),true);
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <form action="index.php" method="post">
                    <p class="mt-4">Category Name</p>
                    <?php
                        foreach ($arrCate as $key=>$value) {
                            echo '
                            <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck'.$value['CategoryID'].'" name="'.$value['CategoryID'].'">
                            <label class="custom-control-label" for="customCheck'.$value['CategoryID'].'">'.$value['Name'].'</label>
                            </div>
                            ';
                        }
                    ?>
                    <input type="submit" class="btn btn-info" value="Filter" name="filter">
                </form>
            </div>
            <div class="col-10">
                <h1>Vegetable</h1>
                <div class="row">
                    <?php
                        foreach ($arrVege as $key=>$value) {
                            echo '
                            <div class="col-sm-4 mb-3">
                                <img src="../'.$value['Image'].'" class="img-fluid mx-auto" style="width: 100%;height: 250px;">
                                <p class="d-inline-block py-2 mr-2">'.$value['VegetableName'].'</p>
                                <p class="bg-warning d-inline-block px-1 rounded">'.$value['Price'].'</p>
                                <button type="button" class="btn btn-danger d-block">
                                    <a href="../cart/index.php?id='.$value['VegetableID'].'" class="text-white">Buy</a>
                                </button>
                            </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>