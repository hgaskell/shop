<?php

require_once("../../config.php");

if(isset($_GET['id'])){
    $query = query("DELETE FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
    validateQuery($query);

    set_message("Product {$_GET['id']} deleted!");

    redirect("../../../public/admin/index.php?products");
} else {
    redirect("../../../public/admin/index.php?products");
}

?>