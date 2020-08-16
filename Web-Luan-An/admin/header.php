<?php  
	ob_start();
	session_start();
	$time=date('Y-m-d',time());
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../ckeditor/skins/moono/editor.css">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
	<section class="main">
		<div class="menu menu-top">
			<div class="container-fluid">
				<div class="box-content">
					<ul class="text-right mb-0">
						<li><a href="">Chào,Admin</a></li>
						<li><a href="../logout.php">logout <i class="fa fa-arrow-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<img src="../images/logo.jpg" alt="" class="w-100">
		<div class="menu" style="background: #7fb401 !important;">
			<div class="container-fluid">
				<div class="box-content">
					<ul>
						<li><a href="../sanpham/index.php">sản phẩm</a></li>
						<li><a href="../lienhe/index.php">liên hệ</a></li>
						<li><a href="../danhmuccha/index.php">danh mục cha</a></li>
						<li><a href="../danhmuccon/index.php">danh mục con</a></li>
						<li><a href="../hoadon/index.php">hóa đơn</a></li>
						<li><a href="../khachhang/index.php">khách hàng</a></li>
						
					</ul>
				</div>
			</div>
		</div>
