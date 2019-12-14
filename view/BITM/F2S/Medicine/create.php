<?php

require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div align='center' class=' alert-info ' id='message'>  $msg </div>   </div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicine Form</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <style>
        body{
            background-image: url("../../../../resources/img/m4.jpg");
        }
        * {
            margin: 0;
            padding: 0;
        }

        form {
            width: 600px;
            padding: 20px;
            /*border-radius: 0 0 15px 15px;*/
            margin: 0 auto;
            margin-top: 8%;
        }
        .content{
            margin-top: 15%;

        }

        #message {
            width: 700px;
            text-align: center;
            margin: 0 auto;
            display: none;

        }

        .formInfo {
            margin: 0 auto;
            border: 1px solid #2a9fb4;
            background-color: #E2DEA1;
            width: 500px;
            box-shadow: 0 0 2px;
            border-radius: 12px 12px 15px 15px;
        }


        main {
            margin-top: 50px;
        }

    </style>
</head>
<body>



<div class="container content">
    <div class="main">
        <?php echo "<div id='message'> $msg</div>" ?>
        <div class="formInfo">


            <h2 align="center" >Medicine Information Entry</h2>
            <form method="post" action="store.php"  class="form-horizontal" role="form" align="center">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="medicineName"> Medicine Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="medicineName" id="medicineName"  placeholder="Medicine Name" required="true" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="price"> Price</label>
                    <div class="col-sm-6">
                        <input type="text" name="price" id="price"  placeholder="Price" required="true" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="category"> Category</label>
                    <div class="col-sm-6">
                        <input type="text" name="category" id="category"  placeholder="Category" required="true" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <input type="submit" name="submit" id="submit" value="Submit"  class="btn btn-default"/>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <div class="sidebar">
        <a h></a>
    </div>
</div>


<script>


    jQuery(

        function($) {
            $('#message').fadeIn (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>



</body>
</html>
