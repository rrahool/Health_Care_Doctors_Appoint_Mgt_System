<?php

require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message' style='color: red;padding: 10px;font-size: 18px'>  $msg </div>   </div>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Billing's Form</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="../../../../resources/style/create.css">
	<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
	<div class="content">


<form id="pay_form"  method="post" action="store.php">

			<div>
				<h1 align="center" style="color:#0000ff;font-size:1.8em"><strong>Billing Information Form Entry</strong></h1>
			</div>
				<hr>
				<br>

				<div class="wrapper">
					<input type="text" class="form-control" name="pres_id" value="" required   size="55" tabindex="1" placeholder="Patient ID">
				</div>
				<div class="wrapper">
					<input type="text" class="form-control" name="reg_fee" value="" required   size="55" tabindex="1" placeholder="Registration Fee">
				</div>
				<div class="wrapper">
					<input type="text" class="form-control" name="cabin" value="" required   size="55" tabindex="1" placeholder="Cabin Fee">
				</div>
				<div class="wrapper">
					<input type="text" class="form-control" name="medicine" value=""   required size="55" tabindex="1" placeholder="Medicine Fee">
				</div>
				<div class="wrapper">
					<input type="text" class="form-control" name="doctor" value=""   required size="55" tabindex="1" placeholder="Doctor Fee">
				</div>
				<div class="wrapper">
				<input type="text" class="form-control" name="meal" value=""   required size="55" tabindex="1" placeholder="Meal Cost">
				</div>
				<div class="wrapper">
					<input type="text" class="form-control" name="other" value=""   required size="55" tabindex="1" placeholder="Other">
				</div>
				<!--<div class="wrapper">
					<label  >Total Amount <span style="color: #F00; font-size: 1em;">*</span></label>
					<input type="text"  class="form-control" name="total" value=""   required size="55" tabindex="1" placeholder="">
				</div>-->
				<div class="wrapper">
					<input type="text" class="form-control" name="service_charge" value=""   required size="55" tabindex="1" placeholder="Service Charge">
				</div>
				<div class="wrapper">
					<input type="text" class="form-control" name="vat" value=""   required size="55" tabindex="1" placeholder="Vat">
				</div>
				<!--<div class="wrapper">
					<label  >Gross Amount <span style="color: #F00; font-size: 1em;">*</span></label>
					<input type="text" class="form-control" name="gross_amount" value=""   required size="55" tabindex="1" placeholder="">
				</p>
				<div class="wrapper">
					<label  >Date <span style="color: #F00; font-size: 1em;">*</span></label>
					<input type="datetime" class="form-control" name="date" value=""   required size="55" tabindex="1" placeholder="">
				</p>-->


				<div>
					<input type="submit" name="submit" value="Submit">
				</div>




		</form>

	</div>
	</div>
	<script src="../../../../resources/bootstrap/js/jquery.js"></script>
<script src="../../../../resources/bootstrap/js/jquery1.12.4.js"></script>
<script src="../../../../resources/bootstrap/js/jquery-ui.js"></script>


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

</body>
</html>