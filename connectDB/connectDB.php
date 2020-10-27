<?php
$conDB = mysqli_connect("localhost","root","12345678","itubu");
mysqli_set_charset($conDB,"utf8");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>