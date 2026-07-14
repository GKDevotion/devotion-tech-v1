<?php
    $seo = [
        'title' => 'Career Opportunities | Devotion Technologies - Join Our Team',
        'description' => 'Explore career opportunities at Devotion Technologies and discover exciting roles to build your skills, grow professionally, and contribute to innovative technology solutions.',
        'keywords' => 'Devotion Technologies careers, technology jobs, IT jobs, software developer jobs, web developer careers, join Devotion Technologies team',
        'author' => 'Devotion Technologies'
    ];
    include_once('elements/header.php');
?>

<style>
 
    a {
        color: inherit;
        text-decoration: none;
    }

    ul {
        padding-left: 20px;
    }

    li {
        margin-bottom: 8px;
    }

    .cta-btn {
        background: #aa8038;
        color: #fff;
        padding: 11px 22px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        border: none;
        cursor: pointer;
    }

    /* HERO */
    .hero {
        background: linear-gradient(180deg, #efe9de 0%, #f3eee5 60%, #ffffff 100%);
        padding: 50px 20px 60px;
    }

    .hero-inner {
        margin: 0 auto;
        padding: 0 40px;
    }

    .breadcrumb {
        font-size: 1rem;
        color: #7b8199;
        margin-bottom: 22px;
        font-weight: 600;
    }

    .breadcrumb a {
        color: #b57a3f;
    }

    .breadcrumb .sep {
        margin: 0 8px;
        color: #c9c2b3;
    }

    .hero-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 24px;
    }

    .hero h1 {
        font-size: 38px;
        color: #aa8038;
        font-weight: 800;
        margin-bottom: 16px;
        letter-spacing: -0.5px;
        max-width: 640px;
    }

    .hero-meta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .job-tag {
        font-size: 0.9rem;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 20px;
    }

    .job-tag.dept {
        background: #faf3e8;
        color: #b57a3f;
    }

    .job-tag.loc {
        background: #eef1f8;
        color: #4c5b8f;
    }

    .job-tag.type {
        background: #eef7f0;
        color: #2f7d4f;
    }

    .job-tag.exp {
        background: #fdf2f1;
        color: #b5443a;
    }

    .hero-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
        align-items: flex-end;
    }

    .apply-btn {
        background: #aa8038;
        color: #fff;
        padding: 13px 28px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14.5px;
        white-space: nowrap;
    }

    .posted-note {
        font-size: 1rem;
        color: #7b8199;
    }

    /* LAYOUT */
    .page-wrap {
        margin: 0 auto;
        padding: 60px 40px 100px;
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 50px;
    }

    main.content section {
        margin-bottom: 36px;
    }

    main.content h2 {
        color: #aa8038;
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 16px;
        letter-spacing: -0.3px;
    }

    main.content p {
        margin-bottom: 14px;
        color: #4a5170;
    }

    main.content ul {
        margin-bottom: 14px;
    }

    main.content li {
        color: #4a5170;
    }

    main.content li::marker {
        color: #b57a3f;
    }

    .note-box {
        background: #faf3e8;
        border: 1px solid #ecdcc0;
        border-radius: 10px;
        padding: 18px 22px;
        font-size: 14.5px;
        color: #1b2036;
        margin: 18px 0;
    }

    .note-box strong {
        color: #b57a3f;
    }

    /* SIDEBAR */
    aside.job-sidebar {
        align-self: start;
        position: sticky;
        top: 100px;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .side-card {
        background: #f7f5f0;
        border: 1px solid #e7e3da;
        border-radius: 12px;
        padding: 24px 22px;
    }

    .side-card h4 {
        font-size: 1rem;
        letter-spacing: 1.2px;
        color: #000;
        margin-bottom: 16px;
        font-weight: 700;
    }

    .overview-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e7e3da;
        font-size: 13.8px;
    }

    .overview-row:last-child {
        border-bottom: none;
    }

    .overview-row .k {
        color: #aa8038;
        font-weight: 500;
    }

    .overview-row .v {
        color: #1b2036;
        font-weight: 700;
        text-align: right;
    }

    .side-card .apply-btn {
        width: 100%;
        text-align: center;
        margin-top: 10px;
        display: block;
    }

    .share-row {
        display: flex;
        gap: 10px;
    }

    .share-circle {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid #e7e3da;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
        color: #aa8038;
    }

    .referral-card {
        background: #aa8038;
        color: #fff;
        border-radius: 12px;
        padding: 22px 20px;
    }

    .referral-card h4 {
        color: #fff;
        font-size: 14.5px;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .referral-card p {
        font-size: 1rem;
        color: #fff;
        margin-bottom: 14px;
    }

    .referral-card a {
        color: #fff;
        font-weight: 600;
        font-size: 0.8rem;
    }

    /* RELATED ROLES */
    .related-section {
        background: #f7f5f0;
        padding: 70px 60px;
    }

    .related-inner {
        max-width: 1180px;
        margin: 0 auto;
    }

    .section-head {
        text-align: center;
        max-width: 600px;
        margin: 0 auto 40px;
    }

    .section-head h2 {
        font-size: 28px;
        color: #aa8038;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .section-head p {
        color: #7b8199;
        font-size: 15px;
    }

    .job-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .job-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        border: 1px solid #e7e3da;
        border-radius: 12px;
        padding: 22px 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .job-info h4 {
        color: #aa8038;
        font-size: 16.5px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .job-meta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .job-apply {
        background: #aa8038;
        color: #fff;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 13.5px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* CONTACT CTA */
    .contact-section {
        margin: 0 auto;
        padding-top: 70px;
    }

    .contact-cta {
        background: #aa8038;
        border-radius: 14px;
        padding: 44px 40px;
        color: #fff;
        text-align: center;
    }

    .contact-cta h3 {
        color: #fff;
        font-size: 24px;
        margin-bottom: 10px;
        font-weight: 800;
    }

    .contact-cta p {
        color: #fff;
        margin-bottom: 22px;
        max-width: 520px;
        margin-left: auto;
        font-size: 1rem;
        margin-right: auto;
    }

    .contact-cta a.btn {
        background: #fff;
        color: #aa8038;
        padding: 12px 26px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 14px;
        display: inline-block;
    }

    @media (max-width:900px) {
        .hero-inner {
            padding: 0 20px;
        }

        .hero-top {
            flex-direction: column;
        }

        .hero-actions {
            align-items: flex-start;
            width: 100%;
        }

        .apply-btn {
            width: 100%;
            text-align: center;
        }

        .page-wrap {
            grid-template-columns: 1fr;
            padding: 40px 20px 60px;
        }

        aside.job-sidebar {
            position: static;
        }

        .related-section,
        .contact-section {
            padding: 50px 20px;
        }

        .job-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .hero h1 {
            font-size: 28px;
        }
    }
</style>

<section class="hero">
    <div class="hero-inner container">
        <div class="breadcrumb">
            <a href="careers.html">Careers</a><span class="sep">/</span>
            <a href="careers.html#open-roles">Open Roles</a><span class="sep">/</span>
            Senior Network Engineer
        </div>

        <div class="hero-top">
            <div>
                <div class="badge-pill mb-4">
                    <span class="dot"></span>
                    Infrastructure
                </div>
                <h1>Senior Network Engineer</h1>
                <div class="hero-meta">
                    <span class="job-tag dept">Infrastructure</span>
                    <span class="job-tag loc">Hybrid · Dubai, UAE</span>
                    <span class="job-tag type">Full-time</span>
                    <span class="job-tag exp">5+ Years Experience</span>
                </div>
            </div>
            <div class="hero-actions">
                <a href="#apply" class="apply-btn">Apply For This Role →</a>
                <span class="posted-note">Posted July 8, 2026 · 12 applicants</span>
            </div>
        </div>
    </div>
</section>

<div class="page-wrap container">
    <main class="content">

        <section>
            <h2>About The Role</h2>
            <p>Devotion Technology is looking for a Senior Network Engineer to design, implement, and maintain robust network infrastructure for our growing client base. You'll work directly with clients across industries to architect resilient, secure, and scalable networks — and mentor junior engineers along the way.</p>
            <p>This role sits within our Infrastructure team and reports to the Head of Managed Services. You'll split your time between client sites, our Dubai office, and remote work, depending on project needs.</p>
        </section>

        <section>
            <h2>What You'll Do</h2>
            <ul>
                <li>Design and implement LAN, WAN, and wireless network architecture for client environments</li>
                <li>Configure and maintain routers, switches, firewalls, and VPN infrastructure</li>
                <li>Lead network security reviews and implement hardening best practices</li>
                <li>Troubleshoot complex network issues and provide Tier 3 escalation support</li>
                <li>Plan and execute network migrations, upgrades, and capacity expansions</li>
                <li>Document network architecture and maintain configuration standards</li>
                <li>Mentor junior network engineers and support technicians</li>
                <li>Collaborate with the sales team on technical scoping for new client proposals</li>
            </ul>
        </section>

        <section>
            <h2>What We're Looking For</h2>
            <ul>
                <li>5+ years of experience in network engineering or infrastructure roles</li>
                <li>Strong hands-on experience with Cisco, Fortinet, or similar enterprise networking equipment</li>
                <li>Solid understanding of routing protocols (BGP, OSPF), VLANs, and network security principles</li>
                <li>Experience with SD-WAN, VPN technologies, and firewall management</li>
                <li>CCNP, CCNA, or equivalent certification preferred</li>
                <li>Excellent troubleshooting skills and a calm approach under pressure</li>
                <li>Strong communication skills — you'll regularly explain technical concepts to non-technical clients</li>
                <li>Willingness to travel to client sites within the region as needed</li>
            </ul>
        </section>

        <section>
            <h2>Nice to Have</h2>
            <ul>
                <li>Experience working in a managed services provider (MSP) environment</li>
                <li>Familiarity with cloud networking (AWS, Azure, or GCP)</li>
                <li>Scripting or automation experience (Python, Ansible)</li>
                <li>Experience mentoring or leading a small technical team</li>
            </ul>
        </section>

        <div class="note-box">
            <strong>Note:</strong> We know great candidates don't always tick every box. If you're excited about this role and meet most of the requirements, we encourage you to apply.
        </div>

        <section>
            <h2>What You'll Get</h2>
            <ul>
                <li>Competitive salary, benchmarked to market and reviewed annually</li>
                <li>Comprehensive medical, dental, and vision coverage</li>
                <li>Generous paid time off plus public holidays</li>
                <li>Annual learning budget for certifications and conferences</li>
                <li>Hybrid working arrangement with flexible scheduling</li>
                <li>Latest equipment and tools to do your best work</li>
            </ul>
        </section>

        <section id="apply">
            <h2>Ready to Apply?</h2>
            <p>Send your resume and a short note about your experience to <strong>careers@devotiontech.com</strong>, or use the button below to apply directly. Our talent team typically responds within 3–5 business days.</p>
            <a href="#" class="apply-btn" style="display:inline-block;">Apply For This Role →</a>
        </section>

    </main>

    <aside class="job-sidebar">
        <div class="side-card">
            <h4>Job Overview</h4>
            <div class="overview-row"><span class="k">Department</span><span class="v">Infrastructure</span></div>
            <div class="overview-row"><span class="k">Location</span><span class="v">Dubai, UAE (Hybrid)</span></div>
            <div class="overview-row"><span class="k">Job Type</span><span class="v">Full-time</span></div>
            <div class="overview-row"><span class="k">Experience</span><span class="v">5+ Years</span></div>
            <div class="overview-row"><span class="k">Salary Range</span><span class="v">Competitive, DOE</span></div>
            <div class="overview-row"><span class="k">Application Deadline</span><span class="v">August 15, 2026</span></div>
            <a href="#apply" class="apply-btn">Apply For This Role →</a>
        </div>

        <div class="side-card">
            <h4>Share This Role</h4>
            <div class="share-row">
                <a href="#" class="share-circle">in</a>
                <a href="#" class="share-circle">X</a>
                <a href="#" class="share-circle">f</a>
                <a href="#" class="share-circle">✉</a>
            </div>
        </div>

        <div class="referral-card">
            <h4>Know someone who'd be perfect?</h4>
            <p>Refer a friend for this role and earn a referral bonus if they're hired.</p>
            <a href="#">Refer a candidate →</a>
        </div>
    </aside>
</div>

<!-- RELATED ROLES -->
<section class="related-section">
    <div class="related-inner">
        <div class="section-head">
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Similar Roles
            </div>
            <h2>Other openings you might like</h2>
            <p>Explore more opportunities across our Infrastructure and Engineering teams.</p>
        </div>
        <div class="job-list">
            <div class="job-card">
                <div class="job-info">
                    <h4>Cloud Solutions Architect</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">Cloud &amp; Infrastructure</span>
                        <span class="job-tag loc">Hybrid</span>
                        <span class="job-tag type">Full-time</span>
                    </div>
                </div>
                <a href="#" class="job-apply">View Role →</a>
            </div>
            <div class="job-card">
                <div class="job-info">
                    <h4>Cybersecurity Analyst</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">Infrastructure</span>
                        <span class="job-tag loc">Remote</span>
                        <span class="job-tag type">Contract</span>
                    </div>
                </div>
                <a href="#" class="job-apply">View Role →</a>
            </div>
            <div class="job-card">
                <div class="job-info">
                    <h4>IT Support Specialist (L2)</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">IT Support</span>
                        <span class="job-tag loc">On-site · Dubai, UAE</span>
                        <span class="job-tag type">Full-time</span>
                    </div>
                </div>
                <a href="#" class="job-apply">View Role →</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT CTA -->
<section class="contact-section container">
    <div class="contact-cta">
        <h3>Don't see the right fit yet?</h3>
        <p>We're always looking for great IT talent. Send us your resume and we'll reach out when the right role opens up.</p>
        <a href="careers.html" class="btn">View All Open Roles</a>
    </div>
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>