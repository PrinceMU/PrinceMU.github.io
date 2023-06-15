<?php
// Retrieve form inputs
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat-password'];

// Validate the inputs (you can add more validation if needed)
if (empty($email) || empty($username) || empty($password) || empty($repeatPassword)) {
    echo "Please fill in all the fields.";
} elseif ($password !== $repeatPassword) {
    header("Location: signup.html?message=invalid");
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

    // Insert user data into the database
    $sql = "INSERT INTO floodbuduser (Email, Username, Password, `Repeat Password`) VALUES ('$email', '$username', '$password', '$repeatPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('User data stored successfully.'); window.location.href = 'sign.html';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
