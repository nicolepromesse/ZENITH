
<?php
include("../connection.php");
include 'header.php';

// Handle form submission
if(isset($_POST['submit_event'])) {
    $event_title = mysqli_real_escape_string($connection, $_POST['event_title']);
    $event_description = mysqli_real_escape_string($connection, $_POST['event_description']);
    $image_path = '';
    
    // Handle image upload
    if(isset($_POST['image_option']) && $_POST['image_option'] == 'upload' && isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {
        $target_dir = "uploads/events/";
        
        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES["event_image"]["name"], PATHINFO_EXTENSION));
        $new_filename = "event_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        // Check if image file is valid
        $check = getimagesize($_FILES["event_image"]["tmp_name"]);
        if($check !== false) {
            // Check file size (5MB max)
            if ($_FILES["event_image"]["size"] <= 5000000) {
                // Allow certain file formats
                if($file_extension == "jpg" || $file_extension == "png" || $file_extension == "jpeg" || $file_extension == "gif") {
                    if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
                        $image_path = $target_file;
                    }
                }
            }
        }
    } 
    // Handle image URL
    elseif(isset($_POST['image_option']) && $_POST['image_option'] == 'url' && !empty($_POST['image_url'])) {
        $image_path = mysqli_real_escape_string($connection, $_POST['image_url']);
    }
    
    // Insert into database
    $insert_query = "INSERT INTO Event (Event_Title, E_Description,Image) VALUES ('$event_title', '$event_description', '$image_path')";
    $result = mysqli_query($connection, $insert_query);
    
    if($result) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Event has been added successfully.',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'event.php';
                });
            });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to add event. Please try again.'
                });
            });
        </script>";
    }
}
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

    <title>Add New Event</title>

    <style>
        .form-section {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-section * {
            box-sizing: border-box;
        }

        .form-main-wrapper {
            width: 100%;
            padding: 20px;
            margin-top: 20px;
            background: #f8f9fa;
            min-height: calc(100vh - 120px);
        }

        .form-container-card {
            width: 95%;
            max-width: 800px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 0 auto;
            position: relative;
        }

        .form-header-section {
            padding: 30px;
            text-align: center;
            color: white;
            background: linear-gradient(135deg, #14532d, #166534);
        }

        .form-header-section h1 {
            margin: 0 0 10px 0;
            font-size: 2.5rem;
            font-weight: 300;
        }

        .form-header-section p {
            margin: 0;
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .form-content {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
            font-size: 1rem;
        }

        .form-group label i {
            margin-right: 8px;
            color: #28a745;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #28a745;
            background: white;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
        }

        .form-control.textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        .image-option-group {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #e9ecef;
        }

        .image-option-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 15px;
            display: block;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .radio-option input[type="radio"] {
            width: 18px;
            height: 18px;
            accent-color: #28a745;
        }

        .radio-option label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
        }

        .image-upload-area {
            display: none;
            padding: 20px;
            border: 2px dashed #28a745;
            border-radius: 10px;
            text-align: center;
            background: white;
            transition: all 0.3s ease;
        }

        .image-upload-area.active {
            display: block;
        }

        .image-upload-area:hover {
            background: #f8fff8;
        }

        .upload-icon {
            font-size: 3rem;
            color: #28a745;
            margin-bottom: 15px;
        }

        .upload-text {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .file-input {
            display: none;
        }

        .file-input-label {
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            background: #1e7e34;
            transform: translateY(-2px);
        }

        .url-input-area {
            display: none;
        }

        .url-input-area.active {
            display: block;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: white;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        }

        .image-preview {
            margin-top: 15px;
            text-align: center;
            display: none;
        }

        .image-preview img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .form-main-wrapper {
                padding: 10px;
                margin-top: 10px;
            }

            .form-header-section h1 {
                font-size: 2rem;
            }

            .form-container-card {
                width: 98%;
            }

            .form-content {
                padding: 20px;
            }

            .radio-group {
                flex-direction: column;
                gap: 10px;
            }

            .button-group {
                flex-direction: column;
            }
        }

        .swal2-popup {
            border-radius: 15px !important;
        }
    </style>
</head>
<body>

<div class="form-section">
    <div class="form-main-wrapper">
        <div class="form-container-card">
            <div class="form-header-section">
                <h1><i class="fas fa-plus-circle"></i> Add New Event</h1>
                <p>Create a new event with details and images</p>
            </div>

            <div class="form-content">
                <form method="POST" enctype="multipart/form-data" id="eventForm">
                    
                    <!-- Event Title -->
                    <div class="form-group">
                        <label for="event_title">
                            <i class="fas fa-heading"></i> Event Title
                        </label>
                        <input type="text" id="event_title" name="event_title" class="form-control" 
                               placeholder="Enter event title..." required>
                    </div>

                    <!-- Event Description -->
                    <div class="form-group">
                        <label for="event_description">
                            <i class="fas fa-align-left"></i> Event Description
                        </label>
                        <textarea id="event_description" name="event_description" class="form-control textarea" 
                                  placeholder="Enter event description..." required></textarea>
                    </div>

                    <!-- Image Options -->
                    <div class="form-group">
                        <div class="image-option-group">
                            <label class="image-option-label">
                                <i class="fas fa-image"></i> Event Image
                            </label>
                            
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="upload_option" name="image_option" value="upload">
                                    <label for="upload_option">Upload from Device</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="url_option" name="image_option" value="url">
                                    <label for="url_option">Use Image URL</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="no_image" name="image_option" value="none" checked>
                                    <label for="no_image">No Image</label>
                                </div>
                            </div>

                            <!-- Upload Area -->
                            <div class="image-upload-area" id="uploadArea">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="upload-text">
                                    Click below to select an image file<br>
                                    <small>Supported formats: JPG, PNG, GIF (Max: 5MB)</small>
                                </div>
                                <label for="event_image" class="file-input-label">
                                    <i class="fas fa-folder-open"></i> Choose File
                                </label>
                                <input type="file" id="event_image" name="event_image" class="file-input" 
                                       accept="image/*" onchange="previewImage(this)">
                            </div>

                            <!-- URL Area -->
                            <div class="url-input-area" id="urlArea">
                                <input type="url" name="image_url" class="form-control" 
                                       placeholder="Enter image URL..." onchange="previewImageURL(this)">
                            </div>

                            <!-- Image Preview -->
                            <div class="image-preview" id="imagePreview">
                                <img id="previewImg" src="" alt="Preview">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="button-group">
                        <button type="submit" name="submit_event" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Event
                        </button>
                        <a href="event.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Events
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle image option changes
    document.querySelectorAll('input[name="image_option"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const uploadArea = document.getElementById('uploadArea');
            const urlArea = document.getElementById('urlArea');
            const imagePreview = document.getElementById('imagePreview');
            
            // Hide all areas first
            uploadArea.classList.remove('active');
            urlArea.classList.remove('active');
            imagePreview.style.display = 'none';
            
            if(this.value === 'upload') {
                uploadArea.classList.add('active');
            } else if(this.value === 'url') {
                urlArea.classList.add('active');
            }
        });
    });

    // Preview uploaded image
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Preview image from URL
    function previewImageURL(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (input.value) {
            previewImg.src = input.value;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }

    // Form validation
    document.getElementById('eventForm').addEventListener('submit', function(e) {
        const title = document.getElementById('event_title').value.trim();
        const description = document.getElementById('event_description').value.trim();
        
        if (!title || !description) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Missing Information',
                text: 'Please fill in all required fields.'
            });
        }
    });
</script>

</body>
</html>