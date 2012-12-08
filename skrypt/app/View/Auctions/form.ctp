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
array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike','gmap','qrcodes','proaukcje_insertimage','proaukcje_insertgallery' ),
array( 'Image', 'Link', 'Unlink', 'Anchor' ),
array( 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ),
array( 'Styles','Format','Font','FontSize','TextColor','BGColor' ,'Maximize', 'ShowBlocks'),

);
$config['width'] = 660;
$config['height'] = 200;
$config['extraPlugins'] = 'ajax,gmap,autogrow,qrcodes,gallery,proaukcje_insertimage,proaukcje_insertgallery';
$config['filebrowserImageBrowseUrl'] = '/galleries/imageBrowser';
$config['filebrowserBrowseUrl'] = '/galleries/imageBrowser33';
$events['instanceReady'] = 'function (ev) {
//alert("Loaded: " + ev.editor.name);
}';

//echo $this->cksource->ckeditor('example2', array('value'=>'It works!', 'config'=>$config, 'events'=>$events));
//echo $this->cksource->end();
?>
<script type="text/javascript">
    $(document).ready(function(){

//        $("#asd").click(function(){
<!---->
//            CKEDITOR.instances['data[Auction][contents]'].insertHtml( '<p>This is a new paragraph.</p>' );
//            alert(CKEDITOR.editor.name);
<!---->
//        });

    });

</script>
<!--<a href="#" id="asd">adsf</a>-->
<div class="row-fluid">
<h2><?php echo $this->fetch('title'); ?></h2>

<!--    --><?php //echo $this->Html->link(__('List Auctions'), array( 'action' => 'index' ), array('escape' => false,'class' => 'm-btn mini blue inline') ); ?>
<?php
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Auction');

echo $this->Form->input('title_list', array('class' => 'span3','label' => __('Title on aukctions list')));
echo $this->Form->input('title', array('class' => 'span3','label' => __('Title')));
//echo $this->Form->textarea('content');

    echo '<label>Content</label>';
    echo $this->cksource->ckeditor('Auction.contents', array('config'=>$config, 'events'=>$events, 'escape' => false));

echo $this->Form->input('field_1_header', array('class' => 'span3','label' => __('1st section header')));

$config['toolbar'] = array(
    array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'gmap' ),
    array( 'Image', 'Link', 'Unlink', 'Anchor' ),
    array( 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
        '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ),
    array( 'Styles','Format','Font','FontSize','TextColor','BGColor' ,'Maximize', 'ShowBlocks'),

);
$config['width'] = 400;
$config['height'] = 200;
$config['extraPlugins'] = 'gmap';


//echo $this->Form->textarea('field_1_content');
    echo '<label>Field 1 content</label>';
echo $this->cksource->ckeditor('Auction.field_1_content', array('config'=>$config, 'events'=>$events, 'escape' => false));

echo $this->Form->input('field_2_header', array('class' => 'span3','label' => __('2nd section header')));


    echo '<label>Field 2 content</label>';

    echo $this->cksource->ckeditor('Auction.field_2_content', array('config'=>$config, 'events'=>$events, 'escape' => false));
echo $this->Form->input('field_3_header', array('class' => 'span3','label' => __('3rd section header')));

    echo '<label>Field 3 content</label>';

    echo $this->cksource->ckeditor('Auction.field_3_content', array('config'=>$config, 'events'=>$events, 'escape' => false));

//echo $this->Form->select('template_id');

    echo $this->Form->input('template_id', array(
            'type' => 'radio',
            'before' => '<div class="templates_list span3">',
            'after' => '</div>',
            'between' => '--between---',
            'separator' => '</div><div class="templates_list span3">',
            'legend' => false,
            'options' => $templates,
            'class' => '',
            'value' => array_key_exists('51',$templates) ? 51 : reset(array_keys($templates)), // '52'
            'label' => __('Select Template')
    )// reset(array_keys($templates)))
    );

    ?>
    <div class="clearfix"></div>
    <?php echo $this->Form->submit('Submit', array('id' => 'save', 'name' => 'saveGallery', 'div' => false, 'class' => 'm-btn blue',)); ?>
    <?php echo $this->Form->end(); ?>

</div>
