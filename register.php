<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'wd';

// Create a new mysqli connection
$con = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve user inputs (assuming form fields are properly named in your HTML form)
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$country = $_POST['country'];
$contact_number = $_POST['contact_number'];
$school_university = $_POST['school_university'];

// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO register (fullname, email, country, contact_number, school_university) VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);

if ($stmt) {
    // Bind parameters to the statement
    $stmt->bind_param("sssss", $fullname, $email, $country, $contact_number, $school_university);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.html");
    } else {
        header("Location: signup.html");
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle SQL statement error
    header("Location: signup.html");
}

// Close the database connection
$con->close();
?>
