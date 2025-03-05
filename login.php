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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values safely
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        die("Username and password cannot be empty.");
    }

    // ❌ Store password in plain text (Not Secure)
    $plain_password = $password;

    // ✅ Use Prepared Statement to prevent SQL Injection
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die("SQL Error: " . mysqli_error($con));
    }

    // Bind parameters (2 strings)
    mysqli_stmt_bind_param($stmt, "ss", $username, $plain_password);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Login successful!";
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
