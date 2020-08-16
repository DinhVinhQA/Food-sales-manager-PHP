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
		<h3 class="mt-5">LIÊN HỆ</h3>   
		<div class="row">
			<!-- <div class="col-md-5 pb-2">
				<a href="add.php" title=""class="btn btn-success">Thêm liên hệ mới</a>
			</div> -->
			<div class="col-md-12">
				<table class="table table-bordered w-100">
					<thead class="table-success">
						<tr>
							<th class="text-center">Mã liên hệ</th>
							<th>Tên liên hệ</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Chủ đề</th>
							<th>Nội dung</th>
							<th class="text-center"> Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php  
						$query="SELECT * FROM lienhe";
						$result=mysqli_query($con,$query) or die( mysqli_error($con));	;
						
						while ($sp=mysqli_fetch_array($result)) {
							?>
							<tr>
								<td class="text-center"><?php echo $sp['malienhe']; ?></td>
								<td><?php echo $sp['ten']; ?></td>
								<td ><?php echo $sp['email']; ?></td>
								<td><?php echo $sp['sodienthoai']; ?></td>
								<td><?php echo $sp['chude']; ?></td>
								<td><?php echo $sp['noidung']; ?> </td>
								<th style="text-align: center;"><a href="delete.php?delete=<?php echo $sp['malienhe'];?>"class="btn btn-danger"><i class="fa fa-trash-o"></i></a></th>
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