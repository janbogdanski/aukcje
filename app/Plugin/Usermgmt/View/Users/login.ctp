<?php
/**
 * @param $this View
 */
        ?>
<h2 class="form-header"><?php echo __('Sign In or'); ?></h2>
<span><?php echo ' '.__("or").' '.$this->Html->link(__("Sign Up",true),"/register") ?></span>
<div>
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
    <div>
        <div><?php echo __('Email / Username');?></div>
        <div ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"span3" ))?></div>
    </div>
    <div>
        <div><?php echo __('Password');?></div>
        <div><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"span3" ))?></div>
    </div>
    <div>
        <?php   if(!isset($this->request->data['User']['remember']))
        $this->request->data['User']['remember']=true;
        ?>
        <div><?php echo __('Remember me');?>
            <?php echo $this->Form->input("remember" ,array("type"=>"checkbox",'div' => false, 'label' => false))?>
        </div>
    </div>
    <div>
        <div><?php echo $this->Form->Submit(__('Sign In'),array('class' => 'm-btn blue'));?></div>
    </div>
    <?php echo $this->Form->end(); ?>
    <div><?php echo $this->Html->link(__("Forgot Password?",true),"/forgotPassword",array("class"=>"style30")) ?></div>
    <div><?php echo $this->Html->link(__("Email Verification",true),"/emailVerification",array("class"=>"style30")) ?></div>
</div>

<script type="text/javascript">
    document.getElementById("UserEmail").focus();
</script>