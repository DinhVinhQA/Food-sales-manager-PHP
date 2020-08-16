<?php
session_start();
$_SESSION["page"]="checkout.php";
include_once 'conn.php';
include_once "header.php";
include_once "nav.php";
if (isset($_POST['thanhtoan'])) {
    $loaithanhtoan = $_POST['payment'];
    $_SESSION['loaithanhtoan'] = $loaithanhtoan;
    echo "<script>window.location.href='xacnhan.php'</script>";
    //header("location:xacnhan.php");
}
?>
<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs text-center">
                    <h1>Thanh toán</h1>
                    <h4>Cảm ơn bạn đã tin tưởng chúng tôi</h4>
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
                        <li>Thanh toán</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-7">
                    <p>Chúng tôi cung cấp <span>100% sản phẩm</span> hữu cơ</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout page content******************* -->

<!-- cart table*********************** -->
<div class="cart_table container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div id="listCart" style="padding-top: 50px;">
                <table class="table table-hover table-responsive table-bordered shadow mt-4" id="Cart">
                    <thead style="background: #7FB401; color:#fff">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $subTotal = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
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
                                        <div class="quantity quantity-item">
                                            <input type="number" onchange="updateCart(<?php echo $key ?>)" id="quantity_<?php echo $key ?>" name="quantity_<?php echo $key ?>" min="1" max="1000" step="1" value="<?php echo $value['num'] ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo number_format($total = ($value['price'] * $value['num']));
                                                $subTotal += $total;
                                                ?> VNĐ
                                    </td>
                                </tr>
                        <?php }
                        } else {
                            echo '<h4 style="color:red; padding : 10px 0">Bạn chưa mua hàng</h4>';
                        }  ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h4>Hóa đơn</h4>
            <div class="table-responsive">
                <table class="table table-2">
                    <tbody>
                        <tr>
                            <td style="background :#7FB401;color:#fff"><span>Tổng giá trị giỏ hàng</span></td>
                            <td><span><?php echo number_format($subTotal); ?> VNĐ</span></td>
                        </tr>
                        <tr>
                            <td style="background :#7FB401;color:#fff"><span>Phí vận chuyển</span></td>
                            <td><span>30,000 VNĐ</span></td>
                        </tr>
                        <tr>
                            <td style="background :#7FB401;color:#fff"><span>Tổng hóa đơn</span></td>
                            <td><span><?php echo number_format($subTotal + 30000); ?> VNĐ</span></td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- /table-responsive -->
            <h4>Chọn hình thức thanh toán</h4>
            <form action="checkout.php" method="post">
                <div class="payment_system">
                    <div class="pay1">
                        <input type="radio" name="payment" value="Thanh toán qua ngân hàng">
                        <span>Thanh toán qua ngân hàng</span>
                        <p>Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn hàng sẽ không được giao cho đến khi tiền được gửi.</p>
                    </div>
                    <div class="pay1">
                        <input type="radio" name="payment" value="Thanh toán bằng thẻ">
                        <span>Thanh toán bằng thẻ</span>
                    </div>
                    <div class="pay1">
                        <input type="radio" name="payment" value="Thanh toán qua Paypal">
                        <span>Thanh toán qua Paypal</span>
                        <img src="images/check-out/1.jpg" alt="image" class="float_right">
                    </div>
                    <div class="pay1">
                        <input type="radio" name="payment" value="Thanh toán khi giao hàng">
                        <span>Thanh toán khi giao hàng</span>
                        <img src="images/check-out/2.jpg" alt="image" class="float_right">
                    </div>
                    <div style=" padding-top: 30px;" class="pay1">
                        <button style="display: block; margin-left: auto;background-color: #7FB401;border-color: #7FB401;" name="thanhtoan" class="btn btn-success" type="submit">Xác nhận hóa đơn
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /cart_table -->
<?php
include_once "footer.php"
?>