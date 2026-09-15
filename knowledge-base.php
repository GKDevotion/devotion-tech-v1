<?php
$seo = [
    'title' => 'Knowledge Base | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'Search guides, how-tos and answers on working with Devotion Technologies — from onboarding and billing to cloud, security and support.',
    'keywords' => 'Devotion Technologies knowledge base, help center, support articles, IT documentation, client onboarding guides',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');
?>

<style>
    a {
        text-decoration: none;
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

    section {
        padding: 90px 0;
    }

    .section-head {
        margin-bottom: 40px;
    }

    .section-head h2 {
        font-size: clamp(1.6rem, 2.4vw, 2.1rem);
        font-weight: 700;
        margin: 14px 0 12px;
        line-height: 1.25;
        color: #070d24;
    }

    .section-head p {
        color: #6c7280;
        font-size: 1.2rem;
    }

    /* ---------- KB HERO WITH SEARCH ---------- */
    .kb-hero {
        background: linear-gradient(160deg, #070d24 10%, #0d1a3d 60%, #152a58 100%);
        padding: 84px 24px 100px;
        text-align: center;
        position: relative;
    }

    .kb-hero .eyebrow {
        color: #c9a25f;
        font-size: 1.2rem;
        justify-content: center;
    }

    .kb-hero h1 {
        color: #fff;
        font-weight: 700;
        font-size: clamp(2rem, 3.6vw, 2.8rem);
        margin: 16px 0 14px;
    }

    .kb-hero p.lead {
        color: rgba(255, 255, 255, .7);
        margin: 0 auto 34px;
        font-size: 1.2rem;
    }

    .kb-search {
        max-width: 620px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border-radius: 999px;
        padding: 8px 8px 8px 24px;
        box-shadow: 0 20px 45px -18px rgba(0, 0, 0, .4);
    }

    .kb-search svg {
        width: 19px;
        height: 19px;
        color: #6c7280;
        flex: none;
    }

    .kb-search input {
        flex: 1;
        border: none;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: .96rem;
        padding: 10px 0;
        color: #1a1f30;
    }

    .kb-search input::placeholder {
        color: #9aa0ab;
    }

    .kb-search button {
        border: none;
        background: #b38f51;
        color: #fff;
        font-weight: 600;
        font-size: .9rem;
        padding: 13px 26px;
        border-radius: 999px;
        cursor: pointer;
        transition: background .2s ease;
        white-space: nowrap;
    }

    .kb-search button:hover {
        background: #8f7040;
    }

    .kb-trending {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
        font-size: 1rem;
    }

    .kb-trending span.lbl {
        color: rgba(255, 255, 255, .5);
    }

    .kb-trending a {
        color: rgba(255, 255, 255, .85);
        border-bottom: 1px dotted rgba(255, 255, 255, .4);
    }

    .kb-trending a:hover {
        color: #b38f51;
        border-color: #b38f51;
    }

    /* ---------- QUICK TOPIC TILES (overlapping hero) ---------- */
    .topic-tiles {
        margin-top: -56px;
        position: relative;
        z-index: 3;
    }

    .topic-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 18px;
    }

    .topic-tile {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 22px 18px;
        text-align: center;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .topic-tile:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px -20px rgba(10, 19, 48, .28);
        border-color: #b38f51;
    }

    .topic-tile .ico {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #f2e8d3;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
    }

    .topic-tile .ico svg {
        width: 22px;
        height: 22px;
    }

    .topic-tile h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #070d24;
        margin-bottom: 4px;
    }

    .topic-tile span {
        font-size: 1rem;
        color: #6c7280;
    }

    /* ---------- SIDEBAR + ARTICLE LAYOUT ---------- */
    .kb-layout {
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 44px;
        align-items: start;
    }

    .kb-sidebar {
        position: sticky;
        top: 103px;
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 10px;
    }

    .kb-sidebar a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 13px 16px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 500;
        color: #1a1f30;
        transition: background .2s ease, color .2s ease;
    }

    .kb-sidebar a .count {
        font-size: .74rem;
        color: #6c7280;
        background: #f7f4ee;
        border-radius: 999px;
        padding: 2px 9px;
    }

    .kb-sidebar a:hover {
        background: #f7f4ee;
    }

    .kb-sidebar a.active {
        background: #070d24;
        color: #fff;
    }

    .kb-sidebar a.active .count {
        background: rgba(255, 255, 255, .15);
        color: #fff;
    }

    .kb-category-block {
        margin-bottom: 54px;
        scroll-margin-top: 24px;
    }

    .kb-category-block:last-child {
        margin-bottom: 0;
    }

    .kb-category-head {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 22px;
        padding-bottom: 18px;
        border-bottom: 1px solid #e8e3d6;
    }

    .kb-category-head .ico {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #070d24;
        color: #b38f51;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
    }

    .kb-category-head .ico svg {
        width: 20px;
        height: 20px;
    }

    .kb-category-head h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #070d24;
    }

    .kb-category-head p {
        font-size: 1rem;
        color: #6c7280;
    }

    .article-list {
        display: grid;
        gap: 12px;
    }

    .article-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 12px;
        padding: 16px 20px;
        transition: border-color .2s ease, transform .2s ease;
    }

    .article-row:hover {
        border-color: #b38f51;
        transform: translateX(3px);
    }

    .article-row .a-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #070d24;
        margin-bottom: 3px;
        display: block;
    }

    .article-row .a-meta {
        font-size: 1rem;
        color: #6c7280;
    }

    .article-row .a-arrow {
        flex: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f7f4ee;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s ease, color .2s ease;
    }

    .article-row .a-arrow svg {
        width: 15px;
        height: 15px;
    }

    .article-row:hover .a-arrow {
        background: #b38f51;
        color: #fff;
    }

    /* ---------- SUPPORT CTA ---------- */
    .support-strip {
        background: #f7f4ee;
        border-radius: 24px;
        padding: 44px 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 28px;
        flex-wrap: wrap;
    }

    .support-strip .left {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .support-strip .ico {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: #070d24;
        color: #b38f51;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
    }

    .support-strip .ico svg {
        width: 24px;
        height: 24px;
    }

    .support-strip h4 {
        font-size: 1.08rem;
        font-weight: 700;
        color: #070d24;
        margin-bottom: 4px;
    }

    .support-strip p {
        font-size: 1.2rem;
        color: #6c7280;
    }

    .support-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-outline-dark2 {
        border: 1.5px solid #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark2:hover {
        border-color: #b38f51;
        color: #8f7040;
        background: #fff;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .topic-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .kb-layout {
            grid-template-columns: 1fr;
        }

        .kb-sidebar {
            position: static;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .kb-sidebar a {
            flex: 1 1 auto;
            justify-content: center;
        }

        .kb-sidebar a .count {
            display: none;
        }
    }

    @media (max-width: 680px) {
        section {
            padding: 60px 0;
        }

        .kb-hero {
            padding: 64px 20px 90px;
        }

        .kb-search {
            flex-wrap: wrap;
            border-radius: 20px;
            padding: 16px;
        }

        .kb-search button {
            width: 100%;
        }

        .topic-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .article-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .support-strip {
            flex-direction: column;
            align-items: flex-start;
            padding: 32px 26px;
        }
    }
</style>

<!-- KB HERO / SEARCH -->
<section class="kb-hero">
    <div class="container">
        <span class="eyebrow">Knowledge Base</span>
        <h1>How can we help you today?</h1>
        <p class="lead">Search guides on onboarding, billing, cloud infrastructure, security and working with your Devotion Technologies team.</p>
        <form class="kb-search" action="#" method="get">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7" />
                <path d="M21 21l-4.3-4.3" />
            </svg>
            <input type="text" name="q" placeholder="Search articles, e.g. &ldquo;update billing details&rdquo;">
            <button type="submit">Search</button>
        </form>
        <div class="kb-trending">
            <span class="lbl">Popular:</span>
            <a href="#getting-started">Getting started</a>
            <a href="#billing">Billing &amp; invoices</a>
            <a href="#cloud">Cloud &amp; hosting</a>
            <a href="#security">Security</a>
        </div>
    </div>
</section>

<!-- QUICK TOPIC TILES -->
<div class="container topic-tiles">
    <div class="topic-grid">
        <a href="#getting-started" class="topic-tile">
            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M13 2L4 14h7l-1 8 9-12h-7z" />
                </svg></div>
            <h4>Getting Started</h4>
            <span>6 articles</span>
        </a>
        <a href="#billing" class="topic-tile">
            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="5" width="18" height="14" rx="2" />
                    <path d="M3 10h18" />
                </svg></div>
            <h4>Billing &amp; Invoices</h4>
            <span>5 articles</span>
        </a>
        <a href="#cloud" class="topic-tile">
            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M7 18a4.5 4.5 0 01-.5-8.98A5.5 5.5 0 0117 8.5a4 4 0 010 9.5H7z" />
                </svg></div>
            <h4>Cloud &amp; Hosting</h4>
            <span>8 articles</span>
        </a>
        <a href="#security" class="topic-tile">
            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="4" y="10" width="16" height="10" rx="2" />
                    <path d="M8 10V7a4 4 0 018 0v3" />
                </svg></div>
            <h4>Security</h4>
            <span>7 articles</span>
        </a>
        <a href="#projects" class="topic-tile">
            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 3" />
                </svg></div>
            <h4>Project Delivery</h4>
            <span>4 articles</span>
        </a>
    </div>
</div>

<!-- SIDEBAR + ARTICLE LIBRARY -->
<section>
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                Full Library
            </div>
            <h2>Browse every article by category</h2>
            <p>Jump to a category on the left, or keep scrolling to see everything we've documented.</p>
        </div>

        <div class="kb-layout">
            <!-- Sidebar navigation -->
            <nav class="kb-sidebar" id="kbNav">
                <a href="#getting-started" class="active">Getting Started <span class="count">6</span></a>
                <a href="#billing">Billing &amp; Invoices <span class="count">5</span></a>
                <a href="#cloud">Cloud &amp; Hosting <span class="count">8</span></a>
                <a href="#security">Security <span class="count">7</span></a>
                <a href="#projects">Project Delivery <span class="count">4</span></a>
            </nav>

            <!-- Article groups -->
            <div class="kb-content">

                <div class="kb-category-block" id="getting-started">
                    <div class="kb-category-head">
                        <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M13 2L4 14h7l-1 8 9-12h-7z" />
                            </svg></div>
                        <div>
                            <h3>Getting Started</h3>
                            <p>Onboarding, account setup and your first project kickoff.</p>
                        </div>
                    </div>
                    <div class="article-list">
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">What to expect during onboarding</span>
                                <span class="a-meta">4 min read &middot; Updated Aug 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Setting up your client portal account</span>
                                <span class="a-meta">3 min read &middot; Updated Jul 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">How project kickoff calls are structured</span>
                                <span class="a-meta">5 min read &middot; Updated Jul 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                    </div>
                </div>

                <div class="kb-category-block" id="billing">
                    <div class="kb-category-head">
                        <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="M3 10h18" />
                            </svg></div>
                        <div>
                            <h3>Billing &amp; Invoices</h3>
                            <p>Payment methods, invoice schedules and contract terms.</p>
                        </div>
                    </div>
                    <div class="article-list">
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">How to update your billing details</span>
                                <span class="a-meta">2 min read &middot; Updated Aug 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Understanding fixed-scope vs. time &amp; materials billing</span>
                                <span class="a-meta">4 min read &middot; Updated Jun 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Requesting a copy of a past invoice</span>
                                <span class="a-meta">2 min read &middot; Updated Jun 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                    </div>
                </div>

                <div class="kb-category-block" id="cloud">
                    <div class="kb-category-head">
                        <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M7 18a4.5 4.5 0 01-.5-8.98A5.5 5.5 0 0117 8.5a4 4 0 010 9.5H7z" />
                            </svg></div>
                        <div>
                            <h3>Cloud &amp; Hosting</h3>
                            <p>Managed infrastructure, uptime and environment configuration.</p>
                        </div>
                    </div>
                    <div class="article-list">
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">How our 99.9% uptime SLA is measured</span>
                                <span class="a-meta">3 min read &middot; Updated Aug 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Requesting a staging environment</span>
                                <span class="a-meta">3 min read &middot; Updated Jul 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">How scheduled maintenance windows work</span>
                                <span class="a-meta">2 min read &middot; Updated May 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                    </div>
                </div>

                <div class="kb-category-block" id="security">
                    <div class="kb-category-head">
                        <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="4" y="10" width="16" height="10" rx="2" />
                                <path d="M8 10V7a4 4 0 018 0v3" />
                            </svg></div>
                        <div>
                            <h3>Security</h3>
                            <p>Access control, compliance and how we handle client data.</p>
                        </div>
                    </div>
                    <div class="article-list">
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Our SOC 2 Type II compliance, explained</span>
                                <span class="a-meta">5 min read &middot; Updated Aug 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Setting up two-factor authentication on your account</span>
                                <span class="a-meta">2 min read &middot; Updated Jul 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Reporting a suspected security incident</span>
                                <span class="a-meta">3 min read &middot; Updated Jun 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                    </div>
                </div>

                <div class="kb-category-block" id="projects">
                    <div class="kb-category-head">
                        <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M12 7v5l3 3" />
                            </svg></div>
                        <div>
                            <h3>Project Delivery</h3>
                            <p>Sprints, demos, scope changes and handover documentation.</p>
                        </div>
                    </div>
                    <div class="article-list">
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">How weekly demos and sprint reviews work</span>
                                <span class="a-meta">4 min read &middot; Updated Aug 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                        <a href="knowledge-base-detail.php" class="article-row">
                            <div>
                                <span class="a-title">Requesting a change to project scope</span>
                                <span class="a-meta">3 min read &middot; Updated Jul 2026</span>
                            </div>
                            <span class="a-arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                                    <path d="M9 6l6 6-6 6" />
                                </svg></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- SUPPORT CTA -->
<section class="container" style="padding-top:0;">
    <div class="support-strip">
        <div class="left">
            <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                </svg></div>
            <div>
                <h4>Still can't find your answer?</h4>
                <p>Our support team typically replies within one business day.</p>
            </div>
        </div>
        <div class="support-actions">
            <a href="#" class="btn btn-gold">Contact Support</a>
            <a href="#" class="btn btn-outline-dark2">Browse FAQs</a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navLinks = document.querySelectorAll('#kbNav a');

        function setActive(id) {
            navLinks.forEach(function(link) {
                link.classList.toggle('active', link.getAttribute('href') === '#' + id);
            });
        }

        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                setActive(link.getAttribute('href').substring(1));
            });
        });

        var blocks = document.querySelectorAll('.kb-category-block');
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        setActive(entry.target.id);
                    }
                });
            }, {
                rootMargin: '-40% 0px -50% 0px'
            });

            blocks.forEach(function(block) {
                observer.observe(block);
            });
        }
    });
</script>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>