<?php
include('../../rest/dbConn.php');
include('../../rest/function.php');

$depart = loopTable($aida,"department");
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-controller="myCtrl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Expertise Locator System</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include('assets/topnav.html') ?>
        <div id="layoutSidenav">
            <?php include('assets/sidenav.html') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Manage Department</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Department</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
								<div class="row justify-content-between">
									<div class="col-4">
									  <i class="fas fa-building mr-1"></i>List of Department
									</div>
									<div class="col-4" align="right">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add New <i class="fas fa-plus mr-1"></i></button>
									</div>
								</div>
							</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach($depart as $tr){ ?>
											<tr>
												<td><?php echo $tr['department'] ?></td>
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
							<h5 class="modal-title" id="exampleModalLongTitle">Add new department</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
							<form ng-submit="addDepartment()">
							  <div class="modal-body">
								  <div class="form-group">
									  <label class="small mb-1" for="depart">Department</label>
									  <input class="form-control py-4" id="depart" type="text" />
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
				<?php include('assets/footer.html') ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
  		<script src="js/controller/department.js"></script>
    </body>
</html>
