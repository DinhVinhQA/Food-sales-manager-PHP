<?php
session_start();
include_once "conn.php";
$info = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM nguoidung WHERE email='$email' AND matkhau='$password' LIMIT 1 ";
    $result = $con->query($sql);
    $password = md5($password);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row['email']=="admin@gmail.com")
            {
                 header("location: admin/nguoiquantri/index.php");
                 die;
            }
            else{
                $info = $row["tennguoidung"];
                
            }
           
        }
        $_SESSION['login'] = $info;
        $_SESSION['email'] = $email;
        $page= $_SESSION['page'];
        header("location:".$page."");
    } else {
     $info="Sai thông tin mật khẩu hoặc gmail";
 }
}
include_once "header.php";
include_once "nav.php";
?>

<section class="breadcrumb-area" style="background-image:url(images/background/2.jpg);">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs text-center">
                    <h1>Đăng nhập</h1>
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
                        <li>Đăng nhập/Đăng Ký</li>
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

<!-- Account Page Content*********************** -->
<div class="account_page">
    <div class="container">
        <div class="login_form login__respon" style="width: 50%; margin-left: auto; margin-right: auto;">
            <div class="theme-title" style="text-align: center;">
                <h2>Đăng nhập ngay bây giờ</h2>
            </div>
            <form action="login.php" method="POST">
                <div class="form_group">
                    <label>Tên tài khoản hoặc Email</label>
                    <div class="input_group">
                        <input type="text" name="email" placeholder="iamsteelthemes@gmail.com">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <!-- End of .input_group -->
                </div>
                <!-- End of .form_group -->
                <div class="form_group">
                    <label>Mật khẩu</label>
                    <div class="input_group">
                        <input type="password" name="password" placeholder="********">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <!-- End of .input_group -->
                </div>
                <!-- End of .form_group -->
                <div class="clear_fix">
                    <!-- End .single_checkbox -->
                  
                </div>
                  <?php if($info!=null){
                    echo '
                   <div style="margin-bottom: 0px" class="alert alert-danger">
                    <strong>Lỗi!</strong> '.$info.'
                    </div>
                    ';
                }  ?>   
                <button style="margin-top: 0px" type="submit" name="submit" class="color1_bg tran3s">Đăng nhập ngay</button>
              
                <button class="color1_bg tran3s"><a href="register.php" style="display: block;height: 34px;color: #fff;line-height: 26px;">Đăng ký</a></button>
            </form>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>