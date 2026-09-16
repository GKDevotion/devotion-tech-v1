<?php
    $seo = [
        'title' => 'Customer Support Solutions | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'Helpdesk ticketing and live chat systems Devotion Technologies builds and integrates — the two channels behind fast, accountable customer support.',
        'keywords' => 'helpdesk software, ticketing system, live chat software, customer support platform, support automation',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');

    $csPath = __DIR__ . '/data/customer-support.json';
    $systems = [];
    if (file_exists($csPath)) {
        $json = file_get_contents($csPath);
        $decoded = json_decode($json, true);
        if (is_array($decoded)) {
            $systems = $decoded;
        }
    }

    $csIcons = [
        'headset' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 13v-1a8 8 0 0116 0v1" /><rect x="3" y="13" width="5" height="7" rx="2" /><rect x="16" y="13" width="5" height="7" rx="2" /><path d="M20 20v.5a3 3 0 01-3 3h-3" /></svg>',
        'chat'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 5h16v11H8l-4 4V5z" /><path d="M8.5 9.5h7M8.5 12.5h4.5" /></svg>',
    ];
    function cs_icon($icons, $key) {
        return isset($icons[$key]) ? $icons[$key] : $icons['chat'];
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
    .cs-hero {
        position: relative; isolation: isolate; overflow: hidden;
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 84px 0 70px; text-align: center;
    }
    .cs-hero h1 { color: #fff; font-size: clamp(2rem, 3.4vw, 2.6rem); font-weight: 700; margin: 14px auto; max-width: 780px; line-height: 1.25; }
    .cs-hero p { color: rgba(255,255,255,.7); max-width: 640px; margin: 0 auto; font-size: 1rem; line-height: 1.7; }

    /* CHANNEL SPLIT PANELS */
    .channel-split { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; }
    .channel-panel {
        background: #fff; border: 1px solid var(--border); border-radius: 24px;
        padding: 44px 40px; display: flex; flex-direction: column; gap: 20px;
        position: relative; overflow: hidden; transition: border-color .25s ease, box-shadow .25s ease, transform .25s ease;
    }
    .channel-panel:hover { border-color: var(--gold); box-shadow: 0 30px 60px -32px rgba(10,19,48,.28); transform: translateY(-4px); }
    .channel-panel::after {
        content: ""; position: absolute; right: -50px; bottom: -50px; width: 200px; height: 200px;
        border-radius: 50%; background: radial-gradient(circle, rgba(179,143,81,.1), transparent 70%);
    }
    .cp-top { display: flex; align-items: center; justify-content: space-between; gap: 16px; position: relative; z-index: 1; }
    .cp-icon {
        width: 62px; height: 62px; border-radius: 16px; background: var(--cream);
        border: 1px solid var(--border); color: var(--gold-dark);
        display: flex; align-items: center; justify-content: center; flex: none;
    }
    .cp-icon svg { width: 28px; height: 28px; }
    .cp-stat { text-align: right; }
    .cp-stat strong { display: block; font-size: 1.6rem; font-weight: 800; color: var(--gold-dark); line-height: 1.1; }
    .cp-stat span { font-size: .72rem; color: var(--muted); }

    .cp-abbr { font-size: .78rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: .07em; position: relative; z-index: 1; }
    .channel-panel h3 { font-size: 1.35rem; font-weight: 700; color: var(--navy); line-height: 1.35; position: relative; z-index: 1; }
    .channel-panel > p.cp-overview { color: var(--muted); font-size: .95rem; line-height: 1.7; position: relative; z-index: 1; }

    .cp-features { display: flex; flex-direction: column; gap: 10px; position: relative; z-index: 1; }
    .cp-features li { display: flex; align-items: flex-start; gap: 10px; font-size: .88rem; color: var(--navy); }
    .cp-features li svg { width: 16px; height: 16px; flex: none; margin-top: 3px; color: var(--gold); }

    .channel-panel .btn { align-self: flex-start; position: relative; z-index: 1; margin-top: 4px; }

    @media (max-width: 860px) {
        .channel-split { grid-template-columns: 1fr; }
    }

    /* CONNECTION STRIP */
    .connect-strip { background: var(--cream); }
    .connect-inner { display: flex; align-items: center; justify-content: center; gap: 26px; flex-wrap: wrap; text-align: center; }
    .connect-node { display: flex; flex-direction: column; align-items: center; gap: 10px; }
    .connect-node .cn-circle {
        width: 64px; height: 64px; border-radius: 50%; background: #fff; border: 2px solid var(--gold);
        color: var(--gold-dark); display: flex; align-items: center; justify-content: center;
    }
    .connect-node .cn-circle svg { width: 26px; height: 26px; }
    .connect-node span { font-size: .84rem; font-weight: 700; color: var(--navy); }
    .connect-arrow { color: var(--gold); font-size: 1.6rem; }
    .connect-copy { max-width: 640px; margin: 30px auto 0; text-align: center; color: var(--muted); font-size: .96rem; line-height: 1.7; }

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
<section class="cs-hero">
    <div class="container">
        <span class="eyebrow" style="color:var(--gold);">Customer Support</span>
        <h1>Two channels, one accountable support experience</h1>
        <p>A ticket that gets tracked and a question that gets answered in real time solve different problems — but only when they talk to each other. Here's what each channel handles, and how they hand off.</p>
    </div>
</section>

<!-- CHANNEL PANELS -->
<section>
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> Support Channels</div>
            <h2>Pick a channel to see the full breakdown</h2>
            <p>Each one stands on its own, and connects directly to the other.</p>
        </div>

        <div class="channel-split">
            <?php foreach ($systems as $s): ?>
                <div class="channel-panel">
                    <div class="cp-top">
                        <div class="cp-icon"><?php echo cs_icon($csIcons, $s['icon']); ?></div>
                        <div class="cp-stat">
                            <strong><?php echo htmlspecialchars($s['cover_stat']['value']); ?></strong>
                            <span><?php echo htmlspecialchars($s['cover_stat']['label']); ?></span>
                        </div>
                    </div>
                    <div>
                        <span class="cp-abbr"><?php echo htmlspecialchars($s['abbr']); ?></span>
                        <h3><?php echo htmlspecialchars($s['tagline']); ?></h3>
                    </div>
                    <p class="cp-overview"><?php echo htmlspecialchars($s['overview']); ?></p>
                    <ul class="cp-features">
                        <?php foreach (array_slice($s['features'], 0, 3) as $f): ?>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M5 13l4 4L19 7" /></svg>
                                <span><?php echo htmlspecialchars($f); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="customer-support-detail.php?slug=<?php echo urlencode($s['slug']); ?>" class="btn btn-outline-dark">View Full Breakdown</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CONNECTION -->
<section class="connect-strip">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3"><span class="dot"></span> Working Together</div>
            <h2>How a conversation becomes a ticket, and back again</h2>
        </div>
        <div class="connect-inner">
            <?php if (isset($systems[1])): ?>
                <div class="connect-node">
                    <div class="cn-circle"><?php echo cs_icon($csIcons, $systems[1]['icon']); ?></div>
                    <span><?php echo htmlspecialchars($systems[1]['abbr']); ?></span>
                </div>
            <?php endif; ?>
            <span class="connect-arrow">&#8594;</span>
            <?php if (isset($systems[0])): ?>
                <div class="connect-node">
                    <div class="cn-circle"><?php echo cs_icon($csIcons, $systems[0]['icon']); ?></div>
                    <span><?php echo htmlspecialchars($systems[0]['abbr']); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <p class="connect-copy">A chat that needs more than a quick answer becomes a tracked ticket automatically, transcript and all — so a conversation that starts in real time never gets lost the moment it needs a longer look.</p>
    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:0;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Not Sure Where To Start?</span>
            <h2>Tell us where support requests are slipping through</h2>
            <p>Book a discovery call and we'll tell you honestly whether you need one channel or both.</p>
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
