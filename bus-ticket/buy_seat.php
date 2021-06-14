<!DOCTYPE html>

<?php

session_start();

$date = $_SESSION['date'];


?>



<html>
	<title>Confirmation</title>
	<link rel="icon" href="img/Land Asia Logo.png" />
	<head>
		<?php include "linker.php";?>
		<style>

			
			.error {color: #FF0000;
			}
		</style>
	</head>
	<body>
	
		<div class='row' style='margin:0;padding:0;padding-bottom:2rem;'>
		 <div class='col-lg-6' style='padding-left:4%;'>
			<form action="payment_confirm.php" name="buy_seat" method="POST">
				<div class="container"style='background-color:#f6eee2; padding:3%;margin-top:5%;border-radius:10px;box-shadow:0px 0px 8px #999999;  '>
					<h5>Buyer Information</h5>
					<span class="error">*</span>
					<label style='font-weight:bold;'>Full name:</label> 
					<input type='text' name='name' id='name' class='form-control'>
					<span class="error">*</span>
					<label style='font-weight:bold;'>Mobile no:</label> 
					<input name='mobile' id='mobile' type='text' class='form-control'>
					<span class="error">*</span>
					<label style='font-weight:bold;'>Email:</label> 
					<input name='email' id='email' type='text' class='form-control'><br>
					<span class="error">*</span>
					<label style='font-weight:bold;'>Gender:</label>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="male" name="gender" class="custom-control-input" value="Male">
					  <label class="custom-control-label" for="male">Male</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="female" name="gender" class="custom-control-input" value="Female">
					  <label class="custom-control-label" for="female">Female</label>
					</div>
					<br>
					<span class="error">*</span>
					<label style='font-weight:bold;'>Payment Method:</label>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="online_banking" name="p_m" class="custom-control-input" value="Online">
					  <label class="custom-control-label" for="online_banking">Online Banking</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  <input type="radio" id="credit_card" name="p_m" class="custom-control-input" value="Credit">
					  <label class="custom-control-label" for="credit_card">Credit Card</label>
					</div>
					
					
					<div class="">
						<p style="text-alignment:'justify';">Note:<br> Cancellation and change booking is not allowed. 
						<br>
						IMPORTANT NOTICE: It is mandatory to wear a mask onboard all buses. Passengers who do not wear mask will be denied to enter.
						<br>
						Please ensure you follow travel guidelines prescribed by the government. </p>
					</div>
					<center><input style="width:;margin-top:0px;background-color:#3f301d;color:#f6eee2;" class="btn cus_button1" type="submit" name="submit" id="btn" value="Confirm Reservation"></input></center>
					
<!-- 					<?php
					$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

					if (strpos($fullUrl, "info=empty") == true) { 
						echo "<center><p class='error'>Please fill in all details!</p>";
						exit();
					}
				
					elseif (strpos($fullUrl, "info=email") == true) { 
						echo "<center><p class='error'>Invalid email!</p>";
						exit();
					}
				
					?>-->
					 
				</div>
			</form >
		 </div>
		 <div class='col-lg-6'>
			<div class="container" style='background-color:#f6eee2;padding:3%;margin-top:5%;border-radius:10px;box-shadow:0px 0px 8px #999999;'>
				<?php
		
				$bus_id = $_POST['busArr']['id'];

				$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web",);
				$sql = "SELECT * FROM bus_lists WHERE id=$bus_id";
				$result = mysqli_query($connect,$sql);
				$row = mysqli_fetch_array($result);
				$start = $row['start'];
				$end = $row['end'];
				$bus_company = $row['bus_company'];
				$fare = $row['fare'];
				$time = $row['time'];

				echo "<h5>Journey Information</h5>";
				echo "".$start."-".$end."<br>";
				echo "Bus Name : ". $bus_company . "<br>";
				echo "Date : " .$date . "<br>";
				echo "Time : ".$time. "<br>";
				echo "Seat No: ";

				$total = 0;
				if(isset($_POST["submit"])){
					if(!empty($_POST["checkArr"])){
						foreach ($_POST["checkArr"] as $checkArr) {
							echo $checkArr."&nbsp";
							$total++;

						}
					}else{
						echo "Please select at least one seat";
					}
				}

				$_SESSION['seats'] = $_POST["checkArr"];
				$_SESSION['no_seats'] = $total;
				$_SESSION['bus_id'] = $bus_id;

				?>


			</div>
			<div class="container" style='background-color:#f6eee2;padding:3%;margin-top:5%;border-radius:10px;box-shadow:0px 0px 8px #999999;'>
				<h5>Payment Information</h5>
				
				<?php 

				echo "Ticket Price: RM" . $fare . "<br>";
				echo "No. of Ticket : " . $total . "<br>";
				echo "Total : RM" . ($fare*$total) ."<br>";



				?>


			</div>
		 </div>
		</div>
		


	</body>
</html>
<?php include "footer2.php";?>


