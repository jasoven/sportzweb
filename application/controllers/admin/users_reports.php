<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_reports extends Admin_Controller{
    public $tmpl = '';
    public $user_group_array = array();
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('org/admin/users_report');
        /*$this->load->library('form_validation');        
        $this->load->helper('url');
        $this->load->library('org/admin/overview_library');  
        $this->load->library('org/admin/access_level/admin_access_level_library'); 
        $this->load->library('org/admin/users_library');
        $this->load->library('org/admin/visitors');      
        $this->load->library('user_logs');      
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ?
                        $this->load->library('mongo_db') :
                        $this->load->database();

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->helper('language');
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/login', 'refresh');
        }
        
        $this->data['allow_view'] = FALSE;
        $this->data['allow_access'] = FALSE;
        $this->data['allow_write'] = FALSE;
        $this->data['allow_approve'] = FALSE;
        $this->data['allow_edit'] = FALSE;
        $this->data['allow_delete'] = FALSE;
        $this->data['allow_configuration'] = FALSE; 
        
        $selected_user_group = $this->session->userdata('user_type');
        if(isset($selected_user_group ) && $selected_user_group != ""){
            $this->user_group_array = array($selected_user_group);
        }
        else
        {
            $this->user_group_array = $this->ion_auth->get_current_user_types();
        } 
        if (in_array(ADMIN, $this->user_group_array)) {
            $this->tmpl = ADMIN_DASHBOARD_TEMPLATE;
            $this->data['allow_view'] = TRUE;
            $this->data['allow_access'] = TRUE;
            $this->data['allow_write'] = TRUE;
            $this->data['allow_approve'] = TRUE;
            $this->data['allow_edit'] = TRUE;
            $this->data['allow_delete'] = TRUE;
            $this->data['allow_configuration'] = TRUE;  
        }
        else
        {
            $access_level_mapping = $this->admin_access_level_library->get_access_level_info($this->session->userdata('user_id'));
            $this->tmpl = USER_DASHBOARD_TEMPLATE;
            $this->data['access_level_mapping'] = $access_level_mapping;
            
            if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_VIEW, $access_level_mapping))
            {
                $this->data['allow_view'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_ACCESS, $access_level_mapping))
            {
                $this->data['allow_access'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_WRITE, $access_level_mapping))
            {
                $this->data['allow_write'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_APPROVE, $access_level_mapping))
            {
                $this->data['allow_approve'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_EDIT, $access_level_mapping))
            {
                $this->data['allow_edit'] = TRUE;
            }if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_DELETE, $access_level_mapping))
            {
                $this->data['allow_delete'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_USERS_OVERVIEW_ID.'_'.ADMIN_ACCESS_LEVEL_CONFIGURATION, $access_level_mapping))
            {
                $this->data['allow_configuration'] = TRUE;  
            }
            if(!$this->data['allow_view'])
            {
                redirect('admin/general/restriction_view', 'refresh');
            }
        }*/
    }

    function index() {
        $this->data['message'] = '';
        $this->data['report_list'] = $this->users_report->get_all_reports()->result_array();
        $this->template->load(null, "admin/users/reports/index", $this->data);
    }
    
    
}