<?php
include 'database.php';
class Totel extends Database
{

    public function totel()
    {
        $sql = "SELECT * from `crud`";
        $result = $this->conn->query($sql);
        $row = mysqli_num_rows($result);
        // if($result){
            session_start();
            $_SESSION['total'] = "<script>showToast('Totel records: {$row}', 'error');</script>";
            header('location: index.php');
        // }
    }
}
$obj = new Totel();
$obj->totel();
