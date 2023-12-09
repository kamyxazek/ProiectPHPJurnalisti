<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "articole";
$approved_dbname = "aprobate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST and if articleId is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["titlu"])) {
    $articleId = $_POST["titlu"];

    // Fetch article details from 'articole' database
    $sql = "SELECT * FROM articole WHERE titlu = $articleId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch article data
        $row = $result->fetch_assoc();

        // Insert the approved article into 'aprobate' database
        $sqlInsert = "INSERT INTO $approved_dbname (titlu, autor, data, content) VALUES ('" . $row["titlu"] . "', '" . $row["autor"] . "', '" . $row["data"] . "', '" . $row["content"] . "')";
        if ($conn->query($sqlInsert) === TRUE) {
            echo "Article approved and moved to 'aprobate' database";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Article not found";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
