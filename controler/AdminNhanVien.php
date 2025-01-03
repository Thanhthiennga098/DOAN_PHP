<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../database/database.php";
    include_once $filepath."/../database/format.php";
    include_once $filepath."/../database/session.php";
?>
<?php
    Class AdminNhanVien
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function DangKyNV($data,$files){
            $name = mysqli_real_escape_string($this->db->link,$data['name']);
            $email = mysqli_real_escape_string($this->db->link,$data['email']);
            $password = mysqli_real_escape_string($this->db->link,$data['password']);
            $confirm_password = mysqli_real_escape_string($this->db->link,$data['confirm_password']);
            $avatar = $_FILES['avatar'];
            $avatarName = $avatar['name'];
            $avatarTmp_name = $avatar['tmp_name'];
            $ext = explode(".",$avatarName);
            $div = strtolower(end($ext));
            $img_name = substr(sha1(time()),0,10).".".$div;
            $upload = "../images/".$img_name;
            $array = array("jpg","png","jpeg","gif");
            if(empty($name)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa nhập tên..
                </div>
                ';
                return $alert;
            }elseif(empty($email)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa nhập địa chỉ email..
                </div>
                ';
                return $alert;
            }elseif(empty($password)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa nhập mật khẩu..
                </div>
                ';
                return $alert;
            }elseif(empty($confirm_password)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa nhập lại mật khẩu..
                </div>
                ';
                return $alert;
            }elseif($password != $confirm_password){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Mật khẩu không khớp..
                </div>
                ';
                return $alert;
            }elseif(empty($avatarName)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa chọn ảnh đại diện..
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
                    $check = "SELECT * FROM tbl_nhanvien WHERE EmailNhanVien = '$email' LIMIT 1";
                    $result_check = $this->db->select($check);
                    if($result_check){
                        $alert = '
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Cảnh bảo !</strong> Tài khoản của bạn đã tồn tại. Vui lòng thử tại !
                        </div>
                        ';
                        return $alert;
                    }else{
                        $password = md5($password);
                        move_uploaded_file($avatarTmp_name,$upload);
                        $query = "INSERT INTO `tbl_nhanvien`(`TenNhanVien`, `EmailNhanVien`, `MatKhau`, `AnhDaiDien`) 
                        VALUES ('$name','$email','$password','$img_name')";
                        $result = $this->db->insert($query);
                        if($result){
                            $alert = '
                                <div class="loading">Loading&#8230;</div>
                                <meta http-equiv="refresh" content="2,dang-nhap.html">  
                            ';
                            return $alert;
                        }else{
                            $alert = '
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Cảnh bảo !</strong> Đăng ký tài khoản không thành công. Vui lòng thử lại sau
                            </div>
                            ';
                        return $alert;
                        }
                    }
                }
            }
        }
        public function DangNhapNV($email,$password){
            $email = mysqli_real_escape_string($this->db->link,$email);
            $password = mysqli_real_escape_string($this->db->link,$password);
            if(empty($email)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa nhập địa chỉ email..
                </div>
                ';
                return $alert;
            }elseif(empty($password)){
                $alert = '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cảnh bảo !</strong> Người dùng chưa nhập mật khẩu..
                </div>
                ';
                return $alert;
            }else{
                $password = md5($password);
                $query = "SELECT * FROM tbl_nhanvien WHERE EmailNhanVien = '$email' AND MatKhau = '$password' LIMIT 1";
                $result = $this->db->select($query);
                if($result){
                    $value = $result->fetch_assoc();
                    Session::set("adminlogin",true);
                    Session::set("IDNhanVien",$value['IDNhanVien']);
                    $alert = '
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Đăng nhập thành công. Hệ thống sẽ chuyển bạn đến trang chủ</strong>
                    </div>
                    <div class="loading">Loading&#8230;</div>
                    <meta http-equiv="refresh" content="2,trang-chu.html"> 
                    ';
                    return $alert;
                }else{
                    $alert = '
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cảnh bảo !</strong> Tài khoản hoặc mật khẩu không đúng
                    </div>
                    ';
                return $alert;
                }
            }
        }
        public function ShowNhanVien($IDNhanVien){
            $query = "SELECT * FROM tbl_nhanvien WHERE IDNhanVien = '$IDNhanVien' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>