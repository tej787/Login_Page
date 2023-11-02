<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'wd';

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check if passwords match
if ($password != $confirm_password) {
    header("Location: index.html");
    exit();
}

// Hash the password for security

// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO signup (firstname, lastname, email, username, password) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $username, $password);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: register.html");
    } else {
        header("Location: index.html");
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle SQL statement error
    header("Location: index.html");
}

mysqli_close($con);
?>
