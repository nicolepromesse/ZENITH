

<!-- Offcanvas Area Start -->
<div class="fix-area">
  <div class="offcanvas__info">
    <div class="offcanvas__wrapper">
      <div class="offcanvas__content">
        <div
          class="offcanvas__top mb-4 d-flex justify-content-between align-items-center"
        >
          <div class="offcanvas__logo">
            <a href="index.php">
              <img src="assets/img/new/bglogo.png" alt="logo-img" />
            </a>
          </div>
          <div class="offcanvas__close">
            <button>
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="mobile-menu fix mb-3"></div>
        <div class="offcanvas__contact">
          <h4>Contact Info</h4>
          <ul>
            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon">
                <i class="fal fa-map-marker-alt"></i>
              </div>
             
            </li>
            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon mr-15">
                <i class="fal fa-envelope"></i>
              </div>
              <div class="offcanvas__contact-text">
                <a href="mailto:info@zenith-rw.com" target="_blank"
                  ><span class="mailto:info@zenith-rw.com"
                    >info@zenith-rw.com</span
                  ></a
                >
              </div>
            </li>

            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon mr-15">
                <i class="far fa-phone"></i>
              </div>
              <div class="offcanvas__contact-text">
                <a href="https://wa.me/250785755226" target="_blank">
                  +250785755226</a
                >
              </div>
            </li>
          </ul>

          <div class="social-icon d-flex align-items-center">
            <!-- <a
              target="_blank"
              href="https://www.facebook.com/profile.php?id=100080678482975"
              ><i class="fab fa-facebook-f"></i
            ></a> -->
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Top Section Start -->
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header id="header-sticky" class="header-1 white-bg">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.php" class="header-logo">
                            <img src="assets/img/new/bglogo.png" alt="bglogo-img">
                        </a>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-dropdown <?= ($currentPage == 'index.php') ? 'active' : '' ?>">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">
                                        <a href="about.php">About Us</a>
                                    </li>
                                    <li class="<?= ($currentPage == 'service.php') ? 'active' : '' ?>">
                                        <a href="service.php">Services</a>
                                    </li>
                                    <li class="has-dropdown <?= ($currentPage == 'event.php') ? 'active' : '' ?>">
                                        <a href="event.php">Events</a>
                                    </li>
                                    <li class="<?= ($currentPage == 'contact.php') ? 'active' : '' ?>">
                                        <a href="contact.php">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="header-button d-sm-block d-none">
                        <!-- Optional button or CTA -->
                    </div>

                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
