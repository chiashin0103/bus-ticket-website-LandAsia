<!DOCTYPE html>

<?php

session_start();

$date = $_SESSION['date'];
$seats = $_SESSION['seats'];
$numberOfSeats = $_SESSION['no_seats']; 
$busid = $_SESSION['bus_id']; 

?>

<html>
	<title>Booking Confirmation</title>
	<link rel="icon" href="img/Land Asia Logo.png" />
	<head>
		<?php include "linker.php";?>
		<script src="serverTime.js" type="text/javascript"></script>
		<style>
			#thankyou .container-fluid
			{
				padding:2%;
				margin:2%;
				border-radius:0px;
				margin-top:2%;
				border-radius:10px;
				box-shadow:0px 0px 0px #999999;
				
			}
		</style>
		
	</head>
	<body onload="startTime()">
					
				<?php $ref_num = rand(1000000,9999999); ?>
				
				<div class='row' style='margin:0;padding:0;border-radius:0px; padding-top:100px;' id="thankyou">
					<div class='col-lg-4' style='border-radius:6px;margin-left:525px; box-shadow:5px 5px 5px #3f301d; padding:2%;margin-top:%;margin-bottom:5%;background-color:rgba(0,0,0,1.6);background-color:#f6eee2;'>
						<center><h2>Your booking is successful!</h2>
						<h5><?php echo "Reference number: ". $ref_num ?></h5>
						<img src="img/busgif2.gif" class='center' style='height:70%;'>
					<center><a style="width:20%;margin-top:2%;color:#f6eee2; background-color:#3f301d; border-color:#3f301d;" href='ticket.php' class="btn btn-primary  <?php echo $disabled; ?>">Ticket</a><br>
					</div>
				</div>
				
				<?php


					
					
					$seat_combine = implode(", ", $seats);	
					$ref_no=$ref_num;
					$status = "PAID";
					$indate = date('Y-m-d', strtotime($date));


					$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");
					$sql = "SELECT * FROM passenger_lists ORDER BY passenger_id DESC LIMIT 1";
					$result = mysqli_query($connect,$sql);
					$row = mysqli_fetch_array($result);
					$passengerid = $row['passenger_id'];
					
					?>
				
				<?php
				
					if(isset($_POST['submit']))
		{    

			$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");

			$sql1 = "INSERT INTO reserved_lists (ref_num,date,seats,no_seats,status, passenger_id, bus_id)
			VALUES ('$ref_no','$indate','$seat_combine','$numberOfSeats', '$status','$passengerid','$busid')";

			mysqli_query($connect, $sql1);

			// if(mysqli_query($connect, $sql1)){
			// 	echo "Records added successfully.";
			// } else{
			// 	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($connect);
			// }
			
		}
				
				?>

	</body>
</html>			
				<?php include "footer2.php";?>	