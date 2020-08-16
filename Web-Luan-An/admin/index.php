<?php
 session_start();
 if(!isset($_SESSION['loginAdmin']))
 {
	header("location:login.php");
	exit;
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<section class="main">
		<div class="menu menu-top">
			<div class="container-fluid">
				<div class="box-content">
					<ul class="text-right mb-0">
						<li><a href="">Chào,Admin</a></li>
						<li><a href="logout.php">logout <i class="fa fa-arrow-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<img src="images/logo.jpg" alt="" class="w-100">
		<div class="menu">
			<div class="container-fluid">
				<div class="box-content">
					<ul>
						<li><a href="sanpham/index.php">sản phẩm</a></li>
						<li><a href="lienhe/index.php">liên hệ</a></li>
						<li><a href="danhmuccha/index.php">danh mục cha</a></li>
						<li><a href="danhmuccon/index.php">danh mục con</a></li>
						<li><a href="hoadon/index.php">hóa đơn</a></li>
						<li><a href="khachhang/index.php">khách hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<?php 

include_once "../conn.php";
?>
<?php if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type'] ?>">
	<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	?>
</div>
<?php endif ?>
<style type="text/css">
	td,th{
		vertical-align: middle;
	}
</style>
<div class="container-fluid ">
	<div class="box-content home-product">
		<h3 class="mt-5">SẢN PHẨM</h3> 
		<div class="row">
			<div class="col-md-5 pb-2">
				<a href="add.php" title=""class="btn btn-success">Thêm <i class="fa fa-plus-square"></i></a>
			</div>
			<div style="height: 500px; overflow-y: auto; width: 100%;">
				<table class="table table-bordered  table-hover">
					<thead class="table-success">
						<tr>
							<th class="text-center"> Mã sản phẩm</th>
							<th> Tên sản phẩm</th>
							<th> Ảnh </th>
							<th> Giá gốc</th>
							<th>Giá khuyến mãi</th>
							<th> Thông tin sản phẩm</th>
							<th> Ghi chú</th>
							<th class="text-center">Trạng thái</th>
							<th class="text-center"> Mô tả</th>
							<th>Mã danh mục con</th>
							<th class="text-center">Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						 $query="SELECT * FROM sanpham";
						$result=mysqli_query($con,$query) or die( mysqli_error($con));					
						while ($sp=mysqli_fetch_array($result)) {
							?>
							<tr>
								<td class="text-center"><?php echo $sp['masanpham']; ?></td>
								<td><?php echo $sp['tensanpham'] ?></td>
								 <td><img src="../img/<?php echo $sp['anh']; ?>" width="60px" alt=""></td>
								<td><?php echo number_format($sp['giagoc'])?> VNĐ</td>
								<td><?php echo number_format($sp['giakhuyenmai'])?> VNĐ</td>
								
								<td><?php echo $sp['thongtinsanpham'] ?></td>
								<td><?php echo $sp['ghichu'] ?></td>
								<td><?php echo $sp['trangthai'] ?></td>
								<td><?php echo $sp['mota'] ?></td>
								<td><?php echo $sp['madanhmuccon'] ?></td>
								<th class="text-center d-flex">
									<a href="edit.php?edit=<?php echo $sp['masanpham']; ?> " class="btn btn-primary mr-2"><i class="fa fa-pencil"></i>
									</a>
									<a  href="delete.php?delete=<?php echo $sp['masanpham']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
								</th>
								
							</tr>
							<?php
						}
						?>		
					</tbody>
				</table>
			</div>
		</div> 
	</div>
</div>
		</div>
	</section>
</body>
</html>

