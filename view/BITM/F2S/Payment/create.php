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
	<title>Payment Details Form</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="../../../../resources/style/create.css">
	<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="content">


<form id="pay_form"  method="post" action="store.php">


				<h1 align="center" style="color:#0000ff;font-size:1.8em"><strong>Payment's Information Form</strong></h1>

				<hr>
				<br>


	<div class="wrapper">
					<input type="text" class="form-control" name="bill_id" value="" required  placeholder="Bill ID">
		</div>

		<div class="wrapper">
					<input type="text" class="form-control" name="discount" value="" required  placeholder="Discount">
			</div>




			<div class="wrapper">
				<input type="text" class="form-control" name="paid_amount" value=""   required  placeholder="Paid Amount">
				</div>


				<!--<div class="wrapper">
				<input type="date" class="form-control" name="date" value=""   required  placeholder="Date">
				</div>-->



				<p>
					<input type="submit" name="submit" value="Submit">
				</p>

		</form>

	</div>
</div>
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

</body>
</html>