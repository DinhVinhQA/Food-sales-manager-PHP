
<?php  
session_start();
	include('../../conn.php');
	if (isset($_GET['delete'])) {
		$masanpham=$_GET['delete'];
		$query="DELETE from sanpham where masanpham=$masanpham";
		$result=mysqli_query($con,$query);
		$_SESSION['message'] = "Bạn đã xóa thành công sản phẩm này";
		$_SESSION['msg_type']= "success";
		header('Location: index.php');
	}
?>