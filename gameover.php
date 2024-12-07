<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location: signin.php');
}
if (($_SESSION['valid_referrer'])== false) {
    echo "<script>window.history.back();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Zaxisss</title>
    <style>
        .instagram-link {
            display: flex;
            align-items: center;
        }

        .instagram-link img {
            margin-right: 8px; /* Space between logo and link */
            width: 16px; /* Adjust size as needed */
            height: 16px; /* Adjust size as needed */
        }
      .navbar {
            background-color: #f8f9fa; /* Light background for contrast */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        .navbar-brand {
            font-family: 'Arial', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            color: #3498db !important;
            display: flex;
            align-items: center; /* Align logo and text vertically */
        }
        .nav-link {
            font-size: 1.1rem;
            margin-right: 15px;
            color: #555 !important;
        }
        .nav-link:hover {
            color: #2980b9 !important;
        }
        .form-control {
            width: 250px;
            border-radius: 25px; /* Rounded corners */
        }
        .btn-outline-success {
            border-radius: 25px; /* Match input rounded corners */
        }
        .btn-logout {
            background-color: #2980b9;
            color: white;
            border-radius: 25px; /* Rounded corners for consistency */
            margin-left: 10px; /* Space between buttons */
        }
        .btn-logout:hover {
            background-color: #FF0000;
        }
        .navbar-toggler {
            border: none; /* Remove border from toggler */
        }
        .navbar-toggler-icon {
            color: #2980b9; /* Toggler icon color */
        }
    .hcontainer {
        width: 80%;
        margin-left: auto; /* Center the container horizontally */
        margin-right: auto; /* Center the container horizontally */
        overflow: hidden;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 30px;
        text-align: justify;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="reset.php">
            <img src="company_logo.jpg" alt="Company Logo" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 50%;">
            Zaxisss
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="reset.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about.php">About us</a>
                </li>
                <li>
                  <a class="nav-link"><?php echo $_SESSION['username']; ?></a>
                </li> 
                <li>
                  <a class="nav-link"><?php echo "word guessed: ".$_SESSION['score']; ?></a>
                </li>
                <li>
                <a class="nav-link"><?php echo "streak: ".$_SESSION['streak']; ?></a>
                </li> 
            </ul>
            <a class="btn btn-logout" href="logout.php">Logout</a>
        </div>
    </div>
</nav>


<!-- Main Content -->
<div class="hcontainer">
    <p  style="font-size: 24px; letter-spacing: 3px; margin: 20px 0;">GAME OVERRRRRRRRRR!!!! YOU'RE DEAD FR!!! </p>
    <p style="font-size: 22px; letter-spacing: 3px; margin: 20px 0;">The word was <?php 
     $_SESSION['streak']=0;
     echo $_SESSION['word']; ?></p>
    <p><img src="hangman6.png"></p>
    <p  style="font-size: 24px; letter-spacing: 3px; margin: 20px 0;">PLAY AGAIN!!!!</p>
    <a class="btn btn-logout" href="reset.php">Retryy</a>
</div>


<div style="width: 100%; background-color: #ECEFF1; flex-shrink: 0;">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1; ">
        <!-- Section: Links  -->
        <section>
            <div class="container text-center text-md-start mt-5" style="width: 100%;">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">Zaxisss</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                        <p>Stay tuned for more games!!!!</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Products</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                        <p><a href="reset.php" class="text-dark">Hangman</a></p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Follow us</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                         <p class="instagram-link">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram logo">
                            <a href="https://www.instagram.com/z_axisss/" target="_blank" class="text-dark">Machhindra</a>
                        </p>
                        <p class="instagram-link">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram logo">
                            <a href="https://www.instagram.com/ihruyd/" target="_blank" class="text-dark">Alex</a>
                        </p>    
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;">
                        <p><i class="fas fa-home mr-3"></i> Chyasal, Lalitpur, Nepal</p>
                        <p><i class="fas fa-envelope mr-3"></i> dahalmachhindra8@gmail.com</p>
                        <p><i class="fas fa-envelope mr-3"></i> xelarai973@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i>+977 982-1234979</p>
            <p><i class="fas fa-print mr-3"></i>+977 981-8435992</p>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-dark" href="about.php">Zaxisss</a>
    </div>
  </footer>
</div>
</body>
</html>
