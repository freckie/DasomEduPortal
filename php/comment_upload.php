<?

/*
 * /php/comment_upload.php
 * Upload Comment
*/

$comment = $_POST['new-comment'];
$post_id = $_POST['post-id'];
$poster = $_POST['poster'];

require "db_config.php";
$sql = "INSERT INTO dasom_edu_comment (post, poster, content) VALUES ($post_id, '$poster', '$comment')";
$result = $conn->query($sql);

?>
