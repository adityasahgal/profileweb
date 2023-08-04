<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->subcategory();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manage Subcategory</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>
    

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Subcategory Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Subcategory</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Subcategory page</h5>
                            <div class="container-fluid mg-top">
                                <div class="row">

                                    <div class="col-md-10" text-center>
                                
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                                    <tr>
                                                        <td><?= $obj->getCategoryName($row['cate_id']) ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="subcategory_edit.php?id=<?= $row['id'] ?>">Edit</a>
                                                            <a class="btn btn-danger" href="subcategory_delete.php?id=<?= $row['id'] ?>s">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
    </main>
    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>