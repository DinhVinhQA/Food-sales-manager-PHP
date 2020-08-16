<?php 

	include_once "../conn.php";
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
	<div class="box-content home-product">
		<h3 class="mt-5">THÊM SẢN PHẨM</h3>  
		<?php  
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$tensanpham=$_POST['tensanpham'];
				$query="SELECT * FROM sanpham WHERE tensanpham='$tensanpham'";
				$result=mysqli_query($con,$query);
				if (mysqli_num_rows($result)>0) {
				echo "<p class='text-danger'>Đã tồn tại tên sản phẩm</p>";
				}else{
					$giagoc=$_POST['giagoc'];
					$giakhuyenmai=$_POST['giakhuyenmai'];
					$thongtinsanpham=$_POST['thongtinsanpham'];
					$ghichu=$_POST['ghichu'];
					$anh=$_FILES['anh']['name'];
					$madanhmuccon = $_POST['madanhmuccon'];
					$trangthai = $_POST['trangthai'];
					$mota = $_POST['mota'];
					$query_add="INSERT INTO sanpham (tensanpham,anh,giagoc,giakhuyenmai,thongtinsanpham,ghichu,trangthai,mota,madanhmuccon) VALUES ('$tensanpham', '$anh','$giagoc','$giakhuyenmai','$thongtinsanpham','$ghichu','$trangthai','$mota','$madanhmuccon')";
					// echo $query_add;
					$result_add=mysqli_query($con,$query_add);

					move_uploaded_file($_FILES['anh']['tmp_name'], '../img/'.$anh);
					if (mysqli_affected_rows($con)) {
						echo "<p class='text-success'>Thêm thành công</p>";
					}else{
						echo "<p class='text-warning'>Thêm thất bại</p>";
					}
				}
			}
		?>
		<div class="mb-5">        
		<form method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" name="tensanpham" placeholder="tên sản phẩm" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Hình ảnh</label>
						<input type="file" name="anh" placeholder="hình ảnh" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Gía gốc</label>
						<input type="number" name="giagoc" placeholder="giá gốc" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Gía khuyến mãi</label>
						<input type="number" name="giakhuyenmai" placeholder="giá khuyến mãi" class="form-control" required="">
					</div>	
					
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label>Thông tin sản phẩm</label>
						<input type="text" name="thongtinsanpham" placeholder="thông tin sản phẩm" class="form-control" required="">
					</div>
					 <div class="form-group">
						<label>Ghi chú</label>
						<select name="ghichu" class="form-control">
							<?php  
							$query = "SELECT distinct ghichu FROM sanpham";
							$result=mysqli_query($con,$query);
							while ($ms=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $ms['ghichu']; ?>"><?php echo $ms['ghichu']; ?></option><?php
							}
						?>
						</select>
					</div>
				    <div class="form-group">
						<label>Mã danh mục con</label>
						<select name="madanhmuccon" class="form-control">
							<?php  
							$query = "SELECT * FROM danhmuccon";
							$result=mysqli_query($con,$query);
							while ($ms=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $ms['madanhmuccon']; ?>"><?php echo $ms['madanhmuccon']; ?></option><?php
							}
						?>
						</select>
					</div>
					 <div class="form-group">
						<label>Trạng thái</label>
						<select name="trangthai" class="form-control">
							<?php  
							$query = "SELECT distinct trangthai FROM sanpham";
							$result=mysqli_query($con,$query);
							while ($ms=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $ms['trangthai']; ?>"><?php echo $ms['trangthai']; ?></option><?php
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<input type="text" name="mota" placeholder="mô tả" class="form-control" required="">
					</div>

				</div>
			</div>
			<button type="submit" class="btn btn-success">THÊM</button>
			<a class="come-back" href="index.php">QUAY LẠI</a>
		</form>
	</div>
	</div>
</div>

</section>
</body>
</html>