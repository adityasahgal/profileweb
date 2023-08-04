<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $res = $obj->deletecategory($_GET['id']);
    if($result){
        header('Location: category.php');
    }else{
        echo "<script>alert('category Not Delete')</script>";
        header('Location: category.php');
    }
?>
