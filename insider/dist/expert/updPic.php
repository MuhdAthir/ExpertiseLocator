<?php
include( '../../../rest/dbConn.php' );
include( '../../../rest/function.php' );

if ( isset( $_POST[ 'updbtn' ] ) ) {

	$id = $_POST[ 'updbtn' ];

	$target_dir = "../../../";
	$target_folder = "img/";
	$targetfile = $target_dir . $target_folder . basename( $_FILES[ "myfile" ][ "name" ] );
	$dbval = $target_folder . basename( $_FILES[ "myfile" ][ "name" ] );

	if ( move_uploaded_file( $_FILES[ "myfile" ][ "tmp_name" ], $targetfile ) ) {

		$sql = "UPDATE `expert` SET `image` = ? WHERE `expert`.`expert_id` = ?;";
		$stmtInsComp = $aida->prepare( $sql );
		$stmtInsComp->bind_param( "ss", $dbval, $id );
		$stmtInsComp->execute();

		header( 'location: profile-edit.php?callBack=success' );
	} else {
		header( 'location: profile-edit.php?callBack=failed' );
	}
}

if ( isset( $_POST[ 'updInfo' ] ) ) {

	$id = $_POST[ 'updInfo' ];
	$name = $_POST[ 'name' ];
	$about = $_POST[ 'about' ];
	$contact = $_POST[ 'contact' ];
	$position = $_POST[ 'position' ];
	$year = $_POST[ 'year' ];
	$aoe = $_POST[ 'aoe' ];
	$depart = $_POST[ 'department' ];

	$sql = "UPDATE `expert` SET `name` = ?,`about` = ?,`contactno` = ?,`position` = ?,`yearofexp` = ?,`areaofexpertise` = ?,`department` = ? WHERE `expert`.`expert_id` = ?;";
	$stmtInsComp = $aida->prepare( $sql );
	$stmtInsComp->bind_param( "ssssssss", $name,$about,$contact,$position,$year,$aoe,$depart,$id );
	$stmtInsComp->execute();
	
	header( 'location: profile-edit.php?callBack=success' );
}
?>