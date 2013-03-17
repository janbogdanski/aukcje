<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.11.12 17:35
 * @var $this View
 */
echo $this->Html->script('ckeditor/ckeditor');
//echo $this->cksource->create('CKSource');
//echo $this->cksource->ckeditor('example1');

$config['toolbar'] = array(
array('Undo','Redo','-','Bold', 'Italic', 'Underline', 'Strike',
    'Font','FontSize','Format','TextColor','BGColor',),
array( 'Image', 'Link', 'Unlink'),
array( 'NumberedList','BulletedList','-','Outdent','Indent',
'-','JustifyLeft','JustifyCenter','JustifyRight',), array('Table','HorizontalRule' ),  array('Source'),
    '/',
array('gmap','qrcodes','proaukcje_insertimage','proaukcje_insertgallery'),
);
$config['width'] = 660;
$config['height'] = 200;
$config['language'] = 'pl';
$config['extraPlugins'] = 'ajax,gmap,autogrow,qrcodes,gallery,proaukcje_insertimage,proaukcje_insertgallery';
$config['autoGrow_maxHeight'] = '650';
//$config['filebrowserImageBrowseUrl'] = '/images/browser'; //wymaga sprawdzenia w GET CKEditorFuncNum
//$config['filebrowserBrowseUrl'] = '/galleries/imageBrowser33';
$events['instanceReady'] = 'function (ev) {
//alert("Loaded: " + ev.editor.name);
}';

//echo $this->cksource->ckeditor('example2', array('value'=>'It works!', 'config'=>$config, 'events'=>$events));
//echo $this->cksource->end();
?>
<script type="text/javascript">
    var modified = false;
    var isLogged = false;

    //check if any ckeditor instance has focus

    $(document).ready(function(){
        $('#auctionForm').submit(function() {

            //sprawdz czy zalogowany
            var d = new Date();

            $.ajax({
                async: false,
                type: 'GET',
                url: '/isLogged',
                data: d.getMinutes() +''+ d.getSeconds() +''+ d.getUTCMilliseconds(),
                dataType: 'json',
                success: function(data) {
                    if(data && data.loggedin != undefined){
                        if(data.loggedin){

                            //ok, zalogowany
                            modified = false;
                            isLogged = true;
                            return true;
                        } else{
                            isLogged = false;
                            showLogin();
                            return false;
                        }
                    } else{
                        isLogged = false;
                        showLogin();
                        return false;
                    }
                },
                error: function(data){
                    isLogged = false;
                    showLogin();
                    return false;
                }
            });
            if(isLogged){
                return true;
            } else{
                return false;
            }
        });
        //sprawdzanie czy dokonano edycji (przez focus na inputach i cke)
        CKEDITOR.on('currentInstance', function(){modified = true;});
        $("input").focusin(function() {modified = true});
        window.onbeforeunload = function(){
            if(modified){
                return'Chcesz opuścić stronę bez zapisywania?';
            }
        }


//        $("#asd").click(function(){
<!---->
//            CKEDITOR.instances['data[Auction][contents]'].insertHtml( '<p>This is a new paragraph.</p>' );
//            alert(CKEDITOR.editor.name);
<!---->
//        });

    });

    function showLogin(){
        $('#loginModal').modal();
        return false;
    }
</script>
<!--<a href="#" id="asd">adsf</a>-->
<div class="row-fluid">
<h2><?php echo $this->fetch('title'); ?></h2>

<!--    --><?php //echo $this->Html->link(__('List Auctions'), array( 'action' => 'index' ), array('escape' => false,'class' => 'm-btn mini blue inline') ); ?>

    <?php echo $this->Form->create('Auction',array('id' => 'auctionForm')); ?>

    <?php echo $this->Form->input('title_list', array('class' => 'span3','label' => __('Title on aukctions list'))); ?>
    <?php echo $this->Form->input('title', array('class' => 'span3','label' => __('Title (visible in auction header)'))); ?>

    <label><?php echo __('Content'); ?></label>
    <?php echo $this->cksource->ckeditor('Auction.contents', array('config'=>$config, 'events'=>$events, 'escape' => false));?>

    <?php

    $config['toolbar'] = array(
        array('Undo','Redo','-','Bold', 'Italic', 'Underline', 'Strike',
            'Font','FontSize','TextColor','BGColor',),
        array( 'Image', 'Link', 'Unlink'),
        array( 'NumberedList','BulletedList','-','Outdent','Indent',
            '-','JustifyLeft','JustifyCenter','JustifyRight',), array('Table','HorizontalRule' ),
        '/',
        array('gmap','qrcodes'),array('Source')
    );
$config['width'] = 420;
$config['height'] = 200;
$config['extraPlugins'] = 'gmap,qrcodes';

    ?>
    <fieldset style="margin-top: 20px;">
        <legend>Dodatkowe sekcje (kontakt,informacje o przesyłce, płatnościach...)</legend>
    <div class="row">

        <div class="span4"><?php echo $this->Form->input('field_1_header', array('class' => 'span','label' => __('1st section header'))); ?></div>

        <div class="span4">
            <label><?php echo __('Field %s content', __('first')); ?></label>
            <?php echo $this->cksource->ckeditor('Auction.field_1_content', array('config'=>$config, 'events'=>$events, 'escape' => false)); ?>
        </div>
    </div>

    <div class="row">

        <div class="span4"><?php echo $this->Form->input('field_2_header', array('class' => 'span','label' => __('2nd section header'))); ?>
        </div>

        <div class="span4">
            <label><?php echo __('Field %s content', __('second')); ?></label>

            <?php echo $this->cksource->ckeditor('Auction.field_2_content', array('config'=>$config, 'events'=>$events, 'escape' => false)); ?>
        </div>
    </div>
    <div class="row">

        <div class="span4">    <?php echo $this->Form->input('field_3_header', array('class' => 'span','label' => __('3rd section header'))); ?></div>

        <div class="span4">
            <label><?php echo __('Field %s content', __('third')); ?></label>
            <?php echo $this->cksource->ckeditor('Auction.field_3_content', array('config'=>$config, 'events'=>$events, 'escape' => false)); ?>
        </div>
    </div>
    </fieldset>
    <fieldset>
        <legend>Dostępne szablony</legend>
<?php
//echo $this->Form->select('template_id');

        //wybor templatki aukcji - najpierw spr czy jest w request (np. z bazy), pozniej defaultowo 51 (ladna), ew. pierwsza z tablice
if(isset($this->request->data['Auction']['template_id'])){
    $template = $this->request->data['Auction']['template_id'];
} else{
    if(array_key_exists('51',$templates)){
    $template = 51;

    } else{
       $template = reset(array_keys($templates));
    }
}
    echo $this->Form->input('template_id', array(
            'type' => 'radio',
            'before' => '<div class="templates_list span3">',
            'after' => '</div>',
            'between' => '--between---',
            'separator' => '</div><div class="templates_list span3">',
            'legend' => false,
            'options' => $templates,
            'class' => '',
            'value' => $template, // '52'
            'label' => __('Select Template')
    )// reset(array_keys($templates)))
    );

    ?>
    </fieldset>
    <div class="clearfix"></div>
    <?php echo $this->Form->submit(__d('auction', 'Save auction'), array('id' => 'save', 'name' => 'saveGallery', 'div' => false, 'class' => 'm-btn blue',)); ?>
    <?php echo $this->Form->end(); ?>

</div>
    <div class="modal hide" id="loginModal">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo __('You are not logged in!'); ?></h3>
        <p><?php echo __('Until you\'re logged out we cannot save your aucion (data will be lost!). Click link below to log in in NEW TAB (page will be opened in new tab), then return here, close that popup and try to save auction. again'); ?></p>
        <p>
            <?php echo $this->Html->link(__("Sign In",true),"/login", array('class' => 'm-btn blue', 'target' => '_blank')) ?>
        </p>
     </div>
