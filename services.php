<?php
    $seo = [
        'title' => 'Our Services | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'Web, app, e-commerce, design and marketing services from Devotion Technologies — senior-led teams, transparent delivery, and support that outlasts launch day.',
        'keywords' => 'Devotion Technologies services, web development, app development, e-commerce development, digital marketing, UI/UX design',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');

    // ---- Load services from JSON ----
    $servicesPath = __DIR__ . '/data/services.json';
    $services = [];
    if (file_exists($servicesPath)) {
        $json = file_get_contents($servicesPath);
        $decoded = json_decode($json, true);
        if (is_array($decoded)) {
            $services = $decoded;
        }
    }

    // ---- Inline icon library, keyed by the "icon" field in services.json ----
    $icons = [
        'globe'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3c2.5 2.6 3.8 5.7 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.7-3.8-9S9.5 5.6 12 3z" /></svg>',
        'device'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="7" y="2" width="10" height="20" rx="2" /><path d="M11 18h2" /></svg>',
        'palette'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2a10 10 0 100 20c1.5 0 2-1 2-2s-.5-1.5-.5-2.5 1-2 2-2H17a3 3 0 003-3c0-5.5-4-10.5-8-10.5z" /><circle cx="7.5" cy="10.5" r="1" /><circle cx="10.5" cy="7" r="1" /><circle cx="15" cy="8" r="1" /></svg>',
        'edit'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 20h9" /><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z" /></svg>',
        'code'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 18l-6-6 6-6M15 6l6 6-6 6" /></svg>',
        'wrench'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L2 19l3 3 7.3-7.3a4 4 0 005.4-5.4l-2.6 2.6-2-2z" /></svg>',
        'pen-ruler' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 19l7-7 3 3-7 7-3-3z" /><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18" /><path d="M2 2l7.5 7.5" /></svg>',
        'cart'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="21" r="1" /><circle cx="19" cy="21" r="1" /><path d="M2.5 2.5h3l2.7 12.4a2 2 0 002 1.6h8.3a2 2 0 002-1.6l1.5-7.4H6" /></svg>',
        'megaphone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 11v3a1 1 0 001 1h2l4 5V6l-4 5H4a1 1 0 00-1 1z" /><path d="M15 8a4 4 0 010 8M18 5a8 8 0 010 14" /></svg>',
    ];

    function svc_icon($icons, $key)
    {
        return isset($icons[$key]) ? $icons[$key] : $icons['code'];
    }

    // Unique categories present in the data, in a fixed display order
    $categoryOrder = ['development', 'design', 'marketing', 'support'];
    $categoryLabels = [
        'development' => 'Development',
        'design'      => 'Design',
        'marketing'   => 'Marketing',
        'support'     => 'Support',
    ];
?>


<style>
    :root {
        --gold: #b38f51;
        --gold-dark: #b38f51;
        --navy: #070d24;
        --navy-soft: #152a58;
        --border: #e8e3d6;
        --muted: #6c7280;
        --cream: #f7f4ee;
    }

 
    a {
        text-decoration: none;
        color: inherit;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    img {
        max-width: 100%;
        display: block;
    } 

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 26px;
        border-radius: 999px;
        font-weight: 600;
        font-size: .92rem;
        cursor: pointer;
        border: 1.5px solid transparent;
        transition: all .25s ease;
        white-space: nowrap;
    }

    .btn-gold {
        background: var(--gold);
        color: #fff;
    }

    .btn-gold:hover {
        background: var(--gold-dark);
        transform: translateY(-2px);
        color: #fff;
    }

    .btn-outline-light {
        border-color: rgba(255, 255, 255, .35);
        color: #fff;
    }

    .btn-outline-light:hover {
        border-color: #fff;
        background: rgba(255, 255, 255, .08);
        color: #fff;
    }

    section {
        padding: 90px 0;
    }

    .section-head {
        margin-bottom: 44px;
    }

    .section-head h2 {
        font-size: clamp(1.7rem, 2.6vw, 2.3rem);
        font-weight: 700;
        margin: 14px 0 12px;
        line-height: 1.25;
        color: var(--navy);
    }

    .section-head p {
        color: var(--muted);
        font-size: 1.2rem;
    }

    /* ---------- TOP BANNER ---------- */
    .top-banner-background {
        background-size: cover;
        background-position: center;
        background-color: var(--navy);
        padding: 70px 24px;
    }

    .top-banner-background h1 {
        color: #000;
        font-weight: 700;
        font-size: clamp(2rem, 3.4vw, 2.6rem);
    }

    .top-banner-background p {
        color: #000;
        margin-left: auto;
        margin-right: auto;
    }

    /* ---------- CATEGORY FILTERS ---------- */
    .tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 36px;
    }

    .tab-btn {
        padding: 10px 20px;
        border-radius: 999px;
        border: 1.5px solid var(--border);
        background: #fff;
        font-size: .86rem;
        font-weight: 600;
        color: var(--muted);
        cursor: pointer;
        transition: all .2s ease;
    }

    .tab-btn:hover {
        border-color: var(--gold);
        color: var(--gold-dark);
    }

    .tab-btn.active {
        background: var(--gold);
        border-color: var(--gold);
        color: #fff;
    }

    /* ---------- BENTO GRID ---------- */
    .bento-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-auto-rows: 220px;
        gap: 22px;
    }

    .bento-card {
        grid-column: span 2;
        grid-row: span 2;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border);
        background: #fff;
        padding: 26px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .bento-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 22px 48px -22px rgba(10, 19, 48, .28);
        border-color: var(--gold);
    }

    .bento-card[hidden] {
        display: none;
    }

    .bento-card.featured {
        grid-column: span 4;
        grid-row: span 2;
        background: url('<?php echo $siteBase; ?>/assets/images/web-development.png'); 
        color: #fff;
        border-color: transparent;
    }

    .bento-card.featured .cat-label {
        color: var(--gold);
        border-color: rgba(255, 255, 255, .25);
    }

    .bento-card.featured .b-icon {
        background: rgba(255, 255, 255, 0.67);
        color: #fff;
    }

    .bento-card.featured h3 {
        color: #fff;
    }

    .bento-card.featured p.desc {
        color: rgba(255, 255, 255, .68);
    }

    .bento-card.featured .b-stat strong {
        color: var(--gold);
    }

    .bento-card.featured .b-stat span {
        color: rgba(255, 255, 255, .6);
    }

    .bento-card.tall {
        grid-row: span 2;
    }

    .cat-label {
        display: inline-block;
        align-self: flex-start;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: var(--gold-dark);
        border: 1px solid var(--border);
        border-radius: 999px;
        padding: 4px 11px;
    }

    .b-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #f2e8d3;
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 14px 0 12px;
    }

    .b-icon svg {
        width: 22px;
        height: 22px;
    }

    .bento-card h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 6px;
    }

    .bento-card.featured h3 {
        font-size: 1.4rem;
    }

    .bento-card p.desc {
        font-size: 1.2rem;
        line-height: 1.55;
        margin-bottom: 14px !important;
    }

    .b-bottom-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .b-stat strong {
        display: block;
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--gold-dark);
        line-height: 1;
    }

    .b-stat span {
        font-size: 1.2rem;
        color: var(--muted);
    }

    .b-arrow {
        flex: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--cream);
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s ease, color .2s ease;
    }

    .bento-card.featured .b-arrow {
        background: rgba(255, 255, 255, .12);
        color: #fff;
    }

    .b-arrow svg {
        width: 16px;
        height: 16px;
    }

    .bento-card:hover .b-arrow {
        background: var(--gold);
        color: #fff;
    }

    /* ---------- PROCESS STRIP ---------- */
    .process-strip {
        background: var(--cream);
    }

    .process-strip .step-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .step-item {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 26px 22px;
    }

    .step-item .num {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gold-dark);
        letter-spacing: .04em;
        margin-bottom: 12px;
        display: block;
    }

    .step-item h4 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 8px;
    }

    .step-item p {
        font-size: 1rem;
        color: var(--muted);
        line-height: 1.6;
    }

    /* ---------- CTA ---------- */
    .careers {
        background: linear-gradient(135deg, var(--navy), var(--navy-soft));
        border-radius: 26px;
        padding: 56px 48px;
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
        font-size: clamp(1.5rem, 2.4vw, 2rem);
        margin: 14px 0 12px;
        font-weight: 700;
    }

    .careers-copy p {
        color: rgba(255, 255, 255, .7);
        font-size: 1rem;
    }

    .careers-actions {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .bento-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: auto;
        }

        .bento-card,
        .bento-card.featured,
        .bento-card.tall {
            grid-column: span 1;
            grid-row: span 1;
            min-height: 240px;
        }

        .process-strip .step-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 680px) {
        section {
            padding: 60px 0;
        }

        .bento-grid {
            grid-template-columns: 1fr;
        }

        .process-strip .step-grid {
            grid-template-columns: 1fr;
        }

        .careers {
            flex-direction: column;
            align-items: flex-start;
            padding: 36px 26px;
        }
    }
</style>

<!-- TOP BANNER -->
<section class="top-banner-background" style="background-image: url('<?php echo $siteBase; ?>/assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">Our Services</h1>
        <p class="text-center mt-2">Web, app, design, marketing and support services delivered by senior-led teams — pick a service to see how we approach it.</p>
    </div>
</section>

<!-- BENTO SERVICES GRID -->
<section id="services-grid">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                What We Do
            </div>
            <h2>Nine services, one senior-led standard</h2>
            <p>Filter by category, or scroll through everything we offer end to end.</p>
        </div>

        <div class="tabs" id="tabs">
            <button class="tab-btn active" data-cat="all">All Services</button>
            <?php foreach ($categoryOrder as $catKey): ?>
                <button class="tab-btn" data-cat="<?php echo htmlspecialchars($catKey); ?>"><?php echo htmlspecialchars($categoryLabels[$catKey]); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="bento-grid" id="bentoGrid">
            <?php foreach ($services as $i => $service): ?>
                <?php
                // First card is the large "featured" tile, 3rd card is a tall tile — purely visual rhythm for the bento layout
                $extraClass = '';
                if ($i === 0) {
                    $extraClass = 'featured';
                } elseif ($i === 3) {
                    $extraClass = 'tall';
                }
                ?>
                <a href="service-detail.php?slug=<?php echo urlencode($service['slug']); ?>"
                    class="bento-card <?php echo $extraClass; ?>"
                    data-cat="<?php echo htmlspecialchars($service['category']); ?>">
                    <div>
                        <span class="cat-label"><?php echo htmlspecialchars($service['category_label']); ?></span>
                        <div class="b-icon"><?php echo svc_icon($icons, $service['icon']); ?></div>
                        <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                        <p class="desc"><?php echo htmlspecialchars($service['tagline']); ?></p>
                    </div>
                    <div class="b-bottom-row">
                        <div class="b-stat">
                            <strong><?php echo htmlspecialchars($service['cover_stat']['value']); ?></strong>
                            <span><?php echo htmlspecialchars($service['cover_stat']['label']); ?></span>
                        </div>
                        <span class="b-arrow">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- HOW WE WORK -->
<section class="process-strip">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                How Engagements Start
            </div>
            <h2>The same process, whichever service you need</h2>
            <p>Regardless of which service you pick, every engagement follows the same four-step rhythm.</p>
        </div>
        <div class="step-grid">
            <div class="step-item">
                <span class="num">01</span>
                <h4>Discovery Call</h4>
                <p>We learn your goals, constraints and existing systems before proposing anything.</p>
            </div>
            <div class="step-item">
                <span class="num">02</span>
                <h4>Scoped Proposal</h4>
                <p>A clear plan with timeline, cost and the specific team who will do the work.</p>
            </div>
            <div class="step-item">
                <span class="num">03</span>
                <h4>Build In The Open</h4>
                <p>Weekly demos and shared boards so you can see progress as it happens.</p>
            </div>
            <div class="step-item">
                <span class="num">04</span>
                <h4>Launch & Support</h4>
                <p>Handover documentation plus ongoing support, so nothing is a black box.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="container" style="padding-top:100px;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Not Sure Which Service Fits?</span>
            <h2>Tell us what you're building — we'll recommend the right one</h2>
            <p>Book a discovery call and we'll tell you honestly which service (or combination) makes sense for your goals and budget.</p>
        </div>
        <div class="careers-actions">
            <a href="#" class="btn btn-gold">Book A Discovery Call</a>
            <a href="team.php" class="btn btn-outline-light">Meet Our Team</a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('#tabs .tab-btn');
        var cards = document.querySelectorAll('#bentoGrid .bento-card');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                tabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                tab.classList.add('active');

                var cat = tab.getAttribute('data-cat');
                cards.forEach(function(card) {
                    if (cat === 'all' || card.getAttribute('data-cat') === cat) {
                        card.hidden = false;
                    } else {
                        card.hidden = true;
                    }
                });
            });
        });
    });
</script>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>