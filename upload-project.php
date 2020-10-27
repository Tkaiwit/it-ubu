<?php include('layout/header-backend.php')?>
			<div id="detailone">
				<div id="toppic-detail"><label>Upload Project</label>
				</div>
				<form action="connectDB/inset/insert-project.php" method="POST" id="form-slide-img" enctype="multipart/form-data" Multiple>
			<div id="add-slide-img">
				<div>
					<input type="text" name="p_name" id="slide-topic" placeholder="หัวข้อเรื่อง"><br><br>
					<input type="text" name="p_year" id="slide-name-button" placeholder="ปีการศึกษา">
				</div>
				<div>
					<textarea name="p_contant" cols="30" rows="5" id="slide-decription" placeholder="รายละเอียด"></textarea>
				</div>
				<div>
					<select name="c_id" id="teacher-drop">
						<option value="0">ประเภทโปรเจค</option>
						<?php
						include('connectDB/connectDB.php');
						$obj="SELECT * FROM categries";
						$rs=mysqli_query($conDB,$obj);
						while ($rows=mysqli_fetch_array($rs)) { ?>
						<option value="<?php echo $rows['categries_id']?>"><?php echo $rows['categries_name']?></option>
					<?php
						}
					?>
					</select>
					<!-- <input type="text" name="c_id" placeholder="ประเภทโปรเจค"> -->
				</div>
				<div>
					<select name="t_id" id="teacher-drop">
						<option name="t_id" value="0" style="color: #fff;">อาจารย์ที่ปรึกษาโปรเจค</option>
						<?php 
						include('connectDB/connectDB.php');
						$stat = "SELECT * FROM teacher";
						$srs = mysqli_query($conDB,$stat);
						while ($row = mysqli_fetch_array($srs)) {
						
						?>
						<option name="t_id" value="<?php echo $row['teacher_id']?>">
							<?php echo $row['teacher_firstname'] ?> <?php echo $row['teacher_lastname'] ?>		
						</option>
					<?php } ?>
					</select>
					<!-- <input type="text" name="t_id" placeholder="อาจารย์ที่ปรึกษาโปรเจค"> -->
				</div>
				<fieldset>
					<legend>อัพโหลดรูปปกโปรเจค</legend>
				<div id="img-demo-container"> 
					<!-- <input type="file" name="slide-img-name"  onchange="readURL(this);" placeholder=""> -->
					  <label for="file-upload" class="custom-file-upload"> Custom Upload
  					</label>
  					<input type="file" name="image" id="file-upload" multiple/>
				</div>
				<div style="font-size: 10px;">! ขนาดรูปภาพ 1366 x 768</div>
				</fieldset>
				<fieldset>
				<legend>อัพโหลดวีดีโอโปรเจค</legend>
				<div id="video-demo-container">
					<a type="button" id="upload-button">Select MP4 Video</a> 
					<input type="file" name="file" id="file-to-upload" accept="video/mp4" />
				</div>
				</fieldset>
				<fieldset>
				<legend>แนบไฟล์งานโปรเจค</legend>
				<div class="custom-file-upload" style="margin-left: 70px;">
					<a type="button" id="upload-zip">Select file ZIP</a> 
					<input type="file" name="myfile" id="file-zip-upload" accept=".rar" />
				</div>
				</fieldset>
				<fieldset>
				<legend>คำแนะนำ</legend>
				<div id="palen">
					เมื่ออัพโหลดโปรเจคแล้วสามารถแก้ไขเพิ่มเติ่มได้ในหน้าโปรเจคก็ได้ หรือ Edit Project
				</div>
				</fieldset>
				<div hidden="" id="preview" style="width: 300px;height: 130px;border: 1px solid #dddfe2;">
				</div>
				<div hidden="" id="player" style="width: 300px;height: 130px;border: 1px solid #dddfe2;">
					<video id="main-video" controls>
						<source type="video/mp4">
					</video>
					<canvas id="video-canvas"></canvas>
				</div>
			</div>
			
				<div><button>Save</button></div>
				</form>
	<script>
		function previewImages() {

  var preview = document.querySelector('#preview');
  
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
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}

document.querySelector('#file-upload').addEventListener("change", previewImages);
	</script>
<script>
$('#file-zip-upload').hide();
	document.querySelector("#upload-zip").addEventListener('click', function() {
	document.querySelector("#file-zip-upload").click();
});
</script>
<script>

var _CANVAS = document.querySelector("#video-canvas"),
	_CTX = _CANVAS.getContext("2d"),
	_VIDEO = document.querySelector("#main-video");


// Upon click this should should trigger click on the #file-to-upload file input element
// This is better than showing the not-good-looking file input element
document.querySelector("#upload-button").addEventListener('click', function() {
	document.querySelector("#file-to-upload").click();
});

// When user chooses a MP4 file
document.querySelector("#file-to-upload").addEventListener('change', function() {
	// Validate whether MP4
    if(['video/mp4'].indexOf(document.querySelector("#file-to-upload").files[0].type) == -1) {
        alert('Error : Only MP4 format allowed');
        return;
    }

    // Hide upload button
    // document.querySelector("#upload-button").style.display = 'none';

	// Object Url as the video source
	document.querySelector("#main-video source").setAttribute('src', URL.createObjectURL(document.querySelector("#file-to-upload").files[0]));
	
	// Load the video and show it
	_VIDEO.load();
	_VIDEO.style.display = 'inline';
	
	// Load metadata of the video to get video duration and dimensions
	_VIDEO.addEventListener('loadedmetadata', function() { console.log(_VIDEO.duration);
	    var video_duration = _VIDEO.duration,
	    	duration_options_html = '';

	    // Set options in dropdown at 4 second interval
	    for(var i=0; i<Math.floor(video_duration); i=i+4) {
	    	duration_options_html += '<option value="' + i + '">' + i + '</option>';
	    }
	    document.querySelector("#set-video-seconds").innerHTML = duration_options_html;
	    
	    // Show the dropdown container
	    document.querySelector("#thumbnail-container").style.display = 'block';

	    // Set canvas dimensions same as video dimensions
	    _CANVAS.width = _VIDEO.videoWidth;
		_CANVAS.height = _VIDEO.videoHeight;
	});
});

// On changing the duration dropdown, seek the video to that duration
document.querySelector("#set-video-seconds").addEventListener('change', function() {
    _VIDEO.currentTime = document.querySelector("#set-video-seconds").value;
    
    // Seeking might take a few milliseconds, so disable the dropdown and hide download link 
    document.querySelector("#set-video-seconds").disabled = true;
    document.querySelector("#get-thumbnail").style.display = 'none';
});

// Seeking video to the specified duration is complete 
document.querySelector("#main-video").addEventListener('timeupdate', function() {
	// Re-enable the dropdown and show the Download link
	document.querySelector("#set-video-seconds").disabled = false;
    document.querySelector("#get-thumbnail").style.display = 'inline';
});

// On clicking the Download button set the video in the canvas and download the base-64 encoded image data
document.querySelector("#get-thumbnail").addEventListener('click', function() {
    _CTX.drawImage(_VIDEO, 0, 0, _VIDEO.videoWidth, _VIDEO.videoHeight);

	document.querySelector("#get-thumbnail").setAttribute('href', _CANVAS.toDataURL());
	document.querySelector("#get-thumbnail").setAttribute('download', 'thumbnail.png');
});

</script>
	

	 
			</div>
		</div>
	</div>
</body>
</html>