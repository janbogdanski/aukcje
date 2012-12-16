<div class="blogPostTags form">
<?php echo $this->Form->create('BlogPostTag');?>
	<fieldset>
		<legend><?php __('Add Blog Post Tag'); ?></legend>
	<?php
        echo $this->Form->input('name', array('id' => 'title'));
        echo $this->Form->input('slug', array('id' => 'slug'));
                echo $this->Form->input('meta_title');
                echo $this->Form->input('meta_description');
                echo $this->Form->input('meta_keywords');
                echo $this->Form->input('rss_channel_title');
                echo $this->Form->input('rss_channel_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Blog Post Tags'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('controller' => 'blog_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('controller' => 'blog_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
