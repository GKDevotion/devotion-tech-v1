<?php
    $seo = [
        'title' => 'Case Studies | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'In-depth case studies from Devotion Technologies — the real challenge, the approach we took, and the measurable outcome for each client.',
        'keywords' => 'Devotion Technologies case studies, client results, project outcomes, software case study',
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
    $studies = array_values(array_filter($portfolio, function ($p) { return $p['category'] === 'case-studies'; }));
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

    /* HERO */
    .cs-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 84px 0 70px; text-align: center;
    }
    .cs-hero h1 { color: #fff; font-size: clamp(2rem, 3.4vw, 2.6rem); font-weight: 700; margin: 14px auto; max-width: 740px; line-height: 1.25; }
    .cs-hero p { color: rgba(255,255,255,.7); max-width: 620px; margin: 0 auto; font-size: 1rem; line-height: 1.7; }

    /* FEATURE LIST */
    .feature-case {
        border-bottom: 1px solid var(--border); padding: 60px 0; display: grid;
        grid-template-columns: 1fr 1.4fr; gap: 60px; align-items: start;
    }
    .feature-case:first-child { padding-top: 0; }
    .feature-case:last-child { border-bottom: none; padding-bottom: 0; }

    .fc-lead .fc-tag { font-size: .8rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: .04em; display: block; margin-bottom: 14px; }
    .fc-lead h2 { font-size: 1.7rem; font-weight: 700; color: var(--navy); line-height: 1.3; margin-bottom: 16px; }
    .fc-lead .fc-meta { font-size: .85rem; color: var(--muted); margin-bottom: 26px !important; display: block; }

    .fc-stat-stack { display: flex; flex-direction: column; gap: 18px; }
    .fc-stat-stack .item { border-left: 3px solid var(--gold); padding-left: 16px; }
    .fc-stat-stack .item strong { display: block; font-size: 1.9rem; font-weight: 800; color: var(--navy); line-height: 1; }
    .fc-stat-stack .item span { font-size: .8rem; color: var(--muted); }

    .fc-body p.fc-summary { font-size: 1rem; color: #3a3f4d; line-height: 1.75; margin-bottom: 24px !important; }

    .fc-pullquote {
        background: #fbfaf7; border-left: 4px solid var(--gold); border-radius: 0 14px 14px 0;
        padding: 22px 26px; margin-bottom: 24px;
    }
    .fc-pullquote p { font-size: 1.02rem; font-weight: 500; color: var(--navy); font-style: italic; line-height: 1.6; margin-bottom: 10px !important; }
    .fc-pullquote span { font-size: .82rem; color: var(--muted); }
    .fc-pullquote span strong { color: var(--navy); }

    .fc-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 22px; }
    .fc-tags span { background: var(--cream); border: 1px solid var(--border); border-radius: 999px; padding: 6px 14px; font-size: .78rem; font-weight: 500; color: var(--navy); }

    /* CTA */
    .careers {
        background: linear-gradient(135deg, var(--navy), var(--navy-soft)); border-radius: 26px;
        padding: 52px 48px; display: flex; align-items: center; justify-content: space-between;
        gap: 32px; flex-wrap: wrap; position: relative; overflow: hidden; margin-top: 40px;
    }
    .careers::after { content: ""; position: absolute; right: -60px; top: -60px; width: 260px; height: 260px; border-radius: 50%; background: radial-gradient(circle, rgba(179,143,81,.35), transparent 70%); }
    .careers-copy { position: relative; z-index: 2; max-width: 560px; }
    .careers-copy h2 { color: #fff; font-size: clamp(1.4rem, 2.2vw, 1.85rem); margin: 12px 0 10px; font-weight: 700; }
    .careers-copy p { color: rgba(255,255,255,.7); font-size: .96rem; }
    .careers-actions { position: relative; z-index: 2; display: flex; gap: 14px; flex-wrap: wrap; }

    @media (max-width: 860px) {
        .feature-case { grid-template-columns: 1fr; gap: 30px; }
    }
</style>

<!-- HERO -->
<section class="cs-hero">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold);">Case Studies</span>
        <h1>The full story behind the numbers on our services pages</h1>
        <p>Every stat we quote elsewhere on this site came from a real engagement. These are the in-depth write-ups behind a few of them — the actual problem, the approach, and what changed.</p>
    </div>
</section>

<!-- FEATURE LIST -->
<section style="padding-top:0;">
    <div class="container">
        <?php foreach ($studies as $s): ?>
            <div class="feature-case">
                <div class="fc-lead">
                    <span class="fc-tag"><?php echo htmlspecialchars($s['client']); ?></span>
                    <h2><?php echo htmlspecialchars($s['title']); ?></h2>
                    <span class="fc-meta"><?php echo htmlspecialchars($s['year']); ?> &middot; <?php echo htmlspecialchars($s['duration']); ?> engagement</span>
                    <div class="fc-stat-stack">
                        <?php foreach (array_slice($s['stats'], 0, 3) as $stat): ?>
                            <div class="item">
                                <strong><?php echo htmlspecialchars($stat['value']); ?></strong>
                                <span><?php echo htmlspecialchars($stat['label']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="fc-body">
                    <p class="fc-summary"><?php echo htmlspecialchars($s['summary']); ?></p>
                    <div class="fc-pullquote">
                        <p>&ldquo;<?php echo htmlspecialchars($s['testimonial']['quote']); ?>&rdquo;</p>
                        <span><strong><?php echo htmlspecialchars($s['testimonial']['author']); ?></strong> &middot; <?php echo htmlspecialchars($s['testimonial']['role']); ?></span>
                    </div>
                    <div class="fc-tags">
                        <?php foreach ($s['tags'] as $tag): ?>
                            <span><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="project-detail.php?slug=<?php echo urlencode($s['slug']); ?>" class="btn btn-gold">Read Full Case Study</a>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- CTA -->
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow" style="color:var(--gold);">Want Results Like These?</span>
                <h2>Let's talk about what your case study could look like</h2>
                <p>Book a discovery call and we'll tell you honestly what outcome is realistic for your project and timeline.</p>
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
