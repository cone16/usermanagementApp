<?php
        $id = $_GET['id'];
        include('DatabaseAccessProps.php');
        include_once('connectDb.php');
        $msqlQuery = $con->prepare("DELETE FROM accounts WHERE id = $id ");
        $msqlQuery->execute();
        echo ("successfully deleted user " . $_GET['id']);
        include_once('killSession.php');
        header('Location:../index.php');

?>