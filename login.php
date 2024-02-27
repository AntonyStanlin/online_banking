<?php
session_start();
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_banking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the username and password match
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Login successful, redirect to dashboard
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    // Login failed, redirect back to login page
    header("Location: index.html");
}

$conn->close();
?>
