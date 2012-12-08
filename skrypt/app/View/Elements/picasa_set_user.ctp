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
            <input type="text" name="user" placeholder="Picasa username" value="<?php echo @$user['User']['picasa']; ?>" />
            <input type="hidden" name="setUser">
            <input type="submit" name="save" value="Zapisz">
<!--            <input type="button" name="cancel" value="Cancel">-->
        </form>
    </div>
</div>