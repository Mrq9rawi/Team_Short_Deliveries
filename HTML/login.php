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
	    <title>Home Page</title>
    </head>
    <body>
        <?php
            require('../Database+SQL/database.php');
            $email = $_POST['email'];
            $password = $_POST['password'];
			
			$sql= "SELECT `TeamShortData`.`RegisteredLogin` WHERE Email='$email'AND password='password_verify($password, $hash)'";
			$result = mysqli -> query($sql);
			if ($result) {
				$sql_result = "SELECT Name FROM `TeamShortData.`RegisteredLogin` WHERE Email='$email' AND password='password_verify($password, $hash)'";
				$name = mysqli -> query($sql_result);
				header("What's your order, $name?");
			}
			else if ($email != $result) {
				echo "<p>$email is not registered. Please go to registration <a href='account.html>here</a>.</p>";
			}
			else if (!password_verify($password, $hash) || password_verify($password, $hash) != $result) {
				echo "<p>Wrong password. Please return to login and input the correct password <a href='account.html'>here</a>.</p>";
			}
			else {
				echo "<p>500. Internal error. Please try again later.</p>";
			}
        ?>
    </body>
</html>
