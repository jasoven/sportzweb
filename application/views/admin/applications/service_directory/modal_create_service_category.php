<script type="text/javascript">
    $(function() {
        $("#button_save_service_category").on("click", function() {
            if ($("#input_service_category_name").val().length == 0)
            {
                alert("Service Category name is required.");
                return;
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>' + "admin/servicedirectory/create_service_category",
                data: {
                    service_category_name: $("#input_service_category_name").val()
                },
                success: function(data) {
                    alert(data['message']);
                    if (data['status'] === 1)
                    {                        
                        $("#tbody_service_category_list").html($("#tbody_service_category_list").html()+tmpl("tmpl_service_category_list",  data['service_category_info']));
                        $("#modal_create_service_category").modal('hide');
                    }
                }
            });
        });
    });

</script>
<div class="modal fade" id="modal_create_service_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Create Service Category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row form-group">
                        <div class ="col-sm-2"></div>
                        <label class="col-sm-3 control-label">Service Category Name:</label>
                        <div class ="col-sm-4">
                            <input id="input_service_category_name" name="input_service_category_name" value="" type="text" class="form-control"/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class ="col-sm-6"></div>
                        <div class ="col-sm-3">
                            <button id="button_save_service_category" name="button_save_service_category" value="" class="form-control btn button-custom pull-right">Create</button>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn button-custom" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
