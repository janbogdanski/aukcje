<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.11.12 18:52
 * @var $this View 
 */

//{{#
/**
 * sodark3.tpl.php
 * @author Jan Bogdanski <janek.bogdanski@gmail.com>
 * @package Proaukcje Kreator Aukcji
 *
 * Creation date 03.02.12 08:31
 */
#}}
#}}
?>

<head>
    <style type="text/css">*{margin:0;padding:0}
    body{padding:0 0 20px;background:#fff url("images/body_bg.gif") repeat-x 0 100%;color:#333;font:18px arial,tahoma,verdana,sans-serif}
    a:link{color:#c00}
    a:visited{color:#999}
    a:hover,a:active{color:#069}
    p,ul,ol{margin:0 0 1.5em}
    h1,h2,h3,h4,h5,h6{letter-spacing:-.001em;font-family:arial,verdana,sans-serif;margin:1.2em 0 .3em;color:#000;border-bottom:1px solid #eee;padding-bottom:.1em}
    h1{font-size:196%;margin-top:.6em}
    h2{font-size:136%}
    h3{font-size:126%}
    h4{font-size:116%}
    h5{font-size:106%}
    h6{font-size:96%}
    img{border:0}
    hr{margin:1em 0;background:#ccc;height:1px;color:#f2f2f2;border:0;clear:both}
    .clear{clear:both;position:relative;font-size:0;height:0;line-height:0}
    #header{background:#666 url("images/sprites.gif") repeat-x 0 100%;margin:0 0 25px;padding:0 0 8px}
    #header #site-name{font:265% arial;letter-spacing:-.05em;margin:0 0 0 40px;padding:3px 0;color:#ccc;border:0}
    #nav,#nav ul{padding:0;margin:0;list-style:none}
    #nav{font-weight:bold;height:2.09em;font:bold 96% arial;margin:0 105px 0 40px}
    #nav li{position:relative;background:#999;float:left;width:10em;display:block;margin:0;border-bottom:3px solid #666;border-right:3px solid #252525;padding:0}
    #nav a,#nav a:link,#nav a:visited,#nav a:hover,#nav a:active{text-decoration:none;cursor:pointer;color:#fff;display:block;padding:4px 10px 2px}
    #nav a:hover{color:#000}
    #nav li:hover ul,#nav li.sfhover ul{left:0;z-index:99999}
    #nav li.active{background:#c00;border-bottom:3px solid #c00}
    #nav li.active a:hover{color:#000}
        /*\*/#nav li{width:auto}
        /**/#poweredby{color:#fff;width:96px;height:63px;position:absolute;top:-102px;right:0}
    #wrap{min-width:770px;max-width:1200px;margin:0 auto;position:relative}
    #content-wrap{position:relative;width:100%}
    #content{margin:0 50px}
    .featurebox{color:#333;padding:15px 10px 20px 10px;border:1px solid #d7d7d7;margin:0 5px 10px;background:#f6f6f6 url("images/featurebox_bg.gif") no-repeat 100% 100%;min-width:15px;max-width:200px;float:left;font-size:17px}
    .featurebox p,.featurebox h1,.featurebox h2,.featurebox h3,.featurebox h4,.featurebox h5,.featurebox h6{margin:0 0 .3em;border-bottom:1px solid #c00;color:#c00}
    .featurebox p{border:0;margin:0 0 1em;color:#444}
    .featurebox a{font-weight:bold}
    .featurebox ul li{list-style:none;margin:0;padding-top:15px}
    #foter{clear:both;font-family:Comic Sans,Comic Sans MS,cursive;font-size:19px;letter-spacing:.025em;border-top:2px solid #e3e8ee;padding:10px 100px 30px;color:#666}
    #foter p{margin:0}
    #foter a:link{text-decoration:none;border-bottom:1px solid #069;color:#069}
    #foter a:hover,#foter a:active{color:#600;border-bottom:2px dotted #600}</style>
</head>
<body>
<div id="wrap">
    <div id="header">
        <div id="site-name"><?php echo $this->fetch('title'); ?></div>
        <?php if ($this->fetch('allegro_id')): ?>
        <ul id="nav">
            <li class="active"><a href="http://www.allegro.pl/my_page.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="O mnie">O mnie</a></li>
            <li><a href="http://www.allegro.pl/show_user.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Komentarze">Komentarze</a></li>
            <li><a href="http://www.allegro.pl/show_user_auctions.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Inne aukcje">Inne aukcje</a></li>
            <li><a href="http://allegro.pl/myaccount/favourites/favourites_sellers.php/addNew/?userId=<?php echo $this->fetch('allegro_id'); ?>" title="Ulubione">Ulubione</a></li>
        </ul>
        <?php endif; ?>
    </div>
    <div id="content-wrap">
        <div id="content">
            <?php echo $this->fetch('contents'); ?>
            <hr />

            <?php if ($this->fetch('field_1_header') || $this->fetch('field_1_content')): ?>
            <div class="featurebox">

                <h3><?php echo $this->fetch('field_1_header'); ?></h3>
                <p><?php echo $this->fetch('field_1_content'); ?></p>

            </div>
            <?php endif; ?>

            <?php if ($this->fetch('field_2_header') || $this->fetch('field_2_content')): ?>
            <div class="featurebox">

                <h3><?php echo $this->fetch('field_2_header'); ?></h3>
                <p><?php echo $this->fetch('field_2_content'); ?></p>

            </div>
            <?php endif; ?>

            <?php if ($this->fetch('field_3_header') || $this->fetch('field_3_content')): ?>
            <div class="featurebox">

                <h3><?php echo $this->fetch('field_3_header'); ?></h3>
                <p><?php echo $this->fetch('field_3_content'); ?></p>

            </div>
            <?php endif; ?>

            <?php if ($this->fetch('field_4_header') || $this->fetch('field_4_content')): ?>
            <div class="featurebox">

                <h3><?php echo $this->fetch('field_4_header'); ?></h3>
                <p><?php echo $this->fetch('field_4_content'); ?></p>

            </div>
            <?php endif; ?>
            <div id="foter">
                <p>{{ footer }}</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>