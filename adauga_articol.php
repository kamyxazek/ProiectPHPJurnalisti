<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Article</title>
    <link rel="stylesheet" href="css2.css"> 
</head>
<body>
    <h1>Adauga Articol</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="titlu">Titlu:</label><br>
        <input type="text" id="titlu" name="titlu" required><br><br>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>

        <label for="data">data:</label><br>
        <input type="date" id="data" name="data" required><br><br>

        <input type="submit" value="Submit">
    </form>
    </div>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "articole"; // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user inputs for security
        $title = mysqli_real_escape_string($conn, $_POST['titlu']);
        $author = mysqli_real_escape_string($conn, $_POST['autor']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $date = mysqli_real_escape_string($conn, $_POST['data']);

        // SQL query to insert data into the table
        $sql = "INSERT INTO articole (titlu, autor, content, data) VALUES ('$title', '$author', '$content', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "New record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();

        // Refresh the page
        header("Refresh:0");
    }
    ?>
</body>
</html>
