<script type="text/javascript">
    $(function() {
        $("#button_create_news_category").on("click", function() {
            $('#modal_create_news_category').modal('show');
        });
    });
</script>  
<script type="text/x-tmpl" id="tmpl_news_category_list">
    {% var i=0, news_category_info = ((o instanceof Array) ? o[i++] : o); %}
    {% while(news_category_info){ %}
    <tr>
        <td><a href="<?php echo base_url()."admin/applications_news/news_sub_category/{%= news_category_info.id%}"; ?>">{%= news_category_info.id%}</td>
        <td><div id="news_title_{%= news_category_info.id%}">{%= news_category_info.title%}</div></td>
        <td><button id="button_edit_news_category_{%= news_category_info.id%}" onclick="openModal('button_edit_news_category_{%= news_category_info.id%}','{%= news_category_info.id%}')" value="" class="form-control btn pull-right">Edit</button></td>
        <td><button id="button_delete_news_category_{%= news_category_info.id%}" onclick="open_modal_delete_confirm('{%= news_category_info.id%}')" value="" class="form-control btn pull-right">Delete</button></td>
        <td><a href="<?php echo base_url()."admin/applications_news/config_news_for_category/{%= news_category_info.id%}";?>">Config</td>
    </tr>
    {% news_category_info = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>

<div class="panel panel-default">
    <div class="panel-heading">News Category</div>
    <div class="panel-body">
        <div class="row col-sm-12">            
            <div class="row form-group">
                <?php if($allow_configuration){ ?>
                <div class ="col-sm-2">
                    <a href="<?php echo base_url();?>admin/applications_news/configure_news_home_page">
                        <button id="button_manage_recipe_for_home_page" value="" class="btn button-custom ">
                            Manage Home Page
                        </button>
                    </a>
                </div>
                <div class ="col-sm-2">
                    <a href="<?php echo base_url();?>admin/applications_news/get_latest_news">
                        <button id="" value="" class="btn button-custom ">
                            Manage Latest News
                        </button>  
                    </a>
                </div>
                <div class ="col-sm-2">
                    <a href="<?php echo base_url();?>admin/applications_news/get_current_breaking_news">
                        <button id="" value="" class="btn button-custom ">
                            Manage Breaking News
                        </button>  
                    </a>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url();?>admin/applications_news/configure_news_styles">
                        <button class="btn button-custom ">
                            Manage News Styles
                        </button>  
                    </a>
                </div>
                <?php } ?>
                <?php if($allow_writing){ ?>
                <div class ="col-sm-2">
                    <a href="<?php echo base_url();?>admin/applications_news/page_import_news">
                        <button class="btn button-custom ">Import News</button>  
                    </a>
                </div> 
                <?php } ?>
            </div>           
            
            <div class="row form-group">
                <div class ="col-sm-2">
                    <a href="<?php echo base_url();?>admin/applications_news/news_list">
                        <button class="btn button-custom ">News List</button>  
                    </a>
                </div>
                <?php if($allow_write){ ?>
                <div class ="col-sm-2">
                    <button id="button_create_news_category" value="" class="btn button-custom">
                        Create News Category
                    </button>  
                </div>
                <?php } ?>
                <?php if($allow_writing){ ?>
                <div class ="col-sm-2">
                    <a href="<?php echo base_url().'admin/applications_news/create_news'?>" >
                        <button class="btn button-custom">
                            Create News
                        </button>
                    </a>
                </div>
                <?php } ?>
            </div>            
            <div class="row form-group">
            <div class="row">
                <div class="table-responsive table-left-padding">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Id</th>
                                <th style="text-align: center;">Name</th>
                                <?php if($allow_edit){ ?>
                                <th style="text-align: center;">Edit</th> 
                                <?php } ?>
                                <?php if($allow_delete){ ?>
                                <th style="text-align: center;">Delete</th> 
                                <?php } ?>
                                
                                <?php if($allow_configuration){ ?>
                                <th style="text-align: center;">Configure News</th> 
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="tbody_news_category_list">
                            <?php foreach($news_category_list as $category){?>
                            <tr>
                                <td><a href="<?php echo base_url().'admin/applications_news/news_sub_category/'.$category['id']?>"><?php echo $category['id'];?></a></td>
                                <td><div id="news_title_<?php echo $category['id'];?>"><?php echo $category['title'];?></div></td>
                                <?php if($allow_edit){ ?>
                                <td>                                   
                                    <button id="button_edit_news_category_<?php echo $category['id'];?>" onclick="openModal('<?php echo $category['id'];?>')" value="" class="form-control btn pull-right">
                                        Edit
                                    </button>                                    
                                </td>
                                <?php } ?>
                                <?php if($allow_delete){ ?>
                                <td>                                   
                                    <button id="button_delete_news_category_<?php echo $category['id'];?>" onclick="open_modal_delete_confirm('<?php echo $category['id'];?>')" value="" class="form-control btn pull-right">
                                        Delete
                                    </button>                                    
                                </td>
                                <?php } ?>
                                <?php if($allow_configuration){ ?>
                                <td>                                   
                                    <a href="<?php echo base_url().'admin/applications_news/configure_news_category_page/'.$category['id']?>">
                                        Config
                                    </a>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-2 btn-group">
                    <input type="button" value="Back" id="back_button" onclick="javascript:history.back();" class="form-control btn button-custom">
                </div>
            </div>
        </div>        
    </div>
</div>
<?php $this->load->view("admin/applications/news_app/modal_create_news_category"); ?>
<?php $this->load->view("admin/applications/news_app/modal_edit_news_category"); ?>
<?php $this->load->view("admin/applications/news_app/modal_delete_news_category");