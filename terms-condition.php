<?php
  $seo = [
    'title' => 'Terms & Conditions | Devotion Technologies Legal Guidelines & Service Policies',
    'description' => 'Review Devotion Technologies terms and conditions outlining website usage, service policies, user responsibilities, and legal guidelines for our digital services.',
    'keywords' => 'Devotion Technologies terms, legal policy, website usage policy, service agreement, technology services terms, company policies',
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
    font-size: 1rem;
  }

  .last-updated {
    display: inline-block;
    margin-top: 20px;
    font-size: 1rem;
    color: #6b7280;
    background: #fff;
    border: 1px solid #e8e8ee;
    padding: 8px 18px;
    border-radius: 20px;
  }

  /* LAYOUT */
  .page-wrap {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 56px;
    padding: 70px 0 70px;
    align-items: start;
  }

  aside.toc {
    align-self: start;
    position: sticky;
    top: 100px;
    background: #f6f6f8;
    border: 1px solid #e7e3da;
    border-radius: 10px;
    padding: 26px 22px;
  }

  aside.toc h4 {
    font-size: 1rem;
    letter-spacing: 1.5px;
    color: #7b8199;
    text-transform: uppercase;
    margin-bottom: 16px;
    font-weight: 700;
  }

  aside.toc ol {
    list-style: none;
    padding: 0;
    counter-reset: toc;
  }

  aside.toc li {
    margin-bottom: 2px;
  }

  aside.toc a {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    padding: 9px 8px;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    color: #1b2036;
  }

  aside.toc a .num {
    color: #b57a3f;
    font-weight: 700;
    min-width: 20px;
  }

  aside.toc a:hover,
  aside.toc a.active {
    /* background:#ffffff; */
    color: #b57a3f;
  }

  main.content section {
    margin-bottom: 44px;
    scroll-margin-top: 20px;
  }

  main.content h2 {
    color: #12172e;
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 16px;
    letter-spacing: -0.3px;
  }

  main.content h3 {
    color: #fff;
    font-size: 1.2rem;
    font-weight: 700;
    margin: 20px 0 8px;
  }

  main.content p {
    margin-bottom: 14px;
    font-size: 1rem;
    color: #4a5170;
  }

  main.content ul {
    margin-bottom: 14px;
  }

  main.content li {
    color: #4a5170;
    font-size: 1rem;
  }

  main.content strong {
    color: #1b2036;
  }

  .note-box {
    background: #faf3e8;
    border: 1px solid #ecdcc0;
    border-radius: 10px;
    padding: 18px 22px;
    font-size: 1rem;
    color: #1b2036;
    margin: 18px 0;
  }

  .note-box strong {
    color: #b57a3f;
  }

  .warn-box {
    background: #fdf2f1;
    border: 1px solid #f3cfcb;
    border-radius: 10px;
    padding: 18px 22px;
    font-size: 1rem;
    color: #1b2036;
    margin: 18px 0;
  }

  .warn-box strong {
    color: #b5443a;
  }

  table.info-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    margin: 18px 0 26px;
    border: 1px solid #e7e3da;
  }

  table.info-table thead tr {
    background: #12172e;
    color: #fff;
  }

  table.info-table th {
    text-align: left;
    padding: 14px 20px;
    font-size: 13.5px;
    font-weight: 700;
  }

  table.info-table td {
    padding: 14px 20px;
    font-size: 1rem;
    border-top: 1px solid #e7e3da;
  }

  table.info-table tbody tr:nth-child(even) {
    background: #f7f5f0;
  }

  .card-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin: 18px 0 26px;
  }

  .info-card {
    border: 1px solid #e7e3da;
    border-radius: 10px;
    padding: 18px 20px;
    background: #fff;
  }

  .info-card h4 {
    color: #aa8038;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 6px;
  }

  .info-card p {
    font-size: 13.5px;
    color: #7b8199;
    margin: 0;
  }

  .contact-cta {
    background: #12172e;
    border-radius: 14px;
    padding: 34px 40px;
    color: #fff;
    margin-top: 10px;
  }

  .contact-cta h3 {
    color: #fff;
    font-size: 20px;
    margin-bottom: 8px;
  }

  .contact-cta p {
    color: #fff !important;
    margin-bottom: 20px;
  }

  .contact-cta a.btn {
    background: #fff;
    color: #12172e;
    padding: 11px 22px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 14px;
    display: inline-block;
  }

  @media (max-width:900px) {
    .page-wrap {
      grid-template-columns: 1fr;
      padding: 40px 20px 60px;
    }

    aside.toc {
      position: static;
    }

    .card-grid {
      grid-template-columns: 1fr;
    }

    .hero h1 {
      font-size: 32px;
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

<div class="page-wrap container">

  <aside class="toc">
    <h4>On This Page</h4>
    <ol>
      <li><a href="#s1"><span class="num">01</span> Agreement to Terms</a></li>
      <li><a href="#s2"><span class="num">02</span> Description of Services</a></li>
      <li><a href="#s3"><span class="num">03</span> Service Engagements &amp; Quotes</a></li>
      <li><a href="#s4"><span class="num">04</span> Fees &amp; Payment Terms</a></li>
      <li><a href="#s5"><span class="num">05</span> Client Responsibilities</a></li>
      <li><a href="#s6"><span class="num">06</span> Intellectual Property</a></li>
      <li><a href="#s7"><span class="num">07</span> Confidentiality</a></li>
      <li><a href="#s8"><span class="num">08</span> Warranties &amp; Disclaimers</a></li>
      <li><a href="#s9"><span class="num">09</span> Limitation of Liability</a></li>
      <li><a href="#s10"><span class="num">10</span> Indemnification</a></li>
      <li><a href="#s11"><span class="num">11</span> Termination</a></li>
      <li><a href="#s12"><span class="num">12</span> Acceptable Use</a></li>
      <li><a href="#s13"><span class="num">13</span> Governing Law</a></li>
      <li><a href="#s14"><span class="num">14</span> Changes to These Terms</a></li>
      <li><a href="#s15"><span class="num">15</span> Contact Us</a></li>
    </ol>
  </aside>

  <main class="content">

    <section id="s1">
      <h2>1. Agreement to Terms</h2>
      <p>These Terms &amp; Conditions ("Terms") form a binding agreement between you ("Client," "you," or "your") and Devotion Technology ("we," "us," "our"), governing your access to and use of our website, and any IT consulting, managed services, or software development services we provide.</p>
      <p>By accessing our website, submitting an inquiry, or engaging our services, you confirm that you have read, understood, and agree to be bound by these Terms. If you do not agree, please discontinue use of our site and services.</p>
      <p>Where you engage us for a specific project or ongoing service, a separate Statement of Work, Service Agreement, or Master Services Agreement ("Service Agreement") may apply. In the event of a conflict, the terms of that Service Agreement will take precedence over these Terms.</p>
    </section>

    <section id="s2">
      <h2>2. Description of Services</h2>
      <p>Devotion Technology provides IT consulting, managed services, cloud solutions, data backup and recovery, network and infrastructure support, and software development for businesses. Specific deliverables, timelines, and service levels are defined in the applicable proposal, quote, or Service Agreement for each engagement.</p>
      <p>We reserve the right to modify, suspend, or discontinue any part of our services at any time, with reasonable notice where the change affects an active engagement.</p>
    </section>

    <section id="s3">
      <h2>3. Service Engagements &amp; Quotes</h2>
      <p>Any quote, estimate, or proposal we provide is valid for the period stated on the document, or 30 days if none is stated. Work begins only once a proposal, Service Agreement, or purchase order has been accepted in writing (including by email) by both parties.</p>
      <h3>Changes in scope</h3>
      <p>Requests that fall outside the agreed scope of work may require a change order, additional fees, or an adjusted timeline. We will notify you before carrying out any work that falls outside the original scope.</p>
      <h3>Third-party products and services</h3>
      <p>Where a project involves third-party software, hardware, licenses, or cloud platforms, your use of those products is subject to the applicable third-party terms, and we are not responsible for their availability, pricing, or performance.</p>
    </section>

    <section id="s4">
      <h2>4. Fees &amp; Payment Terms</h2>
      <p>Fees for our services are set out in the applicable quote or Service Agreement and may be structured as fixed-price, time-and-materials, or recurring managed service fees.</p>
      <table class="info-table">
        <thead>
          <tr>
            <th>Billing Type</th>
            <th>Typical Terms</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Project-based work</td>
            <td>Deposit on acceptance; balance due on defined milestones or completion</td>
          </tr>
          <tr>
            <td>Managed services (recurring)</td>
            <td>Billed monthly in advance, due within 15 days of invoice</td>
          </tr>
          <tr>
            <td>Time-and-materials support</td>
            <td>Billed monthly in arrears, based on logged hours</td>
          </tr>
          <tr>
            <td>Hardware or licensing pass-through</td>
            <td>Due on delivery or as invoiced by the third-party vendor</td>
          </tr>
        </tbody>
      </table>
      <p>Invoices are due within the period stated on the invoice, unless otherwise agreed in writing. Overdue balances may accrue interest at the maximum rate permitted by applicable law, and we reserve the right to suspend services until outstanding invoices are settled.</p>
      <p>All fees are exclusive of applicable taxes, duties, or levies unless stated otherwise.</p>
    </section>

    <section id="s5">
      <h2>5. Client Responsibilities</h2>
      <p>To help us deliver services effectively, you agree to:</p>
      <ul>
        <li>Provide timely, accurate information, access, and decisions needed to carry out the work</li>
        <li>Maintain your own backups of critical data, in addition to any backup services we provide</li>
        <li>Ensure you have the necessary rights and licenses for any content, data, or systems you ask us to work with</li>
        <li>Designate an authorized point of contact for approvals and sign-off</li>
        <li>Use our services in compliance with applicable laws and these Terms</li>
      </ul>
      <p>Delays caused by incomplete information, unavailable access, or late approvals may affect project timelines and are not considered a breach on our part.</p>
    </section>

    <section id="s6">
      <h2>6. Intellectual Property</h2>
      <div class="card-grid">
        <div class="info-card">
          <h4>Pre-existing IP</h4>
          <p>Tools, frameworks, methodologies, and code libraries we owned or developed before an engagement remain our property, and are licensed to you for use with the delivered work.</p>
        </div>
        <div class="info-card">
          <h4>Client deliverables</h4>
          <p>Unless stated otherwise in a Service Agreement, ownership of custom deliverables created specifically for you transfers to you upon full payment.</p>
        </div>
        <div class="info-card">
          <h4>Client materials</h4>
          <p>Any data, content, branding, or materials you provide remain your property. You grant us a license to use them solely to perform the services.</p>
        </div>
        <div class="info-card">
          <h4>Our brand</h4>
          <p>Our name, logo, and website content remain our property and may not be used without our prior written consent.</p>
        </div>
      </div>
    </section>

    <section id="s7">
      <h2>7. Confidentiality</h2>
      <p>Each party may have access to confidential or proprietary information belonging to the other in the course of an engagement. Both parties agree to:</p>
      <ul>
        <li>Use confidential information only for the purposes of the engagement</li>
        <li>Protect it with the same degree of care used to protect their own confidential information, and no less than reasonable care</li>
        <li>Not disclose it to third parties without prior written consent, except where required by law</li>
      </ul>
      <div class="note-box">
        <strong>Note:</strong> Project data shared with us during a client engagement is governed by the confidentiality terms of your specific Service Agreement, which take precedence over this general provision where applicable.
      </div>
    </section>

    <section id="s8">
      <h2>8. Warranties &amp; Disclaimers</h2>
      <p>We will perform services with reasonable skill and care, consistent with generally accepted industry standards. Beyond this, our services and website are provided on an "as is" and "as available" basis.</p>
      <p>To the fullest extent permitted by law, we disclaim all other warranties, express or implied, including implied warranties of merchantability, fitness for a particular purpose, and non-infringement. We do not warrant that services will be uninterrupted, error-free, or that all defects will be corrected.</p>
    </section>

    <section id="s9">
      <h2>9. Limitation of Liability</h2>
      <div class="warn-box">
        <strong>Important:</strong> To the maximum extent permitted by applicable law, Devotion Technology will not be liable for any indirect, incidental, special, consequential, or punitive damages, including loss of profits, data, or business, arising from your use of our services.
      </div>
      <p>Our total aggregate liability arising out of or relating to an engagement will not exceed the total fees paid by you to us for the services giving rise to the claim in the six months preceding the event.</p>
      <p>Nothing in these Terms limits liability that cannot be limited under applicable law, including liability for gross negligence, willful misconduct, or fraud.</p>
    </section>

    <section id="s10">
      <h2>10. Indemnification</h2>
      <p>You agree to indemnify and hold us harmless from any claims, damages, or expenses (including reasonable legal fees) arising from your breach of these Terms, misuse of our services, or violation of applicable law or third-party rights.</p>
    </section>

    <section id="s11">
      <h2>11. Termination</h2>
      <p>Either party may terminate an engagement in accordance with the notice period set out in the applicable Service Agreement, typically 30 days' written notice, unless terminated earlier for material breach that remains uncured after 14 days' notice.</p>
      <p>Upon termination, you remain responsible for payment of fees for work performed up to the effective date of termination. We will provide reasonable cooperation to transition ongoing work, which may be subject to additional fees.</p>
    </section>

    <section id="s12">
      <h2>12. Acceptable Use</h2>
      <p>When using our website or services, you agree not to:</p>
      <ul>
        <li>Use our services for any unlawful purpose or in violation of any applicable regulation</li>
        <li>Attempt to gain unauthorized access to our systems, networks, or client environments</li>
        <li>Introduce malware, viruses, or other harmful code</li>
        <li>Interfere with or disrupt the integrity or performance of our services or website</li>
        <li>Reproduce, resell, or exploit any part of our services without our written consent</li>
      </ul>
      <p>We reserve the right to suspend access to services in the event of suspected misuse, pending investigation.</p>
    </section>

    <section id="s13">
      <h2>13. Governing Law</h2>
      <p>These Terms are governed by and construed in accordance with the laws of the jurisdiction in which Devotion Technology is registered, without regard to conflict-of-law principles. Any disputes arising from these Terms will be subject to the exclusive jurisdiction of the courts of that jurisdiction, unless otherwise agreed in a Service Agreement.</p>
    </section>

    <section id="s14">
      <h2>14. Changes to These Terms</h2>
      <p>We may update these Terms periodically to reflect changes in our services, legal requirements, or business practices. We will post any changes on this page with a revised "last updated" date, and where changes are significant, we will take reasonable steps to notify active clients. Continued use of our website or services after changes take effect constitutes acceptance of the updated Terms.</p>
    </section>

    <section id="s15">
      <h2>15. Contact Us</h2>
      <p>If you have questions about these Terms &amp; Conditions, or about an active engagement, please get in touch with our team.</p>
      <div class="contact-cta">
        <h3>Questions about these Terms?</h3>
        <p>Email us at <a href="mailto:hello@devotiontech.com" class="text-white">hello@devotiontech.com</a> or use our contact form and we'll respond promptly.</p>
        <a href="contact.php" class="btn">Contact Us</a>
      </div>
    </section>

  </main>

</div>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>