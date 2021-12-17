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
            $card_info = $_POST['card_info'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$street = $_POST['street'];
			$city = $_POST['city'];
			$province = $_POST['province'];
            $postal_code = $_POST['postal_code'];
			$password = $_POST['confirm_password'];

            $card_info_input = set_string($db_connect, $card_info);
			$name_input = set_string($db_connect, $name);
            $email_input = set_string($db_connect, $email);
            $street_input = set_string($db_connect, $street);
			$city_input = set_string($db_connect, $city);
			$province_input = set_string($db_connect, $province);
            $postal_code_input = set_string($db_connect, $postal_code);
			$hash = password_hash($password, PASSWORD_DEFAULT);
            $s = "INSERT INTO Registration(CardInfo, Name, Email, Street, City, Province, PostalCode, Password) VALUES (?,?,?,?,?,?,?,?)";

            $user_register_input = mysqli_prepare($db_connect, $s);

            mysqli_stmt_bind_param(
                $user_register_input,
                'ssssssss',
				$card_info,
                $name_input,
                $email_input,
                $street_input,
				$city_input,
                $postal_code_input,
				$province_input,
				$hash
            );

            $input = mysqli_stmt_execute($user_register_input);
            if ($input) {
                header("What's your order, $name?");
            }
            else {
                echo "<p>500. Internal error. Please try again later.</p>";
            }
        ?>
    </body>
</html>