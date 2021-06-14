<?php

session_start();

$date = $_SESSION['date'];

$newdate = new DateTime($date);
$tDate = $newdate->format('Y-m-d');

?>

<html>
	<head>


		<!--original code-->
		<script src="jquery.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				//sets or returns properties and values of the selected elements
				$(".reserved input").prop('checked', true);
				$(".reserved input").prop('disabled', true);
				$("label").click(function(){
					if(!$(this).hasClass("reserved")){
						if($(this).find("input").is(":checked")){
						$(this).addClass("selected");


				
						}else{
							console.log("selected");
							$(this).removeClass("selected");
						}
					}
					else{
						alert("Already booked");
					}
				})
			});
		</script>

<!-- <script type="text/javascript">
		var clicks = 0; $('.cust-checkbox').click(function(){ clicks++; $('#count').html(clicks);});

</script>
 -->

<!--  <script type="text/javascript">

			$(document).ready(function(){

				var $checkboxes = $('.cust-checkbox');

				
				$checkboxes.change(function(){
					
					var countCheckedCheckboxes = $checkboxes.filter(':checked').length-1;
					$('#count').text(countCheckedCheckboxes);

				});

			

			});

		

		</script>  -->

		<style>
			label{
				display: block;
			}
			.cust-checkbox {
				display: none;
			}
			.cust-checkbox + span{
				background-image:url(img/seat_blank.png);
				height: 30px;
				width: 30px;
				border:1px solid #f2f2f2;
				border-radius:4px;
				display:block;
			}
			.cust-checkbox + span:hover{
				background-image:url(img/seat_available.png);
				
			}
			.reserved .cust-checkbox + span{
				background-image:url(img/seat_booked.png);
				color:white;
			}
			.selected .cust-checkbox + span{
				background-image:url(img/seat_available.png);
				color:white;
			}
			span{
				color:white;
				text-align:center;
			}
			.cust-checkbox:checked + span{
				height: 30px;
				width: 30px;
				display:block;
			}
			.cust-checkbox:disabled + span{
				height: 30px;
				width: 30px;
				display:block;
			}
			.seats{
				border: px solid #ccc;
				padding: 0 5px;max-width: 550px;
				margin: 50px auto 0;
			}
			.info{ 	
				padding: 0 5px;
				max-width: 530px;
				margin: 50px auto 0;
			}
			.col-sm-4{text-align:center;font-size:12px;margin-left;auto;margin-right:auto;}
		</style>
		
	</head>
</html>

<?php

$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web");





?> 

<?php

$busno = $_POST['busno'];
$sql = "select * from bus_lists where trip_no=$busno";
$result = mysqli_query($connect,$sql);
$response = "<div>";
while( $row = mysqli_fetch_array($result) ){
	 $bus_id = $row['id'];
	 $trip_no = $row['trip_no'];
	 $bus_company = $row['bus_company'];
	 $bus_no = $row['bus_no'];
	 $time = $row['time'];
	 $start = $row['start'];
	 $end = $row['end'];
	 $fare = $row['fare'];

$query = "SELECT * FROM reserved_lists WHERE date LIKE '%$tDate%' AND status = 'PAID' AND bus_id = $bus_id";
$record = mysqli_query($connect,$query);

$booked_array = array();
while( $row = mysqli_fetch_array($record)){

	$bookedseats = $row['seats'];

	$temp = explode(", ", $bookedseats);

	foreach ($temp as $value) {
		array_push($booked_array, $value);
	}
	
};



	 //check seats in the list
	 //$booked_seat = $row['booked_seat'];
	 $i=0;
	 // $book_seat_no=str_split($booked_seat);
	 $seat=array();
	 $check=array('0','1','2','3','4','5','6','7','8','9',
				  '10','11','12','13','14','15','16','17','18','19',
				  '20','21','22','23','24','25','26','27','28','29',
				  '30','31','32','33','34','35','36','37','38','39');
	 $disabled=array('enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled',
				     'enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled',
				     'enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled',
				     'enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled','enabled');
	 $seat_name=array("A1","B1","C1","D1","E1","F1","G1","H1","I1","J1",
					  "A2","B2","C2","D2","E2","F2","G2","H2","I2","J2",
					  "A3","B3","C3","D3","E3","F3","G3","H3","I3","J3",
					  "A4","B4","C4","D4","E4","F4","G4","H4","I4","J4");
	 
	 $l=count($booked_array);
	 for($x=0;$x<$l;$x++)
	 { 
		 $seat[$i]=$booked_array[$x];
		 for($j=0;$j<40;$j++)
		 {
			 if($seat[$i]==$seat_name[$j])
			 {
				 $check[$j]="reserved";
				 $disabled[$j]="disabled";
				 break;
			 }
		 }
		 $i++;
	 }
	 $available_seat=40-count($seat);

	$response .="<form action='buy_seat.php' name='seats' method='POST'>

				<div class='container-fluid'>
					<div class='row'>


						<div class='col-lg-4' style='border:px solid #079d49;background-color:#fff;border:2px solid #cccccc;border-radius:6px;padding:0;margin-left:40px;' >
							<div class='container-fluid' id='seat_block' style='margin-top:5%;margin-bottom:5%;color:;'>
								<div class='row info' style='margin-top:5%'>
									<div class='col-sm-4'><label class='reserved' style='padding-right: 100px;text-align: center;'><input type='checkbox' class='cust-checkbox' value='' disabled><span></span>Reserve Seat </label></div>

									<div class='col-sm-4'><label class='selected' style='padding-right: 100px;text-align: center;'><input type='checkbox' class='cust-checkbox'  value='' disabled><span></span>Selected Seat </label></div>

									<div class='col-sm-4'><label style='padding-right: 100px;text-align: center;'><input type='checkbox' class='cust-checkbox' value=''  disabled><span></span>Empty Seat </label></div>
									<i style='float:right;margin-left:86%'><img src='img/car_steering.jpg' style='width:30px;height:30px;'/></i>
								</div>

<!--check from the lists array-->
								<div class='container-fluid seats' style='margin-top:5%'>
									<div class='row'>
										<div class='col-sm-2'>
											<label class=".$check[0]."><input type='checkbox' class='cust-checkbox ".$disabled[0]."' value='A1' name='checkArr[]' id='a1'><span>A1</span></label>
											<label class=".$check[1]."><input type='checkbox' class='cust-checkbox ".$disabled[1]."' value='B1' name='checkArr[]' id='b1'><span>B1</span></label>
											<label class=".$check[2]."><input type='checkbox' class='cust-checkbox ".$disabled[2]."' value='C1' name='checkArr[]' id='c1'><span>C1</span></label>	
											<label class=".$check[3]."><input type='checkbox' class='cust-checkbox ".$disabled[3]."' value='D1' name='checkArr[]' id='d1'><span>D1</span></label>	
											<label class=".$check[4]."><input type='checkbox' class='cust-checkbox ".$disabled[4]."' value='E1' name='checkArr[]' id='e1'><span>E1</span></label>
											<label class=".$check[5]."><input type='checkbox' class='cust-checkbox ".$disabled[5]."' value='F1' name='checkArr[]' id='f1'><span>F1</span></label>
											<label class=".$check[6]."><input type='checkbox' class='cust-checkbox ".$disabled[6]."' value='G1' name='checkArr[]' id='g1'><span>G1</span></label>
											<label class=".$check[7]."><input type='checkbox' class='cust-checkbox ".$disabled[7]."' value='H1' name='checkArr[]' id='h1'><span>H1</span></label>
											<label class=".$check[8]."><input type='checkbox' class='cust-checkbox ".$disabled[8]."' value='I1' name='checkArr[]' id='i1'><span>I1</span></label>
											<label class=".$check[9]."><input type='checkbox' class='cust-checkbox ".$disabled[9]."' value='J1' name='checkArr[]' id='j1'><span>J1</span></label>
										</div>
										<div class='col-sm-2'>
											<label class=".$check[10]."><input type='checkbox' class='cust-checkbox ".$disabled[10]."' value='A2' name='checkArr[]' id='a2'><span>A2</span></label>
											<label class=".$check[11]."><input type='checkbox' class='cust-checkbox ".$disabled[11]."'value='B2' name='checkArr[]' id='b2'><span>B2</span></label>
											<label class=".$check[12]."><input type='checkbox' class='cust-checkbox ".$disabled[12]."' value='C2' name='checkArr[]' id='c2'><span>C2</span></label>	
											<label class=".$check[13]."><input type='checkbox' class='cust-checkbox ".$disabled[13]."' value='D2' name='checkArr[]' id='d2'><span>D2</span></label>
											<label class=".$check[14]."><input type='checkbox' class='cust-checkbox ".$disabled[14]."' value='E2' name='checkArr[]' id='e2'><span>E2</span></label>
											<label class=".$check[15]."><input type='checkbox' class='cust-checkbox ".$disabled[15]."' value='F2' name='checkArr[]' id='f2'><span>F2</span></label>
											<label class=".$check[16]."><input type='checkbox' class='cust-checkbox ".$disabled[16]."' value='G2' name='checkArr[]' id='g2'><span>G2</span></label>
											<label class=".$check[17]."><input type='checkbox' class='cust-checkbox ".$disabled[17]."' value='H2' name='checkArr[]' id='h2'><span>H2</span></label>
											<label class=".$check[18]."><input type='checkbox' class='cust-checkbox ".$disabled[18]."' value='I2' name='checkArr[]' id='i2'><span>I2</span></label>
											<label class=".$check[19]."><input type='checkbox' class='cust-checkbox ".$disabled[19]."' value='J2' name='checkArr[]' id='j2'><span>J2</span></label>					
										</div>
										<div class='col-sm-3'>
										</div>
										<div class='col-sm-2'>
											<label class=".$check[20]."><input type='checkbox' class='cust-checkbox' value='A3' name='checkArr[]' id='a3'><span>A3</span></label>
											<label class=".$check[21]."><input type='checkbox' class='cust-checkbox' value='B3' name='checkArr[]' id='b3'><span>B3</span></label>
											<label class=".$check[22]."><input type='checkbox' class='cust-checkbox' value='C3' name='checkArr[]' id='c3'><span>C3</span></label>	
											<label class=".$check[23]."><input type='checkbox' class='cust-checkbox' value='D3' name='checkArr[]' id='d3'><span>D3</span></label>
											<label class=".$check[24]."><input type='checkbox' class='cust-checkbox' value='E3' name='checkArr[]' id='e3'><span>E3</span></label>
											<label class=".$check[25]."><input type='checkbox' class='cust-checkbox' value='F3' name='checkArr[]' id='f3'><span>F3</span></label>
											<label class=".$check[26]."><input type='checkbox' class='cust-checkbox' value='G3' name='checkArr[]' id='g3'><span>G3</span></label>
											<label class=".$check[27]."><input type='checkbox' class='cust-checkbox' value='H3' name='checkArr[]' id='h3'><span>H3</span></label>
											<label class=".$check[28]."><input type='checkbox' class='cust-checkbox' value='I3' name='checkArr[]' id='i3'><span>I3</span></label>
											<label class=".$check[29]."><input type='checkbox' class='cust-checkbox' value='J3' name='checkArr[]' id='j3'><span>J3</span></label>					
										</div>
										<div class='col-sm-2'>
											<label class=".$check[30]."><input type='checkbox' class='cust-checkbox' value='A4' name='checkArr[]' id='a4'><span>A4</span></label>
											<label class=".$check[31]."><input type='checkbox' class='cust-checkbox' value='B4' name='checkArr[]' id='b4'><span>B4</span></label>
											<label class=".$check[32]."><input type='checkbox' class='cust-checkbox' value='C4' name='checkArr[]' id='c4'><span>C4</span></label>	
											<label class=".$check[33]."><input type='checkbox' class='cust-checkbox' value='D4' name='checkArr[]' id='d4'><span>D4</span></label>
											<label class=".$check[34]."><input type='checkbox' class='cust-checkbox' value='E4' name='checkArr[]' id='e4'><span>E4</span></label>
											<label class=".$check[35]."><input type='checkbox' class='cust-checkbox' value='F4' name='checkArr[]' id='f4'><span>F4</span></label>
											<label class=".$check[36]."><input type='checkbox' class='cust-checkbox' value='G4' name='checkArr[]' id='g4'><span>G4</span></label>
											<label class=".$check[37]."><input type='checkbox' class='cust-checkbox' value='H4' name='checkArr[]' id='h4'><span>H4</span></label>
											<label class=".$check[38]."><input type='checkbox' class='cust-checkbox' value='I4' name='checkArr[]' id='i4'><span>I4</span></label>
											<label class=".$check[39]."><input type='checkbox' class='cust-checkbox' value='J4' name='checkArr[]' id='j4'><span>J4</span></label>					
										</div>
									</div>
								</div>
						</div>
						</div>

				

						<div class='col-lg-5' style='padding-left:15%;padding-bottom:2%;list-style:none;'>

							<input type='hidden' name='busArr[id]' value=".$bus_id.">

							<h5 class='card-title'>".$bus_company."</h5>
							<li class='text-muted'>Time: ".$time."</li>
							<li class='text-muted'>Date: ".$date."</li>
							<li class='card-text'><medium class='text-muted'>Bus No: ".$bus_no."</medium></li>
							<li class='card-text' style='margin-top:2%' name='start' id='start'>".$start." - ".$end."</li>
							<li class='card-text' style='margin-top:2%'>Fare (per seat): ".$fare."</li>
							<li class='card-text' style='margin-top:2%'>No. available seats: ".$available_seat."</li>

							<button class='btn btn-sm' style='margin-top:180%;margin-left:120%;background-color:#3f301d;color:#f6eee2;' name='submit' >Book Seat</button>

							</div>
					</div>
				</div>
			</form>";
}
$response .= "</div>";

echo $response;


exit;

