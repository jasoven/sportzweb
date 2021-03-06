<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  login out Model
 *
 * Author:  Nazmul Hasan
 *
 *
 * Requirements: PHP5 or above
 *
 */
class Logout_page_model extends Ion_auth_model {

    public function __construct() {
        parent::__construct();
    }
    
    public function test()
    {
        print_r('test message at logout page model');
    }
    
    /*
     * This method will return logout page configuration of less then or equal to current date
     * @param $current_date, current date
     * @Author Nazmul on 26July 2014
     */
    public function get_current_configuration($current_date)
    {
        $this->db->where('selected_date <=', $current_date);
        $this->db->order_by('id', 'desc');
        return $this->db->select("*")
                    ->from($this->tables['configure_logout_page'])
                    ->limit(1)
                    ->get();
    }
}
?>
