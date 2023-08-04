<?php
include('../admin/src/config.php');
include('../admin/src/AdminController.php');
$obj = new AdminController();
$res = $obj->banners();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Manage Banners Page</title>
    <?php include('../admin/layouts/head-link.php'); ?>


</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>
    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Banner Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Banners</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Banner page</h5>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tittle</th>
                                        <th>Banner</th>
                                        <th>Description</th>
                                        <th>Img_alt</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?= $row['tittle'] ?></td>
                                            <td><?php if (!empty($row['banner'])) { ?> <img src="../uploads/banners/" width="60" height="45"> <?php } else { ?><img src="/admin/assets/img/errori-mg.png" width="60" height="45"><?php } ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <td><?= $row['img_alt'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="banners_edit.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="banners_delete.php?id=<?= $row['id'] ?>">Delete</a>
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