<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<h2 class="form-header"><?php echo __('Sign Up or'); ?></h2>
<span><?php echo ' '.__("or").' '.$this->Html->link(__("Sign In",true),"/login") ?></span>
<div class="clearfix"></div>
<div class="span3">
    <?php echo $this->Form->create('User', array('action' => 'register')); ?>

<?php   if (count($userGroups) >2) { ?>
<div>
    <div><?php echo __('Group');?><font color='red'>*</font></div>
    <div ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"span3" ))?></div>
</div>
<?php   }   ?>
<!--<div>-->
<!--    <div>--><?php //echo __('Username');?><!--<font color='red'>*</font></div>-->
<!--    <div >--><?php //echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"span3" ))?><!--</div>-->
<!--</div>-->
<!--					<div>-->
<!--						<div>--><?php //echo __('First Name');?><!--<font color='red'>*</font></div>-->
<!--						<div >--><?php //echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"span3" ))?><!--</div>-->
<!--						<div style="clear:both"></div>-->
<!--					</div>-->
<!--					<div>-->
<!--						<div>--><?php //echo __('Last Name');?><!--<font color='red'>*</font></div>-->
<!--						<div >--><?php //echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"span3" ))?><!--</div>-->
<!--						<div style="clear:both"></div>-->
<!--					</div>-->
<div>
    <div><?php echo __('Email');?><font color='red'>*</font></div>
    <div ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"span3" ))?></div>
</div>
<div>
    <div><?php echo __('Password');?><font color='red'>*</font></div>
    <div><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"span3" ))?></div>
</div>
<div>
    <div><?php echo __('Confirm Password');?><font color='red'>*</font></div>
    <div><?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"span3" ))?></div>
</div>
<?php   if(USE_RECAPTCHA && PRIVATE_KEY_FROM_RECAPTCHA !="" && PUBLIC_KEY_FROM_RECAPTCHA !="") { ?>
<div>
    <div style="margin-left:45px"><?php echo $this->UserAuth->showCaptcha(isset($this->validationErrors['User']['captcha'][0]) ? $this->validationErrors['User']['captcha'][0] : ""); ?></div>
</div>
<?php   } ?>
<div>
    <div></div>
    <div><?php echo $this->Form->Submit(__('Sign Up'),array('class' => 'm-btn blue'));?></div>
</div>
<?php echo $this->Form->end(); ?>
</div>
<div class="span3 loginwith">
    <div><a href="/oauth/google" class="m-btn blue"><i class="icon-google-plus-sign icon-large"></i>&nbsp; <?php echo __('Login with Google'); ?></a></div>
    <div><a href="/oauth/facebook" class="m-btn blue"><i class="icon-facebook-sign icon-large"></i>&nbsp; <?php echo __('Login with Fb'); ?></a></div>
</div>
<script type="text/javascript">
    document.getElementById("UserEmail").focus();
</script>