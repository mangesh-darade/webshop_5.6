<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <ul class="nav nav-tabs">
        <li>&nbsp;</li>      
        <li><a href="<?= base_url('webshop_settings/index') ?>"><?= lang('Ecommerce Layout'); ?></a></li>
        <li><a href="<?= base_url('webshop_settings/sections') ?>"><?= lang('Homepage Sections'); ?></a></li>         
        <li class="active"><a href="#"><?= ucwords(lang($elemtnt_name)); ?></a></li>
    </ul>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">               
            <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'form_elements');
                echo form_open_multipart("webshop_settings/$elemtnt_name", $attrib);
            ?>
            <?php
                include_once('elements_sections/'.$elemtnt_name.'.php');
            ?>   
                <div style="clear: both; height: 10px;"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="controls">                            
                        <?php  echo form_submit('update_elements', lang("Save Changes"), 'class="btn btn-primary" id="update_elements_btn"'); ?>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>   
    </div>
</div>

