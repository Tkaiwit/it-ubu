<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home | It Information</title>
	<link rel="stylesheet" href="assets/css/alertify.min.css">
	<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree|Kanit|Mitr&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kanit" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>
<body>
	<main class="main-content">
    <section class="slideshow">
    <div class="slideshow-inner">
		<div id="container">
      <div class="slides">
  <?php
    include("connectDB/connectDB.php");
    $sql = "SELECT * FROM slide_img";
    $res = mysqli_query($conDB,$sql);
   while ($row=mysqli_fetch_array($res)) {
   ?> <?php if ($row['slide_id']==1) {?>
        <div class="slide is-active ">
        <?php }else{ ?>
        <div class="slide">
         <?php }?>
          <div class="slide-content">
            <div class="caption" style="margin-top: 10px;">
              <div class="title"><?php echo $row['slide_topic']?></div>
              <div class="text">
                <p style="width: 400px; "><?php echo $row['slide_decription']?></p>
              </div> 
              <!-- <a href="#" class="btn">
                <span class="btn-inner"><?php echo $row['slide_name_button']?></span>
              </a> -->
            </div>
          </div>
          <div class="image-container">
            <img src="<?php echo $row['slide_img']?>" alt="" class="image" />
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="pagination">
        <?php 
        // include();
        $sql2="SELECT * FROM slide_img";
        $red=mysqli_query($conDB,$sql2);
        while($arow=mysqli_fetch_array($red)){
          if($arow['slide_id']==1){
          ?>
        <div class="item is-active">
        <?php } else {?>
        <div class="item">
        <?php } ?> 
          <span class="icon">1</span>
        </div>
        <?php } ?>
      </div>
      <div class="arrows">
        <div class="arrow prev">
          <span class="svg svg-arrow-left">
            <svg version="1.1" id="svg4-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M13,26c-0.256,0-0.512-0.098-0.707-0.293l-12-12c-0.391-0.391-0.391-1.023,0-1.414l12-12c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L2.414,13l11.293,11.293c0.391,0.391,0.391,1.023,0,1.414C13.512,25.902,13.256,26,13,26z"/> </svg>
            <span class="alt sr-only"></span>
          </span>
        </div>
        <div class="arrow next">
          <span class="svg svg-arrow-right">
            <svg version="1.1" id="svg5-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M1,0c0.256,0,0.512,0.098,0.707,0.293l12,12c0.391,0.391,0.391,1.023,0,1.414l-12,12c-0.391,0.391-1.023,0.391-1.414,0s-0.391-1.023,0-1.414L11.586,13L0.293,1.707c-0.391-0.391-0.391-1.023,0-1.414C0.488,0.098,0.744,0,1,0z"/> </svg>
            <span class="alt sr-only"></span>
          </span>
        </div>
      </div>
    </div> 
  </section>
</main>
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
            "><?php echo $_SESSION['member_firstname']; ?> <?php echo $_SESSION['member_lastname']; ?></a></li><li><a style="color: #fff;">|</a></li>
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
          <!-- <li style="color: #fff;">|</li>
          <li><a href="login.php">นักศึกและอาจารย์</a></li> -->
        </ul>
      </div>
  </div>
<div id="slide-down">
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
            "><?php echo $_SESSION['member_firstname']; ?> <?php echo $_SESSION['member_lastname']; ?></a></li><li><a style="color: #fff;">|</a></li>
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
  <div id="register-now">
      <a href="#">สมัครเรียนต่อ</a>
  </div>
