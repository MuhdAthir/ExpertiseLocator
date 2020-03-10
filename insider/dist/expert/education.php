<?php
include( '../../../rest/dbConn.php' );
include( '../../../rest/function.php' );
session_start();
$education = loopTableCond( $aida, "education", "expert_id", $_SESSION[ 'id' ] );
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
</head>

<body class="sb-nav-fixed">
	<?php include('../assets/expert/topnav.html') ?>
	<div id="layoutSidenav">
		<?php include('../assets/expert/sidenav.php') ?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Manage Educations</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Education</li>
					</ol>
					<div class="card mb-4">
						<div class="card-header">
							<div class="row justify-content-between">
								<div class="col-4">
									<i class="fas fa-university"></i>List of Educations<br><small><i>Click row for action</i></small>
								</div>
								<div class="col-4" align="right">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add New <i class="fas fa-plus mr-1"></i></button>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th width="15%">Start Date</th>
											<th width="15%">End Date</th>
											<th width="10%">Level</th>
											<th>Education</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($education as $tr){ ?>
										<tr style="cursor: pointer" onClick="window.location.href = 'upd-profile-edit.php?id=<?php echo $tr['education_id'] ?>'">
											<td>
												<?php echo $tr['date_from'] ?>
											</td>
											<td>
												<?php 
													if($tr['date_until'] == '' || $tr['date_until'] == null){
														echo "<span class='text-primary'><b>Current</b></span>";
													}else{
														echo $tr['date_until'];} ?>
											</td>
											<td id="lvl">
												<?php echo $tr['level'] ?>
											</td>
											<td>
												<span class="text-primary"><b><?php echo $tr['education'] ?></b></span><br>
												<?php echo $tr['description'] ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Add new education</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							


							</div>
							<form ng-submit="addEdu()">
								<div class="modal-body">
									<div class="form-group">
										<label class="small mb-1" for="aoe">Education</label>
										<input class="form-control" id="expertid" type="hidden" value="<?php echo $_SESSION['id'] ?>"/>
										<input class="form-control" ng-model="newEdu.edu" type="text" required/>
									</div>
									<div class="form-group">
										<label class="small mb-1" for="aoe">Education Description</label>
										<textarea class="form-control" ng-model="newEdu.desc" required rows="3"></textarea>
									</div>
									<div class="form-group">
										<label class="small mb-1" for="aoe">Level</label>
										<select class="form-control" ng-model="newEdu.level" required>
											<option value="Secondary">Secondary</option>
											<option value="Pre-university programme">Pre-university programme</option>
											<option value="Special Skills Certificate">Special Skills Certificate</option>
											<option value="Diploma">Diploma</option>
											<option value="Bachelor Degrees">Bachelor Degrees</option>
											<option value="Master Degrees">Master Degrees</option>
											<option value="Doctor of Philosophy degrees">Doctor of Philosophy degrees</option>
										</select>
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group">
												<label class="small mb-1" for="aoe">Start Year</label>
												<input class="form-control" min="1500" max="2099" id="start" required type="number">
											</div>
										</div>
										<div class="col">
											<div class="form-group">
												<label class="small mb-1" for="aoe">End Year <small><span class="text-secondary"><i>(leave blank for current)</i></span></small></label>
												<input class="form-control" id="end" min="1500" max="2099" type="number">
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-danger">Reset</button>
									<button class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
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
	<script>
		// Call the dataTables jQuery plugin
		$( document ).ready( function () {
			$( '#dataTable' ).DataTable( {
				"order": [
					[ 0, "desc" ]
				]
			} );
		} );
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
	<script src="../js/controller/expertsite.js"></script>
</body>
</html>