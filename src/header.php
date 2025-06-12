<?php
session_start();
if (isset($_SESSION['login']) == 1) {
    $username = $_SESSION['login'];
    include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zenith Header</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
    }

    header {
      background: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .logo-wrapper {
      display: flex;
      align-items: center;
      gap: 30px;
    }

    .logo img {
      height: 100px;
      width: auto;
    }

    nav {
      display: flex;
      align-items: center;
      flex-grow: 1;
      justify-content: space-between;
      margin-left: 30px;
    }

    .nav-center {
      flex-grow: 1;
      text-align: center;
    }

    .nav-center p {
      font-size: 18px;
      color: #225937;
      font-weight: bold;
    }

    .nav-links {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .nav-links a {
      text-decoration: none;
      color: #225937;
      font-weight: 500;
      position: relative;
      transition: color 0.3s;
      font-weight:bold;
    }

    .nav-links a:hover {
      color: green;
    }

    .nav-links a::after {
      content: "";
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0%;
      height: 2px;
      background-color: green;
      transition: width 0.3s;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .hamburger {
      display: none;
      font-size: 24px;
      cursor: pointer;
    }

    @media (max-width: 992px) {
      .nav-links {
        display: none;
      }
      .hamburger {
        display: block;
      }
      .nav-center {
        display: none;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="container">
    <div class="logo-wrapper">
      <a href="dashboard.php" class="logo">
        <img src="img/logo.jpeg" alt="Zenith Logo">
      </a>
    </div>

    <nav>
      <div class="nav-center">
        <p>Hi! <span><?php echo htmlspecialchars($_SESSION['login']); ?></span></p>
      </div>

      <div class="nav-links">
        <a href="logout.php">Logout</a>
      </div>

      <div class="hamburger">
        <i class="fas fa-bars"></i>
      </div>
    </nav>
  </div>
</header>

<?php
}
?>

</body>
</html>
