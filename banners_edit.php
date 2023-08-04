<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->getBannersById($_GET['id']);
$row = mysqli_fetch_row($res);
if (isset($_POST['submit'])) {
    if (isset($_FILES['file']['name'])) {
        $Banner = $_FILES['file']['name'];
        $Banner_tmp = $_FILES['file']['tmp_name'];
        $folder = "uploads/banners/" . $Banner;
        if (move_uploaded_file($Banner_tmp, $folder)) {
            if (file_exists("uploads/banners/" . $row[2])) {
                unlink("uploads/banners/" . $row[2]);
            }
        }
    } else {
        $Banner = "";
    }
    $result = $obj->editBannersById($_POST['id'], $_POST['tittle'], $Banner, $_POST['description'], $_POST['img_alt']);
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
    <title>Edit Banners Page</title>
    <?php include('../admin/layouts/head-link.php'); ?>


</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>
    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Banner Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Banner</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Banner</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row[0] ?>">
                        <div class="form-group">
                            <label for="name">Tittle</label>
                            <input type="text" name="tittle" class="form-control" value="<?= $row[1] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Banner <img src="uploads/banners/<?= $row[2] ?>" width="60" height="45"></label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea type="text" class="form-control" name="description"><?= $row[3] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Img_alt</label>
                            <input type="text" name="img_alt" class="form-control" value="<?= $row[4] ?>" required>
                        </div><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>