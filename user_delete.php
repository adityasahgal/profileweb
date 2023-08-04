<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $res = $obj->deleteUser($_GET['id']);
    if($result){
        header('Location: user.php');
    }else{
        echo "<script>alert('User Not Delete')</script>";
        header('Location: user.php');
    }
?>
