<?php include('layout/header-othen.php') ?>
<link rel="stylesheet" href="assets/css/model.css">
<script>
// For editting data in modal popup with Dynamic ID passing start-------
 
$(document).ready(function()
{    
 $('#edit_user').on('show.bs.modal', function (e) 
 {        
 var project_id = $(e.relatedTarget).data('project_id');       
 $.ajax(
 {            
 type : 'POST',            
 url  : 'ajaxrequest/ajax_users.php?reg_id=<?= $regid ?>', //Here you will fetch records      
 data    : 'project_id='+ project_id, //Pass $user_id            
 success : function(result) 
 { 
 //alert('success'+result); 
 $('.fetched_user').html(result); //Show fetched data from database
 },
 error   : function(result) 
 { 
 alert('error'+result); 
 }
 });     
 });
});
 // For editting data in modal popup with Dynamic ID passing close----------->
</script>
<div id="container">
	<div id="v-p-pd">
		<?php
		include('connectDB/connectDB.php');
		 $objo="SELECT  * FROM project INNER JOIN member ON project.member_id=member.member_id
		 INNER JOIN categries ON project.categries_id=categries.categries_id";
		$id=$_GET['id'];
				$sr=mysqli_query($conDB,$objo);
				while ($row=mysqli_fetch_array($sr)) {
					if ($row['project_id']==$id) {
					?>
	<div>		
		<div id="p-t-p-t">
			<div id="n-tp-p">
					<a href="it-project.php">Project >></a><?php echo $row['project_name'];?>
			</div>
			<div id="n-tp-p">
				<a href="#" onclick="history.back();"><img src="assets/img/icon.png" width="15" height="15"> back</a>
			</div>
		</div>
		<div id="v-p-d">
			<div id="v-p-d-i">
				<img src="<?php echo $row['project_image']?>" alt="">
			</div>
			<div id="v-p-d-i">
				<p><?php echo $row['project_name'];?></p>
				<dd>Categries: <?php echo $row['categries_name'];?></dd>
				<dd>Year: <?php echo $row['project_year'];?></dd>
				<dd><?php echo $row['member_firstname'];?> <?php echo $row['member_lastname'];?></dd>
				<dd id="b-t-v-p"><br>
					<a href="#edit_user" class="open-edit_user" data-toggle="modal" data-user_id="<?php echo $row['project_id'];?>">Download file</a>
				</dd>

			</div>
		</div>
		<div id="e-v-p-s">
			<div>ตัวอย่างโปรแกรม</div>
		</div>
		<div id="e-v-p">
			<div></div>
		</div>
	</div>
	<div id="v-p-d-k">
		<div id="s-t-p">
			<div>
			สิ่งที่อาจเกี่ยวข้อง
			</div>
		</div>
		<?php
		$stat="SELECT * FROM project INNER JOIN categries ON project.categries_id=categries.categries_id ORDER BY project_name DESC LIMIT 8";
		$sts=mysqli_query($conDB,$stat);
		while($arow=mysqli_fetch_array($sts)){
		?>
		<div id="ast">
		<a href="">
		<div id="s-t-p-s">
			<div>
				<img src="<?php echo $arow['project_image']?>">
			</div>
			<div>
				<div><?php echo $arow['project_name']?></div>
				<p id="dd"><?php echo $arow['project_contant']?></p>
				<p><?php echo $arow['categries_name']?></p>
			</div>
		</div>
		</a>
		</div>
	<?php } ?>
	</div>
	<?php } ?>
	<!--Edit Modal start-->
<div class="modal fade" id="edit_user" role="dialog"> 
 <div class="modal-dialog">   
 <div class="modal-content"> 
 <div class="modal-header">   
 <button type="button" class="close" data-dismiss="modal">&times;</button>   
 <h4 class="modal-title">
 <b>เงื่อนไขการดาวน์โหลด</b>
 </h4> 
 </div> 
 <div class="body">
 <div class="fetched_user">
 <div style="width: 80%;margin-left: 60px;padding: 15px;">
 The MIT License (MIT)

Copyright (c) 2014 Mohammad Younes

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute,:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
</div>
<form action="connectDB/inset/insertdownload.php" method="POST" style="margin:0px 20px 20px 20px;" >
	<div id="d-c">
	<input type="checkbox" name="" id="" required="">&nbsp;&nbsp;&nbsp;ฉันยินยอมรับทุกเงื่อนไข
	</div>
	<div id="f-p-d">
	<input type="text" placeholder="ชื่อ" required="" name="d_f">
	<input type="text" placeholder="นามสกุล" required="" name="d_l"><br>
	<input type="email" placeholder="email" name="d_m">
	<input hidden="" name="p_id" type="text" value="<?php echo $row['project_id']; ;?>">
	<input type="text" name="p_d" value="<?php echo $row['project_download']; ;?>">
	</div>
	
	
 </div> 
 </div> 
 <div class="modal-footer">
 	<div>
 	<input type="submit" value="Accepted">
 	 </form>
 	<input type="submit" data-dismiss="modal" value="Declined">
 	</div>
 </div> 
 </div>
 </div>
</div> 
<!--Edit Modal close-->	
<?php } ?>
	</div>
</div>
<div id="la" hidden="">	
The MIT License (MIT)

Copyright (c) 2014 Mohammad Younes

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute,:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

</div>
<script type="text/javascript">
 /// function checkDownload($id,project_zip){
    // var pre = document.createElement('pre');
//custom style.
// pre.style.maxHeight = "400px";
// pre.style.margin = "0";
// pre.style.padding = "0px 24px 24px 24px";
// pre.style.whiteSpace = "pre-wrap";
// pre.style.textAlign = "justify";
// pre.appendChild(document.createTextNode($('#la').text()));
//show as confirm

// alertify.confirm('คำขอดาวน์โหลดไฟล์',pre ,function(){
//         alertify.success('Accepted'+$id);
//         window.location.href = project_zip;
//     },function(){
//         alertify.error('Declined');
//     }).set({labels:{ok:'Accept', cancel: 'Decline'}, padding: false});
//   }
 $(document).ready(function(){ 
  $(document).on('click', '.edit_data', function(){  
           var project_id = $(this).attr("id");  
           $.ajax({  
                url:"connectDB/inset/insertdownload.php",  
                method:"POST",  
                data:{project_id:project_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#address').val(data.address);  
                     $('#gender').val(data.gender);  
                     $('#designation').val(data.designation);  
                     $('#age').val(data.age);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      }
</script>
<?php include('layout/footer.php')?>