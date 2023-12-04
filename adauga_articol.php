<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Article</title>
    <link rel="stylesheet" href="css2.css"> 
</head>
<body>
    <h1>Add Article</h1>

    <form action="process_article.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required><br><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
// Establish database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch article details from the form
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$date = $_POST['date'];

// Prepare SQL statement to insert article into the database
$sql = "INSERT INTO articles (title, author, content, date) VALUES ('$title', '$author', '$content', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "New article added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
