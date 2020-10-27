<?php include("layout/header.php") ?>
<div id="container">
	<div id="topic">
		&nbsp;
	</div>
</div>
<div id="section-mssage">
	<div id="container-three">
		<?php
			include('../itubu/connectDB/connectDB.php');
			$sql="SELECT * FROM new ORDER BY new_date DESC LIMIT 3 ";
			$res=mysqli_query($conDB,$sql);
			while($rown=mysqli_fetch_array($res)) {
			$id=$rown['new_id'];
		?>
		<div id="mssage-one">
			<a href="viwenews.php?id=<?php echo $id;?>">
				<img src="<?php echo $rown['new_img']?>" alt="Norway" >
				<div id="palen">
					<label><?php echo $rown['new_topic']?></label>
				</div>
			</a>
		</div>
		<?php }?>
	</div>
</div>
<div id="container">
	<div id="more-mssage">
		<button onclick="window.location.href='view-new.php'" id="btn-more">More</button>
	</div>
</div>
<div id="container-article">
	<div id="article">
	<div id="the-article">
		<?php
			include('../itubu/connectDB/connectDB.php');
			$sqlt="SELECT * FROM `the-article` INNER JOIN teacher ON `the-article`.`teacher_id`=teacher.teacher_id ORDER BY `the-article`.`the_article_date` DESC LIMIT 1";
			$rest=mysqli_query($conDB,$sqlt);
			while($rowt=mysqli_fetch_array($rest)) {
			$id=$rowt['the-article_id'];
			$strDate=$rowt['the_article_date'];
		?>
		<div id="article-profile">
			<div style="line-height: 1.5;">
			<?php echo $rowt['the_article_topic']?>
			</div>
		</div>
		<div id="article-contant">
			<div style="letter-spacing: 2px;line-height: 1.6;">
				<?php echo $rowt['the-article_detail']?>
			</div>
		</div>
		
	</div>
	<div id="ar-border">
	<div id="ar-teacher">
				<div>
					<img src="<?php echo $rowt['teacher_img']?>">
				</div>
				<div id="ar-name">
					<div><?php echo $rowt['teacher_firstname']?>&nbsp; <?php echo $rowt['teacher_lastname']?></div>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
</div>
<div id="container-project-it">
	<div id="project-pro">
		<div><a>ผลงานนักศึกษา</a></div>
	</div>
	<div id="project-it">
		<?php 
		include('connectDB/connectDB.php');
		$objr = "SELECT * FROM project LIMIT 3";
		$srt = mysqli_query($conDB,$objr);
		while ($rowt=mysqli_fetch_array($srt)) { ?>
		<div id="numberone">
			<a href="#">
				<div id="img-g"><img src="<?php echo $rowt['project_image']?>"></div>
				<div id="name-project">
					<label id="n-p"><?php echo $rowt['project_name']?></label>
				</div>
			</a>
		</div>
		<?php 
		}
		?>

	</div>
</div>
<?php include("layout/footerindex.php") ?>