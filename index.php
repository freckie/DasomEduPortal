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
	$user_idx = $_SESSION['user_idx'];
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_name'];
	$user_year = $_SESSION['user_year'];
	$user_mail = $_SESSION['user_mail'];
	$user_num = $_SESSION['user_num'];

	echo "<meta http-equiv='refresh' content='0;url=/page/main.php'>";
	exit;
}

?>