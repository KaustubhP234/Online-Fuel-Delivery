<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "fuel";

// Connect to the database
$con = mysqli_connect($servername, $db_username, $db_password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values safely
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $fuel_type = trim($_POST['fuel_type'] ?? '');
    $quantity = trim($_POST['quantity'] ?? '');

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($fuel_type) || empty($quantity)) {
        die("All fields are required.");
    }

    // ✅ Use Prepared Statement to prevent SQL Injection
    $sql = "INSERT INTO booking (name, email, phone, address, fuel_type, quantity) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die("SQL Error: " . mysqli_error($con));
    }

    // Bind parameters (strings and integer)
    mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $phone, $address, $fuel_type, $quantity);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Booking successful!";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo "Please submit the form.";
}

// Close connection
mysqli_close($con);
?>
