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
    <title>

        <?php echo $this->get('title_for_layout');?>
    </title>

    <!--    <meta property="og:title" content="--><?php //echo @$metaOgTitle; ?><!--" />-->
    <!--    <meta property="og:url" content="--><?php //echo @$metaOgUrl; ?><!--" />-->
    <!--    <meta property="og:description" content="--><?php //echo @$metaOgTitle; ?><!--" />-->
    <!--    <meta property="og:site_name" content="--><?php //echo @$metaOgSiteName; ?><!--" />-->
    <!--    <meta property="og:image" content="--><?php //echo @$metaOgTitle; ?><!--" />-->
    <!--    <meta property="og:type" content="--><?php //echo @$metaOgType; ?><!--" />-->

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Google Web Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600' rel='stylesheet' type='text/css'>

    <link rel='stylesheet' id='fp_webfont_Open_Sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C600%2C700%2C800&#038;ver=3.4.1' type='text/css' media='all' />
    <link rel='stylesheet' id='fp_webfont_Oswald-css'  href='http://fonts.googleapis.com/css?family=Oswald&#038;ver=3.4.1' type='text/css' media='all' />

    <?php
    echo $this->Html->css('frontend');
    echo $this->Html->css('style');
    echo $this->Html->css('bootstrap/css/bootstrap');
//    echo $this->Html->css('bootstrap/css/bootstrap-responsive.min');

//    echo $this->Html->css('microsoft/css/bootstrap.min');
    echo $this->Html->css('microsoft/css/bootstrap-responsive.min');
    echo $this->Html->css('microsoft/css/styles');
    echo $this->Html->css('microsoft/css/m-styles.min');
//    <link href="./js/google-code-prettify/prettify.css" rel="stylesheet">

    echo $this->Html->css('bootstrap/css/font-awesome');
    echo $this->Html->css('bootstrap/css/font-awesome-ie7');
    echo $this->Html->css('shortcodes');
//    echo $this->Html->css('prettyPhoto');
//    echo $this->Html->css('flexslider');
    echo $this->Html->css('flip');
    echo $this->Html->css('flipit');
    echo $this->Html->css('joyride-2.0.2');
    echo $this->Html->css('moje');


    echo $this->Html->script('jquery-1.8.3.min');
    echo $this->Html->script('global');
    echo $this->Html->script('jquery.cookie');
    echo $this->Html->script('jquery.joyride-2.0.2');

    if(isset($this->request->params['prefix']) && 'admin' == $this->request->params['prefix'] ){
        echo   $this->Html->script('admin');
    }
    echo $this->Html->meta('icon');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>

    <script type="text/javascript">
        $(function() {
            $('#login-dropdown').click(function(e) {
                e.stopPropagation();
            });
        });
    </script>
</head>

<body class="">
<?php echo $this->element('analytics'); ?>
<div id="wrap" class="navPositionright">

<div id="container" class="container">

    <header id="header">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <div class="logo_holder">
                        <?php echo $this->Html->link($this->Html->image('logo.png', array("alt" => "Brownies", 'id' => 'logo')),'/',array('escape' => false));?>
                    </div>
                    <a class="btn-flat" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse" style="height: 0;">
                        <nav id="jqueryslidemenu" class="jqueryslidemenu">
                            <ul class="nav">
                                <li>
                                    <?php echo $this->Html->link(__('Auctions'), array('plugin' => null, 'controller' => 'auctions', 'action' => 'index', 'admin' => false)); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link(__('Galleries'), array('plugin' => null, 'controller' => 'galleries', 'action' => 'index', 'admin' => false)); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link(__('Contact'), array('plugin' => null, 'controller' => 'pages', 'action' => 'contact', 'admin' => false)); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link(__('Blog'), array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'index', 'admin' => false)); ?>
                                </li>
                                <li>


                                    <?php if($this->UserAuth->isLogged()): ?>
                                    <div class="m-btn-group">
                                        <a class="m-btn dropdown-toggle blue" data-toggle="dropdown" href="#">
                                            <?php echo $user['User']['username']; ?> <span class="caret white"></span>
                                        </a>
                                        <div class="m-dropdown-menu">
                                            <p><?php echo $this->Html->link(__('Settings'),"/dashboard") ?></p>
                                            <p class="divider"></p>
                                            <p><?php echo $this->Html->link('<i class="icon-off"></i> '.__('Logout'),"/logout",array('escape' => false)) ?></p>

                                        </div>

                                    </div>
                                    <?php else: ?>
                                    <!--            --><?php //echo $this->Html->link(__('Login'), '/login', array('class' => 'm-btn blue')); ?>
                                    <div class="m-btn-group">
                                        <a class="m-btn dropdown-toggle blue" data-toggle="dropdown" href="#">
                                            <?php echo __('Sign in/up'); ?> <span class="caret white"></span>
                                        </a>
                                        <div class="m-dropdown-menu" style="padding: 15px; padding-bottom: 0;" id="login-dropdown">

                                            <?php echo $this->Form->create('User', array('url' => array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'))); ?>
                                            <div><?php echo __('Email / Username');?></div>
                                            <div><?php echo $this->Form->input("email" ,array('label' => false,'div' => false, 'error' => false,'class'=>"span2" ))?>
                                            </div>
                                            <div><?php echo __('Password');?></div>
                                            <div><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false, 'error' => false, 'div' => false,'class'=>"span2" ))?>
                                            </div>
                                            <?php   if(!isset($this->request->data['User']['remember']))
                                            $this->request->data['User']['remember']=true;
                                            ?>
                                            <div class="pull-left"><?php echo __('Remember me');?>
                                                <?php echo $this->Form->input("remember" ,array("type"=>"checkbox",'div' => false, 'label' => false))?> </div>
                                            <div class="pull-right"><?php echo $this->Form->Submit(__('Sign In'),array('class' => 'm-btn blue'));?>
                                            </div>
                                            <div class="clearfix">
                                                <?php echo $this->Html->link(__("Sign Up",true),"/register", array('class' => 'create-account')) ?>
                                            </div>
                                            <?php echo $this->Form->end(); ?>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </li></ul>

                            <div class="clear"></div>
                        </nav>
                    </div><!-- /nav-collapse -->

                    <div class="pull-right">

                        <!--                            <ul class="nav_social">-->
                        <!--                                <li class="n_facebook"><a href="http://facebook.com/proaukcje" target="_blank"><i class="icon-facebook"></i></a></li>-->
                        <!--                                <li class="n_twitter"><a href="https://twitter.com/#!/proaukcje" target="_blank"><i class="icon-twitter"></i></a></li>-->
                        <!--                                <li class="n_google"><a href="https://plus.google.com/u/0/b/118223521662447066750/118223521662447066750/posts" target="_blank">-->
                        <!--                                    <i class="icon-google-plus"></i></a></li>-->
                        <!--                                <li class="n_rss">--><?php //echo $this->Html->link('<i class="icon-rss"></i>', '/blog.rss', array('escape' => false, 'target' => '_blank')); //array('plugin' => 'blog',  'admin' => false), array('escape' => false, 'target' => '_blank')); ?><!--</li>-->
                        <!--                            </ul>-->
                    </div>

                </div><!-- /container -->

            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->

    </header>
    <hr class="cool_divider" />
    <div id="main" role="main" class="row">
        <aside id="sidebar" class="span2" >


            <div class="widget widget_pages"><h4><?php echo __('Navigate'); ?></h4>
                <ul>
                    <li>
                        <?php echo $this->Html->link(__('Auctions'), array('plugin' => null, 'controller' => 'auctions', 'action' => 'index', 'admin' => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Galleries'), array('plugin' => null, 'controller' => 'galleries', 'action' => 'index', 'admin' => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Contact'), array('plugin' => null, 'controller' => 'pages', 'action' => 'contact', 'admin' => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Blog'), array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'index', 'admin' => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Help'), array('plugin' => 'blog', 'controller' => 'blog_posts', 'tag' => 'pomoc', 'admin' => false)); ?>
                    </li>
                </ul>
            </div>
            <div>
            </div>

            <div class="clearfix bt"></div>
            <div class="clearfix"></div>
            <div id="sidebar_bottom"></div>

        </aside>
        <section id="content" class="span9">

            <!--                <h3 id="yourHeaderID">aaaa</h3>-->
            <!--                <p class="your-paragraph-class">vvvvvvvf</p>-->
            <!--                <a id="yourAnchorID" href="#url">fffffffffff</a>-->

            <?php  echo $this->Session->flash('bad'); ?>
            <?php  echo $this->Session->flash('good'); ?>
            <?php  echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
            <!--                <h3 id="numero3">Get the Most Out of Your App!</h3>-->


            <!--                <ol id="joyRideTipContent">-->
            <!--                    <li data-id="yourHeaderID" data-text="Next" class="">-->
            <!--                        <h2>Stop #1</h2>-->
            <!--                        <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p>-->
            <!--                    </li>-->
            <!--                    <li data-class="your-paragraph-class" data-button="Next" data-options="">-->
            <!--                        <h2>Stop #2</h2>-->
            <!--                        <p>Get the details right by styling Joyride with a custom stylesheet!</p>-->
            <!--                    </li>-->
            <!--                    <li data-id="yourAnchorID" data-button="Next" data-options="">-->
            <!--                        <h2>Stop #3</h2>-->
            <!--                        <p>It works right aligned.</p>-->
            <!--                    </li>-->
            <!--                    <li data-button="Next">-->
            <!--                        <h2>Stop #4</h2>-->
            <!--                        <p>It works as a modal too!</p>-->
            <!--                    </li>-->
            <!--                    <li data-id="numero3" data-button="Close">-->
            <!--                        <h2>Stop #5</h2>-->
            <!--                        <p>Now what are you waiting for? Add this to your projects and get the most out of your apps!</p>-->
            <!--                    </li>-->
            <!--                </ol>-->

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