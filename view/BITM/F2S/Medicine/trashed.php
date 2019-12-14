<?php
require_once("../../../../vendor/autoload.php");

$obj = new \App\Medicine\Medicine();
$allData = $obj->trashed();

use App\Message\Message;
$msg = Message::message();

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
            background-color:#b2dba1;
        }
    </style>

</head>
<body>

<?php echo "<div>  <div align='center' class=' alert-info ' id='message'>  $msg </div>   </div>";   ?>
<h1 style="color: #442a8d;" align="center">Trashed List of Medicine</h1>
<table class="table table-bordered table-striped">
    <tr>
        <th style="text-align: center">Check All <input type='checkbox' id='select_all' name='select_all' value='$record->id'></th>

        <th>Serial</th>
        <th>ID</th>
        <th>Medicine Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>

    </tr>
    <?php
    $serial = 1;
    foreach($allData as $record) {
        echo "
       <tr>
            <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'> </td>
            <td>$serial</td>
            <td>$record->id</td>
            <td>$record->medicine_name</td>
            <td>$record->price</td>
            <td>$record->category</td>
            <td>

                 <a href='view.php?id=$record->id' <button class='btn btn-primary'> View </a>
                 <a href='edit.php?id=$record->id' <button class='btn btn-info'> Edit </a>
                 <a href='recover.php?id=$record->id' <button class='btn btn-success'> Recover </a>
                 <a href='delete.php?id=$record->id' <button onclick='return confirm_delete()' class='btn btn-danger'> Delete </a>
                 
            </td>

       </tr>

     ";

        $serial++;

    }//end of foreach loop
    ?>
</table>
<script>

    jQuery(

        function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>
<!--////////////////////////Delete Item///////////////////-->
<script>

    function confirm_delete(){

        return confirm("Are you sure you want to delete this item?");

    }

</script>

</body>
</html>