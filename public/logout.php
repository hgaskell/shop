<?php require_once("../resources/config.php"); ?>

<?php


    session_start();

    // Store the session you want to keep in a separate variable
    $messageSession = $_SESSION['message'];

    // Clear all sessions except the one you want to keep
    foreach ($_SESSION as $key => $value) {
        if ($key !== 'message') {
            unset($_SESSION[$key]);
        }
    }

    // Restore the specific session back to $_SESSION
    $_SESSION['specific_session'] = $messageSession;

    set_message("<p class='successful-message'>Goodbye</p>");
    header("Location: ../public");
    
?>