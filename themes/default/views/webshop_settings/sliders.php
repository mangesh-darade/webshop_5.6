<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
    $SLIDE1 = $sliders['SLIDE_1'];
    $SLIDE2 = $sliders['SLIDE_2'];

    $sldrBg1            = $SLIDE1['is_updated'] ? $SLIDE1['background_image']   : 'multi_color_gradient.jpg' ;
    $sldrImg1           = $SLIDE1['is_updated'] ? $SLIDE1['slide_image']        : 'slide-1.png' ;
    $sldrTitle1         = $SLIDE1['is_updated'] ? $SLIDE1['title']              : "Turn. Click. Expand. Smart modular design simplifies adding storage for growing media." ;
    $sldrSubTitle1      = $SLIDE1['is_updated'] ? $SLIDE1['sub_title']          : "Powerful Six Core processor, vibrant 4KUHD display output and fast SSD elegantly cased in a soft alloy design." ;
    $sldrBtnCaption1    = $SLIDE1['is_updated'] ? $SLIDE1['button_caption']     : "Get It Yours" ;
    $sldrBottomCaption1 = $SLIDE1['is_updated'] ? $SLIDE1['bottom_caption']     : "Free Doorstep Delivery Service" ;    
    $sldrTitleColor1    = $SLIDE1['is_updated'] ? $SLIDE1['title_color']        : "#000000";
    $sldrSubTitleColor1 = $SLIDE1['is_updated'] ? $SLIDE1['subtitle_color']     : "#000000";
       
    $sldrBg2            = $SLIDE2['is_updated'] ? $SLIDE2['background_image']   : 'dark_green_gradient.jpg' ;
    $sldrImg2           = $SLIDE2['is_updated'] ? $SLIDE2['slide_image']        : 'slide-2.png' ;
    $sldrTitle2         = $SLIDE2['is_updated'] ? $SLIDE2['title']              : "Make your life easier with a selected Laundry Appliances." ;
    $sldrSubTitle2      = $SLIDE2['is_updated'] ? $SLIDE2['sub_title']          : "As well as providing innovative solutions to enhance your day to day life, we take pride in the quality and durability of our products." ;
    $sldrBtnCaption2    = $SLIDE2['is_updated'] ? $SLIDE2['button_caption']     : "Click Here to Explore Details" ;
    $sldrBottomCaption2 = $SLIDE2['is_updated'] ? $SLIDE2['bottom_caption']     : "Let Take a Load off Your Mind With 5 Year Warranty" ;  
    $sldrTitleColor2    = $SLIDE1['is_updated'] ? $SLIDE2['title_color']        : "#000000";
    $sldrSubTitleColor2 = $SLIDE1['is_updated'] ? $SLIDE2['subtitle_color']     : "#000000";
    
    $colorArr = array(
        "#FFFFFF"=>"White",  
        "#C0C0C0"=>"Silver",  
        "#808080"=>"Gray",  
        "#000000"=>"Black",  
        "#FF0000"=>"Red",  
        "#800000"=>"Maroon",  
        "#FFFF00"=>"Yellow",  
        "#808000"=>"Olive",  
        "#00FF00"=>"Lime",  
        "#008000"=>"Green",  
        "#00FFFF"=>"Aqua",  
        "#008080"=>"Teal",  
        "#0000FF"=>"Blue",  
        "#000080"=>"Navy",  
        "#FF00FF"=>"Fuchsia",  
        "#800080"=>"Purple",
    );
?>
<style>

    .slider_1 {
        <?php if($sldrBg1) { ?>
        background-image: url(<?= base_url('assets/mdata/'.$Customer_assets.'/uploads/webshop/slider/bg/').$sldrBg1 ?>); 
        <?php } ?>
        background-repeat: no-repeat; 
        
        background-color: #fff;
        height: 300px;
    }
    
    .slider_2 {
        <?php if($sldrBg2) { ?>
        background-image: url(<?= base_url('assets/mdata/'.$Customer_assets.'/uploads/webshop/slider/bg/').$sldrBg2 ?>); 
        <?php } ?>
        background-repeat: no-repeat; 
        
        background-color: #fff;
        height: 300px;
    }

</style>
<div class="box">
    <ul class="nav nav-tabs">
        <li>&nbsp;</li>      
        <li><a href="<?= base_url('webshop_settings') ?>"><?= lang('Ecommerce Layout'); ?></a></li>
        <li><a href="<?= base_url('webshop_settings/sections') ?>"><?= lang('Homepage Sections'); ?></a></li>
        <li class="active"><a href="#"><?= lang('Homepage Sliders'); ?></a></li>
    </ul>
    <div class="box-content"  style="background-color: #D9EDF7;">
        <div class="row">
            <div class="col-lg-12">               
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("webshop_settings/sliders", $attrib);
                ?>
                <div class="row">
                    <div class="col-lg-12">                          
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><input type="checkbox" name="is_active_1" <?= $SLIDE1['is_active'] ? 'checked="checked"' : ''?> class="form-control is_active_1" value="1" /> <?= lang('Display Homepage Slide 1') ?></legend>
                            <div class="box">
                                <div class="slider_1" id="view_slider_bg_1">
                                    <div class="col-md-6">
                                        <div class="caption">
                                            <h1 style="font-size: 1.6em; color:<?=$sldrTitleColor1?>;" id="view_slide_title_1"><?= $sldrTitle1?></h1>
                                            <p id="view_slide_subtitle_1" style="color:<?=$sldrSubTitleColor1?>; font-size: 1.2em; line-height: 1.5em; font-family:  Helvetica, Arial, 'Lucida Grande', sans-serif;"><?= $sldrSubTitle1 ?></p>
                                             
                                            <div id="view_btn_slide_button_1" style="<?= empty($sldrBtnCaption1) ? 'display: none' : '' ?>;" class="btn btn-warning"><span id="view_slide_button_1"><?= $sldrBtnCaption1 ?></span>
                                                <i class="tm tm-long-arrow-right"></i>
                                            </div>
                                             
                                            <p class="bottom-caption" style="margin-top: 20px;" id="view_slide_bottom_caption_1"><?= $sldrBottomCaption1 ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">                                   
                                        <img src="<?= base_url('assets/mdata/'.$Customer_assets.'/uploads/webshop/slider/slide/').$sldrImg1; ?>" id="view_slide_image_1" class="img img-responsive" style="height: 300px; float: right; <?= empty($sldrImg1) ? 'display: none;' : '' ?> " alt="slide_image_1">
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-md-8">
                                <div class="form-group col-sm-6">
                                    <?= lang("Slider Background", "slide_bg"); ?>
                                    <?php
                                    $files = scandir("assets/mdata/$Customer_assets/uploads/webshop/slider/bg/");
                                    $slide_bg1[''] = 'None';
                                    foreach ($files as $key => $name) {

                                        if ($name == '.' || $name == '..')
                                            continue;

                                        $slide_bg1[$name] = ucwords(str_replace(['.jpg', '_', '-'], ['', ' ', ' '], $name));
                                    }
                                    echo form_dropdown('slide_bg_1', $slide_bg1, $sldrBg1, 'class="form-control tip" id="slide_bg_1" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <?= lang("Slider Image", "Image"); ?>
                                    <?php
                                    $files = scandir("assets/mdata/$Customer_assets/uploads/webshop/slider/slide/");
                                    $slide_image1[''] = 'None';
                                    foreach ($files as $key => $name) {

                                        if ($name == '.' || $name == '..')
                                            continue;

                                        $slide_image1[$name] = ucwords(str_replace(['.jpg', '_', '-'], ['', ' ', ' '], $name));
                                    }
                                    echo form_dropdown('slide_image_1', $slide_image1, $sldrImg1, 'class="form-control tip" id="slide_image_1" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <?= lang("Slide Title", "Title"); ?>
                                    <input type="text" name="slide_title_1" id="slide_title_1" maxlength="150" value="<?=$sldrTitle1?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-3">
                                    <?= lang("Title Color", "Title Color"); ?>
                                    <?php                                    
                                     echo form_dropdown('title_color_1', $colorArr, $sldrTitleColor1, 'class="form-control tip" id="title_color_1" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <?= lang("Slide Subtitle", "Subtitle"); ?>
                                    <input type="text" name="slide_subtitle_1" id="slide_subtitle_1" maxlength="150" value="<?=$sldrSubTitle1?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-3">
                                    <?= lang("Subtitle Color", "SubTitle Color"); ?>
                                    <?php                                    
                                     echo form_dropdown('subtitle_color_1', $colorArr, $sldrSubTitleColor1, 'class="form-control tip" id="subtitle_color_1" required="required" style="width:100%;"');
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <?= lang("Slide Backgroung Preview", "Preview"); ?>
                                <img id="preview_bg" src="<?= base_url('assets/uploads/webshop/slider/bg/').$sldrBg1 ?>" style="<?= empty($sldrBg1) ? "display:none;" : '' ?>" width="100%" class="img" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <?= lang("Slide Button Caption", "Button"); ?>
                                    <input type="text" name="slide_button_1" id="slide_button_1" value="<?= $sldrBtnCaption1 ?>"  maxlength="50" class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <?= lang("Slide Button Link", "Button"); ?>
                                    <input type="text" name="slide_button_link_1" id="slide_button_link_1" value="<?= $SLIDE1['button_link']?>" maxlength="255" placeholder="Add Product Detail Page Link" class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <?= lang("Slide Bottom Text", "bottom"); ?>
                                    <input type="text" name="slide_bottom_1" id="slide_bottom_caption_1" maxlength="100" value="<?= $sldrBottomCaption1?>" placeholder="" class="form-control" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                
                <div style="clear: both; height: 10px;"></div>
                <div class="row">
                    <div class="col-lg-12">                          
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><input type="checkbox" name="is_active_2" <?= $SLIDE2['is_active'] ? 'checked="checked"' : ''?> class="form-control is_active_2" value="2" /> <?= lang('Display Homepage Slide 2') ?></legend>
                            <div class="box">
                                <div class="slider_2" id="view_slider_bg_2">
                                    <div class="col-md-6">
                                        <div class="caption">
                                            <h1 style="font-size: 1.6em; color:<?=$sldrTitleColor2?>;" id="view_slide_title_2"><?= $sldrTitle2?></h1>
                                            <p id="view_slide_subtitle_2" style="color:<?=$sldrSubTitleColor2?>; font-size: 1.2em; line-height: 1.5em; font-family:  Helvetica, Arial, 'Lucida Grande', sans-serif;"><?= $sldrSubTitle2?></p>
                                            
                                            <div id="view_btn_slide_button_2" style="<?= empty($sldrBtnCaption2) ? 'display: none' : '' ?>;" class="btn btn-warning"><span id="view_slide_button_1"><?= $sldrBtnCaption2 ?></span>
                                                <i class="tm tm-long-arrow-right"></i>
                                            </div>                                            
                                             
                                            <p class="bottom-caption" style="margin-top: 20px;" id="view_slide_bottom_caption_2"><?= $sldrBottomCaption2 ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="<?= base_url('assets/mdata/'.$Customer_assets.'/uploads/webshop/slider/slide/').$sldrImg2; ?>" id="view_slide_image_2" class="img img-responsive " style="height: 300px; float: right; <?= empty($sldrImg1) ? 'display: none;' : ''?>" alt="slide_image_2">
                                    </div>
                                </div>                                     
                            </div>
                            <div class="col-md-8">
                                <div class="form-group col-sm-6">
                                    <?= lang("Slider Background", "slide_bg"); ?>
                                    <?php
                                    $files = scandir("assets/mdata/$Customer_assets/uploads/webshop/slider/bg/");
                                    $slide_bg2[''] = 'None';
                                    foreach ($files as $key => $name) {

                                        if ($name == '.' || $name == '..')
                                            continue;

                                        $slide_bg2[$name] = ucwords(str_replace(['.jpg', '_', '-'], ['', ' ', ' '], $name));
                                    }
                                    echo form_dropdown('slide_bg_2', $slide_bg2, $sldrBg2, 'class="form-control tip" id="slide_bg_2" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <?= lang("Slider Image 2", "Image"); ?>
                                    <?php
                                    $files = scandir("assets/mdata/$Customer_assets/uploads/webshop/slider/slide/");
                                    $slide_image2[''] = 'None';
                                    foreach ($files as $key => $name) {
                                        if ($name == '.' || $name == '..')
                                            continue;

                                        $slide_image2[$name] = ucwords(str_replace(['.jpg', '_', '-'], ['', ' ', ' '], $name));
                                    }
                                    echo form_dropdown('slide_image_2', $slide_image2, $sldrImg2, 'class="form-control tip" id="slide_image_2" required="required" style="width:100%;"');
                                    ?>
                                </div>

                                <div class="form-group col-md-9">
                                    <?= lang("Slide Title", "Title"); ?>
                                    <input type="text" name="slide_title_2" id="slide_title_2" maxlength="150" value="<?= $sldrTitle2 ?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-3">
                                    <?= lang("Title Color", "Title Color"); ?>
                                    <?php                                    
                                     echo form_dropdown('title_color_2', $colorArr, $sldrTitleColor2, 'class="form-control tip" id="title_color_2" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <?= lang("Slide Subtitle", "Subtitle"); ?>
                                    <input type="text" name="slide_subtitle_2" id="slide_subtitle_2" maxlength="150" value="<?= $sldrSubTitle2 ?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-3">
                                    <?= lang("Subtitle Color", "SubTitle Color"); ?>
                                    <?php                                    
                                     echo form_dropdown('subtitle_color_2', $colorArr, $sldrSubTitleColor2, 'class="form-control tip" id="subtitle_color_2" required="required" style="width:100%;"');
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <?= lang("Slide Backgroung Preview", "Preview"); ?>
                                <img id="preview_bg2" src="<?= base_url('assets/mdata/'.$Customer_assets.'/uploads/webshop/slider/bg/').$sldrBg2 ?>" style="<?= empty($sldrBg2) ? "display:none;" : '' ?>" width="100%" class="img" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <?= lang("Slide Button Caption", "Button"); ?>
                                    <input type="text" name="slide_button_2" id="slide_button_2" value="<?= $sldrBtnCaption2 ?>" maxlength="50" class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <?= lang("Slide Button Link", "Button"); ?>
                                    <input type="text" name="slide_button_link_2" id="slide_button_link_2" value="<?= $SLIDE2['button_link']?>" maxlength="255" placeholder="Add Product Detail Page Link" class="form-control" />
                                </div>
                                <div class="form-group col-md-4">
                                    <?= lang("Slide Bottom Text", "bottom"); ?>
                                    <input type="text" name="slide_bottom_2" id="slide_bottom_caption_2" maxlength="100" value="<?= $sldrBottomCaption2 ?>" class="form-control" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div style="clear: both; height: 10px;"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="controls">
                        <?= form_submit('update_settings', lang("update_settings"), 'class="btn btn-primary update_settings"'); ?>
                        <?= form_submit('reset_default', lang("Reset Default"), 'class="btn btn-info reset_default"'); ?>
                        </div>
                    </div>
                </div>
            <?= form_close(); ?>
                
                <div style="clear: both; height: 10px;"></div>
                <?php if($file_error) { ?>
                <div class="alert alert-danger"><?=$error?></div>
                <?php } ?>
                <div style="clear: both; height: 10px;"></div>                
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                            echo form_open_multipart("webshop_settings/sliders_images", $attrib);
                        ?>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><?= lang('Upload Custome Images For Slider') ?></legend>                             
                            <div class="col-md-12">
                                <div class="form-group col-sm-5">
                                    <?= lang("Slider Background (Minimum Size: 1280 X 720)", "slide_bg"); ?>
                                    <input type="file" name="background_images" multiple="multiple" class="form-control" />
                                </div>
                                <div class="form-group col-sm-5">
                                    <?= lang("Slider Images (Minimum Size: 700 X 500)", "slide_img"); ?>
                                    <input type="file" name="slider_images" multiple="multiple" class="form-control" />
                                </div>
                                <div class="form-group col-sm-2">
                                    <div class="controls">
                                        <p>&nbsp;</p>
                                        <?= form_submit('upload_images', lang("Upload Images"), 'class="btn btn-primary upload_images"'); ?>                                    
                                    </div>
                                </div>
                            </div>
                            
                        </fieldset>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<script>
    $(document).ready(function () {

        $('#slide_bg_1').change(function () {
            var slide_bg_1 = $('#slide_bg_1').val();
            if(slide_bg_1) {
                var bg1 = "<?= base_url('assets/uploads/webshop/slider/bg/') ?>" + slide_bg_1;
                $('#preview_bg').css('display', '');
                $('.slider_1').css('background-image', 'url(' + bg1 + ')');
                $('#preview_bg').attr('src', bg1);
            } else {
                $('.slider_1').css('background-image', 'none');
                $('#preview_bg').css('display', 'none');
            }
        });
        $('#slide_bg_2').change(function () {
            var slide_bg_2 = $('#slide_bg_2').val();
            if(slide_bg_2) {
                var bg2 = "<?= base_url('assets/uploads/webshop/slider/bg/') ?>" + slide_bg_2;
                $('#preview_bg2').css('display', '');
                $('.slider_2').css('background-image', 'url(' + bg2 + ')');
                $('#preview_bg2').attr('src', bg2);
            } else {
                $('.slider_2').css('background-image', 'none');
                $('#preview_bg2').css('display', 'none');
            }
        });


        $('#slide_image_1').change(function () {
            var slide_image_1 = $('#slide_image_1').val();

            if(slide_image_1) {
                var slid1 = "<?= base_url('assets/uploads/webshop/slider/slide/') ?>" + slide_image_1;
                $('#view_slide_image_1').css('display','block');
                $('#view_slide_image_1').attr('src', slid1);
            } else {
                $('#view_slide_image_1').css('display','none'); 
            }
        });
        $('#slide_image_2').change(function () {
            var slide_image_2 = $('#slide_image_2').val();

            if(slide_image_2) {
                var slid2 = "<?= base_url('assets/uploads/webshop/slider/slide/') ?>" + slide_image_2;
                $('#view_slide_image_2').css('display','block');
                $('#view_slide_image_2').attr('src', slid2);                
            } else {
                $('#view_slide_image_2').css('display','none'); 
            }
        });
        
        $('#title_color_1').change(function () {
            var title_color_1 = $('#title_color_1').val();
            $('#view_slide_title_1').css('color', title_color_1);
        });
        $('#title_color_2').change(function () {
            var title_color_2 = $('#title_color_2').val();
            $('#view_slide_title_2').css('color', title_color_2);
        });

        $('#slide_title_1').keyup(function () {
            var slide_title_1 = $('#slide_title_1').val();

            $('#view_slide_title_1').html(slide_title_1);
        });
        $('#slide_title_2').keyup(function () {
            var slide_title_2 = $('#slide_title_2').val();

            $('#view_slide_title_2').html(slide_title_2);
        });
        
        
        $('#subtitle_color_1').change(function () {
            var subtitle_color_1 = $('#subtitle_color_1').val();
            $('#view_slide_subtitle_1').css('color', subtitle_color_1);
        });
        $('#subtitle_color_2').change(function () {
            var subtitle_color_2 = $('#subtitle_color_2').val();
            $('#view_slide_subtitle_2').css('color', subtitle_color_2);
        });
        
        $('#slide_subtitle_1').keyup(function () {
            var slide_subtitle_1 = $('#slide_subtitle_1').val();

            $('#view_slide_subtitle_1').html(slide_subtitle_1);
        });
        $('#slide_subtitle_2').keyup(function () {
            var slide_subtitle_2 = $('#slide_subtitle_2').val();

            $('#view_slide_subtitle_2').html(slide_subtitle_2);
        });
        
        
        $('#slide_button_1').keyup(function () {
            var slide_button_1 = $('#slide_button_1').val();
            if(slide_button_1) {
                $('#view_btn_slide_button_1').css('display','');
                $('#view_slide_button_1').html(slide_button_1);
            } else {
                $('#view_btn_slide_button_1').css('display','none'); 
            }
        });
        $('#slide_button_2').keyup(function () {
            var slide_button_2 = $('#slide_button_2').val();
            
            if(slide_button_2) {
                $('#view_btn_slide_button_2').css('display','');
                $('#view_slide_button_2').html(slide_button_2);
            } else {
                $('#view_btn_slide_button_2').css('display','none'); 
            }
        });


        $('#slide_bottom_caption_1').keyup(function () {
            var slide_bottom_caption_1 = $('#slide_bottom_caption_1').val();

            $('#view_slide_bottom_caption_1').html(slide_bottom_caption_1);
        });
        $('#slide_bottom_caption_2').keyup(function () {
            var slide_bottom_caption_2 = $('#slide_bottom_caption_2').val();

            $('#view_slide_bottom_caption_2').html(slide_bottom_caption_2);
        });

        <?php if(!$SLIDE1['is_updated']) { ?>
            $('.update_settings').click();
        <?php } ?>

    });

</script>
