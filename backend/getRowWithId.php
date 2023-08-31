<?php
    session_regenerate_id();
    
    include("DatabaseAccessProps.php");
    include("connectDb.php");

    $stmt = $con->prepare('SELECT id, isAdmin, username, password, email FROM accounts WHERE BINARY id = ?');
    $stmt->bind_param('s', $_GET['id']);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        $stmt->bind_result($id, $isAdmin, $username, $password, $email);
        $stmt->fetch();
        header('Location:../edit_field.php');
        $_SESSION['id_'] = $id;
        $_SESSION['isAdmin_'] = $isAdmin;
        $_SESSION['username_'] = $username;
        $_SESSION['password_'] = $password;
        $_SESSION['email_'] = $email;
    }
?>