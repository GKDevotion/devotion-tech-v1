<?php
$seo = [
    'title' => 'News & Updates | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'Stay up to date with the latest news, product updates, industry insights and milestones from Devotion Technologies.',
    'keywords' => 'Devotion Technologies news, company updates, product releases, IT industry insights, technology company blog',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');
?>

<style>
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
        background: #b38f51;
        color: #fff;
    }

    .btn-gold:hover {
        background: #8f7040;
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

    .btn-outline-dark {
        border-color: #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark:hover {
        border-color: #b38f51;
        color: #8f7040;
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
        color: #070d24;
    }

    .section-head p {
        color: #6c7280;
        font-size: 1rem;
        max-width: 640px;
    }

    /* ---------- TOP BANNER ---------- */
    .top-banner-background {
        background-size: cover;
        background-position: center;
        background-color: #070d24;
        padding: 70px 24px;
    }

    .top-banner-background h1 {
        color: #fff;
        font-weight: 700;
        font-size: clamp(2rem, 3.4vw, 2.6rem);
    }

    .top-banner-background p {
        color: rgba(255, 255, 255, .75);
        max-width: 640px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ---------- FEATURED ARTICLE ---------- */
    .featured-card {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 22px;
        overflow: hidden;
    }

    .featured-media {
        position: relative;
        min-height: 340px;
    }

    .featured-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-media .cat-chip {
        position: absolute;
        top: 18px;
        left: 18px;
        background: #b38f51;
        color: #fff;
        font-size: .74rem;
        font-weight: 700;
        letter-spacing: .03em;
        padding: 7px 14px;
        border-radius: 999px;
    }

    .featured-body {
        padding: 42px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .featured-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        font-size: .85rem;
        color: #6c7280;
        margin-bottom: 16px;
    }

    .featured-meta .sep {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: #e8e3d6;
        display: inline-block;
    }

    .featured-body h3 {
        font-size: clamp(1.3rem, 2vw, 1.7rem);
        font-weight: 700;
        color: #070d24;
        line-height: 1.35;
        margin-bottom: 14px;
    }

    .featured-body p.excerpt {
        color: #6c7280;
        font-size: .98rem;
        line-height: 1.7;
        margin-bottom: 22px !important;
    }

    .read-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        font-size: .92rem;
        color: #8f7040;
    }

    .read-link svg {
        width: 16px;
        height: 16px;
        transition: transform .2s ease;
    }

    .read-link:hover svg {
        transform: translateX(3px);
    }

    /* ---------- FILTER TABS ---------- */
    .tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 36px;
    }

    .tab-btn {
        padding: 10px 20px;
        border-radius: 999px;
        border: 1.5px solid #e8e3d6;
        background: #fff;
        font-size: .86rem;
        font-weight: 600;
        color: #6c7280;
        cursor: pointer;
        transition: all .2s ease;
    }

    .tab-btn:hover {
        border-color: #b38f51;
        color: #8f7040;
    }

    .tab-btn.active {
        background: #b38f51;
        border-color: #b38f51;
        color: #fff;
    }

    /* ---------- NEWS GRID ---------- */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 26px;
    }

    .news-card {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        overflow: hidden;
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .25);
        border-color: #b38f51;
    }

    .news-card[hidden] {
        display: none;
    }

    .news-photo {
        height: 190px;
        position: relative;
        overflow: hidden;
    }

    .news-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .news-card:hover .news-photo img {
        transform: scale(1.06);
    }

    .news-photo .cat-chip {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(7, 13, 36, .75);
        color: #fff;
        font-size: .68rem;
        font-weight: 600;
        padding: 5px 11px;
        border-radius: 999px;
        letter-spacing: .02em;
    }

    .news-body {
        padding: 20px 22px 24px;
    }

    .news-date {
        font-size: .8rem;
        color: #6c7280;
        margin-bottom: 10px !important;
        display: block;
    }

    .news-body h4 {
        font-size: 1.03rem;
        font-weight: 700;
        color: #070d24;
        line-height: 1.4;
        margin-bottom: 10px;
    }

    .news-body p.excerpt {
        color: #6c7280;
        font-size: .9rem;
        line-height: 1.6;
        margin-bottom: 16px !important;
    }

    /* ---------- PAGINATION ---------- */
    .pagination-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 48px;
    }

    .page-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1.5px solid #e8e3d6;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .88rem;
        font-weight: 600;
        color: #070d24;
        cursor: pointer;
        transition: all .2s ease;
    }

    .page-btn.active,
    .page-btn:hover {
        background: #b38f51;
        border-color: #b38f51;
        color: #fff;
    }

    .page-btn.arrow svg {
        width: 15px;
        height: 15px;
    }

    /* ---------- NEWSLETTER ---------- */
    .newsletter {
        background: linear-gradient(135deg, #070d24, #152a58);
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

    .newsletter::after {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(179, 143, 81, .35), transparent 70%);
    }

    .newsletter-copy {
        position: relative;
        z-index: 2;
        max-width: 480px;
    }

    .newsletter-copy h2 {
        color: #fff;
        font-size: clamp(1.4rem, 2.2vw, 1.9rem);
        margin: 14px 0 10px;
        font-weight: 700;
    }

    .newsletter-copy p {
        color: rgba(255, 255, 255, .68);
        font-size: .96rem;
    }

    .newsletter-form {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        width: 100%;
        max-width: 420px;
    }

    .newsletter-form input {
        flex: 1;
        min-width: 200px;
        padding: 14px 20px;
        border-radius: 999px;
        border: 1.5px solid rgba(255, 255, 255, .2);
        background: rgba(255, 255, 255, .06);
        color: #fff;
        font-size: .92rem;
        font-family: 'Poppins', sans-serif;
    }

    .newsletter-form input::placeholder {
        color: rgba(255, 255, 255, .5);
    }

    .newsletter-form input:focus {
        outline: none;
        border-color: #b38f51;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .featured-card {
            grid-template-columns: 1fr;
        }

        .featured-media {
            min-height: 280px;
        }

        .featured-body {
            padding: 32px 30px;
        }

        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 680px) {
        section {
            padding: 60px 0;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }

        .newsletter {
            flex-direction: column;
            align-items: flex-start;
            padding: 36px 26px;
        }

        .newsletter-form {
            max-width: 100%;
        }

        .featured-body {
            padding: 28px 24px;
        }
    }
</style>

<!-- TOP BANNER -->
<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">News &amp; Updates</h1>
        <p class="text-center mt-2">Product releases, company milestones and perspectives from the team building at Devotion Technologies.</p>
    </div>
</section>

<!-- FEATURED ARTICLE -->
<section style="padding-bottom:0;">
    <div class="container">
        <div class="featured-card">
            <div class="featured-media">
                <img src="assets/images/team.jpg" alt="Featured news cover">
                <span class="cat-chip">Company News</span>
            </div>
            <div class="featured-body">
                <div class="featured-meta">
                    <span>September 8, 2026</span>
                    <span class="sep"></span>
                    <span>6 min read</span>
                </div>
                <h3>Devotion Technologies crosses 500 delivered projects across 12 countries</h3>
                <p class="excerpt">A look back at how a two-person consultancy grew into a distributed engineering team, and what we're focused on building next as we scale our managed cloud and cybersecurity practice.</p>
                <a href="#" class="read-link">Read full story
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- NEWS GRID WITH FILTERS -->
<section id="news">
    <div class="container">
        <div class="section-head" style="margin-bottom:32px;">
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Latest Stories
            </div>
            <h2>Browse by category</h2>
            <p>Everything from product launches to the engineering practices behind them.</p>
        </div>

        <div class="tabs" id="tabs">
            <button class="tab-btn active" data-cat="all">All Updates</button>
            <button class="tab-btn" data-cat="company">Company News</button>
            <button class="tab-btn" data-cat="product">Product Updates</button>
            <button class="tab-btn" data-cat="insights">Industry Insights</button>
            <button class="tab-btn" data-cat="events">Events</button>
        </div>

        <div class="news-grid" id="newsGrid">

            <!-- Company News -->
            <div class="news-card" data-cat="company">
                <div class="news-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                    <span class="cat-chip">Company News</span>
                </div>
                <div class="news-body">
                    <span class="news-date">August 22, 2026</span>
                    <h4>We've opened a new delivery hub to support APAC clients</h4>
                    <p class="excerpt">Faster overlap with clients in Singapore and Australia, without adding handoff delays to existing projects.</p>
                    <a href="news-detail.php" class="read-link">Read more
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Product Update -->
            <div class="news-card" data-cat="product">
                <div class="news-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                    <span class="cat-chip">Product Update</span>
                </div>
                <div class="news-body">
                    <span class="news-date">August 14, 2026</span>
                    <h4>Our managed backup service now supports hourly recovery points</h4>
                    <p class="excerpt">Clients on our Backup &amp; Recovery plan can now restore infrastructure to any point in the last 30 days.</p>
                    <a href="news-detail.php" class="read-link">Read more
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Industry Insight -->
            <div class="news-card" data-cat="insights">
                <div class="news-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                    <span class="cat-chip">Industry Insights</span>
                </div>
                <div class="news-body">
                    <span class="news-date">August 5, 2026</span>
                    <h4>Why most cloud migrations go over budget — and how to avoid it</h4>
                    <p class="excerpt">Three cost drivers we consistently see in migration projects, and the planning steps that keep them in check.</p>
                    <a href="news-detail.php" class="read-link">Read more
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Event -->
            <div class="news-card" data-cat="events">
                <div class="news-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                    <span class="cat-chip">Event</span>
                </div>
                <div class="news-body">
                    <span class="news-date">July 29, 2026</span>
                    <h4>Join us at TechConnect Summit 2026 in Austin</h4>
                    <p class="excerpt">Our CTO will be speaking on building resilient systems for distributed engineering teams.</p>
                    <a href="news-detail.php" class="read-link">Read more
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Company News -->
            <div class="news-card" data-cat="company">
                <div class="news-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                    <span class="cat-chip">Company News</span>
                </div>
                <div class="news-body">
                    <span class="news-date">July 18, 2026</span>
                    <h4>Devotion Technologies achieves SOC 2 Type II compliance</h4>
                    <p class="excerpt">An independent audit confirms our security controls meet SOC 2 standards across all managed services.</p>
                    <a href="news-detail.php" class="read-link">Read more
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Product Update -->
            <div class="news-card" data-cat="product">
                <div class="news-photo">
                    <img src="assets/images/team.jpg" alt="News thumbnail">
                    <span class="cat-chip">Product Update</span>
                </div>
                <div class="news-body">
                    <span class="news-date">July 9, 2026</span>
                    <h4>New dashboard gives clients live visibility into ticket status</h4>
                    <p class="excerpt">Help desk and network management clients can now track resolution times in a single portal.</p>
                    <a href="#" class="read-link">Read more
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <div class="pagination-row">
            <button class="page-btn arrow" aria-label="Previous page">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 6l-6 6 6 6" />
                </svg>
            </button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn arrow" aria-label="Next page">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 6l6 6-6 6" />
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- NEWSLETTER CTA -->
<section class="container" style="padding-top:0;">
    <div class="newsletter">
        <div class="newsletter-copy">
            <span class="eyebrow" style="color:#b38f51;">Stay In The Loop</span>
            <h2>Get updates delivered to your inbox</h2>
            <p>One email a month — product releases, company news and the occasional deep dive. No spam.</p>
        </div>
        <form class="newsletter-form" action="#" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="btn btn-gold">Subscribe</button>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('#tabs .tab-btn');
        var cards = document.querySelectorAll('#newsGrid .news-card');

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