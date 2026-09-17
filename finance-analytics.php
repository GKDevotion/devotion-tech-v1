<?php
$seo = [
    'title' => 'Finance & Analytics Solutions | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'ERP, BI, Billing and PayGate systems Devotion Technologies builds and integrates — the connected finance layer behind accurate reporting, clean billing and reliable payments.',
    'keywords' => 'enterprise resource planning, business intelligence, subscription billing, invoicing engine, payment gateway integration',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$finPath = __DIR__ . '/data/finance-analytics.json';
$systems = [];
if (file_exists($finPath)) {
    $json = file_get_contents($finPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $systems = $decoded;
    }
}

$finIcons = [
    'bank'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9.5L12 4l9 5.5" /><path d="M4.5 9.5V19M9 9.5V19M15 9.5V19M19.5 9.5V19" /><path d="M3 19h18" /></svg>',
    'chart'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V10M9.5 19V5M15 19v-7M20 19V9" /><path d="M3 19h18" /></svg>',
    'invoice' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="5" y="3.5" width="14" height="17" rx="1.6" /><path d="M8.5 8.5h7M8.5 12h7M8.5 15.5h4" /></svg>',
    'card'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="6" width="19" height="13" rx="2" /><path d="M2.5 10.5h19" /><path d="M6 15h4" /></svg>',
];
function fin_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['chart'];
}
?>

<style>
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
 

    .section-head h2 {
        font-size: clamp(1.6rem, 2.6vw, 2.1rem);
        font-weight: 700;
        color: #070d24;
        margin: 12px 0 10px;
    }

    .section-head p {
        color: #6c7280;
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
        background: #b38f51;
        color: #fff;
    }

    .btn-gold:hover {
        background: #8f7040;
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, .4);
        color: #fff;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #070d24;
    }

    .btn-outline-dark {
        border: 1.5px solid #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark:hover {
        border-color: #b38f51;
        color: #8f7040;
    }

    /* =========================================
   FINANCE & ANALYTICS HERO
========================================= */

    .fin-hero {
        position: relative;
        overflow: hidden;
        background: url(../d-tech/assets/images/banner-img.png);
        color: #000;
        padding: 94px 20px 76px;
        border-top: 1px solid rgba(179, 143, 81, 0.35);
    }

    /* Soft background detail */
    .fin-hero::before {
        content: "";
        position: absolute;
        width: 480px;
        height: 480px;
        right: -220px;
        top: -250px;
        border-radius: 50%;
        background: rgba(179, 143, 81, 0.06);
        pointer-events: none;
    }

    /* Main content */
    .fin-hero-content {
        margin: 0 auto;
        text-align: center;
    }

    /* Eyebrow */
    .fin-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #b38f51;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 0.02em;
    }

    .fin-hero-dot {
        width: 6px;
        height: 6px;
        background: #b38f51;
        border-radius: 50%;
        display: inline-block;
    }

    /* Heading */
    .fin-hero h1 {
        margin: 0 auto;
        color: #000;
        font-size: clamp(36px, 4.2vw, 58px);
        font-weight: 700;
        line-height: 1.12;
        letter-spacing: -1.5px;
    }

    .fin-hero h1 span {
        display: block;
    }

    /* Description */
    .fin-hero p {
        margin: 26px auto 0;
        color: #000;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.75;
    }

    /* Bottom meta */
    .fin-hero-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 34px;
        margin: 0px auto 0;
        padding-top: 28px;
        max-width: 690px;
        border-top: 1px solid rgba(255, 255, 255, 0.13);
    }

    .fin-meta-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .fin-meta-number {
        color: #b38f51;
        font-size: 25px;
        font-weight: 700;
        line-height: 1.2;
    }

    .fin-meta-label {
        color: #000;
        font-size: 1rem;
        white-space: nowrap;
    }

    .fin-meta-divider {
        width: 1px;
        height: 38px;
        background: rgba(255, 255, 255, 0.16);
    }

    /* =========================================
   RESPONSIVE
========================================= */

    @media (max-width: 767px) {

        .fin-hero {
            padding: 64px 20px 50px;
        }

        .fin-hero-content {
            max-width: 100%;
        }

        .fin-hero-eyebrow {
            font-size: 13px;
            margin-bottom: 20px;
        }

        .fin-hero h1 {
            font-size: clamp(32px, 8vw, 42px);
            line-height: 1.18;
            letter-spacing: -0.8px;
        }

        .fin-hero p {
            font-size: 15px;
            line-height: 1.7;
            margin-top: 22px;
        }

        .fin-hero-meta {
            gap: 16px;
            margin-top: 32px;
            padding-top: 24px;
        }

        .fin-meta-number {
            font-size: 21px;
        }

        .fin-meta-label {
            font-size: 10px;
            text-align: center;
            white-space: normal;
        }

        .fin-meta-divider {
            height: 32px;
        }
    }

   
/* =========================================
   FINANCE STACK PIPELINE
========================================= */

.finance-pipeline-section {
    padding: 96px 0 110px;
    background: #fff;
}

/* Section Header */

.finance-stack-head { 
    margin: 0 auto;
    text-align: center;
}

.finance-stack-head h2 {
    margin-bottom: 14px;
    color: #070d24;
    font-size: clamp(30px, 3vw, 42px);
    font-weight: 700;
    line-height: 1.18;
    letter-spacing: -0.8px;
}

.finance-stack-head p { 
    margin: 0 auto;
    color: #6d7486;
    font-size: 1.2rem;
    line-height: 1.7;
}

/* =========================================
   PIPELINE NAVIGATION
========================================= */

.pipeline-wrap {
    position: relative; 
    margin: 58px auto 52px;
}

.pipeline-track {
    position: relative;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

/* Gold connecting line */

.pipeline-connector {
    position: absolute;
    top: 31px;
    left: 12%;
    right: 12%;
    height: 1px;
    border-top: 1px dashed #b38f51;
    opacity: 0.85;
    z-index: 0;
}

/* Node */

.pipeline-node {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    text-decoration: none;
    color: #070d24;
    transition: transform 0.25s ease;
}

.pn-circle {
    width: 64px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #b38f51;
    border-radius: 50%;
    background: #fff;
    color: #b38f51;
    box-shadow: 0 5px 16px rgba(7, 13, 36, 0.07);
    transition:
        background 0.25s ease,
        color 0.25s ease,
        box-shadow 0.25s ease;
}

.pn-circle svg {
    width: 23px;
    height: 23px;
}

.pn-abbr {
    margin-top: 14px;
    color: #070d24;
    font-size: 1rem;
    font-weight: 700;
}

.pn-title {
    margin-top: 5px;
    color: #8a8f9d;
    font-size: 1rem;
    line-height: 1.4;
}

/* Hover */

.pipeline-node:hover {
    transform: translateY(-3px);
}

.pipeline-node:hover .pn-circle {
    background: #b38f51;
    color: #fff;
    box-shadow: 0 8px 22px rgba(179, 143, 81, 0.22);
}

/* =========================================
   SYSTEM CARDS
========================================= */
 
/* Card */

.system-card {
    display: grid;
    grid-template-columns: 54px minmax(0, 1fr) 155px;
    align-items: center;
    gap: 22px;
    padding: 22px 24px;
    border: 1px solid #e7dfd1;
    border-radius: 14px;
    background: #fff;
    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        transform 0.25s ease;
}

.system-card:hover {
    border-color: #b38f51;
    box-shadow: 0 14px 32px rgba(7, 13, 36, 0.07);
    transform: translateY(-2px);
}

/* Icon */

.sc-icon {
    width: 54px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e7dfd1;
    border-radius: 10px;
    background: #f8f5ef;
    color: #b38f51;
}

.sc-icon svg {
    width: 22px;
    height: 22px;
}

/* Content */

.sc-body {
    min-width: 0;
}

.sc-abbr {
    display: block;
    margin-bottom: 6px;
    color: #b38f51;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.035em;
    text-transform: uppercase;
}

.sc-separator {
    padding: 0 3px;
    color: #c7a66d;
}

.sc-body h3 {
    margin: 0 0 7px;
    color: #070d24;
    font-size: 15px;
    font-weight: 700;
    line-height: 1.35;
}

.sc-body p {
    max-width: 760px;
    margin: 0;
    color: #7b8292;
    font-size: 11px;
    line-height: 1.7;
}

/* Stat */

.sc-stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-left: 22px;
    border-left: 1px solid #e7dfd1;
    text-align: center;
}

.sc-stat-value {
    color: #b38f51;
    font-size: 20px;
    font-weight: 700;
    line-height: 1.2;
}

.sc-stat-label {
    min-height: 28px;
    margin-top: 5px;
    color: #9296a2;
    font-size: 9px;
    line-height: 1.4;
}

/* Button */

.sc-view-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    min-height: 34px;
    margin-top: 12px;
    padding: 8px 8pxpx;
    border: 1px solid #e5dcca;
    border-radius: 6px;
    background: #fff;
    color: #070d24;
    font-size: 1.2rem;
    font-weight: 600;
    text-decoration: none;
    transition:
        background 0.25s ease,
        border-color 0.25s ease,
        color 0.25s ease;
}

.sc-arrow {
    color: #b38f51;
    font-size: 1rem;
    margin-top: 10px;
}

.sc-view-btn:hover {
    border-color: #b38f51;
    background: #b38f51;
    color: #fff;
}

.sc-view-btn:hover .sc-arrow {
    color: #fff;
}

/* =========================================
   RESPONSIVE TABLET
========================================= */

@media (max-width: 991px) {

    .finance-pipeline-section {
        padding: 75px 0 85px;
    }

    .pipeline-wrap {
        margin-top: 45px;
    }

    .system-card {
        grid-template-columns: 48px minmax(0, 1fr) 135px;
        gap: 16px;
        padding: 20px;
    }

    .sc-icon {
        width: 48px;
        height: 48px;
    }

    .sc-body h3 {
        font-size: 14px;
    }

    .sc-body p {
        font-size: 11px;
    }

    .sc-stat {
        padding-left: 16px;
    }

}

/* =========================================
   RESPONSIVE MOBILE
========================================= */

@media (max-width: 767px) {

    .finance-pipeline-section {
        padding: 58px 0 70px;
    }

    .finance-stack-head {
        padding: 0 12px;
    }

    .finance-stack-head h2 {
        font-size: 30px;
        letter-spacing: -0.5px;
    }

    .finance-stack-head p {
        font-size: 13px;
    }

    /* Horizontal scroll pipeline */

    .pipeline-wrap {
        margin: 38px 0 40px;
        overflow-x: auto;
        padding: 0 20px 10px;
        scrollbar-width: thin;
    }

    .pipeline-track {
        min-width: 540px;
        gap: 12px;
    }

    .pipeline-connector {
        left: 12%;
        right: 12%;
    }

    .pn-circle {
        width: 58px;
        height: 58px;
    }

    .pn-abbr {
        font-size: 12px;
    }

    .pn-title {
        font-size: 10px;
    }

    /* Cards become stacked */

    .system-cards {
        gap: 14px;
        padding: 0 16px;
    }

    .system-card {
        grid-template-columns: 46px minmax(0, 1fr);
        gap: 14px;
        padding: 20px;
        border-radius: 12px;
    }

    .sc-icon {
        width: 46px;
        height: 46px;
    }

    .sc-icon svg {
        width: 20px;
        height: 20px;
    }

    .sc-abbr {
        font-size: 9px;
    }

    .sc-body h3 {
        font-size: 14px;
    }

    .sc-body p {
        margin-top: 10px;
        font-size: 12px;
        line-height: 1.7;
    }

    .sc-stat {
        grid-column: 1 / -1;
        display: grid;
        grid-template-columns: auto minmax(0, 1fr);
        align-items: center;
        gap: 4px 12px;
        padding: 16px 0 0;
        border-top: 1px solid #e7dfd1;
        border-left: 0;
        text-align: left;
    }

    .sc-stat-value {
        font-size: 20px;
    }

    .sc-stat-label {
        min-height: auto;
        margin: 0;
        font-size: 10px;
    }

    .sc-view-btn {
        grid-column: 1 / -1;
        width: 100%;
        margin-top: 10px;
        min-height: 40px;
        font-size: 12px;
    }

}

/* Small mobile */

@media (max-width: 380px) {

    .finance-stack-head h2 {
        font-size: 27px;
    }

    .system-card {
        padding: 16px;
    }

    .sc-body h3 {
        font-size: 13px;
    }

}

    /* SYSTEM DETAIL CARDS */
    .system-cards {
        display: flex;
        flex-direction: column;
        gap: 22px; 
        margin: 0 auto; 
    }

    .system-card {
        display: grid;
        grid-template-columns: 100px 1fr 300px;
        gap: 26px;
        align-items: center;
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 20px;
        padding: 28px 30px;
        transition: border-color .25s ease, box-shadow .25s ease;
    }

    .system-card:hover {
        border-color: #b38f51;
        box-shadow: 0 24px 55px -30px rgba(10, 19, 48, .25);
    }

    .sc-icon {
        width: 68px;
        height: 68px;
        border-radius: 16px;
        background: #f7f4ee;
        border: 1px solid #e8e3d6;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sc-icon svg {
        width: 30px;
        height: 30px;
    }

    .sc-body .sc-abbr {
        font-size: 1rem;
        font-weight: 700;
        color: #b38f51;
        text-transform: uppercase;
        letter-spacing: .06em;
        display: block;
        margin-bottom: 4px;
    }

    .sc-body h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #070d24;
        margin-bottom: 6px;
    }

    .sc-body p {
        color: #6c7280;
        font-size: 1rem;
        line-height: 1.6;
    }

    .sc-stat {
        text-align: center;
        border-left: 1px solid #e8e3d6;
        padding-left: 22px;
    }

    .sc-stat strong {
        display: block;
        font-size: 1.35rem;
        font-weight: 800;
        color: #8f7040;
    }

    .sc-stat span {
        font-size: 1rem;
        color: #6c7280;
        display: block;
        margin-bottom: 14px;
    }

    @media (max-width: 780px) {
        .system-card {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .sc-stat {
            border-left: none;
            border-top: 1px solid #e8e3d6;
            padding-left: 0;
            padding-top: 18px;
        }
    }

    /* CTA */
    .careers {
        background: linear-gradient(135deg, #070d24, #152a58);
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
</style>

<!-- FINANCE & ANALYTICS HERO -->
<section class="fin-hero">
    <div class="container">
        <div class="fin-hero-content">

            <!-- Eyebrow -->
            <span class="fin-hero-eyebrow">
                <span class="fin-hero-dot"></span>
                Finance &amp; Analytics
            </span>

            <!-- Heading -->
            <h1>
                Four systems, one connected
                <span>finance layer</span>
            </h1>

            <!-- Description -->
            <p>
                Resource planning, reporting, billing and payments
                don't work as isolated tools — they work as a layer
                underneath everything else you run. Here's how each
                piece connects to the next, and what each one solves
                on its own.
            </p>

            <!-- Hero Bottom Meta -->
            <div class="fin-hero-meta">
                <div class="fin-meta-item">
                    <span class="fin-meta-number">04</span>
                    <span class="fin-meta-label">Connected Systems</span>
                </div>

                <div class="fin-meta-divider"></div>

                <div class="fin-meta-item">
                    <span class="fin-meta-number">01</span>
                    <span class="fin-meta-label">Finance Layer</span>
                </div>

                <div class="fin-meta-divider"></div>

                <div class="fin-meta-item">
                    <span class="fin-meta-number">360°</span>
                    <span class="fin-meta-label">Business Visibility</span>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- =========================================
     FINANCE STACK PIPELINE
========================================= -->
<section class="finance-pipeline-section">
    <div class="container">

        <!-- SECTION HEADER -->
        <div class="section-head finance-stack-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                The Finance Stack
            </div>

            <h2>From transaction to insight</h2>

            <p>
                Each system below hands off to the next — click any
                node to explore the full breakdown.
            </p>
        </div>

        <!-- PIPELINE NAVIGATION -->
        <div class="pipeline-wrap">
            <div class="pipeline-track">

                <div class="pipeline-connector"></div>

                <?php foreach ($systems as $s): ?>

                    <a href="finance-analytics-detail.php?slug=<?php
                                                                echo urlencode($s['slug']);
                                                                ?>" class="pipeline-node">

                        <div class="pn-circle">
                            <?php echo fin_icon($finIcons, $s['icon']); ?>
                        </div>

                        <span class="pn-abbr">
                            <?php echo htmlspecialchars($s['abbr']); ?>
                        </span>

                        <span class="pn-title">
                            <?php echo htmlspecialchars($s['title']); ?>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>
        </div>

        <!-- SYSTEM DETAIL CARDS -->
        <div class="system-cards">

            <?php foreach ($systems as $i => $s): ?>

                <article class="system-card">

                    <!-- System Icon -->
                    <div class="sc-icon">
                        <?php echo fin_icon($finIcons, $s['icon']); ?>
                    </div>

                    <!-- Main Content -->
                    <div class="sc-body">

                        <span class="sc-abbr">
                            <?php echo htmlspecialchars($s['abbr']); ?>
                            <span class="sc-separator">·</span>
                            <?php echo htmlspecialchars($s['title']); ?>
                        </span>

                        <h3>
                            <?php echo htmlspecialchars($s['tagline']); ?>
                        </h3>

                        <p>
                            <?php echo htmlspecialchars($s['overview']); ?>
                        </p>

                    </div>

                    <!-- Stat + Action -->
                    <div class="sc-stat">

                        <div class="sc-stat-value">
                            <?php echo htmlspecialchars(
                                $s['cover_stat']['value']
                            ); ?>
                        </div>

                        <span class="sc-stat-label">
                            <?php echo htmlspecialchars(
                                $s['cover_stat']['label']
                            ); ?>
                        </span>

                        <a href="finance-analytics-detail.php?slug=<?php
                                                                    echo urlencode($s['slug']);
                                                                    ?>" class="sc-view-btn">

                            View Details
                            <span class="sc-arrow">↗</span>

                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:#b38f51;">Not Sure Where To Start?</span>
            <h2>Tell us where your finance stack breaks down</h2>
            <p>Book a discovery call and we'll tell you honestly which piece to fix first, and whether it needs all four or just one.</p>
        </div>
        <div class="careers-actions">
            <a href="#" class="btn btn-gold">Book A Discovery Call</a>
            <a href="services.php" class="btn btn-outline-light">View Our Services</a>
        </div>
    </div>
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>