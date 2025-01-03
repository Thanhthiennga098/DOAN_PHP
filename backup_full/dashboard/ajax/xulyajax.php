<?php
    $conn = mysqli_connect("localhost","root","","thegioidauthom");
    mysqli_set_charset($conn,"utf8");
?>
<!-- Cập nhật loại sản phẩm -->
<?php
    if(isset($_POST['ID'])){
        $ID = $_POST['ID'];
        $TenTheLoai = $_POST['TTheLoai'];
        $MaTheLoai = $_POST['MTheLoai'];
        if(empty($TenTheLoai)){
            echo '
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Người dùng không được để trống phần này (*).</strong>
            </div>  
            ';
        }else{
            $query = "UPDATE tbl_theloai SET MaTheLoai = '$MaTheLoai', TenTheLoai = '$TenTheLoai' WHERE IDTheLoai = '$ID'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cập nhật loại sản phẩm vào cửa hàng thành công.</strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="2">   
                ';
            }else{
                echo '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Có lỗi khi cập nhật loại sản phẩm. Vui lòng thử lại</strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="2">
                ';
            }
        }
    }
?>
<!-- Cập nhật loại sản phẩm -->
<!-- Xóa loại sản phẩm -->
<?php
    if(isset($_GET['IDDel'])){
        $ID =  $_GET['IDDel'];
        $query = "DELETE FROM tbl_theloai WHERE IDTheLoai = '$ID'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa loại sản phẩm vào cửa hàng thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa loại sản phẩm. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa loại sản phẩm -->
<!-- Cập nhật thương hiệu sản phẩm -->
<?php
    if(isset($_POST['IDTHieu'])){
        $IDTHieu = $_POST['IDTHieu'];
        $TTHieu = $_POST['TTHieu'];
        if(empty($TTHieu)){
            echo '
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Người dùng không được để trống phần này (*).</strong>
            </div>  
            ';
        }else{
            $query = "UPDATE tbl_thuonghieu SET TenThuongHieu = '$TTHieu'
            WHERE IDThuongHieu = '$IDTHieu'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cập nhật thương hiệu sản phẩm vào cửa hàng thành công.</strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="2">   
                ';
            }else{
                echo '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Có lỗi khi cập nhật thương hiệu sản phẩm. Vui lòng thử lại</strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="2">
                ';
            }
        }
    }
?>
<!-- Cập nhật thương hiệu sản phẩm -->
<!-- Xóa loại thương hiệu sản phẩm -->
<?php
    if(isset($_GET['DelThuongHieu'])){
        $DelThuongHieu =  $_GET['DelThuongHieu'];
        $query = "DELETE FROM tbl_thuonghieu WHERE IDThuongHieu = '$DelThuongHieu'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa thương hiệu sản phẩm vào cửa hàng thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa thương hiệu sản phẩm. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa loại thương hiệu sản phẩm -->
<!-- Xóa sản phẩm -->
<?php
    if(isset($_GET['IDSanPham'])){
        $IDSanPham =  $_GET['IDSanPham'];
        $query = "DELETE FROM tbl_sanpham WHERE IDSanPham = '$IDSanPham'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa sản phẩm trong cửa hàng thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa sản phẩm. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa sản phẩm -->
<!-- Xóa chi tiết hình ảnh sản phẩm -->
<?php
    if(isset($_GET['IDHinhAnh'])){
        $IDHinhAnh =  $_GET['IDHinhAnh'];
        $query = "DELETE FROM tbl_chitietanh WHERE IDAnh = '$IDHinhAnh'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa chi tiết ảnh sản phẩm trong cửa hàng thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa chi tiết ảnh sản phẩm. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa chi tiết hình ảnh sản phẩm -->
<!-- Xóa banner quảng cáo -->
<?php
    if(isset($_GET['IDBanner'])){
        $IDBanner =  $_GET['IDBanner'];
        $query = "DELETE FROM tbl_slider WHERE IDSlider = '$IDBanner'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa banner quảng cáo sản phẩm trong cửa hàng thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa banner quảng cáo sản phẩm. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa banner quảng cáo -->

<!-- Xóa giỏ hàng -->
<?php
    if(isset($_GET['IDGioHang'])){
        $IDGioHang = $_GET['IDGioHang'];
        $query = "DELETE FROM tbl_giohang WHERE IDGioHang = '$IDGioHang'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa sản phẩm trong giỏ hàng thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa sản phẩm trong giỏ hàng. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa giỏ hàng -->
<!-- Xóa wistlish -->
<?php
    if(isset($_GET['IDWistlish'])){
        $IDWistlish = $_GET['IDWistlish'];
        $query = "DELETE FROM tbl_wishlist WHERE IDWishlist = '$IDWistlish'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa Wistlish thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa Wistlish. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">
            ';
        }
    }
?>
<!-- Xóa wistlish -->
<!-- Xóa liên hệ -->
<?php
    if(isset($_GET['IDLienHe'])){
        $IDLienHe = $_GET['IDLienHe'];
        $query = "DELETE FROM tbl_lienhe WHERE IDLienHe = '$IDLienHe'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa nội dung liên hệ thành công.</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="2">   
            ';
        }else{
            echo '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Có lỗi khi xóa nội dung liên hệ. Vui lòng thử lại</strong>
                </div>
                <div class="loading">loading</div>
                <meta http-equiv="refresh" content="1">
            ';
        }
    }
?>
<!-- Xóa liên hệ -->