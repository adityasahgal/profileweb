<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $res = $obj->deletesubcategory($_GET['id']);
    if($result){
        header('Location: subcategory.php');
    }else{
        echo "<script>alert('subcategory Not Delete')</script>";
        header('Location: subcategory.php');
    }
?>
