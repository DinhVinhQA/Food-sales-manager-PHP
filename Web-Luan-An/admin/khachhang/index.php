<?php 
include_once ('../header.php');
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
		<h3 class="mt-5">KHÁCH HÀNG</h3>  
		<div class="col-md-5 pb-2">
				<a href="add.php" title=""class="btn btn-success">Thêm <i class="fa fa-plus-square"></i></a>
		</div> 
		<div class="col-md-12">       
		<table class="table table-bordered w-100">
			<thead class="table-success">
				<tr>
					<th class="text-center">Mã khách hàng</th>
					<th>Tên khách hàng</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Ngày sinh</th>
					<th class="text-center">giới tính</th>
					<th>Địa chỉ</th>
					<th>Mật khẩu</th>
					<th class="text-center">Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$query="SELECT * FROM nguoidung";
				$result=mysqli_query($con,$query) or die( mysqli_error($con));;
				while ($kh=mysqli_fetch_array($result)) {
					?>
					<tr>
						<td class="text-center"><?php echo $kh['manguoidung']; ?></td>
						<td><?php echo $kh['tennguoidung']; ?></td>
						<td><?php echo $kh['email']; ?></td>
						<td><?php echo $kh['sodienthoai']; ?></td>
						<td><?php echo $kh['ngaysinh']; ?></td>
						<td class="text-center"><?php echo $kh['gioitinh']; ?></td>
						<td><?php echo $kh['diachi']; ?></td>
						<td><?php echo $kh['matkhau']; ?></td>
						<th class="text-center"><a href="delete.php?delete=<?php echo $kh['manguoidung']; ?>"class="btn btn-danger"><i class="fa fa-trash-o"></i></a></th>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</section>
</body>
</html>