<?php
// Database connection code (replace with your actual database credentials)
$servername = "localhost";
$username = "aibek";
$password = "";
$dbname = "fitnes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is provided in the GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to fetch data based on ID
    $sql = "SELECT * FROM Food_Lose WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<strong>Recipe Ingredient Parts:</strong><br>{$row['Recipe_Ingredient_Parts']}<br>";
            echo "<strong>Recipe Instructions:</strong><br>{$row['Recipe_Instructions']}<br>";
        }
    } else {
        echo "No data found for ID: $id";
    }
}

$conn->close();
?>
