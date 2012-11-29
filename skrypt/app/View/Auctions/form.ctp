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
array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike','gmap' ),
array( 'Image', 'Link', 'Unlink', 'Anchor' ),
array( 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ),
array( 'Styles','Format','Font','FontSize','TextColor','BGColor' ,'Maximize', 'ShowBlocks'),

);
$config['width'] = 660;
$config['height'] = 200;
$config['extraPlugins'] = 'gmap,autogrow';
$config['filebrowserImageBrowseUrl'] = '/galleries/imageBrowser';
$events['instanceReady'] = 'function (ev) {
//alert("Loaded: " + ev.editor.name);
}';

//echo $this->cksource->ckeditor('example2', array('value'=>'It works!', 'config'=>$config, 'events'=>$events));
//echo $this->cksource->end();
?>

<h2><?php echo $this->fetch('title'); ?></h2>

<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Auctions', array( 'action' => 'index' ) ); ?>
</div>

<?php
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Auction');

echo $this->Form->input('title_list');
echo $this->Form->input('title');
//echo $this->Form->textarea('content');
echo $this->cksource->ckeditor('Auction.contents', array('config'=>$config, 'events'=>$events, 'escape' => false));

echo $this->Form->input('field_1_header');

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
echo $this->cksource->ckeditor('Auction.field_1_content', array('config'=>$config, 'events'=>$events, 'escape' => false));

echo $this->Form->input('field_2_header');



echo $this->cksource->ckeditor('Auction.field_2_content', array('config'=>$config, 'events'=>$events, 'escape' => false));
echo $this->Form->input('field_3_header');

echo $this->cksource->ckeditor('Auction.field_3_content', array('config'=>$config, 'events'=>$events, 'escape' => false));

//echo $this->Form->select('template_id');
echo $this->Form->input('template_id', array(
    'type' => 'radio',
    'before' => '--before--',
    'after' => '--after--',
    'between' => '--between---',
    'separator' => '--separator--',
    'options' => $templates
));
echo $this->Form->end('Submit');