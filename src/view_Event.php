<?php
include("../connection.php");
include 'header.php';

// Get event ID from URL
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch event details
$event_data = null;
if($event_id > 0) {
    $select_query = "SELECT * FROM Event WHERE Event_Id = $event_id";
    $result = mysqli_query($connection, $select_query);
    
    if($result && mysqli_num_rows($result) > 0) {
        $event_data = mysqli_fetch_array($result);
    }
}

// If no event found, redirect back
if(!$event_data) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Event Not Found',
                text: 'The requested event could not be found.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'event.php';
            });
        });
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Event - <?php echo $event_data ? htmlspecialchars($event_data['Event_Title']) : 'Event Details'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles and SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css">

    <style>
        /* Same styles as before (truncated for brevity) */
        body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; margin: 0; }
        .view-section { padding: 20px; }
        .view-container-card { max-width: 900px; margin: auto; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .view-header-section { background: linear-gradient(135deg, #14532d, #166534); color: white; padding: 30px; text-align: center; }
        .back-btn-container { padding: 20px; border-bottom: 1px solid #e9ecef; }
        .back-btn { background: #495057; color: white; padding: 10px 20px; border-radius: 20px; text-decoration: none; display: inline-block; }
        .event-detail-section { padding: 30px; background: #f1f3f5; border-left: 5px solid #198754; margin-bottom: 20px; border-radius: 10px; }
        .detail-header { font-size: 1.2rem; font-weight: 600; margin-bottom: 10px; color: #14532d; }
        .detail-content { color: #495057; line-height: 1.6; }
        .event-image-container { width: 100%; height: 300px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); cursor: pointer; }
        .event-image-container:hover { transform: scale(1.02); transition: 0.3s ease; }
        .no-image-placeholder { background: #e9ecef; padding: 40px; text-align: center; border-radius: 15px; color: #6c757d; font-size: 1.1rem; }
        .image-section p { margin-top: 15px; color: #6c757d; font-style: italic; }

        /* Image Modal */
        .image-modal { display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.8); cursor: pointer; }
        .modal-content { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 90%; max-height: 90%; border-radius: 15px; }
        .close-modal { position: absolute; top: 20px; right: 30px; color: white; font-size: 2rem; cursor: pointer; }
    </style>
</head>
<body>

<div class="view-section">
    <div class="view-container-card">
        <div class="view-header-section">
            <h1><i class="fas fa-eye"></i> Event Details</h1>
            <p>View complete event information</p>
        </div>

        <div class="back-btn-container">
            <a href="event.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Events</a>
        </div>

        <?php if($event_data): ?>
        <div class="event-content">
            <!-- Event Title -->
            <div class="event-detail-section">
                <div class="detail-header"><i class="fas fa-heading"></i> Event Title</div>
                <div class="detail-content"><?php echo htmlspecialchars($event_data['Event_Title']); ?></div>
            </div>

            <!-- Event Description -->
            <div class="event-detail-section">
                <div class="detail-header"><i class="fas fa-align-left"></i> Event Description</div>
                <div class="detail-content"><?php echo nl2br(htmlspecialchars($event_data['E_Description'])); ?></div>
            </div>

            <!-- Event Image -->
            <div class="event-detail-section">
                <div class="detail-header"><i class="fas fa-image"></i> Event Image</div>
                <div class="detail-content image-section">
                    <?php if (!empty($event_data['Image'])): ?>
                        <div class="event-image-container" 
                             style="background-image: url('<?php echo htmlspecialchars($event_data['Image']); ?>'); background-size: cover; background-position: center;" 
                             onclick="openImageModal('<?php echo htmlspecialchars($event_data['Image']); ?>')">
                        </div>
                        <p><i class="fas fa-info-circle"></i> Click image to view full size</p>
                    <?php else: ?>
                        <div class="no-image-placeholder">
                            <i class="fas fa-image-slash fa-2x"></i><br>
                            No image available for this event
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="image-modal" onclick="closeImageModal()">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<script>
function openImageModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    modal.style.display = 'block';
    modalImg.src = imageSrc;
}

function closeImageModal() {
    document.getElementById('imageModal').style.display = 'none';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeImageModal();
});

document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.event-detail-section');
    sections.forEach((section, index) => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        setTimeout(() => {
            section.style.transition = 'all 0.6s ease';
            section.style.opacity = '1';
            section.style.transform = 'translateY(0)';
        }, index * 200);
    });
});
</script>

</body>
</html>
