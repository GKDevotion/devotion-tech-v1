<?php
    $seo = [
        'title' => 'Contact Devotion Technologies | Start Your Digital Journey With Us',
        'description' => 'Reach out to Devotion Technologies for reliable technology solutions, custom software development, web applications, and digital services tailored to your business needs.',
        'keywords' => 'Devotion Technologies contact, technology partner, custom software development, IT solutions provider, web development services, digital transformation',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>

<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">Contact Us</h1>
        <p class="text-black text-center mt-2">Get in touch with our team to discuss your ideas, explore innovative solutions, and discover how our technology expertise can help your business grow and succeed.</p>
    </div>
</section>
 
  <style> 
          /* --- Typography & Headings --- */
          .contact-heading {
              color: #111439; /* Deep navy blue */
              font-weight: 700;
              font-size: 3rem;
              margin-bottom: 1.5rem;
          }
          
          .contact-desc {
              font-size: 1.05rem;
              line-height: 1.6;
              color: #64748b;
              margin-bottom: 2.5rem;
          }

          /* --- Left Column Icons & Text --- */
          .info-box {
              display: flex;
              margin-bottom: 2rem;
              align-items: flex-start;
          }
          
          .icon-circle {
              width: 45px;
              height: 45px;
              min-width: 45px;
              background-color: #aa8038; /* Deep blue from image */
              color: white;
              border-radius: 50%;
              display: flex;
              align-items: center;
              justify-content: center;
              font-size: 1.2rem;
              margin-right: 15px;
          }

          .info-title {
              font-size: 0.85rem;
              font-weight: 700;
              letter-spacing: 0.5px;
              color: #aa8038;
              margin-bottom: 0.2rem;
              text-transform: uppercase;
          }

          .info-title.text-custom {
              color: #aa8038; /* Requested custom color applied to highlight */
          }

          .info-text {
              font-size: 0.95rem;
              color: #718096;
              margin: 0;
              line-height: 1.4;
          }

          /* --- Right Column Form Card --- */
          .contact-card {
              background: #ffffff;
              border-radius: 16px;
              box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
              padding: 3rem;
              border: 1px solid rgba(0,0,0,0.05);
          }

          /* Custom Form Inputs (Bottom border only) */
          .custom-input {
              border: none;
              border-bottom: 1px solid #e2e8f0;
              border-radius: 0;
              padding: 0.5rem 0;
              background-color: transparent;
              color: #1a202c;
              font-size: 0.95rem;
          }

          .custom-input:focus {
              box-shadow: none;
              border-color: #aa8038; /* Highlight bottom border on focus */
              background-color: transparent;
          }
          
          .custom-input::placeholder {
              color: #a0aec0;
          }

          .form-group-spacing {
              margin-bottom: 2.5rem;
          }

          .form-check-label {
              font-size: 1rem;
              color: #aa8038;
              font-weight: 500;
          }

          /* --- Custom Button --- */
          .btn-custom {
              background-color: #aa8038; /* Requested custom color */
              color: #ffffff;
              border: none;
              border-radius: 50px;
              padding: 12px 35px;
              font-size: 0.9rem;
              font-weight: 600;
              letter-spacing: 0.5px;
              text-transform: uppercase;
              transition: all 0.3s ease;
          }

          .btn-custom:hover {
              background-color: #8c682b; /* Slightly darker shade for hover state */
              color: #ffffff;
              transform: translateY(-2px);
          }

          /* Responsive adjustments */
          @media (max-width: 991px) {
              .contact-card {
                  padding: 2rem;
                  margin-top: 3rem;
              }
              .contact-heading {
                  font-size: 2.5rem;
              }
          }
  </style>

  <section class="py-5 mt-5">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                
                <div class="col-lg-5 pe-lg-4">
                    <h1 class="contact-heading">Contact Us</h1>
                    <p class="contact-desc">
                        Are you an existing customer or worked with us in the past? 
                        Request support through the Client Support portal. This form does not connect to our IT Support.
                    </p>

                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <div class="info-box">
                                <div class="icon-circle">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div>
                                    <div class="info-title">Phone</div>
                                    <p class="info-text">+971-5840-8547</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="info-box">
                                <div class="icon-circle">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div>
                                    <div class="info-title">Mail</div>
                                    <p class="info-text">devotiontech@mail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="info-box border-top pt-4">
                                <div class="icon-circle">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div>
                                    <div class="info-title">Office</div>
                                    <p class="info-text">Southeast Loop 712<br>H Street NE Spring</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="info-box border-top pt-4">
                                <div class="icon-circle">
                                    <i class="bi bi-calendar-check-fill"></i>
                                </div>
                                <div>
                                    <div class="info-title text-custom">Schedule</div>
                                    <p class="info-text">Schedule a free 10-minute consultation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-card">
                        <form>
                            <div class="form-group-spacing">
                                <input type="text" class="form-control custom-input" placeholder="Name" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group-spacing">
                                    <input type="tel" class="form-control custom-input" placeholder="Phone" required>
                                </div>
                                <div class="col-md-6 form-group-spacing">
                                    <input type="email" class="form-control custom-input" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group-spacing">
                                    <input type="text" class="form-control custom-input" placeholder="Company Name">
                                </div>
                                <div class="col-md-6 form-group-spacing">
                                    <input type="text" class="form-control custom-input" placeholder="How did you hear about us?">
                                </div>
                            </div>

                            <div class="form-group-spacing">
                                <textarea class="form-control custom-input" rows="1" placeholder="Message" required></textarea>
                            </div>

                            <div class="form-check mb-4 mt-4">
                                <input class="form-check-input" type="checkbox" id="privacyCheck" required>
                                <label class="form-check-label" for="privacyCheck">
                                    I agree that my personal information will be processed and stored by risetech
                                </label>
                            </div>

                            <button type="submit" class="btn btn-custom mt-2">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
  </section>

  <style>
          /* Container for the map to handle rounded corners and responsive height */
          .map-wrapper {
              position: relative;
              width: 100%;
              height: 500px;
              border-radius: 16px;
              overflow: hidden;
              box-shadow: 0 4px 12px rgba(0,0,0,0.08);
          }

          /* Ensure iframe fills the container */
          .map-wrapper iframe {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              border: 0;
          }

          /* Custom overlay card styling */
          .map-info-card {
              position: absolute;
              top: 3px;
              left: 7px;
              background: #ffffff;
              border-radius: 8px;
              padding: 16px;
              width: 310px;
              box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
              z-index: 10;
          }

          /* Typography tweaks to match the image */
          .map-title {
              font-size: 1rem;
              font-weight: 600;
              color: #202124;
              margin-bottom: 0;
          }

          .map-address {
              font-size: 0.85rem;
              color: #5f6368;
              line-height: 1.4;
              margin-bottom: 8px;
          }

          /* Custom Color Applications */
          .text-custom {
              color: #aa8038 !important;
          }

          .icon-btn {
              display: inline-flex;
              align-items: center;
              justify-content: center;
              width: 32px;
              height: 32px;
              border-radius: 50%;
              background-color: #f8f9fa;
              color: #aa8038; /* Applied requested color */
              text-decoration: none;
              transition: all 0.2s ease;
          }

          .icon-btn:hover {
              background-color: #aa8038;
              color: #ffffff !important;
          }

          /* Responsive adjustments for smaller mobile screens */
          @media (max-width: 576px) {
              .map-wrapper {
                  height: 400px;
                  border-radius: 12px;
              }
              .map-info-card {
                  top: 10px;
                  left: 10px;
                  width: calc(100% - 20px); /* Makes card stretch on mobile */
                  max-width: 320px;
              }
          }
  </style>

  <section class="container py-5">
        <div class="row">
            <div class="col-12">
                
                <div class="map-wrapper">
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14600.672659104033!2d90.35489815!3d23.812648799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c11bc6480c45%3A0x1b7e412586a111!2sMirpur%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="map-info-card">
                        
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h2 class="map-title pe-2">Egens Lab Limited</h2>
                            <div class="d-flex gap-1">
                                <a href="#" class="icon-btn" title="Share">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                                <a href="#" class="icon-btn" title="Directions">
                                    <i class="bi bi-sign-turn-right-fill"></i>
                                </a>
                            </div>
                        </div>

                        <p class="map-address">
                            House#168/170, Road 02<br>
                            Avenue 1, Dhaka 1216,<br>
                            Bangladesh
                        </p>

                        <div class="d-flex align-items-center" style="font-size: 0.85rem;">
                            <span class="fw-medium me-1 text-dark">4.8</span>
                            <i class="bi bi-star-fill text-custom me-1"></i>
                            <a href="#" class="text-custom text-decoration-none me-1">(9)</a>
                            <i class="bi bi-info-circle text-muted" style="font-size: 0.75rem;"></i>
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