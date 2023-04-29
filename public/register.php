<?php require_once("../resources/config.php"); ?>

<?php
    if (isset($_POST['submit-register']))
    {
        register_user();
    }
    else
    {
        set_message("");
    }
?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<div class="container">
    <div class="row">
            <?php display_message(); ?>
        </div>
    </div>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>