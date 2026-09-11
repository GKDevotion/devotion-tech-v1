<?php
    $seo = [
        'title' => 'Devotion Technologies Crosses 500 Delivered Projects Across 12 Countries | News',
        'description' => 'A look back at how a two-person consultancy grew into a distributed engineering team, and what Devotion Technologies is building next.',
        'keywords' => 'Devotion Technologies news, company milestone, 500 projects delivered, distributed engineering team',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>

<style>

    :root {
        --gold: #b38f51;
        --gold-dark: #8f7040;
        --navy: #070d24;
        --navy-soft: #152a58;
        --border: #e8e3d6;
        --muted: #6c7280;
        --cream: #f7f4ee;
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
        background: var(--gold);
        color: #fff;
    }

    .btn-gold:hover {
        background: var(--gold-dark);
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

    /* ---------- BREADCRUMB ---------- */
    .breadcrumb-bar {
        background: #fff;
        border-bottom: 1px solid var(--border);
        padding: 16px 0;
    }

    .breadcrumb-bar ul {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        font-size: .84rem;
        color: var(--muted);
    }

    .breadcrumb-bar a:hover {
        color: var(--gold-dark);
    }

    .breadcrumb-bar li.current {
        color: var(--navy);
        font-weight: 600;
    }

    .breadcrumb-bar .sep {
        color: #c7cbd3;
    }

    /* ---------- PRESS HERO ---------- */
    .press-hero {
        position: relative;
        background: var(--navy);
        min-height: 460px;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
    }

    .press-hero img.hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: .55;
    }

    .press-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(7, 13, 36, .1) 0%, rgba(7, 13, 36, .95) 100%);
    }

    .press-hero-inner {
        position: relative;
        z-index: 2;
        padding: 90px 0 46px;
        width: 100%;
    }

    .press-cat {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--gold);
        color: #fff;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .02em;
        padding: 7px 15px;
        border-radius: 999px;
        margin-bottom: 20px;
    }

    .press-hero h1 {
        color: #fff;
        font-size: clamp(1.8rem, 3.6vw, 2.9rem);
        font-weight: 700;
        line-height: 1.28;
        max-width: 820px;
        margin-bottom: 22px;
    }

    .press-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 20px;
    }

    .press-meta .who {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .press-meta img {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, .3);
    }

    .press-meta strong {
        display: block;
        color: #fff;
        font-size: .87rem;
    }

    .press-meta span {
        font-size: .78rem;
        color: rgba(255, 255, 255, .6);
    }

    .press-meta .dash {
        color: rgba(255, 255, 255, .3);
    }

    /* ---------- READING LAYOUT WITH SHARE RAIL ---------- */
    .read-layout {
        display: grid;
        grid-template-columns: 64px 1fr;
        gap: 40px;
        padding: 56px 0 90px;
    }

    .share-rail {
        position: sticky;
        top: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .share-rail .lbl {
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--muted);
        writing-mode: vertical-rl;
        margin-bottom: 4px;
    }

    .share-btn {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 1.5px solid var(--border);
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--navy);
        transition: all .2s ease;
    }

    .share-btn svg {
        width: 17px;
        height: 17px;
    }

    .share-btn:hover {
        background: var(--gold);
        border-color: var(--gold);
        color: #fff;
    }

    /* ---------- ARTICLE CONTENT ---------- */
 
    .news-article p.lede {
        font-size: 1.14rem;
        color: var(--navy);
        font-weight: 500;
        line-height: 1.7;
        margin-bottom: 26px !important;
    }

    .news-article p {
        color: #3a3f4d;
        font-size: 1rem;
        line-height: 1.85;
        margin-bottom: 20px !important;
    }

    .news-article h2 {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--navy);
        margin: 40px 0 16px;
    }

    .pull-quote {
        border-left: 3px solid var(--gold);
        padding: 4px 0 4px 26px;
        margin: 34px 0;
    }

    .pull-quote p {
        font-size: 1.24rem;
        font-weight: 600;
        color: var(--navy);
        line-height: 1.55;
        margin-bottom: 12px !important;
    }

    .pull-quote span {
        font-size: .85rem;
        color: var(--muted);
    }

    .inline-figure {
        border-radius: 16px;
        overflow: hidden;
        margin: 30px 0;
    }

    .inline-figure img {
        width: 100%;
        height: 340px;
        object-fit: cover;
    }

    .inline-figure figcaption {
        font-size: .82rem;
        color: var(--muted);
        margin-top: 10px;
    }

    .stat-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin: 32px 0;
    }

    .stat-row div {
        background: #fbfaf7;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px;
        text-align: center;
    }

    .stat-row strong {
        display: block;
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--gold-dark);
        margin-bottom: 4px;
    }

    .stat-row span {
        font-size: .8rem;
        color: var(--muted);
    }

    .news-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 40px 0 32px;
    }

    .news-tags span {
        border: 1px solid var(--border);
        border-radius: 999px;
        padding: 6px 14px;
        font-size: .8rem;
        color: var(--muted);
    }

    /* ---------- AUTHOR CARD ---------- */
    .author-card {
        display: flex;
        gap: 18px;
        align-items: center;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 24px 26px;
        background: #fbfaf7;
    }

    .author-card img {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        object-fit: cover;
        flex: none;
    }

    .author-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 3px;
    }

    .author-card p {
        font-size: .88rem;
        color: var(--muted);
        line-height: 1.6;
    }

    /* ---------- MORE NEWS STRIP ---------- */
    .more-news {
        background: var(--cream);
    }

    .more-news-head {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .more-news-head h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--navy);
    }

    .more-news-head a {
        font-size: .88rem;
        font-weight: 600;
        color: var(--gold-dark);
    }

    .more-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .more-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .more-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
        border-color: var(--gold);
    }

    .more-photo {
        height: 170px;
        overflow: hidden;
    }

    .more-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .more-card:hover .more-photo img {
        transform: scale(1.06);
    }

    .more-body {
        padding: 18px 20px 22px;
    }

    .more-body .cat {
        font-size: .72rem;
        font-weight: 700;
        color: var(--gold-dark);
        text-transform: uppercase;
        letter-spacing: .02em;
    }

    .more-body h4 {
        font-size: .98rem;
        font-weight: 700;
        color: var(--navy);
        margin: 8px 0 6px;
        line-height: 1.4;
    }

    .more-body span.dt {
        font-size: .8rem;
        color: var(--muted);
    }

    /* ---------- NEWSLETTER ---------- */
    .newsletter {
        background: linear-gradient(135deg, var(--navy), var(--navy-soft));
        border-radius: 26px;
        padding: 52px 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        flex-wrap: wrap;
        position: relative;
        overflow: hidden;
    }

    .newsletter::after {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(179, 143, 81, .35), transparent 70%);
    }

    .newsletter-copy {
        position: relative;
        z-index: 2;
        max-width: 480px;
    }

    .newsletter-copy span.eyebrow {
        color: var(--gold);
        font-size: .85rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    .newsletter-copy h2 {
        color: #fff;
        font-size: clamp(1.35rem, 2vw, 1.7rem);
        margin: 12px 0 8px;
        font-weight: 700;
    }

    .newsletter-copy p {
        color: rgba(255, 255, 255, .68);
        font-size: .95rem;
    }

    .newsletter-form {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        width: 100%;
        max-width: 400px;
    }

    .newsletter-form input {
        flex: 1;
        min-width: 190px;
        padding: 13px 20px;
        border-radius: 999px;
        border: 1.5px solid rgba(255, 255, 255, .2);
        background: rgba(255, 255, 255, .06);
        color: #fff;
        font-size: .9rem;
        font-family: 'Poppins', sans-serif;
    }

    .newsletter-form input::placeholder {
        color: rgba(255, 255, 255, .5);
    }

    .newsletter-form input:focus {
        outline: none;
        border-color: var(--gold);
    }

    section.pad {
        padding: 70px 0;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .read-layout {
            grid-template-columns: 1fr;
        }

        .share-rail {
            position: static;
            flex-direction: row;
            justify-content: center;
        }

        .share-rail .lbl {
            writing-mode: horizontal-tb;
        }

        .more-grid {
            grid-template-columns: 1fr 1fr;
        }

        .stat-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 680px) {
        .press-hero {
            min-height: 380px;
        }

        .press-hero-inner {
            padding: 60px 0 34px;
        }

        .read-layout {
            padding: 40px 0 60px;
        }

        .more-grid {
            grid-template-columns: 1fr;
        }

        .author-card {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .newsletter {
            flex-direction: column;
            align-items: flex-start;
            padding: 32px 26px;
        }

        .newsletter-form {
            max-width: 100%;
        }
    }
</style>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="sep">/</li>
            <li><a href="news-and-update.php">News &amp; Updates</a></li>
            <li class="sep">/</li>
            <li class="current">500 Projects Milestone</li>
        </ul>
    </div>
</div>

<!-- PRESS HERO -->
<div class="press-hero">
    <img class="hero-bg" src="assets/images/team.jpg" alt="Devotion Technologies team celebrating milestone">
    <div class="press-hero-inner">
        <div class="container">
            <span class="press-cat">Company News</span>
            <h1>Devotion Technologies crosses 500 delivered projects across 12 countries</h1>
            <div class="press-meta">
                <div class="who">
                    <img src="assets/images/team.jpg" alt="Author">
                    <div>
                        <strong>Alena Whitfield</strong>
                        <span>CEO &amp; Founder</span>
                    </div>
                </div>
                <span class="dash">&mdash;</span>
                <span style="color:rgba(255,255,255,.65);font-size:.85rem;">September 8, 2026</span>
                <span class="dash">&mdash;</span>
                <span style="color:rgba(255,255,255,.65);font-size:.85rem;">6 min read</span>
            </div>
        </div>
    </div>
</div>

<!-- ARTICLE BODY WITH SHARE RAIL -->
<div class="container">
    <div class="read-layout">

        <!-- SHARE RAIL -->
        <div class="share-rail">
            <span class="lbl">Share</span>
            <a href="#" class="share-btn" aria-label="Share on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 11-.02 5.01A2.5 2.5 0 014.98 3.5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.96V21H9z" /></svg>
            </a>
            <a href="#" class="share-btn" aria-label="Share on X">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.9 2H22l-7.6 8.7L23 22h-7l-5.4-6.9L4.3 22H1l8.2-9.4L1 2h7.2l4.9 6.4L18.9 2z" /></svg>
            </a>
            <a href="#" class="share-btn" aria-label="Share via email">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3 7l9 6 9-6" /></svg>
            </a>
            <a href="#" class="share-btn" aria-label="Copy link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 007.5.5l2-2a5 5 0 00-7-7l-1.5 1.5" /><path d="M14 11a5 5 0 00-7.5-.5l-2 2a5 5 0 007 7l1.5-1.5" /></svg>
            </a>
        </div>

        <!-- ARTICLE -->
        <article class="news-article">
            <p class="lede">In 2016, Devotion Technologies was two people and one client. Nine years and 500 delivered projects later, the team is distributed across 12 countries — and still run by the same standard: ship things we'd be comfortable maintaining ourselves.</p>

            <p>The 500th project — a cloud migration for a mid-market logistics client — closed out last month with zero unplanned downtime during cutover. It's a fitting milestone for a company that was built on the idea that reliability isn't a nice-to-have layered on top of software, but the actual point of building it.</p>

            <p>"We didn't set out to be big," says founder Alena Whitfield. "We set out to be the team a client calls first when something actually matters. The scale came from doing that consistently, not the other way around."</p>

            <h2>From one client to a distributed team</h2>
            <p>The early years were spent almost entirely on custom web platforms for local retail and services businesses. The shift toward cloud infrastructure and managed IT came in 2019, driven by a pattern the team kept seeing: clients who had a working product but no plan for what happened when it needed to scale, or when something broke at 2 a.m.</p>

            <div class="stat-row">
                <div>
                    <strong>500+</strong>
                    <span>Projects delivered</span>
                </div>
                <div>
                    <strong>12</strong>
                    <span>Countries represented</span>
                </div>
                <div>
                    <strong>98%</strong>
                    <span>Client satisfaction rate</span>
                </div>
            </div>

            <p>By 2021, the team had gone fully distributed, adding cloud, DevOps and cybersecurity specialists across time zones so clients could get support without waiting for a single regional office to open.</p>

            <div class="pull-quote">
                <p>"The scale came from doing the same thing consistently — not the other way around."</p>
                <span>Alena Whitfield, CEO &amp; Founder</span>
            </div>

            <div class="inline-figure">
                <img src="assets/images/team.jpg" alt="Devotion Technologies engineering team">
                <figcaption>Members of the engineering team during a recent sprint review.</figcaption>
            </div>

            <h2>What's next</h2>
            <p>With the 500-project mark behind it, the team is now focused on expanding its managed cybersecurity practice and formalizing the SOC 2 Type II compliance work completed earlier this year. Leadership says headcount growth will stay deliberate — new hires are added to existing pods rather than spun up as new teams, to keep the "senior-led" standard intact as the company grows.</p>

            <p>For a company that started with a single client, the next milestone won't be a number. "We'll know we're doing it right," Whitfield says, "if project 1,000 looks and feels exactly like project one did to that first client."</p>

            <div class="news-tags">
                <span>Company Milestone</span>
                <span>Leadership</span>
                <span>Distributed Teams</span>
                <span>Cloud &amp; Infrastructure</span>
            </div>

            <div class="author-card">
                <img src="assets/images/team.jpg" alt="Alena Whitfield">
                <div>
                    <h4>Alena Whitfield</h4>
                    <p>CEO &amp; Founder at Devotion Technologies. Writes about distributed teams, client delivery and the practical side of scaling an engineering culture.</p>
                </div>
            </div>
        </article>
    </div>
</div>

<!-- MORE NEWS -->
<section class="pad more-news">
    <div class="container">
        <div class="more-news-head">
            <h2>More from Devotion Technologies</h2>
            <a href="news-and-update.php">View all news &rarr;</a>
        </div>
        <div class="more-grid">
            <a href="#" class="more-card">
                <div class="more-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                </div>
                <div class="more-body">
                    <span class="cat">Company News</span>
                    <h4>Devotion Technologies achieves SOC 2 Type II compliance</h4>
                    <span class="dt">July 18, 2026</span>
                </div>
            </a>
            <a href="#" class="more-card">
                <div class="more-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                </div>
                <div class="more-body">
                    <span class="cat">Product Update</span>
                    <h4>New dashboard gives clients live visibility into ticket status</h4>
                    <span class="dt">July 9, 2026</span>
                </div>
            </a>
            <a href="#" class="more-card">
                <div class="more-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                </div>
                <div class="more-body">
                    <span class="cat">Event</span>
                    <h4>Join us at TechConnect Summit 2026 in Austin</h4>
                    <span class="dt">July 29, 2026</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- NEWSLETTER CTA -->
<section class="container pad" style="padding-top:0;">
    <div class="newsletter">
        <div class="newsletter-copy">
            <span class="eyebrow">Stay In The Loop</span>
            <h2>Get updates delivered to your inbox</h2>
            <p>One email a month — product releases, company news and the occasional deep dive. No spam.</p>
        </div>
        <form class="newsletter-form" action="#" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="btn btn-gold">Subscribe</button>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var copyBtn = document.querySelector('.share-btn[aria-label="Copy link"]');
        if (copyBtn) {
            copyBtn.addEventListener('click', function (e) {
                e.preventDefault();
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(window.location.href);
                }
            });
        }
    });
</script>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>
