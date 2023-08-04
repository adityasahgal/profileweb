<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->getUser();
?>



<!DOCTYPE html>
<html>

<head>
    <title>Manage Users Page</title>
    <?php include('../admin/layouts/head-link.php'); ?>


</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>
    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage User Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage User page</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>

                                        <tr>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['password'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="user_edit.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-info" href="user_view.php?id=<?= $row['id'] ?>">view</a>
                                                <a class="btn btn-danger" href="user_delete.php?id=<?= $row['id'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>