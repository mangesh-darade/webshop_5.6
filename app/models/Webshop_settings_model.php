<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Webshop_settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getWebshopSettings() {
        $q = $this->db->get('webshop_settings');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function updateWebshopSettings($data) {

        $this->db->where('id', '1');
        if ($this->db->update('webshop_settings', $data)) {
            return true;
        }
        return false;
    }

    public function getThemeSections($theme = "theme_1") {


        $this->db->select("`id`, `section_name`, `section_title`, `display_status`, `display_order`");

        $this->db->from("webshop_homepage_sections");

        $this->db->where(["is_active" => 1, "$theme" => 1]);

        $this->db->order_by("display_order", 'asc');

        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getActiveSections($theme = "theme_1") {


        $this->db->select("`id`, `section_name`, `section_title`, `section_data`");

        $this->db->from("webshop_homepage_sections");

        $this->db->where(["is_active" => 1, "$theme" => 1, "display_status" => 1]);

        $this->db->order_by("display_order", 'asc');

        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function updateWebshopSections($data) {

        if ($this->db->update_batch('webshop_homepage_sections', $data, 'id')) {
            return TRUE;
        }
        return FALSE;
    }

    public function updateFeatures($data) {

        if ($this->db->update_batch('webshop_features', $data, 'id')) {
            return TRUE;
        }
        return FALSE;
    }

    public function get_categories($eshop=null) {

        $where['is_active'] = 1;

        if((bool)$eshop){
            $where['in_eshop'] = 1;
        }
        
        if((bool)$parent_id){
            $where['parent_id'] = $parent_id;
        }
        
        $q = $this->db->select('id, code, name, image, parent_id')->where($where)->order_by('name', 'asc')->get('categories');

        if ($q->num_rows() > 0) {

            foreach ($q->result() as $row) {

                if ((int) $row->parent_id > 0) {
                    $data[$row->parent_id][$row->id] = $row;
                } else {
                    $data['main'][$row->id] = $row;
                }
            }

            return $data;
        }
        return false;
    }

    public function get_category_products($category_id = null) {
        
        $where = ['in_eshop'=>1, 'is_active'=>1];
        
        if($category_id){
            $where['category_id'] = $category_id;
        }
        
        $q = $this->db->select('id, name, code, image, category_id, subcategory_id')
                ->where($where)
                ->get('products');
        
        if ($q->num_rows() > 0) {

            foreach ($q->result() as $row) {

                if ((int)$row->subcategory_id > 0) {
                    $data[$row->category_id][$row->subcategory_id][] = $row;
                } else {
                    $data[$row->category_id][] = $row;
                }
            }

            return $data;
        }
        return false;
    }
    
    public function get_features() {

        $q = $this->db->select('id, title, subtitle, icon, is_active')
                ->from('webshop_features')
                ->get();

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_sliders() {

        $q = $this->db->get('webshop_sliders');

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[$row->slide_key] = (array) $row;
            }
            return $data;
        }
        return false;
    }

    public function updateWebshopSliderSettings($data) {

        if ($this->db->update_batch('webshop_sliders', $data, 'slide_key')) {
            return TRUE;
        }
        return FALSE;
    }
    
    
    
    public function getCustomPages($page_key=null) {
        
        if($page_key){
            $q = $this->db->where(['md5(id)' => $page_key])->get('webshop_static_pages');
        } else {
            $q = $this->db->order_by('is_active', 'desc')->get('webshop_static_pages');
        }
        
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[$row->page_key] = (array) $row;
            }
            return $data;
        }
        return false;
    }
    
    
    public function get_warehouses() {
        
       return $this->db->select('id, code, name')->where(['in_eshop'=>1, 'is_active'=>1, 'is_deleted'=>0, 'is_disabled'=>0, ])->get('warehouses')->result();
    }
    
    public function get_billers() {
        
       return $this->db->select('id, company, name')->where(['group_name'=>'biller'])->get('companies')->result();
    }
    
    /*
     * To update categories & products eshop status
     */
    public function update_eshop_status(string $tableName , array $Where, array $Data) {
    
        $this->db->where($Where)->update($tableName, $Data);
    
        return $this->db->affected_rows();
    }
    
    
    
    
    
    
    
}

//end class
