
<?php 
	include_once "conn.php";
?>
<section class="news">
	<div class="container">
		<div class="theme_title center">
			<h3>Thông tin bổ ích</h3>
		</div>
		<div class="row">
			<?php 
			$query = "SELECT * FROM tintuc LIMIT 3";
			$result = $con->query($query);
			if($result->num_rows>0){
				while($row = $result->fetch_assoc())
				{
					$matin = $row['matintuc'];
					$tentin = $row['tentintuc'];
					$mota = $row['mota'];
					$anh = $row['hinhanh'];
					?>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="blogList_single_post clear_fix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
							<div class="img_holder">
								<img style="height:245px" src="<?php echo $anh  ?>" alt="News" class="img-responsive">
								<div class="opacity tran3s">
									<div class="icon">
										<span><a href="new-details.php?id=<?php echo $matin  ?>" class="border_round">+</a></span>
									</div> <!-- End of .icon -->
								</div> <!-- End of .opacity -->
							</div> <!-- End of .img_holder -->
							<div class="post">

								<div class="text">
									<h4><a href="new-details.php?id=<?php echo $matin  ?>"><?php echo $tentin ?></a></h4>
									<p><?php echo $mota ?>....</p>
									<div class="link"><a href="new-details.php?id=<?php echo $matin  ?>" class="tran3s">Xem thêm<span class="fa fa-sort-desc"></span></a></div>

								</div>

							</div> <!-- End of .post -->
						</div>

					</div>
					<?php     
				}
			}
			?>
		</div>
	</div>
</section>