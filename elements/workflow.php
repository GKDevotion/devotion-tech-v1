
  <style>
    :root{
      --accent:#aa8038;
      --accent-soft:#f2e7d5;
      --ink:#161a20;
      --muted:#5c6470;
      --bg:#f8f6f2;
      --card:#ffffff;
    }
   
    /* ---------- Header ---------- */
    .eyebrow{
      color:var(--accent);
      font-weight:700;
      letter-spacing:.08em;
      text-transform:uppercase;
      font-size:.8rem;
    }

    .title-row{
      display:flex;
      align-items:center;
      gap:1.25rem;
      flex-wrap:wrap;
    }

    .title-underline{
      height:2px;
      flex:1 1 60px;
      max-width:160px;
      background:var(--accent);
      display:inline-block;
    }

    .dot-grid{
      position:absolute;
      top:-10px;
      right:0;
      width:220px;
      height:110px;
      background-image:radial-gradient(var(--accent-soft) 1.6px, transparent 1.6px);
      background-size:14px 14px;
      opacity:.9;
      z-index:0;
    }

    /* ---------- Diagram (desktop) ---------- */
    .workflow-stage{
      position:relative;
      width:100%; 
      margin:0 auto;
      aspect-ratio:1000/470;
    }

    .connector-svg{
      position:absolute;
      inset:0;
      width:100%;
      height:100%;
      overflow:visible;
    }

    .connector-path{
      fill:none;
      stroke:var(--accent);
      stroke-width:2.4;
      stroke-linecap:round;
      stroke-dasharray:2 10;
      opacity:.75;
      stroke-dashoffset:0;
      animation:dash-flow 22s linear infinite;
    }

    @keyframes dash-flow{
      to{ stroke-dashoffset:-500; }
    }

    .node{
      position:absolute;
      width:11.2%;
      aspect-ratio:1/1;
      transform:translate(-50%,-50%) scale(.6);
      opacity:0;
      transition:opacity .6s ease, transform .6s cubic-bezier(.22,1,.36,1);
    }
    .node.in-view{
      opacity:1;
      transform:translate(-50%,-50%) scale(1);
    }

    .node-circle{
      width:100%;
      height:100%;
      border-radius:50%;
      background:var(--card);
      display:flex;
      align-items:center;
      justify-content:center;
      box-shadow:0 12px 30px -10px rgba(170,128,56,.28), 0 2px 8px rgba(20,20,30,.06);
      position:relative;
    }

    .node-circle::after{
      content:"";
      position:absolute;
      inset:-6px;
      border-radius:50%;
      border:1.5px dashed var(--accent-soft);
    }

    .node-circle i{
      font-size:  2.5rem;
      color:var(--accent);
    }

    .node-label{
      position:absolute;
      width:max-content;
      max-width:170px;
      font-weight:700;
      font-size: 1rem;
      line-height:1.25;
      color:var(--ink);
    }

    .node-label.pos-top{
      bottom:calc(100% + 14px);
      left:50%;
      transform:translateX(-50%);
      text-align:center;
    }
    .node-label.pos-bottom{
      top:calc(100% + 14px);
      left:50%;
      transform:translateX(-50%);
      text-align:center;
    }
    .node-label.pos-right{
      top:50%;
      left:calc(100% + 16px);
      transform:translateY(-50%);
      text-align:left;
    }

    .step-index{
      position:absolute;
      top:-6px;
      right:-4px;
      width:22px;
      height:22px;
      border-radius:50%;
      background:var(--accent);
      color:#fff;
      font-size:.65rem;
      font-weight:700;
      display:flex;
      align-items:center;
      justify-content:center;
    }

    /* ---------- Mobile fallback list ---------- */
    .workflow-mobile{
      position:relative;
      padding-left:2.6rem;
    }
    .workflow-mobile::before{
      content:"";
      position:absolute;
      left:1.15rem;
      top:.6rem;
      bottom:.6rem;
      width:0;
      border-left:2px dashed var(--accent);
      opacity:.6;
    }
    .m-step{
      position:relative;
      display:flex;
      gap:1rem;
      align-items:flex-start;
      padding-bottom:2rem;
      opacity:0;
      transform:translateY(16px);
      transition:opacity .55s ease, transform .55s ease;
    }
    .m-step.in-view{ opacity:1; transform:translateY(0); }
    .m-step:last-child{ padding-bottom:0; }
    .m-icon{
      flex:0 0 auto;
      width:52px;
      height:52px;
      border-radius:50%;
      background:var(--card);
      display:flex;
      align-items:center;
      justify-content:center;
      box-shadow:0 8px 20px -8px rgba(170,128,56,.3);
      margin-left:-1.15rem;
      z-index:1;
      border:1.5px dashed var(--accent-soft);
    }
    .m-icon i{ color:var(--accent); font-size:1.25rem; }
    .m-text{ padding-top:.6rem; font-weight:700; font-size:.95rem; }
</style>

  <section class="py-5 py-lg-6">
      <div class="container py-4">

        <!-- Header -->
        <div class="position-relative mb-5 pb-2">
          <div class="dot-grid d-none d-lg-block"></div>
          <div class="row g-4 align-items-start position-relative" style="z-index:1;">
            <div class="col-lg-5">

                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="badge-pill mb-3">
                        <span class="dot"></span>
                        Our Workflow
                    </div> 
                </div>

                <div class="title-row">
                    <h2 class="display-font fw-800 mb-0" style="font-size:clamp(1.9rem,3.4vw,2.6rem); font-weight:800;">
                    How We Build Software Solutions?
                    </h2>
                    <span class="title-underline"></span>
                </div>

            </div>
            <div class="col-lg-7">
              <p class="text-secondary mb-0" style="color:var(--muted); font-size:1.02rem; line-height:1.75;">
                We follow a structured software development process to transform your ideas into scalable, secure, and high-performing digital solutions. From initial requirement analysis and planning to design, development, testing, and deployment, our team ensures every stage is executed with precision to deliver products that meet your business goals.
              </p>
            </div>
          </div>
        </div>

        <!-- Desktop / tablet snake diagram -->
        <div class="workflow-stage d-none d-md-block" id="stage">

          <svg class="connector-svg" viewBox="0 0 1000 470" preserveAspectRatio="none">
            <path class="connector-path" d="M 145,95 L 300,95" />
            <path class="connector-path" d="M 405,95 L 560,95" />
            <path class="connector-path" d="M 665,95 C 800,95 860,120 895,205" />
            <path class="connector-path" d="M 895,265 C 860,350 800,375 665,375" />
            <path class="connector-path" d="M 560,375 L 405,375" />
            <path class="connector-path" d="M 300,375 L 145,375" />
          </svg>

          <!-- Row 1 -->
          <div class="node" style="left:9%; top:20.2%;">
            <div class="node-circle"><i class="bi bi-clipboard-data"></i></div>
            <div class="node-label pos-top">1. Understand Project Requirements</div>
          </div>

          <div class="node" style="left:35.5%; top:20.2%;">
            <div class="node-circle"><i class="bi bi-diagram-3"></i></div>
            <div class="node-label pos-top">2. Plan & Define Architecture</div>
          </div>

          <div class="node" style="left:62%; top:20.2%;">
            <div class="node-circle"><i class="bi bi-palette"></i></div>
            <div class="node-label pos-top">3. Design User Experience</div>
          </div>

          <!-- Curve node -->
          <div class="node" style="left:89.5%; top:50%;">
            <div class="node-circle"><i class="bi bi-code-slash"></i></div>
            <div class="node-label pos-right">4. Develop & Integrate Features</div>
          </div>

          <!-- Row 2 -->
          <div class="node" style="left:62%; top:79.8%;">
            <div class="node-circle"><i class="bi bi-bug"></i></div>
            <div class="node-label pos-bottom">5. Testing & Quality Assurance</div>
          </div>

          <div class="node" style="left:35.5%; top:79.8%;">
            <div class="node-circle"><i class="bi bi-cloud-arrow-up"></i></div>
            <div class="node-label pos-bottom">6. Deployment & Launch</div>
          </div>

          <div class="node" style="left:9%; top:79.8%;">
            <div class="node-circle"><i class="bi bi-headset"></i></div>
            <div class="node-label pos-bottom">7. Support & Continuous Improvement</div>
          </div>

        </div>

        <!-- Mobile stacked list -->
        <div class="workflow-mobile d-md-none mt-3">
          <div class="m-step">
              <div class="m-icon"><i class="bi bi-clipboard-data"></i></div>
              <div class="m-text">1. Understand Project Requirements</div>
          </div>

          <div class="m-step">
              <div class="m-icon"><i class="bi bi-diagram-3"></i></div>
              <div class="m-text">2. Plan & Define Architecture</div>
          </div>

          <div class="m-step">
              <div class="m-icon"><i class="bi bi-palette"></i></div>
              <div class="m-text">3. Design User Experience</div>
          </div>

          <div class="m-step">
              <div class="m-icon"><i class="bi bi-code-slash"></i></div>
              <div class="m-text">4. Develop & Integrate Features</div>
          </div>

          <div class="m-step">
              <div class="m-icon"><i class="bi bi-bug"></i></div>
              <div class="m-text">5. Testing & Quality Assurance</div>
          </div>

          <div class="m-step">
              <div class="m-icon"><i class="bi bi-cloud-arrow-up"></i></div>
              <div class="m-text">6. Deployment & Launch</div>
          </div>

          <div class="m-step">
              <div class="m-icon"><i class="bi bi-headset"></i></div>
              <div class="m-text">7. Support & Continuous Improvement</div>
          </div>
        </div>

      </div>
  </section>

  <script>
    const io = new IntersectionObserver((entries)=>{
      entries.forEach((entry, i)=>{
        if(entry.isIntersecting){
          const el = entry.target;
          const siblings = Array.from(el.parentElement.querySelectorAll('.node, .m-step'));
          const idx = siblings.indexOf(el);
          el.style.transitionDelay = (idx * 90) + 'ms';
          el.classList.add('in-view');
          io.unobserve(el);
        }
      });
    }, { threshold: .25 });

    document.querySelectorAll('.node, .m-step').forEach(el => io.observe(el));
  </script>