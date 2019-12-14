<?php

use App\Message\Message;
use App\Bill\Bill;

require_once ("../../../../vendor/autoload.php");


$obj = new bill() ;
$allData  =  $obj->trashed();
$msg = Message::message();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trashed List</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <style>


        div {

            background-image: url("../../../../resources/bootstrap/image/2.jpg");
            background-size: cover;
            padding: 0;
            margin: 0 auto;
        }
    </style>

</head>
<body>
<div class="container">

<?php echo "<div>  <div id='message'>  $msg </div>   </div>"; ?>

<h1 align="center"> Trashed List </h1>


<table class="table table-bordered table-striped">

    <tr align="center">
        <th style="text-align: center">Serial</th>
        <th style="text-align: center">Bill ID</th>
        <th style="text-align: center">Prescription ID</th>
        <th style="text-align: center">Total Amount</th>
        <th style="text-align: center">Service Charge</th>
        <th style="text-align: center">Vat</th>
        <th style="text-align: center">Gross Amount</th>
        <th style="text-align: center">Action Buttons</th>
    </tr>

    <?php
    $serial = 1;

    foreach($allData as $row )
    {
        $msg= "Are you sure?" ;
        echo "

              <tr>

                  <td align='center'>$serial</td>
                  <td align='center'>$row->bill_id</td>
                  <td align='center'>$row->pres_id</td>
                  <td align='center'>$row->total</td>
                  <td align='center'>$row->service_charge</td>
                  <td align='center'>$row->vat</td>
                  <td align='center'>$row->gross_amount</td>
                  <td align='center'>
                     <a href='view.php?bill_id=$row->bill_id'> <button class='btn btn-primary'> View </button></a>
                     <a href='edit.php?bill_id=$row->bill_id'> <button class='btn btn-info'> Edit </button></a>
                     <a href='recover.php?bill_id=$row->bill_id'> <button class='btn btn-success'> Recover </button></a>
                     <a href='delete.php?bill_id=$row->bill_id'  onclick='return confirm_delete()'  > <button  class='btn btn-danger'> Delete </button></a>


                  </td>
              </tr>


            ";


        $serial++;

    }//end of foreach loop

    ?>

</table>





<script src="../../../../resources/bootstrap/js/jquery.js"></script>

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


<script type="text/javascript">

    function confirm_delete()
    {
        return confirm('are you sure?');
    }

</script>

</div>
</body>
</html>
