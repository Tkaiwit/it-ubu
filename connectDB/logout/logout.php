<?php
	session_start();
	if(array_key_exists("member_status", $_SESSION)){
		if($_SESSION['member_status'] == 1 || $_SESSION['member_status'] == 2) {
			$mysql = "UPDATE member SET `member_logout_date`=CURRENT_TIMESTAMP WHERE member_id='".$_SESSION['member_id']."'";
			// echo $mysql;
			$result = mysqli_query($conDB,$mysql);

			session_destroy();
			header("location:../../../../itubu/login.php");
		}
	}
	if(array_key_exists("teacher_status", $_SESSION)){
		if($_SESSION['teacher_status'] == 3 ) {
			$mysqlt = "UPDATE teacher SET `member_logout_date`=CURRENT_TIMESTAMP WHERE teacher_id='".$_SESSION['teacher_id']."'";
			$results = mysqli_query($conDB,$mysqlt);

			session_destroy();
			header("location:../../../../itubu/login.php");
		}
	}
?>