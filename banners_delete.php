<?php
   include('src/config.php');
   include('src/AdminController.php');
    $obj = new AdminController();
    $result = $obj->getBannersById($_GET['id']);
	$row = mysqli_fetch_row($result);
    $res = $obj->deleteBanners($_GET['id']);
    if($res){
        if (file_exists("uploads/banners/".$row[2])) {
            unlink("uploads/banners/".$row[2]);
          }
        header('Location: banners.php');
    }else{
        echo "<script>alert('banner Not Delete')</script>";
        header('Location: banners.php');
    }
?>