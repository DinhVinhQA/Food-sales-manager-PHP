<?php
session_start();
include_once "header.php";
include_once "nav.php";
include_once "conn.php";
$ma = $_SESSION['email'];
$query = "SELECT * FROM nguoidung WHERE email='" . $ma . "'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['tennguoidung'];
	$email = $row['email'];
	$sodienthoai = $row['sodienthoai'];
	$ngaysinh = $row['ngaysinh'];
	$gioitinh = $row['gioitinh'];
	$diachi = $row['diachi'];
	$matkhau = $row['matkhau'];
}
?>
<div class="account_page">
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 register_form">
				<div class="theme-title">
					<h2>Thông tin tài khoản</h2>
				</div>
				<div style="display: flex;flex-direction: row;justify-content: flex-end">
					<button class="btn btn-primary text-uppercase" style="padding: 11px 15px;border-radius: 0 !important;background-color: #7FB401;border-color: #7FB401;" data-toggle="modal" data-target="#myModal">Chỉnh sửa</button>
				</div>
				<div id="myModal" class="modal fade" role="dialog">
					<div class="contaner">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<form action="change_info.php" method="POST">
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<div class="form_group">
												<label>Tên người dùng</label>
												<div class="input_group">
													<input type="text" value="<?php echo $name ?>" name="username">
													<i class="fa fa-user" aria-hidden="true"></i>
												</div> <!-- End of .input_group -->
											</div> <!-- End of .form_group -->

											<div class="form_group">
												<label>Ngày sinh</label>
												<div class="input_group">
													<input type="text" value="<?php echo $ngaysinh ?>" name="birthday">
													<i class="fa fa-calendar-o" aria-hidden="true"></i>
												</div> <!-- End of .input_group -->
											</div> <!-- End of .form_group -->

											<div class="form_group">
												<label>Số điện thoại</label>
												<div class="input_group">
													<input type="text" value="<?php echo $sodienthoai ?>" name="phone">
													<i class="fa fa-phone" aria-hidden="true"></i>
												</div> <!-- End of .input_group -->
											</div> <!-- End of .form_group -->
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form_group">
												<label>Địa chỉ Email</label>
												<div class="input_group">
													<input type="email" value="<?php echo $email ?>" name="email_user">
													<i class="fa fa-envelope-o" aria-hidden="true"></i>
												</div> <!-- End of .input_group -->
											</div> <!-- End of .form_group -->
											<div class="form_group">
												<label>Giới tính</label>
												<div class="input_group">
													<input type="text" value="<?php echo $gioitinh ?>" name="sex">
													<i class="fa fa-venus-mars" aria-hidden="true"></i>
												</div> <!-- End of .input_group -->
											</div> <!-- End of .form_group -->
											<div class="form_group">
												<label>Địa chỉ</label>
												<div class="input_group">
													<input type="text" value="<?php echo $diachi ?>" name="address">
													<i class="fa fa-location-arrow" aria-hidden="true"></i>
												</div> <!-- End of .input_group -->
											</div> <!-- End of .form_group -->

										</div>
									</div> <!-- End of .row -->
									<button type="submit" name="update_info" class="btn btn-primary btn-edit">Cập nhật</button>
								</form>
							</div>
							<div class="col-lg-2"></div>
						</div>
					</div>

				</div>

				<form action="javascript:void(0)" method="POST">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form_group">
								<label>Tên người dùng</label>
								<div class="input_group">
									<input type="text" value="<?php echo $name ?>">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->

							<div class="form_group">
								<label>Ngày sinh</label>
								<div class="input_group">
									<input type="text" value="<?php echo $ngaysinh ?>">
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->

							<div class="form_group">
								<label>Số điện thoại</label>
								<div class="input_group">
									<input type="text" value="<?php echo $sodienthoai ?>">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form_group">
								<label>Địa chỉ Email</label>
								<div class="input_group">
									<input type="email" value="<?php echo $email ?>">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
							<div class="form_group">
								<label>Giới tính</label>
								<div class="input_group">
									<input type="text" value="<?php echo $gioitinh ?>">
									<i class="fa fa-venus-mars" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
							<div class="form_group">
								<label>Địa chỉ</label>
								<div class="input_group">
									<input type="text" value="<?php echo $diachi ?>">
									<i class="fa fa-location-arrow" aria-hidden="true"></i>
								</div> <!-- End of .input_group -->
							</div> <!-- End of .form_group -->
						</div>
					</div> <!-- End of .row -->
				</form>
			</div> <!-- End of .register_form -->
			<div class="col-lg-2"></div>
		</div> <!-- End of .row -->
	</div> <!-- End of .container -->

</div> <!-- End of .account_page -->
<?php
include_once "footer.php"
?>