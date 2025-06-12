<?php
include("../connection.php");
include 'header.php';

// Get event ID from query
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid event ID.'); window.location.href='event.php';</script>";
    exit;
}

$eventId = intval($_GET['id']);

// Fetch current data
$query = "SELECT * FROM Event WHERE Event_Id = $eventId";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Event not found.'); window.location.href='event.php';</script>";
    exit;
}
$data = mysqli_fetch_assoc($result);

// Handle update
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    // Image upload
    $imagePath = $data['Image']; // Default to old image
    if (!empty($_FILES['image']['name'])) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = "uploads/";
        $targetFile = $targetDir . time() . "_" . $imageName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $update = "UPDATE Event SET Event_Title='$title', E_Description='$description', Image='$imagePath' WHERE Event_Id=$eventId";
    if (mysqli_query($connection, $update)) {
        echo "<script>
            alert('Event updated successfully.');
            window.location.href = 'event.php';
        </script>";
    } else {
        echo "<script>alert('Update failed. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Event</title>
    <style>
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            font-family: Arial, sans-serif;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #14532d;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        .form-group button {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .form-group button:hover {
            background: linear-gradient(135deg, #218838, #17a2b8);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update Event</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Event Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['Event_Title']) ?>" required>
        </div>

        <div class="form-group">
            <label>Event Description</label>
            <textarea name="description" rows="5" required><?= htmlspecialchars($data['E_Description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Event Image</label>
            <input type="file" name="image">
            <?php if (!empty($data['Image'])): ?>
                <img src="<?= htmlspecialchars($data['Image']) ?>" alt="Current Image">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <button type="submit" name="update">Update Event</button>
        </div>
    </form>
</div>

</body>
</html>
