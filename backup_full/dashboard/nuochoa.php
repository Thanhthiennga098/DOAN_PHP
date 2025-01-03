<?php include "include/header.php"; ?>
<?php
	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['themsanpham'])){
		$ThemSanPham = $SanPham->ThemSanPham($_POST,$_FILES);
	}
?><style>
	table thead tr th,table tbody tr td{text-align: center!important;}
</style>
<!--<p>Noi dung</p>-->
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h2>Thêm sản phẩm</h2>
			<div id="them"><?php if(isset($ThemSanPham)){echo $ThemSanPham;} ?></div>
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="ma">Mã sản phẩm:</label>
							<input type="text" class="form-control" name="MaSanPham" value="<?php echo substr(md5(time()),0,10) ?>" readonly>
						</div>
						<div class="form-group">
							<label for="ten">Tên sản phẩm:</label>
							<input type="text" class="form-control" name="TenSanPham" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="comment">Mô tả:</label>
							<textarea class="form-control" rows="5" name="Mota"  placeholder="Không được để trống phần này (*)"></textarea>
						</div>

						<div class="form-group">
							<label for="loai">Thể loại:</label>
							<select class="form-control" name="LoaiSP">
								<option value="">Vui lòng chọn loại sản phẩm (*)</option>
								<?php
									$AllLoaiSP = $TheLoai->ShowLoaiSP();
									if($AllLoaiSP){
										while($RowLoaiSP = $AllLoaiSP->fetch_assoc()){
										?>
										<option value="<?=$RowLoaiSP['IDTheLoai']?>"><?=$RowLoaiSP['TenTheLoai']?></option>
										<?php
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="nsx">Thương hiệu:</label>
							<select class="form-control" name="ThuongHieu">
								<option value="">Vui lòng chọn thương hiệu sản phẩm (*)</option>
								<?php
									$AllThuongHieu = $ThuongHieu->ShowThuongHieu();
									if($AllThuongHieu){
										while($RowThuongHieu = $AllThuongHieu->fetch_assoc()){
										?>
										<option value="<?=$RowThuongHieu['IDThuongHieu']?>"><?=$RowThuongHieu['TenThuongHieu']?></option>
										<?php
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="gia">Giá gốc:</label>
							<input type="number" class="form-control" name="GiaGoc" min="0" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Giá bán:</label>
							<input type="number" class="form-control" name="GiaBan" min="0" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Giá khuyễn mãi:</label>
							<input type="number" class="form-control" name="GiaKhuyenMai" min="0" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Nồng độ:</label>
							<input type="numbtextareaer" class="form-control" name="NongDo" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Nhóm hương:</label>
							<input type="numbtextareaer" class="form-control" name="NhomHuong" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Độ lưu hương:</label>
							<input type="numbtextareaer" class="form-control" name="DoLuuHuong" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Phong cách:</label>
							<input type="numbtextareaer" class="form-control" name="PhongCach" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="gia">Số lượng gốc:</label>
							<input type="number" class="form-control" name="SoLuongGoc" min="0" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="xuatxu">Xuất xứ:</label>
							<input type="textarea" class="form-control" name="XuatXu" placeholder="Không được để trống phần này (*)">
						</div>
						<div class="form-group">
							<label for="xuatxu">Loại sản phẩm:</label>
							<select name="SPNoiBat" id="" class="form-control">
								<option value="">Vui lòng chọn loại sản phẩm nổi bật (*)</option>
								<option value="1">Nổi bật</option>
								<option value="2">Không nổi bật</option>
							</select>
						</div>
						<div class="form-group">
							<label for="xuatxu">Ảnh đại diện</label>
							<input type="file" class="form-control" name="AnhDaiDien">
						</div>
						<button type="submit" class="btn btn-default" name="themsanpham">Thêm sản phẩm</button>
					</form>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				</div>
			</div>
			<h2>Cập nhật sản phẩm</h2>
			<table id="">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th style="text-align: center;">Phong cách</th>
						<th>Giá bán</th>
						<th>Giá khuyến mãi</th>
						<th>Xuất xứ</th>
						<th>Loại sản phẩm</th>
						<th>Thương hiệu</th>
						<th>Ảnh đại điện</th>
						<th>Chỉnh sửa</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$ShowSanPham = $SanPham->ShowSanPham();
						if($ShowSanPham){
							$i = 0;
							while($RowSanPham = $ShowSanPham->fetch_assoc()){
								$i++;
							?>
							<tr class="info" id="<?=$RowSanPham['IDSanPham']?>">
								<td><?=$i?></td>
								<td id="TenSanPham"><?=$RowSanPham['TenSanPham']?></td>
								<td id="PhongCach"><?=$RowSanPham['PhongCach']?></td>
								<td id="GiaBan"><?=number_format($RowSanPham['GiaBan'])?> <sup>đ</sup></td>
								<td id="GiaKhuyenMai"><?=number_format($RowSanPham['GiaKhuyenMai'])?> <sup>đ</sup></td>
								<td id="XuatXu"><?=$RowSanPham['XuatXu']?></td>
								<td id="TenTheLoai"><?=$RowSanPham['TenTheLoai']?></td>
								<td id="TenThuongHieu"><?=$RowSanPham['TenThuongHieu']?></td>
								<td id="AnhDaiDien"><img src="../images/products/<?=$RowSanPham['AnhDaiDien']?>" width="100px"></td>
								<td style="text-align: center;">
								<span>
									<a class="agile-icon" href="cap-nhat-san-pham/<?=$RowSanPham['IDSanPham']?>/<?=makeUrl($RowSanPham['TenSanPham'])?>.html"><i class="fa fa-pencil-square-o"></i></a>
								</span>
								<span>
									<a class="agile-icon XoaSanPham" data-id="<?=$RowSanPham['IDSanPham']?>" href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-times-circle"></i></a>
								</span>
								</td>
							</tr>
							<?php
							}
						}
					?>	
				</tbody>
			</table>
		</div>
		<!-- sanpham -->
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
						<div id="delete"></div>
						<form action="">
						<a href="" class="btn btn-default XoaSP" style="margin-left: 43%;">Xóa</a>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
		<!-- end modal sanpham -->
	</div>
<script src="ajax/sanpham.js"></script>
<script>
	$(document).ready(function(){
		$("#them").fadeOut(10000);
	});
</script>             
<?php include "include/footer.php" ?>