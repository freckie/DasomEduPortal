<?php

/*
 * /php/do_signup.php
 * Do signup. Append to DB with new user data.
*/

require "./db_config.php";

$id = $_POST['userid'];
$pw = $_POST['userpw'];
$name = $_POST['username'];
$year = $_POST['useryear'];
$num = $_POST['usernum'];
$mail = $_POST['usermail'];

$pw_s = md5($pw);

$table_name = "dasom_account";
$sql = "INSERT INTO $table_name (id, pw, name, year, email, number) VALUES ('$id', '$pw_s', '$name', '$year', '$mail', '$num')";

$conn->query($sql);

$conn->close();

?>