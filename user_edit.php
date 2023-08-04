<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->getUserById($_GET['id']);
$row = mysqli_fetch_row($res);
if (isset($_POST['userUpdate'])) {
    $result = $obj->updateUser($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['password']);
    if ($result) {
        header('Location: user.php');
    } else {
        header('Location: user_edit.php');
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit Users Page</title>
    <?php include('../admin/layouts/head-link.php'); ?>


</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>
    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit User Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit User</h5>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $row[0] ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $row[1] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $row[2] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No</label>
                            <input type="number" name="phone" class="form-control" value="<?= $row[3] ?>">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" class="form-control" value="<?= $row[4] ?>" required>
                        </div><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="userUpdate">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>