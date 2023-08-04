<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->Contacts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manage Contact Page</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Contact Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage contact page</h5>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>Phone No</th>
                                        <th>Name</th>
                                        <th>Email-id</th>
                                        <th>Company</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?= $row['phone_no'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['company'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="contactEdit.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="contactDelete.php?id=<?= $row['id'] ?>">Delete</a>
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
        <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>