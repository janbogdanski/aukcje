<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>
<?php if(isset($_GET['CKEditorFuncNum'])): ?>

<!--    //to imagebrowser CKeditora-->
<?php foreach($albums as $album):  ?>
    <?php echo '<a href="?albumid='.$album['id'].'&CKEditorFuncNum='.$_GET['CKEditorFuncNum'].'">'; ?>
    <?php echo '<img src="'.$album['thumbnail']. '" />'; ?>
    <?php echo '</a>'; ?>
    <?php endforeach; ?>

<?php else:  ?>
<div id="photos">
<!--    //to moj plugin - popup-->
<?php foreach($albums as $album): ?>
    <?php echo '<a class="set_photo" data-albumid="'.$album['id'].'" href="?albumid='.$album['id'].'">'; ?>
    <?php echo '<img src="'.$album['thumbnail']. '" />'; ?>
    <?php echo '</a>'; ?>
    <?php endforeach; ?>
<?php endif; ?>

</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".set_photo").click(function(){
            $.ajax({
                type: 'POST',
                url: "/galleries/ajax",
                data: 'action=getAlbumPhotos&albumid=' + $(this).attr('data-albumid')
//                success: function(){}
            }).done(function(data) {
                    $("#photos").html(data);
//                    window.location.reload();
                });
            return false
            });
        });
    </script>