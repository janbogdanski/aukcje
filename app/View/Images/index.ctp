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
//                alert('a');
                console.log('finished ok');
//                data.context.text('Upload finished.');
            },
            fail: function (e, data) {
//                alert('fail');
                console.log('finished fail');
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


