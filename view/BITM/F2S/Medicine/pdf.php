<?php
require_once ('../../../../vendor/autoload.php');
use App\Medicine\Medicine;

$obj= new Medicine();
$allData = $obj->index();


$trs="";
$sl=0;

    foreach($allData as $row) {
        $id =  $row->id;
        $medicineName = $row->medicine_name;
        $price =$row->price;
        $category =$row->category;
        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='250'> $medicineName </td>";
        $trs .= "<td width='250'> $price </td>";
        $trs .= "<td width='250'> $category </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM

<head>
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
</head>


<div class="table-responsive">
            <table class="table table-bordered " >
                <thead>
                <tr>
                    <th align='left' style='color:blue'>Serial</th>
                    <th align='left' style='color:blue'>Medicine Name</th>
                    <th align='left' style='color:blue'>Price</th>
                    <th align='left' style='color:blue'>Category</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;


// Require composer autoload
require_once ('../../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('Medicine.pdf', 'D');


