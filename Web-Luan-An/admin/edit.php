<?php 
include('../conn.php');
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
		<h3 class="mt-5">SỬA SẢN PHẨM</h3>  
		<div  class="mb-5">  
			<?php 
				    $id = $_REQUEST["edit"];
					if(isset($_GET['edit'])){

						$masanpham = $_GET['edit']; 

						$query = "SELECT * FROM sanpham WHERE masanpham=$masanpham";

						$rs = mysqli_query($con,$query); 

						while ($row=mysqli_fetch_array($rs)){
				            $masanpham = $row['masanpham']; 
				            $tensanpham = $row['tensanpham'];
				            $giagoc = $row['giagoc'];
				            $anh = $row['anh'];
				            $giakhuyenmai =$row['giakhuyenmai'];
				            $thongtinsanpham = $row['thongtinsanpham'];
				            $ghichu = $row['ghichu'];
				            $trangthai = $row['trangthai'];
							$mota = $row['mota'];
					}

				}


				?>
		<form method="POST" action="edit.php?edit=<?php echo $id ?>"  enctype="multipart/form-data">
			<div class="row">
				
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" name="tensanpham" placeholder="tên sản phẩm" class="form-control" required=""  value="<?php echo $tensanpham ?>">
					</div>
					<div class="form-group">
						<label>Hình ảnh</label>
						<img src="../img/<?php echo $anh ?>" class='w-50' alt="">
						<input type="file" name="anh" placeholder="hình ảnh" class="form-control" >
					</div>
					<div class="form-group">
						<label>Giá gốc</label>
						<input type="number" name="giagoc" placeholder="giá gốc" class="form-control" required="" value="<?php echo $giagoc ?>">
					</div>
					
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label>Giá khuyến mãi</label>
						<input type="number" name="giakhuyenmai" placeholder="giá khuyến mãi" class="form-control" required="" value="<?php echo $giakhuyenmai ?>">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<input type="text" name="mota" placeholder="Mô tả" class="form-control" required=""  value="<?php echo $mota ?>">
					</div>
					<div class="form-group">
						<label>Thông tin sản phẩm</label>
						<input type="text" name="thongtinsanpham" placeholder="Thông tin sản phẩm" class="form-control" required="" value="<?php echo $thongtinsanpham ?>">
					</div>
					<div class="form-group">
						<label>Ghi chú</label>
						<select name="ghichu" class="form-control">
							<?php  
							$query = "SELECT distinct ghichu FROM sanpham";
							$result=mysqli_query($con,$query);
							while ($sp=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $sp['ghichu']; ?>"><?php echo $sp['ghichu']; ?></option><?php
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
							while ($sp=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $sp['trangthai']; ?>"><?php echo $sp['trangthai']; ?>
							
						</option><?php
							}
						?>
						</select>
					</div>
			</div>
			<button type="submit" class="btn btn-success" name="update">Sửa</button>&emsp;
			<a class="come-back" href="index.php">QUAY LẠI</a>
		</form>
	</div>
	</div>
</div>
<?php 
if(isset($_POST['update'])){
	 $id_update = $masanpham; 
     $tensanpham = $_POST['tensanpham'];
	 $giagoc = $_POST['giagoc'];
	 $anh = $_FILES['anh']['name'];
	 $anh_tmp = $_FILES['anh']['tmp_name'];
	 $giakhuyenmai = $_POST['giakhuyenmai'];
	$thongtinsanpham = $_POST['thongtinsanpham'];
	$ghichu = $_POST['ghichu'];
	$trangthai = $_POST['trangthai'];
	$mota = $_POST['mota'];
	move_uploaded_file($anh_tmp,"../img/$anh");
		
		$query="UPDATE sanpham set tensanpham ='$tensanpham',anh ='$anh',giagoc ='$giagoc',giakhuyenmai ='$giakhuyenmai',thongtinsanpham ='$thongtinsanpham',ghichu ='$ghichu',trangthai='$trangthai',mota='$mota' where masanpham='$id_update'";
		
        if (mysqli_query($con,$query)) {
            echo "<script>alert('Cập nhật thành công!')</script>";
			
			echo "<script>window.open('index.php','_self')</script>";
        }	
        else{
            echo "<script>alert('Cập nhật lỗi lỗi!')</script>";
        }				
    }	
?> 
</html>