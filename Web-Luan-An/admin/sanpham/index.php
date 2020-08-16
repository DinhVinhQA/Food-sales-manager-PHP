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
								 <td><img src="../../img/<?php echo $sp['anh']; ?>" width="60px" alt=""></td>
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
									<a href="delete.php?delete=<?php echo $sp['masanpham']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
