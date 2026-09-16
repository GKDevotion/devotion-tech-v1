<?php
    $seo = [
        'title' => 'Software Projects | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'Custom software and internal systems Devotion Technologies has built — ERPs, engines and platforms that replaced spreadsheets and manual processes.',
        'keywords' => 'Devotion Technologies software projects, custom software portfolio, ERP development, business systems',
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
    $systems = array_values(array_filter($portfolio, function ($p) { return $p['category'] === 'software'; }));
?>

<!-- If Bootstrap 5 is not already loaded from elements/header.php, uncomment the line below -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --gold: #b38f51; --gold-dark: #8f7040; --navy: #070d24; --navy-soft: #152a58;
        --border: #e8e3d6; --muted: #6c7280; --cream: #f7f4ee;
    }
    body { font-family: 'Poppins', sans-serif; color: #1a1f30; }
    p { margin: 0; }
    a { text-decoration: none; color: inherit; }
    ul { margin: 0; padding: 0; list-style: none; }

    .eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: 1rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: var(--gold); }
    .eyebrow::before { content: "◆"; font-size: .6rem; }
    .badge-pill { display: inline-flex; align-items: center; gap: 8px; border: 1px solid var(--border); border-radius: 999px; padding: 8px 16px; font-size: .85rem; font-weight: 600; color: var(--gold-dark); background: #fff; }
    .badge-pill .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--gold); flex: none; }

    section { padding: 90px 0; }
    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 13px 26px; border-radius: 10px; font-size: .92rem; font-weight: 600; transition: all .2s ease; white-space: nowrap; }
    .btn-gold { background: var(--gold); color: #fff; }
    .btn-gold:hover { background: var(--gold-dark); }
    .btn-outline-light { border: 1.5px solid rgba(255,255,255,.4); color: #fff; }
    .btn-outline-light:hover { background: #fff; color: var(--navy); }
    .btn-outline-dark { border: 1.5px solid var(--border); color: var(--navy); }
    .btn-outline-dark:hover { border-color: var(--gold); color: var(--gold-dark); }

    /* HERO */
    .sw-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 84px 0 70px; text-align: center;
    }
    .sw-hero h1 { color: #fff; font-size: clamp(2rem, 3.4vw, 2.6rem); font-weight: 700; margin: 14px auto; max-width: 740px; line-height: 1.25; }
    .sw-hero p { color: rgba(255,255,255,.7); max-width: 620px; margin: 0 auto; font-size: 1rem; line-height: 1.7; }

    /* SYSTEMS LEDGER */
    .ledger { display: flex; flex-direction: column; gap: 24px; }

    .ledger-row {
        display: grid; grid-template-columns: 220px 1fr 260px; gap: 30px; align-items: center;
        background: #fff; border: 1px solid var(--border); border-radius: 20px; padding: 34px;
        transition: border-color .25s ease, box-shadow .25s ease;
    }
    .ledger-row:hover { border-color: var(--gold); box-shadow: 0 24px 55px -30px rgba(10,19,48,.25); }

    .ledger-id { border-right: 1px solid var(--border); padding-right: 24px; }
    .ledger-id .lid-num { font-size: 2.2rem; font-weight: 800; color: var(--border); line-height: 1; display: block; margin-bottom: 8px; }
    .ledger-id .lid-client { font-size: .8rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: .04em; display: block; margin-bottom: 4px; }
    .ledger-id .lid-meta { font-size: .78rem; color: var(--muted); }

    .ledger-body h3 { font-size: 1.25rem; font-weight: 700; color: var(--navy); margin-bottom: 10px; }
    .ledger-body .lb-row { display: flex; gap: 10px; margin-bottom: 8px; font-size: .88rem; line-height: 1.6; }
    .ledger-body .lb-row:last-of-type { margin-bottom: 16px; }
    .ledger-body .lb-label { flex: none; font-weight: 700; color: var(--navy); width: 90px; }
    .ledger-body .lb-value { color: var(--muted); }
    .ledger-body .lb-tags { display: flex; flex-wrap: wrap; gap: 6px; }
    .ledger-body .lb-tags span { background: var(--cream); border: 1px solid var(--border); border-radius: 999px; padding: 4px 12px; font-size: .74rem; font-weight: 500; color: var(--navy); }

    .ledger-result { border-left: 1px solid var(--border); padding-left: 24px; display: flex; flex-direction: column; gap: 14px; }
    .ledger-result .item strong { display: block; font-size: 1.3rem; font-weight: 800; color: var(--gold-dark); }
    .ledger-result .item span { font-size: .74rem; color: var(--muted); }

    /* CTA */
    .careers {
        background: linear-gradient(135deg, var(--navy), var(--navy-soft)); border-radius: 26px;
        padding: 52px 48px; display: flex; align-items: center; justify-content: space-between;
        gap: 32px; flex-wrap: wrap; position: relative; overflow: hidden; margin-top: 30px;
    }
    .careers::after { content: ""; position: absolute; right: -60px; top: -60px; width: 260px; height: 260px; border-radius: 50%; background: radial-gradient(circle, rgba(179,143,81,.35), transparent 70%); }
    .careers-copy { position: relative; z-index: 2; max-width: 560px; }
    .careers-copy h2 { color: #fff; font-size: clamp(1.4rem, 2.2vw, 1.85rem); margin: 12px 0 10px; font-weight: 700; }
    .careers-copy p { color: rgba(255,255,255,.7); font-size: .96rem; }
    .careers-actions { position: relative; z-index: 2; display: flex; gap: 14px; flex-wrap: wrap; }

    @media (max-width: 980px) {
        .ledger-row { grid-template-columns: 1fr; }
        .ledger-id, .ledger-result { border: none; padding: 0; }
        .ledger-result { flex-direction: row; flex-wrap: wrap; gap: 24px; }
    }
</style>

<!-- HERO -->
<section class="sw-hero">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold);">Software Projects</span>
        <h1>Custom systems that replaced spreadsheets, not just added to them</h1>
        <p>Every entry below started as a real operational bottleneck — a broken inventory count, a claims queue with no priority. Here's the system we built to fix it, and what changed once it shipped.</p>
    </div>
</section>

<!-- LEDGER -->
<section style="padding-top:0;">
    <div class="container">
        <div class="ledger">
            <?php foreach ($systems as $i => $s): ?>
                <div class="ledger-row">
                    <div class="ledger-id">
                        <span class="lid-num">#<?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
                        <span class="lid-client"><?php echo htmlspecialchars($s['client']); ?></span>
                        <span class="lid-meta"><?php echo htmlspecialchars($s['year']); ?> &middot; <?php echo htmlspecialchars($s['duration']); ?></span>
                    </div>
                    <div class="ledger-body">
                        <h3><?php echo htmlspecialchars($s['title']); ?></h3>
                        <div class="lb-row"><span class="lb-label">Problem</span><span class="lb-value"><?php echo htmlspecialchars($s['challenge']); ?></span></div>
                        <div class="lb-row"><span class="lb-label">Built</span><span class="lb-value"><?php echo htmlspecialchars($s['solution']); ?></span></div>
                        <div class="lb-tags">
                            <?php foreach ($s['tags'] as $tag): ?>
                                <span><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="ledger-result">
                        <?php foreach (array_slice($s['stats'], 0, 3) as $stat): ?>
                            <div class="item">
                                <strong><?php echo htmlspecialchars($stat['value']); ?></strong>
                                <span><?php echo htmlspecialchars($stat['label']); ?></span>
                            </div>
                        <?php endforeach; ?>
                        <a href="project-detail.php?slug=<?php echo urlencode($s['slug']); ?>" class="btn btn-outline-dark" style="margin-top:4px;">Read Full Project</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA -->
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow" style="color:var(--gold);">Running On Spreadsheets?</span>
                <h2>Tell us what's held together with duct tape — we'll tell you what to build instead</h2>
                <p>Book a discovery call and we'll give you an honest read on what's actually worth replacing first.</p>
            </div>
            <div class="careers-actions">
                <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                <a href="portfolio.php" class="btn btn-outline-light">View Full Portfolio</a>
            </div>
        </div>
    </div>
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>
