<?php
session_start();
include_once "header.php";
include_once "nav.php";
include_once "conn.php";
?>
<div class="account_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6" style="margin: 50px 0;">
                <div class="theme-title">
                    <h2>Đổi mật khẩu</h2>
                </div>
                <?php
                if (isset($_POST['save-pass'])) {
                    $email = $_SESSION['email'];
                    $passOdd = $_POST['pass-odd'];
                    $passNew = $_POST['pass-new'];
                    $rePass = $_POST['repass'];

                    $query = "SELECT matkhau FROM nguoidung WHERE email='$email' and matkhau = '$passOdd'";
                    $result = mysqli_query($con,$query);

                    if ($result->num_rows > 0) {
                        $sql = "UPDATE nguoidung SET matkhau = '$passNew' WHERE  email='$email'";
                        $result = mysqli_query($con, $sql);
                    }

                    if( $passOdd == null && $passNew == null && $rePass == null) {
                        echo "<script>alert('Vui lòng điền đầy đủ thông tin')</script>";
                    }
                     else if ($passOdd != null && $passNew == null && $rePass == null)  {
                        echo "<script>alert('Vui lòng điền nhập mật khẩu mới')</script>";
                    } else if ($passNew != $rePass) {
                        echo "<script>alert('Nhập lại mật khẩu mới không đúng')</script>";
                    } else {
                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                        echo "<script>window.location.href='logout.php'</script>";
                    }
                }
                ?>
                <form action="repassword.php" method="POST">
                    <div class="form_group">
                        <label>Mật khẩu cũ : </label>
                        <div class="input_group">
                            <input type="text" value="" name="pass-odd">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div> <!-- End of .input_group -->
                    </div> <!-- End of .form_group -->

                    <div class="form_group">
                        <label>Mật khẩu mới : </label>
                        <div class="input_group">
                            <input type="text" value="" name="pass-new">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div> <!-- End of .input_group -->
                    </div> <!-- End of .form_group -->

                    <div class="form_group">
                        <label>Nhập lại mật khẩu : </label>
                        <div class="input_group">
                            <input type="text" value="" name="repass">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div> <!-- End of .input_group -->
                    </div> <!-- End of .form_group -->
                    <div style="display: flex">
                        <button type="submit" name="save-pass" class="btn btn-primary btn-update">Lưu mật khẩu</button>
                        <button type="button" name="update" class="btn btn-primary btn-close btn-update" style="color:#Fff">Kết thúc</button>
                    </div>
                </form>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
?>