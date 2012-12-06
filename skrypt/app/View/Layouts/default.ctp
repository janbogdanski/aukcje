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
    <title>
        <?php echo $title_for_layout; ?>
    </title>

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
//    echo $this->Html->css('bootstrap/css/bootstrap');
//    echo $this->Html->css('bootstrap/css/bootstrap-responsive.min');

    echo $this->Html->css('microsoft/css/bootstrap.min');
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
    echo $this->Html->css('moje');
    echo $this->Html->script('jquery-1.8.3.min');

    echo $this->Html->meta('icon');

//    echo $this->Html->css('cake.generic');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>


<body class="page page-id-279 page-child parent-pageid-254 page-template-default layout-2cr">
<div id="wrap" class="navPositionright">

    <div id="container" class="container">

        <header id="header">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <div class="logo_holder">
                            <?php
                            echo $this->Html->link(
                                $this->Html->image('logo.png', array("alt" => "Brownies")),
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
                                    <li id="menu-item-301" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-301">
                                        <?php echo $this->Html->link('aukcje', '/auctions'); ?>
                                    </li>
                                    <li id="menu-item-301" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-301">
                                        <?php echo $this->Html->link('galerie', '/galleries'); ?>
                                    </li>


                                    <li id="menu-item-181" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-181"><a href="#?page_id=180">About</a></li>
                                    <li id="menu-item-166" class="portfolio-menu-item menu-item menu-item-type-post_type menu-item-object-page menu-item-166"><a href="#?page_id=165">Portfolio</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-470" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-470"><a href="#?page_id=186">Folio 2 Column</a></li>
                                            <li id="menu-item-471" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-471"><a href="#?page_id=184">Folio 3 Column</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-256" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current-menu-parent current-page-parent current_page_parent current_page_ancestor menu-item-256"><a href="#?page_id=254">Shortcodes</a>
                                        <ul class="sub-menu">
                                            <li id="menu-item-716" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-716"><a href="#?page_id=704">Flip</a></li>
                                            <li id="menu-item-454" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-454"><a href="#?page_id=408">Sliders</a></li>
                                            <li id="menu-item-465" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-465"><a href="#?page_id=267">Icons</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-170" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-170"><a href="#?page_id=169">Blog</a></li>
                                    <li id="menu-item-264" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-264"><a href="#?page_id=263">Contact</a></li>
                                </ul>									<div class="clear"></div>
                            </nav>
                        </div><!-- /nav-collapse -->
                        <div class="pull-right">
                            <ul class="nav_social">
                                <li class="n_facebook"><a href="http://facebook/FDthemes" target="_blank"><i class="icon-facebook"></i></a></li> 										 <li class="n_twitter"><a href="https://twitter.com/#!/fd_themes" target="_blank"><i class="icon-twitter"></i></a></li> 																				 <li class="n_google"><a href="https://plus.google.com/u/0/b/118223521662447066750/118223521662447066750/posts" target="_blank"><i class="icon-google-plus"></i></a></li> 																				 <li class="n_rss"><a href="#?feed=rss2" target="_blank"><i class="icon-rss"></i></a></li>
                            </ul>
                        </div>

                    </div><!-- /container -->

                </div><!-- /navbar-inner -->
            </div><!-- /navbar -->

        </header>
        <hr class="cool_divider" />
        <div class="page_title">


            <div class="clearfix"></div>
        </div><!-- /page_title -->


        <div id="main" role="main" class="row">
            <section id="content" class="span9">

                    <?php  echo $this->Session->flash('bad'); ?>
                    <?php  echo $this->Session->flash('good'); ?>
                    <?php  echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>




    </section><!-- /content -->

    <aside id="sidebar" class="span2" >


        <div id="search-5" class="widget widget_search"><h4>Search<i class="icon-sort-down"></i></h4>					<form method="get" id="searchform" action="#">
            <input type="text" class="input-search" value="" name="s" id="s">
            <input type="submit" class="search-button" id="searchsubmit" value="Search">
        </form></div><div id="pages-5" class="widget widget_pages"><h4>Navigate<i class="icon-sort-down"></i></h4>		<ul>
        <li class="page_item page-item-466"><a href="#?page_id=466">Backgrounds</a></li>
        <li class="page_item page-item-300"><a href="#">Home</a></li>
        <li class="page_item page-item-165"><a href="#?page_id=165">Portfolio</a>
            <ul class='children'>
                <li class="page_item page-item-186"><a href="#?page_id=186">Folio 2 Column</a></li>
                <li class="page_item page-item-184"><a href="#?page_id=184">Folio 3 Column</a></li>
            </ul>
        </li>
        <li class="page_item page-item-180"><a href="#?page_id=180">About</a></li>
        <li class="page_item page-item-254 current_page_ancestor current_page_parent"><a href="#?page_id=254">Shortcodes</a>
            <ul class='children'>
                <li class="page_item page-item-269"><a href="#?page_id=269">Blockquotes</a></li>
                <li class="page_item page-item-276"><a href="#?page_id=276">Buttons</a></li>
                <li class="page_item page-item-277"><a href="#?page_id=277">Columns</a></li>
                <li class="page_item page-item-281"><a href="#?page_id=281">Dividers</a></li>
                <li class="page_item page-item-274"><a href="#?page_id=274">Dropcaps</a></li>
                <li class="page_item page-item-704"><a href="#?page_id=704">Flip</a></li>
            </ul>
        </li>
        <li class="page_item page-item-263"><a href="#?page_id=263">Contact</a></li>
    </ul>
    </div>

        <div class="clearfix bt"></div>
        <div class="clearfix"></div>
        <div id="sidebar_bottom"></div>

    </aside>
    <div class="clearfix"></div>

    <div class="clearfix"></div>

</div><!-- /main -->

<div class="clearfix"></div>

</div><!-- /container -->


<div class="footer_wrap">
    <footer id="footer" class="container">
        <div class="clear"></div>
        <div class="sub_footer_wrap">


            <div id="sidebar" class="sub_footer container">
                <div class="footerTop row">
                    <div class="span3">
                        <div id="text-10" class="widget widget_text">			<div class="textwidget"><h3 style="font-weight:  300;">Built for touch </h3>
                            <font class="fp_sc_div fp_wf_Source_Sans_Pro" style=" font-size: 14px !important; color: #444444 !important;">Flipit hasn't just been built to be 'fully' responsive, not only will the UI adapt to multiple devices, but the user experience adapts as well. We're calling it <strong>Responsive User Experience (RUX)</strong>; it's the future of the web. </font></div>
                        </div>									</div>

                    <div class="span3">
                        <div id="pages-3" class="widget widget_pages"><h4>Navigate</h4>		<ul>
                            <li class="page_item page-item-466"><a href="#?page_id=466">Backgrounds</a></li>
                            <li class="page_item page-item-300"><a href="#">Home</a></li>
                            <li class="page_item page-item-165"><a href="#?page_id=165">Portfolio</a>
                                <ul class='children'>
                                    <li class="page_item page-item-186"><a href="#?page_id=186">Folio 2 Column</a></li>
                                    <li class="page_item page-item-184"><a href="#?page_id=184">Folio 3 Column</a></li>
                                </ul>
                            </li>
                            <li class="page_item page-item-180"><a href="#?page_id=180">About</a></li>
                            <li class="page_item page-item-254 current_page_ancestor current_page_parent"><a href="#?page_id=254">Shortcodes</a>
                                <ul class='children'>
                                    <li class="page_item page-item-269"><a href="#?page_id=269">Blockquotes</a></li>
                                    <li class="page_item page-item-276"><a href="#?page_id=276">Buttons</a></li>
                                    <li class="page_item page-item-277"><a href="#?page_id=277">Columns</a></li>
                                    <li class="page_item page-item-281"><a href="#?page_id=281">Dividers</a></li>
                                    <li class="page_item page-item-274"><a href="#?page_id=274">Dropcaps</a></li>
                                    <li class="page_item page-item-704"><a href="#?page_id=704">Flip</a></li>
                                    <li class="page_item page-item-303"><a href="#?page_id=303">Google Maps</a></li>
                                    <li class="page_item page-item-267"><a href="#?page_id=267">Icons</a></li>
                                    <li class="page_item page-item-283"><a href="#?page_id=283">Lightboxes</a></li>
                                    <li class="page_item page-item-408"><a href="#?page_id=408">Sliders</a></li>
                                    <li class="page_item page-item-279 current_page_item"><a href="#?page_id=279">Stats</a></li>
                                    <li class="page_item page-item-272"><a href="#?page_id=272">Tabs &#038; Toggles</a></li>
                                    <li class="page_item page-item-282"><a href="#?page_id=282">Video</a></li>
                                </ul>
                            </li>
                            <li class="page_item page-item-169"><a href="#?page_id=169">Blog</a></li>
                            <li class="page_item page-item-263"><a href="#?page_id=263">Contact</a></li>
                        </ul>
                        </div>									</div>
                </div>
            </div><!-- /sub_footer -->
        </div><!-- /sub_footer_wrap -->
    </footer>



</div><!-- /wrap -->
<div class="container">
    <div class="row">
        <div class="span9">
            <div class="footer_left">
                <div class="logo">
                    <img src="http://flipit.fdthemes.com/corpit/wp-content/uploads/2012/08/logo1.png" alt="Flipit" />

                </div>
                <p>Copyright © 2012 <a href='http://flipit.fdthemes.com/corpit' title='Flipt'>AppEsque</a>. Crafted by <a href="http://fdthemes.com">FD Themes</a>.</p>
            </div>
        </div>
        <div class="span3">
            <div class="pull-right">
                <ul class="nav_social">
                    <li class="n_facebook"><a href="http://facebook/FDthemes" target="_blank"><i class="icon-facebook"></i></a></li> 													 <li class="n_twitter"><a href="https://twitter.com/#!/fd_themes" target="_blank"><i class="icon-twitter"></i></a></li> 																										 <li class="n_google"><a href="https://plus.google.com/u/0/b/118223521662447066750/118223521662447066750/posts" target="_blank"><i class="icon-google-plus"></i></a></li> 																										 <li class="n_rss"><a href="http://flipit.fdthemes.com/corpit/?feed=rss2" target="_blank"><i class="icon-rss"></i></a></li>
                </ul>
            </div>
        </div>


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
<!--<script type='text/javascript' src='http://flipit.fdthemes.com/corpit/wp-content/themes/flipit/js/jquery.flexslider-min.js?ver=1.0'></script>-->
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