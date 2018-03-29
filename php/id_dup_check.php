<?

/*
 * /php/id_dup_check.php
 * ID Duplication Checking by AJAX
*/

header('Content-type: application/json');

require "./db_config.php";

$id = $_POST['userid'];

$response = array(
	'status'=>''
);

$table_name = "dasom_account";
$sql = "SELECT * FROM $table_name WHERE id='$id'";
$result = $conn->query($sql);

// If ID is already exist,
if($result->num_rows != 0)
{
	$response['status'] = 'error';
}
// else if ID no exists
else
{
	$response['status'] = 'success';
}

$result->free();

$conn->close();

echo json_encode($response);

?>