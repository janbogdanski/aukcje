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
    <?php echo $this->Html->charset(); ?>
    <?php echo $this->element('meta', array(), array('plugin' => 'Meta'));?>
    <title><?php echo $this->get('title_for_layout');?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Web Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600' rel='stylesheet' type='text/css'>

    <link rel='stylesheet' id='fp_webfont_Open_Sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C600%2C700%2C800&#038;ver=3.4.1' type='text/css' media='all' />
    <link rel='stylesheet' id='fp_webfont_Oswald-css'  href='http://fonts.googleapis.com/css?family=Oswald&#038;ver=3.4.1' type='text/css' media='all' />

    <?php
    echo $this->Html->css('bootstrap/css/bootstrap');
    echo $this->Html->css('microsoft/css/bootstrap-responsive.min');
    echo $this->Html->css('microsoft/css/styles');
    echo $this->Html->css('microsoft/css/m-styles.min');
    echo $this->Html->css('bootstrap/css/font-awesome');
    echo $this->Html->css('bootstrap/css/font-awesome-ie7');
    echo $this->Html->css('shortcodes');
    echo $this->Html->css('flip');
    echo $this->Html->css('moje');

    echo $this->Html->script('jquery-1.8.3.min');
    echo $this->Html->script('global');
//    echo $this->Html->script('jquery.cookie');
//    echo $this->Html->script('jquery.joyride-2.0.2');

    echo $this->Html->meta('icon','favicon.png');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>

<body class="">
<?php echo $this->element('analytics'); ?>
<div id="container" class="container">

    <header id="header">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <div class="logo_holder">
                        <?php echo $this->Html->link($this->Html->image('logo.png', array("alt" => "Brownies", 'id' => 'logo')),'/',array('escape' => false));?>
                        <h1><?php echo Configure::read('Site.header'); ?></h1>
                    </div>
                </div><!-- /container -->

            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->

    </header>
    <hr class="cool_divider" />
    <div id="main" role="main" class="row">
        <section id="content" class="span9">
            <?php  echo $this->Session->flash('bad'); ?>
            <?php  echo $this->Session->flash('good'); ?>
            <?php  echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </section><!-- /content -->
        <div class="clearfix"></div>
    </div><!-- /main -->
    <div class="clearfix"></div>
</div><!-- /container -->


<div class="footer_wrap">

</div><!-- /wrap -->
<div class="container">
    <div class="row">
        <div class="span9">
            <div class="footer_left">
                <p>Copyright © <?php echo date('Y'); ?> proaukcje.eu</p>
            </div>
        </div>
    </div><!-- /row -->
</div>

<?php //echo $this->Html->script('jquery.flexslider-min'); ?>
<?php echo $this->Html->script('/css/bootstrap/js/bootstrap.min.js'); ?>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>