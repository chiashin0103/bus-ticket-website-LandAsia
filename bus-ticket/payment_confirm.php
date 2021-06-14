<!DOCTYPE html>

<?php

session_start();

$date = $_SESSION['date'];
$seats = $_SESSION['seats'];
$numberOfSeats = $_SESSION['no_seats']; 
$busid = $_SESSION['bus_id']; 
$total = $_SESSION['no_seats'];

?>


<html>
	<title>Payment and Reserve</title>
	<link rel="icon" href="img/Land Asia Logo.png" />
	<head>
		<?php include "linker.php";?>
		<script src="serverTime.js" type="text/javascript"></script>
		<style>
			#payment_confirm .container-fluid
			{
				padding:2%;
				margin-left:2%;
				border-radius:10px;
				box-shadow:0px 0px 8px #999999;
				background-color:#f6eee2;
			}
		</style>
		
	</head>
	<body onload="startTime()">


			<div class='row' style='margin:0;padding:0;margin-top:2%;' id='payment_confirm'>
				<div class='col-lg-6' style='margin-bottom:16%;'>
					<?php 

				 // if(isset($_POST['submit'])){
					$name=$_POST['name'];
					$mobile=$_POST['mobile'];
					$email=$_POST['email'];
					$gender = $_POST['gender'];
					$pay_method = $_POST['p_m'];
					
					
					// //check if input is empty
					// if (empty($name) || empty($mobile) || empty($email) || empty($gender) || empty($pay_method)) {
					// 	header("Location:buy_seat.php?info=empty");
					// 	exit();
					// }
					// //check if email is valid
					// elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					// 	header("Location:buy_seat.php?info=email");
					// 	exit();
					// }
				 // else {
					// header("Location:payment_confirm.php");
					// exit();
					// }
					// }
					$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");
					$sql = "SELECT * FROM bus_lists WHERE id=$busid";
					$result = mysqli_query($connect,$sql);
					$row = mysqli_fetch_array($result);
					$start = $row['start'];
					$end = $row['end'];
					$bus_company = $row['bus_company'];
					$fare = $row['fare'];
					$time = $row['time'];
					
					?>
				
					<div class="container-fluid" style='padding:5%;'>
						<form action="success.php" name="payment_reserve" method="POST">
								<p><h5>Payment amount: RM <?php echo htmlspecialchars($fare*$total); ?></h2></p>
								
								<?php if(($_POST['p_m']) == 'Credit') { ?>
								<h5>Please insert your card details:</h5><br>
									<label style='font-weight:bold;'>Credit Card Number:</label> 
										<input name='card_no' id='card_no' class='form-control'><br>
									<label style='font-weight:bold;'>Card Type:</label><br>
									<div class='custom-control custom-radio custom-control-inline'>
										<input type='radio' id='visa' name='cardtype' class='custom-control-input' value='Visa'>
										<label class='custom-control-label' for='visa'>Visa</label>
									</div>
									<div class='custom-control custom-radio custom-control-inline'>
										<input type='radio' id='master' name='cardtype' class='custom-control-input' value='Master'>
										<label class='custom-control-label' for='master'>Master</label>
									</div>
									<div class='custom-control custom-radio custom-control-inline'>
										<input type='radio' id='meps' name='cardtype' class='custom-control-input' value='MEPS'>
										<label class='custom-control-label' for='meps'>MEPS</label>
									</div>
									<br>
									<br><label style='font-weight:bold;'>Expiry date:</label> 
										<input name='exp_date' id='exp_date' class='form-control' value='MM/YY'>
									<br>
						<?php	} else {
									echo "Please click PAY NOW to proceed with payment<br>";
									echo "You will be directed to payment page...";
								} ?>
									<br>
									<br>
									<input style='width:;margin-top:0px;background-color:#3f301d;color:#f6eee2;' class='btn cus_button1' 
									type='submit' name='submit' id='btn' value='Pay Now'></input>
								
						</form>
					</div>
				</div> 
				<div class='col-lg-6' style='margin:0;padding-left:2%;'>
							<div class=' container-fluid' style='padding:3%;margin:0%;margin-bottom:5%;list-style:none'>
								<?php 
									echo
									"<label style='font-size:14px;font-weight:bold;margin-top:px;'>Details information</label>
										<li><strong>Name : </strong>".$name."</li>
										<li><strong>Mobile No. : </strong>".$mobile."</li>
										<li><strong>Email : </strong>".$email."</li>
										<li><strong>From : </strong>".$start."</li>
										<li><strong>To : </strong>".$end."</li>
										<li><strong>Bus Name : </strong>".$bus_company."</li>
										<li><strong>Date : </strong>".$date."</li>
										<li><strong>Time : </strong>".$time."</li>
										<li><strong>Gender : </strong>".$gender."</li>
										<li><strong>Payment Method : </strong>".$pay_method."</li>";

										echo "<li>" . "<strong>Seat No(s) : </strong>";

										foreach($seats as $value){
											echo $value ."&nbsp";
										}

										echo "</li>";


										echo "
										<li><strong>Number Of Seat(s) : </strong>".$numberOfSeats."</li>
										<li><strong>Total Fare </strong>: RM".($numberOfSeats*$fare)."</li>

										
									";
								?>
							</div>
						
					
				</div>  
			</div>  
 			<?php include "footer2.php";?>


<!-- insert data into passanger_lists and reserved_lists -->
			<?php
		if(isset($_POST['submit']))
		{    

			$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");

			$sql1 = "INSERT INTO passenger_lists (name, phone_no, gender, email)
			VALUES ('$name','$mobile', '$gender','$email')";

						mysqli_query($connect, $sql1);

			// if(mysqli_query($connect, $sql1)){
			// 	echo "Records added successfully.";
			// } else{
			// 	echo "ERROR: Could not able to execute $sql1. " . mysqli_error($connect);
			// }

			// $sql2 = "INSERT INTO reserved_lists (date,seats,no_seats,status)
			// VALUES ('$date','$seats','$no_setas', '$status')";


			// mysqli_close($conn);
		}






		?>

	</body>
</html>
