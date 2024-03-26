
<?php
class Database
{

    public $conn = "";
    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'oop_crud');
        if ($this->conn->connect_error) {
            die("The connection is unsuccessfull" . $this->conn->connect_error);
        }

    }


    public function __destruct()
    {
        $this->conn->close();
    }
}
