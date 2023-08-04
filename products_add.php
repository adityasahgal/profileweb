<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
$res = $obj->Category();
$man = $obj->subcategory();
if (isset($_POST['submit'])) {
    if (isset($_FILES['file']['name'])) {
        $img = $_FILES['file']['name'];
        $img_tmp = $_FILES['file']['tmp_name'];
        $folder = "uploads/products/" . $img;
        move_uploaded_file($img_tmp, $folder);
    } else {
        $img = "";
    }
    $result = $obj->addproducts($_POST['cate_id'], $_POST['subcate_id'], $img, $_POST['name'], $_POST['description'], $_POST['mrp_price'], $_POST['sell_price']);
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

    <title>Add Products page</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Product Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Product</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select name="cate_id" onchange="getSubcate(this.value);" class="form-control" required>
                                <option hidden>Select Category</option>
                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Subcategory</label>
                            <select name="subcate_id" id="subcateTab" class="form-control" required>
                                <option value="" hidden>Select Subcategory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Photo</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" name="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">MRP_Price</label>
                            <input type="text" name="mrp_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Sell_Price</label>
                            <input type="text" name="sell_price" class="form-control" required>
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
    <script type="text/javascript">
        function getSubcate(id) {
            $.ajax({
                url: "subcate.php",
                type: "POST",
                data: { id: id },
                cache: false,
                success: function(data) {
                    // console.log(data);
                    $("#subcateTab").empty();
                    $("#subcateTab").append('<option value="" hidden>Select Subcategory</option>');
                    $("#subcateTab").append(data);
                }
            });
        }
    </script>
</body>

</html>