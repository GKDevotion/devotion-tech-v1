<?php
    $seo = [
        'title' => 'Frequently Asked Questions | Devotion Technologies FAQs',
        'description' => 'Find answers to common questions about Devotion Technologies services, web development, software solutions, digital services, and technology solutions.',
        'keywords' => 'Devotion Technologies FAQs, technology services FAQ, web development questions, software development FAQ, IT solutions questions, digital services FAQ',
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

    .section-head h2 {
        font-size: clamp(1.7rem, 2.6vw, 2.3rem);
        font-weight: 700;
        margin: 0px 0 12px;
        line-height: 1.25;
    }

    .section-head p {
        color: var(--muted);
        font-size: 1rem;
    }

    /* HERO */
    .hero {
        position: relative;
        padding: 80px 0 50px;
        overflow: hidden;
        background: #f6f6f8;
        text-align: center;
    }

    .hero::before {
        content: "";
        position: absolute;
        top: -140px;
        left: 50%;
        transform: translateX(-50%);
        width: 720px;
        height: 720px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(170, 128, 56, 0.13), transparent 70%);
    }

    .hero-inner {
        position: relative; 
        margin: 0 auto;
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        border: 1px solid #e8e8ee;
        color: #aa8038;
        font-size: 13px;
        font-weight: 700;
        padding: 8px 18px;
        border-radius: 30px;
        margin-bottom: 22px;
    }

    .eyebrow::before {
        content: "●";
        font-size: 9px;
    }

    .hero h1 {
        font-size: 40px;
        font-weight: 800;
        margin-bottom: 16px;
        line-height: 1.2;
    }

    .hero p {
        color: #6b7280;
        font-size: 16px;
    }

    /* SEARCH */
    .faq-search {
        max-width: 520px;
        margin: 34px auto 0;
        position: relative;
    }

    .faq-search input {
        width: 100%;
        padding: 15px 20px 15px 48px;
        border-radius: 30px;
        border: 1px solid #e8e8ee;
        font-size: 14.5px;
        outline: none;
    }

    .faq-search input:focus {
        border-color: #aa8038;
    }

    .faq-search .icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
    }


    /* ACCORDION */
    .accordion-item {
        border-top: 1px solid #e8e8ee;
    }

    .accordion-item:last-child {
        border-bottom: 1px solid #e8e8ee;
    }

    .accordion-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 22px 0;
        cursor: pointer;
    }

    .accordion-head h4 {
        font-size: 1rem;
        font-weight: 700;
    }

    .accordion-item.open .accordion-head h4 {
        color: #aa8038;
        font-size: 1rem;
    }

    .accordion-toggle {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        border: 1.5px solid #e8e8ee;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        color: #1a1d29;
        transition: .2s;
    }

    .accordion-item.open .accordion-toggle {
        background: #aa8038;
        border-color: #aa8038;
        color: #fff;
        transform: rotate(45deg);
    }

    .accordion-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height .3s ease;
    }

    .accordion-item.open .accordion-body {
        max-height: 600px;
    }

    .accordion-body-inner {
        padding: 0 0 26px;
    }

    .accordion-body-inner p {
        color: #6b7280;
        font-size: 1rem;
        margin-bottom: 14px;
    }

    .accordion-body-inner ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .accordion-body-inner li {
        display: flex;
        gap: 10px;
        font-size: 14.5px;
        color: #1a1d29;
        font-weight: 600;
    }

    .check {
        color: #aa8038;
        font-weight: 800;
    }

    /* CATEGORY TABS FOR FULL FAQ SECTION */
    .section-label {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 90px 0 32px;
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

    .cat-tabs {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 36px;
    }

    .cat-tab {
        font-size: 13.5px;
        font-weight: 700;
        padding: 10px 20px;
        border-radius: 30px;
        border: 1px solid #e8e8ee;
        color: #6b7280;
        cursor: pointer;
        background: #fff;
    }

    .cat-tab.active {
        background: #aa8038;
        border-color: #aa8038;
        color: #fff;
    }

    .faq-group {
        display: none;
    }

    .faq-group.active {
        display: block;
    }

    .simple-accordion {
        border: 1px solid #e8e8ee;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 60px;
    }

    .simple-accordion .accordion-item {
        border-top: 1px solid #e8e8ee;
    }

    .simple-accordion .accordion-item:first-child {
        border-top: none;
    }

    .simple-accordion .accordion-head {
        padding: 20px 24px;
    }

    .simple-accordion .accordion-body-inner {
        padding: 0 24px 22px;
    }

    .simple-accordion .accordion-item.open {
        background: #f6f6f8;
    }

    /* STILL HAVE QUESTIONS */
    .still-have {
        background: #0d1330;
        color: #fff;
        border-radius: 16px;
        padding: 50px 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        flex-wrap: wrap; 
        position: relative;
        overflow: hidden;
    }

    .still-have::before {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(170, 128, 56, 0.35), transparent 70%);
    }

    .still-have h3 {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 8px;
        position: relative;
    }

    .still-have p {
        color: #b9bcd2;
        font-size: 14.5px;
        position: relative;
    }

    .still-have-buttons {
        display: flex;
        gap: 12px;
        position: relative;
        flex-wrap: wrap;
    }

    .still-have-buttons a {
        padding: 13px 24px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
    }

    .btn-primary {
        background: #aa8038;
        color: #fff;
    }

    .btn-primary:hover {
        background: #8a672c;
    }

    .btn-outline {
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        color: #fff;
    }

    .btn-outline:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    @media (max-width:900px) {
        .intro-section {
            grid-template-columns: 1fr;
        }

        .still-have {
            padding: 36px 30px;
        }
    }

    @media (max-width:600px) {
        .hero h1 {
            font-size: 28px;
        }

        .accordion-head h4 {
            font-size: 14.5px;
        }
    }
</style>

<!-- HERO -->
<section class="hero">
    <div class="container hero-inner"> 
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Help Center
        </div>
        <h1>Answers to everything you want to know about working with us</h1>
        <p>Browse by category or search directly — if you can't find what you need, our team is one message away.</p>
        <div class="faq-search">
            <span class="icon">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" placeholder="Search for a question...">
        </div>
    </div>
</section>

<div class="container">
    <!-- FULL FAQ LIBRARY BY CATEGORY --> 

    <div class="container section-head mt-5"> 
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Browse All Questions
        </div>
        <h2 class="mb-4">Everything you need to know, answered clearly</h2>
    </div>

    <div class="cat-tabs">
        <div class="cat-tab active" data-group="general">General</div>
        <div class="cat-tab" data-group="pricing">Pricing & Billing</div>
        <div class="cat-tab" data-group="onboarding">Getting Started</div>
        <div class="cat-tab" data-group="security">Security & Compliance</div>
        <div class="cat-tab" data-group="support">Support & SLAs</div>
    </div>

    <!-- GENERAL -->
    <div class="faq-group active" id="general">
        <div class="simple-accordion">
            <div class="accordion-item open" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>What industries do you typically work with?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>We work across fintech, healthcare, logistics, e-commerce, and professional services — though our core focus is any growing business that needs reliable, scalable IT without an in-house team to run it.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Do you work with businesses outside our region?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Yes, we support clients across multiple countries with a mix of remote monitoring and, where needed, local on-site partners for hardware-related work.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>How is Devotion Technology different from other IT providers?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>We pair proactive monitoring with a strategy-first approach — we don't just fix what breaks, we help you plan the roadmap so fewer things break in the first place.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PRICING -->
    <div class="faq-group" id="pricing">
        <div class="simple-accordion">
            <div class="accordion-item open" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>How is pricing structured for managed IT services?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Most engagements are priced per-device or per-user monthly, with add-ons for security, backup, and consulting hours. We'll always give you a clear quote before any commitment.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Are there any long-term contracts required?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>We offer both monthly and annual plans. Annual plans come with a discount, but nothing locks you into multi-year terms unless you specifically want that structure.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>What's included in the base support plan?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Helpdesk support, patch management, and basic monitoring are standard. Backup, advanced security, and strategic consulting are available as add-on tiers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ONBOARDING -->
    <div class="faq-group" id="onboarding">
        <div class="simple-accordion">
            <div class="accordion-item open" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>How long does onboarding usually take?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Most clients are fully onboarded within 2–3 weeks, depending on the size of the environment and how much documentation already exists.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Will we lose access to our systems during migration?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>No — we plan migrations in phases specifically to avoid downtime, with rollback plans ready in case anything needs to be reversed.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Do we need to replace our existing tools?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Not usually. We integrate with most existing tools first and only recommend replacements where there's a clear gap in coverage or reliability.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECURITY -->
    <div class="faq-group" id="security">
        <div class="simple-accordion">
            <div class="accordion-item open" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Are you compliant with industry security standards?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>We align our practices with common frameworks like SOC 2 and ISO 27001 principles, and can support compliance-specific requirements like HIPAA depending on your industry.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Who has access to our data?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Access is role-based and logged. Only the engineers directly assigned to your account have access, and all activity is auditable.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>What happens if there's a security incident?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Our incident response process kicks in immediately — containment first, then root-cause analysis, then a full report and remediation plan shared with you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SUPPORT -->
    <div class="faq-group" id="support">
        <div class="simple-accordion">
            <div class="accordion-item open" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>What are your guaranteed response times?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Critical issues are acknowledged within 15 minutes, high-priority within 1 hour, and standard requests within 24 hours — all documented in your service agreement.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>Is support available outside business hours?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Yes, our helpdesk operates 24/7 for critical issues. Non-urgent requests submitted after hours are picked up first thing the next business day.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item" onclick="toggleAccordion(this)">
                <div class="accordion-head">
                    <h4>What happens if an SLA is missed?</h4>
                    <div class="accordion-toggle">+</div>
                </div>
                <div class="accordion-body">
                    <div class="accordion-body-inner">
                        <p>Our contracts include service credits for missed SLAs, and any miss triggers an internal review to prevent it from happening again.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- STILL HAVE QUESTIONS -->
    <div class="still-have" id="contact">
        <div>
            <h3>Still have questions?</h3>
            <p>Our team is happy to walk through anything specific to your setup.</p>
        </div>
        <div class="still-have-buttons">
            <a href="#" class="btn-primary">Contact Support</a>
            <a href="#" class="btn-outline">Book A Free Call</a>
        </div>
    </div>

</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>