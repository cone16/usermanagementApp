<?php
    session_start();
    // load Database legitimations
    include ('DatabaseAccessProps.php');
    
        // this is how you can generate a password with hashes:
        //echo(password_hash("123", PASSWORD_DEFAULT));
        include_once('connectDb.php');
        if ( !isset($_POST['benutzer'], $_POST['passwd']) ) {
            exit('Please fill both, the Username and the Password fields!');
        } else {
            if ($stmt = $con->prepare('SELECT id, isAdmin, password, email FROM accounts WHERE BINARY username = ?')) {
                $stmt->bind_param('s', $_POST['benutzer']);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $isAdmin, $password, $email);
                    $stmt->fetch();
                    // Account exists, now we can verify the password.
                    // Note: remember to use Password_hash in your registration file to store hashed passwords
                    if(password_verify($_POST['passwd'], $password)){
                        // Verification success! User has logged-in!
                        // Create sessions, so we know the user is logged in, 
                        // they basically act like cookies but remember the data on the Server.
                        session_regenerate_id();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['name'] = $_POST['benutzer'];
                        $_SESSION['password'] = $_POST['passwd'];
                        $_SESSION['email'] = $email;
                        $_SESSION['isAdmin'] = $isAdmin;
                        $_SESSION['id'] = $id;
                        echo('Welcome ' . $_SESSION['name'] . '!');
                        header('Location: ../main.php');
                    } else {
                        // incorrect password
                        header('Location: ../index.php?alert='.$alert=true);
                    }
                } else {
                    // incorrect  username
                    header('Location: ../index.php?alert='.$alert=true);
                }

                $stmt->close();
            }
        }
 

?>