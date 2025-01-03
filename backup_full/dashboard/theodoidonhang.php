<?php
	include "include/header.php"
?>
<?php
	if(isset($_GET['ma-don-hang1'])){
		$IDDonHang = $_GET['ma-don-hang1'];
		$TongTien = $_GET['TongTien'];
		$ThoiGian = $_GET['ThoiGian'];
		$Xuly = $SanPham->XuLyDonHang1($TongTien,$ThoiGian,$IDDonHang);
	}
	if(isset($_GET['ma-don-hang2'])){
		$IDDonHang = $_GET['ma-don-hang2'];
		$TongTien = $_GET['TongTien'];
		$ThoiGian = $_GET['ThoiGian'];
		$Xuly = $SanPham->XuLyDonHang2($TongTien,$ThoiGian,$IDDonHang);
	}
	if(isset($_GET['ma-don-hang3'])){
		$IDDonHang = $_GET['ma-don-hang3'];
		$TongTien = $_GET['TongTien'];
		$ThoiGian = $_GET['ThoiGian'];
		$Xuly = $SanPham->XuLyDonHang3($TongTien,$ThoiGian,$IDDonHang);
	}
	if(isset($_GET['ma-don-hang4'])){
		$IDDonHang = $_GET['ma-don-hang4'];
		$TongTien = $_GET['TongTien'];
		$ThoiGian = $_GET['ThoiGian'];
		$Xuly = $SanPham->XuLyDonHang4($TongTien,$ThoiGian,$IDDonHang);
	}
	if(isset($_GET['ma-don-hang5'])){
		$IDDonHang = $_GET['ma-don-hang5'];
		$TongTien = $_GET['TongTien'];
		$ThoiGian = $_GET['ThoiGian'];
		$Xuly = $SanPham->XuLyDonHang5($TongTien,$ThoiGian,$IDDonHang);
	}
?>
<!--<p>Noi dung</p>-->								
<div class="agile-tables">
	<div class="w3l-table-info">
		<h2>Danh sách đơn hàng</h2>
		<table id="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Mã đơn hàng</th>
					<th>Tên khách hàng</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Ngày lập</th>
					<th>Tình trạng</th>
					<th>Chỉnh sửa</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$ShowDonHang = $SanPham->ShowDonHang();
			if($ShowDonHang){
				$i =0;
				while($RowDonHang = $ShowDonHang->fetch_assoc()){
					$i++;	
				?>
					<tr class="danger" <?=$RowDonHang['IDDonHang']?>>
						<td><?=$i;?></td>
						<td id="MaDonHang"><?=$RowDonHang['IDDonHang']?></td>
						<td><?=$RowDonHang['Ho']?> <?=$RowDonHang['Ten']?></td>
						<td><?=$RowDonHang['DiaChi']?></td>
						<td><?=$RowDonHang['SoDienThoai']?></td>
						<td><?=$RowDonHang['NgayKhoiTao']?></td>
						<td>
						<?php
							if($RowDonHang['Status'] =='1'){
								echo "Đang xử lý";
							}elseif($RowDonHang['Status'] =='2'){
								echo "Chờ thanh toán";
							}elseif($RowDonHang['Status'] =='3'){
								echo "Chờ lấy hàng";
							}elseif($RowDonHang['Status'] =='4'){
								echo "Đang giao hàng";
							}else{
								echo "Đã giao hàng";
							}
						?>
						</td>
						<td style="text-align: center;">
							
							<?php
								if($RowDonHang['Status'] =='1'){
								?>
								<a class="agile-icon xulydonhang btn btn-success" href="theodoidonhang.php?ma-don-hang1=<?=$RowDonHang['IDDonHang']?>&TongTien=<?=$RowDonHang['TongTien']?>&ThoiGian=<?=$RowDonHang['NgayKhoiTao']?>">Chờ thanh toán</a>
								<?php
								}elseif($RowDonHang['Status'] =='2'){
								?>
								<a class="agile-icon xulydonhang btn btn-success" href="theodoidonhang.php?ma-don-hang2=<?=$RowDonHang['IDDonHang']?>&TongTien=<?=$RowDonHang['TongTien']?>&ThoiGian=<?=$RowDonHang['NgayKhoiTao']?>">Chờ lấy hàng</a>
								<?php
								}elseif($RowDonHang['Status'] =='3'){
								?>
								<a class="agile-icon xulydonhang btn btn-success" href="theodoidonhang.php?ma-don-hang3=<?=$RowDonHang['IDDonHang']?>&TongTien=<?=$RowDonHang['TongTien']?>&ThoiGian=<?=$RowDonHang['NgayKhoiTao']?>">Đang giao hàng</a>
								<?php
								}elseif($RowDonHang['Status'] =='4'){
								?>
								<a class="agile-icon xulydonhang btn btn-success" href="theodoidonhang.php?ma-don-hang4=<?=$RowDonHang['IDDonHang']?>&TongTien=<?=$RowDonHang['TongTien']?>&ThoiGian=<?=$RowDonHang['NgayKhoiTao']?>">Đã giao hàng</a>
								<?php
								}else{
								?>
								<a class="agile-icon xulydonhang btn btn-danger" href="theodoidonhang.php?ma-don-hang5=<?=$RowDonHang['IDDonHang']?>&TongTien=<?=$RowDonHang['TongTien']?>&ThoiGian=<?=$RowDonHang['NgayKhoiTao']?>">Xóa đơn hàng</a>
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
<?php include "include/footer.php"; ?>