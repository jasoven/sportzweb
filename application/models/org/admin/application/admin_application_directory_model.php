<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Application Directory Model
 *
 * Author:  Nazmul Hasan
 *
 *
 * Requirements: PHP5 or above
 *
 */
class Admin_application_directory_model extends Ion_auth_model {

    protected $application_title_identity_column;

    public function __construct() {
        parent::__construct();
        $this->application_title_identity_column = $this->config->item('application_title_identity_column', 'ion_auth');
    }

    /*
     * This method will check identity of an application
     * @Author Nazmul on 19th September 2014
     * @modified by Omar Faruk
     */

    public function identity_check($identity) {
        if (empty($identity)) {
            return FALSE;
        }
        $this->db->where($this->application_title_identity_column, $identity);
        return $this->db->count_all_results($this->tables['application_directory']) > 0;
    }

    /*
     * This method will return all application for application directory feature
     * @Author Nazmul on 19th September 2014
     * @modified by Omar Faruk
     */

    public function get_all_applications() {
        return $this->db->select($this->tables['application_directory'] . ".*")
                        ->from($this->tables['application_directory'])
                        ->order_by('order', 'asc')
                        ->get();
    }

    /*
     * This method will create a new application
     * @Author Omar Faruk on 19th September 2014
     */

    public function get_application_info($application_id) {
        if (!empty($application_id)) {
            $this->db->where($this->tables['application_directory'] . '.id', $application_id);
        }
        return $this->db->select($this->tables['application_directory'] . '.*')
                        ->from($this->tables['application_directory'])
                        ->get();
    }

    /*
     * This method will create a new application
     * @Author Nazmul on 19th September 2014
     * @modified by Omar Faruk
     */

    public function create_application($data = array()) {
        $this->trigger_events('pre_create_application_directory');
        if ($this->application_title_identity_column == 'title' && $this->identity_check($data['title'])) {
            $this->set_error('application_name_duplicate');
            return FALSE;
        }

        $additional_data = $this->_filter_data($this->tables['application_directory'], $data);
        $this->db->insert($this->tables['application_directory'], $additional_data);
        $id = $this->db->insert_id();

        $this->trigger_events('post_create_application_directory');
        return (isset($id)) ? $id : FALSE;
    }

    /*
     * This method will update an application
     * @Author Nazmul on 19th September 2014
     * @modified by Omar Faruk
     */

    public function update_application($id, $data = array()) {
        $application_info = $this->get_application_info($id)->row();

        if (array_key_exists($this->application_title_identity_column, $data) && $this->identity_check($data[$this->application_title_identity_column]) && $application_info->{$this->application_title_identity_column} !== $data[$this->application_title_identity_column]) {
            $this->set_error('application_title_duplicate');
            return FALSE;
        }

        $this->db->trans_begin();

        $data = $this->_filter_data($this->tables['application_directory'], $data);
        $this->db->where('id', $id);
        $this->db->update($this->tables['application_directory'], $data);
        if ($this->db->affected_rows() == 0) {
            return FALSE;
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->trans_commit();
        return TRUE;
    }
    
    /*
     * This method will create an application item reference
     * @aurhtor nazmul hasan on 29th august 2015
     */
    public function create_app_item_reference($data)
    {
        $additional_data = $this->_filter_data($this->tables['app_item_reference_list'], $data);
        $this->db->insert($this->tables['app_item_reference_list'], $additional_data);
        $insert_id = $this->db->insert_id();
        return (isset($insert_id)) ? $insert_id : FALSE;
    }
    
    /*
     * This method will update an application item reference
     * @aurhtor nazmul hasan on 29th august 2015
     */
    public function update_app_item_reference($app_item_reference_id, $data)
    {
        $this->db->trans_begin();
        
        $data = $this->_filter_data($this->tables['app_item_reference_list'], $data);
        
        $this->db->where('id',$app_item_reference_id);
        $this->db->update($this->tables['app_item_reference_list'],$data);
        
        if ($this->db->affected_rows() == 0) {
            return FALSE;
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }
    
    /*
     * This method will return an application item reference info
     * @aurhtor nazmul hasan on 29th august 2015
     */
    public function get_app_item_reference_info($app_item_reference_id)
    {
        $this->db->where('id', $app_item_reference_id);
        return $this->db->select($this->tables['app_item_reference_list'] . ".id as reference_id, ".$this->tables['app_item_reference_list'].'.*')
                ->from($this->tables['app_item_reference_list'])
                ->get();
    }
    
    /*
     * This method will return all application item references
     * @aurhtor nazmul hasan on 29th august 2015
     */
    public function get_all_app_item_references()
    {
        return $this->db->select($this->tables['app_item_reference_list'] . ".id as reference_id, ".$this->tables['app_item_reference_list'].'.*')
                ->from($this->tables['app_item_reference_list'])
                ->order_by('title', 'asc')
                ->get();
    }
    
    /*
     * This method will delete an application item reference
     * @aurhtor nazmul hasan on 29th august 2015
     */
    public function delete_app_item_reference($reference_id)
    {
        if(!isset($reference_id) || $reference_id <= 0)
        {
            return FALSE;
        }
        $this->db->where('id', $reference_id);
        $this->db->delete($this->tables['app_item_reference_list']);
        
        if ($this->db->affected_rows() == 0) {
            return FALSE;
        }
        return TRUE;
    }

}
