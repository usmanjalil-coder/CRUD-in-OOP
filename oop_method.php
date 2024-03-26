<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("connection unsuccessfull" . $conn->connect_error);
}
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "Id: {$row['id']} - Name: {$row['name']} - Marks: {$row['marks']}<br>";
    }
}
else{
    echo "Records not found";
}

$conn->close();

?>