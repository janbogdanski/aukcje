<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:17
 */
?>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>