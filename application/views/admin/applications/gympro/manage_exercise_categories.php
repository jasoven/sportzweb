<div class="panel panel-default">
    <div class="panel-heading">Exercise Categories</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="text-align: center">Id</th>
                            <th style="text-align: center">Title</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_category_list">
                        <?php foreach($exercise_category_list as $exercise_category_info):?>
                        <tr>
                            
                            <td style="text-align: center">
                                <a href="<?php echo base_url().'admin/applications_gympro/manage_exercise_subcategories/'.$exercise_category_info['exercise_category_id']?>">
                                <?php echo $exercise_category_info['exercise_category_id'];?>
                                </a>                                
                            </td>                                                       
                            <td style="text-align: center"><?php echo $exercise_category_info['title'];?></td>                            
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="btn-group" style="padding-left: 10px;">
            <input type="button" style="width:120px;" value="Back" id="back_button" onclick="javascript:history.back();" class="form-control btn button-custom">
        </div>
    </div>
</div>