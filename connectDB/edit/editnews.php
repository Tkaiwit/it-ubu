<?php 
    session_start();
	include('../connectDB.php');
	if($_POST) {
        $n_id = $_POST["n_id"];
        $n_topic = $_POST["n_topic"];
		$n_detail = $_POST["n_detail"];
	    $picture_tmp = $_FILES['img']['tmp_name'];
	    $picture_name = $_FILES['img']['name'];
	    $picture_type = $_FILES['img']['type'];

    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    if(in_array($picture_type, $allowed_type)) {
        $path = '../../image/'.$picture_name;
        $images= 'image/'.$picture_name;//change this to your liking
    }
        $req = "UPDATE new SET  `new_topic`='$n_topic', `new_detail`='$n_detail', `new_img`='$images'
         where `new_id`='$n_id'";
        move_uploaded_file($picture_tmp, $path);

        if (mysqli_query($conDB,$req)) {
            echo 'ok';
            header("location:../../news.php");
        } else {
        	echo $req;
            echo 'เออรู้แล้วว่าเขียนคำสั่ง sql ผิด';
        }
        
    }
?>