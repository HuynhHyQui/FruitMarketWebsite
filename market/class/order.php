<?php
class order extends connection {
    public function getAllOrder($cusID) {
        $sql="SELECT * FROM orders WHERE CustomerID='$cusID'";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        while($row=mysqli_fetch_array($result)) {
            array_push($arr,$row);
        }
        return json_encode($arr);
    }

    public function getOrderDetail($orderid) {
        $sql="SELECT * FROM orderdetail WHERE OrderID='$orderid'";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        while($row=mysqli_fetch_array($result)) {
            array_push($arr,$row);
        }
        return json_encode($arr);
    }

    public function addOrder($order,$detail) {
        $sql1 = "SELECT MAX(OrderID) AS 'OrderIDNew' FROM orders"; 
        $result = mysqli_query($this->conn, $sql1);
        $CusID = mysqli_fetch_array($result);
        // Tìm mã OrderID lớn nhất hiện tại, do dùng Auto_increment

        $sql2 = "ALTER TABLE orders AUTO_INCREMENT = 1 ;"; 
        mysqli_query($this->conn,$sql2);
        // Tránh bị nhảy số.

        $sql3 = "INSERT INTO orders(CustomerID,Date,Total,Note) VALUES('".$order['CustomerID']."','".$order['Date']."','"
                .$order['Total']."','".$order['Note']."')";
        mysqli_query($this->conn,$sql3);
        foreach ($detail as $key=>$value) {
            $sql="INSERT INTO orderdetail(OrderID,VegetableID,Quantity,Price) VALUES('".($CusID['OrderIDNew']+1)."','"
                .$value['VegetableID']."','".$value['Quantity']."','".$value['Price']."')";
            mysqli_query($this->conn,$sql);
        }
    }
}


?>