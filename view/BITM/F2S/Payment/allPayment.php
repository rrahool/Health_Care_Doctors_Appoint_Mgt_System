<?php

use App\Message\Message;
use App\Payment\Payment;

require_once ("../../../../vendor/autoload.php");


$obj = new Payment() ;
$allData  =  $obj->index();
$msg = Message::message();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill List</title>
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

<h1 align="center"> Active Payment List </h1>


<table class="table table-bordered table-striped">

    <tr>
        <th style="text-align: center">Serial</th>
        <th style="text-align: center">Payment ID</th>
        <th style="text-align: center">Bill ID</th>
        <th style="text-align: center">Paid Amount</th>
        <th style="text-align: center">Due Amount</th>
        <th style="text-align: center" align='center'>Action Buttons</th>
    </tr>

    <?php
    $serial = 1;

    foreach($allData as $row )
    {
        $msg= "Are you sure?" ;
        echo "

              <tr>

                  <td align='center'>$serial</td>
                  <td align='center'>$row->pay_id</td>
                  <td align='center'>$row->bill_id</td>
                  <td align='center'>$row->paid_amount</td>
                  <td align='center'>$row->due_amount</td>

                  <td align='center'>
                                       <a href='create.php?pay_id=$row->pay_id'> <button class='btn btn-success'> Create </button></a>

                     <a href='view.php?pay_id=$row->pay_id'> <button class='btn btn-primary'> View </button></a>
                     <a href='edit.php?pay_id=$row->pay_id'> <button class='btn btn-info'> Edit </button></a>
                     <a href='trash.php?pay_id=$row->pay_id'> <button class='btn btn-warning'> Trash </button></a>
                     <a href='delete.php?pay_id=$row->pay_id'  onclick='return confirm_delete()'  > <button  class='btn btn-danger'> Delete </button></a>


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
