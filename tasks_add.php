<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
if (isset($_POST['submit'])) {
    $result = $obj->addtasks($_POST['tittle'], $_POST['task'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
    if ($result) {
        header('Location: tasks.php');
    } else {
        header('Location: tasks_add.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Tasks</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">
    <div class="pagetitle">
            <h1>Add Task Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Tasks</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Task</h5>
                    <form action="" method="POST">
                        
                        <div class="form-group">
                            <label for="name">task</label>
                            <input type="text" name="task" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div><br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </main>
    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>