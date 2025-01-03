<?php
    include_once "include/header.php"
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['MuaHang'])){
        $IDSanPham = $_POST['IDSanPham'];
        $SoLuong = $_POST['SoLuong'];
        $IDKhachHang = Session::get("IDKhachHang");
        $ThemSPVaoGioHang = $SanPham->GioHangSanPham($IDSanPham,$SoLuong,$IDKhachHang);
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
                            <a class="breadcrumb-item" href="#">Wishlist</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div><?php if(isset($ThemSPVaoGioHang)){echo $ThemSPVaoGioHang;} ?></div>
<!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="wishlist.html" method="post">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Xóa</span></th>
                                                <th class="product-thumbnail">Hình Ảnh</th>
                                                <th class="product-name"><span class="nobr">Tên sản phẩm</span></th>
                                                <th class="product-price"><span class="nobr">Giá bán </span></th>
                                                <th class="product-stock-stauts"><span class="nobr">Tình trạng</span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Thêm vào giỏ hàng</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $ShowWistlist = $SanPham->ShowWistlish();
                                            if($ShowWistlist){
                                                while($RowWistlish = $ShowWistlist->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td class="product-remove">
                                                    <span>
                                                        <a class="agile-icon del_wistlish" href="#" data-id="<?=$RowWistlish['IDWishlist']?>" data-toggle="modal" data-target="#myModal1">
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>
                                                    </span>
                                                    </td>
                                                    <td class="product-thumbnail"><a href="#"><img src="images/products/<?=$RowWistlish['HinhAnh'];?>" alt="" /></a></td>
                                                    <td class="product-name"><a href="#"><?=$RowWistlish['TenSanPham']?></a></td>
                                                    <td class="product-price"><span class="amount"><?=number_format($RowWistlish['GiaBan'])?> <sup>đ</sup></span></td>
                                                    <td class="product-stock-status"><span class="wishlist-in-stock">Còn hàng</span></td>
                                                    
                                                    <?php
                                                    $IDKhachHang = Session::get("IDKhachHang");
                                                    if($IDKhachHang){
                                                    ?>
                                                    
                                                        <form action="" method="post">
                                                            <div class="input-group">
                                                                <input type="hidden" min="1" name="SoLuong" class="form-control" value="1" style="width: 60%!important;">
                                                                <input type="hidden" value="<?=$RowWistlish['IDSanPham']?>" name="IDSanPham">
                                                                <input type="hidden" value="<?=$IDKhachHang?>" name="IDKhachHang">
                                                                <td class="product-add-to-cart">
                                                                    <button type="submit" name="MuaHang" style="border:none;">
                                                                        Thêm vào giỏ hàng
                                                                    </button>
                                                                </td>
                                                            </div>
                                                        </form>
                                                    
                                                    <?php
                                                    }else{
                                                        ?>
                                                            <button type="submit" style="border:none;">
                                                                <td class="product-add-to-cart"><a href="tai-khoan.html">Thêm vào giỏ hàng</a></td>
                                                            </button>
                                                        <?php
                                                    }
                                                ?> 
                                                </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
        <!-- Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Bạn có chắc chắn muốn xóa hay không?</h4>
                    </div>
                    
                    <div class="modal-body">
                        <div id="XoaWishlist"></div>
                        <form action="">
                            <a href="" class="btn btn-danger xoawistlish" style="margin-left: 43%;background-color: #c43b68;padding:10px 20px ">&ensp; Xóa &ensp;</a>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- end modal sanpham -->

<script src="dashboard/ajax/xoawistlish.js"></script>
<?php include_once "include/footer.php" ?>