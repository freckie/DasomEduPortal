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
		if($row['admission'] == 0)
		{
			$response['status'] = 'non-admit';
		}
		else
		{
			session_start();

			$_SESSION['user_idx'] = $row['idx'];
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_name'] = $row['name'];
			$_SESSION['user_year'] = $row['year'];
			$_SESSION['user_mail'] = $row['mail'];
			$_SESSION['user_num'] = $row['number'];

			$response['status'] = 'success';
		}
	}
	else
	{
		$response['status'] = 'error';
	}
}
else
{
	$response['status'] = 'error';
}

$result->free();

$conn->close();

echo json_encode($response);

?>