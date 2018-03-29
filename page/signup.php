<!-- signup.php -->

<!DOCTYPE html>
<html>

<head>
	<!-- Metadata -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<!-- Title -->
	<title>다솜 교육 포털 :: 회원가입</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./../css/common.css">

	<!-- Javascript -->
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="./../js/background_slide.js"></script>
	<script src="./../js/signup_id_dup_check.js"></script>
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
						<h1 class="font-rixm" style="cursor: default">다솜 교육 포털</h1>
					</div>

					<form method="post" action="./../php/do_signup.php" id="signup-form">
						<div class="input-group">
							<input type="text" class="form-control font-rixm" placeholder="ID" aria-describedby="basic-addon2" id="userid" name="userid" required />
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="dup-check-btn">중복 조회</button>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control input-box" type="password" placeholder="PW" id="userpw" name="userpw" required />
							<input class="form-control input-box font-rixm" type="text" placeholder="이름" id="username" name="username" required />
							<input class="form-control input-box font-rixm" type="text" placeholder="입학년도 (ex. 2017)" id="useryear" name="useryear" required />
							<input class="form-control input-box font-rixm" type="text" placeholder="학번 (ex. 1990101004)" id="usernum" name="usernum" required />
							<input class="form-control input-box font-rixm" type="text" placeholder="e-mail" id="usermail" name="usermail" required />
						</div>

						<button class="form-control btn btn-primary input-box font-rixm" id="signup-btn" type="button">Sign Up</button>
					</form>

			</div> <!-- /.site-content -->

			<!-- ID Dup-Check Success Modal -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="id-success-modal">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="alert-modal-label">ID 중복 조회</h4>
						</div>
						<div class="modal-body" style="text-align: center">
							<span class="font-rixm" id="alert-modal-content">사용 가능한 ID 입니다.<br>사용하시려면 확인 버튼을 눌러주십시오.</span>
							<button type="button" class="btn btn-warning" id="modal-cancel1-btn">취소</button>
							<button type="button" class="btn btn-success" id="modal-ok-btn">확인</button>
						</div>
					</div> <!-- /.modal-content -->
				</div> <!-- /.modal-dialog -->
			</div> <!-- /.modal -->

			<!-- ID Dup-Check Fail Modal -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="id-fail-modal">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="alert-modal-label">ID 중복 조회</h4>
						</div>
						<div class="modal-body" style="text-align: center">
							<span class="font-rixm" id="alert-modal-content">이미 존재하는 ID 입니다. 다른 ID를 이용해 주십시오.</span>
							<button type="button" class="btn btn-warning" id="modal-cancel2-btn">닫기</button>
						</div>
					</div> <!-- /.modal-content -->
				</div> <!-- /.modal-dialog -->
			</div> <!-- /.modal -->

		</div>

	</div> <!-- /.site -->

</body>

</html>