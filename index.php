<?php
// Database credentials
$servername = "localhost";
$username = "web_user";
$password = "StrongPassword123";
$dbname = "web_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table (if it doesn't exist)
$table_query = "CREATE TABLE IF NOT EXISTS visit_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_ip VARCHAR(45) NOT NULL,
    visit_time DATETIME NOT NULL
)";
if (!$conn->query($table_query)) {
    die("Error creating table: " . $conn->error);
}

// Get visitor IP and current time
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$current_time = date("Y-m-d H:i:s");

// Insert data into the table
$insert_query = "INSERT INTO visit_log (visitor_ip, visit_time) VALUES ('$visitor_ip', '$current_time')";
if (!$conn->query($insert_query)) {
    die("Error inserting data: " . $conn->error);
}

// Display a message
echo "<h1 style='color:blue;'>Hello, Dear Visitor! 😊</h1>";
echo "<p style='color:green;'>I believe your IP is: <strong>$visitor_ip</strong></p>";
echo "<p style='color:purple;'>The current time is: <strong>$current_time</strong></p>";
echo "<footer style='margin-top:20px; color:gray; font-style:italic;'>This is a demo server for SE-Intern</footer>";

// Close the connection
$conn->close();
?>

