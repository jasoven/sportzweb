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
class Trending_features {
    public function __construct() {
        $this->load->config('ion_auth', TRUE);
        $this->load->library('email');
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
                        $this->load->model('trending_features_model');

        $this->trending_features_model->trigger_events('library_constructor');
    }

    /**
     * __call
     *
     * Acts as a simple way to call model methods without loads of stupid alias'
     *
     * */
    public function __call($method, $arguments) {
        if (!method_exists($this->trending_features_model, $method)) {
            throw new Exception('Undefined method ::' . $method . '() called in trending_features_model');
        }

        return call_user_func_array(array($this->trending_features_model, $method), $arguments);
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
    
    public function store_hashtag($hashtag, $status_id)
    {
        $status_info = new stdClass();
        $status_info->status_id = $status_id;
        
        $status_list_array = array();
        $status_list_array[] = $status_info;
        
        $counter = 0;
        $hashtag_info_array = $this->trending_features_model->get_hashtag_info($hashtag)->result_array();
        if(!empty($hashtag_info_array))
        {
            $hashtag_info = $hashtag_info_array[0];
            $status_list = json_decode($hashtag_info['status_list']);     
            foreach($status_list as $status)
            {
                $status_list_array[] = $status;
            }
            
            $counter = count($status_list_array);
            $data = array(
                'status_list' => json_encode($status_list_array),
                'counter' => $counter
            );
            $this->trending_features_model->update_hashtag_info($hashtag, $data);
        }
        else
        {
            $counter = 1;
            $data = array(
                'hashtag' => $hashtag,
                'status_list' => json_encode($status_list_array),
                'counter' => $counter
            );
            $this->trending_features_model->add_hashtag_info($data);
        }
    }
    
    public function get_status_ids_hashtag($hashtag)
    {
        $status_id_list = array();
        $hashtag_info_array = $this->trending_features_model->get_hashtag_info($hashtag)->result_array();
        if(!empty($hashtag_info_array))
        {
            $hashtag_info = $hashtag_info_array[0];
            $status_list_array = json_decode($hashtag_info['status_list']);            
            foreach($status_list_array as $status_info)
            {
                $status_id_list[] = $status_info->status_id;
            }
        }
        return $status_id_list;
    }   
}

?>
