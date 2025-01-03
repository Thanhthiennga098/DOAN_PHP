<?php include "include/header.php"; ?>
<style>
    table tr th,table tr td{text-align: center;}
</style>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['themhinhanh'])){
        $ThemHinhAnh = $SanPham->ThemHinhAnh($_POST,$_FILES);
    }
?>
<!--<p>Noi dung</p>-->
<div class="agile-tables">
    <div class="w3l-table-info">
        <h2>Thêm ảnh chi tiết sản phẩm</h2>
        <div id="out"><?php if(isset($ThemHinhAnh)){echo $ThemHinhAnh;} ?></div>
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ma">Mã chi tiết sản phẩm:</label>
                        <input type="text" class="form-control" name="MaLoai" value="<?php echo substr(sha1(time()),0,10) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ten">Tên sản phẩm :</label>
                        <select name="MaSanPham" class="form-control">
                            <option value="">Chọn tên sản phẩm</option>
                            <?php
                                $ShowSanPham = $SanPham->ShowSanPham();
                                if($ShowSanPham){
                                    while($RowSanPham = $ShowSanPham->fetch_assoc()){
                                    ?>
                                    <option value="<?=$RowSanPham['IDSanPham']?>"><?=$RowSanPham['TenSanPham']?></option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ten">Ảnh sản phẩm :</label>
                        <input type="file" class="form-control" name="AnhSanPham">
                    </div>
                    <button type="submit" class="btn btn-default" name="themhinhanh">Thêm ảnh chi tiết sản phẩm</button>
                </form>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            </div>
        </div>
        <h2>Thông tin chi tiết sản phẩm</h2>
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
                    $ShowHinhAnh = $SanPham->ShowHinhAnh();
                    if($ShowHinhAnh){
                        while($RowHinhAnh = $ShowHinhAnh->fetch_assoc()){
                        ?>
                        <tr class="info" id="<?=$RowHinhAnh['IDAnh']?>">
                            <td id="MaTheLoai"><?=$RowHinhAnh['TenSanPham']?></td>
                            <td id="TenTheLoai"><img src="../images/products/<?=$RowHinhAnh['HinhAnh']?>" alt="" width="140px"></td>
                            <td style="text-align: center;">
                                <span>
                                    <a class="agile-icon delete_data" href="#" data-id="<?=$RowHinhAnh['IDAnh']?>" data-toggle="modal" data-target="#myModal1"><i class="fa fa-times-circle"></i></a>
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
<script>
    $(document).ready(function(){
        $(document).on("click",".delete_data",function(){
        var IDHinhAnh = $(this).attr("data-id");
        $(document).on("click",".delete",function(e){
            e.preventDefault();
            $.ajax({
                type:'get',
                url:'ajax/xulyajax.php',
                data:{IDHinhAnh:IDHinhAnh},
                success:function(data){
                    $("#Delete").fadeIn('slow').html(data);
                }
            });
        });
    });
    });
</script>
<script>
	  $(document).ready(function(){
		  $("#out").fadeOut(10000);
	  });
  </script>
<?php
    include "include/footer.php";
?>