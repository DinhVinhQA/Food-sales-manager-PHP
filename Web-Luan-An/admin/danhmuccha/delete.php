<?php  
session_start();
include_once "../../conn.php";
	if (isset($_GET['delete'])) {
		$madanhmuccha=$_GET['delete'];
		$query="DELETE from danhmuccha where madanhmuccha='$madanhmuccha'";
		$result=mysqli_query($con,$query);
	}
	header("location:index.php");
?>