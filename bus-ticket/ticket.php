<!DOCTYPE html>


<html>
	<title>Ticket</title>
	<link rel="icon" href="icon/bus_logo.jpg" />
	<head>
	<style></style>
	<script>
		function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
		}
	</script>
	<?php include "linker.php";?>
	</head>
	<body>

		<?php

		$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");
		$sql = "SELECT * FROM reserved_lists ORDER BY reserved_id DESC LIMIT 1";

		$result = mysqli_query($connect,$sql);
		$row = mysqli_fetch_array($result);
		$ref_num = $row['ref_num'];
		$date = $row['date'];	
		$seats = $row['seats'];
		$no_seats = $row['no_seats'];
		$status = $row['status'];
		$passengerid = $row['passenger_id'];
		$busid = $row['bus_id'];	

		$sql1 = "SELECT * FROM bus_lists WHERE id = $busid";
		$sql2 = "SELECT * FROM passenger_lists WHERE passenger_id = $passengerid";			
		$result1 = mysqli_query($connect,$sql1);
		$row1 = mysqli_fetch_array($result1);

		$result2 = mysqli_query($connect,$sql2);
		$row2 = mysqli_fetch_array($result2);

		$from = $row1['start'];
		$to = $row1['end'];
		$bus_company = $row1['bus_company'];
		$bus_no = $row1['bus_no'];
		$time = $row1['time'];
		$fare = $row1['fare'];

		$name = $row2['name'];
		$phoneno = $row2['phone_no'];
		$email = $row2['email'];


		?>







		<div class='container-fluid'  style='padding:0%;margin:0;margin-top:2%; ;'>
			<div class='container-fluid' id='ticket' style='padding-left:%;padding-bottom:1%;width:90%;border-radius:5px;box-shadow:0px 0px 8px #999999;background-color:#f6eee2'>
				<p style='font-size:22px;margin-top:10px;margin-left:30px;color:#3f301d;'>LandAsia Bus Service</p>
				<p style='font-size:13px;margin-top:-20px;margin-left:122px;color:#3f301d;'>SAFE, TRUSTWORTHY & HONEST
				<p style="width:100%;height:3px;background-color:#de9e48;margin-top:-12px;margin-left:0px;"></p>
							
				<center><p style="font-size:22px;text-alignment:center;"><?php echo $bus_company; ?></p></center>
<br>
				<p style="font-size:16px;text-alignment:center;margin-left:%;margin-top:-10px;"><strong>Passenger Name:</strong> 
					<?php 
						echo $name; 
					?>
				</p>

				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Phone No:</strong> <?php 
						echo $phoneno; 
				?>
					
				</p>
				

				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>From:</strong> <?php 
						echo $from; 
				?><label style="margin-left:30px;"><strong>To</strong>: <?php 
						echo $to; 
				?></label><br>
				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Bus Name:</strong> <?php 
						echo $bus_company; 
				?> <label style="margin-left:30px;"><strong>Bus No:</strong> <?php 
						echo $bus_no; 
				?></label><br>
				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Date:</strong> <?php 
						echo $date; 
				?><label style="margin-left:30px;"><strong>Time:</strong> <?php 
						echo $time; 
				?></label><br>
				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Seat No(s):</strong> <br>
					<?php
					echo $seats;
					?>

				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Total Fare:</strong> <br>
					<?php 
						echo ($no_seats*$fare); 
				?>
				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Payment reference:</strong> <br>
					<?php 
						echo $ref_num; 
				?>
				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Payment status:</strong> <br>
					<?php 
						echo $status; 
				?>
				<p style="font-size:16px;text-alignment:center;margin-left:%;"><strong>Ticket Issued Time:</strong> 
					<?php                        
    date_default_timezone_set("Asia/Kuala_Lumpur");
    echo date('d-m-Y H:i:s'); 
?>
			</div>
			<div class='row' style='margin:0;padding:0;'>
				<div class='col-lg-7' style='padding-left:1%;'>
					<label style='font-size:15px;margin-top:10px;margin-left:10%' class='text-center'>
						*Note: Please save or print this ticket details for further reference. Thank you.
					</label>
				</div>



				<div class='col-lg-5' style='padding-left:20%;margin-top:1%;padding-bottom:2rem;'>
					<button style="margin-right:5%;background-color:#3f301d;color:#f6eee2;" class="btn cus_button1" onclick="printContent('ticket')" >
						Print Ticket
					</button>
					<button style="margin-right:5%;background-color:#3f301d;color:#f6eee2;" class="btn cus_button1" onclick="printContent('ticket')" >
						Save as PDF
					</button>

				</div>
			</div>
		</div>

 		<?php include "footer2.php";?>
	</body>
</html>