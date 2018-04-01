<?

/*
 * /php/file_upload.php
 * file upload
*/

// setting
$upload_dir = "./../file";
$allowed = array('cpp', 'py', 'zip');

// variables
$error = $_FILES['submit-file']['error'];
$name = $_FILES['submit-file']['name'];
$ext = array_pop(explode('.', $name));

// ERROR Check
if($error != UPLOAD_ERR_OK)
{
	switch ($error) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "<script>alert('파일이 너무 큽니다. ($error)');</script>";
			break;
		case UPLOAD_ERR_NO_FILE:	
			echo "<script>alert('파일이 첨부되지 않았습니다. ($error)');</script>";
			break;
		default:
			echo "<script>alert('파일이 제대로 업로드되지 않았습니다. ($error)');</script>";
			break;
	}
	exit;
}

// ext check
if(!in_array($ext, $allowed))
{
	echo "<script>alert('허용되지 않는 확장자입니다.\n허용되는 확장자 : .cpp .py .zip');</script>";
	exit;
}

// file move
move_uploaded_file($_FILES['submit-file']['tmp_name'], "/home1/khuphj/public_html/edu/file/$name");

// redirection
echo "<script>alert('제출 완료.');history.go(-1);</script>";

?>