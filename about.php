 <?php
include_once('elements/header.php');
?>

  <style>
  
        /* Section Styling */
        .section-padding { padding: 80px 0 0 0; }
        
        /* Image Section */
        .img-wrapper { position: relative; }
        .hero-img { 
            width: 100%; 
            border-radius: 20px; 
            position: relative; 
            z-index: 2; 
        }
        .img-bg-deco {
            position: absolute;
            top: -20px;
            left: -20px;
            width: 35%;
            height: 45%;
            background-color: #e0d8f0; /* Light violet from image */
            border-radius: 20px;
            z-index: 1;
        }

        /* Feature Cards */
        .features-container {
            border: 1px solid #eee;
            border-radius: 20px;
            display: flex;
            flex-wrap: wrap;
        }
        .feature-item {
            padding: 40px;
            border-right: 1px solid #eee;
            flex: 1;
            min-width: 250px;
            position: relative;
        }
        .feature-item:last-child { border-right: none; }
        
        .plus-icon {
          position: absolute;
          right: -20px;
          top: 40%;
          background: white;
          border: 1px solid #eee;
          width: 40px;
          height: 40px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #aa8038;
          font-size: 1.5rem;
          font-weight: bold;
          z-index: 3;
        }

        /* Colors & Typography */
        .text-custom { color: #aa8038; }
        .accent-dot {
            height: 10px; width: 10px; border-radius: 50%; display: inline-block;
        }
        .heading-main { 
          font-weight: 700;
          font-size: 2.5rem; 
          color: #111439;
         }
        
        @media (max-width: 991px) {
            .feature-item { border-right: none; border-bottom: 1px solid #eee; }
            .plus-icon { display: none; }
        }
  </style>

  <section class="section-padding">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="img-wrapper">
                    <div class="img-bg-deco"></div>
                    <img src="assets/images/img.jpg" alt="Team" class="hero-img">
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="mb-3">
                    <span class="accent-dot bg-primary"></span>
                    <span class="accent-dot" style="background-color: #aa8038;"></span>
                    <small class="text-uppercase fw-bold ms-2 fs-6">Who We Are</small>
                </div>
                <h2 class="heading-main display-5 mb-4">We provide services designed to make your business operations more efficient & effective.</h2>
                <p class="text-muted who-we-para">Lorem ipsum dolor sit amet consectetur adipiscing elit lobortis dapibus metus hendrerit id tincidunt.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="features-container">
                    <div class="feature-item">
                        <div class="mb-3">
                            <span class="accent-dot bg-primary"></span>
                            <span class="accent-dot" style="background-color: #aa8038;"></span>
                            <small class="fw-bold ms-2 fs-5">01</small>
                        </div>
                        <h4>Strategy</h4>
                        <p class="text-muted who-we-para">Strategic technology advice to help plan your future growth.</p>
                        <div class="plus-icon">+</div>
                    </div>
                    <div class="feature-item">
                        <div class="mb-3">
                          <span class="accent-dot bg-primary"></span>
                          <span class="accent-dot" style="background-color: #aa8038;"></span>
                          <small class="fw-bold ms-2 fs-5">02</small>
                        </div>
                        <h4>Planning</h4>
                        <p class="text-muted who-we-para">Strategic technology advice to help plan your future growth.</p>
                        <div class="plus-icon">+</div>
                    </div>
                    <div class="feature-item">
                        <div class="mb-3">
                          <span class="accent-dot bg-primary"></span>
                          <span class="accent-dot" style="background-color: #aa8038;"></span>
                          <small class="fw-bold ms-2 fs-5">03</small>
                        </div>
                        <h4>Security</h4>
                        <p class="text-muted who-we-para">Strategic technology advice to help plan your future growth.</p>
                        <div class="plus-icon">+</div>
                    </div>
                    <div class="feature-item">
                        <div class="mb-3">
                          <span class="accent-dot bg-primary"></span>
                          <span class="accent-dot" style="background-color: #aa8038;"></span>
                          <small class="fw-bold ms-2 fs-5">04</small>
                        </div>
                        <h4>Support</h4>
                        <p class="text-muted who-we-para">Strategic technology advice to help plan your future growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <style>
        .mission-section { padding: 80px 0; }
        
        .badge-mission {
            background: #f0f0f0;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: #555;
            display: inline-block;
            margin-bottom: 20px;
        }

        .heading-main { 
          font-weight: 700; 
          color: #111; 
          margin-bottom: 25px; 
        }
        .hero-img { 
          width: 100%; 
          border-radius: 20px; 
          height: 100%; 
          object-fit: cover; 
        }

        .feature-icon { 
          font-size: 1.8rem; 
          color: #aa8038; 
          margin-bottom: 10px; 
        }

        .btn-custom {
            background-color: #aa8038; /* Matches your light blue reference */
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            color: #fff;
            font-weight: 600;
        }
        .btn-custom:hover { 
          background-color: #aa8038; 
          color: #fff;
        }

        @media (max-width: 991px) {
            .mission-img-col { 
              order: -1; 
              margin-bottom: 30px; 
            }
        }
  </style>

  <section class="mission-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-6">
                <div class="badge-mission">● Our Mission</div>
                <h1 class="heading-main display-5">Transforming technology into growth opportunities for every business</h1>
                <p class="text-muted mb-4">Our mission is simple yet powerful: to deliver innovative, secure, and scalable IT solutions that help businesses thrive in an ever-evolving digital world.</p>
                
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="feature-icon">🌀</div>
                        <h5 class="fw-bold">Outdated Legacy System</h5>
                        <p class="text-muted small">Relying on legacy system slow productivity increase risks & prevents your business from keeping pace.</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-icon">★</div>
                        <h5 class="fw-bold">Cybersecurity Threats</h5>
                        <p class="text-muted small">Rising cyberattacks and data breaches put sensitive information at risk, threatening business continuity.</p>
                    </div>
                </div>

                <button class="btn btn-custom">More Contact Us ↗</button>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6 mission-img-col">
                <img src="assets/images/mission-image.jpg" alt="Team collaborating" class="hero-img">
            </div>
        </div>
    </div>
  </section>

  <style>
        .vision-section { padding: 80px 0; }
        
        .badge-vision {
            background: #f0f0f0;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: #555;
            display: inline-block;
            margin-bottom: 20px;
        }

        .heading-main { font-weight: 700; color: #111; margin-bottom: 25px; line-height: 1.2; }
        .hero-img { width: 100%; border-radius: 20px; height: 100%; object-fit: cover; }

        /* Custom List Styling */
        .check-list { 
          list-style: none; 
          padding: 0; 
        }
        .check-list li { 
          margin-bottom: 15px; 
          font-size: 1.2rem;
          color: #555; 
        }
        .check-list li::before { 
          content: "✓"; 
          color: #aa8038; 
          font-weight: bold; 
          margin-right: 10px; 
        }

        /* Circular Button Styling */
        .contact-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #aa8038; /* Custom color applied */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            text-decoration: none;
            position: relative;
            transition: transform 0.3s;
        }
        .contact-circle:hover { transform: scale(1.05); color: white; }

        @media (max-width: 991px) {
            .image-col { order: -1; margin-bottom: 30px; }
        }
  </style>

  <section class="vision-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Image -->
            <div class="col-lg-6 image-col">
                <img src="assets/images/vision-image.jpg" alt="Team working" class="hero-img">
            </div>

            <!-- Right Content -->
            <div class="col-lg-6 ps-lg-5">
                <div class="badge-vision">● Our Vision</div>
                <h2 class="heading-main display-5">Our vision building smarter safer and more connected businesses</h2>
                <p class="text-muted mb-4">Our vision is to lead the digital future by delivering secure, scalable, and innovative IT solutions that empower businesses to grow, connect, and thrive globally.</p>
                
                <div class="rounded d-flex align-items-center justify-content-between">
                    <ul class="check-list mb-0">
                        <li>Streamlined processes that save time and resources.</li>
                        <li>Advance protection against cyber threats & data.</li>
                        <li>Smart IT solutions that reduce operational expenses.</li>
                    </ul>
                     
                </div>
            </div>
        </div>
    </div>
  </section>
 
  <style>
      .dark-section {
          background-color: #000;
          color: #fff;
          padding: 80px 20px;
          border-radius: 20px;
      }

      .badge-custom {
          background-color: #aa8038; /* Keeping original blue per image */
          color: #fff;
          padding: 10px 15px;
          font-size: 1rem;
          text-transform: uppercase;
      }

      .section-title {
          font-size: 3rem;
          font-weight: 700;
          margin-top: 20px;
          margin-bottom: 50px;
      }

      .feature-box {
          padding: 20px;
          border-right: 1px solid #333;
      }

      /* Removing border on last child for responsiveness */
      @media (min-width: 992px) {
          .feature-box:last-child {
              border-right: none;
          }
      }

      .feature-icon {
          font-size: 3rem;
          margin-bottom: 20px;
          color: #aa8038; /* Your requested color */
      }

      .feature-title {
          font-size: 1.5rem;
          margin-bottom: 15px;
      }

      .feature-text {
          color: #aaa;
          line-height: 1.6;
      }

      @media (max-width: 991px) {
          .feature-box {
              border-right: none;
              border-bottom: 1px solid #333;
              margin-bottom: 30px;
          }
      }
  </style> 

  <section class="dark-section container my-5"> 
    <span class="badge badge-custom">HOW WE DO</span>
    <h2 class="section-title">We Can Help You To</h2>

    <div class="row">
        <!-- Feature 1 -->
        <div class="col-lg-4 feature-box">
            <div class="feature-icon">💡</div>
            <h4 class="feature-title">Expertise & innovation</h4>
            <p class="feature-text">We pride ourselves staying at the front innovation, constantly pushing boundaries and redefining what is possible.</p>
        </div>

        <!-- Feature 2 -->
        <div class="col-lg-4 feature-box">
            <div class="feature-icon">📊</div>
            <h4 class="feature-title">Transparent process</h4>
            <p class="feature-text">Our transparent process is designed to demystify the journey from concept to delivery.</p>
        </div>

        <!-- Feature 3 -->
        <div class="col-lg-4 feature-box">
            <div class="feature-icon">👥</div>
            <h4 class="feature-title">Client approach</h4>
            <p class="feature-text">Our dedicated team takes the time to listen and collaborate, ensuring every interaction is a step toward success.</p>
        </div>
    </div> 
  </section>

  <style> 
        .section-bg { background-color: #f8f9fa; padding: 80px 0; }
        
        /* Card Styling */
        .custom-card {
            background: #ffffff;
            border: none;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: transform 0.3s ease;
        }
        
        /* Bottom Large Box */
        .bottom-box {
            background: #ffffff;
            border-radius: 40px;
            padding: 60px;
            margin-top: 50px;
        }

        /* Buttons */
        .btn-link-custom {
            background: #f8f9fa;
            border-radius: 50px;
            padding: 10px 25px;
            text-decoration: none;
            color: #212529;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-link-custom:hover {
            background: #aa8038; /* Your requested color */
            color: #fff;
        }

        .icon-box { font-size: 2.5rem; margin-bottom: 20px; }
        .text-custom { color: #aa8038; }
  </style> 

  <section class="section-bg">
    <div class="container">
        <!-- Header -->
        <small class="text-custom fw-bold">Why Choose Us</small>
        <h2 class="display-4 fw-bold mb-5">Why choose us ?</h2>

        <!-- Feature Cards -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="custom-card">
                    <div class="icon-box">💡</div>
                    <h4>Innovation</h4>
                    <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="custom-card">
                    <div class="icon-box">🎖️</div>
                    <h4>Quality-Focused</h4>
                    <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="custom-card">
                    <div class="icon-box">💰</div>
                    <h4>Value For Money</h4>
                    <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                </div>
            </div>
        </div>

        <!-- Bottom Call to Action Section -->
        <div class="bottom-box">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-4">Do you want to explore our outstanding work?</h2>
                    <p class="text-muted mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium, totam rem aperiam, eaque ipsa quae ab illo inventore...</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn-link-custom">Dribbble ↗</a>
                        <a href="#" class="btn-link-custom">Linkedin ↗</a>
                        <a href="#" class="btn-link-custom">Contact Us ↗</a>
                    </div>
                </div>
                <div class="col-lg-4 text-end d-none d-lg-block">
                    <span style="font-size: 8rem; color: #555;">🌐</span>
                </div>
            </div>
        </div>
    </div>
  </section>

  <style>
        .stats-section { padding: 80px 0; background-color: lightgray; }
        
        .sub-heading { color: #6366f1; font-weight: 600; font-size: 0.9rem; }
        
        .main-heading { font-weight: 700; font-size: 3rem; color: #111439; margin-bottom: 50px; }
        
        /* Stats Card Styling */
        .stat-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            height: 100%;
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #aa8038; /* Requested color applied */
            margin-bottom: 5px;
        }
        
        .stat-label { font-size: 1rem; color: #111439; font-weight: 600; }
        
        .stat-subtext { font-size: 0.85rem; color: #718096; margin-top: 5px; }

        @media (max-width: 768px) {
            .stat-card { margin-bottom: 20px; }
        }
  </style>

  <section class="stats-section">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-12">
                <p class="sub-heading">Ourview Comapny</p>
                <h2 class="main-heading">Stats that matter</h2>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="row g-4">
            <!-- Stat 1 -->
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-value">#1</div>
                    <div class="stat-label">IT Services</div>
                    <div class="stat-subtext">Company In UK</div>
                </div>
            </div>
            <!-- Stat 2 -->
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-value">300+</div>
                    <div class="stat-label">Global Clients</div>
                    <div class="stat-subtext">In Development</div>
                </div>
            </div>
            <!-- Stat 3 -->
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-value">21+</div>
                    <div class="stat-label">years</div>
                    <div class="stat-subtext">In Development</div>
                </div>
            </div>
            <!-- Stat 4 -->
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-value">$50+</div>
                    <div class="stat-label">Million</div>
                    <div class="stat-subtext">Total Revenue</div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <style>
      .team-section { padding: 80px 0; }
      
      /* Heading styling */
      .badge-team { background: #f0f0f0; padding: 5px 15px; border-radius: 50px; color: #555; font-size: 0.85rem; }
      .heading-main { font-weight: 700; color: #111; margin-top: 20px; margin-bottom: 50px; }

      /* Card styling */
      .team-card { position: relative; border-radius: 20px; overflow: hidden; height: 450px; }
      .team-img { width: 100%; height: 100%; object-fit: cover; }
      
      .info-box {
          position: absolute;
          bottom: 20px;
          left: 20px;
          right: 20px;
          background: white;
          border-radius: 15px;
          padding: 20px;
          text-align: center;
          box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      }

      .team-name { font-weight: 700; margin-bottom: 5px; }
      .team-role { font-size: 0.85rem; color: #718096; margin-bottom: 10px; }

      /* Icon styling with custom color */
      .social-links a { color: #555; margin: 0 5px; transition: color 0.3s; }
      .social-links a:hover { color: #aa8038; } /* Requested color */

        /* Container for social links - always takes up space */
      .social-links {
          display: flex;
          justify-content: center;
          gap: 15px;
          margin-top: 10px;
          
          /* Initially invisible, but maintains height */
          opacity: 0;
          height: 0;
          overflow: hidden;
          transition: all 0.4s ease-in-out;
      }

      /* Reveal on hover */
      .team-card:hover .social-links {
          opacity: 1;
          height: 24px; /* Adjust this to match your icon height */
      }

      /* Icon styling */
      .social-links a { 
          color: #555; 
          transition: color 0.3s; 
          font-size: 1.2rem;
      }
      .social-links a:hover { color: #aa8038; }
  </style>

  <section class="team-section">
    <div class="container">
        <!-- Header -->
        <div class="mb-5">
            <span class="badge-team">● Our Team</span>
            <h2 class="heading-main display-5">Our dedicated team blends innovation and expertise<br>to deliver secure, scalable, IT solutions.</h2>
        </div>

        <!-- Team Grid -->
        <div class="row g-4">
            <!-- Team Member 1 -->
            <div class="col-md-6 col-lg-3">
                <!-- Team Member 2 --> 
                <div class="team-card">
                    <img src="assets/images/team-1.jpg" class="team-img" alt="Daniel Johnson">
                    <div class="info-box">
                        <div class="team-name">Daniel Johnson</div>
                        <div class="team-role">Cybersecurity Specialist</div>
                        <!-- This div will now animate smoothly -->
                        <div class="social-links">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-globe"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div> 
                  </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col-md-6 col-lg-3">
                <!-- Team Member 2 --> 
                <div class="team-card">
                    <img src="assets/images/team-2.jpg" class="team-img" alt="Daniel Johnson">
                    <div class="info-box">
                        <div class="team-name">Daniel Johnson</div>
                        <div class="team-role">Cybersecurity Specialist</div>
                        <!-- This div will now animate smoothly -->
                        <div class="social-links">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-globe"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div> 
                  </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-md-6 col-lg-3">
                <!-- Team Member 2 --> 
                <div class="team-card">
                    <img src="assets/images/team-3.jpg" class="team-img" alt="Daniel Johnson">
                    <div class="info-box">
                        <div class="team-name">Daniel Johnson</div>
                        <div class="team-role">Cybersecurity Specialist</div>
                        <!-- This div will now animate smoothly -->
                        <div class="social-links">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-globe"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div> 
                  </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="col-md-6 col-lg-3">
                <!-- Team Member 2 --> 
                <div class="team-card">
                    <img src="assets/images/team-4.jpg" class="team-img" alt="Daniel Johnson">
                    <div class="info-box">
                        <div class="team-name">Daniel Johnson</div>
                        <div class="team-role">Cybersecurity Specialist</div>
                        <!-- This div will now animate smoothly -->
                        <div class="social-links">
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-globe"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div> 
                  </div>
                </div>
            </div>

        </div>
    </div>
</section>
 
<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>