<?php
include('../header.php');
include('../../conn.php');
?>
<style type="text/css">
	th,
	td {
		text-align: center;
	}

	table {
		width: 200px;
	}
</style>
<div class="container">
	<h2>Chi tiết hóa đơn</h2>
	<table class="table table-bordered  table-hover w-50">
		<thead>
			<tr class="table-success">
				<th> Mã sản phẩm</th>
				<th> Số lượng</th>
				<th> Giá </th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($_GET['mahoadon'])) {
				$mahoadon = $_GET['mahoadon'];
				$query2 = "SELECT hoadon.mahoadon,chitietsanphamhoadon.masanpham,chitietsanphamhoadon.soluong,chitietsanphamhoadon.gia FROM hoadon inner join chitietsanphamhoadon on hoadon.mahoadon = chitietsanphamhoadon.mahoadon inner join sanpham on chitietsanphamhoadon.masanpham = sanpham.masanpham WHERE hoadon.mahoadon = $mahoadon";
				$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
				while ($ct = mysqli_fetch_array($result2)) {
					?>
					<tr>
						<td><?php echo $ct['masanpham']; ?></td>
						<td><?php echo $ct['soluong']; ?></td>
						<td><?php echo number_format($ct['gia']); ?> VNĐ</td>

					<?php
						}
						?>
					</tr>
				<?php
				}
				?>
		</tbody>
	</table>
</div>