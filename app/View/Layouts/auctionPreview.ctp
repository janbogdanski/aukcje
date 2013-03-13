<?php
/**
 * @var $this View
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
<?php echo $this->element('meta', array(), array('plugin' => 'Meta'));?>
<?php echo $this->Html->meta('icon','/favicon.png'); ?>

</head>

<body>
<?php echo $this->element('analytics'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>
