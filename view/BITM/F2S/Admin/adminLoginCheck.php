<?php
session_start();
require_once ('../../../../vendor/autoload.php');
use App\Admin\Admin;
use App\Utility\Utility;

$admin = new Admin();

$admin->setData($_POST);

$check=$admin->adminLogin();


//echo $check;die();

if($check){
    $_SESSION['username']=$_POST['username'];
    $_SESSION['admin_id']= $check;
    $_SESSION['message']= "Successfully logged";
    Utility::redirect('index.php');
}
else{
    $_SESSION['message']= "Your username is incorrect";
    Utility::redirect('adminLogIn.php');
}
