<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>CATEGORY</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="add.php" method="post">
                    <div class="form-group mt-4">
                    <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="des">Description:</label>
                        <input type="text" class="form-control" name="des" id="des">
                    </div>
                    <input type="submit" class="btn btn-info bg-info" value="Add">
                </form>
            </div>
            <div class="col-9">
                <h1>Category</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            require("../connection.php");
                            require("../class/category.php");
                            $category=new category();
                            $arr=json_decode($category->getAll(),true);
                            $t=1;
                            foreach($arr as $key=>$value) {
                                echo '
                                <tr>
                                    <td>'.$t.'</td>
                                    <td>'.$value['Name'].'</td>
                                    <td>'.$value['Description'].'</td>
                                </tr>
                                ';
                                $t++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
</body>
</html>