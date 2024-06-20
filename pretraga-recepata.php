<?php
// Detalji konekcije
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sajt_bp";

// Povezivanje
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uzima search input (tekst) i filter opciju
$searchInput = isset($_GET['searchInput']) ? $_GET['searchInput'] : '';
$dietType = isset($_GET['dietType']) ? $_GET['dietType'] : '';

// SQL upit
$sql = "SELECT titl, keywords, link FROM recepti WHERE titl LIKE ?";

// Dodajemo filter za dietType ako je izabran
$params = ["%{$searchInput}%"];
if (!empty($dietType)) {
    $sql .= " AND keywords LIKE ?";
    $params[] = "%{$dietType}%";
}

$stmt = $conn->prepare($sql);

// Bind parameters
$types = str_repeat("s", count($params));
$stmt->bind_param($types, ...$params);

// Execute query
if ($stmt->execute()) {
    $result = $stmt->get_result();

    // Prikaz rezultata kao JSON
    $recipes = [];
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }

    // For debugging: log the recipes
    error_log(print_r($recipes, true));

    echo json_encode($recipes);
} else {
    // Handle query execution error
    echo json_encode(["error" => "Query execution failed: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
