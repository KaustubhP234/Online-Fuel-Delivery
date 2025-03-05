<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "fuel";

// Connect to the database
$con = mysqli_connect($servername, $db_username, $db_password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $fuel_type = trim($_POST['fuel_type'] ?? '');
    $quantity = trim($_POST['quantity'] ?? '');
    $amount = trim($_POST['amount'] ?? '');
    $card_name = trim($_POST['card_name'] ?? '');
    $card_number = trim($_POST['card_number'] ?? '');
    $expiry = trim($_POST['expiry'] ?? '');
    $cvv = trim($_POST['cvv'] ?? '');

    // Check if any fields are empty
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($fuel_type) || empty($quantity) || empty($amount) || empty($card_name) || empty($card_number) || empty($expiry) || empty($cvv)) {
        die("All fields are required.");
    }

    // Simulate payment processing
    $payment_success = true;

    if ($payment_success) {
        // Prepare and execute the SQL query
        $sql = "INSERT INTO payment (name, email, phone, address, fuel_type, quantity, amount, card_name, card_number, expiry, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);

        if (!$stmt) {
            die("SQL Error: " . mysqli_error($con));
        }

        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssssidssss", $name, $email, $phone, $address, $fuel_type, $quantity, $amount, $card_name, $card_number, $expiry, $cvv);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h2>Payment Successful</h2>";
            echo "<p>Thank you, $name! Your payment of $$amount for $quantity liters of $fuel_type has been received.</p>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<h2>Payment Failed</h2>";
        echo "<p>There was an issue processing your payment. Please try again.</p>";
    }
} else {
    echo "<h2>Invalid Access</h2>";
    echo "<p>You cannot access this page directly.</p>";
}

// Close the database connection
mysqli_close($con);
?>
