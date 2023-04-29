<?php require_once("config.php"); ?>

<?php

    if(isset($_GET['add'])){
        $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) . " ");
        validateQuery($query);

        if(isset($_GET['qty'])){
            $qty = $_GET['qty'];
        } else {
            $qty = 1;
        }

        while($row = fetch_array($query)){
            if($row['product_stock'] != $_SESSION['product_' . $_GET['add']]){
                $_SESSION['product_' . $_GET['add']] += $qty;
                redirect("../public/checkout.php");
            } else {
                set_message("Only " . $row['product_stock'] . " left in stock");
                redirect("../public/checkout.php");
            }
        }
    }

    if(isset($_GET['remove'])){
        $_SESSION['product_' . $_GET['remove']]--;

        if($_SESSION['product_' . $_GET['remove']] < 1){
            unset($_SESSION['basket_quantity']);
            unset($_SESSION['grand_total']);
            redirect("../public/checkout.php");
        } else {
            redirect("../public/checkout.php");
        }
    }

    if(isset($_GET['delete'])){
        $_SESSION['product_' . $_GET['delete']] = '0';
        unset($_SESSION['basket_quantity']);
        unset($_SESSION['grand_total']);
        redirect("../public/checkout.php");
    }

    //DISPLAY ITEMS IN BASKET AT CHECKOUT
    function cart(){

        $total = 0;
        $item_quantity = 0;
        $item_name = 1;
        $item_number = 1;
        $amount = 1;
        $quantity = 1;

        foreach($_SESSION as $name => $value){

            if($value > 0){

                if(substr($name, 0, 8) == "product_"){

                    $length = strlen(is_numeric($name) - 8);

                    $id = substr($name, 8, $length);

                    $query = query("SELECT * FROM products WHERE product_id = " . escape_String($id) . " ");
                    validateQuery($query);
                    $currency = setCurrency();
                    while($row = fetch_array($query)){

                        $subTotal = $row['product_price'] * $value;
                        $item_quantity += $value;
                        $product_image = display_product_image($row['product_image']);
                        
                        $basket = <<<DELIMETER


                        <div class="cart-table">
                        <div class="table-row">
                            <div class="table-row-item">
                                <div class="cart-title-img-row">
                                    <div class="cart-product-img">
                                        <img src="../resources/{$product_image}" alt="" class="img-responsive" style="width:100px";>
                                    </div>
                                    <div class="cart-product-title">
                                        <div>{$row['product_title']}</div>
                                        <p class="remove-item"><a href="../resources/cart.php?delete={$row['product_id']}">Remove</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="table-header-item"><span class="currency">{$currency}</span>{$row['product_price']}</div>
                            <div class="table-header-item">
                                <div class="cart-qty">
                                    <a href="../resources/cart.php?remove={$row['product_id']}">
                                        <span>
                                        -
                                        </span>
                                    </a>
                                    <span class="qty-value">{$value}</span>
                                    <a href="../resources/cart.php?add={$row['product_id']}">
                                        <span>
                                        +
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="table-header-item"><span class="currency">{$currency}</span>{$subTotal}</div>
                            </div>
                        </div>

                        <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                        <input type="hidden" name="quantity_{$quantity}" value="{$value}">



                        DELIMETER;

                        echo $basket;

                        $item_name ++;
                        $item_number ++;
                        $amount ++;
                        $quantity ++;
                        
                    }
                    $_SESSION['grand_total'] = $total += $subTotal;
                    $_SESSION['basket_quantity'] = $item_quantity;
                }
            }
        }
    }

    function show_paypal_button(){

        if(isset($_SESSION['basket_quantity']) && $_SESSION['basket_quantity'] >= 1){

            $paypal_button = <<<DELIMETER
            <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
            DELIMETER;
            // <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">

            return $paypal_button;
        }
    }

    function submit_order(){

        if(isset($_GET['tx'])){

            $amount         = $_GET['amt'];
            $currency       = $_GET['cc'];
            $transaction_id = $_GET['tx'];
            $status         = $_GET['st'];

            if(isset($_SESSION['user_id'])){
                $customer_id = $_SESSION['user_id'];
            } else {
                $customer_id = 0;
            }
            //ADD ORDER DETAILS TO ORDER TABLE
            $send_order = query("INSERT INTO orders (order_amount, order_transaction_id, order_status, order_currency, customer_id) VALUES('{$amount}','{$transaction_id}','{$status}','{$currency}','{$customer_id}')");
            $last_id =  last_id();
            validateQuery($send_order);

            $total = 0;
            $item_quantity = 0;

            foreach($_SESSION as $name => $value){

                if($value > 0){

                    if(substr($name, 0, 8) == "product_"){

                        $length = strlen($name) - 8;
                        $id = substr($name, 8, $length);

                        //LOOP OVER PRODUCTS IN ORDER AND THEN INSERT INTO REPORTS TABLE
                        $query = query("SELECT * FROM products WHERE product_id = " . escape_String($id) . " ");
                        validateQuery($query);

                        while($row = fetch_array($query)){
                            $subTotal = $row['product_price'] * $value;
                            $item_quantity += $value;

                            $add_order_to_report = query("INSERT INTO reports (product_id, product_title, order_id, product_price, product_quantity) VALUES('{$id}', '{$row['product_title']}', '{$last_id}', '{$row['product_price']}', '{$value}')");
                            validateQuery($add_order_to_report);
                        }
                    }
                }
            }
            session_destroy();

        } else {
            redirect("index.php");
        }
    }
?>