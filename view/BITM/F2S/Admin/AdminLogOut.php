<?php
session_start();
require_once ('../../../../vendor/autoload.php');
use App\Utility\Utility;


$_SESSION['message']="You have been successfully logged out";
$_SESSION['username']=null;

Utility::redirect('adminLogIn.php');