<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>tha article</title>
	<link rel="stylesheet" href="assets/css/welcome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/alertify.min.css">
	<link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree|Kanit|Mitr&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kanit" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/model.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/alertify.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>

</head>
<body>
	<nav>
		<div id="container">
			<div id="nav-grid">
			<div id="logo">
				IT Information Technology
			</div>
			<div id="menu-r">
				<ul class="nav">
					<li class="nav-menu">
						<a href="./index.php">หน้าแรก</a>
					</li>
					<li class="nav-menu">	
						<div id="dropdown">
		  					<a id="dropbtn" class="#about">เกี่ยวกับเรา</a>
		 					 <div id="dropdown-content">
		 					 	<a href="viwe-teacher.php">อาจารย์</a>
		 					 	<a href="course.php">หลักสูตร</a>
		  					</div>
						</div>
					</li>
					<li class="nav-menu">
						<a href="./article.php">บทความ</a>
					</li>
					<li class="nav-menu">
						<a href="./contact.php">ติดต่อเรา</a>
					</li>
					<?php 
					if(array_key_exists("member_status", $_SESSION)) {
						if($_SESSION['member_status']== 1 || $_SESSION['member_status'] == 2) {
					?>
					<li style="color: #ccc;">| <?php echo $_SESSION['member_firstname']?> <?php echo $_SESSION['member_lastname']?></li>
          			<li><a href="connectDB/logout/logout.php">Logout</a></li>
          		    <?php 
          				} 
          			}
          			if(array_key_exists("teacher_status", $_SESSION)) {
          		    ?>
          		   	<li style="color: #ccc;">| <?php echo $_SESSION['teacher_firstname']?> <?php echo $_SESSION['teacher_lastname']?></li>
          			<li><a href="connectDB/logout/logout.php">Logout</a></li>
          		   <?php } ?>
				</ul>
			</div>
			</div>
		</div>
	</nav>
<script>
	// Get the URL
	var url = window.location;

// Select nav list item and select
// Will only work if string in href matches with location
	$('ul.nav a[href="'+ url +'"]').parent().addClass('selected');

// Will also work for relative and absolute hrefs
	$('ul.nav a').filter(function() {
  		return this.href == url;
	}).parent().addClass('active');
</script>
<div id="container">
	<div id="grid-scetion">
		<div id="menu-l">
<?php if (array_key_exists('member_status', $_SESSION)) {
	if ($_SESSION['member_status'] == 1) {?>
		<div id="profile" class="profile-active">
			<?php if(array_key_exists("member_status", $_SESSION)) { 
				if($_SESSION['member_status'] == 1 || $_SESSION['member_status'] == 2) { ?>
			<div>				
				<!-- <a href="welcome-student.php"> -->
					<div id="p-f-g">			
						<div id="p-f">
							<img src="assets/img/1.png" alt="">
						</div>	
						<div id="name-p">
							<label><?php echo $_SESSION['member_firstname']?> <?php echo $_SESSION['member_lastname']?></label>
						</div>
					</div>
				<!-- </a> -->
			</div>
			<div id="editprofile">
			<a title="แก้ไขโปรไฟล์" onclick="window.location.href='./editprofile.php';"><div>
				<img style="width: 19px;height: 6px; margin-top: 10px;" src="assets/img/New Project.png"></div>
			</a>
			</div>
		</div>
<?php } } } } ?>

<?php if (array_key_exists('member_status', $_SESSION)) {
	if ($_SESSION['member_status'] == 2) { ?>
		<div id="profile" class="profile-active">
			<div>
			<a href="welcome-student.php">
				<?php if(array_key_exists("member_status", $_SESSION)) { 
				if($_SESSION['member_status'] == 1 || $_SESSION['member_status'] == 2) { ?>
				<div id="p-f-g">
					<div>
						<img src="assets/img/1.png" alt="">
					</div>
					<div id=name-p>
					<label><?php echo $_SESSION['member_firstname']?> <?php echo $_SESSION['member_lastname']?></label>
					</div>
				</div>
			</a>
			</div>
			<div id="editprofile">
				<a title="แก้ไขโปรไฟล์" onclick="window.location.href='./editprofile.php';"><div>
					<img style="width: 19px;height: 6px; margin-top: 10px;" src="assets/img/New Project.png"></div>
				</a>
			</div>
		</div>
<?php } } } } ?>

<?php if (array_key_exists('teacher_status', $_SESSION)) {
	if($_SESSION['teacher_status'] == 3) { ?>
		<div id="profile" class="profile-active">
			<div>
			<a href="welcome-teacher.php">
				<div id="p-f-g">
					<div>
						<img src="<?php echo $_SESSION['teacher_img'] ?>">
					</div>
					<div id=name-p>
					<label><?php echo $_SESSION['teacher_firstname']?> <?php echo $_SESSION['teacher_lastname']?></label>
					</div>
				</div>
			</a>
			</div>
			<div id="editprofile">
				<a title="แก้ไขโปรไฟล์" onclick="window.location.href ='./editprofile.php';"><div>
					<img style="width: 19px;height: 6px; margin-top: 10px;" src="assets/img/New Project.png"></div>
				</a>
			</div>
		</div>
<?php } } ?>
			<!-- </div>	 </div> -->

				<div id="menu-ul">
				<ul class="menu">
					<?php
					if(array_key_exists("member_status", $_SESSION)) {  
						if($_SESSION['member_status'] == 1 ){ 
					?>
					<li><a href="./news.php">News</a></li>
					<li><a class="mm-l" href="slide-the-cover.php">Slide the cover</a></li>
					<li><a class="mm-l">IT Project</a><img src="assets/img/11.png">
					    <ul class="sub-menu">
					      <li><a class="mm-l" href="./upload-project.php">Upload Project</a></li>
					      <li><a class="mm-l" href="./edit-project.php">Edit Project</a>
					      </li>
					      <li>
					      	<a class="mm-l" href="./deleteproject.php">Delete Project</a>
					      </li>
					    </ul>
					</li>
					<li><a class="mm-l" href="it-service.php">IT Service</a></li>
					<li><a href="./students.php">Students</a></li>
					<li><a href="./teacher.php">Thacher</a></li>
					<li><a href="connectDB/logout/logout.php">Logout</a></li>
					<?php } else if($_SESSION['member_status']== 2) { ?>
					<li><a href="view-new.php">News</a></li>
					<li><a class="mm-l" href="viwe-service.php">IT Service</a></li>
					<li><a class="mm-l">IT Project</a><img src="assets/img/11.png">
					    <ul class="sub-menu">
					    <?php 
					    include('connectDB/connectDB.php');
					    $chobj = "SELECT * FROM  member";
					    $chrs=mysqli_query($conDB,$chobj);
					    while ($chrow=mysqli_fetch_array($chrs)) {
					    	if($_SESSION['member_id']==$chrow['member_id']){
					    ?>
					    <?php if ($chrow['member_upload_project'] == NULL){ ?>
					      <li><a class="mm-l" href="./upload-project.php">Upload Project</a></li>
					    <?php  
					      	} else {?>
					      <li><a id="isDisabled" class="mm-l" >Upload Project</a></li>		
						<?php
								}
					      	}
					  	} 
					  	?>
					      <li><a class="mm-l" href="./edit-project.php">Edit Project</a>
					      </li>
					      <li>
					      	<a class="mm-l" href="./deleteproject.php">Delete Project</a>
					      </li>
					    </ul>
					</li>
					<li><a href="connectDB/logout/logout.php">Logout</a></li>	
					<?php 
						} 
					}
					if(array_key_exists("teacher_status", $_SESSION)) { 
					if($_SESSION['teacher_status'] == 3) { 
					?>	
					<li><a href="./news.php">News</a></li>
					<li><a href="./the-article.php">The article</a></li>
					<li><a class="mm-l" href="slide-the-cover.php">Slide the cover</a></li>
					<li><a class="mm-l" href="it-service.php">IT Service</a></li>
					<li><a href="connectDB/logout/logout.php">Logout</a></li>
					<?php } } ?> 
				</ul>
					<script>
						$('ul.menu').find('> li').click(function(){
							$(this).find('> ul').slideToggle();
						});
						$("ul.sub-menu").find('> li').click(function(){
							$(this).find('> ul').slideToggle();
						});
					</script>
				</div>
			</div>

