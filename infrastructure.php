<?php
$seo = [];
include_once('elements/header.php');
?>
<style>
    :root {
        --primary: #aa8038;
        --primary-dark: #8a672c;
        --primary-light: #c9a25f;
        --ink: #1a1d29;
        --gray: #6b7280;
        --gray-light: #f6f6f8;
        --border: #e8e8ee;
        --navy: #0d1330;
    }

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
    /* SECTION LABEL */
    .section-heading {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 14px;
        color: #000;
    }

    .section-sub {
        color: var(--gray);
        font-size: 1rem;
        margin-bottom: 40px;
    }

    /* ARCHITECTURE OVERVIEW (image + text) */
    .overview {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
        margin-top: 60px;
    }

    .overview-img {
        border-radius: 16px;
        overflow: hidden;
    }

    .overview-img img {
        width: 100%;
        height: 380px;
        object-fit: cover;
    }

    .overview-text h3 {
        font-size: 15px;
        color: var(--primary);
        font-weight: 800;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .overview-text h2 {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 16px;
        line-height: 1.3;
    }

    .overview-text p {
        color: var(--gray);
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .overview-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 14px;
        padding: 0px;
    }

    .overview-list li {
        display: flex;
        gap: 12px;
        font-size: 1rem;
        color: #000;
        font-weight: 600;
    }

    .check-icon {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 800;
    }

    /* FEATURE GRID (infra pillars) */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 26px;
    }

    .feature-card {
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 30px 26px;
        transition: box-shadow .2s;
    }

    .feature-card:hover {
        box-shadow: 0 16px 32px rgba(10, 12, 30, 0.08);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--gray-light);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 18px;
    }

    .feature-card h4 {
        font-size: 1.2rem;
        font-weight: 800;
        color: #000;
        margin-bottom: 10px;
    }

    .feature-card p {
        font-size: 1rem;
        color: var(--gray);
    }

    /* STATS BAND */
    .stats-band {
        border: 1px solid #aa8038;
        border-radius: 16px;
        padding: 50px 40px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .stats-band::before {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(170, 128, 56, 0.35), transparent 70%);
    }

    .stat {
        text-align: center;
        position: relative;
    }

    .stat strong {
        display: block;
        font-size: 32px;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 10px;
    }

    .stat span {
        font-size: 1rem;
        color: #000;
    }

    /* MONITORING TIMELINE */
    .monitor-strip {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
        margin-bottom: 30px;
    }

    .monitor-step {
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 26px 22px;
        position: relative;
    }

    .monitor-step .step-num {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        margin-bottom: 16px;
    }

    .monitor-step h4 {
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .monitor-step p {
        font-size: 1rem;
        color: var(--gray);
    }

    /* TECH STACK STRIP */
    .stack-strip {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 30px;
        padding: 34px 0 0;
    }

    .stack-item {
        text-align: center;
    }

    .stack-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: var(--gray-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin: 0 auto 10px;
        color: var(--primary);
    }

    .stack-item span {
        font-size: 1rem;
        font-weight: 700;
        color: #000;
    }

    /* CERTIFICATIONS */
    .cert-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
        margin-bottom: 30px;
    }

    .cert-card {
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 24px 20px;
        text-align: center;
    }

    .cert-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--gray-light);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin: 0 auto 14px;
        font-weight: 800;
    }

    .cert-card h5 {
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .cert-card span {
        font-size: 1rem;
        color: var(--gray);
    }

    /* CTA BAND */
    .cta-band {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 16px;
        padding: 56px 48px;
        text-align: center;
        color: #fff;
    }

    .cta-band h2 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 14px;
    }

    .cta-band p {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 28px;
        max-width: 520px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 14px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-buttons a {
        padding: 13px 28px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14.5px;
    }

    .cta-primary {
        background: #fff;
        color: var(--primary-dark);
    }

    .cta-secondary {
        border: 1.5px solid rgba(255, 255, 255, 0.6);
        color: #fff;
    }

    .cta-secondary:hover {
        background: rgba(255, 255, 255, 0.12);
    }

    @media (max-width:900px) {
        .overview {
            grid-template-columns: 1fr;
        }

        .feature-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stats-band {
            grid-template-columns: repeat(2, 1fr);
        }

        .monitor-strip {
            grid-template-columns: repeat(2, 1fr);
        }

        .cert-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width:600px) {
        .feature-grid {
            grid-template-columns: 1fr;
        }

        .stats-band {
            grid-template-columns: 1fr 1fr;
        }

        .monitor-strip {
            grid-template-columns: 1fr;
        }

        .cert-grid {
            grid-template-columns: 1fr 1fr;
        }

        .hero h1 {
            font-size: 30px;
        }
    }
</style>


<section class="top-banner-background" style="background-image: url('assets/images/banner-img.png');">
    <div>
        <h1 class="mb-0 text-center">Infrastructure</h1>
        <p class="text-black text-center mt-2">A hybrid cloud and on-prem architecture, monitored around the clock, so the systems behind your business stay dependable as you grow.</p>
    </div>
</section>

<div class="container">

    <!-- ARCHITECTURE OVERVIEW -->
    <div class="overview">
        <div class="overview-img">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&q=80" alt="Server infrastructure">
        </div>
        <div class="overview-text">
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Architecture Overview
            </div>
            <h2>A hybrid foundation built for reliability</h2>
            <p>We design infrastructure around redundancy first — combining cloud elasticity with on-prem control so client environments stay available even when individual components fail.</p>
            <ul class="overview-list">
                <li><span class="check-icon">✓</span> Multi-region cloud deployment with automatic failover</li>
                <li><span class="check-icon">✓</span> Geo-distributed backup replication</li>
                <li><span class="check-icon">✓</span> Load-balanced network paths across every environment</li>
                <li><span class="check-icon">✓</span> Isolated environments per client — no shared-tenancy risk</li>
            </ul>
        </div>
    </div>

    <!-- FEATURE GRID -->
    <section class="my-5">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            What We Manage
        </div>
        <h2 class="section-heading">The infrastructure pillars behind every engagement</h2>
        <p class="section-sub">Whether we're running your full stack or supplementing your internal team, these are the core layers we keep operational.</p>

        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">☁</div>
                <h4>Cloud Infrastructure</h4>
                <p>Elastic compute and storage across AWS, Azure, and GCP, scaled to match real usage instead of static provisioning.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🖥</div>
                <h4>On-Prem & Hybrid Systems</h4>
                <p>For clients with regulatory or latency needs, we maintain on-prem hardware connected securely to cloud resources.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡</div>
                <h4>Network Security</h4>
                <p>Segmented networks, firewalls, and intrusion detection tuned to each environment's specific risk profile.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📡</div>
                <h4>24/7 Monitoring</h4>
                <p>Real-time alerting across servers, applications, and network paths, with a live NOC team watching every environment.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💾</div>
                <h4>Backup & Disaster Recovery</h4>
                <p>Automated, tested backup schedules with documented recovery playbooks for every critical system we manage.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚙</div>
                <h4>DevOps & Automation</h4>
                <p>Infrastructure-as-code, CI/CD pipelines, and automated scaling so deployments are consistent and repeatable.</p>
            </div>
        </div>
    </section>

    <!-- STATS BAND -->
    <div class="stats-band">
        <div class="stat"><strong>99.9%</strong><span>Average Uptime Delivered</span></div>
        <div class="stat"><strong>&lt;15 min</strong><span>Average Incident Response</span></div>
        <div class="stat"><strong>3</strong><span>Geographic Data Center Regions</span></div>
        <div class="stat"><strong>0</strong><span>Data Loss Incidents to Date</span></div>
    </div>

    <!-- MONITORING PROCESS -->
    <section class="my-5">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            How We Monitor
        </div>
        <h2 class="section-heading">From detection to resolution, every step is tracked</h2>
        <p class="section-sub">Our monitoring stack doesn't just alert — it routes, escalates, and documents, so nothing slips through during off-hours.</p>

        <div class="monitor-strip">
            <div class="monitor-step">
                <div class="step-num">1</div>
                <h4>Continuous Detection</h4>
                <p>Automated checks run across servers, apps, and network paths every 60 seconds.</p>
            </div>
            <div class="monitor-step">
                <div class="step-num">2</div>
                <h4>Smart Alerting</h4>
                <p>Alerts are triaged and routed to the right engineer — no noisy, ignored notifications.</p>
            </div>
            <div class="monitor-step">
                <div class="step-num">3</div>
                <h4>Rapid Response</h4>
                <p>Our NOC team acts on critical alerts in under 15 minutes, day or night.</p>
            </div>
            <div class="monitor-step">
                <div class="step-num">4</div>
                <h4>Root Cause & Report</h4>
                <p>Every incident is documented with a root-cause summary shared back to you.</p>
            </div>
        </div>
    </section>

    <!-- TECH STACK -->
    <section>
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Platforms We Run On
        </div>
        <div class="stack-strip">
            <div class="stack-item">
                <div class="stack-icon">☁</div><span>AWS</span>
            </div>
            <div class="stack-item">
                <div class="stack-icon">⛅</div><span>Azure</span>
            </div>
            <div class="stack-item">
                <div class="stack-icon">🌐</div><span>Google Cloud</span>
            </div>
            <div class="stack-item">
                <div class="stack-icon">🐳</div><span>Docker</span>
            </div>
            <div class="stack-item">
                <div class="stack-icon">⚓</div><span>Kubernetes</span>
            </div>
            <div class="stack-item">
                <div class="stack-icon">🔧</div><span>Terraform</span>
            </div>
        </div>
    </section>

    <!-- CERTIFICATIONS -->
    <section class="my-5">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Standards We Align With
        </div>
        <div class="cert-grid">
            <div class="cert-card">
                <div class="cert-icon">✓</div>
                <h5>SOC 2 Aligned</h5>
                <span>Security & availability controls</span>
            </div>
            <div class="cert-card">
                <div class="cert-icon">✓</div>
                <h5>ISO 27001 Principles</h5>
                <span>Information security management</span>
            </div>
            <div class="cert-card">
                <div class="cert-icon">✓</div>
                <h5>GDPR Ready</h5>
                <span>Data protection compliance</span>
            </div>
            <div class="cert-card">
                <div class="cert-icon">✓</div>
                <h5>HIPAA Support</h5>
                <span>Healthcare-specific safeguards</span>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <div class="cta-band">
        <h2>Want a closer look at how we'd support your systems?</h2>
        <p>We'll walk through your current environment and show you exactly where we'd strengthen it.</p>
        <div class="cta-buttons">
            <a href="#" class="cta-primary">Request an Infrastructure Review</a>
            <a href="#" class="cta-secondary">View Our Services</a>
        </div>
    </div>

</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>