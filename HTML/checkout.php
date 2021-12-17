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
        <title>Account</title>
    </head>
    <body>
        <header>
            <div class="container">
                <nav>
                    <a href="index.html">
                        <img src="../images/Team_Short_Deliveries_logo.png" alt="">
                    </a>
                    <div>
                        <i class="fas fa-bars fa-2x" id="burgerIcon"></i>
                        <ul id="navigation">
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="account.html">Sign In | Sign Up</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <?php
                require_once( "database.php");
                $product_summary = $_POST['product_summary'];
                $total_cost = $_POST['total_cost'];
                date_default_timezone_set('EST');
                $delivery_date = mktime(0,0,0,date("m"),date("d")+7,date("Y"));
                $receipt_number = rand(1000,9000);
                session_start();

                if (isset($_SESSION['username'])) {
                    $product_summary_input = set_string($db_connect, $product_summary);
                    $total_cost_input = set_string($db_connect, $total_cost);

                    $s = "INSERT INTO Products(ProductCombination,TotalProductCost) VALUES (?,?)";

                    $user_product_input = mysqli_prepare($db_connect, $s);

                    mysqli_stmt_bind_param (
                        $user_product_input,
                        'ss',
                        $product_summary_input,
                        $total_cost_input
                    );

                    $product_input = mysqli_stmt_execute($user_product_input);
                    if ($product_input) {
                        $delivery_date_input = set_string($db_connect, $delivery_date);

                        $sq = "INSERT INTO Order(DeliveryDate, ReceiptNo) VALUES (?,?)";

                        $user_order_input = mysqli_prepare($db_connect, $sq);

                        mysqli_stmt_bind_param (
                            $user_order_input,
                            'ss',
                            $delivery_date_input,
                            $receipt_number
                        );

                        $order_input = mysqli_stmt_execute($user_order_input);
                        
                        if ($order_input) {
                            $ijq = "SELECT Name FROM Registration OUTER JOIN Products ON Registration.UserID = Products.UserID WHERE Name=$name";
                            $order_and_receipt_result = $db -> query($ijq);
                            if ($order_and_receipt_result) {
                                echo "<h4>Thank you for your order! Your receipt number: $receipt_number. Your order will be arrive on $delivery_date.</h4>";
                            }
                            else {
                                echo "<h4>500. Internal error. Please try again later.</h4>";
                            }
                        }
                        else {
                            echo "<h4>500. Internal error. Please try again later.</h4>";
                        }                       

                    }
                    else {
                        echo "<h4>500. Internal error. Please try again later.</h4>";
                    }
                }
                else {
                    echo "<h4>You aren't logged in. In order to do an order, you need to either sign in or sign up <a href='account.html'>here</a>.</h4>";
                }

            ?>
        </main>
        <footer>

        </footer>
    </body>
</html>