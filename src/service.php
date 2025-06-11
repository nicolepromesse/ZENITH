<?php
include("../connection.php");
include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css">

    <title>Service Management</title>

    <style>
        .table-section {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-section * {
            box-sizing: border-box;
        }

        .table-main-wrapper {
            width: 100%;
            padding: 20px;
            margin-top: 20px;
            background:#f8f9fa;
            min-height: calc(100vh - 120px);
        }

        .table-container-card {
            width: 95%;
            max-width: 1200px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 0 auto;
            position: relative;
        }

        .table-header-section {
            padding: 30px;
            text-align: center;
            color: white;
            background: linear-gradient(135deg, #14532d, #166534);
        }

        .table-header-section h1 {
            margin: 0 0 10px 0;
            font-size: 2.5rem;
            font-weight: 300;
        }

        .table-header-section p {
            margin: 0;
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .table-add-btn-container {
            padding: 10px 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }

        .table-add-btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .table-add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }

        .table-add-btn i {
            margin-right: 8px;
        }

        .services-table-container {
            overflow-x: auto;
            padding: 0;
        }

        .services-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }

        .services-table thead {
            background: linear-gradient(135deg, #14532d, #166534);
            color: white;
        }

        .services-table th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
        }

        .services-table th:last-child {
            text-align: center;
            width: 150px;
        }

        .services-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e9ecef;
        }

        .services-table tbody tr:hover {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .services-table td {
            padding: 18px 15px;
            vertical-align: middle;
        }

        .title-cell {
            font-weight: 600;
            color: #495057;
        }

        .summary-cell {
            color: #6c757d;
            line-height: 1.5;
            max-width: 400px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
            align-items: center;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            border: 2px solid transparent;
        }

        .view-btn {
            background: linear-gradient(135deg, #17a2b8, #20c997);
            color: white;
        }

        .view-btn:hover {
            background: linear-gradient(135deg, #138496, #1e7e34);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(23, 162, 184, 0.4);
        }

        .edit-btn {
            background: linear-gradient(135deg, #ffc107, #fd7e14);
            color: white;
        }

        .edit-btn:hover {
            background: linear-gradient(135deg, #e0a800, #dc6545);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }

        .delete-btn {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
        }

        .delete-btn:hover {
            background: linear-gradient(135deg, #c82333, #a71e2a);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }

        .no-data i {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .table-main-wrapper {
                padding: 10px;
                margin-top: 10px;
            }

            .table-header-section h1 {
                font-size: 2rem;
            }

            .table-container-card {
                width: 98%;
            }

            .services-table {
                font-size: 0.85rem;
            }

            .services-table th, .services-table td {
                padding: 12px 8px;
            }

            .action-btn {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }

            .summary-cell {
                max-width: 200px;
            }
        }

        .swal2-popup {
            border-radius: 15px !important;
        }
    </style>
</head>
<body>

<div class="table-section">
    <div class="table-main-wrapper">
        <div class="table-container-card">
            <div class="table-header-section">
                <h1><i class="fas fa-cogs"></i> Service Management</h1>
              
            </div>

            <div class="table-add-btn-container">
                <form method="post" style="margin: 0;">
                    <button type="submit" name="lt" class="table-add-btn">
                       <a href="add.php" style="color:white">
                        <i class="fas fa-plus" ></i> Add New Service
                       </a>
                    </button>
                </form>
            </div>

            <div class="services-table-container">
                <table class="services-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-heading"></i> Title</th>
                            <th><i class="fas fa-align-left"></i> Summary</th>
                            <th><i class="fas fa-tools"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select = "SELECT * FROM service ORDER BY Service_id DESC";
                        $Query = mysqli_query($connection, $select);
                        
                        if(mysqli_num_rows($Query) > 0) {
                            while($fecht = mysqli_fetch_array($Query)) {
                                ?>
                                <tr>
                                    <td class="title-cell"><?php echo htmlspecialchars($fecht['Title']); ?></td>
                                    <td class="summary-cell"><?php echo htmlspecialchars($fecht['Summary']); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="view_service.php?id=<?= htmlspecialchars($fecht['Service_Id']) ?>" class="action-btn view-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="update.php?id=<?= htmlspecialchars($fecht['Service_Id']) ?>" class="action-btn edit-btn" title="Edit Service">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="action-btn delete-btn" title="Delete Service" onclick="confirmDelete(<?= htmlspecialchars($fecht['Service_Id']) ?>)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3" class="no-data">
                                    <i class="fas fa-inbox"></i><br>
                                    No services found. Click "Add New Service" to get started!
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(serviceId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'service.php?del=' + serviceId;
            }
        });
    }

    <?php if(isset($_GET['deleted']) && $_GET['deleted'] == 'success'): ?>
    Swal.fire({
        icon: 'success',
        title: 'Deleted!',
        text: 'Service has been deleted successfully.',
        timer: 2000,
        showConfirmButton: false
    });
    <?php endif; ?>
</script>

<?php
if(isset($_GET['del'])) {
    $gy = intval($_GET['del']);
    $rt = "DELETE FROM service WHERE Service_Id = $gy";
    $mysql = mysqli_query($connection, $rt);
    
    if($mysql) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'Service has been deleted successfully.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'service.php?deleted=success';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to delete the service. Please try again.',
            });
        </script>";
    }
}
?>
</body>
</html>
