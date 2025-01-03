<?php include "include/header.php"; ?>
<?php
	if(isset($_GET['ID'])){
		$IDDonHang = $_GET['ID'];
	}
?>
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
							<span class="breadcrumb-item active">View đơn hàng</span>
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
			<h5>Chi tiết đơn hàng</h5>
				<div class="col-md-10">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Mã Đơn Hàng</th>
								<th>Tên Sản Phẩm</th>
								<th>Tổng Tiền</th>
								<th>Phương Thức Thanh Toán</th>
								<th>Tình Trạng</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$ShowChiTietDonHang = $SanPham->ViewDonHang($IDDonHang);
								if($ShowChiTietDonHang){
									while($RowChiTietDonHang = $ShowChiTietDonHang->fetch_assoc()){
										$TongTien = $RowChiTietDonHang['TongTien'];
									?>
										<tr>
											<td><strong><?=$RowChiTietDonHang['IDDonHang']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['TenSanPham']?></strong></td>
											<td><strong><?=number_format($RowChiTietDonHang['TongTien'])?> <sup>đ</sup></strong></td>
											<td><strong>Trả tiền mặt khi nhận hàng</strong></td>
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
										</tr>
										<tr>
											<td colspan="3" style="font-size:18px;text-align:center"><strong>Tổng Tiền</strong></td>
											<td colspan="2" style="font-size:18px;text-align:center"><strong><?=number_format($RowChiTietDonHang['TongTien'])?> <sup>đ</sup></strong></strong></td>
										</tr>
									<?php
										$Total += $TongTien;
									}
								}
							?>
							<?php $Tong = Session::get('TongTien',$Total);?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-12">
			<h5>Địa chỉ khách hàng</h5>
				<div class="col-md-12">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th style="text-align:center">Mã Đơn Hàng</th>
								<th style="text-align:center">Họ</th>
								<th style="text-align:center">Tên</th>
								<th style="text-align:center">Email</th>
								<th style="text-align:center">Tỉnh / Thành Phố</th>
								<th style="text-align:center">Địa Chỉ</th>
								<th style="text-align:center">Số điện thoại</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$ShowChiTietDonHang = $SanPham->ViewDonHang($IDDonHang);
								if($ShowChiTietDonHang){
									while($RowChiTietDonHang = $ShowChiTietDonHang->fetch_assoc()){
										
										$TongTien = $RowChiTietDonHang['TongTien'];
									?>
										<tr>
											<td><strong><?=$RowChiTietDonHang['IDDonHang']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['Ho']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['Ten']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['Email']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['Tinh']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['DiaChi']?></strong></td>
											<td><strong><?=$RowChiTietDonHang['SoDienThoai']?></strong></td>
										</tr>
									<?php
										$Total += $TongTien;
									}
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