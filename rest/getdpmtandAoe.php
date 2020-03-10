<?php 
include('dbConn.php');
include('function.php');

$resultdp = [];
$resultaoe = [];

$dp = loopTable($aida,"department");
$aoe = loopTable($aida,"areaofexpertise");

foreach($dp as $i){
	$json = [
	"id"=>$i['department_id'],
	"dp"=>$i['department'],
	];
	$resultdp[] = $json;
}

foreach($aoe as $i){
	$json = [
	"id"=>$i['aoe_id'],
	"aoe"=>$i['aoe'],
	];
	$resultaoe[] = $json;
}

$result = ["department"=>$resultdp,"AOE"=>$resultaoe];

echo json_encode($result);
?>