<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $res = $obj->DeleteContact($_GET['id']);
    if($result){
        header('Location: contact.php');
    }else{
        echo "<script>alert('Contact Not Delete')</script>";
        header('Location: contact.php');
    }
?>
