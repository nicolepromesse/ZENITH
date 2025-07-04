
<?php
include("db.php");

$services = [];
$query = "SELECT Service_Id, title, introduction FROM service";
$result = $connection->query($query);

if ($result) {
  while ($row = $result->fetch_assoc()) {
    $services[] = $row;
  }
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
  .procedure-container {
    max-width: 600px;
    margin: auto;
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .step {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    position: relative;
  }

  .step:not(:last-child)::after {
    content: '';
    position: absolute;
    left: 25px;
    /* Align with the center of the icon */
    top: 55px;
    /* Start slightly below the icon */
    height: calc(100% + 20px);
    /* Extend to connect the next step */
    width: 2px;
    background: #62af41;
  }

  .icon {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 15px;
    flex-shrink: 0;
  }

  .icon img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  .step-content h3 {
    margin: 0;
    font-size: 18px;
    color: #333;
  }

  .step-content p {
    margin: 5px 0 0;
    font-size: 14px;
    color: #555;
  }
</style>

<body>

  <?php include 'header.php' ?>
  <!-- Breadcrumnd Banner Start -->
  <section class="breadcrumnd-banner cmn-bg overflow-hidden">
    <div class="container">
      <div class="breadcrumnd-wrapper">
        <div class="breadcrumnd-content">
          <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
            <li>
              <a href="index.php"> Home </a>
            </li>
            <li>
              <i class="fa-solid fa-chevron-right"></i>
            </li>
            <li>Services</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumnd Banner Start -->

  <!-- Service Program Section Start -->

  <section class="program-sectionv1 overflow-hidden space-bottom position-relative section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-title text-center mb-60">
            <span class="sub-title wow fadeInUp p4-clr">Our Services </span>
            <p>
              At <b>ZENITH-RW LTD</b>, we offer a range of professional services designed to meet the unique needs of
              our clients. Whether you're
              looking for expert guidance, hands-on support, or customized solutions, our team is committed to
              delivering high-quality, reliable, and results-driven service. Explore what we offer and discover how we
              can help you achieve your goals with confidence.
            </p>
          </div>
        </div>
      </div>
      <div class="row align-items-center g-4">
        <?php foreach ($services as $index => $service): ?>
          <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".<?php echo ($index + 3); ?>s">
            <div class="program-item gra-border">
              <div class="icons gra-border round10 d-center">
                <img src="assets/img/aicon/icc.png" alt="icon" />
              </div>
              <div class="content">
                <h4>
                  <a href="service-details.php#<?php echo $service['Service_Id']; ?>">
                    <?php echo htmlspecialchars($service['title']); ?>
                  </a>
                </h4>
                <p>
                  <?php echo htmlspecialchars($service['introduction']); ?>
                </p>
                <a href="service-details.php?id=<?php echo $service['Service_Id']; ?>">
                  <span class="arrows mt-1">
                    <i class="fa-solid fa-arrow-right"></i>
                  </span>
                  Read More
                </a>

              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
    </div>
    </div>
  </section>




  <!--<< Footer Section Start >>-->
  <?php include 'footer.php' ?>

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