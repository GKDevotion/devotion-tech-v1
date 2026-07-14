<?php
    $seo = [
        'title' => 'Meet Our Team | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'Discover the passionate team at Devotion Technologies dedicated to building innovative software solutions, digital experiences, and technology-driven business solutions.',
        'keywords' => 'Devotion Technologies team members, IT company team, software engineers, developers, technology innovators, digital transformation experts',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>

<style>
 
    p {
        margin: 0;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

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
        color: #aa8038;
    }

    .eyebrow::before {
        content: "◆";
        font-size: .6rem;
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
        background: #aa8038;
        color: #fff;
    }

    .btn-gold:hover {
        background: #8a6529;
        transform: translateY(-2px);
        color: #fff;
    }

    .btn-outline-light {
        border-color: rgba(255, 255, 255, .35);
        color: #fff;
    }

    .btn-outline-light:hover {
        border-color: #fff;
        color: #fff;
        background: rgba(255, 255, 255, .08);
    }

    .btn-outline-dark {
        border-color: #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark:hover {
        border-color: #aa8038;
        color: #8a6529;
    }

    /* ---------- HEADER ---------- */
    header {
        position: sticky;
        top: 0;
        z-index: 50;
        background: #fff;
        border-bottom: 1px solid #e8e3d6;
    }

    .nav-inner {
        max-width: 1180px;
        margin: 0 auto;
        padding: 16px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }

    .logo {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 1.35rem;
        color: #070d24;
        letter-spacing: .02em;
    }

    .logo span {
        color: #aa8038;
    }

    nav.links {
        display: flex;
        gap: 30px;
        align-items: center;
    }

    nav.links a {
        font-size: .93rem;
        font-weight: 500;
        color: #1a1f30;
        opacity: .8;
        transition: opacity .2s, color .2s;
    }

    nav.links a.active {
        color: #8a6529;
        opacity: 1;
        font-weight: 600;
    }

    nav.links a:hover {
        opacity: 1;
        color: #8a6529;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 6px;
    }

    .menu-toggle svg {
        width: 26px;
        height: 26px;
        color: #070d24;
    }

    /* ---------- HERO ---------- */
    .hero {
        position: relative;
        background: linear-gradient(160deg, #070d24 10%, #0d1a3d 60%, #152a58 100%);
        overflow: hidden;
        padding: 88px 0 64px;
    }

    .hero .wrap {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        gap: 56px;
        align-items: center;
    }

    .hero-copy .eyebrow {
        color: #c9a25f;
    }

    .hero h1 {
        color: #fff;
        font-size: clamp(2.2rem, 4vw, 3.15rem);
        font-weight: 700;
        line-height: 1.15;
        margin: 18px 0 20px;
    }

    .hero h1 em {
        font-style: normal;
        color: #c9a25f;
    }

    .hero p.lead {
        color: rgba(255, 255, 255, .72);
        font-size: 1.05rem;
        max-width: 520px;
        margin-bottom: 32px;
    }

    .hero-ctas {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 40px;
    }

    .hero-people {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .avatar-stack {
        display: flex;
    }

    .avatar-stack img {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 3px solid #070d24;
        object-fit: cover;
        margin-left: -14px;
    }

    .avatar-stack img:first-child {
        margin-left: 0;
    }

    .hero-people span {
        color: rgba(255, 255, 255, .7);
        font-size: .88rem;
    }

    .hero-people strong {
        color: #fff;
    }

    .hero-visual {
        position: relative;
    }

    .circuit-card {
        position: relative;
        background: rgba(255, 255, 255, .04);
        border: 1px solid rgba(255, 255, 255, .12);
        border-radius: 20px;
        padding: 28px;
        backdrop-filter: blur(6px);
    }

    .circuit-card .grid-photos {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .circuit-card .grid-photos img {
        border-radius: 14px;
        height: 150px;
        width: 100%;
        object-fit: cover;
    }

    .circuit-card .grid-photos div:first-child img {
        height: 318px;
    }

    .circuit-card .grid-photos div:first-child {
        grid-row: span 2;
    }

    .gold-tag {
        position: absolute;
        bottom: -18px;
        left: -18px;
        background: #aa8038;
        color: #fff;
        border-radius: 14px;
        padding: 16px 20px;
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
    }

    .gold-tag strong {
        display: block;
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .gold-tag span {
        font-size: .78rem;
        opacity: .9;
    }

    svg.circuit-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        opacity: .5;
    }

   
    /* ---------- SECTION GENERIC ---------- */
    section {
        padding: 90px 0;
    }

    .section-head { 
        margin-bottom: 52px;
    }
 

    .section-head h2 {
        font-size: clamp(1.7rem, 2.6vw, 2.3rem);
        font-weight: 700;
        margin: 0px 0 12px;
        line-height: 1.25;
    }

    .section-head p {
        color: #6c7280;
        font-size: 1rem;
    }

    /* ---------- LEADERSHIP ---------- */
    .leader-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 26px;
    }

    .leader-card {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 18px;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .leader-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
    }

    .leader-photo {
        position: relative;
        height: 230px;
        overflow: hidden;
    }

    .leader-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .leader-card:hover .leader-photo img {
        transform: scale(1.06);
    }

    .leader-social {
        position: absolute;
        bottom: 12px;
        right: 12px;
        display: flex;
        gap: 8px;
        opacity: 0;
        transform: translateY(6px);
        transition: all .25s ease;
    }

    .leader-card:hover .leader-social {
        opacity: 1;
        transform: translateY(0);
    }

    .leader-social a {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #070d24;
        box-shadow: 0 6px 14px rgba(0, 0, 0, .15);
    }

    .leader-social a:hover {
        background: #aa8038;
        color: #fff;
    }

    .leader-social svg {
        width: 15px;
        height: 15px;
    }

    .leader-body {
        padding: 18px 20px 22px;
    }

    .leader-body h4 {
        font-size: 1.05rem;
        font-weight: 600;
    }

    .leader-body .role {
        color: #aa8038;
        font-size: 1rem;
        font-weight: 600;
        margin: 4px 0 10px;
        display: block;
    }

    .leader-body p {
        color: #6c7280;
        font-size: 1rem;
        line-height: 1.6;
    }

    /* ---------- TEAM TABS + GRID ---------- */
    .tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 40px;
    }

    .tab-btn {
        padding: 10px 20px;
        border-radius: 999px;
        border: 1.5px solid #e8e3d6;
        background: #fff;
        font-size: .86rem;
        font-weight: 600;
        color: #6c7280;
        cursor: pointer;
        transition: all .2s ease;
    }

    .tab-btn:hover {
        border-color: #c9a25f;
        color: #8a6529;
    }

    .tab-btn.active {
        background: #070d24;
        border-color: #070d24;
        color: #fff;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .team-card {
        border-radius: 16px;
        border: 1px solid #e8e3d6;
        overflow: hidden;
        background: #fff;
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
        border-color: #c9a25f;
    }

    .team-photo {
        height: 210px;
        position: relative;
        overflow: hidden;
    }

    .team-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .team-card:hover .team-photo img {
        transform: scale(1.06);
    }

    .team-photo .dept-chip {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(7, 13, 36, .7);
        color: #fff;
        font-size: .68rem;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 999px;
        letter-spacing: .02em;
    }

    .team-info {
        padding: 16px 18px 18px;
    }

    .team-info h4 {
        font-size: 1rem;
        font-weight: 600;
    }

    .team-info .role {
        display: block;
        color: #aa8038;
        font-size: 1rem;
        font-weight: 600;
        margin: 3px 0 10px;
    }

    .team-social {
        display: flex;
        gap: 8px;
    }

    .team-social a {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #f7f4ee;
        display: flex;
        font-size: 1rem;
        align-items: center;
        justify-content: center;
        color: #070d24;
        transition: all .2s ease;
    }

    .team-social a:hover {
        background: #aa8038;
        color: #fff;
    }

    .team-social svg {
        width: 13px;
        height: 13px;
    }

    .team-card[hidden] {
        display: none;
    }

    /* ---------- CULTURE ---------- */
    .culture {
        background: #f7f4ee;
    }

    .culture-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .culture-card {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 28px 24px;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .culture-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
    }

    .culture-icon {
        width: 50px;
        height: 50px;
        border-radius: 13px;
        background: #f2e8d3;
        color: #8a6529;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
    }

    .culture-icon svg {
        width: 24px;
        height: 24px;
    }

    .culture-card h4 {
        font-size: 1.02rem;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .culture-card p {
        color: #6c7280;
        font-size: 1rem;
        line-height: 1.6;
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
        background: radial-gradient(circle, rgba(170, 128, 56, .35), transparent 70%);
    }

    .careers-copy {
        position: relative;
        z-index: 2;
        max-width: 560px;
    }

    .careers-copy .eyebrow {
        color: #aa8038;
    }

    .careers-copy h2 {
        color: #fff;
        font-size: clamp(1.5rem, 2.4vw, 2rem);
        margin: 14px 0 12px;
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
    @media (max-width:980px) {
        .hero .wrap {
            grid-template-columns: 1fr;
        }

        .hero-visual {
            order: -1;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .leader-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .team-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .culture-grid {
            grid-template-columns: repeat(2, 1fr);
        }
 
    }

    @media (max-width:680px) {
        nav.links {
            position: fixed;
            top: 64px;
            left: 0;
            right: 0;
            background: #fff;
            flex-direction: column;
            padding: 20px 24px;
            gap: 18px;
            border-bottom: 1px solid #e8e3d6;
            transform: translateY(-130%);
            transition: transform .3s ease;
            z-index: 40;
        }

        nav.links.open {
            transform: translateY(0);
        }

        .menu-toggle {
            display: block;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .leader-grid,
        .team-grid,
        .culture-grid {
            grid-template-columns: 1fr;
        }

        .careers {
            flex-direction: column;
            align-items: flex-start;
            padding: 40px 28px;
        }

        .circuit-card .grid-photos {
            grid-template-columns: 1fr 1fr;
        } 
    }
</style>

<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">Our Team</h1>
        <p class="text-black text-center mt-2">Connect with our team of passionate professionals who bring ideas to life through innovation, technology, and strategic solutions.</p>
    </div>
</section>
 
<!-- LEADERSHIP -->
<section> 
    <div class="container">
            <div class="section-head"> 
                <div class="badge-pill mb-4">
                    <span class="dot"></span>
                    Leadership Team
                </div>
                <h2>Guided by builders who've shipped at scale</h2>
                <p>Our leadership sets the technical bar and the client-first culture that every team member works within.</p>
            </div>

            <div class="leader-grid">

                <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Alena Whitfield</h4>
                        <span class="role">CEO &amp; Founder</span>
                        <p>Sets the vision for Devotion's growth and leads major client partnerships end to end.</p>
                    </div>
                </div>

                <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Marcus Odele">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Marcus Odele</h4>
                        <span class="role">Chief Technology Officer</span>
                        <p>Owns technical architecture and standards across every product and infrastructure team.</p>
                    </div>
                </div>

                <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Priya Nair">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Priya Nair</h4>
                        <span class="role">Chief Operating Officer</span>
                        <p>Keeps delivery, hiring and internal operations running smoothly as the team scales.</p>
                    </div>
                </div>

                <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Daniel Cho">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Daniel Cho</h4>
                        <span class="role">VP of Engineering</span>
                        <p>Leads engineering practice, code quality and mentorship across every product squad.</p>
                    </div>
                </div>

            </div> 
    </div> 
</section>

<!-- TEAM GRID WITH FILTERS -->
<section id="team" class="container" style="padding-top:0;"> 

        <div class="section-head" style="margin-bottom:32px;">
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Our Full Team
            </div>
            <h2>Specialists across every layer of your stack</h2>
            <p>From cloud infrastructure to product design, every engagement is staffed by people who've done it before.</p>
        </div>

        <div class="tabs" id="tabs">
            <button class="tab-btn active" data-dept="all">All Teams</button>
            <button class="tab-btn" data-dept="engineering">Engineering</button>
            <button class="tab-btn" data-dept="design">Design</button>
            <button class="tab-btn" data-dept="cloud">Cloud &amp; DevOps</button>
            <button class="tab-btn" data-dept="growth">QA &amp; Growth</button>
        </div>

        <div class="team-grid" id="teamGrid">

            <!-- Engineering -->  
            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Liam Foster</h4>
                        <span class="role">Senior Backend Engineer</span>
                        <p>Builds scalable backend solutions and ensures robust, secure, and high-performance systems.</p>
                    </div>
            </div>

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Sara Kim</h4>
                        <span class="role">Full-Stack Developer</span>
                        <p>Builds seamless web applications by combining frontend creativity with powerful backend solutions.</p>
                    </div>
            </div>

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Owen Bright</h4>
                        <span class="role">Mobile Engineer</span>
                        <p>Develops high-performance mobile applications with seamless experiences across modern platforms.</p>
                    </div>
            </div> 

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Nadia Torres</h4>
                        <span class="role">Frontend Engineer</span>
                        <p>Creates engaging user interfaces with modern technologies, focusing on performance, usability, and design excellence.</p>
                    </div>
            </div> 

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Maya Chen</h4>
                        <span class="role">Lead Product Designer</span>
                        <p>Leads product design strategies by creating intuitive, user-focused experiences that connect creativity with business goals.</p>
                    </div>
            </div> 

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Ethan Brooks</h4>
                        <span class="role">UI/UX Designer</span>
                        <p>Designs intuitive and engaging digital experiences by combining creativity, research, and user-focused solutions.</p>
                    </div>
            </div>

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Farah Aziz</h4>
                        <span class="role">Visual Designer</span>
                        <p>Creates compelling visual designs that communicate ideas through creativity, branding, and innovative design solutions.</p>
                    </div>
            </div> 

            <div class="leader-card">
                    <div class="leader-photo">
                        <img src="assets/images/team.jpg" alt="Alena Whitfield">
                        <div class="leader-social">
                            <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" />
                                </svg></a>
                            <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="leader-body">
                        <h4>Noah Bennett</h4>
                        <span class="role">Design Systems Lead</span>
                        <p>Leads design system strategies by creating scalable, consistent, and user-friendly experiences across digital products.</p>
                    </div>
            </div> 

        </div>
 
</section>

<!-- CULTURE -->
<section class="culture"> 
        <div class="container section-head"> 
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Why Our Team Loves Building Here
            </div>
            <h2>A culture built around craft, autonomy and momentum</h2>
        </div>

        <div class=" container culture-grid">
            <div class="culture-card">
                <div class="culture-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                    </svg></div>
                <h4>Continuous Learning</h4>
                <p>Certification budgets, internal tech talks and dedicated time to explore new tools every sprint.</p>
            </div>
            <div class="culture-card">
                <div class="culture-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M16 8l-2.5 6.5L8 17l2.5-6.5z" />
                    </svg></div>
                <h4>Ownership &amp; Autonomy</h4>
                <p>Every engineer owns outcomes, not tickets — from architecture decisions through to client delivery.</p>
            </div>
            <div class="culture-icon" style="display:none;"></div>
            <div class="culture-card">
                <div class="culture-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M3 12h18M12 3c2.5 2.6 3.8 5.7 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.7-3.8-9S9.5 5.6 12 3z" />
                    </svg></div>
                <h4>Global Collaboration</h4>
                <p>Distributed across 12 countries, working async and in sync with clients across every timezone.</p>
            </div>
            <div class="culture-card">
                <div class="culture-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M20.8 8.6c0 5.2-8.8 10.4-8.8 10.4S3.2 13.8 3.2 8.6a4.6 4.6 0 018.8-1.8 4.6 4.6 0 018.8 1.8z" />
                    </svg></div>
                <h4>Work-Life Balance</h4>
                <p>Flexible hours and realistic sprint scoping so quality work doesn't come at the cost of burnout.</p>
            </div>
        </div> 
</section>

<!-- CAREERS CTA -->
<section id="careers" class="container mt-5" style="padding:0px;">
    
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow">We're Hiring</span>
                <h2>Come build the next generation of digital products with us</h2>
                <p>We're always looking for engineers, designers and strategists who care about craft as much as we do.</p>
            </div>
            <div class="careers-actions">
                <a href="#" class="btn btn-gold">See Open Positions</a>
                <a href="#" class="btn btn-outline-light">Talk To Our Recruiter</a>
            </div>
        </div> 
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>