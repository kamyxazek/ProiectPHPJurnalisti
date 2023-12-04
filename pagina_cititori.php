<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Bine ati venit la noi pe site!</h1>
        <div class="registration" id="registration1">
        <h2>Title: Article Title 1</h2>
        <p>Author: John Doe</p>
        <p>Date: January 1, 2023</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

    <div class="registration" id="registration2">
        <h2>Title: Article Title 2</h2>
        <p>Author: Jane Smith</p>
        <p>Date: February 15, 2023</p>
        <p>Nulla facilisi. Ut fringilla.</p>
    </div>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>