<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */

//print_r($this->request->action);
//die();
?>
<?php $this->Html->script('spectrum.colorpicker', array('inline' => false)); ?>
<?php $this->Html->css('spectrum.colorpicker', null, array('inline' => false)); ?>
<style type="text/css">
    label{
        display: inline;
    }
     #images  div{
        height: 150px;
        border: 1px solid #c0c0c0;
    }

</style>
<script type="text/javascript">
    $(document).ready(function(){


        $(".pickImg").live('click', function(){

            var full = ($(this).attr('data-full'));
            var thumb = ($(this).attr('data-thumb'));

            var el = $('<div class="span1"><label><img src="' + thumb + '" /></label><input class="chk" type="checkbox" name="data[GalleriesDetails][][image]" value="'+ full +'" checked="checked" /></div>');
            $("#images").append(el);
            $("#preview").click();

            checkCanSubmit();
            return false;
        });

        //kasowanie obrazkow na uncheck boxa
        $("#images").delegate("input", "click", function() {
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

        $(".savestay").click(function(){
//          $('form input[name="title"]').bind('change', function(tid) {
            var form = this.form;
            alert($(form).attr('method'));
            alert($(form).attr('action'));
            alert($(form).serialize());
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
//                dataType: 'json',
                success: function(data) {
                    // refresh this form with 'data'.
                }
            });
            return false;
        });
        $("#preview,#preview2").click( function() {

            $("#liveGallery").hide();
            $(".ajax-loader").show();

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
                    $("#liveGallery a").each(function() {
//                        $(this).replaceWith($(this).html());
                        $(this).attr('href','#').attr('target', '');
                    });
                    $("#code textarea").text(html);
                    $("#code").animate({ backgroundColor: "yellow" }, "slow")
                        .animate({ backgroundColor: "white" }, "slow");
                },
                complete: function(html,status){
                    $(".ajax-loader").hide();
                    $("#liveGallery").show();

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


        if($("#images input").length > 0){
            $("#preview").click();
            $("#save").show();
        }
        checkCanSubmit();

        $("#code textarea").click(function(){
            $(this).focus().select();
        });

        function checkCanSubmit(){
            if($("#images input").length > 0){
                $("#save").show();
            } else{
//                $("#save").hide();
            }
        }
    });

</script>
<div class="row">

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
            <?php echo $this->Form->submit(__d('gallery','Preview'), array('id' => 'preview', 'name' => 'previewGallery', 'div' => false, 'class' => 'm-btn  green')); ?>
        <?php echo $this->Form->submit(__d('gallery','Save'), array('id' => 'save', 'name' => 'saveGallery', 'div' => false, 'class' => 'm-btn blue',)); ?>
        <?php echo $this->Form->button(__d('gallery','Save & Stay'), array('default' =>  false, 'div' => false, 'class' => 'm-btn purple savestay',)); ?>
                </div>
                <div class="row-fluid">&nbsp;</div>
                <div class="row-fluid">
                    <div id="code"><textarea id="" cols="30" rows="10" readonly="readonly"></textarea></div>

                </div>
    </div>

        </div>

    <div class="span5">
        <div class="ajax-loader"></div>
        <div id="liveGallery">
            <?php echo __('First select an album, then photos (bottom of page)'); //to jest nadpisane gdy sa dodane zdjecia do galerii ?>
        </div>
    </div>
    </div>

    <div id="images" class="row">
    <fieldset>
        <legend><?php echo __('Selected images'); ?></legend>
        <?php if(isset($gallery['GalleriesDetails']) && is_array($gallery['GalleriesDetails']) && !empty($gallery['GalleriesDetails'])): ?>

        <?php foreach ($gallery['GalleriesDetails'] as  $detail) : ?>

            <?php echo '<div class="span1"><label><img src="' . $detail['image'] . '" /></label><input class="chk" type="checkbox" name="data[GalleriesDetails][][image]" value="'. $detail['image'] .'" checked="checked" /></div>'; ?>
            <?php endforeach;?>

        <?php else: ?>
<!--        --><?php //echo __('No selected images'); ?>

    </fieldset>
        <?php endif; ?>

    </div>
    <?php echo $this->Form->end(); ?>




        <div class="row">
            <fieldset>
                <legend><?php echo __('Your images'); ?></legend>
                <?php echo $this->element('images', array("updateId" => "categoriesList")); ?>
            </fieldset>

        </div>
</div>
