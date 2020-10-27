<?php include("layout/header-othen.php")?>
	<div id="lid">
<?php include('connectDB/connectDB.php');
$id=$_GET['$id'];
$objs="SELECT * FROM teacher where teacher_id='$id'";
$ors=mysqli_query($conDB,$objs);
$rows=mysqli_fetch_array($ors); 
	if ($_GET['$id']=$rows['teacher_id']) {
	?>
<div id="teacher-shows">
	<div id="t-s" style="margin-left: 30px;">
		<div><img src="<?php echo $rows['teacher_img']?>"></div>
		<div id="tail-ss">
			<div id="xox">&nbsp;</div>
			<div id="name"><?php echo $rows['teacher_firstname']?> <?php echo $rows['teacher_lastname']?></div>
			<div><?php echo $rows['teacher_email']?></div>
		</div>
	</div>
	<div>
		<div id="nav-tabs">
			<ul>
		    <li id="active"><a id="id_history">ประวัติ</a></li>
		    <li><a id="id_the-article-t">บทความ</a></li>
		    <li><a id="id_course">รายวิชาที่สอน</a></li>
		    <div></div>
  			</ul>
		</div>
		<div id="history">
			<div class="story"><br><br>
				<div id="grid-t-h">
				<div id="in-one">
					<p>
					ห้องพัก<br>
					<?php echo $rows['teacher_room']?>
					</p>
				</div>
				<div id="in-two">
					<p>
					ต่อสาย<br>
					<?php echo $rows['teacher_tel']?>
					</p>
				</div>
				</div>
			</div>
		</div>
		<div id="the-article-t">
			<div><br>บทความ</div>
		</div>
		<div id="course">
			<div><br>รายวิชาที่สอน</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#the-article-t').hide();
	$('#course').hide();
	$('#id_history').click(function(){
		$('#the-article-t').hide();
		$('#course').hide();
		$('#history').slideDown(500);
	});
	$('#id_the-article-t').click(function(){
		$('#history').hide();
		$('#course').hide();
		$('#the-article-t').slideDown(500);
	});
	$('#id_course').click(function(){
		$('#history').hide();
		$('#the-article-t').hide();
		$('#course').slideDown(500);
	});
</script>
<?php }?>
	</div>
<br><br><br>
<?php include("layout/footer.php")?>