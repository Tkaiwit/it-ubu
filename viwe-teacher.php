<?php include("layout/header-othen.php")?>
<div id="container-sh">
<?php include('connectDB/connectDB.php');
$objs="SELECT * FROM teacher order by teacher_number ASC";
$ors=mysqli_query($conDB,$objs);
while ($rows=mysqli_fetch_array($ors)){?>
<div id="teacher-show">
	<div id="t-s">
		<div><img src="<?php echo $rows['teacher_img']?>"></div>
		<div id="tail-ss">
			<div id="name"><?php echo $rows['teacher_firstname']?> <?php echo $rows['teacher_lastname']?></div>
			<div id="xox"><?php echo $rows['teacher_email']?></div>
			<div><a href="history-teacher.php?$id=<?php echo $rows['teacher_id'] ?>">ประวัติและผลงาน</a></div>
		</div>
	</div>
</div>
<?php }?>
</div>
<br><br><br>
<?php include("layout/footer.php")?>