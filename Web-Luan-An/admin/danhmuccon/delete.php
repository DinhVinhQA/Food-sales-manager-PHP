<?php  
session_start();
include_once "../../conn.php";
	if (isset($_GET['delete'])) {
		$madanhmuccon=$_GET['delete'];
		$query="DELETE from danhmuccon where madanhmuccon='$madanhmuccon'";
		$result=mysqli_query($con,$query);
		$_SESSION['message'] = "Bạn đã xóa thành công danh mục con này";
		$_SESSION['msg_type']= "success";
		header('Location: index.php');
	}
?>