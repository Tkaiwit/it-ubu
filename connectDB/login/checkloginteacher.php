<?php
// session_start();
include('../connectDB.php');
$ip = $_SERVER['REMOTE_ADDR'];
$studentID = $_POST['t_Username'];
$password = md5($_POST['t_Password']);

if ($_POST['t_Username'] and $_POST['t_Password']){

	$sql = "SELECT * FROM teacher WHERE teacher_id='".$_POST['t_Username']."' AND
	teacher_password='".md5($_POST['t_Password'])."' ";
	$res = mysqli_query($conDB,$sql);
	$arr = mysqli_fetch_array($res);
	$ip = $_SERVER['REMOTE_ADDR'];
	$mysql = "UPDATE teacher SET `teacher_login_ip`='$ip',`teacher_login_date`=CURRENT_TIMESTAMP WHERE teacher_id='$studentID'";
	$result = mysqli_query($conDB,$mysql);
		if($arr['teacher_status']==3){
			session_start();
			$_SESSION['teacher_id']=$studentID;
			$_SESSION['teacher_firstname']=$arr['teacher_firstname'];
			$_SESSION['teacher_lastname']=$arr['teacher_lastname'];
			$_SESSION['teacher_img']=$arr['teacher_img'];
			$_SESSION['teacher_status']=$arr['teacher_status'];
			header("location:../../../../itubu/welcome-teacher.php");
			die();
		}
	} else {
	echo "กรุณกรอกข้อมูลให้ครบ";
	echo "<br><a href='login.php'>ย้อนกลับ</a>";
}



?>