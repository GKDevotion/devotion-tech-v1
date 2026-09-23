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

<style>
    :root {
        /* Shared brand palette — matches elements/header.php */
        --gold: #a9812e;
        --gold-dark: #7d5f22;
        --gold-light: #d6b968;
        --gold-pale: #faf5e9;
        --ink: #1f2430;
        --muted: #6b7280;
        --line: #e8e3d6;
        --navy-deep: #070d24;
        --navy-mid: #152a58;
        --radius-lg: 20px;
        --shadow-sm: 0 2px 10px rgba(31, 36, 48, .06);
        --shadow-md: 0 14px 34px -10px rgba(7, 13, 36, .14);
    }

    a { text-decoration: none; color: inherit; }
    ul { margin: 0; padding: 0; list-style: none; }

    section { padding: 90px 0; }
 
    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 13px 26px; border-radius: 10px; font-size: .92rem; font-weight: 600; transition: transform .2s ease, box-shadow .2s ease, filter .2s ease; white-space: nowrap; }
    .btn-gold { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: #fff; box-shadow: 0 10px 24px -8px rgba(169, 129, 46, .45); }
    .btn-gold:hover { filter: brightness(1.06); transform: translateY(-1px); color: #fff; }
    .btn-outline-light { border: 1.5px solid rgba(255, 255, 255, .4); color: #fff; }
    .btn-outline-light:hover { background: #fff; color: var(--navy-deep); }

    /* HERO */
    .cs-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: url('<?php echo $siteBase ?? ''; ?>/assets/images/banner-img.png') center/cover no-repeat;
        padding: 112px 0 92px;
        text-align: center;
    }
    .cs-hero h1 { color: #000; font-size: clamp(2rem, 3.4vw, 2.6rem); font-weight: 700; margin: 0 auto 18px; max-width: 740px; line-height: 1.25; }
    .cs-hero p { color: #000; margin: 0 auto;  font-size: 1.02rem; line-height: 1.75; }

    /* FEATURE LIST — each case study is now a distinct elevated card */
    .cs-list-section { padding-top: 60px; }

    .feature-case {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 44px;
        margin-bottom: 28px;
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 48px;
        align-items: start;
        transition: box-shadow .25s ease, transform .25s ease;
    }
    .feature-case:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }
    .feature-case:last-of-type { margin-bottom: 0; }

    .fc-lead .fc-tag { font-size: .8rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: .06em; display: block; margin-bottom: 14px; }
    .fc-lead h2 { font-size: 1.65rem; font-weight: 700; color: var(--navy-deep); line-height: 1.3; margin-bottom: 14px; }
    .fc-lead .fc-meta { font-size: .85rem; color: var(--muted); margin-bottom: 26px !important; display: block; }

    .fc-stat-stack { display: flex; flex-direction: column; gap: 14px; }
    .fc-stat-stack .item {
        background: var(--gold-pale);
        border: 1px solid var(--line);
        border-left: 4px solid var(--gold);
        border-radius: 12px;
        padding: 14px 18px;
    }
    .fc-stat-stack .item strong { display: block; font-size: 1.9rem; font-weight: 800; color: var(--navy-deep); line-height: 1; margin-bottom: 4px; }
    .fc-stat-stack .item span { font-size: .8rem; color: var(--muted); }

    .fc-body p.fc-summary { font-size: 1rem; color: #3a3f4d; line-height: 1.75; margin-bottom: 24px !important; }

    .fc-pullquote {
        position: relative;
        background: var(--gold-pale);
        border-left: 4px solid var(--gold);
        border-radius: 0 14px 14px 0;
        padding: 24px 26px 22px 48px;
        margin-bottom: 24px;
    }
    .fc-pullquote::before {
        content: "\201C";
        position: absolute; left: 14px; top: 4px;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2.8rem; line-height: 1;
        color: var(--gold); opacity: .65;
    }
    .fc-pullquote p { font-size: 1.02rem; font-weight: 500; color: var(--navy-deep); font-style: italic; line-height: 1.6; margin-bottom: 10px !important; }
    .fc-pullquote span { font-size: .82rem; color: var(--muted); }
    .fc-pullquote span strong { color: var(--navy-deep); }

    .fc-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 26px; }
    .fc-tags span { background: #fff; border: 1px solid var(--line); border-radius: 999px; padding: 6px 14px; font-size: .78rem; font-weight: 600; color: var(--ink); }

    /* CTA */
    .careers {
        background: linear-gradient(135deg, var(--navy-deep), var(--navy-mid));
        border-radius: 26px;
        padding: 52px 48px;
        display: flex; align-items: center; justify-content: space-between;
        gap: 32px; flex-wrap: wrap;
        position: relative; overflow: hidden;
        margin-top: 48px;
    }
    .careers::after {
        content: ""; position: absolute; right: -60px; top: -60px;
        width: 260px; height: 260px; border-radius: 50%;
        background: radial-gradient(circle, rgba(169, 129, 46, .35), transparent 70%);
    }
    .careers-copy { position: relative; z-index: 2; max-width: 560px; }
    .careers-copy h2 { color: #fff; font-size: clamp(1.4rem, 2.2vw, 1.85rem); margin: 12px 0 10px; font-weight: 700; }
    .careers-copy p { color: rgba(255, 255, 255, .7); font-size: .96rem; }
    .careers-actions { position: relative; z-index: 2; display: flex; gap: 14px; flex-wrap: wrap; }

    @media (max-width: 860px) {
        .feature-case { grid-template-columns: 1fr; gap: 30px; padding: 32px; }
        .careers { padding: 40px 30px; }
    }
</style>

<!-- HERO -->
<section class="cs-hero">
    <div class="container">
        <span class="eyebrow">Case Studies</span>
        <h1>The full story behind the numbers on our services pages</h1>
        <p>Every stat we quote elsewhere on this site came from a real engagement. These are the in-depth write-ups behind a few of them — the actual problem, the approach, and what changed.</p>
    </div>
</section>

<!-- FEATURE LIST -->
<section class="cs-list-section">
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
                <span class="eyebrow">Want Results Like These?</span>
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