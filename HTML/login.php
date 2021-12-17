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
            require_once('database.php');
            $email = $_POST['email'];
            $password = $_POST['password'];
			$email_input = set_string($db_connect, $email);
			$hash = password_hash($password, PASSWORD_DEFAULT);
			session_start();
			
			$sql= "SELECT * FROM `TeamShortData`.`Registration` WHERE Email='$email_input'AND password='$hash'";
			$result = $db_connect -> query($sql);
			if ($result && password_verify($password, $hash)) {
				$_SESSION['username'] = $_POST['email'];
				echo "<h4>Success! You'll be going to the home page in a moment!</h4>";
				header("location:index.php");
			}
			else if ($result['Email'] != $email_input) {
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
