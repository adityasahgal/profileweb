<?php
include('src/config.php');
include('src/AdminController.php');
$obj = new AdminController();
// echo $_POST['id'];
$res = $obj->getsubcategoryByCateId($_POST['id']);
while($row = mysqli_fetch_array($res)){
    echo "<option value='".$row['id']."'>".$row['name']."</option>";
}
?>
