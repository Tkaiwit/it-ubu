<?php include("../itubu/layout/header-backend.php") ?>
<!-- <script type="text/javascript">
  alertify.set('notifier','position', 'ยินดีต้อนรับค่ะ');
  alertify.success('คุณได้เข้าสู่ระบเรียบร้อย : ' + alertify.get('notifier','position'));
</script> -->
<div id="detailt">
	<div id="s-p">
	<label>ราชื่ออาจารย์</label>
	</div>
	<div id="show-thacher">
		<?php 
		include('connectDB/connectDB.php');
		$sql="SELECT * FROM teacher";
		$res=mysqli_query($conDB,$sql);
		while ($row=mysqli_fetch_array($res)) {?>
		<div><?php echo $row['teacher_id']?></div>
		<div><?php echo $row['teacher_firstname']?>&nbsp;<?php echo $row['teacher_lastname']?></div>
		<div><?php echo $row['teacher_email']?></div>
		<div><?php echo $row['teacher_room']?></div>
		<div>
			<a title="แก้ไขข้อมูล" href="edit-thacher.php?$tis=<?php echo $row['teacher_id']?>"><img src="assets/img/iconfinder_edit-alt_383147.png" alt=""></a>
			<a onclick="return checkDeletee('<?php echo $row['teacher_firstname'];?>','<?php echo $row['teacher_lastname'];?>','<?php echo $row['teacher_id'];?>')"><img src="assets/img/iconfinder_trash-bin-garbage-delete-rubbish-waste_3643729.png" ></a>
		</div>
		<?php }?>
	</div>
</div>
<script type="text/javascript">
  function checkDeletee(teacher_firstname, teacher_lastname,teacher_id){
    alertify.confirm('<b>คุณต้องการลบข้อมูลของ</b><hr />','ชื่อ '+teacher_firstname+' นามสุก '+teacher_lastname,
      function(){
        alertify.success('Ok');
        window.location.href = "connectDB/delete/deleteteacher.php?id=" + teacher_id;
      },
      function(){
        alertify.error('Cancel');
      });
  }
</script>

		</div>
	</div>
</body>
</html>