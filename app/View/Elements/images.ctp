<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    26.02.13 19:43
 * @var $this View
 */
?>
<?php
// if we dont have data, go get it with requestAction
if (empty($images)) {
    $images = $this->requestAction(array('controller' => 'images', 'action' => 'index'));
//    print_r($images);
    $this->Paginator->params['paging'] = $images['paging'];
    $images = $images['images'];
}

$this->Paginator->options(array(
    'update' => '#'.$updateId,
    'evalScripts' => true,
    'before' => '$(".loading").fadeIn();',
    'complete' => '$(".loading").fadeOut();',
    'url' => array('controller' => 'images', 'action' => 'index', 'updateId' => $updateId),
));

?>
<div id="<?php echo $updateId ?>">


<?php //$images = $this->requestAction('images/index'); ?>
<div class="containetr">
    <div class="row">
        <?php  echo    $this->Paginator->prev();?>
        <?php  echo    $this->Paginator->numbers();?>
        <?php  echo    $this->Paginator->next();?>
        <span class="loading" style="display: none;"><?php echo __('Loading...'); ?></span>
    </div>
    <?php foreach($images as $image): ?>

    <div class="span2 galery">
        <div class="image-galery">
<!--            --><?php //echo $this->Html->link(
//            $this->Html->image($photo['thumbnail'], array("alt" => "Brownies", 'class' => 'pickImg',
//                'data-full' => $photo['image'],
//                'data-thumb' => $photo['thumbnail'],
//            )),
//            $url,
//            array('escape' => false)
//        );?>
            <?php echo $this->Html->image($image['Image']['thumb'],
            array('class' => 'pickImg',
            'data-full' => $image['Image']['image'],
            'data-thumb' => $image['Image']['thumb'],

            )); ?>
        </div>
    </div>

    <?php endforeach; ?>
    <div class="clearfix"></div>
    <div class="row">
        <?php  echo    $this->Paginator->prev();?>
        <?php  echo    $this->Paginator->numbers();?>
        <?php  echo    $this->Paginator->next();?>
    </div>
</div>
</div>

<?php echo $this->Js->writeBuffer(); ?>
