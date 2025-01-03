<?php include "include/header.php"; ?>
<?php
    if(isset($_GET['IDXoaDon'])){
        $IDXoaDon = $_GET['IDXoaDon'];
        $XoaDonHang = $SanPham->XoaDonHang($IDXoaDon);
    }
    if(isset($_GET['HuyDonHang'])){
        $IDHuyDH = $_GET['HuyDonHang'];
        $HuyDonHang = $SanPham->HuyDonHang($IDHuyDH);
    }
?>
<style>.top,.bottom{padding-top:30px}#check h3{font-size:16px;font-weight:600;text-transform:uppercase}
.table{margin-top:30px;font-size:15px}</style>
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
                            <a class="breadcrumb-item" href="#">Theo dõi đơn hàng</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<div><?php if(isset($XoaDonHang)){echo $XoaDonHang;}if(isset($HuyDonHang)){echo $HuyDonHang;} ?></div>
<div class="top"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="check">
            <h3>Theo Dõi Đơn Hàng</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Đơn Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Tình Trạng</th>
                        <th>Tổng Cộng</th>
                        <th>Các Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ShowChiTietDonHang = $SanPham->ShowChiTietDonHang($IDKhachHang);
                        if($ShowChiTietDonHang){
                            while($RowChiTietDonHang = $ShowChiTietDonHang->fetch_assoc()){
                                $TongTien = $RowChiTietDonHang['TongTien'];
                            ?>
                                <tr>
                                    <td><strong><?=$RowChiTietDonHang['IDDonHang']?></strong></td>
                                    <td><strong><?=$RowChiTietDonHang['NgayKhoiTao']?></strong></td>
                                    <td><strong class="btn-success" style="padding:10px">
                                    <?php
                                        if($RowChiTietDonHang['Status'] =='1'){
                                            echo "Đang xử lý";
                                        }elseif($RowChiTietDonHang['Status'] =='2'){
                                            echo "Chờ thanh toán";
                                        }elseif($RowChiTietDonHang['Status'] =='3'){
                                            echo "Chờ lấy hàng";
                                        }elseif($RowChiTietDonHang['Status'] =='4'){
                                            echo "Đang giao hàng";
                                        }else{
                                            echo "Đã giao hàng";
                                        }
                                    ?>
                                    </strong></td>
                                    <td><strong><?=number_format($TongTien)?> <sup>đ</sup></strong></td>
                                    <td>
                                        <?php
                                            if($RowChiTietDonHang['Status'] =='5'){
                                            ?>
                                            <a href="view-don-hang/<?=$RowChiTietDonHang['IDDonHang']?>.html" class="btn btn-primary">Xem</a>
                                            <a href="theo-doi-don-hang.html?IDXoaDon=<?=$RowChiTietDonHang['IDDonHang']?>" class="btn btn-danger">Xóa</a>
                                            <?php
                                            }elseif($RowChiTietDonHang['Status'] =='1'){
                                            ?>
                                            <a href="view-don-hang/<?=$RowChiTietDonHang['IDDonHang']?>.html" class="btn btn-primary">Xem</a>
                                            <a href="theo-doi-don-hang.html?HuyDonHang=<?=$RowChiTietDonHang['IDDonHang']?>" class="btn btn-success">Hủy Đơn Hàng</a>
                                            <?php
                                            }else{
                                            ?>
                                            <a href="view-don-hang/<?=$RowChiTietDonHang['IDDonHang']?>.html" class="btn btn-primary">Xem</a>
                                            <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="bottom"></div>
<?php include "include/footer.php"; ?>