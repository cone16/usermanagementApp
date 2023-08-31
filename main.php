<?php
    session_start();
    session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="en">
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
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" style="border-color: #383838; border-width: 2px;" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <a class='nav-link' aria-current='page' style='color: white' href='/backend/logout.php'>Logout</a>
        </div>
        </div>
    </div>
    </nav>

        <br><br><br><br>
    <?php
        // If the user is not logged in redirect to the login page...
        if (!isset($_SESSION['loggedin'])){
            header('Location: index.php');
            exit;
        }
    ?>
        <div class="table-container">
            <div class='container'>
                <div class='mb-3'>
                    <h4>Welcome Registred User <?=$_SESSION['name']?> </h4>
                </div>
            </div>
            <br>
            <table class="table">
            <tr>
                <th id="head">id</th>
                <th id="head">isAdmin</th>
                <th id="head">user</th>
                <th id="head">email</th>
                <th id="head">password</th>
            </tr>
                <?php 
                    include("./backend/getAllInfo.php");
                    while ($row = mysqli_fetch_assoc($result)){
                        $concat_pwd = (strlen($row['password']) > 25) ? substr($row['password'], 0 , 25) . '...' : $row['password'];
                        echo("<tr><th>" . $row['id'] . "</th>");
                        if ($row['isAdmin'] === 1){
                            echo("<th>yes</th>");
                        } else {
                            echo("<th>no</th>");
                        }
                        echo("<th>" . $row['username'] . "</th>");
                        echo("<th>" . $row['email'] . "</th>");  
                        echo("<th>" . $concat_pwd . "</th>");
                        if($_SESSION['name'] === $row['username'] || $_SESSION['isAdmin'] === 1){     
                            echo("
                                  <th><button style='border: none; cursor: pointer; background-color: white'>
                                  <a href='edit_field.php?id=" . urldecode($row['id']) . "'>
                                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='green' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                  </svg>
                                  </a>
                                  </button>
                                  </th>
                                  <th><button class='btn btn-primary btn-sm' style='background-color: white; border: none;'><a href='backend/delete.php?id=" . urlencode($row['id']) . "'>
                                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-trash3' viewBox='0 0 16 16'>
                                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                                  </svg>
                                  </button>
                                  </th></tr>");
                        }
                    }
                ?>
            </table>
            <br><br>
        </div>
        <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>