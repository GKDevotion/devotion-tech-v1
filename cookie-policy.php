<?php
  $seo = [
    'title' => 'Cookie Policy | Devotion Technologies Website Cookie Usage Information',
    'description' => 'Learn how Devotion Technologies uses cookies and similar technologies to improve website performance, user experience, security, and service functionality.',
    'keywords' => 'Devotion Technologies cookie policy, website cookies, cookie usage policy, privacy and cookies, technology website policy',
    'author' => 'Devotion Technologies'
  ];
  include_once('elements/header.php');
?> 

<style>
  :root {
    --primary: #aa8038;
    --primary-dark: #8a672c;
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
  .hero {
    position: relative;
    padding: 80px 0 50px;
    overflow: hidden;
    background: var(--gray-light);
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
    color: var(--gray);
    font-size: 1rem;
  }

  .last-updated {
    display: inline-block;
    margin-top: 20px;
    font-size: 1rem;
    color: var(--gray);
    background: #fff;
    border: 1px solid var(--border);
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
    top: 115px;
    background: var(--gray-light);
    border-radius: 14px;
    padding: 26px;
  }

  .toc-sidebar h4 {
    font-size: 1rem;
    font-weight: 800;
    margin-bottom: 16px;
    color: var(--ink);
  }

  .toc-list {
    list-style: none;
    display: flex;
    padding: 0px;
    flex-direction: column;
    gap: 4px;
  }

  .toc-list a {
    display: block;
    font-size: 1rem;
    color: var(--gray);
    padding: 8px 10px;
    border-radius: 8px;
  }

  .toc-list a:hover,
  .toc-list a.active {
    /* background:#fff; */
    color: var(--primary);
    font-weight: 700;
  }

  .toc-num {
    color: var(--primary);
    font-weight: 800;
    margin-right: 6px;
  }

  /* CONTENT */
  .policy-content h2 {
    font-size: 23px;
    font-weight: 800;
    margin: 10px 0 16px;
    padding-top: 10px;
    scroll-margin-top: 110px;
  }

  .policy-content h2:first-child {
    margin-top: 0;
  }

  .policy-content h3 {
    font-size: 17px;
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
    color: var(--ink);
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

  /* COOKIE TABLE */
  .cookie-table {
    width: 100%;
    border-collapse: collapse;
    margin: 22px 0 30px;
    font-size: 13.8px;
    border: 1px solid var(--border);
    border-radius: 12px;
    overflow: hidden;
  }

  .cookie-table thead {
    background: var(--ink);
    color: #fff;
  }

  .cookie-table th {
    text-align: left;
    padding: 13px 10px;
    font-weight: 700;
  }

  .cookie-table td {
    padding: 13px 16px;
    border-top: 1px solid var(--border);
    color: #33384a;
    font-size: 1rem;
  }

  .cookie-table tr:nth-child(even) td {
    background: var(--gray-light);
  }

  .cookie-tag {
    display: inline-block;
    font-size: 0.8rem;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 12px;
    background: var(--primary);
    color: #fff;
  }

  .cookie-tag.optional {
    background: #e8e8ee;
    color: var(--gray);
  }

  /* PREFERENCE TOGGLES (illustrative) */
  .pref-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 22px;
    border: 1px solid var(--border);
    border-radius: 12px;
    margin-bottom: 14px;
  }

  .pref-row h5 {
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 4px;
  }

  .pref-row span {
    font-size: 1rem;
    color: var(--gray);
  }

  .toggle {
    width: 44px;
    height: 24px;
    border-radius: 14px;
    background: var(--border);
    position: relative;
    flex-shrink: 0;
    cursor: pointer;
  }

  .toggle.on {
    background: var(--primary);
  }

  .toggle.disabled {
    background: var(--primary);
    opacity: 0.5;
    cursor: not-allowed;
  }

  .toggle-dot {
    position: absolute;
    top: 3px;
    left: 3px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #fff;
    transition: .2s;
  }

  .toggle.on .toggle-dot,
  .toggle.disabled .toggle-dot {
    left: 23px;
  }

  /* CONTACT BOX */
  .contact-box {
    background: var(--navy);
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
    color: var(--primary-dark);
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

    .cookie-table {
      font-size: 12.5px;
    }
  }

  @media (max-width:600px) {
    .hero h1 {
      font-size: 26px;
    }

    .cookie-table {
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
    <h1>Cookie Policy</h1>
    <p>This policy explains what cookies are, how Devotion Technology uses them across our website, and the choices you have in managing them.</p>
    <span class="last-updated">Last updated: July 1, 2026</span>
  </div>
</section>

<div class="container">
  <div class="layout">

    <!-- TOC SIDEBAR -->
    <div class="toc-sidebar">
      <h4>On This Page</h4>
      <ul class="toc-list">
        <li><a href="#what-are-cookies"><span class="toc-num">01</span>What Are Cookies</a></li>
        <li><a href="#how-we-use"><span class="toc-num">02</span>How We Use Cookies</a></li>
        <li><a href="#types"><span class="toc-num">03</span>Types of Cookies We Use</a></li>
        <li><a href="#third-party"><span class="toc-num">04</span>Third-Party Cookies</a></li>
        <li><a href="#managing"><span class="toc-num">05</span>Managing Your Preferences</a></li>
        <li><a href="#browser-controls"><span class="toc-num">06</span>Browser Controls</a></li>
        <li><a href="#changes"><span class="toc-num">07</span>Changes to This Policy</a></li>
        <li><a href="#contact"><span class="toc-num">08</span>Contact Us</a></li>
      </ul>
    </div>

    <!-- POLICY CONTENT -->
    <div class="policy-content">

      <h2 id="what-are-cookies">1. What Are Cookies</h2>
      <p>Cookies are small text files placed on your device when you visit a website. They help the site remember information about your visit, such as your preferred language and other settings, which can make your next visit easier and the site more useful to you.</p>
      <p>Devotion Technology uses cookies and similar technologies (such as web beacons and local storage) across devotiontech.com and related subdomains to operate our site, understand how it's used, and improve the experience we provide.</p>

      <h2 id="how-we-use">2. How We Use Cookies</h2>
      <p>We use cookies for a range of purposes, including to:</p>
      <ul>
        <li>Keep our website secure and functioning correctly</li>
        <li>Remember your preferences, such as cookie consent choices</li>
        <li>Understand how visitors navigate and use our site so we can improve it</li>
        <li>Measure the effectiveness of our content and marketing</li>
        <li>Support features like live chat and consultation booking forms</li>
      </ul>

      <div class="highlight-box">
        <p><strong>In short:</strong> some cookies are required for the site to function, while others are optional and only load once you've given consent.</p>
      </div>

      <h2 id="types">3. Types of Cookies We Use</h2>
      <p>The table below summarizes the categories of cookies used on our website and their purpose.</p>

      <table class="cookie-table">
        <thead>
          <tr>
            <th>Category</th>
            <th>Purpose</th>
            <th>Typical Duration</th>
            <th>Consent</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Strictly Necessary</strong></td>
            <td>Enable core functionality like page navigation, security, and form submission.</td>
            <td>Session – 1 year</td>
            <td><span class="cookie-tag">Required</span></td>
          </tr>
          <tr>
            <td><strong>Performance & Analytics</strong></td>
            <td>Collect anonymized data on how visitors use our site to help us improve it.</td>
            <td>Up to 2 years</td>
            <td><span class="cookie-tag optional">Optional</span></td>
          </tr>
          <tr>
            <td><strong>Functional</strong></td>
            <td>Remember choices you make (such as region or form progress) to provide enhanced features.</td>
            <td>Up to 1 year</td>
            <td><span class="cookie-tag optional">Optional</span></td>
          </tr>
          <tr>
            <td><strong>Marketing</strong></td>
            <td>Used to deliver relevant content and measure the performance of our campaigns.</td>
            <td>Up to 1 year</td>
            <td><span class="cookie-tag optional">Optional</span></td>
          </tr>
        </tbody>
      </table>

      <h2 id="third-party">4. Third-Party Cookies</h2>
      <p>Some cookies on our site are placed by third-party services we use, such as analytics providers and scheduling tools for consultation bookings. These third parties may use cookies to collect information about your online activity across different websites.</p>
      <p>We do not control these third-party cookies directly. We encourage you to review the privacy and cookie policies of any third-party service linked from our site for more detail on their specific practices.</p>

      <h2 id="managing">5. Managing Your Preferences</h2>
      <p>You can adjust which optional cookie categories are active for your visit using the preference controls below. Strictly necessary cookies cannot be disabled, as the site cannot function properly without them.</p>

      <div class="pref-row">
        <div>
          <h5>Strictly Necessary</h5><span>Always active — required for the site to work</span>
        </div>
        <div class="toggle disabled">
          <div class="toggle-dot"></div>
        </div>
      </div>
      <div class="pref-row">
        <div>
          <h5>Performance & Analytics</h5><span>Helps us understand site usage and improve performance</span>
        </div>
        <div class="toggle on" onclick="this.classList.toggle('on')">
          <div class="toggle-dot"></div>
        </div>
      </div>
      <div class="pref-row">
        <div>
          <h5>Functional</h5><span>Remembers your preferences across visits</span>
        </div>
        <div class="toggle on" onclick="this.classList.toggle('on')">
          <div class="toggle-dot"></div>
        </div>
      </div>
      <div class="pref-row">
        <div>
          <h5>Marketing</h5><span>Used to tailor content and measure campaign performance</span>
        </div>
        <div class="toggle" onclick="this.classList.toggle('on')">
          <div class="toggle-dot"></div>
        </div>
      </div>

      <h2 id="browser-controls">6. Browser Controls</h2>
      <p>In addition to the preferences above, most web browsers allow you to control cookies through their settings. You can typically set your browser to refuse cookies, delete existing cookies, or alert you when a cookie is being placed.</p>
      <p>Please note that if you choose to block or delete cookies, some parts of our website — such as saved form progress or personalized content — may not function as intended.</p>

      <h2 id="changes">7. Changes to This Policy</h2>
      <p>We may update this Cookie Policy from time to time to reflect changes in the cookies we use or for legal, operational, or regulatory reasons. Any updates will be posted on this page along with a revised "last updated" date.</p>
      <p>We encourage you to review this page periodically to stay informed about how we use cookies.</p>

      <h2 id="contact">8. Contact Us</h2>
      <p>If you have any questions about this Cookie Policy or how we handle your data, please reach out to our team.</p>

      <div class="contact-box">
        <h4>Questions about this policy?</h4>
        <p>Email us at hello@devotiontech.com or use our contact form and we'll get back to you promptly.</p>
        <a href="contact.php">Contact Us</a>
      </div>

    </div>
  </div>
</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>