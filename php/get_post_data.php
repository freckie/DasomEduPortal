<?php

/*
 * /php/get_post_data.php
 * Get Post data for post.php
*/

$post_title = "";
$post_desc = "";

// 1. Get Post Data (dasom_edu_post :: description, title, etc.)
function get_post($post_id)
{
	global $post_title, $post_desc;

	require "db_config.php";
	$sql = "SELECT description, title FROM dasom_edu_post WHERE idx=$post_id";
	$result = $conn->query($sql);
	$data = $result->fetch_assoc();

	$post_title = $data['title'];
	$post_desc = $data['description'];

	$result->free();
	$conn->close();
}

// 2. Get Submit Data (dasom_edu_submit :: submitter, post, status)
function echo_submit($post_id, $submitter_id) // echos only submit button
{
	require "db_config.php";
	$sql = "SELECT status FROM dasom_edu_submit WHERE submitter='$submitter_id' AND post=$post_id";

	if(!($result = $conn->query($sql)))
	{
		$echo_str = '<button class="btn btn-primary submit-btns">제출</button>';
	}
	else
	{
		$data = $result->fetch_assoc();

		// if data exists (resubmit)
		if($data['status'] == 1)
		{
			$echo_str = '<button class="btn btn-success submit-btns">재제출</button>';
		}
		else // if no data (didn't submit)
		{
			$echo_str = '<button class="btn btn-primary submit-btns">제출</button>';
		}

		$result->free();
	}

	$conn->close();

	echo $echo_str;
}

// 3. Get Comment Data (dasom_edu_comment :: poster, content, date(DESC))
function echo_comments($post_id)
{
	require "db_config.php";
	$sql = "SELECT poster, content FROM dasom_edu_comment WHERE post=$post_id ORDER BY date DESC";

	// if no data (no comments)
	if(!($result = $conn->query($sql)))
	{
		echo "<span class='font-rixm'>댓글 없음.</span>";
	}
	else // if comment exists
	{
		while($row = $result->fetch_assoc())
		{
			$echo_str = '<div class="comment font-nanum">'
				. '<span>' . $row['poster'] . ' &nbsp;:&nbsp; ' . $row['content'] . '</span>'
				. '</div>';

			echo $echo_str;
		}

		$result->free();
	}

	$conn->close();
}

// 4. Get Reference Data (dasom_edu_reference :: content, link)
function echo_ref($post_id)
{
	require "db_config.php";
	$sql = "SELECT name, url FROM dasom_edu_reference WHERE post=$post_id ORDER BY idx DESC";

	// if no data (no references)
	if(!($result = $conn->query($sql)))
	{
		echo "추가 참고자료 없음.";
	}
	else // if reference exists
	{
		$count = 1;
		while($row = $result->fetch_assoc())
		{
			$echo_str = "<span>".$count.".&nbsp;".$row['name']."&nbsp;"
				."<a class='refer-link' href='./../php/download_file.php?id=".$row['idx']."'>(링크)</a></span>";
			echo $echo_str;
		}

		$result->free();
	}

	$conn->close();
}

?>