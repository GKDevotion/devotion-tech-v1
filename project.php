<?php
  $seo = [
    'title' => 'Devotion Technologies Projects | Showcasing Our Digital Innovation & Solutions',
    'description' => 'Discover our latest projects and digital solutions developed by Devotion Technologies, delivering innovative technology experiences for modern businesses.',
    'keywords' => 'Devotion Technologies portfolio, technology solutions, software projects, web applications, digital transformation projects, IT services portfolio',
    'author' => 'Devotion Technologies'
  ];
  include_once('elements/header.php');
?>

<style>
  a {
    text-decoration: none;
    color: inherit;
  }

  img {
    max-width: 100%;
    display: block;
    object-fit: cover;
  }

  /* HERO */
  .hero {
    position: relative;
    padding: 90px 0 70px;
    overflow: hidden;
    background: #f6f6f8;
    text-align: center;
  }

  .hero::before {
    content: "";
    position: absolute;
    top: -120px;
    left: 50%;
    transform: translateX(-50%);
    width: 700px;
    height: 700px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(170, 128, 56, 0.12), transparent 70%);
  }

  .hero-inner {
    position: relative;
    max-width: 680px;
    margin: 0 auto;
  }

  .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid #e8e8ee;
    color: #aa8038;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 18px;
    border-radius: 30px;
    margin-bottom: 22px;
  }

  .eyebrow::before {
    content: "◆";
    font-size: 10px;
  }

  .hero h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 16px;
    line-height: 1.2;
  }

  .hero p {
    color: #6b7280;
    font-size: 16px;
  }

  .hero-stats {
    display: flex;
    justify-content: center;
    gap: 56px;
    margin-top: 48px;
    flex-wrap: wrap;
    position: relative;
  }

  .hero-stats div {
    text-align: center;
  }

  .hero-stats strong {
    display: block;
    font-size: 28px;
    font-weight: 800;
    color: #1a1d29;
  }

  .hero-stats span {
    font-size: 13px;
    color: #6b7280;
  }

  /* FILTER */
  .filter-bar {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    padding: 50px 0 10px;
  }

  .pill {
    font-size: 13.5px;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 30px;
    border: 1px solid #e8e8ee;
    color: #6b7280;
    background: #fff;
    cursor: pointer;
  }

  .pill.active {
    background: #aa8038;
    border-color: #aa8038;
    color: #fff;
  }

  /* FEATURED PROJECTS (large alternating) */
  .featured-projects {
    padding: 50px 0 30px;
    display: flex;
    flex-direction: column;
    gap: 60px;
  }

  .fproject {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
  }

  .fproject.reverse .fproject-text {
    order: 2;
  }

  .fproject.reverse .fproject-img {
    order: 1;
  }

  .fproject-img {
    border-radius: 16px;
    overflow: hidden;
    position: relative;
  }

  .fproject-img img {
    width: 100%;
    height: 360px;
    object-fit: cover;
  }

  .fproject-tag {
    display: inline-block;
    background: #fff;
    border: 1px solid #e8e8ee;
    color: #aa8038;
    font-size: 12.5px;
    font-weight: 800;
    padding: 6px 16px;
    border-radius: 20px;
    margin-bottom: 16px;
    letter-spacing: 0.3px;
  }

  .fproject-text h2 {
    font-size: 27px;
    font-weight: 800;
    margin-bottom: 14px;
    line-height: 1.3;
  }

  .fproject-text p {
    color: #6b7280;
    font-size: 1rem;
    margin-bottom: 22px;
  }

  .fproject-meta {
    display: flex;
    gap: 30px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }

  .fproject-meta div {
    border-left: 2px solid #aa8038;
    padding-left: 12px;
  }

  .fproject-meta strong {
    display: block;
    font-size: 1rem;
  }

  .fproject-meta span {
    font-size: 1rem;
    color: #6b7280;
  }

  .fproject-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    color: #aa8038;
    font-size: 14.5px;
  }

  .fproject-link .arrow {
    transition: transform .2s;
  }

  .fproject:hover .fproject-link .arrow {
    transform: translateX(4px);
  }

  /* SECTION LABEL */
  .section-label {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 80px 0 36px;
  }

  .section-label span {
    font-size: 1rem;
    font-weight: 800;
    color: #aa8038;
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }

  .section-label::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #e8e8ee;
  }

  /* PROJECT GRID */
  .project-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    margin-bottom: 70px;
  }

  .pcard {
    border: 1px solid #e8e8ee;
    border-radius: 14px;
    overflow: hidden;
    transition: box-shadow .2s, transform .2s;
  }

  .pcard:hover {
    box-shadow: 0 16px 32px rgba(10, 12, 30, 0.1);
    transform: translateY(-3px);
  }

  .pcard-img {
    position: relative;
    aspect-ratio: 4/3;
    overflow: hidden;
  }

  .pcard-img img {
    width: 100%;
    height: 100%;
  }

  .pcard-cat {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(255, 255, 255, 0.95);
    color: #1a1d29;
    font-size: 11.5px;
    font-weight: 800;
    padding: 5px 12px;
    border-radius: 20px;
  }

  .pcard-body {
    padding: 20px 22px 24px;
  }

  .pcard h3 {
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 10px;
    line-height: 1.35;
  }

  .pcard p {
    font-size: 1rem;
    color: #6b7280;
    margin-bottom: 16px;
  }

  .pcard-tags {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 16px;
  }

  .pcard-tags span {
    font-size: 0.7rem;
    font-weight: 700;
    background: #f6f6f8;
    padding: 5px 11px;
    border-radius: 14px;
    color: #1a1d29;
  }

  .pcard-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #e8e8ee;
    padding-top: 14px;
  }

  .pcard-link {
    font-size: 13.5px;
    font-weight: 700;
    color: #aa8038;
  }

  /* STATS BAND */
  .stats-band {
    background: #fff;
    border: 1px solid #aa8038;
    color: #fff;
    border-radius: 16px;
    padding: 50px 40px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 90px;
    position: relative;
    overflow: hidden;
  }

  .stats-band::before {
    content: "";
    position: absolute;
    right: -60px;
    top: -60px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(170, 128, 56, 0.35), transparent 70%);
  }

  .stat {
    text-align: center;
    position: relative;
  }

  .stat strong {
    display: block;
    font-size: 32px;
    margin-bottom: 10px;
    font-weight: 800;
    color: #aa8038;
  }

  .stat span {
    font-size: 1rem;
    color: #000;
  }

  /* PROCESS STRIP */
  .process {
    padding: 0 0 90px;
  }

  .process-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
  }

  .process-step {
    border: 1px solid #e8e8ee;
    border-radius: 14px;
    padding: 26px 22px;
    position: relative;
  }

  .process-step .step-num {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #aa8038;
    color: #fff;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    margin-bottom: 16px;
  }

  .process-step h4 {
    font-size: 15.5px;
    font-weight: 800;
    margin-bottom: 8px;
  }

  .process-step p {
    font-size: 1rem;
    color: #6b7280;
  }

  /* CTA BAND */
  .cta-band {
    background: linear-gradient(135deg, #aa8038, #8a672c);
    border-radius: 16px;
    padding: 56px 48px;
    text-align: center;
    color: #fff;
  }

  .cta-band h2 {
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 14px;
  }

  .cta-band p {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 28px;
    max-width: 520px;
    margin-left: auto;
    margin-right: auto;
  }

  .cta-buttons {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
  }

  .cta-buttons a {
    padding: 13px 28px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 14.5px;
  }

  .cta-primary {
    background: #fff;
    color: #8a672c;
  }

  .cta-secondary {
    border: 1.5px solid rgba(255, 255, 255, 0.6);
    color: #fff;
  }

  .cta-secondary:hover {
    background: rgba(255, 255, 255, 0.12);
  }

  @media (max-width:900px) {
    .fproject {
      grid-template-columns: 1fr;
    }

    .fproject.reverse .fproject-text {
      order: 1;
    }

    .fproject.reverse .fproject-img {
      order: 2;
    }

    .project-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .stats-band {
      grid-template-columns: repeat(2, 1fr);
    }

    .process-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width:600px) {
    .project-grid {
      grid-template-columns: 1fr;
    }

    .stats-band {
      grid-template-columns: 1fr 1fr;
    }

    .process-grid {
      grid-template-columns: 1fr;
    }

    .hero h1 {
      font-size: 30px;
    }

    .hero-stats {
      gap: 30px;
    }
  }
</style>

<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
  <div>
    <h1 class="mb-0 text-center">Our Projects</h1>
    <p class="text-black text-center mt-2">Get in touch with our team to discuss your ideas, explore innovative solutions, and discover how our technology expertise can help your business grow and succeed.</p>
  </div>
</section>

<div class="container">

  <!-- FILTER -->
  <div class="filter-bar">
    <div class="pill active">All Projects</div>
    <div class="pill">Web Apps</div>
    <div class="pill">Mobile Apps</div>
    <div class="pill">Cloud & DevOps</div>
    <div class="pill">E-Commerce</div>
    <div class="pill">Enterprise Software</div>
  </div>

  <!-- FEATURED PROJECTS -->
  <div class="featured-projects">

    <div class="fproject">
      <div class="fproject-img">
        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=900&q=80" alt="RemoteCo dashboard">
      </div>
      <div class="fproject-text">
        <span class="fproject-tag">Web App · Job Marketplace</span>
        <h2>RemoteCo — Leading Job Marketplace in Latin America</h2>
        <p>We rebuilt RemoteCo's core matching engine and employer dashboard, helping the platform scale to serve hundreds of thousands of remote job seekers across the region.</p>
        <div class="fproject-meta">
          <div><strong>500K+</strong><span>Active Users</span></div>
          <div><strong>6 months</strong><span>Build Time</span></div>
          <div><strong>99.9%</strong><span>Uptime</span></div>
        </div>
        <a href="#" class="fproject-link">View Case Study <span class="arrow">→</span></a>
      </div>
    </div>

    <div class="fproject reverse">
      <div class="fproject-img">
        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?w=900&q=80" alt="GetLift app">
      </div>
      <div class="fproject-text">
        <span class="fproject-tag">Mobile App · EdTech</span>
        <h2>GetLift — e-Book Reading App for Kids with Gamification</h2>
        <p>An interactive reading app that turns story completion into game progress, designed to build reading habits in children through rewards, streaks, and levels.</p>
        <div class="fproject-meta">
          <div><strong>80K+</strong><span>Downloads</span></div>
          <div><strong>4.8★</strong><span>App Store Rating</span></div>
          <div><strong>4 months</strong><span>Build Time</span></div>
        </div>
        <a href="#" class="fproject-link">View Case Study <span class="arrow">→</span></a>
      </div>
    </div>

    <div class="fproject">
      <div class="fproject-img">
        <img src="https://images.unsplash.com/photo-1535131749006-b7f58c99034b?w=900&q=80" alt="EnGolfer platform">
      </div>
      <div class="fproject-text">
        <span class="fproject-tag">Web & Mobile · Sports Tech</span>
        <h2>EnGolfer — Super-App for Golfers, Coaches & Facilities</h2>
        <p>A unified booking and coaching platform connecting golfers, coaches, and facilities — covering scheduling, payments, and performance tracking in one app.</p>
        <div class="fproject-meta">
          <div><strong>25K+</strong><span>Bookings/Month</span></div>
          <div><strong>300+</strong><span>Partner Facilities</span></div>
          <div><strong>5 months</strong><span>Build Time</span></div>
        </div>
        <a href="#" class="fproject-link">View Case Study <span class="arrow">→</span></a>
      </div>
    </div>

  </div>

  <!-- MORE PROJECTS GRID -->
  <div class="section-label"><span>More Projects</span></div>
  <div class="project-grid">

    <div class="pcard">
      <div class="pcard-img">
        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&q=80" alt="Fintech dashboard">
        <span class="pcard-cat">Fintech</span>
      </div>
      <div class="pcard-body">
        <h3>PayNest — SME Invoicing & Payments Platform</h3>
        <p>Automated invoicing, payment collection, and cash-flow forecasting for small businesses.</p>
        <div class="pcard-tags"><span>React</span><span>Node.js</span><span>Stripe</span></div>
        <div class="pcard-footer"><span class="pcard-link">View Details →</span></div>
      </div>
    </div>

    <div class="pcard">
      <div class="pcard-img">
        <img src="https://images.unsplash.com/photo-1556742111-a301076d9d18?w=500&q=80" alt="Logistics app">
        <span class="pcard-cat">Logistics</span>
      </div>
      <div class="pcard-body">
        <h3>CargoTrack — Real-Time Fleet Management System</h3>
        <p>Live GPS tracking, route optimization, and maintenance alerts for delivery fleets.</p>
        <div class="pcard-tags"><span>Flutter</span><span>AWS</span><span>IoT</span></div>
        <div class="pcard-footer"><span class="pcard-link">View Details →</span></div>
      </div>
    </div>

    <div class="pcard">
      <div class="pcard-img">
        <img src="https://images.unsplash.com/photo-1522252234503-e356532cafd5?w=500&q=80" alt="Healthcare portal">
        <span class="pcard-cat">Healthcare</span>
      </div>
      <div class="pcard-body">
        <h3>MediSync — Patient Records & Telehealth Portal</h3>
        <p>HIPAA-compliant scheduling, video consults, and records access for clinics.</p>
        <div class="pcard-tags"><span>Vue.js</span><span>Azure</span><span>WebRTC</span></div>
        <div class="pcard-footer"><span class="pcard-link">View Details →</span></div>
      </div>
    </div>

    <div class="pcard">
      <div class="pcard-img">
        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=500&q=80" alt="E-commerce store">
        <span class="pcard-cat">E-Commerce</span>
      </div>
      <div class="pcard-body">
        <h3>UrbanCart — Multi-Vendor Marketplace Platform</h3>
        <p>Vendor onboarding, inventory sync, and checkout built for scale across 12 countries.</p>
        <div class="pcard-tags"><span>Next.js</span><span>Shopify API</span></div>
        <div class="pcard-footer"><span class="pcard-link">View Details →</span></div>
      </div>
    </div>

    <div class="pcard">
      <div class="pcard-img">
        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=500&q=80" alt="Analytics dashboard">
        <span class="pcard-cat">Enterprise</span>
      </div>
      <div class="pcard-body">
        <h3>InsightHub — Internal Business Intelligence Suite</h3>
        <p>Custom dashboards pulling from five internal systems into one reporting layer.</p>
        <div class="pcard-tags"><span>Python</span><span>D3.js</span><span>Snowflake</span></div>
        <div class="pcard-footer"><span class="pcard-link">View Details →</span></div>
      </div>
    </div>

    <div class="pcard">
      <div class="pcard-img">
        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=500&q=80" alt="Cloud migration">
        <span class="pcard-cat">Cloud & DevOps</span>
      </div>
      <div class="pcard-body">
        <h3>CloudShift — Zero-Downtime Infrastructure Migration</h3>
        <p>Migrated a monolithic app to containerized microservices on managed Kubernetes.</p>
        <div class="pcard-tags"><span>Docker</span><span>Kubernetes</span><span>GCP</span></div>
        <div class="pcard-footer"><span class="pcard-link">View Details →</span></div>
      </div>
    </div>

  </div>

  <!-- STATS -->
  <div class="stats-band">
    <div class="stat"><strong>150+</strong><span>Projects Completed</span></div>
    <div class="stat"><strong>98%</strong><span>Client Satisfaction</span></div>
    <div class="stat"><strong>2.5K+</strong><span>Businesses Empowered</span></div>
    <div class="stat"><strong>99.9%</strong><span>Average Uptime Delivered</span></div>
  </div>

  <!-- PROCESS -->
  <div class="process">
    <div class="section-label"><span>How We Deliver</span></div>
    <div class="process-grid">
      <div class="process-step">
        <div class="step-num">1</div>
        <h4>Discovery & Scoping</h4>
        <p>We map goals, constraints, and success metrics before writing a single line of code.</p>
      </div>
      <div class="process-step">
        <div class="step-num">2</div>
        <h4>Design & Architecture</h4>
        <p>User flows, system architecture, and technical decisions get locked in early.</p>
      </div>
      <div class="process-step">
        <div class="step-num">3</div>
        <h4>Build & Iterate</h4>
        <p>Agile sprints with regular demos so you see progress, not just a final reveal.</p>
      </div>
      <div class="process-step">
        <div class="step-num">4</div>
        <h4>Launch & Support</h4>
        <p>We stay on after go-live for monitoring, fixes, and ongoing enhancements.</p>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <div class="cta-band">
    <h2>Have a project in mind?</h2>
    <p>Tell us what you're building and we'll show you how we'd approach it — no obligation, just a clear plan.</p>
    <div class="cta-buttons">
      <a href="#" class="cta-primary">Start Your Project</a>
      <a href="#" class="cta-secondary">Book A Free Call</a>
    </div>
  </div>

</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>