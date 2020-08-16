<?php
include_once "../conn.php";
$info = "";
$email = trim($_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$info = "Vui lòng nhập lại email theo đúng dịnh dạng";
} else {
	$query = "INSERT INTO dangkynhantin(email) VALUES ('$email')";
	if ($con->query($query) === TRUE) {
		$info = "Đăng kí thành công";
	} else {
		$info = "Đăng kí lỗi vui lòng đăng kí lại ";
	}
}

$con->close();
?>
<p><?php echo $info ?></p>