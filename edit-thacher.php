<?php include('layout/header-backend.php')?>

			<div id="detailt">
				<div id="s-p">
				<label>แก้ไขอาจารย์</label>
				</div>
				<form action="connectDB/edit/editteacher.php" method="POST" id="form-register" enctype="multipart/form-data" Multiple>
			<?php
				include('connectDB/connectDB.php');
				$tis=$_GET['$tis'];
				$strSQL = "SELECT * FROM `teacher`  ";
				$objQuery = mysqli_query($conDB,$strSQL) or die ("Error Query [".$strSQL."]");
				while($row =mysqli_fetch_array($objQuery)){
					// if(!empty($tis)){
						if($tis==$row['teacher_id']){

			?>
			<div id="form-col-e-ps">	
			<div id="proimgs">
		<?php if(!empty($row['teacher_img'])){ ?>
			<div id="prot">
				<img id="blah" src="./image/New Project.png" alt="">
			</div>
		<?php } else { ?>
			<div id="prot">
				<img id="blah" src="<?php echo $row['teacher_img']?>" alt="">
			</div>
		<?php } ?>
			<div id="img-demo-container">
				<label for="file-upload" class="custom-file-upload"> Custom Upload
  					</label>
  					<input type="file" name="img" id="file-upload" onchange="readURL(this);" multiple/>
			</div>
			</div>
			<div id="prods">	
			<div>
				<input type="text" hidden="" name="t_img" value="<?php echo $row['teacher_img']?>">
				<input type="text" name="t_id"placeholder=" รหัสอาจารย์" readonly="" value="<?php echo $row['teacher_id']?>">
			</div>
			<div>
				<input type="text" value="<?php echo $row['teacher_firstname']?>" name="t_firstname" placeholder="ชื่ออาจารย์" >
			</div>
			<div>
				<input type="text" value="<?php echo $row['teacher_email']?>" name="t_email" placeholder="อีเมล" >
			</div>
			<div>
				<input type="text" placeholder="ตำแหน่ง" name="t_position" value="<?php echo$row['teacher_position']?>">
			</div>
			
			</div>
			<div id="prodss">
			<div>
				<input type="password"value="<?php echo $row['teacher_password'] ?>" name="t_password" placeholder="รหัสผ่าน"  >
			</div>	
			<div>
				<input type="text" value="<?php echo $row['teacher_lastname']?>" name="t_lastname" placeholder="นามสกุล" >
			</div>
			<div>
				<input type="text" value="<?php echo $row['teacher_room']?>" name="t_room" placeholder="ห้องพัก">
			</div>
			<div>
				<input name="t_tel" placeholder="โทร" type="text" value="<?php echo$row['teacher_tel']?>">
			</div>
			</div>
			</div>
			<?php
					}		
				}
			 ?>
			<div id="button-e-p">
				<button type="submit">Save!</button>
			</div>
			</form>
			</div>

			<script>
				function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
				function previewImages() {

  // var preview = document.querySelector('#prot');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }
				function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 200;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}

document.querySelector('#file-upload').addEventListener("change", previewImages);
			</script>

		</div>
	</div>
</body>
</html>