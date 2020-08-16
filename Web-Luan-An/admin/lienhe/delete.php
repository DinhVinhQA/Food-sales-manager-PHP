<?php  
session_start();
	include_once "../../conn.php";
	if (isset($_GET['delete'])) {
		$malienhe=$_GET['delete'];
		$query="DELETE from lienhe where malienhe='$malienhe'";
		$result=mysqli_query($con,$query);
		$_SESSION['message'] = "Bạn đã xóa thành công liên hệ này";
		$_SESSION['msg_type']= "success";
		header('Location: index.php');
	}
?>