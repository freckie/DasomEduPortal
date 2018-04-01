<!-- post.php -->

<?
	require "./../php/get_session.php";
	require "./../php/get_post_data.php";
	$post_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
	<!-- Metadata -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Title -->
	<title>다솜 교육 포털</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./../css/common.css">
	<link rel="stylesheet" type="text/css" href="./../css/main.css">

	<!-- Javascript -->
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="./../js/background_slide.js"></script>
</head>

<body>

	<!-- Unavailable JavaScript -->
	<noscript>
	    <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">JavaScript 사용이 중지되었습니다. 웹 브라우저 설정에서 JavaScript을 사용하십시오.</div>
	</noscript>

	<!-- Site -->
	<div id="site-wrapper">

		<div class="overlay">

			<!-- Site Contents -->
			<div class="site-main">

				<div class="form-group" id="form1">

					<div class="page-header" style="width:100%">
						<h2 class="font-rixm" style="cursor: default">
							<? echo_category($category_id);	?>
						</h2>
					</div>

					<? 
						echo_html($category_id);
					?>

					<div style="margin-top: 30px">
						<?
							echo "<h5>[ 현재 접속자 ] ".$_SESSION['user_name']." / ".$_SESSION['user_num']."</h5>";
						?>
						<a href="./../php/logout.php"><h5>(로그아웃)</h5></a>
					</div>

			</div>

		</div>
</body>

</html>