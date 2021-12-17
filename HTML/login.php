<!DOCTYPE html>
<html lang="en">

    <head>
	    <meta charset="UTF-8">
	    <!-- CSS Files -->
	    <!-- Normalizer -->
	    <link rel="stylesheet" href="../CSS/normalize.css">
	    <!-- FontAwesome -->
	    <link rel="stylesheet" href="../CSS/all.min.css">
	    <!-- MainCSSFile -->
	    <link rel="stylesheet" href="../CSS/master.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Login</title>
    </head>
    <body>
        <?php
            require_once('../Database+SQL/database.php');
			include('registration.php');
            $email = $_POST['email'];
            $password = $_POST['password'];
			
			$sql= "SELECT `TeamShortData`.`Registration` WHERE Email='$email_input'AND password='$hash'";
			$result = $db_connect -> query($sql);
			if ($result && password_verify($password, $hash)) {
				$sql_result = "SELECT Name FROM `TeamShortData`.`Registration` WHERE Email='$email_input' AND password='$hash'";
				$name = $db_connect -> query($sql_result);
				$_SESSION['username'] = $email;
				echo "<h4>Hello $name! You'll be going to the home page in a moment!</h4>";
				header("location:index.php");
			}
			else if ($email != $result) {
				echo "<h4>$email is not registered. Please go to registration <a href='account.html>here</a>.</h4>";
			}
			else if (!password_verify($password, $hash) || password_verify($password, $hash) != $result) {
				echo "<h4>Wrong password. Please return to login and input the correct password <a href='account.html'>here</a>.</h4>";
			}
			else {
				echo "<h4>500. Internal error. Please try again later.</h4>";
			}
        ?>
    </body>
</html>
