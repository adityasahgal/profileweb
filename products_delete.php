<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $result = $obj->getProductsById($_GET['id']);
	$row = mysqli_fetch_row($result);
    $res = $obj->deleteproducts($_GET['id']);
    if($res){
        if (file_exists("uploads/products/".$row[3])) {
            unlink("uploads/products/".$row[3]);
          }
        header('Location: products.php');
    }else{
        echo "<script>alert('product Not Delete')</script>";
        header('Location: products.php');
    }
?>