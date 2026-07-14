
<style>
 
      /* ── FOOTER MAIN ── */
    .footer-main {
      background-color: #2d2d2d;
      padding: 60px 0 40px;
    }

    /* Brand */
    .footer-logo-icon {
      width: 42px;
      height: 42px;
      background-color: #aa8038;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .footer-logo-icon svg {
      width: 22px;
      height: 22px;
      fill: #fff;
    }
    .footer-brand-name {
      font-size: 1.35rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: 0.3px;
    }
    .footer-tagline {
      color: #fff;
      font-size: 1.2rem;
      line-height: 1.65;
      margin-top: 14px;
    }

    /* Divider under brand */
    .footer-divider {
      border-color: rgba(255,255,255,0.12);
      margin: 24px 0 28px;
    }

    /* Social icons */
    .footer-social-label {
      color: #fff;
      font-weight: 600;
      font-size: 1.2rem;
      margin-right: 14px;
    }
    .social-btn {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 1.5px solid rgba(255,255,255,0.2);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 0.95rem;
      text-decoration: none;
      transition: border-color 0.2s, color 0.2s, background 0.2s;
    }
    .social-btn:hover {
      border-color: #aa8038;
      color: #aa8038;
      background: rgba(170,128,56,0.1);
    }

    /* Section headings */
    .footer-heading {
      color: #fff;
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 22px;
      letter-spacing: 0.2px;
    }

    /* Services list */
    .footer-services {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .footer-services li {
      position: relative;
      padding-left: 16px;
      margin-bottom: 12px;
      font-size: 1rem;
      color: #fff;
      transition: color 0.2s;
      cursor: default;
    }
    .footer-services li::before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background-color: #aa8038;
    }
    .footer-services li:hover {
      color: #fff;
    }

    /* Contact items */
    .contact-item {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      margin-bottom: 22px;
    }
    .contact-icon-wrap {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background-color: #aa8038;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .contact-icon-wrap i {
      color: #fff;
      font-size: 1rem;
    }
    .contact-label {
      color: #adb5bd;
      font-size: 0.78rem;
      margin-bottom: 2px;
    }
    .contact-value {
      color: #fff;
      font-size: 0.9rem;
      font-weight: 600;
    }

    /* Newsletter */
    .newsletter-desc {
      color: #fff;
      font-size: 1rem;
      line-height: 1.65;
      margin-bottom: 20px;
    }
    .newsletter-form {
      display: flex;
      gap: 0;
      border-radius: 4px;
      overflow: hidden;
    }
    .newsletter-input {
      flex: 1;
      background: rgba(255,255,255,0.07);
      border: 1.5px solid rgba(255,255,255,0.15);
      border-right: none;
      border-radius: 4px 0 0 4px;
      color: #fff;
      padding: 10px 14px;
      font-size: 0.85rem;
      outline: none;
      transition: border-color 0.2s;
    }
    .newsletter-input::placeholder {
      color: rgba(255,255,255,0.4);
    }
    .newsletter-input:focus {
      border-color: #aa8038;
      background: rgba(255,255,255,0.1);
    }
    .newsletter-btn {
      background: #fff;
      color: #222;
      border: none;
      padding: 10px 20px;
      font-size: 0.85rem;
      font-weight: 600;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
      white-space: nowrap;
      transition: background 0.2s, color 0.2s;
    }
    .newsletter-btn:hover {
      background: #aa8038;
      color: #fff;
    }

    /* ── FOOTER BOTTOM ── */
    .footer-bottom {
      background-color: #252525;
      padding: 18px 0;
      border-top: 1px solid rgba(255,255,255,0.08);
    }
    .footer-nav-link {
      color: #fff;
      text-decoration: none;
      font-size: 1rem;
      margin-right: 20px;
      transition: color 0.2s;
    }
    .footer-nav-link:last-child { margin-right: 0; }
    .footer-nav-link:hover { color: #aa8038; }
    .footer-copy {
      color: #fff;
      font-size: 1rem;
    }

    /* ── RESPONSIVE TWEAKS ── */
    @media (max-width: 767.98px) {
      .footer-main { padding: 40px 0 30px; }
      .footer-heading { margin-top: 30px; }
      .newsletter-form { flex-direction: column; }
      .newsletter-input {
        border-right: 1.5px solid rgba(255,255,255,0.15);
        border-bottom: none;
        border-radius: 4px 4px 0 0;
      }
      .newsletter-btn { border-radius: 0 0 4px 4px; padding: 11px 20px; }
      .footer-bottom .text-md-end { text-align: left !important; margin-top: 8px; }
    }
</style>
<!-- ══════════════ FOOTER ══════════════ -->
<footer>

  <!-- Main Footer -->
  <div class="footer-main">
    <div class="container">
      <div class="row g-4">

        <!-- Col 1: Brand -->
        <div class="col-12 col-md-6 col-lg-3">
          <!-- Logo -->
          <div class="d-flex align-items-center gap-2 mb-0"> 
              <img src="assets/images/logo.png" alt="">  
          </div>

          <p class="footer-tagline">
            Codeio IT Solutions specializes in delivering cutting-edge managed IT services.
          </p>

          <hr class="footer-divider"/>

          <!-- Social -->
          <div class="d-flex align-items-center flex-wrap gap-2">
            <span class="footer-social-label">Follow Us:</span>
            <a href="javascript:void();" class="social-btn" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="javascript:void();" class="social-btn" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="javascript:void();" class="social-btn" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="javascript:void();" class="social-btn" aria-label="Dribbble"><i class="bi bi-dribbble"></i></a>
          </div>
        </div>

        <!-- Col 2: Services -->
        <div class="col-12 col-sm-6 col-lg-3">
          <h6 class="footer-heading">Our Services</h6>
          <ul class="footer-services">
            <li>Cloud Solutions</li>
            <li>IT Consulting &amp; Strategy</li>
            <li>Data Backup &amp; Recovery</li>
            <li>Network &amp; Infrastructure</li>
          </ul>
        </div>

        <!-- Col 3: Contact -->
        <div class="col-12 col-sm-6 col-lg-3">
          <h6 class="footer-heading">Contact Information</h6>

          <div class="contact-item">
            <div class="contact-icon-wrap">
              <i class="bi bi-telephone-fill"></i>
            </div>
            <div>
              <div class="contact-label">Phone Number</div>
              <div class="contact-value"><a href="tel:+971999007985" class="text-white text-decoration-none">+971 99900 9909</a></div>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon-wrap">
              <i class="bi bi-envelope-fill"></i>
            </div>
            <div>
              <div class="contact-label">Email Address</div>
              <div class="contact-value"><a href="mailto:devotiontech@gmail.com" class="text-white text-decoration-none">devotiontech@gmail.Com</a></div>
            </div>
          </div>
        </div>

        <!-- Col 4: Newsletter -->
        <div class="col-12 col-lg-3">
          <h6 class="footer-heading">Subscribe To Our Newsletter!</h6>
          <p class="newsletter-desc">
            Subscribe to our newsletter for expert insights, industry news, and practical tips delivered to inbox.
          </p>
          <div class="newsletter-form">
            <input type="email" class="newsletter-input" placeholder="Email Address *" aria-label="Email Address" />
            <button class="newsletter-btn" type="button">Subscribe</button>
          </div>
        </div>

      </div><!-- /row -->
    </div><!-- /container -->
  </div><!-- /footer-main -->

  <!-- Bottom Bar -->
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-8">
          <a href="careear.php" class="footer-nav-link">Carrear</a>
          <a href="privacy-policy.php" class="footer-nav-link">Privacy Policy</a>
          <a href="cookie-policy.php" class="footer-nav-link">Cookie Policy</a>
          <a href="terms-condition.php" class="footer-nav-link">Terms Of Condition</a> 
        </div>
        <div class="col-12 col-md-4 text-md-end footer-copy">
          Copyright &copy; 2026 All Rights Reserved.
        </div>
      </div>
    </div>
  </div>

</footer>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 

  <script>
    const tabs   = document.querySelectorAll('.tech-tab');
    const panels = document.querySelectorAll('.tab-panel');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const target = tab.dataset.tab;

        tabs.forEach(t => t.classList.remove('active'));
        panels.forEach(p => p.classList.remove('active'));

        tab.classList.add('active');
        document.getElementById('panel-' + target).classList.add('active');
      });
    });
  </script> 

  <script>
    const toggle = document.getElementById('servicesToggle');
    const mega = document.getElementById('servicesMega');

    toggle.addEventListener('click', e => {
      e.preventDefault();
      mega.classList.toggle('show');
    });

    // close when clicking outside
    document.addEventListener('click', e => {
      if (!toggle.contains(e.target) && !mega.contains(e.target)) {
        mega.classList.remove('show');
      }
    });
  </script>

  <script>
     // Featured slider
      new Swiper('#featuredSwiper', {
          loop: true,
          autoplay: {
              delay: 4000,
              disableOnInteraction: false
          },
          pagination: {
              el: '.swiper-pagination',
              clickable: true
          },
          navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev'
          },
      });

      // Filtering
      const pills = document.querySelectorAll('.pill');
      const items = document.querySelectorAll('.gitem');
      pills.forEach(pill => {
          pill.addEventListener('click', () => {
              pills.forEach(p => p.classList.remove('active'));
              pill.classList.add('active');
              const filter = pill.getAttribute('data-filter');
              items.forEach(item => {
                  if (filter === 'all' || item.getAttribute('data-cat') === filter) {
                      item.style.display = '';
                  } else {
                      item.style.display = 'none';
                  }
              });
          });
      });

      // Lightbox
      const galleryItems = Array.from(document.querySelectorAll('.gitem'));
      let currentIndex = 0;
      const lightbox = document.getElementById('lightbox');
      const lightboxImg = document.getElementById('lightbox-img');
      const lightboxCaption = document.getElementById('lightbox-caption');

      function openLightbox(index) {
          currentIndex = index;
          updateLightbox();
          lightbox.classList.add('open');
      }

      function closeLightbox() {
          lightbox.classList.remove('open');
      }

      function navLightbox(dir) {
          currentIndex = (currentIndex + dir + galleryItems.length) % galleryItems.length;
          updateLightbox();
      }

      function updateLightbox() {
          const item = galleryItems[currentIndex];
          const img = item.querySelector('img');
          const title = item.querySelector('.gitem-title').textContent;
          lightboxImg.src = img.src.replace('w=500', 'w=1200');
          lightboxCaption.textContent = title;
      }
      lightbox.addEventListener('click', (e) => {
          if (e.target === lightbox) closeLightbox();
      });
      document.addEventListener('keydown', (e) => {
          if (!lightbox.classList.contains('open')) return;
          if (e.key === 'Escape') closeLightbox();
          if (e.key === 'ArrowRight') navLightbox(1);
          if (e.key === 'ArrowLeft') navLightbox(-1);
      });
  </script>
 
  <script>
     function getSlidesPerView() {
        const w = window.innerWidth;
        if (w >= 992) return 3;
        if (w >= 768) return 2;
        if (w >= 576) return 1.3;
        return 1;
      }

      function updateProgress(sw) {
        const total = sw.slides.length;
        const perView = getSlidesPerView();
        const scrollable = total - perView;
        const pct = scrollable <= 0 ? 100 : Math.min(100, (sw.activeIndex / scrollable) * 100);
        document.getElementById('progressFill').style.width = Math.max(8, pct) + '%';
      }

      const swiper = new Swiper('.servicesSwiper', {
        slidesPerView: 1,
        spaceBetween: 16,
        breakpoints: {
          576: { slidesPerView: 1.3 },
          768: { slidesPerView: 2, spaceBetween: 20 },
          992: { slidesPerView: 3, spaceBetween: 20 },
        },

        on: {
          init(sw) { updateProgress(sw); },
          slideChange(sw) { updateProgress(sw); }
        }
      });

      window.addEventListener('resize', () => updateProgress(swiper));

  </script>
  
  <script>
     function toggleAccordion(item) {
        const isOpen = item.classList.contains('open');
        // close siblings within the same accordion group only
        const parent = item.parentElement;
        parent.querySelectorAll('.accordion-item').forEach(el => el.classList.remove('open'));
        if (!isOpen) {
            item.classList.add('open');
        }
    }

    // Category tabs
    const cattabs = document.querySelectorAll('.cat-tab');
    const groups = document.querySelectorAll('.faq-group');
    cattabs.forEach(tab => {
        tab.addEventListener('click', () => {
            cattabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const target = tab.getAttribute('data-group');
            groups.forEach(g => g.classList.toggle('active', g.id === target));
        });
    });
  </script>
 
</body>

</html>