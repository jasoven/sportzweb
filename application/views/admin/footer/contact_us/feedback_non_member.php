<div class="panel panel-default">
    <div class="panel-heading">Customer Feedback</div>
    <div class="panel-body">
        <div class="row col-md-12">
            <div class="row">
                <div class="table-responsive table-left-padding">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Customer Email</th>
                                <th style="text-align: center;">Phone</th>
                                <th style="text-align: center;">Feedback</th>
                                <th style="text-align: center;">Time</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_feedback_list">
                            <?php //foreach($feedback_list as $feedback){?>
                            <tr>
                                <td>Nazmul Hasan</td>
                                <td>bdlions@gmail.com</td>
                                <td>+8801678112509</td>
                                <td>Test feedback</td>
                                <td>23-01-2015</td>   
                                <td>Delete</td>   
                            </tr> 
                            <?php //} ?>                            
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
