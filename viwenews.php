<?php include('layout/header-othen.php') ?>
<div id="container">
	<?php
			include('../itubu/connectDB/connectDB.php');
			$sql="SELECT * FROM new where new_id='".$_GET['id']."'";
			$res=mysqli_query($conDB,$sql);
			while($rown=mysqli_fetch_array($res)) {
			$id=$rown['new_id'];
		?>
		<div id="n-m-ts"><div><h3><?php echo $rown['new_topic']?></h3></div></div>
		<div id="s-n-v-t">
			<div>
			<a href="viwenews.php?id=<?php echo $id;?>">
				<img src="<?php echo $rown['new_img']?>" alt="Norway" >
				<div id="palen">
					<label></label>
				</div>
			</a>
			</div>
			<div id="s-n-v-tt">
				<div><?php echo $rown['new_detail']?></div>
				
			</div>
		</div>
		<?php }?>
</div>
<?php include('layout/footer.php')?>