<?php 
	include ('../header.php');
	include_once "../../conn.php";
?>
<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">THÊM DANH MỤC CON</h3>  
		<?php 
			if (isset($_POST['submit'])) {
				$tendanhmuccon=$_POST['tendanhmuccon'];
				$query = "SELECT * FROM danhmuccon where tendanhmuccon ='$tendanhmuccon'";
				$result=mysqli_query($con,$query);
				if (mysqli_num_rows($result)>0) {
					echo "<p class='text-danger'>Đã tồn tại tên danh mục con</p>";
				}else{
					$madanhmuccon = $_POST['madanhmuccon'];
					$madanhmuccha = $_POST['madanhmuccha'];
					$query_add="INSERT INTO danhmuccon(madanhmuccon,tendanhmuccon,madanhmuccha) values('$madanhmuccon','$tendanhmuccon','$madanhmuccha')";
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
						<label>Nhập mã danh mục con</label>
						
						<input type="text" name="madanhmuccon" placeholder="mã danh mục con" class="form-control" required="">
					</div>
					<!-- <input type="text" name="id" placeholder="id" class="form-control" required=""> -->
					<div class="form-group">
						<label>Nhập tên danh mục con</label>
						
						<input type="text" name="tendanhmuccon" placeholder="tên danh mục con" class="form-control" required="">
					</div>
					 <div class="form-group">
						<label>Nhập mã danh mục cha</label>
						<select name="madanhmuccha" class="form-control">
							<?php  
							$query = "SELECT distinct madanhmuccha FROM danhmuccha";
							$result=mysqli_query($con,$query);
							while ($ms=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						?><option value="<?php echo $ms['madanhmuccha']; ?>"><?php echo $ms['madanhmuccha']; ?></option><?php
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