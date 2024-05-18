<?php
session_start();

// Database connection settings
$host = 'localhost';
$dbname = 'testdb';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = ''; // Variable to store error message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

    // SQL query using prepared statement
    if ($username !== '' && $password !== '') {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            // Set session or do something upon successful login
            $_SESSION['user'] = $username;
            header("Location: welcome.php");
            exit;
        } else {
            $error = "Invalid username or password";
        }
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #5C67F2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type=submit]:hover {
            background-color: #4a54f1;
            transition: background-color 0.3s;
        }
        span {
            color: red;
        }
    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="" method="post">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</body>
</html>