<?php 
session_start();
include_once "../conn.php";
$info = "";
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$sql = "SELECT * FROM nguoidung WHERE email='$email' AND matkhau='$password' ";
$result = $con->query($sql);
$password = md5($password);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$_SESSION["login"] = $row["tennguoidung"];
		$info='1';
	}
	
	$_SESSION['email'] = $email;
	//header("Location:../index.php");
} else {
	$info='2';
}

$con->close();
?>

 <?php echo $info;?>

