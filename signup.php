<?php
$servername = "localhost";
$username = "fbmanager";
$password = "fbmanager123";
$dbname = "floodbud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$user = mysqli_real_escape_string($conn, $_REQUEST['username']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);

// Attempt insert query execution
$sql = "INSERT INTO Users (username, password) VALUES ('$user', '$pass')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
