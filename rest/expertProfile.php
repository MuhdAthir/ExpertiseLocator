<?php 
include('dbConn.php');
include('function.php');

$id = $_GET['id'];
$skill = [];
$edu = [];
$arch = [];

$profile = getSQL($aida,"SELECT * FROM expert e, department d, areaofexpertise aoe WHERE (e.department = d.department_id AND e.areaofexpertise = aoe.aoe_id) AND e.expert_id = '$id'");

$sql1 = loopSQL($aida, "SELECT * FROM `skill` WHERE expert_id = '$id'");
foreach($sql1 as $x){
	$skill[] = $x;
}

$sql2 = loopSQL($aida, "SELECT * FROM `achievement` WHERE expert_id = '$id' ORDER BY year DESC");
foreach($sql2 as $y){
	$arch[] = $y;
}

$sql3 = loopSQL($aida, "SELECT * FROM `education` WHERE expert_id = '$id' ORDER BY date_from DESC");
foreach($sql3 as $z){
	$edu[] = $z;
}

$result = ["profile"=>$profile,"skill"=>$skill,"arch"=>$arch,"edu"=>$edu];

echo json_encode($result);
?>