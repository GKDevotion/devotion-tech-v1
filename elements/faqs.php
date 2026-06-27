<style>
      /* ── Section wrapper ── */
    .faq-section {
      padding: 80px 0;
    }

    /* ── Left panel ── */
 
    .faq-heading {
      font-size: clamp(28px, 4vw, 44px);
      font-weight: 700;
      line-height: 1.18;
      letter-spacing: -.02em;
      color: #0f0f0f;
      margin-bottom: 20px;
    }

    .faq-subtext {
      font-size: 1.2rem;
      color: #6b6b6b;
      line-height: 1.65; 
    }

    /* ── Avatars + stat ── */
    .stat-block-faq {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-top: 48px;
      padding-top: 32px;
      border-top: 1px solid #e8e8e8;
    }
    .avatar-stack-faq {
      display: flex;
    }
    .avatar-stack-faq img,
    .avatar-count-faq {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 2px solid white;
      margin-left: -10px;
      object-fit: cover;
    }
    .avatar-stack-faq img:first-child { margin-left: 0; }
    .avatar-count-faq {
      background: #aa8038;
      color: white;
      font-size: 11px;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .stat-text-faq strong {
      display: block;
      font-size: 15px;
      font-weight: 700;
      color: #0f0f0f;
    }
    .stat-text-faq span {
      font-size: 13px;
      color: #6b6b6b;
    }

    .btn-faq {
      margin-top: 28px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #aa8038;
      color: white;
      font-size: 14px;
      font-weight: 600;
      padding: 12px 24px;
      border-radius: 6px;
      text-decoration: none;
      transition: background .2s;
      border: none;
    }
    .btn-faq:hover {
      background: #aa8308;
      color: white;
    }
    .btn-faq svg { transition: transform .2s; }
    .btn-faq:hover svg { transform: translate(2px, -2px); }

    /* ── Right: accordion ── */
    .faq-accordion .accordion-item {
      background: transparent;
      border: none;
      border-bottom: 1px solid #e8e8e8;
    }
    .faq-accordion .accordion-item:first-child {
      border-top: 1px solid #e8e8e8;
    }

    .faq-accordion .accordion-button {
      background: transparent;
      font-size: 1rem;
      font-weight: 600;
      color: #0f0f0f;
      padding: 20px 0;
      box-shadow: none;
      border-radius: 0 !important;
    }
    .faq-accordion .accordion-button:not(.collapsed) {
      color: #aa8038;
      background: transparent;
    }
    .faq-accordion .accordion-button::after {
      /* custom +/× icon */
      background-image: none;
      content: '+';
      font-size: 30px;
      font-weight: 300;
      color: #0f0f0f;
      width: auto;
      height: auto;
      transition: transform .25s, content .25s;
    }
    .faq-accordion .accordion-button:not(.collapsed)::after {
      content: '×';
      color: #aa8038;
      transform: rotate(0deg);
    }

    .faq-accordion .accordion-body {
      padding: 0 0 20px;
      font-size: 1rem;
      color: #6b6b6b;
      line-height: 1.7;
    }

    .faq-check-list {
      list-style: none;
      padding: 0;
      margin: 16px 0 0;
    }
    .faq-check-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: 1rem;
      color: #0f0f0f;
      margin-bottom: 10px;
    }
    .faq-check-list li::before {
      content: '';
      display: block;
      width: 16px;
      height: 16px;
      flex-shrink: 0;
      margin-top: 2px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none'%3E%3Cpath d='M2 8l4 4 8-8' stroke='%23aa8038' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-size: contain;
    }

    /* ── Responsive tweaks ── */
    @media (max-width: 991.98px) {
      .faq-section { padding: 56px 0; }
      .faq-left { margin-bottom: 48px; }
      .faq-subtext { max-width: 100%; }
    }
</style>
  
<section class="faq-section">
  <div class="container">
    <div class="row gy-4">

      <!-- LEFT PANEL -->
      <div class="col-lg-5 faq-left">
        <div class="badge-pill mb-4">
          <span class="dot"></span>
          Frequently Asked Questions
        </div>

        <h2 class="faq-heading">
          Everything you need to know about our IT services and solutions
        </h2>

        <p class="faq-subtext">
          We've compiled answers to the most common questions about our services, processes, and support so you can make informed decisions with confidence.
        </p>

        <!-- Avatars + stat -->
        <div class="stat-block-faq">
          <div class="avatar-stack-faq">
            <img src="https://i.pravatar.cc/40?img=11" alt="Client 1"/>
            <img src="https://i.pravatar.cc/40?img=22" alt="Client 2"/>
            <img src="https://i.pravatar.cc/40?img=33" alt="Client 3"/>
            <div class="avatar-count-faq">15K</div>
          </div>
          <div class="stat-text-faq">
            <strong>99% Client</strong>
            <span>Satisfaction Rate</span>
          </div>
        </div>

        <a href="#" class="btn-faq">
          View All Faqs
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 12L12 2M12 2H5M12 2V9" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>

      <!-- RIGHT PANEL: ACCORDION -->
      <div class="col-lg-7">
        <div class="accordion faq-accordion" id="faqAccordion">

          <!-- Q1 — open by default -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq1-head">
              <button class="accordion-button" type="button"
                      data-bs-toggle="collapse" data-bs-target="#faq1"
                      aria-expanded="true" aria-controls="faq1">
                1. How quickly can we get support if we face a technical issue?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show"
                 aria-labelledby="faq1-head" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                <p>We understand that every minute of downtime impacts your business. That's why our dedicated helpdesk team is available 24/7 to address any technical issues you face. On average, we respond to support requests in under 15 minutes, with critical issues prioritized immediately.</p>
                <p>Managed IT Services involve proactive monitoring and maintenance of your IT systems by a third-party provider. We handle everything from updates, patching, and security to helpdesk support—allowing your team to focus on business, not IT issues.</p>
                <ul class="faq-check-list">
                  <li>We aim to respond to all technical issues within 24 hours or less,</li>
                  <li>You can reach us via phone, email, or chat, and our expert team will provide assistance</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Q2 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq2-head">
              <button class="accordion-button collapsed" type="button"
                      data-bs-toggle="collapse" data-bs-target="#faq2"
                      aria-expanded="false" aria-controls="faq2">
                2. Can your services scale as our business grows?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse"
                 aria-labelledby="faq2-head" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Absolutely. Our solutions are built to grow with you. Whether you're adding new users, expanding to new locations, or launching new services, we provide flexible plans that adapt to your evolving needs without disruption.
              </div>
            </div>
          </div>

          <!-- Q3 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq3-head">
              <button class="accordion-button collapsed" type="button"
                      data-bs-toggle="collapse" data-bs-target="#faq3"
                      aria-expanded="false" aria-controls="faq3">
                3. Can you help us with data backup and disaster recovery?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse"
                 aria-labelledby="faq3-head" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes. We design and manage comprehensive backup and disaster recovery solutions, ensuring your critical data is protected and recoverable in minutes. Our plans cover both on-site and cloud-based redundancy to minimize downtime in any scenario.
              </div>
            </div>
          </div>

          <!-- Q4 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq4-head">
              <button class="accordion-button collapsed" type="button"
                      data-bs-toggle="collapse" data-bs-target="#faq4"
                      aria-expanded="false" aria-controls="faq4">
                4. How do you ensure the security of our systems and data?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse"
                 aria-labelledby="faq4-head" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Security is at the core of everything we do. We deploy multi-layer protection including endpoint detection, firewall management, encrypted communications, and continuous threat monitoring. Regular audits and staff training keep your environment compliant and resilient.
              </div>
            </div>
          </div>

          <!-- Q5 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq5-head">
              <button class="accordion-button collapsed" type="button"
                      data-bs-toggle="collapse" data-bs-target="#faq5"
                      aria-expanded="false" aria-controls="faq5">
                5. Do you provide on-site IT support, or is everything remote?
              </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse"
                 aria-labelledby="faq5-head" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                We offer both. Most issues are resolved remotely within minutes, but for hardware, infrastructure, or on-boarding needs, our certified technicians can be dispatched to your location. You get the best of both worlds — speed and hands-on expertise.
              </div>
            </div>
          </div>

        </div><!-- /accordion -->
      </div>

    </div><!-- /row -->
  </div><!-- /container -->
</section>