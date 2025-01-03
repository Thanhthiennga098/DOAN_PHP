<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../database/database.php";
    include_once $filepath."/../database/format.php";
    include_once $filepath."/../database/session.php";
?>
<?php
    Class QuanLyKhachHang
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function DangKyTaiKhoan($TenTaiKhoan,$Email,$Password,$ConfirmPass){
            $TenTaiKhoan = mysqli_real_escape_string($this->db->link,$TenTaiKhoan);
            $Email = mysqli_real_escape_string($this->db->link,$Email);
            $Password = mysqli_real_escape_string($this->db->link,$Password);
            $ConfirmPass = mysqli_real_escape_string($this->db->link,$ConfirmPass);
            if(empty($TenTaiKhoan)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Khách hàng cần nhập tên tài khoản (*)
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
            }elseif(empty($Password)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Khách hàng cần nhập mật khẩu (*)
                </div>
                ';
                return $alert;
            }elseif(empty($ConfirmPass)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Khách hàng cần nhập lại khẩu (*)
                </div>
                ';
                return $alert;
            }elseif($Password != $ConfirmPass){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Mật khẩu không khớp. Vui lòng nhập lại (*)
                </div>
                ';
                return $alert;
            }else{
                $check = "SELECT * FROM tbl_khachhang WHERE TenTaiKhoan = '$TenTaiKhoan' LIMIT 1";
                $result_check = $this->db->select($check);
                if($result_check){
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Tài khoản này đã tồn tại. Vui lòng thử lại tài khoản khác (*)
                    </div>
                    ';
                    return $alert;
                }else{
                    $Password = md5($Password);
                    $DangKy = "INSERT INTO `tbl_khachhang`(`TenTaiKhoan`, `Email`, `MatKhau`) 
                    VALUES ('$TenTaiKhoan','$Email','$Password')";
                    $Result_DK = $this->db->insert($DangKy);
                    if($Result_DK){
                        $alert = '
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Đăng ký tài khoản khoản thành công !</strong>
                        </div>
                        ';
                        return $alert;
                    }else{
                        $alert = '
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Cảnh bảo !</strong> Có lỗi khi đăng ký tài khoản. Vui lòng thử lại sau (*)
                        </div>
                        ';
                        return $alert;
                    }
                }
            }
        }
        public function DangNhapTaiKhoan($TenTaiKhoan,$MatKhau){
            $TenTaiKhoan = mysqli_real_escape_string($this->db->link,$TenTaiKhoan);
            $MatKhau = mysqli_real_escape_string($this->db->link,$MatKhau);
            if(empty($TenTaiKhoan)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Khách hàng cần nhập tên tài khoản (*)
                </div>
                ';
                return $alert;
            }elseif(empty($MatKhau)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Khách hàng cần nhập mật khẩu (*)
                </div>
                ';
                return $alert;
            }else{
                $MatKhau = md5($MatKhau);
                $query = "SELECT * FROM tbl_khachhang WHERE TenTaiKhoan = '$TenTaiKhoan' AND MatKhau = '$MatKhau' LIMIT 1";
                $result = $this->db->select($query);
                if($result){
                    $value = $result->fetch_assoc();
                    Session::set('IDKhachHang',$value['IDKhachHang']);
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Đăng nhập thành công. Hệ thống sẽ tự động chuyển trang về trang chủ</strong>
                    </div>
                    <div class="loading">loading</div>
                    <meta http-equiv="refresh" content="2,trang-chu.html">   
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Tài khoản hoặc mật khẩu không đúng (*)
                    </div>
                    ';
                    return $alert;
                }
            }
        }
        public function LienHe($name,$email,$subject,$message){
            $name = mysqli_real_escape_string($this->db->link,$name);
            $email = mysqli_real_escape_string($this->db->link,$email);
            $subject = mysqli_real_escape_string($this->db->link,$subject);
            $message = mysqli_real_escape_string($this->db->link,$message);
            if(empty($name)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Vui lòng nhập tên liên hệ (*)
                </div>
                ';
                return $alert;
            }elseif(empty($email)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Vui lòng nhập email liên hệ (*)
                </div>
                ';
                return $alert;
            }elseif(empty($subject)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Vui lòng nhập nội dung liên hệ (*)
                </div>
                ';
                return $alert;
            }elseif(empty($message)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Vui lòng nhập nội dung liên hệ (*)
                </div>
                ';
                return $alert;
            }else{
                $query = "INSERT INTO `tbl_lienhe`(`TenKH`, `Email`, `TieuDe`, `NoiDung`) 
                VALUES ('$name','$email','$subject','$message')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Nội dung liên của bạn đã được gửi thành công. Hệ thống sẽ liên hệ trong giây lát !</strong>
                    </div>
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Có lỗi khi gửi tin nhắn đi (*)
                    </div>
                    ';
                    return $alert;
                }
            }
        }
        public function ShowLienHe(){
            $query = "SELECT * FROM tbl_lienhe ORDER BY IDLienHe DESC";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>