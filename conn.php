<?php
// Database connection details
$host = "localhost";
$dbname = "fueldb";
$user = "postgres";
$password = "kaustubh";

// Connect to the database
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_connect_error());
}

// Get form data
$username = $_POST['name'];
$password = $_POST['password'];



// Insert data into users table
$sql = "insert into register values('$username','$password')";

// Execute query
if (pg_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . pg_last_error($conn);
}

// Close connection
pg_close($conn);
?>