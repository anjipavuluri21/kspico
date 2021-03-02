<?php
error_reporting(0);
date_default_timezone_set('Asia/Kuwait');

$db_host = "localhost";
		//enter your MySQL database username
		$db_username = "root";
		//enter your MySQL database password
		$db_password = "";
		//enter your MySQL database name
		$db_name = "sumc_db";	
$connection = mysqli_connect($db_host,$db_username,$db_password,$db_name);
  mysqli_set_charset($connection,'utf8');

?>