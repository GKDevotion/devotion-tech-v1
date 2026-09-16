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
    function fin_icon($icons, $key) {
        return isset($icons[$key]) ? $icons[$key] : $icons['chart'];
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
    .section-head { max-width: 700px; margin: 0 auto 54px; text-align: center; }
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
    .fin-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 84px 0 70px; text-align: center;
    }
    .fin-hero h1 { color: #fff; font-size: clamp(2rem, 3.4vw, 2.6rem); font-weight: 700; margin: 14px auto; max-width: 780px; line-height: 1.25; }
    .fin-hero p { color: rgba(255,255,255,.7); max-width: 640px; margin: 0 auto; font-size: 1rem; line-height: 1.7; }

    /* PIPELINE FLOW */
    .pipeline-wrap { position: relative; padding-top: 20px; }

    .pipeline-track {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        position: relative;
        gap: 0;
    }

    .pipeline-connector {
        position: absolute;
        top: 44px;
        left: 44px;
        right: 44px;
        height: 2px;
        background: repeating-linear-gradient(90deg, var(--gold) 0 8px, transparent 8px 16px);
        z-index: 0;
    }

    .pipeline-node {
        position: relative;
        z-index: 1;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 0 10px;
    }

    .pipeline-node .pn-circle {
        width: 88px;
        height: 88px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid var(--gold);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gold-dark);
        margin-bottom: 18px;
        transition: all .25s ease;
        box-shadow: 0 14px 30px -18px rgba(10,19,48,.3);
    }

    .pipeline-node .pn-circle svg { width: 36px; height: 36px; }

    .pipeline-node:hover .pn-circle {
        background: var(--gold);
        color: #fff;
        transform: translateY(-4px);
    }

    .pipeline-node .pn-abbr { font-size: 1.15rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
    .pipeline-node .pn-title { font-size: .82rem; color: var(--muted); line-height: 1.4; max-width: 150px; }

    @media (max-width: 900px) {
        .pipeline-track { flex-direction: column; align-items: stretch; gap: 26px; }
        .pipeline-connector { display: none; }
        .pipeline-node { flex-direction: row; text-align: left; gap: 18px; padding: 0; }
        .pipeline-node .pn-circle { margin-bottom: 0; flex: none; }
        .pipeline-node .pn-title { max-width: none; }
    }

    /* SYSTEM DETAIL CARDS */
    .system-cards { display: flex; flex-direction: column; gap: 22px; margin-top: 70px; }

    .system-card {
        display: grid;
        grid-template-columns: 100px 1fr 200px;
        gap: 26px;
        align-items: center;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 28px 30px;
        transition: border-color .25s ease, box-shadow .25s ease;
    }
    .system-card:hover { border-color: var(--gold); box-shadow: 0 24px 55px -30px rgba(10,19,48,.25); }

    .sc-icon {
        width: 68px; height: 68px; border-radius: 16px; background: var(--cream);
        border: 1px solid var(--border); color: var(--gold-dark);
        display: flex; align-items: center; justify-content: center;
    }
    .sc-icon svg { width: 30px; height: 30px; }

    .sc-body .sc-abbr { font-size: .78rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: .06em; display: block; margin-bottom: 4px; }
    .sc-body h3 { font-size: 1.2rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
    .sc-body p { color: var(--muted); font-size: .92rem; line-height: 1.6; }

    .sc-stat { text-align: center; border-left: 1px solid var(--border); padding-left: 22px; }
    .sc-stat strong { display: block; font-size: 1.35rem; font-weight: 800; color: var(--gold-dark); }
    .sc-stat span { font-size: .74rem; color: var(--muted); display: block; margin-bottom: 14px; }

    @media (max-width: 780px) {
        .system-card { grid-template-columns: 1fr; text-align: center; }
        .sc-stat { border-left: none; border-top: 1px solid var(--border); padding-left: 0; padding-top: 18px; }
    }

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
<section class="fin-hero">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold);">Finance &amp; Analytics</span>
        <h1>Four systems, one connected finance layer</h1>
        <p>Resource planning, reporting, billing and payments don't work as isolated tools — they work as a layer underneath everything else you run. Here's how each piece connects to the next, and what each one solves on its own.</p>
    </div>
</section>

<!-- PIPELINE FLOW -->
<section>
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> The Finance Stack</div>
            <h2>From transaction to insight</h2>
            <p>Each system below hands off to the next — click any node to jump to the full breakdown.</p>
        </div>

        <div class="pipeline-wrap">
            <div class="pipeline-track">
                <div class="pipeline-connector"></div>
                <?php foreach ($systems as $s): ?>
                    <a href="finance-analytics-detail.php?slug=<?php echo urlencode($s['slug']); ?>" class="pipeline-node">
                        <div class="pn-circle"><?php echo fin_icon($finIcons, $s['icon']); ?></div>
                        <span class="pn-abbr"><?php echo htmlspecialchars($s['abbr']); ?></span>
                        <span class="pn-title"><?php echo htmlspecialchars($s['title']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SYSTEM DETAIL CARDS -->
        <div class="system-cards">
            <?php foreach ($systems as $s): ?>
                <div class="system-card">
                    <div class="sc-icon"><?php echo fin_icon($finIcons, $s['icon']); ?></div>
                    <div class="sc-body">
                        <span class="sc-abbr"><?php echo htmlspecialchars($s['abbr']); ?> &middot; <?php echo htmlspecialchars($s['title']); ?></span>
                        <h3><?php echo htmlspecialchars($s['tagline']); ?></h3>
                        <p><?php echo htmlspecialchars($s['overview']); ?></p>
                    </div>
                    <div class="sc-stat">
                        <strong><?php echo htmlspecialchars($s['cover_stat']['value']); ?></strong>
                        <span><?php echo htmlspecialchars($s['cover_stat']['label']); ?></span>
                        <a href="finance-analytics-detail.php?slug=<?php echo urlencode($s['slug']); ?>" class="btn btn-outline-dark" style="width:100%;justify-content:center;">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Not Sure Where To Start?</span>
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
