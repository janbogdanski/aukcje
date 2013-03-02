<?php
/**
 * @var $this View
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Browse Picasa</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

    <?php echo $this->Html->css('http://twitter.github.com/bootstrap/assets/css/bootstrap.css'); ?>


    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-transition.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-alert.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-modal.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tab.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-button.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-collapse.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-carousel.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-typeahead.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-affix.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/application.js"></script>
    <script type="text/javascript">
        <?php if(isset($_GET['CKEditorFuncNum'])): ?>
function select_image(imagePath) {
    var CKEditorFuncNum = <?php echo $_GET['CKEditorFuncNum']; ?>;
    window.parent.opener.CKEDITOR.tools.callFunction( CKEditorFuncNum, imagePath, '' );
    self.close();
}
<?php endif; ?>

    </script>

</head>
<body>
<?php echo $this->element('analytics'); ?>
<?php
$user = $this->UserAuth->getUser();
?>
			<?php echo $this->fetch('content'); ?>
            <?php echo $this->element('sql_dump'); ?>
</body>
</html>
