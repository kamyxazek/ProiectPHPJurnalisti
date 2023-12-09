<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articole de aprobat</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "articole";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles from 'articole' database
$sql = "SELECT * FROM articole";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display article information and approve button
        echo "<div class='article'>";
        echo "<h2>" . $row["titlu"] . "</h2>";
        echo "<p><strong>Autor:</strong> " . $row["autor"] . "</p>";
        echo "<p><strong>Data:</strong> " . $row["data"] . "</p>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<button onclick='approveArticle(" . $row["titlu"] . ")'>Aproba</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
    function approveArticle(articleId) {
        // AJAX request to approve article and move it to 'aprobate' database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "approve_article.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert("Article approved and moved to 'aprobate' database");
                    location.reload(); // Refresh the page after approval
                } else {
                    alert("Error occurred while approving article");
                }
            }
        };
        xhr.send("articleId=" + articleId);
    }
</script>

</body>
</html>
