<div class="col-md-3 col-sm-4 col-xs-12 sidebar_styleTwo">
				<div class="wrapper">
					<div class="sidebar_search">
						<form action="#" method="POST">
							<input type="text" name="searchKey" placeholder="Tìm kiếm...">
							<button class="tran3s color1_bg"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form>
					</div> <!-- End of .sidebar_styleOne -->

					<div class="popular_news">
						<div class="theme_inner_title">
							<h4>Tin tức phổ biến</h4>
						</div>

						<div class="recent-posts">
                            <?php
                                if(isset($_POST['searchKey'])) {
                                    $searchKey = $_POST['searchKey'];
                                    $sql = "SELECT * FROM tintuc WHERE tentintuc LIKE '%$searchKey%'";
                                }
                                else {
                                    $sql = "SELECT * FROM tintuc LIMIT 4";
                                    $searchKey ="";
                                }	
                            $query = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_assoc($query)) {
                                $matin = $row['matintuc'];
								?>
								<div class="post">
									<div class="post-thumb"><a href="new-details.php?id=<?php echo $matin  ?>"><img src="<?php echo $row['hinhanh'] ?>" alt=""></a></div>
									<h4><a href="new-details.php?id=<?php echo $matin  ?>"><?php echo $row['tentintuc'] ?></a></h4>
									<div class="post-info"><i class="fa fa-clock-o"></i><?php echo $row['ngaydang'] ?></div>
								</div>
							<?php
							}
							?>
						</div>
					</div>

					<div class="single-sidebar">
						<div class="theme_inner_title">
							<h4>Instagram Ảnh</h4>
						</div>
						<ul class="instagram-feed">
							<?php
							$sql = "SELECT * FROM tintuc LIMIT 8";
							$query = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_assoc($query)) {
                                $matin = $row['matintuc'];
								?>
								<li>
									<div class="img-holder">
										<img src="<?php echo $row['hinhanh'] ?>" alt="Awesome Image">
										<div class="overlay">
											<div class="icon-holder">
												<a href="new-details.php?id=<?php echo $matin  ?>"><span class="icon-link2"></span></a>
											</div>
										</div>
									</div>
								</li>
							<?php
							}
							?>
						</ul>
					</div>


					<div class="sidebar_tags wow fadeInUp">
						<div class="theme_inner_title">
							<h4>Thẻ sản phẩm</h4>
						</div>

						<ul>
							<li>
								<a href="shop.php?id=LA00" class="tran3s">Lá</a>
							</li>
							<li>
								<a href="shop.php?id=TR00" class="tran3s">Trái</a>
							</li>
							<li>
								<a href="shop.php?id=HA00" class="tran3s">Hạt</a>
							</li>
							<li>
								<a href="shop.php?id=CU00" class="tran3s">Củ</a>
							</li>
							<li>
								<a href="shop.php?id=GIAM00" class="tran3s">Giấm</a>
							</li>
							<li>
								<a href="shop.php?id=MAM00" class="tran3s">Mắm</a>
							</li>

						</ul>
					</div>
				</div> <!-- End of .wrapper -->
			</div> <!-- End of .sidebar_styleTwo -->