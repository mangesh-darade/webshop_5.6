<?php

/**
 * Created by PhpStorm.
 * User: ravi
 * Date: 05/12/2017
 * Time: 15:35
 */
function get_product_price($product, $customer_id = 0, $eshop=0) {

    $product = (object) $product;
    if($eshop==0){
       if (!$customer_id) {
         return $product;
       }
    }
    $ci = get_instance();
    $ci->load->model(array('site', 'sales_model'));
    $ci->load->library('Sma');
    $warehouse_id = 1;
    $warehouse = $ci->site->getWarehouseByID($warehouse_id);
    
    if($customer_id!=0){
	$customer = $ci->site->getCompanyByID($customer_id);
	$customer_group = $ci->site->getCustomerGroupByID($customer->customer_group_id);
    }else{
	$customer = (object) array();
	$customer->price_group_id = 0;
    }

    //if ($rows) {
    // $c = str_replace(".", "", microtime(true));
    // $r = 0;
    //foreach ($rows as $row) {
    unset($product->cost, $product->details, $product->product_details, $product->barcode_symbology, $product->supplier1price, $product->supplier2price, $product->cfsupplier3price, $product->supplier4price, $product->supplier5price, $product->supplier1, $product->supplier2, $product->supplier3, $product->supplier4, $product->supplier5, $product->supplier1_part_no, $product->supplier2_part_no, $product->supplier3_part_no, $product->supplier4_part_no, $product->supplier5_part_no);
    $option = false;
    $product->quantity = 0;
    $product->item_tax_method = $product->tax_method;
    $product->qty = 1;
    $product->discount = '0';
    $product->serial = '';
    $options = $ci->sales_model->getProductOptions($product->id, $warehouse_id);
    if ($options) {
        //$opt = $options[0];
        //$option_id = $opt->id;
        //$product->option = $option_id;
        $opt = $options[0];
        $option_id = $opt->id;
        $option_name = $opt->name;
        $option_price = $opt->price;
        $product->option_id = $option_id;
        $product->option_name = $option_name;
        $product->option_price = $option_price;
    } else {
        $opt = json_decode('{}');
        $opt->price = 0;
    }

    $pis = $ci->site->getPurchasedItems($product->id, $warehouse_id, $product->option_id);
    if ($pis) {
        foreach ($pis as $pi) {
            $product->quantity += $pi->quantity_balance;
        }
    }
    if ($options) {
        $option_quantity = 0;
        foreach ($options as $option) {
            $pis = $ci->site->getPurchasedItems($product->id, $warehouse_id, $product->option_id);
            if ($pis) {
                foreach ($pis as $pi) {
                    $option_quantity += $pi->quantity_balance;
                }
            }
            if ($option->quantity > $option_quantity) {
                $option->quantity = $option_quantity;
            }
        }
    }
    $product->org_price = $product->price;
    if ($product->promotion) {
        $product->price = $product->promo_price;
    } elseif ($customer->price_group_id) {
        if ($pr_group_price = $ci->site->getProductGroupPrice($product->id, $customer->price_group_id)) {
            $product->price = $pr_group_price->price;
        }
    } elseif ($warehouse->price_group_id) {
        if ($pr_group_price = $ci->site->getProductGroupPrice($product->id, $warehouse->price_group_id)) {
            $product->price = $pr_group_price->price;
        }
    }

    if ($product->price == 0.0000)
        $product->price = $product->org_price;
    if($customer_id!=0)
       $product->price = $product->price - (($product->price * $customer_group->percent) / 100);
    $product->real_unit_price = $product->price;
    $product->base_quantity = 1;
    $product->base_unit = $product->unit;
    $product->base_unit_price = $product->price;
    $product->unit = $product->sale_unit ? $product->sale_unit : $product->unit;
    $combo_items = false;
    if ($product->type == 'combo') {
        $combo_items = $ci->sales_model->getProductComboItems($product->id, $warehouse_id);
    }
    $units = $ci->site->getUnitsByBUID($product->base_unit);
    $tax_rate = $ci->site->getTaxRateByID($product->tax_rate);


    //$pr[] = array('id' => ($c + $r), 'item_id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'category' => $row->category_id,
    //'row' => $row, 'combo_items' => $combo_items, 'tax_rate' => $tax_rate, 'units' => $units, 'options' => $options);
    //$r++;
    // }
    //$this->sma->send_json($pr);
    //}
    return $product;
}

function giftcardBalance($cardNo) {
    $ci = & get_instance();
    $q = $ci->db->select('balance')->where(['card_no' => $cardNo])->get('sma_gift_cards')->row();
    return $q;
}

/* Deposite Amount Show Invoice 4-11-2019 */

function depositeBalance($company_id) {
    $ci = & get_instance();
    $deposite = $ci->db->select('deposit_amount')->where(['id' => $company_id])->get('sma_companies')->row();
    return $deposite;
}

/* Rounding Show Invoice 4-11-2019 */

function salesRounding($sale_id) {
    $ci = & get_instance();
    $rounding = $ci->db->select('rounding')->where(['id' => $sale_id])->get('sma_sales')->row();
    return $rounding;
}



///////////////////////////////////////////////////////////////////////////////////
// #Format: Y-m-d H:i:s 		=> 	#output: 2012-03-24 17:45:12
// #Format: Y-m-d h:i A			=> 	#output: 2012-03-24 05:45 PM
// #Format: d/m/Y H:i:s 		=> 	#output: 24/03/2012 17:45:12
// #Format: d/m/Y 				=> 	#output: 24/03/2012
// #Format: g:i A 				=> 	#output: 5:45 PM
// #Format: h:ia 				=> 	#output: 05:45pm
// #Format: g:ia \o\n l jS F Y 	=> 	#output: 5:45pm on Saturday 24th March 2012
// #Format: l jS F Y 			=> 	#output: Saturday 24th March 2012
// #Format: D jS M Y 			=> 	#output: Sat 24th Mar 2012
// #Format: jS F Y g:ia			=> 	#output: 24th March 2012 5:45pm
// #Format: j F Y				=> 	#output: 24 March 2012
// #Format: j M y				=> 	#output: 24 Mar 12
// #Format: F j					=> 	#output: March 24 
// #Format: F Y					=> 	#output: March 2012
/////////////////////////////////////////////////////////////////////////////////////
function DateTimeFormat($dateTime , $dateFormat = 'jS M Y' )
    {
	$date = date_create($dateTime);
	
	$newDateFormat = date_format($date, $dateFormat);
	
	$newDateFormat = str_replace('th ' , '<sup>th </sup>' , $newDateFormat);
	$newDateFormat = str_replace('1st ' , '1<sup>st </sup>' , $newDateFormat);
	$newDateFormat = str_replace('nd ' , '<sup>nd </sup>' , $newDateFormat);
	$newDateFormat = str_replace('rd ' , '<sup>rd </sup>' , $newDateFormat);
	
	return $newDateFormat;
    }

    function rupeeFormat($number, $decimal=2, $prefix='&#x20B9;') {
        
       return $prefix.'&nbsp;'.number_format($number, $decimal, ".", ",");    
    }
    
    function numberFormat($number, $decimal=0) {
        
       return number_format($number, $decimal, ".", ",");    
    }
    





  if(!function_exists('getSubTables')){
       function getSubTables($tableId){
           $ci =& get_instance();
           $ci->load->database();
           $tables =  $ci->db->select('*')->where(['parent_id' => $tableId])->get('sma_restaurant_tables')->result();       
           if($ci->db->affected_rows()){
                foreach ($tables as $row) {
                    if(in_array($row->id, get_booked_tables())){

                        $suspendData = getSuspend($row->id);
                        $row->status = "Booked";
                        $row->suspended_id = $suspendData['id']; 
                        $row->suspended_note = $suspendData['table_name'];

                    }else{
                        $row->status = "Available";
                    }
                    $data[] = $row;
                }
               return $data;
           }
           return false;
       }
  }


 if(!function_exists('get_booked_tables')){      
    function get_booked_tables(){
         $ci =& get_instance();
           $ci->load->database();
        $query = "SELECT sb.*
        FROM ".$ci->db->dbprefix('suspended_bills')." sb
        LEFT JOIN ".$ci->db->dbprefix('restaurant_tables')." t ON t.id = sb.table_id
        WHERE sb.date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
        ";

        $q = $ci->db->query($query);
        $booked_tables = array();
        if ($q->num_rows() > 0) {
            $result = $q->result();
            foreach ($result as $key=>$row) {
                $booked_tables[] = $row->table_id;
            }
        }   
        return $booked_tables;
    } 
 }

if(!function_exists('getSuspend')){      
   function getSuspend($tableId){
          $ci =& get_instance();
           $ci->load->database();
        $query = "SELECT sb.*
        FROM ".$ci->db->dbprefix('suspended_bills')." sb
        LEFT JOIN ".$ci->db->dbprefix('restaurant_tables')." t ON t.id = sb.table_id
        WHERE sb.date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) and sb.table_id = $tableId
        ";
         
        $q = $ci->db->query($query);
        if ($q->num_rows() > 0) {
            $result = $q->row();

            $response = [
                'id' => $result->id,
                'table_name' => $result->suspend_note                
            ];
            return $response;
            
        }
        return false;
    }
}    



    

