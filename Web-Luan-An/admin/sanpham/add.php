<?php 
include ('../header.php');
include_once "../../conn.php";
?>
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

					move_uploaded_file($_FILES['anh']['tmp_name'], '../../img/'.$anh);
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
							$result=mysqli_query($dbc,$query);
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