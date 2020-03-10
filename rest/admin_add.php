<?php 
include('dbConn.php');
include('function.php');

if(isset($_POST['department'])){
	$name = $_POST['name'];
	
	$sql = "INSERT INTO `department` (`department_id`, `department`) VALUES (NULL, ?);";
	$stmtInsComp = $aida->prepare($sql);
	$stmtInsComp->bind_param("s",$name);
	$stmtInsComp->execute();
	
	echo "Successfully Added";
}

if(isset($_POST['aoe'])){
	$name = $_POST['name'];
	
	$sql = "INSERT INTO `areaofexpertise` (`aoe_id`, `aoe`) VALUES (NULL, ?);";
	$stmtInsComp = $aida->prepare($sql);
	$stmtInsComp->bind_param("s",$name);
	$stmtInsComp->execute();
	
	echo "Successfully Added";
}

?>