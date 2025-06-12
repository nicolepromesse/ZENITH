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
    $introduction = mysqli_real_escape_string($connection, $_POST['introduction']);
    $conclusion = mysqli_real_escape_string($connection, $_POST['conclusion']);

    // Update service main information
    $update_service = "UPDATE service SET Title='$title', INTRODUCTION='$introduction', CONCLUSION='$conclusion' WHERE Service_Id='$service_id'";
    $result_service = mysqli_query($connection, $update_service);

    // Handle service points updates
    if (isset($_POST['point_titles']) && isset($_POST['point_descriptions'])) {
        $point_ids = $_POST['point_ids'];
        $point_titles = $_POST['point_titles'];
        $point_descriptions = $_POST['point_descriptions'];

        // Update existing points
        for ($i = 0; $i < count($point_ids); $i++) {
            if (!empty($point_ids[$i])) {
                $point_id = mysqli_real_escape_string($connection, $point_ids[$i]);
                $point_title = mysqli_real_escape_string($connection, $point_titles[$i]);
                $point_desc = mysqli_real_escape_string($connection, $point_descriptions[$i]);
                
                $update_point = "UPDATE service_point SET Title='$point_title', Description='$point_desc' WHERE Point_id='$point_id' AND Service_Id='$service_id'";
                mysqli_query($connection, $update_point);
            }
        }
    }

    // Handle new points (if any)
    if (isset($_POST['new_point_titles']) && isset($_POST['new_point_descriptions'])) {
        $new_titles = $_POST['new_point_titles'];
        $new_descriptions = $_POST['new_point_descriptions'];

        for ($i = 0; $i < count($new_titles); $i++) {
            if (!empty($new_titles[$i]) && !empty($new_descriptions[$i])) {
                $new_title = mysqli_real_escape_string($connection, $new_titles[$i]);
                $new_desc = mysqli_real_escape_string($connection, $new_descriptions[$i]);
                
                $insert_point = "INSERT INTO service_point (Service_Id, Title, Description) VALUES ('$service_id', '$new_title', '$new_desc')";
                mysqli_query($connection, $insert_point);
            }
        }
    }

    if ($result_service) {
        echo "<script>
            alert('Service updated successfully!');
            window.location.href = 'service.php';
        </script>";
    } else {
        echo "<script>alert('Failed to update service.');</script>";
    }
}

// Fetch existing service data
$query = "SELECT * FROM service WHERE Service_Id='$service_id' LIMIT 1";
$result = mysqli_query($connection, $query);
$service_data = mysqli_fetch_assoc($result);

// Fetch existing service points
$points_query = "SELECT * FROM service_point WHERE Service_Id='$service_id' ORDER BY Point_id ASC";
$points_result = mysqli_query($connection, $points_query);
$service_points = [];
while ($point = mysqli_fetch_assoc($points_result)) {
    $service_points[] = $point;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-wrapper {
            width: 100%;
            padding: 20px;
            background: white;
            min-height: calc(100vh - 120px);
        }

        .form-card {
            background: white;
            border-radius: 10px;
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
        }

        .form-card h2 {
            text-align: center;
            color: #14532d;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .section-title {
            color: #14532d;
            font-size: 1.3rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        label {
            font-weight: 600;
            margin-top: 15px;
            display: block;
            color: #333;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            margin-top: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #14532d;
            box-shadow: 0 0 0 2px rgba(20, 83, 45, 0.1);
        }

        .point-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
        }

        .point-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 15px;
        }

        .point-number {
            background: #14532d;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .delete-point {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: background 0.3s ease;
        }

        .delete-point:hover {
            background: #c82333;
        }

        .btn-add-point {
            background: #17a2b8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 15px;
            transition: background 0.3s ease;
        }

        .btn-add-point:hover {
            background: #138496;
        }

        .btn-submit {
            background: #14532d;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 25px;
            margin-left: 20%;
            width: 50%;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: #0f3d21;
            transform: translateY(-2px);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #14532d;
            font-weight: 600;
            padding: 10px 15px;
            border: 1px solid #14532d;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background: #14532d;
            color: white;
        }

        .back-link i {
            margin-right: 5px;
        }

        .new-points-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px dashed #dee2e6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-card {
                padding: 20px;
                margin: 10px;
            }

            .form-section {
                padding: 15px;
            }

            .point-item {
                padding: 15px;
            }

            input[type="text"], textarea {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="main-wrapper">
    <div class="form-card">
        <h2><i class="fas fa-edit"></i> Update Service</h2>
        
        <form method="POST" id="updateForm">
            <!-- Service Main Information -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i>
                    Service Information
                </h3>
                
                <label for="title">Service Title</label>
                <input type="text" name="title" id="title" required value="<?= htmlspecialchars($service_data['Title']) ?>">

                <label for="introduction">Introduction</label>
                <textarea name="introduction" id="introduction" rows="4" required><?= htmlspecialchars($service_data['INTRODUCTION']) ?></textarea>

                <label for="conclusion">Conclusion</label>
                <textarea name="conclusion" id="conclusion" rows="4" required><?= htmlspecialchars($service_data['CONCLUSION']) ?></textarea>
            </div>

            <!-- Existing Service Points -->
            <?php if (!empty($service_points)): ?>
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-list"></i>
                    Existing Service Points
                </h3>
                
                <div id="existing-points">
                    <?php foreach ($service_points as $index => $point): ?>
                    <div class="point-item">
                        <div class="point-header">
                            <div class="point-number"><?= $index + 1 ?></div>
                           
                        </div>
                        
                        <input type="hidden" name="point_ids[]" value="<?= $point['Point_id'] ?>">
                        
                        <label>Point Title</label>
                        <input type="text" name="point_titles[]" value="<?= htmlspecialchars($point['Title']) ?>" required>
                        
                        <label>Point Description</label>
                        <textarea name="point_descriptions[]" rows="3" required><?= htmlspecialchars($point['Description']) ?></textarea>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Update Service
            </button>
        </form>

        <a href="service.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>
    </div>
</div>

<script>
let newPointCounter = 0;

function addNewPoint() {
    newPointCounter++;
    const container = document.getElementById('new-points-container');
    const pointDiv = document.createElement('div');
    pointDiv.className = 'point-item';
    pointDiv.id = 'new-point-' + newPointCounter;
    
    pointDiv.innerHTML = `
        <div class="point-header">
            <div class="point-number">New</div>
            <button type="button" class="delete-point" onclick="removeNewPoint(${newPointCounter})">
                <i class="fas fa-trash"></i> Remove
            </button>
        </div>
        
        <label>Point Title</label>
        <input type="text" name="new_point_titles[]" required>
        
        <label>Point Description</label>
        <textarea name="new_point_descriptions[]" rows="3" required></textarea>
    `;
    
    container.appendChild(pointDiv);
}

function removeNewPoint(counter) {
    const pointDiv = document.getElementById('new-point-' + counter);
    if (pointDiv) {
        pointDiv.remove();
    }
}

function deletePoint(pointId) {
    if (confirm('Are you sure you want to delete this point? This action cannot be undone.')) {
        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'delete_point.php';
        
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'point_id';
        input.value = pointId;
        
        const serviceInput = document.createElement('input');
        serviceInput.type = 'hidden';
        serviceInput.name = 'service_id';
        serviceInput.value = '<?= $service_id ?>';
        
        form.appendChild(input);
        form.appendChild(serviceInput);
        document.body.appendChild(form);
        form.submit();
    }
}

// Form validation
document.getElementById('updateForm').addEventListener('submit', function(e) {
    const title = document.getElementById('title').value.trim();
    const introduction = document.getElementById('introduction').value.trim();
    const conclusion = document.getElementById('conclusion').value.trim();
    
    if (!title || !introduction || !conclusion) {
        e.preventDefault();
        alert('Please fill in all required fields.');
        return false;
    }
});
</script>

</body>
</html>