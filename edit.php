<?php
include 'database.php';
$id = $_GET['id'];
// echo $id; //40 ok
class Edit_class extends Database
{

    public function edit($id)
    {

        $sql = "select * from `crud` where `id` = {$id}";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET['id'];
            echo $id;

            $name = $_POST['name'];
            $fname = $_POST['fname'];
            $age = $_POST['age'];

            $sql = "UPDATE `crud` SET `name` = '{$name}', `f_name` = '{$fname}', `age` = '{$age}' 
            where `id` =  {$id}";;
            $result = $this->conn->query($sql);
            if ($result) {
                session_start();
                $_SESSION['update-alert'] = "<script>showToast('Your record has been updated successfully!', 'success');</script>";
                header('location: index.php');
            }
        }
    }
}
$obj = new Edit_class();
$fetch = $obj->edit($id);
$obj->update($id);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - OOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <script src="toast.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-body-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="col-md-8">
                <h1>Edit your record e here:</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" value="<?= $fetch['name'] ?>" class="form-control" id="floatingInput" placeholder="Whats your name?">
                        <label for="floatingInput">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="fname" value="<?= $fetch['f_name'] ?>" class="form-control" id="floatingPassword" placeholder="Father name">
                        <label for="floatingPassword">Father Name</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="number" name="age" value="<?= $fetch['age'] ?>" class="form-control" id="age" placeholder="Password">
                        <label for="age">Age</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>