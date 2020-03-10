<?php 
include('dbConn.php');
include('function.php');

$email = loopTableCond($aida,"expert","email",$_GET['email']);

if(mysqli_num_rows($email) > 0 ){
	$result = ["res"=>false];
}else{
	$result = ["res"=>true];
};

echo json_encode($result);
?>