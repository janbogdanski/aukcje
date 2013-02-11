<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.11.12 18:52
 * dodgerblue
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 */

?>

    <style type="text/css">
        <!--

        * {
            margin-top: 0;
            padding: 0;
        }
        body {
            background: #FFFFFF;
            font: normal "Trebuchet MS", Arial, Helvetica, sans-serif;
            color: #666666;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            color: #586BAA;
        }

        p {
            margin: 0px;
            padding: 0px;
        }
        a {
            color: #586BAA;
        }

        a:hover {
            text-decoration: none;
        }
        img {
            border: none;
        }
        .boxed {
            margin-bottom: 10px;
        }
        .boxed .title {
            margin: 0 30px 0 0;
            padding: 9px 0 0 40px;
            background: #ffff99;
            font-size: 20px;
            color: #ff3333;
            font-weight: bold;
            border-bottom: 5px solid yellow;
        }
        .boxed ul {
            margin: 0;
            list-style: none;
        }

        .boxed h3 {
            margin: 0;
            font: bold x-small Verdana, Arial, Helvetica, sans-serif;
        }

        .boxed p {
            margin-bottom: 10px;
        }
        .boxed .content {
            padding: 10px 10px 10px 10px;
        }
        .post h2 {
            padding: 5px 0 0 20px;
            margin: 0;
            font-size: 30px;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-weight: normal;
            border-bottom: 2px solid #586BAA;
        }
        .story {
            margin: 0;
            padding: 20px 20px 10px 20px;
            background: #EBF4f9;
            border: 1px dotted silver;
        }
        .story p, .story blockquote, .story ul, .story ol {
            margin-bottom: 10px;
        }
        #header {
            width: 740px;
            height: 150px;
        }
            /* Menu */

        #menu {
            width: 720px;
            height: 70px;
            margin: 0 auto;
            /* border-bottom: 1px solid #99ccff; zle wyswietlane w ie*/
        }
            /* border-bottom: 1px solid #99ccff; ZLE WYSWIETLANE W IE*/
        #menu ul {
            padding-top: 0px;
            padding-left: 25px;
            list-style: none;
            font-variant: small-caps;
        }

        #menu li {
            display: inline;
        }

        #menu a {
            display: block;
            float: left;
            height: 32px;
            padding: 13px 25px 0 25px;
            background: #FFFFFF;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            color: #586BAA;
        }
        #menu a:hover {
            border-color: #FEDA8D;
            color: #CC0000;
        }

        #menu .active a {
            height: 36px;
            margin-top: 0px;
            border: 1px solid #479AC6;
            border-bottom: none;
            font-weight: bold;
            color: #479AC6;
        }

        #wrap {
        }

        #content {
            width: 1040px;
        }
        #main {
            float: right;
            width: 725px;
        }

        #main a {
        }
        #sidebar {
            float: left;
            margin: 0;
            padding: 0;
            width: 300px;
        }

        #sidebar a {

        }



        #sidebar ul li, ul li ul li {
            font-size: 0.88em;
            padding-top: 10px;
        }

        .podlista {
            font-size: 20px;
        }

        #foter > div {
            border-top: 2px solid #586BAA;
        }

        #foter {
            clear: both;
            width: 740px;
            padding: 30px 0 0 130px;
        }

        #foter p {
            border-top: 3px solid #1E90FF;
            margin: 0 0px 30px 0;
            text-align: center;
            font-size: x-small;
        }
        -->
    </style>

<table align="center">
    <tr>
        <td>

            <div id="wrap">
                <?php if ($this->fetch('allegro_id')): ?>

                <div id="menu">
                    <ul>
                        <li class="active"><a href="http://www.allegro.pl/my_page.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="O mnie">O mnie</a></li>
                        <li class="active"><a href="http://www.allegro.pl/show_user.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Komentarze">Komentarze</a></li>
                        <li class="active"><a href="http://www.allegro.pl/show_user_auctions.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Inne aukcje">Inne aukcje</a></li>
                        <li class="active"><a href="http://allegro.pl/myaccount/favourites/favourites_sellers.php/addNew/?userId=<?php echo $this->fetch('allegro_id'); ?>" title="Ulubione">Ulubione</a></li>
                    </ul>
                </div>
                <?php endif; ?>


                <div id="content">

                    <div id="sidebar">
                        <!-- KONTAKT -->

                        <!-- /WYSYĹKA -->


                        <?php if ($this->fetch('field_1_header') || $this->fetch('field_1_content')): ?>
                        <div class="boxed">
                            <h2 class="title"><?php echo $this->fetch('field_1_header'); ?></h2>
                            <div class="content">
                                <p><?php echo $this->fetch('field_1_content'); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->fetch('field_2_header') || $this->fetch('field_2_content')): ?>
                        <div class="boxed">
                            <h2 class="title"><?php echo $this->fetch('field_2_header'); ?></h2>
                            <div class="content">
                                <p><?php echo $this->fetch('field_2_content'); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->fetch('field_3_header') || $this->fetch('field_3_content')): ?>
                        <div class="boxed">
                            <h2 class="title"><?php echo $this->fetch('field_3_header'); ?></h2>
                            <div class="content">
                                <p><?php echo $this->fetch('field_3_content'); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->fetch('field_4_header') || $this->fetch('field_4_content')): ?>
                        <div class="boxed">
                            <h2 class="title"><?php echo $this->fetch('field_4_header'); ?></h2>
                            <div class="content">
                                <p><?php echo $this->fetch('field_4_content'); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div id="main">
                        <div class="post">
                            <h2><?php echo $this->fetch('title'); ?></h2>

                            <div class="story">
                                <?php echo $this->fetch('contents'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="foter">
                    <div>
                        <p>
                            <?php echo $this->fetch('footer'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
