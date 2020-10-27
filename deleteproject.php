<?php include('layout/header-backend.php')?>
<!-- <div id="icon-menu">
		<div>
			<a id="add" title="เพิ่มภาพสไลค์">
				<img src="assets/img/plus.svg" width="25" height="25" title="เพิ่มภาพสไลค์">
			</a>
		</div>
</div> -->
			<div id="detailone">
				<div id="toppic-detail"><label>DELETE Project</label>
				</div>
				<form action="connectDB/delete/deleteproject.php" method="POST" id="form-slide-img" enctype="multipart/form-data" Multiple>
			<div id="add-slide-img">
				<?php 
				include('connectDB/connectDB.php');
				$obj="SELECT  * FROM project INNER JOIN member ON project.member_id=member.member_id
		 			INNER JOIN categries ON project.categries_id=categries.categries_id
		 			INNER JOIN teacher ON project.teacher_id=teacher.teacher_id"
				;
				$ses=mysqli_query($conDB,$obj);
				while ($roww=mysqli_fetch_array($ses)) {
					if($_SESSION['member_id'] == $roww['member_id']){
				?>
				<div>
					<img src="<?php echo $roww['project_image']?>" width="250" height="250">
				</div>
				<div>
					<div>ชื่อโปรเจค :
					<?php echo $roww['project_name']?></div>
					<div>ปีการศึกษา :
					<?php echo $roww['project_year']?></div>
					<div>รายละเอียด :
					<?php echo $roww['project_contant']?></div>
					<div>ประเภทโปรเจค :
					<?php echo $roww['categries_name']?></div>
					<div>อาจารย์ที่ปรึกษาโปรเจค: <br>	&nbsp;&nbsp;&nbsp;
					<?php echo $roww['teacher_firstname'] ?> <?php echo $roww['teacher_lastname'] ?></div>
					<div>
						ขนาดไฟล์โปรเจค : <label><?php
						$KB=$roww['project_zip_size'] / 1024;
						$MB=$KB / 1024;
						echo floor($MB).' MB'; ?></label>
					</div>

				</div>
			</div>
						<br>
				<div id="delete-p" style="margin-left: 330px;">
					<a onclick="return checkDeletee('<?php echo $roww['member_id'];?>','<?php echo $roww['project_name'];?>','<?php echo $roww['project_id'];?>')">Delete</a>
				</div>
				
				<?php
					}
				}
				?>

				</form>
<script type="text/javascript">
  function checkDeletee(member_id,project_name,project_id){
    alertify.confirm('<b>คุณต้องการลบข้อมูลของ</b><hr />','ชื่อโปรเจค '+project_name,
      function(){
        alertify.success('Ok');
        window.location.href = "connectDB/delete/deleteproject.php?id=" + project_id;
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