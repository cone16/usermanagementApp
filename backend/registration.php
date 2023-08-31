<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "On");

    if ($_POST['submit']){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $second_password = $_POST['passwd_conf'];

        if ($password != $second_password) {
            $second_password = null;
            header('Location:../reg_page.php');
        }elseif($password === $second_password){
            // this is the Final now hashed Password.
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

            // password check correct! now get the db-properties
            include('DatabaseAccessProps.php');
            
            // connect the Database
            $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
            if(mysqli_connect_errno()){
                // If there is an error with the connection, stop the script and display the error.
	            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
            } else {
                // check, if the username already exists.
                if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
                    $stmt->bind_param('s', $_POST['username']);
                    $stmt->execute();
                    $stmt->store_result();
                    // if there are multible rows, search name in every row.
                    if($stmt->num_rows > 0) {
                        $stmt->bind_result($id, $password);
                        $stmt->fetch();
                        // Account already exists!
                        echo('Sorry, this Username already exists. Choose another One!');
                        $stmt = Null;
                        header('Location:../reg_page.php?alert='.$alert=true);
                    } else {
                        // Insert in the Database.
                        if ($stmt = $con->prepare("INSERT INTO accounts (username, password, email) VALUES ('$username', '$hashedpwd', '$email')")) {
                            $stmt->execute();
                            echo('User, ' . $username . ' registered. Now you can login.');
                            $stmt = Null;
                            header('Location:../index.php');
                        }
                    }
                }
            }

        }
    }
?>