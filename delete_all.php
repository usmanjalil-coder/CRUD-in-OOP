<?php
include 'database.php';

class Dell_all extends Database
{

    public function delete_all()
    {

        $sql = "Delete  from `crud`";
        $result = $this->conn->query($sql) || die("error" . $this->conn->connect_error);
        if ($result) {
            session_start();
            $_SESSION['delete-alert'] = "<script>showToast('All records are deleted successfully!', 'error');</script>";
            header('location: index.php');
        }

    }
}
$obj = new Dell_all();
$obj->delete_all();
