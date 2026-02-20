<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-cog"></i><?= lang('webshop_settings'); ?></h2>        
    </div>
    <p class="introtext"><?= lang('update_info'); ?></p>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo form_open_multipart("webshop_settings/settings", $attrib);
                ?>
                <div class="row">
                    <div class="col-lg-12">                        
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border"><?= lang('Ecommorce_Configurations') ?></legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("Free_Delivery_On_Above_Amount", "free_delivery_above_amount"); ?>
                                    <?= form_input('free_delivery_above_amount', round($webshop_settings->free_delivery_above_amount), 'class="form-control tip" id="free_delivery_above_amount"  required="required"'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="suport_email"><?= lang("Suport_Email"); ?></label>
                                    <?= form_input('suport_email', $webshop_settings->suport_email, 'class="form-control tip" required="required" id="suport_email"'); ?>
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="suport_phone"><?= lang("Suport_Phone"); ?></label>
                                    <?= form_input('suport_phone', $webshop_settings->suport_phone, 'class="form-control tip" required="required" id="suport_phone"'); ?>
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("Return_Within_Days", "return_within_days"); ?>
                                    <?php
                                    $return_within_days = array(
                                        '1' => '1 Day',
                                        '2' => '2 Day',
                                        '3' => '3 Day',
                                        '7' => '7 Day',
                                        '10' => '10 Day',
                                        '15' => '15 Day',
                                        '20' => '20 Day',
                                        '30' => '30 Day',                                       																				'hindi'                     => 'Hindi',										'marthi'                    => 'Marathi'
                                    );
                                    echo form_dropdown('return_within_days', $return_within_days, $webshop_settings->return_within_days, 'class="form-control tip" id="return_within_days" required="required" style="width:100%;"');
                                    ?>
                                </div>
                            </div>                           
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang('Active_Multi_Outlets', 'active_multi_outlets'); ?>
                                    <div class="controls">  <?php
                                        $active_multi_outlets = array(1 => lang('Yes'), 0 => lang('No'));
                                        echo form_dropdown('active_multi_outlets', $active_multi_outlets, $webshop_settings->active_multi_outlets, 'class="tip form-control" required="required" id="active_multi_outlets" style="width:100%;"');
                                        ?> 
                                    </div>
                                </div>
                            </div>                                                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="overselling">Overselling</label>
                                    <div class="controls">
                                    <?php
                                        $overselling = array(1 => lang('Yes'), 0 => lang('No'));
                                        echo form_dropdown('overselling', $overselling, $webshop_settings->overselling, 'class="form-control tip" required="required" id="overselling" style="width:100%;"');
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="rounding">Rounding</label>
                                    <div class="controls">
                                    <?php
                                        $rounding = array(1 => lang('Yes'), 0 => lang('No'));
                                        echo form_dropdown('rounding', $rounding, $webshop_settings->rounding, 'class="form-control tip" required="required" id="rounding" style="width:100%;"');
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="cod">Cash On Delivery</label>
                                    <div class="controls">
                                    <?php
                                        $cod = array(1 => lang('Yes'), 0 => lang('No'));
                                        echo form_dropdown('cod', $cod, $webshop_settings->cod, 'class="form-control tip" required="required" id="cod" style="width:100%;"');
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="online_payment">Online Payment</label>
                                    <div class="controls">
                                    <?php
                                        $online_payment = array(1 => lang('Yes'), 0 => lang('No'));
                                        echo form_dropdown('online_payment', $online_payment, $webshop_settings->online_payment, 'class="form-control tip" required="required" id="online_payment" style="width:100%;"');
                                    ?>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"  for="warehouse_id"><?= lang("default_warehouse"); ?></label>
                                    <div class="controls"> 
                                        <?php                                        
                                        foreach ($warehouses as $warehouse) {
                                            $wh[$warehouse->id] = $warehouse->name . ' (' . $warehouse->code . ')';
                                        }
                                        echo form_dropdown('warehouse_id', $wh, $webshop_settings->warehouse_id, 'class="form-control tip" id="warehouse_id" required="required" style="width:100%;"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?= lang("default_biller", "biller"); ?>
                                    <?php
                                    $bl[""] = "";
                                    foreach ($billers as $biller) {
                                        $bl[$biller->id] = $biller->company != '-' ? $biller->company : $biller->name;
                                    }
                                    echo form_dropdown('biller_id', $bl,  $webshop_settings->biller_id, 'id="biller_id" data-placeholder="' . lang("select") . ' ' . lang("biller") . '" required="required" class="form-control input-tip select" style="width:100%;"');
                                    ?>
                                </div>
                            </div>                           
                        </fieldset>
                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </div>
                </div>
                <div style="clear: both; height: 10px;"></div>
                
                <?= form_close(); ?>
            </div>
        </div>
        
    </div>
</div>
 
