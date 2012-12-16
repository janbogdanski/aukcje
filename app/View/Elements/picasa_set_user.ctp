<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 * @var $this View
 * Creation date    03.12.12 20:38
 */

$user = $this->UserAuth->getUser();
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#setUser").submit(function(){
            $.ajax({
                type: 'POST',
                url: "/galleries/ajax",
                data: $(this).serialize()
//                success: function(){}
            }).done(function() {
                    window.location.reload();
                });
            return false
        });
    });
</script>
<div>
    <div>
        <form method="post" id="setUser" action="#">
            <input type="text" class="span3" name="user" placeholder="<?php echo __('Picasa username'); ?>" value="<?php echo @$user['User']['picasa']; ?>" />
            <input type="hidden" name="setUser">
            <input type="submit" name="save" class="m-btn blue" value="<?php echo __('Save Picasa User'); ?>">
<!--            <input type="button" name="cancel" value="Cancel">-->
        </form>
    </div>
</div>