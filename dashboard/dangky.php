<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../controler/AdminNhanVien.php";
    $AdminNV = new AdminNhanVien();
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['dangky'])){
        $DangKyNV = $AdminNV->DangKyNV($_POST,$_FILES);
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
    <title>Trang đăng ký quản lý bán hàng website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="thuvien/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="../css/animation.css" rel='stylesheet' type='text/css' />
    <script src="../css/js.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                <h2>Đăng ký</h2>
                <div id="success"><?php if(isset($DangKyNV)){echo $DangKyNV;} ?></div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="username">
                        <span class="username">Tên của bạn:</span>
                        <input type="text" name="name" class="name" placeholder="Nhập tên của bạn...">
                        <div class="clearfix"></div>
                    </div>
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
                    <div class="password-agileits">
                        <span class="username">Nhập lại mật khẩu :</span>
                        <input type="password" name="confirm_password" class="password" placeholder="Nhập lại mật khẩu của bạn...">
                        <div class="clearfix"></div>
                    </div>
                    <div class="file">
                        <span class="avatar">Chọn ảnh đại diện</span>
                        <input type="file" name="avatar" class="file">
                        <div class="clearfix"></div>
                    </div>
                    <div class="login-w3">
                        <input type="submit" class="login" value="Đăng Ký" name="dangky">
                    </div>
                    <div class="clearfix"></div>
                </form>
                <div class="footer">
                    <p>&copy; 2020 Sản phẩm được quản lý bởi LinhHuynh | Design</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>