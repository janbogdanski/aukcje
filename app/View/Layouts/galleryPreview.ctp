<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 * @var $this View
 * Creation date    14.02.13 18:16
 */

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
    <title><?php echo $title_for_layout; ?></title>
    <?php
    echo $this->Html->css('bootstrap/css/bootstrap');
    echo $this->Html->css('microsoft/css/bootstrap-responsive.min');
    echo $this->Html->script('jquery-1.8.3.min');
    echo $this->Html->meta('icon','/favicon.png');


    ?>
    <style type="text/css">
        body{
            background: #222222;
        }
    </style>
</head>

<body>
<?php echo $this->element('analytics'); ?>
<?php echo $this->fetch('content'); ?>
</body>
</html>