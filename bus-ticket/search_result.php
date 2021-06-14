<!--TO DO: 
-Link Bus Name to bus operators
-->


<?php

session_start();

$_SESSION['date'] = $_POST['journey_date'];

?>

<!DOCTYPE html>
<html>
	<title>Available Bus</title>
	<link rel="icon" href="icon/bus_logo.jpg" />
	<head>
		<?php include "linker.php";?>
		<script>
			//for seat
			$(document).ready(function(){
			 $('.bus_seat').click(function(){
			   var id = this.id;
			   var splitid = id.split('_');
			   var busno = splitid[1];
			   // AJAX request
			   $.ajax({
				url: 'seat_info.php',
				type: 'post',
				data: {busno: busno},
				success: function(response){ 
				  // Add response in Modal body
				  $('#bus_seat_b').html(response);

				  // Display Modal
				  $('#ModalforBusSeat').modal('show'); 
				}
			  });
			 });
			});
		</script>
		<style>
			.navbar-nav li{
				margin-left:%;
			}
		</style>
		
	</head>
	<body>

	<!-- ModalforBusSeat -->
	 <div class="modal fade" id="ModalforBusSeat">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style='border-radius:;background-color:#f6eee2;'>
				<div class="modal-header">
					<h3 class="modal-title" style='color:#3f301d;margin-left:35%;'>TRIP INFORMATION</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" id="bus_seat_b" style='margin-bottom:2%'></div>
			</div>
		</div>
	</div>



	<!-- Show From-To and Date -->
	<div class='container-fluid' style='margin-top:2%;margin-bottom:4%;'>
		<?php
			$from=$_POST["source"];
			$to=$_POST["dstn"];
			$type=$_POST["type"];
			$date=$_POST["journey_date"];
			$i=1;
			echo "<h5 style='color:#666;text-align:center;'>".$from." - ".$to."<br>Date: ".$date."</h5>";
		?>
	</div>

	<!--Table title & body-->
	<div class="container-fluid" style='margin-bottom:16.5%;margin-top:-4%;'>
		<table class='table table-striped' style='margin-top:0px;text-align:center'>
			<thead>
				<tr>
					<th>#</th>
					<th>Bus Name</th>
					<th style='list-style:none;text-align:;'>Bus type</th>
					<th>Departure Time</th>
					<th>Available Seats</th>
					<th>Fare</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php

					$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");
;
					if(!$connect){
						die("Connection failed: " . mysqli_connect_error());
					}	

					
					$sql = "SELECT * FROM `bus_lists` WHERE `start` LIKE '$from' AND `end` LIKE '$to' ";
					
					
					
					
					$records=mysqli_query($connect,$sql);
					while($data=mysqli_fetch_array($records))
					{
						$id=$data['id'];
						echo "<tr style='height:100px'>";
							echo "<td>".$i."</td>";
							echo "<td style='list-style:none;text-align:middle;'class='text-muted'>
									<h2 class='btn bus_detail_info' data-toggle='modal' data-target='#ModalforBusDetail' id='businfo_".$id."' style='padding:0;color:#333333;font-size:20px;font-weight:bold;text-decoration:;'>
										".$data['bus_company']."
									</h2>
									<li>Bus#".$data['bus_no']."</li>
								  </td>";
							echo "<td style='list-style:none;text-align:middle;'>
									<h5 style='margin-bottom:auto;margin-top:auto;text-align:middle'>
										".$data['bus_type']."
									</h5>
								 </td>";
							echo "<td style='list-style:none;text-align:middle;'>
									<h5 style='margin-bottom:auto;margin-top:auto;text-align:middle'>
										".$data['time']."
									</h5>
								 </td>";
							echo "<td style='list-style:none;text-align:middle;'>
									<h5 style='margin-bottom:auto;margin-top:auto;text-align:middle'>
										".$data['seats']."
									</h5>
									<li class='text-muted'><small>Total seats: 40</small></li>
								 </td>";
							echo "<td style='list-style:none;text-align:middle;' class='text-muted'>
									<h5 style='color:#de9e48;font-weight:bold;'>RM ".$data['fare']."</h5>
									<li><small>(Per seat)</small></li>
									<li><small>Charge applicable</small></li>
								  </td>";
							echo "<td style='text-align:middle;margin-bottom:auto;margin-top:50%;background-color:#3f30d;'>
									<button data-toggle='modal' data-target='#ModalforBusSeat' style='background-color:#3f301d;color:#f6eee2;padding-left:5%;padding-right:5%;margin-top:10%;' class='btn btn-md btn-success bus_seat' id='seat_" .$data['trip_no']."'>
										View Seat
									</button>
								  </td>";
						echo "</tr><br>";
						$i=$i+1;
					}
				?>
			</tbody>
			</table>
	</div>
<?php include "footer2.php";?>
	</body>
</html>
