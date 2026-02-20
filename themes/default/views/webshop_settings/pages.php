<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">     
    <div class="box-content">
        <div class="row">
            <div class="col-sm-12">
                
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Page Title</th>
                            <th>Page Type</th>
                            <th>Page Section</th>
                            <th>Page Status</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(is_array($custom_pages)){
                        foreach ($custom_pages as $key => $page) {   
                          $tdclass = ($page['is_active'] == 1 ? ' style="font-weight:bold;" ' : '');
                    ?>
                        <tr>
                            <td <?=$tdclass?> ><?=($page['is_active'] == 1? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-ban text-danger"></i>')?> <?=$page['page_title']?></td>
                            <td><?=$page['page_type']?></td>
                            <td><?=$page['page_section']?></td>
                            <td <?=$tdclass?>><?=($page['is_active'] == 1? 'Active' : 'Deactive')?></td>                             
                            <td><?=$page['updated_at']?></td>
                            <td><a href="<?=base_url("webshop_settings/edit_custom_pages/$key/".md5($page['id']))?>">Edit</a></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
</div>

