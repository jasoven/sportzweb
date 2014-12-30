<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>resources/bootstrap3/css/gympro.css">

<div class="container-fluid">
    <div class="row top_margin">
        <div class="col-md-2">
            <?php $this->load->view("applications/gympro/template/sections/left_pane"); ?>
        </div>
        <div class="col-md-7">
            <div class="row form-group">
                <div class="col-md-2">
                    <a href="<?php echo base_url() ?>applications/gympro/manage_exercises"><button class="btn button-custom btn_gympro">Exercises</button></a>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo base_url() ?>applications/gympro/create_program"><button class="btn button-custom btn_gympro">New Program</button></a>
                </div>
            </div>
            <?php
            $total_clients = count($program_list);
            $counter = 0;
            foreach($program_list as $program)
            {
                if($counter%APP_GYMPRO_MANAGE_CLIENTS_CLIENTS_PER_ROW == 0)
                {
                    echo '<div class="row top_margin">';
                    echo '<div class="col-md-6 right_padding_zero">';
                }
                else
                {
                    echo '<div class="col-md-6 right_padding_zero">';
                }
                ?>
            <div class="user_prof">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="<?php echo base_url().'applications/gympro/show_program/'.$program['program_id']?>">
                            <?php if(isset($program['picture']) && $program['picture'] != ''){ ?>
                            <img style="width: 100%" class="img-responsive" src="<?php echo base_url().CLIENT_PROFILE_PICTURE_PATH_W50_H50.$program['picture'] ?>"/>
                            <?php }else{?>
                            <img style="width: 100%" class="img-responsive" src="<?php echo base_url().CLIENT_PROFILE_PICTURE_PATH_W50_H50.CLIENT_DEFAULT_PROFILE_PICTURE_NAME ?>"/>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <a style="font-size: 18px" href="<?php echo base_url().'applications/gympro/show_program/'.$program['program_id']?>"><?php echo $program['created_on'] ?></a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <div class="dropdown friends-satus-dropdown">
                            <a id="friends_status" data-toggle="dropdown" href="#" >
                                <img style="float: left; padding-top: 4px" src="<?php echo base_url() ?>resources/images/friends_status.png" alt=""/>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="friends_status">
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url().'applications/gympro/edit_program/' . $program['program_id']; ?>" >Edit</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="javascript:void(0)" onclick="open_modal_delete_confirm(<?php echo $program['id'] ?>)">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
        if($counter%APP_GYMPRO_MANAGE_CLIENTS_CLIENTS_PER_ROW == (APP_GYMPRO_MANAGE_CLIENTS_CLIENTS_PER_ROW-1) || $counter == $total_clients)
        {
            echo '</div>';
        }  
        $counter++;
            }
            ?>
            
            
            
            
            
            
<!--            <div class="row form-group">
                <div class="col-md-12">
                    <table class="table table-condensed table-responsive gympro_table">
                        <tbody>
                            <tr>
                                <th>CREATED</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            <?php foreach ($program_list as $program): ?>
                                <tr>
                                    <td><a href="<?php echo base_url().'applications/gympro/show_program/'.$program['program_id']?>"><?php echo $program['created_on'] ?></a>
                                    </td>
                                    <td><a href="<?php echo base_url() . 'applications/gympro/edit_program/' . $program['program_id']; ?>">Edit</a></td>
                                    <td>
                                        <a onclick="open_modal_delete_confirm(<?php echo $program['id'] ?>)" >
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>                
            </div>-->
        </div>
    </div>

</div>

<?php $this->load->view("applications/gympro/modal/program_delete_confirm");?>