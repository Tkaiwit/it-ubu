<?php include('layout/header-othen.php')?>
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
<div>
	<div id="columns">
		<h1>ข่าวประกาศ</h1>
                <?php include('connectDB/connectDB.php');
				$query = "SELECT * FROM new ORDER BY new_date DESC";
				$res = mysqli_query($conDB, $query);
				while($data = mysqli_fetch_array($res)){
			?>
                <article>
                	<?php if(!empty($data['new_img'])){?>
                	<img src="<?php echo $data['new_img']?>">
					<?php } ?>
                	<?php if(!empty($data['new_topic'])){?>
                	<h3><?php echo $data['new_topic']?></h3>
                    <?php } ?>
                    <!-- <p><?php echo $data['service_detail']?></p> -->
                    <?php if(!empty($data['new_date'])){?>
                    <p>
                    	<?php 
                    		$strDate = $data['new_date'];
							echo obj1($strDate); 
						?>
					</p>
					<?php } ?>
                </article>
            <?php } ?> 
	</div>
</div>
<?php include('layout/footer.php')?>