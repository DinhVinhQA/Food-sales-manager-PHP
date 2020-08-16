<?php 
	include_once "../conn.php";
	$info="";
    $name_dk =trim($_POST['username_dk']);
    $password_dk =trim($_POST['password_dk']);
    $sex_dk = trim($_POST['sex_dk']);
    $date_dk =date($_POST['date_dk']);
	$email_dk =trim($_POST['email_dk']);
	$phone_dk =trim($_POST['phone_dk']);
	$address_dk =trim($_POST['address_dk']);
	$query = "INSERT INTO nguoidung(tennguoidung,email,sodienthoai,ngaysinh,gioitinh,diachi,matkhau) VALUES ('$name_dk','$email_dk','$phone_dk','$date_dk','$sex_dk','$address_dk','$password_dk') ";
	if ($con->query($query) === true) {
		$info ="Đăng kí thành công";
	}else{
		$info ="Đăng kí lỗi vui lòng đăng kí lại ";

	}

$con->close();
?>
<p><?php echo $info ?></p>