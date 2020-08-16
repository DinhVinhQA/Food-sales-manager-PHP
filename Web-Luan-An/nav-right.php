<div class="wrapper">
    <div class="best_sellers clear_fix wow fadeInUp">
        <div class="theme_inner_title">
            <h4>Sản phẩm phổ biến</h4>
        </div>

        <?php
            $sql = "SELECT * FROM sanpham WHERE ghichu like 'Hot' LIMIT 4";
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

                    <span><?php echo number_format($row['giakhuyenmai'])  .'&nbsp;VNĐ' ?></span>
                </div>
                <!-- End of .text -->
            </div>
        <?php
        }
        ?>
    </div>


    <!-- End of .best_selling_item -->
</div>
<!-- End of .best_sellers -->

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