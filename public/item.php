<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php
    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
    validateQuery($query);
    while($row = fetch_array($query)):
    $product_image = display_product_image($row['product_image']);
    $currency = setCurrency();
    $price = $row['product_price'];
    $fullPrice = $currency .  $price;
?>

<div class="container-fluid">
    <div class="row banner">
        <div class="col-md-6">
            <div class="row carousel-holder">
                <img class="primary-product-image" src="../resources/<?php echo $product_image; ?>" alt="">
            </div>
            <!-- <div>
                <select>
                    <?php
                        $query = query("SELECT * FROM product_variants WHERE parent_id = " . escape_string($_GET['id']) . " ");
                        validateQuery($query);
                        while ($variant = fetch_array($query)) {
                            $variants = <<<DELIMETER
                            <option value="{$variant['id']}">{$variant['name']}</option>
                            DELIMETER;
                            echo $variants;
                        }
                    ?>     
                </select>
            </div> -->
            <div class="product-data">
                <div>
                    <div class="product-tabs">
                        <div class="product-description">
                            <p><?php echo $row['product_title']; ?></p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.152" height="5.722" viewBox="0 0 8.152 5.722">
                                    <path id="Path_291" data-name="Path 291" d="M133.283,185.509l-4.076-5.02.587-.7,3.489,4.3,3.489-4.3.587.7Z" transform="translate(-129.207 -179.787)"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="hidden-content">
                            <p>
                                <?php echo $row['product_description']; ?>
                            </p>
                        </div>
                        <div class="product-options">
                            <p>Choose product options</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.152" height="5.722" viewBox="0 0 8.152 5.722">
                                    <path id="Path_291" data-name="Path 291" d="M133.283,185.509l-4.076-5.02.587-.7,3.489,4.3,3.489-4.3.587.7Z" transform="translate(-129.207 -179.787)"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="basket-options">
                        <form method="get" action="../resources/cart.php">
                            <div class="product-quantity">
                                <p>Quantity</p>
                                <div class="quantity-field">
                                    <input name="add" type="hidden" value="<?php echo $row['product_id']; ?>">
                                    <span class="minus-qty">-</span>
                                    <input name="qty" class="quantity" type="number" value="1" min="1" pattern="[0-9]*">
                                    <span class="plus-qty">+</span>
                                </div>
                            </div>
                            <div class="add-to-basket">
                                <button type="submit">Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 fluid product-image-block">
            <div class="image-block">
                <img class="product-image" src="../resources/<?php echo $product_image; ?>" alt="">
            </div>
            <div class="image-block">
                <img class="product-image" src="../resources/<?php echo $product_image; ?>" alt="">
            </div>
            <div class="image-block">
                <img class="product-image" src="../resources/<?php echo $product_image; ?>" alt="">
            </div>
            <div class="image-block">
                <img class="product-image" src="../resources/<?php echo $product_image; ?>" alt="">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="section-header">
        <h3>Similar Products</h3>
    </div>
    <div class="productGrid">
        <?php get_products(4); ?>
    </div>
</div>

<?php endwhile; ?>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>