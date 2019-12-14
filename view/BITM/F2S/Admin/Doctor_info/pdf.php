<?php
require_once ('../../../../../vendor/autoload.php');


$obj= new \App\Doctor\Doctor();
$allDoctor = $obj->allDoctors();


$trs="";
$sl=0;

    foreach($allDoctor as $row) {
        $id =  $row->id;
        $Name = $row->doctor_name;
        $email =$row->email;
        $type =$row->type;
        $status =$row->status;
        $mobile =$row->mobile;
        $address =$row->address;
        $availableTime =$row->available_time;
        $join_date =$row->join_date;
        $join_time =$row->join_time;
        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='250'> $Name </td>";
        $trs .= "<td width='250'> $email </td>";
        $trs .= "<td width='250'> $type </td>";
        $trs .= "<td width='250'> $status </td>";
        $trs .= "<td width='250'> $mobile </td>";
        $trs .= "<td width='250'> $address </td>";
        $trs .= "<td width='250'> $availableTime </td>";
        $trs .= "<td width='250'> $join_date </td>";
        $trs .= "<td width='250'> $join_time </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM

<head>
    <script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resources/bootstrap/css/bootstrap.min.css">
</head>


<div class="table-responsive">

            <h2 align = 'center'>All Doctors Info</h2>
            <table style = 'text-align: center' class="table table-bordered " >
                <thead>
                <tr>
                    <th align='left' style='color:red'>Serial</th>
                    <th align='left' style='color:red'>ID</th>
                    <th align='left' style='color:red'>Name</th>
                    <th align='left' style='color:red'>Email</th>
                    <th align='left' style='color:red'>Type</th>
                    <th align='left' style='color:red'>Status</th>
                    <th align='left' style='color:red'>Phone No</th>
                    <th align='left' style='color:red'>Address</th>
                    <th align='left' style='color:red'>Available_Time</th>
                    <th align='left' style='color:red'>Join_Date</th>
                    <th align='left' style='color:red'>Join_Time</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;


// Require composer autoload
require_once ('../../../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('Doctor_Info.pdf', 'D');


