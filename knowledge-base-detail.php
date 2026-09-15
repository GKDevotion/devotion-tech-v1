<?php
    $seo = [
        'title' => 'How Weekly Demos and Sprint Reviews Work | Knowledge Base - Devotion Technologies',
        'description' => 'A step-by-step guide to how Devotion Technologies runs weekly demos and sprint reviews, what to expect, and how to prepare feedback between sessions.',
        'keywords' => 'Devotion Technologies knowledge base article, sprint review guide, weekly demo process, project delivery help',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>


<style>
 
    a {
        text-decoration: none;
        color: inherit;
    }

    ul,
    ol {
        margin: 0;
        padding: 0;
        list-style: none;
    } 
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 24px;
        border-radius: 999px;
        font-weight: 600;
        font-size: .9rem;
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

    .btn-outline-dark {
        border: 1.5px solid #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark:hover {
        border-color: #b38f51;
        color: #8f7040;
    }

    /* ---------- BREADCRUMB ---------- */
    .breadcrumb-bar {
        background: #f7f4ee;
        border-bottom: 1px solid #e8e3d6;
        padding: 16px 0;
    }

    .breadcrumb-bar ul {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        font-size: 1.2rem;
        color: #6c7280;
    }

    .breadcrumb-bar a:hover {
        color: #8f7040;
    }

    .breadcrumb-bar li.current {
        color: #070d24;
        font-weight: 600;
    }

    .breadcrumb-bar .sep {
        color: #c7cbd3;
    }

    /* ---------- ARTICLE HEADER ---------- */
    .article-header {
        padding: 52px 0 36px;
        border-bottom: 1px solid #e8e3d6;
    }

    .cat-chip {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #f2e8d3;
        color: #8f7040;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .02em;
        padding: 7px 14px;
        border-radius: 999px;
        margin-bottom: 18px;
    }

    .article-header h1 {
        font-size: clamp(1.7rem, 3vw, 2.5rem);
        font-weight: 700;
        color: #070d24;
        line-height: 1.3;
        max-width: 780px;
        margin-bottom: 20px;
    }

    .article-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 22px;
    }

    .meta-person {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .meta-person img {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        object-fit: cover;
    }

    .meta-person strong {
        display: block;
        font-size: .86rem;
        color: #070d24;
    }

    .meta-person span {
        font-size: 1rem;
        color: #6c7280;
    }

    .meta-stat {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 1rem;
        color: #6c7280;
    }

    .meta-stat svg {
        width: 16px;
        height: 16px;
    }

    /* ---------- BODY LAYOUT ---------- */
    .article-layout {
        display: grid;
        grid-template-columns: 1fr 280px;
        gap: 56px;
        padding: 52px 0 90px;
        align-items: start;
    }

    /* ---------- ARTICLE CONTENT ---------- */

    .article-content p {
        color: #3a3f4d;
        font-size: 1.2rem;
        line-height: 1.85;
        margin-bottom: 20px !important;
    }

    .article-content h2 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #070d24;
        margin: 44px 0 16px;
        scroll-margin-top: 24px;
    }

    .article-content h2:first-child {
        margin-top: 0;
    }

    .article-content h3 {
        font-size: 1.08rem;
        font-weight: 700;
        color: #070d24;
        margin: 28px 0 12px;
    }

    .article-content ul.plain,
    .article-content ol.steps {
        margin-bottom: 20px;
    }

    .article-content ul.plain li {
        position: relative;
        padding-left: 24px;
        color: #3a3f4d;
        font-size: 1.2rem;
        line-height: 1.75;
        margin-bottom: 10px;
    }

    .article-content ul.plain li::before {
        content: "";
        position: absolute;
        left: 0;
        top: 11px;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #b38f51;
    }

    .article-content ol.steps {
        counter-reset: step;
        display: grid;
        gap: 16px;
    }

    .article-content ol.steps li {
        counter-increment: step;
        position: relative;
        padding: 16px 20px 16px 58px;
        background: #fbfaf7;
        border: 1px solid #e8e3d6;
        border-radius: 12px;
        font-size: 1.2rem;
        color: #2c303c;
        line-height: 1.65;
    }

    .article-content ol.steps li strong {
        color: #070d24;
    }

    .article-content ol.steps li::before {
        content: counter(step);
        position: absolute;
        left: 18px;
        top: 20px;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: #070d24;
        color: #b38f51;
        font-weight: 700;
        font-size: .82rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .callout {
        display: flex;
        gap: 14px;
        border-radius: 14px;
        padding: 18px 22px;
        margin: 24px 0;
    }

    .callout svg {
        width: 20px;
        height: 20px;
        flex: none;
        margin-top: 2px;
    }

    .callout p {
        margin-bottom: 0 !important;
        font-size: 1.2rem;
        line-height: 1.65;
    }

    .callout.tip {
        background: #fdf9f2;
        border: 1px solid #eddfc4;
    }

    .callout.tip svg {
        color: #8f7040;
    }

    .callout.tip strong {
        color: #8f7040;
    }

    .callout.note {
        background: #eef2fb;
        border: 1px solid #d7e0f4;
    }

    .callout.note svg {
        color: #4a63b8;
    }

    .callout.note strong {
        color: #33468a;
    }

    .article-figure {
        border: 1px solid #e8e3d6;
        border-radius: 14px;
        overflow: hidden;
        margin: 28px 0;
    }

    .article-figure img {
        width: 100%;
        height: 320px;
        object-fit: cover;
    }

    .article-figure figcaption {
        padding: 12px 18px;
        font-size: 1rem;
        color: #6c7280;
        background: #fbfaf7;
        border-top: 1px solid #e8e3d6;
    }

    .article-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 40px 0 32px;
    }

    .article-tags span {
        border: 1px solid #e8e3d6;
        border-radius: 999px;
        padding: 6px 14px;
        font-size: 1.1rem;
        color: #6c7280;
    }

    /* ---------- FEEDBACK ---------- */
    .feedback-box {
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 26px 28px;
        background: #fbfaf7;
    }

    .feedback-box h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #070d24;
        margin-bottom: 16px;
    }

    .feedback-buttons {
        display: flex;
        gap: 12px;
    }

    .feedback-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1.5px solid #e8e3d6;
        background: #fff;
        border-radius: 999px;
        padding: 10px 20px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #070d24;
        cursor: pointer;
        transition: all .2s ease;
    }

    .feedback-btn svg {
        width: 16px;
        height: 16px;
    }

    .feedback-btn:hover,
    .feedback-btn.selected {
        border-color: #b38f51;
        background: #f2e8d3;
        color: #8f7040;
    }

    .feedback-note {
        margin-top: 14px;
        font-size: .84rem;
        color: #6c7280;
        display: none;
    }

    .feedback-note.show {
        display: block;
    }

    /* ---------- SIDEBAR ---------- */
    .article-sidebar {
        position: sticky;
        top: 105px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .toc-box {
        border: 1px solid #e8e3d6;
        border-radius: 16px;
        padding: 22px 22px 24px;
        background: #fff;
    }

    .toc-box .toc-label {
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: #8f7040;
        margin-bottom: 14px;
        display: block;
    }

    .toc-list li {
        margin-bottom: 4px;
    }

    .toc-list a {
        display: block;
        font-size: 1rem;
        color: #6c7280;
        padding: 8px 12px;
        border-radius: 8px;
        border-left: 2px solid transparent;
        transition: all .2s ease;
    }

    .toc-list a:hover {
        color: #070d24;
        background: #f7f4ee;
    }

    .toc-list a.active {
        color: #8f7040;
        border-left-color: #b38f51;
        background: #fdf9f2;
        font-weight: 600;
    }

    .contact-box {
        border-radius: 16px;
        padding: 24px 22px;
        background: #070d24;
        color: #fff;
    }

    .contact-box h4 {
        font-size: .98rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .contact-box p {
        font-size: 1rem;
        color: rgba(255, 255, 255, .65);
        margin-bottom: 16px !important;
        line-height: 1.6;
    }

    .contact-box .btn {
        width: 100%;
    }

    /* ---------- RELATED ---------- */
    .related-section {
        background: #f7f4ee;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .related-card {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 14px;
        padding: 22px 22px 24px;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px -20px rgba(10, 19, 48, .25);
        border-color: #b38f51;
    }

    .related-card span.tag {
        font-size: 1rem;
        font-weight: 700;
        color: #8f7040;
        letter-spacing: .02em;
        text-transform: uppercase;
    }

    .related-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #070d24;
        margin: 10px 0 8px;
        line-height: 1.45;
    }

    .related-card p {
        font-size: 1rem;
        color: #6c7280;
        margin-bottom: 0;
    }

    section.pad {
        padding: 70px 0;
    }

    .section-head-sm {
        margin-bottom: 30px;
    }

    .section-head-sm h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #070d24;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .article-layout {
            grid-template-columns: 1fr;
        }

        .article-sidebar {
            position: static;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .toc-box,
        .contact-box {
            flex: 1 1 260px;
        }

        .related-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 680px) {
        .article-header {
            padding: 40px 0 28px;
        }

        .article-layout {
            padding: 40px 0 60px;
            gap: 32px;
        }

        .article-sidebar {
            flex-direction: column;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }

        .article-content ol.steps li {
            padding-left: 50px;
        }

        .feedback-buttons {
            flex-wrap: wrap;
        }
    }
</style>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="sep">/</li>
            <li><a href="knowledge-base.php">Knowledge Base</a></li>
            <li class="sep">/</li>
            <li class="current">How Weekly Demos Work</li>
        </ul>
    </div>
</div>

<!-- ARTICLE HEADER -->
<div class="article-header">
    <div class="container">
        <span class="cat-chip">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9" /><path d="M12 7v5l3 3" /></svg>
            Project Delivery
        </span>
        <h1>How weekly demos and sprint reviews work</h1>
        <div class="article-meta">
            <div class="meta-person">
                <img src="assets/images/team.jpg" alt="Author">
                <div>
                    <strong>Daniel Cho</strong>
                    <span>VP of Engineering</span>
                </div>
            </div>
            <span class="meta-stat">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9" /><path d="M12 7v5l3 3" /></svg>
                4 min read
            </span>
            <span class="meta-stat">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" /><path d="M16 2v4M8 2v4M3 10h18" /></svg>
                Updated August 12, 2026
            </span>
        </div>
    </div>
</div>

<!-- ARTICLE BODY + SIDEBAR -->
<div class="container">
    <div class="article-layout">

        <!-- MAIN CONTENT -->
        <article class="article-content">

            <p>Every active engagement at Devotion Technologies runs on a weekly rhythm: a working demo, a short review, and a clear plan for the week ahead. This article walks through what happens in each session, what we need from you, and how to get the most out of the time.</p>

            <div class="callout note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9" /><path d="M12 8v5M12 16h.01" /></svg>
                <p><strong>Applies to:</strong> Fixed-scope and time &amp; materials engagements with an assigned delivery pod. Single-specialist placements follow a lighter version of this process — ask your project manager for specifics.</p>
            </div>

            <h2 id="what-happens">What happens in a weekly demo</h2>
            <p>Demos are held at the end of every sprint and run for 30 to 45 minutes. Rather than a slide deck, the team walks through the actual working software — a feature, an API endpoint, or an infrastructure change — running in a staging environment you can access yourself.</p>
            <ul class="plain">
                <li>The engineer who built the feature walks it through live, not a project manager relaying it secondhand.</li>
                <li>You can interact with what's shown, not just watch a recording.</li>
                <li>Anything not finished is flagged honestly, along with what moved it.</li>
            </ul>

            <h2 id="before-the-call">Before the call: what to prepare</h2>
            <p>A few minutes of preparation on your side makes the session far more useful for both teams.</p>
            <ol class="steps">
                <li><strong>Review the sprint board.</strong> Tickets marked "Ready for review" are what will be demoed — skim titles beforehand so nothing is a surprise.</li>
                <li><strong>Note open questions.</strong> Drop them in the shared channel ahead of time if they need research, so the answer isn't rushed live.</li>
                <li><strong>Have a stakeholder present.</strong> If a decision needs sign-off, the person who can actually approve it should be on the call.</li>
            </ol>

            <h2 id="sprint-review">The sprint review that follows</h2>
            <p>Immediately after the demo, we run a short review covering three things: what got done against what was planned, anything that's blocked, and the priorities for the coming week. This is also where scope changes are raised — never silently absorbed into the existing sprint.</p>

            <div class="article-figure">
                <img src="assets/images/team.jpg" alt="Sprint review board example">
                <figcaption>Example of a shared sprint board used during weekly reviews.</figcaption>
            </div>

            <h3>If a scope change comes up</h3>
            <p>Any request that falls outside the original proposal is scoped and quoted before it's added to a sprint. This keeps timelines and budgets predictable, and means nothing is billed without you seeing it coming first.</p>

            <div class="callout tip">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3 6.5 7 1-5.2 5 1.3 7-6.1-3.4-6.1 3.4 1.3-7-5.2-5 7-1z" /></svg>
                <p><strong>Tip:</strong> If you already know a change is coming, mention it a sprint early. It gives the team time to sequence work around it instead of interrupting one already in progress.</p>
            </div>

            <h2 id="after-the-call">After the call</h2>
            <p>Within a few hours, your project manager shares a short written recap: what was demoed, decisions made, and what's planned for the next sprint. Nothing discussed live is left to memory — if it mattered, it's written down.</p>

            <div class="article-tags">
                <span>Sprint Reviews</span>
                <span>Project Delivery</span>
                <span>Client Onboarding</span>
                <span>Scope Changes</span>
            </div>

            <div class="feedback-box">
                <h4>Was this article helpful?</h4>
                <div class="feedback-buttons">
                    <button type="button" class="feedback-btn" data-choice="yes">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 11v9M2 13v5a2 2 0 002 2h11.5a2 2 0 002-1.4l2-7A2 2 0 0017.6 9H14V4a2 2 0 00-2-2l-3 7v9" /></svg>
                        Yes, it helped
                    </button>
                    <button type="button" class="feedback-btn" data-choice="no">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 13V4M22 11V6a2 2 0 00-2-2H8.5a2 2 0 00-2 1.4l-2 7A2 2 0 006.4 15H10v5a2 2 0 002 2l3-7v-9" /></svg>
                        Not quite
                    </button>
                </div>
                <p class="feedback-note" id="feedbackNote">Thanks — a note has been sent to our documentation team.</p>
            </div>

        </article>

        <!-- SIDEBAR -->
        <aside class="article-sidebar">
            <div class="toc-box">
                <span class="toc-label">On This Page</span>
                <ul class="toc-list" id="tocList">
                    <li><a href="#what-happens">What happens in a demo</a></li>
                    <li><a href="#before-the-call">Preparing beforehand</a></li>
                    <li><a href="#sprint-review">The sprint review</a></li>
                    <li><a href="#after-the-call">After the call</a></li>
                </ul>
            </div>
            <div class="contact-box">
                <h4>Need help with this?</h4>
                <p>If your sprint schedule looks different from this, your project manager can walk you through it.</p>
                <a href="#" class="btn btn-gold">Contact Support</a>
            </div>
        </aside>

    </div>
</div>

<!-- RELATED ARTICLES -->
<section class="pad related-section">
    <div class="container">
        <div class="section-head-sm">
            <h2>Related articles</h2>
        </div>
        <div class="related-grid">
            <a href="#" class="related-card">
                <span class="tag">Project Delivery</span>
                <h4>Requesting a change to project scope</h4>
                <p>How mid-sprint requests are scoped, quoted and approved.</p>
            </a>
            <a href="#" class="related-card">
                <span class="tag">Getting Started</span>
                <h4>How project kickoff calls are structured</h4>
                <p>What's covered in the first 60 minutes of a new engagement.</p>
            </a>
            <a href="#" class="related-card">
                <span class="tag">Billing &amp; Invoices</span>
                <h4>Understanding fixed-scope vs. time &amp; materials billing</h4>
                <p>Which pricing model fits which type of project.</p>
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Feedback buttons
        var feedbackBtns = document.querySelectorAll('.feedback-btn');
        var feedbackNote = document.getElementById('feedbackNote');

        feedbackBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                feedbackBtns.forEach(function (b) { b.classList.remove('selected'); });
                btn.classList.add('selected');
                feedbackNote.classList.add('show');
                feedbackNote.textContent = btn.getAttribute('data-choice') === 'yes'
                    ? 'Glad it helped! Thanks for the feedback.'
                    : 'Thanks for letting us know — we will take a look at improving this article.';
            });
        });

        // Scrollspy for table of contents
        var tocLinks = document.querySelectorAll('#tocList a');
        var headings = document.querySelectorAll('.article-content h2[id]');

        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        tocLinks.forEach(function (link) {
                            link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
                        });
                    }
                });
            }, { rootMargin: '-30% 0px -55% 0px' });

            headings.forEach(function (h) { observer.observe(h); });
        }
    });
</script>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>
