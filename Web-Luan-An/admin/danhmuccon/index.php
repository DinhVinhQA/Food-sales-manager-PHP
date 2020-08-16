<?php 
include ('../header.php');
include_once "../../conn.php";
?>
<?php if(isset($_SESSION['message'])):?>
<div class="alert alert-<?=$_SESSION['msg_type'] ?>">
	<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	?>
</div>
<?php endif ?>
<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">DANH MỤC CON</h3>  
		<div class="row">
			<div class="col-md-5 pb-2">
				<a href="add.php" title=""class="btn btn-success">Thêm <i class="fa fa-plus-square"></i></a>
			</div>
			<div style="height: 500px; overflow-y: auto;width: 100%;">
				<table class="table table-bordered w-100">
					<thead class="table-success">
						<tr>
							<th>Mã danh mục con</th>
							<th>Tên danh mục con</th>
							<th>Mã danh mục cha</th>
							<th class="text-center">Sửa / Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php  
						 $query="SELECT danhmuccon.madanhmuccon ,danhmuccon.tendanhmuccon,danhmuccha.madanhmuccha FROM danhmuccon,danhmuccha WHERE danhmuccha.madanhmuccha=danhmuccon.madanhmuccha";
						$result=mysqli_query($con,$query) or die( mysqli_error($con));
						
						while ($th=mysqli_fetch_array($result)) {
							?>
							<tr>
								<td><?php echo $th['madanhmuccon']; ?></td>
								<td><?php echo $th['tendanhmuccon']; ?></td>
								<td><?php echo $th['madanhmuccha']; ?></td>
								<th class="text-center">
									<a href="edit.php?edit=<?php echo $th['madanhmuccon']; ?>"class="btn btn-primary mr-2"><i class="fa fa-pencil"></i>
									</a>
									<a href="delete.php?delete=<?php echo $th['madanhmuccon']; ?>"class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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