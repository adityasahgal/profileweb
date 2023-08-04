<?php

include('src/config.php');
include('src/controller.php');
$obj = new Controller();
if (isset($_POST['register'])) {
    $res = $obj->userRegister($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['password']);
    if ($res) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('User Successfully Register');
    window.location.href='./index.php';
    </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Something wrong!');
        window.location.href='';
        </script>");
    }
}

if (isset($_POST['login'])) {
    $res = $obj->userLogin($_POST['email'],$_POST['password']);
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $userdata = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email']
        ];

        
        // passed email multiple pages
        $_SESSION['authId']=$userdata;
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('User Successfully Login');
        window.location.href='./admin/index.php';
        </script>");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Something wrong!');
            window.location.href='./index.php';
            </script>");
        }

}
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="height: 10vh; margin-bottom: 10vh;">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)"><img src="assets/img/logo2.png" alt="" height="30px"><strong>G</strong>W<strong>P</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Fearture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Partition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#signinModal">Sign up</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>