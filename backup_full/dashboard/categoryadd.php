<?php include "include/header.php"; ?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['themtheloai'])){
        $MaLoai = $_POST['MaLoai'];
        $TenLoai = $_POST['TenLoai'];
        $ThemLoaiSP = $TheLoai->ThemLoaiSP($MaLoai,$TenLoai);
    }
?>
<!--<p>Noi dung</p>-->
<div class="agile-tables">
    <div class="w3l-table-info">
        <h2>Thêm loại sản phẩm</h2>
        <div id="out"><?php if(isset($ThemLoaiSP)){echo $ThemLoaiSP;} ?></div>
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="ma">Mã loại sản phẩm:</label>
                        <input type="text" class="form-control" name="MaLoai" value="<?php echo substr(sha1(time()),0,10) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ten">Tên loại sản phẩm:</label>
                        <input type="text" class="form-control" name="TenLoai">
                    </div>

                    <button type="submit" class="btn btn-default" name="themtheloai">Thêm loại sản phẩm</button>
                </form>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            </div>
        </div>
        <h2>Cập nhật loại sản phẩm</h2>
        <table id="table">
            <thead>
                <tr>
                    <th>Mã loại sản phẩm</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ShowLoaiSP = $TheLoai->ShowLoaiSP();
                    if($ShowLoaiSP){
                        while($RowLoaiSP = $ShowLoaiSP->fetch_assoc()){
                        ?>
                        <tr class="info" id="<?=$RowLoaiSP['IDTheLoai']?>">
                            <td id="MaTheLoai"><?=$RowLoaiSP['MaTheLoai']?></td>
                            <td id="TenTheLoai"><?=$RowLoaiSP['TenTheLoai']?></td>
                            <td style="text-align: center;">
                                <span>
                                    <a class="agile-icon edit_data" href="#" data-id="<?=$RowLoaiSP['IDTheLoai']?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></a>
                                </span>
                                <span>
                                    <a class="agile-icon delete_data" href="#" data-id="<?=$RowLoaiSP['IDTheLoai']?>" data-toggle="modal" data-target="#myModal1"><i class="fa fa-times-circle"></i></a>
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
                    <h4 class="modal-title">Cập nhật thông tin loại sản phẩm</h4>
                </div>
                <div class="modal-body">
                <div id="succ"></div>
                    <h3 class="text-center">Mời bạn nhập thông tin loại sản phẩm</h3>
                    <form action="">
                        <div class="form-group">
                            <label for="ma"><strong>Mã loại sản phẩm:</strong></label>
                            <input type="text" class="form-control" id="MaLoaiSP" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ten"><strong>Tên loại sản phẩm:</strong></label>
                            <input type="text" class="form-control" id="TenLoaiSP">
                        </div>
                        <input type="hidden" id="IDTheLoaiSP">
                        <button type="submit" class="btn btn-default update_theloai">Cập nhật loại sản phẩm</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- end mymodal -->
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
                <div id="Delete"></div>
                    <form action="">
                        <a href="" class="btn btn-default delete" style="margin-left: 43%;">Xóa</a>
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
<script src="ajax/theloai.js"></script>
<script>
	  $(document).ready(function(){
		  $("#out").fadeOut(10000);
	  });
  </script>
<?php
    include "include/footer.php";
?>