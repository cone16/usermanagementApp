<?php
    // this file collect all Data for the Management Page
    include ('DatabaseAccessProps.php');
    include_once('connectDb.php');
    $stmt = $con->prepare('SELECT id, isAdmin, username, email, password FROM accounts');
    $stmt->execute();
    $result = $stmt->get_result();
?>