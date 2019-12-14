<?php

use App\Message\Message;

use App\Utility\Utility;
require_once ("../../../../../vendor/autoload.php");


$obj = new \App\Doctor\Doctor();
$allDoctors  =  $obj->trashed();
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

<?php echo "<div>  <div id='message'>  $msg </div>   </div>"; ?>

<h1 style="text-align: center;font-weight: bolder;color: navy;margin-top: 40px"> Trashed List of -  Doctors </h1><br>

<div class="container">
    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form  id="selectionForm" action="recover_multiple.php" method="post">
                <div class="nav navbar" style="margin-left: 300px">

                    <input class="btn btn-success btn-lg" type="button" id="recoverMultipleButton" value="Recover Multiple">
                    <input class="btn btn-danger btn-lg" type="button" id="deleteMultipleButton" value="Delete Multiple">


                </div>


                <table class="table table-responsive table-bordered" style="width: 1090px">
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
                            <td style='text-align:center;font-size: large'><details>$record->join_date<br>at $record->join_time</details>
                            
                           </td>
                    <td>
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
                    <tr>

                    </tr>
                </table>

            </form>





        </div>
        <div class="col-md-1"></div>
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
