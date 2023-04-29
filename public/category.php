<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php

if(isset($_GET['sortby'])){
    $sort = $_GET['sortby'];
} else {
    $sort = 'ASC';
}

?>

    <div class="container-fluid">
        <div class="row">
            <div class="section-header">
                <h3><?php echo show_product_category($_GET['id']); ?></h3>
            </div>
            <div class="productGrid">
                <?php get_products_from_category($sort); ?>
            </div>
        </div>
    </div>



    <div class="category-filters product-data">
        <div>
            <div class="product-tabs">
                <div class="product-description">
                    <p>Sort</p>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="8.152" height="5.722" viewBox="0 0 8.152 5.722">
                            <path id="Path_291" data-name="Path 291" d="M133.283,185.509l-4.076-5.02.587-.7,3.489,4.3,3.489-4.3.587.7Z" transform="translate(-129.207 -179.787)"></path>
                        </svg>
                    </div>
                </div>
                <div class="hidden-content">
                    <form class="sort-form" method="get" action="category.php">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <label for="sort-price-ascending">
                            price ↑ 
                            <input class="sort-checkbox sort-price-ascending" id="sort-price-ascending" name="sortby" type="radio" value="ASC">
                        </label>
                        <label for="sort-price-descending">
                            price ↓
                            <input class="sort-checkbox sort-price-descending" id="sort-price-descending" name="sortby" type="radio" value="DESC">
                        </label>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

