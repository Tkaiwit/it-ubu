<?php include('layout/header-backend.php')?>
<div id="icon-menu">
		<div>
			<a href="slide-the-cover.php" title="เพิ่มภาพสไลค์">
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
				<div id="addslide">
				<div id="toppic-detail"><label>Edit Slide the cover</label>
				</div>
				<form action="connectDB/edit/editslide-img.php" method="POST" id="form-slide-img" enctype="multipart/form-data" Multiple>
					<?php
					include('../itubu/connectDB/connectDB.php');
					$sql2="SELECT * FROM slide_img where slide_id='".$_GET["sid"]."'";
					$ress=mysqli_query($conDB,$sql2);
					$ara=mysqli_fetch_array($ress);?>
				<div style="width: 615px;height: 291px;border: 1px solid #dddfe2;">
					<img id="blah" src="<?php echo $ara['slide_img'] ?>" alt="your image" width= "615"height="291"/>
				</div>
			<div id="add-slide-img">
				<div>
					<input type="text" id="slide-topic" placeholder="หัวข้อเรื่อง" value="<?php echo $ara['slide_topic'] ?>" name="slide-topic"><br><br>
					<input type="text" name="slide-name-button" id="slide-name-button" value="<?php echo $ara['slide_name_button'] ?>" placeholder="ชื่อปุ่ม">
					<input type="text" name="slide_id" value="<?php echo $_GET["sid"]?>" hidden>
				</div>
				<div>
					<textarea name="slide-decription" id="slide-decription"  cols="30" rows="5" placeholder="รายละเอียด"><?php echo $ara['slide_decription'] ?></textarea>
				</div>
				<div>
					<input type="file" name="img" placeholder="" onchange="readURL(this);">
				</div>
				<div>! ขนาดรูปภาพ 1366 x 768</div>
			</div>
				<div><button type="submit">Save</button></div>
				</form>
	<script>
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(615)
                        .height(291);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>

			</div>
			<div id="editslide">
				<div id="toppic-detail"><label>Edit Slide the cover</label>
				</div>
				<div>
					<div id="show-slide">
					<?php
					include('../itubu/connectDB/connectDB.php');
					$sql="SELECT * FROM slide_img";
					$res=mysqli_query($conDB,$sql);
					while($row=mysqli_fetch_array($res)) {
						$id=$row['slide_id'];
						?>

						<a href="edit-slide.php?sid=<?php echo $id?>">
						<img src="<?php echo $row['slide_img']?>">
						</a>
					 <?php } ?>
					 </div>
				</div>
			</div>
<script type="text/javascript">
	$('#editslide').hide();
	$('#add').click(function(){
		$('#editslide').hide();
		$('#addslide').fadeIn("show");
	});
	$('#edit').click(function(){
		$('#addslide').hide();
		$('#editslide').fadeIn("show");
	});
</script>
			</div>
			<!-- กล่องเนื้อหา -->
		</div>
	</div>
</body>
</html>