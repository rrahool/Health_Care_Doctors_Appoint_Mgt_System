<?php
session_start();
require_once('../../../../vendor/autoload.php');

use App\Utility\Utility;
$obj= new App\Doctor\Doctor();

if(isset($_FILES['image']) && !empty($_FILES['image']['name']) && $_FILES['image']['error']==0) {
    $fileName = time().$_FILES['image']['name'];

    $source = $_FILES['image']['tmp_name'];
    $destination = "doctorsImages/".$fileName;
    move_uploaded_file($source,$destination);
    $_POST['profile_pic']=$fileName;

    $obj->setData($_POST);
    $storeDoctor=$obj->storeDoctor();
    if($storeDoctor==1){
        $_SESSION['message'] ="Success!! Data has been store successfully";
        Utility::redirect('doctors.php');
    }
    else{
        $_SESSION['message'] = "Failed!! Data has not been store successfully";
        Utility::redirect('doctors.php');
    }
}

