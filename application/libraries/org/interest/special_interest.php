<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Ion Auth
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 */
class Special_interest {
    public function __construct() {
        $this->load->config('ion_auth', TRUE);
        $this->load->library('email');
        $this->load->library('basic_profile');
        $this->lang->load('ion_auth');
        $this->load->helper('cookie');
        

        // Load the session, CI2 as a library, CI3 uses it as a driver
        if (substr(CI_VERSION, 0, 1) == '2') {
            $this->load->library('session');
        } else {
            $this->load->driver('session');
        }

        // Load IonAuth MongoDB model if it's set to use MongoDB,
        // We assign the model object to "ion_auth_model" variable.
        $this->config->item('use_mongodb', 'ion_auth') ?
                        $this->load->model('ion_auth_mongodb_model', 'ion_auth_model') :
                        $this->load->model('org/interest/special_interest_model');;

        $this->special_interest_model->trigger_events('library_constructor');
    }

    /**
     * __call
     *
     * Acts as a simple way to call model methods without loads of stupid alias'
     *
     * */
    public function __call($method, $arguments) {
        if (!method_exists($this->special_interest_model, $method)) {
            throw new Exception('Undefined method ::' . $method . '() called in special_interest_model');
        }

        return call_user_func_array(array($this->special_interest_model, $method), $arguments);
    }

    /**
     * __get
     *
     * Enables the use of CI super-global without having to define an extra variable.
     *
     * I can't remember where I first saw this, so thank you if you are the original author. -Militis
     *
     * @access	public
     * @param	$var
     * @return	mixed
     */
    public function __get($var) {
        return get_instance()->$var;
    }
    
    // rpc module
    public function get_special_interest_list()
    {
        $special_interest_list = array();
        $special_interests_array = $this->special_interest_model->get_special_interest_list()->result_array();
        foreach($special_interests_array as $special_interest_info)
        {
            $subcategories = array();                
            $sub_category_list = $special_interest_info['sub_category_list'];
            if( $sub_category_list != "" && $sub_category_list != NULL )
            {
                $asub_category_list_array = json_decode($sub_category_list);   
                foreach($asub_category_list_array as $asub_category_info)
                {
                    $subcategory = array(
                        'id' => $asub_category_info->id,
                        'description' => $asub_category_info->description
                    );  
                    $subcategories[] = $subcategory;
                }
            }
            $special_interest_info['sub_category_list'] = $subcategories;
            $special_interest_list[] = $special_interest_info;
        }
        return $special_interest_list;
    }
    
    public function get_user_special_interest_id_list($user_id = 0)
    {
        $special_interest_id_list = array();
        if($user_id == 0)
        {
            $user_id = $this->session->userdata('user_id');
        }
        $special_interest_info_array = $this->basic_profile->get_member_profile_special_interests($user_id)->result_array();
        if(!empty($special_interest_info_array))
        {
            $special_interest_info = $special_interest_info_array[0];
            $special_interests = $special_interest_info['special_interests'];
            if( $special_interests != "" && $special_interests != NULL )
            {
                $special_interests_array = json_decode($special_interests);   
                foreach($special_interests_array as $special_interest)
                {
                    if(!in_array($special_interest->interest_id, $special_interest_id_list))
                    {
                        $special_interest_id_list[] = $special_interest->interest_id;
                    }
                }
            }
        }
        return $special_interest_id_list;
    }
   
}
