<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../controler/AdminNhanVien.php";
    $DangNhap = new AdminNhanVien();
    include_once $filepath."/../database/session.php";
    Session::checkLogin();
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $DangNhapNV = $DangNhap->DangNhapNV($email,$password);
    }
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Trang đăng nhập quản lý bán hàng website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- Bootstrap Core CSS -->
    <link href="thuvien/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="../css/animation.css" rel='stylesheet' type='text/css' />
    <script src="../css/js.js"></script>
    <!-- Custom CSS -->
    <link href="thuvien/css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="loading">Loading&#8230;</div>
    <div class="main-wthree">
        <div class="container">
            <div class="sin-w3-agile">
                <h2>Đăng Nhập</h2>
                <div><?php if(isset($DangNhapNV)){echo $DangNhapNV;} ?></div>
                <form method="POST">
                    <div class="username">
                        <span class="username">Email :</span>
                        <input type="text" name="email" class="name" placeholder="explore@gmail.com">
                        <div class="clearfix"></div>
                    </div>
                    <div class="password-agileits">
                        <span class="username">Mật khẩu :</span>
                        <input type="password" name="password" class="password" placeholder="Nhập mật khẩu của bạn...">
                        <div class="clearfix"></div>
                    </div>
                    <div class="login-w3">
                        <input type="submit" class="login" value="Đăng Nhập" name="dangnhap">
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="footer">
            <p>&copy; 2024 Sản phẩm được quản lý bởi TienThanh | Design</p>
        </div>
    </div>
</body>

</html>