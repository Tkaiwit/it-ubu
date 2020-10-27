<?php
	session_start();
	if($_POST) {
	include('../connectDB.php');
		$s_id = $_POST['s_id'];
		$s_detail = $_POST["s_detail"];
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

		$sql = "UPDATE service SET `service_topic`='$s_detail', `service_img`='$images' WHERE  `service_id`='$s_id' ";

		move_uploaded_file($picture_tmp, $path);

	if (mysqli_query($conDB,$sql)) {
		echo $sql;
	    // header("location:../../../itubu/it-service.php");
	} else {
		echo $sql;
	    echo "Error updating record: ";
	}
}
?>