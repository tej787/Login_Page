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

// Get username and password from user input (replace with your form field names)
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to retrieve the user's information
$sql = "SELECT * FROM signup WHERE username = ?";

$stmt = mysqli_prepare($con, $sql);
$stmt->bind_param("s", $username); // Bind the username variable
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$pass = $row['password'];




if($password == $pass){
    header("Location:fileupload.html");
    exit();
    
}

else{
    header("Location:index.html");
    exit();
}
?>
