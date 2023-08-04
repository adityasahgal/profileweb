<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
if (isset($_POST['addcontact'])) {
    $result = $obj->contactAdd($_POST['phone_no'], $_POST['name'], $_POST['email'], $_POST['company'], $_POST['address']);
    if ($result) {
        header('Location: contact.php');
    } else {
        header('Location: contactAdd.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Contact Page</title>
    <meta name="robots" content="noindex, nofollow">
    <?php include('../admin/layouts/head-link.php'); ?>
</head>

<body>
    <?php include('../admin/layouts/header.php'); ?>

    <?php include('../admin/layouts/sidenavbar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Contact Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <div class="col-lg-6 offset-lg-3">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Contact</h5>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="phone_no">Phone no.</label>
                            <input type="number" name="phone_no" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" class="form-control" required>
                        </div><br>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div><br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="addcontact">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>


    <?php include('../admin/layouts/footer.php'); ?>
</body>

</html>