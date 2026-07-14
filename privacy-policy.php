<?php
    $seo = [
        'title' => 'Privacy Policy | Devotion Technologies Commitment to Data Security',
        'description' => 'Read Devotion Technologies privacy policy to understand our approach to data collection, protection, security practices, and responsible handling of user information.',
        'keywords' => 'Devotion Technologies privacy, data security, information protection, user privacy policy, website security policy, digital privacy',
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

    /* HERO */
    .hero {
        position: relative;
        padding: 80px 0 80px;
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
        max-width: 640px;
        margin: 0 auto;
    }
 

    .hero h1 {
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 14px;
        line-height: 1.2;
    }

    .hero p {
        color: #6b7280;
        font-size: 15.5px;
    }

    .last-updated {
        display: inline-block;
        margin-top: 20px;
        font-size: 13px;
        color: #6b7280;
        background: #fff;
        border: 1px solid #e8e8ee;
        padding: 8px 18px;
        border-radius: 20px;
    }

    /* LAYOUT */
    .layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 56px;
        padding: 70px 0 70px;
        align-items: start;
    }

    /* TOC SIDEBAR */
    .toc-sidebar {
        position: sticky;
        top: 100px;
        background: #f6f6f8;
        border-radius: 14px;
        padding: 26px;
    }

    .toc-sidebar h4 {
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 16px;
        color: #1a1d29;
    }

    .toc-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 4px;
        padding: 0px;
    }

    .toc-list a {
        display: block;
        font-size: 1rem;
        color: #6b7280;
        padding: 8px 10px;
        border-radius: 8px;
    }

    .toc-list a:hover,
    .toc-list a.active {
        /* background:#fff; */
        color: #aa8038;
    }

    .toc-num {
        color: #aa8038;
        font-weight: 800;
        margin-right: 6px;
    }

    /* CONTENT */
    .policy-content h2 {
        font-size: 22px;
        font-weight: 800;
        margin: 44px 0 16px;
        padding-top: 10px;
        scroll-margin-top: 100px;
    }

    .policy-content h2:first-child {
        margin-top: 0;
    }

    .policy-content h3 {
        font-size: 16.5px;
        font-weight: 800;
        margin: 26px 0 12px;
    }

    .policy-content p {
        font-size: 1rem;
        color: #33384a;
        margin-bottom: 18px;
    }

    .policy-content ul,
    .policy-content ol {
        margin: 0 0 18px 22px;
        color: #33384a;
        font-size: 1rem;
    }

    .policy-content li {
        margin-bottom: 10px;
    }

    .policy-content strong {
        color: #1a1d29;
    }

    .highlight-box {
        background: #fbf6ee;
        border: 1px solid #ecd9b6;
        border-radius: 12px;
        padding: 22px 24px;
        margin: 26px 0;
    }

    .highlight-box p {
        margin-bottom: 0;
        font-size: 1rem;
    }

    /* DATA TABLE */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin: 22px 0 30px;
        font-size: 1rem;
        border: 1px solid #e8e8ee;
        border-radius: 12px;
        overflow: hidden;
    }

    .data-table thead {
        background: #1a1d29;
        color: #fff;
    }

    .data-table th {
        text-align: left;
        padding: 13px 16px;
        font-weight: 700;
    }

    .data-table td {
        padding: 13px 16px;
        border-top: 1px solid #e8e8ee;
        color: #33384a;
    }

    .data-table tr:nth-child(even) td {
        background: #f6f6f8;
    }

    /* RIGHTS GRID */
    .rights-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin: 20px 0 30px;
    }

    .right-card {
        border: 1px solid #e8e8ee;
        border-radius: 12px;
        padding: 18px 20px;
    }

    .right-card h5 {
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 6px;
        color: #aa8038;
    }

    .right-card p {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 0;
    }

    /* CONTACT BOX */
    .contact-box {
        background: #0d1330;
        color: #fff;
        border-radius: 14px;
        padding: 32px 34px;
        margin-top: 40px;
    }

    .contact-box h4 {
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .contact-box p {
        color: #fff;
        font-size: 1rem;
        margin-bottom: 14px;
    }

    .contact-box a {
        color: #aa8038;
        background: #fff;
        padding: 11px 22px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13.5px;
        display: inline-block;
    }

    @media (max-width:900px) {
        .layout {
            grid-template-columns: 1fr;
        }

        .toc-sidebar {
            position: static;
        }

        .rights-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width:600px) {
        .hero h1 {
            font-size: 26px;
        }

        .data-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>

<!-- HERO -->
<section class="hero">
    <div class="container hero-inner">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Legal
        </div>
        <h1>Privacy Policy</h1>
        <p>This policy explains what personal data Devotion Technology collects, why we collect it, and the choices and rights you have over it.</p>
        <span class="last-updated">Last updated: July 1, 2026</span>
    </div>
</section>

<div class="container">
    <div class="layout">

        <!-- TOC SIDEBAR -->
        <div class="toc-sidebar">
            <h4>On This Page</h4>
            <ul class="toc-list">
                <li><a href="#overview"><span class="toc-num">01</span>Overview</a></li>
                <li><a href="#info-we-collect"><span class="toc-num">02</span>Information We Collect</a></li>
                <li><a href="#how-we-use"><span class="toc-num">03</span>How We Use Your Information</a></li>
                <li><a href="#legal-basis"><span class="toc-num">04</span>Legal Basis for Processing</a></li>
                <li><a href="#sharing"><span class="toc-num">05</span>How We Share Information</a></li>
                <li><a href="#retention"><span class="toc-num">06</span>Data Retention</a></li>
                <li><a href="#security"><span class="toc-num">07</span>How We Protect Your Data</a></li>
                <li><a href="#rights"><span class="toc-num">08</span>Your Privacy Rights</a></li>
                <li><a href="#transfers"><span class="toc-num">09</span>International Transfers</a></li>
                <li><a href="#children"><span class="toc-num">10</span>Children's Privacy</a></li>
                <li><a href="#changes"><span class="toc-num">11</span>Changes to This Policy</a></li>
                <li><a href="#contact"><span class="toc-num">12</span>Contact Us</a></li>
            </ul>
        </div>

        <!-- POLICY CONTENT -->
        <div class="policy-content">

            <h2 id="overview">1. Overview</h2>
            <p>Devotion Technology ("we", "us", "our") provides IT consulting, managed services, and software development for businesses. This Privacy Policy describes how we collect, use, disclose, and safeguard information when you visit our website, engage our services, or otherwise interact with us.</p>
            <p>By using our website or services, you agree to the practices described in this policy. If you do not agree, please discontinue use of our site and contact us with any concerns.</p>

            <h2 id="info-we-collect">2. Information We Collect</h2>
            <p>We collect information in a few different ways, depending on how you interact with us:</p>
            <ul>
                <li><strong>Information you provide directly</strong> — such as your name, email, phone number, and company details when you submit a contact form, request a consultation, or subscribe to our newsletter.</li>
                <li><strong>Information collected automatically</strong> — such as IP address, browser type, device information, pages visited, and referring URLs, collected via cookies and similar technologies (see our Cookie Policy for details).</li>
                <li><strong>Information from client engagements</strong> — including project-related data shared with us as part of delivering IT services, which is handled under the terms of the applicable service agreement.</li>
                <li><strong>Information from third parties</strong> — such as data from analytics providers, scheduling tools, or public sources used to verify business inquiries.</li>
            </ul>

            <h2 id="how-we-use">3. How We Use Your Information</h2>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Respond to inquiries and provide requested consultations or quotes</li>
                <li>Deliver, maintain, and improve our services</li>
                <li>Communicate updates, invoices, and support-related information</li>
                <li>Send marketing communications, where you've opted in, which you can unsubscribe from at any time</li>
                <li>Analyze site usage to improve content, performance, and user experience</li>
                <li>Detect, prevent, and address fraud, security incidents, or technical issues</li>
                <li>Comply with legal obligations</li>
            </ul>

            <h2 id="legal-basis">4. Legal Basis for Processing</h2>
            <p>Where applicable data protection law requires it, we rely on the following legal bases to process personal data:</p>
            <ul>
                <li><strong>Consent</strong> — for optional cookies and marketing communications</li>
                <li><strong>Contractual necessity</strong> — to deliver services you've engaged us for</li>
                <li><strong>Legitimate interests</strong> — to improve our website, prevent fraud, and operate our business</li>
                <li><strong>Legal obligation</strong> — where processing is required to comply with applicable law</li>
            </ul>

            <h2 id="sharing">5. How We Share Information</h2>
            <p>We do not sell personal information. We may share information in the following circumstances:</p>
            <ul>
                <li><strong>Service providers</strong> — vendors who support our operations, such as hosting, analytics, email delivery, and scheduling tools, under contractual confidentiality obligations</li>
                <li><strong>Business transfers</strong> — in connection with a merger, acquisition, or sale of assets, subject to standard confidentiality protections</li>
                <li><strong>Legal requirements</strong> — where disclosure is required to comply with law, protect our rights, or ensure the safety of others</li>
                <li><strong>With your consent</strong> — in any other case where you've explicitly agreed to the sharing</li>
            </ul>

            <div class="highlight-box">
                <p><strong>Note:</strong> project data shared with us during a client engagement is governed by the confidentiality and data-processing terms of your specific service agreement, which take precedence over this general policy where applicable.</p>
            </div>

            <h2 id="retention">6. Data Retention</h2>
            <p>We retain personal information only as long as necessary to fulfill the purposes described in this policy, unless a longer retention period is required by law, contract, or legitimate business need (such as maintaining records for tax or audit purposes).</p>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Data Type</th>
                        <th>Typical Retention Period</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Contact form / inquiry submissions</td>
                        <td>Up to 24 months from last contact</td>
                    </tr>
                    <tr>
                        <td>Newsletter subscriptions</td>
                        <td>Until you unsubscribe</td>
                    </tr>
                    <tr>
                        <td>Client project & billing records</td>
                        <td>Duration of contract plus applicable legal/tax requirements</td>
                    </tr>
                    <tr>
                        <td>Website analytics data</td>
                        <td>Up to 26 months</td>
                    </tr>
                </tbody>
            </table>

            <h2 id="security">7. How We Protect Your Data</h2>
            <p>We apply administrative, technical, and physical safeguards designed to protect personal information from unauthorized access, disclosure, alteration, or destruction, including encryption in transit, access controls, and regular security reviews.</p>
            <p>No method of transmission or storage is 100% secure, and while we work to protect your information, we cannot guarantee absolute security.</p>

            <h2 id="rights">8. Your Privacy Rights</h2>
            <p>Depending on your location, you may have some or all of the following rights regarding your personal information:</p>

            <div class="rights-grid">
                <div class="right-card">
                    <h5>Access</h5>
                    <p>Request a copy of the personal data we hold about you.</p>
                </div>
                <div class="right-card">
                    <h5>Correction</h5>
                    <p>Ask us to correct inaccurate or incomplete information.</p>
                </div>
                <div class="right-card">
                    <h5>Deletion</h5>
                    <p>Request that we delete your personal information, subject to legal exceptions.</p>
                </div>
                <div class="right-card">
                    <h5>Objection</h5>
                    <p>Object to certain types of processing, including direct marketing.</p>
                </div>
                <div class="right-card">
                    <h5>Portability</h5>
                    <p>Request your data in a portable format where technically feasible.</p>
                </div>
                <div class="right-card">
                    <h5>Withdraw Consent</h5>
                    <p>Withdraw previously given consent at any time, without affecting prior processing.</p>
                </div>
            </div>

            <p>To exercise any of these rights, please contact us using the details at the end of this policy. We may need to verify your identity before processing certain requests.</p>

            <h2 id="transfers">9. International Transfers</h2>
            <p>As we work with clients and service providers in multiple countries, your information may be transferred to, stored, and processed in a country other than your own. Where required, we use appropriate safeguards, such as standard contractual clauses, to protect data transferred internationally.</p>

            <h2 id="children">10. Children's Privacy</h2>
            <p>Our website and services are intended for businesses and individuals over the age of 18. We do not knowingly collect personal information from children. If you believe a child has provided us with personal information, please contact us so we can remove it.</p>

            <h2 id="changes">11. Changes to This Policy</h2>
            <p>We may update this Privacy Policy periodically to reflect changes in our practices, technologies, legal requirements, or other factors. We'll post any changes on this page with a revised "last updated" date, and where changes are significant, we'll take reasonable steps to notify you.</p>

            <h2 id="contact">12. Contact Us</h2>
            <p>If you have questions about this Privacy Policy, or wish to exercise any of your privacy rights, please get in touch with our team.</p>

            <div class="contact-box">
                <h4>Questions about your data?</h4>
                <p>Email us at hello@devotiontech.com or use our contact form and we'll respond promptly.</p>
                <a href="#">Contact Us</a>
            </div>

        </div>

    </div>
</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>