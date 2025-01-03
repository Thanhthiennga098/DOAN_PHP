<?php
    spl_autoload_register(function($Class){
        include_once "controler/".$Class.".php";
    });
    $SanPham = new QuanLySanPham();
    $TheLoai = new QuanLyTheLoai();
    $ThuongHieu = new QuanLyThuongHieu();
    $KhachHang = new QuanLyKhachHang();
    $IDKhachHang = Session::get("IDKhachHang");
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
<!doctype html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thế Giới Dầu Thơm - Website báo cáo mã nguồn mở</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <base href="https://demo2.shopweb24h.top/">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/animation.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
        .dropdown-menu>li>a {
        font-size: 20px;
        }a#scrollUp{
            top: 83%!important;
        }
    </style>
</head>

<body>

<script lang="javascript">var __vnp = {code : 1585,key:'', secret : 'e658522a1b1f4a98191689f5546522b6'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//core.vchat.vn/code/tracking.js';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
    <div class="loading">loading</div>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="trang-chu.html"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="trang-chu.html">Trang Chủ</a></li>
                                        <?php
                                            $ShowLoaiSp = $TheLoai->ShowLoaiSP();
                                            if($ShowLoaiSp){
                                                while($RowLoaiSP = $ShowLoaiSp->fetch_assoc()){
                                                ?>
                                                    <li><a href="san-pham-theo-danh-muc/<?=$RowLoaiSP['IDTheLoai']?>/<?=makeUrl($RowLoaiSP['TenTheLoai'])?>.html"><?=$RowLoaiSP['TenTheLoai']?></a></li>
                                                <?php
                                                }
                                            }
                                        ?>
                                        <li class="drop"><a href="lien-he.html">Liên Hệ</a></li>
                                        <li class="drop"><a href="wishlist.html">Wishlist</a></li>
                                        <li>
                                            <a href="#" class="dropdown" data-toggle="dropdown">Tài Khoản</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="tai-khoan.html">Đăng Nhập</a></li>
                                                <li><a href="?dang-xuat=<?=$IDKhachHang?>">Đăng Xuất</a></li>
                                                <?php
                                                    if($IDKhachHang){
                                                    ?>
                                                    <li><a href="theo-doi-don-hang.html">Theo dõi đơn hàng</a></li>
                                                    <?php
                                                    }
                                                ?>  
                                            </ul> 
                                        </li>                                 
                                    </ul>
                                </nav> 
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                    <?php
                                        if(isset($_GET['dang-xuat'])){
                                            session_destroy();
                                            echo '<script>window.location = "trang-chu.html"</script>';
                                        }
                                    ?><meta h>
                                    <?php
                                        $IDKhachHang = Session::get("IDKhachHang");
                                        if($IDKhachHang){
                                        ?>
                                            <a href="?dang-xuat=<?=$IDKhachHang?>"><i class="fa fa-sign-out-alt"></i></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="tai-khoan.html"><i class="icon-user icons"></i></a>
                                        <?php
                                        }
                                    ?>
                                      
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <?php
                                            $ShowGioHang = $SanPham->ShowGioHang($IDKhachHang);
                                            // $Count = mysqli_num_rows($ShowGioHang);
                                            if($ShowGioHang){
                                                $Count = mysqli_num_rows($ShowGioHang);
                                                ?>
                                                    <a href="#" class="cart-menu"><span class="htc__qua"><?=$Count?></span></a>
                                                <?php
                                            }else{
                                            ?>
                                                <a href="#" class="cart-menu"><span class="htc__qua">0</span></a>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="tim-kiem-san-pham.html" method="POST">
                                    <input placeholder="Nhập sản phẩm cần tìm... " type="text" name="keywordsp">
                                    <button type="submit" name="timkiem"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <?php
                     error_reporting('all');
                        $ShowGioHang = $SanPham->ShowGioHang($IDKhachHang);
                        if($ShowGioHang){
                            $Total = 0;
                            while($RowGioHang = $ShowGioHang->fetch_assoc()){   
                                $TongTien = $RowGioHang['SoLuong'] * $RowGioHang['Gia'];  
                            ?>
                            <div class="shp__cart__wrap">
                                <div class="shp__single__product">
                                    <div class="shp__pro__thumb">
                                        <a href="#">
                                            <img src="images/products/<?=$RowGioHang['HinhAnh']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="product-details.html"><?=$RowGioHang['TenSanPham']?></a></h2>
                                        <span class="quantity">Số lượng : <?=$RowGioHang['SoLuong']?></span>
                                        <span class="shp__price"><?=number_format($RowGioHang['Gia'])?><sup>đ</sup></span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="#" class="checkgiohang" data-id="<?=$RowGioHang['IDGioHang']?>" data-toggle="modal" data-target="#myModal"><i class="zmdi zmdi-close"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                               $Total += $TongTien; 
                            }
                        }
                    ?>
                    <ul class="shoping__total">
                        <li class="subtotal">Thành tiền:</li>
                        <li class="total__price"><?php if($Total ==""){echo "0đ";}else{ echo number_format($Total);} ?><sup>đ</sup></li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="gio-hang.html">Xem Giỏ Hàng</a></li>
                        <li class="shp__checkout"><a href="thanh-toan-don-hang.html">Thanh toán đơn hàng</a></li>
                    </ul>
                    <!-- Trigger the modal with a button -->

                    <!-- Modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Bạn có chắc chắn muốn xóa hay không?</h4>
                                </div>
                                
                                <div class="modal-body">
                                    <div id="xoasuccess"></div>
                                    <form action="">
                                        <a href="" class="btn btn-danger xoagiohang" style="margin-left: 43%;background-color: #c43b68;padding:10px 20px ">&ensp; Xóa &ensp;</a>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end modal sanpham -->
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
<script src="dashboard/ajax/checkgiohang.js"></script>