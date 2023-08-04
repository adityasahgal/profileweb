<?php 
include('src/config.php');
$id = $_SESSION['authId']['id'];
$currrent_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$cnf_new_pass = $_POST['new_pass'];

$query = "SELECT * FROM `users` WHERE `id`='$id' and `password` ='$currrent_pass'";
$result = mysqli_query($conn, $sql);

if($result){
    if($new_pass == $cnf_new_pass ){
        $query = "UPDATE `users` SET `password` = '$new_pass' WHERE `id` = '10'";
        $result = mysqli_query( $conn, $sql);
        
    }else{
    
    }
}else{

}

?>

