<!DOCTYPE html>
<html>
    <head>
        <title>App</title>
        <meta charset="UTF-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Bootstrap demo</title>
   		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Bootstrap demo</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<style>
			body{
    			background-color: rgb(189, 189, 189);
			}

			.mb-2{
				border-radius: 10px;
				border: 1px solid rgb(145, 145, 145);
				box-shadow: 3px 3px 3px rgb(122, 121, 121);
			}
		</style>
    </head>

    <body>
		<?php
			include_once('backend/killSession.php');
		?>
			<div style="display: block; position:absolute; height: 4em; margin: 0 auto; width: 100%;background-color: #383838; color: white;">
				<h2 style="margin-top: 0.75em; margin-left: 1em;">App Login</h2><br><br><br><br>
			</div>
			<br>
			<br>
			<br>
			<?php
				if (isset($_GET['alert'])){
					echo("<div class='alert alert-danger' role='alert'>
						Username or Password incorrect!
				  		</div>");
					unset($_GET['alert']);
				}
			?>
			<br>
		<div class="container"><br><br><br>
		<div class="mb-2">
			<form class="form-control" method="POST" action='/backend/authenticate.php' name="form_login">
				<label>Username</label>
				<input class="form-control" type="textfield" name="benutzer" placeholder="your username..."></input><br>
				<label>Password</label>
				<input class="form-control" type="password" name="passwd" placeholder="your password..."></input><br><br>		
				<input type="submit" value="Login" name="login" class="btn btn-primary btn-sm" style="background-color: #383838; color: white; padding: 1em; border: none;" required></input>
				<a href="reg_page.php" style="text-decoration: none;"><input type="button" value="Sign In" class="btn btn-primary btn-sm" style="background-color: #383838;color: white; padding: 1em; border: none; float: right;" required></input></a>
			</form>
		</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>

</html>