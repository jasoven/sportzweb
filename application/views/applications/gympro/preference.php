<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/bootstrap3/css/gympro.css">
<div class="container-fluid">    
    <div class="row top_margin">
        <div class="col-md-2">
            <?php $this->load->view("applications/gympro/template/sections/left_pane"); ?>
        </div>
        <div class="col-md-7" style="padding-top: 40px; background-color: lightgray;">
            <?php echo form_open("applications/gympro/preference/".$gympro_user_id, array('id' => 'form_preference', 'class' => 'form-horizontal')); ?>
                <div class ="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8"><?php echo $message; ?></div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-4 control-label requiredField">
                        Height unit: 
                    </label>
                    <div class ="col-md-6">
                        <?php echo form_dropdown('height_unit_list', $height_unit_list, '', 'class=form-control id=height_unit_list'); ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-md-4 control-label requiredField">
                        Weight unit: 
                    </label>
                    <div class ="col-md-6">
                        <?php echo form_dropdown('weight_unit_list', $weight_unit_list, '', 'class=form-control id=weight_unit_list'); ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-md-4 control-label requiredField">
                        Girth unit: 
                    </label>
                    <div class ="col-md-6">
                        <?php echo form_dropdown('girth_unit_list', $girth_unit_list, '', 'class=form-control id=girth_unit_list'); ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-md-4 control-label requiredField">
                        Time zone: 
                    </label>
                    <div class ="col-md-6">
                        <?php echo form_dropdown('time_zone_list', $time_zone_list, '', 'class=form-control id=time_zone_list'); ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-md-4 control-label requiredField">
                        Hourly rate: 
                    </label>
                    <div class ="col-md-6">
                        <?php echo form_dropdown('hourly_rate_list', $hourly_rate_list, '', 'class=form-control id=hourly_rate_list'); ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-md-4 control-label requiredField">
                        Currency: 
                    </label>
                    <div class ="col-md-6">
                        <?php echo form_dropdown('currency_list', $currency_list, '', 'class=form-control id=currency_list'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="submit_update_preference" class="col-md-4 control-label requiredField">

                    </label>
                    <div class ="col-md-offset-3 col-md-3">
                        <?php echo form_input($submit_update_preference+array('class'=>'form-control button-custom')); ?>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>