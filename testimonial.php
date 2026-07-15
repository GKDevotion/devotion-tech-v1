<?php
    $seo = [
        'title' => 'Client Testimonials | Devotion Technologies - Trusted Technology Partner',
        'description' => 'Explore client success stories and feedback about Devotion Technologies, our innovative solutions, professional services, and commitment to delivering business-focused technology solutions.',
        'keywords' => 'Devotion Technologies client testimonials, customer success stories, technology partner reviews, IT services feedback, digital solutions reviews',
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

    .container {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
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
        font-size: 1rem;
    }

    .stars-row {
        display: flex;
        justify-content: center;
        gap: 6px;
        margin: 26px 0 8px;
        color: #aa8038;
        font-size: 20px;
    }

    .rating-line {
        font-size: 1rem;
        color: #6b7280;
    }

    .rating-line strong {
        color: #1a1d29;
    }

    /* FEATURED TESTIMONIAL */
    .featured-testimonial {
        background: #0d1330;
        color: #fff;
        border-radius: 18px;
        padding: 56px 60px;
        margin: 60px 0 70px;
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 50px;
        align-items: center;
    }

    .featured-testimonial::before {
        content: "";
        position: absolute;
        left: -70px;
        bottom: -70px;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(170, 128, 56, 0.35), transparent 70%);
    }

    .ft-photo {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
    }

    .ft-photo img {
        width: 100%;
        height: 280px;
        object-fit: cover;
    }

    .ft-quote-mark {
        font-size: 56px;
        color: #aa8038;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 6px;
        position: relative;
        font-family: Georgia, serif;
    }

    .featured-testimonial blockquote {
        font-size: 20px;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: 24px;
        position: relative;
    }

    .ft-author strong {
        display: block;
        font-size: 15.5px;
    }

    .ft-author span {
        font-size: 1rem;
        color: #a9adc4;
    }

    .ft-stars {
        color: #aa8038;
        font-size: 15px;
        margin-bottom: 14px;
    }

    /* FILTER */
    .filter-bar {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        padding: 10px 0 46px;
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

    /* TESTIMONIAL GRID (masonry-ish via column count) */
    .testimonial-grid {
        column-count: 3;
        column-gap: 26px;
        margin-bottom: 70px;
    }

    .tcard {
        break-inside: avoid;
        background: #fff;
        border: 1px solid #e8e8ee;
        border-radius: 14px;
        padding: 26px 26px 24px;
        margin-bottom: 26px;
    }

    .tcard:hover {
        box-shadow: 0 16px 32px rgba(10, 12, 30, 0.08);
    }

    .tcard-stars {
        color: #aa8038;
        font-size: 14px;
        margin-bottom: 14px;
        letter-spacing: 2px;
    }

    .tcard p {
        font-size: 1rem;
        color: #33384a;
        margin-bottom: 20px;
    }

    .tcard-footer {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #1a1d29;
        color: #aa8038;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 13.5px;
        flex-shrink: 0;
    }

    .tcard-footer strong {
        display: block;
        font-size: 14px;
    }

    .tcard-footer span {
        font-size: 0.8rem;
        color: #6b7280;
    }

    .tcard-logo {
        margin-left: auto;
        font-size: 11px;
        font-weight: 800;
        color: #6b7280;
        background: #f6f6f8;
        padding: 4px 10px;
        border-radius: 6px;
        white-space: nowrap;
    }

    /* STATS BAND */
    .stats-band {
        background: linear-gradient(135deg, #aa8038, #8a672c);
        color: #fff;
        border-radius: 16px;
        padding: 50px 40px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 80px;
    }

    .stat {
        text-align: center;
    }

    .stat strong {
        display: block;
        margin-bottom: 10px;
        font-size: 32px;
        font-weight: 800;
    }

    .stat span {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.85);
    }
    /* VIDEO TESTIMONIALS */
    .video-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 26px;
        margin-bottom: 80px;
    }

    .video-card {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
    }

    .video-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .video-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 12, 30, 0.1), rgba(10, 12, 30, 0.75));
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        color: #fff;
    }

    .play-btn {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: auto;
        margin-top: 20px;
        font-size: 18px;
        color: #aa8038;
    }

    .video-card h5 {
        font-size: 14.5px;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .video-card span {
        font-size: 1rem;
        color: #d6d8e6;
    }

    /* CTA */
    
    .cta-band {
        background: #f6f6f8;
        border: 1px solid #e8e8ee;
        border-radius: 16px;
        padding: 56px 48px;
        text-align: center; 
    }

    .cta-band h2 {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .cta-band p {
        font-size: 15px;
        color: #6b7280;
        margin-bottom: 26px;
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

    .cta-primary {
        background: #aa8038;
        color: #fff;
        padding: 13px 28px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14.5px;
    }

    .cta-primary:hover {
        background: #8a672c;
    }

    .cta-secondary {
        border: 1.5px solid #e8e8ee;
        color: #1a1d29;
        padding: 13px 28px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14.5px;
    }

    .cta-secondary:hover {
        border-color: #aa8038;
        color: #aa8038;
    }

    @media (max-width:900px) {
        .featured-testimonial {
            grid-template-columns: 1fr;
            padding: 40px 32px;
        }

        .testimonial-grid {
            column-count: 2;
        }

        .stats-band {
            grid-template-columns: repeat(2, 1fr);
        }

        .video-grid {
            grid-template-columns: 1fr 1fr;
        } 

        .nav-links {
            display: none;
        }
    }

    @media (max-width:600px) {
        .testimonial-grid {
            column-count: 1;
        }

        .video-grid {
            grid-template-columns: 1fr;
        }

        .stats-band {
            grid-template-columns: 1fr 1fr;
        }

        .hero h1 {
            font-size: 28px;
        }

        .logo-strip {
            justify-content: center;
        }
    }
</style>

<!-- HERO -->
<section class="hero">
    <div class="container hero-inner"> 
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Client Testimonials
        </div>
        <h1>Don't just take our word for it — hear from the businesses we've worked with</h1>
        <p>Real feedback from founders, operators, and IT leads who trusted us with their technology.</p>
        <div class="stars-row">★★★★★</div>
        <div class="rating-line"><strong>4.9 out of 5</strong> average rating from 500+ verified reviews</div>
    </div>
</section>

<div class="container">

    <!-- FEATURED TESTIMONIAL -->
    <div class="featured-testimonial">
        <div class="ft-photo">
            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80" alt="Client">
        </div>
        <div>
            <div class="ft-quote-mark">"</div>
            <div class="ft-stars">★★★★★</div>
            <blockquote>Devotion Technology didn't just build what we asked for — they pushed back on ideas that wouldn't scale and helped us land on an architecture that's held up through three years of growth without a single major rewrite.</blockquote>
            <div class="ft-author">
                <strong>Priya Nair</strong>
                <span>CEO & Co-Founder, RemoteCo</span>
            </div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
        <div class="pill active">All Reviews</div>
        <div class="pill">Cloud Solutions</div>
        <div class="pill">IT Consulting</div>
        <div class="pill">Cybersecurity</div>
        <div class="pill">Custom Development</div>
    </div>

    <!-- TESTIMONIAL GRID -->
    <div class="testimonial-grid">

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>The migration was seamless — genuinely zero downtime, which we didn't think was possible with a system as old as ours.</p>
            <div class="tcard-footer">
                <div class="avatar">DM</div>
                <div><strong>David Miller</strong><span>CTO, UrbanCart</span></div>
                <span class="tcard-logo">UrbanCart</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>Their security team caught a vulnerability our previous vendor missed for two years. That alone paid for the engagement ten times over.</p>
            <div class="tcard-footer">
                <div class="avatar">AS</div>
                <div><strong>Aisha Siddiqui</strong><span>Founder, PayNest</span></div>
                <span class="tcard-logo">PayNest</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>What stood out was how clearly they communicated trade-offs. We never felt like we were being sold something we didn't need.</p>
            <div class="tcard-footer">
                <div class="avatar">JT</div>
                <div><strong>James Turner</strong><span>Operations Lead, CargoTrack</span></div>
                <span class="tcard-logo">CargoTrack</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>Six months in and our uptime hasn't dropped below 99.9%. The monitoring setup they built catches issues before our own team notices.</p>
            <div class="tcard-footer">
                <div class="avatar">NV</div>
                <div><strong>Neha Verma</strong><span>Head of Engineering, MediSync</span></div>
                <span class="tcard-logo">MediSync</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>We came in with a vague idea and left with a full technical roadmap. Their discovery process alone was worth the engagement.</p>
            <div class="tcard-footer">
                <div class="avatar">RK</div>
                <div><strong>Rohan Kapoor</strong><span>Founder, GetLift</span></div>
                <span class="tcard-logo">GetLift</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>Responsive, honest about timelines, and the code quality has made onboarding new developers on our side dramatically easier.</p>
            <div class="tcard-footer">
                <div class="avatar">SL</div>
                <div><strong>Sarah Lin</strong><span>VP Product, InsightHub</span></div>
                <span class="tcard-logo">InsightHub</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>Our booking volume tripled after launch and the platform hasn't blinked. Genuinely impressed with the load testing they did upfront.</p>
            <div class="tcard-footer">
                <div class="avatar">MC</div>
                <div><strong>Marcus Chen</strong><span>COO, EnGolfer</span></div>
                <span class="tcard-logo">EnGolfer</span>
            </div>
        </div>

        <div class="tcard">
            <div class="tcard-stars">★★★★★</div>
            <p>Their support team feels like an extension of ours, not a vendor. Tickets get resolved fast and nobody has to chase anyone down.</p>
            <div class="tcard-footer">
                <div class="avatar">TW</div>
                <div><strong>Tara Williams</strong><span>IT Manager, CloudShift</span></div>
                <span class="tcard-logo">CloudShift</span>
            </div>
        </div>

    </div>

    <!-- STATS -->
    <div class="stats-band">
        <div class="stat"><strong>4.9/5</strong><span>Average Client Rating</span></div>
        <div class="stat"><strong>500+</strong><span>Verified Reviews</span></div>
        <div class="stat"><strong>96%</strong><span>Would Recommend Us</span></div>
        <div class="stat"><strong>85%</strong><span>Repeat & Referral Clients</span></div>
    </div>

    <!-- VIDEO TESTIMONIALS --> 
    <div class="badge-pill mb-4">
        <span class="dot"></span>
        Watch Their Story
    </div>

    <div class="video-grid">
        <div class="video-card">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=500&q=80" alt="Video testimonial">
            <div class="video-overlay">
                <div class="play-btn">▶</div>
                <h5>Priya Nair, RemoteCo</h5>
                <span>"Scaling without a single rewrite"</span>
            </div>
        </div>
        <div class="video-card">
            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=500&q=80" alt="Video testimonial">
            <div class="video-overlay">
                <div class="play-btn">▶</div>
                <h5>Aisha Siddiqui, PayNest</h5>
                <span>"Security that paid for itself"</span>
            </div>
        </div>
        <div class="video-card">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&q=80" alt="Video testimonial">
            <div class="video-overlay">
                <div class="play-btn">▶</div>
                <h5>Marcus Chen, EnGolfer</h5>
                <span>"Tripling volume without a hiccup"</span>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-band">
        <h2>Ready to become our next success story?</h2>
        <p>Tell us about your project and we'll show you exactly how we'd approach it — no pressure, just a clear plan.</p>
        <div class="cta-buttons">
            <a href="javascript:void();" class="cta-primary">Get A Free Consultation</a>
            <a href="javascript:void();" class="cta-secondary">View Our Projects</a> 
        </div>
    </div>

</div>
 
<?php
    include_once('elements/faqs.php');
    include_once('elements/footer.php');
?>