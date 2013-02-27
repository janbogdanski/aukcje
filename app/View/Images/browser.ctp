<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    22.02.13 19:24
 * @var $this View
 */

$this->Paginator->options(array(
    'update' => '#content',
    'evalScripts' => true,
    'before' => '$(".loading").fadeIn();',
    'complete' => '$(".loading").fadeOut();',
//    'url' => array('controller' => 'images', 'action' => 'index'),
));
?>

<?php  echo    $this->Paginator->prev();?>
<?php  echo    $this->Paginator->numbers();?>
<?php  echo    $this->Paginator->next();?>
<?php  foreach($data as $photo): ?>
<!--    --><?php //print_r($photo); ?>
<?php $url = "javascript:editor.insertHtml('<img src=\"{$photo['Image']['image']}\" />')";?>

<?php echo $this->Html->link(
        $this->Html->image($photo['Image']['thumb'], array("alt" => "Brownies", 'class' => '',
//                'data-full' => $photo['image'],
//                'data-thumb' => $photo['thumbnail'],
        )),
        $url,
        array('escape' => false)
    );?>
<?php endforeach; ?>
<?php echo $this->Js->writeBuffer(); ?>
