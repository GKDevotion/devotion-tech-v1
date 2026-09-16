<?php
$seo = [
    'title' => 'Mobile Apps | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'iOS, Android and cross-platform apps Devotion Technologies has shipped — built for offline reliability and real-world use, not just app store screenshots.',
    'keywords' => 'Devotion Technologies mobile apps, iOS development, Android development, Flutter, React Native portfolio',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$portfolioPath = __DIR__ . '/data/portfolio.json';
$portfolio = [];
if (file_exists($portfolioPath)) {
    $json = file_get_contents($portfolioPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $portfolio = $decoded;
    }
}
$apps = array_values(array_filter($portfolio, function ($p) {
    return $p['category'] === 'mobile';
}));
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

    section {
        padding: 90px 0;
    }

    .section-head {
        max-width: 680px;
        margin-bottom: 50px;
    }

    .section-head h2 {
        font-size: clamp(1.6rem, 2.6vw, 2.1rem);
        font-weight: 700;
        color: var(--navy);
        margin: 12px 0 10px;
    }

    .section-head p {
        color: var(--muted);
        font-size: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 26px;
        border-radius: 10px;
        font-size: .92rem;
        font-weight: 600;
        transition: all .2s ease;
        white-space: nowrap;
    }

    .btn-gold {
        background: var(--gold);
        color: #fff;
    }

    .btn-gold:hover {
        background: var(--gold-dark);
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, .4);
        color: #fff;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: var(--navy);
    }

    /* =========================================
   MOBILE APPS HERO
========================================= */

    .app-hero {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        background: #fff;
        color: #000;
        padding: 105px 0 110px;
    }

    /* Subtle background grid */

    .app-hero-grid {
        position: absolute;
        inset: 0;
        z-index: -1;
        pointer-events: none;

        background-image:
            linear-gradient(#00000011 1px,
                transparent 1px),
            linear-gradient(90deg,
                #00000011 1px,
                transparent 1px);

        background-size: 42px 42px;
    }

    /* Soft background glow */

    .app-hero::before {
        content: "";
        position: absolute;
        width: 620px;
        height: 620px;
        right: -180px;
        top: -260px;

        background: radial-gradient(circle,
                rgba(179, 143, 81, 0.16),
                transparent 68%);

        pointer-events: none;
        z-index: -1;
    }

    /* Main layout */

    .app-hero-inner {
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(380px, 0.95fr);
        align-items: center;
        gap: 65px;
    }

    /* =========================================
   HERO CONTENT
========================================= */

    .app-hero-content {
        max-width: 650px;
    }

    .app-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #b38f51;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 26px;
    }

    .app-eyebrow-dot {
        width: 7px;
        height: 7px;
        background: #b38f51;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .app-hero h1 {
        margin: 0 0 25px;
        font-size: 45px;
        line-height: 1.13;
        font-weight: 600;
        letter-spacing: -1.7px;
        color: #000;
    }

    .app-hero h1 span {
        display: block;
        color: #b38f51;
    }

    .app-hero p {
        margin: 0;
        color: #000;
        font-size: 1.2rem;
        line-height: 1.85;
    }

    /* =========================================
   HERO ACTIONS
========================================= */

    .app-hero-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 24px;
        margin-top: 35px;
    }

    .app-hero .btn-gold {
        display: inline-flex;
        align-items: center;
        gap: 18px;

        background: #b38f51;
        color: #ffffff;
        border: 1px solid #b38f51;

        padding: 15px 22px;
        border-radius: 9px;

        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    /* OUTLINE BUTTON */

    .app-hero .btn-outline-light {
        color: #FFFFFF;
        border: 1px solid rgba(255, 255, 255, .35);
        background: #000;
    }

    .app-hero .btn-outline-light:hover {
        color: #FFFFFF;
        border-color: #B38F51;
    }


    .app-hero .btn-gold span {
        font-size: 20px;
        line-height: 1;
    }

    .app-hero .btn-gold:hover {
        background: #c4a064;
        border-color: #c4a064;
        color: #ffffff;
        transform: translateY(-2px);
    }

    .app-hero-link {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: #000;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;

        transition: color 0.25s ease;
    }

    .app-hero-link span {
        font-size: 20px;
        color: #b38f51;
        transition: transform 0.25s ease;
    }

    .app-hero-link:hover {
        color: #b38f51;
    }

    .app-hero-link:hover span {
        transform: translateX(5px);
    }

    /* =========================================
   HERO VISUAL
========================================= */

    .app-hero-visual {
        position: relative;
        min-height: 390px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Decorative circles */

    .app-orbit {
        position: absolute;
        border: 1px solid rgba(179, 143, 81, 0.24);
        border-radius: 50%;
        pointer-events: none;
    }

    .orbit-one {
        width: 390px;
        height: 390px;
    }

    .orbit-two {
        width: 285px;
        height: 285px;
        border-color: rgba(255, 255, 255, 0.10);
    }

    /* Mobile device panel */

    .app-device-card {
        position: relative;
        z-index: 2;

        width: min(100%, 390px);
        min-height: 300px;

        padding: 15px;

        background: linear-gradient(145deg,
                #252b43,
                #111a38);

        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 22px;

        box-shadow:
            0 30px 70px rgba(0, 0, 0, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.06);
    }

    .device-top {
        display: flex;
        align-items: center;
        gap: 9px;
        color: rgba(255, 255, 255, 0.65);
        font-size: 1rem;
        letter-spacing: 0.5px;
        padding: 5px 8px 16px;
    }

    .device-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #b38f51;
    }

    /* Screen */

    .device-screen {
        min-height: 250px;
        padding: 28px;

        display: flex;
        flex-direction: column;
        justify-content: center;

        border-radius: 14px;

        background:
            linear-gradient(135deg,
                rgba(179, 143, 81, 0.17),
                transparent 55%),
            #070d24;

        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .screen-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #fff;
        color: #b38f51;
        font-size: 1.2rem;
        margin-bottom: 22px;
    }

    .screen-label {
        color: #b38f51;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .device-screen h3 {
        max-width: 280px;
        margin: 0;

        color: #ffffff;
        font-size: 25px;
        line-height: 1.3;
        font-weight: 600;
        letter-spacing: -0.5px;
    }

    .screen-bottom {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        margin-top: 28px;
    }

    .screen-bottom span {
        padding: 7px 10px;
        border: 1px solid rgba(255, 255, 255, 0.13);
        border-radius: 6px;
        color: rgba(255, 255, 255, 0.65);
        font-size: 1rem;
    }

    /* =========================================
   FLOATING STATS
========================================= */

    .floating-app-stat {
        position: absolute;
        z-index: 3;

        display: flex;
        align-items: center;
        gap: 12px;

        padding: 15px 18px;

        background: rgba(18, 27, 56, 0.96);
        border: 1px solid rgba(179, 143, 81, 0.40);
        border-radius: 12px;

        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.20);
    }

    .floating-app-stat strong {
        display: block;
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
    }

    .floating-app-stat strong span {
        color: #b38f51;
    }

    .floating-app-stat small {
        display: block;
        margin-top: 4px;
        color: #fff;
        font-size: 1rem;
    }

    .stat-one {
        top: 30px;
        right: -12px;
    }

    .stat-two {
        bottom: -40px;
        left: -20px;
    }

    .status-dot {
        width: 9px;
        height: 9px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #6fba8c;
        box-shadow: 0 0 0 5px rgba(111, 186, 140, 0.10);
    }

    /* =========================================
   RESPONSIVE
========================================= */

    @media (max-width: 1199px) {

        .app-hero-inner {
            gap: 35px;
        }

        .app-hero h1 {
            font-size: 46px;
        }

        .app-hero-visual {
            min-height: 350px;
        }

        .orbit-one {
            width: 340px;
            height: 340px;
        }

        .orbit-two {
            width: 250px;
            height: 250px;
        }

        .stat-one {
            right: 0;
        }

        .stat-two {
            left: 0;
        }
    }

    @media (max-width: 991px) {

        .app-hero {
            padding: 80px 0;
        }

        .app-hero-inner {
            grid-template-columns: 1fr;
            gap: 55px;
        }

        .app-hero-content {
            max-width: 700px;
        }

        .app-hero h1 {
            font-size: clamp(40px, 6vw, 55px);
        }

        .app-hero-visual {
            min-height: 370px;
        }

        .app-device-card {
            max-width: 390px;
        }
    }

    @media (max-width: 575px) {

        .app-hero {
            padding: 65px 0 75px;
        }

        .app-hero h1 {
            font-size: 36px;
            line-height: 1.18;
            letter-spacing: -0.8px;
        }

        .app-hero p {
            font-size: 14px;
            line-height: 1.75;
        }

        .app-hero-actions {
            align-items: flex-start;
            flex-direction: column;
            gap: 20px;
        }

        .app-hero-visual {
            min-height: 330px;
        }

        .app-device-card {
            width: calc(100% - 20px);
            min-height: 280px;
        }

        .device-screen {
            min-height: 230px;
            padding: 22px;
        }

        .device-screen h3 {
            font-size: 22px;
        }

        .orbit-one {
            width: 300px;
            height: 300px;
        }

        .orbit-two {
            width: 230px;
            height: 230px;
        }

        .floating-app-stat {
            padding: 11px 13px;
        }

        .stat-one {
            top: 8px;
            right: -4px;
        }

        .stat-two {
            bottom: 8px;
            left: -4px;
        }

        .floating-app-stat strong {
            font-size: 15px;
        }

        .floating-app-stat small {
            font-size: 9px;
        }
    }

    /* APP SHOWCASE GRID */
    .app-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
    }

    .app-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 30px 26px;
        text-align: center;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .app-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 26px 55px -25px rgba(10, 19, 48, .28);
        border-color: var(--gold);
    }

    /* Phone bezel mockup */
    .phone-frame {
        width: 130px;
        height: 260px;
        margin: 0 auto 22px;
        border-radius: 26px;
        background: var(--navy);
        border: 6px solid var(--navy);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 20px 40px -18px rgba(7, 13, 36, .5);
    }

    .phone-frame::before {
        content: "";
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 44px;
        height: 5px;
        border-radius: 3px;
        background: rgba(255, 255, 255, .25);
        z-index: 2;
    }

    .phone-screen {
        position: absolute;
        inset: 4px;
        border-radius: 20px;
        background: linear-gradient(160deg, #0d1a3d, var(--navy-soft));
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .phone-screen svg {
        width: 34px;
        height: 34px;
        color: var(--gold);
    }

    .app-card h4 {
        font-size: 1.08rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 6px;
    }

    .app-card .app-client {
        font-size: .82rem;
        color: var(--gold-dark);
        font-weight: 600;
        margin-bottom: 14px;
        display: block;
    }

    .app-card p.app-summary {
        color: var(--muted);
        font-size: .9rem;
        line-height: 1.6;
        margin-bottom: 18px !important;
    }

    .app-mini-stats {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-bottom: 20px;
    }

    .app-mini-stats .item strong {
        display: block;
        font-size: 1rem;
        font-weight: 800;
        color: var(--gold-dark);
    }

    .app-mini-stats .item span {
        font-size: .68rem;
        color: var(--muted);
    }

    .app-tags {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 6px;
        margin-bottom: 20px;
    }

    .app-tags span {
        background: var(--cream);
        border: 1px solid var(--border);
        border-radius: 999px;
        padding: 4px 11px;
        font-size: .7rem;
        font-weight: 500;
        color: var(--navy);
    }

    /* CTA */
    .careers {
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
        font-size: clamp(1.4rem, 2.2vw, 1.85rem);
        margin: 12px 0 10px;
        font-weight: 700;
    }

    .careers-copy p {
        color: rgba(255, 255, 255, .7);
        font-size: .96rem;
    }

    .careers-actions {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    @media (max-width: 900px) {
        .app-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 560px) {
        .app-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- MOBILE APPS HERO -->
<section class="app-hero">
    <div class="app-hero-grid"></div>

    <div class="container">
        <div class="app-hero-inner">

            <div class="app-hero-content">

                <span class="app-eyebrow">
                    <span class="app-eyebrow-dot"></span>
                    Mobile Apps
                </span>

                <h1>
                    Apps built for the moment
                    <span>the signal drops.</span>
                </h1>

                <p>
                    iOS, Android and cross-platform apps we've shipped —
                    each one built and tested for the real conditions people
                    actually use them in, not just a fast Wi-Fi connection
                    in a demo.
                </p>

                <div class="app-hero-actions">
                    <a href="services.php" class="btn btn-gold">
                        Explore Our Services
                        <span>↗</span>
                    </a>

                    <a href="#mobile-projects" class="btn btn-outline-light app-hero-link">
                        View Mobile Projects
                        <span>→</span>
                    </a>
                </div>

            </div>

            <!-- RIGHT VISUAL -->
            <div class="app-hero-visual">

                <div class="app-orbit orbit-one"></div>
                <div class="app-orbit orbit-two"></div>

                <div class="app-device-card">

                    <div class="device-top">
                        <span class="device-dot"></span>
                        <span>Mobile Development</span>
                    </div>

                    <div class="device-screen">

                        <div class="screen-icon">
                            <span>✦</span>
                        </div>

                        <span class="screen-label">
                            Built for real-world use
                        </span>

                        <h3>
                            Seamless experiences,
                            wherever users are.
                        </h3>

                        <div class="screen-bottom">
                            <span>iOS</span>
                            <span>Android</span>
                            <span>Cross-platform</span>
                        </div>

                    </div>

                </div>

                <div class="floating-app-stat stat-one">
                    <strong>40<span>+</span></strong>
                    <small>Apps launched</small>
                </div>

                <div class="floating-app-stat stat-two">
                    <span class="status-dot"></span>
                    <div>
                        <strong>Built to perform</strong>
                        <small>Real-world conditions</small>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- ================= APP GRID ================= -->
<section class="app-showcase-section">
    <div class="container">

        <div class="app-grid">

            <?php foreach ($apps as $index => $app): ?>

                <article class="app-card <?php echo $index === 1 ? 'featured' : ''; ?>">

                    <!-- Featured Badge -->
                    <?php if ($index === 1): ?>
                        <span class="featured-badge">
                            Featured Project
                        </span>
                    <?php endif; ?>

                    <!-- App Preview -->
                    <div class="app-preview">

                        <div class="phone-frame">
                            <div class="phone-speaker"></div>

                            <div class="phone-screen">
                                <div class="phone-icon">
                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.8">
                                        <rect x="7" y="2" width="10" height="20" rx="2"/>
                                        <path d="M11 18h2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Client -->
                    <span class="app-client">
                        <?php echo htmlspecialchars($app['client']); ?>
                    </span>

                    <!-- Title -->
                    <h3 class="app-title">
                        <?php echo htmlspecialchars($app['title']); ?>
                    </h3>

                    <!-- Description -->
                    <p class="app-summary">
                        <?php echo htmlspecialchars($app['summary']); ?>
                    </p>

                    <!-- Stats -->
                    <div class="app-mini-stats">

                        <?php foreach (array_slice($app['stats'], 0, 2) as $stat): ?>

                            <div class="stat-item">

                                <strong>
                                    <?php echo htmlspecialchars($stat['value']); ?>
                                </strong>

                                <span>
                                    <?php echo htmlspecialchars($stat['label']); ?>
                                </span>

                            </div>

                        <?php endforeach; ?>

                    </div>

                    <!-- Technology -->
                    <div class="app-tags">

                        <?php foreach (array_slice($app['tags'], 0, 3) as $tag): ?>

                            <span class="app-tag">
                                <?php echo htmlspecialchars($tag); ?>
                            </span>

                        <?php endforeach; ?>

                    </div>

                    <!-- CTA -->
                    <a href="project-detail.php?slug=<?php echo urlencode($app['slug']); ?>"
                       class="app-case-btn">

                        <span>View Case Study</span>

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">
                            <path d="M5 12h14"/>
                            <path d="m13 6 6 6-6 6"/>
                        </svg>

                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>
</section>

<style>
    /* =========================================================
   DEVOTION APP SHOWCASE
   Primary: #b38f51
   Font: Poppins
   ========================================================= */

:root {
    --devotion-gold: #b38f51;
    --devotion-gold-dark: #967536;
    --devotion-gold-light: #d7c09a;

    --app-text: #101a3a;
    --app-muted: #6d7485;
    --app-border: #e9e4dc;

    --app-bg: #ffffff;
    --app-soft-bg: #faf9f7;

    --phone-dark: #071331;
    --phone-blue: #172b59;
}


/* ================= SECTION ================= */

.app-showcase-section {
    position: relative;
    padding: 80px 0 100px;
    background: #ffffff;
}


/* ================= GRID ================= */

.app-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 32px;
    align-items: stretch;
}


/* ================= CARD ================= */

.app-card {
    position: relative;

    display: flex;
    flex-direction: column;

    min-height: 655px;

    padding: 30px 26px 28px;

    background: #ffffff;

    border: 1px solid var(--app-border);
    border-radius: 24px;

    text-align: center;

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}


/* Top subtle glow */

.app-card::before {
    content: "";
    position: absolute;

    top: -100px;
    left: 50%;

    width: 220px;
    height: 220px;

    transform: translateX(-50%);

    background: radial-gradient(
        circle,
        rgba(179, 143, 81, 0.10) 0%,
        rgba(179, 143, 81, 0) 70%
    );

    pointer-events: none;
}


/* Hover */

.app-card:hover {
    transform: translateY(-8px);

    border-color: rgba(179, 143, 81, 0.55);

    box-shadow:
        0 20px 50px rgba(23, 30, 50, 0.10),
        0 5px 15px rgba(23, 30, 50, 0.04);
}


/* ================= FEATURED CARD ================= */

.app-card.featured {
    border-color: var(--devotion-gold);

    box-shadow:
        0 18px 45px rgba(179, 143, 81, 0.13);
}


/* Featured badge */

.featured-badge {
    position: absolute;

    top: 0;
    left: 50%;

    transform: translateX(-50%);

    padding: 7px 18px;

    background: var(--devotion-gold);

    color: #ffffff;

    font-family: "Poppins", sans-serif;
    font-size: 10px;
    font-weight: 600;

    letter-spacing: 0.5px;

    border-radius: 0 0 10px 10px;

    z-index: 5;
}


/* ================= APP PREVIEW ================= */

.app-preview {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: center;

    height: 280px;

    margin-bottom: 4px;
}


/* ================= PHONE ================= */

.phone-frame {
    position: relative;

    width: 130px;
    height: 260px;

    padding: 10px;

    background: #080f28;

    border: 1px solid rgba(255, 255, 255, 0.06);

    border-radius: 29px;

    box-shadow:
        0 20px 30px rgba(7, 19, 49, 0.22),
        0 8px 15px rgba(7, 19, 49, 0.12);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease;
}


.app-card:hover .phone-frame {
    transform: translateY(-5px);

    box-shadow:
        0 25px 40px rgba(7, 19, 49, 0.28),
        0 10px 20px rgba(7, 19, 49, 0.14);
}


/* Phone screen */

.phone-screen {
    position: relative;

    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    background:
        linear-gradient(
            160deg,
            #101e44 0%,
            #172d60 100%
        );

    border-radius: 21px;

    overflow: hidden;
}


/* Phone speaker */

.phone-speaker {
    position: absolute;

    top: 16px;
    left: 50%;

    width: 43px;
    height: 5px;

    transform: translateX(-50%);

    background: #555f77;

    border-radius: 20px;

    z-index: 10;
}


/* Phone icon */

.phone-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: var(--devotion-gold);

    border: 2px solid var(--devotion-gold);

    border-radius: 7px;
}

.phone-icon svg {
    width: 22px;
    height: 22px;
}


/* ================= CLIENT ================= */

.app-client {
    display: inline-block;

    margin-top: 2px;
    margin-bottom: 8px;

    color: var(--devotion-gold);

    font-family: "Poppins", sans-serif;

    font-size: 12px;
    font-weight: 600;

    letter-spacing: 0.15px;
}


/* ================= TITLE ================= */

.app-title {
    margin: 0 auto 8px;

    max-width: 330px;

    color: var(--app-text);

    font-family: "Poppins", sans-serif;

    font-size: 18px;
    line-height: 1.4;
    font-weight: 700;

    letter-spacing: -0.25px;
}


/* ================= DESCRIPTION ================= */

.app-summary {
    max-width: 340px;

    min-height: 58px;

    margin: 0 auto 18px;

    color: var(--app-muted);

    font-family: "Poppins", sans-serif;

    font-size: 13px;
    line-height: 1.75;
    font-weight: 400;
}


/* ================= STATS ================= */

.app-mini-stats {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    width: 100%;

    margin: 0 auto 20px;

    padding: 0 10px;
}


.stat-item {
    position: relative;

    display: flex;
    flex-direction: column;
    align-items: center;

    padding: 0 12px;
}


.stat-item + .stat-item::before {
    content: "";

    position: absolute;

    left: 0;
    top: 5px;

    width: 1px;
    height: 42px;

    background: var(--app-border);
}


.stat-item strong {
    color: var(--devotion-gold);

    font-family: "Poppins", sans-serif;

    font-size: 17px;
    line-height: 1.4;
    font-weight: 700;
}


.stat-item span {
    margin-top: 3px;

    color: #777f90;

    font-family: "Poppins", sans-serif;

    font-size: 10px;
    line-height: 1.4;

    text-align: center;
}


/* ================= TECHNOLOGY TAGS ================= */

.app-tags {
    display: flex;

    align-items: center;
    justify-content: center;

    flex-wrap: wrap;

    gap: 7px;

    margin-bottom: 22px;
}


.app-tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-height: 28px;

    padding: 5px 13px;

    background: #faf9f6;

    border: 1px solid #e8e1d6;

    border-radius: 50px;

    color: #17213b;

    font-family: "Poppins", sans-serif;

    font-size: 10px;
    font-weight: 500;

    transition:
        background 0.25s ease,
        border-color 0.25s ease,
        color 0.25s ease;
}


.app-card:hover .app-tag {
    border-color: rgba(179, 143, 81, 0.35);
}


/* ================= CTA ================= */

.app-case-btn {
    width: 100%;
    min-height: 52px;

    margin-top: auto;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    padding: 14px 20px;

    background: var(--devotion-gold);

    border: 1px solid var(--devotion-gold);

    border-radius: 10px;

    color: #ffffff !important;

    font-family: "Poppins", sans-serif;

    font-size: 13px;
    font-weight: 600;

    text-decoration: none;

    transition:
        background 0.3s ease,
        border-color 0.3s ease,
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


.app-case-btn svg {
    width: 17px;
    height: 17px;

    transition: transform 0.3s ease;
}


.app-case-btn:hover {
    background: var(--devotion-gold-dark);
    border-color: var(--devotion-gold-dark);

    color: #ffffff !important;

    box-shadow:
        0 8px 20px rgba(179, 143, 81, 0.25);
}


.app-case-btn:hover svg {
    transform: translateX(4px);
}


/* ================= RESPONSIVE ================= */

@media (max-width: 1199.98px) {

    .app-grid {
        gap: 22px;
    }

    .app-card {
        padding-left: 20px;
        padding-right: 20px;
    }

    .phone-frame {
        width: 120px;
        height: 245px;
    }

    .app-title {
        font-size: 17px;
    }
}


@media (max-width: 991.98px) {

    .app-showcase-section {
        padding: 60px 0 80px;
    }

    .app-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .app-card {
        min-height: 650px;
    }

    .app-card.featured {
        order: -1;
    }
}


@media (max-width: 767.98px) {

    .app-showcase-section {
        padding: 45px 0 60px;
    }

    .app-grid {
        grid-template-columns: 1fr;

        max-width: 520px;

        margin: 0 auto;

        gap: 24px;
    }

    .app-card {
        min-height: auto;

        padding: 28px 24px 24px;

        border-radius: 20px;
    }

    .app-preview {
        height: 270px;
    }

    .phone-frame {
        width: 125px;
        height: 250px;
    }

    .app-summary {
        min-height: auto;
    }
}


@media (max-width: 480px) {

    .app-card {
        padding: 25px 18px 20px;
    }

    .app-preview {
        height: 255px;
    }

    .phone-frame {
        width: 118px;
        height: 238px;
    }

    .app-title {
        font-size: 17px;
    }

    .app-summary {
        font-size: 12px;
        line-height: 1.7;
    }

    .stat-item strong {
        font-size: 16px;
    }

    .app-case-btn {
        min-height: 50px;
    }
}
</style>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Building An App?</span>
            <h2>Let's talk about what "reliable" needs to mean for yours</h2>
            <p>Book a discovery call and we'll tell you honestly what platform and architecture fits your users' real conditions.</p>
        </div>
        <div class="careers-actions">
            <a href="#" class="btn btn-gold">Book A Discovery Call</a>
            <a href="portfolio.php" class="btn btn-outline-light">View Full Portfolio</a>
        </div>
    </div>
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>