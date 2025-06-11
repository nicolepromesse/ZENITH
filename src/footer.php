<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.footer {
  background-color: #D5D3B1;
  color: #000;
  padding: 40px 20px 20px;
  font-family: Arial, sans-serif;
}

.footer-top {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
}

.footer-logo img {
  width: 80px;
  margin-bottom: 10px;
}

.footer-logo p {
  font-size: 14px;
  max-width: 220px;
}

.footer-links,
.footer-contact {
  min-width: 200px;
}

.footer-links h4,
.footer-contact h4 {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

.footer-links ul {
  list-style: none;
  padding: 0;
}

.footer-links ul li {
  margin-bottom: 8px;
}

.footer-links ul li a,
.footer-contact a {
  text-decoration: none;
  color: #000;
}

.footer-contact p {
  margin: 6px 0;
  font-size: 14px;
}

.footer-bottom {
  text-align: center;
  margin-top: 30px;
  border-top: 1px solid #aaa;
  padding-top: 10px;
  font-size: 14px;
}


    </style>
</head>
<body>
    <footer class="footer">
  <div class="footer-top">
    <div class="footer-logo">
      <img src="img/nobglogo.png" alt="Zenith Logo">
      <p>Your partner in management consulting, R&D, and more!</p>
    </div>

    <div class="footer-links">
      <h4>Pages</h4>
      <ul>
        <li><a href="services.php">Services</a></li>
        <li><a href="Events.php">Events</a></li>
        <li><a href="contacts.php">Contact Us</a></li>
      </ul>
    </div>

    <div class="footer-contact">
      <h4>Contact Us</h4>
      <p>KK 31 Ave Gikondo,<br>Kigali, Rwanda</p>
      <p>Email: info@zenith-rw.com</p>
      <p>📞 <a href="tel:+250785755226">+ (250) 785755226</a></p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>©Copyright @Zenith-Rw 2025</p>
  </div>
</footer>

</body>
</html>