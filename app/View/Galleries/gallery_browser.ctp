<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>

<?php    foreach( $galleries as $gallery ): ?>

<div class="span2">
    <?php echo $this->Html->link(
    $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($gallery['Gallery']['mini'],
    PicasaImageSizeHelper::PHOTO_THUMB_LIST),
        array("alt" => "Brownies",)),
    '#',
    array('escape' => false, 'class' => 'get_gallery_code', 'data-gallery-id' => $gallery['Gallery']['id']));
    ?>
    <p><?php echo $gallery['Gallery']['title']; ?></p>
</div>
<?php endforeach;?>
<div class="clearfix"></div>


<script type="text/javascript">
    $(document).ready(function(){
        $(".get_gallery_code").click(function(){
            $.ajax({
                type: 'POST',
                url: "/galleries/ajax",
                data: 'action=getGalleryCode&gallery=' + $(this).attr('data-gallery-id')
//                success: function(){}
            }).done(function(data) {
                    $("#photos").html(data);
                editor.insertHtml(data);

                });
            return false
        });
    });
</script>