<?php include('layout/header-othen.php')?>
<div id="container">
  <div id="courses">สาขาวิชาเทคโนโลยีสารสนเทศและการสื่อสาร<br>
  Information and communication Technology (ICT)</div>
  <div id="container-course">
    <?php 
    include('connectDB/connectDB.php');
    $obj=" SELECT * FROM course";
    $rea=mysqli_query($conDB,$obj);
    while ($row=mysqli_fetch_array($rea)) {?>
    <div id="courses<?php echo $row['course_id']?>">
      <div>
        <?php echo $row['course_name']; ?>
      </div>
    </div>
    <?php }?>
  </div>
</div>
<script src="assets/js/alertify.min.js" type="text/javascript"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
  <script src="assets/js/index.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php include("layout/footer.php")?>