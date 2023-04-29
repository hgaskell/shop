<?php

require_once("../../config.php");

if(isset($_GET['id'])){
    $query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['id']) . " ");
    validateQuery($query);

    set_message("User {$_GET['id']} deleted!");

    redirect("../../../public/admin/index.php?users");
} else {
    redirect("../../../public/admin/index.php?users");
}

?>