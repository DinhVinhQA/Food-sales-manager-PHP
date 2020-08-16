<?php 
include ('../header.php');
include_once "../../conn.php";
?>
<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">DANH MỤC CHA</h3>  
		<div class="row">
			<div class="col-md-5 pb-2">
				<a href="add.php" title=""class="btn btn-success">Thêm <i class="fa fa-plus-square"></i></a>
			</div>
			<div class="col-md-12">
				<table class="table table-bordered w-100">
					<thead class="table-success">
						<tr>
							<th>Mã danh mục cha</th>
							<th>Tên danh mục cha</th>
							<th class="text-center">Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php  
						$query="SELECT * FROM danhmuccha";
						$result=mysqli_query($con,$query) or die( mysqli_error($con));
						
						while ($sp=mysqli_fetch_array($result)) {
							?>
							<tr>
								<td><?php echo $sp['madanhmuccha']; ?></td>
								<td><?php echo $sp['tendanhmuccha']; ?></td>
								<th class="text-center">
									<a href="edit.php?edit=<?php echo $sp['madanhmuccha']; ?>"class="btn btn-primary mr-2"><i class="fa fa-pencil"></i>
									</a>
									<a onclick="return confirm('Bạn có thực sự muốn xóa nó ?');" href="delete.php?delete=<?php echo $sp['madanhmuccha']; ?>"class="btn btn-danger"><i class="fa fa-trash-o"></i>
									</a>
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
</section>
</body>
</html>