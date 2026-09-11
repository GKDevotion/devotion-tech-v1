<?php
    $seo = [
        'title' => 'Company Overview | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'Learn about Devotion Technologies — our story, mission, and the principles that shape how we build software, cloud and digital solutions for businesses worldwide.',
        'keywords' => 'Devotion Technologies company overview, IT company history, software development company, digital transformation partner, technology innovators',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>

 
<style>

    img {
        max-width: 100%;
        display: block;
    }

    .wrap {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: #b38f51;
    }

    .eyebrow::before {
        content: "◆";
        font-size: .6rem;
    }

    .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e8e3d6;
        border-radius: 999px;
        padding: 8px 16px;
        font-size: .85rem;
        font-weight: 600;
        color: #8f7040;
        background: #fff;
    }

    .badge-pill .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #b38f51;
        display: inline-block;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 26px;
        border-radius: 999px;
        font-weight: 600;
        font-size: .92rem;
        cursor: pointer;
        border: 1.5px solid transparent;
        transition: all .25s ease;
        white-space: nowrap;
    }

    .btn-gold {
        background: #b38f51;
        color: #fff;
    }

    .btn-gold:hover {
        background: #8f7040;
        transform: translateY(-2px);
        color: #fff;
    }

    .btn-outline-light {
        border-color: rgba(255, 255, 255, .35);
        color: #fff;
    }

    .btn-outline-light:hover {
        border-color: #fff;
        background: rgba(255, 255, 255, .08);
        color: #fff;
    }

    .btn-outline-dark {
        border-color: #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark:hover {
        border-color: #b38f51;
        color: #8f7040;
    }

    section {
        padding: 90px 0;
    }

    .section-head {
        margin-bottom: 52px;
    }

    .section-head h2 {
        font-size: clamp(1.7rem, 2.6vw, 2.3rem);
        font-weight: 700;
        margin: 14px 0 12px;
        line-height: 1.25;
        color: #070d24;
    }

    .section-head p {
        color: #6c7280;
        font-size: 1rem;
        max-width: 640px;
    }

    /* ---------- TOP BANNER ---------- */
    .top-banner-background {
        background-size: cover;
        background-position: center;
        background-color: #070d24;
        padding: 70px 24px;
    }

    .top-banner-background h1 { 
        font-weight: 700;
        font-size: clamp(2rem, 3.4vw, 2.6rem);
    }

    .top-banner-background p { 
        max-width: 640px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ---------- OVERVIEW / STORY ---------- */
    .overview-media {
        position: relative;
    }

    .overview-media img {
        border-radius: 20px;
        width: 100%;
        height: 420px;
        object-fit: cover;
    }

    .overview-tag {
        position: absolute;
        bottom: -22px;
        right: -18px;
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 18px 22px;
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
        max-width: 230px;
    }

    .overview-tag strong {
        display: block;
        font-size: 1.6rem;
        font-weight: 800;
        color: #070d24;
        line-height: 1;
        margin-bottom: 6px;
    }

    .overview-tag span {
        font-size: .82rem;
        color: #6c7280;
    }

    .overview-copy h2 {
        font-size: clamp(1.7rem, 2.6vw, 2.3rem);
        font-weight: 700;
        color: #070d24;
        margin: 16px 0 18px;
        line-height: 1.3;
    }

    .overview-copy p {
        color: #6c7280;
        font-size: 1rem;
        line-height: 1.75;
        margin-bottom: 16px !important;
    }

    .overview-facts {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-top: 28px;
    }

    .overview-facts li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: .93rem;
        color: #1a1f30;
        font-weight: 500;
    }

    .overview-facts .ico {
        width: 34px;
        height: 34px;
        flex: none;
        border-radius: 10px;
        background: #f2e8d3;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .overview-facts svg {
        width: 17px;
        height: 17px;
    }

    /* ---------- STATS STRIP ---------- */
    .stats-strip {
        background: #070d24;
        border-radius: 24px;
    }

    .stats-strip .wrap {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        padding: 48px 24px;
    }

    .stats-strip .stat {
        text-align: center;
        border-right: 1px solid rgba(255, 255, 255, .12);
    }

    .stats-strip .stat:last-child {
        border-right: none;
    }

    .stats-strip .stat strong {
        display: block;
        font-size: clamp(1.8rem, 3vw, 2.4rem);
        font-weight: 800;
        color: #fff;
    }

    .stats-strip .stat span {
        font-size: .85rem;
        color: rgba(255, 255, 255, .65);
    }

    /* ---------- MISSION / VISION ---------- */
    .mv-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 26px;
    }

    .mv-card {
        border: 1px solid #e8e3d6;
        border-radius: 20px;
        padding: 36px 32px;
        background: #fff;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .mv-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
    }

    .mv-icon {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        background: #070d24;
        color: #b38f51;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .mv-icon svg {
        width: 26px;
        height: 26px;
    }

    .mv-card h4 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #070d24;
        margin-bottom: 10px;
    }

    .mv-card p {
        color: #6c7280;
        font-size: .98rem;
        line-height: 1.7;
    }

    /* ---------- JOURNEY / TIMELINE ---------- */
    .journey {
        background: #f7f4ee;
    }

    .timeline {
        position: relative;
    }

    .timeline::before {
        content: "";
        position: absolute;
        left: 27px;
        top: 6px;
        bottom: 6px;
        width: 2px;
        background: #e8e3d6;
    }

    .timeline-item {
        position: relative;
        display: flex;
        gap: 26px;
        padding-bottom: 42px;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-num {
        flex: none;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid #b38f51;
        color: #8f7040;
        font-weight: 800;
        font-size: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
    }

    .timeline-body {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 20px 24px;
        flex: 1;
    }

    .timeline-body .yr {
        color: #8f7040;
        font-weight: 700;
        font-size: .85rem;
        letter-spacing: .03em;
    }

    .timeline-body h4 {
        font-size: 1.05rem;
        font-weight: 700;
        color: #070d24;
        margin: 4px 0 6px;
    }

    .timeline-body p {
        color: #6c7280;
        font-size: .95rem;
        line-height: 1.65;
    }

    /* ---------- WHY / VALUES ---------- */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .value-card {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 28px 24px;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .value-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
    }

    .value-icon {
        width: 50px;
        height: 50px;
        border-radius: 13px;
        background: #f2e8d3;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
    }

    .value-icon svg {
        width: 24px;
        height: 24px;
    }

    .value-card h4 {
        font-size: 1.02rem;
        font-weight: 600;
        color: #070d24;
        margin-bottom: 8px;
    }

    .value-card p {
        color: #6c7280;
        font-size: .95rem;
        line-height: 1.6;
    }

    /* ---------- PRESENCE ---------- */
    .presence {
        background: #070d24;
        border-radius: 26px;
        padding: 56px 48px;
        position: relative;
        overflow: hidden;
    }

    .presence::after {
        content: "";
        position: absolute;
        left: -60px;
        bottom: -80px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(179, 143, 81, .32), transparent 70%);
    }

    .presence-head {
        position: relative;
        z-index: 2;
        max-width: 560px;
        margin-bottom: 36px;
    }

    .presence-head h2 {
        color: #fff;
        font-size: clamp(1.5rem, 2.4vw, 2rem);
        font-weight: 700;
        margin: 14px 0 12px;
    }

    .presence-head p {
        color: rgba(255, 255, 255, .68);
        font-size: 1rem;
    }

    .presence-chips {
        position: relative;
        z-index: 2;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .presence-chips span {
        border: 1px solid rgba(255, 255, 255, .2);
        color: #fff;
        border-radius: 999px;
        padding: 9px 18px;
        font-size: .85rem;
        font-weight: 500;
    }

    /* ---------- CAREERS CTA ---------- */
    .careers {
        background: linear-gradient(135deg, #070d24, #152a58);
        border-radius: 26px;
        padding: 56px 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        flex-wrap: wrap;
        position: relative;
        overflow: hidden;
    }

    .careers::after {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(179, 143, 81, .35), transparent 70%);
    }

    .careers-copy {
        position: relative;
        z-index: 2;
        max-width: 560px;
    }

    .careers-copy h2 {
        color: #fff;
        font-size: clamp(1.5rem, 2.4vw, 2rem);
        margin: 14px 0 12px;
        font-weight: 700;
    }

    .careers-copy p {
        color: rgba(255, 255, 255, .7);
        font-size: 1rem;
    }

    .careers-actions {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .overview-copy {
            order: -1;
        }

        .stats-strip .wrap {
            grid-template-columns: repeat(2, 1fr);
        }

        .stats-strip .stat:nth-child(2) {
            border-right: none;
        }

        .mv-grid {
            grid-template-columns: 1fr;
        }

        .value-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .overview-tag {
            right: 12px;
        }
    }

    @media (max-width: 680px) {
        section {
            padding: 60px 0;
        }

        .stats-strip .wrap {
            grid-template-columns: 1fr 1fr;
        }

        .value-grid {
            grid-template-columns: 1fr;
        }

        .careers,
        .presence {
            flex-direction: column;
            align-items: flex-start;
            padding: 36px 26px;
        }

        .overview-facts {
            grid-template-columns: 1fr;
        }

        .timeline::before {
            left: 23px;
        }

        .timeline-num {
            width: 48px;
            height: 48px;
            font-size: .88rem;
        }
    }
</style>

<!-- TOP BANNER -->
<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">Company Overview</h1>
        <p class="text-center mt-2">A closer look at Devotion Technologies — who we are, what we believe, and how we've grown into a trusted technology partner.</p>
    </div>
</section>

<!-- OUR STORY -->
<section>
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="overview-media">
                    <img src="assets/images/team.jpg" alt="Devotion Technologies team at work">
                    <div class="overview-tag">
                        <strong>2016</strong>
                        <span>The year Devotion Technologies was founded</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 overview-copy">
                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    Who We Are
                </div>
                <h2>An IT partner built by engineers, not just salespeople</h2>
                <p>Devotion Technologies started with a simple frustration: too many software vendors promised transformation and delivered templates. We set out to build a company where every engagement is led by people who have actually shipped the systems they're advising on.</p>
                <p>Today we work with startups, growing businesses and enterprises across 12 countries, helping them design, build and run software, cloud infrastructure and digital products that hold up under real-world load — not just in a demo.</p>
                <ul class="overview-facts">
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4" /><circle cx="12" cy="12" r="9" /></svg></span>
                        <span>Founded in 2016, bootstrapped from a two-person team</span>
                    </li>
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M12 3c2.5 2.6 3.8 5.7 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.7-3.8-9S9.5 5.6 12 3z" /><circle cx="12" cy="12" r="9" /></svg></span>
                        <span>Distributed team working across 12 countries</span>
                    </li>
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2" /><path d="M3 9h18M8 4v5" /></svg></span>
                        <span>500+ projects delivered for clients of every size</span>
                    </li>
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3 6.5 7 1-5.2 5 1.3 7-6.1-3.4-6.1 3.4 1.3-7-5.2-5 7-1z" /></svg></span>
                        <span>98% client satisfaction across delivered engagements</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- STATS STRIP -->
<section style="padding-top:0;">
    <div class="container">
        <div class="stats-strip">
            <div class="wrap">
                <div class="stat">
                    <strong>2.5K+</strong>
                    <span>Businesses empowered</span>
                </div>
                <div class="stat">
                    <strong>98%</strong>
                    <span>Client satisfaction rate</span>
                </div>
                <div class="stat">
                    <strong>500+</strong>
                    <span>Projects delivered</span>
                </div>
                <div class="stat">
                    <strong>99.9%</strong>
                    <span>Average system uptime</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MISSION & VISION -->
<section style="padding-top:0;">
    <div class="container">
        <div class="section-head text-center mx-auto" style="max-width:640px;">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                What Drives Us
            </div>
            <h2>Our mission and vision</h2>
            <p class="mx-auto">Two ideas anchor every decision we make, from how we staff a project to which technologies we recommend.</p>
        </div>
        <div class="mv-grid">
            <div class="mv-card">
                <div class="mv-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9" /><path d="M16 8l-2.5 6.5L8 17l2.5-6.5z" /></svg>
                </div>
                <h4>Our Mission</h4>
                <p>To help businesses adopt technology that actually reduces friction — building scalable software, secure infrastructure and thoughtful digital experiences that let our clients focus on growth instead of firefighting.</p>
            </div>
            <div class="mv-card">
                <div class="mv-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7z" /><circle cx="12" cy="12" r="3" /></svg>
                </div>
                <h4>Our Vision</h4>
                <p>To be the technology partner businesses call first — known not for the size of our team, but for the reliability of our engineering and the honesty of our advice, wherever in the world our clients operate.</p>
            </div>
        </div>
    </div>
</section>

<!-- JOURNEY -->
<section class="journey">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                Our Journey
            </div>
            <h2>How Devotion Technologies has grown</h2>
            <p>A few of the milestones that shaped who we are today.</p>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-num">01</div>
                <div class="timeline-body">
                    <span class="yr">2016</span>
                    <h4>Founded with a single client</h4>
                    <p>Devotion Technologies opens its doors as a two-person software consultancy, delivering its first web platform for a local retail client.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">02</div>
                <div class="timeline-body">
                    <span class="yr">2018</span>
                    <h4>First dedicated engineering pods</h4>
                    <p>We move from freelance-style delivery to structured engineering pods, adding our first cloud and QA specialists to the team.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">03</div>
                <div class="timeline-body">
                    <span class="yr">2021</span>
                    <h4>Global expansion</h4>
                    <p>The team goes fully distributed, growing to specialists working across 12 countries and time zones to support clients around the clock.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">04</div>
                <div class="timeline-body">
                    <span class="yr">2023</span>
                    <h4>500th project delivered</h4>
                    <p>We ship our 500th client project, spanning marketplaces, mobile apps and managed cloud infrastructure across a dozen industries.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">05</div>
                <div class="timeline-body">
                    <span class="yr">Today</span>
                    <h4>A full-service technology partner</h4>
                    <p>From consulting and product design through to cloud, DevOps and long-term managed IT support — we now support clients end to end.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VALUES / WHY -->
<section>
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                How We Work
            </div>
            <h2>The principles behind every engagement</h2>
            <p>These are the standards our leadership holds every team, and every project, to.</p>
        </div>
        <div class="value-grid">
            <div class="value-card">
                <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19.5A2.5 2.5 0 016.5 17H20" /><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" /></svg></div>
                <h4>Transparent Delivery</h4>
                <p>Real-time updates, dedicated project managers and no surprise scope changes — clients always know exactly where their project stands.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2" /><path d="M8 10V7a4 4 0 018 0v3" /></svg></div>
                <h4>Security By Design</h4>
                <p>Every architecture decision is reviewed against security and compliance requirements from day one, not bolted on after launch.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M13 2L4 14h7l-1 8 9-12h-7z" /></svg></div>
                <h4>Built To Scale</h4>
                <p>We design systems for the business our clients are growing into, not just the one they run today, so re-platforming is never the plan.</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4" /><path d="M4 21c1.5-4 5-6 8-6s6.5 2 8 6" /></svg></div>
                <h4>People-First Partnerships</h4>
                <p>We staff long-term relationships, not rotating contractors, so the engineers who scoped a project are the ones who deliver it.</p>
            </div>
        </div>
    </div>
</section>

<!-- GLOBAL PRESENCE -->
<section class="container" style="padding-top:0;">
    <div class="presence">
        <div class="presence-head">
            <span class="eyebrow" style="color:#b38f51;">Global Presence</span>
            <h2>One team, working across 12 countries</h2>
            <p>Distributed talent means we can staff the right specialists for a project, and support clients across time zones without handoff delays.</p>
        </div>
        <div class="presence-chips">
            <span>United States</span>
            <span>United Kingdom</span>
            <span>India</span>
            <span>Canada</span>
            <span>Germany</span>
            <span>UAE</span>
            <span>Australia</span>
            <span>Singapore</span>
        </div>
    </div>
</section>

<!-- CAREERS / MEET THE TEAM CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:#b38f51;">Behind The Work</span>
            <h2>Meet the people building all of this</h2>
            <p>Our company overview only tells half the story — see the leaders and specialists driving it day to day.</p>
        </div>
        <div class="careers-actions">
            <a href="team.php" class="btn btn-gold">Meet Our Team</a>
            <a href="#" class="btn btn-outline-light">Talk To Us</a>
        </div>
    </div>
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>
