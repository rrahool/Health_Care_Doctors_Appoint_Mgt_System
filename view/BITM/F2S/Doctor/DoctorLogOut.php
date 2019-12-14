<?php
session_start();
require_once ('../../../../vendor/autoload.php');


$_SESSION['message']="You have been successfully logged out";
$_SESSION['email']=null;
header('location:doctorLogIn.php');