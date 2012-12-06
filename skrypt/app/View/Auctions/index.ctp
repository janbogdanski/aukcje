<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 */
?>
<script type="text/javascript">
$(document).ready(function(){

    $('[data-toggle="modal"]').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            if (url.indexOf('#') == 0) {
                $(url).modal('open');
            } else {
                $.get(url, function(data) {
                    $('<div class="modal hide fade"><textarea name="name" id="" style="width: 90%; height: 300px;">' + data + '</textarea></div>').modal();
                }).success(function() { $('input:text:visible:first').focus(); });
            }
        return false;
    });
});
</script>
<h2>Auctions</h2>

    <?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> New Auction', array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>title</th>
        <th>title</th>
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
            <?php echo $this->Html->link( 'Edit', array('action' => 'edit', $auction['Auction']['id']), array('class' => 'm-btn mini blue') );?>
            <?php echo $this->Html->link( 'Preview', array('action' => 'preview', $auction['Auction']['id']), array('class' => 'm-btn mini green') );?>
            <?php echo $this->Html->link( 'Code', array('action' => 'preview', $auction['Auction']['id']), array('data-toggle' => 'modal', 'id' => 'getCode','class' => 'm-btn mini purple') );?>

            <?php echo $this->Form->postLink( 'Delete', array(
            'action' => 'delete',
            $auction['Auction']['id']), array(
            'confirm'=>'Are you sure you want to delete that user?',
            'class' => 'm-btn mini red') );?>
                </div>
                </div>
        </td>
    </tr>

        <?php endforeach; ?>
    </tbody>
</table>
    
    <?php if(count($auctions) > 4): ?>
<?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> New Auction', array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
    <?php endif; ?>
