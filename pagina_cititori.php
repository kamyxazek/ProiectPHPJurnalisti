<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articole aprobate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .article {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .article h2 {
            color: #333;
        }

        .article p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Approved Articles</h1>

    <?php
    // Fetch and display approved articles
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "articole";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM articole WHERE approved = 1"; // Assuming there is a column 'approved'
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display approved article details
            echo '<div class="article">';
            echo '<h2>' . $row['titlu'] . '</h2>';
            echo '<p>Author: ' . $row['autor'] . '</p>';
            echo '<p>Date: ' . $row['data'] . '</p>';
            echo '<p>' . $row['content'] . '</p>';
            echo '</div>';
        }
    } else {
        echo "No approved articles to display";
    }

    $conn->close();
    ?>
</body>
</html>
