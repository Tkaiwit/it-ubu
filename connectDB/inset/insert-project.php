<?php
session_start();
include('../connectDB.php');
if($_POST) {
		$p_name =$_POST['p_name'];
		$p_contant =$_POST['p_contant'];
        $p_year=$_POST['p_year'];
        $c_id=$_POST['c_id'];
        $t_id=$_POST['t_id'];
        $member_id= $_SESSION['member_id'];
	    $picture_tmp = $_FILES['image']['tmp_name'];
	    $picture_name = $_FILES['image']['name'];
	    $picture_type = $_FILES['image']['type'];
        $filename = $_FILES['myfile']['name'];
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];

        $maxsize = 1932735283; // 1.8GB

       $destination = '../../zip/' . $filename;
       $pathzip = 'zip/'.$filename;

       $name = $_FILES['file']['name'];
       $fileSize = $_FILES['image']['size'];
       $target_dir = "../../videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'rar'])) {
        echo "You file extension must be .zip, .pdf , .rar or .docx";
    }
    if ($_FILES['myfile']['size'] > 1932735283) { // file shouldn't be larger 1Megabyte
        echo "File too large!";
    }

    if(in_array($picture_type, $allowed_type)) {
        $path = '../../image/'.$picture_name;
        $images= 'image/'.$picture_name;//change this to your liking
    } else {
        $error[] = 'File type not allowed';
    }

    if(!empty($error)) {
        echo '<font color="red">'.output_errors($error).'</font>';

    } else if(empty($error)) {
        $objs = "INSERT INTO `project`(`project_name`, `project_contant`, `project_year`, `member_id`, `categries_id`, `teacher_id`, `project_image`,`project_video`,`project_video_location`,`project_status`,`project_zip`,`project_zip_size`,`project_download`) VALUES ('$p_name','$p_contant','$p_year','$member_id','$c_id','$t_id','$images','$name','$target_file',1,'$pathzip',$size,0)";
        move_uploaded_file($picture_tmp, $path);
        move_uploaded_file($_FILES['file']['tmp_name'],$target_file);

        if (mysqli_query($conDB,$objs)) {
            header("location:../../upload-project.php");
            // echo 'ok';
        } else {
        	echo $objs;
            echo 'เออรู้แล้วว่าเขียนคำสั่ง sql ผิด';
        }
        
    }
}
?>