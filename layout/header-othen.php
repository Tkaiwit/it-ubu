<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/alertify.min.css">
	<link rel="stylesheet" href="assets/css/style-one.css">
  <link rel="stylesheet" href="assets/css/model.css">
  <link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree|Kanit|Mitr&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kanit" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<div id="nav-bar">
	<div id=container>
		<div id="box-authen">
			<ul>
				<?php
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";
         if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){?>
          <li><a href="
          	<?php
          	if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          		if($_SESSION['member_status'] == 1){
          			echo "welcome-admin.php"; } }
          			if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          				if($_SESSION['member_status'] == 2){
          					echo "welcome-student.php"; } }
          					if(array_key_exists('teacher_id', $_SESSION) && !empty($_SESSION['teacher_id'])){
          						if($_SESSION['teacher_status'] == 3){
          							echo "welcome-teacher.php"; } }
          	?>
          	"><?php echo $_SESSION['member_firstname']; ?> <?php echo $_SESSION['member_lastname']; ?></a></li><li><a>|</a></li>
          <li><a href="./connectDB/logout/logout.php">Logout</a></li>
        <?php } elseif(array_key_exists('teacher_id', $_SESSION) && !empty($_SESSION['teacher_id'])){ ?>
		<li><a href="<?php
          	if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          		if($_SESSION['member_status'] == 1){
          			echo "welcome-admin.php"; } }
          			if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          				if($_SESSION['member_status'] == 2){
          					echo "welcome-student.php"; } }
          					if(array_key_exists('teacher_id', $_SESSION) && !empty($_SESSION['teacher_id'])){
          						if($_SESSION['teacher_status'] == 3){
          							echo "welcome-teacher.php"; } }
          	?>
          	"><?php echo $_SESSION['teacher_firstname']; ?> <?php echo $_SESSION['teacher_lastname']; ?></a></li><li><a style="color: #fff;">|</a></li>
          <li><a href="./connectDB/logout/logout.php">Logout</a></li>
       <?php } else { ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>  
        <?php } ?>
			</ul>
		</div>
	</div>
	<div id="containertwo">
			<div class="row-header">
				<label id="namehead">IT Information Technology</label>
			</div>
			<div id="box-menu-right">
				<ul>
					<li><a href="index.php">หน้าแรก</a></li>
					<!-- <li><a href="index.php">About</a></li> -->
					<li>
						<div id="dropdown">
		  					<a id="dropbtn">เกี่ยวกับเรา</a>
		 					 <div id="dropdown-content">
		 					 	<a href="viwe-teacher.php">อาจารย์</a>
		 					 	<a href="course.php">หลักสูตร</a>
		  					</div>
						</div>
					</li>
					<li><a href="it-project.php">IT Project</a></li>
					<li><a href="viwe-service.php">IT Service</a></li>
					<li><a href="article.php">บทความ</a></li>
          			<li><a href="view-contact.php">ติดต่อ</a></li>
				</ul>
			</div>
	</div>
</div>
 <div id="slide-down">
	<div id=container>
		<div id="box-authen">
			<ul>
				<?php
         if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){?>
          <li><a href="
          	<?php
          	if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          		if($_SESSION['member_status'] == 1){
          			echo "welcome-admin.php"; } }
          			if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          				if($_SESSION['member_status'] == 2){
          					echo "welcome-student.php"; } }
          					if(array_key_exists('teacher_id', $_SESSION) && !empty($_SESSION['teacher_id'])){
          						if($_SESSION['teacher_status'] == 3){
          							echo "welcome-teacher.php"; } }
          	?>
          	"><?php echo $_SESSION['member_firstname']; ?> <?php echo $_SESSION['member_lastname']; ?></a></li><li><a>|</a></li>
          <li><a href="./connectDB/logout/logout.php">Logout</a></li>
        <?php } elseif(array_key_exists('teacher_id', $_SESSION) && !empty($_SESSION['teacher_id'])){ ?>
		<li><a href="<?php
          	if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          		if($_SESSION['member_status'] == 1){
          			echo "welcome-admin.php"; } }
          			if(array_key_exists('member_id', $_SESSION) && !empty($_SESSION['member_id'])){
          				if($_SESSION['member_status'] == 2){
          					echo "welcome-student.php"; } }
          					if(array_key_exists('teacher_id', $_SESSION) && !empty($_SESSION['teacher_id'])){
          						if($_SESSION['teacher_status'] == 3){
          							echo "welcome-teacher.php"; } }
          	?>
          	"><?php echo $_SESSION['teacher_firstname']; ?> <?php echo $_SESSION['teacher_lastname']; ?></a></li><li><a>|</a></li>
          <li><a href="./connectDB/logout/logout.php">Logout</a></li>
       <?php } else { ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>  
        <?php } ?>
			</ul>
		</div>
	</div>
	<div id="containertwo">
			<div class="row-header">
				<label id="namehead">IT Information Technology</label>
			</div>
			<div id="box-menu-right">
				<ul>
					<li><a href="index.php">หน้าแรก</a></li>
					<li>
						<div id="dropdown">
		  					<a id="dropbtn">เกี่ยวกับเรา</a>
		 					 <div id="dropdown-content">
		 					 	<a href="viwe-teacher.php">อาจารย์</a>
		 					 	<a href="course.php">หลักสูตร</a>
		  					</div>
						</div>
					</li>
					<li><a href="it-project.php">IT Project</a></li>
					<li><a href="viwe-service.php">IT Service</a></li>
					<li><a href="article.php">บทความ</a></li>
          			<li><a href="view-contact.php">ติดต่อ</a></li>
				</ul>
			</div>
	</div>
  </div> 
