<?php
session_start();
include_once 'conn.php';
include_once "header.php";
include_once "nav.php";
$tongsp = 0;
$tongtien = 0;
$ma = $_SESSION['email'];
$query = "SELECT * FROM nguoidung WHERE email='" . $ma . "'";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
	$diachi = $row['diachi'];
	$name = $row['tennguoidung'];
	$email = $row['email'];
	$sodienthoai = $row['sodienthoai'];
	$manguoidung = $row['manguoidung'];
}
if (isset($_POST['update'])) {
	$diachi = $_POST['diachi'];
	$query = "UPDATE nguoidung SET diachi = '" . $diachi . "' WHERE email='" . $ma . "'";
	$result = mysqli_query($con, $query);
}
if (isset($_POST['send'])) {
	$now = getdate();
	$currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
	$tongsp = $_SESSION["tongsp"];
	$tongtien = $_SESSION["thanhtien"];
	$loaivanchuyen = $_SESSION['loaithanhtoan'];
	$query = "INSERT INTO hoadon(soluong, tongtien, phuongthucthanhtoan, manguoidung, ngaylap) VALUES ('$tongsp',$tongtien,'$loaivanchuyen','$manguoidung','$currentDate')";
	if ($con -> query($query) === TRUE) {
		$sql = "SELECT * FROM hoadon where manguoidung like '$manguoidung' AND  ngaylap ='$currentDate'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($query);
		$mahoadon = $row['mahoadon'];
		$info = "Đăng kí thành công";
		$total = 0;
		$subTotal = 0;
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $value) {
				$masp = $key;
				$quantity = $value["num"];
				$price = $value["price"];
				$total_price = $quantity * $price;
				// $trangthai = "con hang";
				// if ($trangthai == "het hang") {
				// 	break;
				// }
				$sql2 = "INSERT INTO chitietsanphamhoadon(masanpham,mahoadon,soluong,gia) VALUES ('$masp','$mahoadon','$quantity','$total_price')";
				$query1 = mysqli_query($con, $sql2);
			}
			echo "<script>window.location.href='finsh.php'</script>";
		} else {
			$info = "Đăng kí lỗi vui lòng đăng kí lại ";
		}
	}
}
?>

<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs text-center">
					<h1>Xác Nhận Thanh toán</h1>
					<h4>Cảm ơn bạn đã tin tưởng chúng tôi</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="breadcrumb-bottom-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-5 col-sm-5">
					<ul>
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						<li>Thanh toán</li>

					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp <span>100% sản phẩn</span> hữu cơ</p>
				</div>
			</div>
		</div>
	</div>

</section>

<div style="padding-bottom: 100px;background: #ccc;padding-top: 100px;margin-top: 0px;margin-bottom: 0px;" class="account_page">
	<div class="container">
		<div class="theme-title">
			<h2 style="text-align: center;">Xác nhận địa chỉ thanh toán</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<form action="xacnhan.php" method="POST">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form_group">
									<label>Địa chỉ chỉ nhận hàng </label>
									<div class="input_group">
										<input type="text" name="diachi" value="<?php echo $diachi ?>">
										<i class="fa fa-location-arrow" aria-hidden="true"></i>
									</div> <!-- End of .input_group -->
								</div> <!-- End of .form_group -->
							</div>
						</div> <!-- End of .row -->
						<button style="line-height: 35px;margin-top: 0px;" type="submit" name="update" class="btn btn-primary btn-edit">Cập nhật</button>
						<div>
							<button style="font-size: 12px;line-height: 35px; margin-left: auto;display: block; margin-top: -34px;" type="submit" name="send" class="btn btn-primary btn-edit">Gửi đơn hàng</button>
						</div>
					</form>

				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>
</div>
<?php
include_once "footer.php"
?>