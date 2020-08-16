<?php 
include ('../header.php');
include('../../conn.php')
?>

<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">HÓA ĐƠN</h3>          
		<table class="table table-bordered w-100">
			<thead class="table-success">
				<tr>
					<th>Mã hóa đơn</th>
					<th>Số lượng</th>
					<th>Tổng tiền</th>
					<th>Phương thức thanh tóa</th>
					<!-- <th>Trạng thái</th> -->
					<th>Ngày lập </th>
					<th>Tên người dùng</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Email</th>
					<th>Chi tiết hóa đơn</th>		
				</tr>
			</thead>
			<tbody>
				<?php  
				 $query="SELECT hoadon.mahoadon,hoadon.soluong,hoadon.tongtien,hoadon.phuongthucthanhtoan,hoadon.trangthai,hoadon.ngaylap,nguoidung.tennguoidung,nguoidung.diachi,nguoidung.sodienthoai,nguoidung.email,hoadon.ngaylap  FROM hoadon,nguoidung WHERE hoadon.manguoidung = nguoidung.manguoidung ;";
				$result=mysqli_query($con,$query) or die( mysqli_error($con));
				while ($kh = mysqli_fetch_array($result)) {
					// $mahoadon = $kh['mahoadon'];
					?>
					
					<tr>
						<td><?php echo $kh['mahoadon']; ?></td>
						<td><?php echo $kh['soluong']; ?></td>
						<td><?php echo number_format($kh['tongtien']); ?> VNĐ</td>
						<td><?php echo $kh['phuongthucthanhtoan']; ?></td>
						<td><?php echo $kh['ngaylap']; ?></td>
						<td><?php echo $kh['tennguoidung']; ?></td>
						<td><?php echo $kh['diachi']; ?></td>
						<td><?php echo $kh['sodienthoai']; ?></td>
						<td><?php echo $kh['email']; ?></td>
						<td align="center">
							<a href="chitiet.php?mahoadon=<?php echo $kh['mahoadon']; ?>" class="btn btn-primary">
						 <!-- <button type="button" data-toggle="modal" data-target="#myModal"> -->
    						<i class="fa fa-align-justify"></i>
    					</a>
  						<!-- </button> -->	
  						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</section>
</body>
</html>