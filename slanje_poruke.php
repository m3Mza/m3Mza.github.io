<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $ime = htmlspecialchars($_POST['ime']);
    $poruka = htmlspecialchars($_POST['poruka']);
    
    // Validate and sanitize data (you can add more validation as needed)
    // Example: Validate email format, check for required fields
    
    // Insert into database
    $servername = "localhost"; // Replace with your server name
    $username = "username"; // Replace with your database username
    $password = "password"; // Replace with your database password
    $dbname = "kontakt_forma"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO Poruke (ime, poruka) VALUES (?, ?)");
    $stmt->bind_param("ss", $ime, $poruka);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Data inserted successfully
        $conn->close();

        // Send email
        $to = "mimamirkop@gmail.com"; // Replace with your email address
        $subject = "Nova poruka sa kontakt forme";
        $message = "Ime: $ime\nPoruka: $poruka";
        $headers = "From: webmaster@example.com"; // Replace with your email or leave empty
        
        mail($to, $subject, $message, $headers);

        // Respond to the client
        http_response_code(200); // OK status
    } else {
        // Error inserting data
        http_response_code(500); // Server error status
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed status
}
?>
