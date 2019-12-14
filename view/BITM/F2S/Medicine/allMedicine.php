<?php
require_once("../../../../vendor/autoload.php");

$obj = new \App\Medicine\Medicine();
$allData = $obj->index();

use App\Message\Message;
$msg = Message::message();

################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) ){

    $someData =  $obj->search($_REQUEST);
}



$availableKeywords = $obj->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';

################## search  block 1 of 5 end ################


####################### pagination code block#1 of 2 start#########################################
$recordCount= count($allData);
if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;


if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;



$pages = ceil($recordCount/$itemsPerPage);
$someData = $obj->indexPaginator($page,$itemsPerPage);
$allData= $someData;


$serial = (  ($page-1) * $itemsPerPage ) +1;



if($serial<1) $serial=1;
####################### pagination code block#1 of 2 end #########################################


################## search  block 2 of 5 start ##################
if(isset($_REQUEST['search']) )$someData =  $obj->search($_REQUEST);

if(isset($_REQUEST['search']) ) {
    $serial = 1;


    $allData=$someData;

}
################## search  block 2 of 5 end ################





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
            background-color:lightblue;
        }
    </style>
    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/jquery-ui.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../../resources/bootstrap/js/jquery-ui.js"></script>

    <!-- required for search, block3 of 5 end -->


</head>
<body>

<!-- required for search, block 4 of 5 start -->
<div class="nav navbar-nav pull-right">
    <form id="searchForm" action="allMedicine.php" method="get" style="margin-top: 5px; margin-bottom: 10px ">
        <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
        <input type="checkbox"  name="medicineName"   checked  >Medicine Name
        <input type="checkbox"  name="category"  checked >Category
        <input hidden type="submit" class="btn-primary" value="search">
    </form>
</div>

<!-- required for search, block 4 of 5 end -->

<?php echo "<div>  <div align='center' class=' alert-info ' id='message'>  $msg </div>   </div>";   ?>
<h1 style="color: #442a8d;" align="center">Active List of Medicine</h1>


<form  id="selectionForm" action="trash_multiple.php" method="post">
    <div class="nav navbar">
        <a href="pdf.php" class="btn btn-lg btn-primary">Download as PDF</a>
        <a href="create.php" class="btn btn-lg btn-warning">Create</a>
    </div>
</form>

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
                 <a href='trash.php?id=$record->id' <button class='btn btn-warning'> Trash </a>
                 <a href='delete.php?id=$record->id' <button onclick='return confirm_delete()' class='btn btn-danger'> Delete </a>
                 
            </td>

       </tr>

     ";

    $serial++;

}//end of foreach loop
?>
    </table>


<!--  ######################## pagination code block#2 of 2 start ###################################### -->
<div align="left" class="container">
    <ul class="pagination">

        <?php

        $pageMinusOne  = $page-1;
        $pagePlusOne  = $page+1;


        if($page>$pages) Utility::redirect("allAppointment.php?Page=$pages");

        if($page>1)  echo "<li><a href='allAppointment.php?Page=$pageMinusOne'>" . "&laquo" . "</a></li>";


        for($i=1;$i<=$pages;$i++)
        {
            if($i==$page) echo '<li class="active"><a href=""> '. $i . '</a></li>';
            else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

        }
        if($page<$pages) echo "<li><a href='allAppointment.php?Page=$pagePlusOne'>" . "&raquo" . "</a></li>";

        ?>

        <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
            <?php
            if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

            if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
            else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

            if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

            if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

            if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

            if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
            else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
            ?>
        </select>
    </ul>
</div>
<!--  ######################## pagination code block#2 of 2 end ###################################### -->


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


<!-- required for search, block 5 of 5 start -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block 5 of 5 end -->


</body>
</html>