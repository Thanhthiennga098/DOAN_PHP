<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../database/database.php";
    include_once $filepath."/../database/format.php";
?>
<?php
    Class QuanLyTheLoai
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function ThemLoaiSP($MaLoai,$TenLoai){
            $MaLoai = mysqli_real_escape_string($this->db->link,$MaLoai);
            $MaLoai = $this->fm->validation($MaLoai);
            $TenLoai = mysqli_real_escape_string($this->db->link,$TenLoai);
            $TenLoai = $this->fm->validation($TenLoai);
            if(empty($TenLoai)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng không được để trống (*)
                </div>
                ';
                return $alert;
            }else{
                $query = "INSERT INTO `tbl_theloai`(`MaTheLoai`, `TenTheLoai`) 
                VALUES ('$MaLoai','$TenLoai')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Thêm loại sản phẩm vào cửa hàng thành công.</strong>
                    </div>
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Có lỗi khi thêm loại sản phẩm. Vui lòng thử lại..
                    </div>
                    ';
                return $alert;
                }
            }
        }
        public function ShowLoaiSP(){
            $query = "SELECT * FROM tbl_theloai";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>