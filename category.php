<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->category();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Products Category Page</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>
    
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manage Category Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Category page</h5>


                           
                            <table class="table table-bordered">
                                <thead>
                                    <tr>  
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?= $row['name'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="category_edit.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="category_delete.php?id=<?= $row['id'] ?>s">Delete</a>
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