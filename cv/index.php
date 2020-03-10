<?php
include( '../rest/dbConn.php' );
include( '../rest/function.php' );

$id = $_GET[ 'id' ];
$skill = [];
$edu = [];
$arch = [];

$profile = getSQL( $aida, "SELECT * FROM expert e, department d, areaofexpertise aoe WHERE (e.department = d.department_id AND e.areaofexpertise = aoe.aoe_id) AND e.expert_id = '$id'" );

$sql1 = loopSQL( $aida, "SELECT * FROM `skill` WHERE expert_id = '$id'" );
foreach ( $sql1 as $x ) {
	$skill[] = $x;
}

$sql2 = loopSQL( $aida, "SELECT * FROM `achievement` WHERE expert_id = '$id' ORDER BY year DESC" );
foreach ( $sql2 as $y ) {
	$arch[] = $y;
}

$sql3 = loopSQL( $aida, "SELECT * FROM `education` WHERE expert_id = '$id' ORDER BY date_from DESC" );
foreach ( $sql3 as $z ) {
	$edu[] = $z;
}

if($profile['image'] != null || $profile['image'] != ''){
	$url = '../'.$profile['image'];
}else{
	$url = '../img/No-Image-Available.png';
}
?>
<!DOCTYPE html>
<html lang="en-US" ng-app="myApp" ng-controller="myCtrl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Creative CV</title>
	<meta name="description" content="Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skils and experience."/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/aos.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
</head>

<body id="top">
	<header>
		<div class="profile-page sidebar-collapse">
			<nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
				<div class="container">
					<div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip"></a>
						<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
					</div>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<ul class="navbar-nav">
							<li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a>
							</li>
							<li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a>
							</li>
							<li class="nav-item"><a class="nav-link smooth-scroll" href="#achi">Achievements</a>
							</li>
							<li class="nav-item"><a class="nav-link smooth-scroll" href="#edu">Educations</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<div class="page-content">
		<div>
			<div class="profile-page">
				<div class="wrapper">
					<div class="page-header page-header-small" filter-color="green">
						<div class="page-header-image" data-parallax="true" style="background-image: url('images/cc-bg-1.jpg');"></div>
						<div class="container">
							<div class="content-center">
								<div class="cc-profile-image"><a href="#"><img src="<?php echo $url ?>" alt="Image"/></a>
								</div>
								<div class="h2 title">
									<?php echo $profile['name'] ?><input value="<?php echo $_GET['id'] ?>" id="expertid" hidden>
								</div>
								<p class="category text-white">
									<?php echo $profile['aoe'].", ".$profile['position'] ?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="section" id="about">
					<div class="container">
						<div class="card" data-aos="fade-up" data-aos-offset="10">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<div class="card-body">
										<div class="h4 mt-0 title">About</div>
										<p>
											<?php echo $profile['about'] ?>
										</p>
									</div>
								</div>
								<div class="col-lg-6 col-md-12">
									<div class="card-body">
										<div class="h4 mt-0 title">Contact Information</div>
										<div class="row mt-3">
											<div class="col-sm-4"><strong class="text-uppercase">Email:</strong>
											</div>
											<div class="col-sm-8">
												<?php echo $profile['email'] ?>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-sm-4"><strong class="text-uppercase">Phone:</strong>
											</div>
											<div class="col-sm-8">
												<?php echo $profile['contactno'] ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section" id="skill">
					<div class="container">
						<div class="h4 text-center mb-4 title">Professional Skills</div>
						<div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
							<div class="card-body">
								<div class="row">
									<?php foreach($skill as $sk){ ?>
									<div class="col-md-6">
										<div class="progress-container progress-primary">
											<span class="progress-badge">
												<?php echo $sk['skill'] ?>
											</span>
											<div class="progress">
												<div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $sk['progress'] ?>%;"></div>
												<span class="progress-value">
													<?php echo $sk['progress'] ?>%</span>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section" id="achi">
					<div class="container cc-experience">
						<div class="h4 text-center mb-4 title">Achievements</div>
						<?php foreach($arch as $ac){ ?>
						<div class="card">
							<div class="row">
								<div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
									<div class="card-body cc-experience-header">
										<p></p>
										<div class="h5">
											<?php echo $ac['year'] ?>
										</div>
									</div>
								</div>
								<div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
									<div class="card-body">
										<div class="h5">
											<?php echo $ac['achievement'] ?>
										</div>
										<p>
											<?php echo $ac['description'] ?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="section" id="edu">
					<div class="container cc-education">
						<div class="h4 text-center mb-4 title">Educations</div>
						<?php foreach($edu as $ed){ ?>
						<div class="card">
							<div class="row">
								<div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
									<div class="card-body cc-education-header">
										<p>
											<?php echo $ed['date_from'] ?> -
											<?php if($ed['date_until'] != '' || $ed['date_until'] != null){
													echo $ed['date_until'];
												}else{
													echo "<span class='text-warning'><b>Current</b></span>";
												} ?>
										</p>
										<div class="h5"><?php echo $ed['level'] ?></div>
									</div>
								</div>
								<div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
									<div class="card-body">
										<p class="category h5"><?php echo $ed['education'] ?></p>
										<br>
										<p><?php echo $ed['description'] ?></p>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<footer class="footer"> </footer>
					<script src="js/core/jquery.3.2.1.min.js"></script>
					<script src="js/core/popper.min.js"></script>
					<script src="js/core/bootstrap.min.js"></script>
					<script src="js/now-ui-kit.js?v=1.1.0"></script>
					<script src="js/aos.js"></script>
					<script src="scripts/main.js"></script>
					<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
					<script src="js/controller.js"></script>
</body>
</html>