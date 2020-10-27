<?php include('layout/header-backend.php')?>

			<div id="detailone">
				<div id="e-p">
				<label>แก้ไขโปรไฟล์</label>
				</div>
				<form action="connectDB/edit/editprofile.php" method="POST" id="form-register">
			<!-- <div id="images-prefiles">
				<div>
					<img src="" width="120" height="120">
				</div>
				<div>
					<input type="file">
				</div>
			</div> -->
			<?php
				include('connectDB/connectDB.php');
				$mysql ="SELECT * FROM `member`";
				$res= mysqli_query($conDB,$mysql);
				while ($row=mysqli_fetch_array($res)) {
					if(!empty($_SESSION['member_id'])){
						if($_SESSION['member_id']==$row['member_id']){

			?>
			<div id="form-col-e-p">
			<div>
				<input type="text" name="m_id"placeholder=" รหัสนักศึกษา" readonly="" value="<?php echo $_SESSION['member_id']?>">
			</div>
			<div>
				<input type="password"value="<?php echo $row['member_password'] ?>" name="m_password" placeholder="รหัสผ่าน" >
			</div>
			<div>
				<input type="text" value="<?php echo $row['member_firstname']?>" name="m_firstname" placeholder="ชื่อนักศึกษา" >
			</div>
			<div>
				<input type="text" value="<?php echo $row['member_lastname']?>" name="m_lastname" placeholder="นามสกุล" >
			</div>
			<div>
				<input type="text" value="<?php echo $row['member_email']?>" name="m_email" placeholder="อีเมล" >
			</div>
			<div>
				<input type="text" value="<?php echo $row['member_department']?>" name="m_department" placeholder="ภาควิชา">
			</div>
			<div>
				<select id="choice" name='m_class'>
					<?php if ($row['member_class']==0) {?>
					<option value="0" selected="selected" >ระดับชั้นปี</option>
					<?php
					}elseif ($row['member_class']==1) { ?>
					<option value="1" selected="selected">ปี 1 </option>
					<?php }elseif ($row['member_class']==2) { ?>
					<option value="2" selected="selected">ปี 2 </option>
					<?php }elseif ($row['member_class']==3) { ?>
					<option value="3" selected="selected">ปี 3 </option>
					<?php }elseif ($row['member_class']==4) { ?>
					<option value="4" selected="selected">ปี 3 ต่อเนื้อง</option>
					<?php }elseif ($row['member_class']==5) {?>
					<option value="5" selected="selected">ปี 4 </option>
					<?php } ?>
				</select>
			</div>
			<div>
				<input type="text" value="<?php echo $row['member_academic_year']?>" name="m_academic_year" placeholder="ปีการศึกษา">
			</div>
			<div>
				<textarea id="inputarea-e"  name="m_address" placeholder="ที่อยู่"><?php echo $row['member_address']?></textarea>
				<input hidden="" type="text" name="m_status" value="<?php $row['member_status']?>">
			</div>
			</div>
			<?php
						}
					}		
				}
			 ?>
			<div id="button-e-p">
				<button type="submit">Save!</button>
			</div>
			</form>
			</div>

		</div>
	</div>
</body>
</html>