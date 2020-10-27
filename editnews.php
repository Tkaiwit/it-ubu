<?php include("../itubu/layout/header-backend.php") ?>
<div id="icon-menu">
		<div>
			<a href="news.php" title="เพิ่มภาพสไลค์">
				<img src="assets/img/plus.svg" width="25" height="25" title="เพิ่มภาพสไลค์">
			</a>
		</div>
		<div>
			<a id="edit" title="แก้ไขภาพสไลค์">
				<img src="assets/img/pencil.svg" width="25" height="25" title="แก้ไขภาพสไลค์">
			</a>
		</div>
</div>
<div id="detailone">
	<div id="n-t">
		<div id="s-p">
			<label>ข่าวสาร</label>
		</div>
		<form action="connectDB/edit/editnews.php" method="POST" enctype="multipart/form-data" Multiple>
			<?php
					include('../itubu/connectDB/connectDB.php');
					$sqla="SELECT * FROM new where new_id='".$_GET['id']."'";
					$resa=mysqli_query($conDB,$sqla);
					while($rows=mysqli_fetch_array($resa)) {
						$id=$rows['new_id'];
				?>
		<div>
			<input hidden="" type="text" name="n_id" value="<?php echo $rows['new_id']?>">
			<input type="text" value="<?php echo $rows['new_topic']?>" name="n_topic" placeholder="หัวข้อ...">
		</div>
		<div>
			<textarea name="n_detail" placeholder="รายละเอียด"><?php echo $rows['new_detail']?></textarea>
		</div>
		<div>
			<div>
				<label style="margin-left: 100px;" for="file-upload" class="custom-file-upload">Custom Upload Image
  					</label>
  					<input hidden="" type="file" name="img" value="<?php echo $rows['new_img']?>" id="file-upload" multiple/>
  			</div>
		</div>
	<?php }?>
		<div>
			<button type="submit">บันทึกข่าว</button>
		</div>
		</form>
	</div>
	<div id="e-n-t">
		<div>
			<div id="n-t-s">
				<?php
					include('../itubu/connectDB/connectDB.php');
					$sql="SELECT * FROM new";
					$res=mysqli_query($conDB,$sql);
					while($row=mysqli_fetch_array($res)) {
						$id=$row['new_id'];
						?>

						<a href="editnews.php?id=<?php echo $id?>">
						<img src="<?php echo $row['new_img']?>">
						</a>
					 <?php } ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#e-n-t').hide();
	$('#add').click(function(){
		$('#e-n-t').hide();
		$('#n-t').fadeIn("show");
	});
	$('#edit').click(function(){
		$('#n-t').hide();
		$('#e-n-t').fadeIn("show");
	});
</script>
<script>
	function previewImages() {

  var preview = document.querySelector('#preview');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    }
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}document.querySelector('#file-upload').addEventListener("change", previewImages);
</script>
		</div>
	</div>
</body>
</html>