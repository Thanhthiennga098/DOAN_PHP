<?php
	include "include/header.php";
?>
<?php
	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['themthuonghieu'])){
		$mathuonghieu = $_POST['mathuonghieu'];
		$tenthuonghieu = $_POST['tenthuonghieu'];
		$ThemThuongHieu = $ThuongHieu->ThemThuongHieu($mathuonghieu,$tenthuonghieu);
	}
?>
<!--<p>Noi dung</p>-->								
<div class="agile-tables">
	<div class="w3l-table-info">	
		<h2>Thêm thương hiệu sản phẩm</h2>
		<div id="out"><?php if(isset($ThemThuongHieu)){echo $ThemThuongHieu;} ?></div>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<form action="" method="post">
					<div class="form-group">
						<label for="ma"><strong>Mã thương hiệu:</strong></label>
						<input type="text" class="form-control" name="mathuonghieu" value="<?php echo substr(md5(time()),0,10); ?>" readonly>
					</div>
					<div class="form-group">
						<label for="ten"><strong>Tên thương hiệu:</strong></label>
						<input type="text" class="form-control" name="tenthuonghieu">
					</div>
					<button type="submit" class="btn btn-default" name="themthuonghieu">Thêm thương hiệu sản phẩm</button>
				</form>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">	
		</div>
	</div>
	<h2>Cập nhật thương hiệu sản phẩm</h2>
	<table id="table">
            <thead>
                <tr>
                    <th>Mã thương hiệu</th>
                    <th>Tên thương hiệu</th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ShowThuongHieu = $ThuongHieu->ShowThuongHieu();
                    if($ShowThuongHieu){
                        while($RowThuongHieu = $ShowThuongHieu->fetch_assoc()){
                        ?>
                        <tr class="info" id="<?=$RowThuongHieu['IDThuongHieu']?>">
                            <td id="MaThuongHieu"><?=$RowThuongHieu['MaThuongHieu']?></td>
                            <td id="TenThuongHieu"><?=$RowThuongHieu['TenThuongHieu']?></td>
                            <td style="text-align: center;">
                                <span>
                                    <a class="agile-icon Update_TH" href="#" data-id="<?=$RowThuongHieu['IDThuongHieu']?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></a>
                                </span>
                                <span>
                                    <a class="agile-icon Delete_TH" href="#" data-id="<?=$RowThuongHieu['IDThuongHieu']?>" data-toggle="modal" data-target="#myModal1"><i class="fa fa-times-circle"></i></a>
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
  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
    <!-- Modal content-->
    	<div class="modal-content">
        	<div class="modal-header">
          		<button type="button" class="close" data-dismiss="modal">&times;</button>
          		<h4 class="modal-title">Cập nhật thông tin thương hiệu sản phẩm</h4>
        	</div>
        	<div class="modal-body">
				<div id="thuonghieu"></div>
          		<h3 class="text-center">Mời bạn nhập thông tin thương hiệu sản phẩm</h3>
					<form action="">
						<div class="form-group">
							<label for="ma">Mã thương hiệu:</label>
							<input type="text" class="form-control" id="MaTH" readonly>
						</div>
						<div class="form-group">
							<label for="ten">Tên thương hiệu:</label>
							<input type="text" class="form-control" id="TenTH">
						</div>
						<input type="hidden" id="ID_TH">
						<button type="submit" class="btn btn-default CapNhat">Cập nhật thương hiệu sản phẩm</button>
					</form>
       		 	</div>
        	<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
    	</div> 
    </div>
</div>
<!-- end mymodal -->
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
						<div id="Delete"></div>
					<form action="">
						<a href="" class="btn btn-default XoaThuongHieu" style="margin-left: 43%;">Xóa</a>
					</form>
        		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
      	</div>
    </div>
</div>
  <!-- end modal sanpham -->
<script src="ajax/thuonghieu.js"></script>
  <script>
	  $(document).ready(function(){
		  $("#out").fadeOut(10000);
	  });
  </script>
<?php include "include/footer.php" ?>