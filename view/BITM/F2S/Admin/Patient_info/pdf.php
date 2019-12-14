<?php
require_once ('../../../../../vendor/autoload.php');


$obj= new \App\Patient\Patient();
$allUser = $obj->allUsers();


$trs="";
$sl=0;

    foreach($allUser as $row) {
        $id =  $row->id;
        $firstName = $row->first_name;
        $lastName = $row->last_name;
        $email =$row->email;
        $phone =$row->phone;
        $address =$row->address;
        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='250'> $firstName </td>";
        $trs .= "<td width='250'> $lastName </td>";
        $trs .= "<td width='250'> $email </td>";
        $trs .= "<td width='250'> $phone </td>";
        $trs .= "<td width='250'> $address </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM

<head>
    <script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../resources/bootstrap/css/bootstrap.min.css">
</head>


<div class="table-responsive">

            <h2 align = 'center'>All Patient Info</h2>
            <table style = 'text-align: center' class="table table-bordered " >
                <thead>
                <tr>
                    <th align='left' style='color:red'>Serial</th>
                    <th align='left' style='color:red'>ID</th>
                    <th align='left' style='color:red'>First Name</th>
                    <th align='left' style='color:red'>Last Name</th>
                    <th align='left' style='color:red'>Email</th>
                    <th align='left' style='color:red'>Phone No</th>
                    <th align='left' style='color:red'>Address</th>

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
$mpdf->Output('Patient_Info.pdf', 'D');


