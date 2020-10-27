<?php
	session_start();
	include('../connectDB.php');
		$txtpassword = $_POST["m_password"];
		$txtfirstname = $_POST["m_firstname"];
		$txtlastname = $_POST["m_lastname"];
		$txtemail = $_POST["m_email"];
		$txtdepartment = $_POST["m_department"];
		$txtclass = $_POST["m_class"];
		$txtacademic_year = $_POST["m_academic_year"];
		$txtaddress = $_POST["m_address"];
		$txtstatus = $_POST['m_status'];
		$sql = "UPDATE member SET member_firstname='$txtfirstname',member_lastname='$txtlastname',member_password=MD5('$txtpassword'),member_email='$txtemail',member_address='$txtaddress',member_department='$txtdepartment',member_class='$txtclass',member_academic_year='$txtacademic_year',teacher_id='NULL',member_status='$txtstatus' WHERE member_id='".$_SESSION["member_id"]."' ";

	if (mysqli_query($conDB,$sql)) {
	    header("location:../../../itubu/editprofile.php");
	} else {
		echo $sql;
	    echo "Error updating record: ";
	}
?>