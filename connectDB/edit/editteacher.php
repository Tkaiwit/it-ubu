<?php
	session_start();
	include('../connectDB.php');
	if($_POST) {
		$t_id = $_POST['t_id'];
		$t_firstname = $_POST["t_firstname"];
		$t_lastname = $_POST["t_lastname"];
		$t_email = $_POST["t_email"];
        $t_position = $_POST["t_position"];
        $t_room = $_POST["t_room"];
        $t_tel = $_POST["t_tel"];
	    $picture_tmp = $_FILES['img']['tmp_name'];
	    $picture_name = $_FILES['img']['name'];
	    $picture_type = $_FILES['img']['type'];

    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    if(in_array($picture_type, $allowed_type)) {
        $path = '../../image/'.$picture_name;
        $images= 'image/'.$picture_name;//change this to your liking
    } else {
        $error[] = 'File type not allowed';
    }

    if(!empty($error)) {
        $t_img= $_POST["t_img"];
        $t_id = $_POST['t_id'];
        $t_password = $_POST['t_password'];
        $t_firstname = $_POST["t_firstname"];
        $t_lastname = $_POST["t_lastname"];
        $t_email = $_POST["t_email"];
        $t_position = $_POST["t_position"];
        $t_room = $_POST["t_room"];
        $t_tel = $_POST["t_tel"];
        $md5 = MD5($t_password);
        // echo '<font color="red">'.output_errors($error).'</font>';
        $req = "UPDATE teacher SET teacher_password='$md5',teacher_firstname='$t_firstname',teacher_lastname='$t_lastname',teacher_img='$t_img',teacher_email='$t_email',teacher_room='$t_room',teacher_position='$t_position',teacher_tel='$t_tel' WHERE teacher_id='$t_id'";
        if (mysqli_query($conDB,$req)) {
            echo $req;
            header("location:../../../itubu/teacher.php");
        } else {
            echo $req;
            echo 'เออรู้แล้วว่าเขียนคำสั่ง sql ผิด';
        }

    } else if(empty($error)) {
        $req = "UPDATE teacher SET teacher_firstname='$t_firstname',teacher_lastname='$t_lastname',teacher_img='$images',teacher_email='$t_email',teacher_room='$t_room',teacher_position='$t_position',teacher_tel='$t_tel' WHERE teacher_id='$t_id'";
        move_uploaded_file($picture_tmp, $path);

        if (mysqli_query($conDB,$req)) {
            echo 'ok';
            header("location:../../../itubu/teacher.php");
        } else {
        	echo $req;
            echo 'เออรู้แล้วว่าเขียนคำสั่ง sql ผิด';
        }
        
    }
}
 ?>