<?php
session_start();
$_SESSION["page"]="shop-cart.php";
include_once "conn.php";
include_once "header.php";
include_once "nav.php";
?>
<div class="main_page cart">
    <section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs text-center">
                        <h1>Giỏ hàng của bạn</h1>
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
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-7">
                        <p>Chúng tôi cung cấp<span> 100% </span>sản phẩm hữu cơ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="listCart" style="padding-top: 50px;">
                    <table class="table table-hover table-responsive table-bordered shadow mt-4" id="Cart">
                        <thead style="background: #7FB401; color:#fff">
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$total = 0;
							$subTotal = 0;
							$sumproduct=0;
							if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $key => $value) {
									$sumproduct += $value["num"];
									?>
                            <tr>
                                <td style="padding-left: 15px;">
                                    <div class="img__center">
                                        <img class="img-product" src="img/<?php echo $value['image'] ?>">
                                    </div>
                                </td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo number_format($value['price']) ?> VNĐ</td>
                                <td>
                                    <div class="quantity">
                                        <input type="number" onchange="updateCart(<?php echo $key ?>)" id="quantity_<?php echo $key ?>" name="quantity_<?php echo $key ?>" min="1" max="1000" step="1" value="<?php echo $value['num'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <?php echo number_format($total = ($value['price'] * $value['num']));
													$subTotal += $total;
													?> VNĐ
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="delete-cart" onclick="deleteCart(<?php echo $key ?>);">
                                        <i class="fa fa-trash-o" aria-hidden="true" style="color:red"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php }
							$_SESSION["tongsp"]=$sumproduct;
							$_SESSION["thanhtien"]=$subTotal;
						
							} else {
								echo '<h4 style="color:red; padding : 10px 0">Bạn chưa mua hàng</h4>';
							}  ?>
                            <tr>
                                <td colspan="3" style="text-align:left !important">
                                    <a href="all-product.php" class="btn color1_bg tran3s ml-0" style="color:#fff">Tiếp tục mua hàng</a>
                                    <a href="checkout.php" class="btn color1_bg tran3s ml-3 pay-price" style="color:#fff">Thanh toán</a>
                                </td>
                                <td colspan="3"><span class="total__size">Tổng cộng :</span> <span class="total__size" style="color: #7FB401;"><?php echo number_format($subTotal); ?> VNĐ</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
	include_once "footer.php";
	?>