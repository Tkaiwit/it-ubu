<?php include("layout/header.php") ?>
<div id="container-form-register">
	<form action="connectDB/inset/inset-member.php" method="POST"><br>
		<label>สมัครสมาชิก</label>
		<div id="form-col-register">
		<div>
		รหัสนักศึกษา
		<input type="text" name="m_id" placeholder="รหัสนักศึกษา" >
		</div>
		<div>
		รหัสผ่าน<br>
		<input type="password" name="m_password" placeholder="รหัสผ่าน" >
		</div>
		<div>
		ชื่อ <br>
		<input type="text" name="m_firstname" placeholder="ชื่อนักศึกษา" >
		</div>
		<div>
		นามสกุล<br>
		<input type="text" name="m_lastname" placeholder="นามสกุล" >
		</div>
		<div>
		อีเมล<br>
		<input type="text" name="m_email" placeholder="อีเมล" >
		</div>
		<div>
		แผนกวิชา<br>
		<input type="text" name="m_department">
		</div>
		<div>
		ระดับชั้นปี<br>
		<input type="text" name="m_class">
		</div>
		<div>
		ปีการศึกษา<br>
		<input type="text" name="m_academic_year">
		</div>
		<div>
		ที่อยู่ <br>	
		<textarea id="inputarea" name="m_address"></textarea>
		</div>
		</div>
		<button type="submit">Register Now!</button>
	</form>
</div>
<?php include("layout/footer.php") ?>