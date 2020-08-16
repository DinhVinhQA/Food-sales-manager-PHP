<?php
session_start();
$_SESSION['cart'] = null;
include_once 'conn.php';
include_once "header.php";
include_once "nav.php";

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

<div style="padding-bottom: 100px;background: #fff;padding-top: 100px;margin-top: 0px;margin-bottom: 0px;" class="account_page">
	<div class="container">
		<div class="theme-title">
			<h2 style="text-align: center;">Giao dịch thành công</h2>
			<h3 style="text-align: center; margin-top: 20px;">Cảm ơn bạn đã tin tưởng chúng tôi chúc bạn có ngày thật hạnh phúc</h3>
		   <h5 style="text-align: right;">
		   <a href="all-product.php" class="btn" style="background:#7fb401; width :150px;height: 35px;margin-top: 20px;color:#fff"> Tiếp tục mua hàng</a>
		
		   </h5>
		</div>	
	</div>
</div>
<?php
include_once "footer.php"
?>