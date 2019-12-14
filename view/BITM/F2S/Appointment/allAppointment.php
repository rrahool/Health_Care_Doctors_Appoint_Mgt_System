<?php
require_once("../../../../vendor/autoload.php");

$obj = new \App\Appointment\Appointment();
$allData = $obj->index();

use App\Message\Message;
$msg = Message::message();

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
            background-color:lightblue;
        }
    </style>

</head>
<body>

<?php echo "<div>  <div align='center' class=' alert-info ' id='message'>  $msg </div>   </div>";   ?>
<h1 style="color: #442a8d;" align="center">Active List of Appointment</h1>
<div>
    <a href="create.php" class="btn btn-lg btn-warning">Create</a>

</div>
<table class="table table-bordered table-striped">
    <tr>
        <th style="text-align: center">Check All <input type='checkbox' id='select_all' name='select_all' value='$record->id'></th>

        <th style="text-align: center">Serial</th>
        <th style="text-align: center">ID</th>
        <th style="text-align: center">Patient Name</th>
        <th style="text-align: center">Doctors Name</th>
        <th style="text-align: center">Patient Phone</th>
        <th style="text-align: center">Time</th>
        <th style="text-align: center">Actions</th>

    </tr>
<?php
$serial = 1;
foreach($allData as $record) {
    echo "
       <tr>
            <td style='text-align: center'><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'> </td>
            <td style='text-align: center'>$serial</td>
            <td style='text-align: center'>$record->id</td>
            <td style='text-align: center'>$record->patient_name</td>
            <td style='text-align: center'>$record->doctors_name</td>
            <td style='text-align: center'>$record->patient_phone</td>
            <td style='text-align: center'>$record->time</td>
            <td style='text-align: center'>

                 <a href='view.php?id=$record->id' <button class='btn btn-primary'> View </a>
                 <a href='edit.php?id=$record->id' <button class='btn btn-info'> Edit </a>
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