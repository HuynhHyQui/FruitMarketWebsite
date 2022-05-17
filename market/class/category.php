<?php
class category extends connection {
    public function getAll() {
        $sql="SELECT * FROM category";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        while ($row=mysqli_fetch_array($result)) {
            array_push($arr,$row);
        }
        return json_encode($arr);
    }

    public function add($cate) {
        $sql1 = "ALTER TABLE category AUTO_INCREMENT = 1 ;"; // Tránh trùng khóa chính.
        mysqli_query($this->conn,$sql1);

        $sql2="INSERT INTO category(Name,Description) VALUES('".$cate['Name']."','".$cate['Description']."')";
        mysqli_query($this->conn,$sql2);
    }
}
?>