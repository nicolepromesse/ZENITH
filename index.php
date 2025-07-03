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
  <title>
    ZENITH - Consulting & Research
  </title>

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

</style>

<body>


  <?php include 'header.php'; ?>


  <!-- Hero Section Start -->
  <section class="bannerv2-section position-relative fix" id="scrollUp">
    <div class="mobile-overlay"></div> <!-- ONLY used on mobile -->
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-9">
          <div class="herov2-content position-relative text-white">
            <h2 class="mb-lg-5 mb-4 wow fadeInUp" data-wow-delay=".3s">
              Welcome to ZENITH
            </h2>
            <p class="mb-40 wow fadeInUp" data-wow-delay=".5s" style="font-weight: bolder; margin-right:20px">
              Your partner in management consulting, R&D, and more!
              Our mission is to leverage our expertise to foster innovation
              and support our clients in navigating complex challenges in an ever-evolving landscape
            </p>
          </div>
        </div>
      </div>
    </div>

    <img src="assets/img/new/home1.png" alt="img" class="banner-shape wow fadeInLeft" data-wow-delay=".3s"
      style="border-top-left-radius: 250px; opacity: 0.6;" />
  </section>



  <!-- Aboutv1 Section Start -->
  <section class="about-sectionv02 space-top position-relative overflow-hidden">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-8 col-md-9">
          <div class="about-contentv02">
            <div class="section-title">
              <span class="sub-title wow fadeInUp p2-clr"> About Us </span>
              <h4 class="m-title mb-3 wow fadeInUp black" data-wow-delay=".3s">
                Your partner in management consulting, R&D, and more!
              </h4>
              <p class="mb-3 pra wow fadeInUp" data-wow-delay=".4s">
                Since December 2015, ZENITH-RW LTD is dedicated to delivering high-quality services in management
                consultancy, research and development, and various professional and technical activities. Our mission is
                to leverage our expertise to foster innovation and support our clients in navigating complex challenges
                in an ever-evolving landscape.

              </p>

              <p class="pra wow fadeInUp" data-wow-delay=".5s">
                With a foundation built on
                To be a globally recognized and leading consulting firm,
                driving innovation and excellence across the domains of management,
                scientific research, and social studies. We aim to empower organizations,
                governments, and individuals with actionable insights, strategic guidance,
                and solutions that make a lasting impact on business, society, and the environment.

              </p>
              <div class="d-flex align-items-center gap-xl-3 gap-2 mt-40 wow fadeInUp" data-wow-delay=".6s">
                <a href="about.php" class="theme-btn round100 p2-bg">
                  <span class="white fw-medium"> Read More </span>
                </a>
                <a href="contact.php" class="theme-btn cart-btn round100">
                  <span class="black fw-semibold"> Contact Us </span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about-thumb-innerv2">

            <div class="right-thumb d-sm-block d-none wow fadeInDown" data-wow-delay=".5s">
              <img src="assets/img/new/house.webp" alt="img" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Faq Section Start -->
  <section class="faq-sectionv mt-60 overflow-hidden space-bottom" id="procedure">
    <div class="row align-items-center g-4">
      <div class="col-lg-6 col-md-5">
        <div class="faq-thumbs">
          <img src="assets/img/new/valuee.webp" alt="img" />
        </div>
      </div>
      <div class="col-lg-6 col-md-7">
        <div class="procedure-container">
          <div class="section-title mb-40">
            <span class="sub-title wow fadeInUp p5-clr" style="color:darkGreen;"> Our Core Values</span>

          </div>
          <div class="step">
            <div class="icon">
              <img src="assets/img/new/inter.png" alt="img" />
            </div>
            <div class="step-content">
              <h3>Integrity</h3>
              <p>
                We uphold the highest standards of honesty, transparency, and ethical conduct in every aspect of our
                work. We believe in doing the right thing, even when no one is watching,
                and building trust through openness, consistency, and accountability.
              </p>
            </div>
          </div>

          <div class="step">
            <div class="icon">
              <img src="assets/img/new/mana.png" alt="img" />
            </div>
            <div class="step-content">
              <h3>Excellence</h3>
              <p>
                We are committed to delivering exceptional quality in all our services. We aim to exceed expectations by
                applying rigorous analysis, innovative thinking,
                and a relentless pursuit of excellence in every project we undertake.
              </p>
            </div>
          </div>

          <div class="step">
            <div class="icon">
              <img src="assets/img/new/colla.png" alt="img" />
            </div>
            <div class="step-content">
              <h3>Collaboration</h3>
              <p>
                We believe in the power of teamwork, both within our organization and with our clients. By working
                together, sharing diverse perspectives, and fostering open communication,
                we create solutions that are holistic, inclusive, and better informed.
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- professional Section Start -->

  <!-- Program Section Start -->
  <section class="program-sectionv1 overflow-hidden space-bottom position-relative">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-title text-center mb-60">
            <span class="sub-title wow fadeInUp p4-clr">Our Services </span>
            <p>
              At <b>ZENITH</b>,
              we offer a range of professional services designed to meet the unique needs of our clients. Whether you're
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
  </section>

  <!-- Clone Component Section Start -->
  <?php include 'footer.php'; ?>

  <!--<< Footer Section Start >>-->
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
  <script src="assets/js/main.js" defer></script>
</body>