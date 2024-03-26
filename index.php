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

    <?php
    session_start();
    if (isset($_SESSION['add-alert'])) {
        echo $_SESSION['add-alert'];
        session_unset();
        session_destroy();
    }
    if (isset($_SESSION['delete-alert'])) {
        echo $_SESSION['delete-alert'];
        session_unset();
        session_destroy();
    }
    if (isset($_SESSION['update-alert'])) {
        echo $_SESSION['update-alert'];
        session_unset();
        session_destroy();
    }
    if (isset($_SESSION['total'])) {
        echo $_SESSION['total'];
        session_unset();
        session_destroy();
    }
    ?>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-body-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Crud - OOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                       
                </ul>
                <form class="d-flex" role="search">
                    <a href="delete_all.php" class="btn btn-sm btn-danger">Delete All</a>
                    <a href="totell_records.php" class="btn btn-sm btn-primary mx-4">Total Records</a>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="col-md-8">
                <h1>CRUD - OOP</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="add_data.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Whats your name?">
                        <label for="floatingInput">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="fname" class="form-control" id="floatingPassword" placeholder="Father name">
                        <label for="floatingPassword">Father Name</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="number" name="age" class="form-control" id="age" placeholder="Password">
                        <label for="age">Age</label>
                    </div>

                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>


        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include 'add_data.php';
                        $add_obj->fetch_data();
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>