<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('sma');
        $this->load->model('site');
        $this->load->model('Whatsapp_model');
        $this->load->model('webshop_model');
        $this->load->helper('webshop_helper');
        $this->load->helper('url');
        $this->load->helper('file'); 
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $this->data['cart_items'] = $_SESSION['cart'];
            $this->data['cart_data'] = $this->webshop_model->get_cart_data();
        }
         $this->theme = $this->Settings->theme.'/views/';
        $this->load->helper('text');
        $this->load->library('form_validation');
        $this->load->model('orders_model');
        $this->load->model('sales_model');
        $this->load->model('eshop_model');
	    $this->load->helper('sms');
        $this->digital_upload_path = 'files/'.$this->Customer_assets;
        $this->upload_path = 'assets/mdata/'.$this->Customer_assets.'/uploads/';
        $this->thumbs_path = 'assets/mdata/'.$this->Customer_assets.'/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->data['logo'] = true;
        $this->pos_settings = $this->site->get_pos_setting();
        $this->data['pos_settings'] = $this->pos_settings;
    }

   public function index() {
        $phone = '917744010738';
        $template_name = 'Darade_order_received';
        $parameters = []; // Add parameters here if your template requires them
        $order_id = 1; // Example order ID
        $response = $this->Whatsapp_model->send_order_whatsapp_message($phone,$order_id);
        $data = json_decode($response, true);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
    }
    public function pdf_eshop_order($id = null, $view = null, $save_bufffer = null) {
         $this->load->model('orders_model');
        $this->load->model('eshop_model');
        if ($this->input->get('id')) {
            $code = $this->input->get('id');
        }
        $res = $this->eshop_model->validateRecieptEshopOrder($id);
        $_PID = $this->Settings->default_printer;
        $this->data['default_printer'] = $this->site->defaultPrinterOption($_PID);
        $inv = $this->orders_model->getOrderByID($id);
        if ($this->data['default_printer']->tax_classification_view):
            $inv->rows_tax = $this->orders_model->getAllTaxOrderItems($id, $inv->return_id);
        endif;
        $this->data['taxItems'] = $this->orders_model->getAllTaxItemsGroup($id, $inv->return_id);
        $this->default_currency = $this->site->getCurrencyByCode($this->Settings->default_currency);
        $this->data['default_currency'] = $this->default_currency;
        $this->data['barcode'] = "<img src='" . site_url('products/gen_barcode/' . $inv->reference_no) . "' alt='" . $inv->reference_no . "' class='pull-left' />";
        $this->data['customer'] = $this->site->getCompanyByID($inv->customer_id);
        $this->data['payments'] = $this->orders_model->getPaymentsForOrder($id);
        $this->data['biller'] = $this->site->getCompanyByID($inv->biller_id);
        $this->data['billerDetails'] = $this->orders_model->getOrderDetails($id);
        $this->data['user'] = $this->site->getUser($inv->created_by);
        $this->data['warehouse'] = $this->site->getWarehouseByID($inv->warehouse_id);
        $this->data['inv'] = $inv;
        $this->data['rows'] = $this->orders_model->getAllOrderItems($id);
        $this->data['return_sale'] = $inv->return_id ? $this->orders_model->getOrderByID($inv->return_id) : NULL;
        $this->data['return_rows'] = $inv->return_id ? $this->orders_model->getAllOrderItems($inv->return_id) : NULL;
        $name = lang("sale") . "_" . str_replace('/', '_', $inv->reference_no) . '_' . time() . ".pdf";
        $Settings = $this->Settings; //$this->site->get_setting();
       
        $html = $this->load->view($this->theme . 'orders/pdf_eshop_order', $this->data, true);

        if (!$this->Settings->barcode_img) {
            $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
        }

        $file_path = $this->sma->generate_pdf($html, $name, 'S', $this->data['biller']->invoice_footer);
        if (!empty($file_path)) {
            $file_path1 = FCPATH . $file_path;
            if (file_exists($file_path1)) :
                $_url = base_url($file_path);
                $this->sma->md($_url);
                exit;
            endif;
        }
    }
    // public function get_order_reply() {
    //     $json = file_get_contents('php://input');
    //     $data = json_decode($json, true);

    //     if (json_last_error() !== JSON_ERROR_NONE) {
    //         http_response_code(400);
    //         echo json_encode(['status' => 'error', 'message' => 'Invalid JSON format.']);
    //         return;
    //     }

    //     $mobile = substr($data['mobile'], 2);
    //     $status = $data['status'];

    //     $historyData = [
    //         'mobile' => $mobile,
    //         'status' => $status,
    //         'response' => $json
    //     ];

    //     if ($this->db->insert('test', $historyData)) {
    //         echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully.']);
    //     } else {
    //         http_response_code(500);
    //         echo json_encode(['status' => 'error', 'message' => 'Failed to insert data into the database.']);
    //     }
    // }
     public function send_otp() {
        $phone = '917744010738';
        $template_name = 'Darade_order_received';
        $otp = '123456'; // Example OTP, you can generate this dynamically
        // $response = $this->Whatsapp_model->send_order_whatsapp_message($phone,$order_id);
        $response = $this->Whatsapp_model->send_otp_by_whatsapp($phone,$otp);
        $data = json_decode($response, true);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
    }

}
