<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    11.11.12 09:39
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CleanBegin - A bootstrap company theme</title>

    <?php if('index' == $this->view): /* kompilator - do wysylki */ ?>
    <style type="text/css">
            <?php echo $css; ?>
    </style>
    <?php elseif('view' == $this->view): /* tester ze skladnia less */ ?>
    <link href="/css/templates/3/style.less" rel="stylesheet/less" type="text/css">
    <script type="text/javascript" src="/js/less-1.3.1.min.js"></script>
    <?php endif; ?>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>

</head>

<body>


<div class="container all">



    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="header">
        <h1>Samsung Galaxy SIV</h1>
        <p>dodatkowy tekst</p>
    </div>

    <!-- Example text row -->
    <!--<div class="row">-->
    <div class="navbar">

        <div class="container">
            <div class="top"></div>
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href="#home" class="anchorLink">O nas</a></li>
                        <li><a href="#about" class="anchorLink">Nasze aukcje</a></li>
                        <li><a href="#portfolio" class="anchorLink">Opinie</a></li>
                        <li><a href="#contact" class="anchorLink">Dodaj do ulubionych</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--</div>-->

    </div>
    <div class="row ">
        <div class="span9 content">
            <div>
            <h2>Opis produktu</h2>
            <p>    Biała kurtka nieprzemakalna
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                In sit amet magna lectus, nec adipiscing enim.
                Vivamus quis ipsum non purus mattis viverra eu id justo.
                Suspendisse augue urna, bibendum ac commodo vel, ornare a nunc.
                Donec dui tortor, hendrerit at hendrerit sit amet, posuere non sem.
                Maecenas mauris urna, pulvinar eu condimentum in, facilisis eu diam.
                In eu mollis est. Etiam id eros ac dui mattis laoreet. Nullam non lorem turpis.
                In dolor ipsum, hendrerit a lobortis a, facilisis ut enim. </p>
            </div>
            <div>

            <h2>150 lat doświadczenia</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat,
                sagittis sit amet congue at, aliquam eu libero. Integer molestie,
                turpis vel ultrices facilisis, nisi mauris sollicitudin mauris,
                volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis.
                Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus.
                Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus,
                risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien.
                Sed pulvinar.</p>
        </div>

            <div>
                <div class="row-fluid thumb">
                    <div class="containetr">
                        <h1>Galeria</h1>

                        <img class="" src="http://placekitten.com/g/201/300">
                        <img class="" src="http://placekitten.com/g/203/300">
                        <img class="" src="http://placekitten.com/g/200/301">
                        <img class="" src="http://placekitten.com/g/200/302">
                        <img class="" src="http://placekitten.com/g/200/303">
                        <img class="" src="http://placekitten.com/g/200/304">
                    </div>
                </div>
            </div>


        </div>

            <div class="span3 pull-right sidebar">
            <div>
                    <h3>Kontakt</h3>

                    <p>123 432 432</p>

                    <p>mail@wp.pl</p>

                    <h3>Przesyłka</h3>
                    <p>Info dot. przesyłki</p>
                    <p>Info dot. przesyłki</p>
                    <p>Info dot. przesyłki</p>

                    <h3>Regulamin</h3>
                    <p >Nie chcesz kupić, nie licytuj..</p>
                    <p>Nie odwołuję ofert..</p>
                    <p>Nie wysyłam (za pobraniem)..</p>
            </div>
        </div>

    </div>




    <footer>
        <div class="row">
            <div class="span2">ertte</div>
            
        </div>
    </footer>

</div> <!-- /container -->

<!-- Javascript include and script -->

</body>
</html>