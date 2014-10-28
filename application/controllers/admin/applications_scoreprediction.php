<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Applications_scoreprediction extends CI_Controller{
    public $tmpl = '';
    public $user_group_array = array();
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->library('org/admin/access_level/admin_access_level_library');
        $this->load->library('org/admin/application/admin_score_prediction_library'); 
        $this->load->library('org/utility/Utils');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'ion_auth') ?
                        $this->load->library('mongo_db') :
                        $this->load->database();
        
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
            
            if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_VIEW, $access_level_mapping))
            {
                $this->data['allow_view'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_ACCESS, $access_level_mapping))
            {
                $this->data['allow_access'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_WRITE, $access_level_mapping))
            {
                $this->data['allow_write'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_APPROVE, $access_level_mapping))
            {
                $this->data['allow_approve'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_EDIT, $access_level_mapping))
            {
                $this->data['allow_edit'] = TRUE;
            }if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_DELETE, $access_level_mapping))
            {
                $this->data['allow_delete'] = TRUE;
            }
            if(array_key_exists(ADMIN_ACCESS_LEVEL_APPLICATION_SCORE_PREDICTION_ID.'_'.ADMIN_ACCESS_LEVEL_CONFIGURATION, $access_level_mapping))
            {
                $this->data['allow_configuration'] = TRUE;  
            }
            if(!$this->data['allow_view'])
            {
                redirect('admin/general/restriction_view', 'refresh');
            }
        }        
    }
    
    public function index()
    {
        $this->data['message'] = '';
        $this->data['sports_list'] = $this->admin_score_prediction_library->get_all_sports()->result_array();
        $this->template->load($this->tmpl, "admin/applications/score_prediction/index", $this->data);
    }
    
    // ---------------------------------------- Sports Module -------------------------------
    /*
     * Ajax call to create a new sports
     * @Author Nazmul on 24th October 2014
     */
    public function create_sports()
    {
        $result = array();
        $title = $this->input->post('title');
        $additional_data = array(
            'title' => $title,
            'created_on' => now()
        );
        if($this->admin_score_prediction_library->create_sports($additional_data))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    /*
     * Ajax call to get sports info
     * @Author Nazmul on 24th October 2014
     */
    public function get_sports_info()
    {
        $result['sports_info'] = array();
        $sports_id = $this->input->post('sports_id');
        $sports_info_array = $this->admin_score_prediction_library->get_sports_info($sports_id)->result_array();
        if(!empty($sports_info_array))
        {
            $result['sports_info'] = $sports_info_array[0];
        }
        echo json_encode($result);
    }
    
    /*
     * Ajax call to update sports
     * @Author Nazmul on 24th October 2014
     */
    public function update_sports()
    {
        $result = array();
        $sports_id = $this->input->post('sports_id');
        $title = $this->input->post('title');
        $additional_data = array(
            'title' => $title,
            'modified_on' => now()
        );
        if($this->admin_score_prediction_library->update_sports($sports_id, $additional_data))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    /*
     * Ajax call to delete sports
     * @Author Nazmul on 24th October 2014
     */
    public function delete_sports()
    {
        $result = array();
        $sports_id = $this->input->post('sports_id');
        if($this->admin_score_prediction_library->delete_sports($sports_id))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    // ---------------------------------- Team Module ----------------------------------------
    public function manage_teams()
    {
        $this->data['message'] = '';
        $this->data['team_list'] = $this->admin_score_prediction_library->get_all_teams()->result_array();
        $this->template->load($this->tmpl, "admin/applications/score_prediction/team_list", $this->data);
    }
    
    /*
     * Ajax call to create a new team
     * @Author Nazmul on 24th October 2014
     */
    public function create_team()
    {
        $result = array();
        $title = $this->input->post('title');
        $additional_data = array(
            'title' => $title,
            'created_on' => now()
        );
        if($this->admin_score_prediction_library->create_team($additional_data))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    /*
     * Ajax call to get team info
     * @Author Nazmul on 24th October 2014
     */
    public function get_team_info()
    {
        $result['team_info'] = array();
        $team_id = $this->input->post('team_id');
        $team_info_array = $this->admin_score_prediction_library->get_team_info($team_id)->result_array();
        if(!empty($team_info_array))
        {
            $result['team_info'] = $team_info_array[0];
        }
        echo json_encode($result);
    }
    /*
     * Ajax call to update team
     * @Author Nazmul on 24th October 2014
     */
    public function update_team()
    {
        $result = array();
        $team_id = $this->input->post('team_id');
        $title = $this->input->post('title');
        $additional_data = array(
            'title' => $title,
            'modified_on' => now()
        );
        if($this->admin_score_prediction_library->update_team($team_id, $additional_data))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    /*
     * Ajax call to delete team
     * @Author Nazmul on 24th October 2014
     */
    public function delete_team()
    {
        $result = array();
        $team_id = $this->input->post('team_id');
        if($this->admin_score_prediction_library->delete_team($team_id))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    // ----------------------------------- Tournament Module -----------------------------
    public function manage_tournaments($sports_id)
    {
        $this->data['message'] = '';
        $this->data['sports_id'] = $sports_id;
        $this->data['tournament_list'] = $this->admin_score_prediction_library->get_all_tournaments()->result_array();
        $this->template->load($this->tmpl, "admin/applications/score_prediction/tournament_list", $this->data);
    }
    
    /*
     * Ajax call to create a new tournament
     * @Author Nazmul on 24th October 2014
     */
    public function create_tournament()
    {
        $result = array();
        $title = $this->input->post('title');
        $sports_id = $this->input->post('sports_id');
        $season = $this->input->post('season');
        $additional_data = array(
            'title' => $title,
            'sports_id' => $sports_id,
            'season' => $season,
            'created_on' => now()
        );
        
        if($this->admin_score_prediction_library->create_tournament($additional_data))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    /*
     * Ajax call to get tournament info
     * @Author Nazmul on 24th October 2014
     */
    public function get_tournament_info()
    {
        $result['tournament_info'] = array();
        $tournament_id = $this->input->post('tournament_id');
        $tournament_info_array = $this->admin_score_prediction_library->get_tournament_info($tournament_id)->result_array();
        if(!empty($tournament_info_array))
        {
            $result['tournament_info'] = $tournament_info_array[0];
        }
        echo json_encode($result);
    }
    /*
     * Ajax call to update tournament
     * @Author Nazmul on 24th October 2014
     */
    public function update_tournament()
    {
        $result = array();
        $tournament_id = $this->input->post('tournament_id');
        $season = $this->input->post('season');
        $title = $this->input->post('title');
        $additional_data = array(
            'title' => $title,
            'season' => $season,
            'modified_on' => now()
        );
        if($this->admin_score_prediction_library->update_tournament($tournament_id, $additional_data))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    /*
     * Ajax call to delete tournament
     * @Author Nazmul on 24th October 2014
     */
    public function delete_tournament()
    {
        $result = array();
        $tournament_id = $this->input->post('tournament_id');
        if($this->admin_score_prediction_library->delete_tournament($tournament_id))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    // ---------------------------------- Match Module ------------------------------
    public function manage_matches($tournament_id)
    {
        $this->data['message'] = '';
        $this->data['tournament_id'] = $tournament_id;
        $this->data['match_list'] = $this->admin_score_prediction_library->get_all_matches($tournament_id);
        $this->template->load($this->tmpl, "admin/applications/score_prediction/match_list", $this->data);
    }
    
    /*
     * This method will create a match
     * @param $tournament_id , tournament id
     * @Author Nazmul on 24th October 2014
     */
    public function create_match($tournament_id)
    {
        $this->data['message'] = '';
        $this->form_validation->set_error_delimiters("<div style='color:red'>", '</div>');
        $this->form_validation->set_rules('match_date', 'Match Date', 'xss_clean|required');
        $this->form_validation->set_rules('match_time', 'Match Time', 'xss_clean|required');
        $this->form_validation->set_rules('score_home', 'Home Score', 'xss_clean');
        $this->form_validation->set_rules('score_away', 'Away Score', 'xss_clean');

        if ($this->input->post('submit_create_match'))
        {            
            if($this->form_validation->run() == true)
            {
                $additional_data = array(
                    'tournament_id' => $tournament_id,
                    'team_id_home' => $this->input->post('home_team_list'),
                    'team_id_away' => $this->input->post('away_team_list'),
                    'date' => $this->utils->convert_date_from_ddmmyyyy_to_yyyymmdd($this->input->post('match_date')),
                    'time' => $this->input->post('match_time'),
                    'score_home' => $this->input->post('score_home'),
                    'score_away' => $this->input->post('score_away'),
                    'status_id' => $this->input->post('match_status_list'),
                    'created_on' => now()
                );
                $match_id = $this->admin_score_prediction_library->create_match($additional_data);
                if($match_id !== FALSE)
                {
                    $this->session->set_flashdata('message', $this->admin_score_prediction_library->messages());
                    redirect('admin/applications_scoreprediction/create_match/'.$tournament_id,'refresh');
                }
                else
                {
                    $this->data['message'] = 'Error while creating a match.';
                }
            }
            else
            {
                $this->data['message'] = validation_errors();
            }            
        }
        else
        {
            $this->data['message'] = $this->session->flashdata('message'); 
        }

        $team_list = array();
        $team_list_array = $this->admin_score_prediction_library->get_all_teams()->result_array();
        foreach($team_list_array as $team_info)
        {
            $team_list[$team_info['team_id']] = $team_info['title'];
        }
        $this->data['team_list'] = $team_list;
        
        $match_status_list = array();
        $match_status_list_array = $this->admin_score_prediction_library->get_match_statuses()->result_array();
        foreach($match_status_list_array as $match_status)
        {
            $match_status_list[$match_status['match_status_id']] = $match_status['title'];
        }
        $this->data['match_status_list'] = $match_status_list;
        
        $this->data['match_date'] = array(
            'name' => 'match_date',
            'id' => 'match_date',
            'type' => 'text',
            'value' => $this->form_validation->set_value('match_date'),
        );
        $this->data['match_time'] = array(
            'name' => 'match_time',
            'id' => 'match_time',
            'type' => 'text',
            'value' => $this->form_validation->set_value('match_time'),
        );
        $this->data['score_home'] = array(
            'name' => 'score_home',
            'id' => 'score_home',
            'type' => 'text',
            'value' => $this->form_validation->set_value('score_home'),
        );
        $this->data['score_away'] = array(
            'name' => 'score_away',
            'id' => 'score_away',
            'type' => 'text',
            'value' => $this->form_validation->set_value('score_away'),
        );
        $this->data['submit_create_match'] = array(
            'name' => 'submit_create_match',
            'id' => 'submit_create_match',
            'type' => 'submit',
            'value' => 'Create',
        );
        $this->data['tournament_id'] = $tournament_id;
        $this->template->load($this->tmpl, "admin/applications/score_prediction/match_create", $this->data);
    }
    
    /*
     * This method will update a match
     * @param $match_id, match id
     * @Author Nazmul on 24th October 2014
     */
    public function update_match($match_id = 0)
    {
        if(empty($match_id))
        {
            redirect("admin/applications_scoreprediction","refresh");
        }
    }
    
    /*
     * Ajax call to delete match
     * @Author Nazmul on 24th October 2014
     */
    public function delete_match()
    {
        $result = array();
        $match_id = $this->input->post('match_id');
        if($this->admin_score_prediction_library->delete_match($match_id))
        {
            $result['message'] = $this->admin_score_prediction_library->messages_alert();
        }
        else
        {
            $result['message'] = $this->admin_score_prediction_library->errors_alert();
        }
        echo json_encode($result);
    }
    
    // ----------------------------- Home page configuration module -----------------------
    public function configure_home_page()
    {        
        $this->form_validation->set_error_delimiters("<div style='color:red'>", '</div>');
        $this->form_validation->set_rules('selected_date', 'Date', 'xss_clean|required');
        $this->data['message'] = '';
        if($this->input->post('submit_configure_homepage'))
        {
            if($this->form_validation->run() == true)
            {
                $additional_data = array(
                    'sports_id' => $this->input->post('sports_list'),
                    'selected_date' => $this->utils->convert_date_from_ddmmyyyy_to_yyyymmdd($this->input->post('selected_date')),
                    'created_on' => now()
                );
                $id = $this->admin_score_prediction_library->add_home_page_configuration($additional_data);
                if($id !== FALSE)
                {
                    $this->session->set_flashdata('message', $this->admin_score_prediction_library->messages());
                    redirect('admin/applications_scoreprediction/configure_home_page','refresh');
                }
                else
                {
                    $this->data['message'] = $this->admin_score_prediction_library->errors();
                }
            }
            else
            {
                $this->data['message'] = validation_errors();
            }
            
        }
        else
        {
            $this->data['message'] = $this->session->flashdata('message'); 
        }
        
        $sports_list = array();
        $sports_list_array = $this->admin_score_prediction_library->get_all_sports()->result_array();
        foreach($sports_list_array as $sports)
        {
            $sports_list[$sports['sports_id']] = $sports['title'];
        }
        $this->data['sports_list'] = $sports_list;
        $this->data['selected_date'] = array(
            'name' => 'selected_date',
            'id' => 'selected_date',
            'type' => 'text'
        );
        $this->data['submit_configure_homepage'] = array(
            'name' => 'submit_configure_homepage',
            'id' => 'submit_configure_homepage',
            'type' => 'submit',
            'value' => 'Configure',
        );
        $this->template->load($this->tmpl, "admin/applications/score_prediction/configure_home_page", $this->data);
    }
}
