<?php include_once "include/header.php"; ?>
<?php
  if($_SERVER["REQUEST_METHOD"] =='POST' && isset($_POST['dangky'])){
    $TenTaiKhoan = $_POST['TenTaiKhoan'];
    $Email = $_POST['Email'];
    $ConfirmPass = $_POST['ConfirmPass'];
    $Password = $_POST['Password'];
    $DangKyTaiKhoan = $KhachHang->DangKyTaiKhoan($TenTaiKhoan,$Email,$Password,$ConfirmPass);
  }
?>
<?php
  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['dangnhap'])){
    $TenTaiKhoanKH = $_POST['TKKH'];
    $MatKhau = $_POST['MatKhau'];
    $DangNhap = $KhachHang->DangNhapTaiKhoan($TenTaiKhoanKH,$MatKhau);  
  }
?>
<style>
    * {
        box-sizing: border-box;
    }
    
    .taikhoan {
        padding-top: 50px
    }
    
    .padding-top {
        padding-bottom: 40px
    }
    
    .input-container {
        display: -ms-flexbox;
        /* IE10 */
        
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }
    
    .icon {
        padding: 10px;
        background: dodgerblue;
        color: white;
        min-width: 50px;
        text-align: center;
        line-height: 29px;
    }
    
    .input-field {
        width: 100%;
        padding: 10px;
        outline: none;
    }
    
    .input-field:focus {
        border: 2px solid dodgerblue;
    }
    /* Set a style for the submit button */
    
    .btn {
        background-color: dodgerblue;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    .btn:hover {
        opacity: 1;
    }
</style>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/GOkP8onbuyjGmN9Rc8Que5mw21CdSw6OuXpAKUuE6-4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="trang-chu.html">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Tài khoản</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<div>
  <?php if(isset($DangKyTaiKhoan)){echo $DangKyTaiKhoan;} ?>
  <?php if(isset($DangNhap)){echo $DangNhap;} ?>
</div>
<div class="taikhoan">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" style="max-width:500px;margin:auto" method="post">
                    <h2>Đăng nhập</h2>
                    <br>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Vui lòng nhập tài khoản (*)" name="TKKH">
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" placeholder="Nhập mật khẩu (*)" name="MatKhau">
                    </div>

                    <button type="submit" class="btn" name="dangnhap">Đăng Nhập</button>
                </form>

            </div>
            <div class="col-md-6">
                <form action="" style="max-width:500px;margin:auto" method="post">
                    <h2>Đăng Ký</h2>
                    <br>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Vui lòng nhập tài khoản (*)" name="TenTaiKhoan">
                    </div>

                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="text" placeholder="Vui lòng nhập email (*)" name="Email">
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" placeholder="Vui lòng nhập mật khẩu (*)" name="Password">
                    </div>

                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" type="password" placeholder="Vui lòng nhập lại mật khẩu (*)" name="ConfirmPass">
                    </div>

                    <button type="submit" class="btn" name="dangky">Đăng Ký</button>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="padding-top"></div>
<?php include_once "include/footer.php"; ?>