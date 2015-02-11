<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Name: Score Prediciton Model
 * 
 * Author: Nazmul
 * 
 * Requirement: PHP 5 and more
 */

class Score_prediction_model extends Ion_auth_model
{
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * This method will return all sports
     * @Author Nazmul on 26th October 2014
     */
    public function get_all_sports()
    {
        return $this->db->select($this->tables['app_sp_sports'].'.id as sports_id,'.$this->tables['app_sp_sports'].'.*')
                    ->from($this->tables['app_sp_sports'])
                    ->get();
    }

    /*
     * This method will return all tournaments
     * @Author Nazmul on 24th October 2014
     */
    public function get_all_tournaments($sports_id)
    {
        $this->db->where('sports_id', $sports_id);
        return $this->db->select($this->tables['app_sp_tournaments'].'.id as tournament_id,'.$this->tables['app_sp_tournaments'].'.*')
                    ->from($this->tables['app_sp_tournaments'])
                    ->get();
    }
    
    /*
     * This method will retrun home page configuration of a date
     * If there is no configuration for a date then it will return previously latest configured info
     * @param, $date, configuration date
     * @Author Namzul on 26th October 2014
     */
    public function get_home_page_configuration_info($date)
    {
        $this->db->where('selected_date <=',$date);
        $result = $this->db->select('*')
                        ->from($this->tables['app_sp_configure_homepage'])
                        ->order_by('id', 'desc')
                        ->limit(1)
                        ->get();
        return $result;
    }
    

    ////////////////////////////////////////////////
    //controller
    public function test_get_all_teams() {
        return $this->db->select('*')
                        ->from($this->tables['app_sp_teams'])
                        ->get();
    }
    public function test_get_matches() {
        if (isset($this->_ion_where)) {
            foreach ($this->_ion_where as $where) {
                $this->db->where($where);
            }
            $this->_ion_where = array();
        }
        return $this->db->select('*')
                        ->from($this->tables['app_sp_matches'])
                        ->get();
    }
    
    
    public function get_prediction_info_for_match( $match_id ) {
        $this->db->where('match_id', $match_id);
        return $this->db->select('*')
                        ->from($this->tables['app_sp_match_predictions'])
                        ->get();
    }
    public function update_prediction_info_for_match($match_id, $prediction_list) {
        $additional_data = array(
            'match_id' => $match_id,
            'prediction_list' => $prediction_list
        );
        $data = $this->_filter_data($this->tables['app_sp_match_predictions'], $additional_data);
        $this->db->update($this->tables['app_sp_match_predictions'], $data, array('match_id' => $match_id));
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }
        return TRUE;
    }
    public function get_predictions_matches_for_tournament( $tournament_id='1' )
    {
        if (isset($this->_ion_where)) {
            foreach ($this->_ion_where as $where) {
                    $this->db->where($where);
            }
            $this->_ion_where = array();
        }
        $this->db->where($this->tables['app_sp_matches'].'.tournament_id', $tournament_id);
        return $this->db->select("*, ".$this->tables['app_sp_matches'].".id as match_id, ".$this->tables['app_sp_match_predictions'].".id as prediction_id")
                        ->from($this->tables['app_sp_matches'])
                        ->join($this->tables['app_sp_match_predictions'], $this->tables['app_sp_match_predictions'] . '.match_id=' . $this->tables['app_sp_matches'] . '.id', 'left')
                        ->get();
    }
    
    //this method needs re-evaluation
    public function add_prediction_for_match( $match_id, $prediction )
    {
        $all_predictions_under_match = $this->get_predictions_matches_for_tournament($match_id);
        $all_predictions_under_match = $all_predictions_under_match['prediction_list'];
        $additional_data = array(
            'match_id' => $match_id,
            'prediction_list' => $all_predictions_under_match
        );
        $data = $this->_filter_data($this->tables['app_sp_match_predictions'], $additional_data);
        $this->db->update($this->tables['app_gympro_users'], $data, array('match_id' => $match_id));
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }
        return TRUE;
    }
}