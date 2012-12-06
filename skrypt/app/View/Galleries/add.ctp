<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>
<?php $this->Html->script('spectrum.colorpicker', array('inline' => false)); ?>
<?php $this->Html->css('spectrum.colorpicker', null, array('inline' => false)); ?>
<style type="text/css">
    label{
        display: inline;
    }
    #addGallery #images > div{
        height: 250px;
        border: 1px solid red;
    }

</style>
<script type="text/javascript">
    $(document).ready(function(){


        $(".pickImg").click(function(){

            var full = ($(this).attr('data-full'));
            var thumb = ($(this).attr('data-thumb'));

            var el = $('<div class="span2"><label><img src="' + thumb + '" /></label><input class="chk" type="checkbox" name="data[GalleriesDetails][image][]" value="'+ full +'" checked="checked" /></div>');
            $("#addGallery #images").append(el);
            $("#preview").click();

            checkCanSubmit();
            return false;
        });

        //kasowanie obrazkow na uncheck boxa
        $("#addGallery #images").delegate("input", "click", function() {
            var $this = $(this);
            if(!$(this).is(":checked")){
                $(this).parent('div').remove();
                $("#preview").click();
            }
            checkCanSubmit();
        });

        $("#addGallery").delegate("input", "change", function() {
            $("#action").val($(this).attr("name"));

//            alert(this.form);
            $("#preview").click();
            checkCanSubmit();

//            if(!$(this).is(":checked")){
//                $(this).parent('div').remove();
            <!---->
//            }
        });

        $("#preview,#preview2").click( function() {

            $("#action").val($(this).attr("name"));
//            alert((this.form.action = action));
//            alert(this.form.previewGallery.name);
            $.ajax({
                type: 'POST',
                url: "/galleries/ajax",
                data: $(this.form).serialize(),
                cache: false,
                success: function(html,status){
                    $("#liveGallery").html(html);
                    $("#code textarea").text(html);
                    $("#code").animate({ backgroundColor: "yellow" }, "slow")
                        .animate({ backgroundColor: "white" }, "slow");
                }
            });
            return false;

        });


        $("#backgroundColor, #headerColor, #borderColor").spectrum({
//                preferredFormat: "hex",
            showPalette: true,
            showInput: true,
            showAlpha: true,
            palette:[
                ['black', 'white', 'blanchedalmond',
                    'rgb(255, 128, 0);', 'hsv 100 70 50'],
                ['red', 'yellow', 'green', 'blue', 'violet']
            ]
        });


        if($("#addGallery #images input").length > 0){
            $("#save").show();
        }
        checkCanSubmit();

        $("#code textarea").click(function(){
            $(this).focus().select();
        });

        function checkCanSubmit(){
            if($("#addGallery #images input").length > 0){
                $("#save").show();
            } else{
//                $("#save").hide();
            }
        }
    });

</script>
<div class="row">
    <?php echo $this->element('picasa_set_user'); ?>

    <?php   echo $this->Form->create('Gallery', array('id' => 'addGallery')); ?>

    <div class="row">
        <div class="span3 gallery-options">
        <?php echo $this->Form->input('Gallery.title'); ?>
        <?php echo $this->Form->hidden('Gallery.type'); ?>
        <?php echo $this->Form->hidden('Gallery.id'); ?>
        <input type="hidden" name="action" id="action">

        <?php echo $this->Form->input('Gallery.backgroundColor',array('id' => 'backgroundColor')); ?>
        <?php echo $this->Form->input('Gallery.headerColor',array('id' => 'headerColor')); ?>
        <?php echo $this->Form->input('Gallery.borderColor',array('id' => 'borderColor')); ?>
        <?php echo $this->Form->input('Gallery.size'); ?>
            <label for="GalleryShowBorder">Pokazać obramowanie?</label>
        <?php echo $this->Form->checkbox('Gallery.showBorder'); ?>
            <br />
            <label for="GalleryShowShadow">Pokazać cienie?</label>
            <?php echo $this->Form->checkbox('Gallery.showShadow'); ?>
            <br />

                        <div class="m-btn-strip">
                <div class="m-btn-group">
            <?php echo $this->Form->submit('Preview', array('id' => 'preview', 'name' => 'previewGallery', 'div' => false, 'class' => 'm-btn  green')); ?>
        <?php echo $this->Form->submit('Submit', array('id' => 'save', 'name' => 'saveGallery', 'div' => false, 'class' => 'm-btn blue',)); ?>
                </div>
    </div>
    </div>
    
    <div class="span5">
        <div id="liveGallery">Wybierz album/zdjęcia poniżej</div>
        <div id="code"><textarea name="textarea" id="" cols="30" rows="10" readonly="readonly"></textarea></div>
    </div>
    </div>
    <div id="images" class="row">
        <?php if(isset($gallery['GalleriesDetails']) &&is_array($gallery['GalleriesDetails'])): ?>

        <?php foreach ($gallery['GalleriesDetails'] as  $detail) : ?>

            <?php echo '<div class="span2"><label><img src="' . $detail['image'] . '" /></label><input class="chk" type="checkbox" name="data[GalleriesDetails][image][]" value="'. $detail['image'] .'" checked="checked" /></div>'; ?>
            <?php endforeach;?>

        <?php endif; ?>

    </div>


    <div class="row">

    <?php    if(isset($albums)) :?>
    <?php foreach($albums as $album): ?>

        <?php  $url = 'edit' == $this->request->params['action'] ? '/galleries/edit/'.$this->request->params['pass'][0].'/albumid:'.$album['id'] : '/galleries/add/albumid:'.$album['id']; ?>
        <?php  echo $this->Html->link(
            $this->Html->image($album['thumbnail'], array("alt" => "Brownies")),
            $url,
            array('escape' => false)
        );?>
        <?php endforeach;?>
    <?php endif;?>


    <?php if(isset($photos)) : ?>
    <?php foreach($photos as $photo): ?>

        <?php $url = 'edit' == $this->request->params['action'] ? '/galleries/edit/'.$this->request->params['pass'][0].'/albumid:'.$photo['image'] : '/galleries/add/albumid:'.$album['id'];?>

        <?php echo $this->Html->link(
            $this->Html->image($photo['thumbnail'], array("alt" => "Brownies", 'class' => 'pickImg',
                'data-full' => $photo['image'],
                'data-thumb' => $photo['thumbnail'],
            )),
            $url,
            array('escape' => false)
        );?>
        <?php endforeach;?>
    <?php endif;?>

        </div>
    <?php $this->Form->end(); ?>
</div>
