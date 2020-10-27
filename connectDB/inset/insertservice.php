<?php 
    session_start();
	include('../connectDB.php');
	if($_POST) {
        $s_topic = $_POST['s_topic'];
		$s_detail = $_POST["s_detail"];
        $s_tel = $_POST["s_tel"];
	    $picture_tmp = $_FILES['img']['tmp_name'];
	    $picture_name = $_FILES['img']['name'];
	    $picture_type = $_FILES['img']['type'];

    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    if(in_array($picture_type, $allowed_type)) {
        $path = '../../image/'.$picture_name;
        $images= 'image/'.$picture_name;//change this to your liking
    }
        $req = "INSERT INTO `service`( `service_topic`, `teacher_id`, `service_img`,`service_detail`,`service_tel`)
         VALUES ('$s_topic','".$_SESSION['teacher_id']."','$images','$s_detail','$s_tel')";
        move_uploaded_file($picture_tmp, $path);

        if (mysqli_query($conDB,$req)) {
            echo 'ok';
            header("location:../../it-service.php");
        } else {
        	echo $req;
            echo 'เออรู้แล้วว่าเขียนคำสั่ง sql ผิด';
        }
        
    }
?>