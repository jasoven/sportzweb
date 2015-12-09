<script>
    /*jslint unparam: true, regexp: true */
    /*global window, $ */
    $(function() {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '<?php echo base_url() ?>'+'user_album/add_photo_in_album/<?php echo $album_id?>';

        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 5000000, // 5 MB                 // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
            previewCanvas: false,
            previewMaxWidth: 208,
            maxNumberOfFiles: 1,
            previewMaxHeight: 208,
            previewCrop: true
        }).on('fileuploadadd', function(e, data) {
            //$("#files").empty();
            data.context = $('<li class="col-md-3" style="padding-bottom:10px"/>').appendTo('#files');
            //$("div#upload").empty();
            //$("div#upload").append('<br>').append(uploadButton.clone(true).data(data));
            $.each(data.files, function(index, file) {
                var node = $('<div />');
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function(e, data) {
            var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);
                if (file.preview) {                     node.prepend('<br>').prepend(file.preview);
            }
            if (file.error) {
                //$("div#header").append('<br>').append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button').text('Upload').prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                //console.log(progress);
                $('#progress .progress-bar').css('width',progress + '%');             
            }).on('fileuploaddone', function(e, data) {
                $('.progress').removeClass('active');
                $('#progress .progress-bar').removeAttr('style'); 
                //alert(data.result.message);
                window.location.reload();
                }).on('fileuploadfail', function(e, data) {
                        $.each(data.files, function(index, file) {
                            //var error = $('<span class="text-danger"/>').text('File upload failed.');
                            //$(data.context.children()[index]).append('<br>').append(error);
                        });
                    }).prop('disabled', !$.support.fileInput)
                            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>
<div class="row">
    <div class="col-md-5" style="padding: 0px;">
        <?php $this->load->view('member/album/photo_header');?>
    </div>
    <?php if($user_id == $current_user_id){ ?>
    <div class="col-md-4">
        <div class="row">
            <div id="progress" class="progress col-md-8">
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div class="col-md-4" style="padding-right: 0px; padding-left: 30px;">
                <?php echo form_open(base_url()."user_album/create_album");?>
                <button class="btn button-custom">Create Album</button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="row" style="padding-top: 15px; padding-left: 14px!important;">
    <div class="col-md-9">
        <ul class="list-inline list-unstyled row files" id="files">
            <?php if($user_id == $current_user_id){ ?>
            <li class="col-md-3">
                <div class="fileinput-button">
                    <img src="<?php echo base_url() ?>resources/images/add_photo_album.jpg" alt="">
                    <input id="fileupload" type="file" name="userfile">
                </div>
            </li>
            <?php } ?>
            <?php foreach ($photos as $photo_info){?>
            <li class="col-md-3" style="padding-bottom: 10px">
                <img  src="<?php echo base_url().ALBUM_IMAGE_PATH.$photo_info['img'] ?>" class="img-responsive" onclick="mediaDisplay('<?php echo base_url().ALBUM_IMAGE_PATH.$photo_info['img'] ?>', <?php echo $photo_info['photo_id']?>)" style="min-height: 208px; min-width: 208px;" />
            </li>
            <?php }?>
        </ul>
    </div>
</div>
<?php $this->load->view('member/album/modal_show_photo');?>