<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.11.12 18:52
 * sodark3.tpl.php
 * @author Jan Bogdanski <janek.bogdanski@gmail.com>
 */
?>

<head>
    <style type="text/css">*{margin:0;padding:0}
    body{padding:0;color:#333;font:15px arial,tahoma,verdana,sans-serif}
    a,a:link,a:link,a:link,a:hover{background:transparent;text-decoration:underline;cursor:pointer}
    a:link{color:#c00}
    a:visited{color:#999}
    a:hover,a:active{color:#069}
    p,ul,ol{margin:0 0 1.5em}
    h1,h2,h3,h4,h5,h6{font-family:arial,verdana,sans-serif;color:#000;border-bottom:1px solid #eee}
    h1{font-size:196%;margin-top:.6em}
    h2{font-size:136%}
    h3{font-size:126%}
    h4{font-size:116%}
    h5{font-size:106%}
    h6{font-size:96%}
    img{border:0}
    hr{margin:1em 0;background:#f2f2f2;height:1px;color:#f2f2f2;border:0;clear:both}
    .clear{clear:both;position:relative;font-size:0;height:0}
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
        /**/#wrap{min-width:770px;max-width:1100px;margin:0 auto}
    #content-wrap{font-size:18px}
    #utility{float:left;border-top:1px dotted silver;border-right:1px dotted silver;width:225px;margin:0;padding:0}
    #utility h3{padding:10px;margin:0;color:red}
    #content{width:800px;float:right;margin:0 40px 0 0;padding:0}
    #nav-secondary,#nav-secondary li{list-style:none;margin:0;padding:0;background:#fff}
    #nav-secondary{padding-top:0;margin-top:1px}
    #nav-secondary a{padding:5px 0 5px 23px;font-weight:bold;font-size:15px;color:#000;display:block}
    #nav-secondary a,#nav-secondary a:link,#nav-secondary a:visited,#nav-secondary a:hover,#nav-secondary a:active{text-decoration:none;cursor:pointer}
    #nav-secondary a:hover{color:#c00;background:#fee}
    #nav-secondary li{border-bottom:1px dotted #dcdcdc;color:#666;margin:12px}
    #foter{clear:both;font-family:Comic Sans,Comic Sans MS,cursive;border-top:2px solid #e3e8ee;padding:10px 100px 30px;color:#666}
    #foter p{margin:0;font-size:13px}
    #foter a:link,#foter a:visited{text-decoration:none;border-bottom:1px solid #069;color:#069}
    #foter a:hover,#foter a:active{color:#600;border-bottom:2px dashed #600}</style>
</head>
<body>
<div id="wrap">
    <div id="header">
        <div id="site-name"><?php echo $this->fetch('title'); ?>
        </div>
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
        </div>
        <div id="utility">

            <?php if ($this->fetch('field_1_header') || $this->fetch('field_1_content')): ?>
                <h3><?php echo $this->fetch('field_1_header'); ?></h3>
                <p><?php echo $this->fetch('field_1_content'); ?></p>
            <?php endif; ?>

            <?php if ($this->fetch('field_2_header') || $this->fetch('field_2_content')): ?>
                <h3><?php echo $this->fetch('field_2_header'); ?></h3>
                <p><?php echo $this->fetch('field_2_content'); ?></p>
            <?php endif; ?>

            <?php if ($this->fetch('field_3_header') || $this->fetch('field_3_content')): ?>
                <h3><?php echo $this->fetch('field_3_header'); ?></h3>
                <p><?php echo $this->fetch('field_3_content'); ?></p>
            <?php endif; ?>

            <?php if ($this->fetch('field_4_header') || $this->fetch('field_4_content')): ?>
                <h3><?php echo $this->fetch('field_4_header'); ?></h3>
                <p><?php echo $this->fetch('field_4_content'); ?></p>
            <?php endif; ?>
        </div>
        <div id="foter">
            <?php //todo footer ?>

            <p>{{ footer }}</p>
        </div>
    </div>
</div>
</div>
</body>
</html>