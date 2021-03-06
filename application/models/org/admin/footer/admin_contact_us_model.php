<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Admin Contact Us Model
 *
 * Author:  Nazmul Hasan
 *
 *
 * Requirements: PHP5 or above
 *
 */
class Admin_contact_us_model extends Ion_auth_model {

    public function __construct() {
        parent::__construct();
    }
    
    /*
     * This method will return all topics 
     * @Author Nazmul on 14th October 2014
     */
    public function get_all_topics()
    {
        return $this->db->select('*')
                ->from($this->tables['footer_cu_topics'])
                ->get();
    }
    
    /*
     * This method will return topic info
     * @param $topic_id, topic id
     * @Author Nazmul on 14th October 2014
     */
    public function get_topic_info($topic_id)
    {
        $this->db->where('id', $topic_id);
        return $this->db->select('*')
                ->from($this->tables['footer_cu_topics'])
                ->get();
    }
    
    /*
     * This method will update a topic 
     * @Author Nazmul on 14th October 2014
     */
    public function update_topic($topic_id, $additional_data)
    {
        $data = $this->_filter_data($this->tables['footer_cu_topics'], $additional_data);
        $this->db->update($this->tables['footer_cu_topics'], $data, array('id' => $topic_id));
    }
    
    /*
     * This method will add a new topic 
     * @Author Nazmul on 14th October 2014
     */
    public function add_topic($additional_data)
    {
        $data = $this->_filter_data($this->tables['footer_cu_topics'], $additional_data);
        $this->db->insert($this->tables['footer_cu_topics'], $data);
    }
    
    /*
     * This method will delete a topic 
     * @Author Nazmul on 14th October 2014
     */
    public function delete_topic($topic_id)
    {
        $this->db->where($this->tables['footer_cu_topics'].'.id', $topic_id);
        $this->db->delete($this->tables['footer_cu_topics']);
    }
    
    /*
     * This method will return all operating systems 
     * @Author Nazmul on 14th October 2014
     */
    public function get_all_operating_systems()
    {
        return $this->db->select('*')
                ->from($this->tables['footer_cu_operating_systems'])
                ->get();
    }
    
    /*
     * This method will return operating system info
     * @param $os_id, operating system id
     * @Author Nazmul on 14th October 2014
     */
    public function get_operating_system_info($os_id)
    {
        $this->db->where('id', $os_id);
        return $this->db->select('*')
                ->from($this->tables['footer_cu_operating_systems'])
                ->get();
    }
    
    /*
     * This method will update an operating system 
     * @Author Nazmul on 14th October 2014
     */
    public function update_operating_system($operating_system_id, $additional_data)
    {
        $data = $this->_filter_data($this->tables['footer_cu_operating_systems'], $additional_data);
        $this->db->update($this->tables['footer_cu_operating_systems'], $data, array('id' => $operating_system_id));
    }
    
    /*
     * This method will add a new operating system
     * @Author Nazmul on 14th October 2014
     */
    public function add_operaging_system($additional_data)
    {
        $data = $this->_filter_data($this->tables['footer_cu_operating_systems'], $additional_data);
        $this->db->insert($this->tables['footer_cu_operating_systems'], $data);
    }
    
    /*
     * This method will delete an operating system 
     * @Author Nazmul on 14th October 2014
     */
    public function delete_operaging_system($operating_system_id)
    {
        $this->db->where($this->tables['footer_cu_operating_systems'].'.id', $operating_system_id);
        $this->db->delete($this->tables['footer_cu_operating_systems']);
    }
    
    /*
     * This method will return all browers 
     * @Author Nazmul on 14th October 2014
     */
    public function get_all_browers()
    {
        return $this->db->select('*')
                ->from($this->tables['footer_cu_browsers'])
                ->get();
    }
        /*
     * This method will return topic info
     * @param $browser_id, browser_id id
     * @Author Nazmul on 14th October 2014
     */
    public function get_browser_info($browser_id)
    {
        $this->db->where('id', $browser_id);
        return $this->db->select('*')
                ->from($this->tables['footer_cu_browsers'])
                ->get();
    }
    
    /*
     * This method will update a brower 
     * @Author Nazmul on 14th October 2014
     */
    public function update_browser($browser_id, $additional_data)
    {
        $data = $this->_filter_data($this->tables['footer_cu_browsers'], $additional_data);
        $this->db->update($this->tables['footer_cu_browsers'], $data, array('id' => $browser_id));
    }
    
    /*
     * This method will add a new brower 
     * @Author Nazmul on 14th October 2014
     */
    public function add_browser($additional_data)
    {
        $data = $this->_filter_data($this->tables['footer_cu_browsers'], $additional_data);
        $this->db->insert($this->tables['footer_cu_browsers'], $data);
    }
    
    /*
     * This method will delete a brower 
     * @Author Nazmul on 14th October 2014
     */
    public function delete_browser($browser_id)
    {
        $this->db->where($this->tables['footer_cu_browsers'].'.id', $browser_id);
        $this->db->delete($this->tables['footer_cu_browsers']);
    }
    /*
     * This method will return member feedback list
     * @Author Nazmul on 27th January 2015
     */
    public function get_member_feedbacks()
    {
        $this->db->order_by($this->tables['footer_cu_feedbacks'].'.created_on','desc');
        return $this->db->select($this->tables['footer_cu_topics'].'.title as topic,'.$this->tables['footer_cu_operating_systems'].'.title as operating_system,'.$this->tables['footer_cu_browsers'].'.title as browser,'.$this->tables['users'].'.email as user_email,'.$this->tables['users'].'.username as user_name,'.$this->tables['users'].'.phone as user_phone,'.$this->tables['footer_cu_feedbacks'].'.*')
                ->from($this->tables['footer_cu_feedbacks'])
                ->join($this->tables['users'], $this->tables['users'] . '.id' . '=' . $this->tables['footer_cu_feedbacks'] . '.user_id')
                ->join($this->tables['footer_cu_topics'], $this->tables['footer_cu_topics'] . '.id' . '=' . $this->tables['footer_cu_feedbacks'] . '.topic_id')
                ->join($this->tables['footer_cu_operating_systems'], $this->tables['footer_cu_operating_systems'] . '.id' . '=' . $this->tables['footer_cu_feedbacks'] . '.os_id')
                ->join($this->tables['footer_cu_browsers'], $this->tables['footer_cu_browsers'] . '.id' . '=' . $this->tables['footer_cu_feedbacks'] . '.browser_id')
                ->get();
    }
    
    /*
     * This method will return non member feedback list
     * @Author Nazmul on 27th January 2015
     */
    public function get_non_member_feedbacks()
    {
        $this->db->where($this->tables['footer_cu_feedbacks'].'.user_id ',NULL);
        $this->db->order_by($this->tables['footer_cu_feedbacks'].'.created_on','desc');
        return $this->db->select($this->tables['footer_cu_feedbacks'].'.*')
                ->from($this->tables['footer_cu_feedbacks'])
                ->get();
    }
    
    /*
     * This method will update a feedback 
     * @Author Nazmul on 14th October 2014
     */
    public function update_feedback($feedback_id, $additional_data)
    {
        
    }
    
    /*
     * This method will delete a feedback 
     * @Author Nazmul on 14th October 2014
     */
    public function delete_feedback($feedback_id)
     {
        if(!isset($feedback_id) || $feedback_id <= 0)
        {
            $this->set_error('delete_feedback_fail');
            return FALSE;
        }
        $this->db->where('id', $feedback_id);
        $this->db->delete($this->tables['footer_cu_feedbacks']);
        
        if ($this->db->affected_rows() == 0) {
            $this->set_error('delete_feedback_fail');
            return FALSE;
        }
        $this->set_message('delete_feedback_successful');
        return TRUE;
    }
}