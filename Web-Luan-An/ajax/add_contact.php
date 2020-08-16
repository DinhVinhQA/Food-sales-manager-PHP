<?php
include_once "../conn.php";
$info = "";
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$subject = trim($_POST['subject']);
$comment = trim($_POST['comment']);
$query = "INSERT INTO lienhe(ten, email, sodienthoai, chude, noidung) VALUES ('$name','$email','$phone','$subject','$comment') ";
if ($con->query($query) === TRUE) {
	$info = "Gửi thành công";
} else {
	$info = "Vui lòng thử lại";
}

$con->close();
?>
<p><?php echo $info ?></p>