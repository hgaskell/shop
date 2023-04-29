<?php

$upload_dir = "uploads";

//HELPER FUNCTIONS

function last_id()
{
    global $connection;
    return mysqli_insert_id($connection);
}

function setCurrency()
{
    $currency = "&#8364;";
    return $currency;
}

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION["message"] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
}

function redirect($location)
{
    header("Location: $location");
}

function query($sql)
{
    global $connection;

    return mysqli_query($connection, $sql);
}

function validateQuery($result)
{
    global $connection;

    if (!$result) {
        die("QUERY FAILED! " . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

/***FRONT END FUNCTIONS ***/

// GET PRODUCTS

function get_products($limit)
{
    $query = query(" SELECT * FROM products LIMIT $limit");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $product_image = display_product_image($row["product_image"]);

        $product = <<<DELIMETER
<div class="product-tile">
    <a href="item.php?id={$row["product_id"]}"><img class="img-tile" src="../resources/{$product_image}" alt=""></a>
    <div class="product-info">
        <div>
            <h4><a href="item.php?id={$row["product_id"]}">{$row["product_title"]}</a></h4>
            <h4 class="">&#8364;{$row["product_price"]}</h4>
        </div>
    </div>
</div>
DELIMETER;

        echo $product;
    }
}

function get_product_by_tag()
{
    $query = query(" SELECT * FROM products WHERE product_tag = 'featured' ");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $product_image = display_product_image($row["product_image"]);

        $product = <<<DELIMETER

<div>
    <a href="item.php?id={$row["product_id"]}"><img class="slide-image" src="../resources/{$product_image}" alt=""></a>
    <div class="featured-text">
        <h4>
            <a href="item.php?id={$row["product_id"]}">{$row["product_title"]}</a>
        </h4>
        <h4 class="">
            <a href="item.php?id={$row["product_id"]}">&#8364;{$row["product_price"]}</a>
        </h4>
    </div>
</div>

DELIMETER;

        echo $product;
    }
}

// GET CATEGORIES

function get_categories()
{
    $query = query("SELECT * FROM categories");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $cat_image = display_product_image($row["cat_image"]);
        $category = <<<DELIMETER
    <a href="category.php?id={$row["cat_id"]}" class="">
        <div class="cat-image" style="background:url('../resources/{$cat_image}');background-size:cover;">
        <p class="cat-title">{$row["cat_title"]}</p>
        </div>
    </a>
DELIMETER;

        echo $category;
    }
}

function get_categories_menu()
{
    $query = query("SELECT * FROM categories");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $category = <<<DELIMETER
    <a href="category.php?id={$row["cat_id"]}" class="">{$row["cat_title"]}</a>
DELIMETER;

        echo $category;
    }
}

function get_products_from_category($sort)
{
    $query = query(
        "SELECT * FROM products WHERE product_category_id = " .
            escape_string($_GET["id"]) .
            " ORDER BY product_price $sort"
    );
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $product_image = display_product_image($row["product_image"]);
        $products = <<<DELIMETER
<div class="product-tile">
    <a href="item.php?id={$row["product_id"]}"><img class="img-tile" src="../resources/{$product_image}" alt=""></a>
    <div class="product-info">
        <div>
            <h4><a href="item.php?id={$row["product_id"]}">{$row["product_title"]}</a></h4>
            <h4 class="">&#8364;{$row["product_price"]}</h4>
        </div>
    </div>
</div>
DELIMETER;

        echo $products;
    }
}

function get_all_products($sort)
{
    $query = query("SELECT * FROM products ORDER BY product_price $sort");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $product_image = display_product_image($row["product_image"]);

        $products = <<<DELIMETER
<div class="product-tile">
    <a href="item.php?id={$row["product_id"]}"><img class="img-tile" src="../resources/{$product_image}" alt=""></a>
    <div class="product-info">
        <div>
            <h4><a href="item.php?id={$row["product_id"]}">{$row["product_title"]}</a></h4>
            <h4 class="">&#8364;{$row["product_price"]}</h4>
        </div>
    </div>
</div>
DELIMETER;

        echo $products;
    }
}

function login_user()
{
    if (isset($_POST["submit-login"])) {
        $email = escape_string($_POST["email"]);
        $password = escape_string($_POST["password"]);

        $query = query("SELECT * FROM users WHERE user_email = '{$email}' ");
        validateQuery($query);

        while ($row = fetch_array($query)) {
            $db_id = $row["user_id"];
            $db_email = $row["user_email"];
            $db_password = $row["user_password"];
            $db_firstname = $row["user_firstname"];
            $db_lastname = $row["user_lastname"];
            $db_role = $row["user_role"];
        }

        $password = crypt($password, $db_password);

        if (mysqli_num_rows($query) == 0) {
            set_message(
                "<p class='unsuccessful-message'>Email not registered!</p>"
            );
            redirect("index.php");
        } elseif ($email === $db_email && $password === $db_password) {
            $_SESSION["user_id"] = $db_id;
            $_SESSION["email"] = $db_email;
            $_SESSION["firstname"] = $db_firstname;
            $_SESSION["lastname"] = $db_lastname;
            $_SESSION["user_role"] = $db_role;
            set_message("<p class='successful-message'>Login successful</p>");
            redirect("index.php");
        } else {
            set_message(
                "<p class='unsuccessful-message'>Incorrect Password</p>"
            );
            redirect("index.php");
        }
    }
}

function register_user()
{
    if (isset($_POST["submit-register"])) {
        $user_firstname = $_POST["user_firstname"];
        $user_lastname = $_POST["user_lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (
            !empty($user_firstname) &&
            !empty($user_lastname) &&
            !empty($email) &&
            !empty($password)
        ) {
            $user_firstname = escape_string($user_firstname);
            $user_lastname = escape_string($user_lastname);
            $email = escape_string($email);
            $password = escape_string($password);

            $query = query("SELECT randSalt FROM users");
            validateQuery($query);

            $row = fetch_array($query);

            $salt = $row["randSalt"];
            $password = crypt($password, $salt);
            $query = query(
                "INSERT INTO users (user_firstname, user_lastname, user_email, user_password, user_role) VALUES('{$user_firstname}','{$user_lastname}','{$email}','{$password}','Customer' )"
            );
            validateQuery($query);
            set_message(
                "<p class='successful-message'>Registration Succesful</p>"
            );
            redirect("index.php");
        } else {
            set_message("<p class='unsuccessful-message'>Missing Fields!</p>");
        }

        $query = query("SELECT * FROM users WHERE user_email = '{$email}' ");
        validateQuery($query);

        while ($row = fetch_array($query)) {
            $db_id = $row["user_id"];
            $db_email = $row["user_email"];
            $db_password = $row["user_password"];
            $db_firstname = $row["user_firstname"];
            $db_lastname = $row["user_lastname"];
            $db_role = $row["user_role"];

            $password = crypt($password, $db_password);

            $_SESSION["user_id"] = $db_id;
            $_SESSION["email"] = $db_email;
            $_SESSION["firstname"] = $db_firstname;
            $_SESSION["lastname"] = $db_lastname;
            $_SESSION["user_role"] = $db_role;
        }
    }
}

function send_message()
{
    if (isset($_POST["submit"])) {
        $to = "email@test.com";
        $from_name = escape_string($_POST["name"]);
        $email = escape_string($_POST["email"]);
        $subject = escape_string($_POST["subject"]);
        $message = escape_string($_POST["message"]);

        $headers = "From: {$from_name} {$email}";
        mail($to, $subject, $message, $headers);
    }
}

/***BACK END FUNCTIONS ***/

function display_orders()
{
    if ($_SESSION["user_role"] == "admin") {
        $query = query("SELECT * FROM orders");
        validateQuery($query);

        while ($row = fetch_array($query)) {
            $orders = <<<DELIMETER

    <tr>
        <td>{$row["order_id"]}</td>
        <td>{$row["order_amount"]}</td>
        <td>{$row["order_transaction_id"]}</td>
        <td>{$row["order_currency"]}</td>
        <td>{$row["order_status"]}</td>
        <td><a href="../../resources/templates/back/delete_order.php?id={$row["order_id"]}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a></td>
    </tr>

DELIMETER;

            echo $orders;
        }
    } else {
        $user_id = $_SESSION["user_id"];

        $query = query(
            "SELECT * FROM orders WHERE customer_id = '{$user_id}' "
        );
        validateQuery($query);

        while ($row = fetch_array($query)) {
            $orders = <<<DELIMETER

    <tr>
        <td>{$row["order_id"]}</td>
        <td>{$row["order_amount"]}</td>
        <td>{$row["order_transaction_id"]}</td>
        <td>{$row["order_currency"]}</td>
        <td>{$row["order_status"]}</td>
        <td><a href="../../resources/templates/back/delete_order.php?id={$row["order_id"]}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a></td>
    </tr>

DELIMETER;

            echo $orders;
        }
    }
}

function display_product_image($image)
{
    global $upload_dir;
    return $upload_dir . DS . $image;
}

function get_all_products_admin()
{
    $query = query(" SELECT * FROM products");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $category_title = show_product_category($row["product_category_id"]);

        $product_image = display_product_image($row["product_image"]);

        $product = <<<DELIMETER

<tr>
  <td>{$row["product_id"]}</td>
  <td>
    <span>
      <a href="index.php?edit_product&id={$row["product_id"]}">
        <img src="../../resources/{$product_image}" alt="" class="img-responsive" style="width:100px" ;>
      </a>
    </span> {$row["product_title"]}
  </td>
  <td>{$category_title}</td>
  <td>{$row["product_price"]}</td>
  <td>{$row["product_stock"]}</td>
  <td><a href="../../resources/templates/back/delete_product.php?id={$row["product_id"]}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a></td>
</tr>

DELIMETER;

        echo $product;
    }
}

function show_product_category($product_category_id)
{
    $query = query(
        "SELECT * FROM categories WHERE cat_id = '{$product_category_id}' "
    );
    validateQuery($query);

    while ($category_row = fetch_array($query)) {
        return $category_row["cat_title"];
    }
}

function add_product()
{
    if (isset($_POST["publish"])) {
        $product_title = escape_string($_POST["product_title"]);
        $product_category_id = escape_string($_POST["product_category_id"]);
        $product_description = escape_string($_POST["product_description"]);
        $product_short_desc = escape_string($_POST["product_short_desc"]);
        $product_price = escape_string($_POST["product_price"]);
        $product_stock = escape_string($_POST["product_stock"]);
        $product_image = escape_string($_FILES["file"]["name"]);
        $image_temp_location = $_FILES["file"]["tmp_name"];

        move_uploaded_file(
            $image_temp_location,
            UPLOAD_DIRECTORY . DS . $product_image
        );

        $query = query(
            "INSERT INTO products(product_title, product_category_id, product_description, product_short_desc, product_price, product_stock, product_image) VALUES('{$product_title}','{$product_category_id}','{$product_description}','{$product_short_desc}','{$product_price}','{$product_stock}','{$product_image}')"
        );
        validateQuery($query);
        $last_id = last_id();
        set_message("Product with ID {$last_id} added successfully!");
        redirect("index.php?products");
    }
}

function update_product()
{
    if (isset($_POST["update"])) {
        $product_title = escape_string($_POST["product_title"]);
        $product_category_id = escape_string($_POST["product_category_id"]);
        $product_description = escape_string($_POST["product_description"]);
        $product_short_desc = escape_string($_POST["product_short_desc"]);
        $product_price = escape_string($_POST["product_price"]);
        $product_stock = escape_string($_POST["product_stock"]);
        $product_image = escape_string($_FILES["file"]["name"]);
        $image_temp_location = $_FILES["file"]["tmp_name"];

        if (empty($product_image)) {
            $get_image = query(
                "SELECT product_image FROM products WHERE product_id=" .
                    escape_string($_GET["id"]) .
                    " "
            );
            validateQuery($get_image);

            while ($image = fetch_array($get_image)) {
                $product_image = $image["product_image"];
            }
        }

        move_uploaded_file(
            $image_temp_location,
            UPLOAD_DIRECTORY . DS . $product_image
        );

        $query = "UPDATE products SET ";
        $query .= "product_title       = '{$product_title}', ";
        $query .= "product_category_id = '{$product_category_id}', ";
        $query .= "product_description = '{$product_description}', ";
        $query .= "product_short_desc  = '{$product_short_desc}', ";
        $query .= "product_price       = '{$product_price}', ";
        $query .= "product_stock       = '{$product_stock}', ";
        $query .= "product_image       = '{$product_image}' ";
        $query .= "WHERE product_id=" . escape_string($_GET["id"]);

        $update_product_query = query($query);
        validateQuery($update_product_query);

        set_message("Product updated successfully!");
        redirect("index.php?products");
    }
}

function list_categories()
{
    $query = query("SELECT * FROM categories");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $list_category = <<<DELIMETER
    <option value="{$row["cat_id"]}">{$row["cat_title"]}</option>
DELIMETER;

        echo $list_category;
    }
}

function list_categories_admin()
{
    $query = query("SELECT * FROM categories");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $list_category = <<<DELIMETER
    <tr>
        <td>{$row["cat_id"]}</td>
        <td>{$row["cat_title"]}</td>
        <td><a href="../../resources/templates/back/delete_category.php?id={$row["cat_id"]}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a></td>
    </tr>
DELIMETER;

        echo $list_category;
    }
}

function add_category()
{
    if (isset($_POST["add_cat"])) {
        $cat_title = escape_string($_POST["cat_title"]);
        $category_image = escape_string($_FILES["file"]["name"]);

        $image_temp_location = $_FILES["file"]["tmp_name"];

        move_uploaded_file(
            $image_temp_location,
            UPLOAD_DIRECTORY . DS . $category_image
        );

        if (empty($cat_title) || $cat_title == " ") {
            echo "Field cannot be empty!";
        } else {
            $query = query(
                "INSERT INTO categories(cat_title, cat_image) VALUES('{$cat_title}','{$category_image}')"
            );
            validateQuery($query);
            $last_id = last_id();
            set_message("Category with ID {$last_id} added successfully!");
        }
    }
}

function list_users_admin()
{
    $query = query("SELECT * FROM users");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $list_users = <<<DELIMETER
    <tr>
        <td>{$row["user_id"]}</td>
        <td>{$row["username"]}</td>
        <td>{$row["user_email"]}</td>
        <td>{$row["user_role"]}</td>
        <td><a href="../../resources/templates/back/delete_user.php?id={$row["user_id"]}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a></td>
    </tr>
DELIMETER;

        echo $list_users;
    }
}

function add_user()
{
    if (isset($_POST["add_user"])) {
        $username = escape_string($_POST["username"]);
        $user_email = escape_string($_POST["email"]);
        $user_firstname = escape_string($_POST["first_name"]);
        $user_lastname = escape_string($_POST["last_name"]);
        $user_password = escape_string($_POST["password"]);

        if (
            empty($username) ||
            empty($user_email) ||
            empty($user_firstname) ||
            empty($user_lastname) ||
            empty($user_password)
        ) {
            echo "Field cannot be empty!";
        } else {
            $query = query(
                "INSERT INTO users(username, user_email, user_firstname, user_lastname, user_password) VALUES('{$username}','{$user_email}','{$user_firstname}','{$user_lastname}','{$user_password}')"
            );
            validateQuery($query);
            $last_id = last_id();
            set_message("User with ID {$last_id} added successfully!");
            redirect("index.php?users");
        }
    }
}

function get_all_reports()
{
    $query = query(" SELECT * FROM reports");
    validateQuery($query);

    while ($row = fetch_array($query)) {
        $report = <<<DELIMETER

<tr>
  <td>{$row["report_id"]}</td>
  <td>{$row["order_id"]}</td>
  <td>{$row["product_id"]}</td>
  <td>{$row["product_title"]}</td>
  <td>{$row["product_price"]}</td>
  <td>{$row["product_quantity"]}</td>
  <td><a href="../../resources/templates/back/delete_report.php?id={$row["report_id"]}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></a></td>
</tr>

DELIMETER;

        echo $report;
    }
}

?>
