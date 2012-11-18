<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    11.11.12 09:39
 */

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Portfolio Igniter</title>
    <?php if('index' == $this->view): /* kompilator - do wysylki */ ?>
        <style type="text/css">
            <?php echo $css; ?>
        </style>
    <?php elseif('view' == $this->view): /* tester ze skladnia less */ ?>
        <link href="/css/templates/2/style.less" rel="stylesheet/less" type="text/css">
        <script type="text/javascript" src="/js/less-1.3.1.min.js"></script>
    <?php endif; ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
</head>


<body data-spy="scroll" data-offset="10" id="page">
<header>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                <div class="nav-collapse">
                    <ul id="navi" class="nav">
                        <li><a href="#home" class="anchorLink">O nas</a></li>
                        <li><a href="#about" class="anchorLink">Nasze aukcje</a></li>
                        <li><a href="#portfolio" class="anchorLink">Opinie</a></li>
                        <li><a href="#contact" class="anchorLink">Dodaj do ulubionych</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="home">
    <div class="story">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                </div>
                <div class="span9">
                    <h1>Witaj na aukcji!</h1>
                    <h2>Opis produktu</h2>

                    <p class="intro">
                        Biała kurtka nieprzemakalna
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        In sit amet magna lectus, nec adipiscing enim.
                        Vivamus quis ipsum non purus mattis viverra eu id justo.
                        Suspendisse augue urna, bibendum ac commodo vel, ornare a nunc.
                        Donec dui tortor, hendrerit at hendrerit sit amet, posuere non sem.
                        Maecenas mauris urna, pulvinar eu condimentum in, facilisis eu diam.
                        In eu mollis est. Etiam id eros ac dui mattis laoreet. Nullam non lorem turpis.
                        In dolor ipsum, hendrerit a lobortis a, facilisis ut enim.
                    </p>
                    <!--/span-->
                    <!--/row-->
                </div>
                <!--/span-->
            </div>
            <!--/row-->
        </div>
    </div>
    <!--.story-->
</div>
<!--#intro-->

<!--#second-->
<div id="second">
    <div class="container-fluid">
        <div class="story">
            <div class="row-fluid">
                <h1>o NAS</h1>
                <h3>150 lat doświadczenia</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat,
                    sagittis sit amet congue at, aliquam eu libero. Integer molestie,
                    turpis vel ultrices facilisis, nisi mauris sollicitudin mauris,
                    volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis.
                    Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus.
                    Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus,
                    risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien.
                    Sed pulvinar.</p>

                <p><a href="#">asd</a></p>
            </div>
        </div><!--.story-->
    </div>
</div>
<!--#second-->

<!--#third-->

<div id="third">


    <div class="container-fluid">
        <div class="story">

            <div class="row-fluid thumb">
                <div class="containetr">
                    <h1>Galeria</h1>

                <img class="" src="http://placehold.it/500x100">
                <img class="" src="http://placehold.it/30x200">
                <img class="" src="http://placehold.it/500x200">
                <img class="" src="http://placehold.it/500x20">
                <img class="" src="http://placehold.it/500x90">
                <img class="" src="http://placehold.it/500x200">
            </div>
            </div>
        </div><!--.story-->
    </div>
</div>
<!--#third-->

<!--#fourth-->
<div id="fourth">
    <div class="container-fluid">
        <div class="row-fluid">
            <h1>{ INFO }</h1>
            <div class="span3">
                <h3>Kontakt</h3>

                <p>123 432 432</p>

                <p>mail@wp.pl</p>
            </div>

            <div class="span4">
                <h3>Przesyłka</h3>
                <p>Info dot. przesyłki</p>
                <p>Info dot. przesyłki</p>
                <p>Info dot. przesyłki</p>
            </div>

            <div class="span4">
                <h3>Regulamin</h3>
                <p >Nie chcesz kupić, nie licytuj licytujlicytuj..</p>
                <p>Nie odwołuję ofert..</p>
                <p>Nie wysyłam (za pobraniem)..</p>
            </div>
        </div>
    </div>
</div>
<!--#fourth-->

<!--#fifth-->
<footer class="footer">
    <div class="row">
        dssdsd
    </div>
</footer>
</body>
</html>