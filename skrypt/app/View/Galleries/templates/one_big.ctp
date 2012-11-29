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

?>
<style type="text/css">
    .footborder {
    width:90px;
    right:10px;
    bottom:16px;
    position:absolute;
    margin:auto;
}

.allborder {
    position:relative;
    font-size:13px;
    text-align:center;
    margin:auto;
    padding:9px;
}

.insideborder {
    border:1px solid <?php echo $gallery['Gallery']['borderColor']; ?>;
    padding:5px 5px 15px;
    background: <?php echo $gallery['Gallery']['backgroundColor']; ?>;

}

#tabelka<?php echo $gallery['Gallery']['id']; ?> img {
    border:1px solid <?php echo $gallery['Gallery']['borderColor']; ?>;
    margin:5px;
    padding:1px;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> img.noborder {
    border:none;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> a.noborder:hover img {
    border:none;
    padding:1px;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> {
    width:730px;
    padding:0;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> td {
    border:0;
    border-spacing:0;
    vertical-align:middle;
    padding:0;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> a {
    text-decoration:none;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> a:hover img {
    text-decoration:none;
    border:2px solid #000;
    padding:0;
}

#linkfoto {
    border-bottom:1px solid <?php echo $gallery['Gallery']['borderColor']; ?>;
    margin:0 5px 5px;
    padding:2px 8px 5px;
}

#linkfoto a {
    font-size:12px;
    border:0;
    color:<?php echo $gallery['Gallery']['headerColor']; ?>;
    font-family:Arial;
    text-decoration:none;
    margin:0;
}

#linkfoto a:hover {
    border:0;
    text-decoration:underline;
    margin:0;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> .elementitem {
    float:left;
}

.ppreview {
    width:300px;
    height:225px;
    margin-bottom:20px;
    margin-left:auto;
    margin-right:auto;
}


#tabelka<?php echo $gallery['Gallery']['id']; ?> a:hover span.sitemiddle {
    opacity:1;
    filter:alpha(opacity=100);
    transition:all .5s ease-out;
    -webkit-transition:all .5s ease-out;
    -moz-transition:all .5s ease-out;
    -o-transition:all .5s ease-out;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> a.widthshadow img,#tabelka<?php echo $gallery['Gallery']['id']; ?> a.widthshadowmiddle img {
    -moz-box-shadow:4px 4px 7px #7D7D7D;
    -webkit-box-shadow:4px 4px 7px #7D7D7D;
    box-shadow:4px 4px 7px #7D7D7D;
}

#tabelka<?php echo $gallery['Gallery']['id']; ?> a.widthshadow:hover img,#tabelka<?php echo $gallery['Gallery']['id']; ?> a.widthshadowmiddle:hover img {
    background-position:0 -256px;
}

</style>
<div id='tabelka<?php echo $gallery['Gallery']['id']; ?>'>
<div class="allborder" style="width:600px;">
<div class="insideborder" style="">
<div id='linkfoto' style="">
<a href=http://www.galerieallegro.pl/zdjecia/Galeria/1526389/1 target='_blank'>
    Galeria zdjęć - kliknij, aby powiększyć
</a>
			</div>
    <?php if(isset($gallery['GalleriesDetails']['image'][0])): ?>

    <div class="ppreview">
        <a href=http://www.galerieallegro.pl/zdjecia/Galeria/1526389/1 target='_blank' class="widthshadowmiddle">
            <img src="<?php echo $this->PicasaImageSize->picasaImgScaledUrl($gallery['GalleriesDetails']['image'][0],PicasaImageSizeHelper::PHOTO_GALLERY_FIRST); ?>" style="margin-bottom:10px;"/>
        </a>
    </div>
        
    <?php endif; ?>
<?php if(isset($gallery['GalleriesDetails']['image']) && is_array($gallery['GalleriesDetails']['image'])): ?>

    <?php foreach ($gallery['GalleriesDetails']['image'] as $image): ?>

    
    
			
			<a style="position: relative;" href=http://www.galerieallegro.pl/zdjecia/Galeria/1526389/1 target='_blank' id="editahref<?php echo $gallery['Gallery']['id']; ?>1" class="editahref widthshadow">
                <img class="ppanel" src="<?php echo $this->PicasaImageSize->picasaImgScaledUrl($image,PicasaImageSizeHelper::PHOTO_GALLERY_THUMB); ?>">
<!--<div class="editdiv">-->
<!--<span class="deleteedit" id="deleteedit--><?php //echo $gallery['Gallery']['id']; ?><!---1"/></span>-->
<!--    <span class="turnleft" id="turnleft--><?php //echo $gallery['Gallery']['id']; ?><!---1"/>-->
<!--    </span>-->
<!--    <span class="turnright" id="turnright--><?php //echo $gallery['Gallery']['id']; ?><!---1"/>-->
<!--    </span>-->
<!--			</div>-->
			</a>
                <?php endforeach;?>
    <?php endif; ?>

    <div style="clear:both;"></div>
			<div class="footborder" style="">
<a href="http://www.galerieallegro.pl" target="_blank" title="darmowa galeria allegro" class="noborder"><img src="http://www.galerieallegro.pl/grafika/logo3.gif" alt="Darmowe galerie allegro.pl" class="noborder"/></a><img src="http://www.galerieallegro.pl/views/<?php echo $gallery['Gallery']['id']; ?>/" alt="GalerieAllegro.pl" class="noborder" width="1" height="1"/>
</div>
		</div>
	</div>
</div>

