<?php 
include('dbConn.php');
include('function.php');

$result = [];
$data = loopSQL($aida,"SELECT * FROM expert e, department d, areaofexpertise aoe WHERE (e.department = d.department_id AND e.areaofexpertise = aoe.aoe_id)");
foreach($data as $i){
	$result[] = $i;
}
echo json_encode($result);
?>