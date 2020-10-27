<?php
include('../connectDB.php');
// $sqll = "DELETE FROM readunits WHERE studentID='".$_GET['id']."'";
$sql = "DELETE FROM `service` WHERE `service_id`='".$_GET['id']."'";
// $rag = mysql_query($sqll);
if(mysqli_query($conDB,$sql))
{
	// echo "Record Deleted.";
	// header("location:");
	 header("location: ../../../itubu/it-service.php");
}
else
{
	echo "Error Delete";
}
?>