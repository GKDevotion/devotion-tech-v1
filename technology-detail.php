<?php
// ---- Load technology categories from JSON ----
$techPath = __DIR__ . '/data/technology.json';
$technologies = [];
if (file_exists($techPath)) {
    $json = file_get_contents($techPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $technologies = $decoded;
    }
}

// ---- Resolve the requested technology by slug ----
$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
$tech = null;
foreach ($technologies as $t) {
    if ($t['slug'] === $slug) {
        $tech = $t;
        break;
    }
}
// Fallback to the first entry so the page never renders empty during development
if (!$tech && count($technologies) > 0) {
    $tech = $technologies[0];
}

$seo = [
    'title' => ($tech ? $tech['title'] : 'Technology') . ' | Devotion Technologies - Technology Experts & Innovators',
    'description' => $tech ? $tech['tagline'] : 'Explore the technology stack at Devotion Technologies.',
    'keywords' => 'Devotion Technologies ' . ($tech ? strtolower($tech['title']) : 'technology') . ', tech stack, software development',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

// ---- Inline icon library, keyed by the "icon" field in technology.json ----
$techIcons = [
    'monitor'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="4" width="19" height="13" rx="2" /><path d="M8 21h8M12 17v4" /></svg>',
    'server'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3.5" width="18" height="7" rx="1.6" /><rect x="3" y="13.5" width="18" height="7" rx="1.6" /><circle cx="7" cy="7" r="1" fill="currentColor" stroke="none" /><circle cx="7" cy="17" r="1" fill="currentColor" stroke="none" /></svg>',
    'device'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="7" y="2" width="10" height="20" rx="2" /><path d="M11 18h2" /></svg>',
    'cloud'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 18a4.5 4.5 0 01-1-8.9A5.5 5.5 0 0116.9 8.1 4 4 0 0117 16H7z" /></svg>',
    'database' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><ellipse cx="12" cy="5.5" rx="8" ry="3" /><path d="M4 5.5V18a8 3 0 0016 0V5.5" /><path d="M4 12a8 3 0 0016 0" /></svg>',
    'spark'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l1.8 6.2L20 10l-6.2 1.8L12 18l-1.8-6.2L4 10l6.2-1.8z" /></svg>',
    'link'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 15l6-6" /><path d="M10 6l1-1a4 4 0 015.7 5.7l-1 1M14 18l-1 1a4 4 0 01-5.7-5.7l1-1" /></svg>',
];
function tech_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['spark'];
}

// Other technologies for the sidebar nav + related strip (everything except the current one)
$otherTechnologies = array_values(array_filter($technologies, function ($t) use ($tech) {
    return !$tech || $t['slug'] !== $tech['slug'];
}));
?>


<?php if ($tech): ?>

    <style>
        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        section {
            padding: 90px 0;
        }

        .section-head {
            max-width: 680px;
            margin-bottom: 40px;
        }

        .section-head h2 {
            font-size: clamp(1.5rem, 2.4vw, 2rem);
            font-weight: 700;
            color: #070d24;
            margin: 12px 0 10px;
        }

        .section-head p {
            color: #6c7280;
            font-size: 1rem;
            max-width: 640px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: 10px;
            font-size: .92rem;
            font-weight: 600;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .btn-gold {
            background: #b38f51;
            color: #fff;
        }

        .btn-gold:hover {
            background: #8f7040;
            color: #fff;
        }

        .btn-outline-light {
            border: 1.5px solid rgba(255, 255, 255, .4);
            color: #fff;
        }

        .btn-outline-light:hover {
            background: #fff;
            color: #070d24;
        }

        /* ---------- BREADCRUMB ---------- */
        .breadcrumb-bar {
            background: #fff;
            border-bottom: 1px solid #e8e3d6;
            padding: 16px 0;
        }

        .breadcrumb-bar ul {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            font-size: 1.2rem;
            color: #6c7280;
        }

        .breadcrumb-bar a:hover {
            color: #8f7040;
        }

        .breadcrumb-bar li.current {
            color: #070d24;
            font-weight: 600;
        }

        .breadcrumb-bar .sep {
            color: #c7cbd3;
        }


        /* =========================================
        TECHNOLOGY HERO
        Premium Dark Background Image Layout
        ========================================= */

        .tech-hero {
            position: relative;
            min-height: 310px;
            display: flex;
            align-items: center;
            overflow: hidden;
            background-image: url('../d-tech/assets/images/service-hero-bg.jpg');
            background-size: cover;
            background-position: center;
            color: #FFFFFF;
        }

        /* =========================================
        OVERLAY
        ========================================= */
        .tech-hero-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        /* =========================================
        HERO INNER
        ========================================= */
        .tech-hero-inner {
            min-height: 310px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 45px;
            padding: 55px 0;
        }

        /* =========================================
        TECHNOLOGY MAIN CONTENT
        ========================================= */
        .tech-hero-main {
            display: flex;
            align-items: center;
            gap: 28px;
            justify-content: end;
            min-width: 0;
            flex: 1;
        }

        /* =========================================
            TECHNOLOGY ICON
        ========================================= */
        .tech-hero-icon {
            position: relative;
            width: 76px;
            height: 76px;
            flex: 0 0 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.20);
            border-radius: 20px;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.08),
                0 12px 30px rgba(0, 0, 0, 0.15);
            color: #B38F51;
            backdrop-filter: blur(10px);
        }

        /* Icon size */
        .tech-hero-icon svg {
            width: 36px;
            height: 36px;
        }

        /* Gold glow */
        .tech-hero-icon::after {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            border: 1px solid rgba(179, 143, 81, 0.30);
            pointer-events: none;
        }

        /* =========================================
            HERO TEXT
        ========================================= */
        .tech-hero-text {
            min-width: 0;
        }

        /* Eyebrow */
        .tech-hero .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 12px;
            color: #D0B477;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .tech-hero .eyebrow::before {
            content: "";
            width: 22px;
            height: 2px;
            border-radius: 20px;
            background: #B38F51;
        }

        /* Heading */
        .tech-hero h1 {
            margin: 0 0 13px;
            color: #FFFFFF;
            font-size: clamp(32px, 4vw, 52px);
            font-weight: 700;
            line-height: 1.12;
            letter-spacing: -1.3px;
        }

        /* Tagline */
        .tech-hero .tagline {
            max-width: 680px;
            margin: 0;
            color: rgba(255, 255, 255, 0.76);
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* =========================================
        HERO STATISTIC
        ========================================= */
        .tech-hero-stat {
            position: relative;
            flex: 0 0 267px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 8px;
            padding: 10px 0 10px 35px;
            border-left: 1px solid rgba(255, 255, 255, 0.20);
        }

        /* Value */
        .tech-hero-stat strong {
            display: block;
            color: #B38F51;
            font-size: clamp(30px, 3vw, 42px);
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        /* Label */
        .tech-hero-stat span {
            color: rgba(255, 255, 255, 0.68);
            font-size: 1.2rem;
            line-height: 1.5;
        }

        /* =========================================
        DECORATIVE GOLD LINE
        ========================================= */
        .tech-hero-stat::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 35px;
            width: 40px;
            height: 2px;
            background: #B38F51;
        }

        /* =========================================
        TABLET
        ========================================= */
        @media (max-width: 991.98px) {
            .tech-hero {
                min-height: 280px;
            }

            .tech-hero-inner {
                min-height: 280px;
                gap: 30px;
                padding: 45px 0;
            }

            .tech-hero-main {
                gap: 20px;
            }

            .tech-hero-icon {
                width: 64px;
                height: 64px;
                flex-basis: 64px;
                border-radius: 16px;
            }

            .tech-hero-icon svg {
                width: 30px;
                height: 30px;
            }

            .tech-hero-stat {
                flex-basis: 175px;
                padding-left: 25px;
            }

            .tech-hero-stat::after {
                left: 25px;
            }

        }

        /* =========================================
        MOBILE
        ========================================= */
        @media (max-width: 767.98px) {

            .tech-hero {
                min-height: auto;
                background-position: center;
            }

            .tech-hero-inner {
                min-height: auto;
                flex-direction: column;
                align-items: flex-start;
                gap: 30px;
                padding: 45px 0 40px;
            }

            .tech-hero-main {
                width: 100%;
                align-items: flex-start;
                gap: 17px;
            }

            .tech-hero-icon {
                width: 58px;
                height: 58px;
                flex-basis: 58px;
                border-radius: 15px;
            }

            .tech-hero-icon svg {
                width: 27px;
                height: 27px;
            }

            .tech-hero .eyebrow {
                font-size: 10px;
                letter-spacing: 1.5px;
                margin-bottom: 10px;
            }

            .tech-hero h1 {
                font-size: 32px;
                letter-spacing: -0.7px;
                line-height: 1.2;
            }

            .tech-hero .tagline {
                font-size: 13px;
                line-height: 1.75;
            }

            .tech-hero-stat {
                width: 100%;
                flex-basis: auto;
                padding: 22px 0 0;
                border-left: none;
                border-top: 1px solid rgba(255, 255, 255, 0.20);
                gap: 6px;
            }

            .tech-hero-stat strong {
                font-size: 32px;
            }

            .tech-hero-stat::after {
                top: -1px;
                bottom: auto;
                left: 0;
            }

        }

        /* =========================================
        SMALL MOBILE
        ========================================= */
        @media (max-width: 380px) {

            .tech-hero-inner {
                padding: 35px 0;
            }

            .tech-hero-main {
                gap: 14px;
            }

            .tech-hero-icon {
                width: 52px;
                height: 52px;
                flex-basis: 52px;
            }

            .tech-hero h1 {
                font-size: 28px;
            }

            .tech-hero .tagline {
                font-size: 12px;
            }

        }


        /* =========================================
        TECHNOLOGY CORE STACK SECTION
        Premium Professional Layout
        ========================================= */

        .tech-stack-section {
            position: relative;
            padding: 100px 0 115px;
            overflow: hidden;
        }

        /* =========================================
        MAIN GRID
        ========================================= */

        .tech-stack-layout {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns:
                minmax(0, 1fr) minmax(285px, 330px);
            gap: 65px;
            align-items: start;
        }


        /* =========================================
        MAIN CONTENT
        ========================================= */

        .tech-stack-main {
            min-width: 0;
        }


        /* =========================================
        OVERVIEW
        ========================================= */
        .tech-overview {
            margin-bottom: 35px;
            padding-left: 20px;
            border-left: 3px solid #B38F51;
        }

        .tech-overview-label {
            display: block;
            margin-bottom: 10px;
            color: #b38f51;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .tech-overview-text {
            max-width: 800px;
            margin: 0;
            color: #253B61;
            font-size: 1rem;
            line-height: 1.95;
        }


        /* =========================================
        SECTION HEADING
        ========================================= */
        .tech-stack-heading {
            margin-bottom: 30px;
        }

        .tech-stack-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 16px;
            border: 1px solid #E5DED2;
            border-radius: 50px;
            background: #FFFFFF;
            color: #35435E;
            font-size: 1rem;
            font-weight: 600;
        }

        .tech-stack-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #B38F51;
        }

        .tech-stack-heading h2 {
            margin: 20px 0 14px;
            color: #070D24;
            font-size: clamp(30px, 3.2vw, 43px);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .tech-stack-heading p {
            margin: 0;
            color: #737C91;
            font-size: 1rem;
            line-height: 1.85;
        }


        /* =========================================
        STACK SUMMARY
        ========================================= */

        .stack-summary {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 32px;
            padding: 17px 20px;
            border: 1px solid #E8E1D6;
            border-radius: 14px;
            background:
                linear-gradient(110deg,
                    #FCFAF6,
                    #FFFFFF);
        }

        .stack-summary-icon {
            width: 45px;
            height: 45px;
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #F5F0E7;
            color: #B38F51;
        }

        .stack-summary-icon svg {
            width: 25px;
            height: 25px;
        }

        .stack-summary strong {
            display: block;
            margin-bottom: 4px;
            color: #07112E;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .stack-summary span {
            display: block;
            color: #858D9E;
            font-size: 1rem;
            line-height: 1.5;
        }


        /* =========================================
        STACK BARS
        ========================================= */

        .stack-bars-wrapper {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .stack-item {
            width: 100%;
        }

        .stack-item-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 10px;
        }

        .stack-item-name {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .stack-index {
            color: #B38F51;
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .stack-item-name .name {
            color: #07112E;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .stack-item-header .level {
            flex: 0 0 auto;
            color: #A47C39;
            font-size: 1.2rem;
            font-weight: 700;
        }


        /* Bar track */

        .stack-bar-track {
            position: relative;
            width: 100%;
            height: 10px;
            border: 1px solid #E6DED0;
            border-radius: 50px;
            background: #F7F4EF;
            overflow: hidden;
        }

        /* Bar fill */
        .stack-bar-fill {
            position: relative;
            width: var(--stack-level, 0%);
            height: 100%;
            border-radius: inherit;
            background: #b38f51;
            transition: width 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }


        /* Highlight on fill */
        .stack-bar-fill::after {
            content: "";
            position: absolute;
            top: 2px;
            left: 4px;
            right: 4px;
            height: 2px;
            border-radius: 50px;
        }

        /* =========================================
        STACK TRUST ROW
        ========================================= */
        .stack-trust-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px 25px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid #EAE4DA;
        }

        .stack-trust-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #68748B;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .trust-check {
            width: 21px;
            height: 21px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #68748B;
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
        }

        /* =========================================
        SIDEBAR
        ========================================= */
        .tech-stack-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
            min-width: 0;
            /* Sticky sidebar */
            position: sticky;
            top: 30px;
            align-self: start;
        }


        /* =========================================
        NAVIGATION CARD
        ========================================= */
        .tech-navigation-card {
            padding: 24px 20px 20px;
            border: 1px solid #E5DED2;
            border-radius: 17px;
            background: #FFFFFF;
            box-shadow: 0 7px 25px rgba(7, 13, 36, 0.035);
        }

        .tech-sidebar-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 20px;
            padding-bottom: 18px;
            border-bottom: 1px solid #EEE8DE;
        }

        .sidebar-heading-icon {
            width: 31px;
            height: 31px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #F5F0E7;
            color: #B38F51;
        }

        .sidebar-heading-icon svg {
            width: 17px;
            height: 17px;
        }

        .tech-sidebar-heading .sc-label {
            color: #9A7844;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }


        /* Navigation list */
        .tech-sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .tech-sidebar-nav li {
            margin: 0;
            padding: 0;
        }

        .tech-sidebar-nav a {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 45px;
            padding: 11px 12px;
            border-radius: 10px;
            color: #747D90;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.25s ease, color 0.25s ease, transform 0.25s ease;
        }

        .tech-nav-dot {
            width: 8px;
            height: 8px;
            flex: 0 0 auto;
            border-radius: 50%;
            background: #D8CBB7;
            transition: background 0.25s ease;
        }

        .tech-nav-arrow {
            margin-left: auto;
            color: #B8A98E;
            font-size: 15px;
            opacity: 0;
            transform: translateX(-4px);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }

        /* Active navigation */
        .tech-sidebar-nav a.active {
            background: linear-gradient(100deg, #F7F3EC, #FBF9F5);
            color: #07112E;
            font-weight: 600;
            box-shadow: inset 3px 0 0 #B38F51;
        }

        .tech-sidebar-nav a.active .tech-nav-dot {
            background: #B38F51;
        }

        .tech-sidebar-nav a.active .tech-nav-arrow {
            opacity: 1;
            font-size: 1.2rem;
            transform: translateX(0);
            color: #B38F51;
        }

        /* Hover */
        .tech-sidebar-nav a:hover {
            background: #F9F6F1;
            color: #07112E;
            transform: translateX(3px);
        }

        .tech-sidebar-nav a:hover .tech-nav-dot {
            background: #B38F51;
        }

        .tech-sidebar-nav a:hover .tech-nav-arrow {
            opacity: 1;
            font-size: 1.2rem;
            transform: translateX(0);
        }

        /* =========================================
        SIDEBAR CTA
        ========================================= */
        .tech-sidebar-cta {
            position: relative;
            padding: 27px 24px 24px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 17px;
            background: #000;
            color: #FFFFFF;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(7, 13, 36, 0.10);
        }


        /* CTA decorative circle */
        .tech-sidebar-cta::after {
            content: "";
            position: absolute;
            right: -75px;
            bottom: -95px;
            width: 210px;
            height: 210px;
            border: 1px solid rgba(179, 143, 81, 0.15);
            border-radius: 50%;
            pointer-events: none;
        }

        .cta-top-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            border: 1px solid rgba(179, 143, 81, 0.35);
            border-radius: 12px;
            background: #fff;
            color: #D0B477;
        }

        .cta-top-icon svg {
            width: 23px;
            height: 23px;
        }

        .cta-label {
            display: block;
            margin-bottom: 9px;
            color: #D0B477;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .tech-sidebar-cta h4 {
            position: relative;
            z-index: 1;
            margin: 0 0 13px;
            color: #FFFFFF;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .tech-sidebar-cta p {
            position: relative;
            z-index: 1;
            margin: 0 0 23px;
            color: rgba(255, 255, 255, 0.68);
            font-size: 1rem;
            line-height: 1.8;
        }

        /* CTA Button */
        .tech-cta-button {
            position: relative;
            z-index: 1;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 17px;
            border-radius: 10px;
            background: #B38F51;
            color: #FFFFFF;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        .tech-cta-button span {
            font-size: 17px;

            line-height: 1;
        }

        .tech-cta-button:hover {
            background: #C6A568;

            color: #FFFFFF;

            transform: translateY(-2px);
        }

        /* CTA bottom */
        .cta-bottom-text {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 19px;
            color: rgba(255, 255, 255, 0.45);
            font-size: 1rem;
        }

        .cta-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #6DAE8D;
            box-shadow: 0 0 0 4px rgba(109, 174, 141, 0.12);
        }

        /* =========================================
        TABLET
        ========================================= */
        @media (max-width: 991.98px) {

            .tech-stack-section {
                padding: 75px 0 90px;
            }

            .tech-stack-layout {
                grid-template-columns: minmax(0, 1fr) minmax(240px, 280px);
                gap: 35px;
            }

            .tech-stack-heading h2 {
                font-size: 34px;
            }

            .tech-overview-text {
                font-size: 14px;
            }

            .tech-stack-sidebar {
                gap: 18px;
            }

        }


        /* =========================================
        MOBILE
        ========================================= */
        @media (max-width: 767.98px) {

            .tech-stack-section {
                padding: 60px 0 70px;
            }

            .tech-stack-layout {
                display: flex;
                flex-direction: column;
                gap: 40px;
            }

            .tech-stack-main {
                width: 100%;
            }

            .tech-stack-sidebar {
                width: 100%;
            }

            .tech-stack-heading h2 {
                font-size: 30px;
                letter-spacing: -0.5px;
            }

            .tech-stack-heading p {
                font-size: 13px;
            }

            .tech-overview {
                padding-left: 15px;
                margin-bottom: 28px;
            }

            .tech-overview-text {
                font-size: 13px;
                line-height: 1.85;
            }

            .stack-summary {
                padding: 15px;
                gap: 12px;
            }

            .stack-summary-icon {
                width: 40px;
                height: 40px;
            }

            .stack-bars-wrapper {
                gap: 22px;
            }

            .stack-item-name .name {
                font-size: 13px;
            }

            .stack-item-header .level {
                font-size: 12px;
            }

            .stack-bar-track {
                height: 9px;
            }

            .stack-trust-row {
                gap: 12px 20px;
            }

            .tech-navigation-card {
                padding: 22px 18px 18px;
            }

            .tech-sidebar-cta {
                padding: 25px 22px;
            }

        }


        /* =========================================
        SMALL MOBILE
        ========================================= */
        @media (max-width: 380px) {

            .tech-stack-heading h2 {
                font-size: 27px;
            }

            .stack-item-name {
                gap: 8px;
            }

            .stack-item-name .name {
                font-size: 12px;
            }

            .stack-summary strong {
                font-size: 12px;
            }

            .stack-summary span {
                font-size: 11px;
            }

            .stack-trust-item {
                font-size: 10px;
            }

        }

        /* =========================================
        TECHNOLOGY USE CASES
        ========================================= */
        .tech-usecases-section {
            padding: 100px 0;
            background: #FAF9F6;
        }

        /* =========================================
        SECTION HEADER
        ========================================= */
        .tech-usecases-header {
            margin-bottom: 42px;
        }

        .tech-usecases-header .badge-pill {
            margin-bottom: 20px;
        }

        .tech-usecases-header h2 {
            margin: 0 0 14px;
            font-size: clamp(30px, 3vw, 42px);
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: -1.1px;
            color: #070D24;
        }

        .tech-usecases-header p {
            margin: 0;
            font-size: 1.2rem;
            line-height: 1.8;
            color: #6D7488;
        }

        /* =========================================
        USE CASE GRID
        ========================================= */
        .usecase-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        /* =========================================
        USE CASE CARD
        ========================================= */
        .usecase-card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 285px;
            padding: 28px 26px 24px;
            overflow: hidden;
            background: #FFFFFF;
            border: 1px solid #E7DFD1;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(7, 13, 36, 0.035);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        /* Top section */
        .usecase-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        /* Number */
        .uc-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: #fff;
            border: 1px solid #E6D5B7;
            color: #b38f51;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        /* Arrow */
        .uc-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #FAF9F6;
            border: 1px solid #EEE7DB;
            color: #B38F51;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .uc-arrow svg {
            width: 17px;
            height: 17px;
        }

        /* Content */
        .usecase-card-content {
            flex: 1;
        }

        .usecase-card h4 {
            margin: 0 0 13px;
            color: #070D24;
            font-size: 1.4rem;
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: -0.3px;
        }

        .usecase-card p {
            margin: 0;
            color: #697287;
            font-size: 1.2rem;
            line-height: 1.75;
        }

        /* Bottom accent line */
        .usecase-card-line {
            width: 42px;
            height: 3px;
            margin-top: 25px;
            border-radius: 10px;
            background: #B38F51;
            transition: width 0.3s ease;
        }

        /* =========================================
        HOVER EFFECT
        ========================================= */
        @media (hover: hover) and (pointer: fine) {

            .usecase-card:hover {
                transform: translateY(-7px);
                border-color: #D8C29D;
                box-shadow: 0 18px 45px rgba(7, 13, 36, 0.09);
            }

            .usecase-card:hover .uc-arrow {
                background: #B38F51;
                color: #FFFFFF;
                transform: rotate(45deg);
            }

            .usecase-card:hover .usecase-card-line {
                width: 75px;
            }

        }

        /* =========================================
        TABLET
        ========================================= */
        @media (max-width: 991.98px) {

            .tech-usecases-section {
                padding: 75px 0;
            }

            .usecase-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px;
            }

        }

        /* =========================================
        MOBILE
        ========================================= */
        @media (max-width: 575.98px) {

            .tech-usecases-section {
                padding: 55px 0;
            }

            .tech-usecases-header {
                margin-bottom: 30px;
            }

            .tech-usecases-header h2 {
                font-size: 29px;
                letter-spacing: -0.6px;
            }

            .tech-usecases-header p {
                font-size: 14px;
                line-height: 1.7;
            }

            .usecase-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .usecase-card {
                min-height: auto;
                padding: 24px 22px 22px;
                border-radius: 17px;
            }

            .usecase-card-top {
                margin-bottom: 24px;
            }

            .usecase-card h4 {
                font-size: 18px;
            }

        }

        /* =========================================
        TECHNOLOGY PROCESS SECTION
        ========================================= */
        .tech-process-section {
            position: relative;
            padding: 105px 0 115px;
            overflow: hidden;
        }

        /* =========================================
        SECTION HEADER
        ========================================= */
        .tech-process-header {
            margin-bottom: 50px;
        }

        .tech-process-header h2 {
            margin: 0 0 15px;
            color: #070D24;
            font-size: clamp(30px, 3vw, 43px);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -1.2px;
        }

        .tech-process-header p {
            margin: 0;
            color: #6D7488;
            font-size: 16px;
            line-height: 1.8;
        }

        /* =========================================
        TIMELINE WRAPPER
        ========================================= */
        .tech-process-timeline {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        /* =========================================
        VERTICAL CONNECTOR
        ========================================= */

        .tech-process-timeline::before {
            content: "";
            position: absolute;
            left: 25px;
            top: 27px;
            bottom: 27px;
            width: 1px;
            background: linear-gradient(to bottom, #B38F51, #E5DED2 90%);
        }

        /* =========================================
        TIMELINE ITEM
        ========================================= */
        .tech-process-item {
            position: relative;
            display: grid;
            grid-template-columns: 52px minmax(0, 1fr);
            gap: 22px;
            align-items: start;
        }

        /* =========================================
        NUMBER CIRCLE
        ========================================= */
        .tech-process-number {
            position: relative;
            z-index: 2;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #FFFFFF;
            border: 1px solid #B38F51;
            box-shadow: 0 0 0 7px #FAF9F6;
        }

        .tech-process-number span {
            color: #96723D;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }


        /* =========================================
        PROCESS CARD
        ========================================= */
        .tech-process-card {
            position: relative;
            min-height: 180px;
            padding: 27px 30px 24px;
            background: #FFFFFF;
            border: 1px solid #E5DED2;
            border-radius: 18px;
            box-shadow: 0 7px 28px rgba(7, 13, 36, 0.035);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* =========================================
        CARD TOP
        ========================================= */
        .tech-process-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        /* Step label */
        .tech-process-step {
            color: #B38F51;
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 1.1px;
        }

        /* Arrow */
        .tech-process-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #FAF9F6;
            border: 1px solid #EEE5D7;
            color: #B38F51;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .tech-process-arrow svg {
            width: 16px;
            height: 16px;
        }

        /* =========================================
        CARD CONTENT
        ========================================= */
        .tech-process-card h4 {
            margin: 0 0 10px;
            color: #070D24;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: -0.3px;
        }

        .tech-process-card p {
            margin: 0;
            color: #6D7488;
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* =========================================
        CARD BOTTOM
        ========================================= */

        .tech-process-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 23px;
        }

        .tech-process-line {
            display: block;
            width: 45px;
            height: 3px;
            border-radius: 10px;
            background: #B38F51;
            transition: width 0.3s ease;
        }

        .tech-process-status {
            color: #B5A58B;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.8px;
        }

        /* =========================================
        HOVER EFFECT
        ========================================= */
        @media (hover: hover) and (pointer: fine) {

            .tech-process-card:hover {
                transform: translateY(-5px);
                border-color: #D7C29D;
                box-shadow: 0 17px 40px rgba(7, 13, 36, 0.08);
            }

            .tech-process-card:hover .tech-process-arrow {
                background: #B38F51;
                color: #FFFFFF;
                transform: rotate(45deg);
            }

            .tech-process-card:hover .tech-process-line {
                width: 80px;
            }

        }

        /* =========================================
        TABLET
        ========================================= */
        @media (max-width: 991.98px) {

            .tech-process-section {
                padding: 80px 0 90px;
            }

            .tech-process-header {
                margin-bottom: 40px;
            }

            .tech-process-timeline {
                max-width: 100%;
            }

        }

        /* =========================================
        MOBILE
        ========================================= */
        @media (max-width: 575.98px) {

            .tech-process-section {
                padding: 60px 0 70px;
            }

            .tech-process-header {
                margin-bottom: 32px;
            }

            .tech-process-header h2 {
                font-size: 29px;
                letter-spacing: -0.7px;
            }

            .tech-process-header p {
                font-size: 14px;
                line-height: 1.7;
            }

            .tech-process-timeline {
                gap: 20px;
            }

            .tech-process-timeline::before {
                left: 21px;
                top: 23px;
                bottom: 23px;
            }

            .tech-process-item {
                grid-template-columns: 44px minmax(0, 1fr);
                gap: 15px;
            }

            .tech-process-number {
                width: 44px;
                height: 44px;

                box-shadow: 0 0 0 5px #FAF9F6;
            }

            .tech-process-number span {
                font-size: 11px;
            }

            .tech-process-card {
                min-height: auto;

                padding: 22px 19px 20px;

                border-radius: 15px;
            }

            .tech-process-card-top {
                margin-bottom: 15px;
            }

            .tech-process-card h4 {
                font-size: 17px;
            }

            .tech-process-card p {
                font-size: 14px;
                line-height: 1.7;
            }

            .tech-process-bottom {
                margin-top: 20px;
            }

        }

        /* =========================================
        PROJECT TYPES SECTION
        ========================================= */

        .tech-projects-section {
            padding: 100px 0 80px;
            background: #FAF9F6;
        }

        /* =========================================
        SECTION HEADER
        ========================================= */
        .tech-projects-header {
            max-width: 780px;
            margin-bottom: 40px;
        }

        .tech-projects-header .badge-pill {
            margin-bottom: 20px;
        }

        .tech-projects-header h2 {
            margin: 0 0 15px;
            color: #070D24;
            font-size: clamp(30px, 3vw, 42px);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .tech-projects-header p {
            margin: 0;
            color: #6D7488;
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* =========================================
        PROJECT TYPES GRID
        ========================================= */
        .project-types-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        /* =========================================
        PROJECT TYPE CARD
        ========================================= */
        .project-type-card {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 24px 22px 22px;
            background: #FFFFFF;
            border: 1px solid #E5DED2;
            border-radius: 18px;
            box-shadow: 0 7px 25px rgba(7, 13, 36, 0.035);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* =========================================
        ICON
        ========================================= */

        .project-type-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            border-radius: 14px;
            background: #F6F0E6;
            border: 1px solid #E9DCC7;
            color: #B38F51;
        }

        .project-type-icon svg {
            width: 23px;
            height: 23px;
        }

        /* =========================================
        CONTENT
        ========================================= */

        .project-type-content {
            flex: 1;
        }

        .project-type-number {
            display: block;
            margin-bottom: 10px;
            color: #B38F51;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .project-type-card h4 {
            margin: 0;
            color: #070D24;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.45;
        }

        /* =========================================
        ARROW
        ========================================= */
        .project-type-arrow {
            position: absolute;
            top: 25px;
            right: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 31px;
            height: 31px;
            border-radius: 50%;
            background: #FAF9F6;
            border: 1px solid #EEE5D7;
            color: #B38F51;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .project-type-arrow svg {
            width: 15px;
            height: 15px;
        }


        /* =========================================
        HOVER
        ========================================= */
        @media (hover: hover) and (pointer: fine) {

            .project-type-card:hover {
                transform: translateY(-6px);
                border-color: #D8C29D;
                box-shadow: 0 18px 40px rgba(7, 13, 36, 0.08);
            }

            .project-type-card:hover .project-type-arrow {
                background: #B38F51;
                color: #FFFFFF;
                transform: rotate(45deg);
            }

        }

        /* =========================================
        TESTIMONIAL SECTION
        ========================================= */
        .tech-testimonial-section {
            padding: 100px 0 105px;
            background: #FFFFFF;
        }

        /* =========================================
        TESTIMONIAL CARD
        ========================================= */
        .tech-testimonial-card {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 28px;
            padding: 42px 45px;
            background: #FAF9F6;
            border: 1px solid #E5DED2;
            border-radius: 22px;
            overflow: hidden;
        }

        /* =========================================
        QUOTE ICON
        ========================================= */
        .testimonial-quote-icon {
            flex-shrink: 0;
            color: #B38F51;
            font-family: Georgia, serif;
            font-size: 70px;
            font-weight: 700;
            line-height: 0.9;
        }

        /* =========================================
        CONTENT
        ========================================= */
        .tech-testimonial-content {
            position: relative;
            z-index: 2;
            flex: 1;
            min-width: 0;
        }

        .testimonial-label {
            display: block;
            margin-bottom: 17px;
            color: #B38F51;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .tech-testimonial-quote {
            margin: 0 0 25px;
            color: #070D24;
            font-size: clamp(18px, 2vw, 20px);
            font-weight: 500;
            line-height: 1.65;
            letter-spacing: -0.2px;
        }

        /* =========================================
        AUTHOR
        ========================================= */
        .tech-testimonial-author {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .author-avatar {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #070D24;
            color: #B38F51;
            font-size: 15px;
            font-weight: 700;
        }

        .tech-testimonial-author strong {
            display: block;
            margin-bottom: 3px;
            color: #070D24;
            font-size: 14px;
            font-weight: 700;
        }

        .tech-testimonial-author span {
            display: block;
            color: #7B8191;
            font-size: 1rem;
        }

        /* =========================================
        DECORATION
        ========================================= */
        .testimonial-decoration {
            position: absolute;
            right: 35px;
            bottom: 25px;
            display: flex;
            align-items: center;
            gap: 7px;
            opacity: 0.65;
        }

        .testimonial-decoration span {
            display: block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #B38F51;
        }

        .testimonial-decoration span:nth-child(2) {
            opacity: 0.6;
        }

        .testimonial-decoration span:nth-child(3) {
            opacity: 0.3;
        }

        /* ---------- FAQ ACCORDION ---------- */
        .faq-item {
            background: #fff;
            border: 1px solid #e8e3d6;
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .faq-q {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 22px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 600;
            color: #070d24;
        }

        .faq-q .plus {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #f7f4ee;
            color: #8f7040;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
            transition: transform .25s ease, background .25s ease;
        }

        .faq-q .plus svg {
            width: 13px;
            height: 13px;
        }

        .faq-item.open .faq-q .plus {
            background: #b38f51;
            color: #fff;
            transform: rotate(45deg);
        }

        .faq-a {
            max-height: 0;
            overflow: hidden;
            transition: max-height .3s ease;
        }

        .faq-a p {
            padding: 0 22px 20px;
            color: #6c7280;
            font-size: 1rem;
            line-height: 1.7;
        }

        /* =========================================
        RELATED TECHNOLOGIES
        ========================================= */
        .related-tech {
            position: relative;
            padding: 105px 0 115px;
            background: #F7F4EE;
            overflow: hidden;
        }


        /* =========================================
        SUBTLE BACKGROUND DECORATION
        ========================================= */
        .related-tech::before {
            content: "";
            position: absolute;
            top: -180px;
            right: -180px;
            width: 440px;
            height: 440px;
            border-radius: 50%;
            background: radial-gradient(circle,rgba(179, 143, 81, 0.09) 0%,rgba(179, 143, 81, 0) 70%);
            pointer-events: none;
        }


        /* =========================================
        SECTION HEADER
        ========================================= */
        .related-tech-header { 
            margin-bottom: 48px;
        }

        .related-tech-header .badge-pill {
            margin-bottom: 22px;
        }

        .related-tech-header h2 { 
            margin: 0;
            color: #070D24;
            font-size: clamp(30px, 3vw, 43px);
            line-height: 1.18;
            font-weight: 700;
            letter-spacing: -1.2px;
        }

        .related-tech-intro { 
            margin: 20px 0 0;
            color: #687188;
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* =========================================
            TECHNOLOGY GRID
        ========================================= */
        .related-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        /* =========================================
        TECHNOLOGY CARD
        ========================================= */
        .related-card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 225px;
            padding: 25px 24px 22px;
            text-decoration: none;
            background: #FFFFFF;
            border: 1px solid #E5DED2;
            border-radius: 17px;
            overflow: hidden;
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }


        /* =========================================
        CARD TOP
        ========================================= */
        .related-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        /* =========================================
        TECHNOLOGY ICON
        ========================================= */
        .r-icon {
            width: 49px;
            height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #F5EBDD;
            color: #B38F51;
            border: 1px solid rgba(179, 143, 81, 0.12);
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .r-icon svg {
            width: 23px;
            height: 23px;
            stroke-width: 1.6;
        }

        /* =========================================
            ARROW
            ========================================= */
        .related-arrow {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #A9A39A;
            background: #FAF8F4;
            border: 1px solid #EEE8DE;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .related-arrow svg {
            width: 16px;
            height: 16px;
        }

        /* =========================================
        CARD CONTENT
        ========================================= */
        .related-card-content {
            margin-top: auto;
        }

        .related-card h4 {
            margin: 0 0 10px;
            color: #070D24;
            font-size: 1.2rem;
            line-height: 1.4;
            font-weight: 600;
            letter-spacing: -0.2px;
        }

        .related-card-label {
            display: inline-block;
            color: #8B8F9D;
            font-size: 1rem;
            line-height: 1.5;
            font-weight: 500;
        }


        /* =========================================
        BOTTOM GOLD ACCENT
        ========================================= */
        .related-card-line {
            position: absolute;
            left: 24px;
            right: 24px;
            bottom: 0;
            height: 3px;
            background: #B38F51;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        /* =========================================
        HOVER EFFECT
        ========================================= */
        .related-card:hover {
            transform: translateY(-7px);
            border-color: rgba(179, 143, 81, 0.55);
            box-shadow: 0 18px 40px rgba(7, 13, 36, 0.07);
        }

        .related-card:hover .r-icon {
            background: #B38F51;
            color: #FFFFFF;
            transform: translateY(-2px);
        }

        .related-card:hover .related-arrow {
            background: #B38F51;
            color: #FFFFFF;
            border-color: #B38F51;
            transform: translateX(3px);
        }

        .related-card:hover .related-card-line {
            transform: scaleX(1);
        }

        /* =========================================
            KEYBOARD ACCESSIBILITY
            ========================================= */
        .related-card:focus-visible {
            outline: 3px solid rgba(179, 143, 81, 0.45);
            outline-offset: 4px;
        }

        /* =========================================
        RESPONSIVE — TABLET
        ========================================= */
        @media (max-width: 1100px) {

            .related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .related-card {
                min-height: 210px;
            }

        }

        /* =========================================
            RESPONSIVE — MOBILE
            ========================================= */
        @media (max-width: 576px) {

            .related-tech {
                padding: 70px 0 80px;
            }

            .related-tech-header {
                margin-bottom: 32px;
            }

            .related-tech-header h2 {
                font-size: 29px;

                letter-spacing: -0.7px;
            }

            .related-tech-intro {
                font-size: 15px;

                line-height: 1.7;
            }

            .related-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .related-card {
                min-height: 180px;
                padding: 22px;
            }

            .related-card-top {
                margin-bottom: 25px;
            }

            .related-card h4 {
                font-size: 16px;
            }

        }

        /* ---------- CTA ---------- */
        .careers {
            background: linear-gradient(135deg, #070d24, #152a58);
            border-radius: 26px;
            padding: 52px 48px;
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
        }

        .careers-copy h2 {
            color: #fff;
            font-size: clamp(1.4rem, 2.2vw, 1.85rem);
            margin: 12px 0 10px;
            font-weight: 700;
        }

        .careers-copy p {
            color: rgba(255, 255, 255, .7);
            font-size: 1.2rem;
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
            .body-layout {
                grid-template-columns: 1fr;
            }

            .tech-sidebar {
                position: static;
            }

            .usecase-grid {
                grid-template-columns: 1fr 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .usecase-grid {
                grid-template-columns: 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="sep">/</li>
                <li><a href="technology.php">Technology</a></li>
                <li class="sep">/</li>
                <li class="current"><?php echo htmlspecialchars($tech['title']); ?></li>
            </ul>
        </div>
    </div>

    <!-- =========================================
     TECHNOLOGY HERO SECTION
    ========================================= -->
    <div class="tech-hero">
        <!-- Background Image + Overlay -->
        <div class="tech-hero-overlay"></div>

        <div class="container-fluid">

            <div class="tech-hero-inner">

                <!-- TECHNOLOGY INFORMATION -->
                <div class="tech-hero-main">

                    <div class="tech-hero-icon">
                        <?php echo tech_icon($techIcons, $tech['icon']); ?>
                    </div>

                    <div class="tech-hero-text">
                        <span class="eyebrow">Technology</span>
                        <h1><?php echo htmlspecialchars($tech['title']); ?></h1>
                        <p class="tagline"><?php echo htmlspecialchars($tech['tagline']); ?></p>
                    </div>

                </div>

                <!-- TECHNOLOGY STATISTIC -->
                <div class="tech-hero-stat">
                    <strong><?php echo htmlspecialchars($tech['cover_stat']['value']); ?></strong>
                    <span><?php echo htmlspecialchars($tech['cover_stat']['label']); ?></span>
                </div>

            </div>

        </div>
    </div>

    <!-- OVERVIEW + PROFICIENCY BARS + SIDEBAR -->
    <section class="tech-stack-section">

        <div class="container">

            <div class="tech-stack-layout">

                <!-- =================================
                 MAIN CONTENT
                ================================= -->
                <div class="tech-stack-main">

                    <!-- Overview -->
                    <div class="tech-overview">
                        <span class="tech-overview-label">
                            Technology Overview
                        </span>

                        <p class="tech-overview-text">
                            <?php echo htmlspecialchars($tech['overview']); ?>
                        </p>
                    </div>


                    <!-- Section Heading -->
                    <div class="tech-stack-heading">

                        <div class="badge-pill tech-stack-badge">
                            <span class="dot"></span>
                            Core Stack
                        </div>

                        <h2>
                            What we actually build with
                        </h2>

                        <p>
                            Proficiency below reflects hands-on production use
                            across delivered projects, not a checklist of tools
                            we've merely tried once.
                        </p>

                    </div>


                    <!-- Stack Summary -->
                    <div class="stack-summary">

                        <div class="stack-summary-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M12 3L20 7.5V16.5L12 21L4 16.5V7.5L12 3Z"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linejoin="round" />
                                <path d="M4 7.5L12 12L20 7.5M12 12V21"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                        <div>
                            <strong>
                                Production-ready technology
                            </strong>

                            <span>
                                Built for reliable, scalable digital products
                            </span>
                        </div>

                    </div>


                    <!-- Core Stack Bars -->
                    <div class="stack-bars-wrapper" id="stackBars">

                        <?php foreach ($tech['core_stack'] as $i => $s): ?>

                            <div class="stack-item">

                                <div class="stack-item-header">

                                    <div class="stack-item-name">

                                        <span class="stack-index">
                                            <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                        </span>

                                        <span class="name">
                                            <?php echo htmlspecialchars($s['name']); ?>
                                        </span>

                                    </div>

                                    <span class="level">
                                        <?php echo (int) $s['level']; ?>%
                                    </span>

                                </div>


                                <div class="stack-bar-track">

                                    <div
                                        class="stack-bar-fill"
                                        data-level="<?php echo (int) $s['level']; ?>"
                                        style="--stack-level: <?php echo (int) $s['level']; ?>%;">
                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>


                    <!-- Bottom Trust Points -->
                    <div class="stack-trust-row">

                        <div class="stack-trust-item">
                            <span class="trust-check">✓</span>
                            <span>Hands-on experience</span>
                        </div>

                        <div class="stack-trust-item">
                            <span class="trust-check">✓</span>
                            <span>Scalable architecture</span>
                        </div>

                        <div class="stack-trust-item">
                            <span class="trust-check">✓</span>
                            <span>Maintainable code</span>
                        </div>

                    </div>

                </div>

                <!-- =================================
                 SIDEBAR
                ================================= -->
                <aside class="tech-stack-sidebar">


                    <!-- Technology Navigation -->
                    <div class="tech-navigation-card">

                        <div class="tech-sidebar-heading">

                            <span class="sidebar-heading-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M4 6H20M4 12H20M4 18H20"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round" />
                                </svg>
                            </span>

                            <span class="sc-label">
                                All Technology
                            </span>

                        </div>


                        <ul class="sidebar-nav tech-sidebar-nav">

                            <?php foreach ($technologies as $t): ?>

                                <li>

                                    <a
                                        href="technology-detail.php?slug=<?php echo urlencode($t['slug']); ?>"
                                        class="<?php echo $t['slug'] === $tech['slug'] ? 'active' : ''; ?>">

                                        <span class="tech-nav-dot"></span>

                                        <span>
                                            <?php echo htmlspecialchars($t['title']); ?>
                                        </span>

                                        <span class="tech-nav-arrow">↗</span>

                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>


                    <!-- CTA Card -->
                    <div class="tech-sidebar-cta">

                        <div class="cta-top-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M12 3L20 7.5V16.5L12 21L4 16.5V7.5L12 3Z"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linejoin="round" />
                                <path d="M8 12H16M12 8V16"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linecap="round" />
                            </svg>
                        </div>

                        <span class="cta-label">
                            Let's build something
                        </span>

                        <h4>
                            Ready to start?
                        </h4>

                        <p>
                            Tell us about your project and we'll follow up
                            with next steps within one business day.
                        </p>

                        <a href="#" class="btn btn-gold tech-cta-button">
                            Book A Discovery Call
                            <span>↗</span>
                        </a>

                        <div class="cta-bottom-text">
                            <span class="cta-status-dot"></span>
                            Let's discuss your next project
                        </div>

                    </div>


                </aside>

            </div>

        </div>

    </section>

    <!-- USE CASES -->
    <section class="tech-usecases-section">
        <div class="container">

            <div class="tech-usecases-header">

                <div class="badge-pill">
                    <span class="dot"></span>
                    Applied In Practice
                </div>

                <h2>Where this shows up in real projects</h2>

                <p>
                    Practical applications built with proven technology,
                    thoughtful architecture, and real-world business needs.
                </p>

            </div>

            <div class="usecase-grid">

                <?php foreach ($tech['use_cases'] as $i => $uc): ?>

                    <article class="usecase-card">

                        <div class="usecase-card-top">

                            <span class="uc-num">
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                            <span class="uc-arrow">
                                <svg viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M7 17L17 7" />
                                    <path d="M7 7h10v10" />
                                </svg>
                            </span>

                        </div>

                        <div class="usecase-card-content">

                            <h4>
                                <?php echo htmlspecialchars($uc['title']); ?>
                            </h4>

                            <p>
                                <?php echo htmlspecialchars($uc['desc']); ?>
                            </p>

                        </div>

                        <div class="usecase-card-line"></div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- PROCESS TIMELINE -->
    <section class="tech-process-section">

        <div class="container">

            <!-- Section Header -->
            <div class="tech-process-header">

                <div class="badge-pill">
                    <span class="dot"></span>
                    How We Deliver This
                </div>

                <h2>
                    Our process for
                    <?php echo htmlspecialchars(strtolower($tech['title'])); ?>
                </h2>

                <p>
                    The same structure applies whether this is a standalone
                    engagement or part of a larger build.
                </p>

            </div>


            <!-- Timeline -->
            <div class="tech-process-timeline">

                <?php foreach ($tech['process'] as $i => $step): ?>

                    <article class="tech-process-item">

                        <!-- Timeline Number -->
                        <div class="tech-process-number">

                            <span>
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                        </div>


                        <!-- Timeline Card -->
                        <div class="tech-process-card">

                            <div class="tech-process-card-top">

                                <span class="tech-process-step">
                                    <?php echo 'STEP ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                                <span class="tech-process-arrow">

                                    <svg viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">

                                        <path d="M7 17L17 7" />
                                        <path d="M7 7h10v10" />

                                    </svg>

                                </span>

                            </div>


                            <h4>
                                <?php echo htmlspecialchars($step['title']); ?>
                            </h4>

                            <p>
                                <?php echo htmlspecialchars($step['desc']); ?>
                            </p>


                            <div class="tech-process-bottom">

                                <span class="tech-process-line"></span>

                                <span class="tech-process-status">
                                    <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                    / <?php echo str_pad(count($tech['process']), 2, '0', STR_PAD_LEFT); ?>
                                </span>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <!-- =========================================
     PROJECT TYPES
    ========================================= -->
    <section class="tech-projects-section">

        <div class="container">

            <div class="tech-projects-header">

                <div class="badge-pill">
                    <span class="dot"></span>Project Types
                </div>
                <h2>The kind of work this stack fits best</h2>
                <p>Built for practical products, scalable systems,and reliable digital experiences.</p>

            </div>


            <div class="project-types-grid">

                <?php foreach ($tech['project_types'] as $i => $pt): ?>

                    <div class="project-type-card">

                        <div class="project-type-content">

                            <span class="project-type-number">
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                            <h4><?php echo htmlspecialchars($pt); ?></h4>

                        </div>

                        <span class="project-type-arrow">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7 17L17 7" />
                                <path d="M7 7h10v10" />
                            </svg>
                        </span>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <!-- =========================================
     TESTIMONIAL
    ========================================= -->
    <section class="tech-testimonial-section">

        <div class="container">

            <div class="tech-testimonial-card">

                <div class="testimonial-quote-icon">
                    &ldquo;
                </div>

                <div class="tech-testimonial-content">

                    <span class="testimonial-label">
                        Client Experience
                    </span>

                    <p class="tech-testimonial-quote">
                        <?php echo htmlspecialchars($tech['testimonial']['quote']); ?>
                    </p>

                    <div class="tech-testimonial-author">

                        <div class="author-avatar">
                            <?php
                            echo strtoupper(
                                substr($tech['testimonial']['author'], 0, 1)
                            );
                            ?>
                        </div>

                        <div>

                            <strong>
                                <?php echo htmlspecialchars($tech['testimonial']['author']); ?>
                            </strong>

                            <span>
                                <?php echo htmlspecialchars($tech['testimonial']['role']); ?>
                            </span>

                        </div>

                    </div>

                </div>

                <div class="testimonial-decoration">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>

        </div>

    </section>

    <!-- FAQ -->
    <section style="padding-top:0;">
        <div class="container">
            <div class="section-head">
                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    Common Questions
                </div>
                <h2>Frequently asked about this technology</h2>
            </div>
            <div id="faqList">
                <?php foreach ($tech['faqs'] as $i => $faq): ?>
                    <div class="faq-item <?php echo $i === 0 ? 'open' : ''; ?>">
                        <div class="faq-q">
                            <span><?php echo htmlspecialchars($faq['q']); ?></span>
                            <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6">
                                    <path d="M12 5v14M5 12h14" />
                                </svg></span>
                        </div>
                        <div class="faq-a">
                            <p><?php echo htmlspecialchars($faq['a']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- RELATED TECHNOLOGIES -->
    <section class="related-tech">

        <div class="container">

            <!-- Section Header -->
            <div class="related-tech-header">

                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    Pair It With
                </div>

                <h2>
                    Other technology areas clients often
                    combine with this one
                </h2>

                <p class="related-tech-intro">
                    Build a complete technology ecosystem by combining
                    the right tools and expertise for your project.
                </p>

            </div>

            <!-- Technology Cards -->
            <div class="related-grid">

                <?php
                $count = 0;

                foreach ($otherTechnologies as $rel):

                    if ($count >= 4) break;

                    $count++;
                ?>

                    <a href="technology-detail.php?slug=<?php echo urlencode($rel['slug']); ?>"
                        class="related-card">

                        <div class="related-card-top">

                            <div class="r-icon">
                                <?php echo tech_icon($techIcons, $rel['icon']); ?>
                            </div>

                            <span class="related-arrow">
                                <svg viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">

                                    <path d="M5 12h14"></path>
                                    <path d="M13 6l6 6-6 6"></path>

                                </svg>
                            </span>

                        </div>

                        <div class="related-card-content">

                            <h4>
                                <?php echo htmlspecialchars($rel['title']); ?>
                            </h4>

                            <span class="related-card-label">
                                Technology
                            </span>

                        </div>

                        <div class="related-card-line"></div>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="container" style="padding-top:100px;">
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow" style="color:#b38f51;">Ready When You Are</span>
                <h2>Let's talk about your <?php echo htmlspecialchars(strtolower($tech['title'])); ?> project</h2>
                <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
            </div>
            <div class="careers-actions">
                <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                <a href="technology.php" class="btn btn-outline-light">View All Technology</a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate proficiency bars in on load
            document.querySelectorAll('#stackBars .stack-bar-fill').forEach(function(bar) {
                var level = bar.getAttribute('data-level') || 0;
                requestAnimationFrame(function() {
                    bar.style.width = level + '%';
                });
            });

            // FAQ accordion
            var items = document.querySelectorAll('#faqList .faq-item');

            function setHeight(item, open) {
                var answer = item.querySelector('.faq-a');
                answer.style.maxHeight = open ? answer.scrollHeight + 'px' : 0;
            }

            items.forEach(function(item) {
                setHeight(item, item.classList.contains('open'));

                item.querySelector('.faq-q').addEventListener('click', function() {
                    var isOpen = item.classList.contains('open');
                    items.forEach(function(i) {
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

<?php else: ?>
    
    <!-- FALLBACK: no technology entries found in JSON -->
    <div class="container" style="padding:100px 24px;text-align:center;">
        <h1 style="font-size:1.8rem;font-weight:700;color:#070d24;margin-bottom:12px;">Technology not found</h1>
        <p style="color:#6c7280;margin-bottom:24px;">We couldn't find that technology category. It may have been renamed or removed.</p>
        <a href="technology.php" class="btn btn-gold">Browse All Technology</a>
    </div>

<?php endif; ?>

<?php
include_once('elements/footer.php');
?>