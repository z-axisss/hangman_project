<?php
session_start();
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

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM hangman WHERE email='$email'";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signin Status</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <style>
        body {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .message-container {
            background: #fff7e6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .success-message {
            color: #28a745;
            font-weight: bold;
        }
        .error-message {
            color: #dc3545;
            font-weight: bold;
        }
        .message-container a {
            display: inline-block;
            margin-top: 15px;
            color: #ff7f50;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #ff7f50;
            padding: 5px 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .message-container a:hover {
            background-color: #ff7f50;
            color: white;
        }
    </style>
</head>
<body>
    <div class='message-container'>";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['score']= $row['score'];
        $_SESSION['streak']= 0;
        $_SESSION['id']= $row['user_id'];

        echo "<div class='success-message'>Signin successful. <a href='home.php'>Click here to play</a></div>";
    } else {
        echo "<div class='error-message'>Invalid password. <a href='signin.php'>Try again</a></div>";
    }
} else {
    echo "<div class='error-message'>No user found with this email. <a href='signin.php'>Try again</a></div>";
}

echo "    </div>
</body>
</html>";

$conn->close();
?>
