<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/bootstrap3/css/home.css">
<div class="row">
    <div class="row col-md-7">
        <?php if(!empty($current_configuration)): ?>
            <a href="<?php echo base_url();?>admin/configure_logout_page/edit_config">
                <button class="btn button-custom pull-right">Edit
                </button>
            </a>
        <?php endif; ?>
    </div>
    <div class="row col-md-7" id="left_part">
        <?php if(isset($current_configuration['img'])): ?>
            <img src="<?php echo base_url().LOGOUT_PAGE_IMAGE_PATH.$current_configuration['img'] ?>" class="img-responsive" style="padding-top:15px">
        <?php endif; ?>
    </div>
</div>
