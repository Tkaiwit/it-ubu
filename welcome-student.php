<?php include('layout/header-backend.php')?>
			<div id="detailone">
				<div id="toppic-detail"><label>Welcome To Website</label><br><label>ยินดีต้อนรับเข้าสู่เว็บไซต์</label>
				</div>
				<div id="login-ip">
					<div id="box-login-ip" style="margin-top: 50px; padding: 10px;"> 
						<div><b>การเข้าสู่ระบบของคุณ</b></div>
						<?php 
						include('connectDB/connectDB.php');
						$id=$_SESSION['teacher_id'];
						$mysqlo = "SELECT * FROM member where member_id ='$id' ";
						$mq = mysqli_query($conDB,$mysqlo);
						$row = mysqli_fetch_array($mq);
						 ?>
						<div>
							<label for=""> IP : <?php echo $row['member_login_ip']; ?></label>
						</div>
						<div>
							<label for=""> 
								DATE : <?php $strDate=$row['member_login_date'];
								echo obj1($strDate); ?>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
function obj1($strDate){
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","มกราคม"," กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม"," สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strMonthThai=$strMonthCut[$strMonth];
return " $strDay $strMonthThai $strYear "." TIME : "." $strHour:$strMinute "." น.";
}
?>
</body>
</html>