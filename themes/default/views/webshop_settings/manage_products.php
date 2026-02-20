<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= lang('Manage Products For E-Shop & Ecommerce'); ?></h2>
    </div>
    <div class="box-content">
        <?php
//        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'name' => "manage_products", 'id' => "manage_products");
//        echo form_open_multipart("eshop_admin/manage_products/$category_id", $attrib, ['action' => 'save_changes']);
         
        ?>
        <div class="row">
            <div class="col-sm-4">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Categories</th>                         
                        <th>Status</th>                         
                    </thead>
                <?php
                if(is_array($categories)){
                    echo '<tbody> ';
                    foreach ($categories as $category) {
                        
                        /*
                         * This view load into two different controller eshop & webshop
                         * To manage current controller path using server veriable.
                         */
                        $mvc = explode('/', $_SERVER['REDIRECT_QUERY_STRING']);                        
                        $cm = $mvc[1].'/'.$mvc[2]; //Get Current Controler & Method function from url
                        
                        $checked = ($category['in_eshop'] || $category['id'] == $category_id) ? ' checked="checked" ' : '';
                        $active = $category['id'] == $category_id ? ' bg-success ' : '';
                        $in_eshop = $category['in_eshop'] ? '<a href="'.base_url($cm.'/'.$category['id']).'"><i class="fa fa-list text-success"></i></a>' : '<i class="fa fa-ban text-danger"></i>';
                                                
                        echo  '<tr><td class="'.$active.'"><input type="checkbox" name="categories[]" value="'.$category['id'].'" '.$checked.' parent="0" class="checkbox eshop_categories" /></td>                           
                                <td class="'.$active.'">'.$category['name'].'</td>'
                                . '<td class="text-center '.$active.' eshop_category_'.$category['id'].'">'.$in_eshop.'</td>'
                                . '<tr>';
                    }
                    echo '</tbody> ';
                }
                ?>                     
                 </table>
            </div>
            <div class="col-sm-8">
            <?php
            if((bool)$subcategories) {
            ?>
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead><tr><th colspan="<?= count($subcategories)+1?>">Subcategories</th></tr></thead>
                        <tbody>
                            <tr>
                        <?php
                       // echo '<td><input type="checkbox" name="subcategory_all" value="" parent="'.$category_id.'" class="checkbox eshop_categories" id="subcategory_all" />&nbsp;&nbsp;<label for="subcategory_all">All</label></td>';
                        
                        foreach ($subcategories as $key => $subcategory) {
                            $subchecked = ($subcategory['in_eshop']) ? ' checked="checked" ' : '';
                            $active = $subcategory['id'] == $category_id ? ' bg-success ' : '';
                            
                            echo '<td><input type="checkbox" name="categories[]" value="'.$subcategory['id'].'" '.$subchecked.'  parent="'.$subcategory['parent_id'].'" class="checkbox eshop_categories parent_'.$subcategory['parent_id'].'" id="categories_'.$subcategory['id'].'" />&nbsp;&nbsp;<label for="categories_'.$subcategory['id'].'">'.$subcategory['name']."</label></td>";
                        }
                        ?>
                            </tr>  
                        </tbody>
                </div>
            <?php } ?>
                <div class="col-sm-12">
                    <table class="table table-bordered">
                    <thead>
                    <th>#</th>
                        <th>Image</th>
                        <th>Products Code</th>
                        <th>Products Name</th>
                        <th>Storage Type</th>
                    </thead>
                    <?php 
                    
                if(is_array($products)){
                    
                    echo '<tbody>';                    
                    
                    foreach ($products as $product) {
                        
                        $pchecked =  $product->in_eshop == 1 ?  ' checked="checked" ' : '';                       
                        $product_image = ($product->image == '') ? 'no_image.png' : $product->image;
                      
                        echo '<tr class="prdcat_'.$product->category_id.' prdsubcat_'.$product->subcategory_id.'"><td><input type="checkbox" name="products[]" value="'.$product->id.'" '.$pchecked.' variant="0" class="checkbox eshop_product prd_chk" /></td>
                             <td><img src="' . site_url("assets/mdata/$Customer_assets/uploads/$product_image") . '" height="40" alt="'.$product->code.'" class="img" /></td>
                             <td>'.$product->code.'</td>
                             <td>'.$product->name.'</td>                        
                             <td>'.$product->storage_type.'</td></tr>';                       
                    }
                    echo ' </tbody>';
                }
            ?>          
                </table>            
                </div>
            </div>
        </div>
<!--        <div class="row">
            <div class="form-group text-center">
            < ?php echo form_submit('send', $this->lang->line("Submit"), 'id="send" class="btn btn-primary"  style="margin-top:20px;"'); ?> 
            </div>
            < ?= form_close(); ?>
        </div>-->
    </div>
</div>

<script>
    $(document).ready(function () {
                
        
        $('input.eshop_categories').on('ifToggled', function(event){
            var checked = $(this).is(":checked");
            let eshop_status = 0;
            let category_id = $(this).val();
            let parent_id   = $(this).attr('parent');
                
            if(checked) {
                eshop_status = 1;
            }
            
            manage_eshop_category(category_id, parent_id, eshop_status);
            
        });
        
        $('input.eshop_product').on('ifToggled', function(event){
            var checked = $(this).is(":checked");
            let eshop_status = 0;
            let product_id   = $(this).val();
            let variant_id   = $(this).attr('variant');
                
            if(checked) {
                eshop_status = 1;
            }
            
            manage_eshop_product(product_id, variant_id, eshop_status);
            
        });
        
        
        $('input#all_products').on('ifToggled', function(event){
            var checked = $(this).is(":checked");
             
            if(checked) {
                $('input.prd_chk').iCheck('check');
            } else {
                $('input.prd_chk').iCheck('uncheck');
            }
        });
        
               
    });
    
    function manage_eshop_category(category_id, parent_id, eshop_status){        
                 
        var callurl = '<?= base_url('webshop_settings/webshop_ajax_request')?>';
        
        var postData = 'action=manage_eshop_category';
            postData = postData + '&category_id=' + category_id;
            postData = postData + '&parent_id=' + parent_id;
            postData = postData + '&eshop_status=' + eshop_status;
          // alert(postData);
        $.ajax({
            type: "POST",
            url: callurl ,
            data: postData,
            beforeSend: function () {
                //$("#top-cart-wishlist-count").html("<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Adding In Wishlist</div>");
            },
            success: function (data) {

                var objData = JSON.parse(data);
                if(objData.status == "SUCCESS") {
                    
                    if(parent_id == 0) {
                        var in_eshop;
                        if(eshop_status) {
                            $(".prdcat_"+category_id).show();
                            in_eshop = '<a href="'+'<?=base_url('webshop_settings/manage_products/')?>'+category_id+'"><i class="fa fa-list text-success"></i></a>' ;
                        } else {
                            $(".prdcat_"+category_id).hide(); 
                            in_eshop = '<i class="fa fa-ban text-danger"></i>';
                        }
                        
                        $('.eshop_category_'+category_id).html(in_eshop);
                        
                    } else {
                        if(eshop_status) {
                            $(".prdsubcat_"+category_id).show(); 
                        } else {
                            $(".prdsubcat_"+category_id).hide(); 
                        }
                    }
                }
            }
        });
    }
        
    function manage_eshop_product(product_id, variant_id, eshop_status){        
                 
        var callurl = '<?= base_url('webshop_settings/webshop_ajax_request')?>';
        
        var postData = 'action=manage_eshop_product';
            postData = postData + '&product_id=' + product_id;
            postData = postData + '&variant_id=' + variant_id;
            postData = postData + '&eshop_status=' + eshop_status;
          //  alert(postData);
        $.ajax({
            type: "POST",
            url: callurl ,
            data: postData,
            beforeSend: function () {
                //$("#top-cart-wishlist-count").html("<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Adding In Wishlist</div>");
            },
            success: function (data) {

//                var objData = JSON.parse(data);
//                if(objData.status == "SUCCESS") {
//                    
//                     
//                }
            }
        });
        
    
    }
    
</script>    