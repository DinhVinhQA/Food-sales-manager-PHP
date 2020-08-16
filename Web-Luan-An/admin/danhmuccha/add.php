<?php 
	include ('../header.php');
	include_once "../../conn.php";
?>
<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">THÊM DANH MỤC</h3>  
		<?php 
			if (isset($_POST['submit'])) {
				$tendanhmuccha=$_POST['tendanhmuccha'];
				$query = "SELECT * FROM danhmuccha where tendanhmuccha='$tendanhmuccha'";
				$result=mysqli_query($con,$query);
				if (mysqli_num_rows($result)>0) {
					echo "<p class='text-danger'>Đã tồn tại tên danh mục cha</p>";
				}else{
					$madanhmuccha = $_POST['madanhmuccha'];
					$query_add="INSERT INTO danhmuccha(madanhmuccha,tendanhmuccha) values('$madanhmuccha','$tendanhmuccha')";
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
						<label>Nhập mã danh mục cha</label>
						
						<input type="text" name="madanhmuccha" placeholder="mã danh mục cha" class="form-control" required="">
					</div>
					<!-- <input type="text" name="id" placeholder="id" class="form-control" required=""> -->
					<div class="form-group">
						<label>Nhập tên danh mục</label>
						
						<input type="text" name="tendanhmuccha" placeholder="tên danh mục cha" class="form-control" required="">
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