
<section class="featured-product">
    <div class="container">
        <div class="theme_title center" style="padding-bottom:50px;">
            <h3>Sản phẩm</h3>
        </div>

        <div class="row filter-list clearfix" id="MixItUp717B05">
            <?php
            include_once "conn.php";
            $sql = "SELECT * FROM sanpham  LIMIT 8";
            $query = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $giagoc = number_format($row["giagoc"]);
                $masp = $row['masanpham'];
                $sql1 = "SELECT madanhmuccha FROM sanpham JOIN danhmuccon ON sanpham.madanhmuccon = danhmuccon.madanhmuccon WHERE masanpham='$masp'";
                $query1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_assoc($query1);

                ?>
                <!--Default Item-->
                <div class="col-md-3 col-sm-6 col-xs-12 default-item" style="display: inline-block;">
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
                                    <a href="product-details.php?msp=<?php echo $row["masanpham"]; ?>"><?php echo $row['tensanpham'] ?></a>
                                </h3>
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="price">
                                    <?php echo number_format($row['giakhuyenmai']) ?> VNĐ
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
            ?>
            <!--Default Item-->
        </div>
    </div>

</section>