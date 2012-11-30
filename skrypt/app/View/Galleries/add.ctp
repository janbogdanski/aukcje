<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>

<div class="container">
    <?php

//    print_r();
//    die();

//
    if(isset($albums)){
        foreach($albums as $album){

            $url = 'edit' == $this->request->params['action'] ? '/galleries/edit/'.$this->request->params['pass'][0].'/albumid:'.$album['id'] : '/galleries/add/albumid:'.$album['id'];
            echo $this->Html->link(
                $this->Html->image($album['thumbnail'], array("alt" => "Brownies")),
                $url,
                array('escape' => false)
            );
        }
    }

    if(isset($photos)){
        foreach($photos as $photo){

            $url = 'edit' == $this->request->params['action'] ? '/galleries/edit/'.$this->request->params['pass'][0].'/albumid:'.$photo['image'] : '/galleries/add/albumid:'.$album['id'];

            echo $this->Html->link(
                $this->Html->image($photo['thumbnail'], array("alt" => "Brownies", 'class' => 'pickImg',
                    'data-full' => $photo['image'],
                    'data-thumb' => $photo['thumbnail'],
                )),
                $url,
                array('escape' => false)
            );
        }

    }


    ?>
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

                return false;
            });

            //kasowanie obrazkow na uncheck boxa
            $("#addGallery #images").delegate("input", "click", function() {
                var $this = $(this);
                if(!$(this).is(":checked")){
                    $(this).parent('div').remove();
                    $("#preview").click();

                }
            });

            $("#addGallery").delegate("input", "change", function() {
                $("#action").val($(this).attr("name"));

//            alert(this.form);
                $("#preview").click();
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
                    }
                });
                return false;
            });
        });

    </script>
    <div class="row">
        <!--    <form action="" method="post" id="addGallery">-->
        <?php   echo $this->Form->create('Gallery', array('id' => 'addGallery')); ?>

        <div id="images" class="row">
            <?php if(isset($gallery['GalleriesDetails']) &&is_array($gallery['GalleriesDetails'])): ?>

            <?php foreach ($gallery['GalleriesDetails'] as  $detail){

                echo '<div class="span2"><label><img src="' . $detail['image'] . '" /></label><input class="chk" type="checkbox" name="data[GalleriesDetails][image][]" value="'. $detail['image'] .'" checked="checked" /></div>';
            } //end foreach



            ?>
            <?php endif; ?>

        </div>
        <?php echo $this->Form->input('Gallery.title'); ?>
        <?php echo $this->Form->hidden('Gallery.type'); ?>
        <?php echo $this->Form->hidden('Gallery.id'); ?>
        <!--    --><?php //echo $this->Form->hidden('action'); ?>
        <input type="hidden" name="action" id="action">

        <?php echo $this->Form->input('Gallery.backgroundColor'); ?>
        <?php echo $this->Form->input('Gallery.headerColor'); ?>
        <?php echo $this->Form->input('Gallery.borderColor'); ?>
        <?php echo $this->Form->input('Gallery.size'); ?>
        <h2>border?</h2>
        <?php echo $this->Form->checkbox('Gallery.showBorder'); ?>
        <h2>shadow?</h2>

        <?php echo $this->Form->checkbox('Gallery.showShadow'); ?>
        <!--        <input type="text" name="data[Gallery][title]" value="" placeholder="Title" />-->
        <!--        <input type="hidden" name="data[Gallery][type]" value="1" placeholder="Title" />-->
        <!--        <input type="text" name="data[Gallery][size]" value="" placeholder="Szerokość" />-->
        <!--        <input type="hidden" name="data[Gallery][mini]" value="ff" />-->
        <input type="hidden" name="" value="">
        <input type="submit">
        <?php echo $this->Form->submit('preview', array('id' => 'preview', 'name' => 'previewGallery')); ?>
        <?php echo $this->Form->submit('save', array('id' => 'save', 'name' => 'saveGallery')); ?>

        <input type="submit" name="Operation" value="Insert">
        <input type="submit" name="Operation" value="Update">
        </form>
        <?php $this->Form->end(); ?>

        <div id="liveGallery"></div>
    </div>

</div>
