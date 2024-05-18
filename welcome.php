<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
        }
        h1 {
            color: #4A90E2;
        }
        p {
            font-size: 16px;
            color: #666;
        }
        .logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #5C67F2;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .logout:hover {
            background-color: #4a54f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome!</h1>
        <p>You are now logged in. Explore the site and enjoy your stay.</p>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
