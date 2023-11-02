<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'wd';

// Create a database connection
$con = mysqli_connect($host, $user, $pass, $db);

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

if ($new_password != $confirm_new_password) {
    header("Location: forgot.html");
    exit();
} else {
    // Remove single quotes around placeholders in the SQL query
    $sql = "UPDATE signup SET password = ? WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $new_password, $username);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.html");
    } else {
        header("Location: forgot.html");
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);
?>
