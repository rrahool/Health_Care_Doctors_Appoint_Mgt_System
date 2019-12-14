<?php
use App\Utility\Utility;

require_once("../../../../vendor/autoload.php");

$objAppointment  = new \App\Appointment\Appointment();

$objAppointment->setData($_POST);

$objAppointment->store();

Utility::redirect('create.php');