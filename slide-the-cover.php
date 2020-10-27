<?php include('layout/header-backend.php')?>
<div id="icon-menu">
		<div>
			<a id="add" title="เพิ่มภาพสไลค์">
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
				<div id="toppic-detail"><label>Slide the cover</label>
				</div>
				<form action="connectDB/inset/insert-slide-img.php" method="POST" id="form-slide-img" enctype="multipart/form-data" Multiple>
				<div style="width: 615px;height: 291px;border: 1px solid #dddfe2;">
					<img id="blah" src="#" alt="your image"/>
				</div>
			<div id="add-slide-img">
				<div>
					<label for="chkPassport">
    				<input type="checkbox" id="chkPassport" />
    				หัวข้อ?
					</label>
					<label for="chkPassport2">
    				<input type="checkbox" id="chkPassport2" />
    				ปุ่ม?
					</label>
					<label for="chkPassport3">
    				<input type="checkbox" id="chkPassport3" />
    				ข้อความ?
					</label>
					<div id="dvPassport" style="display: none">
						<input type="text" id="slide-topic" placeholder="หัวข้อเรื่อง" name="slide-topic"><br><br>
					</div>
					<div id="dvPassport2s" style="display: none">
						<input type="text" name="slide-name-button" id="slide-name-button" placeholder="ชื่อปุ่ม">
					</div>
					<div id="AddPassport">
						เลือกสิ่งที่ต้องการจะเพิ่ม
					</div>
				</div>
				<div>
					<div id="dvPassport3s" style="display: none;margin-top: 30px;">
					<textarea name="slide-decription" id="slide-decription" cols="30" rows="5" placeholder="รายละเอียด"></textarea>
					</div>
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
        $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                $("#AddPassport").hide();
            } else {
                $("#dvPassport").hide();
                $("#AddPassport").show();
            }
        });
        $("#chkPassport2").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport2s").show();
                $("#AddPassport").hide();
            } else {
                $("#dvPassport2s").hide();
                $("#AddPassport").show();
            }
        });
        $("#chkPassport3").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport3s").show();
                $("#AddPassport").hide();
            } else {
                $("#dvPassport3s").hide();
                $("#AddPassport").show();
            }
        });
    });
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