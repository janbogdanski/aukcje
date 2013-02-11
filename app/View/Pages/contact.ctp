<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    08.02.13 19:30
 * @var $this View
 */
?>
<h2><?php echo __d('contact', 'Contact form'); ?></h2>
<?php
echo $this->Form->create('Contact');
echo $this->Form->input('Contact.Name', array('label' => __d('contact', 'Name'), 'class' => 'span4'));
echo $this->Form->input('Contact.Mail', array('label' => __d('contact', 'Email'), 'class' => 'span4'));
echo $this->Form->input('Contact.Message', array('type' => 'textarea', 'label' => __d('contact', 'Message'), 'class' => 'span4'));

echo $this->Form->submit(__d('contact','Send'), array('label' => __d('contact', 'Submit'), 'class' => 'm-btn blue'));

echo $this->Form->end();