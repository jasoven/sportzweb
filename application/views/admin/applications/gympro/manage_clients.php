<div class="panel panel-default">
    <div class="panel-heading">Manage Clients</div>
    <div class="panel-body">
        
        <div class="row" style="padding-bottom:10px">
            <div class ="col-md-2">
                <a href="<?php echo base_url()?>admin/applications_gympro/manage_health_questions"><button class="form-control btn button-custom">Health Questions</button></a>
            </div>
            <div class ="col-md-2">
                <a href="<?php echo base_url()?>admin/applications_gympro/manage_client_statuses">
                    <button class="btn button-custom">Client Status</button>
                </a>
            </div>
            <div class ="col-md-2">
                <button onclick="open_modal_create()" class="form-control btn button-custom">Create Client</button>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">FIRST NAME</th>
                            <th style="text-align: center">LAST NAME</th>
                            <th style="text-align: center">EDIT</th>
                            <th style="text-align: center">DELETE</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_category_list">
                        <?php foreach($clients_list as $type_info):?>
                        <tr>
                            <td style="text-align: center"><?php echo $type_info['id'];?></td>
                            <td style="text-align: center"><?php echo $type_info['first_name'];?></td>
                            <td style="text-align: center"><?php echo $type_info['last_name'];?></td>
                            <?php if($allow_edit){ ?>
                                <td style="text-align: center">
                                    <button onclick="open_modal_update(<?php echo $type_info['id']?>)" value="" class="form-control btn">
                                        Edit
                                    </button> 
                                </td>
                                <?php } ?>
                            <?php if($allow_delete){ ?>
                            <td style="text-align: center">
                                <button onclick="open_modal_delete_confirm(<?php echo $type_info['id']?>)" value="" class="form-control btn">
                                    Delete
                                </button>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
$this->load->view("admin/applications/gympro/modal/clients_create");
$this->load->view("admin/applications/gympro/modal/clients_edit");
$this->load->view("admin/applications/gympro/modal/clients_delete_confirm");
?>
