<?php
//start session
session_start();

include_once('function.php');

$user = new User();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];


    $auth = $user->check_login($username, $password);

    if(!$auth){
        $_SESSION['message'] = 'Invalid username or password';
        header('location:../login.php');
    }
    else{
        $_SESSION['user'] = $auth;
        header('location:../index.php');
    }
}
else{
//    $_SESSION['message'] = 'You need to login first';
    header('location:../login.php');
}
?>