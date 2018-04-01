<?php

/*
 * /php/get_post_data.php
 * Get Post data for post.php
*/

require "db_config.php";

$table_name = "dasom_edu_post";

// cards which status==1
$sql = "SELECT * FROM $table_name WHERE status=1 ORDER BY idx DESC";
$result = $conn->query($sql);

$result->free();

$conn->close();

?>