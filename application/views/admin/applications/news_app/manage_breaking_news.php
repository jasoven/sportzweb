<script type="text/javascript">
    $(function() {
        $("#news_list_for_braking_news_page").on("click", function() {
            var selected_news_array = Array();
            $("#tbody_news_list_for_breaking_news_page tr").each(function() {
                var newsID = $(this).find('td:first').find('a').text();
                if (!(newsID in selected_news_array)){
                    selected_news_array[newsID]= newsID;
                }
            });            
            if(selected_news_array.length > 0)
            {
                var temp_ids = Array();
                for(var temp_news_id in selected_news_array)
                {
                    temp_ids.push(selected_news_array[temp_news_id]);
                }
                selected_news_array = temp_ids;
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '<?php echo base_url(); ?>' + "admin/applications_news/add_breaking_news_configuration",
                    data: {
                        news_id_list: JSON.stringify(selected_news_array)
                    },
                    success: function(data) {
                   // alert(data['message']);
                  var message = data.message;
           print_common_message(message);
                    if (data['status'] === 1)
                    {
                       location.reload(); 
                    }
                }
                });
            }else 
            {
                //alert('Please select atleast 1 news as a breaking news');
                var message = "Please select atleast 1 news as a breaking news";
                print_common_message(message);
            }
        });
    });
    
    function open_modal_news_items()
    {
        $('#hidden_field_for_key').val(<?php echo BREAKING_NEWS_SELECTION_KEY; ?> );
        $('#common_modal_news_list').modal('show');
    }
    function append_selected_breaking_news(selected_array){
         $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '<?php echo base_url(); ?>' + "admin/applications_news/get_selected_news_by_id",
                    data: {
                        news_selected_id_list : selected_array,
                    },
                    success: function(data) {
                    $("#tbody_news_list_for_breaking_news_page").html($("#tbody_news_list_for_breaking_news_page").html()+tmpl("tmpl_braking_news_list", data)); 
                }
                });
         $('#common_modal_news_list').modal('hide');
    }
    function delete_row(deleted_news_id){
       $(deleted_news_id).parents("tr").remove()  
      }
</script> 
<script type="text/x-tmpl" id="tmpl_braking_news_list">
    {% var i=0, news_list = ((o instanceof Array) ? o[i++] : o); %}
    {% while(news_list){ %}
    <tr>
    <td><a href="<?php echo base_url().'admin/applications_news/news_details/'.'{%= news_list.id%}'?>"><?php echo '{%= news_list.id%}'; ?></td>
    <td id="<?php echo '{%= news_list.id%}'; ?>"><?php echo '{%= news_list.headline%}'; ?></td>
    <td><?php echo '{%= news_list.news_date%}'; ?></td> 
    <td id="<?php echo '{%= news_list.id%}'; ?>"><button onclick="delete_row(this)" id="<?php echo '{%= news_list.id%}'; ?>" name="delete_news_<?php echo '{%= news_list.id%}'; ?>"  class="glyphicon glyphicon-trash"></button></td>
    </tr>
    {% news_list = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>

<div class="panel panel-default">
    <div class="panel-heading">Manage Breaking News</div>
    <div class="panel-body">
        <div class="row col-md-12">
            <div class="row form-group">
                <div class="col-sm-3" style="padding-left: 26px;">
                    <button value="" class="form-control btn button-custom pull-right" onclick="open_modal_news_items()">
                        Breaking News Select  
                    </button>
                </div>
                <div class ="col-sm-3 pull-right" style="padding-right: 0px;">
                    <button id="news_list_for_braking_news_page" value="" class="form-control btn button-custom pull-right">
                        Submit your List 
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive table-left-padding">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>News Title</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_news_list_for_breaking_news_page">
                            <?php if(!empty($breaking_news_list)): ?>
                                <?php foreach($breaking_news_list as $news):?>
                                    <tr>
                                        <td><a href="<?php echo base_url().'admin/applications_news/news_details/'.$news['id']?>"><?php echo $news['id'] ?></a></td>
                                        <td><?php echo html_entity_decode(html_entity_decode($news['headline'])) ;?></td>
                                        <td><?php echo $news['news_date']?></td>
                                        <td id="<?php  echo $news['id'] ?>"><button onclick="delete_row(this)" id="<?php echo $news['id'] ?>" name="delete_news_<?php echo $news['id']; ?>"  class="glyphicon glyphicon-trash"></button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="hidden" id="hidden_field_for_key">
            <div class="btn-group" style="padding-left: 10px;">
                <input type="button" style="width:120px;" value="Back" id="back_button" onclick="javascript:history.back();" class="form-control btn button-custom">
            </div>
        </div>        
    </div>
</div>
<?php $this->load->view("admin/applications/news_app/common_modal_for_news_items");