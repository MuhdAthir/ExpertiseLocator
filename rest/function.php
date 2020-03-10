<?php
date_default_timezone_set("Asia/Kuala_Lumpur");


function getAllDatafrom($aida,$table,$param1,$param2)
{
	$sql = "SELECT * FROM ".$table." WHERE ".$param1." = '".$param2."'";
	$result = $aida->query($sql);
	$row = $result->fetch_assoc();
	return $row;

}

function getData($aida,$table)
{
	$sql = "SELECT * FROM ".$table;
	$result = $aida->query($sql);
	$row = $result->fetch_assoc();
	return $row;

}



function loopTable($aida,$table)
{
	$listsql = "SELECT * FROM $table";
	$liststmt = $aida->prepare($listsql);
	$liststmt->execute();
	$listresult = $liststmt->get_result();	
	return $listresult;

}

function loopTableCond($aida,$table,$param,$status)
{
	$listsql = "SELECT * FROM $table WHERE $param = '$status'";
	$liststmt = $aida->prepare($listsql);
	$liststmt->execute();
	$listresult = $liststmt->get_result();	
	return $listresult;
}

function loopSQL($aida,$getsql)
{
	$liststmt = $aida->prepare($getsql);
	$liststmt->execute();
	$listresult = $liststmt->get_result();	
	return $listresult;
}

function getSQL($aida,$getsql)
{
	$result = $aida->query($getsql);
	$row = $result->fetch_assoc();
	return $row;
}

?>