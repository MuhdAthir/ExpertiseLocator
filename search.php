<?php

include( 'rest/dbConn.php' );
include( 'rest/function.php' );

$expert = loopSQL( $aida, "SELECT * FROM expert e, department d, areaofexpertise aoe WHERE (e.department = d.department_id AND e.areaofexpertise = aoe.aoe_id)" );
$aoe = loopTable( $aida, "areaofexpertise" );

?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Search - Expertise Finder System</title>
	<meta content="" name="descriptison">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: Moderna - v2.0.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top ">
		<div class="container">

			<div class="logo float-left">
				<h1 class="text-light"><a href="index.php"><span>Expertise Finder System</span></a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
			</div>

			<nav class="nav-menu float-right d-none d-lg-block">
				<ul>
					<li><a href="index.php">Home</a>
					</li>
				</ul>
			</nav>
			<!-- .nav-menu -->

		</div>
	</header>
	<!-- End Header -->

	<main id="main">

		<!-- ======= Search bar Section ======= -->
		<section class="breadcrumbs">
			<div class="container">

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Search by:</span>
					</div>
					<select class="form-control" ng-model="searchopt">
						<option value="1">Name</option>
						<option value="2">Education Level</option>
						<option value="3">Position</option>
						<option value="4">Year of Experience</option>
						<option value="5">Department</option>
					</select>
					<input ng-if="searchopt == 1" type="text" class="form-control" placeholder="Expertise Name" id="expname">
					<select ng-if="searchopt == 2" class="form-control" id="explevel">
						<option value="Secondary">Secondary</option>
						<option value="Pre-university programme">Pre-university programme</option>
						<option value="Special Skills Certificate">Special Skills Certificate</option>
						<option value="Diploma">Diploma</option>
						<option value="Bachelor Degrees">Bachelor Degrees</option>
						<option value="Master Degrees">Master Degrees</option>
						<option value="Doctor of Philosophy degrees">Doctor of Philosophy degrees</option>
					</select>
					<select ng-if="searchopt == 3" class="form-control" id="expposition">
						<option>Junior</option>
						<option>Senior</option>
					</select>
					<input ng-if="searchopt == 4" id="expyear" type="number" min="1" class="form-control" placeholder="Year of Experience">
					<select ng-if="searchopt == 5" class="form-control" id="expdept">
						<option ng-repeat="d in opt.department" value="{{d.id}}">{{d.dp}}</option>
					</select>
					<div class="input-group-append">
						<button ng-if="showResult" class="btn btn-danger" type="button" ng-click="reset()">Reset</button>
					</div>
					<div class="input-group-append">
						<button class="btn btn-primary" type="button" ng-click="search()">Search <i class="fas fa-search"></i></button>
					</div>
				</div>

			</div>
		</section>
		<!-- End Our Team Section -->

		<!-- ======= Team Section ======= -->
		<section class="team portfolio" ng-if="showResult">
			<div class="container">

				<div class="row">
					<div class="col-lg-12">
						<ul id="portfolio-flters">
							<li data-filter="*" class="filter-active">Search Result</li>
						</ul>
					</div>
				</div>

				<div align="center" ng-if="result.length == 0">
					<h2>Sorry, no result</h2>
					<br>
					<h4>try search something else</h4>
					<br>
				</div>

				<div class="row">
					
					<div class="col-lg-4 col-md-6 d-flex align-items-stretch" ng-repeat="res in result">
						<a href="profile.php?token={{res.expert_id}}">
						<div class="member shadow">
							<div class="member-img">
								<img ng-if="res.image != null || res.image != ''" src="{{res.image}}" class="img-fluid" alt="">
								<img ng-if="res.image == null || res.image == ''" src="img/No-Image-Available.png" class="img-fluid" alt="">
								<div class="social">
									<a>
										{{res.email}}
									</a>
									<br>
									<a>
										{{res.contactno}}
									</a>
								
								</div>
							</div>
							<div class="member-info p-3">
								<h4>{{res.name}}</h4>
								<span>{{res.position}}</span>
								<p>{{res.about}}</p>
							</div>
						</div>
						</a>
					</div>
					
				</div>

			</div>
		</section>
		<!-- End Team Section -->

		<!-- ======= Portfolio Section ======= -->
		<section class="team portfolio" ng-if="show" data-aos-easing="ease-in-out" data-aos-duration="500">
			<div class="container">

				<div class="row">
					<div class="col-lg-12">
						<ul id="portfolio-flters">
							<li data-filter="*" class="filter-active">All</li>
							<?php foreach($aoe as $i){ ?>
							<li data-filter=".filter-<?php echo $i['aoe'] ?>">
								<?php echo $i['aoe'] ?>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">


					<?php foreach($expert as $i){
							if($i['image'] != null || $i['image'] != ''){
								$url = $i['image'];
							}else{
								$url = "img/No-Image-Available.png";
							}
					?>

					<div class="col-lg-4 col-md-6 align-items-stretch filter-<?php echo $i['aoe'] ?>">
						<a href="profile.php?token=<?php echo $i['expert_id'] ?>">
						<div class="member shadow" style="cursor:pointer">
							<div class="member-img">
								<img src="<?php echo $url ?>" class="img-fluid" alt="">
								<div class="social">
									<a>
										<?php echo $i['email'] ?>
									</a><br>
									<a>
										<?php echo $i['contactno'] ?>
									</a>
								</div>
							</div>
							<div class="member-info p-3">
								<h4>
									<?php echo $i['name'] ?>
								</h4>
								<span>
									<?php echo $i['position'] ?>
								</span>
								<p>
									<?php echo $i['about'] ?>
								</p>
							</div>
						</div>
						</a>
					</div>

					<?php } ?>

				</div>

			</div>
		</section>
		<!-- End Portfolio Section -->


	</main>
	<!-- End #main -->

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/venobox/venobox.min.js"></script>
	<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="assets/vendor/counterup/counterup.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
	<script src="controlller/controller.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>

</body>

</html>