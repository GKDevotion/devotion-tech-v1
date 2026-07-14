<?php
    $seo = [
        'title' => 'Devotion Technologies Gallery | Explore Our Work & Digital Experiences',
        'description' => 'Browse the Devotion Technologies gallery featuring our innovative projects, team achievements, technology solutions, and creative digital work.',
        'keywords' => 'Devotion Technologies portfolio gallery, IT company showcase, software projects, web development portfolio, digital transformation solutions',
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

      .section-head { 
        margin-bottom: 52px;
    }
 

    .section-head h2 {
        font-size: clamp(1.7rem, 2.6vw, 2.3rem);
        font-weight: 700;
        margin: 0px 0 0px;
        line-height: 1.25;
    }

    /* HERO */
    .hero {
        position: relative;
        padding: 90px 0 90px;
        overflow: hidden;
        background: #f6f6f8;
        text-align: center;
    }

    .hero::before {
        content: "";
        position: absolute;
        top: -140px;
        left: 50%;
        transform: translateX(-50%);
        width: 720px;
        height: 720px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(170, 128, 56, 0.13), transparent 70%);
    }

    .hero-inner {
        position: relative; 
        margin: 0 auto;
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

    /* FILTER */
    .filter-bar {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        padding: 44px 0 40px;
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
        transition: .15s;
    }

    .pill.active,
    .pill:hover {
        background: #aa8038;
        border-color: #aa8038;
        color: #fff;
    }

    /* FEATURED SWIPER SLIDER */
    .featured-slider-wrap {
        margin-top: 60px;
    }

    .swiper {
        border-radius: 16px;
        overflow: hidden;
    }

    .swiper-slide {
        aspect-ratio: 16/7;
        position: relative;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slide-caption {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(10, 12, 30, 0) 0%, rgba(10, 12, 30, 0.85) 100%);
        padding: 60px 40px 26px;
        color: #fff;
    }

    .slide-cat {
        display: inline-block;
        background: #aa8038;
        color: #fff;
        font-size: 1rem;
        font-weight: 800;
        padding: 5px 13px;
        border-radius: 14px;
        margin-bottom: 10px;
    }

    .slide-caption h3 {
        font-size: 50px;
        font-weight: 800;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
        background: rgba(255, 255, 255, 0.15);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        backdrop-filter: blur(4px);
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 16px;
        font-weight: 800;
    }

    .swiper-pagination-bullet {
        background: #fff;
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        background: #aa8038;
        opacity: 1;
    }

    /* SIMPLE SQUARE GALLERY */
    .gallery {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 20px;
    }

    .gitem {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        aspect-ratio: 1/1;
    }

    .gitem img {
        width: 100%;
        height: 100%;
        display: block;
        transition: transform .35s ease;
    }

    .gitem:hover img {
        transform: scale(1.06);
    }

    .gitem-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 12, 30, 0) 40%, rgba(10, 12, 30, 0.8) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 16px;
        opacity: 0;
        transition: opacity .25s;
    }

    .gitem:hover .gitem-overlay {
        opacity: 1;
    }

    .gitem-cat {
        display: inline-block;
        align-self: flex-start;
        background: #aa8038;
        color: #fff;
        font-size: 1rem;
        font-weight: 800;
        padding: 4px 11px;
        border-radius: 14px;
        margin-bottom: 8px;
    }

    .gitem-title {
        color: #fff;
        font-size: 1.2rem;
        font-weight: 700;
    }

    .gitem-zoom {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: #1a1d29;
        opacity: 0;
        transition: opacity .25s;
    }

    .gitem:hover .gitem-zoom {
        opacity: 1;
    }

    .load-more-wrap {
        text-align: center;
        margin-bottom: 80px;
    }

    .load-more {
        display: inline-block;
        padding: 14px 34px;
        border: 1.5px solid #aa8038;
        color: #aa8038;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
    }

    .load-more:hover {
        background: #aa8038;
        color: #fff;
    }

    /* STATS BAND */
    .stats-band {
        background: #fff;
        border: 1px solid #aa8038;
        color: #fff;
        border-radius: 16px;
        padding: 46px 40px;
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
        font-size: 30px;
        margin-bottom: 10px;
        font-weight: 800;
        color: #aa8038;
    }

    .stat span {
        font-size: 1rem;
        color: #000;
        font-weight: 500;
    }

    /* CTA */
    .cta-band {
        background: linear-gradient(135deg, #aa8038, #8a672c);
        border-radius: 16px;
        padding: 56px 48px;
        text-align: center;
        color: #fff; 
    }

    .cta-band h2 {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .cta-band p {
        font-size: 1rem;
        color: #fff;
        margin-bottom: 26px; 
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons a {
        display: inline-block;
        padding: 13px 28px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14.5px;
        background: #fff;
        color: #8a672c;
    }

    /* LIGHTBOX */
    .lightbox {
        position: fixed;
        inset: 0;
        background: rgba(255, 255, 255, 0.7);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 200;
        padding: 40px;
    }

    .lightbox.open {
        display: flex;
    }

    .lightbox-inner {
        max-width: 900px;
        width: 100%;
        text-align: center;
    }

    .lightbox-inner img {
        max-height: 75vh;
        width: auto;
        margin: 0 auto;
        border-radius: 10px;
    }

    .lightbox-caption {
        margin-top: 16px;
        font-size: 1.5rem;
        font-weight: 500; 
        color: #000;
    }

    .lightbox-close {
        position: absolute;
        top: 30px;
        right: 40px;
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #fff;
        font-size: 28px;
        cursor: pointer;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .lightbox-prev {
        left: 24px;
    }

    .lightbox-next {
        right: 24px;
    }

    @media (max-width:1000px) {
        .gallery {
            grid-template-columns: repeat(3, 1fr);
        }

        .stats-band {
            grid-template-columns: repeat(2, 1fr);
        }

        .swiper-slide {
            aspect-ratio: 16/9;
        }
    }

    @media (max-width:640px) {
        .gallery {
            grid-template-columns: repeat(2, 1fr);
        }

        .stats-band {
            grid-template-columns: 1fr 1fr;
        }

        .hero h1 {
            font-size: 28px;
        }

        .lightbox-nav {
            width: 38px;
            height: 38px;
            font-size: 22px;
        }

        .swiper-slide {
            aspect-ratio: 4/3;
        }

        .slide-caption h3 {
            font-size: 16px;
        }
    }
</style>

<!-- HERO -->
<section class="hero">
    <div class="container hero-inner">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Image Gallery
        </div>
        <h1>A look inside our team, our workspace, and our work</h1>
        <p>Moments from the office, client projects, and milestones we've celebrated along the way.</p>
    </div>
</section>

<div class="container">

    <div class="container section-head mt-5"> 
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Why Our Team Loves Building Here
        </div>
        <h2>A culture built around craft, autonomy and momentum</h2>
    </div>

    <!-- FEATURED SWIPER SLIDER -->
    <div class="featured-slider-wrap">
        <div class="swiper" id="featuredSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1400&q=80" alt="Team offsite">
                    <div class="slide-caption"><span class="slide-cat">Team</span>
                        <h3>Full Team Offsite 2026</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=1400&q=80" alt="Anniversary celebration">
                    <div class="slide-caption"><span class="slide-cat">Events</span>
                        <h3>7th Anniversary Celebration</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=1400&q=80" alt="Design collaboration">
                    <div class="slide-caption"><span class="slide-cat">Office Life</span>
                        <h3>Design Team Collaboration</h3>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1400&q=80" alt="Award ceremony">
                    <div class="slide-caption"><span class="slide-cat">Events</span>
                        <h3>Best IT Partner Award 2025</h3>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
        <div class="pill active" data-filter="all">All</div>
        <div class="pill" data-filter="team">Team</div>
        <div class="pill" data-filter="office">Office Life</div>
        <div class="pill" data-filter="events">Events</div>
        <div class="pill" data-filter="projects">Projects</div>
    </div>

    <!-- MASONRY GALLERY -->
    <div class="gallery" id="gallery">

        <div class="gitem" data-cat="team" onclick="openLightbox(0)">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&q=80" alt="Team group photo">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Team</span><span class="gitem-title">Full Team Offsite 2026</span></div>
        </div>

        <div class="gitem" data-cat="office" onclick="openLightbox(1)">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&q=80" alt="Team meeting">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Office Life</span><span class="gitem-title">Sprint Planning Session</span></div>
        </div>

        <div class="gitem" data-cat="events" onclick="openLightbox(2)">
            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=500&q=80" alt="Office celebration">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Events</span><span class="gitem-title">7th Anniversary Celebration</span></div>
        </div>

        <div class="gitem" data-cat="projects" onclick="openLightbox(3)">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&q=80" alt="Project dashboard work">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Projects</span><span class="gitem-title">RemoteCo Dashboard Build</span></div>
        </div>

        <div class="gitem" data-cat="office" onclick="openLightbox(4)">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&q=80" alt="Team working together">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Office Life</span><span class="gitem-title">Design Team Collaboration</span></div>
        </div>

        <div class="gitem" data-cat="team" onclick="openLightbox(5)">
            <img src="https://images.unsplash.com/photo-1522071901873-411886a10004?w=500&q=80" alt="Team portrait">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Team</span><span class="gitem-title">Engineering Squad</span></div>
        </div>

        <div class="gitem" data-cat="events" onclick="openLightbox(6)">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=500&q=80" alt="Award ceremony">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Events</span><span class="gitem-title">Best IT Partner Award 2025</span></div>
        </div>

        <div class="gitem" data-cat="office" onclick="openLightbox(7)">
            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=500&q=80" alt="Office space">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Office Life</span><span class="gitem-title">Our Workspace</span></div>
        </div>

        <div class="gitem" data-cat="projects" onclick="openLightbox(8)">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&q=80" alt="Fintech project work">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Projects</span><span class="gitem-title">PayNest Product Review</span></div>
        </div>

        <div class="gitem" data-cat="team" onclick="openLightbox(9)">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=500&q=80" alt="Team lunch">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Team</span><span class="gitem-title">Monthly Team Lunch</span></div>
        </div>

        <div class="gitem" data-cat="events" onclick="openLightbox(10)">
            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?w=500&q=80" alt="Tech conference">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Events</span><span class="gitem-title">DevConf 2026 Booth</span></div>
        </div>

        <div class="gitem" data-cat="projects" onclick="openLightbox(11)">
            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=500&q=80" alt="Analytics project">
            <div class="gitem-zoom">⤢</div>
            <div class="gitem-overlay"><span class="gitem-cat">Projects</span><span class="gitem-title">InsightHub Analytics Build</span></div>
        </div>

    </div>

    <div class="load-more-wrap">
        <a href="javascript:void();" class="load-more">Load More Photos</a>
    </div>

    <!-- STATS -->
    <div class="stats-band">
        <div class="stat"><strong>500+</strong><span>Photos Archived</span></div>
        <div class="stat"><strong>7</strong><span>Years of Milestones</span></div>
        <div class="stat"><strong>50+</strong><span>Team Members Featured</span></div>
        <div class="stat"><strong>30+</strong><span>Events Documented</span></div>
    </div>

    <!-- CTA -->
    <div class="cta-band">
        <h2>Want to be part of these moments?</h2>
        <p>We're always looking for people who care about doing great work. Check out our open roles.</p>
        <div class="cta-buttons"><a href="#">View Open Positions</a></div>
    </div>

</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">✕</div>
    <div class="lightbox-nav lightbox-prev" onclick="navLightbox(-1)">‹</div>
    <div class="lightbox-inner">
        <img id="lightbox-img" src="" alt="Gallery image">
        <div class="lightbox-caption" id="lightbox-caption"></div>
    </div>
    <div class="lightbox-nav lightbox-next" onclick="navLightbox(1)">›</div>
</div>


<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>