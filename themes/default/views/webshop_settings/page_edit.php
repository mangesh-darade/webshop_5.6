<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">     
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">               
            <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'form_custom_pages');
                echo form_open_multipart("webshop_settings/edit_custom_pages", $attrib);
                echo '<input type="hidden" name="page_id" id="page_id" value="'.$page_data['id'].'" />';
            ?>
                <div class="col-md-12">
                   <div class="form-group all">
                        <?= lang("Page Title", "page_title") ;  ?>
                        <?= form_input('page_title', $page_data['page_title'], 'class="form-control" id="page_title"'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group all">
                        <?= lang("Page Type", "page_type");?>
                        <?php
                        $page_type = $page_data['page_type'];
                        $$page_type = ' selected="selected" ';
                        ?>
                        <select name="page_type" id="page_type" class="form-control" >
                            <option value="text" <?=$text?>>Add Page Content Manually</option>
                            <option value="file" <?=$file?> >Upload PDF/Text File</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group all">
                        <?= lang("Page Section", "page_section");?>
                        <?php
                        $page_section = $page_data['page_section'];
                        $$page_section = ' selected="selected" ';
                        ?>
                        <select name="page_section" id="page_section" class="form-control" >
                            <option value="header_strip" <?=$header_strip?> >Header Strip</option>
                            <option value="header_menu" <?=$header_menu?> >Header Menu</option>
                            <option value="footer_links" <?=$footer_links?> >Footer Link</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group all">
                        <?= lang("Page Status", "is_active");?>
                        <select name="is_active" id="is_active" class="form-control" >
                            <option value="1" <?= $page_data['is_active']==1 ? 'selected="selected" ':'' ?>>Active</option>
                            <option value="0" <?= $page_data['is_active']==0 ? 'selected="selected" ':'' ?>>Deactive</option>                            
                        </select>
                    </div>
                </div>
                <div class="col-md-12 div_page_data_input" id="div_page_file">
                   <div class="form-group all">
                        <?= lang("Upload PDF/Text File", "upload_file") ;  ?>
                        <?= '<input type="file" name="page_file" id="page_file" class="form-control" />'; ?>
                    </div>
                </div>
                <div class="col-md-12 div_page_data_input" id="div_page_text">
                   <div class="form-group all">
                        <?= lang("Page Text", "page_text") ;  ?>
                        <?= form_textarea('page_text', (isset($_POST['page_text']) && !empty($_POST['page_text']) ? $_POST['page_text'] : ($page_data['page_text'] != '' ? $page_data['page_text'] : '')), 'class="form-control" id="page_text"'); ?>
                    </div>
                </div>
                
                <div style="clear: both; height: 10px;"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="controls">                            
                        <?php  echo form_submit('update_custom_pages', lang("Save Changes"), 'class="btn btn-primary" id="update_custom_pages_btn"'); ?>
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
    
    $('.div_page_data_input').hide();
    
    $('#page_type').change(function(){
        
        load_page_inputs();
    });
    
    load_page_inputs();
});

function load_page_inputs(){
    
    $('.div_page_data_input').hide();
    
   var page_type = $('#page_type').val();
   
   $('#div_page_'+page_type).show();
}


</script>