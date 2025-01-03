<?php include "include/header.php" ?>
<?php
    if(isset($_GET['id'])){
        $IDSanPham = $_GET['id'];
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['Capnhatsanpham'])){
        $CapNhatSanPham = $SanPham->CapNhatSanPham($IDSanPham,$_POST,$_FILES);
    }
?>
<div class="agile-tables">
		<div class="w3l-table-info">
            <h2>Cập nhật sản phẩm</h2>
            <?php if(isset($CapNhatSanPham)){echo $CapNhatSanPham;} ?>
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <?php
                        $CapNhat = $SanPham->ChiTietCapNhat($IDSanPham);
                        if($CapNhat){
                            while($RowCapNhat = $CapNhat->fetch_assoc()){
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="ma">Mã sản phẩm:</label>
                                    <input type="text" class="form-control" name="MaSanPham" value="<?=$RowCapNhat['MaSanPham']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ten">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" name="TenSanPham" value="<?=$RowCapNhat['TenSanPham']?>">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Mô tả:</label>
                                    <textarea class="form-control" rows="5" name="Mota"><?=$RowCapNhat['DiemNoiBat']?></textarea>
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
                                                <option 
                                                <?php
                                                    if($RowCapNhat['IDTheLoai'] == $RowLoaiSP['IDTheLoai']){echo 'selected';}
                                                ?>
                                                value="<?=$RowLoaiSP['IDTheLoai']?>"><?=$RowLoaiSP['TenTheLoai']?></option>
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
                                                <option
                                                <?php
                                                    if($RowCapNhat['IDThuongHieu'] == $RowThuongHieu['IDThuongHieu']){echo 'selected';}
                                                ?>
                                                value="<?=$RowThuongHieu['IDThuongHieu']?>"><?=$RowThuongHieu['TenThuongHieu']?></option>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gia">Giá gốc:</label>
                                    <input type="number" class="form-control" name="GiaGoc" min="0"  value="<?=$RowCapNhat['GiaGoc']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Giá bán:</label>
                                    <input type="number" class="form-control" name="GiaBan" min="0" value="<?=$RowCapNhat['GiaBan']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Giá khuyễn mãi:</label>
                                    <input type="number" class="form-control" name="GiaKhuyenMai" min="0" value="<?=$RowCapNhat['GiaKhuyenMai']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Nồng độ:</label>
                                    <input type="numbtextareaer" class="form-control" name="NongDo" value="<?=$RowCapNhat['NongDo']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Nhóm hương:</label>
                                    <input type="numbtextareaer" class="form-control" name="NhomHuong" value="<?=$RowCapNhat['NhomHuong']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Độ lưu hương:</label>
                                    <input type="numbtextareaer" class="form-control" name="DoLuuHuong" value="<?=$RowCapNhat['DoLuuHuong']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Phong cách:</label>
                                    <input type="numbtextareaer" class="form-control" name="PhongCach" value="<?=$RowCapNhat['PhongCach']?>">
                                </div>
                                <div class="form-group">
                                    <label for="gia">Số lượng gốc:</label>
                                    <input type="number" class="form-control" name="SoLuongGoc" min="0" value="<?=$RowCapNhat['SoLuongGoc']?>">
                                </div>
                                <div class="form-group">
                                    <label for="xuatxu">Xuất xứ:</label>
                                    <input type="textarea" class="form-control" name="XuatXu" value="<?=$RowCapNhat['XuatXu']?>">
                                </div>
                                <div class="form-group">
                                    <label for="xuatxu">Loại sản phẩm:</label>
                                    <select name="SPNoiBat" id="" class="form-control">
                                        <option value="">Vui lòng chọn loại sản phẩm nổi bật (*)</option>
                                        <?php
                                            if($RowCapNhat['SanPhamNoiBat'] == '1'){
                                            ?>
                                                <option value="1" selected>Nổi bật</option>
                                                <option value="2">Không nổi bật</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value="1">Nổi bật</option>
                                                <option value="2" selected>Không nổi bật</option>
                                            <?php
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="xuatxu">Ảnh đại diện</label><br>
                                    <img src="../images/products/<?=$RowCapNhat['AnhDaiDien']?>" alt="" width="140px">
                                    <input type="file" class="form-control" name="AnhDaiDien">
                                </div>
                                <button type="submit" class="btn btn-default" name="Capnhatsanpham">Cập nhật sản phẩm</button>
                            </form>
                            <?php
                            }
                        }
                    ?>
				</div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                <div class="clearfix"></div>
			</div>
		</div>
    </div>
</div>
<?php include "include/footer.php" ?>