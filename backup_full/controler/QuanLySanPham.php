<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../database/database.php";
    include_once $filepath."/../database/format.php";
    session_start();
?>
<?php
    Class QuanLySanPham
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function ThemSanPham($data,$files){
            $MaSanPham = mysqli_real_escape_string($this->db->link,$data['MaSanPham']);
            $TenSanPham = mysqli_real_escape_string($this->db->link,$data['TenSanPham']);
            $Mota = mysqli_real_escape_string($this->db->link,$data['Mota']);
            $LoaiSP = mysqli_real_escape_string($this->db->link,$data['LoaiSP']);
            $ThuongHieu = mysqli_real_escape_string($this->db->link,$data['ThuongHieu']);
            $GiaBan = mysqli_real_escape_string($this->db->link,$data['GiaBan']);
            $GiaGoc = mysqli_real_escape_string($this->db->link,$data['GiaGoc']);
            $GiaKhuyenMai = mysqli_real_escape_string($this->db->link,$data['GiaKhuyenMai']);
            $SoLuongGoc = mysqli_real_escape_string($this->db->link,$data['SoLuongGoc']);
            $XuatXu = mysqli_real_escape_string($this->db->link,$data['XuatXu']);
            $SPNoiBat = mysqli_real_escape_string($this->db->link,$data['SPNoiBat']);
            $NongDo = mysqli_real_escape_string($this->db->link,$data['NongDo']);
            $NhomHuong = mysqli_real_escape_string($this->db->link,$data['NhomHuong']);
            $DoLuuHuong = mysqli_real_escape_string($this->db->link,$data['DoLuuHuong']);
            $PhongCach = mysqli_real_escape_string($this->db->link,$data['PhongCach']);
            $avatar = $_FILES['AnhDaiDien'];
            $avatarName = $avatar['name'];
            $avatarTmp_name = $avatar['tmp_name'];
            $ext = explode(".",$avatarName);
            $div = strtolower(end($ext));
            $img_name = substr(sha1(time()),0,10).".".$div;
            $upload = "../images/products/".$img_name;
            $array = array("jpg","png","jpeg","gif");
            if(empty($TenSanPham)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập tên sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($LoaiSP)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn thể loại sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($ThuongHieu)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn thương hiệu sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($GiaGoc)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập giá gốc (*)
                </div>
                ';
                return $alert;
            }elseif(empty($GiaBan)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập giá bán (*)
                </div>
                ';
                return $alert;
            }elseif(empty($SoLuongGoc)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập số lượng gốc (*)
                </div>
                ';
                return $alert;
            }elseif(empty($NongDo)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập nồng độ của sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($XuatXu)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập xuất xứ sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($SPNoiBat)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn loại sản phẩm nổi bật sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($avatarName)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn ảnh đại diện cho sản phẩm (*)
                </div>
                ';
                return $alert;
            }else{
                if(!in_array($div,$array)){
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> File ảnh của bạn không hỗ trợ, chỉ hỗ trợ "JNG","PNG","JPEG","GIF".
                        Vui lòng chọn lại ảnh..
                    </div>
                    ';
                    return $alert;
                }else{
                    move_uploaded_file($avatarTmp_name,$upload);
                    $query = "INSERT INTO tbl_sanpham(MaSanPham, TenSanPham, SoLuongGoc, 
                    GiaBan, GiaGoc, GiaKhuyenMai, NongDo, NhomHuong, XuatXu,
                    DoLuuHuong, PhongCach, DiemNoiBat, SanPhamNoiBat, IDTheLoai, IDThuongHieu, AnhDaiDien) 
                    VALUES ('$MaSanPham','$TenSanPham','$SoLuongGoc','$GiaBan','$GiaGoc','$GiaKhuyenMai','$NongDo',
                    '$NhomHuong','$XuatXu','$DoLuuHuong','$PhongCach','$Mota','$SPNoiBat','$LoaiSP','$ThuongHieu','$img_name')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = '
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Thêm sản phẩm vào cửa hàng thành công.</strong>
                        </div>
                        ';
                        return $alert;
                    }else{
                        $alert = '
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Cảnh bảo !</strong> Có lỗi khi thêm sản phẩm. Vui lòng thử lại..
                        </div>
                        ';
                        return $alert;
                    }
                }
            }
        }
        public function ShowSanPham(){
            $query = "SELECT tbl_sanpham.*, tbl_theloai.TenTheLoai, tbl_thuonghieu.TenThuongHieu
            FROM tbl_sanpham
            INNER JOIN tbl_theloai ON tbl_sanpham.IDTheLoai = tbl_theloai.IDTheLoai
            INNER JOIN tbl_thuonghieu ON tbl_sanpham.IDThuongHieu = tbl_thuonghieu.IDThuongHieu ORDER BY tbl_sanpham.IDSanPham DESC
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function ChiTietCapNhat($IDSanPham){
            $query = "SELECT * FROM tbl_sanpham WHERE IDSanPham = '$IDSanPham'";
            $result = $this->db->select($query);
            return $result;
        }
        public function CapNhatSanPham($IDSanPham,$data,$files){
            $IDSanPham = mysqli_real_escape_string($this->db->link,$IDSanPham);
            $MaSanPham = mysqli_real_escape_string($this->db->link,$data['MaSanPham']);
            $TenSanPham = mysqli_real_escape_string($this->db->link,$data['TenSanPham']);
            $Mota = mysqli_real_escape_string($this->db->link,$data['Mota']);
            $LoaiSP = mysqli_real_escape_string($this->db->link,$data['LoaiSP']);
            $ThuongHieu = mysqli_real_escape_string($this->db->link,$data['ThuongHieu']);
            $GiaBan = mysqli_real_escape_string($this->db->link,$data['GiaBan']);
            $GiaGoc = mysqli_real_escape_string($this->db->link,$data['GiaGoc']);
            $GiaKhuyenMai = mysqli_real_escape_string($this->db->link,$data['GiaKhuyenMai']);
            $SoLuongGoc = mysqli_real_escape_string($this->db->link,$data['SoLuongGoc']);
            $XuatXu = mysqli_real_escape_string($this->db->link,$data['XuatXu']);
            $SPNoiBat = mysqli_real_escape_string($this->db->link,$data['SPNoiBat']);
            $NongDo = mysqli_real_escape_string($this->db->link,$data['NongDo']);
            $NhomHuong = mysqli_real_escape_string($this->db->link,$data['NhomHuong']);
            $DoLuuHuong = mysqli_real_escape_string($this->db->link,$data['DoLuuHuong']);
            $PhongCach = mysqli_real_escape_string($this->db->link,$data['PhongCach']);
            $avatar = $_FILES['AnhDaiDien'];
            $avatarName = $avatar['name'];
            $avatarTmp_name = $avatar['tmp_name'];
            $ext = explode(".",$avatarName);
            $div = strtolower(end($ext));
            $img_name = substr(sha1(time()),0,10).".".$div;
            $upload = "../images/products/".$img_name;
            $array = array("jpg","png","jpeg","gif");
            if(empty($TenSanPham)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập tên sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($LoaiSP)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn thể loại sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($ThuongHieu)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn thương hiệu sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($GiaGoc)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập giá gốc (*)
                </div>
                ';
                return $alert;
            }elseif(empty($GiaBan)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập giá bán (*)
                </div>
                ';
                return $alert;
            }elseif(empty($SoLuongGoc)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập số lượng gốc (*)
                </div>
                ';
                return $alert;
            }elseif(empty($NongDo)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập nồng độ của sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($XuatXu)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần nhập xuất xứ sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($SPNoiBat)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn loại sản phẩm nổi bật sản phẩm (*)
                </div>
                ';
                return $alert;
            }else{
                move_uploaded_file($avatarTmp_name,$upload);
                if(empty($avatarName)){  
                    $CapNhat = "UPDATE tbl_sanpham SET TenSanPham='$TenSanPham',SoLuongGoc='$SoLuongGoc',
                    GiaBan='$GiaBan',GiaGoc='$GiaGoc',GiaKhuyenMai='$GiaKhuyenMai',NongDo='$NongDo',
                    NhomHuong='$NhomHuong',XuatXu='$XuatXu',DoLuuHuong='$DoLuuHuong',PhongCach='$PhongCach',
                    DiemNoiBat='$Mota',SanPhamNoiBat='$SPNoiBat',IDTheLoai='$LoaiSP',
                    IDThuongHieu='$ThuongHieu' WHERE IDSanPham = '$IDSanPham'"; 
                }else{
                    $CapNhat = "UPDATE tbl_sanpham SET TenSanPham='$TenSanPham',SoLuongGoc='$SoLuongGoc',
                    GiaBan='$GiaBan',GiaGoc='$GiaGoc',GiaKhuyenMai='$GiaKhuyenMai',NongDo='$NongDo',
                    NhomHuong='$NhomHuong',XuatXu='$XuatXu',DoLuuHuong='$DoLuuHuong',PhongCach='$PhongCach',
                    DiemNoiBat='$Mota',SanPhamNoiBat='$SPNoiBat',IDTheLoai='$LoaiSP',
                    IDThuongHieu='$ThuongHieu', AnhDaiDien = '$img_name' WHERE IDSanPham = '$IDSanPham'"; 
                }
                $checkCN = $this->db->update($CapNhat);
                if($checkCN){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cập nhật sản phẩm vào cửa hàng thành công.</strong>
                    </div>
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Có lỗi khi cập nhật sản phẩm. Vui lòng thử lại..
                    </div>
                    ';
                return $alert;
                }
            }
        }
        public function ThemHinhAnh($data,$files){
            $MaSanPham = mysqli_real_escape_string($this->db->link,$data['MaSanPham']);
            $MaSanPham = $this->fm->validation($MaSanPham);
            $avatar = $_FILES['AnhSanPham'];
            $avatarName = $avatar['name'];
            $avatarTmp_name = $avatar['tmp_name'];
            $ext = explode(".",$avatarName);
            $div = strtolower(end($ext));
            $img_name = substr(sha1(time()),0,10).".".$div;
            $upload = "../images/products/".$img_name;
            $array = array("jpg","png","jpeg","gif");
            if(empty($MaSanPham)){
                $alert ='
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn tên sản phẩm (*)
                </div>
                ';
                return $alert;
            }elseif(empty($avatarName)){
                $alert ='
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng cần chọn ảnh chi tiết sản phẩm (*)
                </div>
                ';
                return $alert;
            }else{
                if(!in_array($div,$array)){
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> File ảnh của bạn không hỗ trợ, chỉ hỗ trợ "JNG","PNG","JPEG","GIF".
                        Vui lòng chọn lại ảnh..
                    </div>
                    ';
                    return $alert;
                }else{
                    move_uploaded_file($avatarTmp_name,$upload);
                    $query = "INSERT INTO `tbl_chitietanh`(`MaSanPham`, `HinhAnh`) VALUES ('$MaSanPham','$img_name')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = '
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Thêm ảnh chi tiết sản phẩm vào cửa hàng thành công.</strong>
                        </div>
                        ';
                        return $alert;
                    }else{
                        $alert = '
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Cảnh bảo !</strong> Có lỗi khi thêm ảnh chi tiết sản phẩm sản phẩm. Vui lòng thử lại..
                        </div>
                        ';
                        return $alert;
                    }
                }
            }
        }
        public function ShowHinhAnh(){
            $query = "
            SELECT tbl_chitietanh.*, tbl_sanpham.TenSanPham
            FROM tbl_chitietanh
            INNER JOIN tbl_sanpham ON tbl_chitietanh.MaSanPham = tbl_sanpham.IDSanPham ORDER BY tbl_chitietanh.MaSanPham DESC
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function ThemBannerQuangCao($mabanner,$ImgBanner){
            $mabanner = mysqli_real_escape_string($this->db->link,$mabanner);
            $mabanner = $this->fm->validation($mabanner);
            $avatar = $_FILES['ImgBanner'];
            $avatarName = $avatar['name'];
            $avatarTmp_name = $avatar['tmp_name'];
            $ext = explode(".",$avatarName);
            $div = strtolower(end($ext));
            $img_name = substr(sha1(time()),0,10).".".$div;
            $upload = "../images/banner/".$img_name;
            $array = array("jpg","png","jpeg","gif");
            if(empty($avatarName)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Người dùng cần chọn ảnh banner quảng cáo (*)
                    </div>
                    ';
                return $alert;
            }else{
                if(!in_array($div,$array)){
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> File ảnh của bạn không hỗ trợ, chỉ hỗ trợ "JNG","PNG","JPEG","GIF".
                        Vui lòng chọn lại ảnh..
                    </div>
                    ';
                    return $alert;
                }else{
                    move_uploaded_file($avatarTmp_name,$upload);
                    $query = "INSERT INTO `tbl_slider`(`MaSlider`, `HinhAnh`) 
                    VALUES ('$mabanner','$img_name')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = '
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Thêm banner quảng cáo sản phẩm vào cửa hàng thành công.</strong>
                        </div>
                        ';
                        return $alert;
                    }else{
                        $alert = '
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Cảnh bảo !</strong> Có lỗi khi thêm banner quảng cáo sản phẩm. Vui lòng thử lại..
                        </div>
                        ';
                        return $alert;
                    }
                }
            }
        }
        public function ShowBanner(){
            $query = "SELECT * FROM tbl_slider ORDER BY IDSlider DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function ShowSanPhamMoi(){
            if(!isset($_GET['phan-trang'])){
                $trang = 1;
            }else{
                $trang = $_GET['phan-trang'];
            }
            $tungtrang = ($trang - 1)*4;
            $query = "SELECT * FROM tbl_sanpham ORDER BY IDSanPham DESC LIMIT $tungtrang,4";
            $result = $this->db->select($query);
            
            return $result;
        }
        public function SanPhamNoiBat(){
            if(!isset($_GET['phan-trang-hot'])){
                $tranghot = 1;
            }else{
                $tranghot = $_GET['phan-trang-hot'];
            }
            $tungtrang = ($tranghot - 1)* 4;
            $query = "SELECT * FROM tbl_sanpham WHERE SanPhamNoiBat = '1' ORDER BY RAND() LIMIT $tungtrang,4";
            $result = $this->db->select($query);
            return $result;
        }
        public function ShowChiTietSanPham($Id){
            $query = "SELECT tbl_sanpham.*, tbl_theloai.TenTheLoai
            FROM tbl_sanpham
            INNER JOIN tbl_theloai ON tbl_sanpham.IDTheLoai = tbl_theloai.IDTheLoai
            WHERE tbl_sanpham.IDSanPham = '$Id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function ShowChiTietHinhAnh($IDSanPham){
            $query = "SELECT * FROM tbl_chitietanh WHERE MaSanPham = '$IDSanPham'";
            $result = $this->db->select($query);
            return $result;
        }
        public function SanPhamXemNhieu($Id){
            error_reporting("all");
            $check = $_SESSION[$Id];
            if(empty($check)){
                $CapNhatTrangThai = "UPDATE tbl_sanpham SET LuotXem = LuotXem+1 WHERE IDSanPham = '$Id'";
                $resultTrangThai = $this->db->select($CapNhatTrangThai);
                return $resultTrangThai;
            }
        }
        public function ShowSanPhamXemNhieu(){
            if(!isset($_GET['phan-trang-page'])){
                $trangpage = 1;
            }else{
                $trangpage = $_GET['phan-trang-page'];
            }
            $tungtrang = ($trangpage - 1) * 4;
            $query = "SELECT * FROM tbl_sanpham HAVING LuotXem >= 60 ORDER BY RAND() LIMIT $tungtrang,4";
            $result = $this->db->select($query);
            return $result;
        }
        public function GioHangSanPham($IDSanPham,$SoLuong,$IDKhachHang){
            $IDSanPham = mysqli_real_escape_string($this->db->link,$IDSanPham);
            $IDKhachHang = mysqli_real_escape_string($this->db->link,$IDKhachHang);
            $SoLuong = mysqli_real_escape_string($this->db->link,$SoLuong);
            $CheckSanPham = "SELECT * FROM tbl_sanpham WHERE IDSanPham = '$IDSanPham'";
            $ResultSanPham = $this->db->select($CheckSanPham)->fetch_assoc();
            $TenSanPham = $ResultSanPham['TenSanPham'];
            $GiaBan = $ResultSanPham['GiaBan'];
            $GiaKhuyenMai = $ResultSanPham['GiaKhuyenMai'];
            $HinhAnh = $ResultSanPham['AnhDaiDien'];
            $query = "SELECT * FROM tbl_giohang WHERE IDSanPham = '$IDSanPham'";
            $select = $this->db->select($query);
            if($select){
                $UpdateSoLuong = "UPDATE tbl_giohang SET SoLuong = SoLuong + 1 WHERE IDSanPham = '$IDSanPham'";
                $ResultSoLuong = $this->db->update($UpdateSoLuong);
                if($ResultSoLuong){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="padding:20px!important">Thêm sản phẩm vào giỏ hàng thành công. <a href="gio-hang.html">Ấn để vào giỏ hàng</a></strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="1"> 
                    ';
                    return $alert;
                }
            }else{
                if($GiaKhuyenMai ==0){
                    $query = "INSERT INTO `tbl_giohang`(`IDSanPham`,`IDKhachHang`, `TenSanPham`, `SoLuong`, `Gia`, `HinhAnh`) 
                    VALUES ('$IDSanPham','$IDKhachHang','$TenSanPham','$SoLuong','$GiaBan','$HinhAnh')";
                }else{
                    $query = "INSERT INTO `tbl_giohang`(`IDSanPham`,`IDKhachHang`, `TenSanPham`, `SoLuong`, `Gia`, `HinhAnh`) 
                    VALUES ('$IDSanPham','$IDKhachHang','$TenSanPham','$SoLuong','$GiaKhuyenMai','$HinhAnh')";
                }
                $result = $this->db->insert($query);
                if($result){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="padding:20px!important">Thêm sản phẩm vào giỏ hàng thành công. <a href="gio-hang.html">Ấn để vào giỏ hàng</a></strong>  
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="1"> 
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Có lỗi khi thêm sản phẩm vào giỏ hàng. Vui lòng thử lại..
                    </div>
                    ';
                    return $alert;
                }
            }
        }
        public function ShowDanhMuc($IDTheLoai){
            $query = "SELECT * FROM tbl_sanpham WHERE IDTheLoai = '$IDTheLoai' ORDER BY RAND()";
            $result = $this->db->select($query);
            return $result;
        }
        public function TimKiemSanPham($keywordsp){
            $keywordsp = mysqli_real_escape_string($this->db->link,$keywordsp);
            $query = "SELECT * FROM tbl_sanpham WHERE TenSanPham LIKE '%$keywordsp%' OR 
            GiaBan LIKE '%$keywordsp%' OR PhongCach LIKE '%$keywordsp%' OR NongDo LIKE '%$keywordsp%'
            OR XuatXu LIKE '%$keywordsp%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function ShowGioHang($IDKhachHang){
            $query = "SELECT * FROM tbl_giohang WHERE IDKhachHang = '$IDKhachHang' ORDER BY IDGioHang DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function CapNhatSP($IDGioHang,$SoLuong){
            $query = "UPDATE tbl_giohang SET SoLuong = '$SoLuong' WHERE IDGioHang = '$IDGioHang'";
            $result = $this->db->update($query);
            if($result){
                $alert = '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cập nhật số lượng sản phẩm trong giỏ hàng thành công.</strong>
                </div>
                ';
                return $alert;
            }else{
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Có lỗi khi cập nhật sản phẩm. Vui lòng thử lại..
                </div>
                ';
                return $alert;
            }
        }
        public function ThanhToanHoaDon($TenKH,$HoKH,$TenCTy,$DiaChi,$ThanhPho,$MaBuuDien,
        $Email,$SoDienThoai,$NoiDung,$IDKhachHang){
            $TenKH = mysqli_real_escape_string($this->db->link,$TenKH);
            $HoKH = mysqli_real_escape_string($this->db->link,$HoKH);
            $TenCTy = mysqli_real_escape_string($this->db->link,$TenCTy);
            $DiaChi = mysqli_real_escape_string($this->db->link,$DiaChi);
            $ThanhPho = mysqli_real_escape_string($this->db->link,$ThanhPho);
            $MaBuuDien = mysqli_real_escape_string($this->db->link,$MaBuuDien);
            $Email = mysqli_real_escape_string($this->db->link,$Email);
            $SoDienThoai = mysqli_real_escape_string($this->db->link,$SoDienThoai);
            $NoiDung = mysqli_real_escape_string($this->db->link,$NoiDung);
            $IDKhachHang = mysqli_real_escape_string($this->db->link,$IDKhachHang);
            $sID = session_id();
            if(empty($TenKH)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập tên (*)
                    </div>
                    ';
                return $alert;
            }elseif(empty($HoKH)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập họ (*)
                    </div>
                    ';
                return $alert;
            }elseif(empty($DiaChi)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập địa chỉ giao hàng (*)
                    </div>
                    ';
                return $alert;
            }elseif(empty($ThanhPho)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập thành phố hiện tại (*)
                    </div>
                    ';
                return $alert;
            }elseif(empty($Email)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập email (*)
                    </div>
                    ';
                return $alert;
            }elseif(empty($SoDienThoai)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập số điện thoại (*)
                    </div>
                    ';
                return $alert;
            }elseif(empty($MaBuuDien)){
                $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Khách hàng cần nhập mã bưu điện (*)
                    </div>
                    ';
                return $alert;
            }else{
                $checkgiohang = "SELECT * FROM tbl_giohang WHERE IDKhachHang = '$IDKhachHang'";
                $resultgiohang = $this->db->select($checkgiohang);
                if($resultgiohang){
                    while($RowGioHang = $resultgiohang->fetch_assoc()){
                        $IDSanPham = $RowGioHang['IDSanPham'];
                        $HinhAnh = $RowGioHang['HinhAnh'];
                        $TenSanPham = $RowGioHang['TenSanPham'];
                        $TongTien = $RowGioHang['Gia'] * $RowGioHang['SoLuong'];
                        $DatHang = "INSERT INTO `tbl_chitietdonhang`(`IDKhachHang`, `IDSanPham`,`sID`, `TenSanPham`, 
                        `TongTien`, `Ten`, `Ho`, `TenCongTy`, `Tinh`, `MaBuuDien`, `Email`, `SoDienThoai`, `DiaChi`, 
                        `GhiChu`, `HinhAnh`) VALUES ('$IDKhachHang','$IDSanPham','$sID','$TenSanPham','$TongTien',
                        '$TenKH','$HoKH','$TenCTy','$ThanhPho','$MaBuuDien','$Email',
                        '$SoDienThoai','$DiaChi','$NoiDung','$HinhAnh')";
                        $Check = $this->db->insert($DatHang);
                        if($Check){
                            $Delete = "DELETE FROM tbl_giohang WHERE IDKhachHang = '$IDKhachHang'";
                            $ResultDelete = $this->db->delete($Delete);
                            if($ResultDelete){
                                echo "<script>window.location = 'chi-tiet-don-hang.html'</script>";
                            }
                        }else{
                            $alert = '
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Cảnh bảo !</strong> Đơn hàng của bạn đã bị lỗi. Vui lòng thử lại sau (*)
                                </div>
                                ';
                            return $alert;
                        }
                    }   
                }
            }
        }
        public function ShowChiTietDonHang($IDKhachHang){
            $query = "SELECT * FROM tbl_chitietdonhang WHERE IDKhachHang = '$IDKhachHang'";
            $result = $this->db->select($query);
            return $result;
        }
        public function ShowChiTietDonHangsID($IDKhachHang){
            $sID = session_id();
            $query = "SELECT * FROM tbl_chitietdonhang WHERE IDKhachHang = '$IDKhachHang' AND sID = '$sID'";
            $result = $this->db->select($query);
            return $result;
        }
        public function ViewDonHang($IDDonHang){
            $query = "SELECT * FROM tbl_chitietdonhang WHERE IDDonHang = '$IDDonHang'";
            $result = $this->db->select($query);
            return $result;
        }
        public function ShowDonHang(){
            $query = "SELECT * FROM tbl_chitietdonhang ORDER BY IDDonHang DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function XuLyDonHang1($TongTien,$ThoiGian,$IDDonHang){
            $xuly = "UPDATE tbl_chitietdonhang SET Status = '2' WHERE IDDonHang = '$IDDonHang' 
            AND TongTien = '$TongTien' AND NgayKhoiTao = '$ThoiGian'";
            $resultxuly = $this->db->update($xuly);
            return $resultxuly;
        }
        public function XuLyDonHang2($TongTien,$ThoiGian,$IDDonHang){
            $xuly = "UPDATE tbl_chitietdonhang SET Status = '3' WHERE IDDonHang = '$IDDonHang' 
            AND TongTien = '$TongTien' AND NgayKhoiTao = '$ThoiGian'";
            $resultxuly = $this->db->update($xuly);
            return $resultxuly;
        }
        public function XuLyDonHang3($TongTien,$ThoiGian,$IDDonHang){
            $xuly = "UPDATE tbl_chitietdonhang SET Status = '4' WHERE IDDonHang = '$IDDonHang' 
            AND TongTien = '$TongTien' AND NgayKhoiTao = '$ThoiGian'";
            $resultxuly = $this->db->update($xuly);
            return $resultxuly;
        }
        public function XuLyDonHang4($TongTien,$ThoiGian,$IDDonHang){
            $xuly = "UPDATE tbl_chitietdonhang SET Status = '5' WHERE IDDonHang = '$IDDonHang' 
            AND TongTien = '$TongTien' AND NgayKhoiTao = '$ThoiGian'";
            $resultxuly = $this->db->update($xuly);
            return $resultxuly;
        }
        public function XuLyDonHang5($TongTien,$ThoiGian,$IDDonHang){
            $xuly = "DELETE FROM tbl_chitietdonhang WHERE IDDonHang = '$IDDonHang' 
            AND TongTien = '$TongTien' AND NgayKhoiTao = '$ThoiGian'";
            $resultxuly = $this->db->delete($xuly);
            return $resultxuly;
        }
        public function XoaDonHang($IDXoaDon){
            $XoaDonHang = "DELETE FROM tbl_chitietdonhang WHERE IDDonHang = '$IDXoaDon'";
            $resultXoaDon = $this->db->delete($XoaDonHang);
            if($resultXoaDon){
                $alert = '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Xóa sản phẩm trong đơn hàng thành công !</strong> 
                </div>
                ';
                return $alert;
            }else{
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Có lỗi khi xóa đơn hàng. Vui lòng thử lại sau (*)
                </div>
                ';
            return $alert;
            }
        }
        public function HuyDonHang($IDHuyDH){
            $query = "DELETE FROM tbl_chitietdonhang WHERE IDDonHang = '$IDHuyDH'";
            $result = $this->db->update($query);
            if($result){
                $alert = '
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Hủy đơn hàng thành công !. <a href="trang-chu.html">Tiếp tục mua hàng</a></strong> 
                </div>
                ';
                return $alert;
            }else{
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Có lỗi khi hủy đơn hàng. Vui lòng thử lại sau (*)
                </div>
                ';
                return $alert;
            }
        }
        public function ThemWishlist($IDSanPham){
            $IDSanPham = mysqli_real_escape_string($this->db->link,$IDSanPham);
            $CheckWishlist = "SELECT * FROM tbl_sanpham WHERE IDSanPham = '$IDSanPham'";
            $ResultWishlist = $this->db->select($CheckWishlist)->fetch_assoc();
            if($ResultWishlist){
                $TenSanPham = $ResultWishlist['TenSanPham'];
                $HinhAnh = $ResultWishlist['AnhDaiDien'];
                $GiaBan = $ResultWishlist['GiaBan'];
                $GiaKhuyenMai = $ResultWishlist['GiaKhuyenMai'];
                $sID = session_id();
                if($GiaKhuyenMai ==0){
                    $query = "INSERT INTO `tbl_wishlist`(`IDSanPham`, `sID`, `TenSanPham`, `GiaBan`, `HinhAnh`) 
                    VALUES ('$IDSanPham','$sID','$TenSanPham','$GiaBan','$HinhAnh')";
                }else{
                    $query = "INSERT INTO `tbl_wishlist`(`IDSanPham`, `sID`, `TenSanPham`, `GiaBan`, `HinhAnh`) 
                    VALUES ('$IDSanPham','$sID','$TenSanPham','$GiaKhuyenMai','$HinhAnh')";
                }
                $result = $this->db->insert($query);
                if($result){
                    echo "<script>window.location = 'wishlist.html'</script>";
                }
            }
        }
        public function ShowWistlish(){
            $sID = session_id();
            $query = "SELECT * FROM tbl_wishlist WHERE sID = '$sID'";
            $result = $this->db->select($query);
            return $result;
        }
        public function MuaHangTimKiemSP($IDSanPham,$SoLuong,$IDKhachHang){
            $IDSanPham = mysqli_real_escape_string($this->db->link,$IDSanPham);
            $IDKhachHang = mysqli_real_escape_string($this->db->link,$IDKhachHang);
            $SoLuong = mysqli_real_escape_string($this->db->link,$SoLuong);
            $CheckSanPham = "SELECT * FROM tbl_sanpham WHERE IDSanPham = '$IDSanPham'";
            $ResultSanPham = $this->db->select($CheckSanPham)->fetch_assoc();
            $TenSanPham = $ResultSanPham['TenSanPham'];
            $GiaBan = $ResultSanPham['GiaBan'];
            $GiaKhuyenMai = $ResultSanPham['GiaKhuyenMai'];
            $HinhAnh = $ResultSanPham['AnhDaiDien'];
            $query = "SELECT * FROM tbl_giohang WHERE IDSanPham = '$IDSanPham'";
            $select = $this->db->select($query);
            if($select){
                $UpdateSoLuong = "UPDATE tbl_giohang SET SoLuong = SoLuong + 1 WHERE IDSanPham = '$IDSanPham'";
                $ResultSoLuong = $this->db->update($UpdateSoLuong);
                if($ResultSoLuong){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="padding:20px!important">Thêm sản phẩm vào giỏ hàng thành công. <a href="gio-hang.html">Ấn để vào giỏ hàng</a></strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="gio-hang.html"> 
                    ';
                    return $alert;
                }
            }else{
                if($GiaKhuyenMai ==0){
                    $query = "INSERT INTO `tbl_giohang`(`IDSanPham`,`IDKhachHang`, `TenSanPham`, `SoLuong`, `Gia`, `HinhAnh`) 
                    VALUES ('$IDSanPham','$IDKhachHang','$TenSanPham','$SoLuong','$GiaBan','$HinhAnh')";
                }else{
                    $query = "INSERT INTO `tbl_giohang`(`IDSanPham`,`IDKhachHang`, `TenSanPham`, `SoLuong`, `Gia`, `HinhAnh`) 
                    VALUES ('$IDSanPham','$IDKhachHang','$TenSanPham','$SoLuong','$GiaKhuyenMai','$HinhAnh')";
                }
                $result = $this->db->insert($query);
                if($result){
                    
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="padding:20px!important">Thêm sản phẩm vào giỏ hàng thành công. <a href="gio-hang.html">Ấn để vào giỏ hàng</a></strong>  
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="0,gio-hang.html"> 
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Có lỗi khi thêm sản phẩm vào giỏ hàng. Vui lòng thử lại..
                    </div>
                    ';
                    return $alert;
                }
            }
        }
    }
?>