<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->products();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manage Products page</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>
    
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Products Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Products page</h5>

                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>MRP_Price</th>
                                        <th>Sell_Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                                        <tr>
                                            <td><?= $obj->getCategoryNameById($row['cate_id']) ?></td>
                                            <td><?= $obj->getSubcategoryNameById($row['subcate_id']) ?></td>
                                            <td><?php if (!empty($row['img_file'])) { ?> <img src="uploads/products/<?= $row['img_file'] ?>" width="60" height="45"> <?php } else { ?><img src="assets/images/error-img.png" width="60" height="45"><?php } ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <td><?= $row['mrp_price'] ?></td>
                                            <td><?= $row['sell_price'] ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="products_edit.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="products_delete.php?id=<?= $row['id'] ?>s">Delete</a>
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
    </main>
</body>

</html>