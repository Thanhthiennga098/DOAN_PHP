<?php
    include_once "include/header.php";
?>
<?php
    $ID = Session::get("IDKhachHang");
    if(!$ID){
        echo '<meta http-equiv="refresh" content="1,tai-khoan.html">';
    }
?>

<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['tienhanhdathang'])){
        $TenKH = $_POST['TenKH'];
        $HoKH = $_POST['HoKH'];
        $TenCTy = $_POST['TenCTy'];
        $DiaChi = $_POST['DiaChi'];
        $ThanhPho = $_POST['ThanhPho'];
        $MaBuuDien = $_POST['MaBuuDien'];
        $Email = $_POST['Email'];
        $SoDienThoai = $_POST['SoDienThoai'];
        $NoiDung = $_POST['NoiDung'];
        $IDKhachHang;
        $IDSanPham = $_POST['IDSanPham'];
        $HinhAnh = $_POST['HinhAnh'];
        $TenSanPham = $_POST['TenSanPham'];
        $TongTien = $_POST['TongTien'];
        $SoLuong = $_POST['SoLuong'];
        $ThanhToanHoaDon = $SanPham->ThanhToanHoaDon($TenKH,$HoKH,$TenCTy,$DiaChi,$ThanhPho,$MaBuuDien,
        $Email,$SoDienThoai,$NoiDung,$IDKhachHang,$SoLuong);
    }
?>
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
                            <span class="breadcrumb-item active">Thanh toán đơn hàng</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<div><?php if(isset($ThanhToanHoaDon)){echo $ThanhToanHoaDon;} ?></div>
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                <form action="" method="post">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <div class="accordion__title">
                                        Thông tin thanh toán
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Tên của bạn (*)" name="TenKH" class="TenKH">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Họ của bạn (*)" name="HoKH">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Tên công ty (Tùy chọn)" name="TenCTy">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Địa chỉ (*)" name="DiaChi">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Tỉnh / Thành Phố (*)" name="ThanhPho">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Mã bưu điện (Tùy chọn)" name="MaBuuDien">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="email" placeholder="Email (*)" name="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Số điện thoại" name="SoDienThoai">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <textarea name="NoiDung" cols="30" rows="10" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="order-details">
                                <h5 class="order-details__title">Đơn Hàng Của Bạn</h5>
                                <div class="order-details__item">
                                <?php
                                    $ShowGioHang = $SanPham->ShowGioHang($IDKhachHang);
                                    if($ShowGioHang){
                                        $Total = 0;
                                        while($RowGioHang = $ShowGioHang->fetch_assoc()){
                                            $TongTien = $RowGioHang['SoLuong'] * $RowGioHang['Gia'];  
                                        ?>
                                        <form action="">
                                            <div class="single-item">
                                                <div class="single-item__thumb">
                                                    
                                                    <img src="images/products/<?=$RowGioHang['HinhAnh']?>" alt="ordered item">
                                                </div>
                                                <div class="single-item__content">
                                                    <a href="chi-tiet-san-pham/<?=$RowGioHang['IDSanPham']?>/<?=makeUrl($RowGioHang['TenSanPham'])?>.html" name="TenSanPham"><?=$RowGioHang['TenSanPham']?></a>
                                                    <span class="price">
                                                        <?=number_format($RowGioHang['Gia']);?><sup>đ</sup>
                                                    </span>
                                                </div>
                                                <div class="single-item__remove">
                                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                                </div>
                                            </div>
                                            <input type="hidden" names="SoLuong" value="<?=$RowGioHang['SoLuong']?>">
                                        </form>
                                        <?php
                                        $Total += $TongTien;
                                        }
                                    }
                                ?>    
                                </div>
                                <div class="order-details__count">
                                    <div class="order-details__count__single">
                                        <h5>Tạm Tính</h5>
                                        <span class="price"><?=number_format($Total);?><sup>đ</sup></span>
                                    </div>
                                    <div class="order-details__count__single">
                                        <h5>Thuế</h5>
                                        <span class="price">0.1%</span>
                                    </div>
                                </div>
                                <div class="ordre-details__total">
                                    <h5>Tổng Tiền</h5>
                                    <span class="price" name="TongTien">
                                    <?php
                                        $Vat = $Total * 0.1;
                                        $ThanhTien = $Total + $Vat;
                                        echo number_format($ThanhTien).'<sup>đ</sup>';
                                    ?>
                                    </span>
                                </div>
                                <ul class="payment__btn">
                                    <li class="active">
                                        <button type="submit" class="dathang" name="tienhanhdathang">Đặt hàng</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
<?php
    include_once "include/footer.php";
?>