<?php
$seo = [
  'title' => 'Life At Concept | Devotion Technologies - Technology Experts & Innovators',
  'description' => 'Discover the passionate team at Devotion Technologies dedicated to building innovative software solutions, digital experiences, and technology-driven business solutions.',
  'keywords' => 'Devotion Technologies team members, IT company team, software engineers, developers, technology innovators, digital transformation experts',
  'author' => 'Devotion Technologies'
];
include_once('elements/header.php');
?>
<style>
  .breadcrumb-strip {
    background: #111827;
    color: #fff;
    font-size: 1rem;
    padding: 1rem 0;
  }

  .breadcrumb-strip a {
    color: #fff;
    text-decoration: none;
  }

  .breadcrumb-strip a:hover {
    color: #d8bd8c;
  }

  .breadcrumb-strip .current {
    color: #d8bd8c;
  }

  /* ===== HERO ===== */
  .hero {
    position: relative;
    padding: 5.5rem 0 4rem;
    overflow: hidden;
    background:
      radial-gradient(circle at 85% 15%, rgba(170, 128, 56, .12), transparent 55%),
      #f8f5ef;
  }

  .hero .eyebrow-line {
    display: flex;
    align-items: center;
    gap: .6rem;
    margin-bottom: 1.1rem;
  }

  .hero .eyebrow-line .dash {
    width: 34px;
    height: 2px;
    background: #aa8038;
  }

  .hero h1 {
    font-size: clamp(2.4rem, 4.2vw, 3.6rem);
    font-weight: 600;
    line-height: 1.05;
    color: #111827;
  }

  .hero h1 em {
    font-style: italic;
    color: #aa8038;
  }

  .hero p.lead-copy {
    color: rgba(17, 24, 39, .7);
    font-size: 1.08rem;
    max-width: 480px;
    line-height: 1.65;
  }

  .hero-stats {
    display: flex;
    gap: 2.1rem;
    margin-top: 2.2rem;
    flex-wrap: wrap;
  }

  .hero-stats .stat-num {
    font-family: 'Fraunces', serif;
    font-size: 1.9rem;
    font-weight: 600;
    color: #111827;
    line-height: 1;
  }

  .hero-stats .stat-label {
    font-size: .76rem;
    color: #6b6558;
    margin-top: .25rem;
  }

  /* photo collage */
  .collage {
    position: relative;
    height: 460px;
  }

  .collage img {
    position: absolute;
    object-fit: cover;
    border-radius: 14px;
    box-shadow: 0 18px 40px -14px rgba(17, 24, 39, .35);
    border: 4px solid #fff;
  }

  .collage .c1 {
    width: 60%;
    height: 62%;
    top: 0;
    right: 0;
  }

  .collage .c2 {
    width: 46%;
    height: 42%;
    bottom: 0;
    left: 0;
  }

  .collage .c3 {
    width: 34%;
    height: 34%;
    bottom: 10%;
    right: 8%;
    z-index: 3;
  }

  .collage .badge-float {
    position: absolute;
    top: 12%;
    left: 0;
    background: #aa8038;
    color: #fff;
    padding: .9rem 1.1rem;
    border-radius: 12px;
    box-shadow: 0 14px 30px -10px rgba(170, 128, 56, .55);
    z-index: 4;
    max-width: 170px;
  }

  .collage .badge-float .n {
    font-family: 'Fraunces', serif;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
  }

  .collage .badge-float .l {
    font-size: .72rem;
    opacity: .9;
    margin-top: 2px;
  }

  /* ===== SECTION HEADERS ===== */
  .section-pad {
    padding: 5rem 0;
  }

  .section-head .eyebrow {
    margin-bottom: .7rem;
    display: block;
  }

  .section-head h2 {
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 600;
    color: #111827;
  }

  .section-head p {
    color: #6b6558;
    font-size: 1.2rem;
  }

  /* ===== PILLARS ===== */
  .pillar-card {
    background: #ffffff;
    border: 1px solid #e7e0d1;
    border-radius: 16px;
    padding: 2rem 1.7rem;
    height: 100%;
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  }

  .pillar-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px -20px rgba(17, 24, 39, .25);
    border-color: #d8bd8c;
  }

  .pillar-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    background: rgba(170, 128, 56, .12);
    color: #8a6529;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    margin-bottom: 1.3rem;
  }

  .pillar-card h3 {
    font-size: 1.15rem;
    font-weight: 600;
    margin-bottom: .6rem;
  }

  .pillar-card p {
    color: #6b6558;
    font-size: 1rem;
    line-height: 1.6;
    margin: 0;
  }


  /* ===== A DAY IN THE LIFE — professional alternating timeline ===== */
  .timeline-section {
    background: #111827;
    background-image: radial-gradient(circle at 12% 8%, rgba(170, 128, 56, .16), transparent 45%),
      radial-gradient(circle at 90% 85%, rgba(170, 128, 56, .10), transparent 40%);
    color: #fff;
  }

  .timeline-section .eyebrow {
    color: #d8bd8c;
  }

  .timeline-section .section-head h2 {
    color: #fff;
  }

  .timeline-section .section-head p {
    color: rgba(255, 255, 255, .55);
  }

  .section-head-center {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
  }

  .section-head-center p {
    margin-left: auto;
    margin-right: auto;
  }

  .timeline-pro {
    position: relative;
    max-width: 980px;
    margin: 3.5rem auto 0;
    padding-top: .5rem;
  }

  .timeline-pro::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 6px;
    bottom: 6px;
    width: 2px;
    background: linear-gradient(to bottom, transparent, rgba(216, 189, 140, .4) 6%, rgba(216, 189, 140, .4) 94%, transparent);
    transform: translateX(-50%);
  }

  .t-item {
    position: relative;
    width: 50%;
    padding: 0 3.2rem 3rem;
  }

  .t-item:last-child {
    padding-bottom: 0;
  }

  .t-item.side-l {
    left: 0;
    text-align: right;
  }

  .t-item.side-r {
    left: 50%;
    text-align: left;
  }

  .t-node {
    position: absolute;
    top: 0;
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: linear-gradient(150deg, #aa8038 0%, #8a6529 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    color: #fff;
    box-shadow: 0 0 0 6px #111827, 0 10px 26px -8px rgba(170, 128, 56, .65);
    z-index: 2;
  }

  .t-item.side-l .t-node {
    right: -27px;
  }

  .t-item.side-r .t-node {
    left: -27px;
  }

  .t-card {
    display: inline-block;
    text-align: left;
    background: rgba(255, 255, 255, .045);
    border: 1px solid rgba(255, 255, 255, .09);
    border-radius: 16px;
    padding: 1.5rem 1.7rem;
    max-width: 420px;
    transition: transform .25s ease, border-color .25s ease, background .25s ease;
  }

  .t-item:hover .t-card {
    background: rgba(255, 255, 255, .075);
    border-color: rgba(216, 189, 140, .4);
  }

  .t-item.side-l:hover .t-card {
    transform: translateX(-4px);
  }

  .t-item.side-r:hover .t-card {
    transform: translateX(4px);
  }

  .t-time {
    display: inline-block;
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .06em;
    color: #d8bd8c;
    background: rgba(170, 128, 56, .16);
    border: 1px solid rgba(216, 189, 140, .3);
    border-radius: 999px;
    padding: .3rem .8rem;
    margin-bottom: .8rem;
  }

  .t-card h4 {
    font-size: 1.08rem;
    font-weight: 600;
    color: #fff;
    margin-bottom: .5rem;
  }

  .t-card p {
    color: #fff;
    font-size: 1rem;
    margin: 0;
    line-height: 1.62;
  }

  /* ===== GALLERY ===== */
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 150px;
    gap: 12px;
  }

  .gallery-grid .g-item {
    border-radius: 12px;
    overflow: hidden;
    position: relative;
  }

  .gallery-grid .g-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
  }

  .gallery-grid .g-item:hover img {
    transform: scale(1.08);
  }

  .gallery-grid .g-item.tall {
    grid-row: span 2;
  }

  .gallery-grid .g-item.wide {
    grid-column: span 2;
  }

  .g-caption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: .8rem .9rem .6rem;
    background: linear-gradient(to top, rgba(17, 24, 39, .82), transparent);
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    opacity: 0;
    transition: opacity .25s ease;
  }

  .gallery-grid .g-item:hover .g-caption {
    opacity: 1;
  }

  /* ===== BENEFITS ===== */
  .benefit-strip {
    border: 1px solid #e7e0d1;
    border-radius: 16px;
    padding: 1.6rem 1.5rem;
    height: 100%;
    display: flex;
    gap: 1rem;
    align-items: flex-start;
  }

  .benefit-strip i {
    color: #8a6529;
    font-size: 1.1rem;
    margin-top: .15rem;
  }

  .benefit-strip h4 {
    font-size: .98rem;
    font-weight: 600;
    margin-bottom: .2rem;
  }

  .benefit-strip p {
    font-size: 1rem;
    color: #6b6558;
    margin: 0;
  }

  /* ===== CTA BANNER ===== */
  .join-banner {
    background: #aa8038;
    background: linear-gradient(120deg, #aa8038 0%, #8a6529 100%);
    border-radius: 22px;
    padding: 3.2rem 3rem;
    color: #fff;
    position: relative;
    overflow: hidden;
  }

  .join-banner::before {
    content: "";
    position: absolute;
    right: -60px;
    top: -60px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .08);
  }

  .join-banner h2 {
    color: #fff;
    font-size: clamp(1.7rem, 2.6vw, 2.2rem);
  }

  .join-banner p {
    color: rgba(255, 255, 255, .85);
    max-width: 480px;
  }

  .btn-cream {
    background: #fff;
    color: #8a6529;
    border-radius: 999px;
    padding: .75rem 1.6rem;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    gap: .5rem;
  }

  .btn-cream:hover {
    background: #111827;
    color: #fff;
  }

  /* ===== FOOTER ===== */
  footer.site-footer {
    background: #111827;
    color: rgba(255, 255, 255, .55);
    padding: 3rem 0 1.4rem;
    font-size: .87rem;
  }

  footer.site-footer h5 {
    color: #fff;
    font-family: 'Fraunces', serif;
    font-size: 1.05rem;
    margin-bottom: 1rem;
  }

  footer.site-footer a {
    color: rgba(255, 255, 255, .55);
  }

  footer.site-footer a:hover {
    color: #d8bd8c;
  }

  footer .bottom-line {
    border-top: 1px solid rgba(255, 255, 255, .1);
    margin-top: 2rem;
    padding-top: 1.2rem;
    font-size: .78rem;
  }

  @media (max-width: 991px) {
    .collage {
      height: 340px;
      margin-top: 2.5rem;
    }

    .gallery-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .day-timeline::before {
      left: 70px;
    }

    .day-time {
      width: 70px;
    }

    .day-time::after {
      right: -19.5px;
    }
  }
</style>
 

  <div class="breadcrumb-strip">
    <div class="container">
      <a href="index.php">Home</a>
      <span class="mx-1">/</span>
      <a href="#">Company</a>
      <span class="mx-1">/</span>
      <span class="current">Life at Concept</span>
    </div>
  </div>

  <!-- ============ HERO ============ -->
  <header class="hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <div class="eyebrow-line"><span class="dash"></span><span class="eyebrow">Company &middot; Culture</span></div>
          <h1>The people <em>behind</em><br>every line we ship.</h1>
          <p class="lead-copy">140+ engineers, designers and consultants across India, working on real client problems since 2000 — this is what a week at Concept Infoway actually looks like, in our own words.</p>
          <div class="hero-stats">
            <div>
              <div class="stat-num">140+</div>
              <div class="stat-label">IT professionals</div>
            </div>
            <div>
              <div class="stat-num">25</div>
              <div class="stat-label">Years in business</div>
            </div>
            <div>
              <div class="stat-num">3</div>
              <div class="stat-label">Countries served</div>
            </div>
            <div>
              <div class="stat-num">4.8<span style="font-size:1rem;">/5</span></div>
              <div class="stat-label">Team satisfaction</div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="collage">
            <img class="c1" src="https://picsum.photos/id/1074/700/700" alt="Team collaborating at Concept Infoway">
            <img class="c2" src="https://picsum.photos/id/1076/600/500" alt="Office culture moment">
            <img class="c3" src="https://picsum.photos/id/1049/400/400" alt="Team celebration">
            <div class="badge-float">
              <div class="n">98%</div>
              <div class="l">of the team would recommend Concept to a friend</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- ============ PILLARS ============ -->
  <section class="section-pad">
    <div class="container">
      <div class="section-head mb-5">
        <div class="badge-pill">
          <span class="dot"></span>
          What it feels like here
        </div>
        <h2>Four things that define our days</h2>
        <p>Not a mission statement — the actual habits that shape how the team works together.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="pillar-card">
            <div class="pillar-icon"><i class="fa-solid fa-people-arrows"></i></div>
            <h3>Flat by default</h3>
            <p>Any engineer can walk into a leadership conversation. Ideas get judged on merit, not on who's in the room.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="pillar-icon-wrap"></div>
          <div class="pillar-card">
            <div class="pillar-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <h3>Always learning</h3>
            <p>Microsoft certification tracks, internal tech talks, and a study budget everyone actually uses.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="pillar-card">
            <div class="pillar-icon"><i class="fa-solid fa-mug-hot"></i></div>
            <h3>Real work-life balance</h3>
            <p>Predictable hours, no-meeting Fridays, and a leave policy managers actively encourage using.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="pillar-card">
            <div class="pillar-icon"><i class="fa-solid fa-globe"></i></div>
            <h3>Global exposure</h3>
            <p>Client work spanning the US, UK and Australia means you're solving problems for teams across time zones.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ A DAY IN THE LIFE (professional alternating timeline) ============ -->
  <section class="timeline-section section-pad">
    <div class="container">
      <div class="section-head section-head-center mb-4" style="max-width:640px;">
        <div class="badge-pill">
          <span class="dot"></span>
          Signature
        </div>
        <h2>A day in the life at Concept</h2>
        <p>Compiled from stand-up notes and calendar patterns across the engineering floor — a fairly typical Tuesday.</p>
      </div>

      <div class="timeline-pro">
        <div class="t-item side-l">
          <div class="t-node"><i class="fa-solid fa-mug-hot"></i></div>
          <div class="t-card">
            <span class="t-time">9:30 AM</span>
            <h4>Coffee, then stand-up</h4>
            <p>Teams gather over filter coffee before a 15-minute stand-up — blockers first, wins second.</p>
          </div>
        </div>

        <div class="t-item side-r">
          <div class="t-node"><i class="fa-solid fa-laptop-code"></i></div>
          <div class="t-card">
            <span class="t-time">11:00 AM</span>
            <h4>Deep work block</h4>
            <p>No internal meetings booked before 1 PM. This is protected time for building, reviewing, and pairing.</p>
          </div>
        </div>

        <div class="t-item side-l">
          <div class="t-node"><i class="fa-solid fa-utensils"></i></div>
          <div class="t-card">
            <span class="t-time">1:00 PM</span>
            <h4>Lunch on the terrace</h4>
            <p>Cross-team tables by design — the QA lead and a first-year intern end up talking cricket most days.</p>
          </div>
        </div>

        <div class="t-item side-r">
          <div class="t-node"><i class="fa-solid fa-video"></i></div>
          <div class="t-card">
            <span class="t-time">3:30 PM</span>
            <h4>Client sync</h4>
            <p>Overlap hours with US and UK clients. Delivery leads walk through sprint progress and open questions live.</p>
          </div>
        </div>

        <div class="t-item side-l">
          <div class="t-node"><i class="fa-solid fa-moon"></i></div>
          <div class="t-card">
            <span class="t-time">5:45 PM</span>
            <h4>Wrap and wind down</h4>
            <p>Async updates go out, tomorrow's board gets groomed, and Friday evenings often end with a floor-wide game.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============ GALLERY ============ -->
  <section class="section-pad">
    <div class="container">
      <div class="section-head mb-5">
        <span class="eyebrow">In frame</span>
        <h2>Moments from the floor</h2>
        <p>Festivals, launches, sports days and the everyday — a running album of life at Concept.</p>
      </div>
      <div class="gallery-grid">
        <div class="g-item tall"><img src="https://picsum.photos/id/1050/500/700" alt="Diwali celebration at the office">
          <div class="g-caption">Diwali celebrations, office floor</div>
        </div>
        <div class="g-item wide"><img src="https://picsum.photos/id/1059/900/450" alt="Annual sports day">
          <div class="g-caption">Annual sports day</div>
        </div>
        <div class="g-item"><img src="https://picsum.photos/id/1078/450/450" alt="New hire onboarding">
          <div class="g-caption">Onboarding week</div>
        </div>
        <div class="g-item"><img src="https://picsum.photos/id/1084/450/450" alt="Product launch celebration">
          <div class="g-caption">Shipping day cheers</div>
        </div>
        <div class="g-item wide"><img src="https://picsum.photos/id/1082/900/450" alt="Team offsite">
          <div class="g-caption">Quarterly offsite</div>
        </div>
        <div class="g-item"><img src="https://picsum.photos/id/1069/450/450" alt="Internal tech talk">
          <div class="g-caption">Friday tech talks</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ BENEFITS ============ -->
  <section class="section-pad" style="background:#fff; border-top:1px solid #e7e0d1;">
    <div class="container">
      <div class="section-head mb-5">
        <span class="eyebrow">Beyond the paycheck</span>
        <h2>What the team gets, in practice</h2>
      </div>
      <div class="row g-3">
        <div class="col-md-6 col-lg-4">
          <div class="benefit-strip"><i class="fa-solid fa-briefcase-medical"></i>
            <div>
              <h4>Health cover for family</h4>
              <p>Group insurance that extends to spouse, children and parents.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="benefit-strip"><i class="fa-solid fa-certificate"></i>
            <div>
              <h4>Certification sponsorship</h4>
              <p>Microsoft and cloud certification exams fully covered.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="benefit-strip"><i class="fa-solid fa-house-laptop"></i>
            <div>
              <h4>Hybrid flexibility</h4>
              <p>Choose your mix of in-office and remote days by team agreement.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="benefit-strip"><i class="fa-solid fa-cake-candles"></i>
            <div>
              <h4>Milestone recognition</h4>
              <p>Work anniversaries and birthdays are genuinely celebrated, not just emailed.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="benefit-strip"><i class="fa-solid fa-plane"></i>
            <div>
              <h4>Paid time off</h4>
              <p>Generous leave policy, plus additional days earned with tenure.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="benefit-strip"><i class="fa-solid fa-chart-line"></i>
            <div>
              <h4>Clear growth tracks</h4>
              <p>Defined paths from associate engineer through to architect and lead.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ JOIN CTA ============ -->
  <section class="pb-5">
    <div class="container">
      <div class="join-banner d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-4">
        <div>
          <h2>Want a seat on the floor?</h2>
          <p>We're always looking for engineers, designers and consultants who care about doing the work well.</p>
        </div>
        <a class="btn-cream" href="#">See open roles <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </section>

  <?php
  include_once('elements/faqs.php');
  include_once('elements/footer.php');
  ?>