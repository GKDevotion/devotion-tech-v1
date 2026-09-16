<?php
    $seo = [
        'title' => 'Sales & Marketing Solutions | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'POS, PIM, CMS, CDP, ESP, CRM, HRMS, Forex CRM and SaaS management systems Devotion Technologies builds and integrates around a unified customer data platform.',
        'keywords' => 'CRM development, POS systems, CDP platform, email automation, HRMS, forex CRM, SaaS billing management',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');

    $smPath = __DIR__ . '/data/sales-marketing.json';
    $tools = [];
    if (file_exists($smPath)) {
        $json = file_get_contents($smPath);
        $decoded = json_decode($json, true);
        if (is_array($decoded)) {
            $tools = $decoded;
        }
    }

    $smIcons = [
        'hub'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3.2" /><path d="M12 4v3.3M12 16.7V20M20 12h-3.3M7.3 12H4M17 7l-2.3 2.3M9.3 14.7L7 17M17 17l-2.3-2.3M9.3 9.3L7 7" /></svg>',
        'pos'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="12" rx="1.6" /><path d="M8 20h8M9 16v4M15 16v4" /><path d="M7 8h4v3H7z" /></svg>',
        'tag'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12.5 3H5a2 2 0 00-2 2v7.5a2 2 0 00.6 1.4l8.5 8.5a2 2 0 002.8 0l6-6a2 2 0 000-2.8l-8.4-8.4a2 2 0 00-1-.6z" /><circle cx="8" cy="8" r="1.3" /></svg>',
        'layout' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3.5" width="18" height="17" rx="2" /><path d="M3 8.5h18M9 8.5V20.5" /></svg>',
        'mail'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3.5 6.5L12 13l8.5-6.5" /></svg>',
        'users'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="8" r="3.2" /><path d="M2.5 20c0-3.5 3-6 6.5-6s6.5 2.5 6.5 6" /><circle cx="17.5" cy="8.5" r="2.4" /><path d="M15.8 14.2c2.7.3 4.7 2.4 4.7 5.3" /></svg>',
        'idcard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="5" width="19" height="14" rx="2" /><circle cx="8.5" cy="11" r="2.1" /><path d="M5.5 16.5c.6-1.7 1.9-2.6 3-2.6s2.4.9 3 2.6M14.5 9.5h5M14.5 13h5" /></svg>',
        'coins'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><ellipse cx="9" cy="7" rx="6" ry="3" /><path d="M3 7v10a6 3 0 0012 0V7" /><path d="M21 11.5a6 3 0 01-6 2.9M21 15.5a6 3 0 01-6 2.9" /><path d="M15 8v10" /></svg>',
        'cloud'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 18a4.5 4.5 0 01-1-8.9A5.5 5.5 0 0116.9 8.1 4 4 0 0117 16H7z" /></svg>',
    ];
    function sm_icon($icons, $key) {
        return isset($icons[$key]) ? $icons[$key] : $icons['hub'];
    }

    // Split hub (CDP) from the 8 satellites
    $hub = null;
    $satellites = [];
    foreach ($tools as $t) {
        if ($t['slug'] === 'cdp') {
            $hub = $t;
        } else {
            $satellites[] = $t;
        }
    }

    // Compute radial positions for the satellites (percent of container, centered)
    $satCount = count($satellites);
    $radius = 40; // percent
    $positions = [];
    foreach ($satellites as $i => $t) {
        $angleDeg = ($i * (360 / max($satCount, 1))) - 90; // start at top, go clockwise
        $angleRad = deg2rad($angleDeg);
        $x = 50 + $radius * cos($angleRad);
        $y = 50 + $radius * sin($angleRad);
        $positions[] = ['x' => round($x, 2), 'y' => round($y, 2), 'tool' => $t];
    }
?>
 
<style>
    :root {
        --gold: #b38f51; --gold-dark: #8f7040; --navy: #070d24; --navy-soft: #152a58;
        --border: #e8e3d6; --muted: #6c7280; --cream: #f7f4ee;
    } 
    a { text-decoration: none; color: inherit; }
    ul { margin: 0; padding: 0; list-style: none; }
 
    section { padding: 90px 0; }
    .section-head { max-width: 700px; margin: 0 auto 20px; text-align: center; }
    .section-head h2 { font-size: clamp(1.6rem, 2.6vw, 2.1rem); font-weight: 700; color: var(--navy); margin: 12px 0 10px; }
    .section-head p { color: var(--muted); font-size: 1rem; }

    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 13px 26px; border-radius: 10px; font-size: .92rem; font-weight: 600; transition: all .2s ease; white-space: nowrap; }
    .btn-gold { background: var(--gold); color: #fff; }
    .btn-gold:hover { background: var(--gold-dark); }
    .btn-outline-light { border: 1.5px solid rgba(255,255,255,.4); color: #fff; }
    .btn-outline-light:hover { background: #fff; color: var(--navy); }
    .btn-outline-dark { border: 1.5px solid var(--border); color: var(--navy); }
    .btn-outline-dark:hover { border-color: var(--gold); color: var(--gold-dark); }

    /* HERO */
    .sm-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 84px 0 70px; text-align: center;
    }
    .sm-hero h1 { color: #fff; font-size: clamp(2rem, 3.4vw, 2.6rem); font-weight: 700; margin: 14px auto; max-width: 780px; line-height: 1.25; }
    .sm-hero p { color: rgba(255,255,255,.7); max-width: 640px; margin: 0 auto; font-size: 1rem; line-height: 1.7; }

    /* HUB WHEEL (desktop) */
    .wheel-section { background: var(--cream); }
    .wheel-container {
        position: relative;
        width: 100%;
        max-width: 680px;
        aspect-ratio: 1 / 1;
        margin: 0 auto;
    }
    .wheel-ring {
        position: absolute;
        inset: 8%;
        border: 2px dashed var(--border);
        border-radius: 50%;
    }
    .wheel-hub {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 26%; aspect-ratio: 1/1;
        border-radius: 50%;
        background: linear-gradient(150deg, var(--navy), var(--navy-soft));
        border: 3px solid var(--gold);
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        text-align: center; color: #fff; z-index: 3;
        box-shadow: 0 24px 50px -20px rgba(10,19,48,.4);
        padding: 8%;
    }
    .wheel-hub .wh-icon { color: var(--gold); margin-bottom: 6px; }
    .wheel-hub .wh-icon svg { width: 26%; height: auto; min-width: 22px; }
    .wheel-hub strong { font-size: clamp(.78rem, 1.6vw, .95rem); font-weight: 800; }
    .wheel-hub span { font-size: clamp(.55rem, 1.1vw, .68rem); color: rgba(255,255,255,.65); line-height: 1.3; }

    .wheel-node {
        position: absolute;
        transform: translate(-50%, -50%);
        width: 18%; aspect-ratio: 1/1;
        border-radius: 50%;
        background: #fff;
        border: 2px solid var(--border);
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        text-align: center; z-index: 2; padding: 6%;
        transition: all .25s ease;
        box-shadow: 0 14px 30px -18px rgba(10,19,48,.25);
    }
    .wheel-node:hover {
        border-color: var(--gold);
        background: var(--navy);
        transform: translate(-50%, -50%) scale(1.08);
    }
    .wheel-node .wn-icon { color: var(--gold-dark); margin-bottom: 4px; transition: color .25s ease; }
    .wheel-node .wn-icon svg { width: 34%; height: auto; min-width: 16px; }
    .wheel-node:hover .wn-icon { color: var(--gold); }
    .wheel-node strong { font-size: clamp(.62rem, 1.3vw, .8rem); font-weight: 800; color: var(--navy); transition: color .25s ease; }
    .wheel-node:hover strong { color: #fff; }

    @media (max-width: 780px) {
        .wheel-desktop { display: none; }
    }
    @media (min-width: 781px) {
        .wheel-mobile { display: none; }
    }

    /* MOBILE FALLBACK LIST */
    .wheel-mobile { display: flex; flex-direction: column; gap: 14px; max-width: 560px; margin: 0 auto; }
    .wm-hub-card, .wm-card {
        display: flex; align-items: center; gap: 16px; background: #fff;
        border: 1px solid var(--border); border-radius: 14px; padding: 18px 20px;
    }
    .wm-hub-card { background: var(--navy); border-color: var(--navy); }
    .wm-hub-card strong, .wm-card strong { display: block; font-size: .95rem; color: var(--navy); }
    .wm-hub-card strong { color: #fff; }
    .wm-hub-card span, .wm-card span { font-size: .8rem; color: var(--muted); }
    .wm-hub-card span { color: rgba(255,255,255,.65); }
    .wm-icon-box {
        width: 44px; height: 44px; border-radius: 12px; background: var(--cream);
        color: var(--gold-dark); display: flex; align-items: center; justify-content: center; flex: none;
    }
    .wm-hub-card .wm-icon-box { background: rgba(255,255,255,.1); color: var(--gold); }
    .wm-icon-box svg { width: 20px; height: 20px; }

    .wheel-legend { text-align: center; margin-top: 40px; color: var(--muted); font-size: .88rem; }

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
</style>

<!-- HERO -->
<section class="sm-hero">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold);">Sales &amp; Marketing</span>
        <h1>Nine tools, one customer profile at the center</h1>
        <p>POS, CMS, CRM and the rest don't need to be nine disconnected systems. Built around a shared customer data platform, every tool below reads from — and writes back to — the same customer profile.</p>
    </div>
</section>

<!-- HUB WHEEL -->
<section class="wheel-section">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> The Customer Data Hub</div>
            <h2>CDP at the center, everything else orbiting it</h2>
            <p>Click the hub or any tool around it to see the full breakdown.</p>
        </div>

        <!-- Desktop radial wheel -->
        <div class="wheel-desktop">
            <div class="wheel-container">
                <div class="wheel-ring"></div>

                <?php if ($hub): ?>
                    <a href="sales-marketing-detail.php?slug=<?php echo urlencode($hub['slug']); ?>" class="wheel-hub">
                        <span class="wh-icon"><?php echo sm_icon($smIcons, $hub['icon']); ?></span>
                        <strong><?php echo htmlspecialchars($hub['abbr']); ?></strong>
                        <span><?php echo htmlspecialchars($hub['title']); ?></span>
                    </a>
                <?php endif; ?>

                <?php foreach ($positions as $p): ?>
                    <a href="sales-marketing-detail.php?slug=<?php echo urlencode($p['tool']['slug']); ?>"
                       class="wheel-node"
                       style="left:<?php echo $p['x']; ?>%; top:<?php echo $p['y']; ?>%;">
                        <span class="wn-icon"><?php echo sm_icon($smIcons, $p['tool']['icon']); ?></span>
                        <strong><?php echo htmlspecialchars($p['tool']['abbr']); ?></strong>
                    </a>
                <?php endforeach; ?>
            </div>
            <p class="wheel-legend">Every satellite tool integrates with the CDP at center — data flows both ways, not just in.</p>
        </div>

        <!-- Mobile fallback list -->
        <div class="wheel-mobile">
            <?php if ($hub): ?>
                <a href="sales-marketing-detail.php?slug=<?php echo urlencode($hub['slug']); ?>" class="wm-hub-card">
                    <span class="wm-icon-box"><?php echo sm_icon($smIcons, $hub['icon']); ?></span>
                    <div>
                        <strong><?php echo htmlspecialchars($hub['abbr']); ?> — <?php echo htmlspecialchars($hub['title']); ?></strong>
                        <span>The hub — unifies data for every tool below</span>
                    </div>
                </a>
            <?php endif; ?>
            <?php foreach ($satellites as $t): ?>
                <a href="sales-marketing-detail.php?slug=<?php echo urlencode($t['slug']); ?>" class="wm-card">
                    <span class="wm-icon-box"><?php echo sm_icon($smIcons, $t['icon']); ?></span>
                    <div>
                        <strong><?php echo htmlspecialchars($t['abbr']); ?> — <?php echo htmlspecialchars($t['title']); ?></strong>
                        <span><?php echo htmlspecialchars($t['tagline']); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Running Disconnected Tools?</span>
            <h2>Tell us what you're using now — we'll show you what connecting it looks like</h2>
            <p>Book a discovery call and we'll tell you honestly which piece to start with, and whether a full CDP is even necessary yet.</p>
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
