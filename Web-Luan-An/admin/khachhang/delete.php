
<?php  
session_start();
	include_once "../../conn.php";
	if (isset($_GET['delete'])) {
		$manguoidung=$_GET['delete'];
		$query="DELETE from nguoidung where manguoidung='$manguoidung'";
		$result=mysqli_query($con,$query);
		$_SESSION['message'] = "Bạn đã xóa thành công người dùng này";
		$_SESSION['msg_type']= "success";
		header('Location: index.php');
	}
?>