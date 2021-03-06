<script type="text/javascript">
    $(function() {
        $("#button_create").on("click", function() {
            if ($("#input_title").val().length == 0)
            {
               // alert("Please enter First Name");
               var message = "Please enter First Name";
               print_common_message(message);
                return;
            }
            if ($("#input_pricing").val().length == 0)
            {
               // alert("Please enter Last Name");
                var message = "Please enter Last Name";
               print_common_message(message);
                return;
            }
            $.ajax({
                dataType: 'json',
                type: "POST",
                url: '<?php echo base_url(); ?>' + "admin/applications_gympro/create_clients",
                data: {
                    first_name: $("#input_title").val(),
                    last_name: $("#input_pricing").val()
                },
                success: function(data) {
                    //alert(data['message']);
                     var message = data['message'];
                     print_common_message(message);
                    $("#modal_create").modal('hide');
                    window.location.reload();
                }
            });
        });
    });
    function open_modal_create() {
        $("#modal_create").modal('show');
    }
</script>
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Create Client</h4>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class ="col-sm-2"></div>
                    <label class="col-sm-3 control-label">First Name:</label>
                    <div class ="col-sm-4">
                        <input id="input_title" name="input_title" value="" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class ="col-sm-2"></div>
                    <label class="col-sm-3 control-label">Last Name:</label>
                    <div class ="col-sm-4">
                        <input id="input_pricing" name="input_pricing" value="" type="text" class="form-control"/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class ="col-sm-6"></div>
                    <div class ="col-sm-3">
                        <button id="button_create" name="button_create" value="" class="form-control btn button-custom pull-right">Create</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn button-custom" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->