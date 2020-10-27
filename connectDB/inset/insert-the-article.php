<?php
	session_start();
	include('../connectDB.php');
		$ta_topic = $_POST["the_article_topic"];
		$ta_detail = $_POST["the-article"];
		$m_id = $_SESSION["teacher_id"];
		$sql = "INSERT INTO `the-article`(`the-article_detail`, `teacher_id`,`the_article_topic`) VALUES ('$ta_detail','$m_id','$ta_topic')";
		// echo $sql;
		// echo $_POST["the-article"];
		if (mysqli_query($conDB,$sql)) {
			// echo $sql;
	    header("location:../../../itubu/the-article.php");
		} else {
		echo $sql;
	    echo "Error updating record: ";
		}
?>