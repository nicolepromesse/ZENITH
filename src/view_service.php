<?php
include("../connection.php");
include 'header.php';

// Get service ID from URL parameter
$service_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($service_id > 0) {
    // Your original query to get service with all points
    $query = "SELECT service.Service_Id,
                service.Title,
                service.INTRODUCTION,
                service.CONCLUSION,
                service_point.Point_id,
                service_point.Title AS Title_point,
                service_point.Description
            FROM service
            LEFT JOIN service_point ON service.Service_Id = service_point.Service_Id
            WHERE service.Service_Id = ?
            ORDER BY service_point.Point_id ASC";
    
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $service_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $service_data = [];
    $service_info = null;
    
    while ($row = mysqli_fetch_assoc($result)) {
        if (!$service_info) {
            $service_info = [
                'id' => $row['Service_Id'],
                'title' => $row['Title'],
                'introduction' => $row['INTRODUCTION'],
                'conclusion' => $row['CONCLUSION']
            ];
        }
        
        if ($row['Point_id']) {
            $service_data[] = [
                'point_id' => $row['Point_id'],
                'title' => $row['Title_point'],
                'description' => $row['Description']
            ];
        }
    }
} else {
    $service_info = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $service_info ? htmlspecialchars($service_info['title']) : 'Service Details' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #14532d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background: #0f3d21;
        }

        .service-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .service-title {
            font-size: 2rem;
            color: #14532d;
            margin-bottom: 15px;
        }

        .service-intro {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #14532d;
        }

        .service-conclusion {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
            margin-top: 20px;
            padding: 15px;
            background: #f0f8f0;
            border-radius: 5px;
            border-left: 4px solid #14532d;
        }

        .conclusion-title {
            font-weight: bold;
            color: #14532d;
            margin-bottom: 10px;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background: #14532d;
            color: white;
            padding: 15px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 1rem;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }

        tr:hover {
            background: #e8f5e8;
        }

        .point-id {
            font-weight: bold;
            color: #14532d;
            text-align: center;
            width: 80px;
        }

        .point-title {
            font-weight: 600;
            color: #14532d;
            min-width: 200px;
        }

        .point-description {
            line-height: 1.5;
            color: #555;
        }

        .no-service {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-service i {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }

            .service-title {
                font-size: 1.5rem;
            }

            th, td {
                padding: 10px 8px;
                font-size: 0.9rem;
            }

            .table-container {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            th, td {
                padding: 8px 6px;
                font-size: 0.8rem;
            }

            .service-title {
                font-size: 1.3rem;
            }

            .back-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../src/service.php" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Services
        </a>

        <?php if ($service_info): ?>
            <!-- Service Header -->
            <div class="service-header">
                <h1 class="service-title">
                    <i class="fas fa-cogs"></i>
                    <?= htmlspecialchars($service_info['title']) ?>
                </h1>
                
                <?php if ($service_info['introduction']): ?>
                    <div class="service-intro">
                        <strong>Introduction:</strong><br>
                        <?= nl2br(htmlspecialchars($service_info['introduction'])) ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Service Points Table -->
            <?php if (!empty($service_data)): ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Point ID</th>
                                <th>Point Title</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($service_data as $point): ?>
                                <tr>
                                    <td class="point-id"><?= htmlspecialchars($point['point_id']) ?></td>
                                    <td class="point-title"><?= htmlspecialchars($point['title']) ?></td>
                                    <td class="point-description"><?= nl2br(htmlspecialchars($point['description'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Point ID</th>
                                <th>Point Title</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" style="text-align: center; padding: 30px; color: #666;">
                                    No service points available for this service.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <!-- Service Conclusion -->
            <?php if ($service_info['conclusion']): ?>
                <div class="service-conclusion">
                    <div class="conclusion-title">Conclusion:</div>
                    <?= nl2br(htmlspecialchars($service_info['conclusion'])) ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- No Service Found -->
            <div class="no-service">
                <i class="fas fa-exclamation-circle"></i>
                <h3>Service Not Found</h3>
                <p>The requested service could not be found. Please check the URL or go back to services.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>