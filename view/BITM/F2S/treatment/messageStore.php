<?php
session_start();
include_once ('../../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\OnlineTreatment\OnlineTreatment;
use App\Utility\Utility;

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    header('location:../index.php');
}
//Utility::dd($_POST);
$user= new User();
$user->setData($_POST);
$userInfo=$user->userInfo();

$_POST['user_id']=$userInfo['id'];


//Utility::dd($userId);
$sms= new OnlineTreatment();
$sms->setData($_POST);

$storeSms= $sms->smsStore();

if($storeSms){
    $_SESSION['message']="Successfully Sent Your Sms, Please Check your Inbox or mail.";
    header('location:../index.php');
}
else{
    $_SESSION['message']="Message Sent Failed!!";
    header('location:../index.php');
}


