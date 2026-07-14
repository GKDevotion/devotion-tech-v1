<?php
    $seo = [
        'title' => 'Devotion Technologies Careers | Build Your Future With Us',
        'description' => 'Discover exciting career opportunities at Devotion Technologies. Work with talented professionals and contribute to innovative software, web, and digital technology solutions.',
        'keywords' => 'Devotion Technologies jobs, career opportunities, IT company careers, software engineer jobs, developer vacancies, technology jobs',
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

    img {
        max-width: 100%;
        display: block;
    }

    .cta-btn {
        background: #12172e;
        color: #fff;
        padding: 11px 22px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
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

    /* SECTIONS */
    section.block {
        margin: 0 auto;
        padding: 70px 60px;
    }

    section.block.alt {
        background: #f7f5f0;
        max-width: none;
        padding: 70px 60px;
    }

    section.block.alt .inner {
        max-width: 1180px;
        margin: 0 auto;
    }

    .section-head .eyebrow {
        margin-bottom: 16px;
    }

    .section-head h2 {
        font-size: 32px;
        color: #12172e;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 12px;
    }

    .section-head p {
        color: #7b8199;
        font-size: 1rem;
    }

    /* WHY WORK WITH US - cards */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .value-card {
        background: #fff;
        border: 1px solid #e7e3da;
        border-radius: 12px;
        padding: 26px 22px;
    }

    .value-card .icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #faf3e8;
        color: #b57a3f;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 16px;
        font-weight: 700;
    }

    .value-card h4 {
        color: #12172e;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .value-card p {
        font-size: 1rem;
        color: #7b8199;
        margin: 0;
    }

    /* BENEFITS */
    .benefit-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .benefit-item {
        display: flex;
        gap: 14px;
        background: #fff;
        border: 1px solid #e7e3da;
        border-radius: 10px;
        padding: 18px 20px;
        align-items: flex-start;
    }

    .benefit-item .tick {
        width: 26px;
        height: 26px;
        min-width: 26px;
        border-radius: 50%;
        background: #12172e;
        color: #c8935a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
    }

    .benefit-item h4 {
        color: #1b2036;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .benefit-item p {
        font-size: 1rem;
        color: #7b8199;
        margin: 0;
    }

    /* HIRING PROCESS */
    .process-row {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 0;
        position: relative;
    }

    .process-step {
        text-align: center;
        padding: 0 14px;
        position: relative;
    }

    .process-step::before {
        content: "";
        position: absolute;
        top: 23px;
        left: -50%;
        width: 100%;
        height: 2px;
        background: #e7e3da;
        z-index: 0;
    }

    .process-step:first-child::before {
        display: none;
    }

    .process-num {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #12172e;
        color: #c8935a;
        font-weight: 800;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        position: relative;
        z-index: 1;
    }

    .process-step h4 {
        color: #12172e;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .process-step p {
        font-size: 1rem;
        color: #7b8199;
    }

    /* OPEN POSITIONS */
    .filter-bar {
        display: flex;
        gap: 10px; 
        margin-bottom: 36px;
        flex-wrap: wrap;
    }

    .filter-pill {
        background: #fff;
        border: 1px solid #e7e3da;
        padding: 9px 18px;
        border-radius: 30px;
        font-size: 13.5px;
        font-weight: 600;
        color: #1b2036;
    }

    .filter-pill.active {
        background: #aa8038;
        color: #fff;
        border-color: #aa8038;
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
        padding: 24px 26px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .job-info h4 {
        color: #12172e;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .job-meta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .job-tag {
        font-size: 1rem;
        font-weight: 600;
        padding: 4px 12px;
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

    .job-apply {
        background: #aa8038;
        color: #fff;
        padding: 11px 22px;
        border-radius: 6px;
        font-size: 13.5px;
        font-weight: 700;
        white-space: nowrap;
    }

    .no-role-box {
        text-align: center;
        background: #fff;
        border: 1px dashed #e7e3da;
        border-radius: 12px;
        padding: 36px 26px;
        margin-top: 8px;
    }

    .no-role-box h4 {
        color: #12172e;
        margin-bottom: 8px;
        font-size: 1.2rem;
    }

    .no-role-box p {
        color: #7b8199;
        font-size: 1rem;
        margin-bottom: 18px;
    }

    /* TESTIMONIALS */
    .testi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .testi-card {
        background: #fff;
        border: 1px solid #e7e3da;
        border-radius: 12px;
        padding: 24px;
    }

    .testi-card p {
        font-size: 1rem;
        color: #4a5170;
        margin-bottom: 18px;
    }

    .testi-person {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #c8935a;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    .testi-person .name {
        font-weight: 700;
        color: #1b2036;
        font-size: 1rem;
    }

    .testi-person .role {
        font-size: 1rem;
        color: #7b8199;
    }

    /* CONTACT CTA */
    .contact-cta {
        background: #12172e;
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
        color: #c9cde0;
        margin-bottom: 22px;
        font-size: 1rem;
        margin-left: auto;
        margin-right: auto;
    }

    .contact-cta a.btn {
        background: #c8935a;
        color: #fff;
        padding: 12px 26px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 14px;
        display: inline-block;
    }

    @media (max-width:900px) {

        section.block,
        section.block.alt {
            padding: 50px 20px;
        }

        .value-grid {
            grid-template-columns: 1fr 1fr;
        }

        .benefit-grid {
            grid-template-columns: 1fr;
        }

        .process-row {
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .process-step::before {
            display: none;
        }

        .testi-grid {
            grid-template-columns: 1fr;
        }

        .job-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .hero h1 {
            font-size: 32px;
        }

        .stat-row {
            gap: 30px;
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
        <h1>Careers</h1>
        <p>We're a team of engineers, consultants, and problem-solvers helping businesses run on better technology. Come do the best work of your career with people who've got your back.</p>
        <span class="last-updated">Last updated: July 1, 2026</span>
    </div>
</section>

<!-- WHY WORK WITH US -->
<section class="container block">
    <div class="section-head">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Why Devotion Technology
        </div>
        <h2>A place to grow, not just clock in</h2>
        <p>We invest in our people the same way we invest in our clients' infrastructure — deliberately, and for the long term.</p>
    </div>
    <div class="value-grid">
        <div class="value-card">
            <div class="icon">01</div>
            <h4>Real Ownership</h4>
            <p>You'll own projects end-to-end, not just tickets — from client conversations to shipped solutions.</p>
        </div>
        <div class="value-card">
            <div class="icon">02</div>
            <h4>Continuous Learning</h4>
            <p>Certification sponsorships, conference budgets, and dedicated time to explore new tools and platforms.</p>
        </div>
        <div class="value-card">
            <div class="icon">03</div>
            <h4>Flexible Working</h4>
            <p>Remote-friendly and hybrid options across most roles, built around outcomes rather than hours logged.</p>
        </div>
        <div class="value-card">
            <div class="icon">04</div>
            <h4>Collaborative Culture</h4>
            <p>Flat structure, direct access to leadership, and a team that shares knowledge instead of guarding it.</p>
        </div>
    </div>
</section>

<!-- BENEFITS -->
<section class="block alt">
    <div class="inner">
        <div class="section-head">
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Benefits
            </div>
            <h2>What you'll get as part of the team</h2>
            <p>Compensation and benefits designed to support your work and your life outside of it.</p>
        </div>
        <div class="benefit-grid">
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Competitive Salary</h4>
                    <p>Market-benchmarked pay with regular performance reviews and raises.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Health Coverage</h4>
                    <p>Comprehensive medical, dental, and vision coverage for you and your dependents.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Paid Time Off</h4>
                    <p>Generous annual leave, plus public holidays and paid sick leave.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Learning Budget</h4>
                    <p>Annual allowance for courses, certifications, and industry conferences.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Remote &amp; Hybrid Options</h4>
                    <p>Work from home, our office, or a mix — whatever suits your role and life.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Latest Equipment</h4>
                    <p>A laptop and setup of your choice, refreshed on a regular cycle.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Team Retreats</h4>
                    <p>Company-wide offsites and team events to celebrate wins and unwind.</p>
                </div>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill" style="font-size:20px;"></i>
                <div>
                    <h4>Career Growth Plans</h4>
                    <p>Clear progression frameworks and mentorship at every level.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HIRING PROCESS -->
<section class="container block">
    <div class="section-head">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Our Process
        </div>
        <h2>How hiring works</h2>
        <p>A straightforward process, usually completed within two to three weeks.</p>
    </div>
    <div class="process-row">
        <div class="process-step">
            <div class="process-num">1</div>
            <h4>Apply</h4>
            <p>Submit your resume and a short note about why you're interested.</p>
        </div>
        <div class="process-step">
            <div class="process-num">2</div>
            <h4>Screening Call</h4>
            <p>A 20-minute conversation with our talent team about your background.</p>
        </div>
        <div class="process-step">
            <div class="process-num">3</div>
            <h4>Skills Interview</h4>
            <p>A technical or role-specific discussion with the hiring team.</p>
        </div>
        <div class="process-step">
            <div class="process-num">4</div>
            <h4>Final Interview</h4>
            <p>Meet leadership and team members you'll be working with directly.</p>
        </div>
        <div class="process-step">
            <div class="process-num">5</div>
            <h4>Offer</h4>
            <p>We move fast — most candidates hear back within a few days.</p>
        </div>
    </div>
</section>

<!-- OPEN POSITIONS -->
<section class="block alt" id="open-roles">
    <div class="inner">
        <div class="section-head">
            <div class="badge-pill mb-4">
                <span class="dot"></span>
                Open Roles
            </div>
            <h2>Current opportunities</h2>
            <p>Don't see a fit? We're always happy to hear from good people — send us your resume anyway.</p>
        </div>

        <div class="filter-bar">
            <span class="filter-pill active">All Departments</span>
            <span class="filter-pill">Engineering</span>
            <span class="filter-pill">IT Support</span>
            <span class="filter-pill">Cloud &amp; Infrastructure</span>
            <span class="filter-pill">Sales &amp; Marketing</span>
        </div>

        <div class="job-list">

            <div class="job-card">
                <div class="job-info">
                    <h4>Senior Network Engineer</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">Infrastructure</span>
                        <span class="job-tag loc">Hybrid · Dubai, UAE</span>
                        <span class="job-tag type">Full-time</span>
                    </div>
                </div>
                <a href="careear-detail.php" class="job-apply">Apply Now →</a>
            </div>

            <div class="job-card">
                <div class="job-info">
                    <h4>Full-Stack Developer (React / Node)</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">Engineering</span>
                        <span class="job-tag loc">Remote</span>
                        <span class="job-tag type">Full-time</span>
                    </div>
                </div>
                <a href="careear-detail.php" class="job-apply">Apply Now →</a>
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
                <a href="careear-detail.php" class="job-apply">Apply Now →</a>
            </div>

            <div class="job-card">
                <div class="job-info">
                    <h4>Cloud Solutions Architect</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">Cloud &amp; Infrastructure</span>
                        <span class="job-tag loc">Hybrid</span>
                        <span class="job-tag type">Full-time</span>
                    </div>
                </div>
                <a href="careear-detail.php" class="job-apply">Apply Now →</a>
            </div>

            <div class="job-card">
                <div class="job-info">
                    <h4>Business Development Executive</h4>
                    <div class="job-meta">
                        <span class="job-tag dept">Sales &amp; Marketing</span>
                        <span class="job-tag loc">On-site · Dubai, UAE</span>
                        <span class="job-tag type">Full-time</span>
                    </div>
                </div>
                <a href="careear-detail.php" class="job-apply">Apply Now →</a>
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
                <a href="careear-detail.php" class="job-apply">Apply Now →</a>
            </div>
        </div>

        <div class="no-role-box">
            <h4>Don't see the right role?</h4>
            <p>We're growing fast and always looking for great IT talent. Send us your resume and we'll reach out when something fits.</p>
            <a href="javascript:void();" class="cta-btn" style="display:inline-block;">Submit General Application</a>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class=" container block">
    <div class="section-head">
        <div class="badge-pill mb-4">
            <span class="dot"></span>
            Life at Devotion
        </div>
        <h2>What our team says</h2>
        <p>Hear directly from the people building Devotion Technology.</p>
    </div>

    <div class="testi-grid">
        <div class="testi-card">
            <p>"I've grown more in two years here than in five years anywhere else. Leadership actually listens, and you get real ownership from day one."</p>
            <div class="testi-person">
                <div class="avatar-circle">A</div>
                <div>
                    <div class="name">Aisha R.</div>
                    <div class="role">Cloud Engineer</div>
                </div>
            </div>
        </div>
        <div class="testi-card">
            <p>"The flexibility is real, not just a talking point. I work from home three days a week and no one blinks — it's about the work, not the hours."</p>
            <div class="testi-person">
                <div class="avatar-circle">M</div>
                <div>
                    <div class="name">Marcus T.</div>
                    <div class="role">Full-Stack Developer</div>
                </div>
            </div>
        </div>
        <div class="testi-card">
            <p>"Support tickets never feel like a grind here — the team culture makes even the busiest weeks manageable, and management genuinely has your back."</p>
            <div class="testi-person">
                <div class="avatar-circle">P</div>
                <div>
                    <div class="name">Priya N.</div>
                    <div class="role">IT Support Lead</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT CTA -->
<section class="block container" style="padding-top:0;">
    <div class="contact-cta">
        <h3>Ready to build something great?</h3>
        <p>Explore our open roles or send us your resume — we'd love to hear from you.</p>
        <a href="#open-roles" class="btn">View Open Roles</a>
    </div>
</section>
 
<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>