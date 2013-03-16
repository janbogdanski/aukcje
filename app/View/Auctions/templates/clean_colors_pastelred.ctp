<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 * @var $this View
 * Creation date    15.03.13 19:06
 */
require_once dirname(__FILE__).'/clean_colors_base_css.ctp';
?>
<div  class="pastelred">
<div id="wrap">
    <!-- site header -->
    <header>
        <div class="container">
            <div class="row" id="site_header">
                <aside class="eight columns logo_env">
                    <span class="logo_txt"><?php echo $this->fetch('title'); ?></span>
                </aside>
<?php if ($this->fetch('allegro_id')): ?>

    <nav id="site_menu">
                    <ul class="main_menu">
                        <li class="active"><a href="http://www.allegro.pl/my_page.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="O mnie">O mnie</a></li>
                        <li><a href="http://www.allegro.pl/show_user.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Komentarze">Komentarze</a></li>
                        <li><a href="http://www.allegro.pl/show_user_auctions.php?uid=<?php echo $this->fetch('allegro_id'); ?>" title="Inne aukcje">Inne aukcje</a></li>
                        <li><a href="http://allegro.pl/myaccount/favourites/favourites_sellers.php/addNew/?userId=<?php echo $this->fetch('allegro_id'); ?>" title="Ulubione">Ulubione</a></li>
                    </ul>
                </nav>
                <?php endif; ?>

            </div>
        </div>
</div>
</header>
<!-- end: slider -->
<div class="container" id="content">
    <div class="row ">
        <div class="sixteen columns">
            <div class="row">
                <div class="four columns sidebar">
                    <?php if ($this->fetch('field_1_header') || $this->fetch('field_1_content')): ?>
                    <div class="sidebar_entry widget_categories ">
                        <h2 class="sidebar_title"><?php echo $this->fetch('field_1_header'); ?></h2>
                        <p><?php echo $this->fetch('field_1_content'); ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if ($this->fetch('field_2_header') || $this->fetch('field_2_content')): ?>
                    <div class="sidebar_entry widget_categories ">
                        <h2 class="sidebar_title"><?php echo $this->fetch('field_2_header'); ?></h2>
                        <p><?php echo $this->fetch('field_2_content'); ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if ($this->fetch('field_3_header') || $this->fetch('field_3_content')): ?>
                    <div class="sidebar_entry widget_categories ">
                        <h2 class="sidebar_title"><?php echo $this->fetch('field_3_header'); ?></h2>
                        <p><?php echo $this->fetch('field_3_content'); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="twelve columns" id="homepage_posts">
                    <?php echo $this->fetch('contents'); ?>
                    <div class="clear">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="expanded">
    <div class="footer_bottom">
        <div class="container">
            <p><?php echo $this->fetch('footer'); ?></p>
        </div>
    </div>
</footer>
</div>