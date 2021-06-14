<!-- ======= Footer ======= -->

 <footer id="footer">


<style>
footer {
  background: #fff;
  padding: 0 0 30px 0;
  color: #de9e48;
  font-size: 14px;
  background: #3f301d
}

footer .footer-newsletter {
  padding: 50px 0;
  background: #f6eee2;
  text-align: center;
  font-size: 15px;
  color: #000000;
}

footer .footer-newsletter h4 {
  font-size: 24px;
  margin: 0 0 20px 0;
  padding: 0;
  line-height: 1;
  font-weight: 600;
  color: #000000;
}

footer .footer-newsletter form {
  margin-top: 30px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.06);
  text-align: left;
}

footer .footer-newsletter form input[type="email"] {
  border: 0;
  padding: 4px 8px;
  width: calc(100% - 100px);
}

footer .footer-newsletter form input[type="submit"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  background: #3f301d;
  color: #f6eee2;
  transition: 0.3s;
  border-radius: 0 4px 4px 0;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

footer .footer-newsletter form input[type="submit"]:hover {
  background: #3f301d;
  color: #de9e48;
}

footer .footer-top {
  padding: 60px 0 30px 0;
  background: #fff;
}

footer .footer-top .footer-contact {
  margin-bottom: 30px;
}

footer .footer-top .footer-contact h3 {
  font-size: 24px;
  margin: 0 0 15px 0;
  padding: 2px 0 2px 0;
  line-height: 1;
  font-weight: 700;
}

footer .footer-top .footer-contact h3 span {
  color: #106eea;
}

footer .footer-top .footer-contact p {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 0;
  font-family: "Roboto", sans-serif;
  color: #777777;
}

footer .footer-top h4 {
  font-size: 16px;
  font-weight: bold;
  color: #444444;
  position: relative;
  padding-bottom: 12px;
}

footer .footer-top .footer-links {
  margin-bottom: 30px;
}

footer .footer-top .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

footer .footer-top .footer-links ul i {
  padding-right: 2px;
  color: #106eea;
  font-size: 18px;
  line-height: 1;
}

footer .footer-top .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}

footer .footer-top .footer-links ul li:first-child {
  padding-top: 0;
}

footer .footer-top .footer-links ul a {
  color: #777777;
  transition: 0.3s;
  display: inline-block;
  line-height: 1;
}

footer .footer-top .footer-links ul a:hover {
  text-decoration: none;
  color: #106eea;
}

footer .footer-top .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #3f301d;
  color: #f6eee2;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 4px;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}

footer .footer-top .social-links a:hover {
  background: #3f301d;
  color: #de9e48;
  text-decoration: none;
}

footer .copyright {
  text-align: center;

}




</style>

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe for more promotion and benefit!</p>
            <form action="thanks.php" name = "subscribeform" method="post">
              <input type="email" name="email" id="email">
              <input type="submit" name="submit" id="submit" value="Subscribe">
			  			<!-- <?php
			// 			$connect=mysqli_connect("localhost","shin","123456","bus_ticket_web", "3307");
			// 			if(isset($_POST['submit'])){
			// 	if(empty($_POST['email'])){
			// 		$errors['email']='An email is required<br/>';
			// 	}else{
			// 		$email=$_POST['email'];
			// 		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			// 			$errors['email']='Email must be a valid email address';
			// 		}
			// 	}
			// 	if(array_filter($errors)){
			// 	}
			// 	else{
					
					
			// 		$sub_email=mysqli_real_escape_string($connect,$_POST['email']);
			// 		$sql= "INSERT INTO subscribe(sub_email) VALUES('$sub_email')";
			// 		$result=mysqli_query($connect,$sql);
			// 		if(mysqli_query($connect,$sql)){header('location:index.php');}
			// 		else{echo'query error: '.mysqli_error($connect);}
					
			// 	}
				
			// }



				?> -->
            </form>

          </div>
        </div>
      </div>
    </div>
	



    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>LandAsia<span></span></h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +60169629213<br>
              <strong>Email:</strong> LandAsia@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="busoperators.php">Bus Operators</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="howtobook.php">How To Book</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about_us.php">About Us</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Plan your Journey</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Buy Ticket</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Come and visit for more exciting experience!</p>
            <div class="social-links mt-3" >
			  <a href="https://www.facebook.com/fikaflowerlandscape/"><i class="fab fa-facebook"></i></a>
			  <a href="https://twitter.com/BTS_twt/"><i class="fab fa-twitter"></i></a>
		      <a href="https://www.google.com"><i class="fab fa-google-plus-g"></i></a>
		      <a href="https://www.instagram.com/bts.bighitofficial/?hl=en/"><i class="fab fa-instagram"></i></a>
		      <a href="https://www.youtube.com/watch?v=YLXfyHsfFz0"><i class="fab fa-youtube"></i></a>

            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright text-center">
        &copy; Copyright <strong><span>LandAsia</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->
