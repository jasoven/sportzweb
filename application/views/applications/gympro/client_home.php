<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/bootstrap3/css/gympro.css">
<div class="container-fluid">    
    <div class="row top_margin">
        <?php 
        if($account_type_id == APP_GYMPRO_ACCOUNT_TYPE_ID_CLIENT)
        {
            $this->load->view("applications/gympro/template/sections/client_left_pane"); 
        }
        else
        {
            $this->load->view("applications/gympro/template/sections/pt_left_pane"); 
        }            
        ?>
        <div class="col-md-9">
            <div class="row form-group">
                <div class="col-md-12">
                    <div style="position: relative">
                        <img class="img-responsive" src="<?php echo base_url(); ?>resources/images/applications/gympro/personal-trainers.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>