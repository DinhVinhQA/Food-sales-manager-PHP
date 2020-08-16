<?php 
include ('../header.php');
include_once "../../conn.php";
?>

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
						<img src="../../img/<?php echo $anh ?>" class='w-50' alt="">
						<input type="file" name="anh" placeholder="hình ảnh" class="form-control" >
					</div>
					<div class="form-group">
						<label>Giá gốc</label>
						<input type="number" name="giagoc" placeholder="giá gốc" class="form-control" required="" value="<?php echo $giagoc ?>">
					</div>
					<div class="form-group">
						<label>Giá khuyến mãi</label>
						<input type="number" name="giakhuyenmai" placeholder="giá khuyến mãi" class="form-control" required="" value="<?php echo $giakhuyenmai ?>">
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
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
	move_uploaded_file($anh_tmp,"../../img/$anh");
		
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