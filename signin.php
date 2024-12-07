<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4b6cb7, #182848);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #fff7e6;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            position: relative;
            font-family: 'Arial', sans-serif;
            font-size: 24px;
        }
        h2::after {
            content: '';
            width: 50px;
            height: 4px;
            background: #ff7f50;
            display: block;
            margin: 10px auto 0;
            border-radius: 2px;
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group input {
            padding-left: 40px;
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }
        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #ff7f50;
        }
        .btn-primary {
            background-color: #ff7f50;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #e76f42;
        }
        .company-details {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .dont-have-account {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .dont-have-account a {
            color: #ff7f50;
            text-decoration: none;
        }
        .dont-have-account a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome to Hangman Game<br>Please sign in to play</h2>
        <form action="signinprocess.php" method="POST">
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <label for="email" class="sr-only">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <label for="password" class="sr-only">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
        <div class="dont-have-account">
            <p>Don't have an account? <a href="signup.php">Click here to sign up</a></p>
        </div>
        <div class="company-details">
            <p>Zaxisss</p>
            <p>Chyasal, Lalitpur, Nepal</p>
            <p>+977 982-1234979</p>
        </div>
    </div>

</body>
</html>
