<link href="assets/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="../css/froala_style.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/js/froala_editor.pkgd.min.js"></script>
<?php include('layout/header-backend.php')?>
			<div id="articleid">
			<div id="detail">
				<form action="connectDB/inset/insert-the-article.php" method="POST" enctype="multipart/form-data" Multiple>
				<div id="post-article">
					<script type="text/javascript" src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
                      <script>
                      tinymce.init({ selector:'textarea',
                      relative_urls : false,
                      remove_script_host : false,
                      plugins: [ "image ","responsivefilemanager","textcolor link"],
                      // toolbar: 'fontsizeselect',
                      
                      toolbar: " outdent indent | alignleft aligncenter alignright alignjustify | bold italic forecolor backcolor | fontsizeselect | link | image media | responsivefilemanager |",
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
                       		<div id="b-a-t"><h3>เขียนบทความ</h3></div>
                       		<div id="b-a-t-t">
                       			<input type="text" placeholder="ชื่อเรื่อง...." name="the_article_topic"></div>
                       		<div><textarea name="the-article">
                       			
                       		</textarea></div>
                       		<div id="b-a-btn"><button id="postarticle" type="submit">โพสต์</button></div>
                       </div>
					<!-- <div id="froala-editor">
						<p id="the-article"></p>
					</div>
					<div hidden=""  id="preview" class="fr-view">
					  <textarea name="the-article" id="the-article"></textarea>
					</div> -->
					
				</div>
				</form>
			</div>
			<?php
			include('connectDB/connectDB.php');
			$sql= "SELECT * FROM `the-article` where teacher_id='".$_SESSION['teacher_id']."'";
			$req=mysqli_query($conDB,$sql);
			while ($row=mysqli_fetch_array($req)) {
			$id = $row['the-article_id'];
			$dtail= $row['the-article_detail'];
			// echo $_SESSION['teacher_id'];
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