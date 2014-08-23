<style type="text/css">

    .item{

        text-align: center;
        height: 100% !important;
    }
    .carousel{
        margin-top: 20px;
    }
    .slider-size {
        //min-height: 200px;
        background-size: 100% 100%;
        background-repeat: no-repeat;

    }
    .carousel {
        width:100%; 
        margin:0 auto; /* center your carousel if other than 100% */ 
    }
    #imgbuttonb{ height: 32px; width: 32px; position: absolute; right: 64px; top: 30px;}
    #imgbuttonf{ height: 32px; width: 32px; position: absolute; right: 32px; top: 30px;}
</style>

<script type="text/javascript">
    function get_current_image_id() {
            //var current_img_id = $('.item.active').find('div').prop('id');
           //console.log($('.item.active').find('div').prop('id'));
    }
</script>

<?php //echo '<pre/>';print_r($image_list);exit(); ?>
<div class="panel panel-default">
    <div class="panel-heading">Photography</div>
    <div class="panel-body">
        <?php if($allow_access){ ?>
        <div class ="row col-md-2 pull-left" style="margin-bottom: 10px">
            <a href="<?php echo base_url(); ?>admin/applications_photography/add_image">
                <button id="button_add_image" value="" class="form-control btn button-custom pull-right">Add Image</button>  
            </a>
        </div>
        <?php } ?>
        <div class="row col-md-12">
            <div class="row col-md-10">
                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if (!empty($image_list)): ?>
                                <?php $i = 1; ?>
                            <?php foreach ($image_list as $image_info): ?>
                                <div class="item <?php echo ($i == 1) ? 'active' : ''; ?>">
                                    <div  id="<?php echo $image_info['id']; ?>" class="slider-size" style="background-image: url('<?php echo base_url() . PHOTOGRAPHY_IMAGE_PATH . $image_info['img']; ?>');" >

                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div> 
                    <a href="#myCarousel" data-slide="next">
                        <img id="imgbuttonf" src="<?php echo base_url(); ?>resources/images/frontArrow.png" onclick="get_current_image_id();"/>
                    </a>
                    <a  href="#myCarousel" data-slide="prev">
                        <img id="imgbuttonb" src="<?php echo base_url(); ?>resources/images/backArrow.png" onclick="get_current_image_id();"/>
                    </a>
                </div>
            </div>
            <?php if($allow_access){ ?>
            <div class="col-md-2" style="padding-left: 25px;">
                <?php if(!empty($image_list)): ?>
                    <a id="edit_current_image" href="<?php echo base_url().'admin/applications_photography/edit_image/'.$image_list[0]['id']; ?>">Edit</a> &nbsp;&nbsp;| &nbsp;&nbsp;
                    <a id="delete_current_image" href="<?php echo base_url() . 'admin/applications_photography/delete_image/'.$image_list[0]['id']; ?>">Delete</a>
                <?php endif; ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("div.item").each(function() {
            $(this).find('div').height($(window).height() - $("body nav").height() - 20);
        });
        $("#myCarousel").carousel({
            interval: false,
            pause: false
        });
        $('#myCarousel').bind('slid.bs.carousel', function (e) {
            var current_img_id = $('.item.active').find('div').prop('id');
            var edit_url = '<?php echo base_url(); ?>' +'admin/applications_photography/edit_image/'+current_img_id;
            var delete_url = '<?php echo base_url(); ?>' +'admin/applications_photography/delete_image/'+current_img_id;
            $("#edit_current_image").attr("href", ""+edit_url);
            $("#delete_current_image").attr("href", ""+delete_url);
            //console.log($('.item.active').find('div').prop('id'));
        });
    });
</script>