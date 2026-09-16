<!-- ============ HEADER ============ -->
<header class="devotion-header sticky-top">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-3 px-lg-5">

      <!-- Logo -->
      <!-- <a class="navbar-brand d-flex align-items-center gap-2" href="javascript:void();">
        <img src="assets/Devotion Technology.png" alt="Devotion Logo" class="logo-img" width="300" height="auto">
      </a> -->
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.png" alt="Devotion Tech">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#devotionNav" aria-controls="devotionNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="devotionNav">
        <ul class="navbar-nav align-items-lg-center gap-lg-1">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <!-- About Us -->
          <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void();" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-people-fill nav-icon"></i> About Us
            </a>
            <div class="dropdown-menu mega-panel mega-panel-sm p-0">
              <div class="mega-panel-header">
                <i class="bi bi-people-fill"></i> About Us
              </div>
              <ul class="mega-list">
                <li><a href="company-overview.php"><i class="bi bi-building"></i> Company Overview <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="javascript:void();"><i class="bi bi-bullseye"></i> Our Mission &amp; Vision <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="our-team.php"><i class="bi bi-person-video3"></i> Our Team <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="why-choose-us.php"><i class="bi bi-star-fill"></i> Why Choose Us <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="testimonial.php"><i class="bi bi-people"></i> Our Clients <i class="bi bi-chevron-right ms-auto"></i></a></li>
              </ul>
            </div>
          </li>

          <?php
              // Reads the same data file used by services.php / service-detail.php.
              // Adjust the path if elements/header.php sits somewhere other than one level under your site root.
              $navServicesPath = dirname(__DIR__) . '/data/services.json';
              $navServices = [];
              if (file_exists($navServicesPath)) {
                  $navDecoded = json_decode(file_get_contents($navServicesPath), true);
                  if (is_array($navDecoded)) {
                      $navServices = $navDecoded;
                  }
              }

              // Maps each service's "icon" key (from services.json) to a Bootstrap Icons class
              $navIconMap = [
                  'globe'     => 'bi-globe2',
                  'device'    => 'bi-phone',
                  'palette'   => 'bi-palette2',
                  'edit'      => 'bi-pencil-square',
                  'code'      => 'bi-code-slash',
                  'wrench'    => 'bi-tools',
                  'pen-ruler' => 'bi-vector-pen',
                  'cart'      => 'bi-cart4',
                  'megaphone' => 'bi-megaphone-fill',
              ];
          ?>

          <!-- Services -->
          <li class="nav-item dropdown mega-dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-gear-fill nav-icon"></i> Services
              </a>
              <div class="dropdown-menu mega-panel mega-panel-sm p-0">
                  <div class="mega-panel-header">
                      <i class="bi bi-gear-fill"></i> Services
                  </div>
                  <ul class="mega-list">
                      <?php foreach ($navServices as $navService): ?>
                          <?php $navIcon = $navIconMap[$navService['icon']] ?? 'bi-gear'; ?>
                          <li>
                              <a href="service-detail.php?slug=<?php echo urlencode($navService['slug']); ?>">
                                  <i class="bi <?php echo $navIcon; ?>"></i>
                                  <?php echo htmlspecialchars($navService['title']); ?>
                                  <i class="bi bi-chevron-right ms-auto"></i>
                              </a>
                          </li>
                      <?php endforeach; ?>
                      <li class="mega-list-footer">
                          <a href="services.php">View All Services <i class="bi bi-arrow-right ms-1"></i></a>
                      </li>
                  </ul>
              </div>
          </li>

          <!-- E-SHOP -->
          <li class="nav-item dropdown mega-dropdown mega-dropdown-wide">
            <!-- <a class="nav-link dropdown-toggle" href="javascript:void();" data-bs-toggle="dropdown" data-bs-display="static"> -->
            <a class="nav-link dropdown-toggle" href="javascript:void();" data-bs-toggle="dropdown">
              <i class="bi bi-cart-fill nav-icon"></i> E-Commerce Solutions
            </a>

            <div class="dropdown-menu mega-panel mega-panel-grid p-0">
              <div class="mega-panel-header">
                <i class="bi bi-cart-fill"></i> E-Commerce Solutions
              </div>

              <div class="mega-panel-body">

                <!-- GROUP: OPERATIONS -->
                <div class="mega-group has-flyout">
                  <button type="button" class="mega-group-title flyout-trigger">
                    <span><i class="bi bi-truck"></i> Operations &amp; Logistics</span>
                    <i class="bi bi-chevron-right group-arrow"></i>
                  </button>

                  <div class="mega-flyout">
                    <div class="mega-flyout-header">
                      <i class="bi bi-truck"></i> Operations &amp; Logistics
                    </div>
                    <ul class="mega-list">
                      <li><a href="javascript:void();"><i class="bi bi-box-seam"></i><span><b>WMS</b><small>Warehouse Management System</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-clipboard-data"></i><span><b>IMS</b><small>Inventory Management System</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-receipt"></i><span><b>OMS</b><small>Order Management System</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-diagram-3"></i><span><b>SCM</b><small>Supply Chain Management</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-truck-flatbed"></i><span><b>TMS</b><small>Transportation Management</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                    </ul>
                  </div>
                </div>

                <!-- GROUP: SALES -->
                <div class="mega-group has-flyout">
                  <button type="button" class="mega-group-title flyout-trigger">
                    <span><i class="bi bi-megaphone"></i> Sales &amp; Marketing</span>
                    <i class="bi bi-chevron-right group-arrow"></i>
                  </button>

                  <div class="mega-flyout">
                    <div class="mega-flyout-header">
                      <i class="bi bi-megaphone"></i> Sales &amp; Marketing
                    </div>
                    <ul class="mega-list">
                      <li><a href="javascript:void();"><i class="bi bi-shop"></i><span><b>POS</b><small>Point of Sale Systems</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-tag"></i><span><b>PIM</b><small>Product Information Management</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-layout-text-window"></i><span><b>CMS</b><small>Content Management System</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-person-lines-fill"></i><span><b>CDP</b><small>Customer Data Platform</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-envelope-paper"></i><span><b>ESP</b><small>Email Service Provider Automation</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-person-badge"></i><span><b>CRM</b><small>Customer Relation Management</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-person-workspace"></i><span><b>HRMS</b><small>Human Resource Management System</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-currency-exchange"></i><span><b>Forex CRM</b><small>Management</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-cloud-check"></i><span><b>SAAS</b><small>Software as a Service Management</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                    </ul>
                  </div>
                </div>

                <!-- GROUP: FINANCE -->
                <div class="mega-group has-flyout">
                  <button type="button" class="mega-group-title flyout-trigger">
                    <span><i class="bi bi-graph-up-arrow"></i> Finance &amp; Analytics</span>
                    <i class="bi bi-chevron-right group-arrow"></i>
                  </button>

                  <div class="mega-flyout">
                    <div class="mega-flyout-header">
                      <i class="bi bi-graph-up-arrow"></i> Finance &amp; Analytics
                    </div>
                    <ul class="mega-list">
                      <li><a href="javascript:void();"><i class="bi bi-bank"></i><span><b>ERP</b><small>Enterprise Resource Planning</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-bar-chart-line"></i><span><b>BI</b><small>Business Intelligence &amp; Analytics</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-receipt-cutoff"></i><span><b>Billing</b><small>Subscription &amp; Invoicing Engines</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-credit-card"></i><span><b>PayGate</b><small>Payment Gateway Integrations</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                    </ul>
                  </div>
                </div>

                <!-- GROUP: SUPPORT -->
                <div class="mega-group has-flyout">
                  <button type="button" class="mega-group-title flyout-trigger">
                    <span><i class="bi bi-headset"></i> Customer Support</span>
                    <i class="bi bi-chevron-right group-arrow"></i>
                  </button>

                  <div class="mega-flyout">
                    <div class="mega-flyout-header">
                      <i class="bi bi-headset"></i> Customer Support
                    </div>
                    <ul class="mega-list">
                      <li><a href="javascript:void();"><i class="bi bi-life-preserver"></i><span><b>Helpdesk</b><small>Ticketing &amp; Support Systems</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                      <li><a href="javascript:void();"><i class="bi bi-chat-dots"></i><span><b>LiveChat</b><small>AI Bots &amp; Live Chat Tools</small></span><i class="bi bi-chevron-right ms-auto"></i></a></li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </li> 
          <!-- Technology -->
          <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void();" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-code-square nav-icon"></i> Technology
            </a>
            <div class="dropdown-menu mega-panel mega-panel-sm p-0">
              <div class="mega-panel-header">
                <i class="bi bi-code-square"></i> Technology
              </div>
              <ul class="mega-list">
                <?php
                  // ---- Load technology categories from JSON (same data source technology.php reads) ----
                  $navTechPath = __DIR__ . '/../data/technology.json'; // adjust the relative path to match where elements/header.php actually sits
                  $navTechs = [];
                  if (file_exists($navTechPath)) {
                      $navJson = file_get_contents($navTechPath);
                      $navDecoded = json_decode($navJson, true);
                      if (is_array($navDecoded)) {
                          $navTechs = $navDecoded;
                      }
                  }

                  // Bootstrap icon per slug — keeps the exact icons you already had, just data-driven now
                  $navTechIcons = [
                      'frontend-development' => 'bi-display',
                      'backend-development'  => 'bi-hdd-stack',
                      'mobile-technologies'  => 'bi-phone-vibrate',
                      'cloud-devops'         => 'bi-cloud-arrow-up',
                      'database-solutions'   => 'bi-database',
                      'ai-automation'        => 'bi-cpu',
                      'api-integration'      => 'bi-link-45deg',
                  ];

                  foreach ($navTechs as $navTech):
                      $navIconClass = isset($navTechIcons[$navTech['slug']]) ? $navTechIcons[$navTech['slug']] : 'bi-code-square';
                ?>
                  <li>
                    <a href="technology-detail.php?slug=<?php echo urlencode($navTech['slug']); ?>">
                      <i class="bi <?php echo htmlspecialchars($navIconClass); ?>"></i>
                      <?php echo htmlspecialchars($navTech['title']); ?>
                      <i class="bi bi-chevron-right ms-auto"></i>
                    </a>
                  </li>
                <?php endforeach; ?>
                <li class="mega-list-footer">
                  <a href="technology.php">View All Technology <i class="bi bi-arrow-right"></i></a>
                </li>
              </ul>
            </div>
          </li>

          <!-- Portfolio -->
          <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void();" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-images nav-icon"></i> Portfolio
            </a>
            <div class="dropdown-menu mega-panel mega-panel-sm p-0">
              <div class="mega-panel-header">
                <i class="bi bi-images"></i> Portfolio
              </div>
              <ul class="mega-list">
                <li><a href="web-projects.php"><i class="bi bi-globe"></i> Web Projects <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="mobile-apps.php"><i class="bi bi-phone"></i> Mobile Apps <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="software-projects.php"><i class="bi bi-code-slash"></i> Software Projects <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="case-studies.php"><i class="bi bi-file-earmark-text"></i> Case Studies <i class="bi bi-chevron-right ms-auto"></i></a></li>
              </ul>
            </div>
          </li>

          <!-- Resources -->
          <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void();" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-book-fill nav-icon"></i> Resources
            </a>
            <div class="dropdown-menu mega-panel mega-panel-sm p-0">
              <div class="mega-panel-header">
                <i class="bi bi-book-fill"></i> Resources
              </div>
              <ul class="mega-list">
                <li><a href="blog.php"><i class="bi bi-pencil-square"></i> Blog <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="news-and-update.php"><i class="bi bi-newspaper"></i> News &amp; Updates <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="general-faq.php"><i class="bi bi-question-circle"></i> FAQs <i class="bi bi-chevron-right ms-auto"></i></a></li>
                <li><a href="knowledge-base.php"><i class="bi bi-database-fill"></i> Knowledge Base <i class="bi bi-chevron-right ms-auto"></i></a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="careear.php">Careers</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</header>

<style>
  :root {
    --gold: #b38f51;
    --gold-dark: #8f6f38;
    --gold-light: #d9bf8f;
    --gold-pale: #f6efe1;
    --ink: #2b2620;
    --muted: #7c7368;
    --panel-bg: #fff;
    --panel-border: #e9ddc6;
    --white: #ffffff;
    --dark: #111111;
  }

  .devotion-header {
    background: #fff;
    border-bottom: 1px solid var(--panel-border);
    box-shadow: 0 4px 18px rgba(179, 143, 81, .12);
    position: sticky;
    top: 0;
    z-index: 1000;
  }


  .brand-placeholder {
    width: 180px;
    height: 48px;
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--gold-dark);
    font-size: 13px;
    letter-spacing: .8px;
  }

  .brand-placeholder strong {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--gold);
    font-size: 22px;
  }

  .brand-placeholder span {
    font-weight: 700
  }

  .navbar-nav .nav-link {
    color: var(--ink);
    font-size: 1rem;
    font-weight: 500;
    padding: 1rem .82rem;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: .4rem;
    white-space: nowrap;
    transition: color .2s ease, background .2s ease;
  }

  .nav-icon {
    color: var(--gold);
    font-size: .94rem
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link:focus {
    color: var(--gold-dark)
  }

  .navbar-nav .nav-link,
  .dropdown-toggle {
    outline: none !important;
    box-shadow: none !important;
    border: 0 !important;
  }

  .dropdown-toggle::after {
    border: 0;
    content: "";
    width: .4em;
    height: .4em;
    margin-left: .25rem;
    border-right: 2px solid currentColor;
    border-bottom: 2px solid currentColor;
    transform: rotate(45deg);
    opacity: .75;
  }

  .mega-dropdown.show>.dropdown-toggle::after {
    transform: rotate(225deg)
  }

  /* ===============================
   DESKTOP DROPDOWN POSITIONING
   =============================== */
  @media (min-width: 992px) {

    .mega-dropdown {
      position: relative;
    }

    .mega-dropdown>.mega-panel {
      position: fixed !important;
      margin: 0 !important;
      top: auto;
      left: auto;
      right: auto;
      transform: none !important;

      border: 1px solid var(--panel-border);
      border-radius: 14px;
      background: var(--panel-bg);
      box-shadow: 0 18px 40px rgba(60, 45, 15, .15);
      overflow: visible;
    }

    .mega-dropdown>.mega-panel.show {
      display: block;
    }

    .mega-panel-sm {
      width: 290px !important;
      min-width: 290px !important;
    }

    .mega-panel-grid {
      width: 315px !important;
      min-width: 315px !important;
    }
  }

  .mega-panel-sm {
    min-width: 290px
  }

  .mega-panel-grid {
    width: 315px;
    min-width: 315px
  }

  .mega-panel-header {
    background: var(--gold);
    color: #fff;
    font-weight: 600;
    font-size: .92rem;
    padding: .82rem 1rem;
    min-height: 54px;
    display: flex;
    align-items: center;
    gap: .5rem;
    border-radius: 13px 13px 0 0;
  }

  .mega-panel-body {
    max-height: 70vh;
    overflow-y: auto;
    overflow-x: visible;
    scrollbar-width: thin;
    scrollbar-color: #b8a27b transparent;
    position: relative;
    border-radius: 0 0 13px 13px;
  }

  .mega-panel-body::-webkit-scrollbar {
    width: 7px
  }

  .mega-panel-body::-webkit-scrollbar-thumb {
    background: #b8a27b;
    border-radius: 10px;
  }

  .mega-group {
    position: relative;
    border-bottom: 1px solid var(--panel-border);
  }

  .mega-group:last-child {
    border-bottom: 0
  }

  .mega-group-title {
    width: 100%;
    border: 0;
    background: #fff;
    /* color: var(--gold-dark); */
    font-family: inherit;
    font-size: .79rem;
    font-size: 0.85rem;
    font-weight: 500;
    padding: .62rem .9rem;
    min-height: 46px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: .5rem;
    text-align: left;
    cursor: pointer;
    transition: background .16s ease, color .16s ease;
  }

  .mega-group-title span {
    display: flex;
    align-items: center;
    gap: .45rem;
  }

  .group-arrow {
    font-size: .72rem;
    transition: transform .18s ease;
  }

  .mega-group:hover>.mega-group-title,
  .mega-group.active>.mega-group-title {
    /* background:#efe3cd; */
    color: var(--gold-dark);
  }

  .mega-group:hover>.mega-group-title .group-arrow,
  .mega-group.active>.mega-group-title .group-arrow {
    transform: translateX(2px);

  }

  .mega-flyout {
    position: fixed;
    width: 360px;
    max-width: min(360px, calc(100vw - 24px));
    max-height: min(560px, calc(100vh - 24px));
    overflow-y: auto;
    overflow-x: hidden;
    background: #fff;
    border: 1px solid var(--panel-border);
    border-radius: 13px;
    box-shadow: 0 18px 45px rgba(60, 45, 15, .18);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateX(5px);
    transition: opacity .13s ease, transform .13s ease, visibility .13s ease;
    z-index: 2000;
    scrollbar-width: thin;
    scrollbar-color: #b8a27b transparent;
  }

  .mega-flyout::-webkit-scrollbar {
    width: 7px
  }

  .mega-flyout::-webkit-scrollbar-thumb {
    background: #b8a27b;
    border-radius: 10px
  }

  .mega-group.active>.mega-flyout {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateX(0);
  }

  .mega-flyout-header {
    position: sticky;
    top: 0;
    z-index: 2;
    background: var(--gold);
    color: #fff;
    font-size: .88rem;
    font-weight: 600;
    padding: .75rem .95rem;
    display: flex;
    align-items: center;
    gap: .5rem;
  }

  .mega-list {
    list-style: none;
    margin: 0;
    padding: .35rem 0;
  }

  .mega-list li a {
    min-height: 50px;
    display: flex;
    align-items: center;
    gap: .62rem;
    padding: .55rem .9rem;
    color: var(--ink);
    text-decoration: none;
    font-size: .82rem;
    font-weight: 500;
    transition: background .15s ease, color .15s ease, padding-left .15s ease;
  }

  .mega-list li a>i:first-child {
    color: var(--gold);
    font-size: .95rem;
    flex: 0 0 20px;
  }

  .mega-list li a:hover {
    /* background: var(--gold-pale); */
    color: var(--gold-dark);
    padding-left: 1.1rem;
  }

  .mega-list li a .ms-auto {
    color: var(--gold-light);
    font-size: .7rem;
  }

  .mega-list li a span {
    min-width: 0;
    display: flex;
    flex-direction: column;
    line-height: 1.35;
  }

  .mega-list li a b {
    font-weight: 600
  }

  .mega-list li a small {
    color: var(--muted);
    font-size: .73rem;
    font-weight: 400;
    margin-top: 1px;
  }

  .demo-body {
    min-height: 80vh;
    display: flex;
    align-items: center;
  }

  .demo-title {
    color: var(--gold-dark);
    font-weight: 700
  }

  .demo-text {
    color: var(--muted)
  }

  /* =========================================
   MOBILE NAVIGATION
   ========================================= */
  @media (max-width: 991.98px) {

    .devotion-header {
      position: sticky;
      top: 0;
      z-index: 3000;
    }

    .devotion-header .navbar {
      padding: .65rem 0;
    }

    .devotion-header .container-fluid {
      position: relative;
    }

    /* Logo */
    .navbar-brand img {
      width: 200px;
      max-width: 65vw;
      height: auto;
      display: block;
    }

    /* Hamburger */
    .navbar-toggler {
      width: 58px;
      height: 48px;
      padding: 0;
      border: 2px solid #555 !important;
      border-radius: 10px;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .navbar-toggler:focus {
      box-shadow: none !important;
      outline: none !important;
    }

    .navbar-toggler-icon {
      width: 27px;
      height: 27px;
    }

    /* COLLAPSED MENU */
    .navbar-collapse {
      width: 100%;
      margin-top: .7rem;
      padding: .35rem 0 .75rem;
      background: #fff;
      overflow: visible !important;
    }

    .navbar-collapse.show {
      display: block !important;
    }

    /* Navigation list */
    .navbar-nav {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: stretch !important;
      gap: 0 !important;
      margin: 0 !important;
      padding: 0 !important;
    }

    .navbar-nav .nav-item {
      width: 100%;
      position: static !important;
    }

    /* Main links */
    .navbar-nav .nav-link {
      width: 100%;
      min-height: 48px;
      padding: .75rem .9rem !important;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: .4rem;
      font-size: 1rem;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      background: var(--gold-pale);
    }

    /* =========================================
     MOBILE DROPDOWNS
     ========================================= */

    .mega-dropdown {
      position: static !important;
    }

    .mega-dropdown>.dropdown-menu,
    .mega-dropdown>.mega-panel,
    .mega-dropdown>.mega-panel-sm,
    .mega-dropdown>.mega-panel-grid {
      position: static !important;

      /* IMPORTANT: clear desktop inline positioning */
      top: auto !important;
      left: auto !important;
      right: auto !important;
      bottom: auto !important;

      transform: none !important;

      width: 100% !important;
      min-width: 100% !important;
      max-width: 100% !important;

      margin: .2rem 0 .45rem !important;

      border: 1px solid var(--panel-border) !important;
      border-radius: 10px !important;

      background: #fff !important;

      box-shadow: none !important;

      float: none !important;
    }

    /* Bootstrap hidden state */
    .mega-dropdown>.dropdown-menu:not(.show) {
      display: none !important;
    }

    /* Bootstrap opened state */
    .mega-dropdown>.dropdown-menu.show {
      display: block !important;
    }

    /* Panel heading */
    .mega-panel-header {
      min-height: 48px;
      padding: .75rem .9rem;
      border-radius: 9px 9px 0 0;
    }


    /* E-commerce body */
    .mega-panel-body {
      max-height: none !important;
      overflow: visible !important;
      border-radius: 0 0 9px 9px;
    }

    /* Groups */
    .mega-group {
      position: relative !important;
      width: 100%;
    }

    .mega-group-title {
      width: 100%;
      min-height: 46px;
      padding: .7rem .85rem;
    }

    /* =========================================
     MOBILE FLYOUTS
     ========================================= */

    .mega-flyout {
      position: static !important;

      top: auto !important;
      left: auto !important;
      right: auto !important;

      width: 100% !important;
      max-width: 100% !important;
      max-height: none !important;

      margin: 0 !important;

      border: 0 !important;
      border-top: 1px solid var(--panel-border) !important;
      border-radius: 0 !important;

      box-shadow: none !important;

      transform: none !important;

      opacity: 1 !important;
      visibility: visible !important;
      pointer-events: auto !important;

      display: none;
    }

    .mega-group.active>.mega-flyout {
      display: block !important;
    }

    .mega-flyout-header {
      position: static;
    }

    /* Prevent horizontal overflow */
    .mega-list,
    .mega-list li,
    .mega-list li a {
      max-width: 100%;
    }

    .mega-list li a {
      min-height: 46px;
      padding: .6rem .85rem;
    }

  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const desktopMin = 992;
    const dropdowns = document.querySelectorAll('.mega-dropdown');
    const groups = document.querySelectorAll('.has-flyout');

    function isDesktop() {
      return window.innerWidth >= desktopMin;
    }

    function positionTopDropdown(toggle, menu) {

      if (!isDesktop()) {
        menu.style.removeProperty('position');
        menu.style.removeProperty('top');
        menu.style.removeProperty('left');
        menu.style.removeProperty('right');
        menu.style.removeProperty('bottom');
        menu.style.removeProperty('width');
        menu.style.removeProperty('min-width');
        menu.style.removeProperty('max-width');
        menu.style.removeProperty('transform');

        return;
      }

      const rect = toggle.getBoundingClientRect();

      const width = menu.classList.contains('mega-panel-grid') ?
        315 :
        290;

      const gap = 8;
      const viewportPadding = 12;

      /* Dropdown appears below the navbar item */
      let top = rect.bottom + gap;

      /*
       * Align dropdown's RIGHT edge with the nav item's RIGHT edge.
       * This fixes the E-Commerce dropdown appearing at x:0.
       */
      let left = rect.right - width;

      /* Prevent left overflow */
      if (left < viewportPadding) {
        left = viewportPadding;
      }

      /* Prevent right overflow */
      if (left + width > window.innerWidth - viewportPadding) {
        left = window.innerWidth - width - viewportPadding;
      }

      menu.style.position = 'fixed';
      menu.style.width = width + 'px';
      menu.style.minWidth = width + 'px';
      menu.style.top = top + 'px';
      menu.style.left = left + 'px';
      menu.style.right = 'auto';
    }

    dropdowns.forEach(function(item) {
      const toggle = item.querySelector('.dropdown-toggle');
      const menu = item.querySelector('.dropdown-menu');
      let instance = null;

      function getInstance() {
        if (!instance) {
          instance = bootstrap.Dropdown.getOrCreateInstance(toggle);
        }
        return instance;
      }

      item.addEventListener('mouseenter', function() {
        if (isDesktop()) {
          getInstance().show();

          requestAnimationFrame(function() {
            positionTopDropdown(toggle, menu);
          });
        }
      });

      item.addEventListener('mouseleave', function() {
        if (isDesktop()) {
          getInstance().hide();
          closeAllFlyouts();
        }
      });

      toggle.addEventListener('shown.bs.dropdown', function() {
        positionTopDropdown(toggle, menu);
      });

      toggle.addEventListener('click', function(e) {
        if (isDesktop()) {
          e.preventDefault();
          return;
        }

      });
    });

    function closeAllFlyouts(except) {
      groups.forEach(function(group) {
        if (group !== except) group.classList.remove('active');
      });
    }

    function positionFlyout(group) {
      const flyout = group.querySelector('.mega-flyout');
      if (!flyout || !isDesktop()) return;

      const rect = group.getBoundingClientRect();
      const gap = 8;
      const width = Math.min(360, window.innerWidth - 24);
      const viewportPadding = 12;

      flyout.style.width = width + 'px';
      flyout.style.maxWidth = 'calc(100vw - 24px)';

      // Prefer the right side.
      let left = rect.right + gap;

      // If there is not enough room, flip to the left.
      if (left + width > window.innerWidth - viewportPadding) {
        left = rect.left - gap - width;
        flyout.dataset.side = 'left';
      } else {
        flyout.dataset.side = 'right';
      }

      // Keep the flyout vertically inside the viewport.
      const flyoutHeight = Math.min(
        flyout.scrollHeight || 500,
        window.innerHeight - 24
      );

      let top = rect.top;
      if (top + flyoutHeight > window.innerHeight - viewportPadding) {
        top = window.innerHeight - flyoutHeight - viewportPadding;
      }
      top = Math.max(viewportPadding, top);

      flyout.style.left = Math.max(viewportPadding, left) + 'px';
      flyout.style.top = top + 'px';
      flyout.style.maxHeight = Math.max(220, window.innerHeight - top - viewportPadding) + 'px';
    }

    groups.forEach(function(group) {
      const trigger = group.querySelector('.flyout-trigger');
      if (!trigger) return;

      group.addEventListener('mouseenter', function() {
        if (!isDesktop()) return;
        closeAllFlyouts(group);
        group.classList.add('active');
        positionFlyout(group);
      });

      group.addEventListener('mouseleave', function() {
        if (!isDesktop()) return;

        // Small delay prevents flicker while moving from group to flyout.
        window.clearTimeout(group._closeTimer);
        group._closeTimer = window.setTimeout(function() {
          if (!group.matches(':hover') && !group.querySelector('.mega-flyout:hover')) {
            group.classList.remove('active');
          }
        }, 80);
      });

      const flyout = group.querySelector('.mega-flyout');
      flyout.addEventListener('mouseenter', function() {
        if (!isDesktop()) return;
        window.clearTimeout(group._closeTimer);
        group.classList.add('active');
        positionFlyout(group);
      });

      flyout.addEventListener('mouseleave', function() {
        if (!isDesktop()) return;
        group.classList.remove('active');
      });

      trigger.addEventListener('click', function(e) {
        if (!isDesktop()) {
          e.preventDefault();
          const isOpen = group.classList.contains('active');
          closeAllFlyouts();
          if (!isOpen) group.classList.add('active');
        }
      });
    });

    window.addEventListener('resize', function() {

      if (!isDesktop()) {
        closeAllFlyouts();
        return;
      }

      document.querySelectorAll('.has-flyout.active').forEach(function(group) {
        positionFlyout(group);
      });

      dropdowns.forEach(function(item) {

        const menu = item.querySelector('.dropdown-menu');
        const toggle = item.querySelector('.dropdown-toggle');

        if (menu && menu.classList.contains('show')) {
          positionTopDropdown(toggle, menu);
        }

      });

    });

    window.addEventListener('scroll', function() {
      if (!isDesktop()) return;
      document.querySelectorAll('.has-flyout.active').forEach(function(group) {
        positionFlyout(group);
      });
    }, true);
  });
</script>