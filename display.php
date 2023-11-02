<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wd";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from the table
$sql = "SELECT * FROM signup";
$result = $conn->query($sql);


$sql1 = "SELECT * FROM register";
$result1 = $conn->query($sql1);

if ($result->num_rows > 0) {
    // Data found, proceed to display it
    echo "<body class='bg'>";
    echo "<link rel='stylesheet' href='display.css'>";
    echo "<h1 class='display' align='center'> Admin Display </h1>";
    echo "<table border='1' style='color:white' cellpadding='5' cellspacing='5' class='panel'>";
    echo "<tr class='a1'><th>UserName</th><th>Password</th><th>Email</th><th>Country</th><th>Contact Number</th><th>School / University</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $row1 = $result1->fetch_assoc();
        echo "<tr >";
        echo "<td >" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row1["country"] . "</td>";
        echo "<td>" . $row1["contact_number"] . "</td>";
        echo "<td>" . $row1["school_university"] . "</td>";
       
        echo "</tr>";
    }

    echo "</table>";
    echo "<div style='color: white ;' class='fack' align='center'><i>Already have an account? </i><a href='index.html' style='padding-left: 2px;'>Log In</a></div>
    <div style='color: white ;' class='fack' align='center'><i>Doesn`t have an account yet? </i><a href='singup.html' style='padding-left: 2px;'>  Sign Up</a></div>
		<div class='fack'  align='center'><a href='forgot.html'><i class='fa fa-question-circle'></i>Forgot password?</a></div>";  
    
    echo "</body>";
} else {
    echo "No data found in the table.";
}

// Close the connection
$conn->close();

?>
