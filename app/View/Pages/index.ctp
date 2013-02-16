<div class="row-fluid">
    <!-- Place somewhere in the <body> of your page -->
    <!--<div class="flexslider">
        <ul class="slides">
            <li>
                <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_caramel.jpg" style="width: 400px;" />
            </li>
            <li>
                <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_donut.jpg" style="width: 400px;" />
            </li>
            <li>
                <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_caramel.jpg" style="width: 400px;" />
            </li>
        </ul>
    </div>-->

    <script type="text/javascript">
        $(document).ready(function(){

            $('.flexslider').flexslider({
                animation: "fade",
                directionNav: true
            });
        });
      	</script>
</div>
<div class="row-fluid">

    <div class="span4">
        <h3 style="text-align: center;">
            <span class="icon_holder_accLarge" style="background-color:#008FD5 ; margin: auto; ; -webkit-border-radius: 40px; -moz-border-radius: 40px; border-radius: 40px">
                <i class="icon-magic"></i>
            </span>
        </h3>
        <h3 style="text-align: center;">
            Kreator aukcji
        </h3>
        <p style="text-align: center;">
            Łączy w sobie wszystkie moduły serwisu, pozwala stworzyć atrakcyjny opis aukcji, intuicyjnie, bez znajomości jakiejkolwiek 'technologii' (html etc.) <br>
            Dodasz galerię zdjęć, mapę Google'a, sformatujesz tekst, wybierzesz szablon aukcji...
        </p>
    </div>
    <div class="span4">
        <h3 style="text-align: center;">
            <span class="icon_holder_accLarge" style="background-color:#008FD5 ; margin: auto; ; -webkit-border-radius: 40px; -moz-border-radius: 40px; border-radius: 40px">
                <i class="icon-table"></i>
            </span>
        </h3>
        <h3 style="text-align: center;">
            Galeria zdjęć
        </h3>
        <p style="text-align: center;">
            Integracja z Picasa Albums pozwala dodać publiczne zdjęcia do opisu aukcji jako<br>
            pojedyńcze zdjęcia lub<br>
            galerię zdjęć<br>
            To doskonały sposób na prezentację walorów przedmiotu bez opłat na rzecz Allegro
        </p>
    </div>
    <div class="span4">
        <h3 style="text-align: center;">
            <span class="icon_holder_accLarge" style="background-color:#008FD5 ; margin: auto; ; -webkit-border-radius: 40px; -moz-border-radius: 40px; border-radius: 40px">
                <i class="icon-underline"></i>
            </span>
        </h3>
        <h3 style="text-align: center;">
            Edytor treści aukcji
        </h3>
        <p style="text-align: center;">
            Opis aukcji stworzysz w przejrzystym i intuicyjnym edytorze - kreatorze aukcji, z analogicznymi możliwościami jak popularne edytory tekstu.
            Nasz edytor został wzbogacony o moduły wstawiania galerii zdjęć i pojedyńczych zdjęć, map Google, kodów QR.
            Masz możliwość edycji zawartości głównej aukcji (np. opis przedmiotu) boksów (np. dane kontaktowe, do przelewu, warunki aukcji, cokolwiek wymyślisz)
        </p>
    </div>

</div>
<div class="row-fluid">
    <div class="span4">
        <h3 style="text-align: center;">
            <span class="icon_holder_accLarge" style="background-color:#008FD5 ; margin: auto; ; -webkit-border-radius: 40px; -moz-border-radius: 40px; border-radius: 40px">
                <i class="icon-credit-card"></i>
            </span>
        </h3>
        <h3 style="text-align: center;">
            Szablony aukcji
        </h3>
        <p style="text-align: center;">
            Wyróżniająca się aukcja przyciąga kupujących, a estetyczny opis mówi im 'jestem rzetelnym sprzedającym, możesz mi zaufać'.
            Udostępniamy szereg darmowych i płatnych szablonów aukcji z podziałem zawartości na: nagłówek, treść główną, boksy (kontakt, dane przelewu etc.).
            Układ szablonów zbudowano w oparciu o badania użyteczności, z pewnością przyciągną uwagę kupujących!
        </p>
    </div>
    <div class="span4">
        <h3 style="text-align: center;">
            <span class="icon_holder_accLarge" style="background-color:#008FD5 ; margin: auto; ; -webkit-border-radius: 40px; -moz-border-radius: 40px; border-radius: 40px">
                <i class="icon-beaker"></i>
            </span>
        </h3>
        <h3 style="text-align: center;">
            Plany na dziś wieczór
        </h3>
        <p style="text-align: center;">
            Po przejęciu władzy nad światem udostępnimy:<br>
            panel aukcji<br>
            snajpera aukcyjnego<br>
            - <?php echo $this->Html->link('daj znać czego potrzebujesz!', array('plugin' => null, 'controller' => 'pages', 'action' => 'contact', 'admin' => false)); ?>


            <br>
        </p>
    </div>
    <div class="span4">
        <h3 style="text-align: center;">
            <span class="icon_holder_accLarge" style="background-color:#008FD5 ; margin: auto; ; -webkit-border-radius: 40px; -moz-border-radius: 40px; border-radius: 40px">
                <i class="icon-hand-right"></i>
            </span>
        </h3>
        <h3 style="text-align: center;">
            Wypróbuj..
        </h3>
        <p style="text-align: center;">
            Nawet bez zakładania konta! <br>
            Zakładając konto, możesz zapisać aukcje i galerie 'na później'<br>
            Założenie konta jak i korzystanie z serwisu jest DARMOWE.<br>
            Konto premium daje dostęp do dodatkowych szablonów, ale w pełni wystarczającą funkcjonalność mają oba typy kont.
        </p>
    </div>
</div>


<div class="row-fluid">
    <?php if (!empty($blogPosts)) : ?>

    <hr />
    <h3><?php echo __('Latest Blog posts'); ?></h3>
    <?php foreach ($blogPosts as $blogPost) : ?>

        <article<?php if ($blogPost['BlogPost']['sticky']) {echo ' class="sticky"';} ?>>

            <header class="clearfix">
                <h3>|| <?php echo $this->Html->link($blogPost['BlogPost']['title'], array( 'plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'view', 'slug' => $blogPost['BlogPost']['slug']), array('title' => $blogPost['BlogPost']['title'], 'rel' => 'bookmark')); ?></h3>
                <time pubdate datetime="<?php echo date('c', $createdTimestamp = strtotime($blogPost['BlogPost']['created'])); ?>">
                    <i class="icon-calendar"></i>&nbsp;<?php echo date($blogSettings['published_format_on_post_index'], $createdTimestamp); ?>
                </time>
                <?php if (strtolower($blogSettings['use_disqus']) == 'yes') : ?>
                <?php echo $this->Html->link(__('View comments'), $this->Blog->permalink($blogPost) . '#disqus_thread', array('data-disqus-identifier' => 'blog-post-' . $blogPost['BlogPost']['id'])); ?>
                <?php endif; ?>

            </header>

            <?php if (strtolower($blogSettings['use_summary_or_body_on_post_index']) == 'summary') : ?>
            <p class="summary"><?php echo $blogPost['BlogPost']['summary']; ?></p>
            <?php else : ?>
            <div class="post">
                <?php echo String::truncate(
                $blogPost['BlogPost']['body'],
                200,
                array(
                    'ellipsis' => '...',
                    'exact' => false
                )
            ); ?>
            </div>
            <?php endif; ?>
            <hr>
        </article>

        <?php endforeach; ?>

    <?php
    $paging = $this->Paginator->params();
    if ($paging['pageCount'] > 1) :
        ?>
        <nav id="paging">
            <?php
            $this->Paginator->options(array('url' => $this->Blog->getPaginatorOptions()));
            echo $this->Paginator->prev('« Newer posts', null, null, array('class' => 'disabled'));
            echo $this->Paginator->next('Older posts »', null, null, array('class' => 'disabled'));
            ?>
        </nav>
        <?php endif; ?>

    <?php else : ?>

    <p><?php echo __('Sorry, there are no blog posts.'); ?></p>

    <?php endif; ?>
</div>