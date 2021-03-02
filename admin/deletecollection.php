<?php
include 'connection.php';

$id=$_POST['id'];
$type = $_REQUEST['type'];

if($type != "") {
	$query=mysqli_query($connection,"DELETE FROM $type WHERE id='".$id."'");	
}
if($query){
	echo "done";
	
}
?>