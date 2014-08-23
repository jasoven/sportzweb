<div class="panel panel-default">
    <div class="panel-heading">Blog List</div>
    <div class="panel-body">
        <div class="row col-md-12">
            
            <div class="row form-group">
                <div class ="col-sm-9"></div>
                <?php if ($allow_access): ?>
                <div class ="col-sm-3">
                    <a href="<?php echo base_url()."admin/applications_blogs/create_blog/".$category_id ?>" >
                        <button id="" value="" class="form-control btn button-custom pull-right">
                            Create Blog
                        </button>
                    </a> 
                </div>
                <?php endif;?>
            </div>
            <?php if ($allow_access): ?>
            <div class="row">
                <div class="table-responsive table-left-padding">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Comments</th>
                                <?php if($allow_access){ ?>
                                <th>Edit</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="tbody_blog_list_category">
                            <?php $i=1;foreach($blog_list as $blog):?>
                            <tr>
                                <td><a href="<?php echo base_url().'admin/applications_blogs/blog_detail/'.$blog['id'] ?>"><?php echo $i++;?></td>
                                <td>
                                    <?php echo form_dropdown('order_list', array('0' => 'Order by date')+$order_list, $blog['order_no'],'id='.$blog['id'].' class=form-control'); ?>                                    
                                    <input type="hidden" id="<?php echo $blog['id'].'_created_on';?>" value="<?php echo $blog['created_on'];?>"/>
                                </td>
                                <td><?php echo html_entity_decode(html_entity_decode($blog['title']));?></td>
                                <td><a href="<?php echo base_url().'admin/applications_blogs/comment_list/'.$blog['id']; ?>">Comments</a></td>
                                <?php if($allow_access){ ?>
                                <td><a href="<?php echo base_url().'admin/applications_blogs/edit_blog/'.$blog['id']; ?>">Edit</a></td>
                                <?php } ?>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="btn-group" style="padding-left: 25px;">
                    <input type="button" style="width:120px;" value="Back" id="back_button" onclick="javascript:history.back();" class="form-control btn button-custom">
                </div>
                <?php if($allow_access){ ?>
                <div class="btn-group pull-right" style="padding-left: 25px;">
                    <input type="button" style="width:120px;" value="Save Order" id="button_save_order" class="form-control btn button-custom">
                </div>
                <?php } ?>
            </div>            
        </div>   
        <?php endif;?>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#button_save_order").on("click", function() {
            var selected_value_list = Array();
            $("select", "#tbody_blog_list_category").each(function(){
                selected_value_list.push({
                    id: $(this).attr('id'),
                    order: $("select#"+$(this).attr('id')+" option:selected").val(),
                    created_on: $('#'+$(this).attr('id')+'_created_on').val()
                });
//                alert($('#'+$(this).attr('id')+'_created_on').val());
            });
//            $("select", "#tbody_blog_list_category").each(function(){ selected_value_list.push($("select#"+$(this).attr('id')+" option:selected").val()); });
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>' + 'admin/applications_blogs/update_blog',
                data: { 
                    selected_value_list : selected_value_list
                },
                success: function(data) {
                    alert(data.message);
                }
            });

        });
    });
</script>