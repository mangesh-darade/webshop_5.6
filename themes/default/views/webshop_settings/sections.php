<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <ul class="nav nav-tabs">
        <li>&nbsp;</li>      
        <li><a href="<?= base_url('webshop_settings/index') ?>"><?= lang('Ecommerce Layout'); ?></a></li>
        <li class="active"><a href="#"><?= lang('Homepage Sections'); ?></a></li> 
        <li><a href="<?= base_url('webshop_settings/sliders')?>"><?= lang('Homepage Sliders'); ?></a></li>
    </ul>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">               
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("webshop_settings/sections", $attrib);
                ?>
                <div class="row">
                    <div class="col-lg-12">                          
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><?= lang('Homepage Sections Setting') ?></legend>                             
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sections Name</th>
                                    <th>Display Section Title</th>
                                    <th class="col-md-1">Display</th>
                                    <th class="col-md-1">Order</th>
                                    <th class="col-md-1">Setting</th>
                                </tr>
                                <?php
                                if (is_array($sections)) {
                                    foreach ($sections as $key => $section) {
                                        ?>
                                        <tr>
                                            <td style="text-transform: capitalize;">
                                                <?= str_replace('_', ' ', $section->section_name) ?>
                                                <input type="hidden" name="section_id[]" value="<?= $section->id ?>" />
                                                <input type="hidden" name="section_name[<?= $section->id ?>]" value="<?= $section->section_name ?>" />
                                            </td>
                                            <td><input type="text" name="section_title[<?= $section->id ?>]" value="<?= $section->section_title ?>" class="form-control" /></td>
                                            <td style="text-align: center;">
                                                <?php
                                                $checked = $section->display_status ? 'checked="checked" ' : '';
                                                ?>
                                                <input type="checkbox" name="display_status[<?= $section->id ?>]" id="section_<?= $section->id ?>" value="1" <?= $checked ?> class="form-control chk_active_section" />
                                            </td>
                                            <td><input type="number" name="display_order[<?= $section->id ?>]"  value="<?= $section->display_order ?>" class="form-control " /></td>
                                            <td><a href="<?= base_url('webshop_settings/elements/'.$section->section_name)?>" id="link_manage_section_<?= $section->id ?>">Manage</a></td>
                                        </tr>
                                        <script>$(document).ready(function () { set_section_manage_link('section_<?= $section->id ?>'); });</script>
                                    <?php
                                    } //end foreach
                                }//end if
                                ?>
                            </table>           
                        </fieldset>
                    </div>
                </div>
                <div style="clear: both; height: 10px;"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="controls">
                        <?= form_submit('update_settings', lang("Save Changes"), 'class="btn btn-primary"'); ?>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>   
    </div>
</div>
<script>
    $(document).ready(function () {
         
        $('input.chk_active_section').on('ifChanged', function(event){   
            var section_id  = $(this).attr('id');            
            set_section_manage_link( section_id );
        });
        
    });
    
    
    function set_section_manage_link( section_id ){
         
        const chkstatus = $('#'+section_id).iCheck('update')[0].checked; 

        if(chkstatus == true){                      
            $('#link_manage_'+section_id).show();           
        } else {                
            $('#link_manage_'+section_id).hide();  
        }
    }

</script>
