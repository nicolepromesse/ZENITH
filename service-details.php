<?php
include("db.php"); // adjust if needed

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die("Invalid service ID.");
}

$service_id = intval($_GET['id']);
$query = "SELECT * FROM service WHERE Service_Id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $service_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  die("Service not found.");
}

$service = $result->fetch_assoc();
$points = [];
$pointQuery = $connection->prepare("SELECT * FROM service_point WHERE Service_Id = ?");
$pointQuery->bind_param("i", $service_id);
$pointQuery->execute();
$pointResult = $pointQuery->get_result();

while ($row = $pointResult->fetch_assoc()) {
    $points[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
  <!-- ========== Meta Tags ========== -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ZENITH - Consulting & Research</title>
  <meta name="description"
    content="Horizon Hearts offers ABA therapy, speech therapy, and mental health services for autism and special needs individuals in Rwanda." />
  <meta name="keywords" content="ABA, mental health, speech therapy, autism, special needs, therapy, Rwanda" />
  <!--<< Favcion >>-->
  <link rel="shortcut icon" href="assets/img/favicon.ico" />
  <!--<< Bootstrap min.css >>-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <!--<< All Min Css >>-->
  <link rel="stylesheet" href="assets/css/all.min.css" />
  <!--<< Animate.css >>-->
  <link rel="stylesheet" href="assets/css/animate.css" />
  <!--<< Icomoon.css >>-->
  <link rel="stylesheet" href="assets/css/icomoon.css" />
  <!--<< Magnific Popup.css >>-->
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />
  <!--<< MeanMenu.css >>-->
  <link rel="stylesheet" href="assets/css/meanmenu.css" />
  <!--<< Swiper Bundle.css >>-->
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
  <!--<< Nice Select.css >>-->
  <link rel="stylesheet" href="assets/css/nice-select.css" />
  <!--<< Main.css >>-->
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<style>
  .whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #25d366;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    text-decoration: none;
    z-index: 1000;
  }

  .whatsapp-float:hover {
    background-color: #1ebe5d;
  }
</style>

<body>
  <?php include 'header.php' ?>

  <!-- Breadcrumnd Banner Start -->
  <section class="breadcrumnd-banner cmn-bg overflow-hidden ">
    <div class="container mt-5">
      <div class="breadcrumnd-wrapper">
        <div class="breadcrumnd-content">

          <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
            <li>
              <a href="index.php"> Home </a>
            </li>
            <li>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>Service Details</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumnd Banner Start -->

  <!-- Service Details Section Start -->
  <section class="faq-sectionv mt-60 overflow-hidden space-bottom">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-6 col-md-5">
          <div class="faq-thumbs">
            <img src="assets/img/new/favo.jpg" alt="img" />
          </div>
        </div>
        <div class="col-lg-6 col-md-7">
          <div class="faq-content">
            <div class="section-title mb-40">
              <span class="sub-title wow fadeInUp p5-clr">
                <?php echo htmlspecialchars($service['Title']); ?>
              </span>
              <p>
                <?php echo htmlspecialchars($service['INTRODUCTION']); ?>
              </p>

            </div>
            <div class="tab-faq faq">
              <div class="accordion-section d-grid gap-xxl-4 gap-lg-3 gap-2">
  <?php foreach ($points as $point): ?>
    <div class="accordion-single">
      <h5 class="header-area">
        <button class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                type="button">
          <?php echo htmlspecialchars($point['Title']); ?>
        </button>
      </h5>
      <div class="content-area">
        <div class="content-body">
          <p>
            <?php echo htmlspecialchars($point['Description']); ?>
          </p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include 'footer.php'; ?>
  <!--<< All JS Plugins >>-->
  <script src="assets/js/jquery-3.7.1.min.js"></script>
  <!--<< Viewport Js >>-->
  <script src="assets/js/viewport.jquery.js"></script>
  <!--<< Bootstrap Js >>-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--<< Nice Select Js >>-->
  <script src="assets/js/jquery.nice-select.min.js"></script>
  <!--<< Waypoints Js >>-->
  <script src="assets/js/jquery.waypoints.js"></script>
  <!--<< Counterup Js >>-->
  <script src="assets/js/jquery.counterup.min.js"></script>
  <!--<< Swiper Slider Js >>-->
  <script src="assets/js/swiper-bundle.min.js"></script>
  <!--<< MeanMenu Js >>-->
  <script src="assets/js/jquery.meanmenu.min.js"></script>
  <!--<< Magnific Popup Js >>-->
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <!--<< Wow Animation Js >>-->
  <script src="assets/js/wow.min.js"></script>
  <!--<< Main.js >>-->
  <script src="assets/js/main.js"></script>
</body>

</html>