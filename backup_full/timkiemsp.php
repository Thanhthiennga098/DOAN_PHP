<?php include_once "include/header.php" ?>
<?php
    if(isset($_GET['id'])){
        $IDTheLoai = $_GET['id'];
    }else{
        echo '';
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['timkiem'])){
        $keywordsp = $_POST['keywordsp'];
        $TimKiemSP = $SanPham->TimKiemSanPham($keywordsp);
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['MuaHang'])){
        $IDSanPham = $_POST['IDSanPham'];
        $SoLuong = $_POST['SoLuong'];
        $ThemSPVaoGioHang = $SanPham->MuaHangTimKiemSP($IDSanPham,$SoLuong,$IDKhachHang);
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
                                <span class="breadcrumb-item active">Tìm kiếm sản phẩm : <?php if(isset($keywordsp)){echo $keywordsp;} ?></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Product Grid -->

    <div><?php if(isset($ThemSPVaoGioHang)){echo $ThemSPVaoGioHang;}
    if(isset($ThemWishlist)){echo $ThemWishlist;} ?></div>
    <section class="htc__product__grid bg__white ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="ht__pro__qun">
                                <span>Sản phẩm tìm kiếm</span>
                            </div>
                            <!-- Start List And Grid View -->
                            <ul class="view__mode" role="tablist">
                                <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                            </ul>
                            <!-- End List And Grid View -->
                        </div>    
                    <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <?php
                                    if($TimKiemSP){
                                        while($RowTimKiemSP = $TimKiemSP->fetch_assoc()){
                                    ?>
                                    <!-- Start Single Product -->
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                        <div class="category">
                                            <div class="ht__cat__thumb">
                                                <a href="chi-tiet-san-pham/<?=$RowTimKiemSP['IDSanPham']?>/<?=makeUrl($RowTimKiemSP['TenSanPham'])?>.html">
                                                    <img src="images/products/<?=$RowTimKiemSP['AnhDaiDien']?>" alt="product images">
                                                </a>
                                            </div>
                                            <div class="fr__hover__info">
                                                <ul class="product__action">
                                                <li>
                                                    <form action="" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" value="<?=$RowTimKiemSP['IDSanPham']?>" name="IDSanPham">
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
                                                                    <input type="hidden" value="<?=$RowTimKiemSP['IDSanPham']?>" name="IDSanPham">
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
                                                <h4><a href="chi-tiet-san-pham/<?=$RowTimKiemSP['IDSanPham']?>/<?=makeUrl($RowTimKiemSP['TenSanPham'])?>.html"><?=$RowTimKiemSP['TenSanPham']?></a></h4>
                                                <ul class="fr__pro__prize">
                                                    <?php
                                                        if($RowTimKiemSP['GiaKhuyenMai'] == 0){
                                                        ?>
                                                            <li> <span><?=number_format($RowTimKiemSP['GiaBan'])?></span> <sup>đ</sup></li>
                                                        <?php
                                                        }else{
                                                            ?>
                                                                <li><del><?=number_format($RowTimKiemSP['GiaBan'])?></del> <sup>đ</sup></li>
                                                                <li><?=number_format($RowTimKiemSP['GiaKhuyenMai'])?> <sup>đ</sup></li>
                                                            <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product --> 
                                    <?php
                                        }
                                    }
                                ?>
                                </div>
                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                    <div class="col-xs-12">
                                        <div class="ht__list__wrap">
                                        <?php
                                            if($TimKiemSP){
                                                while($RowTimKiemSP = $TimKiemSP->fetch_assoc()){
                                            ?>
                                            <!-- Start List Product -->
                                            <div class="ht__list__product">
                                                <div class="ht__list__thumb">
                                                    <a href="chi-tiet-san-pham/<?=$RowTimKiemSP['IDSanPham']?>/<?=makeUrl($RowTimKiemSP['TenSanPham'])?>.html"><img src="images/products/<?=$RowTimKiemSP['AnhDaiDien']?>"></a>
                                                </div>
                                                <div class="htc__list__details">
                                                    <h2><a href="chi-tiet-san-pham/<?=$RowTimKiemSP['IDSanPham']?>/<?=makeUrl($RowTimKiemSP['TenSanPham'])?>.html"><?=$RowTimKiemSP['TenSanPham']?></a></h2>
                                                    <ul  class="pro__prize">
                                                    <?php
                                                        if($RowTimKiemSP['GiaKhuyenMai'] == 0){
                                                        ?>
                                                        <li> <span><?=number_format($RowTimKiemSP['GiaBan'])?></span> <sup>đ</sup></li>
                                                        <?php
                                                        }else{
                                                            ?>
                                                                <li><del><?=number_format($RowTimKiemSP['GiaBan'])?></del> <sup>đ</sup></li> &ensp;
                                                                <li><?=number_format($RowTimKiemSP['GiaKhuyenMai'])?> <sup>đ</sup></li>
                                                            <?php
                                                        }
                                                    ?>
                                                    </ul>
                                                    <ul class="rating">
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li class="old"><i class="icon-star icons"></i></li>
                                                    </ul>
                                                    <p>Nhóm Hương : <?=$RowTimKiemSP['NhomHuong']?></p>
                                                    <div class="fr__list__btn">
                                                        <form action="" method="post">
                                                            <div class="input-group">
                                                                <input type="hidden" min="1" name="SoLuong" class="form-control" value="1" style="width: 60%!important;">
                                                                <input type="hidden" value="<?=$RowTimKiemSP['IDSanPham']?>" name="IDSanPham">
                                                                <button class="btn btn-danger" type="submit" style="background-color: #c43b68;" name="ThemVaoGioHang">Thêm vào giỏ hàng</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End List Product -->
                                            <?php
                                            }
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        </div>
                        <!-- End Product View -->
                    </div>
                    <!-- Start Pagenation -->
                    <!-- End Pagenation -->
                </div>
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="htc__product__leftsidebar">
                        <!-- Start Category Area -->
                        <div class="htc__category">
                            <h4 class="title__line--4">Danh mục sản phẩm</h4>
                            <ul class="ht__cat__list">
                                <?php
                                    $SelectDanhMuc = $TheLoai->ShowLoaiSP();
                                    if($SelectDanhMuc){
                                        while($RowDanhMuc = $SelectDanhMuc->fetch_assoc()){
                                        ?>
                                            <li><a href="san-pham-theo-danh-muc/<?=$RowDanhMuc['IDTheLoai']?>/<?=makeUrl($RowDanhMuc['TenTheLoai'])?>.html"><?=$RowDanhMuc['TenTheLoai']?></a></li>
                                        <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- End Category Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grid -->
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
    <!-- Start Banner Area -->
    <div class="htc__banner__area">
        <ul class="banner__list owl-carousel owl-theme clearfix">
            <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
            <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        </ul>
    </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->
<?php include_once "include/footer.php" ?>