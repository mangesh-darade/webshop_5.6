<div class="row">
    <div class="col-lg-12">
            <?php
            
            if (!empty($sections[$section_name])) {
                $sectionData = json_decode(unserialize($sections[$section_name]), TRUE);
            } 
//            echo '<pre>';
//            print_r($sectionData);
//            echo '</pre>';
            ?>
            <table class="table table-bordered" >
                <tr>
                    <th class="col-lg-3">Category Name / Sections Title<br/><small class="text-danger">(Only 5 tabs will display in the section)</small></th>
                    <th>Section Tab Products <small class="text-info">(Select products multiple of 6. Ex. 6 , 12 or 18)</small></th>
                </tr>
                <tr>
                    <td>
                <?php
                if (is_array($categories['main'])) {

                    foreach ($categories['main'] as $cid => $category) {
                        
                       $tabchecked = (isset($sectionData['tabs'][$cid])) ? ' checked="checked" ' : '';
                ?>
                    <div class="row">
                        <div style="padding: 12px 5px;" >
                            <label class="col-md-10 chk_category" chk_id="<?= $cid ?>" style="font-weight: bold; cursor: pointer; z-index: 999;">
                                <?php
                                $category_input_type = (isset($single_category_products) && $single_category_products) ? 'radio' : 'checkbox';
                                ?>
                                <input type="<?=$category_input_type?>" <?= $ckecked ?> name="section_category_tabs[]" <?=$tabchecked?> id="section_category_tabs_<?= $cid ?>" value="<?= $cid ?>" class="form-control category_chkbox" />
                                <?= $category->name ?>
                            </label>
                            <label class="col-md-2 categoty_list list_<?=$cid?>" style="font-weight: bold; cursor: pointer;" title="click here to select products" id="<?=$cid?>"><i class="fa fa-list"></i></label>
                        </div>  
                    </div>  
            <?php
                    }
                }
                ?>
                </td>
                <td> 
                <?php
                if (is_array($categories['main'])) {

                    foreach ($categories['main'] as $cid => $category) {
                ?>
                    <div id="tab_category_<?=$cid?>" class="category_tab">
                        <div class="row" > 
                            <div class="col-md-12">
                                <label class="col-md-4"><?=$category->name?> Tab Title</label>
                                <div class="col-md-6">
                                    <?php
                                        $section_titles = $sectionData['section_titles'][$cid] ? $sectionData['section_titles'][$cid] : $category->name;
                                    ?>
                                    <input type="text" name="section_title[<?= $cid ?>]" value="<?= $section_titles ?>"  placeholder="<?= $category->name . ' Products' ?>" class="form-control" maxlength="50" />  
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12"><button class="btn btn-success tab_subcategory all_<?= $category->id?>" id="<?= $category->id?>">All</button>
                           <?php
                            if (isset($categories[$category->id]) && is_array($categories[$category->id])) {
                                $ckecked = '';
                                foreach ($categories[$category->id] as $scid => $subcategory) {
                                    if (is_array($sectionData['section_tab_categories'][$category->id])) {
                                        $ckecked = in_array($scid, $sectionData['section_tab_categories'][$category->id]) ? 'checked="checked" ' : '';
                                    }
                                    ?><button class="btn btn-default tab_subcategory subcategory_<?= $category->id?>" id="<?= $category->id . $scid?>"><?= $subcategory->name ?></button>
                                    <?php
                                }
                            }
                            ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-md-12" style="max-height:450px; height: 400px; overflow-y: auto;">
                            <?php
                            if (is_array($category_products[$category->id])) {

                                foreach($category_products[$category->id] as $scid => $products) {
                                     if($products)
                                         foreach ($products as $product) {
                                         $image = $product->image ? $product->image : 'no_image.jpg';
                            ?>
                                <label class="col-md-3 category_products products_<?= $product->category_id ?> products_<?= $product->category_id . $product->subcategory_id?>" id="prodbox_<?= $product->id?>" style="height: <?php if(isset($highlite_products) && $highlite_products){ echo '200px'; } else { echo '150px'; }?> ; border: thin solid #dddddd; text-align: center; ">
                                    <div style="height:90px;">
                                    <input class="product_chkbox chk_<?= $product->category_id ?> chk_<?= $product->category_id . $product->subcategory_id?>" type="checkbox" name="section_category_products[<?=$product->category_id?>][]" boxid="" id="chk_<?= $product->id?>" value="<?=$product->id?>" style="position: relative; top: 0px; left: 0px;" /> 
                                    <image src="<?= base_url('assets/uploads/thumbs/'.$image)?>" alt="<?=$product->code?>" class="img " style="margin: 10px; width: 60px; max-height: 80px;"  /></div>
                                    <?php if(isset($highlite_products) && $highlite_products){?>
                                    <label class="highlite highlite_<?=$product->id?> highlite_category_<?=$product->category_id?>">
                                        <small class="text-danger"><input type="radio" name="section_category_highlite_products[<?=$product->category_id?>]" id="highlite_<?=$product->id?>" value="<?=$product->id?>" />
                                             Highlite
                                         </small>
                                     </label>
                                     <?php } ?> 
                                    <p> <?=$product->name?> </p>
                                     
                                </label> 
                            <?php
                                         }
                                }//end foreach
                            }//end if
                            ?>
                            </div>                           
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<script>
$(document).ready(function(){
    
    /*
     * Action on document load.
     */
    $('.categoty_list').hide();
    $('.category_tab').hide();
    $('.category_products').hide();
    $('.highlite').hide();
    
    /*
     * Action category list icon click.
     */
    $('.categoty_list').click(function(){
        
        var Category_ID = ($(this).attr('id'));
       
        loadCategoryProducts(Category_ID);        
    });
    
    /*
     * Action Subcategory tab click
     */
    $('.tab_subcategory').click(function(){
        
        $('.category_products').hide();        
        var product_category_ID = ($(this).attr('id'));
       
        $('.products_'+product_category_ID).show();
        $('.tab_subcategory').removeClass('btn-success');
        $('.tab_subcategory').addClass('btn-default');
        $(this).addClass('btn-success');
        $(this).removeClass('btn-default');
                
        setTimeout(function(){
            $('#update_elements_btn').removeAttr('disabled');
        },1);
    });
    
    /*
     * Action Products selection updates
     */ 
    $('input.product_chkbox').on('ifChanged', function(event){   
        var product_id  = $(this).val();
        const chkstatus = $('#chk_'+product_id).iCheck('update')[0].checked; 
       
        if(chkstatus == true){
            $('#prodbox_'+product_id).addClass('alert-success');           
            $('.highlite_'+product_id).show();           
        } else {
            $('#prodbox_'+product_id).removeClass('alert-success'); 
            $('.highlite_'+product_id).hide();  
        }
    });
         
    
    /*
     * Action: Category checkbox update
     */
    $('input.category_chkbox').on('ifChanged', function(event){
   
        var numberOfChecked = $('.category_chkbox:checked').length;
        var category_id = $(this).val();  
        
        if(numberOfChecked <= 5) { 
            if(event.target.checked == true){           
                $('.list_'+category_id).show();
                loadCategoryProducts(category_id);
            } else {
                $('.list_'+category_id).hide();
                $('#tab_category_'+category_id).hide();
            }            
        } else {            
            alert('Maximum five categories can select.');
            setTimeout(function(){
                $('#section_category_tabs_'+category_id).iCheck('uncheck');
            },100);
        }
    });
    
    <?php
    /*
     * Make selected data if already set in database.
     */
    
    if(isset($sectionData['tabs']) && is_array($sectionData['tabs'])){
        foreach ($sectionData['tabs'] as $catId => $tabName) {
        ?>
            $('.list_<?=$catId?>').show();
            loadCategoryProducts('<?=$catId?>');
        <?php  
            if(isset($sectionData['products'][$catId]) && is_array($sectionData['products'][$catId])) {
                foreach ($sectionData['products'][$catId] as $product_id) {
        ?>
                $('#chk_<?=$product_id?>').iCheck('check');    
        <?php
                }//end foreach products
            }//end if products  
        ?>
                
        <?php
            if(isset($sectionData['highlite']) && is_array($sectionData['highlite'])){
                foreach ($sectionData['highlite'] as $catId => $product_id) {
        ?>
                    $('#highlite_<?=$product_id?>').iCheck('check');    
        <?php        
                }//end foreach highlite products
            }//end if highlite products
            
        }//end foreach tabs        
    }//end if.
    ?>
    
});



function loadCategoryProducts(Category_ID){
    
    $('.category_tab').hide();
     
    $('#tab_category_'+Category_ID).show();

    $('.products_'+Category_ID).show();
    $('.all_'+Category_ID).addClass('btn-success');
    $('.all_'+Category_ID).removeClass('btn-default');
    $('.subcategory_'+Category_ID).addClass('btn-default');
    $('.subcategory_'+Category_ID).removeClass('btn-success');

}
    
</script>
