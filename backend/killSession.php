<?php
    session_start();
    session_regenerate_id();
    $_SESSION['loggedin'] = false;
    session_destroy();
    session_unset();
?>