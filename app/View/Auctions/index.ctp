<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>
<script type="text/javascript">

</script>
<h2><?php echo __('Auctions'); ?></h2>

    <?php if($this->UserAuth->isLogged()): ?>

    <?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> '.__('New Auction'), array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
<?php if(isset($auctions) && count($auctions)): ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo __('ID'); ?></th>
        <th><?php echo __('Title'); ?></th>
        <th><?php echo __('Options'); ?></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach( $auctions as $auction ): ?>

    <tr>
        <td><?php echo $auction['Auction']['id'];?></td>
        <td><?php echo $auction['Auction']['title_list'];?></td>


        <td class="options">
            <div class="m-btn-strip">
                <div class="m-btn-group">
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $auction['Auction']['id']), array('class' => 'm-btn mini blue') );?>
            <?php echo $this->Html->link(__('Preview'), array('action' => 'preview', $auction['Auction']['id']), array('class' => 'm-btn mini green', 'target' => '_blank') );?>
            <?php echo $this->Html->link(__('Code'), array('action' => 'preview', $auction['Auction']['id']), array('data-toggle' => 'modal','class' => 'm-btn mini purple') );?>

            <?php echo $this->Form->postLink(__('Delete'), array(
            'action' => 'delete',
            $auction['Auction']['id']), array(
            'confirm'=> __('Are you sure you want to delete that auction?'),
            'class' => 'm-btn mini red') );?>
                </div>
                </div>
        </td>
    </tr>

        <?php endforeach; ?>
    </tbody>
</table>

    <?php if(count($auctions) > 4): ?>
<?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> '.__('New Auction'), array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
    <?php endif; ?>

<?php else: ?>
<p>
    <?php echo __d('auction', 'No auctions to list'); ?>
</p>
<?php endif; ?>
<?php else: ?>
<?php echo $this->element('login', array(), array('plugin' => 'Usermgmt')); ?>
<?php endif; ?>