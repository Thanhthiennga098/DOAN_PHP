<?php include "include/header.php"; ?>
<style>.padding-bottom {padding-bottom: 40px}.taikhoan{padding-top:30px}.table{margin-top:20px!important; font-size:15px;}
.table h2{font-size:18px;text-transform:uppercase;font-weight:600}
</style>
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
							<span class="breadcrumb-item active">Chi tiết đơn hàng</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<div class="taikhoan">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<h5>Cảm mơn bạn. Đơn hàng của bạn đã được nhận</h5>
			</div>
        </div>
		<div class="table">
			<div class="row">
				<div class="col-md-12">
					<h2>Chi Tiết Đơn Hàng</h2>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Sản Phẩm</th>
								<th>Tổng</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$ShowChiTietDonHang = $SanPham->ShowChiTietDonHangsID($IDKhachHang);
								if($ShowChiTietDonHang){
									while($RowChiTietDonHang = $ShowChiTietDonHang->fetch_assoc()){
										$TongTien = $RowChiTietDonHang['TongTien'];
									?>
										<tr>
											<td><strong><?=$RowChiTietDonHang['TenSanPham']?></strong></td>
											<td><strong><?=number_format($RowChiTietDonHang['TongTien'])?> <sup>đ</sup></strong></td>
										</tr>
									<?php
									$Total += $TongTien;
									}
								}
							?>
							<?php 
								$Tong = $Total;
							?>
							<tr>
								<td><strong>Tổng Cộng</strong></td>
								<td><strong><?=number_format($Tong);?> <sup>đ</sup></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="table">
			<div class="row">
				<div class="col-md-12">
					<h2>Địa Chỉ Thanh Toán</h2>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tên</th>
								<th>Họ</th>
								<th>Tỉnh / Thành Phố</th>
								<th>Email</th>
								<th>Số Điện Thoại</th>
								<th>Ngày Đặt Hàng</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$ShowChiTietDonHang = $SanPham->ShowChiTietDonHangsID($IDKhachHang)->fetch_assoc();
								if($ShowChiTietDonHang){
									// while($RowChiTietDonHang = $ShowChiTietDonHang->fetch_assoc()){
									?>
										<tr>
											<td><strong><?=$ShowChiTietDonHang['Ten']?></strong></td>
											<td><strong><?=$ShowChiTietDonHang['Ho']?></strong></td>
											<td><strong><?=$ShowChiTietDonHang['Tinh']?></strong></td>
											<td><strong><?=$ShowChiTietDonHang['Email']?></strong></td>
											<td><strong><?=$ShowChiTietDonHang['SoDienThoai']?></strong></td>
											<td><strong><?=$ShowChiTietDonHang['NgayKhoiTao']?></strong></td>
										</tr>
									<?php
									// }
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="padding-bottom"></div>
<?php include "include/footer.php"; ?>