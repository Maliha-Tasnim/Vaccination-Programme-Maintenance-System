<?php
include_once "../holiday_info/view_db_config.php";
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
mysqli_set_charset($mysqli,"utf8");
mysqli_set_charset($mysqli,"charset=utf-8");
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>