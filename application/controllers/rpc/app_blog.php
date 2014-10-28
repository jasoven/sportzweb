<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include 'jsonRPCServer.php';

class App_blog extends JsonRPCServer {
//class App_blog extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('org/application/blog_app_library');
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ?
                        $this->load->library('mongo_db') :
                        $this->load->database();
    }

    function index() {
        
    }
    
    function load_blog_app()
    {
        $response = array();        
        $blog_category_blog_list = array();
        $blog_custom_category_list = array();
        
        $blog_custom_category_list_array = $this->blog_app_model->get_all_blog_custom_categories()->result_array();
        foreach($blog_custom_category_list_array as $blog_custom_category)
        {
            if($blog_custom_category['id'] == 1)
            {
                $blog_list = array();
                $blog_home_page_configuration = $this->blog_app_library->get_home_page_blog_configuration();
                if(array_key_exists('blog_id_blog_info_map', $blog_home_page_configuration))
                {
                    $blog_list_array = $blog_home_page_configuration['blog_id_blog_info_map'];
                    foreach($blog_list_array as $blog_info)
                    {
                        $blog = array(
                            'id' => $blog_info['id'],
                            'title' => $blog_info['title'],
                            'picture' => $blog_info['picture']
                        );
                        $blog_list[] = $blog;
                    }
                    $category_blog = array(
                        'id' => 0,
                        'title' => $blog_custom_category['title'],
                        'blog_list' => $blog_list
                    );
                    $blog_category_blog_list[] = $category_blog;
                }
            }
            else
            {
                $category = array(
                    'id' => $blog_custom_category['id'],
                    'title' => $blog_custom_category['title']
                );
                $blog_custom_category_list[] = $category;
            }
            
        }
        
        $blog_category_list_array = $this->blog_app_model->get_all_blog_categories()->result_array();
        foreach($blog_category_list_array as $blog_category)
        {
            $blog_list = array();
            $blog_list_array = $this->blog_app_library->get_all_blog_by_category($blog_category['id']);
            foreach($blog_list_array as $blog_info)
            {
                $blog = array(
                    'id' => $blog_info['id'],
                    'title' => $blog_info['title'],
                    'picture' => $blog_info['picture']
                );
                $blog_list[] = $blog;
            }
            $category_blog = array(
                'id' => $blog_category['id'],
                'title' => $blog_category['title'],
                'blog_list' => $blog_list
            );
            $blog_category_blog_list[] = $category_blog;
        }        
        $response['blog_category_blog_list'] = $blog_category_blog_list;
        $response['blog_custom_category_list'] = $blog_custom_category_list;
        return json_encode($response);
    }
    
    function get_blog_info($blog_id)
    {
        $result = array();
        $blog_info = array();
        $blog_info_array = $this->blog_app_library->get_blog_info($blog_id)->result_array();
        if(!empty($blog_info_array))
        {
            $blog_info = $blog_info_array[0];
        }
        $result['blog_info'] = $blog_info;
        return json_encode($result);
    }
}