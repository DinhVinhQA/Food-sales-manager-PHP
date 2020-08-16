<?php
session_start();
$priceMin = 0;
$priceMax = 10000000;
$id = $_GET['id'];

if (isset($_POST['price'])) {
    $str = 'location:shop.php?id=' . $id . '&price=' . $_POST['priceMin'] . '-' . $_POST['priceMax'];
    header($str);
}
include_once "header.php";
include_once "nav.php";
include_once 'conn.php';


if (isset($_GET['price'])) {
    $strpr =  explode("-", $_GET['price']);
    $priceMin = $strpr[0];
    $priceMax = $strpr[1];
}
$result = mysqli_query($con, "SELECT count(masanpham) as total FROM sanpham WHERE madanhmuccon like '$id' AND (giakhuyenmai >= $priceMin AND giakhuyenmai <= $priceMax)");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
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
                    <h1>CỬA HÀNG CỦA CHÚNG TÔI</h1>
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
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li>Cửa hàng</li>
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

<!-- Shop Page Content************************ -->
<div class="shop_page featured-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12 col-sx-12">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM sanpham WHERE madanhmuccon like '$id' AND (giakhuyenmai >= $priceMin AND giakhuyenmai <= $priceMax)  LIMIT $start, $limit";
                    $query = mysqli_query($con, $sql);
                    if ($query == NULL)
                        echo '<h5 style="text-align: center; color:red;font-weight: bold;">Không tìm thấy sản phẩm</h5>';
                    else if ($query->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {

                            $giagoc = number_format($row["giagoc"]);
                            ?>
                            <!--Default Item-->
                            <div class="col-md-4 col-sm-6 col-xs-12 default-item" style="display: inline-block;">
                                <div class="inner-box">
                                    <div class="single-item center">
                                        <figure class="image-box">
                                            <img src="img/<?php echo $row['anh'] ?>" alt="">
                                            <?php if ($row["ghichu"] != null) {
                                                        echo ' <div class="product-model new">' . $row["ghichu"] . '</div>';
                                                    } ?>

                                        </figure>
                                        <div class="content">
                                            <h3>
                                                <a href="product-details.php?masp=<?php echo $row["masanpham"]; ?>"><?php echo $row['tensanpham'] ?></a>
                                            </h3>
                                            <div class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span></div>
                                            <div class="price">
                                                <?php echo number_format($row['giakhuyenmai']) . '&nbsp;VNĐ' ?>
                                                <?php
                                                        if ($row['giakhuyenmai'] != NULL && $row['giakhuyenmai'] != 0)
                                                            echo "<span class='prev-rate'><del>$giagoc VNĐ </del></span>";
                                                        ?>

                                            </div>
                                        </div>
                                        <div class="overlay-box">
                                            <div class="inner">
                                                <div class="top-content">
                                                    <ul>
                                                        <li class="tultip-op"><span class="tultip"><i class="fa fa-sort-desc"></i>Xem chi tiết</span>
                                                            <a href="product-details.php?msp=<?php echo $row["masanpham"]; ?>">
                                                                <span class="fa fa-eye"></span>
                                                            </a>
                                                        </li>
                                                        <li class="tultip-op"><span class="tultip"><i class="fa fa-sort-desc"></i>Thêm vào giỏ</span>
                                                            <a href="javascript:void(0)" class="btn-buy-now" onclick="addToCart(<?= $row['masanpham'] ?>)">
                                                                <span class="icon-icon-32846"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="bottom-content">
                                                    <h4>
                                                        <a href="#"><?php echo $row['thongtinsanpham'] ?>
                                                        </a>
                                                    </h4>
                                                    <p>
                                                        <?php echo $row['mota'] ?>
                                                    </p>
                                                </div>
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
                <!--Default Item-->
                <!-- _______________________ SIDEBAR ____________________ -->

                <ul class="page_pagination" style="padding-top: 40px;">
                    <li>
                        <?php
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<a href="shop.php?id=' . $id . '&price=' . $priceMin . '-' . $priceMax . '&&page=' . ($current_page - 1) . '" class="tran3s"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>';
                        }

                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                echo '<span style="background:#7FB401; padding: 18px 22px; color:#fff";>' . $i . '</span>  ';
                            } else {
                                echo '<a href="shop.php?id=' . $id . '&price=' . $priceMin . '-' . $priceMax . '&&page=' . $i . '">' . $i . '</a>  ';
                            }
                        }

                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<a href="shop.php?id=' . $id . '&price=' . $priceMin . '-' . $priceMax . '&&page=' . ($current_page + 1) . ' " class="tran3s"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>  ';
                        }
                        ?>
                    </li>
                </ul>

            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 sidebar_styleTwo">
                <div class="price_filter wow fadeInUp">
                    <div class="theme_inner_title">
                        <h4>Tìm kiếm theo giá</h4>
                    </div>
                    <div class="single-sidebar price-ranger">
                        <div class="ranger-min-max-block">
                            <div class="aa-sidebar-widget">
                                <div class="aa-sidebar-price-range">
                                    <form method="POST" id="aa-sidebar-price-range-form">
                                        <input type="number" name="priceMin" placeholder="Tối thiểu">
                                        <input type="number" name="priceMax" style=" margin-right: 5px;" placeholder="Tối đa">
                                        <input type="submit" name="price" value="Tìm kiếm">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /price-ranger -->
                </div>

                <?php include_once "nav-right.php" ?>
                <!-- End of .wrapper -->
            </div>
            <!-- End of .sidebar_styleTwo -->
            <!-- End of .row -->
        </div>
        <!-- End of .container -->
    </div>
    <!-- End of .shop_page -->
</div>
<?php
include_once "footer.php";
?>