<?php
use App\Utility\Utility;
require_once("../../../../vendor/autoload.php");

$obj = new \App\Appointment\Appointment();
$obj->setData($_GET);
$singleData = $obj->view();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment</title>
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <style>
        body{
            background-color: darkseagreen;
        }
    </style>

</head>
<body>

<h1 style="color: #442a8d;" align="center">Single data of-Appointment</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Doctors Name</th>
        <th>Patient Phone</th>
        <th>Time</th>

    </tr>
<?php
    echo "
       <tr>
            <td>$singleData->id</td>
            <td>$singleData->patient_name</td>
            <td>$singleData->doctors_name</td>
            <td>$singleData->patient_phone</td>
            <td>$singleData->time</td>
            
       </tr>

     ";
?>
    </table>
</body>
</html>