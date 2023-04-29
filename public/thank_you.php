<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php
    submit_order();
    //?amt=45.00&cc=GBP&st=Completed&tx=276573166Y215450U
?>

    <div class="container">
        <h1 class="text-center thank-you-heading">Thank you for your order</h1>
    </div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>