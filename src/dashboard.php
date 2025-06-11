<?php
include("../connection.php");
include 'header.php'; 
if(!isset($_SESSION["login"])){
 header("Location:logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #ffffff;
    }

    .dashboard {
      padding: 60px 20px;
      display: flex;
      justify-content: space-between;
      gap: 60px;
     
      max-width: 800px;
      margin: 0 auto;
    }

    .card {
      width: 200px;
      height: 160px;
      border-radius: 12px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-weight: bold;
    }

    .service-card {
      background-color: #ffffff;
      border: 2px solid #4B7447;
      color: #4B7447;
      order: 1; /* Ensures service card stays on left */
    }

    .event-card {
      background-color: #4B7447;
      color: #ffffff;
      order: 2; /* Ensures event card stays on right */
    }

    .card .icon {
      font-size: 36px;
      margin-bottom: 10px;
    }

    /* Green icon for service card */
    .service-card .icon {
      color: #4B7447;
    }

    /* White icon for event card */
    .event-card .icon {
      color: #ffffff;
    }

    .card .number {
      font-size: 20px;
    }

    .card .label {
      font-size: 14px;
    }

    .card a {
      margin-top: 10px;
      font-size: 12px;
      text-decoration: underline;
      color: inherit;
    }

    /* Responsive design */
    @media (max-width: 600px) {
      .dashboard {
        flex-direction: column;
        align-items: center;
        gap: 30px;
      }
      
      .service-card {
        order: 1;
      }
      
      .event-card {
        order: 2;
      }
    }
  </style>
</head>
<body>

  <section class="dashboard">
   
    <div class="card service-card">
      <div class="icon">⚙️</div>
      <div class="number">3</div>
      <div class="label">Services</div>
      <a href="service.php">Manage services</a>
    </div>

    
    <div class="card event-card">
      <div class="icon">🥂</div>
      <div class="number">0</div>
      <div class="label">Events</div>
      <a href="event.php">Manage events</a>
    </div>
  </section>

  <?php include 'footer.php'; ?>
</body>
</html>