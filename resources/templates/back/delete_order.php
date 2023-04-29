<?php

require_once("../../config.php");

if(isset($_GET['id'])){
    $query = query("DELETE FROM orders WHERE order_id = " . escape_string($_GET['id']) . " ");
    validateQuery($query);

    set_message("Order ID {$_GET['id']} deleted!");

    redirect("../../../public/admin/index.php?orders");
} else {
    redirect("../../../public/admin/index.php?orders");
}

?>