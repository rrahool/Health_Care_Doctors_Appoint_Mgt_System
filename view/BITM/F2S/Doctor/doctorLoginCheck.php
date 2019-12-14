<?php
session_start();
require_once ('../../../../vendor/autoload.php');
use App\Utility\Utility;

$doctor = new App\Doctor\Doctor();

$doctor->setData($_POST);

$check=$doctor->doctorLogin();


//echo $check;die();

if($check){
    $_SESSION['email']=$_POST['email'];
    $_SESSION['id']= $check;
    $_SESSION['message']= "Successfully logged";
    Utility::redirect('index.php');
}
else{
    $_SESSION['message']= "Your emai is incorrect";
    Utility::redirect('doctorLogin.php');
}
