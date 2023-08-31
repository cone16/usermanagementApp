<?php
    session_start();
    session_regenerate_id();
    include("DatabaseAccessProps.php");
    include("connectDb.php");

    
    if($_POST['email'] !== $_SESSION['email_']){
        $current_id = $_SESSION['id_'];
        $new_email = $_POST['email'];
        $stmt = $con->prepare("UPDATE accounts SET email = '$new_email' WHERE id = '$current_id'");
        $stmt->execute();
        session_regenerate_id();
        $_SESSION['email_'] = $_POST['email'];
        header('Location:../main.php');
    }

    if($_POST['password'] !== $_SESSION['password_']){
        echo("in password!");
        $current_id = $_SESSION['id_'];
        $not_hashed_pw = $_POST['password'];
        $hashed_pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE accounts SET password = '$hashed_pw' WHERE id = '$current_id'");
        $stmt->execute();
        session_regenerate_id();
        $_SESSION['password_'] = $not_hashed_pw;
        header('Location:../main.php');
    }

    header('Location:../main.php');
    
?>