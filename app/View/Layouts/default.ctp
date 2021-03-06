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
    <?php $this->Metadata->meta(); ?>
    <title><?php echo $this->get('TITLE');?></title>
    <?php echo $this->get('DESCRIPTION'); ?>
    <?php echo $this->get('KEYWORDS'); ?>
    <?php echo $this->get('OG_TITLE'); ?>
    <?php echo $this->get('OG_DESCRIPTION'); ?>
    <?php echo $this->get('OG_IMAGE'); ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Google Web Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600' rel='stylesheet' type='text/css'>

    <link rel='stylesheet' id='fp_webfont_Open_Sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C600%2C700%2C800&#038;ver=3.4.1' type='text/css' media='all' />
    <link rel='stylesheet' id='fp_webfont_Oswald-css'  href='http://fonts.googleapis.com/css?family=Oswald&#038;ver=3.4.1' type='text/css' media='all' />

    <?php
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
//    echo $this->Html->css('joyride-2.0.2');
    echo $this->Html->css('moje');


    echo $this->Html->script('jquery-1.8.3.min');
    echo $this->Html->script('global');
    echo $this->Html->script('jquery.cookie');
    echo $this->Html->script('jquery.joyride-2.0.2');

    if(isset($this->request->params['prefix']) && 'admin' == $this->request->params['prefix'] ){
        echo   $this->Html->script('admin');
    }
    echo $this->Html->meta('icon','/favicon.png');

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
                        <h1><?php echo Configure::read('Site.header'); ?></h1>
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
                                    <?php echo $this->Html->link(__('News'), array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'index', 'admin' => false)); ?>
                                </li>
                                <li>


                                    <?php if($this->UserAuth->isLogged()): ?>
                                    <div class="m-btn-group">
                                        <a class="m-btn dropdown-toggle blue" data-toggle="dropdown" href="#">
                                            <?php echo $user['User']['email']; ?> <span class="caret white"></span>
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
                                            <div><?php echo __('Email');?></div>
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
                                            <div class="pull-right">
                                                <?php echo $this->Form->Submit(__('Sign In'),array('class' => 'm-btn blue'));?>
                                                <a href="/oauth/google" class="m-btn blue"><i class="icon-google-plus-sign icon-large"></i>&nbsp; <?php echo __('Login with Google'); ?></a>
                                                <a href="/oauth/facebook" class="m-btn blue"><i class="icon-facebook-sign icon-large"></i>&nbsp; <?php echo __('Login with Fb'); ?></a>
                                            </div>

                                            <div class="clearfix"></div>

                                            <div>
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
                    <?php echo $this->Menu->item($this->Html->link(__('Auctions'), array('plugin' => null, 'controller' => 'auctions', 'action' => 'index', 'admin' => false))); ?>
                    <?php echo $this->Menu->item($this->Html->link(__('Galleries'), array('plugin' => null, 'controller' => 'galleries', 'action' => 'index', 'admin' => false))); ?>
                    <li>
                        <ul>
                        <?php echo $this->Menu->item($this->Html->link(__('Images'), array('plugin' => null, 'controller' => 'images', 'action' => 'index', 'admin' => false))); ?>
                        </ul>
                    </li>
                    <?php echo $this->Menu->item($this->Html->link(__('News'), array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'index', 'admin' => false))); ?>
                    <?php echo '<li>'.$this->Html->link(__('Help'), array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'index', 'tag' => 'pomoc', 'admin' => false)).'</li>'; ?>
                </ul>

                <div id="calm"><br />
                    <?php
                    //reklama system partnerski
                    switch(date('i') % 3):
                        case 0:
                            ?>
                            <a href="http://pro.systempartnerski.pl/e/lead/72/" onclick="_gaq.push(['_trackEvent', 'Lewe Menu', 'Click', 'Keep calm mbank']);" target="_blank">
                                <img src="/img/wspieraj_proaukcje_mbank.png" alt="Załóż darmowe konto w mBank i wspieraj proaukcje.eu">
                            </a>
                            <?php
                            break;
                        case 1:
                            ?>
                            <a href="http://pro.systempartnerski.pl/e/lead/830/" onclick="_gaq.push(['_trackEvent', 'Lewe Menu', 'Click', 'Keep calm getin']);" target="_blank">
                                <img src="/img/wspieraj_proaukcje_getin.png" alt="Załóż darmowe konto GETIN UP i wspieraj proaukcje.eu">
                            </a>
                            <?php
                            break;
                        case 2:
                            ?>
                            <a href="http://pro.systempartnerski.pl/e/lead/197/" onclick="_gaq.push(['_trackEvent', 'Lewe Menu', 'Click', 'Keep calm ing']);" target="_blank">
                                <img src="/img/wspieraj_proaukcje_ing.png" alt="Załóż darmowe konto w ING Banku Śląskim i wspieraj proaukcje.eu">
                            </a>
                            <?php
                            break;

                        endswitch;
                    ?>

                </div>
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
                <span>Copyright © <?php echo date('Y'); ?> proaukcje.eu</span>
                    <ul class="inline pull-right">
                        <li><?php echo $this->Html->link(__('Contact'), array('plugin' => null,'controller' => 'pages','action' => 'contact','admin' => false)); ?></li>
                        <li><a href="#" data-uv-lightbox="classic_widget" data-uv-mode="feedback" data-uv-primary-color="#008ed5" data-uv-link-color="#008ed5" data-uv-forum-id="162739"><?php echo __('Feedback'); ?></a></li>
                        <li><?php echo $this->Html->link(__('Rules'), array('plugin' => null, 'controller' => 'pages', 'action' => 'display','rules', 'admin' => false)); ?></li>
                        <li><?php echo $this->Html->link(__('Privacy Policy'), array('plugin' => null, 'controller' => 'pages', 'action' => 'display','policy', 'admin' => false)); ?></li>
                    </ul>

            </div>
        </div>
    </div><!-- /row -->
</div>
<!-- UserVoice JavaScript SDK (only needed once on a page) -->
<script>(function () {
    var uv = document.createElement('script');
    uv.type = 'text/javascript';
    uv.async = true;
    uv.src = '//widget.uservoice.com/aJRyivI0rAjqJMxLHo0e8w.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(uv, s)
})()</script>


<?php //echo $this->Html->script('jquery.flexslider-min'); ?>
<?php echo $this->Html->script('/css/bootstrap/js/bootstrap.min.js'); ?>
</div>
<?php echo $this->element('sql_dump'); ?>
<script type="text/javascript">
    cookiesDirective('bottom',2,'polityka-prywatnosci');
</script>

<script type="text/javascript">
    var _mfq = _mfq || [];
    (function () {
        var mf = document.createElement("script"); mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/911edb54-1861-4966-9fb3-643785f96726.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
    })();
</script>
</body>
</html>