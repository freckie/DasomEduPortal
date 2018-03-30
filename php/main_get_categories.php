<?php

/*
 * /php/main_get_categories.php
 * Get Category datas for main.php
*/

require "db_config.php";

$table_name = "dasom_edu_category";

// cards which status==1
$sql = "SELECT * FROM $table_name WHERE status=1 ORDER BY idx DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	$str = '<div class="content-card" onclick="location.href=\'./board.php?category='.$row['idx'].'\'">'
	. '<div class="card-title"><span class="font-rixm">'.$row['name'].'</span></div>'
	. '<div class="card-text"><span class="font-rixm">'.$row['teacher'].'</span></div>'
	. '<div class="card-text"><span class="font-rixm">'.$row['people'].'명 참여</span></div>'
	. '</div>';

	echo $str;
}

$result->free();

// cards which status==0
$sql = "SELECT * FROM $table_name WHERE status=0 ORDER BY idx DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	$str = '<div class="content-card content-card-deacti" onclick="location.href=\'./board.php?category='.$row['idx'].'\'">'
	. '<div class="card-title"><span class="font-rixm">'.$row['name'].'</span></div>'
	. '<div class="card-text"><span class="font-rixm">'.$row['teacher'].'</span></div>'
	. '<div class="card-text"><span class="font-rixm">'.$row['people'].'명 참여</span></div>'
	. '</div>';

	echo $str;
}

$result->free();

$conn->close();

?>