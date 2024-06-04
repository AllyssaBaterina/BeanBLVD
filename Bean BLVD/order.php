<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "order1.css">
    <title>Order Form</title>
</head>
<body>
    <div class="header">
        <div class = "shop-name">
        BEAN BOULEVARD
        <div class = "shop-slog">
        Sip, chat, share, relax
        </div>
        </div>
            <div class = "contents-nav">
                <nav>
                    <a href="home.html" id="home-btn">HOME</a>
                    <a href="about.html" id="about-btn">ABOUT</a>
                    <a href="product.html" id="pro-btn">PRODUCTS</a>
                    <a href ="order.php" id="or-btn">ORDER</a>
                    <a href="logout.html" id="logout">LOGOUT</a>
                </nav>
            </div>
        </div>
    
<form action="" method ="post">
    <div class = "box-form">
        <div class = "header-order">
        ORDER FORM
        </div>
        <br>
            <div class = "cus-info">
                <div class = "header-cus">
                Customer Information<br>
                </div>
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="phone_number">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" required><br><br>
                </div>
                <div class = "header-menu">
                CAFE MENU
                </div>
                <br>

                <div class = "hot-info">
                    <div class = "header-hot">
                        Hot Beverages<br>
                    </div>
                        <input type="checkbox" name="hot_beverages[]" value="Cappuccino">Cappuccino<br>
                        <input type="checkbox" name="hot_beverages[]" value="Caramel Macchiato">Caramel Macchiato<br>
                        <input type="checkbox" name="hot_beverages[]" value="Mocha">Mocha<br>
                        </div>

                    <div class = "cold-info">
                        <div class = "header-cold">
                            Cold Beverages<br>
                        </div>
                            <input type="checkbox" name="cold_beverages[]" value="Java Chip">Java Chip<br>
                            <input type="checkbox" name="cold_beverages[]" value="Hazelnut Frappe">Hazelnut Frappe<br>
                            <input type="checkbox" name="cold_beverages[]" value="Strawberry Frappe">Strawberry Frappe<br>
                        </div>

                    <div class = "bake-info">
                        <div class = "header-bake">
                            Bakery Menu<br>
                        </div>
                            <input type="checkbox" name="pastries[]" value="Muffin">Muffin<br>
                            <input type="checkbox" name="pastries[]" value="Chocolate Cake">Chocolate Cake<br>
                            <input type="checkbox" name="pastries[]" value="Cinnamon Roll">Cinnamon Roll<br><br>
                        </div>
                            <input id="button" type="submit" name="submit" value="Submit"><br>
                        <div class = "view-btn">
                            Do you want to view orders? <a href = "view.php" id = "view">View</a>
                        </div>
                        </div>

</form>
    <div class ="order-info">
        Stop settling for less, have an affair with our café
    </div>
</body>
</html>

<?php
// Connect to MySQL database using mysqli
include_once("connection.php");

if(isset($_POST['submit'])) {

// Get the selected hot beverages
$hot_beverages = isset($_POST['hot_beverages']) ? $_POST['hot_beverages'] : array();

// Get the selected cold beverages
$cold_beverages = isset($_POST['cold_beverages']) ? $_POST['cold_beverages'] : array();

// Get the selected pastries
$pastries = isset($_POST['pastries']) ? $_POST['pastries'] : array();

// Convert the arrays to strings
$hot_beverages_str = implode(',', $hot_beverages);
$cold_beverages_str = implode(',', $cold_beverages);
$pastries_str = implode(',', $pastries);

// Get the full name, address, email, and phone number
$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';

// Prepare and bind the SQL statement
$stmt = $con->prepare("INSERT INTO orders (id, full_name, address, email, phone_number, hot_beverages, cold_beverages, pastries) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $order_id, $full_name, $address, $email, $phone_number, $hot_beverages_str, $cold_beverages_str, $pastries_str);

// Execute the statement
$stmt->execute();
// Close the statement
$stmt->close();

// Close the connection
$con->close();
    echo "<script>alert('Your order has been submitted. Thank you!')</script>";

}
  
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>