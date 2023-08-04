<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
if (isset($_POST['submit'])) {
    if (isset($_FILES['file']['name'])) {
        $img = $_FILES['file']['name'];
        $img_tmp = $_FILES['file']['tmp_name'];
        $folder = "uploads/banners/" . $img;
        move_uploaded_file($img_tmp, $folder);
    } else {
        $img = "";
    }
    $result = $obj->Bannersadd($_POST['tittle'], $img, $_POST['description'], $_POST['img_alt']);
    if ($result) {
        header('Location: banners.php');
    } else {
        header('Location: banners_add.php');
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Banners Page</title>;
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>
    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Banners Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Banners</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Banner</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tittle</label>
                            <input type="text" name="tittle" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Img_alt</label>
                            <input type="text" name="img_alt" class="form-control" required>
                        </div><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include('layouts/footer.php'); ?>
</body>

</html>