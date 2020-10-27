<?php 
	include('../connectDB.php');
		// $ch_testID = $_POST["txttestid"];
		// $sql ="INSERT INTO testunit (test_id,test_name,b_a_status,unitID) VALUES ('$ch_testID','$ch_toptip','$ch_status','$ch_unitID')";
		// $res = mysql_query($sql) or die("Error in query: $sql " . mysql_error());
		// header("location:../searchchl.php");
		$m_id = $_POST["m_id"];
		$m_password = $_POST["m_password"];
		$m_firstname = $_POST["m_firstname"];
		$m_lastname = $_POST["m_lastname"];
		$m_email = $_POST["m_email"];
		$m_department = $_POST["m_department"];
		$m_academic_year = $_POST["m_academic_year"];
		$m_class = $_POST["m_class"];
		$m_address = $_POST["m_address"];
		$sql = "INSERT INTO `member`(`member_id`, `member_firstname`, `member_lastname`, `member_password`, `member_email`, `member_address`, `member_department`, `member_class`, `member_academic_year`, `teacher_id`) VALUES ('$m_id','$m_firstname','$m_lastname',MD5('$m_password'),'$m_email','$m_address','$m_department','$m_class','$m_academic_year','NUll')";
		$res = mysqli_query($conDB,$sql) or die("Error in query:$sql".mysqli_error());
		header("location:../../login.php");
?>