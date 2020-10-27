<?php include("layout/header-othen.php")?>
<?php include('connectDB/connectDB.php');?>
<?php 
function obj1($strDate){
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","มกราคม"," กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม"," สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strMonthThai=$strMonthCut[$strMonth];
return " $strDay $strMonthThai $strYear "." เวลา "." $strHour:$strMinute "." น.";
}
?>
<?php 
$objs="SELECT * FROM `the-article`  INNER JOIN teacher ON `the-article`.teacher_id=teacher.teacher_id  ORDER BY `the_article_date` DESC";
$ors=mysqli_query($conDB,$objs);
while ($rows=mysqli_fetch_array($ors)){

	$strDate = $rows['the_article_date'];
	?>
<style>
	body {
		background:#FA7A91;
	}
</style>
<div id="art-s">
	<div>
		<div id="art-img">
			<!-- <?php echo $rows['teacher_id']?> -->
			<img src="<?php echo $rows['teacher_img']?>" width="220" height="240" alt="">
		</div>
		<div id="art-date">
			<div>
				<br>ผู้เขียน :<br>
				<?php echo $rows['teacher_firstname']?>&nbsp; <?php echo $rows['teacher_lastname']?>
				<br>
				<br>เขียนเมื่อ :<br>
			<?php 
			$strDate = $rows['the_article_date'];
			echo obj1($strDate); 
			?>
			</div>
		</div>
	</div>
	<div id="acr-tt">
		<div style="text-align: center;">
			 <?php if (!empty($rows['the_article_topic'])): ?>
			 	<h1 style="border-bottom: 2px solid #fff;">
					<?php echo $rows['the_article_topic']?>
				</h1>
			 <?php endif ?>
		</div>
		<div id="art-c"><?php echo $rows['the-article_detail']?></div>
	</div>
</div>
<?php } ?>
<br><br><br>
<?php include("layout/footer.php")?>