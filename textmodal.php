<link href="assets/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="../css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/plugins/image.min.css ">
<script type="text/javascript" src="assets/js/froala_editor.pkgd.min.js"></script>
<script src="../js/plugins/image.min.js"></script>
<?php include('layout/header-backend.php')?>
      <div id="articleid">
      <div id="detail">
        <form action="connectDB/inset/insert-the-article.php" method="POST" enctype="multipart/form-data" Multiple>
        <!-- <div>
          <img src="assets/img/1.png" alt="">
        </div> -->
        <div>
          <!-- <textarea name="" id="the-article" href="#myModal" data-toggle="modal" placeholder="เขียนบทความของคุณ......."></textarea> -->
          <div id="froala-editor">
            <p name="articledeatil"></p>
          </div>
        <br/>
        <div >
          <textarea id="preview" class="fr-view"></textarea>
        </div>
          <button id="postarticle" type="submit">โพสต์</button>
        </div>
        </form>
      </div>
      
      <script>
      $(function() {
        new FroalaEditor('div#froala-editor', {
          imageUploadURL: 'itubu/connectDB/upload_image.php',
          events: {
            contentChanged: function () {
              $('#preview').html(this.html.get());
            }
          }
        })
      });
    </script>
      <?php
      include('connectDB/connectDB.php');
      $sql= "SELECT * FROM `the-article` ";
      $req=mysqli_query($conDB,$sql);
      while ($row=mysqli_fetch_array($req)) {?>
      <div id="detail">
        <!-- <div>
          <img src="assets/img/1.png" alt="">
        </div> -->
        <div>
          <div>
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
  <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                  <div>
                    <img src="assets/img/1.png" alt="">
                    </div>
                    <div>
                    <textarea class="form-control"  placeholder="เขียนบทความของคุณ......." id="article"></textarea>
                    </div>
                    <div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">โพสต์</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").on('shown.bs.modal', function(){
        $(this).find('textarea').focus();
    });
    $("#article, #froala-editor p").on("change keyup", function(){
  $("textarea").not($(this)).val($(this).val());
});
});
</script>
</body>
</html>