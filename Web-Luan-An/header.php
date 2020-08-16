<?php
include_once "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Boxshop - Đồ án</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="images/fav-icon/favicon.png">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
    <div class="main_page">

        <div class="main_page">
            <!-- Header   -->
            <header>
                <div class="top_header">
                    <div class="container">
                        <div class="pull-left header_left">
                            <ul>
                                <li><a href="#">Số điện thoại: <span>054.3811.829</span></a></li>
                                <li><i class="fa fa-envelope-o s_color" aria-hidden="true"></i><a href="#">tansonstore@gmail.com</a></li>
                            </ul>
                        </div>

                        <div class="pull-right header_right  header__respon">
                            <div class="state" id="value1">
                                <ul class="header_right_sub">
                                    <li class="hide__respon">
                                        <i class="fa fa-truck s_color" aria-hidden="true"></i><a href="whishlist.php">Chính sách giao hàng</a>
                                    </li>
                                    <li><i class="fa fa-user s_color" aria-hidden="true"></i>
                                        <?php
                                        if (isset($_SESSION["login"])) : {
                                                echo '<a href="#">' . $_SESSION["login"] . ' </a>';
                                            } else : {
                                                echo '<a href="login.php">Đăng nhập </a>';
                                            }
                                        endif;
                                        ?>
                                    </li>

                                    <?php if (isset($_SESSION["login"])) : { ?>
                                            <li>
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> <a href="logout.php">Đăng xuất</a>
                                                <?php
                                                        include_once "conn.php";
                                                        $sql = "SELECT * FROM nguoidung";
                                                        $query = mysqli_query($con, $sql);
                                                        while ($row = mysqli_fetch_assoc($query)) {
                                                            ?>
                                                    <ul class="sub-menu">
                                                        <li><a href="infouser.php">Thông tin tài khoản</a></li>
                                                        <li><a href="repassword.php">Đổi mật khẩu</a></li>
                                                    </ul>
                                                <?php
                                                        }
                                                        ?>
                                            </li>
                                    <?php }
                                    endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- End of .container -->
                </div> <!-- End of .top_header -->

                <div class="bottom_header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 search-box search-lg">
                                <form action="search.php" method="GET" class="clearfix">
                                    <input type="text" name="search" placeholder="Tìm kiếm..." onkeyup="livesearch(this.value);">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                                <div id='result1' class="result_v"></div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-10 logo-responsive">
                                <div class="logo-area">
                                    <a href="index.php" class="pull-left logo"><img src="images/logo.png" alt="LOGO"></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 search-sm">
                                <div class="search-box">
                                    <form action="search.php" method="GET" class="clearfix">
                                        <input type="text" name="search" placeholder="Tìm kiếm..." onkeyup="livesearch(this.value);">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                    <div id='result' class="result_v" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-2 col-xs-2 pdt-14">
                                <div class="cart_option float_left">
                                    <?php
                                    $totalNumber = 0;
                                    $totalPrice = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $totalNumber += $value['num'];
                                            number_format($totalPrice += $value['num'] * $value['price']);
                                        }
                                    }
                                    ?>
                                    <a href="shop-cart.php" id="cart-shop">
                                        <button class="cart tran3s dropdown-toggle" id="cartDropdown">
                                            <i class="fa icon-icon-32846" aria-hidden="true">
                                            </i>
                                            <span id="numberCart" class="s_color_bg p_color">
                                                <?php echo $totalNumber; ?>
                                            </span>
                                        </button>
                                    </a>
                                    <div class="cart-info">
                                        <div>Giỏ hàng</div>
                                        <div class="doller" id="total">
                                            <?php echo number_format($totalPrice); ?> VNĐ
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of .bottom_header -->
            </header>