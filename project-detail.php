<?php
    // ---- Load all portfolio entries from JSON ----
    $portfolioPath = __DIR__ . '/data/portfolio.json';
    $portfolio = [];
    if (file_exists($portfolioPath)) {
        $json = file_get_contents($portfolioPath);
        $decoded = json_decode($json, true);
        if (is_array($decoded)) {
            $portfolio = $decoded;
        }
    }

    // ---- Resolve the requested project by slug ----
    $slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
    $project = null;
    foreach ($portfolio as $p) {
        if ($p['slug'] === $slug) {
            $project = $p;
            break;
        }
    }
    if (!$project && count($portfolio) > 0) {
        $project = $portfolio[0];
    }

    // Category -> listing page it belongs to, for breadcrumb + back link
    $categoryPages = [
        'web'          => ['label' => 'Web Projects', 'href' => 'web-projects.php'],
        'mobile'       => ['label' => 'Mobile Apps', 'href' => 'mobile-apps.php'],
        'software'     => ['label' => 'Software Projects', 'href' => 'software-projects.php'],
        'case-studies' => ['label' => 'Case Studies', 'href' => 'case-studies.php'],
    ];

    $seo = [
        'title' => ($project ? $project['title'] : 'Project') . ' | Devotion Technologies - Technology Experts & Innovators',
        'description' => $project ? $project['summary'] : 'Explore our project portfolio at Devotion Technologies.',
        'keywords' => 'Devotion Technologies portfolio, ' . ($project ? strtolower($project['category_label']) : 'project'),
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');

    $icons = [
        'globe' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3c2.5 2.6 3.8 5.7 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.7-3.8-9S9.5 5.6 12 3z" /></svg>',
        'device' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="7" y="2" width="10" height="20" rx="2" /><path d="M11 18h2" /></svg>',
        'code' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 18l-6-6 6-6M15 6l6 6-6 6" /></svg>',
        'chart' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V9M11 19V4M18 19v-7" /></svg>',
    ];
    function pf_icon($icons, $key) {
        return isset($icons[$key]) ? $icons[$key] : $icons['code'];
    }

    // Related: same category, excluding current, up to 3
    $related = [];
    if ($project) {
        foreach ($portfolio as $p) {
            if ($p['slug'] !== $project['slug'] && $p['category'] === $project['category']) {
                $related[] = $p;
            }
        }
    }
?>

<!-- If Bootstrap 5 is not already loaded from elements/header.php, uncomment the line below -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<?php if ($project): $catInfo = $categoryPages[$project['category']]; ?>

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

    body { font-family: 'Poppins', sans-serif; color: #1a1f30; }
    p { margin: 0; }
    a { text-decoration: none; color: inherit; }
    ul { margin: 0; padding: 0; list-style: none; }

    .eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        font-size: 1rem; font-weight: 700; letter-spacing: .14em;
        text-transform: uppercase; color: var(--gold);
    }
    .eyebrow::before { content: "◆"; font-size: .6rem; }

    .badge-pill {
        display: inline-flex; align-items: center; gap: 8px;
        border: 1px solid var(--border); border-radius: 999px;
        padding: 8px 16px; font-size: .85rem; font-weight: 600;
        color: var(--gold-dark); background: #fff;
    }
    .badge-pill .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--gold); flex: none; }

    section { padding: 80px 0; }
    .section-head { max-width: 700px; margin-bottom: 36px; }
    .section-head h2 { font-size: clamp(1.4rem, 2.2vw, 1.9rem); font-weight: 700; color: var(--navy); margin: 12px 0 10px; }
    .section-head p { color: var(--muted); font-size: .98rem; }

    .btn {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 13px 26px; border-radius: 10px; font-size: .92rem;
        font-weight: 600; transition: all .2s ease; white-space: nowrap;
    }
    .btn-gold { background: var(--gold); color: #fff; }
    .btn-gold:hover { background: var(--gold-dark); }
    .btn-outline-light { border: 1.5px solid rgba(255,255,255,.4); color: #fff; }
    .btn-outline-light:hover { background: #fff; color: var(--navy); }

    /* BREADCRUMB */
    .breadcrumb-bar { background: #fff; border-bottom: 1px solid var(--border); padding: 16px 0; }
    .breadcrumb-bar ul { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; font-size: .84rem; color: var(--muted); }
    .breadcrumb-bar a:hover { color: var(--gold-dark); }
    .breadcrumb-bar li.current { color: var(--navy); font-weight: 600; }
    .breadcrumb-bar .sep { color: #c7cbd3; }

    /* HERO */
    .proj-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 64px 0;
    }
    .proj-hero-inner { position: relative; z-index: 1; }
    .proj-hero-meta { display: flex; align-items: center; gap: 14px; margin-bottom: 18px; flex-wrap: wrap; }
    .proj-hero-icon {
        width: 44px; height: 44px; border-radius: 12px; background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.15); color: var(--gold); display: flex; align-items: center; justify-content: center; flex: none;
    }
    .proj-hero-icon svg { width: 22px; height: 22px; }
    .proj-hero h1 { color: #fff; font-size: clamp(1.7rem, 3vw, 2.3rem); font-weight: 700; line-height: 1.25; margin: 0 0 14px; max-width: 820px; }
    .proj-hero .client-line { color: rgba(255,255,255,.65); font-size: .95rem; }
    .proj-hero .client-line strong { color: #fff; }

    .proj-stats-row { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px; }
    .proj-stat-card {
        background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.15);
        border-radius: 14px; padding: 18px 24px; min-width: 150px;
    }
    .proj-stat-card strong { display: block; font-size: 1.5rem; font-weight: 800; color: var(--gold); }
    .proj-stat-card span { font-size: .78rem; color: rgba(255,255,255,.6); }

    /* BODY */
    .body-layout { display: grid; grid-template-columns: 1fr 300px; gap: 50px; align-items: start; }
    .main-copy p.lede { font-size: 1.02rem; color: #3a3f4d; line-height: 1.8; margin-bottom: 28px !important; }

    .cc-block { margin-bottom: 30px; }
    .cc-block:last-child { margin-bottom: 0; }
    .cc-block h4 { font-size: 1.05rem; font-weight: 700; color: var(--navy); margin-bottom: 10px; display: flex; align-items: center; gap: 10px; }
    .cc-block h4 .cc-num {
        width: 28px; height: 28px; border-radius: 8px; background: var(--cream); color: var(--gold-dark);
        display: flex; align-items: center; justify-content: center; font-size: .82rem; font-weight: 800; flex: none;
    }
    .cc-block p { color: var(--muted); font-size: .96rem; line-height: 1.75; }

    .tags-row { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 30px; }
    .tags-row span {
        border: 1px solid var(--border); background: var(--cream); border-radius: 999px;
        padding: 8px 16px; font-size: .82rem; font-weight: 500; color: var(--navy);
    }

    .gallery-note {
        margin-top: 30px; background: #fbfaf7; border: 1px dashed var(--border);
        border-radius: 14px; padding: 22px; font-size: .88rem; color: var(--muted); text-align: center;
    }

    /* SIDEBAR */
    .proj-sidebar { position: sticky; top: 24px; display: flex; flex-direction: column; gap: 20px; }
    .sidebar-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 22px; }
    .sidebar-card .sc-label { font-size: .72rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--gold-dark); margin-bottom: 14px; display: block; }
    .sidebar-fact { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--border); font-size: .87rem; }
    .sidebar-fact:last-child { border-bottom: none; }
    .sidebar-fact span:first-child { color: var(--muted); }
    .sidebar-fact span:last-child { color: var(--navy); font-weight: 600; text-align: right; }

    .sidebar-cta { background: var(--navy); color: #fff; }
    .sidebar-cta h4 { font-size: .98rem; font-weight: 700; margin-bottom: 8px; }
    .sidebar-cta p { font-size: .84rem; color: rgba(255,255,255,.65); line-height: 1.6; margin-bottom: 16px !important; }
    .sidebar-cta .btn { width: 100%; }

    /* TESTIMONIAL */
    .testimonial-card {
        background: #fbfaf7; border: 1px solid var(--border); border-radius: 18px;
        padding: 36px; display: flex; gap: 22px; align-items: center;
    }
    .testimonial-card .quote-mark { font-family: Georgia, serif; font-size: 2.8rem; color: var(--gold); line-height: 1; flex: none; }
    .testimonial-card p.quote { font-size: 1.02rem; color: var(--navy); font-weight: 500; line-height: 1.65; margin-bottom: 12px !important; }
    .testimonial-card .who { font-size: .84rem; color: var(--muted); }
    .testimonial-card .who strong { color: var(--navy); }

    /* RELATED */
    .related-strip { background: var(--cream); }
    .related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .related-card { background: #fff; border: 1px solid var(--border); border-radius: 14px; padding: 22px; transition: all .25s ease; }
    .related-card:hover { transform: translateY(-4px); box-shadow: 0 18px 40px -20px rgba(10,19,48,.25); border-color: var(--gold); }
    .related-card .r-icon { width: 40px; height: 40px; border-radius: 10px; background: #f2e8d3; color: var(--gold-dark); display: flex; align-items: center; justify-content: center; margin-bottom: 14px; }
    .related-card .r-icon svg { width: 19px; height: 19px; }
    .related-card h4 { font-size: .95rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
    .related-card span { font-size: .82rem; color: var(--muted); }

    /* CTA */
    .careers {
        background: linear-gradient(135deg, var(--navy), var(--navy-soft)); border-radius: 26px;
        padding: 52px 48px; display: flex; align-items: center; justify-content: space-between;
        gap: 32px; flex-wrap: wrap; position: relative; overflow: hidden;
    }
    .careers::after { content: ""; position: absolute; right: -60px; top: -60px; width: 260px; height: 260px; border-radius: 50%; background: radial-gradient(circle, rgba(179,143,81,.35), transparent 70%); }
    .careers-copy { position: relative; z-index: 2; max-width: 560px; }
    .careers-copy h2 { color: #fff; font-size: clamp(1.4rem, 2.2vw, 1.85rem); margin: 12px 0 10px; font-weight: 700; }
    .careers-copy p { color: rgba(255,255,255,.7); font-size: .96rem; }
    .careers-actions { position: relative; z-index: 2; display: flex; gap: 14px; flex-wrap: wrap; }

    @media (max-width: 980px) {
        .body-layout { grid-template-columns: 1fr; }
        .proj-sidebar { position: static; }
        .related-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 600px) {
        .related-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="sep">/</li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li class="sep">/</li>
            <li><a href="<?php echo htmlspecialchars($catInfo['href']); ?>"><?php echo htmlspecialchars($catInfo['label']); ?></a></li>
            <li class="sep">/</li>
            <li class="current"><?php echo htmlspecialchars($project['title']); ?></li>
        </ul>
    </div>
</div>

<!-- HERO -->
<div class="proj-hero">
    <div class="container proj-hero-inner">
        <div class="proj-hero-meta">
            <div class="proj-hero-icon"><?php echo pf_icon($icons, $project['icon']); ?></div>
            <span class="eyebrow" style="font-size:.82rem;"><?php echo htmlspecialchars($project['category_label']); ?></span>
        </div>
        <h1><?php echo htmlspecialchars($project['title']); ?></h1>
        <p class="client-line">For <strong><?php echo htmlspecialchars($project['client']); ?></strong> &middot; <?php echo htmlspecialchars($project['year']); ?> &middot; <?php echo htmlspecialchars($project['duration']); ?></p>

        <div class="proj-stats-row">
            <?php foreach ($project['stats'] as $stat): ?>
                <div class="proj-stat-card">
                    <strong><?php echo htmlspecialchars($stat['value']); ?></strong>
                    <span><?php echo htmlspecialchars($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- CASE STUDY BODY -->
<section>
    <div class="container">
        <div class="body-layout">
            <div class="main-copy">
                <p class="lede"><?php echo htmlspecialchars($project['summary']); ?></p>

                <div class="cc-block">
                    <h4><span class="cc-num">01</span> Overview</h4>
                    <p><?php echo htmlspecialchars($project['overview']); ?></p>
                </div>
                <div class="cc-block">
                    <h4><span class="cc-num">02</span> The Challenge</h4>
                    <p><?php echo htmlspecialchars($project['challenge']); ?></p>
                </div>
                <div class="cc-block">
                    <h4><span class="cc-num">03</span> The Solution</h4>
                    <p><?php echo htmlspecialchars($project['solution']); ?></p>
                </div>

                <div class="tags-row">
                    <?php foreach ($project['tags'] as $tag): ?>
                        <span><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="gallery-note">
                    <?php echo htmlspecialchars($project['gallery_note']); ?> — screenshots available on request under client NDA.
                </div>
            </div>

            <aside class="proj-sidebar">
                <div class="sidebar-card">
                    <span class="sc-label">Project Facts</span>
                    <div class="sidebar-fact"><span>Client</span><span><?php echo htmlspecialchars($project['client']); ?></span></div>
                    <div class="sidebar-fact"><span>Category</span><span><?php echo htmlspecialchars($project['category_label']); ?></span></div>
                    <div class="sidebar-fact"><span>Year</span><span><?php echo htmlspecialchars($project['year']); ?></span></div>
                    <div class="sidebar-fact"><span>Duration</span><span><?php echo htmlspecialchars($project['duration']); ?></span></div>
                </div>
                <div class="sidebar-card sidebar-cta">
                    <h4>Have a similar project?</h4>
                    <p>Tell us what you're building and we'll tell you honestly whether we're the right fit.</p>
                    <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- TESTIMONIAL -->
<section style="padding-top:0;">
    <div class="container">
        <div class="testimonial-card">
            <span class="quote-mark">&ldquo;</span>
            <div>
                <p class="quote"><?php echo htmlspecialchars($project['testimonial']['quote']); ?></p>
                <span class="who"><strong><?php echo htmlspecialchars($project['testimonial']['author']); ?></strong> &middot; <?php echo htmlspecialchars($project['testimonial']['role']); ?></span>
            </div>
        </div>
    </div>
</section>

<?php if (count($related) > 0): ?>
<!-- RELATED PROJECTS -->
<section class="related-strip">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> More Like This</div>
            <h2>Other <?php echo htmlspecialchars(strtolower($catInfo['label'])); ?> we've delivered</h2>
        </div>
        <div class="related-grid">
            <?php $c = 0; foreach ($related as $rel): if ($c >= 3) break; $c++; ?>
                <a href="project-detail.php?slug=<?php echo urlencode($rel['slug']); ?>" class="related-card">
                    <div class="r-icon"><?php echo pf_icon($icons, $rel['icon']); ?></div>
                    <h4><?php echo htmlspecialchars($rel['title']); ?></h4>
                    <span><?php echo htmlspecialchars($rel['client']); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Ready When You Are</span>
            <h2>Let's build something worth writing a case study about</h2>
            <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
        </div>
        <div class="careers-actions">
            <a href="#" class="btn btn-gold">Book A Discovery Call</a>
            <a href="<?php echo htmlspecialchars($catInfo['href']); ?>" class="btn btn-outline-light">View All <?php echo htmlspecialchars($catInfo['label']); ?></a>
        </div>
    </div>
</section>

<?php else: ?>

<div class="container" style="padding:100px 24px;text-align:center;">
    <h1 style="font-size:1.8rem;font-weight:700;color:var(--navy);margin-bottom:12px;">Project not found</h1>
    <p style="color:var(--muted);margin-bottom:24px;">We couldn't find that project. It may have been renamed or removed.</p>
    <a href="portfolio.php" class="btn btn-gold">Browse Our Portfolio</a>
</div>

<?php endif; ?>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>
