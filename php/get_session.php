<?

session_start();

if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']))
{
	echo "<script>alert('로그인 후 접근하십시오.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=http://edu.다솜.com/page/login.php'>";
	exit;
}
else
{
	$user_idx = $_SESSION['user_idx'];
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_name'];
	$user_year = $_SESSION['user_year'];
	$user_mail = $_SESSION['user_mail'];
	$user_num = $_SESSION['user_num'];
}

?>