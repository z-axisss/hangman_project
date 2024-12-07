<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "project"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO hangman (username, email, password ) VALUES ('$user', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='message'>Signup successful. <a href='signin.php' class='login-link'>Click here to login</a></div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Status</title>
    <style>
        body {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .message {
            background: #fff7e6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-link {
            color: #ff7f50;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #ff7f50;
            padding: 5px 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .login-link:hover {
            background-color: #ff7f50;
            color: white;
        }
    </style>
</head>
<body>
</body>
</html>
