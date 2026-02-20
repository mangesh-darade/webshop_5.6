<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <ul class="nav nav-tabs">
        <li>&nbsp;</li>      
        <li class="active"><a href="#"><?= lang('Ecommerce Layout'); ?></a></li>
        <li><a href="<?= base_url('webshop_settings/sections')?>"><?= lang('Homepage Sections'); ?></a></li>
        <li><a href="<?= base_url('webshop_settings/sliders')?>"><?= lang('Homepage Sliders'); ?></a></li>
    </ul>
    <div class="box-content"  style="background-color: #D9EDF7;">
        <div class="row">
            <div class="col-lg-12">               
                <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("webshop_settings/index", $attrib);
                ?>
                <div class="row">
                    <div class="col-lg-12">                          
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><?= lang('Ecommerce Layout Settings') ?></legend>                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("Home Page Layour", "theme_layout"); ?>
                                    <?php
                                    /*
                                     * Note: Do not change the theme numbers.
                                     * All Styles and template layout is working as per the theme number.
                                     */ 
                                    
                                    $theme_layout["theme_1"] = "Custom Theme";
                                    $theme_layout["theme_9"] = "Default Theme";                                    
                                    
                                    echo form_dropdown('home_page', $theme_layout, $webshop_settings->home_page, 'class="form-control tip" id="home_page_theme" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?= lang("Product Listing Page Layout", "listing_layout"); ?>
                                    <?php
                                    $product_list_page = array(
                                        'list_page_filterbar'   => 'List Page Filterbar',
                                        'list_page_fullwidth'   => 'List Page Full Width',
                                        'list_page_two_sidebar' => 'List Page Right Products Coloum',
                                        'list_page_rightbar'    => 'List Page Right Filterbar',
                                       );
                                    echo form_dropdown('product_list_page', $product_list_page, $webshop_settings->product_list_page, 'class="form-control tip" id="product_list_page" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?= lang("Product Listing View", "listing_view"); ?>
                                    <?php
                                    $product_list_view = array(
                                        'list_grid'                 => 'Products Grid View',
                                        'list_grid_extended'        => 'Products Grid Extended View',
                                        'list'                      => 'Products List View',
                                        'list_large'                => 'Products List View Large',
                                        'list_small'                => 'Products List View Small',
                                        );
                                    echo form_dropdown('product_list_view', $product_list_view, $webshop_settings->product_list_view, 'class="form-control tip" id="product_list_view" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?= lang("Product Details Page View", "details_layout"); ?>
                                    <?php
                                    $product_description_layouts = array(
                                        'product_description_with_sidebar'   => 'With Sidebar',
                                        'product_description_full_width'     => 'Full Width',
                                        'product_description_extended'       => 'Extended',
                                       );
                                    echo form_dropdown('product_description', $product_description_layouts, $webshop_settings->product_description, 'class="form-control tip" id="product_description_layout" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group">                                    
                                    <?= lang("Theme Color", "theme_color"); ?>
                                    <?php
                                    $theme_color = array(
                                        'blue'         => 'Blue',
                                        'flat-green'   => 'Flat Green',
                                        'green'        => 'Green',
                                        'orange'       => 'Orange',
                                        'red'          => 'Red',
                                        'yellow'       => 'Yellow',
                                    );
                                    echo form_dropdown('theme_color', $theme_color, $webshop_settings->theme_color, 'class="form-control tip" id="theme_color" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                <div class="form-group" id="div_header_strip_style">
                                    <?= lang("Header Strip Style", "header_strip_style"); ?>
                                    <?php
                                    $header_strip = array(
                                        '1'   => 'Light Color',                                        
                                        '9'   => 'Dark Color',
                                        '4'   => 'Theme Color',
                                        );
                                    echo form_dropdown('header_strip_style', $header_strip, $webshop_settings->header_strip_style, 'class="form-control tip" id="header_strip_style" required="required" style="width:100%;"');
                                    ?>
                                </div>
                                
                                <div class="form-group">                                    
                                    <?= lang("Header Style", "header_style"); ?>
                                    <div id="div_header_style"></div> 
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="box">                                    
                                    <div class="box-header">
                                        <h2 id="preview_heading">Home Page Layout</h2>
                                    </div>
                                    <div class="box-body" style="height: 500px; overflow-y: scroll;">
                                        <img src="<?= base_url('assets/mdata/'.$Customer_assets.'/uploads/webshop/theme_1.png')?>" id="layout_page_preview" class="img img-responsive" />
                                    </div>
                                </div>
                            </div>                             
                    </fieldset>
                </div>
            </div>
            <div style="clear: both; height: 10px;"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="controls">
                        <?= form_submit('update_settings', lang("update_settings"), 'class="btn btn-primary"'); ?>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>   
</div>
</div>
<script>
$(document).ready(function(){
    /*
     * On Page lode actions
     */
    $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );
     
    var home_theme = $('#home_page_theme').val();
    manage_theme_settings_options(home_theme);
    
    setTimeout(function(){
        $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/'+home_theme+'.png' );
    }, 50);
    //End on page load actions
    
    $('#home_page_theme').change(function(){
        $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );
        home_theme = $('#home_page_theme').val();
        $('#preview_heading').html('Home Page Layout View');  
        manage_theme_settings_options(home_theme);
        
        setTimeout(function(){
            $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/'+home_theme+'.png' );
        }, 50);
        
    });
    
    $('#product_list_page').change(function(){
        $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );
        var list_page = $('#product_list_page').val();
        $('#preview_heading').html('Product List Page Layout View'); 
        
        setTimeout(function(){
            $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/'+list_page+'.png' );
        }, 50);
    });
    
    $('#product_list_view').change(function(){
        $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );       
        var list_view = $('#product_list_view').val();
        $('#preview_heading').html('Product Listing View'); 
        
        setTimeout(function(){
            $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/'+list_view+'.png' );
        }, 50);
       
    });
    
    $('#product_description_layout').change(function(){
        $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );         
        var description_layout = $('#product_description_layout').val();
        $('#preview_heading').html('Product Description Layout View');
        
        setTimeout(function(){
            $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/'+description_layout+'.png' );
        }, 50);
    });
    
    $('#header_strip_style').change(function(){
        $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );
        var style = $('#header_strip_style').val();
        var strip_style = [];
            strip_style[1]  = "header_strip_lite.png";
            strip_style[9]  = "header_strip_dark.png",
            strip_style[4]  = "header_strip_theme.png",
        $('#preview_heading').html('Header Strip Style View'); 

        setTimeout(function(){
            $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/' + strip_style[style] );
        }, 50);
    });
    
    $('#theme_color').change(function(){
        $('#layout_page_preview').attr('src', '<?=base_url('assets/images/')?>ajax-loader.gif' );
        var color = $('#theme_color').val();
        $('#preview_heading').html('Theme Color View'); 
        
        setTimeout(function(){
            $('#layout_page_preview').attr('src', 'https://simplypos.in/webshop_assets/' + 'theme_color_'+color+'.png' );
        }, 50);
    });
    
});

function manage_theme_settings_options(home_theme){
     
    if(home_theme == 'theme_9'){
        
        var header_style_option = '<option value="header_theme_default" selected="selected" >Default Header</option>';
                
    } else {
        
       var header_style_option =  '<option value="header_fixed_menubar" <?= $webshop_settings->header_style == 'header_fixed_menubar' ? 'selected="selected" ' : '' ?> >Fixed Menubar</option>';
           header_style_option += '<option value="header_fixed_searchbar" <?= $webshop_settings->header_style == 'header_fixed_searchbar' ? 'selected="selected" ' : '' ?>>Fixed Searchbar</option>';
            
    }
    
    var header_style = '<select name="header_style" class="form-control tip" id="header_style" required="required" style="width:100%;">'+header_style_option+'</select>';
    $('#div_header_style').html(header_style);
}
</script>
