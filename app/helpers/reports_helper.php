 <?php defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists('pagignations')) {
    function pagignations(array $pagingAttributes) {
     
        $page_no             = (isset($pagingAttributes['page_no']) && (int)$pagingAttributes['page_no']) ? $pagingAttributes['page_no'] : 1;
        $per_page_records    = (isset($pagingAttributes['per_page_records']) && (int)$pagingAttributes['per_page_records']) ? $pagingAttributes['per_page_records'] : 20;
        $totalRecord         = (isset($pagingAttributes['totalRecord']) && (int)$pagingAttributes['totalRecord']) ? $pagingAttributes['totalRecord'] : 0;
        $position            = isset($pagingAttributes['position']) ? $pagingAttributes['position'] : 'top';     //top OR bottom of the listing
        $search_key          = isset($pagingAttributes['search_key']) ? $pagingAttributes['search_key'] : '';     //top OR bottom of the listing
       
        if(!$totalRecord) {
           //return '<p class="text-danger">Total records not found.</p>';
        }
       
        $show_search_box     = isset($pagingAttributes['show_search_box']) ? $pagingAttributes['show_search_box'] : TRUE;  //TRUE OR FALSE for Show OR Hide
        $show_page_number    = isset($pagingAttributes['show_page_number']) ? $pagingAttributes['show_page_number'] : TRUE;  //TRUE OR FALSE for Show OR Hide
        $show_total_records  = isset($pagingAttributes['show_total_records']) ? $pagingAttributes['show_total_records'] : TRUE;  //TRUE OR FALSE for Show OR Hide
        $show_rows_filter    = isset($pagingAttributes['show_rows_filter']) ? $pagingAttributes['show_rows_filter'] : TRUE;  //TRUE OR FALSE for Show OR Hide
             
        $totalPages = ceil($totalRecord / $per_page_records);
       
        $rowFilter = '';
        if($show_rows_filter) {
            
            $rowFilter = '<div class="col-sm-4"> Show <select class="form-control input-sm " name="per_page_records" id="per_page_records_'.$position.'" onchange="load_report(1)" style="display:inline; width:auto;">';
                     
                $perpageArr = [10,20, 30, 50, 70, 100];
                $per_page_records = isset($per_page_records) ? $per_page_records : 20;
                foreach ($perpageArr as $pp) {
                    $selectpp = ($pp == $per_page_records) ? ' selected="selected" ' : '';
                    $rowFilter .=  '<option ' . $selectpp . '>' . $pp . '</option>';
                }
                          
            $rowFilter .= '</select> ';
        }
        
           
        if($show_page_number || $show_total_records) {
            $rowFilter .= '<span class="pull-right text-info" style="padding-top: 5px;">';
            if($show_page_number){
                $rowFilter .= 'Page No.: '.$page_no.'  | ';
            }
            if($show_total_records){
                $rowFilter .= ' Total: '. $totalRecord .' Records';
            } 
            $rowFilter .= '</span>';
        }
        $rowFilter .= '</div> ';
        
        $pagingBtn = '<div class="col-sm-6 text-center">         
                        <ul class="pagination pagination-sm justify-content-center" style="margin: 0 0 5px 0;">';
                           
                        $preDisabled = $page_no == 1 ? 'disabled' : '';
                           
                        $preAction = ($page_no > 1) ? ' onclick="load_report('. ($page_no - 1) .')" ' : '';  
                           
            $pagingBtn .= '<li class="page-item '.$preDisabled.' ">
                            <a class="page-link" '.$preAction.'>Prev.</a>
                        </li>';
                             
            if ($page_no > 2) {

                $pagingBtn .=  '<li class="page-item"><a class="page-link" onclick="load_report(1)">1</a></li>
                                <li class="page-item"><a class="page-link" onclick="load_report(2)">2</a></li>
                                <li class="page-item"><a class="page-link" onclick="load_report('. round($page_no/2) .')" >...</a></li>';
            }
                $p1o = ($totalPages > ($page_no + 4)) ? ($page_no + 4) : $totalPages;

            for ($p = $page_no; $p <= $p1o; $p++) {

                $activepage = $page_no == $p ? 'active' : '';

                $pagingBtn .=  '<li class="page-item '. $activepage .'"><a class="page-link" onclick="load_report('. $p .')">'. $p .'</a></li>';

            } //end for 

            if ($totalPages-1 > ($page_no + 4)) {

                $pageJumpNo = $page_no >= round($totalPages/2) ? $page_no + round(($totalPages - $page_no)/2) : round($totalPages/2);

                $pagingBtn .=  '<li class="page-item"><a class="page-link" onclick="load_report('. $pageJumpNo .')" >...</a></li>';
                
                $prelastActive = $page_no == ($totalPages - 1) ? 'active' : '';
                
                $pagingBtn .=  '<li class="page-item '. $prelastActive .'"><a class="page-link" onclick="load_report('. ($totalPages - 1) .')">'. ($totalPages - 1) .'</a></li>';
                
                $lastActive = $page_no == $totalPages ? 'active' : '';
                
                $pagingBtn .=  '<li class="page-item '. $lastActive  .'"><a class="page-link" onclick="load_report('.$totalPages.')">'.$totalPages.'</a></li>';
            } 
                $nextAction = ($page_no < $totalPages) ? ' onclick="load_report('. ($page_no + 1) . ')" ' : '';
                
                $nextDisabled = $page_no == $totalPages ? 'disabled' : '' ;
                
                $pagingBtn .= '<li class="page-item '. $nextDisabled .'">
                                 <a class="page-link" '.$nextAction.' >Next</a>
                              </li>';

            $pagingBtn .= '</ul></div>';
            
            $searchBox = '';
            if($show_search_box) {
                $searchBox = '<div class="col-sm-2">
                        <div class="box-tools pull-right">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="search_key" id="search_key_'.$position.'" value="'.$search_key.'" class="form-control pull-right" placeholder="Search" title="Search By : Invoice No / Reference No / Customer / Biller / Product Name/ Payment Status & Method/ City/ State Code" />
                                <div class="input-group-btn" id="btn_search">
                                    <button type="button" class="btn btn-sm btn-default" onclick="load_report(1)" title="Search By : Invoice No / Reference No / Customer / Biller / Product Name/ Payment Status & Method/ City/ State Code"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div> 
                    </div>';
            }
            
        $pagignationBar = $rowFilter. $filterInfo . $pagingBtn . $searchBox;
        
        return $pagignationBar;
            
    }
}


function ddmmyyyyToyyyymmdd($date){
    
    $exdate = explode('/',trim($date));
    $revDate = array_reverse($exdate);
    return join('-', ($revDate));
    
}




    function warehouseqty($productid, $warehouseid, $start_date = null, $end_date = null)
    {
        $ci =& get_instance();
        $ci->load->database();
    
        $ci->db->select('ROUND(SUM(sma_transfer_request_items.request_quantity), 2) as wpqty');
        $ci->db->join('sma_transfer_request', 'sma_transfer_request_items.transfer_request_id = sma_transfer_request.id', 'RIGHT');
        $ci->db->where(['sma_transfer_request_items.product_id' => $productid, 'sma_transfer_request_items.warehouse_id' => $warehouseid]);
        $ci->db->where_in('sma_transfer_request.status', ['pending']);
    
        if ($start_date && $end_date) {
            $ci->db->where('sma_transfer_request_items.date >=', $start_date);
            $ci->db->where('sma_transfer_request_items.date <=', $end_date);
        }
        $result = $ci->db->get('sma_transfer_request_items')->row();
        return ($result->wpqty ? $result->wpqty : 0);
    }
    






