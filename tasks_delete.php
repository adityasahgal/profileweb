<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $res = $obj->deleteTasks($_GET['id']);
    if($result){
        header('Location: tasks.php');
    }else{
        echo "<script>alert('Task Not Delete')</script>";
        header('Location: tasks.php');
    }
?>
