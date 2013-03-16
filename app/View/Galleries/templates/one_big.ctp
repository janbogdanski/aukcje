<?php
/**
 * @var $this View

 * dostepne
 *  [title]
 * [type]
 * [id]
 * [backgroundColor]
 * [headerColor]
 * [borderColor]
 * [size]
 * [showBorder]
 * [showShadow]
 * [GalleriesDetails][image]
 */

$width = $gallery['Gallery']['size'];
//if(isset($gallery['action'])){
//    if('previewGallery' == $gallery['action']){

        //pobrane jako wyslany formularz (tworzenie galerii)
//        $big = $gallery['GalleriesDetails']['image'][0];

//    } else{

        //to pobrane jako has many - wstawianie galerii
//        $big = $gallery['Gallery']['GalleriesDetails'][0]['image'];
//    }
//} else{

    //to pobrane jako has many - wstawianie galerii
    $big = $gallery['GalleriesDetails'][0]['image'];
//}
//print_r($gallery);
//die();

?>
<style type="text/css">
    .foot {
        color:<?php echo $gallery['Gallery']['headerColor']; ?>;
    }

    .allborder {
        position:relative;
        font-size:13px;
        text-align:center;
        margin:auto;
        padding:9px;
    }

    .insideborder {
      <?php if($gallery['Gallery']['showBorder']): ?>
        border:1px solid <?php echo $gallery['Gallery']['borderColor']; ?>;
      <?php endif; ?>
        padding:5px 5px 15px;
        background: <?php echo $gallery['Gallery']['backgroundColor']; ?>;

    }

    #table<?php echo $gallery['Gallery']['id']; ?> img {
        <?php if($gallery['Gallery']['showBorder']): ?>
        border:1px solid <?php echo $gallery['Gallery']['borderColor']; ?>;
        <?php endif; ?>
        margin:5px;
        padding:1px;
    }

    #table<?php echo $gallery['Gallery']['id']; ?> img.noborder {
        border:none;
    }

    #table<?php echo $gallery['Gallery']['id']; ?> a.noborder:hover img {
        border:none;
        padding:1px;
    }

    #table<?php echo $gallery['Gallery']['id']; ?> {
        width:730px;
        padding:0;
    }

    #table<?php echo $gallery['Gallery']['id']; ?> td {
        border:0;
        border-spacing:0;
        vertical-align:middle;
        padding:0;
    }

    #table<?php echo $gallery['Gallery']['id']; ?> a {
        text-decoration:none;
    }

    #table<?php echo $gallery['Gallery']['id']; ?> a:hover img {
        text-decoration:none;
        border:2px solid #000;
        padding:0;
    }

    #fotolink {
    <?php if($gallery['Gallery']['showBorder']): ?>
        border-bottom:1px solid <?php echo $gallery['Gallery']['borderColor']; ?>;
        <?php endif; ?>
        margin:0 5px 5px;
        padding:2px 8px 5px;
    }

    #fotolink a {
        font-size:12px;
        border:0;
        color:<?php echo $gallery['Gallery']['headerColor']; ?>;
        font-family:Arial serif;
        text-decoration:none;
        margin:0;
    }

    #fotolink a:hover {
        border:0;
        text-decoration:underline;
        margin:0;
    }


    .big {
        width:300px;
        height:225px;
        margin-bottom:10px;
        margin-left:auto;
        margin-right:auto;
    }



    #table<?php echo $gallery['Gallery']['id']; ?> a.widthshadow img,#table<?php echo $gallery['Gallery']['id']; ?> a.widthshadowmiddle img {

    <?php if($gallery['Gallery']['showShadow']): ?>
        -moz-box-shadow:2px 2px 7px #7D7D7D;
        -webkit-box-shadow:2px 24px 7px #7D7D7D;
        box-shadow:2px 2px 7px #7D7D7D;
        <?php endif; ?>


    }

    #table<?php echo $gallery['Gallery']['id']; ?> a.widthshadow:hover img,#table<?php echo $gallery['Gallery']['id']; ?> a.widthshadowmiddle:hover img {
        background-position:0 -256px;
    }

    .imglist{
        position: relative;
    }

</style>
<div id='table<?php echo $gallery['Gallery']['id']; ?>'>
    <div class="allborder" style="width:<?php echo isset($width) ? $width : 600; ?>px;">
        <div class="insideborder" style="">
            <div id='fotolink' style="">
                <?php $galleryUrl =  $this->Html->link('Galeria zdjęć - kliknij, aby powiększyć',array(
                    'controller' => 'galleries',
                    'action' => 'view',
                    $gallery['Gallery']['id']
                ),
                array('target' => '_blank')); ?>
                <?php echo $galleryUrl; ?>
            </div>
            <div>
                <?php if($big): ?>

                <div class="big">
                    <?php
                    echo $this->Html->link(
                        $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($big,PicasaImageSizeHelper::PHOTO_GALLERY_FIRST),
                            array("alt" => "Brownies")),
                        array(
//                    'controller' => 'images',
                            'action' => 'view',
                            $gallery['Gallery']['id'],
                            'photo' => 1
                        ),
                        array('escape' => false, 'target' => '_blank', 'class' => 'widthshadowmiddle'));
                    ?>
                </div>

                <?php endif; ?>
                <?php if(isset($gallery['GalleriesDetails']['image']) && is_array($gallery['GalleriesDetails']['image'])): ?>

                <?php foreach ($gallery['GalleriesDetails']['image'] as $k =>  $image): ?>

                    <?php
                    echo $this->Html->link(
                        $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($image,PicasaImageSizeHelper::PHOTO_GALLERY_THUMB),
                            array("alt" => "Brownies")),
                        array(
//                    'controller' => 'images',
                            'action' => 'view',
                            $gallery['Gallery']['id'],
                            'photo' => $k + 1
                        ),
                        array('escape' => false, 'target' => '_blank', 'class' => 'widthshadowmiddle imglist'));
                    ?>
                    <?php endforeach;?>
                <?php elseif(isset($gallery['GalleriesDetails']) && is_array($gallery['GalleriesDetails'])): ?>

                <?php foreach ($gallery['GalleriesDetails'] as $k =>  $image): ?>

                    <?php
                    echo $this->Html->link(
                        $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($image['image'],PicasaImageSizeHelper::PHOTO_GALLERY_THUMB),
                            array("alt" => "Brownies")),
                        array(
//                    'controller' => 'images',
                            'action' => 'view',
                            $gallery['Gallery']['id'],
                            'photo' => $k + 1
                        ),
                        array('escape' => false, 'target' => '_blank', 'class' => 'widthshadowmiddle imglist'));
                    ?>
                    <?php endforeach;?>

                <?php endif; ?>
                <div style="clear:both;"></div>

            </div>
            <div class="footborder" style="">

                <a href="<?php echo $this->Html->url('/',true);?>" target="_blank" title="darmowa galeria allegro" class="foot"><?php echo $this->Html->url('/',true);?></a>
            </div>
        </div>
    </div>
</div>
    <p>&nbsp;</p>

