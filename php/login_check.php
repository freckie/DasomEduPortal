<?php

require "./db_config.php";

$id = $_POST['username'];
$pw = $_POST['userpw'];

$table_name = "dasom_account";
$sql = "SELECT * FROM $table_name WHERE id='$id'";

if($result = $conn->query($sql))
{
	if($row['pw'] == md5($pw))
	{
		/*
		$_SESSION[] = $row[];
		*/
		echo "<script>alert('로그인 성공');</script>";
	}
	else
	{
		echo "<script>alert('틀린 비번');history.back();</script>";
	}
}
else
{
	echo "<script>alert('없는 아이디');history.back();</script>";
}

?>