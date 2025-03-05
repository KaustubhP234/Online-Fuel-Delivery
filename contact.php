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
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Check if name or email is empty
    if (empty($name) || empty($email)) {
        die("Name and Email cannot be empty.");
    }

    // ✅ Use Prepared Statement to prevent SQL Injection
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die("SQL Error: " . mysqli_error($con));
    }

    // Bind parameters (3 strings)
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Message sent successfully!";
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
