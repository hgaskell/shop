<?php

    session_start();
    session_destroy();
    set_message("<p class='successful-message'>Logged Out successful</p>");
    header("Location: ../../public");

?>