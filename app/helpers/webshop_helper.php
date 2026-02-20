<?php

function product_sale_price( $productData=[], $variant_price = NULL, $discount = NULL) {

    $data['promo_price'] = 0;

    if ($productData['promotion']) {

        $now = strtotime(date('Y-m-d H:i:s'));

        $start_date = !empty($productData['start_date']) ? strtotime($productData['start_date']) : '';
        $end_date   = !empty($productData['end_date']) ? strtotime($productData['end_date']) : '';

        if (!empty($start_date) && $start_date <= $now && $end_date >= $now) {
            $data['promo_price'] = $productData['promo_price'];
        }
    }

    if (is_array($variant_price)) {
        $price = (float) $variant_price[1] + (float) $productData['price'];
    } else {
        $price = (isset($productData['variant_price'])) ? ((float) $productData['variant_price'] + (float) $productData['price']) : $productData['price'];
    }

    $data['real_unit_price'] = $price;
    $data['discount_rate'] = 0;
    $data['unit_discount'] = 0;
    $pr_discount = 0;
    if ($discount != NULL) {
        $dpos = strpos($discount, '%');
        if ($dpos !== false) {
            $pds = explode("%", $discount);
            //Note : unitprice is product and variant price. Real unit price is actual product price. if we taken realunitprice then grandtotal and discount calculate wrong becuase real unit price not included variant price. so now taken unit_price.(28-03-2020)
            $pr_discount = ( ( (Float) $price * (Float) $pds[0] ) / 100);
        } else {
            $pr_discount = $discount;
        }

        $price = $price - $pr_discount;
        $data['discount_rate'] = $discount;
        $data['unit_discount'] = $pr_discount;
    } else if ($data['promo_price'] > 0 && (int) $data['promo_price'] < $price) {

        $discount_amount = $price - $data['promo_price'];
        $data['discount_rate'] = $discount_amount;
        $data['unit_discount'] = $discount_amount;
        $price = $data['promo_price'];
    }

    $data['tax_rate'] = $productData['tax_rate'] . '%';
    $data['tax_method'] = $productData['tax_method'];

    if ($productData['tax_rate']) {
        if ($productData['tax_method'] == 1) {

            $unit_tax = ($price * (float) $productData['tax_rate'] / 100 );

            $data['unit_tax'] = $unit_tax;
            $data['net_unit_price'] = $price;

            $data['unit_price'] = ((float) $price + $unit_tax);
        } else {

            $unit_tax = (($price * (float) $productData['tax_rate']) / (100 + (float) $productData['tax_rate']));

            $data['unit_tax'] = $unit_tax;
            $data['net_unit_price'] = $price - $unit_tax;
            $data['unit_price'] = $price;
        }
    } else {

        $unit_tax = 0;
        $data['unit_tax'] = $unit_tax;
        $data['net_unit_price'] = $price - $unit_tax;
        $data['unit_price'] = $price;
    }

    return $data;
}
function product_sale_price_webshop( $productData=[], $variant_price = NULL, $discount = NULL, $unit_quantity = NULL) {

    $data['promo_price'] = 0;

    if ($productData['promotion']) {

        $now = strtotime(date('Y-m-d H:i:s'));

        $start_date = !empty($productData['start_date']) ? strtotime($productData['start_date']) : '';
        $end_date   = !empty($productData['end_date']) ? strtotime($productData['end_date']) : '';

        if (!empty($start_date) && $start_date <= $now && $end_date >= $now) {
            $data['promo_price'] = $productData['promo_price'];
        }
    }

    if (is_array($variant_price)) {
        $price = (float) $variant_price[1] + (float) $productData['price'];
    } else {
        $price = (isset($productData['variant_price'])) ? ((float) $productData['variant_price'] + (float) $productData['price']) : $productData['price'];
    }

    $data['real_unit_price'] = $price;
    $data['discount_rate'] = 0;
    $data['unit_discount'] = 0;
    $pr_discount = 0;
    if ($discount != NULL) {
        $dpos = strpos($discount, '%');
        if ($dpos !== false) {
            $pds = explode("%", $discount);
            //Note : unitprice is product and variant price. Real unit price is actual product price. if we taken realunitprice then grandtotal and discount calculate wrong becuase real unit price not included variant price. so now taken unit_price.(28-03-2020)
            $pr_discount = ( ( (Float) $price * (Float) $pds[0] ) / 100)/$unit_quantity;
        } else {
            $pr_discount = $discount/$unit_quantity;
        }

        $price = $price - $pr_discount;
        // $price = $price/$pr_discount;
        $data['discount_rate'] = $discount;
        $data['unit_discount'] = $pr_discount * $unit_quantity;
    } else if ($data['promo_price'] > 0 && (int) $data['promo_price'] < $price) {

        $discount_amount = $price - $data['promo_price'];
        $data['discount_rate'] = $discount_amount;
        $data['unit_discount'] = $discount_amount;
        $price = $data['promo_price'];
    }

    $data['tax_rate'] = $productData['tax_rate'] . '%';
    $data['tax_method'] = $productData['tax_method'];

    if ($productData['tax_rate']) {
        if ($productData['tax_method'] == 1) {

            $unit_tax = ($price * (float) $productData['tax_rate'] / 100 );

            $data['unit_tax'] = $unit_tax;
            $data['net_unit_price'] = $price;
            // $data['unit_price'] = ((float) $price + $unit_tax);
            $data['unit_price'] = $price;
        } else {

            $unit_tax = (($price * (float) $productData['tax_rate']) / (100 + (float) $productData['tax_rate']));

            $data['unit_tax'] = $unit_tax;
            // $data['net_unit_price'] = $price - $unit_tax;
            $data['net_unit_price'] = $price;
            $data['unit_price'] = $price;
        }
    } else {

        $unit_tax = 0;
        $data['unit_tax'] = $unit_tax;
        // $data['net_unit_price'] = $price - $unit_tax;
        $data['net_unit_price'] = $price;
        $data['unit_price'] = $price;
    }

    return $data;
}
///////////////////////////////////////////////////////////////////////////////////
// #Format: Y-m-d H:i:s 		=> 	#output: 2012-03-24 17:45:12
// #Format: Y-m-d h:i A			=> 	#output: 2012-03-24 05:45 PM
// #Format: d/m/Y H:i:s 		=> 	#output: 24/03/2012 17:45:12
// #Format: d/m/Y                       => 	#output: 24/03/2012
// #Format: g:i A 			=> 	#output: 5:45 PM
// #Format: h:ia 			=> 	#output: 05:45pm
// #Format: g:ia \o\n l jS F Y          => 	#output: 5:45pm on Saturday 24th March 2012
// #Format: l jS F Y 			=> 	#output: Saturday 24th March 2012
// #Format: D jS M Y 			=> 	#output: Sat 24th Mar 2012
// #Format: jS F Y g:ia			=> 	#output: 24th March 2012 5:45pm
// #Format: j F Y			=> 	#output: 24 March 2012
// #Format: j M y			=> 	#output: 24 Mar 12
// #Format: F j				=> 	#output: March 24 
// #Format: F Y				=> 	#output: March 2012
/////////////////////////////////////////////////////////////////////////////////////
function Date_Time_Format($dateTime, $dateFormat = 'jS M Y') {
    $date = date_create($dateTime);

    $newDateFormat = date_format($date, $dateFormat);

    $newDateFormat = str_replace('th ', '<sup>th </sup>', $newDateFormat);
    $newDateFormat = str_replace('1st ', '1<sup>st </sup>', $newDateFormat);
    $newDateFormat = str_replace('nd ', '<sup>nd </sup>', $newDateFormat);
    $newDateFormat = str_replace('rd ', '<sup>rd </sup>', $newDateFormat);

    return $newDateFormat;
}

function get_brands($ids = NULL) {

    $q = $this->db->select('id, code, name, image');
    if ($ids) {
        $this->db->where_in('id', $ids);
    }
    $this->db->get('brands');

    if ($q->num_rows() > 0) {

        foreach ($q->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }

    return false;
}

function baseurl($uri){
    
   $baseurl = get_instance()->config->base_url();
   return $baseurl . $uri;   
}

/**
 * Get ElintOm image URL
 * 
 * Constructs the full URL for product images from ElintOm deployment
 * 
 * @param string $image_path Relative image path (e.g., 'product.jpg' or 'images/product.jpg')
 * @param string $subfolder Optional subfolder (e.g., 'uploads', 'thumbs', 'images')
 * @return string Full ElintOm image URL (with trailing slash if no image_path provided)
 */
function elintom_image_url($image_path = '', $subfolder = 'uploads') {
    $CI = get_instance();
    
    // Load elintom_images config if not already loaded
    $CI->config->load('elintom_images', TRUE);
    
    $elintom_base_url = rtrim($CI->config->item('elintom_base_url', 'elintom_images'), '/');
    $elintom_image_path = trim($CI->config->item('elintom_image_path', 'elintom_images'), '/');
    $customer_folder = $CI->config->item('elintom_customer_folder', 'elintom_images');
    
    // If customer folder is not set in config, use the current subdomain
    if (empty($customer_folder)) {
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $subdomain = explode('.', $host)[0];
        $customer_folder = $subdomain;
    }
    
    // Build the base URL path
    $base_path = $elintom_image_path . '/' . $customer_folder . '/' . trim($subfolder, '/');
    
    // Build the full URL
    $url = $elintom_base_url . '/' . $base_path;
    
    // Add image path if provided
    if (!empty($image_path)) {
        $url .= '/' . ltrim($image_path, '/');
    } else {
        // Add trailing slash when used as base path
        $url .= '/';
    }
    
    return $url;
}

function create_products_structure($productsArray, $imagePath='', $sectionKey = null, $display=null ){
    
    if(is_array($productsArray)) {
        $p=0;
        $productStructure = '';
        
        foreach ($productsArray as $product) {
                        
            $p++;
          //  if($p > 24) { break; } //Maximum 24 Products Display In Tab Container
            $product_hash = md5($product['id'].$sectionKey);           

            $variant_options = '';
            if(isset($product['variants'])){
                $v=0;
                foreach ($product['variants'] as $variant) {
                    $v++;
                    $variant_options           .= '<option value="'.$variant['id'].'" price="'.($variant['price']).'" unit_quantity="'.$variant['unit_quantity'].'" quantity="'.$variant['quantity'].'" title="'.$variant['name']. '" class="attached enabled text-capitalize">'.$variant['name']. '</option>';              
                    $variant_quantity[$v]       = $variant['quantity'];
                    $variant_name[$v]           = $variant['name'];
                    $variant_price[$v]          = $variant['price'];
                    $variant_unit_quantity[$v]  = $variant['unit_quantity'];                        
                    $variant_id[$v]             = $variant['id'];     

                    if($v==1){
                        $product_variants = $variant;
                        $product_name = $product['name'] .' (<span class="variant_name_'.$product_hash.'">'.$variant['name'].'</span>)';
                    }
                }
                $item_quantity = $variant_quantity[1];

            } else {
                $variant_name[1]        = '';
                $variant_price[1]       = 0;
                $variant_quantity[1]    = 0;
                $item_quantity          = $product['quantity'];
                $product_name           = $product['name'];
                $product_variants       = false;
            }

            
            //Set Overselling Condition.
            $item_quantity = $webshop_settings->overselling ? 999 : $item_quantity;
            
            //Webshop helper function
            $product_price = product_sale_price($product, $variant_price);

            $promo_price = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

            $sale_price = $promo_price ? $promo_price : $product_price['unit_price'];
            
            $product['promo_price'] = $promo_price;
            $product['unit_price']  = $sale_price;
            
        $productStructure .= '<div class="product product_'.$product_hash.' '.$active.'_tab_product"  style="'. ($display == true?'':'display:none;') .'" >
                    <div class="yith-wcwl-add-to-wishlist">
                        <a style="cursor:pointer; font-size:20px; float:right; margin-right:10px;" class="addtowishlist" product_hash="'.$product_hash.'"><i class="tm tm-favorites"></i></a>
                    </div>
                    <a href="'.baseurl("webshop/product_details/").md5($product['id']).'" class="woocommerce-LoopProduct-link">
                        <div style="height:200px;">
                            <img src="'.$imagePath.$product['image'].'" style="max-height:190px;" class="wp-post-image" alt="'.$product['code'].'">
                        </div>
                        <span class="price">';
       
                         if($promo_price && (int)$promo_price < $product_price['unit_price']) {
        $productStructure.= '<del class="text-danger" style="margin-right:15px;">
                                <span class="amount">Rs. '.number_format($product_price['unit_price'],2).'</span>
                            </del>';
                         }
        $productStructure.= ' <ins>
                                <span class="amount"> </span>
                            </ins>
                            <span class="amount">Rs. <span id="display_unit_price_'.$product_hash.'">'.number_format($sale_price,2).'</span></span> <br/>
                            <span class="mrp"> MRP : '.$Settings->symbol.' '. number_format($product['mrp'],2).'</span>
                        </span>
                        <!-- /.price -->
                        <h2 class="woocommerce-loop-product__title">'.$product_name.'</h2>
                    </a>
                    <div class="hover-area">';                                    

            if($variant_options){

             $productStructure.= '<div class="value">
                            <select class="form-control" name="product_variants['.$product['id'].']" id="product_variants_'.$product_hash.'" onchange="update_price_by_variants(\''.$product_hash.'\')">
                            '.$variant_options .'
                            </select>
                            <a href="#" class="reset_variations" style="visibility: hidden;">Clear</a>
                        </div>';
            }

            $productStructure.= product_hidden_fields($product, $product_hash, $product_variants);
         $posSettings = pos_settings();
        if($item_quantity) {                   
        $productStructure.= '<big class="text-danger btn_outofstock_'.$product_hash.'" style="display: none;" >Out Of Stock</big>
                            <button class="button add_to_cart_button form-control btn_addtocart_'.$product_hash.'" rel="nofollow" onclick="add_to_cart(\''.$product_hash.'\')" >Add to cart</button>';
        } else { 
 if($posSettings->eshop_overselling){
                   $productStructure.= '<big class="text-danger btn_outofstock_'.$product_hash.'" style="display: none;" >Out Of Stock</big>
                            <button class="button add_to_cart_button form-control btn_addtocart_'.$product_hash.'" rel="nofollow" onclick="add_to_cart(\''.$product_hash.'\')" >Add to cart</button>';
     
            }else{
        $productStructure.= '<big class="text-danger btn_outofstock_'.$product_hash.'" >Out Of Stock</big>
                            <button class="button add_to_cart_button form-control btn_addtocart_'.$product_hash.'" rel="nofollow" style="display: none;" onclick="add_to_cart(\''.$product_hash.'\')" >Add to cart</button>';
           }
        }

        $productStructure.= '</div>
                </div>
                <!-- .product -->';
  
        }//end foreach.
        
        return $productStructure;
        
    }//end if
}


function product_hidden_fields($product, $pr_hash='', $variant = false) {
        
    $product_hash = $pr_hash ? '_'.$pr_hash : '';

    $hiddenValues = '<input type="hidden" value="1" name="quantity['.$product['id'].']" id="quantity'.$product_hash.'">
                    <input type="hidden" value="'.$product['tax_rate'].'" name="tax_rate['.$product['id'].']" id="tax_rate'.$product_hash.'">
                    <input type="hidden" value="'.$product['tax_method'].'" name="tax_method['.$product['id'].']" id="tax_method'.$product_hash.'">
                    <input type="hidden" value="'.$product['price'].'" name="price['.$product['id'].']" id="price'.$product_hash.'">
                    <input type="hidden" value="'.$product['id'].'" name="product_id['.$product['id'].']" id="product_id'.$product_hash.'">
                    <input type="hidden" value="'.$product['unit_price'].'" name="unit_price['.$product['id'].']" id="unit_price'.$product_hash.'">
                    <input type="hidden" value="'.$product['promo_price'].'" name="promotion_price['.$product['id'].']" id="promotion_price'.$product_hash.'">';

    $hiddenValues .= '<input type="hidden" value="'.(isset($variant['unit_quantity']) ? $variant['unit_quantity']:1) .'" name="variant_unit_quantity['.$product['id'].']" id="variant_unit_quantity'.$product_hash.'">';
    $hiddenValues .= '<input type="hidden" value="'.(isset($variant['id']) ? $variant['id']:0).'" name="variant_id['.$product['id'].']" id="variant_id'.$product_hash.'" >';
    $hiddenValues .= '<input type="hidden" value="'.(isset($variant['price']) ? $variant['price']:0).'" name="variant_unit_price['.$product['id'].']" id="variant_unit_price'.$product_hash.'">';
         
    return $hiddenValues;
}
    

if (!function_exists('CI')) {

    function CI() {

        $CI = & get_instance(); // making instance of CI

        return $CI; // Its returning an object for CI class
    }

}
if (!function_exists('latest_Products')) {
    function latest_Products($imagePath){
       $latestP =  CI()->db->limit(6)->order_by('id','DESC')->get('sma_products')->result();
    
       $latestProductsStructure = '';
       foreach($latestP as $items){

            $variants =   product_variants($items->id);
          $price = $items->price;
          if($variants){
              foreach($variants as $variant_price){
                 if(round($variant_price['price'])){
                    $price = $variant_price['price'];
                     break;
                 } 
              }
          }else{
              $price = $items->price;
          }
         
           $latestProductsStructure.='<div class="landscape-product-widget product">';
                $latestProductsStructure.='<a class="woocommerce-LoopProduct-link" href="'.baseurl("webshop/product_details/").md5($items->id).'">';
                     $latestProductsStructure.='<div class="media d-flex ">';
                        $latestProductsStructure.='<img class="wp-post-image m-0" src="'.$imagePath.$items->image.'" alt="'.$items->name.'">';
                        $latestProductsStructure.='<div class="media-body">';
                            $latestProductsStructure.='<span class="price">';
                                $latestProductsStructure.='<ins>';
                                     $latestProductsStructure.='<span class="amount"> '.$Settings->symbol.number_format($price,2).'</span>';
                                $latestProductsStructure.='</ins>';
                                 $latestProductsStructure.='<br/><ins>';
                                     $latestProductsStructure.='<span class="amount"> MRP : '.$Settings->symbol.' '.number_format($items->mrp,2).'</span>';
                                $latestProductsStructure.='</ins>';
//                                $latestProductsStructure.='<del>';
//                                     $latestProductsStructure.='<span class="amount">26.99</span>';
//                                $latestProductsStructure.='</del>';
                            $latestProductsStructure.='</span>';

                            $latestProductsStructure.='<h2 class="woocommerce-loop-product__title">'.$items->name.'</h2>';
                            $latestProductsStructure.='<div class="techmarket-product-rating">';
                                $latestProductsStructure.='<div title="Rated 0 out of 5" class="star-rating">';
                                     $latestProductsStructure.='<span style="width:0%">';
                                     $latestProductsStructure.='<strong class="rating">0</strong> out of 5</span>';
                                $latestProductsStructure.='</div>';
                                $latestProductsStructure.='<span class="review-count">(0)</span>';
                            $latestProductsStructure.='</div>';
                        
                        $latestProductsStructure.='</div>';
                     $latestProductsStructure.='</div>';
                $latestProductsStructure.='</a>';
           $latestProductsStructure.='</div>';
       }
       
       return $latestProductsStructure;
      
    }
}



if (!function_exists('rupeeFormat')) {  
 function rupeeFormat($number, $decimal=2, $prefix='&#x20B9;') {
      
       return $prefix.'&nbsp;'.number_format($number, $decimal, ".", ",");    
    }
}



if(!function_exists('product_variants')){
    function product_variants($product_id = NULL){
         $q = CI()->db->where('product_id', $product_id)->order_by('price', 'asc')->get('product_variants');

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = (array) $row;
            }
            return $data;
        }
        return false;
    }
}


if(!function_exists('pos_settings')){
    function pos_settings(){
       $q = CI()->db->select('default_eshop_warehouse, default_eshop_biller, eshop_overselling,eshop_active')->get('pos_settings');
    
         if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE; 
    }
}