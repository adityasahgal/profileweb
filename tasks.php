<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->tasks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - </title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Task Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Tasks</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Task page</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Task</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?= $row['task'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td ><?= $row['email'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="tasks_edit.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-info" href="tasks_view.php?id=<?= $row['id'] ?>">view</a>
                                                <a class="btn btn-danger" href="tasks_delete.php?id=<?= $row['id'] ?>">Delete</a>
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

    </main><!-- End #main -->
    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>

<!DOCTYPE html>
<html>