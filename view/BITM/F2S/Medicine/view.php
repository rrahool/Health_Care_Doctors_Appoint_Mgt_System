<?php

require_once("../../../../vendor/autoload.php");

$obj = new \App\Medicine\Medicine();
$obj->setData($_GET);
$singleData = $obj->view();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicine</title>
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <style>
        body{
            background-color: darkseagreen;
        }
    </style>

</head>
<body>

<h1 style="color: #442a8d;" align="center">Single data of-Medicine</h1>
<a href="allMedicine.php"><button class="btn btn-primary">Back</button> </a>
<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Medicine Name</th>
        <th>Price</th>
        <th>Category</th>

    </tr>
<?php
    echo "
       <tr>
            <td>$singleData->id</td>
            <td>$singleData->medicine_name</td>
            <td>$singleData->price</td>
            <td>$singleData->category</td>
            
       </tr>

     ";
?>
    </table>
</body>
</html>