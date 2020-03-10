<?php
include( '../../../rest/dbConn.php' );
include( '../../../rest/function.php' );
session_start();
$ed = getAllDatafrom( $aida, "expert", "expert_id", $_SESSION[ 'id' ] );
$dp = loopTable($aida,"department");
$aoe = loopTable($aida,"areaofexpertise");
if ( $ed[ 'image' ] != null || $ed[ 'image' ] != '' ) {
	$url = '../../../' . $ed[ 'image' ];
} else {
	$url = '../../../img/No-Image-Available.png';
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>Expertise Locator System</title>
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<style>
		.profile-img {
			border-radius: 50%;
			height: 180px;
			width: 180px;
			padding: 0;
			margin: 0;
		}
		
		.center-betul {
			margin-top: auto!important;
			margin-bottom: auto!important;
		}
	</style>
</head>

<body class="sb-nav-fixed">
	<?php include('../assets/expert/topnav.html') ?>
	<div id="layoutSidenav">
		<?php include('../assets/expert/sidenav.php') ?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Edit Profile</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Edit Profile</li>
					</ol>
					<div class="card mb-4">
						<div class="card-header">
							Profile Picture
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4" align="center">
									<img src="<?php echo $url ?>" class="profile-img"/>
								</div>
								<div class="col-sm-8 center-betul">
									<form method="post" action="updPic.php" enctype="multipart/form-data">
										<div class="input-group mb-3">
											<input type="file" name="myfile" class="form-control" style="border:none" accept="image/png, image/jpeg" required>
											<div class="input-group-append">
												<button class="btn btn-outline-primary" name="updbtn" value="<?php echo $_SESSION[ 'id' ] ?>">Update Profile Picture</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card-footer card-header">Profile Information</div>
						<div class="card-body">
							<form method="post" action="updPic.php">
								<input id="hid1" hidden value="<?php echo $ed['department'] ?>" />
								<input id="hid2" hidden value="<?php echo $ed['areaofexpertise'] ?>" />
								<input id="hid3" hidden value="<?php echo $ed['position'] ?>" />
								<div class="row">
									<div class="col-sm-2" align="center">Name</div>
									<div class="col-sm-10">
										<input type="text" name="name" class="form-control" value="<?php echo $ed['name'] ?>" required/>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">About</div>
									<div class="col-sm-10">
										<textarea required name="about" class="form-control" rows="3" placeholder="Tell something about you.."><?php echo $ed['about'] ?></textarea>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">Email</div>
									<div class="col-sm-10">
										<input type="email" class="form-control" value="<?php echo $ed['email'] ?>" readonly/>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">Contact No</div>
									<div class="col-sm-10">
										<input name="contact" type="number" class="form-control" value="<?php echo $ed['contactno'] ?>" required placeholder="Your contact no"/>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">Position</div>
									<div class="col-sm-10">
										<select name="position" id="position" class="form-control" required>
											<option value="Junior">Junior</option>
											<option value="Senior">Senior</option>
										</select>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">Year of Experience</div>
									<div class="col-sm-10">
										<div class="input-group mb-3">
											<input name="year" type="number" min="0" class="form-control" required value="<?php echo $ed['yearofexp'] ?>">
											<div class="input-group-append"><span class="input-group-text" id="basic-addon2">Year</span>
											</div>
										</div>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">Department</div>
									<div class="col-sm-10">
										<select name="department" id="department" class="form-control" required>
											<?php foreach($dp as $row){ ?>
											<option value="<?php echo $row['department_id'] ?>"><?php echo $row['department'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">Area of Expertise</div>
									<div class="col-sm-10">
										<select name="aoe" id="aoe" class="form-control" required>
											<?php foreach($aoe as $row){ ?>
											<option value="<?php echo $row['aoe_id'] ?>"><?php echo $row['aoe'] ?></option>
											<?php } ?>										
										</select>
									</div>
								</div>
								<br>
								<button class="btn btn-primary btn-block" name="updInfo" value="<?php echo $_SESSION[ 'id' ] ?>">Update Information</button>
							</form>
						</div>
						<div class="card-footer card-header">Update Password</div>
						<div class="card-body">
							<form method="post" action="updPic.php">
								<div class="row">
									<div class="col-sm-2" align="center">Old Password</div>
									<div class="col-sm-10">
										<input type="password" class="form-control" required/>
									</div>
								</div><br>
								<div class="row">
									<div class="col-sm-2" align="center">New Password</div>
									<div class="col-sm-10">
										<input type="password" class="form-control" required/>
									</div>
								</div>
								<br>
								<button class="btn btn-primary btn-block" name="updbtn" value="<?php echo $_SESSION[ 'id' ] ?>">Update Password</button>
							</form>
						</div>
					</div>
			</main>
			<?php include('../assets/expert/footer.html') ?>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="../js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="../assets/demo/datatables-demo.js"></script>
		<script>
		$("#position").val($('#hid3').val());
		$("#department").val($('#hid1').val());
		$("#aoe").val($('#hid2').val());
		</script>
</body>
</html>
<?php
if ( isset( $_GET[ 'callBack' ] ) ) {
	if ( $_GET[ 'callBack' ] == 'success' ) {
		echo "<script> alert('Successfully update') </script>";
	} else {
		echo "<script> alert('Something went wrong') </script>";
	}
}
?>