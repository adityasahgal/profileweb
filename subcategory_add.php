<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->Category();
if (isset($_POST['submit'])) {
    $result = $obj->addsubcategory($_POST['cate_id'], $_POST['name']);
    if ($result) {
        header('Location: subcategory.php');
    } else {
        header('Location: subcategory_add.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Subcategory</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add Subcategory Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Add Subcategory</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Subcategory page</h5>


                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="cate_id" class="form-control" required>
                                        <option hidden>Select Category</option>
                                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div><br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>