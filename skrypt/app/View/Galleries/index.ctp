<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>

<h2>Gallerys</h2>

<?php echo $this->Html->link( '<i class="m-icon-swapright  m-icon-white"></i> New Gallery', array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>


<table class="table table-striped">
    <thead>
    <tr>

    <th>ID</th>
        <th>img</th>
        <th>title</th>
        <th>opt</th>
    </tr>
    </thead>

    <?php

    foreach( $galleries as $gallery ): ?>

        <tr>
        <td><?php echo $gallery['Gallery']['id']; ?></td>
        <td><?php echo $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($gallery['Gallery']['mini'] ,PicasaImageSizeHelper::PHOTO_THUMB_LIST), array("alt" => "Brownies")); ?></td>
        <td><?php echo $gallery['Gallery']['title']; ?></td>

        <td class="options">
            <div class="m-btn-strip">
                <div class="m-btn-group">
        <?php echo $this->Html->link( 'Edit', array('action' => 'edit', $gallery['Gallery']['id']), array('class' => 'm-btn mini blue') );?>
        <?php echo $this->Html->link( 'Preview', array('action' => 'view', $gallery['Gallery']['id']), array('class' => 'm-btn mini green') );?>
            <?php echo $this->Html->link( 'Code', array('action' => 'preview', $gallery['Gallery']['id']), array('data-toggle' => 'modal', 'id' => 'getCode','class' => 'm-btn mini purple') );?>
        <?php echo $this->Html->link(__('Code'), array('action' => 'code', $gallery['Gallery']['id']), array('data-toggle' => 'modal','class' => 'm-btn mini purple') );?>


            <?php echo $this->Form->postLink( 'Delete', array(
            'action' => 'delete',
            $gallery['Gallery']['id']), array(
            'confirm'=>'Are you sure you want to delete that user?','class' => 'm-btn mini red') );?>
            </div>
            </div>
        </td>
        </tr>
        <?php endforeach;?>

</table>
<?php if(count($galleries) > 4): ?>

<?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> New Gallery', array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
<?php endif; ?>
