<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->theTasksById($_GET['id']);
$row = mysqli_fetch_row($res);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>View Tasks</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>


    <main id="main" class="main">
    <div class="pagetitle">
            <h1>View Task Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">View Tasks</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Task e</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tittle</th>
                                        <th>Task</th>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><?= $row[1] ?></td>
                                        <td><?= $row[2] ?></td>
                                        <td><?= $row[3] ?></td>
                                        <td><?= $row[4] ?></td>
                                        <td><?= $row[5] ?></td>
                                        <td><?= $row[6] ?></td>
                                    </tr>

                                </tbody>

                            </table>
                            <a href="tasks.php" class="btn btn-primary "> back..</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <?php include('../admin/layouts/footer.php'); ?>

</body>

</html>