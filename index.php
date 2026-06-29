 
<?php
  include_once('elements/header.php');
  include_once('elements/video.php');
?>


  <!-- <section class="hero-section">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <div class="badge-pill">
            <span class="dot"></span>
            Smarter IT. Stronger Business.
          </div>
          <h1 class="hero-title">
            Empowering businesses<br>
            through reliable &amp; scalable IT<br>
            solutions
          </h1>
          <p class="hero-desc">
            Harness the power of intelligent IT solutions built to evolve with your business.
            From cloud infrastructure to 24/7 support, we deliver flexible, secure, and scalable
            services that empower you to innovate.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#" class="btn-primary-custom">
              Get Started Now
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg>
            </a>
            <a href="#" class="btn-outline-custom">
              View All Services
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg>
            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="hero-img-wrap">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80"
              alt="Two professionals collaborating in modern office" />
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <style>
    .stats-bar {
      background: #f5f5f5;
      border-top: 1px solid #e0e0e0;
      border-bottom: 1px solid #e0e0e0;
      padding: 28px 0;
    }

    .clutch-block {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .clutch-reviewed {
      font-size: 1rem;
      color: #888;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .stars {
      display: flex;
      gap: 2px;
    }

    .star {
      color: #aa8038;
      font-size: 1.4rem;
    }

    .clutch-bottom {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .clutch-logo {
      font-size: 22px;
      font-weight: 700;
      color: #000;
      letter-spacing: -0.5px;
    }

    .clutch-reviews {
      font-size: 1rem;
      color: #888;
    }

    .divider {
      width: 1px;
      background: #d8d8d8;
      align-self: stretch;
      margin: 0 8px;
    }

    .stat-block {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 700;
      color: #111;
      line-height: 1;
    }

    .stat-label {
      font-size: 1rem;
      color: #777;
    }

    @media (max-width: 767px) {
      .divider {
        display: none;
      }

      .stats-bar .row>div {
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 20px;
        margin-bottom: 20px;
      }

      .stats-bar .row>div:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
      }
    }
  </style>

  <section class="stats-bar">
    <div class="container">
      <div class="row align-items-center gy-4">
        <div class="col-12 col-md-auto d-flex align-items-center">
          <div class="clutch-block">
            <div class="clutch-reviewed">
              Reviewed On
              <div class="stars">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
              </div>
            </div>
            <div class="clutch-bottom">
              <span class="clutch-logo">Devotion</span>
              <span class="clutch-reviews">2000 Reviews</span>
            </div>
          </div>
          <div class="divider d-none d-md-block ms-4"></div>
        </div>

        <div class="col-6 col-md d-flex align-items-center">
          <div class="stat-block">
            <span class="stat-number">2.5K+</span>
            <span class="stat-label">Businesses Empowered Solutions</span>
          </div>
          <div class="divider d-none d-md-block ms-4"></div>
        </div>

        <div class="col-6 col-md d-flex align-items-center">
          <div class="stat-block">
            <span class="stat-number">98%</span>
            <span class="stat-label">Customers Satisfaction Rate</span>
          </div>
          <div class="divider d-none d-md-block ms-4"></div>
        </div>

        <div class="col-6 col-md d-flex align-items-center">
          <div class="stat-block">
            <span class="stat-number">500+</span>
            <span class="stat-label">Projects Successfully Delivered</span>
          </div>
          <div class="divider d-none d-md-block ms-4"></div>
        </div>

        <div class="col-6 col-md">
          <div class="stat-block">
            <span class="stat-number">99.9%</span>
            <span class="stat-label">Average System Uptime Across All Clients</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .about-section {
      padding: 80px 0 70px;
    }

    .badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: #fff;
      border: 1px solid #dde2e8;
      border-radius: 999px;
      padding: 5px 16px;
      font-size: 1rem;
      color: #555;
      margin-bottom: 0;
    }

    .badge-pill .dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #aa8038;
      display: inline-block;
    }

    .section-title {
      font-size: 2.55rem;
      font-weight: 700;
      color: #000;
      line-height: 1.2;
      margin-bottom: 22px;
    }

    .desc-wrap {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 44px;
    }

    .desc-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #aa8038;
      /* position: relative; */
      top: 5px;
      flex-shrink: 0;
    }

    .desc-text {
      font-size: 1.2rem;
      color: #777;
      line-height: 1.8;
    }

    .stat-big {
      font-size: 4rem;
      font-weight: 700;
      color: #111;
      line-height: 1;
      margin-bottom: 12px;
    }

    .stat-desc {
      font-size: 1.2rem;
      max-width: 531px;
      color: #555;
      line-height: 1.7;
    }

    .stat-desc strong {
      color: #111;
      font-weight: 600;
    }

    .side-stat-number {
      font-size: 1.7rem;
      font-weight: 700;
      color: #111;
      margin-bottom: 8px;
    }

    .side-stat-text {
      font-size: 1.2rem;
      color: #888;
      line-height: 1.6;
      margin-bottom: 18px;
    }

    .avatar-stack {
      display: flex;
      align-items: center;
    }

    .avatar-stack img,
    .avatar-stack .av-plus {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      border: 2px solid #fff;
      margin-left: -10px;
      object-fit: cover;
    }

    .avatar-stack img:first-child {
      margin-left: 0;
    }

    .av-plus {
      background: #aa8038;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      font-weight: 600;
    }

    .btn-about {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #aa8038;
      border: none;
      color: #fff;
      font-weight: 600;
      font-size: 15px;
      padding: 13px 28px;
      border-radius: 8px;
      text-decoration: none;
      transition: background 0.2s;
      margin-top: 44px;
    }

    .btn-about:hover {
      background: #aa8038;
      color: #fff;
    }

    .divider-v {
      width: 1px;
      background: #e5e5e5;
      min-height: 120px;
      align-self: stretch;
      margin: 0 20px;
    }

    @media (max-width: 991px) {
      .section-title {
        font-size: 1.9rem;
      }

      .stat-big {
        font-size: 2.8rem;
      }

      .divider-v {
        display: none;
      }

      .left-col {
        margin-bottom: 20px;
      }
    }

    @media (max-width: 767px) {
      .about-section {
        padding: 50px 0;
      }

      .section-title {
        font-size: 1.6rem;
      }

      .badge-pill {
        margin-bottom: 24px;
      }

      .stats-row {
        flex-direction: column;
        gap: 28px;
      }
    }
  </style>

  <section class="about-section">
    <div class="container">
      <div class="row gy-4">

        <!-- Left: badge pill -->
        <div class="col-lg-3 col-12">
          <div class="badge-pill">
            <span class="dot"></span>
            Innovation That Drives Growth
          </div>
        </div>

        <!-- Right: content -->
        <div class="col-lg-9 col-12">
          <h2 class="section-title">
            Delivering scalable &amp; innovative IT solutions that empower businesses to embrace digital transform
            enhance security improve efficiency &amp; accelerate sustainable growth.
          </h2>

          <div class="desc-wrap">
            <span class="desc-dot mt-1"></span>
            <p class="desc-text">
              We specialize in delivering end-to-end IT solutions that are both scalable and innovative, designed to
              meet the evolving needs of modern businesses. Our approach empowers organizations to embrace full-scale
              digital transformation while ensuring robust cybersecurity, streamlined operations, and enhanced system
              efficiency.
            </p>
          </div>

          <!-- Stats Row -->
          <div class="d-flex flex-wrap align-items-start gap-4 stats-row">

            <!-- Big stat -->
            <div class="flex-grow-1" style="min-width:220px;">
              <div class="stat-big">98%</div>
              <p class="stat-desc">
                <strong>System Uptime Guaranteed:</strong> Our robust infrastructure and proactive monitoring ensure
                that your systems remain operational 24/7 with minimal downtime.
              </p>
            </div>

            <!-- Vertical divider -->
            <div class="divider-v d-none d-lg-block"></div>

            <!-- Side stat -->
            <div style="min-width:200px; max-width:280px;">
              <div class="side-stat-number">2.5K+</div>
              <p class="side-stat-text">
                We take the time to understand your loved one's needs, routines. We take the time
              </p>
              <!-- Avatar Stack -->
              <div class="avatar-stack">
                <img src="https://i.pravatar.cc/42?img=11" alt="user" />
                <img src="https://i.pravatar.cc/42?img=22" alt="user" />
                <img src="https://i.pravatar.cc/42?img=33" alt="user" />
                <img src="https://i.pravatar.cc/42?img=44" alt="user" />
                <img src="https://i.pravatar.cc/42?img=55" alt="user" />
                <div class="av-plus">+</div>
              </div>
            </div>

          </div>

          <!-- CTA Button -->
          <a href="#" class="btn-about">
            More About Us
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2.2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
            </svg>
          </a>

        </div>
      </div>
    </div>
  </section>

  <style>
    .services-section {
      padding: 70px 0 60px;
      background: #f0f2f5;
    }

    .section-title-stp {
      font-size: 2.2rem;
      font-weight: 700;
      color: #111;
      line-height: 1.2;
      max-width: 850px;
    }

    /* Service Card */
    .service-card {
      background: #fff;
      border-radius: 14px;
      padding: 32px 28px 28px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border: 1px solid #e8e8e8;
      transition: box-shadow 0.2s;
    }

    .service-card:hover {
      box-shadow: 0 6px 28px rgba(0, 0, 0, 0.08);
    }

    .card-icon {
      width: 64px;
      height: 64px;
      margin-bottom: 40px;
    }

    .card-icon svg {
      width: 64px;
      height: 64px;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #111;
      margin-bottom: 10px;
    }

    .card-desc {
      font-size: 13.5px;
      color: #888;
      line-height: 1.7;
      flex-grow: 1;
    }

    /* CTA Card */
    .cta-card {
      border-radius: 14px;
      overflow: hidden;
      position: relative;
      height: 100%;
      min-height: 365px;
      background: #222;
    }

    .cta-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.65;
      position: absolute;
      top: 0;
      left: 0;
    }

    .cta-content {
      position: relative;
      z-index: 2;
      padding: 32px 28px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      height: 100%;
    }

    .cta-content h3 {
      font-size: 1.35rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 10px;
      line-height: 1.3;
    }

    .cta-content p {
      font-size: 13px;
      color: rgba(255, 255, 255, 0.85);
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .cta-btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: #fff;
      color: #111;
      font-weight: 700;
      font-size: 14px;
      padding: 11px 22px;
      border-radius: 8px;
      text-decoration: none;
      width: fit-content;
      transition: background 0.2s;
    }

    .cta-btn:hover {
      background: #f0f0f0;
      color: #111;
    }

    .cta-btn svg {
      width: 14px;
      height: 14px;
    }

    /* Swiper */
    .swiper {
      width: 100%;
      padding-bottom: 20px !important;
    }

    .swiper-pagination {
      display: none;
    }

    /* Progress bar — thick dark fill over light gray track */
    .slider-progress-wrap {
      margin-top: 24px;
      position: relative;
      height: 3px;
      background: #e0e0e0;
      border-radius: 999px;
      max-width: 100%;
    }

    .slider-progress-fill {
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      background: #aa8038;
      border-radius: 999px;
      transition: width 0.35s ease;
    }

    @media(max-width:991px) {
      .section-title {
        font-size: 1.6rem;
      }

      .cta-card {
        min-height: 300px;
      }
    }

    @media(max-width:767px) {
      .services-section {
        padding: 46px 0 40px;
      }

      .section-title {
        font-size: 1.35rem;
      }

      .slider-progress-wrap {
        max-width: 100%;
      }
    }
  </style>

  <section class="services-section">
      <div class="container px-4 px-lg-5">

        <!-- Header Row -->
        <div class="row align-items-start mb-5">
          <div class="col-lg-3 col-12 mb-3 mb-lg-0">
            <div class="badge-pill">
              <span class="dot"></span>
              Stopped Dragging Item
            </div>
          </div>
          <div class="col-lg-9 col-12">
            <h2 class="section-title-stp">Comprehensive, scalable IT services designed to empower growing businesses</h2>
          </div>
        </div>

        <!-- Swiper + CTA Row -->
        <div class="row g-3 align-items-stretch">

          <!-- Swiper Column -->
          <div class="col-lg-9 col-12">
            <div class="swiper servicesSwiper">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="service-card">
                      <div>
                        <div class="card-icon">
                          <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M20 26C20 19.373 25.373 14 32 14C37.693 14 42.45 17.86 43.7 23.15C47.31 23.9 50 27.09 50 31C50 35.418 46.418 39 42 39H22C17.582 39 14 35.418 14 31C14 27.34 16.404 24.236 19.75 23.25"
                              stroke="#333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M28 46L32 50L36 46" stroke="#333" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                            <path d="M32 39V50" stroke="#333" stroke-width="1.5" stroke-linecap="round" />
                          </svg>
                        </div>
                        <div class="card-title">Cloud Solutions</div>
                        <div class="card-desc">Comprehensive protection from evolving threats with risk assessments,
                          firewalls, endpoint protection, and training.</div>
                      </div>
                      <a href="javascript:void();" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                        </svg></a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="service-card">
                      <div>
                        <div class="card-icon">
                          <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="32" r="10" stroke="#333" stroke-width="1.5" />
                            <path d="M32 14V18M32 46V50M14 32H18M46 32H50" stroke="#333" stroke-width="1.5"
                              stroke-linecap="round" />
                            <path d="M20.1 20.1L23 23M41 41L43.9 43.9M20.1 43.9L23 41M41 23L43.9 20.1" stroke="#333"
                              stroke-width="1.5" stroke-linecap="round" />
                            <circle cx="32" cy="32" r="18" stroke="#333" stroke-width="1.5" stroke-dasharray="3 3" />
                          </svg>
                        </div>
                        <div class="card-title">IT Consulting & Strategy</div>
                        <div class="card-desc">Comprehensive protection from evolving threats with risk assessments,
                          firewalls, endpoint protection, and training.</div>
                      </div>
                      <a href="javascript:void();" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                        </svg></a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="service-card">
                      <div>
                        <div class="card-icon">
                          <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="32" cy="20" rx="16" ry="6" stroke="#333" stroke-width="1.5" />
                            <path d="M16 20V32C16 35.314 23.163 38 32 38C40.837 38 48 35.314 48 32V20" stroke="#333"
                              stroke-width="1.5" />
                            <path d="M16 32V44C16 47.314 23.163 50 32 50C40.837 50 48 47.314 48 44V32" stroke="#333"
                              stroke-width="1.5" />
                            <path d="M26 32L30 36L38 28" stroke="#333" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </div>
                        <div class="card-title">Data Backup & Recovery</div>
                        <div class="card-desc">Comprehensive protection from evolving threats with risk assessments,
                          firewalls, endpoint protection, and training.</div>
                      </div>
                      <a href="javascript:void();" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                        </svg></a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="service-card">
                      <div>
                        <div class="card-icon">
                          <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 14L16 20V34C16 43 23 50.5 32 53C41 50.5 48 43 48 34V20L32 14Z" stroke="#333"
                              stroke-width="1.5" stroke-linejoin="round" />
                            <path d="M25 32L30 37L39 27" stroke="#333" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </div>
                        <div class="card-title">Cybersecurity Services</div>
                        <div class="card-desc">Comprehensive protection from evolving threats with risk assessments,
                          firewalls, endpoint protection, and training.</div>
                      </div>
                      <a href="javascript:void();" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                        </svg></a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="service-card">
                      <div>
                        <div class="card-icon">
                          <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="26" y="12" width="12" height="10" rx="2" stroke="#333" stroke-width="1.5" />
                            <rect x="10" y="38" width="12" height="10" rx="2" stroke="#333" stroke-width="1.5" />
                            <rect x="42" y="38" width="12" height="10" rx="2" stroke="#333" stroke-width="1.5" />
                            <path d="M32 22V30M32 30H16V38M32 30H48V38" stroke="#333" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                        <div class="card-title">Network Management</div>
                        <div class="card-desc">Comprehensive protection from evolving threats with risk assessments,
                          firewalls, endpoint protection, and training.</div>
                      </div>
                      <a href="javascript:void();" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                        </svg></a>
                    </div>
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>

            <!-- Progress Bar -->
            <div class="slider-progress-wrap">
              <div class="slider-progress-fill" id="progressFill"></div>
            </div>
          </div>

          <!-- CTA Card -->
          <div class="col-lg-3 col-12">
            <div class="cta-card">
              <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&q=80" alt="Team" />
              <div class="cta-content">
                <h3>Need Any Help? We're Here To Help You!</h3>
                <p>Comprehensive protection from evolving threats with risk assessments.</p>
                <a href="#" class="cta-btn">
                  Contact Us
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
  </section>

  <style>
    .why-section {
      padding: 70px 0 60px;
    }



    .sub-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #aa8038;
      display: inline-block;
      margin-bottom: 28px;
    }

    /* Card */
    .why-card {
      background: #fff;
      border-radius: 14px;
      padding: 30px 26px 26px;
      height: 100%;
      display: flex;
      flex-direction: column;
      border: 1px solid #e8e8e8;
      transition: box-shadow 0.2s;
    }

    .why-card:hover {
      box-shadow: 0 6px 28px rgba(0, 0, 0, 0.08);
    }

    .card-icon {
      width: 60px;
      height: 60px;
      margin-bottom: 36px;
    }

    .card-icon svg {
      width: 60px;
      height: 60px;
    }

    .card-title {
      font-size: 1rem;
      font-weight: 700;
      color: #111;
      line-height: 1.4;
      margin-bottom: 20px;
      padding-bottom: 18px;
      border-bottom: 1px solid #eee;
    }

    .feature-list {
      list-style: none;
      padding: 0;
      margin: 0 0 24px;
      flex-grow: 1;
    }

    .feature-list li {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      font-size: 1rem;
      color: #777;
      margin-bottom: 10px;
      line-height: 1.5;
    }

    .feature-list li:last-child {
      margin-bottom: 0;
    }

    .check-icon {
      flex-shrink: 0;
      margin-top: 1px;
    }

    .check-icon svg {
      width: 15px;
      height: 15px;
    }

    .card-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 1rem;
      font-weight: 700;
      color: #111;
      text-decoration: none;
      margin-top: auto;
      padding-top: 18px;
      border-top: 1px solid #eee;
    }

    .card-link:hover {
      color: #aa8038;
    }

    .card-link svg {
      width: 13px;
      height: 13px;
    }

    @media(max-width:991px) {
      .section-title {
        font-size: 1.7rem;
      }
    }

    @media(max-width:767px) {
      .why-section {
        padding: 46px 0 40px;
      }

      .section-title {
        font-size: 1.4rem;
      }
    }
  </style>

  <section class="why-section">
    <div class="container-fluid px-4 px-lg-5">

      <!-- Header -->
      <div class="row align-items-start mb-4">
        <div class="col-lg-4 col-12 mb-3 mb-lg-0">
          <div class="badge-pill"><span class="dot"></span>Why Choose Us</div>
        </div>
        <div class="col-lg-8 col-12">
          <h2 class="section-title">From consultation to implementation – we deliver end to end IT excellence that
            supports</h2>
        </div>
      </div>


      <!-- Cards Row -->
      <div class="row g-3">

        <!-- Card 1 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="why-card">
            <div class="card-icon">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="32" cy="32" r="18" stroke="#333" stroke-width="1.5" />
                <path d="M24 32C24 27.582 27.582 24 32 24C36.418 24 40 27.582 40 32C40 36.418 36.418 40 32 40"
                  stroke="#333" stroke-width="1.5" stroke-linecap="round" />
                <path d="M32 14V18M32 46V50M14 32H18M46 32H50" stroke="#333" stroke-width="1.5"
                  stroke-linecap="round" />
                <circle cx="32" cy="32" r="4" stroke="#333" stroke-width="1.5" />
              </svg>
            </div>
            <div class="card-title">Expert Team with Deep Technical Knowledge</div>
            <ul class="feature-list">
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Years of experience across IT
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Certify industry leading expert
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Up-to-date knowledge latest tech
              </li>
            </ul>
            <a href="#" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="why-card">
            <div class="card-icon">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32 14C32 14 20 20 14 28C14 28 18 44 32 50C46 44 50 28 50 28C44 20 32 14 32 14Z" stroke="#333"
                  stroke-width="1.5" stroke-linejoin="round" />
                <path d="M24 32C27 29 29 27 32 26C35 27 37 29 40 32" stroke="#333" stroke-width="1.5"
                  stroke-linecap="round" />
                <circle cx="32" cy="36" r="5" stroke="#333" stroke-width="1.5" />
              </svg>
            </div>
            <div class="card-title">Proven Expertise Across Diverse IT Environments</div>
            <ul class="feature-list">
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Skilled in adapting tech
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Successfully delivered solutions
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Experience with cloud, on-premise
              </li>
            </ul>
            <a href="#" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="why-card">
            <div class="card-icon">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32 14L35.5 25H47L37.5 31.5L41 42.5L32 36L23 42.5L26.5 31.5L17 25H28.5L32 14Z" stroke="#333"
                  stroke-width="1.5" stroke-linejoin="round" />
              </svg>
            </div>
            <div class="card-title">Trusted by Industry Leaders Across Sectors</div>
            <ul class="feature-list">
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Recognized by top brands
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Proven results across industries
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Long-term partnerships with Fortune
              </li>
            </ul>
            <a href="#" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="why-card">
            <div class="card-icon">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 20C20 20 16 24 16 32C16 40 20 44 20 44" stroke="#333" stroke-width="1.5"
                  stroke-linecap="round" />
                <path d="M44 20C44 20 48 24 48 32C48 40 44 44 44 44" stroke="#333" stroke-width="1.5"
                  stroke-linecap="round" />
                <path d="M26 26C26 26 24 28 24 32C24 36 26 38 26 38" stroke="#333" stroke-width="1.5"
                  stroke-linecap="round" />
                <path d="M38 26C38 26 40 28 40 32C40 36 38 38 38 38" stroke="#333" stroke-width="1.5"
                  stroke-linecap="round" />
                <circle cx="32" cy="32" r="4" stroke="#333" stroke-width="1.5" />
              </svg>
            </div>
            <div class="card-title">Transparent Communicate & Dedicated Support</div>
            <ul class="feature-list">
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Real-Time Project Updates
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Consistent Feedback Loops
              </li>
              <li>
                <span class="check-icon"><svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 8L6.5 11.5L13 5" stroke="#aa8038" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg></span>
                Dedicated Project Accounts Managers
              </li>
            </ul>
            <a href="#" class="card-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
          </div>
        </div>

      </div>
    </div>
  </section>

   <style>
  
    /* ── Section background: dark with purple glow ── */
    .our-services-section {
      background: #0d0d14; 
      background-image:
        radial-gradient(ellipse 55% 60% at 95% 50%, rgba(80, 40, 140, 0.45) 0%, transparent 70%),
        radial-gradient(ellipse 30% 40% at 5%  60%, rgba(50, 20, 100, 0.25) 0%, transparent 70%);
      padding: 80px 0 90px;
      position: relative;
      overflow: hidden;
    }

    .our-section-heading {
      font-size: clamp(28px, 4vw, 35px);
      font-weight: 800;
      color: #fff;
      line-height: 1.1;
      letter-spacing: -.025em;
      margin: 30px 0 30px;
    }

    /* ── Service Card ── */
    .service-card {
      background: #ffffff;
      border-radius: 18px;
      padding: 28px 28px 24px;
      display: flex;
      flex-direction: column;
      height: 100%;
      transition: transform .25s, box-shadow .25s;
      border: 1px solid rgba(255,255,255,0.06);
    }

    .service-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 48px rgba(0,0,0,0.18);
    }

    /* Icon box */
    .icon-box {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      background: #f2f2f2;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 40px;
      flex-shrink: 0;
    }

    .icon-box svg {
      width: 22px;
      height: 22px;
      stroke: #333;
      fill: none;
      stroke-width: 1.6;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .our-service-card-title {
      font-size: 18px;
      font-weight: 700;
      color: #0f0f0f;
      margin-bottom: 10px;
      line-height: 1.25;
    }

    .our-service-card-title:hover{
      color: #aa8038;
    }

    .our-service-card-desc {
      font-size: 1rem;
      color: #6b6b6b;
      line-height: 1.65;
      margin: 0;
      flex: 1;
    }

    /* "See All Details" link footer */
    .card-footer-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 32px;
      padding-top: 20px;
      border-top: 1px solid #ececec;
      text-decoration: none;
      color: #0f0f0f;
      font-size: 1rem;
      font-weight: 500;
      transition: color .2s;
    }

    .card-footer-link:hover { color: #aa8038; }
    .card-footer-link .arrow {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: 1px solid #e0e0e0;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background .2s, border-color .2s;
    }

    .card-footer-link:hover .arrow {
      background: #aa8038;
      border-color: #aa8038;
    }

    .card-footer-link .arrow svg {
      width: 13px;
      height: 13px;
      stroke: #555;
      fill: none;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
      transition: stroke .2s;
    }
    .card-footer-link:hover .arrow svg { stroke: #fff; }

    /* ── Bottom CTA ── */
    .bottom-cta {
      margin-top: 56px;
      text-align: center;
    }

    .btn-view-all {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      background: #fff;
      color: #0d0d14;
      font-size: 14.5px;
      font-weight: 600;
      padding: 14px 28px;
      border-radius: 50px;
      text-decoration: none;
      transition: background .2s, color .2s;
    }

    .btn-view-all:hover {
      background: #aa8038;
      color: #fff;
    }

    .btn-view-all .btn-circle {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: #aa8038;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background .2s;
    }

    .btn-view-all:hover .btn-circle { background: #fff; }
    .btn-view-all .btn-circle svg {
      width: 15px;
      height: 15px;
      stroke: #fff;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
      transition: stroke .2s;
    }

    .btn-view-all:hover .btn-circle svg { 
      stroke: #aa8038; 
    }

    /* ── Responsive ── */
    @media (max-width: 991.98px) {
      .services-section { padding: 56px 0 64px; }
      .section-heading { margin-bottom: 40px; }
    }

    @media (max-width: 575.98px) {
      .service-card { padding: 24px 20px 20px; }
    }
  </style>

  <section class="our-services-section">
    <div class="container">

      <!-- ── Header ── -->
      <div class="text-center">
        <div class="badge-pill justify-content-center">
          <span class="dot"></span>
          What We Offer
        </div>
        <h2 class="our-section-heading">Managed IT Services That Keep Teams Moving</h2>
      </div>

      <!-- ── Cards Grid ── -->
      <div class="row g-3">

          <!-- 1. System Monitoring -->
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="icon-box">
                <!-- settings/gear icon -->
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
              </div>
              <h3 class="our-service-card-title">System Monitoring</h3>
              <p class="our-service-card-desc">We keep watch on your systems to catch issues before they interrupt daily work.</p>
              <a href="javascript:void();" class="card-footer-link">
                See All Details
                <span class="arrow">
                  <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
              </a>
            </div>
          </div>

          <!-- 2. Cybersecurity Services -->
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="icon-box">
                <!-- shield icon -->
                <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
              </div>
              <h3 class="our-service-card-title">Cybersecurity Services</h3>
              <p class="our-service-card-desc">Protect your systems, users, and business data from phishing, malware, and security threats.</p>
              <a href="javascript:void();" class="card-footer-link">
                See All Details
                <span class="arrow">
                  <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
              </a>
            </div>
          </div>

          <!-- 3. Cloud Solutions -->
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="icon-box">
                <!-- cloud icon -->
                <svg viewBox="0 0 24 24"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>
              </div>
              <h3 class="our-service-card-title">Cloud Solutions</h3>
              <p class="our-service-card-desc">Move, manage, and organize your files, apps, and team access with secure cloud-based systems.</p>
              <a href="javascript:void();" class="card-footer-link">
                See All Details
                <span class="arrow">
                  <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
              </a>
            </div>
          </div>

          <!-- 4. Help Desk Support -->
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="icon-box">
                <!-- headset icon -->
                <svg viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
              </div>
              <h3 class="our-service-card-title">Help Desk Support</h3>
              <p class="our-service-card-desc">Fast support for your team when devices, software, email, or network issues interrupt work.</p>
              <a href="javascript:void();" class="card-footer-link">
                See All Details
                <span class="arrow">
                  <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
              </a>
            </div>
          </div>

          <!-- 5. Network Management -->
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="icon-box">
                <!-- wifi icon -->
                <svg viewBox="0 0 24 24"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="#333" stroke="none"/></svg>
              </div>
              <h3 class="our-service-card-title">Network Management</h3>
              <p class="our-service-card-desc">Keep your internet, Wi-Fi, servers, and connected devices stable, secure, and properly managed.</p>
              <a href="javascript:void();" class="card-footer-link">
                See All Details
                <span class="arrow">
                  <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
              </a>
            </div>
          </div>

          <!-- 6. Backup & Recovery -->
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="icon-box">
                <!-- database icon -->
                <svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
              </div>
              <h3 class="our-service-card-title">Backup &amp; Recovery</h3>
              <p class="our-service-card-desc">Protect important business data with backups &amp; recovery planning for unexpected problems.</p>
              <a href="javascript:void();" class="card-footer-link">
                See All Details
                <span class="arrow">
                  <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
                </span>
              </a>
            </div>
          </div>

      </div><!-- /row -->

      <!-- ── Bottom CTA ── -->
      <div class="bottom-cta">
        <a href="javascript:void();" class="btn-view-all">
          View All Services
          <span class="btn-circle">
            <svg viewBox="0 0 14 14"><path d="M2 7h10M7 2l5 5-5 5"/></svg>
          </span>
        </a>
      </div>

    </div><!-- /container -->
  </section>

  <style>
  
      /* ── Section ── */
      .problems-section {
        padding: 80px 0 90px;
        background: #fff;
      } 
      .header-desc {
        font-size: 15px;
        color: #6b6b6b;
        line-height: 1.7;
        text-align: right;
        max-width: 380px;
        margin-left: auto;
        margin-bottom: 24px;
      }

      .btn-quote {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #aa8038;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        padding: 13px 26px;
        border-radius: 50px;
        text-decoration: none;
        border: none;
        transition: background .2s, transform .2s;
        float: right;
      }

      .btn-quote:hover {
        background: #c49a4a;
        color: #fff;
        transform: translateX(2px);
      }

      .btn-quote .arrow-circle-prob {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
      }

      .btn-quote .arrow-circle-prob svg {
        width: 14px;
        height: 14px;
        stroke: #fff;
        fill: none;
      }

      /* ── Cards Grid ── */
      .cards-grid {
        margin-top: 48px;
      }

      /* Problem card */
      .prob-card {
        background: #ffffff;
        border: 1px solid #e8e8e8;
        border-radius: 16px;
        padding: 32px 28px 28px;
        height: 100%;
        transition: box-shadow .25s, transform .25s;
      }

      .prob-card:hover {
        box-shadow: 0 8px 32px rgba(0,0,0,0.07);
        transform: translateY(-3px);
      }

      .card-number-prob {
        font-size: 48px;
        font-weight: 800;
        color: #e0e0e0;
        line-height: 1;
        margin-bottom: 36px;
        letter-spacing: -.03em;
      }

      .card-title-prob {
        font-size: 18px;
        font-weight: 700;
        color: #0f0f0f;
        margin-bottom: 10px;
        line-height: 1.3;
      }

      .card-desc-prob {
        font-size: 1rem;
        color: #6b6b6b;
        line-height: 1.65;
        margin: 0;
      }

      /* Highlighted word in description */
      .card-desc-prob .highlight {
        color: #aa8038;
        font-weight: 500;
      }

      /* Center image column */
      .center-image {
        border-radius: 16px;
        overflow: hidden;
        height: 100%;
        min-height: 460px;
      }

      .center-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      /* ── Responsive ── */
      @media (max-width: 991.98px) {
        .problems-section { padding: 56px 0 64px; }
        .header-desc { text-align: left; margin-left: 0; margin-top: 12px; }
        .btn-quote { float: none; }
        .center-image { min-height: 320px; margin: 8px 0; }
      }

      @media (max-width: 767.98px) {
        .cards-grid .row { row-gap: 16px; }
        .center-image { min-height: 260px; }
      }
  </style>

  <section class="problems-section">
    <div class="container">

      <!-- ── Header ── -->
      <div class="row align-items-end mb-2">
        <!-- Left: eyebrow + heading -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="badge-pill mb-3">
            <span class="dot"></span>
            Common IT Problems
          </div>
          <h2 class="section-heading">
            Tech Issues Shouldn't Slow Your Business Down
          </h2>
        </div>

        <!-- Right: desc + CTA -->
        <div class="col-lg-6">
          <p class="header-desc">
            When your systems are slow, insecure, or poorly managed, your team loses time and focus. Nexorit helps businesses prevent IT problems before they affect daily operations.
          </p>
          <a href="#" class="btn-quote">
            Get a Free Quote
            <span class="arrow-circle-prob">
              <svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 7h10M7 2l5 5-5 5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </a>
        </div>
      </div>

      <!-- ── 3-column grid: card | image | card ── -->
      <div class="cards-grid">
        <div class="row g-3 align-items-stretch">

          <!-- LEFT CARDS (col) -->
          <div class="col-lg-4 col-md-6">
            <div class="d-flex flex-column gap-3 h-100">

              <!-- Card 01 -->
              <div class="prob-card flex-fill">
                <div class="card-number-prob">01</div>
                <h3 class="card-title-prob">Slow Support Response</h3>
                <p class="card-desc-prob">
                  Waiting too long for <span class="highlight">IT</span> help can delay work, frustrate your team, and affect customer service.
                </p>
              </div>

              <!-- Card 02 -->
              <div class="prob-card flex-fill">
                <div class="card-number-prob">02</div>
                <h3 class="card-title-prob">Security Risks</h3>
                <p class="card-desc-prob">
                  Weak passwords, phishing emails, outdated software, and poor access control can put business data at risk.
                </p>
              </div>

            </div>
          </div>

          <!-- CENTER IMAGE -->
          <div class="col-lg-4 col-md-12 order-md-last order-lg-0">
            <div class="center-image">
              <img
                src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=80"
                alt="IT professionals working at computers"
              />
            </div>
          </div>

          <!-- RIGHT CARDS (col) -->
          <div class="col-lg-4 col-md-6">
            <div class="d-flex flex-column gap-3 h-100">

              <!-- Card 03 -->
              <div class="prob-card flex-fill">
                <div class="card-number-prob">03</div>
                <h3 class="card-title-prob">Unexpected Downtime</h3>
                <p class="card-desc-prob">
                  Waiting too long for <span class="highlight">IT</span> help can delay work, frustrate your team, and affect customer service.
                </p>
              </div>

              <!-- Card 04 -->
              <div class="prob-card flex-fill">
                <div class="card-number-prob">04</div>
                <h3 class="card-title-prob">No Clear IT Plan</h3>
                <p class="card-desc-prob">
                  Without a structured IT strategy, your tools, systems, and support process become harder to manage.
                </p>
              </div>

            </div>
          </div>

        </div><!-- /row -->
      </div><!-- /cards-grid -->

    </div><!-- /container -->
  </section>

  <style>
    .how-section {
      background: #2a2a2a;
      padding: 70px 0 60px;
    }


    .section-title-how {
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      line-height: 1.22;
    }

    /* Step Card */
    .step-card {
      background: #333;
      border: 1px solid #444;
      border-radius: 14px;
      padding: 26px 24px 22px;
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
      transition: border-color 0.2s;
    }

    .step-card:hover {
      border-color: #aa8038;
    }

    /* Watermark icon top-right */
    .card-watermark {
      position: absolute;
      top: 14px;
      right: 16px;
      opacity: 0.12;
    }

    .card-watermark svg {
      width: 64px;
      height: 64px;
    }

    .step-label {
      font-size: 1rem;
      color: #888;
      font-weight: 600;
      letter-spacing: 0.5px;
      margin-bottom: 18px;
      text-transform: uppercase;
    }

    .card-divider {
      border: none;
      border-top: 1px solid #444;
      margin: 0 0 18px;
    }

    .card-title-how {
      font-size: 1rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 10px;
    }

    .card-desc-how {
      font-size: 1rem;
      color: #999;
      line-height: 1.7;
      flex-grow: 1;
    }

    .card-link-how {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 14px;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      margin: 20px 0 24px;
    }

    .card-link-how:hover {
      color: #aa8038;
    }

    .card-link-how svg {
      width: 13px;
      height: 13px;
    }

    /* Tag pills at bottom */
    .card-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      padding-top: 18px;
      border-top: 1px solid #444;
      margin-top: auto;
    }

    .tag {
      display: inline-block;
      background: #2a2a2a;
      border: 1px solid #555;
      border-radius: 999px;
      padding: 4px 14px;
      font-size: 0.7rem;
      color: #ccc;
    }

    /* Bottom bar */
    .bottom-bar {
      margin-top: 48px;
      text-align: center;
    }

    .free-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 1rem;
      color: #bbb;
    }

    .free-tag {
      background: #aa8038;
      color: #fff;
      font-size: 0.8rem;
      font-weight: 700;
      border-radius: 999px;
      padding: 3px 12px;
    }

    .free-bar-text a {
      color: #fff;
      font-weight: 600;
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    .free-bar-text a:hover {
      color: #aa8038;
    }

    @media(max-width:991px) {
      .section-title {
        font-size: 1.7rem;
      }
    }

    @media(max-width:767px) {
      .how-section {
        padding: 46px 0 40px;
      }

      .section-title {
        font-size: 1.35rem;
      }

      .step-card {
        margin-bottom: 4px;
      }
    }
  </style>

  <section class="how-section">
    <div class="container px-4 px-lg-5">

      <!-- Header -->
      <div class="row align-items-start mb-5">
        <div class="col-lg-4 col-12 mb-3 mb-lg-0">
          <div class="badge-pill"><span class="dot"></span>How It Works</div>
        </div>
        <div class="col-lg-8 col-12">
          <h2 class="section-title-how">From discovery to deployment – your seamless tech transformation starts here
          </h2>
        </div>
      </div>

      <!-- Cards Row -->
      <div class="row g-3">

        <!-- Step 01 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="step-card">
            <div class="card-watermark">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32 14C32 14 20 20 14 28C14 28 18 44 32 50C46 44 50 28 50 28C44 20 32 14 32 14Z" stroke="#fff"
                  stroke-width="1.5" stroke-linejoin="round" />
                <circle cx="32" cy="32" r="7" stroke="#fff" stroke-width="1.5" />
              </svg>
            </div>
            <div class="step-label">Step 01</div>
            <hr class="card-divider" />
            <div class="card-title-how">Consultation & Assessment</div>
            <div class="card-desc-how">Comprehensive protection from evolving threats with risk assessments.</div>
            <a href="javascript:void();" class="card-link-how">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
            <div class="card-tags">
              <span class="tag">Discovery</span>
              <span class="tag">IT Assessment</span>
            </div>
          </div>
        </div>

        <!-- Step 02 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="step-card">
            <div class="card-watermark">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32 14L35.5 25H47L37.5 31.5L41 42.5L32 36L23 42.5L26.5 31.5L17 25H28.5L32 14Z" stroke="#fff"
                  stroke-width="1.5" stroke-linejoin="round" />
              </svg>
            </div>
            <div class="step-label">Step 02</div>
            <hr class="card-divider" />
            <div class="card-title-how">Strategic Planning</div>
            <div class="card-desc-how">Comprehensive protection from evolving threats with risk assessments.</div>
            <a href="javascript:void();" class="card-link-how">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
            <div class="card-tags">
              <span class="tag">Planning</span>
              <span class="tag">Tech Roadmap</span>
            </div>
          </div>
        </div>

        <!-- Step 03 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="step-card">
            <div class="card-watermark">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="20" y="20" width="24" height="24" rx="4" stroke="#fff" stroke-width="1.5" />
                <path d="M26 32H38M32 26V38" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                <path d="M16 16L20 20M48 16L44 20M16 48L20 44M48 48L44 44" stroke="#fff" stroke-width="1.5"
                  stroke-linecap="round" />
              </svg>
            </div>
            <div class="step-label">Step 03</div>
            <hr class="card-divider" />
            <div class="card-title-how">Deployment & Integration</div>
            <div class="card-desc-how">Comprehensive protection from evolving threats with risk assessments.</div>
            <a href="javascript:void();" class="card-link-how">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
            <div class="card-tags">
              <span class="tag">Integration</span>
              <span class="tag">Implement</span>
            </div>
          </div>
        </div>

        <!-- Step 04 -->
        <div class="col-lg-3 col-md-6 col-12">
          <div class="step-card">
            <div class="card-watermark">
              <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="32" cy="32" r="16" stroke="#fff" stroke-width="1.5" />
                <path d="M32 20V32L40 38" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path d="M20 14V20M44 14V20M14 32H20M44 32H50" stroke="#fff" stroke-width="1.5"
                  stroke-linecap="round" />
              </svg>
            </div>
            <div class="step-label">Step 04</div>
            <hr class="card-divider" />
            <div class="card-title-how">Ongoing Support</div>
            <div class="card-desc-how">Comprehensive protection from evolving threats with risk assessments.</div>
            <a href="javascript:void();" class="card-link-how">Learn More <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M7 7h10v10" />
              </svg></a>
            <div class="card-tags">
              <span class="tag">Monitoring</span>
              <span class="tag">24*7Support</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Bottom Bar -->
      <div class="bottom-bar">
        <div class="free-badge">
          <span class="free-tag">Free</span>
          <span class="free-bar-text">From day one to enterprise – <a href="#">We're Your Partner In Long-Term Tech
              Success.</a></span>
        </div>
      </div>

    </div>
  </section>

   <style> 
    /* ── Section ── */
    .techstack-section {
      padding: 80px 0 90px;
      background: #ffffff;
    }

    /* ── Heading ── */
    .section-heading {
      font-size: clamp(22px, 3.5vw, 38px);
      font-weight: 800;
      color: #0f0f0f;
      /* text-align: center; */
      letter-spacing: -.02em;
      margin-bottom: 40px;
    }

    /* ── Tab Nav ── */
    .tech-tabs {
      display: flex;
      justify-content: center;
      border-bottom: 1.5px solid #e8e8e8;
      gap: 0;
      flex-wrap: wrap;
      margin-bottom: 48px;
    }

    .tech-tab {
      position: relative;
      padding: 12px 28px;
      font-size: 1.3rem; 
      color: #6b6b6b;
      cursor: pointer;
      border: none;
      background: none;
      transition: color .2s;
      white-space: nowrap;
      outline: none;
    }

    .tech-tab::after {
      content: '';
      position: absolute;
      bottom: -1.5px;
      left: 0;
      width: 100%;
      height: 2.5px;
      background: #aa8038;
      border-radius: 2px 2px 0 0;
      transform: scaleX(0);
      transition: transform .25s ease;
    }

    .tech-tab.active {
      color: #aa8038; 
    }
    .tech-tab.active::after {
      transform: scaleX(1);
    }
    .tech-tab:hover:not(.active) { color: #0f0f0f; }

    /* ── Tab Panels ── */
    .tab-panel { display: none; }
    .tab-panel.active { display: block; }

    /* ── Tech Cards Grid ── */
    .tech-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      justify-content: center;
    }

    .tech-card {
      background: #ffffff;
      border: 1px solid #e8e8e8;
      border-radius: 14px;
      width: 190px;
      padding: 36px 20px 28px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      transition: transform .22s, box-shadow .22s, border-color .22s;
      cursor: default;
    }
    .tech-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 36px rgba(0,0,0,0.09);
      border-color: #aa8038;
    }

    .tech-card img,
    .tech-card svg {
      width: 52px;
      height: 52px;
      object-fit: contain;
    }

    .tech-card-name {
      font-size: 1rem; 
      color: #0f0f0f;
      text-align: center;
    }

    /* ── Responsive ── */
    @media (max-width: 767.98px) {
      .techstack-section { padding: 56px 0 64px; }
      .tech-tab { padding: 10px 16px; font-size: 13px; }
      .tech-card { width: calc(50% - 8px); }
    }
    @media (max-width: 400px) {
      .tech-card { width: 100%; }
    }
  </style>

  <section class="techstack-section">
    <div class="container">

      <h2 class="section-heading">Our Team Bring into Play Tech-Stack</h2>

      <!-- ── Tab Navigation ── -->
      <div class="tech-tabs" role="tablist">
        <button class="tech-tab active" data-tab="mobile"   role="tab">Mobile</button>
        <button class="tech-tab" data-tab="frontend" role="tab">Front-End</button>
        <button class="tech-tab" data-tab="backend"  role="tab">Back-End</button>
        <button class="tech-tab" data-tab="cms"      role="tab">CMS</button>
        <button class="tech-tab" data-tab="database" role="tab">Database</button>
        <button class="tech-tab" data-tab="devops"   role="tab">DevOps</button>
      </div>

      <!-- ══════════════════════════════════
          MOBILE
      ══════════════════════════════════ -->
      <div class="tab-panel active" id="panel-mobile">
        <div class="tech-grid">
          <div class="tech-card">
            <!-- React Native -->
            <img src="assets/images/React-icon.svg.png" alt="">
            <span class="tech-card-name">React Native</span>
          </div>
          <div class="tech-card">
            <!-- Flutter -->
            <img src="assets/images/flutter-icon.png" alt="">
            <span class="tech-card-name">Flutter</span>
          </div>
          <div class="tech-card">
            <!-- Swift -->
            <img src="assets/images/swift.png" alt="">
            <span class="tech-card-name">Swift</span>
          </div>
          <div class="tech-card">
            <!-- Kotlin -->
            <img src="assets/images/Kotlin.png" alt="">
            <span class="tech-card-name">Kotlin</span>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════
          FRONT-END
      ══════════════════════════════════ -->
      <div class="tab-panel" id="panel-frontend">
        <div class="tech-grid">
          <div class="tech-card">
            <!-- React.js atom icon -->
            <img src="assets/images/React-icon.svg.png" alt="">
            <span class="tech-card-name">React.js</span>
          </div>
          <div class="tech-card">
            <!-- Angular shield -->
            <img src="assets/images/angularjs.png" alt="">
            <span class="tech-card-name">Angular</span>
          </div>
          <div class="tech-card">
            <!-- HTML5 shield -->
            <img src="assets/images/html-5.png" alt="">
            <span class="tech-card-name">HTML5</span>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════
          BACK-END
      ══════════════════════════════════ -->
      <div class="tab-panel" id="panel-backend">
        <div class="tech-grid">
          <div class="tech-card">
            <img src="assets/images/nodejs-icon.png" alt="">
            <span class="tech-card-name">Node.js</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/python.png" alt="">
            <span class="tech-card-name">Python</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/laravel.png" alt="">
            <span class="tech-card-name">Laravel</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/django.png" alt="">
            <span class="tech-card-name">Django</span>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════
          CMS
      ══════════════════════════════════ -->
      <div class="tab-panel" id="panel-cms">
        <div class="tech-grid">
          <div class="tech-card">
            <img src="assets/images/wordpress.png" alt="">
            <span class="tech-card-name">WordPress</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/shopify.png" alt="">
            <span class="tech-card-name">Shopify</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/strapi.png" alt="">
            <span class="tech-card-name">Strapi</span>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════
          DATABASE
      ══════════════════════════════════ -->
      <div class="tab-panel" id="panel-database">
        <div class="tech-grid">
          <div class="tech-card">
            <img src="assets/images/MySQL.png" alt="">
            <span class="tech-card-name">MySQL</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/mongo-db.png" alt="">
            <span class="tech-card-name">MongoDB</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/PostgreSQL.png" alt="">
            <span class="tech-card-name">PostgreSQL</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/redis.png" alt="">
            <span class="tech-card-name">Redis</span>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════
          DEVOPS
      ══════════════════════════════════ -->
      <div class="tab-panel" id="panel-devops">
        <div class="tech-grid">
          <div class="tech-card">
            <img src="assets/images/docker.png" alt="">
            <span class="tech-card-name">Docker</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/kubernetes.png" alt="">
            <span class="tech-card-name">Kubernetes</span>
          </div>
          <div class="tech-card">
            <img src="assets/images/aws.png" alt="">
            <span class="tech-card-name">AWS</span>
          </div> 
        </div>
      </div>

    </div><!-- /container -->
  </section>

   <style>
     
    /* ── Section ── */
    .biz-section {
      padding: 80px 0 90px;
      background: #f0f2f5;
      position: relative;
      overflow: hidden;
    }

    /* Decorative curved lines (background) */
    .biz-section::before {
      content: '';
      position: absolute;
      top: 60px;
      left: -100px;
      width: 700px;
      height: 400px;
      border-radius: 50%;
      border: 1px solid rgba(170, 128, 56, 0.08);
      pointer-events: none;
      transform: rotate(-15deg);
    }
    .biz-section::after {
      content: '';
      position: absolute;
      top: 100px;
      left: -80px;
      width: 600px;
      height: 320px;
      border-radius: 50%;
      border: 1px solid rgba(170, 128, 56, 0.06);
      pointer-events: none;
      transform: rotate(-20deg);
    }

    /* ── Top Row ── */
    .top-row { margin-bottom: 56px; }

    /* Left: heading block */
    .biz-heading {
      font-size: clamp(24px, 3.2vw, 40px);
      font-weight: 800;
      color: #0f0f0f;
      line-height: 1.18;
      letter-spacing: -.02em;
      margin-bottom: 18px;
    }

    .heading-underline {
      width: 52px;
      height: 3px;
      background: #aa8038;
      border-radius: 2px;
      margin-bottom: 24px;
    }

    .biz-desc {
      font-size: 1rem;
      color: #6b6b6b;
      line-height: 1.72; 
    }

    /* Right: Contact card */
    .contact-card {
      background: #fff;
      border-radius: 16px;
      padding: 32px 32px 28px;
      height: 100%;
    }

    .contact-label-build {
      font-size: 1rem;
      font-weight: 600;
      color: #aa8038;
      letter-spacing: .08em;
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    .contact-title {
      font-size: 22px;
      font-weight: 800;
      color: #0f0f0f;
      line-height: 1.22;
      margin-bottom: 16px;
    }

    .contact-desc {
      font-size: 1rem;
      color: #6b6b6b;
      line-height: 1.65;
      margin-bottom: 32px;
    }

    .contact-desc span {
      color: #aa8038;
      font-weight: 500;
    }

    /* ── Drop Your Queries Button ── */
    .btn-query {
      display: inline-flex;
      align-items: center;
      gap: 0;
      font-size: 14px;
      font-weight: 600;
      color: #0f0f0f;
      text-decoration: none;
      border: 1.5px solid #c0c0c0;
      border-radius: 50px;
      padding: 10px 20px 10px 14px;
      overflow: hidden;
      position: relative;
      transition: border-color .3s, color .3s, background .3s;
      background: transparent;
    }

    /* Sliding fill background on hover */
    .btn-query::before {
      content: '';
      position: absolute;
      inset: 0;
      background: #aa8038;
      border-radius: 50px;
      transform: scaleX(0);
      transform-origin: left center;
      transition: transform .35s cubic-bezier(.4,0,.2,1);
      z-index: 0;
    }
    .btn-query:hover::before { transform: scaleX(1); }
    .btn-query:hover {
      color: #fff;
      border-color: #aa8038;
    }

    /* Arrow icon wrapper — slides right on hover */
    .query-arrow-wrap {
      position: relative;
      z-index: 1;
      width: 32px;
      height: 32px;
      margin-right: 10px;
      flex-shrink: 0;
      overflow: hidden;
    }

    /* Two arrows stacked: one visible, one waiting off-left */
    .query-arrow-wrap svg {
      width: 32px;
      height: 32px;
      position: absolute;
      top: 0;
      left: 0;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.6;
      stroke-linecap: round;
      stroke-linejoin: round;
      transition: transform .3s cubic-bezier(.4,0,.2,1), opacity .3s;
    }

    /* Primary arrow (visible at rest) */
    .arrow-default {
      transform: translateX(0);
      opacity: 1;
    }
    .btn-query:hover .arrow-default {
      transform: translateX(140%);
      opacity: 0;
    }

    /* Secondary arrow (hidden at rest, slides in from left) */
    .arrow-hover {
      transform: translateX(-140%);
      opacity: 0;
    }
    .btn-query:hover .arrow-hover {
      transform: translateX(0);
      opacity: 1;
    }

    .btn-query-label {
      position: relative;
      z-index: 1;
    }

    /* ── Business Type Grid ── */
    .biz-grid {
      border-top: 1px solid #e8e8e8;
    }

    .biz-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      border-bottom: 1px solid #e8e8e8;
    }

    .biz-item {
      display: flex;
      align-items: flex-start;
      gap: 16px;
      padding: 36px 32px;
      transition: background .2s;
    }
    .biz-item:first-child {
      border-right: 1px solid #e8e8e8;
    }
    .biz-item:hover { background: #fafafa; }

    .biz-num {
      font-size: 22px;
      font-weight: 800;
      color: #aa8038;
      line-height: 1;
      flex-shrink: 0;
      min-width: 32px;
    }

    .biz-title {
      font-size: 17px;
      font-weight: 800;
      color: #0f0f0f;
      line-height: 1.25;
      margin-bottom: 0;
      min-width: 130px;
    }

    .biz-text {
      font-size: 1rem;
      color: #6b6b6b;
      line-height: 1.65;
      margin: 0;
      flex: 1;
    }

    /* Separator between title and text on desktop */
    .biz-content {
      display: flex;
      align-items: flex-start;
      gap: 24px;
      width: 100%;
    }

    /* ── Responsive ── */
    @media (max-width: 991.98px) {
      .biz-section { padding: 56px 0 64px; }
      .biz-item { padding: 28px 20px; }
      .biz-content { flex-direction: column; gap: 8px; }
    }

    @media (max-width: 767.98px) {
      .top-row { margin-bottom: 36px; }
      .contact-card { margin-top: 32px; }
      .biz-row { grid-template-columns: 1fr; }
      .biz-item:first-child { border-right: none; border-bottom: 1px solid #e8e8e8; }
      .biz-item { padding: 24px 0; }
    }
  </style>

  <section class="biz-section">
    <div class="container">

      <!-- ── Top Row: Heading + Contact Card ── -->
      <div class="row top-row align-items-start">

        <!-- Left: Heading + Description -->
        <div class="col-lg-7 mb-4 mb-lg-0">
          <h2 class="biz-heading">
            Building Smarter Business through<br/>
            Better Tech Experience
          </h2>
          <div class="heading-underline"></div>
          <p class="biz-desc">
            As a leading app development company in the USA and India, we have worked with 2700+ businesses whether it is a start-up or enterprise, and deliver the best solution in the industry. At Hyperlink InfoSystem, we offer a broad range of IT consulting services based on business requirements.
          </p>
        </div>

        <!-- Right: Contact Card -->
        <div class="col-lg-4 offset-lg-1">
          <div class="contact-card">
            <div class="badge-pill mb-2">
                <span class="dot"></span>
                Contact Us
            </div> 
            <h3 class="contact-title">Bring Innovation Together!</h3>
            <p class="contact-desc">
              Reach out to the team of the most innovative <span>IT transformation</span> Team and bring the transformation you need.
            </p>
            <a href="#" class="btn-query">
              <span class="query-arrow-wrap">
                <!-- Arrow visible at rest -->
                <svg class="arrow-default" viewBox="0 0 32 32">
                  <path d="M6 16h20M18 9l7 7-7 7"/>
                </svg>
                <!-- Arrow that slides in on hover -->
                <svg class="arrow-hover" viewBox="0 0 32 32">
                  <path d="M6 16h20M18 9l7 7-7 7"/>
                </svg>
              </span>
              <span class="btn-query-label">Drop Your Queries</span>
            </a>
          </div>
        </div>

      </div><!-- /top-row -->

      <!-- ── Business Types Grid ── -->
      <div class="biz-grid">

        <!-- Row 1 -->
        <div class="biz-row">
          <div class="biz-item">
            <div class="biz-num">1.</div>
            <div class="biz-content">
              <h4 class="biz-title">Startups<br/>Business</h4>
              <p class="biz-text">Have a strict budget and minimum resources? Don't worry, our professionals can give much-needed tech support to turn your dream idea into a reality.</p>
            </div>
          </div>
          <div class="biz-item">
            <div class="biz-num">2.</div>
            <div class="biz-content">
              <h4 class="biz-title">Small<br/>Business</h4>
              <p class="biz-text">Our proficients can help you build your brand identity blending their development experience well with your development requirements.</p>
            </div>
          </div>
        </div>

        <!-- Row 2 -->
        <div class="biz-row">
          <div class="biz-item">
            <div class="biz-num">3.</div>
            <div class="biz-content">
              <h4 class="biz-title">Enterprise<br/>Business</h4>
              <p class="biz-text">We help enterprise-level businesses enhance their business reach and streamline processes with innovative technology.</p>
            </div>
          </div>
          <div class="biz-item">
            <div class="biz-num">4.</div>
            <div class="biz-content">
              <h4 class="biz-title">Agency<br/>Business</h4>
              <p class="biz-text">Enhance the offering of your Agency business by leveraging our development expertise and trending technologies.</p>
            </div>
          </div>
        </div>

      </div><!-- /biz-grid -->

    </div><!-- /container -->
  </section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>