<?php
session_start(); // Start session to store user data

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "partytreats";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a SQL statement to retrieve user with matching email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Verify password
        $hashed_password = $row['password'];
        if (password_verify($password, $hashed_password)) {
            // Password is correct, redirect to dashboard or another page
            // Store user data in session for future use
            $_SESSION['name'] = $row['name'];
            // Redirect to dashboard or another page
            header("Location: welcome.php");
            exit();
        } else {
            // Incorrect password
            echo "Invalid password";
        }
    } else {
        // User with provided email not found
        echo "User not found";
    }

    mysqli_close($conn);
}
?>
