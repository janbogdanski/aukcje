<?php
/**
 * @var $this View
 */
//$this->Paginator->options(array(
//	'update' => '#content',
//	'evalScripts' => true,
//	'before' => $this->Js->get('#loading_indicator')->effect('fadeIn', array('buffer' => false)),
//	'complete' => $this->Js->get('#loading_indicator')->effect('fadeOut', array('buffer' => false))
//));

?> 
<h2><?php echo Inflector::humanize($this->params['controller']);?></h2>

<p><?php echo $this->Html->link('Find New Paths', array('action' => 'initialize'));?> | 
<?php echo $this->Html->link('Add', array('action' => 'add'));?></p>

<?php //echo $this->element('paging');?>
<?php echo $this->Paginator->prev(' << ' . __('previous'), array(), null, array('class' => 'prev')); ?>
<?php echo $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'prev')); ?>
<?php echo $this->Paginator->counter('Page {:page} of {:pages}, showing {:current} out of {:count}'); ?>

<table class="table table-striped">
    <thead>
<tr>
	<th><?php echo $this->Paginator->sort('path');?></th>
	<th><?php echo $this->Paginator->sort('title');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions">actions</th>
</tr>
    </thead>
    <tbody>
<?php
if(isset($data)):
	$a=0;

	foreach($data as $row):
		extract($row);

		$actions = array();
		$actions[] = $this->Html->link('E', array('action' => 'edit', $row['Metum']['id']), array('title' => 'edit'));
		$actions[] =
            $this->Form->postLink('X', array('action' => 'delete', $row['Metum']['id']), array('title' => 'delete', 'confirm'=>__('Are you sure you want to delete??'))
                );

		$actions = implode(' - ', $actions);
        $row['Metum']['title'] = stripslashes($row['Metum']['title']);
        $row['Metum']['description'] = stripslashes($row['Metum']['description']);

?>
<tr class="<?php echo $a%2==0?'even':'odd';?>">
<td><?php echo $row['Metum']['path'];?></td>

<td><?php echo $row['Metum']['title'];?></td>

<td><?php echo $row['Metum']['description'];?></td>

<td class="date"><?php echo $this->Time->format('Y-m-d', $row['Metum']['modified']);?></td>

<td class="actions"><?php echo $actions;?></td>
</tr>
<?php
		$a++;
	endforeach; 
endif;
?>
    </tbody>
</table>

<?php //echo $this->element('paging');?>

<?php echo $this->Js->writeBuffer();?>