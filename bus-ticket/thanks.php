<!DOCTYPE html>

<html>
	<title>Thanks for Subscribe</title>
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
	<body>
					
				
				
				<div class='row' style='margin:0;padding:0;border-radius:0px; padding-top:100px;' id="thankyou">
					<div class='col-lg-4' style='border-radius:6px;margin-left:525px; box-shadow:5px 5px 5px #3f301d; padding:2%;margin-top:%;margin-bottom:5%;background-color:rgba(0,0,0,1.6);background-color:#f6eee2;'>
						<center><h2>Thanks for your subscription!</h2>
						<h5>Please enjoy more updates from us!</h5>
						<img src="img/busgif2.gif" class='center' style='height:70%;'>
					<center><a style="width:20%;margin-top:2%;color:#f6eee2; background-color:#3f301d; border-color:#3f301d;" href='index.php' class="btn btn-primary  <?php echo $disabled; ?>">Home</a><br>
					</div>
				</div>
				
<?php


$sub_email = $_POST['email'];

if(isset($_POST['submit']))

{
	$connect = mysqli_connect("localhost","shin","123456","bus_ticket_web","3307");

$sql = "INSERT INTO subscribe (sub_email) VALUES ('$sub_email')";

      mysqli_query($connect, $sql);

}

?>


	</body>
</html>			
<?php include "footer2.php"; ?>	