<?php
include("../connection.php");
include 'header.php';

$query = "SELECT * FROM service ORDER BY Service_id DESC";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }
        .service-card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        .service-title {
            font-size: 1.5rem;
            color: #14532d;
            margin-bottom: 10px;
        }
        .service-summary {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }
        .service-details {
            color: #333;
            font-size: 1rem;
            line-height: 1.5;
            white-space: pre-line; /* preserves newlines */
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align:center; color:#14532d;">Available Services</h2>

    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="service-card">
            <div class="service-title"><i class="fas fa-tools"></i> <?= htmlspecialchars($row['Title']) ?></div>
            <div class="service-summary"><?= htmlspecialchars($row['Summary']) ?></div>
            <div class="service-details"><?= nl2br(htmlspecialchars($row['details_intro'])) ?></div>
        </div>
        <a href="service.php" class="back-link" style="color: darkgreen;"><i class="fas fa-arrow-left"></i> Back to Services</a>
    </div>
    <?php endwhile; ?>

</div>

</body>
</html>
