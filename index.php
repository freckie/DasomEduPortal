<?

session_start();


// session not exists
if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']))
{
	echo "<meta http-equiv='refresh' content='0;url=/page/login.php'>";
	exit;
}
else // session exists
{
	echo "<meta http-equiv='refresh' content='0;url=/page/main.php'>";
	exit;
}

?>