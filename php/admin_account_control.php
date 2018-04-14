<?php

require_once("./db_config.php");

$userid = $_POST['userid'];
$userad = $_POST['userad'];

$table_name = "dasom_account";

if(!strcmp($userad, "승인"))
{
	$sql = "UPDATE  $table_name SET admission = '0' WHERE id='$userid'";
}
else
{
	$sql = "UPDATE  $table_name SET admission = '1' WHERE id='$userid'";
}

if($result = $conn->query($sql))
{
	$message = "변경 완료";
}
else
{
	$message = "변경 실패";
}

echo $message;
?>