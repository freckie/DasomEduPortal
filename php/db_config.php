<?php

$db_host = "localhost";
$db_id = "khuphj";
$db_pw = "1qaz2wsx";
$db_name = "khuphj";

// Connecting
$conn = new mysqli($db_host, $db_id, $db_pw, $db_name);

if($conn->connect_errno)
{
	echo "[SYSTEM] MySQL Connect Error!";
}

?>