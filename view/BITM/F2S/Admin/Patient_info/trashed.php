<?php
use App\Message\Message;

use App\Utility\Utility;
require_once ("../../../../../vendor/autoload.php");


$obj = new App\Patient\Patient();
$allUser  =  $obj->trashed();
$msg = Message::message();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../../../../../resources/bootstrap/css/bootstrap.min.css">
    <script src="../../../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../../../resources/style/style.css">



</head>
<body>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 mainHeading">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <img class="logo" style="width: 220px; height: 90px;" src="../../../../../resources/images/logo.png">
                </div>
                <div class="row loginButton pull-right">
                    <div class="col-xs-6">
                        <a href="../index.php" class="btn btn-info ">Dashboard</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="../AdminLogOut.php" class="btn btn-danger ">Log Out</a>
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

<?php echo "<div>  <div id='message'>  $msg </div>   </div>"; ?>

<h1 style="text-align: center;font-weight: bolder;color: navy;margin-top: 40px"> Trashed List of - Users </h1><br>

<div class="container">
    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form  id="selectionForm" action="recover_multiple.php" method="post">
                <div class="nav navbar" style="margin-left: 300px">

                    <input class="btn btn-success btn-lg" type="button" id="recoverMultipleButton" value="Recover Multiple">
                    <input class="btn btn-danger btn-lg" type="button" id="deleteMultipleButton" value="Delete Multiple">


                </div>

                <table class="table table-responsive table-bordered" style="width: 1050px">
                    <thead class="label-info">
                    <tr class="text-danger text-capitalize">
                        <th style="text-align: center">Check All <input type='checkbox' id='select_all' name='select_all' value='$record->id'></th>

                        <th class="text-center">Sl</th>
                        <th class="text-center">User_id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Mobile</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $serial = 1;
                    foreach ($allUser as $record){

                        echo "
                        
                       <tbody>
                        <tr>
                          
                                        <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'> </td>

                            <td style='text-align:center;font-size: large'>$serial</td>                     
                            <td style='text-align:center;font-size: large'>$record->id</td>                     
                            <td style='text-align:center;font-size: large'>$record->first_name $record->last_name</td>                     
                            <td style='text-align:center;font-size: large'><details>$record->email</details></td>
                            <td style='text-align:center;font-size: large'><details>$record->phone</details></td>
                            <td style='text-align:center;font-size: large'>$record->address</td>
                    <td style='text-align: center'>
                    
                        <a href='view.php?id=$record->id' class='btn btn-primary' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-eye-open'></span> View</a>
                        <a href='edit.php?id=$record->id' class='btn btn-success' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                        <a href='recover.php?id=$record->id' class='btn btn-info' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-hand-left'></span> Recover</a>
                        <a href='delete.php?id=$record->id' onclick='return confirm_delete()' class='btn btn-danger' style='border-radius: 20px; margin-right: 3px'><span class='glyphicon glyphicon-remove'></span> Delete</a>
                    
                    </td>
                    </tr>
                    
                    </tbody>



                    ";
                        $serial++;
                    }
                    ?>
                </table>
            </form>





        </div>
        <div class="col-md-1"></div>
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


<script src="../../../../../resources/bootstrap/js/jquery.js"></script>

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
