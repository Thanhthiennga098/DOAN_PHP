<?php
	include "include/header.php";
?>
<style>
	table tr th,table tr td{text-align: center;}
</style>
<?php
	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['thembanner'])){
		$mabanner = $_POST['mabanner'];
		$ImgBanner = $_FILES['ImgBanner'];
		$ThemBannerQuangCao = $SanPham->ThemBannerQuangCao($mabanner,$ImgBanner);
	}
?>
<!--<p>Noi dung</p>-->								
<div class="agile-tables">
	<div class="w3l-table-info">
		<h2>Thêm banner quảng cáo</h2>
		<div><?php if(isset($ThemBannerQuangCao)){echo $ThemBannerQuangCao;} ?></div>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="ma"><strong>Mã banner :</strong></label>
						<input type="text" class="form-control" name="mabanner" value="<?=substr(md5(time()),0,10); ?>" readonly>
					</div>
					<div class="form-group">
						<label for="ten">
                            <strong>Chọn ảnh :</strong>
                        </label>
                        <input type="file" name="ImgBanner" class="form-control" id="ma">
					</div>
					<button type="submit" class="btn btn-default" name="thembanner">Thêm banner</button>
				</form>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">	
		</div>
	</div>
	<h2>Thông tin banner quảng cáo</h2>
		<table id="table">
			<thead >
				<tr>
					<th>Mã banner</th>
					<th>Hình ảnh</th>
					<th>Chỉnh sửa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$ShowBanner = $SanPham->ShowBanner();
					if($ShowBanner){
						$i = 0;
						while($RowBanner = $ShowBanner->fetch_assoc()){
							$i++;
						?>
							<tr class="info">
								<td><?=$i;?></td>
								<td><img src="../images/banner/<?=$RowBanner['HinhAnh']?>" alt="" width="100%"></td>
								<td style="text-align: center;">
									<span>
										<a class="agile-icon del_banner" data-id="<?=$RowBanner['IDSlider']?>" href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-times-circle"></i></a>
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
<!--delete sanpham -->
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
                        <a href="" class="btn btn-default XoaBanner" style="margin-left: 43%;">Xóa</a>
					</form>
        		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
      	</div>
    </div>
</div>
<script src="ajax/banner.js"></script>
  <!-- end modal sanpham -->
<?php include "include/footer.php" ?>