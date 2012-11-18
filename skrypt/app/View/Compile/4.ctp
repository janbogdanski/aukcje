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
    <link href="/css/templates/4/style.less" rel="stylesheet/less" type="text/css">
    <script type="text/javascript" src="/js/less-1.3.1.min.js"></script>
    <?php endif; ?>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>

</head>



<body>


    <header>
        <div class="navbar navbar-top">
            <div class="navbar-inner">
                    <div id="navi" class="nav-collapse container">
                        <ul class=" pull-right nav">
                            <li><a href="#home" class="anchorLink">O nas</a></li>
                            <li><a href="#about" class="anchorLink">Nasze aukcje</a></li>
                            <li><a href="#portfolio" class="anchorLink">Opinie</a></li>
                            <li><a href="#contact" class="anchorLink">Dodaj do ulubionych</a></li>
                        </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container main">
        <div id="content" class="">
            <div class="header">
                <img src="/common/images/headers/001.jpg" alt="">

            </div>
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

            <div class="thumb">
                    <h1>Galeria</h1>

                    <img class="" src="http://placekitten.com/g/201/300">
                    <img class="" src="http://placekitten.com/g/203/300">
                    <img class="" src="http://placekitten.com/g/200/301">
                    <img class="" src="http://placekitten.com/g/200/302">
                    <img class="" src="http://placekitten.com/g/200/303">
                    <img class="" src="http://placekitten.com/g/200/304">
            </div>
            <div class="row foot">
                <hr>
                <h2>{ INFO }</h2>
                <div class="span3">
                    <h3>Kontakt</h3>

                    <p>123 432 432</p>

                    <p>mail@wp.pl</p>
                </div>

                <div class="span3">
                    <h3>Przesyłka</h3>
                    <p>Info dot. przesyłki</p>
                    <p>Info dot. przesyłki</p>
                    <p>Info dot. przesyłki</p>
                </div>

                <div class="span3">
                    <h3>Regulamin</h3>
                    <p >Nie chcesz kupić, nie licytuj licytujlicytuj..</p>
                    <p>Nie odwołuję ofert..</p>
                    <p>Nie wysyłam (za pobraniem)..</p>
                </div>
            </div>
        </div>
      

    </div>
    

<div id="footer" class="row">	            <!--Footer start-->
    <div id="footer_content">
        <div id="logo_container">
            <img src="Images/HavanasLogoNeg.png" alt="Havanas" />
        </div>
        <div class="footercont">
            <h2>Content</h2>
            <ul>
                <li><a class="bot" href="index.html">Home</a></li>
                <li><a class="bot" href="services.html">Services</a></li>
                <li><a class="bot" href="showcase.html">Work showcase</a></li>
                <li><a class="bot" href="about.html">About</a></li>
                <li><a class="bot" href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="footercont">
            <h2>Contact</h2>
            <ul>
                <li>Havanas �&#65533; Graphic design <br />for print & webb</li>
                <li>Åsögatan 115, <br />
                    6th floor (Stalands building)</li>
                <li>S-116 24 Stockholm</li>
                <li>Sweden</li>
            </ul>
        </div>
    </div>

</div>	            <!--Footer end-->

</body>
</html>