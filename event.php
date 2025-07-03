<?php
include("db.php");

$eventQuery = $connection->query("SELECT * FROM event ORDER BY Event_Id DESC LIMIT 3"); // Limit to latest 3 events
$events = $eventQuery->fetch_all(MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="mugli" />
    <title> ZENITH - Consulting & Research</title>

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


<body>



    <?php include 'header.php' ?>
    <!-- Breadcrumnd Banner Start -->

    <section class="breadcrumnd-banner cmn-bg overflow-hidden">
        <div class="container ">
            <div class="breadcrumnd-wrapper">
                <div class="breadcrumnd-content">
                    <ul class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2">
                        <li>
                            <a href="index.php"> Home </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>Events</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumnd Banner Start -->

    <!-- Contact Info Start -->


    <section class="professional-sectionv1 overflow-hidden  space-bottom space-top position-relative">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <?php if (count($events) === 0): ?>
                            <h3 class="m-title wow fadeInUp" data-wow-delay=".3s">
                                No upcoming events at the moment. Please check back soon!
                            </h3>
                        <?php else: ?>
                            <h3 class="m-title wow fadeInUp" data-wow-delay=".3s">
                                Upcoming Events
                            </h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row g-lg-4 g-3 justify-content-center">
                <?php foreach ($events as $event): ?>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="professional-item">
                            <?php
                            $finfo = finfo_open();
                            $type = finfo_buffer($finfo, $event['Image'], FILEINFO_MIME_TYPE);
                            finfo_close($finfo);

                            $imageData = base64_encode($event['Image']);

                            ?>
                            <div class="thumb mb-24" style="
    background-image: url('data:<?php echo $type; ?>;base64,<?php echo $imageData; ?>');
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 200px;
">
                            </div>
                            <div class="content">
                                <div class="mb-24">
                                    <h4 class="mb-2">
                                        <a href="#" class="black">
                                            <?php echo htmlspecialchars($event['Event_Title']); ?>
                                        </a>
                                    </h4>
                                    <span>
                                        <?php echo htmlspecialchars($event['E_Description']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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