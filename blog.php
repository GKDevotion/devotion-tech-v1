<?php
    $seo = [
        'title' => 'Devotion Technologies Blog | Latest Technology Insights & Industry Updates',
        'description' => 'Stay updated with Devotion Technologies blogs covering the latest trends in software development, web technologies, digital transformation, IT solutions, and industry insights.',
        'keywords' => 'Devotion Technologies blog, technology insights, software development blog, web development trends, IT solutions blog, digital transformation',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>
<style>
    a {
        text-decoration: none;
        color: inherit;
    }

    img {
        max-width: 100%;
        display: block;
        object-fit: cover;
    } 

    /* LAYOUT */
    .layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 52px;
        padding: 60px 0 80px;
        align-items: start;
    }

    .section-label {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 32px;
    }

    .section-label span {
        font-size: 1rem;
        font-weight: 800;
        color: #aa8038;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .section-label::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #e8e8ee;
    }

    /* ARTICLE ROWS */
    .article-row {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 24px;
        padding: 28px 0;
        border-bottom: 1px solid #e8e8ee;
    }

    .article-row:first-child {
        padding-top: 0;
    }

    .article-row img {
        border-radius: 10px;
        aspect-ratio: 4/3;
        width: 100%;
    }

    .article-cat {
        font-size: 1rem;
        font-weight: 800;
        color: #aa8038;
        letter-spacing: 0.4px;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .article-row h3 {
        font-size: 19px;
        font-weight: 800;
        line-height: 1.35;
        margin-bottom: 10px;
    }

    .article-row h3:hover {
        color: #aa8038;
    }

    .article-row p {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 14px;
    }

    .article-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1rem;
        color: #6b7280;
    }

    .article-meta .dot {
        width: 6px;
        height: 6px;
        background: #6b7280;
        border-radius: 50%;
    }

    .avatar-sm {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #aa8038;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10.5px;
        font-weight: 800;
    }

    .load-more {
        display: block;
        text-align: center;
        margin-top: 20px;
        padding: 14px;
        border: 1.5px solid #aa8038;
        color: #aa8038;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
    }

    .load-more:hover {
        background: #aa8038;
        color: #fff;
    }

    /* SIDEBAR */
    .sidebar-block {
        background: #f6f6f8;
        border-radius: 12px;
        padding: 26px;
        margin-bottom: 28px;
    }

    .sidebar-block h4 {
        font-size: 15.5px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .cat-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .cat-list li a {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        font-size: 1rem;
        border-bottom: 1px solid #e8e8ee;
        color: #1a1d29;
    }

    .cat-list li:last-child a {
        border-bottom: none;
    }

    .cat-list li a:hover {
        color: #aa8038;
    }

    .cat-list li a span {
        color: #6b7280;
        font-size: 1rem;
    }

    .popular-post {
        display: flex;
        gap: 14px;
        margin-bottom: 18px;
    }

    .popular-post:last-child {
        margin-bottom: 0;
    }

    .popular-post img {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        flex-shrink: 0;
    }

    .popular-post h5 {
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 6px;
    }

    .popular-post span {
        font-size: 0.8rem;
        color: #6b7280;
    }

    .tag-cloud {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 7px 14px;
        border-radius: 20px;
        background: #fff;
        border: 1px solid #e8e8ee;
        color: #1a1d29;
    }

    .tag:hover {
        background: #aa8038;
        border-color: #aa8038;
        color: #fff;
    }

    .cta-block {
        background: #1a1d29;
        color: #fff;
        border-radius: 12px;
        padding: 30px 26px;
        text-align: center;
    }

    .cta-block h4 {
        font-size: 17px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .cta-block p {
        font-size: 1rem;
        color: #b7b9ca;
        margin-bottom: 20px;
    }

    .cta-block button {
        background: #aa8038;
        color: #fff;
        border: none;
        padding: 12px 26px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13.5px;
        width: 100%;
        cursor: pointer;
    }

    .cta-block button:hover {
        background: #8a672c;
    }


    @media (max-width:900px) {
        .layout {
            grid-template-columns: 1fr;
        }

        .hero {
            height: 360px;
        }
    }

    @media (max-width:600px) {
        .article-row {
            grid-template-columns: 1fr;
        }

        .hero-content h1 {
            font-size: 28px;
        }
    }
</style>

<!-- IMAGE HERO -->
<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">Our Blogs</h1>
        <p class="text-black text-center mt-2">
            Discover valuable insights, expert advice, and the latest trends in technology, development, and digital solutions through our informative blogs.
        </p>
    </div>
</section>

<div class="container">
    <div class="layout">

        <!-- MAIN ARTICLE LIST -->
        <div>
            <div class="section-label"><span>Latest Articles</span></div>

            <div class="article-row">
                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=500&q=80" alt="Server room">
                <div>
                    <div class="article-cat">Cybersecurity</div>
                    <h3><a href="blog-detail.php">Why 24/7 Monitoring Is No Longer Optional for Mid-Sized Businesses</a></h3>
                    <p>A rise in targeted attacks on small and mid-sized companies means always-on monitoring has shifted from a nice-to-have to the baseline.</p>
                    <div class="article-meta">
                        <div class="avatar-sm">RK</div>
                        <span>Ravi Kapoor</span><span class="dot"></span>
                        <span>Jul 2, 2026</span><span class="dot"></span>
                        <span>7 min read</span>
                    </div>
                </div>
            </div>

            <div class="article-row">
                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=500&q=80" alt="Cloud infrastructure">
                <div>
                    <div class="article-cat">Cloud Solutions</div>
                    <h3><a href="blog-detail.php">Migrating Legacy Systems to the Cloud Without Downtime</a></h3>
                    <p>A step-by-step framework for planning a migration your customers never notice.</p>
                    <div class="article-meta">
                        <div class="avatar-sm">SP</div>
                        <span>Sana Patel</span><span class="dot"></span>
                        <span>Jun 28, 2026</span><span class="dot"></span>
                        <span>5 min read</span>
                    </div>
                </div>
            </div>

            <div class="article-row">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&q=80" alt="Team meeting">
                <div>
                    <div class="article-cat">IT Strategy</div>
                    <h3><a href="blog-detail.php">Building an IT Roadmap That Survives Contact With Reality</a></h3>
                    <p>Why most 12-month IT plans fail by month three — and how to design one that doesn't.</p>
                    <div class="article-meta">
                        <div class="avatar-sm">AM</div>
                        <span>Arjun Mehta</span><span class="dot"></span>
                        <span>Jun 21, 2026</span><span class="dot"></span>
                        <span>6 min read</span>
                    </div>
                </div>
            </div>

            <div class="article-row">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=500&q=80" alt="Data dashboard">
                <div>
                    <div class="article-cat">Case Study</div>
                    <h3><a href="blog-detail.php">How RemoteCo Scaled Their Platform to 500K Users</a></h3>
                    <p>An inside look at the backend rebuild that cut load times by 60%.</p>
                    <div class="article-meta">
                        <div class="avatar-sm">NV</div>
                        <span>Neha Verma</span><span class="dot"></span>
                        <span>Jun 14, 2026</span><span class="dot"></span>
                        <span>8 min read</span>
                    </div>
                </div>
            </div>

            <div class="article-row">
                <img src="https://images.unsplash.com/photo-1563206767-5b18f218e8de?w=500&q=80" alt="Lock and security">
                <div>
                    <div class="article-cat">Cybersecurity</div>
                    <h3><a href="blog-detail.php">A Founder's Guide to Ransomware Readiness</a></h3>
                    <p>The five controls that stop most attacks before they start.</p>
                    <div class="article-meta">
                        <div class="avatar-sm">RK</div>
                        <span>Ravi Kapoor</span><span class="dot"></span>
                        <span>Jun 7, 2026</span><span class="dot"></span>
                        <span>4 min read</span>
                    </div>
                </div>
            </div>

            <a href="#" class="load-more">Load More Articles</a>
        </div>

        <!-- SIDEBAR -->
        <div>
            <div class="sidebar-block">
                <h4>Categories</h4>
                <ul class="cat-list">
                    <li><a href="javascript:void();">Cloud Solutions <span>18</span></a></li>
                    <li><a href="javascript:void();">Cybersecurity <span>24</span></a></li>
                    <li><a href="javascript:void();">IT Strategy <span>15</span></a></li>
                    <li><a href="javascript:void();">Case Studies <span>9</span></a></li>
                    <li><a href="javascript:void();">Backup & Recovery <span>11</span></a></li>
                </ul>
            </div>

            <div class="sidebar-block">
                <h4>Popular This Month</h4>
                <div class="popular-post">
                    <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=140&q=80" alt="Popular post">
                    <div>
                        <h5>Outsourced vs In-House IT: What Actually Costs Less</h5>
                        <span>Jun 22, 2026</span>
                    </div>
                </div>
                <div class="popular-post">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=140&q=80" alt="Popular post">
                    <div>
                        <h5>Disaster Recovery Plans Most Teams Get Wrong</h5>
                        <span>May 30, 2026</span>
                    </div>
                </div>
                <div class="popular-post">
                    <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=140&q=80" alt="Popular post">
                    <div>
                        <h5>Network Segmentation for Growing Teams</h5>
                        <span>May 12, 2026</span>
                    </div>
                </div>
            </div>

            <div class="sidebar-block">
                <h4>Popular Tags</h4>
                <div class="tag-cloud">
                    <span class="tag">Cloud</span>
                    <span class="tag">Security</span>
                    <span class="tag">DevOps</span>
                    <span class="tag">Backup</span>
                    <span class="tag">Strategy</span>
                    <span class="tag">Networking</span>
                    <span class="tag">Automation</span>
                </div>
            </div>

            <div class="cta-block">
                <h4>Need IT support?</h4>
                <p>Talk to our team about a free infrastructure assessment.</p>
                <button>Book A Free Call</button>
            </div>
        </div>

    </div>
</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>