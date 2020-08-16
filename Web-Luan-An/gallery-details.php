<?php
session_start();
$_SESSION["page"]="gallery-details.php";
include_once "header.php";
include_once "nav.php";
include_once "conn.php";

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
	$start = ($current_page - 1) * $limit;
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs text-center">
					<h1>Hình ảnh</h1>
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
						<li><a href="indext.php">Trang chủ</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						<li>Hình ảnh</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-7 col-sm-7">
					<p>Chúng tôi cung cấp
						<span>100%</span>
						sản phẩm hữu cơ
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--gallery Section-->
<section class="gallery gallery-grid">
	<div class="container">

		<!--Filter-->
		<div class="filters text-center">
			<ul class="filter-tabs filter-btns clearfix">
				<li class="filter active" data-role="button" data-filter="*"><span class="txt">Tất cả</span></li>
				<li class="filter" data-role="button" data-filter=".TV00"><span class="txt">Thực Vật</span></li>
				<li class="filter" data-role="button" data-filter=".DV00"><span class="txt">Động vật</span></li>
				<li class="filter" data-role="button" data-filter=".VS00"><span class="txt">Men vi sinh</span></li>
				<li class="filter" data-role="button" data-filter=".VC00"><span class="txt">Vô cơ</span></li>

			</ul>
		</div>

		<div class="row filter-list clearfix">
			<?php
			$sql = "SELECT * FROM sanpham LIMIT $start, $limit";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$masp = $row['masanpham'];
				$sql1 = "SELECT madanhmuccha FROM sanpham JOIN danhmuccon ON sanpham.madanhmuccon = danhmuccon.madanhmuccon WHERE masanpham='$masp'";
				$query1 = mysqli_query($con, $sql1);
				$row1 = mysqli_fetch_assoc($query1);
				?>
				<!--Default Item-->
				<div class="col-md-3 col-sm-6 col-xs-12 mix mix_all default-item <?php echo $row1['madanhmuccha']?>" style="display: inline-block;">
					<div class="inner-box">
						<div class="single-item center">
							<figure class="image-box" style="border: 3px solid #7FB401;background: transparent;"><img style="width: 60%;" src="img/<?php echo $row['anh'] ?>" alt=""></figure>
							<div class="overlay-box">
								<div class="inner">
									<div class="image-view">
										<div class="icon-holder">
											<a href="img/<?php echo $row['anh'] ?>" class="fancybox"><span class="icon-magnifier"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Default Item-->
			<?php
			}
			?>
		</div>

		<ul class="page_pagination" style="padding-top: 40px;">
			<li>
				<?php
				if ($current_page > 1 && $total_page > 1) {
					echo '<a href="gallery-details.php?page=' . ($current_page - 1) . '"class="tran3s"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>';
				}

				for ($i = 1; $i <= $total_page; $i++) {
					if ($i == $current_page) {
						echo '<span style="background:#7FB401; padding: 18px 22px; color:#fff";>' . $i . '</span>  ';
					} else {
						echo '<a href="gallery-details.php?page=' . $i . '">' . $i . '</a>  ';
					}
				}

				if ($current_page < $total_page && $total_page > 1) {
					echo '<a href="gallery-details.php?page=' . ($current_page + 1) . ' "  class="tran3s"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>  ';
				}
				?>
			</li>
		</ul>
	</div>

</section><!-- End of section -->
<?php
include_once "footer.php";
?>