<?php
include("../connection.php");
include 'header.php';

if (!isset($_GET['service_id'])) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Missing Service ID',
            text: 'Service ID not provided in the URL.'
        }).then(() => {
            window.location.href = 'service.php';
        });
    </script>";
    exit;
}

$service_id = intval($_GET['service_id']);
$user_id = null;
if (isset($_GET['userid'])) {
    $user_id = intval($_GET['userid']);
    $_SESSION['current_user_id'] = $user_id;
} elseif (isset($_SESSION['current_user_id'])) {
    $user_id = $_SESSION['current_user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($connection, $_POST['title_service_point']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    $insert = "INSERT INTO service_point (Service_Id, Title, Description) 
               VALUES ('$service_id', '$title', '$description')";
    $result = mysqli_query($connection, $insert);

    if ($result) {
        echo "<script>
            console.log('Form submitted successfully, showing alert');
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOM loaded, executing SweetAlert');
                Swal.fire({
                    icon: 'success',
                    title: 'Service Point Added Successfully',
                    text: 'The service point has been added successfully.',
                    showCancelButton: true,
                    confirmButtonText: 'Add Service Point',
                    cancelButtonText: 'Go To Service',
                    reverseButtons: true,
                    customClass: {
                        confirmButton: 'swal-btn-confirm',
                        cancelButton: 'swal-btn-cancel'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    console.log('Alert closed, result:', result);
                    if (result.isConfirmed) {
                        window.location.href = 'Service_Point.php?service_id=$service_id" . ($user_id ? "&userid=$user_id" : "") . "';
                    } else {
                        window.location.href = 'service.php" . ($user_id ? "?userid=$user_id" : "") . "';
                    }
                });
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to add the service point.'
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Service Point</title>

    <!-- Shared Styles & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.js"></script>

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-wrapper {
            width: 100%;
            padding: 20px;
            min-height: calc(100vh - 120px);
        }

        .form-card {
            background: white;
            border-radius: 15px;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-card h2 {
            text-align: center;
            color: #14532d;
            margin-bottom: 30px;
        }

        .user-info {
            background: #e8f5e8;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            color: #14532d;
        }

        .service-info {
            background: #e3f2fd;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            color: #1565c0;
        }

        label {
            font-weight: bold;
            margin-top: 20px;
            display: block;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin-top: 8px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 25px;
            width: 100%;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #218838, #17a2b8);
            transform: translateY(-2px);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #14532d;
        }

        .back-link i {
            margin-right: 5px;
        }

        /* SweetAlert2 custom buttons */
        .swal-btn-confirm {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            padding: 10px 20px;
            border: none;
            margin: 0 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .swal-btn-cancel {
            background-color: #6c757d;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            padding: 10px 20px;
            border: none;
            margin: 0 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .swal-btn-confirm:hover {
            background-color: #218838;
        }

        .swal-btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="form-card">
        <h2><i class="fas fa-plus-circle"></i> Add Service Point</h2>
        
        <?php if ($user_id): ?>
        <div class="user-info">
            <i class="fas fa-user"></i> Current User ID: <?php echo $user_id; ?>
        </div>
        <?php endif; ?>
        
        <div class="service-info">
            <i class="fas fa-cog"></i> Service ID: <?php echo $service_id; ?>
        </div>
        
        <form method="POST">
            <label for="service_id">Service ID</label>
            <input type="number" name="service_id" id="service_id" value="<?php echo $service_id; ?>" readonly>

            <label for="title_service_point">Service Point Title</label>
            <input type="text" name="title_service_point" id="title_service_point" required placeholder="Enter service point title">

            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required placeholder="Enter description"></textarea>

            <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Save Service Point</button>
        </form>

        <a href="service.php<?php echo $user_id ? "?userid=$user_id" : ""; ?>" class="back-link"><i class="fas fa-arrow-left"></i> Back to Services</a>
    </div>
</div>

</body>
</html>