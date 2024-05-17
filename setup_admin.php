<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "partytreats";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the admin user already exists in the database
$sql = "SELECT * FROM users WHERE Email = 'admin@example.com'";
$result = $conn->query($sql);

// If the admin user doesn't exist, insert it into the database
if ($result->num_rows == 0) {
    $admin_name = "Admin";
    $admin_email = "admin@admin.com";
    $admin_password = password_hash("adminpassword", PASSWORD_DEFAULT); // Replace "adminpassword" with the desired password

    $insert_sql = "INSERT INTO users (Name, Email, Password) VALUES ('$admin_name', '$admin_email', '$admin_password')";
    
    if ($conn->query($insert_sql) === TRUE) {
        echo "Admin user created successfully";
    } else {
        echo "Error creating admin user: " . $conn->error;
    }
} else {
    echo "Admin user already exists";
}

$conn->close();
?>
