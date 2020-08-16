<div class="theme_menu color1_bg">
    <div class="container">
        <nav class="menuzord pull-left" id="main_menu">
            <ul class="menuzord-menu">
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <li>
                    <a href="about-us.php">Giới thiệu</a>
                </li>
                <li>
                    <a href="all-product.php">Cửa hàng</a>
                    <ul class="dropdown">
                        <?php
                        include_once "conn.php";
                        $sql = "SELECT * FROM danhmuccha";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $mc = $row['madanhmuccha'];
                            ?>
                            <li>
                                <a href="shop-parent.php?id=<?php echo $mc ?>" class="text-capitalize"><?php echo $row['tendanhmuccha'] ?></a>
                                <ul class="dropdown">
                                    <?php
                                        $sql1 = "SELECT * FROM danhmuccon WHERE danhmuccon.madanhmuccha ='$mc'";
                                        $res1 = mysqli_query($con, $sql1);
                                        while ($row1 = mysqli_fetch_assoc($res1)) {
                                            ?>
                                        <li>
                                            <a href="shop.php?id=<?php echo $row1['madanhmuccon'] ?>" class="text-capitalize"><?php echo $row1['tendanhmuccon'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?> 
                    </ul>
                </li>
                <li>
                    <a href="list-new.php" class="text-capitalize">Tin tức</a>
                    <ul class="dropdown">
                        <li>
                            <a href="list-new.php" class="text-capitalize">tin tức</a>
                        </li>
                        <li>
                            <a href="support.php" class="text-capitalize">Tư vấn</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="gallery-details.php" class="text-capitalize">Hình ảnh</a>
                </li>

                <li>
                    <a href="contact.php" class="text-capitalize">Liên hệ</a>
                </li>
            </ul>
            <!-- End of .menuzord-menu -->
        </nav>
        <!-- End of #main_menu -->

        <!-- ****** Cart And Search Option ******* -->
        <div class="nav_side_content pull-right">
            <ul class="icon_header">
                <li class="border_round tran3s">
                    <a href="https://www.facebook.com/BoxShop-112914186810732/?modal=admin_todo_tour">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="border_round tran3s">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="border_round tran3s">
                    <a href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
                <li class="border_round tran3s">
                    <a href="#">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End of .nav_side_content -->
    </div>
    <!-- End of .container -->
</div>
<!-- End of .theme_menu -->