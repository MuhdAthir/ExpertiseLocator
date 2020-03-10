<?php 
include('dbConn.php');
include('function.php');

$result = array('email'=>false,'password'=>false);

if(isset($_POST['trigger'])){
	$id = $_POST['email'];
	$pwd = $_POST['password'];
	
	$user = getAllDatafrom($aida, "expert", "email", $id);
	if($user['email'] != '')
	{
		$result['email'] = true;
		if($user['password'] == $pwd)
		{
			$result['password'] = true;
			session_start();
			$_SESSION['id'] = $user['expert_id'];
			$_SESSION['name'] = $user['name'];
		}
	}
	
	echo json_encode($result);
}

?>