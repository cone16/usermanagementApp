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
    <div style="display: block; position:absolute; height: 4em; margin: 0 auto; width: 100%;background-color: #383838; color: white;">
				<h2 style="margin-top: 0.75em; margin-left: 1em;">App Registration</h2><br><br><br><br>
			</div>
			<br><br><br>
            <?php
				if (isset($_GET['alert'])){
					echo("<div class='alert alert-danger' role='alert'>
						this username already exists!
				  		</div>");
					unset($_GET['alert']);
				}
			?>
		<div class="container">
		<br><br><br>
		<div class="mb-3">
			<form class="form-control" method="POST" action="/backend/registration.php" name="form_registration">
                <p style="text-align: center;"><br>Hello new user.<br> welcome in our holy halls.</p><br>
				<label>Username</label>
				<input class="form-control" type="textfield" name="username" placeholder="your username..." required></input><br>
                <label>eMail</label>
				<input class="form-control" type="email" name="email" placeholder="your eMail address..." required></input><br><br>
				
                <label>Password</label>
				<input id="password" class="form-control" type="password" name="password" placeholder="your password..." required></input><br>
                <div style="position: relative; float: right; margin-top: -3.5em; left: -1em;">
                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer;" onclick="showPass()"></i><br>
                </div>

                <label>Confirm password</label>
				<input id="password2" class="form-control" type="password" name="passwd_conf" placeholder="confirm your password..." required></input>
                <div style="position: relative; float: right; margin-top: -1.9em; left: -1em;">
                    <i class="far fa-eye" id="togglePassword2" style="cursor: pointer;"></i><br><br>	
                </div>
                
                <br>
				<input for="form_registration" type="submit" name="submit" value="Register" class="btn btn-primary btn-sm" style="background-color: #383838;color: white; padding: 1em; border: none;" required></input>
                <a href="index.php" style="text-decoration: none;"><input type="button" name="back" value="Back" class="btn btn-primary btn-sm" style="background-color: #383838; color: white; padding: 1em; border: none;"></input></a>
			</form>
		</div>
		</div>
        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const togglePassword2 = document.querySelector("#togglePassword2");
            const password = document.querySelector("#password");
            const password2 = document.querySelector("#password2");

            togglePassword.addEventListener("click", function () {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
            
                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            togglePassword2.addEventListener("click", function () {
                // toggle the type attribute
                const type = password2.getAttribute("type") === "password" ? "text" : "password";
                password2.setAttribute("type", type);
            
                // toggle the icon
                this.classList.toggle("bi-eye");
            });
         </script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>

</html>