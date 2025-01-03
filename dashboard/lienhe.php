<?php
	include "include/header.php"
?>
<!--<p>Noi dung</p>-->								
<div class="agile-tables">
	<div class="w3l-table-info">
		<h2>Quản lý liên hệ khách hàng</h2>
		<table id="table">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Tên khách hàng</th>
					<th>Email</th>
					<th>Tiêu đề</th>
					<th>Nội dung</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$ShowLienHe = $Checkkhachang->ShowLienHe();
					if($ShowLienHe){
						$i = 0;
						while($RowLienHe = $ShowLienHe->fetch_assoc()){
							$i++;
						?>
						<tr class="danger" id="<?=$RowLienHe['IDLienHe'];?>">
							<td><?=$i;?></td>
							<td><?=$RowLienHe['TenKH'];?></td>
							<td><?=$RowLienHe['Email'];?></td>
							<td><?=$RowLienHe['TieuDe'];?></td>
							<td><?=$RowLienHe['NoiDung'];?></td>
							<td><a class="agile-icon delete_lienhe" href="#" data-id="<?=$RowLienHe['IDLienHe'];?>" data-toggle="modal" data-target="#myModal1">
							<i class="fa fa-times-circle"></i></a></td>
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
                        <a href="" class="btn btn-default XoaLienHe" style="margin-left: 43%;">Xóa</a>
					</form>
        		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
      	</div>
    </div>
</div>
<script src="ajax/lienhe.js"></script>
<?php include "include/footer.php"; ?>