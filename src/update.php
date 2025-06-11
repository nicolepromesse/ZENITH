<?php
include("../connection.php");
include 'header.php';

// Check if the ID is present
if (!isset($_GET['id'])) {
    echo "No service selected.";
    exit;
}

$service_id = $_GET['id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $summary = mysqli_real_escape_string($connection, $_POST['summary']);
    $details = mysqli_real_escape_string($connection, $_POST['details']);

    $update = "UPDATE service SET Title='$title', Summary='$summary', details_intro='$details' WHERE Service_Id='$service_id'";
    $result = mysqli_query($connection, $update);

    if ($result) {
        echo "<script>
            alert('Service updated successfully!');
            window.location.href = 'service.php';
        </script>";
    } else {
        echo "<script>alert('Failed to update service.');</script>";
    }
}

// Fetch existing data
$query = "SELECT * FROM service WHERE Service_Id='$service_id' LIMIT 1";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Service</title>

    <!-- Your existing styles -->
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
        <h2><i class="fas fa-edit"></i> Update Service</h2>
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required value="<?= htmlspecialchars($data['Title']) ?>">

            <label for="summary">Summary</label>
            <textarea name="summary" id="summary" rows="3" required><?= htmlspecialchars($data['Summary']) ?></textarea>

            <label for="details">Details</label>
            <textarea name="details" id="details" rows="6" required><?= htmlspecialchars($data['details_intro']) ?></textarea>

            <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Update Service</button>
        </form>

        <a href="service.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Services</a>
    </div>
</div>

</body>
</html>
