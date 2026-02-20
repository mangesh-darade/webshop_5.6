<?php

class Sma_hooks {
    protected $CI;
    public function __construct() {
        $this->CI =& get_instance();
    }
    public function check() {
        if(! ($this->CI->db->conn_id)) {
            header("Location: install/index.php");
            die();
        }
    }

    public function minify() {
        ini_set("pcre.recursion_limit", "16777");
        $buffer = $this->CI->output->get_output();
 
        $re =   '%# Collapse whitespace everywhere but in blacklisted elements.
                (?>             # Match all whitespans other than single space.
                  [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
                  | \s{2,}        # or two or more consecutive-any-whitespace.
                  ) # Note: The remaining regex consumes no text at all...
                (?=             # Ensure we are not in a blacklist tag.
                  [^<]*+        # Either zero or more non-"<" {normal*}
                  (?:           # Begin {(special normal*)*} construct
                    <           # or a < starting a non-blacklist tag.
                    (?!/?(?:textarea|pre|script)\b)
                    [^<]*+      # more non-"<" {normal*}
                    )*+           # Finish "unrolling-the-loop"
                (?:           # Begin alternation group.
                    <           # Either a blacklist start tag.
                    (?>textarea|pre|script)\b
                    | \z          # or end of file.
                    )             # End alternation group.
                )  # If we made it here, we are not in a blacklist tag.
                %Six';

        $new_buffer = preg_replace($re, " ", $buffer);

        if($new_buffer === null) {
            $new_buffer = $buffer;
        }

        $this->CI->output->set_output($new_buffer);
        $this->CI->output->_display();
    }


    public function customers_as_students() {
        
         $buffer = $this->CI->output->get_output();
          $new_buffer = $buffer;
         if(base_url() == 'https://qlsacademy.simplypos.in/'){
        
            $find = ['>Customer<','>Customers<','Customers ', 'Customer ', ' Customers', ' Customer','VAT / TIN Number','>Company<','[Company]'];
            $replace = ['>Student<','>Students<','Students ', 'Student ', ' Students', ' Student','Enrollment No.','>Standard<','[Standard]'];
            $new_buffer = str_replace($find, $replace, $buffer);
            
         }
         
         if($new_buffer === null) {
            $new_buffer = $buffer;
        }
        
        $this->CI->output->set_output($new_buffer);
        $this->CI->output->_display();
    }
    
    public function custom_labels_for_ponnusamy() {
        
         $buffer = $this->CI->output->get_output();
          $new_buffer = $buffer;
         if(base_url() == 'https://ponnusamy.simplypos.in/'){
          
            $find = ['>NEFT<','NEFT','>GSTIN<','GSTIN', 'Rupes', 'fa-inr', 'Rs.', 'Rupees Only'];
            $replace = ['>NETS<','NETS','>ROC<','ROC', 'Dollar', 'fa-dollar', '$&nbsp;', 'Dollar Only' ];
            $new_buffer = str_replace($find, $replace, $buffer);
            
         }
         
         if($new_buffer === null) {
            $new_buffer = $buffer;
        }
        
        $this->CI->output->set_output($new_buffer);
        $this->CI->output->_display();
    }
    
    /**
     * Fix SameSite cookie issues by modifying headers before they're sent
     * This is a more direct approach than using setcookie()
     */
    public function fix_same_site_cookie() {
        // Only run this once
        static $headers_fixed = false;
        if ($headers_fixed) return;
        
        // Register a callback to modify headers just before they're sent
        header_register_callback(function() {
            $headers = headers_list();
            header_remove('Set-Cookie');
            
            foreach ($headers as $header) {
                if (strpos($header, 'Set-Cookie:') === 0) {
                    // Extract the cookie part
                    $cookie = substr($header, 11);
                    
                    // Check if it already has SameSite
                    if (strpos($cookie, 'SameSite') === false) {
                        // Add SameSite=None and ensure Secure is present
                        if (strpos($cookie, 'Secure') === false) {
                            $cookie .= '; Secure';
                        }
                        $cookie .= '; SameSite=None';
                        header('Set-Cookie: ' . $cookie, false);
                    } else {
                        // Keep the original header if it already has SameSite
                        header($header, false);
                    }
                }
            }
        });
        
        $headers_fixed = true;
    }
    
    /**
     * Alternative method to force SameSite=None on cookies via output buffering
     * This should be used as a pre_system hook
     */
    public function setup_cookie_fix() {
        // Start output buffering
        ob_start(function($output) {
            // Get all headers that have been set
            $headers = headers_list();
            
            // Clear any Set-Cookie headers
            header_remove('Set-Cookie');
            
            // Re-add all Set-Cookie headers with SameSite=None; Secure
            foreach ($headers as $header) {
                if (strpos($header, 'Set-Cookie:') === 0) {
                    // Extract cookie content
                    $cookie = substr($header, 11);
                    
                    // Add SameSite=None if not present
                    if (strpos($cookie, 'SameSite') === false) {
                        if (strpos($cookie, 'Secure') === false) {
                            $cookie .= '; Secure';
                        }
                        $cookie .= '; SameSite=None';
                        header('Set-Cookie: ' . $cookie, false);
                    } else {
                        // Keep original header
                        header($header, false);
                    }
                }
            }
            
            return $output;
        });
    }

      /**
     * Load active payment gateway credentials from DB and override config values at runtime.
     * - Reads rows from `payment_gateways` where `is_active` = 1
     * - Picks testing/production payload based on existing config TestMode
     * - Supports JSON, serialized array, or simple KEY=VALUE lines
     * - Merges over the file config for backward-compat
     */
    public function load_payment_gateways() {
       
        // Ensure DB is available
        if (!isset($this->CI->db)) {
            $this->CI->load->database();
        }
      
        // Load file config (section) if present to merge with
        $this->CI->config->load('payment_gateways', TRUE);
        $file_section = $this->CI->config->item('payment_gateways');
        if (!is_array($file_section)) {
            $file_section = [];
        }

        // Determine TestMode from file section or global
        $testMode = FALSE;
        if (isset($file_section['TestMode'])) {
            $testMode = (bool)$file_section['TestMode'];
        } else {
            $tm = $this->CI->config->item('TestMode');
            if ($tm !== NULL) { $testMode = (bool)$tm; }
        }

        // Fetch active gateways (use db prefix, e.g., sma_payment_gateways)
        $table = $this->CI->db->dbprefix('payment_gateways');
        $query = $this->CI->db->where('is_active', 1)->get($table);
       
        if (!$query || $query->num_rows() === 0) {
            // Nothing in DB; still ensure individual keys from file get set for consistency
            foreach ($file_section as $k => $v) {
                $this->CI->config->set_item($k, $v);
            }
            $this->CI->config->set_item('payment_gateways', $file_section);
            return;
        }
        $db_section = [];
      
        foreach ($query->result() as $row) {
       
            $title = isset($row->pgateway_title) ? $row->pgateway_title : '';
            if (!$title) { continue; }
            $key = strtolower(trim(preg_replace('/[^a-zA-Z0-9_]+/', '', str_replace(' ', '_', $title))));

            $payload = $testMode ? (isset($row->pgateway_testing) ? $row->pgateway_testing : '')
                                 : (isset($row->pgateway_production) ? $row->pgateway_production : '');
            if ($payload === NULL) { $payload = ''; }

            $arr = $this->parse_gateway_payload($payload);
            if (!is_array($arr)) { $arr = []; }

            // Normalize known gateway key names to match existing code expectations
            // (e.g., ccavenue expects MERCHANT_ID/ACCESS_CODE/API_KEY, etc.)
            $db_section[$key] = $arr;
        }

        // Merge DB over file config (deep)
        $merged = $this->array_replace_recursive_distinct($file_section, $db_section);
      
        // Expose as both the grouped section and individual keys for legacy access patterns
        foreach ($merged as $k => $v) {
            $this->CI->config->set_item($k, $v);
        }
        $this->CI->config->set_item('payment_gateways', $merged);
    }

    // Recursively replace values from $over into $base
    private function array_replace_recursive_distinct(array $base, array $over) {
        foreach ($over as $k => $v) {
            if (is_array($v) && isset($base[$k]) && is_array($base[$k])) {
                $base[$k] = $this->array_replace_recursive_distinct($base[$k], $v);
            } else {
                $base[$k] = $v;
            }
        }
        return $base;
    }

    // Attempt to parse payload as JSON, serialized PHP, or KEY=VALUE lines
    private function parse_gateway_payload($payload) {
        $payload = trim((string)$payload);
        if ($payload === '') { return []; }
        // Try JSON
        $json = json_decode($payload, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($json)) {
            return $json;
        }
        // Try serialized
        $un = @unserialize($payload);
        if ($un !== false && (is_array($un) || is_object($un))) {
            return (array)$un;
        }
        // Try parse_ini style or key=value lines
        $out = [];
        $lines = preg_split('/\r\n|\r|\n|&/', $payload);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') { continue; }
            // Allow JSON-ish quoted values to slip through
            if (strpos($line, '=') !== false) {
                list($k, $v) = array_map('trim', explode('=', $line, 2));
                $k = trim($k, "\"' ");
                $v = trim($v, "\"' ");
                if ($k !== '') { $out[$k] = $v; }
            }
        }
        return $out;
    }
}