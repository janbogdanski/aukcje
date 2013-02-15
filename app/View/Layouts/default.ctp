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

    <!--    <meta name="description" content="">-->


    <!-- Google Web Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="http://responsivewebinc.com/premium/outlooker/outlooker-gimg/favicon/favicon.png">

    <link rel='stylesheet' id='fp_webfont_Open_Sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C600%2C700%2C800&#038;ver=3.4.1' type='text/css' media='all' />
    <link rel='stylesheet' id='fp_webfont_Oswald-css'  href='http://fonts.googleapis.com/css?family=Oswald&#038;ver=3.4.1' type='text/css' media='all' />
<!--    <script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-includes/js/comment-reply.js?ver=3.4.1'></script>-->

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
    echo $this->Html->css('audio_skin');
    echo $this->Html->css('prettyPhoto');
    echo $this->Html->css('flexslider');
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

//    echo $this->Html->css('cake.generic');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    ?>

    <script type="text/javascript">
        $(function() {
            // Setup drop down menu
//            $('.dropdown-toggle').dropdown();

            // Fix input element click problem
            $('#login-dropdown').click(function(e) {
                e.stopPropagation();
            });
        });
    </script>
</head>


<body class="">
<div id="wrap" class="navPositionright">

    <div id="container" class="container">

        <header id="header">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <div class="logo_holder">
                            <?php
                            echo $this->Html->link(
                                $this->Html->image('logo.png', array("alt" => "Brownies", 'id' => 'logo')),
                                '/',
                                array('escape' => false)
                            );?>
<!--                            <a href="http://flipit.fdthemes.com/corpit/"><img src="http://flipit.fdthemes.com/corpit/wp-content/uploads/2012/08/logo1.png" alt="Flipit"  /></a>-->
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

                                            <?php echo $this->Form->create('User', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login')); ?>
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


        <div style="position: relative;">

        </div>
        <div class="page_title">


            <div class="clearfix"></div>
        </div><!-- /page_title -->


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
<!--                    dziala tylko w podgladzie postu, trzeba dorobic-->
<!--                    --><?php //echo $this->Blog->tagCloud(array('a')); ?>
<!--                    --><?php //echo ($this->element('Blog.tag_cloud')); ?>
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

    <div class="clearfix"></div>

</div><!-- /main -->

<div class="clearfix"></div>

</div><!-- /container -->


<div class="footer_wrap">
    <footer id="footer" class="container">
<!--        <div class="clear"></div>-->
<!--        <div class="sub_footer_wrap">-->
<!---->
<!---->
<!--            <div id="sidebar" class="sub_footer container">-->
<!--                <div class="footerTop row">-->
<!--                    <div class="span3">-->
<!--                        <div id="text-10" class="widget widget_text">-->
<!--                            <div class="textwidget">-->
<!--                                <h3 style="font-weight:  300;">Built for touch </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div><!-- /sub_footer -->
<!--        </div><!-- /sub_footer_wrap -->
    </footer>



</div><!-- /wrap -->
<div class="container">
    <div class="row">
        <div class="span9">
            <div class="footer_left">
<!--                <div class="logo">-->
                    <?php
//                    echo $this->Html->link(
//                        $this->Html->image('logo.png', array("alt" => "Brownies", 'id' => 'logo')),
//                        '/',
//                        array('escape' => false)
//                    );?>
<!--                </div>-->
                <p>Copyright © <?php echo date('Y'); ?> proaukcje.eu</p>
            </div>
        </div>
<!--        <div class="span3">-->
<!--            <div class="pull-right">-->
<!--                <ul class="nav_social">-->
<!--                    <li class="n_facebook"><a href="http://facebook.com/proaukcje" target="_blank"><i class="icon-facebook"></i></a></li>-->
<!--                    <li class="n_twitter"><a href="https://twitter.com/#!/proaukcje" target="_blank"><i class="icon-twitter"></i></a></li>-->
<!--                    <li class="n_google"><a href="https://plus.google.com/u/0/b/118223521662447066750/118223521662447066750/posts" target="_blank">-->
<!--                        <i class="icon-google-plus"></i></a></li>-->
<!--                    <li class="n_rss"><a href="#?feed=rss2" target="_blank"><i class="icon-rss"></i></a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->


    </div><!-- /row -->

</div>


<!-- WP_Footer -->

<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/plugins/contact-form-7/includes/js/jquery.form.js?ver=3.09'></script>-->
<!--<script type='text/javascript'>-->
<!--    /* <![CDATA[ */-->
<!--    var _wpcf7 = {"loaderUrl":"http:\/\/flipit.fdthemes.com\/corpit\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};-->
<!--    /* ]]> */-->
<!--//</script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.2'></script>-->
<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.flexslider-min.js?ver=1.0'></script>
<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/bootstrap.min.js?ver=1.0'></script>
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/script.js?ver=1.0'></script>-->
<!--<script type='text/javascript'>-->
<!--    /* <![CDATA[ */-->
<!--    var WP_Flexslider = {"effect":"slide","animSpeed":"600","interval":"5000","pauseOnHover":"0","navigation":"true"};-->
<!--    /* ]]> */-->
<!--//</script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.flexslider.custom.js?ver=1.0'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-includes/js/hoverIntent.js?ver=r6'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-includes/js/jquery/ui/jquery.ui.widget.min.js?ver=1.8.20'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.prettyPhoto.js?ver=3.1.3'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.tools.min.js?ver=1.2.6'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.touchSwipe-1.3.1.js?ver=1.3.1'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.jplayer.min.js?ver=1.0'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/customRetweet.min.js?ver=10'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/ios-orientationchange-fix.js?ver=1.0'></script>-->
<!--<script type='text/javascript'>-->
<!--    /* <![CDATA[ */-->
<!--    var WP_Preloader = {"theme_path":"http:\/\/flipit.fdthemes.com\/corpit\/wp-content\/themes\/flipit"};-->
<!--    /* ]]> */-->
<!--//</script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.preloader.js?ver=1.0'></script>-->
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.infinitescroll.js?ver=1.0'></script>-->
<!-- /WP_Footer -->

<!--plywajacy przy krawedzi-->
<!--<script src="http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.tabSlideOut.v1.3.js"></script>-->
<!--<script type="text/javascript">-->
<!--    jQuery('document').ready(function($){-->
<!--        $('.slide-out-div').tabSlideOut({-->
<!--            tabHandle: '.handle',                     //class of the element that will become your tab-->
<!--            pathToTabImage: 'http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/images/demo-modal/tag_blue.png', //path to the image for the tab //Optionally can be set using css-->
<!--            imageHeight: '138px',                     //height of tab image           //Optionally can be set using css-->
<!--            imageWidth: '46px',                       //width of tab image            //Optionally can be set using css-->
<!--            tabLocation: 'left',                      //side of screen where tab lives, top, right, bottom, or left-->
<!--            speed: 300,                               //speed of animation-->
<!--            action: 'click',                          //options: 'click' or 'hover', action to trigger animation-->
<!--            topPos: '200px',                          //position from the top/ use if tabLocation is left or right-->
<!--            leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top-->
<!--            fixedPosition: true                      //options: true makes it stick(fixed position) on scroll-->
<!--        });-->
<!--    });-->
<!---->
<!--//</script>-->
<style type="text/css">

    .slide-out-div {
        padding: 20px;
        width: 100px;
        border: 1px solid #CCCCCC;
        z-index: 10;
        height: 304px !important;
        background-color: #fff;
    }
    .slide-out-div .handle{
        font-size: 11px;
        color: #CCCCCC;
    }
    .slide-out-div a.demolink{
        opacity: .5;
        filter: alpha(opacity=50);
    }
    .slide-out-div a.demolink:hover{
        opacity: 1;
        filter: alpha(opacity=100);
    }

    .selectedDemo {
        opacity: 1;
        filter: alpha(opacity=100);
    }

</style>

<!--<div class="slide-out-div">-->
<!--    <a class="handle" href="http://link-for-non-js-users.html">Content</a>-->
<!--    <img class="selectedDemo" style="margin-bottom: 10px; display:block" src="http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/images/demo-modal/corpit.png">-->
<!--    <a class="demolink" style="margin-bottom: 10px; display:block" href="http://flipit.fdthemes.com/"><img src="http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/images/demo-modal/flipit.png"></a>-->
<!--    <a class="demolink" style="margin-bottom: 10px; display:block" href="http://flipit.fdthemes.com/phlipit"><img src="http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/images/demo-modal/phlipit.png"></a>-->
<!--</div>-->
</div>
<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.prettyPhoto.js?ver=3.1.3'></script>
<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.tools.min.js?ver=1.2.6'></script>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>