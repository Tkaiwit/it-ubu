<?php
//fetch.php
include('connectDB/connectDB.php');
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conDB, $_POST["query"]);
 $query = "
  SELECT * FROM project 
  WHERE project_name LIKE '%".$search."%'
  OR project_year LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM project ORDER BY project_id ASC LIMIT 6";
}
$result = mysqli_query($conDB,$query);
// if(mysqli_num_rows($result) > 0)
// {
 // $output .= '
 // <div></div>
 // ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <div id="box-res"><a href="viwe-project.php.?id='.$row['project_id'].'">'.$row["project_name"].'</a></div>
   
  ';
 }
 echo $output;

// else
// {
//  echo 'Data Not Found';
// }

?>