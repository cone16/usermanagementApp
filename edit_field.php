<?php
    session_start();
    session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark" style="background-color: #383838">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><h2 style="color: white">main user management App</h2></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" style="border-color: #383838; border-width: 2px;" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class='nav-link' aria-current='page' style='color: white' href='/backend/logout.php'>Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        // If the user is not logged in redirect to the login page...
        if (!isset($_SESSION['loggedin'])){
            header('Location: index.php');
            exit;
        }
        ?>
        <?php
            include('backend/getRowWithId.php');
            session_regenerate_id();
        ?>
            <form class="form-control" method="POST" action='/backend/edit.php' name="form_login">
                <label>id</label>
                <input class="form-control" value="<?= $_SESSION['id_'] ?>" type="textfield" name="id" style="width: 100px;" disabled></input><br>
                <label>Username</label>
                <input class="form-control" value='<?= $_SESSION['username_'] ?>' type="textfield" name="benutzer"  disabled></input><br>
                <label>Email</label>
                <input class="form-control" value='<?= $_SESSION['email_'] ?>' type="email" name="email" ></input><br>
                <label>Password</label>
                <input class="form-control" value='<?= $_SESSION['password_'] ?>' type="password" name="password" ></input><br><br>		
                <a href="main.php" style="text-decoration: none;"><input value="Abbrechen" name="cancel" class="btn btn-primary btn-sm" style="background-color: #383838; color: white; padding: 1em; border: none;" required></input></a>
                <a href="edit.php" style="text-decoration: none;"><input type="submit" name="save" value="Speichern" class="btn btn-primary btn-sm" style="background-color: #383838;color: white; padding: 1em; border: none; float: right; bottom: 4em;" required></input></a>
            </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>


    