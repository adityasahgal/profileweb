<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$cate_data = $obj->Category();
$man = $obj->subcategory();
$res = $obj->getProductsById($_GET['id']);
$row = mysqli_fetch_row($res);
if (isset($_POST['submit'])) {
    if (isset($_FILES['file']['name'])) {
        $img = $_FILES['file']['name'];
        $img_tmp = $_FILES['file']['tmp_name'];
        $folder = "uploads/products/" . $img;
        if (move_uploaded_file($img_tmp, $folder)) {
            if (file_exists("uploads/products/" . $row[3])) {
                unlink("uploads/products/" . $row[3]);
            }
        }
    } else {
        $img = "";
    }
    $result = $obj->editproductsById($_POST['id'], $_POST['cate_code'], $_POST['subcate_code'], $img, $_POST['name'], $_POST['description'], $_POST['mrp_price'], $_POST['sell_price']);
    if ($result) {
        header('Location: products.php');
    } else {
        header('Location: products_add.php');
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Products</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Product Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Product</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row[0] ?>">
                        <div class="form-group">
                            <label for="name">Cate_Name</label>
                            <select name="cate_name" onchange="getSubcate(this.value);" class="form-control" required>
                                <option hidden>Select Cate_code</option>
                                <?php while ($cate = mysqli_fetch_array($cate_data)) { ?>
                                    <option value="<?= $cate['code'] ?>" <?php if ($cate['code'] == $row[1]) {
                                        echo "selected";
                                    } ?>><?= $cate['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Photo <img src="uploads/products/<?= $row[3] ?>" width="60" height="45"></label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $row[4] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea type="text" class="form-control" name="description"><?= $row[5] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">MRP_Price</label>
                            <input type="text" name="mrp_price" class="form-control" value="<?= $row[6] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Sell_Price</label>
                            <input type="text" name="sell_price" class="form-control" value="<?= $row[7] ?>" required>
                        </div><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('../admin/layouts/footer.php'); ?>
    </main>

    <script type="text/javascript">
        function getSubcate(code) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("subcate_code").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "get_subcate.php?cateCode=" + code, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>