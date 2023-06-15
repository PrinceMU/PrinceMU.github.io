<?php
// Retrieve form inputs
$username = $_POST['username'];
$password = $_POST['password'];
//$repeatPassword = $_POST['repeat-password'];

// Validate the inputs (you can add more validation if needed)
if (empty($username) || empty($password)) {
    echo "Please fill in both fields.";
} else {
    // Connect to MySQL database (adjust the parameters accordingly)
    $host = 'localhost';
    $database = 'floodbud_db';
    $usernamefb = 'root';
    $passwordfb = '';

    $conn = mysqli_connect($host, $usernamefb, $passwordfb, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM floodbuduser WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Redirect the user to testlocate.html
        header("Location: testlocate.html");
        exit(); // Make sure to exit the script after the redirection
    } else {
        header("Location: sign.html?message=invalid");
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

