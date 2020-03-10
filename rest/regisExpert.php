<?php 
include('dbConn.php');
include('function.php');

if(isset($_POST['email'])){
	$position = $_POST['position'];
	$email = $_POST['email'];
	$aoe = $_POST['aoe'];
	$department = $_POST['department'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$year = $_POST['year'];
	$date = date("Y-m-d");
	
	$sql = "INSERT INTO `expert` (`expert_id`, `name`, `email`, `password`, `contactno`, `position`, `yearofexp`, `datereg`, `areaofexpertise`, `department`, `image`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL);";
	$stmtInsComp = $aida->prepare($sql);
	$stmtInsComp->bind_param("sssssssss",$name,$email,$password,$contact,$position,$year,$date,$aoe,$department);
	$stmtInsComp->execute();
	
	echo "Successfully Registered";
}

?>