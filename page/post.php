<!-- post.php -->

<?
	require "./../php/get_session.php";
	require "./../php/get_post_data.php";
	$post_id = $_GET['id'];

	get_post($post_id);
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
	<link rel="stylesheet" type="text/css" href="./../css/post.css">

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
							<? echo $post_title; ?>
						</h2>

						<!-- sub-form #1 -->
						<div class="sub-form">
							<div class="sub-form-header">
								<h4 class="font-rixm">과제</h4>
							</div>
							<div class="sub-content">
								<textarea id="area" row="4" readonly><? echo $post_desc; ?>
								</textarea>
							</div>
						</div>

						<!-- sub-form #2 -->
						<div class="sub-form">
							<div class="sub-form-header">
								<h4 class="font-rixm">과제 제출</h4>
							</div>
							<form class="sub-content" action="./../php/file_upload.php" method="post" enctype="multipart/form-data">
								<input type="file" id="submit-file" name="submit-file">
								<? echo_submit($post_id, $_SESSION['user_id']); ?>
							</form>
						</div>

						<!-- sub-form #3 -->
						<div class="sub-form">
							<div class="sub-form-header">
								<h4 class="font-rixm">댓글</h4>
							</div>
							<div class="sub-content">
								<? echo_comments($post_id); ?>
							</div>
							<form class="sub-content" action="./../php/comment_upload.php" method="post">
								<input type="hidden" name="post-idx" value="<? echo $post_id; ?>">
								<input type="hidden" name="poster" value="<? echo $_SESSION['user_name']; ?>">
								<textarea id="new-comment" name="new-comment" placeholder="여기에 댓글을 입력하십시오."></textarea>
								<button class="btn btn-primary submit-btns">등록</button>
							</form>
						</div>

						<!-- sub-form #4 -->
						<div class="sub-form">
							<div class="sub-form-header">
								<h4 class="font-rixm">참고 자료</h4>
							</div>
							<div class="sub-content font-rixm">
								<span>1. 어아어아어 
									<a class="refer-link">(링크)</a>
								</span>
							</div>
						</div>

					</div>


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