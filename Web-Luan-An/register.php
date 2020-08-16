<?php
include_once "header.php";
include_once "nav.php";
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs text-center">
					<h1>Đăng nhập/Đăng ký</h1>
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
						<li>Đăng nhập/Đăng ký</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp<span> 100% </span>sản phẩm hữu cơ</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Account Page Content*********************** -->
<div class="account_page">
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 register_form">
				<div class="theme-title">
					<h2>Đăng ký tại đây</h2>
				</div>
				<form action="" method="POST" id="form_resigter">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form_group">
								<label>Tên đăng nhập</label>
								<div class="input_group">
									<input type="text" name="username_dk" placeholder="Nguyễn Văn A" required>
									<i class="fa fa-user" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->

							<div class="form_group">
								<label>Mật khẩu</label>
								<div class="input_group">
									<input type="password" name="password_dk" placeholder="*******" required>
									<i class="fa fa-lock" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->

							<div class="form_group">
								<label>Số điện thoại</label>
								<div class="input_group">
									<input type="text" name="phone_dk" placeholder="0703584997" required>
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
							<div class="form_group">
								<label>Ngày sinh</label>
								<div class="input_group">
									<input type="text" name="date_dk" placeholder="1998-09-14" required>
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form_group">
								<label>Địa chỉ Email</label>
								<div class="input_group">
									<input type="email" name="email_dk" placeholder="nguyenvana@gmail.com" required>
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->

							<div class="form_group">
								<label>Giới tính</label>
								<div class="input_group">
									<input type="text" name="sex_dk" placeholder="Nam" required>
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->

							<div class="form_group">
								<label>Địa chỉ</label>
								<div class="input_group">
									<input type="text" name="address_dk" placeholder="Huế" required>
									<i class="fa fa-location-arrow" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
						</div>
					</div> <!-- End of .row -->
					<button type="submit" name="create_dk" class="color1_bg tran3s">Tạo tài khoản</button>
					<div id="info_resigter"></div>
				</form>
			</div> <!-- End of .register_form -->
			<div class="col-lg-2"></div>
		</div> <!-- End of .row -->
	</div> <!-- End of .container -->
</div> <!-- End of .account_page -->
<?php
include_once "footer.php"
?>