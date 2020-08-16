<?php  
session_start();
include_once "../../conn.php";
	if (isset($_GET['delete'])) {
		$mahoadon=$_GET['delete'];
		$query="DELETE from hoadon where mahoadon='$mahoadon'";
		$result=mysqli_query($con,$query);
		$_SESSION['message'] = "Bạn đã xóa thành công hóa đơn này";
		$_SESSION['msg_type']= "success";
		header('Location: index.php');
	}
?>