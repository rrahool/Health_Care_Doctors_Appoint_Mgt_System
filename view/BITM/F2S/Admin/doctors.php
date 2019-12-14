<?php
session_start();
require_once('../../../../vendor/autoload.php');

use App\User\User;
use App\Utility\Utility;

if (!isset($_SESSION['username']) && empty($_SESSION['username']) && is_null($_SESSION['username'])) {
    Utility::redirect('adminLogIn.php');
}

$objdoctors= new User();
$allDoctors=$objdoctors->allDoctors();
$totalDoctors=count($allDoctors);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Life Care</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../../resources/style/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--INSERT INTO `doctors` (`doctors_id`, `name`, `email`, `password`, `type`, `specialist`, `mobile`, `address`) VALUES ('11', 'Dr. Rohan chow', 'rohan@gmail.com', '12345', 'pediatric', 'pediatric', '01989898989', 'ctg, bd');-->
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <img class="logo" style="width: 220px; height: 90px;" src="../../../../resources/images/logo.png">
                </div>
                <div class="row loginButton pull-right">
                    <div class="col-xs-6">
                        <a href="index.php" class="btn btn-info ">Dashboard</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="AdminLogOut.php" class="btn btn-danger ">Log Out</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: -20px;">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <h1 class="media-object " align="center">Admin Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<?php

require_once("../../../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();

echo "<div>  
                 <div id='message' style='color: red;padding: 10px;margin: 20px;font-size: 25px'>  $msg </div>
            </div>";

?>

<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="center-block">
                <div class="col-lg-offset-5 col-lg-2">
                    <a href="assignDoctor.php" class="btn btn-primary" role="button">Assign a Doctors</a>
                </div>
            </div>
            <div class="col-lg-12">
                <!--            <h3 class="" align="center">All User Information</h3>-->
                <h3 class="center-block">All Doctors Information</h3>
                <table class="table table-responsive table-bordered"  style="width: 1200px">
                    <thead class="label-info">
                    <tr class="text-danger text-capitalize">
                        <th style="text-align: center">Check All <input type='checkbox' id='select_all' name='select_all' value='$record->id'></th>

                        <th class="text-center">Sl</th>
                        <th class="text-center">Doctors_id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center col-lg-offset-1">Email</th>
                        <th class="text-center">Mobile</th>
                        <th class="text-center">DR. type</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Join Date & time</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <?php
                    $serial = 1;
                    foreach ($allDoctors as $record){

                        echo "
                        
                       <tbody>
                        <tr>
                                                          <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'> </td>

                            <td style='text-align:center;font-size: large'>$serial</td>                     
                            <td style='text-align:center;font-size: large'>$record->id</td>                     
                            <td style='text-align:center;font-size: large'>$record->doctor_name</td>                     
                            <td style='text-align:center;font-size: large'><details>$record->email</details></td>
                            <td style='text-align:center;font-size: large'><details>$record->mobile</details></td>
                            <td style='text-align:center;font-size: large'><details>$record->type</details></td>
                            <td style='text-align:center;font-size: large'>$record->status</td>
                            <td style='text-align:center;font-size: large'><details>$record->join_date<br>at
                            
                            $record->join_time</details>
                            
                           </td>
                    <td>

                        <a href='Doctor_info/view.php?id=$record->id' class='btn btn-primary' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-eye-open'></span> View</a>
     
                        <a href='Doctor_info/edit.php?id=$record->id' class='btn btn-success' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                         <a href='Doctor_info/trash.php?id=$record->id' class='btn btn-warning' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-trash'></span> Trash</a>
                        <a href='Doctor_info/delete.php?id=$record->id' onclick='return confirm_delete()' class='btn btn-danger' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-remove'></span> Delete</a>
                    </td>
                    </tr>
                    
                    
                   
                    
                    </tbody>
                     

                    ";
                        $serial++;
                    }
                    ?>
                    <tr>

                    </tr>
                </table>
                <div style="margin-left: 40px;margin-bottom: 30px;text-align: center">
                    <a href="Doctor_info/pdf.php" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-list-alt"></span> <span class="glyphicon glyphicon-circle-arrow-down"></span> Download as PDF</a>
                    <a href="Doctor_info/xl.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-list-alt"></span> <span class="glyphicon glyphicon-circle-arrow-down"></span> Download as Excel</a>

                </div>



            </div>

        </div>

    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="panel-footer " >
                <div class="panel-heading col-lg-offset-1">
                    <div>
                        <div class="col-lg-6">
                            <article>
                                <h4>Member Support</h4>
                                <div class="">
                                    <ul class="list-inline">
                                        <li class=""><a href="#" title="About us">About us</a></li>
                                        <li class=""><a href="#" title="Contact">Contact</a></li>
                                        <li class=""><a href="#" title="FAQ">FAQ</a></li>
                                        <li class=""><a href="#" title="Careers">Careers</a></li>
                                        <li class=""><a href="#" title="Terms &amp; Conditions">Terms &amp;
                                                Conditions</a></li>
                                        <li class=""><a href="#" title="Privacy statement">Privacy statement</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <article class="">
                                <h4>Follow us</h4>
                                <ul class="social list-inline">
                                    <li class="facebook"><a href="#" title="facebook">facebook</a></li>
                                    <li class="youtube"><a href="#" title="youtube">youtube</a></li>
                                    <li class="linkedin"><a href="#" title="linkedin">linkedin</a></li>
                                    <li class="googleplus"><a href="#" title="googleplus">googleplus</a></li>
                                    <li class="twitter"><a href="#" title="twitter">twitter</a></li>
                                    <li class="pinterest last"><a href="#" title="pinterest">pinterest</a></li>
                                </ul>
                            </article>
                        </div>
                    </div>
                    <br>
                    <div align="center">
                        <footer style="height: 70px;">
                            <h5 align="center" style="display:inline">  &nbsp; &nbsp;Copyright © 2017 Medical info & treatment
                                service |
                                Designed
                                &nbsp; &nbsp;  by: F2S.
                            </h5>
                            <p style="float:right; display:inline"><a href="#top"><u>Go to
                                        top</u></a></p>
                        </footer>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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

    <script>

        $('#deleteMultipleButton').click(function(){

            if(checkEmptySelection()){
                alert("Empty Selection! Please select some record(s) first")
            }
            else{
                var r = confirm("Are you sure you want to delete the selected record(s)?");

                if(r){
                    var selectionForm =   $('#selectionForm');
                    selectionForm.attr("action","delete_multiple.php");
                    selectionForm.submit();
                }
            }
        });


    </script>
    <script>

        function checkEmptySelection(){

            emptySelection =true;

            $('.checkbox').each(function(){
                if(this.checked)   emptySelection = false;
            });

            return emptySelection;
        }


        $("#recoverMultipleButton").click(function(){

            if(checkEmptySelection()){
                alert("Empty Selection! Please select some record(s) first")
            }else{

                $("#selectionForm").submit();

            }

        }) ;

    </script>
    <script>

        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){ //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

//check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });



    </script>


</body>
</html>
