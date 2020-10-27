<?php
	session_start();
	include('../connectDB.php');
		$ta_topic = $_POST['the_article_topic'];
		$ta_id = $_POST['a_id'];
		$ta_detail = $_POST["the-article"];
		$sql = "UPDATE `the-article` SET `the-article_detail`='$ta_detail',`the_article_topic`='$ta_topic' WHERE  `the-article_id`='$ta_id' ";

	if (mysqli_query($conDB,$sql)) {
	    header("location:../../../itubu/the-article.php");
	} else {
		echo $sql;
	    echo "Error updating record: ";
	}
?>