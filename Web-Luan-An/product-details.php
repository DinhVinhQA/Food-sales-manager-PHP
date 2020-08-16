<?php
session_start();
include_once "header.php";
include_once "nav.php";
include_once "conn.php";
$msp = $_GET['msp'];
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs text-center">
                    <h1>Chi tiết sản phẩm</h1>
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
                        <li>
                            <a href="#">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li>Chi tiết sản phẩm</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-7">
                    <p>Chúng tôi cung cấp<span> 100% </span>sản phẩm hữu cơ</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single Shop page content ________________ -->
<div class="shop_single_page">
    <div class="container">
        <div class="row">
            <!-- _______________________ SIDEBAR ____________________ -->
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 sidebar_styleTwo">
                <form method="POST">
                    <div class="wrapper">
                        <div class="sidebar_search">
                            <input type="text" name="searchKey">
                            <button type="submit" class="tran3s color1_bg">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                </form>
            </div>
            <!-- End of .sidebar_categories -->
            <div class="best_sellers clear_fix wow fadeInUp">
                <div class="theme_inner_title">
                    <h4>Sản phẩm phổ biến</h4>
                </div>
                <?php
                if (isset($_POST['searchKey'])) {
                    $searchKey = $_POST['searchKey'];
                    $sql = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$searchKey%' ";
                } else {
                    $sql = "SELECT * FROM sanpham LIMIT 5";
                    $searchKey = "";
                }
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="best_selling_item clear_fix border">
                        <div class="img_holder float_left img-padding">
                            <a href="product-details.php?msp=<?php echo $row["masanpham"]; ?>">
                                <img src="img/<?php echo $row['anh'] ?>" alt="image">
                            </a>
                        </div>
                        <!-- End of .img_holder -->
                        <div class="text float_left">
                            <a href="product-details.php?msp=<?php echo $row["masanpham"]; ?>">
                                <h6><?php echo $row['tensanpham'] ?></h6>
                            </a>
                            <ul>
                                <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                            </ul>
                            <span><?php echo number_format($row['giakhuyenmai']) ?>&nbsp;VNĐ</span>
                        </div>
                        <!-- End of .text -->
                    </div>
                <?php
                }
                ?>
                <!-- End of .best_selling_item -->
            </div>
            <!-- End of .best_sellers -->
        </div>
        <!-- End of .wrapper -->
    </div>
    <!-- End of .sidebar_styleTwo -->
    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 product_details">
        <?php
        $sql = "SELECT masanpham,tensanpham,anh,mota,giagoc,giakhuyenmai,thongtinsanpham,ghichu,madanhmuccon FROM sanpham where masanpham like '$msp' ";
        $query = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_assoc($query)) {
            ?>
            <div class="wrapper">
                <div class="product_top_section clear_fix">
                    <div class="img_holder float_left">
                        <a href="product-details.php?msp=<?php echo $row["masanpham"]; ?>">
                            <img src="img/<?php echo $row['anh'] ?>" alt="img" class="img_lg img-responsive">
                        </a>
                    </div>
                    <!-- End of .img_holder -->
                    <div class="item_description float_left">
                        <h4><?php echo $row['tensanpham'] ?></h4>
                        <ul>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                        </ul>
                        <span class="item_price"><?php echo number_format($row['giakhuyenmai']) ?>&nbsp;VNĐ</span>
                        <p><?php echo $row['mota'] ?></p>
                        <span class="check_location">Kiểm tra tùy chọn giao hàng tại địa điểm của bạn:</span>
                        <div class="clear_fix">
                            <input type="text" class="float_left" placeholder="Pincode">
                            <button class="float_left tran3s">Kiểm tra</button>
                            <span class="float_left color1">Dự kiến giao hàng trong 4-5 ngày</span>
                        </div>
                        <div class="item__details d-flex">
                            <div class="quantity quantity-item">
                                <input type="number" class="number__details" id="num" name="num" max="1000" step="1" value="1">
                            </div>
                            <button type="button" class="item__btn" onclick="addCart(<?= $row['masanpham'] ?>)">Thêm vào giỏ</button>
                        </div>
                    </div>
                    <!-- End of .item_description -->
                </div>
                <!-- End of .product_top_section -->

                <!-- __________________ Product review ___________________ -->
                <div class="product-review-tab">
                    <ul class="nav nav-pills">
                        <li>
                            <a data-toggle="pill" href="#tab1">Mô tả</a>
                        </li>
                        <li class="active">
                            <a data-toggle="pill" href="#tab2">Bình luận</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade">
                            <p>Thực phẩm bẩn đang là một vấn nạn, đe dọa đến cuộc sống của chúng ta. Hiện nay có rất nhiều người vì mục đích mưu sinh, lợi ích của cá nhân mà đã tạo ra những thức ăn, thức uống bẩn, độc hại làm ảnh hưởng đến sức khỏe của cộng đồng. Điều này đang được lên án rất mạnh mẽ ở nước ta. Và bài viết này vforum sẽ gửi đến các bạn Những câu nói hay, bài thơ hay về An toàn thực phẩm ý nghĩa? Sau đây hãy cùng vforum tìm hiểu nhé.</p>
                            <p style="margin-top:10px">Môi trường cũng là một trong những yếu tố quyết định tới vệ sinh, an toàn thực phẩm. Để có được thức ăn, đồ uống đảm bảo an toàn thực phẩm thì môi trường xanh, sạch, đẹp là bước đẩy để tạo nên thực phẩm chất lượng
                                .</p>

                        </div>
                        <!-- End of #tab1 -->

                        <div id="tab2" class="tab-pane fade in active">
                            <!-- Single Review -->
                            <div class="related_product" style="padding-bottom: 30px;">
                                <div class="fb-comments" data-href="product-details.php?msp=<?php echo $msp ?>" data-width="100%" data-numposts="5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of #tab2 -->
                </div>
                <!-- End of .tab-content -->
            </div>
            <!-- End of .product-review-tab -->
        <?php
        }
        ?>
    </div>
    <!-- End of .col -->
</div>
<!-- End of .row -->
</div>
<!-- End of .container -->
</div>

<?php
include_once "footer.php";
?>