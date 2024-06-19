<?php
// Step 1: Database Connection Parameters
$servername = "localhost";  // Replace with your server name
$username = "mirko";     // Replace with your MySQL username
$password = "123";     // Replace with your MySQL password
$dbname = "login_sistem";  // Replace with your database name

// Step 2: Establish Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['lozinka']);  // Assuming 'lozinka' is the password field name

    // Hash the password (using PHP password_hash function)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Step 4: Insert Data into Database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        // Optionally, you can redirect to a login page or another page after successful registration
        // header("Location: login.php");
        // exit();
    } else {
        if ($conn->errno == 1062) {
            echo "Error: The username or email is already taken.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Step 5: Close Connection
$conn->close();
?>
