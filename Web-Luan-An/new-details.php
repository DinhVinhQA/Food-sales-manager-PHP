<?php

if ($_REQUEST['id']) {
	$id = $_REQUEST['id'];
}
?>

<?php
include_once "header.php";
include_once "nav.php";
include_once "conn.php"
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs text-center">
					<h1>Tin tức bổ ích</h1>
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
						<li><a href="list-news.php">Tin tức</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						<li>Tin tức bổ ích</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp <span>100% sản phẩn</span> hữu cơ</p>
				</div>
			</div>
		</div>
	</div>

</section>
<section class="news single_news_page with_sidebar news_single">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<?php
				$query = "SELECT * FROM tintuc WHERE matintuc='$id'";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$matin = $row['matintuc'];
						$tentin = $row['tentintuc'];
						$anh = $row['hinhanh'];
						$noidung = $row['noidung'];

						?>

						<div class="single_left_bar">
							<div class="blogList_single_post clear_fix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
								<div class="img_holder">
									<img style="height: auto;" src="<?php echo $anh  ?>" alt="News" class="img-responsive">
									<div class="opacity tran3s">
										<div class="icon">
											<span><a href="blog-details.html" class="border_round">+</a></span>
										</div> <!-- End of .icon -->
									</div> <!-- End of .opacity -->
								</div> <!-- End of .img_holder -->
								<div class="post">

									<div class="text">
										<h4><a href="blog-details.html"><?php echo $tentin  ?></a></h4>

										<p><?php echo $noidung  ?></p>

									</div>

									<div class="share_option clear_fix">
										<h4 class="float_left">Nếu bạn thấy bài viết này hữu ích hãy chia sẽ cho mọi người cũng biết.</h4>
										<ul class="social_icon float_left">
											<li><a href="#" class="tran3s" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#" class="tran3s" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#" class="tran3s" title="Linkedin"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#" class="tran3s" title="Youtube"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										</ul>
									</div>

								</div> <!-- End of .post -->

								<div id="tab2" class="tab-pane fade in active">
									<!-- Single Review -->
									<div class="related_product" style="padding-bottom: 30px;">
										<div class="fb-comments" data-href="new-details.php?id=<?php echo $id ?>" data-width="100%" data-numposts="5">
										</div>
									</div>
								</div>
							</div>

						</div>
				<?php
					}
				}
				?>
			</div>

			<!-- _______________________ SIDEBAR ____________________ -->
		<?php 
		 include_once "new-details-right.php" ;
		 ?>

		</div>
	</div>
</section>
<?php
include_once "footer.php";
?>