<div class="home-v1-slider home-slider">
<?php
    $SLIDE1 = $sliders['SLIDE_1'];
    $SLIDE2 = $sliders['SLIDE_2'];
    
    $sldrBg1            = $SLIDE1['background_image'] ? "url(". $uploads ."webshop/slider/bg/".$SLIDE1['background_image'].")"  : 'none';
    $sldrImg1           = $SLIDE1['slide_image'];
    $sldrTitle1         = $SLIDE1['title'];
    $sldrSubTitle1      = $SLIDE1['sub_title'];
    $sldrBtnCaption1    = $SLIDE1['button_caption'];
    $sldrBtnLink1       = $SLIDE1['button_link'];
    $sldrBottomCaption1 = $SLIDE1['bottom_caption'];    
    $is_active1         = $SLIDE1['is_active'];    
    $title_color1       = $SLIDE1['title_color'];    
    $subtitle_color1    = $SLIDE1['subtitle_color'];    
    
       
    $sldrBg2            = $SLIDE2['background_image'] ? "url(". $uploads ."webshop/slider/bg/".$SLIDE2['background_image'].")"  : 'none';
    $sldrImg2           = $SLIDE2['slide_image'];
    $sldrTitle2         = $SLIDE2['title'];
    $sldrSubTitle2      = $SLIDE2['sub_title'];
    $sldrBtnCaption2    = $SLIDE2['button_caption'];
    $sldrBtnLink2       = $SLIDE1['button_link'];
    $sldrBottomCaption2 = $SLIDE2['bottom_caption'];  
    $is_active2         = $SLIDE2['is_active']; 
    $title_color2       = $SLIDE2['title_color'];    
    $subtitle_color2    = $SLIDE2['subtitle_color'];  
    
    ?>
    <?php if($is_active1) { ?>
    <div class="slider-1" style="background-image: <?=$sldrBg1?>;">
        <img src="<?= $uploads ?>webshop/slider/slide/<?=$sldrImg1?>" style="<?= empty($sldrImg1) ? 'display: none;' : '' ?>" alt="slider-1">
        <div class="caption">
            <div class="title" style="color:<?=$title_color1?>;"><?=$sldrTitle1?></div>
            <div class="sub-title" style="color:<?=$subtitle_color1?>;"><?=$sldrSubTitle1?></div>
            <div class="button" style="<?= empty($sldrBtnCaption1) ? 'display: none' : '' ?>;" >
                <a href="<?=$sldrBtnLink1 ? $sldrBtnLink1 : '#'?>"><?=$sldrBtnCaption1?> <i class="tm tm-long-arrow-right"></i></a>
            </div>
            <div class="bottom-caption" style="color:#000000;"><?=$sldrBottomCaption1?></div>
        </div>
    </div>
    <?php } ?>
    <!-- .slider-1 -->
    <?php if($is_active2) { ?>
     <div class="slider-1 slider-2" style="background-image: <?=$sldrBg2?>;">
        <img src="<?= $uploads ?>webshop/slider/slide/<?=$sldrImg2?>" style="<?= empty($sldrImg2) ? 'display: none;' : '' ?>" alt="slider-2">
        <div class="caption">
            <div class="title" style="color:<?=$title_color2?>;"><?=$sldrTitle2?></div>
            <div class="sub-title" style="color:<?=$subtitle_color2?>;"><?=$sldrSubTitle2?></div>
            <div class="button" style="<?= empty($sldrBtnCaption2) ? 'display: none' : '' ?>;" >
                <a href="<?=$sldrBtnLink2 ? $sldrBtnLink2 : '#'?>"><?=$sldrBtnCaption2?> <i class="tm tm-long-arrow-right"></i></a>
            </div>
            <div class="bottom-caption" style="color:#000000;"><?=$sldrBottomCaption2?> </div>
        </div>
    </div>
    <?php } ?>
    <!-- .slider-2 -->
</div>
<!-- .home-v1-slider -->