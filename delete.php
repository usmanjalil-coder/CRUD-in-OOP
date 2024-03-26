<?php

$id = $_GET['id'];
include 'database.php';
$obj = new Database();
class Delete_class extends Database
{

    public function  delete_data($id)
    {
        $sql = "DELETE FROM `crud` where `id`= {$id}";
        $result = $this->conn->query($sql);
        if($result){
            session_start();
            $_SESSION['delete-alert'] = "<script>showToast('Your record has been deleted successfully!', 'error');</script>";
            header('location: index.php');
        }
    }
}

$delete_obj = new Delete_class();
$delete_obj->delete_data($id);


?>