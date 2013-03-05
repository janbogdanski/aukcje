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
<?php $this->Paginator->options(array(
    'evalScripts' => true,
    'update' => '#content',
    'before' => '$(".loading").fadeIn();',
    'complete' => '$(".loading").fadeOut();',
)); ?>
<style type="text/css">
    .previewImage {
        cursor: pointer;
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
        height: 170px;
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
<h2><?php echo __('Images'); ?></h2>
<?php if($this->UserAuth->isLogged()): ?>

<div id="cnt"></div>
<!--<input id="fileupload" type="file" name="data[file][image]" multiple>-->
<?php echo $this->Form->create(false, array('id'=> 'fileupload',
    'enctype' => 'multipart/form-data','url' => array('controller' => 'Images', 'action' => 'index'))); ?>


<div id="dropzone" class="stat span5">
    <span class="fact"><?php echo __('Drop file(s) here!'); ?></span>
</div>
<div class="ajax-loader span3"></div>
<div class="clearfix"></div>

<div class="span5">
    <span class="m-btn blue fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span><?php echo __('or click to add its traditionaly'); ?></span>
        <?php echo $this->Form->file('file.image.',array('multiple')); ?>
    </span>
    </div>
<?php echo $this->Form->end(); ?>
<div class="clearfix"></div>
<div id="result" style="display: none">
<?php echo __('Added now'); ?>
    <div class="content"></div>
</div>

        <div class="containetr">
        <?php if($data): ?>
            <div class="row">
            <?php  echo    $this->Paginator->prev();?>
            <?php  echo    $this->Paginator->numbers();?>
            <?php  echo    $this->Paginator->next();?>
                <span class="loading" style="display: none"><?php echo __('Loading...'); ?></span>
            </div>
                        <div class="row">

                        <?php foreach($data as $image): ?>

            <div class="span2 galery">
                <div>
                    <?php echo $this->Html->link(__('Edit'), '#', array('class' => 'm-btn mini  editImage', 'data-id' => $image['Image']['id']) );?>
                    <?php echo $this->Form->postLink(__('Delete'), array(
                    'action' => 'delete',
                    $image['Image']['id']), array(
                    'confirm'=> __('Are you sure you want to delete that image?'),
                    'class' => 'm-btn mini ') );?>
                </div>
                <div class="image-galery">
                    <?php echo $this->Html->image($image['Image']['thumb'],array('id' => 'image-'.$image['Image']['id'], 'class' => 'previewImage', 'data-image' => $image['Image']['image'])); ?>
                </div>
            </div>

            <?php endforeach; ?>
                        </div>

    <div class="clearfix"></div>
            <div class="row">
                <?php  echo    $this->Paginator->prev();?>
                <?php  echo    $this->Paginator->numbers();?>
                <?php  echo    $this->Paginator->next();?>
            </div>
            <?php else: ?>
                <p class="noimages"><?php echo __('Hm, first add images!'); ?></p>
            <?php endif; ?>
            <?php else: ?>
            <div class="row">
                <div class="span5">
                    <p>Moduł obrazów jest miejscem, z którego zarządzać można swoimi zdjęciami. Same zdjęcia można wykorzystać wstawiając je pojedyńczo do opisu aukcji lub do tworzenia galerii zdjęć.</p>
                    <p>W pierwszej kolejności dodaj zdjęcia z dysku / albumu picasa / photobucket / flickr / z dowolnego miejsca w sieci. Sprytny uploader pozwala dodać zdjęcia metodą przeciągnij i upuść (lub tradycyjnie), przeciągać można więcej niż jedno zdjęcie na raz.</p>
                    <p>W <strong>edytorze zdjęć</strong> można przygotować zdjęcie (zdjęcia) przed wstawieniem ich do opisu aukcji. Wśród wielu narzędzi warto wymienić rozjaśnianie i przyciemnianie, przycinanie, obracanie, wyostrzanie, rozmywanie, dodawanie tekstu (najróżniejsze czcionki i kolory) i swobodne rysowanie (gdy np. nie życzysz sobie ujawniać rejestracji sprzedawanego samochodu, albo twarzy modeliki) (nad tym drugim dwa razy się zastanów:)</p>
                    <p>W skrócie, "obrazy" to miejsce w którym zarządzasz swoimi obrazami, które wykorzystane będą w innych modułach przy tworzeniu opisu aukcji lub galerii zdjęć.</p>
                </div>
                <div class="span4">
                    <h4><?php echo __('Log in to manage your %s', __('images')); ?></h4>
                    <?php echo $this->element('login', array(), array('plugin' => 'Usermgmt')); ?>
                </div>
            </div>
            <?php endif; ?>
    </div>
        <div id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Modal header</h3>
            </div>
            <div class="modal-body">
                <p><img src="" alt="" class="modal-image"></p>
            </div>
            <div class="modal-footer">
                <button class="m-btn blue" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
<!--<div id="progress">-->
<!--    <div class="bar" style="width: 0%;">aaa</div>-->
<!--</div>-->
<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>
<script type="text/javascript">
    var featherEditor = new Aviary.Feather({
        apiKey: '4CMLZdc7eEqIKE8EhKIQHg',
        apiVersion: 2,
        tools: 'all',
        appendTo: '',
        language: 'pl',
        minimumStyling: true,
        onSave: function(imageID, newURL) {
            $("#" +imageID).attr('src','/img/ajax-loader.gif');//.attr('data-image',data.full_link);

            $.ajax({
                type: 'POST',
                url: "/images/edit",
                dataType: "json",
                data: "imageUrl=" + newURL + "&imageId=" + imageID,
                success: function(data){
//                    console.log(data.thumb_link);
                    $("#" +imageID).attr('src',data.thumb_link).attr('data-image',data.full_link);
                }
            });

//            var img = document.getElementById(imageID);
//            img.src = newURL;
        },
        onError: function(errorObj) {
            alert(errorObj.message);
        }
    });
    function launchEditor(id, src) {
        featherEditor.launch({
            image: id,
            url: src
        });
        return false;
    }
    $(function () {
        $('.previewImage').click(function(){

            $("#myModal .modal-image").attr('src',$(this).attr('data-image'));
            $("#myModal").modal('show');
        });
        $(".editImage").click(function(){

            var $image = $("#image-"+$(this).attr("data-id"));
//            console.log($image);
            launchEditor($image.attr("id"), $image.attr("data-image"));
            return false;
        });
        var $loader = $(".ajax-loader");

        $('#fileupload').fileupload({
            progressInterval: 70,
            url: '/images/upload',
            dataType: 'json',
            add: function (e, data) {
                if($loader.is(":hidden")){
                    $loader.fadeIn();
                }
                data.submit();

            },
            always: function (e, data) {
//                alert('a');
                $loader.fadeOut();
                $(".noimages").hide();

            },
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
//                console.log(data.bitrate);
            },

            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
//                alert(progress);
//                console.log(progress);
//                $("#progress .bar").css(
//                        'width',
//                        progress + '%'
//                );
            }
        });

    });
</script>


<?php echo $this->Js->writeBuffer(); ?>

