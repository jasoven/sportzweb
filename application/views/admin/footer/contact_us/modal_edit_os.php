<!-- Written by Omar -->
<script type="text/javascript">
    $(function() {
        $("#button_save_os_edit").on("click", function() {
            if ($("#input_os_name_for_edit").val().length == 0)
            {
                alert("Topic name is required.");
                return;
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>' + "admin/contact_us/edit_os",
                data: {
                    topic_name: $("#input_os_name_for_edit").val(),
                    topic_id: $("#input_os_id").val()
                },
                success: function(data) {
                    
                }
            });
        });
    });
</script>
<!-- Written by Omar -->
<script type="text/javascript">
function openModal(val,id) {
    
}
</script> 
<div class="modal fade" id="modal_edit_os" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Operating System</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row form-group">
                        <div class ="col-sm-2"></div>
                        <label class="col-sm-3 control-label">Operating System Name:</label>
                        <div class ="col-sm-4">
                            <input id="input_os_name_for_edit" name="input_os_name_for_edit" value="" type="text" class="form-control"/>
                            <input id="input_os_id" name="input_os_id" value="" type="hidden" class="form-control"/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class ="col-sm-6"></div>
                        <div class ="col-sm-3">
                            <button id="button_save_topic_edit" name="button_save_topic_edit" value="" class="form-control btn button-custom pull-right">
                                Update
                            </button>
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
