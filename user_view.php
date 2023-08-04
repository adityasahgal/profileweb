<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->getUserById($_GET['id']);
$row = mysqli_fetch_row($res);
?>


<!DOCTYPE html>
<html>

<head>
    <title>User View</title>
    <?php include('../admin/layouts/head-link.php'); ?>


</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>
    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>View User </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">User View</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-12 ">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit User</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td><?= $row[4] ?></td>
                            </tr>

                        </tbody>

                    </table>
                    <a href="user.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </main>
    <?php include('layouts/footer.php'); ?>
</body>

</html>