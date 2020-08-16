<?php
session_start();
include_once "conn.php";
$result = mysqli_query($con, "SELECT count(matintuc) as total FROM tintuc");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
	$current_page = $total_page;
} else if ($current_page < 1) {
	$current_page = 1;
}
$start = ($current_page - 1) * $limit;
?>
<?php

include_once "header.php";
include_once "nav.php";
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
						<li>Tin tức</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp <span>100% sản phẩn</span> hữu cơ</p>
				</div>
			</div>
		</div>
	</div>

</section>

<section class="news single_news_page with_sidebar">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<div class="row">
					<?php
					$query = "SELECT * FROM tintuc LIMIT $start,$limit";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$matin = $row['matintuc'];
							$tentin = $row['tentintuc'];
							$noidung = $row['noidung'];
							$anh = $row['hinhanh'];
							$mota = substr($noidung, 0, 500);
							?>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="blogList_single_post clear_fix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
									<div class="img_holder">
										<img style="height: auto;" src="<?php echo $anh  ?>" alt="News" class="img-responsive">
										<div class="opacity tran3s">
											<div class="icon">
												<span><a href="new-details.php?id=<?php echo $matin  ?>" class="border_round">+</a></span>
											</div> <!-- End of .icon -->
										</div> <!-- End of .opacity -->
									</div> <!-- End of .img_holder -->
									<div class="post">

										<div class="text">
											<h4><a href="new-details.php?id=<?php echo $matin  ?>"><?php echo $tentin ?></a></h4>
											<p><?php echo $mota ?>.....</p>
											<div class="link float_left"><a href="new-details.php?id=<?php echo $matin  ?>" class="tran3s color1_bg">Xem thêm</a></div>
											<div class="share_box float_right">
												<ul class="share-content">
													<li><a href="http://www.facebook.com/sharer.php?u=https://www.facebook.com/onekalo" class="tran3s popup-share" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
													<li><a href="http://twitter.com/share?url=https://twitter.com/Jubayer_alhasan&amp;text=@Jubayer_alhasan" class="tran3s popup-share" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
													<li><a href="https://plus.google.com/share?url=https://plus.google.com/u/0/105261123196798323015" class="tran3s popup-share" title="Goolge-Plus" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
												</ul>
												<button class="tran3s share" title="Share This Post"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
											</div>

										</div>

									</div> <!-- End of .post -->
								</div>

							</div>
					<?php
						}
					}
					?>
				</div>
				<ul class="page_pagination">
					<?php
					if ($current_page > 1 && $total_page > 1) {
						echo '<li><a class="tran3s" href="news.php?page=' . ($current_page - 1) . '" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a> </li>';
					}
					for ($i = 1; $i <= $total_page; $i++) {
						if ($i == $current_page) {
							echo '<li><span class="active tran3s">' . $i . '</span> </li>';
						} else {
							echo '<li><a class="tran3s" href="news.php?page=' . ($current_page - 1) . '">' . $i . '</a></li> ';
						}
					}
					if ($current_page < $total_page && $total_page > 1) {
						echo '<li><a class="tran3s" href="news.php?page=' . ($current_page - 1) . '"> <i class="fa fa-long-arrow-right" aria-hidden="true"> </a></li> ';
					}

					?>
				</ul>
			</div>

			<!-- _______________________ SIDEBAR ____________________ -->
			<?php
			include_once "new-details-right.php";
			?>

		</div>
	</div>
</section>
<?php

include_once "footer.php";
?>