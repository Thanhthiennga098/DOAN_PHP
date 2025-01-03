<!-- Start Slider Area -->
<div class="slider__container">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <?php
            $ShowBanner = $SanPham->ShowBanner();
            if($ShowBanner){
                while($RowBanner = $ShowBanner->fetch_assoc()){
                ?>
                <!-- Start Single Slide -->
                <div class="single__slide">
                    <img src="images/banner/<?=$RowBanner['HinhAnh']?>" alt="slider images" width="100%">
                </div>
                <!-- End Single Slide -->
                <?php
                }
            }
        ?>
    </div>
</div>
<!-- Start Slider Area -->