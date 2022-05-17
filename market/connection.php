<?php
class connection {
    private $dbHostname = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "market";
    protected $conn = null;

    public function __construct() {
        $this->conn = mysqli_connect($this->dbHostname,$this->dbUsername,$this->dbPassword,$this->dbName);
        if (!$this->conn) {
            die("Kết nối thất bại" . mysqli_connect_error());
        }
        mysqli_query($this->conn,"SET NAMES 'utf8'");
    }
}
?>