<?php 
session_start();
$_SESSION["page"]="contact.php";
include_once "header.php";
include_once "nav.php";
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs text-center">
					<h1>Liên hệ với chúng tôi</h1>
					<h4>CHÀO MỪNG BẠN ĐẾN NHÀ CUNG CẤP SẢN PHẨM HỮU CƠ TRỰC TUYẾN ĐƯỢC CHỨNG NHẬN</h4>
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
						<li>Liên hệ</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp <span>100% sản phẩn</span> hữu cơ</p>
				</div>
			</div>
		</div>
	</div>
	

</section>

<section class="single-contact_us">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="left_contact">
					<h5>Thông tin</h5>
					<ul class="list catagories">
						<li><a href="#"><i class="fa fa-home color1"></i>Khu quy hoạch Đại Học Huế, Phường An Tây, Thành phố Huế,Tỉnh Thừa Thiên Huế</a></li>
						<li><a href="#"><i class="fa fa-envelope color1"></i><span>tansonstore@gmail.com</span></a></li>
						<li><a href="#"><i class="fa fa-phone color1"></i>054.3811.829</a></li>
					</ul>

					<div class="border-area">
						<h6>Thời gian làm việc</h6>
						<div class="list Business">
							<p>Thứ 2 - Thứ 7: 09.00am đến 05.00pm <br>Chủ Nhật: <span>Đóng cửa</span></p>
						</div>
					</div>


				</div>
			</div>
			<div class="col-md-8 col-sm-6 col-xs-12">
				<div class="contact_in-box">
					<div class="theme-title ">
						<h2>Rất vui được nhận ý kiến của bạn</h2>
					</div>
					<form action="" id="form_contact" method="POST">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="name" placeholder="Tên của bạn*" required>
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<input type="email" name="email" placeholder="Email*" required>
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<input type="text" name="phone" placeholder="Số điện thoại" required>
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<input type="text" name="subject" placeholder="Tên tiêu đề" required>
							</div>
							<!-- /.col-md-6 -->

							<div class="col-md-12">
								<textarea name="comment" placeholder="Nội dung" required></textarea>
							</div>
							<!-- /.col-md-12 -->
							<div class="col-md-12">
								<button id="contact" type="submit" name="contact" class="btn btn-primary" style="background: #7FB401;border:none">Gửi</button>
							</div>
							<div id="info_contact"></div>
							<!-- /.col-md-12 -->
						</div>
						<!-- /.row -->
					</form>

				</div> 
			</div>
		</div>
	</div>
</section>

<!-- Google map************************ -->
<section id="google-map-area">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122445.89064313412!2d107.50707216815665!3d16.4535434602919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a14993b3f219%3A0x8abb86dccad7f2bf!2zxJDhuqFpIGjhu41jIEh14bq_!5e0!3m2!1svi!2s!4v1574392177091!5m2!1svi!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>

<?php 
include_once "footer.php";
?>
