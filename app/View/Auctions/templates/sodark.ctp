<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.11.12 18:52
 * sodark2.tpl.php
 *
 */


?>
<style type="text/css">body {
    text-align:center;
    padding: 20px 0;
    background: #222;
    color:#333;
    font:83%/1.5 arial,tahoma,verdana,sans-serif
}
img {
        border:none;
}
hr {
        margin: 1em 0;
    background:#eee;
    height:1px;
    color:#eee;
    border:none;
    clear:both
}    /* LINKS */

a,a:link,a:link,a:link,a:hover {
    font-weight:bold;
    background:transparent;
    text-decoration:underline;
    cursor:pointer
}
a:link {color:#c00}
        a:visited {color:#999}
            a:hover,a:active {color:#069}
                /* LISTS */

ul {margin: 0}
li {margin-left:0em}
#wrap {
    border: 1px solid #fff;
    position:relative;
    background:#fff;
    width:800px;
    margin: 0 auto;text-align:left;
    font-size:20px;
}
#header {
    background: #666;
    margin: 0 0 25px;
    padding: 0 0 8px;
    border-bottom:4px solid red;}
#header h1 {
    color:#fff;
    font-size: 145%;
    padding:20px 20px 12px;

}

#navi{
    list-style:none;
    float:right;
    margin:0;
    padding:0;
    border:none;
    position:absolute;
    top:50px;
    right:20px;

}

#navi li{
    margin-right:10px;
    display:inline;
    border-bottom:1px dotted silver;

}

#navi li:hover{    border-bottom:1px solid #f2f2f2;

    }

#navi li a{
    text-decoration:none;
    font-weight:normal;
    color: lightgrey;

}

#navi li a:hover{
    color:#f2f2f2;

}

#content {
    padding: 0 20px 10px;
    margin-bottom:20px;
    border-bottom:2px dashed red;
}.info{
     font-size:17px;
     float:left;
     padding-top:8px;
     padding-left:2px;
     margin:0 2px 22px;
     width:190px;
     border:1px solid silver;

 }

.info p{
    margin:5px 5px;
    padding-top:10px;

}

.info span{
    border-bottom:1px solid silver;
    font-variant: small-caps;
    font-weight: bold;
    font-size:18px;
    color:red;
    padding-left:20px;
    padding-right:20px;
    padding-bottom:5px;}

.info a{
    text-decoration:none;
    border-bottom:1px dotted red;

}

.info ul{    list-style:none;
    padding:0;
}

.info ul li{
    padding-top:10px;

}

.info ul li:first-letter{
    font-weight:bold;

}

.info img

{
    display:inline;
    border:none;

}
    /* TYPOGRAPHY */

p, ul, ol {
    margin: 0 0 1em

}
h1, h2, h3, h4, h5, h6 {
    letter-spacing: -1px;
    font-family: arial,verdana,sans-serif;
    margin: 1.2em 0 .3em;color:#000;
    border-bottom: 1px solid #eee;
    padding-bottom: .1em

}
h1 {font-size: 196%;
    margin-top:0;
    border:none

}

h2 {font-size: 136%}

h3 {font-size: 126%}

h4 {font-size: 116%}

h5 {font-size: 106%}

h6 {font-size: 96%}

#foter{
    clear:both;
    color:#fff;
    background: #666;
    margin:0;
    padding:10px;
    border-top:2px solid red;
    font-family:Comic Sans, Comic Sans MS, cursive;
    font-size:19px;
    letter-spacing:0.025em;
}

#foter a:link,#foter a:visited{
    text-decoration:none;
    border-bottom:2px solid #f6ff00;
    color:#f6ff00;

}
#foter a:hover{
    color:#660000;
    border-bottom:1px solid #660000;

}
</style>

<table align="center"><tr><td>
    <div id="wrap">
        <div id="header">
            <h1><?php echo $this->fetch('title'); ?></h1>
            <?php if ($this->fetch('allegro_id')): ?>
            <ul id="navi">
                <li><a href="http://www.allegro.pl/my_page.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="O mnie">O mnie</a></li>
                <li><a href="http://www.allegro.pl/show_user.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Komentarze">Komentarze</a></li>
                <li><a href="http://www.allegro.pl/show_user_auctions.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Inne aukcje">Inne aukcje</a></li>
                <li><a href="http://allegro.pl/myaccount/favourites/favourites_sellers.php/addNew/?userId=<?php echo $this->fetch('allegro_id'); ?>" title="Ulubione">Ulubione</a></li>
                </ul>
            <?php endif; ?>

        </div>

        <div id="content">
            <?php echo $this->fetch('contents'); ?>
        </div>

<!-- KONTAKT -->

        <?php if ($this->fetch('field_1_header') || $this->fetch('field_1_content')): ?>
        <div class="info">

            <h3><?php echo $this->fetch('field_1_header'); ?></h3>
            <p><?php echo $this->fetch('field_1_content'); ?></p>

        </div>
        <?php endif; ?>
        <?php if ($this->fetch('field_2_header') || $this->fetch('field_2_content')): ?>
        <div class="info">

            <h3><?php echo $this->fetch('field_2_header'); ?></h3>
            <p><?php echo $this->fetch('field_2_content'); ?></p>

        </div>
        <?php endif; ?>

        <?php if ($this->fetch('field_3_header') || $this->fetch('field_3_content')): ?>
        <div class="info">

            <h3><?php echo $this->fetch('field_3_header'); ?></h3>
            <p><?php echo $this->fetch('field_3_content'); ?></p>

        </div>
        <?php endif; ?>

        <?php if ($this->fetch('field_4_header') || $this->fetch('field_4_content')): ?>
        <div class="info">

            <h3><?php echo $this->fetch('field_4_header'); ?></h3>
            <p><?php echo $this->fetch('field_4_content'); ?></p>

        </div>
        <?php endif; ?>


<!-- /Dodatkowe info -->
<div id="foter">
   <?php echo $this->fetch('footer'); ?>
</div>
</div>

</td></tr></table>
