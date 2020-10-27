<?php include("layout/header-othen.php")?>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<?php include('connectDB/connectDB.php');?>
	<div id="pro-view">

		<div id="p-t-menu">
			<div>
				<div class="search-container">
				    <form action="/action_page.php">
				      <input type="text" placeholder="Search.." name="search_text" id="search_text">
				      <button type="submit"><img src="assets/img/magnifying-glass.png" width="15" height="15"></button>
				    </form>
				</div>
			</div>
			<div id="box-search">
				<div id="result">
				
				</div>
			</div>
			<div id="categriess">
				<div>Categries</div>
			</div>
		</div>
		<div>	
		<?php $objs="SELECT * FROM categries";
		$resp=mysqli_query($conDB,$objs);
		while ($rows=mysqli_fetch_array($resp)) {?>
			<div id="p-t-p">
				<div id="n-tp">
					<a href=""><?php echo $rows['categries_name']; ?></a>
				</div>
				<div id="n-tp"><a href="">More >></a></div>
			</div>
			<div id="p-t-s-one">
				<div id="p-s-c">
				<?php $objo="SELECT  * FROM project INNER JOIN member ON project.member_id=member.member_id";
				$sr=mysqli_query($conDB,$objo);
				while ($row=mysqli_fetch_array($sr)) {
					if ($rows['categries_id']==$row['categries_id']) {
					?>
				<div id="p-t-s">
				<a href="viwe-project.php.?id=<?php echo $row['project_id']?>">
				<div id="p-s-y">
					<div>
					<img src="<?php echo $row['project_image']?>" alt="">
					</div>
					<div id="b-p-s-y">
						<div style="margin-top: 5px; margin-left: 5px;">
						<?php echo $row['project_name'];?>
						</div>
						<div id="yp" style="margin-left: 5px;margin-top: 0px;">
							<label for=""><?php echo $row['member_firstname']?> <?php echo $row['member_lastname']?></label>
						</div>
						<div style="margin-left: 5px;margin-top: 15px;margin-bottom: 5px;">
							
							<label>year : <?php echo $row['project_year'];?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label><?php 
                    		echo $row['project_download'];
							?></label>	
						</div>
						
					</div>
				</div>
				</a>
				</div>
			<?php }}?>
			</div><dd><br></dd>
		<?php } ?>
			<div>
				
			</div>
			</div>
		</div>
		
	</div>
<br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php include("layout/footer.php")?>