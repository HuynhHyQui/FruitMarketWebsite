<?php
class customer extends connection {
    public function getByID($cusid) {
        $sql="SELECT * FROM customers WHERE CustomerID='$cusid'";
        $result=mysqli_query($this->conn,$sql);
        $row=mysqli_fetch_array($result);
        return json_encode($row);
    }

    public function add($cus) {
        $sql1 = "ALTER TABLE customers AUTO_INCREMENT = 1 ;"; // reset lại biến đếm, tránh trùng khóa chính.
        mysqli_query($this->conn,$sql1);

        $sql2="INSERT INTO customers(Password,Fullname,Address,City) VALUES('".$cus['Password']."','".$cus['Fullname']."','"
                .$cus['Address']."','".$cus['City']."')";
        mysqli_query($this->conn,$sql2);
    }
}
?>