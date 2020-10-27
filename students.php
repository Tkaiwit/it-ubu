<?php include("../itubu/layout/header-backend.php") ?>
<div id="detailone">
	<div id="s-p">
	<label>ราชื่อนักศึกษา</label>
	</div>
	<div id="show-students">
		<?php 
		include('connectDB/connectDB.php');
		$sql="SELECT * FROM member";
		$res=mysqli_query($conDB,$sql);
		while ($row=mysqli_fetch_array($res)) {?>
		<div><?php echo $row['member_id']?></div>
		<div><?php echo $row['member_firstname']?>&nbsp;<?php echo $row['member_lastname']?></div>
		<div><?php echo $row['member_email']?></div>
		<div><?php echo $row['member_department']?></div>
		<div>
			<a title="แก้ไขข้อมูล" href=""><img src="assets/img/iconfinder_edit-alt_383147.png" alt=""></a>
			<a href="" title="ลบข้อมูล"><img src="assets/img/iconfinder_trash-bin-garbage-delete-rubbish-waste_3643729.png" alt=""></a>
		</div>
		<?php }?>
	</div>
</div>

		</div>
	</div>
</body>
</html>