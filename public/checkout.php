<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php storeOrderAddress(); ?>

<div class="container-fluid cart">
    <div class="cart-container">
        <div class="cart-item">
            <?php display_message(); ?>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="business" value="sb-hlpoq24003135@business.example.com">
                        <input type="hidden" name="currency_code" value="GBP">
                        <input type="hidden" name="upload" value="1">

                        
                        
                        <!-- <input type="hidden" name="email" value="jdoe@zyzzyu.com"> -->
                        <div class="cart-table-row">
                            <h3>Your cart</h3>
                            <span class=""><a href="index.php">Continue shopping</a></span>
                        </div>
                        <!--http://localhost/shop/public/thank_you.php?PayerID=B9K938FBHHXDN&st=Completed&tx=7S665201CB786811K&cc=GBP&amt=3.00&payer_email=sb-vptjh23985781%40personal.example.com&payer_id=B9K938FBHHXDN&payer_status=VERIFIED&first_name=John&last_name=Doe&address_name=John%20Doe&address_street=9%20Elm%20Street&address_city=Berwyn&address_state=PA&address_country_code=US&address_zip=19312&residence_country=US&txn_id=7S665201CB786811K&mc_currency=GBP&mc_fee=0.30&mc_gross=3.00&protection_eligibility=ELIGIBLE&payment_fee=0.30&payment_gross=3.00&payment_status=Completed&payment_type=instant&handling_amount=0.00&shipping=0.00&item_name1=Sports%20Towel&item_number1=27&quantity1=1&mc_gross_1=3.00&tax1=0.00&num_cart_items=1&txn_type=cart&payment_date=2023-05-23T19%3A21%3A00Z&receiver_id=9F5D9YRJ4L3VG&notify_version=UNVERSIONED&verify_sign=Ab-.KlWjdwB0HSrOm7P7zUQUAA0kAS3DITlo8LfXZUHUv-rf2id2XQcS-->
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
    <div class="cart-table-row your-details">
        <?php 
            if($_SESSION['basket_quantity'] > 0){
                echo"<h3>Your details</h3>";
            }
        ?>
    </div>
    <form class="address-form" method="POST">
        <div class="address-input">

                <div class="address-names">
                    <div class=""><label for="first_name">
                        First Name<input required type="text" name="first_name" value="<?php echo isset($_SESSION['order_first_name']) ? $_SESSION['order_first_name'] : ''; ?>"></label>
                    </div>
                    <div class=""><label for="last_name">
                        Last Name<input required type="text" name="last_name" value="<?php echo isset($_SESSION['order_last_name']) ? $_SESSION['order_last_name'] : ''; ?>"></label>
                    </div>
                </div>
                <div class="address-tel">
                    <div class=""><label for="telephone">
                        Telephone<input required type="text" name="telephone" value="<?php echo isset($_SESSION['order_telephone']) ? $_SESSION['order_telephone'] : ''; ?>"></label>
                    </div>
                </div>
                <div class="address">
                    <div class=""><label for="address1">
                        Address Line 1<input required type="text" name="address1" value="<?php echo isset($_SESSION['order_address1']) ? $_SESSION['order_address1'] : ''; ?>"></label>
                    </div>
                    <div class=""><label for="city">
                        City<input required type="text" name="city" value="<?php echo isset($_SESSION['order_city']) ? $_SESSION['order_city'] : ''; ?>"></label>
                    </div>
                    <div class=""><label for="zip">
                        Postcode<input required type="text" name="zip" value="<?php echo isset($_SESSION['order_postcode']) ? $_SESSION['order_postcode'] : ''; ?>"></label>
                    </div>
                </div>
            
            <?php
                if(isset($_SESSION['order_first_name']) && $_SESSION['order_first_name'] != '' ){
                    $editButton = <<<DELIMETER
                    <div class="edit-payment"><label for="edit">
                        <input class="edit-checkout" type="submit" name="edit" value="Edit Address">
                    </div>
                    DELIMETER;
                    echo $editButton;
                } elseif ($_SESSION['basket_quantity'] > 0) {
                    $continueButton = <<<DELIMETER
                    <div class="continue-payment"><label for="continue">
                        <input class="complete-checkout" type="submit" name="continue" value="Continue to Payment">
                    </div>
                    DELIMETER;
                    echo $continueButton;
                }
            ?>
        </div>
    </form>
</div>
    <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
