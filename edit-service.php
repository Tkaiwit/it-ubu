<?php include('layout/header-backend.php')?>
		<div id="articleid">
		<div id="detail">
			<div id="toppic-detail">
				<label>Edit IT Service</label>
			</div>
			<form action="connectDB/edit/edit-service.php" method="POST" enctype="multipart/form-data" Multiple>
			<div id="i-s-a">
			<?php include('connectDB/connectDB.php');
				$sqla= "SELECT * FROM service ";
				$reqa=mysqli_query($conDB,$sqla);
				$id = $_GET['id'];
				while ($qrow=mysqli_fetch_array($reqa)) {
					if($id == $qrow['service_id']){
				?>

			<div>
				<textarea name="s_detail" ><?php echo $qrow['service_topic']?></textarea>
			</div>
			<div id="i-s-as">
				<div>
				<label for="file-upload" class="custom-file-upload"><img src="assets/img/image.png" style="width: 30px;height: 30px;">
  					</label>
  					<input hidden="" type="file" name="img" value="<?php echo $qrow['service_img']?>" id="file-upload" multiple/></div>
  					<div>
  						<input hidden="" type="text" name="s_id" value="<?php echo $qrow['service_id']?>"></div>
  					<div>
  					<button type="submit">Save</button></div>
			</div>
		<?php } } ?>
			</div>
			</form>
		</div>
		<?php
			include('connectDB/connectDB.php');
			$sql= "SELECT * FROM service where teacher_id='".$_SESSION['teacher_id']."'";
			$req=mysqli_query($conDB,$sql);
			while ($row=mysqli_fetch_array($req)) {
			$id = $row['service_id'];
			$dtail= $row['service_topic'];
			// echo $_SESSION['teacher_id'];
			?>
			<div id="detail">
				<div id="d-t-t-a">
					<div>
						<p style="text-align: right;">
							<a href="edit-service.php?id=<?php echo $id?>" >
							<img style="width: 15px;height: 15px;" src="assets/img/iconfinder_edit-alt_383147.png">
							</a> 
							<a onclick="return checkDeletee($id='<?php echo $row['service_id'];?>')">
								<img style="width: 15px;height: 15px;" src="assets/img/iconfinder_trash-bin-garbage-delete-rubbish-waste_3643729.png">
							</a>
						</p>
					<?php echo $row['service_topic']?><br>
						<?php if($row['service_img'] == NULL){?>
					<?php }else{ ?>
						<img src="<?php echo $row['service_img']?>" style="width: 450px;height: 450px; margin-left: 150px;">
					<?php } ?>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div>
<script type="text/javascript">
  function checkDeletee($id){
    alertify.confirm('<b>คุณต้องการลบข้อมูลของ</b><hr />','ต้องการลบข้อมูลจริงหรือไม่',
      function(){
        alertify.success('Ok');
        window.location.href = "connectDB/delete/deleteservice.php?id=" + $id;
      },
      function(){
        alertify.error('Cancel');
      });
  }
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