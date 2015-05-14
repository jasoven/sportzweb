<div class="pagelet">
    <div class="row">
        <div class="col-xs-6">
            <span style="font-size: 12px; font-weight: bold;">Notifications</span>
        </div>
        <div class="col-xs-6">
        </div>
    </div>
</div>
<div class="scroll_box_style">
    <div id="notification_list">
        
    </div>
    
    <?php foreach ($notification_list as $notification_info) { ?>
        <div class="pagelet message_friends_box">
            <div class="row">
                <?php if($notification_info['type_id'] == NOTIFICATION_WHILE_LIKE_ON_CREATED_POST || $notification_info['type_id'] == NOTIFICATION_WHILE_COMMENTS_ON_CREATED_POST || $notification_info['type_id'] == NOTIFICATION_WHILE_SHARES_CREATED_POST){?>
                <div class="col-sm-3 feed-profile-picture">
                    <?php if (!empty($notification_info['reference_list'])) { ?>
                        <a href='<?php echo base_url() . "member_profile/show/{$notification_info['reference_list'][0]['user_id']}" ?>'>
                            <div>
                                <img alt="<?php echo $notification_info['reference_list'][0]['first_name'][0] . $notification_info['reference_list'][0]['last_name'][0] ?>" src="<?php echo base_url() . PROFILE_PICTURE_DISPLAY_PATH . $notification_info['reference_list'][0]['photo'] ?>" class="img-responsive profile-photo" onError="this.style.display = 'none'; this.parentNode.className='profile-background'; this.parentNode.getElementsByTagName('p')[0].style.visibility='visible'; " />                     
                                <p style="visibility:hidden"><?php echo $notification_info['reference_list'][0]['first_name'][0] . $notification_info['reference_list'][0]['last_name'][0] ?></p>
                            </div>
                        </a>  
                    <?php } ?>
                </div>
                <div class="col-sm-9">
                    <?php
                    $total_users = count($notification_info['reference_list']); 
                    $counter = 1;
                    foreach ($notification_info['reference_list'] as $referenced_user_info) {
                        if ($counter > 1) {
                            if ($counter == 3 && $counter <= $total_users) {
                                echo ' and ';
                            } else if ($counter == $total_users) {
                                echo ' and ';
                            } else {
                                echo ' , ';
                            }
                        }
                        if ($counter == 3 && $total_users > 3) {
                            ?>
                            <a onclick="show_liked_user_list(<?php echo $reference_id; ?>)" href="#">
                                <?php
                                echo ($total_users - $counter + 1) . ' others';
                                ?> 
                            </a> 
                            <?php
                            break;
                        }
                        ?>   
                        <a href='<?php echo base_url() . "member_profile/show/{$referenced_user_info['user_id']}" ?>' class="profile-name" ><?php echo $referenced_user_info['first_name'] . " " . $referenced_user_info['last_name']; ?></a>                            
                        <?php
                        $counter++;
                    }                    
                    $reference_id = $notification_info['reference_id'];
                    $created_on = $notification_info['created_on'];                                       
                    if ($notification_info['type_id'] == NOTIFICATION_WHILE_LIKE_ON_CREATED_POST) {
                        if ($total_users == 1) {
                            echo ' likes';
                        } else if ($total_users > 1) {
                            echo ' like';
                        }
                        ?>
                        <a href='<?php echo base_url() . "member_profile/view_shared_status/{$reference_id}" ?>'> your post</a>    
                        <div><?php echo $created_on; ?> </div>
                        <?php
                    } else if ($notification_info['type_id'] == NOTIFICATION_WHILE_COMMENTS_ON_CREATED_POST) {
                        if ($total_users >= 1) {
                            echo ' commented on';
                        } else if ($total_users > 3) {
                            echo 'also commented on';
                        }
                        ?>
                        <a href='<?php echo base_url() . "member_profile/view_shared_status/{$reference_id}" ?>'> your post</a> 
                        <div><?php echo $created_on; ?> </div>
                        <?php
                    } else if ($notification_info['type_id'] == NOTIFICATION_WHILE_SHARES_CREATED_POST) {
                        if ($total_users >= 1) {
                            echo ' shared';
                        } else if ($total_users > 3) {
                            echo 'also shared';
                        }
                        ?>
                        <a href='<?php echo base_url() . "member_profile/view_shared_status/{$reference_id}" ?>'>your post</a> 
                        <div><?php echo $created_on; ?> </div>
                        <?php
                    } 
                    ?>
                </div>
                <?php }?>
            </div>
        </div>
    <?php } ?>
</div>
<div class="pagelet">
    <div class="row">
        <div class="col-md-12">
            <div class="see_all_anchor_style">
                <a href="<?php echo base_url(); ?>notifications/">See All</a>
            </div>
        </div>
    </div>
</div>