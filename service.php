<?php include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
  <!--<< Header Area >>-->

  <head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ZENITH-RW  - Consulting & Research</title>
    <meta name="description" content="Horizon Hearts offers ABA therapy, speech therapy, and mental health services for autism and special needs individuals in Rwanda." />
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
    left: 25px; /* Align with the center of the icon */
    top: 55px; /* Start slightly below the icon */
    height: calc(100% + 20px); /* Extend to connect the next step */
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
    <a href="https://wa.me/250785628198" target="_blank" class="whatsapp-float">
      <i class="fab fa-whatsapp"></i>
    </a>

    

    <!-- Breadcrumnd Banner Start -->
    <section class="breadcrumnd-banner cmn-bg overflow-hidden space-top">
      <div class="container mt-5">
        <div class="breadcrumnd-wrapper">
          <div class="breadcrumnd-content">
            <ul
              class="bread-list d-flex align-items-center gap-lg-4 gap-md-3 gap-2"
            >
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
    <section
      class="program-sectionv1 overflow-hidden space-bottom position-relative section-padding"
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="section-title text-center mb-60">
              <span class="sub-title wow fadeInUp p4-clr">Our Services </span>
              <p>
                At <b>ZENITH-RW LTD</b>, we provide
                <b>we provides comprehensive</b>  management consultancy services aimed at enhancing 
                organizational performance and achieving strategic goals
                Our team of experienced consultants offers tailored solutions
                 across several key areas
              </p>
            </div>
          </div>
        </div>
        <div class="row align-items-center g-4">
          <div
            class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp"
            data-wow-delay=".3s"
          >
            <div class="program-item gra-border">
              <div class="icons gra-border round10 d-center">
                <img src="assets/img/aicon/car-icons1.png" alt="img" />
              </div>
              <div class="content">
              <h4>
                  <a href="#">Management Consultancy</a>
                </h4>
                <p>
                ZENITH-RW LTD provides comprehensive management consultancy services aimed at enhancing organizational performance and achieving strategic goals.

Our team of experienced consultants offers tailored solutions across several key areas
                </p>
              
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp"
            data-wow-delay=".4s"
          >
            <div class="program-item gra-border">
              <div class="icons gra-border round10 d-center">
                <img src="assets/img/aicon/car-icons2.png" alt="img" />
              </div>
              <div class="content">
              <h4>
                  <a href="#">
                  Strategic Planning</a
                  >
                </h4>
                <p>
                We assist organizations in defining their vision, mission, 
                and long-term objectives, 
                developing actionable plans that align with their core values.<b> Operational Improvement:</b>
                Our consultants analyze existing processes, identifying opportunities 
                for optimization that enhance productivity and reduce operational costs.

                </p>
               
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp"
            data-wow-delay=".5s"
          >
            <div class="program-item gra-border">
              <div class="icons gra-border round10 d-center">
                <img src="assets/img/aicon/car-icons3.png" alt="img" />
              </div>
              <div class="content">
              <h4>
                  <a href="#">Research & Development</a>
                </h4>
                <p>
                At ZENITH-RW LTD, we engage in cutting-edge research and experimental development
                 within the fields of natural sciences and engineering.
                  Collaborating with academic institutions, government agencies, and 
                 industry partners, we aim to advance knowledge and foster innovation.
                </p>
                
              </div>
            </div>
          </div>

          <div
            class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp"
            data-wow-delay=".6s"
          >
            <div class="program-item gra-border">
              <div class="icons gra-border round10 d-center">
                <img src="assets/img/aicon/car-icons4.png" alt="img" />
              </div>
              <div class="content">
              <h4>
                  <a href="#">Sustainable Technologies</a>
                </h4>
                <p>
                We develop solutions that minimize environmental impact, 
                such as renewable energy systems and efficient resource management techniques.
                <b>Engineering Innovations </b>Our applied research efforts design and 
                optimize new materials, processes, and systems to enhance performance and reliability.

                </p>
                
               
              </div>
            </div>
          </div>

          <div class="" data-wow-delay=".6s">
            <div class="program-item gra-border">
              <div class="icons gra-border round10 d-center">
                <img src="assets/img/aicon/car-icons4.png" alt="img" />
              </div>
              <div class="content">
              <h4>
                  <a href="#">Other Professional, Scientific, and Technical Activities</a>
                </h4>
                <p>
                In addition to our core focus areas, ZENITH-RW LTD offers a range 
                of professional, scientific, and technical activities tailored to diverse client needs.
                <b>Technical Consulting</b>We provide expert advice on specific technical challenges,
                 leveraging our industry knowledge and research capabilities.
                 <b>Training and Capacity Building</b>We design and deliver training programs that enhance skills and 
                 competencies within organizations.<b>Project Management Services</b>Our team oversees complex projects from inception to completion, 
                 ensuring they are delivered on time, within scope, and on budget.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section
      class="faq-sectionv mt-60 overflow-hidden space-bottom"
      id="approach"
    >
      <div class="container">
        <div class="row align-items-center g-4">
          <div class="col-lg-6 col-md-5">
            <div class="faq-thumbs">
              <img src="assets/img/new/home4.webp" alt="img" />
            </div>
          </div>
          <div class="col-lg-6 col-md-7">
            <div class="faq-content">
              <div class="section-title mb-40">
                <span class="sub-title wow fadeInUp p5-clr">
                Management Consultancy
                </span>
              </div>
              <div class="tab-faq faq">
                <div class="accordion-section d-grid gap-xxl-4 gap-lg-3 gap-2">
                  <div class="accordion-single">
                    <h5 class="header-area">
                      <button
                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                        type="button"
                      >
                      Strategic Planning
                      </button>
                    </h5>
                    <div class="content-area">
                      <div class="content-body">
                        <p>
                        We assist organizations in defining their vision, mission, and long-term objectives, 
                        developing actionable plans that align with their core values.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-single">
                    <h5 class="header-area">
                      <button
                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                        type="button"
                      >
                      Operational Improvement
                      </button>
                    </h5>
                    <div class="content-area">
                      <div class="content-body">
                        <p>
                        Our consultants analyze existing processes, identifying opportunities for optimization that 
                        enhance productivity and reduce operational costs.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-single">
                    <h5 class="header-area">
                      <button
                        class="accordion-btn d-flex align-items-center d-flex position-relative w-100"
                        type="button"
                      >
                      Change Management:
                      </button>
                    </h5>
                    <div class="content-area">
                      <div class="content-body">
                        <p>
                        We guide organizations through transitions, 
                        ensuring that changes are implemented 
                        smoothly and embraced by all stakeholders.
                        </p>
                      </div>
                    </div>
                  </div>
                  <p>
                  Our commitment to excellence and innovation drives us
                   to explore new areas of expertise, continually adapting to the
                   evolving needs of our clients and the marketplace.
                  </p>
                  <h4>Together, we build limitless possibilities.</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section
      class="faq-sectionv mt-60 overflow-hidden space-bottom"
      id="procedure"
    >
      <div class="row align-items-center g-4">
        <div class="col-lg-6 col-md-5">
          <div class="faq-thumbs">
            <img src="assets/img/new/home5.webp" alt="img" />
          </div>
        </div>
        <div class="col-lg-6 col-md-7">
          <div class="procedure-container">
            <div class="section-title mb-40">
              <span class="sub-title wow fadeInUp p5-clr"> Our Core Values</span>
              <p>
              At ZENITH-RW, we are guided by a set of core values that shape our approach to consulting and drive the success of our mission. These principles represent who we are, how we operate, and what we 
              stand for as we partner with our clients to create lasting impact.
              </p>
            </div>
            <div class="step">
              <div class="icon">
                <img src="assets/img/new/icon1.png" alt="img" />
              </div>
              <div class="step-content">
                <h3>Integrity</h3>
                <p>
                We uphold the highest standards of honesty, transparency, and ethical conduct in every aspect of our work. We believe in doing the right thing, even when no one is watching, 
                and building trust through openness, consistency, and accountability.
                </p>
              </div>
            </div>

            <div class="step">
              <div class="icon">
                <img src="assets/img/new/icon2.png" alt="img" />
              </div>
              <div class="step-content">
                <h3>Excellence</h3>
                <p>
                We are committed to delivering exceptional quality in all our services. We aim to exceed expectations by applying rigorous analysis, innovative thinking, 
                and a relentless pursuit of excellence in every project we undertake.
                </p>
              </div>
            </div>

            <div class="step">
              <div class="icon">
                <img src="assets/img/new/icon3.png" alt="img" />
              </div>
              <div class="step-content">
                <h3>Collaboration</h3>
                <p>
                We believe in the power of teamwork, both within our organization and with our clients. By working together, sharing diverse perspectives, and fostering open communication, 
                we create solutions that are holistic, inclusive, and better informe
                </p>
              </div>
            </div>

            <div class="step">
              <div class="icon">
                <img src="assets/img/new/icon4.png" alt="img" />
              </div>
              <div class="step-content">
                <h3>Innovation</h3>
                <p>
                We are passionate about driving change and embracing new ideas. We seek out novel approaches, cutting-edge technologies, and emerging trends to develop forward-thinking 
                solutions that meet the ever-evolving needs of our clients.
                </p>
               
              </div>
            </div>
            <div class="step">
              <div class="icon">
                <img src="assets/img/new/icon1.png" alt="img" />
              </div>
              <div class="step-content">
                <h3>Sustainability</h3>
                <p>
                We are dedicated to promoting sustainable practices that benefit both people and the planet. Our work is guided by the understanding that long-term success depends on responsible, 
                socially conscious, and environmentally sound decision-making.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
    <script src="assets/js/main.js"></script>
  </body>
</html>
<?php include 'footer.php'?>
