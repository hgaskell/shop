<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <div class="container-fluid">
        <div class="row banner">
            <div class="col-md-6">
                <div class="row carousel-holder">
                    <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>
                </div>
            </div>
            <div class="col-md-6 fluid">
                <?php get_product_by_tag(); ?>
            </div>
        </div>
        <div class="row">
        <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
        </div>
        <div class="row">
            <div class="section-header">
                <h3>New Arrivals</h3>
            </div>
            <div class="productGrid">
                <?php get_products(8); ?>
            </div>
        </div>
    </div> 

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>