<!doctype html>
<?php
include('google-sign-in.php');
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
					<li class="nav-item mx-md-2"> <a class="nav-link" href="index.php">Home </a> </li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="#about"> About Us</a></li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="#"> Services</a></li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="#"> Contact Us </a></li>
					<li class="nav-item mx-md-2"><a class="nav-link" href="login.html"> Login </a></li>
				</ul>
			</div> <!-- navbar-collapse.// -->
		</nav>
	</div>
</header>

<!----
============================
		LOGIN FORM
============================
-->
<section id="login-form">
	<div class="container"><p class="p text-center">registration form</p>
		<div class="login-bg mx-auto py-5 px-md-5 px-sm-2">
			<form class="mx-auto" style="max-width:500px;">
				
				<div class="form-group row px-1 m-0 w-100">
					<div class="col-12 my-2 p-0 w-100">
						<input type="text" class="form-control w-100" id="inputEmail3" placeholder="Name">
					</div>
				  <div class="col-12 my-2 p-0 w-100">
					<input type="text" class="form-control w-100" id="inputEmail3" placeholder="Mobile No">
				  </div>

				  <div class="col-12 my-2 p-0 w-100">
					<input type="email" class="form-control w-100" id="inputEmail3" placeholder="Email">
				  </div>

				  <div class="col-12 my-2 p-0 w-100">
					<input type="password" class="form-control w-100" id="inputEmail3" placeholder="password">
				  </div>

				  <div class="col-12 my-2 p-0">
					<input type="password" class="form-control" id="inputPassword3" placeholder="conform Password">
				  </div>

				  <div class="col-12 my-2 p-0">
					<div class="row text-center">
						<div class="col">
							<button type="submit" class="btn btn-primary w-75">Sign Up</button>
						</div>
						<div class="col">
							<button type="reset" class="btn btn-primary w-75">Cancel</button>
						</div>
					</div>
				  </div>
				</div>
			</form>
			<p class="or text-center my-4">-------------or---------------</p>
				<div id="google-btn" class="row text-center">
					<div class="col">
						<a href="<?php echo $Goo_client->createAuthUrl(); ?>">
							<button type="submit" class="btn btn-default w-75">
							<img src="images/google-logo-32.ico" width="25px" height="25px"> Sign Up with Google
							</button>
						</a>
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
				<h2 class="text-md-left text-sm-center">Important link</h2>
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