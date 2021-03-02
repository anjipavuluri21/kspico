<?php
include_once("connection.php");


$id=$_POST['id'];
$status = $_POST['status'];
$tablename = $_POST['tab'];

	$query=mysqli_query($connection,"UPDATE $tablename SET status='$status' WHERE id=".$id);	

if($query){
	echo "done";
	
}
?>