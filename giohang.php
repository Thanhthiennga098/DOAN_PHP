<?php
    include_once "include/header.php";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['capnhatgiohang'])){
        $IDGioHang = $_POST['IDGioHang'];
        $SoLuong = $_POST['SoLuong'];
        $CapNhatGioHang = $SanPham->CapNhatSP($IDGioHang,$SoLuong);
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
                            <a class="breadcrumb-item" href="gio-hang.html">Giỏ Hàng</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
        <!-- cart-main-area start -->
    <div><?php if(isset($CapNhatGioHang)){echo $CapNhatGioHang;} ?></div>
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="gio-hang.html" method="post">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Sản phẩm</th>
                                            <th class="product-name">Tên Sản Phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số Lượng</th>
                                            <th class="product-subtotal">Tổng Giá</th>
                                            <th class="product-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ShowGioHang = $SanPham->ShowGioHang($IDKhachHang);
                                        if($ShowGioHang){
                                            $TongTien = 0;
                                            $Total = 0;
                                            while($RowGioHang = $ShowGioHang->fetch_assoc()){
                                                $IDGioHang = $RowGioHang['IDGioHang'];
                                                $TongGia = $RowGioHang['SoLuong'] * $RowGioHang['Gia'];
                                            ?>
                                            <tr id="<?=$RowGioHang['IDGioHang']?>">
                                                <td class="product-thumbnail"><a href="#"><img src="images/products/<?=$RowGioHang['HinhAnh']?>" alt="product img" /></a></td>
                                                <td class="product-name"><a href="#"><?=$RowGioHang['TenSanPham']?></a>
                                                </td>
                                                <td class="product-price"><span class="amount"><?=number_format($RowGioHang['Gia']);?><sup>đ</sup></span></td>
                                                <td class="product-quantity">
                                                    <form action="gio-hang.html" method="post">
                                                        <input type="number" value="<?=$RowGioHang['SoLuong']?>" name="SoLuong" min="1"/>
                                                        <input type="hidden" value="<?=$RowGioHang['IDGioHang']?>" name="IDGioHang" min="1"/>
                                                        <button type="submit" name="capnhatgiohang" style="background-color: #c43b68;height:39px" class="btn btn-danger">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="product-subtotal"><?=number_format($TongGia)?> <sup>đ</sup></td>
                                                <td class="product-remove">
                                                    <a href="#" class="checkdonhang" data-id="<?=$RowGioHang['IDGioHang']?>" data-toggle="modal" data-target="#myModal1"><i class="icon-trash icons"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $Total += $TongGia; 
                                            }
                                        }
                                    ?>  
                                    </tbody>
                                </table>
                            </div>
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
                                            <div id="xoadonhang"></div>
                                            <form action="">
                                                <a href="" class="btn btn-danger xoadonhang" style="margin-left: 43%;background-color: #c43b68;padding:10px 20px ">&ensp; Xóa &ensp;</a>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal sanpham -->
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="ht__coupon__code"></div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                    <div class="htc__cart__total">
                                        <h6>Tổng Giỏ Hàng</h6>
                                        <div class="cart__desk__list">
                                            <ul class="cart__desc">
                                                <li>Tạm tính</li>
                                                <li>Thuế</li>
                                            </ul>
                                            <ul class="cart__price">
                                                <li><?php if($Total ==""){echo "0đ";}else{ echo number_format($Total);} ?><sup>đ</sup></li>
                                                <li>10%</li>
                                            </ul>
                                        </div>
                                        <div class="cart__total">
                                            <span>Tổng Số Đơn đặt hàng</span>
                                            <span>
                                                <?php
                                                    $Vat = $Total * 0.1;
                                                    $ThanhTien = $Total + $Vat;
                                                    echo number_format($ThanhTien).'<sup>đ</sup>';
                                                ?>
                                            </span>
                                        </div>
                                        <ul class="payment__btn">
                                            <li class="active">
                                                <form action="thanh-toan-don-hang.html" method="post">
                                                    <button type="submit" name="dathang">Tiến hành đặt hàng</button>
                                                </form>
                                            </li>
                                            <li><a href="trang-chu.html">Tiếp tục mua sắm</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<script src="dashboard/ajax/xylygiohang.js"></script>         
<?php include_once "include/footer.php" ?>