<?php
    $finPath = __DIR__ . '/data/finance-analytics.json';
    $systems = [];
    if (file_exists($finPath)) {
        $json = file_get_contents($finPath);
        $decoded = json_decode($json, true);
        if (is_array($decoded)) {
            $systems = $decoded;
        }
    }

    $slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
    $system = null;
    foreach ($systems as $s) {
        if ($s['slug'] === $slug) {
            $system = $s;
            break;
        }
    }
    if (!$system && count($systems) > 0) {
        $system = $systems[0];
    }

    $seo = [
        'title' => ($system ? $system['title'] . ' (' . $system['abbr'] . ')' : 'Finance & Analytics') . ' | Devotion Technologies - Technology Experts & Innovators',
        'description' => $system ? $system['tagline'] : 'Finance and analytics systems built by Devotion Technologies.',
        'keywords' => 'Devotion Technologies ' . ($system ? strtolower($system['abbr']) : 'finance') . ', finance software, analytics systems',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');

    $finIcons = [
        'bank'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9.5L12 4l9 5.5" /><path d="M4.5 9.5V19M9 9.5V19M15 9.5V19M19.5 9.5V19" /><path d="M3 19h18" /></svg>',
        'chart'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V10M9.5 19V5M15 19v-7M20 19V9" /><path d="M3 19h18" /></svg>',
        'invoice' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="5" y="3.5" width="14" height="17" rx="1.6" /><path d="M8.5 8.5h7M8.5 12h7M8.5 15.5h4" /></svg>',
        'card'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="6" width="19" height="13" rx="2" /><path d="M2.5 10.5h19" /><path d="M6 15h4" /></svg>',
    ];
    function fin_icon($icons, $key) {
        return isset($icons[$key]) ? $icons[$key] : $icons['chart'];
    }

    $otherSystems = array_values(array_filter($systems, function ($s) use ($system) {
        return !$system || $s['slug'] !== $system['slug'];
    }));
?>
 
<?php if ($system): ?>

<style>
    :root {
        --gold: #b38f51; --gold-dark: #8f7040; --navy: #070d24; --navy-soft: #152a58;
        --border: #e8e3d6; --muted: #6c7280; --cream: #f7f4ee;
    } 
    a { text-decoration: none; color: inherit; }
    ul { margin: 0; padding: 0; list-style: none; }
 
    section { padding: 80px 0; }
    .section-head { max-width: 700px; margin-bottom: 36px; }
    .section-head h2 { font-size: clamp(1.4rem, 2.2vw, 1.9rem); font-weight: 700; color: var(--navy); margin: 12px 0 10px; }
    .section-head p { color: var(--muted); font-size: .98rem; }

    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 13px 26px; border-radius: 10px; font-size: .92rem; font-weight: 600; transition: all .2s ease; white-space: nowrap; }
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
    .sys-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 56px 0;
    }
    .sys-hero-inner { position: relative; z-index: 1; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 28px; }
    .sys-hero-main { display: flex; align-items: center; gap: 24px; min-width: 0; }
    .sys-hero-icon {
        width: 68px; height: 68px; border-radius: 18px; background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.15); color: var(--gold); display: flex; align-items: center; justify-content: center; flex: none;
    }
    .sys-hero-icon svg { width: 32px; height: 32px; }
    .sys-hero-text { display: flex; flex-direction: column; gap: 6px; min-width: 0; }
    .sys-hero h1 { color: #fff; font-size: clamp(1.5rem, 2.6vw, 2.1rem); font-weight: 700; line-height: 1.25; margin: 0; }
    .sys-hero p.tagline { color: rgba(255,255,255,.68); font-size: .98rem; line-height: 1.5; max-width: 560px; margin: 0; }
    .sys-hero-stat { flex: none; text-align: center; border-left: 1px solid rgba(255,255,255,.15); padding-left: 28px; }
    .sys-hero-stat strong { display: block; font-size: 2rem; font-weight: 800; color: var(--gold); line-height: 1.1; }
    .sys-hero-stat span { font-size: .78rem; color: rgba(255,255,255,.6); }

    @media (max-width: 700px) {
        .sys-hero-stat { border-left: none; border-top: 1px solid rgba(255,255,255,.15); padding-left: 0; padding-top: 18px; width: 100%; text-align: left; }
    }

    /* BODY LAYOUT */
    .body-layout { display: grid; grid-template-columns: 1fr 300px; gap: 50px; align-items: start; }
    .main-copy p.lede { font-size: 1.02rem; color: #3a3f4d; line-height: 1.8; margin-bottom: 30px !important; }

    /* FEATURE CHECKLIST */
    .feature-list { display: flex; flex-direction: column; gap: 12px; }
    .feature-item {
        display: flex; align-items: center; gap: 14px; background: #fbfaf7;
        border: 1px solid var(--border); border-radius: 12px; padding: 16px 18px;
    }
    .feature-item .fi-check {
        width: 26px; height: 26px; border-radius: 50%; background: var(--navy); color: #fff;
        display: flex; align-items: center; justify-content: center; flex: none;
    }
    .feature-item .fi-check svg { width: 13px; height: 13px; }
    .feature-item span.fi-text { font-size: .93rem; color: var(--navy); font-weight: 500; }

    /* INTEGRATIONS */
    .integration-chips { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; }
    .integration-chips span {
        border: 1px solid var(--border); background: var(--cream); border-radius: 999px;
        padding: 8px 16px; font-size: .84rem; font-weight: 500; color: var(--navy);
    }

    /* SIDEBAR */
    .sys-sidebar { position: sticky; top: 24px; display: flex; flex-direction: column; gap: 20px; }
    .sidebar-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 22px; }
    .sidebar-card .sc-label { font-size: .72rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--gold-dark); margin-bottom: 14px; display: block; }
    .sidebar-nav li { margin-bottom: 3px; }
    .sidebar-nav a { display: flex; align-items: center; gap: 10px; padding: 10px 10px; border-radius: 8px; font-size: .87rem; color: var(--muted); transition: all .2s ease; }
    .sidebar-nav a:hover { background: var(--cream); color: var(--navy); }
    .sidebar-cta { background: var(--navy); color: #fff; }
    .sidebar-cta h4 { font-size: .98rem; font-weight: 700; margin-bottom: 8px; }
    .sidebar-cta p { font-size: .84rem; color: rgba(255,255,255,.65); line-height: 1.6; margin-bottom: 16px !important; }
    .sidebar-cta .btn { width: 100%; }

    /* BENEFITS */
    .benefit-section { background: var(--cream); }
    .benefit-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
    .benefit-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 26px; }
    .benefit-card .b-num { display: inline-flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 10px; background: var(--cream); color: var(--gold-dark); font-weight: 800; font-size: .85rem; margin-bottom: 16px; }
    .benefit-card h4 { font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .benefit-card p { color: var(--muted); font-size: .9rem; line-height: 1.6; }

    /* PROCESS TIMELINE */
    .timeline { position: relative; max-width: 760px; }
    .timeline::before { content: ""; position: absolute; left: 23px; top: 6px; bottom: 6px; width: 2px; background: var(--border); }
    .timeline-item { position: relative; display: flex; gap: 22px; padding-bottom: 32px; }
    .timeline-item:last-child { padding-bottom: 0; }
    .timeline-num { flex: none; width: 48px; height: 48px; border-radius: 50%; background: #fff; border: 2px solid var(--gold); color: var(--gold-dark); font-weight: 800; font-size: .9rem; display: flex; align-items: center; justify-content: center; position: relative; z-index: 2; }
    .timeline-body { background: #fff; border: 1px solid var(--border); border-radius: 14px; padding: 18px 22px; flex: 1; }
    .timeline-body h4 { font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 5px; }
    .timeline-body p { color: var(--muted); font-size: .92rem; line-height: 1.6; }

    /* TESTIMONIAL */
    .testimonial-card { background: #fbfaf7; border: 1px solid var(--border); border-radius: 18px; padding: 36px; display: flex; gap: 22px; align-items: center; }
    .testimonial-card .quote-mark { font-family: Georgia, serif; font-size: 2.8rem; color: var(--gold); line-height: 1; flex: none; }
    .testimonial-card p.quote { font-size: 1.02rem; color: var(--navy); font-weight: 500; line-height: 1.65; margin-bottom: 12px !important; }
    .testimonial-card .who { font-size: .84rem; color: var(--muted); }
    .testimonial-card .who strong { color: var(--navy); }

    /* FAQ */
    .faq-item { background: #fff; border: 1px solid var(--border); border-radius: 14px; overflow: hidden; margin-bottom: 12px; }
    .faq-q { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 22px; cursor: pointer; font-size: .96rem; font-weight: 600; color: var(--navy); }
    .faq-q .plus { width: 24px; height: 24px; border-radius: 50%; background: var(--cream); color: var(--gold-dark); display: flex; align-items: center; justify-content: center; flex: none; transition: transform .25s ease, background .25s ease; }
    .faq-q .plus svg { width: 13px; height: 13px; }
    .faq-item.open .faq-q .plus { background: var(--gold); color: #fff; transform: rotate(45deg); }
    .faq-a { max-height: 0; overflow: hidden; transition: max-height .3s ease; }
    .faq-a p { padding: 0 22px 20px; color: var(--muted); font-size: .92rem; line-height: 1.7; }

    /* RELATED SYSTEMS */
    .related-systems { background: var(--cream); }
    .related-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
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
        .sys-sidebar { position: static; }
        .benefit-grid { grid-template-columns: 1fr 1fr; }
        .related-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 600px) {
        .benefit-grid { grid-template-columns: 1fr; }
        .related-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="sep">/</li> 
            <li><a href="finance-analytics.php">Finance &amp; Analytics</a></li>
            <li class="sep">/</li>
            <li class="current"><?php echo htmlspecialchars($system['abbr']); ?></li>
        </ul>
    </div>
</div>

<!-- HERO -->
<div class="sys-hero">
    <div class="container">
        <div class="sys-hero-inner">
            <div class="sys-hero-main">
                <div class="sys-hero-icon"><?php echo fin_icon($finIcons, $system['icon']); ?></div>
                <div class="sys-hero-text">
                    <span class="eyebrow"><?php echo htmlspecialchars($system['abbr']); ?></span>
                    <h1><?php echo htmlspecialchars($system['title']); ?></h1>
                    <p class="tagline"><?php echo htmlspecialchars($system['tagline']); ?></p>
                </div>
            </div>
            <div class="sys-hero-stat">
                <strong><?php echo htmlspecialchars($system['cover_stat']['value']); ?></strong>
                <span><?php echo htmlspecialchars($system['cover_stat']['label']); ?></span>
            </div>
        </div>
    </div>
</div>

<!-- OVERVIEW + FEATURES + SIDEBAR -->
<section>
    <div class="container">
        <div class="body-layout">
            <div class="main-copy">
                <p class="lede"><?php echo htmlspecialchars($system['overview']); ?></p>

                <div class="section-head" style="margin-bottom:20px;">
                    <div class="badge-pill mb-3"><span class="dot"></span> What's Included</div>
                    <h2>What you get with <?php echo htmlspecialchars($system['abbr']); ?></h2>
                </div>
                <div class="feature-list">
                    <?php foreach ($system['features'] as $f): ?>
                        <div class="feature-item">
                            <span class="fi-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M5 13l4 4L19 7" /></svg></span>
                            <span class="fi-text"><?php echo htmlspecialchars($f); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="section-head" style="margin-top:40px;margin-bottom:6px;">
                    <div class="badge-pill mb-3"><span class="dot"></span> Integrates With</div>
                </div>
                <div class="integration-chips">
                    <?php foreach ($system['integrations'] as $intg): ?>
                        <span><?php echo htmlspecialchars($intg); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <aside class="sys-sidebar">
                <div class="sidebar-card">
                    <span class="sc-label">All Systems</span>
                    <ul class="sidebar-nav">
                        <?php foreach ($systems as $s): ?>
                            <li>
                                <a href="finance-analytics-detail.php?slug=<?php echo urlencode($s['slug']); ?>"
                                   style="<?php echo $s['slug'] === $system['slug'] ? 'background:var(--cream);color:var(--navy);font-weight:600;' : ''; ?>">
                                    <?php echo htmlspecialchars($s['abbr']); ?> &mdash; <?php echo htmlspecialchars($s['title']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="sidebar-card sidebar-cta">
                    <h4>Ready to start?</h4>
                    <p>Tell us about your finance stack and we'll follow up with next steps within one business day.</p>
                    <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- BENEFITS -->
<section class="benefit-section">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> Why It Matters</div>
            <h2>What changes once <?php echo htmlspecialchars($system['abbr']); ?> is running</h2>
        </div>
        <div class="benefit-grid">
            <?php foreach ($system['benefits'] as $i => $b): ?>
                <div class="benefit-card">
                    <span class="b-num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
                    <h4><?php echo htmlspecialchars($b['title']); ?></h4>
                    <p><?php echo htmlspecialchars($b['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section>
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> How We Roll It Out</div>
            <h2>Implementation process</h2>
            <p>The same disciplined rollout applies whether this is a standalone system or part of the full finance stack.</p>
        </div>
        <div class="timeline">
            <?php foreach ($system['process'] as $i => $step): ?>
                <div class="timeline-item">
                    <div class="timeline-num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></div>
                    <div class="timeline-body">
                        <h4><?php echo htmlspecialchars($step['title']); ?></h4>
                        <p><?php echo htmlspecialchars($step['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- TESTIMONIAL -->
<section style="padding-top:0;">
    <div class="container">
        <div class="testimonial-card">
            <span class="quote-mark">&ldquo;</span>
            <div>
                <p class="quote"><?php echo htmlspecialchars($system['testimonial']['quote']); ?></p>
                <span class="who"><strong><?php echo htmlspecialchars($system['testimonial']['author']); ?></strong> &middot; <?php echo htmlspecialchars($system['testimonial']['role']); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section style="padding-top:0;">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> Common Questions</div>
            <h2>Frequently asked about <?php echo htmlspecialchars($system['abbr']); ?></h2>
        </div>
        <div id="faqList" style="max-width:800px;">
            <?php foreach ($system['faqs'] as $i => $faq): ?>
                <div class="faq-item <?php echo $i === 0 ? 'open' : ''; ?>">
                    <div class="faq-q">
                        <span><?php echo htmlspecialchars($faq['q']); ?></span>
                        <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M12 5v14M5 12h14" /></svg></span>
                    </div>
                    <div class="faq-a">
                        <p><?php echo htmlspecialchars($faq['a']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- RELATED SYSTEMS -->
<section class="related-systems">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> Pairs Well With</div>
            <h2>Other systems in the finance stack</h2>
        </div>
        <div class="related-grid">
            <?php foreach ($otherSystems as $rel): ?>
                <a href="finance-analytics-detail.php?slug=<?php echo urlencode($rel['slug']); ?>" class="related-card">
                    <div class="r-icon"><?php echo fin_icon($finIcons, $rel['icon']); ?></div>
                    <h4><?php echo htmlspecialchars($rel['abbr']); ?></h4>
                    <span><?php echo htmlspecialchars($rel['title']); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Ready When You Are</span>
            <h2>Let's talk about your <?php echo htmlspecialchars($system['abbr']); ?> setup</h2>
            <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
        </div>
        <div class="careers-actions">
            <a href="#" class="btn btn-gold">Book A Discovery Call</a>
            <a href="finance-analytics.php" class="btn btn-outline-light">View All Systems</a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var items = document.querySelectorAll('#faqList .faq-item');

        function setHeight(item, open) {
            var answer = item.querySelector('.faq-a');
            answer.style.maxHeight = open ? answer.scrollHeight + 'px' : 0;
        }

        items.forEach(function (item) {
            setHeight(item, item.classList.contains('open'));
            item.querySelector('.faq-q').addEventListener('click', function () {
                var isOpen = item.classList.contains('open');
                items.forEach(function (i) { i.classList.remove('open'); setHeight(i, false); });
                if (!isOpen) { item.classList.add('open'); setHeight(item, true); }
            });
        });
    });
</script>

<?php else: ?>

<div class="container" style="padding:100px 24px;text-align:center;">
    <h1 style="font-size:1.8rem;font-weight:700;color:var(--navy);margin-bottom:12px;">System not found</h1>
    <p style="color:var(--muted);margin-bottom:24px;">We couldn't find that system. It may have been renamed or removed.</p>
    <a href="finance-analytics.php" class="btn btn-gold">Browse Finance &amp; Analytics</a>
</div>

<?php endif; ?>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>
