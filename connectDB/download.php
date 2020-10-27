<?php
include('connectDB.php');
if(isset($_GET['id'])){
	$id= $_GET['id'];
	$stat= $db->prepare("SELECT * FROM project where id=?");
	$stat->bindParam(1,$id);
	$stat->exeute();
	$data = $stat->fetch();
	$file= '../zip/'.$data['filename'];
	if (file_exists($file)) {
		header('Content-Description: '.$data['description']);
		header('Content-Type: '.$data['type']);
		header('Content-Description: '.$data['description'].';filename="'.basename($file).'"');
		header('Expires: '.$data['expires']);
		header('Cache-Control: '.$data['cache']);
		header('Pragma: '.$data['pragma']);
		header('Content-Length: '.filesize($file));
		readfile($file);
		exit;

	}

}
?>