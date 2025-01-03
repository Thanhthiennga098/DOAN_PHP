<?php
include_once "include/header.php";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['guitinnhan'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $LienHeNhanVien = $KhachHang->LienHe($name,$email,$subject,$message,$IDKhachHang);
    }
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/GOkP8onbuyjGmN9Rc8Que5mw21CdSw6OuXpAKUuE6-4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="trang-chu.html">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Liên Hệ</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<div><?php if(isset($LienHeNhanVien)){echo $LienHeNhanVien;} ?></div>
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="map-contacts--2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7868812416455!2d106.6837799140208!3d10.827615092286829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528fa25bde37b%3A0x6a056e74c2de7a57!2zOTMgxJDGsOG7nW5nIE5ndXnhu4VuIER1LCBQaMaw4budbmcgNywgR8OyIFbhuqVwLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1592235863901!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <h2 class="title__line--4">Liên hệ với chúng tôi</h2>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Địa Chỉ</h2>
                        <p>93 Nguyễn Du, Phường 7, Gò Vấp</p>
                    </div>
                </div>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-envelope icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Email liên hệ</h2>
                        <p>linhhuynh.iuh@gmail.com</p>
                    </div>
                </div>

                <div class="address">
                    <div class="address__icon">
                        <i class="icon-phone icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Số điện thoại</h2>
                        <p>032-933-2354</p>
                    </div>
                </div>
            </div>      
        </div>
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">Gửi nội dung liên hệ</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="lien-he.html" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="name" placeholder="Tên của bạn*">
                                <input type="email" name="email" placeholder="Email của bạn*">
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box subject">
                                <input type="text" name="subject" placeholder="Tiêu đề*">
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="message" placeholder="Nội dung tin nhắn của bạn"></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="fv-btn" name="guitinnhan">Gửi tin nhắn</button>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
<?php include_once "include/footer.php"?>