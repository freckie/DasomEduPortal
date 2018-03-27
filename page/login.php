<!-- login.php -->

<!DOCTYPE html>
<html>

<head>
	<!-- Metadata -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Title -->
	<title>다솜 교육 포털</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
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
	<div id="site-wrapper">

		<div class="overlay">
			<div class="site-main">

				<form class="form-group" id="form1" method="post" name="form1" action="./../php/login_check.php">

					<div class="page-header" style="width:100%">
						<h1 class="font-rixm" style="cursor: default">다솜 교육 포털</h1>
					</div>

					<div class="">
						<input class="form-control input-box font-rixm" type="text" placeholder="ID" id="username" name="username" required />
						<input class="form-control input-box" type="password" placeholder="PW" id="userpw" name="userpw" required />
						<button class="form-control btn btn-primary input-box font-rixm" type="submit">Log In</button>
					</div>

				</form>
			</div>

		</div>
	</div>


</body>

</html>