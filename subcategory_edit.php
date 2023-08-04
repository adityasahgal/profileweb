<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$cate_data = $obj->Category();
$res = $obj->getsubcategoryById($_GET['id']);
$row = mysqli_fetch_assoc($res);
if (isset($_POST['submit'])) {
    $result = $obj->editSubcategoryById($_POST['id'], $_POST['cate_id'], $_POST['name']);
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

    <title>Edit Subcategories</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Subcategory Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Subcategory</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Subcategory page</h5>

                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="cate_id" class="form-control" required>
                                        <option hidden>Select Category</option>
                                        <?php while ($cate = mysqli_fetch_array($cate_data)) { ?>
                                            <option value="<?= $cate['id'] ?>" <?php if ($cate['id'] == $row['cate_id']) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $cate['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                              
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
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