<?php
session_start();
require_once ('../../../../vendor/autoload.php');
use App\Utility\Utility;

$_SESSION['message']="You have been successfully logged out";
$_SESSION['email']=null;


Utility::redirect('../index.php');