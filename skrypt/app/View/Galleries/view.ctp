<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */

//print_r($gallery);
//print_r($gallery['GalleriesDetails']);
//todo minimum 0
$photoNum = $photo - 1;
$count = count($gallery['GalleriesDetails']);
$nextPhotoNUm = $photo >= $count ? 1 : $photo + 1;
?>

<div class="container">

    <style type="text/css">
    </style>
    <script type="text/javascript">
        $(document).ready(function(){

        });

    </script>
    
    <div class="row">
        <!--    <form action="" method="post" id="addGallery">-->
            <?php if(isset($gallery['GalleriesDetails']) &&is_array($gallery['GalleriesDetails'])): ?>

            <?php foreach ($gallery['GalleriesDetails'] as $k => $detail): ?>

            <td><?php echo $this->Html->link(
            $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($detail['image'],PicasaImageSizeHelper::PHOTO_THUMB),
                array("alt" => "Brownies")),
                array(
//                    'controller' => 'images',
//                    'action' => 'view',
                    $gallery['Gallery']['id'],
                    'photo' => $k+1),
                array('escape' => false)); ?></td>


            <?php endforeach; ?>

        <div>
            <?php if(isset($gallery['GalleriesDetails'][$photoNum])): ?>

            <?php echo $this->Html->link(
                $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($gallery['GalleriesDetails'][$photoNum]['image'],PicasaImageSizeHelper::PHOTO_FULL),
                array("alt" => "Brownies")),
                array(
//                    'controller' => 'images',
//                    'action' => 'view',
                    $gallery['Gallery']['id'],
                    'photo' => $nextPhotoNUm),
                array('escape' => false)); ?>

            <?php endif; ?>
            
        </div>
    <?php endif; ?>

    </div>

</div>
