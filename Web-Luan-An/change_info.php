<?php
    session_start();
    include_once "conn.php";
	if(isset($_POST['update_info'])) {
		$ma = $_SESSION['email'];
		$name = $_POST['username'];
		$sodienthoai = $_POST['phone'];
		$email = $_POST['email_user'];
		$ngaysinh = $_POST['birthday'];
		$gioitinh = $_POST['sex'];
        $diachi = $_POST['address'];
		$query = "UPDATE nguoidung SET tennguoidung='$name', email='$email', sodienthoai='$sodienthoai', ngaysinh='$ngaysinh', gioitinh='$gioitinh', diachi='$diachi'  WHERE email='" . $ma . "'";
		$rs = mysqli_query($con,$query);
		if($rs) {
			echo "<script>alert('Cập nhật thành công!')</script>";
		    echo "<script>window.location.href='infouser.php'</script>";
		}
	}
?>