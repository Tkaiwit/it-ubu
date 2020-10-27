<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/login-css.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kanit" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div id="container-login">
		<div id="grid-one">
			<div>
				<img src="" alt="">
			</div>
			<div id="img-culture">
				<img src="assets/img/graphic2.svg">
			</div>
		</div>
		<div id="grid-two">
			<div id="topic">
				<label>
					<b>IT Information Technology</b>
				</label>
			</div>
			<div id="link-S-T">
				<a href="login.php">Login For students</a> <span>Or</span>
				<a class="active" href="login-teacher.php" id="teachers">Login For teachers</a>
			</div>
			<div id="link-l-r">
				<a class="active-t pointer" id="view-login">Login</a>
				<a class="active-y pointer" id="view-Register">Register</a>
			</div>
			<form action="connectDB/login/checkloginteacher.php" id="form-login" method="POST">
			<div id="input-user">
				<input type="text" name="t_Username" placeholder="Username....">
			</div>
			<div id="input-user">
				<input type="password" name="t_Password" placeholder="Password....">
			</div>
			<div id="buton-singin">
				<a href="index.php"> เข้าสู่เว็บไซต์ </a>
				<button type="submit">Sign In Now!</button>
			</div>
			</form>
			<form action="connectDB/inset/inset-member.php" method="POST" id="form-register">
			<div id="form-col-register">
			<div >
				<!-- <dd for="">รหัสนักศึกษา</dd> -->
				<input type="text" name="m_id" placeholder="รหัสนักศึกษา" >
			</div>
			<div>
				<!-- <dd for="">รหัสผ่าน</dd> -->
				<input type="password" name="m_password" placeholder="รหัสผ่าน" >
			</div>
			<div>
				<!-- <dd for="">ชื่อ</dd> -->
				<input type="text" name="m_firstname" placeholder="ชื่อนักศึกษา" >
			</div>
			<div>
				<!-- <dd for="">นามสกุล</dd> -->
				<input type="text" name="m_lastname" placeholder="นามสกุล" >
			</div>
			<div>
				<!-- <dd for="">อีเมล</dd> -->
				<input type="text" name="m_email" placeholder="อีเมล" >
			</div>
			<div>
				<!-- <dd for="">ภาควิชา</dd> -->
				<input type="text" name="m_department" placeholder="ภาควิชา">
			</div>
			<div>
				<!-- <dd for="">ระดับชั้นปี</dd> -->
				<select id="choice">
					<option value="0" selected="selected" >ระดับชั้นปี</option>
					<option value="1">ปี 1 </option>
					<option value="2">ปี 2 </option>
					<option value="3">ปี 3 </option>
					<option value="4">ปี 3 ต่อเนื้อง</option>
					<option value="5">ปี 4 </option>
				</select>
			</div>
			<div>
				<!-- <dd for="">ปีการศึกษา</dd> -->
				<input type="text" name="m_academic_year" placeholder="ปีการศึกษา">
			</div>
			<div>
				<!-- <dd for="">ที่อยู่</dd> 	 -->
				<textarea id="inputarea" name="m_address" placeholder="ที่อยู่"></textarea>
			</div>
			</div>
			<div id="button-register">
				<button type="submit">Register Now!</button>
			</div>
			</form>
			<script type="text/javascript">
				$('#form-register').hide();
				$('.active-t').css({'font-weight':'bold'});
				$("#view-login").click(
					function(){
					$('#form-login').show();
					$('#form-register').hide();
					$('.active-t').css({'font-weight':'bold'});
					$('.active-y').css({'font-weight':'normal'});
				});
				$('#view-Register').click(function(){
					$('#form-login').hide();
					$('#form-register').show();
					$('.active-y').css({'font-weight':'bold'});
					$('.active-t').css({'font-weight':'normal'});
				})
				$("#choice").change(function () {
    			if($(this).val() == "0") $(this).addClass("empty");
    			else $(this).removeClass("empty")
				});
				$("#choice").change();
			</script>
		</div>
	</div>
</body>
</html>
