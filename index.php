<!doctype html>
<?php
include('db_connection.php');
include('google-sign-in.php');
//echo (isset($login_btn));
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Room for rent</title>

	<!-- favicon-->
	<link rel="icon" href="images/building.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- slick css --->
	<link rel="stylesheet" href="css/slick-theme.min.css"/>
	<link rel="stylesheet" href="css/slick.min.css"/>
	<link rel="stylesheet" href="css/slick.css"/>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/47.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- Animate CSS-->
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	<!--Google font-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
	
	<!-- custome css -->
	<link rel="stylesheet" href="my-custom.css" />
  </head>
 <body class="main-body" onload="showTime()">
<!----
============================
	TOP-HEADER
============================
-->
 <section class="top-header">
	<div class="container-fluid">
		<div class="d-flex justify-content-between">
			<div class="top-contact" style="height: 40px !important; padding-top:8px;">
				<p id="timer" class="">Timer Here</p>
			</div>

			<div class="social-media d-flex justify-content-center">
				<div class="p-2"><i class="fa fa-facebook "></i></div>
				<div class="p-2"><i class="fa fa-twitter "></i></div>
				<div class="p-2"><i class="fa fa-instagram "></i></div>
				<div class="p-2"><i class="fa fa-linkedin "></i></div>
			</div>
		</div>
	</div>
</section> 

<!----
============================
			NAVBAR
============================
-->
<header class="navigation sticky-top">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark p-0 my-0">
			<a class="navbar-brand" href="#"><img src="images/rooms-logo.png" class="img-fluid w-100"></a>
			<button id="nav-btn" class="navbar-toggler" type="button">
				<i class="fa fa-bars"></i><!--<i class="fa fa-arrow-down"></i><i class="fas fa-arrow-up"></i>-->
			</button>
			
			<div class="collapse navbar-collapse justify-content-end my-0 py-0 h-100" id="main_nav">
				<ul class="navbar-nav p-0 m-0 h-100">
					<li class="nav-item mx-md-2"> <a class="nav-link" href="#">Home </a> </li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="#about"> About Us</a></li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="#"> Services</a></li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="#"> Contact Us </a></li>
					<?php
						if(isset($_SESSION['login_btn'])){
					?>
						
						<li class="nav-item mx-md-2 bg-info"><a class="nav-link" href="#" data-toggle="modal" data-target="#publishModel" >publish </a></li>
						<li class="nav-item dropdown mx-md-2">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"> <img src="<?php echo ($_SESSION['user_image']); ?>" style="width: 20px;height: 20px;border-radius:50px;border:1px solid #FF9800;"> </a>

						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color:#FF9800;">
							<a class="dropdown-item" href="#"><?php echo ($_SESSION['user_first_name']); 
        echo ($_SESSION['user_last_name']); ?></a>
							<a class="dropdown-item" href="#"><?php echo ($_SESSION['user_email_address']); ?></a>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#publishModel" >Publish</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>

					

					<?php }else{ ?>
						<li class="nav-item mx-md-2"><a class="nav-link" href="login.php"> Login </a></li>	
					<?php } ?>
				</ul>
			</div> <!-- navbar-collapse.// -->
		</nav>
	</div>
</header>

<!--model for publish form-->
<!-- Modal -->
<div class="modal fade" id="publishModel" tabindex="-1" role="dialog" aria-labelledby="publishModel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content w-100">
		<div class="modal-header">
			<h5>Fill your Rooms details</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>

		<div class="modal-body">
			<form action="upload-data.php" method="post" enctype="multipart/form-data">
				<div>
					<div class="form-group">
						<input type="text" class="form-control" id="Address" name="f_address" value="" placeholder="Rooms address" required>
					</div>

					<div class="form-group">
						<select class="select-city form-control" name="city" value="" required>
							<option selected>Select city</option>
							<option value="Allahabad">Allahabad (Now Prayagraj)</option>
							<option value="Lucknow">Lucknow</option>
							<option value="Patna">Patna</option>
						</select>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<select class="lodge-type form-control" name="l_type" value="" required>
								<option selected>Type...</option>
								<option value="Lodge">Lodge</option>
								<option value="PG">PG</option>
								<option value="1 BHK">1 BHK</option>
								<option value="2 BHK">2 BHK</option>
								<option value="3 BHK">3 BHK</option>
							</select>
						</div>

						<div class="form-group col-md-6">
							<select class="for-which form-control" name="for_which" value="" required>
								<option selected>For which</option>
								<option value="Boys only">Boys only</option>
								<option value="Girls only">Girls only</option>
								<option value="Both B/G">Both B/G</option>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
						<input type="number" class="form-control" id="rent" name="rent" value="" placeholder="Rent per head" required>
						</div>

						<div class="form-group col-md-6">
						<input type="text" class="form-control" id="contact" name="mob_no" value="" placeholder="Mobile No." required>
						</div>
					</div>
					
					<div class="form-group">
						<textarea class="form-control" rows="2" name="disc" value="" placeholder="Description" required
						></textarea>
					</div>

					<div class="form-group d-none">Facility
						<div class="form-check d-flex justify-content-around">
							<div>
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">Check me out</label>
							</div>
							<div>
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">Check me out</label>
							</div>
							<div>
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">Check me out</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<input type="file" class="form-control" id="image" name="img_file[]" value="" multiple required>
					</div>
					
					<div id="google-btn" class="row text-center">
						<div class="col">
							<button type="submit" name="upload_btn" class="btn w-75">submit</button>
						</div>
					</div>
				</div>
		</form>
		</div>
	  </div>
	</div>
  </div>


<!----
============================
FILTER AREA
============================
-->
<section id="filter" class="p-0 mt-2"> 
	<div class="container">
		<div class="row">
			<div class="col-md-12 py-md-3 py-sm-3">
				<div class="py-5 px-md-5 px-sm-2">
					<form>
						<div class="form-row">
						  <div class="col py-2">
							<input type="text" class="form-control h-100" value="UP" placeholder="Uttar Pradesh" readonly>
						  </div>
						  <div class="col-md-5 py-2">
							  <select class="form-control">
								<option selected>Select city</option>
								<option value="Allahabad">All</option>
								<option value="Allahabad">Allahabad (Now Prayagraj)</option>
								<option value="Lucknow">Lucknow</option>
								<option value="Patna">Patna</option>
							  </select>
						  </div>
						  <div class="col-md-3 py-2">
							<input class="btn btn-primary w-100 h-100" type="submit" value="Search">
						  </div>
						</div>
					  </form>
				</div>
			</div>
<!--
			<div class="col-md-4 bg-info py-5 d-none">
				<div class="px-md-5 px-sm-3">
					<input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
				</div>
			</div>-->
		</div>
		
	</div>
</section>

<!----
============================
		ROOMS AREA
============================
-->

<section id="rooms-area" class="p-0 mt-2">
	<div class="container">
		<div class="rooms-row row">
<?php 
$select="Select * from user_data";
$fetched_data=$conn->query($select);
//var_dump($fetched_data);
if ($fetched_data->num_rows > 0){
    // output data of each row
    while($row = $fetched_data->fetch_assoc()){
      //echo $row["id"]. " " . $row["name"]. " " . $row["mob"]. " " . $row["email"]. " " . $row["title"] . $row["f_address"]. " " . . " " . $row[""]. " " . $row["For_which"]. " " . $row[""]. " " . $row["photo"]. " " . $row["description"]."<br>";
  
		?>
			<div class="col-sm-12 col-md-4 col-lg-3 m-0 p-2">
				<div id="<?php echo $row["id"]; ?>" class="tm-box m-0 p-0">
					<div class="img-box mx-auto">	
						<a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?php echo "uploaded-images/".$row["id"]."_0.jpeg"; ?>" class="img-fluid w-100 h-100"></a>
					</div>
					
					<div class="name-box mx-auto p-0 m-0">
						<div class="row p-0 m-0 border-0">
						 	<div class="col-6 p-1">
							 	<div class=""><span>Location</span><h4><?php echo $row["city"]; ?></h4></div>
							 </div>
							 <div class="col-6 p-1">
							 	<div><span>Rent</span><h4><?php echo $row["rent"]; ?></h4></div>
							</div>
							 <div class="col-6 p-1">
							 	<div><span>Type</span><h4><?php echo $row["city"]; ?></h4></div>
							</div>
							<div class="col-6 p-1">
								<div><span>For which</span><h4><?php echo $row["room_type"]; ?></h4></div>
							</div>
							<div class="col-12 p-1">
								<button class="btn btn-info btn-sm w-100 text-white">call now (<?php echo $row["mob"]; ?>)</button>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php   
}
} else {
    echo "0 results";
  }
  ?>
		</div>
	</div>

	<!-- Button trigger modal -->
  <?php 

  ?>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	  <div class="modal-content w-100">
		<div class="modal-header">
			<div class="row w-100">
				<div class="col-4 text-center">
					<div><i class="fa fa-location-arrow"></i><h6></h6>Allahabad</div>
				</div>
				<div class="col-4 text-center">
					<div><i class="fa fa-male"></i></i><i class="fa fa-female"></i><h6></h6>
						Girl/Boy
					</div>
					
				</div>
				<div class="col-4 text-center">
					<div><i class="fa fa-building"></i><h6></h6>
						1 BHK
					</div>
					
				</div>
				<div class="col-4 text-center">
					<div><i class="fa fa-bed"></i><h6></h6>
						Lodge
					</div>
					
				</div>
				<div class="col-4 text-center">
					<div><i class="fa fa-whatsapp"></i><h6></h6>
						Massage
					</div>
					
				</div>
				<div class="col-4 text-center">
					<div><i class="fa fa-phone-square"></i><h6></h6>
						Call Now
					</div>
					
				</div>
				<div class="col-4 text-center">
					<div><i>Rent</i><h6></h6>3000</div>
					
				</div>
				
			</div>
		  
		  
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>

		<div class="modal-body p-0">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="0">
				<div class="carousel-inner">
				  <div class="carousel-item active">
					<img src="images/banner1.png" class="d-block w-100" alt="...">
					
				  </div>

				  <div class="carousel-item">
					<img src="images/banner2.png" class="d-block w-100" alt="...">
					
				  </div>

				  <div class="carousel-item">
					<img src="images/banner3.png" class="d-block w-100" alt="...">
					
				  </div>

				  <div class="carousel-item">
					<img src="images/banner4.png" class="d-block w-100" alt="...">
					
				  </div>

				  <div class="carousel-item">
					<img src="images/banner5.png" class="d-block w-100" alt="...">
				  </div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
		</div>

		<div class="modal-footer">
			<div class="text-left w-100">
				Discreption
			</div>
		</div>
	  </div>
	</div>
  </div>

  <?php

  ?>
</section>

<!----
============================
 ABOUT US
============================
-->
<section id="about" class="px-1 mt-2">
	<div class="container">
		<div class="row m-0 p-0">
			<div class="col-md-6 col-sm-12">
				<div id="about-img" class="mx-auto my-2" style="width:300px;border-radius:300px;overflow:hidden;">
					<img src="images/rampal2.jpg" class="img-fluid">
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<div class="my-2">
					<h2 class="">About us</h2>
					<p class="text-justify">
						नमस्कार दोस्तों आपका हमारे वेबसाइट पर स्वागत है। दोस्तों इस वेबसाइट को बनाने का मुख्त उद्देश्य है की स्टूडेंट्स को बड़े ही आसानी से उनके अफोर्टेबल रेंज में रूम्स उपलब्ध कराना है। यह साइट मुख्ततः तीन शहर इलाहाबाद , पटना और लखनऊ के लिए ही बनाई गयी है क्योकि बड़े शहरो जैसे दिल्ली और मुंबई में तो आपको रूम्स प्रोवाइड कराने के लिए तो वेबसाइट और एप्प मिल जाते है लेकिन इलाहाबद जैसे शहर में स्टूडेंट्स को रूम्स खोजने में बहुत दिक्क्त होती है। जब मैं इलाहाबाद में पढ़ता था तो मुझे भी काफी दिक्कत होती थी।  इन जगहों पर स्टूडेंट्स तो धुप में घूम घूम कर पूछना पड़ता है की " आपके यहां रूम खाली है क्या " या अक्सर जिस मकान मालिक के यहां  रूम खाली है वहां स्टूडेंट्स पहुंच ही नहीं पाते है। इससे मकान मालिकों और स्टूडेंट्स दोनों को दिक्कत होती है। इसलिए मैंने सोचा क्यों न एक ऐसा प्लेटफॉर्म बनाया जाये जहा किरायेदार और मकान मालिक दोनों मिल कर  अपनी आवश्यकताओ की पूर्ति कर सके। दोस्तों "www.roomsforrent.com " एक ऐसा ही नॉन प्रॉफिटेबल प्लेटफार्म है जहा आप बिना किसी चार्ज के रूम्स खोज सकते है और अगर आप मकान  मालिक है तो अपने रूम्स को लाइव भी कर  सकते है जिससे आपका रूम्स जल्दी से उठ जाते है।  
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!----
============================
		FOOTER
============================
-->
<footer class="footer p-0 mt-2">
	<div class="container">
		<div class="row">
			<div class="disclaimer col-sm-12 col-md-4 text-center p-4">
				<h2 class="text-md-left text-sm-center">Services</h2>
				<p class="text-sm-center ">
					<ul class="text-md-left">
						<li>Web development</li>
						<li>Web designing</li>
						<li>Digital marking</li>
						<li>SEO</li>
						<li>Advertising</li>
					</ul>
				</p>
			</div>

			<div class="imp-link col-sm-12 col-md-4 text-center p-4">
				<h2 class="text-md-left text-sm-center">Pages</h2>
				<p class="text-sm-center ">
					<ul class="text-md-left">
						<li>About us</li>
						<li>Contact us</li>
						<li>Privacy policy</li>
						<li>DCMA</li>
					</ul>
				</p>
			</div>

			<div class="address col-sm-12 col-md-4 text-center p-4">

				<h2 class="text-md-left text-sm-center">contact us</h2>
				<p class="text-sm-center text-md-left">
					<span>Address :</span>
					Chandpur salori Allahabad near IERT Field<br>
					<span>E-Mail :</span> kripalram91@gmail.com<br>
					<span>Phone No. :</span> +91 9984905836
				</p>
			</div>
		</div>
<!--copyright section-->
<hr class="style-seven">

		<div class="row">
			<div class="col-sm-12 col-md-6 text-center m-0 py-2">
				<h6><i class="fa fa-copyright" aria-hidden="true"> 2021 Ramkripal & All Rights Reserved</i></h6>
				
			</div>
			<div class="col-sm-12 col-md-6 text-center m-0 py-2">
				<h6>Powered By Ramkripal</h6>
			</div>
		</div>
	</div>
</footer>

<div id="preloader"></div>

<!----
============================
JAVA SCRIPT FILES FROME HERE
============================
-->

<!-- JQuery min.js ---->
<script src="js/jquery.min.js"></script>

<!-- JQuery proper .js ----------->
<script src="js/popper.min.js"></script>

<!-- then Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>

<!---- slick .js file --------------->
<script src="js/slick.min.js"></script>

<!---- slick .js file --------------->
<script src="js/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
/*	wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0,          // default
            mobile:       true,       // default
            live:         true        // default
        })wow.init();*/
</script>

<script>
	new WOW().init();
</script>

<!--- custorm .js file --------->
<script src="my-custom.js"></script>

  </body>
</html>