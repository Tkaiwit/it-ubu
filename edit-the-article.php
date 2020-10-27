<link href="assets/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="../css/froala_style.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/js/froala_editor.pkgd.min.js"></script>
<?php include('layout/header-backend.php')?>
			<div id="articleid">
			<div id="detail">
				<form action="connectDB/edit/edit-the-article.php" method="POST" enctype="multipart/form-data" Multiple>
				<?php include('connectDB/connectDB.php');
				$sqla= "SELECT * FROM `the-article` ";
				$reqa=mysqli_query($conDB,$sqla);
				$id = $_GET['id'];
				while ($qrow=mysqli_fetch_array($reqa)) {
					if($id == $qrow['the-article_id']){
				?>
				<script type="text/javascript" src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
                      <script>
                      tinymce.init({ selector:'textarea',
                      relative_urls : false,
                      remove_script_host : false,
                      plugins: [ "image ","responsivefilemanager","textcolor","link",],
                      // toolbar: 'fontsizeselect',
                      
                      toolbar: " outdent indent | alignleft aligncenter alignright alignjustify | bold italic | forecolor backcolor | fontsizeselect | link | image media | responsivefilemanager |",
                      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 30pt 36pt',
                      image_advtab: true ,
                      content_css: [
				    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
				    '//www.tinymce.com/css/codepen.min.css'],

                      external_filemanager_path:"assets/filemanager/",
                      filemanager_title:"Responsive Filemanager",
                      external_plugins: { "filemanager" : "assets/filemanager/plugin.min.js"} 
                    
                       });
                       </script>
                       <div id="b-article">
                       		<div id="b-a-t"><h3>แก้ไขบทความ</h3></div>
                       		<div id="b-a-t-t">
                       			<input type="text" placeholder="ชื่อเรื่อง...." value="<?php echo $qrow['the_article_topic'] ?>" name="the_article_topic"></div>
                       			<input hidden="" type="text" name="a_id" value="<?php echo $qrow['the-article_id']?>">
                       		<div><textarea name="the-article">
                       			<?php echo $qrow['the-article_detail']?>
                       		</textarea></div>
                       		<div id="b-a-btn"><button id="postarticle" type="submit">โพสต์</button></div>
                       </div>
			<?php } } ?>
				</form>
			</div>
<script type="text/javascript">
  function checkDeletee($id){
    alertify.confirm('<b>คุณต้องการลบข้อมูลของ</b><hr />','ต้องการลบข้อมูลจริงหรือไม่',
      function(){
        alertify.success('Ok');
        window.location.href = "connectDB/delete/deletearticle.php?id=" + $id;
      },
      function(){
        alertify.error('Cancel');
      });
  }
</script>
			<script>
			  $(function() {
			  	new FroalaEditor('div#froala-editor',{
			  		// imageUploadURL: 'connectDB/upload_image.php',
			  events: {
			    contentChanged: function () {
			      $('#preview textarea').html(this.html.get());
			    }
			  }
			})
			  new FroalaEditor('div#froala-editor', {
		      imageUploadURL: '/upload_image.php',

		      imageUploadParams: {
		        id: 'my_editor'
		      }
		    })	
			 
			  });
			</script>
			<?php
			include('connectDB/connectDB.php');
			$sql= "SELECT * FROM `the-article` where teacher_id='".$_SESSION['teacher_id']."'";
			$req=mysqli_query($conDB,$sql);
			while ($row=mysqli_fetch_array($req)) {
			$id = $row['the-article_id'];
			$dtail= $row['the-article_detail'];
			?>
			<div id="detail">
				<div id="d-t-t-a">
					<div>
						<p style="text-align: right;">
							<a href="edit-the-article.php?id=<?php echo $id?>" >
							<img style="width: 15px;height: 15px;" src="assets/img/iconfinder_edit-alt_383147.png">
							</a> 
							<a onclick="return checkDeletee($id='<?php echo $row['the-article_id'];?>')">
								<img style="width: 15px;height: 15px;" src="assets/img/iconfinder_trash-bin-garbage-delete-rubbish-waste_3643729.png">
							</a>
						</p>
						<?php echo $row['the-article_detail']?>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#article, #froala-editor p").on("change keyup", function(){
		$("textarea").not($(this)).val($(this).val());
		});
	});
</script>
<script type="text/javascript" src="assets/filemanager/plugin.min.js"></script>
</body>
</html>