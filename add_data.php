
<?php
include 'database.php';
$obj = new Database();

class Add extends Database
{

    public function add_student()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $fname = $_POST['fname'];
            $age = $_POST['age'];

            $sql = "INSERT INTO `crud` (`name`, `f_name`, `age`) VALUES ('$name', '$fname', '$age')";
            $result = $this->conn->query($sql);
            if ($result) {
                // echo "record has been inserted successfully";
                // echo "<script>showToast('Your record has been inserted successfully!', 'success');</script>";
                session_start();
                $_SESSION['add-alert'] = "<script>showToast('Your record has been inserted successfully!', 'success');</script>";
                header('location: index.php');
            }
        }
    }
    public function fetch_data()
    {
        $sql = "select * from `crud`";
        $result = $this->conn->query($sql);
        $sno = 0;
        while ($fetch = $result->fetch_assoc()) {
            $sno++;
            echo "
            <tr>
                <th scope='row'>{$sno}</th>
                <td>{$fetch['name']}</td>
                <td>{$fetch['f_name']}</td>
                <td>{$fetch['age']}</td>
                <td>
                <a href='edit.php?id={$fetch['id']}' class='btn btn-primary btn-sm'>Edit</a>
                <a href='delete.php?id={$fetch['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
        }
    }
}
$add_obj = new Add();
$add_obj->add_student();
?>