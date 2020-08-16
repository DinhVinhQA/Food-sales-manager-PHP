<?php
session_start();
include_once "header.php";
include_once "nav.php";
include_once "conn.php";
?>
<?php
$result = mysqli_query($con, "SELECT count(masanpham) as total FROM sanpham ");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
	$current_page = $total_page;
} else if ($current_page < 1) {
	$current_page = 1;
}
$start = ($current_page - 1) * $limit
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs text-center">
					<h1>Giới Thiệu</h1>
					<h4>Chào mừng bạn đến với nơi cung cấp sản phẩm hữu cơ trực tuyến của chúng tôi</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="breadcrumb-bottom-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-5 col-sm-5">
					<ul>
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						<li>Giới Thiệu</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp <span>100% chất lượng</span> sản phẩm</p>
				</div>
			</div>
		</div>
	</div>

</section>

<section class="about-story">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<figure class="img-holder">
					<img src="images/about/3.jpg" alt="">
				</figure>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="about-text">
					<div class="theme_title">
						<h3>Tiểu sử về chúng tôi</h3>
					</div>
					<div class="about_quot">
						Thực phẩm của chúng ta nên là thuốc của chúng ta, chất hữu cơ y học của chúng ta
						nên là thực phẩm của chúng ta sức khỏe của bạn.
					</div>
					<div class="text">
						<p>Làm thế nào tất cả ý tưởng sai lầm này để tố cáo niềm vui và ca ngợi nỗi đau đã được sinh ra và tôi sẽ cung cấp cho bạn một tài khoản đầy đủ của hệ thống, và giải thích những lời dạy thực tế của nhà thám hiểm vĩ đại về sự thật, người xây dựng hạnh phúc của con người</p>
					</div>
					<div class="icon-box">
						<div class="single-item">
							<div class="icon"><i class="icon-wheat"></i></div>
							<div class="count">45+</div>
							<div class="name color1">Trang trại nhà riêng</div>
						</div>
						<div class="single-item">
							<div class="icon"><i class="icon-nature-1"></i></div>
							<div class="count">80+</div>
							<div class="name color1">Nông dân mục vụ</div>
						</div>


					</div>
					<div class="text">
						<p>Từ bỏ niềm vui và ca ngợi nỗi đau đã được sinh ra và tôi sẽ cung cấp cho bạn một tài khoản đầy đủ về hệ thống, những lời dạy thực tế của nhà thám hiểm vĩ đại.</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="four-column">
	<div class="container text-center">
		<div class="theme_title center">
			<h3>QUÁ TRÌNH GIAO HÀNG</h3>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12 text-center">
				<div class="single-item ">
					<div class="inner-box">
						<div class="icon"><i class="icon-business"></i><span>1</span></div>
					</div>

					<h5>ĐẶT HÀNG CỦA KHÁCH HÀNG</h5>
					<p>
						<p>
							Đơn đặt hàng của khách hàng của được nắm bắt bởi API kho ..
						</p>

				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 text-center">
				<div class="single-item ">
					<div class="inner-box">
						<div class="icon"><i class="rot icon-nature-1"></i><span>2</span></div>
					</div>
					<h5>ĐÓNG GÓI</h5>
					<p>
						<p>
							Đơn đặt hàng của khách hàng của được nắm bắt bởi API kho ..

						</p>

				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12 text-center">
				<div class="single-item ">
					<div class="inner-box">
						<div class="icon"><i class="rot icon-transport"></i><span>3</span></div>
					</div>
					<h5>CHUYỂN</h5>
					<p>
						Đơn đặt hàng của khách hàng của được nắm bắt bởi API kho ..
					</p>

				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 text-center">
				<div class="single-item ">
					<div class="inner-box">
						<div class="icon"><i class="rot icon-check"></i><span>4</span></div>
					</div>
					<h5>BÁO CÁO</h5>
					<p>
						Đơn đặt hàng của khách hàng của được nắm bắt bởi API kho ..
					</p>

				</div>
			</div>


		</div>
		<div class="link"><a href="all-product.php" class="rot tran3s color1_bg"> SẢN PHẨM CỬA HÀNG</a></div>
	</div>
</section>




<?php
include_once "footer.php";
?>