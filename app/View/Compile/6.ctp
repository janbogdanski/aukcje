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
    <link href="/css/templates/6/style.less" rel="stylesheet/less" type="text/css">
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
            </div>
        </div>
    </header>

    <div class="row container main ">
        <div class="row links">
            <div class="span4"><img src="http://concentric-studio.com/images/logo.gif" alt="">
            </div>
           
                        <ul class=" pull-right ">
                            <li><a href="#home" class="anchorLink">O nas</a></li>
                            <li><a href="#about" class="anchorLink">Nasze aukcje</a></li>
                            <li><a href="#portfolio" class="anchorLink">Opinie</a></li>
                            <li><a href="#contact" class="anchorLink">Dodaj do ulubionych</a></li>
                        </ul>
              
        </div>
        <div id="content" class="span9 pull-right">
<!--            <div class="header">-->
<!--                <img src="/common/images/headers/shoes-grey.jpg" alt="">-->
<!---->
<!--            </div>-->
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
<!--            <div class="header">-->
<!--                <img src="/common/images/headers/shoes-grey.jpg" alt="">-->
<!---->
<!--            </div>-->
        </div>

        <div class="nav-holder">
            <div class="nav-frame">
                <div id="nav">
                <h3>{ INFO }</h3>

                
                    <h4>Kontakt</h4>

                    <p>123 432 432</p>

                    <p>mail@wp.pl</p>

                    <h4>Przesyłka</h4>
                    <p>Info dot. przesyłki</p>
                    <p>Info dot. przesyłki</p>
                    <p>Info dot. przesyłki</p>
                    <ul>
                        <li>123 jls;lfgj sldjg ;sldgjs;lg j</li>
                        <li>ffffffffffff asd asd f</li>
                        <li>asd dfasd </li>
                        <li> asdf asf </li>
                    </ul>

                    
                    <h4>Regulamin</h4>
                    <p >Nie chcesz kupić, nie licytuj licytujlicytuj..</p>
                    <p>Nie odwołuję ofert..</p>
                    <p>Nie wysyłam (za pobraniem)..</p>
                </div>
                
        </div>
        
        <div id="sidebar" class=" span2 ">
                
        </div>
      

    </div>
        </div>
    
</body>
</html>