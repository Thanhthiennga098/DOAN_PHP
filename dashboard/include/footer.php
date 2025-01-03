<!--photoday-section-->
<div class="col-sm-4 wthree-crd">
    <div class="card">
        <div class="card-body">
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!--//photoday-section-->
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset = $(".header-main").offset().top;
        $(window).scroll(function() {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".header-main").addClass("fixed");
            } else {
                $(".header-main").removeClass("fixed");
            }
        });
    });
</script>
<!-- /script-for sticky-nav -->
<!--copy rights start here-->
<div class="copyrights">
    <p><p>&copy; 2024 Sản phẩm được quản lý bởi TienThanh | Design</p></p>
</div>
<!--//content-inner-->
<!--/sidebar-menu-->
<div class="sidebar-menu">
    <header class="logo1">
        <a href="trang-chu.html" class="sidebar-icon"><span class="fa fa-bars"></span></a>
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
        <div class="menu">
            <ul id="menu">
                <li><a href="trang-chu.html"><i class="fa fa-tachometer"></i> <span>Trang chủ</span><div class="clearfix"></div></a></li>
                <li id="menu-academico"><a href="quan-ly-nuoc-hoa.html"><i class="fa fa-viacoin" aria-hidden="true"></i><span>Quản lý nước hoa</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="the-loai.html">Loại sản phẩm</a></li>
                        <li id="menu-academico-avaliacoes"><a href="thuong-hieu.html">Thương hiệu sản phẩm</a></li>
                        <li id="menu-academico-avaliacoes"><a href="them-hinh-san-pham.html">Hình sản phẩm</a></li>
                    </ul>
                </li>
                <li id="menu-academico">
                    <a href="banner-quang-cao.html"><i class="fa fa-sliders" aria-hidden="true"></i>
                        <span>Banner quảng cáo</span>
                    </a>
                </li>
                <li id="menu-academico">
                    <a href="lien-he.html"><i class="fa fa-area-chart" aria-hidden="true"></i>
                        <span>Quản lý liên hệ</span>
                    </a>
                </li>
                <li id="menu-academico">
                    <a href="quan-ly-khach-hang.html"><i class="fa fa-user" aria-hidden="true"></i>
                        <span>Tài khoản khách hàng</span>
                    </a>
                </li>
                <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Khác</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="dang-nhap.html">Đăng nhập</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="dang-ky.html">Đăng ký</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="quan-ly-don-hang.html"><i class="fa fa-envelope nav_icon"></i><span>Đơn hàng</span><div class="clearfix"></div></a></li> 
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script>
    var toggle = true;
    $(".sidebar-icon").click(function() {
        if (toggle) {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({
                "position": "absolute"
            });
        } else {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({
                    "position": "relative"
                });
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<!--js -->
<script src="thuvien/js/jquery.nicescroll.js"></script>
<script src="thuvien/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="thuvien/js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="thuvien/js/raphael-min.js"></script>

</body>
</html>