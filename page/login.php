<!-- login.php -->

<!DOCTYPE html>
<html>

<head>
	<!-- Metadata -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Title -->
	<title>다솜 교육 포털</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./../css/login.css">

	<!-- Javascript -->
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="./../js/background_slide.js"></script>
</head>

<body>

	<!-- Unavailable JavaScript -->
	<noscript>
	    <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">JavaScript 사용이 중지되었습니다. 웹 브라우저 설정에서 JavaScript을 사용하십시오.</div>
	</noscript>

	<!-- Site -->
	<div class="overlay" id="site-wrapper">

		<form id="form1" method="post" name="form1" action="./../php/login_check.php">

			<input type="text" placeholder="ID" id="username" name="username" required/>
			<input type="password" placeholder="PW" id="userpw" name="userpw" required/>
			<button type="submit">Log In</button>

		</form>

	</div>


</body>

</html>