<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../../controler/AdminNhanVien.php";
    include_once $filepath."../../controler/QuanLyTheLoai.php";
    include_once $filepath."../../controler/QuanLyThuongHieu.php";
    include_once $filepath."../../controler/QuanLySanPham.php";
    include_once $filepath."../../controler/QuanLyKhachHang.php";
    $Check = new AdminNhanVien();
    $Checkkhachang = new QuanLyKhachHang();
    $TheLoai = new QuanLyTheLoai();
    $ThuongHieu = new QuanLyThuongHieu();
    $SanPham = new QuanLySanPham();
    include_once $filepath."/../database/session.php";
    Session::checkSession();
?>
<?php
    function makeUrl($str){
        $str = trim($str);
        $str = str_replace(" ","-",$str);
        $str = str_replace("+", "-",$str);
        $str = str_replace("(", "-",$str);
        $str = str_replace(")", "-",$str);
        $str = str_replace("/", "-",$str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Trang quản lý bán hàng laptop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="laptop" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <base href="https://demo2.shopweb24h.top/dashboard/">
    <!-- Bootstrap Core CSS -->
    <link href="thuvien/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="thuvien/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="thuvien/css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="thuvien/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="thuvien/js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <!-- <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="thuvien/css/icon-font.min.css" type='text/css' />
    <link href="../css/animation.css" rel='stylesheet' type='text/css' />
    <script src="../css/js.js"></script>
    <!-- tables -->
    <link rel="stylesheet" type="text/css" href="thuvien/css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="thuvien/css/basictable.css" />
    <script type="text/javascript" src="thuvien/js/jquery.basictable.min.js"></script>

</head>

<body>
<div class="loading">Loading&#8230;</div>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main">
                    <div class="profile_details w3l">
                        <ul>
                            <?php
                                $IDNhanVien = Session::get("IDNhanVien");
                                $ShowNhanVien = $Check->ShowNhanVien($IDNhanVien);
                                if($ShowNhanVien){
                                    while($RowNhanVien = $ShowNhanVien->fetch_assoc()){
                                    ?>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">
                                                <span class="prfil-img"><img src="../images/<?=$RowNhanVien['AnhDaiDien']?>" alt=""> </span>
                                                <div class="user-name">
                                                    <p>Thông tin</p>
                                                    <span><?=$RowNhanVien['TenNhanVien']?></span>
                                                </div>
                                                <i class="fa fa-angle-down"></i>
                                                <i class="fa fa-angle-up"></i>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="#"><i class="fa fa-cog"></i> Cài đặt</a> </li>
                                            <li> <a href="#"><i class="fa fa-user"></i> Thông tin</a> </li>
                                            <?php
                                                if(isset($_GET['logout'])){
                                                    Session::destroy();
                                                }
                                            ?>
                                            <li> <a href="?logout=<?=$IDNhanVien?>"><i class="fa fa-sign-out"></i> Đăng xuất</a> </li>
                                        </ul>
                                    </li>
                                    <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!--heder end here-->