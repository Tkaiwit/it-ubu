<?php
include('../connectDB.php');
// $sqll = "DELETE FROM readunits WHERE studentID='".$_GET['id']."'";
$sql = "DELETE FROM `the-article` WHERE `the-article_id`='".$_GET['id']."'";
// $rag = mysql_query($sqll);
if(mysqli_query($conDB,$sql))
{
	// echo "Record Deleted.";
	// header("location:");
	 header("location: ../../../itubu/the-article.php");
}
else
{
	echo "Error Delete";
}
?>