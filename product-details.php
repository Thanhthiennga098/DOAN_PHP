<?php
    include_once "include/header.php";
?>
<?php
    if(isset($_GET['id'])){
        $Id = $_GET['id'];
        $ShowChiTietSanPham = $SanPham->ShowChiTietSanPham($Id);
        $SanPhamXemNhieu = $SanPham->SanPhamXemNhieu($Id);
    }else{
        echo '<meta http-equiv="refresh" content="0,404.html">';
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['ThemVaoGioHang'])){
        $IDSanPham = $_POST['IDSanPham'];
        $SoLuong = $_POST['SoLuong'];
        $ThemSPVaoGioHang = $SanPham->GioHangSanPham($IDSanPham,$SoLuong,$IDKhachHang);
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['Wishlist'])){
        $IDSanPham = $_POST['IDSanPham'];
        $ThemWishlist = $SanPham->ThemWishlist($IDSanPham);
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
                            <a class="breadcrumb-item" href="product-grid.html">Sản Phẩm</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<div id="check"><?php if(isset($ThemSPVaoGioHang)){echo $ThemSPVaoGioHang;} 
if(isset($ThemWishlist)){echo $ThemWishlist;}  ?></div>
<section class="htc__product__details bg__white ptb--100">

    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            
            <?php
                if($ShowChiTietSanPham){
                    while($RowChiTietSanPham = $ShowChiTietSanPham->fetch_assoc()){
                        $IDThuongHieu = $RowChiTietSanPham['IDThuongHieu'];
                    ?>
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="images/products/<?=$RowChiTietSanPham['AnhDaiDien']?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?=$RowChiTietSanPham['TenSanPham']?></h2>
                                <h6>Model: <span><?=$RowChiTietSanPham['MaSanPham']?></span></h6>
                                <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul>
                                <ul  class="pro__prize">
                                    <li>
                                        <?php
                                            if($RowChiTietSanPham['GiaKhuyenMai'] == 0){
                                            ?>
                                                <span><?=number_format($RowChiTietSanPham['GiaBan'])?></span> <sup>đ</sup>
                                            <?php
                                            }else{
                                                ?>
                                                    <del><?=number_format($RowChiTietSanPham['GiaBan'])?></del> <sup>đ</sup>
                                                    <li><?=number_format($RowChiTietSanPham['GiaKhuyenMai'])?> <sup>đ</sup></li>
                                                <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                                <p class="pro__info">
                                    <strong>Nhóm Hương: </strong><?=$RowChiTietSanPham['NhomHuong']?>
                                </p>
                                <p class="pro__info">
                                    <strong>Xuất xứ: </strong><?=$RowChiTietSanPham['XuatXu']?>
                                </p>
                                <p class="pro__info">
                                    <strong>Độ lưu hương: </strong><?=$RowChiTietSanPham['DoLuuHuong']?>
                                </p>
                                <p class="pro__info">
                                    <strong>Phong cách: </strong><?=$RowChiTietSanPham['PhongCach']?>
                                </p>
                                <p>
                                <?php
                                    $IDKhachHang = Session::get("IDKhachHang");
                                    if($IDKhachHang){
                                    ?>
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <input type="hidden" min="1" name="SoLuong" class="form-control" value="1" style="width: 60%!important;">
                                            <input type="hidden" value="<?=$RowChiTietSanPham['IDSanPham']?>" name="IDSanPham">
                                            <input type="hidden" value="<?=$IDKhachHang?>" name="IDKhachHang">
                                            <button class="btn btn-danger" type="submit" style="background-color: #c43b68;" name="ThemVaoGioHang">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form>
                                    <?php
                                    }else{
                                        ?>
                                            <a href="tai-khoan.html" class="btn btn-primary" style="background-color: #c43b68;">Thêm vào giỏ hàng</a>
                                        <?php
                                    }
                                ?> 
                                </p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc align--left">
                                        <p><span>Danh mục sản phẩm:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="san-pham-theo-danh-muc/<?=$RowChiTietSanPham['IDTheLoai']?>/<?=makeUrl($RowChiTietSanPham['TenTheLoai'])?>.html"><?=$RowChiTietSanPham['TenTheLoai'];?></a></li>
                                        </ul>
                                    </div>

                                    <div class="sin__desc product__share__link">
                                        <p><span>Chia sẻ sản phẩm:</span></p>
                                        <ul class="pro__share">
                                            <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="https://www.facebook.com/linhhuynh001" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>  
            </div> 
        </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Đặc Điểm Nổi Bật</a></li>
                    <li role="presentation" class="review"><a href="#danhgia" role="tab" data-toggle="tab">Đánh giá sản phẩm</a></li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <p><?=$RowChiTietSanPham['DiemNoiBat']?></p>
                            <?php
                                $ShowChiTietHinhAnh = $SanPham->ShowChiTietHinhAnh($Id);
                                if($ShowChiTietHinhAnh){
                                    while($ROwChiTietHinhAnh = $ShowChiTietHinhAnh->fetch_assoc()){
                                    ?>
                                        <p><img src="images/products/<?=$ROwChiTietHinhAnh['HinhAnh']?>" width="100%"></p>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="danhgia" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            <h4>Đánh giá sản phẩm</h4>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Category Area -->
<section class="htc__category__area ptb--30">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2">
                    <h2 class="title__line">Sản Phẩm Cùng Thương Hiệu</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                        $SanPhamCungThuongHieu = $ThuongHieu->SanPhamCungThuongHieu($IDThuongHieu);
                        if($SanPhamCungThuongHieu){
                            while($RowSPCungThuongHieu = $SanPhamCungThuongHieu->fetch_assoc()){
                            ?>
                            <!-- Start Single Category -->
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="chi-tiet-san-pham/<?=$RowSPCungThuongHieu['IDSanPham']?>/<?=makeUrl($RowSPCungThuongHieu['TenSanPham'])?>.html">
                                                <img src="images/products/<?=$RowSPCungThuongHieu['AnhDaiDien']?>" width="1%">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li>
                                                    <form action="" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" value="<?=$RowSPCungThuongHieu['IDSanPham']?>" name="IDSanPham">
                                                            <button type="submit" name="Wishlist" style="border:none;">
                                                                <li><a href="#"><i class="icon-heart icons"></i></a></li>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </li>
                                                <?php
                                                    $IDKhachHang = Session::get("IDKhachHang");
                                                    if($IDKhachHang){
                                                    ?>
                                                    <li>
                                                        <form action="" method="post">
                                                            <div class="input-group">
                                                                <input type="hidden" min="1" name="SoLuong" class="form-control" value="1" style="width: 60%!important;">
                                                                <input type="hidden" value="<?=$RowSPCungThuongHieu['IDSanPham']?>" name="IDSanPham">
                                                                <input type="hidden" value="<?=$IDKhachHang?>" name="IDKhachHang">
                                                                <button type="submit" name="MuaHang" style="border:none;">
                                                                    <li><a href="#"><i class="icon-handbag icons"></i></a></li>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </li>
                                                    <?php
                                                    }else{
                                                        ?>
                                                            <li><a href="tai-khoan.html"><i class="icon-handbag icons"></i></a></li>
                                                        <?php
                                                    }
                                                ?> 
                                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="chi-tiet-san-pham/<?=$RowSPCungThuongHieu['IDSanPham']?>/<?=makeUrl($RowSPCungThuongHieu['TenSanPham'])?>.html"><?=$RowSPCungThuongHieu['TenSanPham']?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li>
                                                    <?php
                                                        if($RowSPCungThuongHieu['GiaKhuyenMai'] == 0){
                                                        ?>
                                                            <span><?=number_format($RowSPCungThuongHieu['GiaBan'])?></span> <sup>đ</sup>
                                                        <?php
                                                        }else{
                                                            ?>
                                                                <del><?=number_format($RowSPCungThuongHieu['GiaBan'])?></del> <sup>đ</sup>
                                                                 <li><?=number_format($RowSPCungThuongHieu['GiaKhuyenMai'])?> <sup>đ</sup></li>
                                                            <?php
                                                        }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Category -->
                            <?php
                            }
                        }
                    ?> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->  
        <?php
        }
    }
?>
<!-- End Product Description -->
<?php include_once "include/footer.php" ?>