<div class="panel panel-default">
    <div class="panel-heading">Product Sizes for YOUTH</div>
    <div class="panel-body">
        <div class="row col-md-12">
            <div class="row form-group" style="padding-left: 10px;">
                <?php if ($allow_write) { ?>
                    <div class ="col-md-2 pull-left">
                        <button onclick="open_modal_create()" value="" class="form-control btn button-custom">Create Product Size</button>
                    </div>
                <?php } ?>
            </div>

            <div class="row">
                <div class="table-responsive table-left-padding">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Size Title</th>
                                <th>US - CA</th>
                                <th>UK</th>
                                <th>EU</th>
                                <?php if ($allow_edit) { ?>
                                <th style="text-align: center">Edit</th>
                                <?php } ?>
                                <?php if ($allow_delete) { ?>
                                <th style="text-align: center">Delete</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>                
                            <?php foreach ($size_list as $size_data) { ?>
                            <tr>
                                <td><?php echo $size_data['id'] ?></a></td>
                                <td><?php echo $size_data['title'] ?></td>
                                <td><?php echo $size_data['us_ca'] ?></td>
                                <td><?php echo $size_data['uk'] ?></td>
                                <td><?php echo $size_data['eu'] ?></td>
                                <?php if ($allow_edit) { ?>
                                <td>
                                    <button onclick="open_modal_update(<?php echo $size_data['id'] ?>)" class="form-control btn">
                                        Edit
                                    </button>
                                </td>
                                <?php } ?>
                                <?php if ($allow_delete) { ?>
                                <td>
                                    <button onclick="open_modal_size_delete_confirm(<?php echo $size_data['id'] ?>)" class="form-control btn">
                                        Delete
                                    </button>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn-group" style="padding-left: 10px;">
                <input type="button" style="width:120px;" value="Back" id="back_button" onclick="javascript:history.back();" class="form-control btn button-custom">
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view("admin/applications/shop/modal/product_size_create_youth");
    $this->load->view("admin/applications/shop/modal/product_size_deleteconfirm_youth");
    $this->load->view("admin/applications/shop/modal/product_size_update_youth");
?>
