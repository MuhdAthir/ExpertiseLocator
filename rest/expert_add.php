<?php 
include('dbConn.php');
include('function.php');

$id = $_POST['id'];

if(isset($_POST['skill'])){
	$skill = $_POST['skill'];
	$prog = $_POST['prog'];
	
	$sql = "INSERT INTO `skill` (`skill_id`, `expert_id`, `skill`, `progress`) VALUES (NULL, ?, ?, ?);";
	$stmtInsComp = $aida->prepare($sql);
	$stmtInsComp->bind_param("sss",$id,$skill,$prog);
	$stmtInsComp->execute();
	
	echo "Successfully Added";
}

if(isset($_POST['achieve'])){
	$achieve = $_POST['achieve'];
	$desc = $_POST['desc'];
	$year = $_POST['year'];
	
	$sql = "INSERT INTO `achievement` (`achievement_id`, `expert_id`, `achievement`, `description`, `year`) VALUES (NULL, ?, ?, ?, ?);";
	$stmtInsComp = $aida->prepare($sql);
	$stmtInsComp->bind_param("ssss",$id,$achieve,$desc,$year);
	$stmtInsComp->execute();
	
	echo "Successfully Added";
}

if(isset($_POST['edu'])){
	$edu = $_POST['edu'];
	$desc = $_POST['desc'];
	$level = $_POST['level'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	
	$sql = "INSERT INTO `education` (`education_id`, `expert_id`, `date_from`, `date_until`, `level`, `education`, `description`) VALUES (NULL, ?, ?, ?, ?, ?, ?);";
	$stmtInsComp = $aida->prepare($sql);
	$stmtInsComp->bind_param("ssssss",$id,$start,$end,$level,$edu,$desc);
	$stmtInsComp->execute();
	
	echo "Successfully Added";
}

?>