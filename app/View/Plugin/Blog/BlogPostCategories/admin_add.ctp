<div class="blogPostCategories form">
<?php echo $this->Form->create('BlogPostCategory');?>
	<fieldset>
		<legend><?php __('Add Blog Post Category'); ?></legend>
	<?php
		echo $this->Form->input('parent_id', array('empty' => true));
		echo $this->Form->input('name',array('class' => 'span3'));
		echo $this->Form->input('slug',array('class' => 'span3'));
		echo $this->Form->input('meta_title',array('class' => 'span3'));
		echo $this->Form->input('meta_description',array('class' => 'span3'));
		echo $this->Form->input('meta_keywords',array('class' => 'span3'));
		echo $this->Form->input('rss_channel_title',array('class' => 'span3'));
		echo $this->Form->input('rss_channel_description',array('class' => 'span3'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Blog Post Categories'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
