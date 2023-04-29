<?php

require_once("../../config.php");

if(isset($_GET['id'])){
    $query = query("DELETE FROM reports WHERE report_id = " . escape_string($_GET['id']) . " ");
    validateQuery($query);

    set_message("Report {$_GET['id']} deleted!");

    redirect("../../../public/admin/index.php?reports");
} else {
    redirect("../../../public/admin/index.php?reports");
}

?>