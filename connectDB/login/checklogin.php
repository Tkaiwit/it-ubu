<?php
// session_start();
include('../connectDB.php');
$ip = $_SERVER['REMOTE_ADDR'];
$studentID = $_POST['txtUsername'];
$password = md5($_POST['txtPassword']);



if ($_POST['txtUsername'] and $_POST['txtPassword']){

	$sql = "SELECT * FROM member WHERE member_id='".$_POST['txtUsername']."' AND
	member_password='".md5($_POST['txtPassword'])."' ";
	$res = mysqli_query($conDB,$sql);
	$arr = mysqli_fetch_array($res);
	$ip = $_SERVER['REMOTE_ADDR'];
	$mysql = "UPDATE member SET `member_login_ip`='$ip',`member_login_date`=CURRENT_TIMESTAMP WHERE member_id='$studentID'";
	$result = mysqli_query($conDB,$mysql);
		if($arr['member_status'] == 1 ){
			session_start();
			$_SESSION['member_id']=$studentID;
			$_SESSION['member_firstname']=$arr['member_firstname'];
			$_SESSION['member_lastname']=$arr['member_lastname'];
			$_SESSION['member_status']=$arr['member_status'];
			header("location:../../../../itubu/welcome-admin.php");
			die();
		}elseif($arr['member_status'] == 2){
			session_start();
			$_SESSION['member_id']=$studentID;
			$_SESSION['member_firstname']=$arr['member_firstname'];
			$_SESSION['member_lastname']=$arr['member_lastname'];
			$_SESSION['member_status']=$arr['member_status'];
			header("location:../../../../itubu/welcome-student.php");
			die();
		}else{
			header("location:../../../../itubu/login.php");
		}
	}else{
	echo "กรุณกรอกข้อมูลให้ครบ";
	echo "<br><a href='login.php'>ย้อนกลับ</a>";
}



?>