<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../database/database.php";
    include_once $filepath."/../database/format.php";
?>
<?php
    Class QuanLyThuongHieu
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function ThemThuongHieu($mathuonghieu,$tenthuonghieu){
            $mathuonghieu = mysqli_real_escape_string($this->db->link,$mathuonghieu);
            $mathuonghieu = $this->fm->validation($mathuonghieu);
            $tenthuonghieu = mysqli_real_escape_string($this->db->link,$tenthuonghieu);
            $tenthuonghieu = $this->fm->validation($tenthuonghieu);
            if(empty($tenthuonghieu)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng không được để trống (*)
                </div>
                ';
                return $alert;
            }else{
                $query = "INSERT INTO `tbl_thuonghieu`(`MaThuongHieu`, `TenThuongHieu`) 
                VALUES ('$mathuonghieu','$tenthuonghieu')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thêm thương hiệu sản phẩm vào cửa hàng thành công.</strong>
                    </div>
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Có lỗi khi thêm thương hiệu sản phẩm. Vui lòng thử lại..
                    </div>
                    ';
                return $alert;
                }
            }
        }
        public function ShowThuongHieu(){
            $query = "SELECT * FROM tbl_thuonghieu";
            $result = $this->db->select($query);
            return $result;
        }
        public function SanPhamCungThuongHieu($IDThuongHieu){
            $query = "SELECT * FROM tbl_sanpham WHERE IDThuongHieu = '$IDThuongHieu'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>