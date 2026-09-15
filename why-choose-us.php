<?php
    $seo = [
        'title' => 'Why Choose Us | Devotion Technologies - Technology Experts & Innovators',
        'description' => 'See why businesses choose Devotion Technologies as their technology partner — senior-led teams, transparent delivery, security-first engineering and support that outlasts launch day.',
        'keywords' => 'why choose Devotion Technologies, IT company benefits, software development partner, trusted technology partner, digital transformation experts',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>
 
<style>

    :root {
        --gold: #b38f51;
        --gold-dark: #8f7040;
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

    .btn-outline-dark {
        border: 1.5px solid var(--border);
        color: var(--navy);
    }

    .btn-outline-dark:hover {
        border-color: var(--gold);
        color: var(--gold-dark);
    }

    section {
        padding: 90px 0;
    }

    /* ---------- SPLIT HERO ---------- */
    .wcu-hero {
        background: linear-gradient(160deg, var(--navy) 10%, #0d1a3d 60%, var(--navy-soft) 100%);
        padding: 90px 0 70px;
        overflow: hidden;
    }

    .wcu-hero .row-hero {
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        gap: 56px;
        align-items: center;
    }

    .wcu-hero h1 {
        color: #fff;
        font-size: clamp(2.1rem, 3.8vw, 3rem);
        font-weight: 700;
        line-height: 1.2;
        margin: 18px 0 20px;
    }

    .wcu-hero p.lead {
        color: rgba(255, 255, 255, .7);
        font-size: 1.2rem;
        max-width: 500px;
        margin-bottom: 30px !important;
    }

    .hero-stack {
        display: grid;
        gap: 16px;
    }

    .hero-stat-card {
        background: rgba(255, 255, 255, .05);
        border: 1px solid rgba(255, 255, 255, .12);
        border-radius: 16px;
        padding: 22px 26px;
        display: flex;
        align-items: center;
        gap: 18px;
        backdrop-filter: blur(6px);
    }

    .hero-stat-card strong {
        font-size: 1.9rem;
        font-weight: 800;
        color: var(--gold);
        min-width: 84px;
    }

    .hero-stat-card span {
        color: rgba(255, 255, 255, .75);
        font-size: 1.2rem;
        line-height: 1.5;
    }

    /* ---------- SECTION HEAD ---------- */
    .section-head {
        margin-bottom: 56px;
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

    /* ---------- ZIGZAG FEATURE ROWS ---------- */
    .zigzag-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .zigzag-row + .zigzag-row {
        margin-top: 84px;
    }

    .zigzag-row.reverse .zz-media {
        order: 2;
    }

    .zigzag-row.reverse .zz-copy {
        order: 1;
    }

    .zz-media {
        position: relative;
    }

    .zz-media img {
        border-radius: 18px;
        width: 100%;
        height: 340px;
        object-fit: cover;
    }

    .zz-media .zz-badge {
        position: absolute;
        bottom: -18px;
        right: -14px;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 14px 18px;
        box-shadow: 0 18px 40px -20px rgba(10, 19, 48, .28);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .zigzag-row.reverse .zz-media .zz-badge {
        right: auto;
        left: -14px;
    }

    .zz-badge .ico {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #f2e8d3;
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
    }

    .zz-badge .ico svg {
        width: 18px;
        height: 18px;
    }

    .zz-badge strong {
        display: block;
        font-size: .95rem;
        color: var(--navy);
    }

    .zz-badge span {
        font-size: 1rem;
        color: var(--muted);
    }

    .zz-copy .zz-step {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--gold-dark);
        letter-spacing: .04em;
        margin-bottom: 12px;
        display: block;
    }

    .zz-copy h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 14px;
        line-height: 1.35;
    }

    .zz-copy p {
        color: var(--muted);
        font-size: 1.2rem;
        line-height: 1.75;
        margin-bottom: 18px !important;
    }

    .zz-copy ul {
        display: grid;
        gap: 10px;
    }

    .zz-copy ul li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 1.2rem;
        color: #2c303c;
    }

    .zz-copy ul svg {
        width: 20px;
        height: 20px;
        color: var(--gold-dark);
        flex: none;
        margin-top: 4px;
    }

    /* ---------- BY THE NUMBERS BAND ---------- */
    .numbers-band {
        background: var(--navy);
        border-radius: 26px;
    }

    .numbers-band .wrap {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        padding: 50px 20px;
    }

    .numbers-band .num {
        text-align: center;
        border-right: 1px solid rgba(255, 255, 255, .1);
        padding: 0 12px;
    }

    .numbers-band .num:last-child {
        border-right: none;
    }

    .numbers-band .num strong {
        display: block;
        font-size: clamp(1.9rem, 3vw, 2.5rem);
        font-weight: 800;
        color: #fff;
    }

    .numbers-band .num span {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, .6);
    }

    /* ---------- OBJECTIONS ACCORDION ---------- */
    .objections {
        background: var(--cream);
    }

    .objection-list { 
        margin: 0 auto;
        display: grid;
        gap: 14px;
    }

    .objection-item {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
    }

    .objection-q {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 20px 24px;
        cursor: pointer;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--navy);
    }

    .objection-q .plus {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--cream);
        color: var(--gold-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
        transition: transform .25s ease, background .25s ease;
    }

    .objection-q .plus svg {
        width: 14px;
        height: 14px;
    }

    .objection-item.open .objection-q .plus {
        background: var(--gold);
        color: #fff;
        transform: rotate(45deg);
    }

    .objection-a {
        max-height: 0;
        overflow: hidden;
        transition: max-height .3s ease;
    }

    .objection-a p {
        padding: 0 24px 22px;
        color: var(--muted);
        font-size: 1.1rem;
        line-height: 1.75;
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
        .wcu-hero .row-hero {
            grid-template-columns: 1fr;
        }

        .zigzag-row,
        .zigzag-row.reverse {
            grid-template-columns: 1fr;
        }

        .zigzag-row.reverse .zz-media,
        .zigzag-row.reverse .zz-copy {
            order: initial;
        }

        .numbers-band .wrap {
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .numbers-band .num:nth-child(2) {
            border-right: none;
        }

        .trust-logos {
            gap: 30px;
        }
    }

    @media (max-width: 680px) {
        section {
            padding: 60px 0;
        }

        .zigzag-row + .zigzag-row {
            margin-top: 56px;
        }

        .zz-media .zz-badge,
        .zigzag-row.reverse .zz-media .zz-badge {
            position: static;
            margin-top: 14px;
            box-shadow: none;
        }

        .numbers-band .wrap {
            grid-template-columns: 1fr 1fr;
            padding: 36px 16px;
        }

        .careers {
            flex-direction: column;
            align-items: flex-start;
            padding: 36px 26px;
        }
    }
</style>

<!-- SPLIT HERO -->
<section class="wcu-hero">
    <div class="container">
        <div class="row-hero">
            <div>
                <span class="eyebrow">Why Devotion Technologies</span>
                <h1>The technology partner clients don't feel the need to shop around from</h1>
                <p class="lead">Plenty of vendors can write code. What keeps clients here is what happens around the code — the communication, the honesty about scope, and the support that doesn't disappear after launch.</p>
                <a href="#zigzag" class="btn btn-gold">See What That Looks Like</a>
            </div>
            <div class="hero-stack">
                <div class="hero-stat-card">
                    <strong>98%</strong>
                    <span>of clients rate delivery as on-time and on-scope</span>
                </div>
                <div class="hero-stat-card">
                    <strong>500+</strong>
                    <span>projects delivered without a single missed handover</span>
                </div>
                <div class="hero-stat-card">
                    <strong>4.9<span style="font-size:1rem;">/5</span></strong>
                    <span>average client rating across post-project reviews</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ZIGZAG DIFFERENTIATORS -->
<section id="zigzag">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                What's Actually Different
            </div>
            <h2>Four things clients notice within the first sprint</h2>
            <p>Not a features list — the specific habits that change how a project feels to be part of.</p>
        </div>

        <div class="zigzag-row">
            <div class="zz-media">
                <img src="assets/images/team.jpg" alt="Senior engineers pairing on a project">
                <div class="zz-badge">
                    <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3 6.5 7 1-5.2 5 1.3 7-6.1-3.4-6.1 3.4 1.3-7-5.2-5 7-1z" /></svg></div>
                    <div>
                        <strong>Senior-led</strong>
                        <span>Every pod, every project</span>
                    </div>
                </div>
            </div>
            <div class="zz-copy">
                <span class="zz-step">01 — Who's actually doing the work</span>
                <h3>You get engineers who've shipped this before, not trainees learning on your budget</h3>
                <p>Every engagement is staffed with people who've built production systems elsewhere first. That means fewer avoidable mistakes, and architecture decisions made with the next two years in mind — not just this sprint's ticket.</p>
                <ul>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>Minimum 5 years' production experience per lead engineer</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>Same team from kickoff through handover</li>
                </ul>
            </div>
        </div>

        <div class="zigzag-row reverse">
            <div class="zz-media">
                <img src="assets/images/team.jpg" alt="Weekly demo call with a client">
                <div class="zz-badge">
                    <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3 7l9 6 9-6" /></svg></div>
                    <div>
                        <strong>No black boxes</strong>
                        <span>Weekly demos, always</span>
                    </div>
                </div>
            </div>
            <div class="zz-copy">
                <span class="zz-step">02 — How you stay in the loop</span>
                <h3>You see working software every week, not a status email you have to interpret</h3>
                <p>Instead of slide decks, we walk through what's actually running in a staging environment you can access yourself. If something's behind, you hear it plainly — along with what moved it and what we're doing about it.</p>
                <ul>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>A named project manager, not a rotating point of contact</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>Shared sprint boards you can check any time</li>
                </ul>
            </div>
        </div>

        <div class="zigzag-row">
            <div class="zz-media">
                <img src="assets/images/team.jpg" alt="Security review session">
                <div class="zz-badge">
                    <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2" /><path d="M8 10V7a4 4 0 018 0v3" /></svg></div>
                    <div>
                        <strong>SOC 2 Type II</strong>
                        <span>Independently audited</span>
                    </div>
                </div>
            </div>
            <div class="zz-copy">
                <span class="zz-step">03 — How seriously we take security</span>
                <h3>Security is reviewed at design time, not bolted on after an incident</h3>
                <p>Access control, data handling and infrastructure hardening are part of the architecture conversation from day one. Our controls are independently audited, so you're not taking our word for it.</p>
                <ul>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>SOC 2 Type II compliant across managed services</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>Documented access controls for every environment</li>
                </ul>
            </div>
        </div>

        <div class="zigzag-row reverse">
            <div class="zz-media">
                <img src="assets/images/team.jpg" alt="Support engineer monitoring dashboards">
                <div class="zz-badge">
                    <div class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4" /><path d="M4 21c1.5-4 5-6 8-6s6.5 2 8 6" /></svg></div>
                    <div>
                        <strong>Still here</strong>
                        <span>Long after launch</span>
                    </div>
                </div>
            </div>
            <div class="zz-copy">
                <span class="zz-step">04 — What happens after launch</span>
                <h3>The team that built it is the one you call when something needs attention</h3>
                <p>No handoff to an anonymous support queue. Managed monitoring, backups and a direct line to your original engineers mean issues get fixed by people who already understand the system.</p>
                <ul>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>99.9% uptime SLA on managed infrastructure</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5" /></svg>Direct access to the engineers who built your system</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- BY THE NUMBERS -->
<section class="container" style="padding-top:0;">
    <div class="numbers-band">
        <div class="wrap">
            <div class="num">
                <strong>2.5K+</strong>
                <span>Businesses empowered</span>
            </div>
            <div class="num">
                <strong>500+</strong>
                <span>Projects delivered</span>
            </div>
            <div class="num">
                <strong>12</strong>
                <span>Countries with team members</span>
            </div>
            <div class="num">
                <strong>99.9%</strong>
                <span>Average infrastructure uptime</span>
            </div>
        </div>
    </div>
</section>

<!-- OBJECTIONS ACCORDION -->
<section class="objections">
    <div class="container">
        <div class="section-head text-center mx-auto">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                Before You Decide
            </div>
            <h2>Questions clients usually ask before signing on</h2>
            <p class="mx-auto">The honest answers to what most vendors avoid addressing directly.</p>
        </div>
        <div class="objection-list" id="objectionList">
            <div class="objection-item open">
                <div class="objection-q">
                    <span>Aren't distributed teams harder to manage than a local agency?</span>
                    <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 5v14M5 12h14" /></svg></span>
                </div>
                <div class="objection-a">
                    <p>In our experience, the opposite — a distributed team means someone is almost always in working hours during yours. Every client gets a named project manager as a single point of contact regardless of time zone, so you're never coordinating across a dozen people yourself.</p>
                </div>
            </div>
            <div class="objection-item">
                <div class="objection-q">
                    <span>What happens if we need to change scope mid-project?</span>
                    <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 5v14M5 12h14" /></svg></span>
                </div>
                <div class="objection-a">
                    <p>Scope changes are common and expected. Any change is quoted and approved before it enters a sprint, so you always know the cost and timeline impact upfront — nothing is quietly absorbed and billed later.</p>
                </div>
            </div>
            <div class="objection-item">
                <div class="objection-q">
                    <span>Do we own the code and infrastructure once the project ends?</span>
                    <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 5v14M5 12h14" /></svg></span>
                </div>
                <div class="objection-a">
                    <p>Yes, entirely. Source code, documentation and infrastructure configuration all transfer to you at handover. There's no vendor lock-in built into how we work.</p>
                </div>
            </div>
            <div class="objection-item">
                <div class="objection-q">
                    <span>How do you handle support after the contract ends?</span>
                    <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 5v14M5 12h14" /></svg></span>
                </div>
                <div class="objection-a">
                    <p>Most clients move onto a managed support or retainer plan, staffed by engineers who already know the system. If you'd rather take everything in-house, we provide full documentation and a structured knowledge-transfer session at handover.</p>
                </div>
            </div>
        </div>
    </div>
</section>
 
<!-- CTA -->
<section class="container" style="padding-top:100px;">
    <div class="careers">
        <div class="careers-copy">
            <span class="eyebrow" style="color:var(--gold);">Ready When You Are</span>
            <h2>Let's talk about what you're building</h2>
            <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
        </div>
        <div class="careers-actions">
            <a href="#" class="btn btn-gold">Book A Discovery Call</a>
            <a href="team.php" class="btn btn-outline-light">Meet Our Team</a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var items = document.querySelectorAll('#objectionList .objection-item');

        function setHeight(item, open) {
            var answer = item.querySelector('.objection-a');
            answer.style.maxHeight = open ? answer.scrollHeight + 'px' : 0;
        }

        items.forEach(function (item) {
            setHeight(item, item.classList.contains('open'));

            item.querySelector('.objection-q').addEventListener('click', function () {
                var isOpen = item.classList.contains('open');
                items.forEach(function (i) {
                    i.classList.remove('open');
                    setHeight(i, false);
                });
                if (!isOpen) {
                    item.classList.add('open');
                    setHeight(item, true);
                }
            });
        });
    });
</script>

<?php 
include_once('elements/footer.php');
?>