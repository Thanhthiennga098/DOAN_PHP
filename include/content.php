<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['MuaHang'])){
        $IDSanPham = $_POST['IDSanPham'];
        $SoLuong = $_POST['SoLuong'];
        $IDKhachHang = Session::get("IDKhachHang");
        $ThemSPVaoGioHang = $SanPham->GioHangSanPham($IDSanPham,$SoLuong,$IDKhachHang);
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['Wishlist'])){
        $IDSanPham = $_POST['IDSanPham'];
        $ThemWishlist = $SanPham->ThemWishlist($IDSanPham);
    }
?>
<!-- Start Category Area -->
<div id="check"><?php if(isset($ThemSPVaoGioHang)){echo $ThemSPVaoGioHang;} 
if(isset($ThemWishlist)){echo $ThemWishlist;}  ?></div>
<section class="htc__category__area ptb--50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2">
                    <h2 class="title__line">Nước Hoa Mới Nhất</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                        $ShowSanPhamMoi = $SanPham->ShowSanPhamMoi();
                        if($ShowSanPhamMoi){
                            while($RowSanPhamMoi = $ShowSanPhamMoi->fetch_assoc()){
                            ?>
                            <!-- Start Single Category -->
                                <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="chi-tiet-san-pham/<?=$RowSanPhamMoi['IDSanPham']?>/<?=makeUrl($RowSanPhamMoi['TenSanPham'])?>.html">
                                                <img src="images/products/<?=$RowSanPhamMoi['AnhDaiDien']?>">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li>
                                                    <form action="" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" value="<?=$RowSanPhamMoi['IDSanPham']?>" name="IDSanPham">
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
                                                                <input type="hidden" value="<?=$RowSanPhamMoi['IDSanPham']?>" name="IDSanPham">
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
                                            <h4><a href="chi-tiet-san-pham/<?=$RowSanPhamMoi['IDSanPham']?>/<?=makeUrl($RowSanPhamMoi['TenSanPham'])?>.html"><?=$RowSanPhamMoi['TenSanPham']?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li>
                                                    <?php
                                                        if($RowSanPhamMoi['GiaKhuyenMai'] == 0){
                                                        ?>
                                                            <span><?=number_format($RowSanPhamMoi['GiaBan'])?></span> <sup>đ</sup>
                                                        <?php
                                                        }else{
                                                            ?>
                                                                <del><?=number_format($RowSanPhamMoi['GiaBan'])?></del> <sup>đ</sup>
                                                                <li><?=number_format($RowSanPhamMoi['GiaKhuyenMai'])?> <sup>đ</sup></li>
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
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <?php
                                        $ShowPage = $SanPham->ShowSanPham();
                                        $DemPage = mysqli_num_rows($ShowPage);
                                        $Count = ceil($DemPage/4);
                                        for($i = 1; $i <= $Count; $i++){
                                        ?>
                                        <li><a href="?phan-trang=<?=$i;?>"><?=$i;?></a></li>
                                        <?php
                                        }
                                    ?>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--30">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2">
                    <h2 class="title__line">Nước Hoa Khuyến Mãi Hot</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                        $SanPhamNoiBat = $SanPham->SanPhamNoiBat();
                        if($SanPhamNoiBat){
                            while($RowPhamNoiBat = $SanPhamNoiBat->fetch_assoc()){
                            ?>
                            <!-- Start Single Category -->
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="chi-tiet-san-pham/<?=$RowPhamNoiBat['IDSanPham']?>/<?=makeUrl($RowPhamNoiBat['TenSanPham'])?>.html">
                                                <img src="images/products/<?=$RowPhamNoiBat['AnhDaiDien']?>" width="1%">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li>
                                                    <form action="" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" value="<?=$RowPhamNoiBat['IDSanPham']?>" name="IDSanPham">
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
                                                                <input type="hidden" value="<?=$RowPhamNoiBat['IDSanPham']?>" name="IDSanPham">
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
                                            <h4><a href="chi-tiet-san-pham/<?=$RowPhamNoiBat['IDSanPham']?>/<?=makeUrl($RowPhamNoiBat['TenSanPham'])?>.html"><?=$RowPhamNoiBat['TenSanPham']?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li>
                                                    <?php
                                                        if($RowPhamNoiBat['GiaKhuyenMai'] == 0){
                                                        ?>
                                                            <span><?=number_format($RowPhamNoiBat['GiaBan'])?></span> <sup>đ</sup>
                                                        <?php
                                                        }else{
                                                            ?>
                                                                <del><?=number_format($RowPhamNoiBat['GiaBan'])?></del> <sup>đ</sup>
                                                                 <li><?=number_format($RowPhamNoiBat['GiaKhuyenMai'])?> <sup>đ</sup></li>
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
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <?php
                                        $ShowPage = $SanPham->ShowSanPham();
                                        $DemPage = mysqli_num_rows($ShowPage);
                                        $Count = ceil($DemPage/4);
                                        for($i = 1; $i <= $Count; $i++){
                                        ?>
                                        <li><a href="?phan-trang-hot=<?=$i;?>"><?=$i;?></a></li>
                                        <?php
                                        }
                                    ?>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Prize Good Area -->
<section class="htc__good__sale bg__cat--3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="fr__prize__inner">
                    <h2>Các Kênh Bán Hàng</h2>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="prize__inner">
                    <div class="prize__thumb">
                        <img src="images/banner/8189eaf2b4.jpg" alt="banner images">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="prize__inner">
                    <div class="prize__thumb">
                        <img src="images/banner/141a2fac35.jpg" alt="banner images">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Prize Good Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2">
                    <h2 class="title__line">Sản Phẩm Được Xem Nhiều Nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <?php
                    $ShowSanPhamXemNhieu = $SanPham->ShowSanPhamXemNhieu();
                        if($ShowSanPhamXemNhieu){
                            while($RowSanPhamXemNhieu = $ShowSanPhamXemNhieu->fetch_assoc()){
                            ?>
                            <!-- Start Single Category -->
                                <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="chi-tiet-san-pham/<?=$RowSanPhamXemNhieu['IDSanPham']?>/<?=makeUrl($RowSanPhamXemNhieu['TenSanPham'])?>.html">
                                                <img src="images/products/<?=$RowSanPhamXemNhieu['AnhDaiDien']?>" width="1%">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li>
                                                    <form action="" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" value="<?=$RowSanPhamXemNhieu['IDSanPham']?>" name="IDSanPham">
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
                                                                <input type="hidden" value="<?=$RowSanPhamXemNhieu['IDSanPham']?>" name="IDSanPham">
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
                                            <h4><a href="chi-tiet-san-pham/<?=$RowSanPhamXemNhieu['IDSanPham']?>/<?=makeUrl($RowSanPhamXemNhieu['TenSanPham'])?>.html"><?=$RowSanPhamXemNhieu['TenSanPham']?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li>
                                                    <?php
                                                        if($RowSanPhamXemNhieu['GiaKhuyenMai'] == 0){
                                                        ?>
                                                            <span><?=number_format($RowSanPhamXemNhieu['GiaBan'])?></span> <sup>đ</sup>
                                                        <?php
                                                        }else{
                                                            ?>
                                                                <del><?=number_format($RowSanPhamXemNhieu['GiaBan'])?></del> <sup>đ</sup>
                                                                 <li><?=number_format($RowSanPhamXemNhieu['GiaKhuyenMai'])?> <sup>đ</sup></li>
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
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <?php
                                        $ShowPage = $SanPham->ShowSanPham();
                                        $DemPage = mysqli_num_rows($ShowPage);
                                        $Count = ceil($DemPage/4);
                                        for($i = 1; $i <= $Count; $i++){
                                        ?>
                                        <li><a href="?phan-trang-page=<?=$i;?>"><?=$i;?></a></li>
                                        <?php
                                        }
                                    ?>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                            </ul>
                        </div>
                    </div>
                <!-- End Single Category -->
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->