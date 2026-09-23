<?php
$seo = [
    'title' => 'Web Projects | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'Websites and web platforms Devotion Technologies has built — client portals, marketing sites and partner tools shipped for real businesses.',
    'keywords' => 'Devotion Technologies web projects, web development portfolio, client portal, web platform',
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
$projects = array_values(array_filter($portfolio, function ($p) {
    return $p['category'] === 'web';
}));
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

    .section-head {
        max-width: 680px;
        margin-bottom: 50px;
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
        color: #fff;
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
        border-color: #fff;
        color: #fff;
    }

    /* =========================================
   WEB PROJECTS HERO
========================================= */
    .web-hero {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        min-height: 500px;
        display: flex;
        align-items: center;
        padding: 100px 0 60px;
        background: url('<?php echo $siteBase; ?>/assets/images/banner-img.png');
        color: #000;
    }

    /* =========================================
   GRID BACKGROUND
========================================= */
    .web-hero-grid {
        position: absolute;
        inset: 0;
        z-index: -1;
        background-image:
            linear-gradient(#00000011 1px,
                transparent 1px),
            linear-gradient(90deg,
                #00000011 1px,
                transparent 1px);
        background-size: 42px 42px;
    }


    /* =========================================
   GOLD GLOW
========================================= */
    .web-hero-glow {
        position: absolute;
        width: 500px;
        height: 500px;
        right: -180px;
        top: -240px;
        z-index: -1;
        background: radial-gradient(circle,
                rgba(179, 143, 81, .22) 0%,
                rgba(179, 143, 81, .07) 35%,
                transparent 70%);
        pointer-events: none;
    }

    /* =========================================
   HERO CONTENT
========================================= */
    .web-hero-content {
        margin: 0 auto;
        text-align: center;
    }


    /* =========================================
   EYEBROW
========================================= */
    .web-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
        color: #B38F51;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .eyebrow-dot {
        width: 7px;
        height: 7px;
        background: #B38F51;
        border-radius: 50%;
        box-shadow: 0 0 0 5px rgba(179, 143, 81, .10);
    }

    /* =========================================
   HERO HEADING
========================================= */
    .web-hero h1 {
        margin: 0 auto 25px;
        color: #000;
        font-size: clamp(2.2rem, 4.3vw, 4rem);
        font-weight: 600;
        line-height: 1.18;
        letter-spacing: -1.5px;
    }

    .web-hero h1 span {
        color: #B38F51;
    }


    /* =========================================
   HERO DESCRIPTION
========================================= */

    .web-hero p {
        margin: 0 auto;
        color: #9da6b9;
        font-size: 1.2rem;
        line-height: 1.85;
    }


    /* =========================================
   ACTION BUTTONS
========================================= */

    .web-hero-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 35px;
    }

    .web-hero-actions .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 18px;
        min-height: 52px;
        padding: 14px 24px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        transition:
            transform .25s ease,
            background .25s ease,
            border-color .25s ease;
    }

    .web-hero-actions .btn:hover {
        transform: translateY(-3px);
    }

    .web-hero-actions .btn span {
        font-size: 18px;
    }

    /* GOLD BUTTON */

    .web-hero .btn-gold {
        background: #B38F51;
        border: 1px solid #B38F51;
        color: #FFFFFF;
    }

    .web-hero .btn-gold:hover {
        background: #C3A365;
        border-color: #C3A365;
        color: #FFFFFF;
    }


    /* OUTLINE BUTTON */

    .web-hero .btn-outline-light {
        color: #FFFFFF;
        border: 1px solid rgba(255, 255, 255, .35);
        background: #000;
    }

    .web-hero .btn-outline-light:hover {
        color: #FFFFFF;
        border-color: #B38F51;
    }


    /* =========================================
   BOTTOM META
========================================= */
    .web-hero-bottom {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 25px;
        padding-top: 25px;
        border-top: 1px solid rgba(255, 255, 255, .12);
    }

    .hero-meta {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #9EACC7;
        font-size: 1.2rem;
    }

    .meta-dot {
        width: 5px;
        height: 5px;
        background: #B38F51;
        border-radius: 50%;
    }


    /* =========================================
   RESPONSIVE
========================================= */

    @media (max-width: 767px) {

        .web-hero {
            min-height: auto;
            padding: 75px 0 40px;
        }

        .web-hero h1 {
            font-size: 2rem;
            letter-spacing: -.7px;
        }

        .web-hero p {
            font-size: 14px;
            line-height: 1.75;
        }

        .web-hero-actions {
            flex-direction: column;
            width: 100%;
        }

        .web-hero-actions .btn {
            width: 100%;
        }

        .web-hero-bottom {
            align-items: flex-start;
            flex-direction: column;
            gap: 15px;
            margin-top: 45px;
        }

    }

    /* CASE-FILE ZIGZAG */
    .casefile {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        padding: 60px 0;
        border-bottom: 1px solid #e8e3d6;
    }

    .casefile:last-child {
        border-bottom: none;
    }

    .casefile.reverse .cf-visual {
        order: 2;
    }

    .casefile.reverse .cf-copy {
        order: 1;
    }

    .cf-visual {
        aspect-ratio: 4/3;
        border-radius: 20px;
        background: linear-gradient(150deg, #070d24, #152a58);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e8e3d6;
    }

    .cf-visual::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle at 20% 20%, rgba(179, 143, 81, .25), transparent 55%);
    }

    .cf-visual .cf-tag {
        position: relative;
        z-index: 1;
        color: rgba(255, 255, 255, .85);
        font-size: .85rem;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, .25);
        border-radius: 999px;
        padding: 8px 18px;
        background: rgba(255, 255, 255, .06);
    }

    .cf-copy .cf-eyebrow {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.2rem;
        font-weight: 700;
        color: #b38f51;
        letter-spacing: .04em;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .cf-copy h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #070d24;
        margin-bottom: 8px;
        line-height: 1.3;
    }

    .cf-copy .cf-summary {
        color: #6c7280;
        font-size: 1.2rem;
        line-height: 1.7;
        margin-bottom: 20px !important;
    }

    .cf-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        margin-bottom: 24px;
    }

    .cf-stats .item strong {
        display: block;
        font-size: 1.3rem;
        font-weight: 800;
        color: #b38f51;
    }

    .cf-stats .item span {
        font-size: 0.9rem;
        color: #6c7280;
    }

    .cf-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 22px;
    }

    .cf-tags span { 
        border: 1px solid #e8e3d6;
        border-radius: 999px;
        padding: 5px 13px;
        font-size: 1rem;
        font-weight: 500;
        color: #070d24;
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
        background: #000;
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

    @media (max-width: 860px) {

        .casefile,
        .casefile.reverse {
            grid-template-columns: 1fr;
            gap: 26px;
        }

        .casefile.reverse .cf-visual,
        .casefile.reverse .cf-copy {
            order: initial;
        }
    }
</style>

<!-- WEB PROJECTS HERO -->
<section class="web-hero">

    <!-- Decorative grid -->
    <div class="web-hero-grid"></div>

    <!-- Soft glow -->
    <div class="web-hero-glow"></div>

    <div class="container position-relative">

        <div class="web-hero-content">

            <!-- Eyebrow -->
            <div class="web-hero-eyebrow">
                <span class="eyebrow-dot"></span>
                <span>WEB PROJECTS</span>
            </div>

            <!-- Heading -->
            <h1>
                Websites and platforms
                <span>built to be used,</span>
                not just launched.
            </h1>

            <!-- Description -->
            <p>
                Every project below replaced something that wasn't working —
                a slow legacy system, a form nobody filled out, or a spreadsheet
                standing in for software. Here's what we built instead.
            </p>

            <!-- Actions -->
            <div class="web-hero-actions">

                <a href="#projects" class="btn btn-gold">
                    Explore Our Work
                    <span>↗</span>
                </a>

                <a href="contact.php" class="btn btn-outline-light">
                    Start a Project
                    <span>→</span>
                </a>

            </div>

        </div>

        <!-- Bottom metadata -->
        <div class="web-hero-bottom">

            <div class="hero-meta">
                <span class="meta-dot"></span>
                <span>Strategy-led development</span>
            </div>

            <div class="hero-meta">
                <span class="meta-dot"></span>
                <span>Built for real business needs</span>
            </div>

            <div class="hero-meta">
                <span class="meta-dot"></span>
                <span>Websites &amp; platforms</span>
            </div>

        </div>

    </div>

</section>

<!-- CASE FILE ZIGZAG -->
<section>
    <div class="container">
        <?php foreach ($projects as $i => $p): ?>
            <div class="casefile <?php echo $i % 2 === 1 ? 'reverse' : ''; ?>">
                <div class="cf-visual">
                    <span class="cf-tag"><?php echo htmlspecialchars($p['gallery_note']); ?></span>
                </div>
                <div class="cf-copy">
                    <span class="cf-eyebrow"><?php echo htmlspecialchars($p['client']); ?> &middot; <?php echo htmlspecialchars($p['year']); ?></span>
                    <h3><?php echo htmlspecialchars($p['title']); ?></h3>
                    <p class="cf-summary"><?php echo htmlspecialchars($p['summary']); ?></p>
                    <div class="cf-stats">
                        <?php foreach (array_slice($p['stats'], 0, 3) as $stat): ?>
                            <div class="item">
                                <strong><?php echo htmlspecialchars($stat['value']); ?></strong>
                                <span><?php echo htmlspecialchars($stat['label']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cf-tags">
                        <?php foreach ($p['tags'] as $tag): ?>
                            <span><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="project-detail.php?slug=<?php echo urlencode($p['slug']); ?>" class="btn btn-outline-dark">Read Full Project</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:#b38f51;">Have A Website Problem?</span>
            <h2>Tell us what's not working — we'll tell you what to build instead</h2>
            <p>Book a discovery call and we'll give you an honest read on whether a rebuild, or something smaller, actually solves it.</p>
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