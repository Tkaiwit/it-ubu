<?php 
    session_start();
	include('../connectDB.php');
	if($_POST) {
        $d_f = $_POST["d_f"];
		$d_l = $_POST["d_l"];
		$d_m = $_POST["d_m"];
		$p_id = $_POST["p_id"];
		$p_d = $_POST["p_d"];

        $req = "INSERT INTO `download`(`download_firstname`, `download_lastname`, `download_mail`, `project_id`) VALUES ('$d_f','$d_l','$d_m','$p_id')";
        $sql="SELECT COUNT(download_id)FROM download WHERE project_id; ";
        $reqs = "UPDATE `project` SET `project_download`='$p_d'+1  WHERE `project_id`= '$p_id '";
        if(mysqli_query($conDB,$reqs)){

        }
        if (mysqli_query($conDB,$req)) {
            // echo $req;
            header("location:../../viwe-project.php.?id=$p_id");
        } else {
        	echo $req;
            echo 'เออรู้แล้วว่าเขียนคำสั่ง sql ผิด';
        }
        
    }
?>