<?php 
	include ('../header.php');
	include_once "../../conn.php";
?>
<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">THÊM KHÁCH HÀNG</h3>  
		<?php 
			if (isset($_POST['submit'])) {
				$tennguoidung=$_POST['tennguoidung'];
				$query = "SELECT * FROM nguoidung where tennguoidung='$tennguoidung'";
				$result=mysqli_query($con,$query) or die(mysqli_error($con));
				if (mysqli_num_rows($result)>0) {
					echo "<p class='text-danger'>Đã tồn tại tên người dùng này</p>";
				}else{
					$manguoidung = $_POST['manguoidung'];
					$email = $_POST['email'];
					$sodienthoai = $_POST['sodienthoai'];
					$ngaysinh = $_POST['ngaysinh'];
					$diachi = $_POST['diachi'];
					$matkhau = $_POST['matkhau'];
					$gioitinh = $_POST['gioitinh'];
					$query_add="INSERT INTO nguoidung(manguoidung,tennguoidung,email,sodienthoai,ngaysinh,diachi,matkhau,gioitinh) values('$manguoidung','$tennguoidung','$email','$sodienthoai','$ngaysinh','$diachi','$matkhau','$gioitinh')";
					$result_add=mysqli_query($con,$query_add);

					if (mysqli_affected_rows($con)) {
						echo "<p class='text-success'>Thêm thành công</p>";
					}else{
						echo "<p class='text-warning'>Thêm thất bại</p>";
					}
				}
			}
		?>        
		<form  method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label>Nhập mã người dùng</label>	
						<input type="text" name="manguoidung" placeholder="mã người dùng" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Nhập tên người dùng</label>	
						<input type="text" name="tennguoidung" placeholder="tên người dùng" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Nhập Email</label>	
						<input type="text" name="email" placeholder="email" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Nhập số điện thoại</label>	
						<input type="number" name="sodienthoai" placeholder="số điện thoại" class="form-control" required="">
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label>Nhập ngày sinh</label>	
						<input type="text" name="ngaysinh" placeholder="ngày sinh" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Nhập địa chỉ</label>	
						<input type="text" name="diachi" placeholder="địa chỉ" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Nhập mật khẩu</label>	
						<input type="text" name="matkhau" placeholder="mật khẩu" class="form-control" required="">
					</div>
					 <div class="form-group">
						<label> Giới tính</label>
						<select name="gioitinh" class="form-control">
							<?php  
							$query = "SELECT distinct gioitinh FROM nguoidung";
							$result=mysqli_query($con,$query);
							while ($ms=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $ms['gioitinh']; ?>"><?php echo $ms['gioitinh']; ?></option><?php
							}
						?>
						</select>
					</div>				
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-success">Thêm</button>
			<a class="come-back" href="index.php">QUAY LẠI</a>
		</form>
	</div>
</div>
</section>
</body>