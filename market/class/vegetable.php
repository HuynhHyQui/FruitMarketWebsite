<?php
class vegetable extends connection {
    public function getALL() {
        $sql="SELECT * FROM vegetable";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        while ($row=mysqli_fetch_array($result)) {
            array_push($arr,$row);
        }
        return json_encode($arr);
    }

    public function getListByCateID($cateid) {
        $sql="SELECT * FROM vegetable WHERE CategoryID='$cateid'";
        $result=mysqli_query($this->conn,$sql);
        $row=mysqli_fetch_array($result);
        return json_encode($row);
    }

    public function getListByCateIDs($cateids) {
        $sql="SELECT * FROM vegetable WHERE ";
        $n=count($cateids);
        foreach ($cateids as $key=>$value) {
            $str="CategoryID=".$value;
            $sql=$sql.$str;
            if ($key != $n-1) {
                $sql=$sql." OR ";
            }
        }
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        while ($row=mysqli_fetch_array($result)) {
            array_push($arr,$row);
        }
        return json_encode($arr);
    }

    public function getByID($vegetableID) {
        $sql="SELECT * FROM vegetable WHERE VegetableID='$vegetableID'";
        $result=mysqli_query($this->conn,$sql);
        $row=mysqli_fetch_array($result);
        return json_encode($row);
    }

    public function addVegetable($vege) {
        $sql1 = "ALTER TABLE vegetable AUTO_INCREMENT = 1 ;"; // Tránh trùng khóa chính.
        mysqli_query($this->conn,$sql1);

        $sql2="INSERT INTO vegetable(CategoryID,VegetableName,Unit,Amount,Image,Price) VALUES('".$vege['CategoryID']."','"
            .$vege['VegetableName']."','".$vege['Unit']."','".$vege['Amount']."','".$vege['Image']."','".$vege['Price']."')";
        mysqli_query($this->conn,$sql2);
    }
}
?>