<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<div class="container-fluid cart">
    <div class="cart-container">
        <div class="cart-item">
            <!-- <h4 class="text-center"><?php display_message(); ?></h4> -->
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="business" value="sb-hlpoq24003135@business.example.com">
                <input type="hidden" name="currency_code" value="GBP">
                <input type="hidden" name="upload" value="1">
                <!-- <input type="hidden" name="first_name" value="John">
                <input type="hidden" name="last_name" value="Doe">
                <input type="hidden" name="address1" value="9 Elm Street">
                <input type="hidden" name="address2" value="Apt 5">
                <input type="hidden" name="city" value="Berwyn">
                <input type="hidden" name="state" value="PA">
                <input type="hidden" name="zip" value="19312">
                <input type="hidden" name="email" value="jdoe@zyzzyu.com"> -->
                <div class="cart-table-row">
                    <h3>Your cart</h3>
                    <span class=""><a href="index.php">Continue shopping</a></span>
                </div>
            
                <div class="cart-table">
                    <div class="table-header">
                        <div class="table-header-item">Product</div>
                        <div class="table-header-item">Price</div>
                        <div class="table-header-item">Quantity</div>
                        <div class="table-header-item">Sub-total</div>
                    </div>
                </div>
                <?php cart(); ?>
        </div>

        <div class="cart-totals">
            <div class="cart-qty-heading cart-table-row">
                <h3>Summary</h3>
                <span class="qty"><?php echo isset($_SESSION['basket_quantity']) ? $_SESSION['basket_quantity'] : $_SESSION['basket_quantity'] = "0"; ?></span>
            </div>
            <div class="cart-total cart-table-row">
                <span>Subtotal</span>
                <span class="amount"><span class="currency"><?php $currency = setCurrency(); echo $currency; ?></span><?php echo isset($_SESSION['grand_total']) ? $_SESSION['grand_total'] : $_SESSION['grand_total'] = "0"; ?></span></strong></span>
            </div>
            <div class="cart-buy-btn cart-table-row">
                <?php echo show_paypal_button(); ?>
            </div>
            
            </form>
        </div>
    </div>
</div>
    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
