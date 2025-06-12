<?php
include("../connection.php");
include 'header.php';

// Get user ID from URL parameter or session
$user_id = null;
if (isset($_GET['userid'])) {
    $user_id = intval($_GET['userid']);
    $_SESSION['current_user_id'] = $user_id; // Store in session for later use
} elseif (isset($_SESSION['current_user_id'])) {
    $user_id = $_SESSION['current_user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $introduction_video = mysqli_real_escape_string($connection, $_POST['introduction_video']);
    $conclusion = mysqli_real_escape_string($connection, $_POST['conclusion']);

    $insert = "INSERT INTO service (Title, INTRODUCTION, CONCLUSION) VALUES ('$title', '$introduction_video', '$conclusion')";
    $result = mysqli_query($connection, $insert);

    if ($result) {
        // Get the ID of the newly inserted service
        $service_id = mysqli_insert_id($connection);
        
        echo "<script>
            setTimeout(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Service Added',
                    text: 'The new service has been added successfully. What would you like to do next?',
                    showCancelButton: true,
                    confirmButtonText: 'Go to Services',
                    cancelButtonText: 'Add Service Point',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'service.php" . ($user_id ? "?userid=$user_id" : "") . "';
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        window.location.href = 'service_point.php?service_id=$service_id" . ($user_id ? "&userid=$user_id" : "") . "';
                    }
                });
            }, 100);
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to add the service.',
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Service</title>

    <!-- Shared Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.js"></script>

    <style>
        body {
            background: #f8f9fa;
        }

        .main-wrapper {
            width: 100%;
            padding: 20px;
            background: #f8f9fa;
            min-height: calc(100vh - 120px);
        }

        .form-card {
            background: white;
            border-radius: 15px;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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

        label {
            font-weight: bold;
            margin-top: 20px;
            display: block;
        }

        input[type="text"], textarea {
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
    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="form-card">
        <h2><i class="fas fa-plus-circle"></i> Add New Service</h2>
        
        <?php if ($user_id): ?>
        <div class="user-info">
            <i class="fas fa-user"></i> Current User ID: <?php echo $user_id; ?>
        </div>
        <?php endif; ?>
        
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required placeholder="Enter service title">

            <label for="introduction_video">Introduction </label>
            <textarea name="introduction_video" id="introduction_video" rows="3" required placeholder="Paste intro video link or description"></textarea>

            <label for="conclusion">Conclusion</label>
            <textarea name="conclusion" id="conclusion" rows="6" required placeholder="Enter conclusion details"></textarea>

            <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Save Service</button>
        </form>

        <a href="service.php<?php echo $user_id ? "?userid=$user_id" : ""; ?>" class="back-link"><i class="fas fa-arrow-left"></i> Back to Services</a>
    </div>
</div>

</body>
</html>