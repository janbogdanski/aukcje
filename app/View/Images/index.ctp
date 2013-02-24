<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    22.02.13 19:24
 * @var $this View
 */

?>
<?php $this->Html->css('jquery.upload/jquery.fileupload-ui.css',null, array('inline' => false)); ?>

<?php $this->Html->script('jquery.upload/vendor/jquery.ui.widget.js', array('inline' => false)); ?>
<?php $this->Html->script('jquery.upload/jquery.iframe-transport.js', array('inline' => false)); ?>
<?php $this->Html->script('jquery.upload/jquery.fileupload.js', array('inline' => false)); ?>
<?php //$this->Html->script('jquery.upload/jquery.fileupload-fp.js', array('inline' => false)); ?>
<?php //$this->Html->script('jquery.upload/jquery.fileupload-ui.js', array('inline' => false)); ?>
<?php //$this->Html->script('jquery.upload/main.js', array('inline' => false)); ?>
<?php //$this->Html->script('jquery.upload/cors/jquery.xdr-transport.js', array('inline' => false)); ?>
<!--[if gte IE 8]><!--<script src="js/cors/jquery.xdr-transport.js"></script>--><![endif]-->
<?php

?>
<style type="text/css">
    .bar {
        height: 18px;
        background: green;
    }
    #dropzone {
        width: 250px;
        height: 100px;
        text-align: center;
    }
    #dropzone.in {
        width: 400px;
    }
    .galery {
        background: none repeat scroll 0 0 #FFFFFF;
        box-shadow: 0 0 1px 1px #CCCCCC;
        height: 150px;
        margin-bottom: 30px;
        overflow: hidden;
    }
    .galery img{
        /*vertical-align: middle;*/
        margin: 0 auto;
        /*text-align: center;*/
        /*border: 1px solid red;*/
        /*display: table-cell;*/
    }
    .image-galery{
        height: 150px;
        width: 170px;
        vertical-align: middle;
        display: table-cell;
        margin: auto;
        text-align: center;
    }
</style>
<!--<input id="fileupload" type="file" name="data[file][image]" multiple>-->
<?php echo $this->Form->create(false, array('id'=> 'fileupload',
    'enctype' => 'multipart/form-data','url' => array('controller' => 'Images', 'action' => 'index'))); ?>


<div id="dropzone" class="stat">
    <span class="fact"><?php echo __('Drop file(s) here!'); ?></span>
</div>

<span class="m-btn blue fileinput-button">
    <i class="icon-plus icon-white"></i>
    <span><?php echo __('or click to add its traditionaly'); ?></span>
    <?php echo $this->Form->file('file.image.',array('multiple')); ?>
</span>
<?php echo $this->Form->end(); ?>
<div class="clearfix"></div>
<div id="result" style="display: none">
<?php echo __('Added now'); ?>
    <div class="content"></div>
</div>

        <div class="containetr">
            <h1>Galeria</h1>
        <?php foreach($data as $image): ?>
<!--    --><?php //print_r($image); ?>

            <div class="span2 galery">
<!--                <div class="image-galery" style="background: url(--><?php //echo $image['Image']['thumb']; ?><!--) no-repeat center center;  height:100%;-->
                <div class="image-galery">
                    <?php echo $this->Html->image($image['Image']['thumb']); ?>
                </div>
            </div>
    <?php endforeach; ?>
    </div>
<!--<div id="progress">-->
<!--    <div class="bar" style="width: 0%;">aaa</div>-->
<!--</div>-->

<script type="text/javascript">
    $(function () {
        $('#fileupload').fileupload({
            progressInterval: 70,
            url: '/images/upload',
            dataType: 'json',
            done: function (e, data) {
                if(data.result.thumb_link != undefined){
                    var $result = $("#result");
                    if($result.is(":hidden")){
                        $result.fadeIn();
                    }
                    $("#result .content").prepend('<img src="' + data.result.thumb_link +'" />');
                }
            },
            fail: function (e, data) {
//                alert('fail');
//                console.log('finished fail');
//                console.log(data);
//                console.log(e);
//                data.context.text('Upload finished.');
            },

            dropZone: $('#dropzone'),
            dragover: function (e) {

                var dropZone = $('#dropzone'),
                        timeout = window.dropZoneTimeout;
                if (!timeout) {
                    dropZone.addClass('in');
                } else {
                    clearTimeout(timeout);
                }
                if (e.target === dropZone[0]) {
                    dropZone.addClass('hover');
                } else {
                    dropZone.removeClass('hover');
                }
                window.dropZoneTimeout = setTimeout(function () {
                    window.dropZoneTimeout = null;
                    dropZone.removeClass('in hover');
                }, 100);
            },
            progress: function (e, data) {
                // Log the current bitrate for this upload:
                console.log(data.bitrate);
            },

            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
//                alert(progress);
                console.log(progress);
//                $("#progress .bar").css(
//                        'width',
//                        progress + '%'
//                );
            }
        });
    });
</script>


