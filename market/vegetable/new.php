<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>ADD VEGETABLE</title>
</head>
<body>
    <div class="container">
        <h1>Add Vegetable</h1>
        <form action="add.php" enctype="multipart/form-data" method="post">  
            <div class="row">   
                <div class="col-8">
                    <div class="form-group">
                    <label for="name">Vegetable Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="unit">Unit:</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="kg">kg</option>
                                <option value="bag">bag</option>
                                <option value="per_fruit">per_fruit</option>
                                <option value="bunch">buch</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="amount">Amount:</label>
                                <input type="text" class="form-control" name="amount" id="amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="file">Image:</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <div class="col-4">
                    <label for="category">Category Name:</label>
                    <select class="form-control" id="category" name="category">
                        <?php
                            require("../connection.php");
                            require("../class/category.php");
                            $category=new category();
                            $arr=json_decode($category->getAll(),true);
                            foreach ($arr as $key=>$value) {
                                echo '<option value="'.$value['CategoryID'].'">'.$value['Name'].'</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <div class="form-group">
                    <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" id="price">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="Add" name="add">
        </form>
    </div>
</body>
</html>