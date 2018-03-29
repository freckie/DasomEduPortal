<?php

/*
 * /php/login_check.php
 * Login Checking by AJAX
*/

header('Content-type: application/json');

require "./db_config.php";

$id = $_POST['username'];
$pw = $_POST['userpw'];

$response = array(
	'status'=>''
);

$table_name = "dasom_account";
$sql = "SELECT * FROM $table_name WHERE id='$id'";

if($result = $conn->query($sql))
{
	$row = $result->fetch_assoc();
	if(!strcmp($row['pw'], md5($pw)))
	{
		/*
		$_SESSION[] = $row[];
		*/
		//echo "success";
		$response['status'] = 'success';
	}
	else
	{
		//echo "error";
		$response['status'] = 'error';
	}
}
else
{
	$response['status'] = 'error';
	//echo "error";
}

$result->free();

$conn->close();

echo json_encode($response);

?>