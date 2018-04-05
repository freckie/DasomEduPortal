<?php

/*
 * /php/board_get_posts.php
 * Get Post data for board.php
*/

function echo_category($args)
{
	require "db_config.php";

	$sql = "SELECT name FROM dasom_edu_category WHERE idx=$args";

	if($result = $conn->query($sql))
	{
		$data = $result->fetch_assoc();

		echo $data['name'];
		$result->free();
	}
	else
	{
		echo "No Post Data.";
	}

	$conn->close();
}

function echo_html($args)
{
	require "db_config.php";

	$sql = "SELECT idx, title, date FROM dasom_edu_post WHERE category_id=$args ORDER BY date DESC";

	if($result = $conn->query($sql))
	{
		while($row = $result->fetch_assoc())
		{
			$str = '<div class="content-card" onclick="location.href=\'./post.php?id='.$row['idx'].'\'">'
			. '<div class="card-title"><span class="font-rixm">'.$row['title'].'</span></div>'
			. '<div class="card-text"><span class="font-rixm">'.$row['date'].'</span></div>'
			. '</div>';

			echo $str;
		}

		$result->free();
	}
	else
	{
		echo "No Post Data.";
	}
	$conn->close();
}

?>