<!DOCTYPE html>
<html>
	<title>Bus Services</title>
	<link rel="icon" href="img/Land Asia Logo.png" />
	<head>
		<?php include "linker.php";?>
		<style> 
			#index .container-fluid
			{
				padding:2%;
				margin:2%;
				border-radius:0px;
				margin-top:2%;
				border-radius:10px;
				box-shadow:0px 0px 0px #999999;
			}
			#info:hover
			{
				box-shadow:	0px 0px 0px #999999;
			}
			#search_part
			{
				background-image:url(img/hero.jpg);
				background-repeat:no-repeat;
				background-size:100%;
				height:0%
				width:100%;
				margin:0;
				padding:0;
				background-attachment:fixed;
			}
			#index hr{hheight:6px;background-color:#3f301d;}
			
			#btn {
			color: #f6eee2;
			background-color: #3f301d;
			border-color: #3f301d;}
			
			#btn:hover{
			background: #3f301d;
			color:#de9e48
			border-color: #3f301d;
			}
			

			
		</style>		
	</head>

	<body>
		<div class='row' style='margin:0;padding:0;border-radius:0px;' id="index">
			<div class='container-fluid' id='search_part' style='padding:0;margin:0;border-radius:0px;'>
				<div class='row' style='margin:0;padding-top:5%;padding-bottom:5%;margin-top:%;'>
                
					<div class='col-lg-4' style='border-radius:6px;margin-left:525px;padding:2%;margin-top:%;margin-bottom:%;background-color:rgba(0,0,0,1.6);background-color:#f6eee2;'>

						<form  action="search_result.php" name="bus_search_form" method="POST" onsubmit="return check(this)">	
							<div class="container" style='font-weight:bold;'>
								<h5>
									<label style="color:#3f301d"><a name="pickbus"></a>Pick Your Bus</label>
								</h5>
								<label style="margin-left:px;font-style:bold;color:black">From:</label>
									<select  style="margin-top:px;color:#333333;"  class='form-control' id="source" name="source">
										<option value="|">Origin</option>
										<option value="Kota Bahru">Kota Bahru</option>
										<option value="Kuala Besut">Kuala Besut</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Kuala Terengganu">Kuala Terengganu</option>
										<option value="Muar">Muar</option>	
										<option value="Nilai">Nilai</option>
										<option value="Penang">Penang</option>		
										<option value="Putrajaya">Putrajaya</option>
										<option value="Raub">Raub</option>
										<option value="Setiu">Setiu</option>			
										<option value="Shah Alam">Shah Alam</option>
										<option value="Sungai Petani">Sungai Petani</option>
									</select>
								<label style="margin-left:px;margin-top:10px;color:black">To:</label>
									<select  style="margin-top:px;color:#333333;"  class='form-control' id="dstn" name="dstn"placeholder="Select option">
										<option value="|">Destination</option>
										<option value="Kemaman">Kemaman</option>
										<option value="Klang">Klang</option>
										<option value="Kuala Kangsar">Kuala Kangsar</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Kuantan">Kuantan</option>	
										<option value="Malacca">Malacca</option>
										<option value="Pasir Putih">Pasir Putih</option>
										<option value="Perlis">Perlis</option>
										<option value="Putrajaya">Putrajaya</option>
										<option value="Rantau Panjang">Rantau Panjang</option>	
										<option value="Seremban">Seremban</option>
										<option value="Teluk Intan">Teluk Intan</option>
										
									</select>			
								<label style="margin-left:px;margin-top:10px;color:black">Date of Journey:</label>
									<input  class='form-control' type ="date" name="journey_date"  value="journey_date"/>
									
								<label style="margin-left:px;margin-top:10px;color:black">Coach Type(optional):</label>
									<select  style="margin-top:px;color:#333333;" id="type" class='form-control' name="type">
										<option value="all">All</option>
										<option value="standard">Standard</option>
										<option value="executive">Executive</option>
									</select>
								<h4><p style="margin-left:px;margin-top:20px;color:#3f301d">
								<input style="width:100%" class="btn btn-success" type="submit" name="submit" id="btn" onclick='check()' value="Search Bus"></input>
								</h4>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
			<div class='container-fluid text-center' id='info'>
				<div class='row' style='margin:0;padding-top:2rem;padding-bottom:2rem; background: #fff; right:0%;'>
					<div class="col-12">
					<h1></h1>
					<h1>Why Book With Us?</h1>
					<hr style="height:2px;border-width:0;width:70%;color:#3f301d;background-color:#3f301d;">
					</div>
					
					<!--- Three Column Section -->
<div class="container-fluid padding" style="padding-top:2rem" >
<div class="row text-center padding">
	<div class="col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-shield-alt" style="font-size:48px;color:#de9e48;"></i>
		<p>
		<h4>Safe and Secure Payment</h4>
		<p>
		<p>LandAsia has the highest security standards and keeps your information and purchases completely safe and secure.</p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-handshake" style="font-size:48px;color:#de9e48;"></i>
		<p>
		<h4>Trustworthy</h4>
		<p>
		<p>With the experience within the transportation industry, we have established a strong background history through our success and is always aiming to deliver only quality services.</p>
	</div>
	<div class="col-sm-12 col-md-4">
		<i class="fas fa-tags"style="font-size:48px;color:#de9e48;"></i>
		<p>
		<h4>Honest Price</h4>
		<p>
		<p>Select from a range of payment options and currencies made available to help you make your purchase conveniently.</p>
	</div>
	
</div>
<hr class="my-4">
</div>




				</div>
			</div>
			


			<div class='container-fluid text-center' id='info'>
				<div class='row' style='margin:0;padding-top:1rem; background: #fff; right:0%;'>
					<div class="col-12">
					<h1></h1>
					<h1>Available Bus Routes</h1>
					<hr style="height:2px;border-width:0;width:70%;color:#3f301d;background-color:#3f301d;">
					</div>
					</div>
			
				<div class='row' style='margin-left:180px;padding-bottom:2rem;padding-top:2rem;list-style:none; text center; '>
					<div class='col-lg-4 text-left'>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Kuala Lumpur - Malacca</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Putrajaya - Kuala Kangsar</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Muar - Kuantan</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Penang - Seremban</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Setiu - Putrajaya</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Kota Bahru - Kemaman</li>
					</div>
					<div class='col-lg-4 text-left'>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Sungai Petani - Perlis</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Kuala Besut - Teluk Intan</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Shah Alam - Rantau Panjang</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Raub - Kuala Lumpur</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Kuala Terengganu - Klang</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Nilai - Pasir Puteh</li>
					</div>
					<div class='col-lg-4 text-left'>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Pekan - Penang</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Perlis - Shah Alam</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Dungun - Malacca</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Machang -Kuantan</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Johor Bahru - Singapore</li>
						<li><img src="img/location.png"  style="width:25px;height:15px;margin-top:-4px;">Pasir Gudang - Setiu</li>
					</div>
				</div>
			</div>	
		
	
</body> 

	
		
  		<?php include "footer.php";?>

	</body>
</html>