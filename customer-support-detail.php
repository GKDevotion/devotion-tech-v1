<?php
$csPath = __DIR__ . '/data/customer-support.json';
$systems = [];
if (file_exists($csPath)) {
    $json = file_get_contents($csPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $systems = $decoded;
    }
}

$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
$system = null;
foreach ($systems as $s) {
    if ($s['slug'] === $slug) {
        $system = $s;
        break;
    }
}
if (!$system && count($systems) > 0) {
    $system = $systems[0];
}

$seo = [
    'title' => ($system ? $system['title'] . ' (' . $system['abbr'] . ')' : 'Customer Support') . ' | Devotion Technologies - Technology Experts & Innovators',
    'description' => $system ? $system['tagline'] : 'Customer support systems built by Devotion Technologies.',
    'keywords' => 'Devotion Technologies ' . ($system ? strtolower($system['abbr']) : 'support') . ', customer support software, support automation',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$csIcons = [
    'headset' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 13v-1a8 8 0 0116 0v1" /><rect x="3" y="13" width="5" height="7" rx="2" /><rect x="16" y="13" width="5" height="7" rx="2" /><path d="M20 20v.5a3 3 0 01-3 3h-3" /></svg>',
    'chat'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 5h16v11H8l-4 4V5z" /><path d="M8.5 9.5h7M8.5 12.5h4.5" /></svg>',
];
function cs_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['chat'];
}

$otherSystems = array_values(array_filter($systems, function ($s) use ($system) {
    return !$system || $s['slug'] !== $system['slug'];
}));
?>

<?php if ($system): ?>

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

        section {
            padding: 80px 0;
        }

        .section-head {
            max-width: 700px;
            margin-bottom: 36px;
        }

        .section-head h2 {
            font-size: clamp(1.4rem, 2.2vw, 1.9rem);
            font-weight: 700;
            color: #070d24;
            margin: 12px 0 10px;
        }

        .section-head p {
            color: #6c7280;
            font-size: .98rem;
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
        }

        .btn-outline-light {
            border: 1.5px solid rgba(255, 255, 255, .4);
            color: #fff;
        }

        .btn-outline-light:hover {
            background: #fff;
            color: #070d24;
        }

        /* BREADCRUMB */
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
            font-size: 1rem;
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



        /* ==========================================
   CUSTOMER SUPPORT SYSTEM HERO
   Premium Navy + Muted Gold Theme
========================================== */

        .sys-hero {
            isolation: isolate;
            position: relative;
            overflow: hidden;
            background-image: url(../d-tech/assets/images/banner-img.png);
            background-repeat: no-repeat;

            color: #000;
        }

        /* Subtle technical grid texture */

        .sys-hero::before {
            content: "";

            position: absolute;
            inset: 0;
            z-index: -1;
            pointer-events: none;

            background-image:
                linear-gradient(#00000011 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    #00000011 1px,
                    transparent 1px);

            background-size: 56px 56px;
        }

        /* Soft decorative gold glow */

        .sys-hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #B38F51;
        }

        /* ==========================================
   MAIN CONTAINER
========================================== */

        .sys-hero .container {
            position: relative;
            z-index: 1;
        }

        /* Hero layout */

        .sys-hero-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 60px;

            min-height: 255px;
            padding: 52px 0;
        }

        /* Left content */

        .sys-hero-main {
            display: flex;
            align-items: center;

            gap: 24px;

            flex: 1;
            min-width: 0;
        }

        /* ==========================================
   SUPPORT ICON BOX
========================================== */

        .sys-hero-icon {
            width: 68px;
            height: 68px;
            flex: 0 0 68px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.055);
            color: #b38f51;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.05),
                0 10px 30px rgba(0, 0, 0, 0.12);
        }

        /* SVG icon from cs_icon() */

        .sys-hero-icon svg {
            width: 38px;
            height: 38px;
            stroke: currentColor;
        }

        /* ==========================================
   SYSTEM TEXT
========================================== */

        .sys-hero-text {
            min-width: 0;
        }

        /* CS label */

        .sys-hero-text .eyebrow {
            display: block;
            margin-bottom: 9px;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #b38f51;
        }

        /* Main heading */

        .sys-hero-text h1 {
            margin: 0;
            font-size: clamp(30px, 3.1vw, 46px);
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: -0.035em;
            color: #000;
        }

        /* Tagline */

        .sys-hero-text .tagline {
            margin: 12px 0 0;
            font-size: 1.2rem;
            font-weight: 400;
            line-height: 1.65;
            color: #000;
        }

        /* ==========================================
   RIGHT STAT HIGHLIGHT
========================================== */

        .sys-hero-stat {
            flex: 0 0 260px;

            padding-left: 30px;

            border-left: 1px solid rgba(255, 255, 255, 0.16);
        }

        /* Big metric */

        .sys-hero-stat strong {
            display: block;

            margin: 0;

            font-size: clamp(38px, 4vw, 52px);
            font-weight: 700;

            line-height: 1;
            letter-spacing: -0.045em;

            white-space: nowrap;

            color: #b38f51;
        }

        /* Metric label */

        .sys-hero-stat span {
            display: block;
            margin-top: 12px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.6;
            color: #000;
        }

        /* ==========================================
   TABLET
========================================== */

        @media (max-width: 991px) {

            .sys-hero-inner {
                gap: 40px;
                padding: 44px 0;
            }

            .sys-hero-stat {
                flex-basis: 220px;
                padding-left: 26px;
            }

            .sys-hero-text h1 {
                font-size: 34px;
            }

        }

        /* ==========================================
   MOBILE
========================================== */

        @media (max-width: 767px) {

            .sys-hero-inner {
                flex-direction: column;
                align-items: stretch;

                gap: 30px;

                min-height: auto;
                padding: 38px 0 42px;
            }

            .sys-hero-main {
                align-items: flex-start;
                gap: 16px;
            }

            .sys-hero-icon {
                width: 56px;
                height: 56px;

                flex-basis: 56px;

                border-radius: 15px;
            }

            .sys-hero-icon svg {
                width: 29px;
                height: 29px;
            }

            .sys-hero-text .eyebrow {
                margin-bottom: 7px;
                font-size: 11px;
            }

            .sys-hero-text h1 {
                font-size: 29px;
                line-height: 1.2;
                letter-spacing: -0.025em;
            }

            .sys-hero-text .tagline {
                margin-top: 10px;

                font-size: 14px;
                line-height: 1.6;
            }

            .sys-hero-stat {
                width: 100%;
                flex: none;

                padding: 24px 0 0;

                border-top: 1px solid rgba(255, 255, 255, 0.15);
                border-left: 0;
            }

            .sys-hero-stat strong {
                font-size: 42px;
            }

            .sys-hero-stat span {
                margin-top: 8px;
                max-width: 260px;
            }

        }

        /* Small mobile */

        @media (max-width: 380px) {

            .sys-hero-text h1 {
                font-size: 25px;
            }

            .sys-hero-main {
                gap: 12px;
            }

        }

        /* BODY LAYOUT */
        .body-layout {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 50px;
            align-items: start;
        }

        .main-copy p.lede {
            font-size: 1.02rem;
            color: #3a3f4d;
            line-height: 1.8;
            margin-bottom: 30px !important;
        }

        /* FEATURE CHECKLIST */
        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #fbfaf7;
            border: 1px solid #e8e3d6;
            border-radius: 12px;
            padding: 16px 18px;
        }

        .feature-item .fi-check {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #070d24;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .feature-item .fi-check svg {
            width: 13px;
            height: 13px;
        }

        .feature-item span.fi-text {
            font-size: 1rem;
            color: #070d24;
            font-weight: 500;
        }

        /* INTEGRATIONS */
        .integration-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .integration-chips span {
            border: 1px solid #e8e3d6;
            background: #f7f4ee;
            border-radius: 999px;
            padding: 8px 16px;
            font-size: 1rem;
            font-weight: 500;
            color: #070d24;
        }

        /* SIDEBAR */
        .sys-sidebar {
            position: sticky;
            top: 106px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-card {
            background: #fff;
            border: 1px solid #e8e3d6;
            border-radius: 16px;
            padding: 22px;
        }

        .sidebar-card .sc-label {
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: #8f7040;
            margin-bottom: 14px;
            display: block;
        }

        .sidebar-nav li {
            margin-bottom: 3px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 10px;
            border-radius: 8px;
            font-size: 1rem;
            color: #6c7280;
            transition: all .2s ease;
        }

        .sidebar-nav a:hover {
            background: #f7f4ee;
            color: #070d24;
        }

        .sidebar-cta {
            background: #070d24;
            color: #fff;
        }

        .sidebar-cta h4 {
            font-size: .98rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .sidebar-cta p {
            font-size: 1rem;
            color: rgba(255, 255, 255, .65);
            line-height: 1.6;
            margin-bottom: 16px !important;
        }

        .sidebar-cta .btn {
            width: 100%;
        }


        /* ==========================================
   BENEFITS SECTION
   Why It Matters
========================================== */

        .benefit-section {
            position: relative;
            overflow: hidden;

            padding: 88px 0 92px;

            background: #f7f4ee;
            color: #070d24;
        }

        /* Subtle background detail */

        .benefit-section::before {
            content: "";

            position: absolute;
            width: 360px;
            height: 360px;

            right: -210px;
            top: -220px;

            pointer-events: none;

            background: radial-gradient(circle,
                    rgba(179, 143, 81, 0.08) 0%,
                    transparent 70%);
        }

        /* ==========================================
   SECTION HEADING
========================================== */

        .benefit-section .container {
            position: relative;
            z-index: 1;
        }

        .benefit-section .section-head {
            margin-bottom: 34px;
        }

        .benefit-section .section-head h2 {
            max-width: 800px;

            margin: 0;

            color: #070d24;

            font-size: clamp(28px, 3vw, 40px);
            font-weight: 600;

            line-height: 1.2;
            letter-spacing: -0.035em;
        }

        /* Badge */

        .benefit-section .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 22px;

            padding: 8px 14px;

            border: 1px solid #d9e0e8;
            border-radius: 999px;

            background: #ffffff;

            color: #24334e;

            font-size: 14px;
            font-weight: 500;
            line-height: 1.2;
        }

        /* Gold dot */

        .benefit-section .badge-pill .dot {
            width: 7px;
            height: 7px;

            flex: 0 0 7px;

            border-radius: 50%;

            background: #b38f51;
        }

        /* ==========================================
   BENEFIT GRID
========================================== */

        .benefit-grid {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 22px;

            align-items: stretch;
        }

        /* ==========================================
   BENEFIT CARD
========================================== */

        .benefit-card {
            position: relative;

            display: flex;
            flex-direction: column;

            min-width: 0;
            min-height: 216px;

            padding: 26px 26px 28px;

            border: 1px solid #e6dfd2;
            border-radius: 16px;

            background: #ffffff;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        /* Gold accent line */

        .benefit-card::before {
            content: "";

            position: absolute;

            top: -1px;
            left: 26px;
            right: 26px;

            height: 2px;

            border-radius: 0 0 4px 4px;

            background: #b38f51;

            opacity: 0;

            transition: opacity 0.25s ease;
        }

        /* Hover */

        @media (hover: hover) and (pointer: fine) {

            .benefit-card:hover {
                transform: translateY(-4px);

                border-color: #d1b47c;

                box-shadow:
                    0 14px 34px rgba(7, 13, 36, 0.07);
            }

            .benefit-card:hover::before {
                opacity: 1;
            }

        }

        /* ==========================================
   NUMBER BADGE
========================================== */

        .b-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            margin-bottom: 24px;

            border: 1px solid #eee7db;
            border-radius: 10px;

            background: #f7f4ee;

            color: #b38f51;

            font-size: 1rem;
            font-weight: 700;

            line-height: 1;

            letter-spacing: -0.02em;
        }

        /* ==========================================
   CARD HEADING
========================================== */

        .benefit-card h4 {
            margin: 0 0 10px;
            color: #070d24;
            font-size: 1.3rem;
            font-weight: 600;

            line-height: 1.4;
            letter-spacing: -0.02em;
        }

        /* ==========================================
   CARD DESCRIPTION
========================================== */

        .benefit-card p {
            margin: 0;
            color: #657087;
            font-size: 1.2rem;
            font-weight: 400;

            line-height: 1.65;
        }

        /* ==========================================
   TABLET
========================================== */

        @media (max-width: 991px) {

            .benefit-section {
                padding: 70px 0 76px;
            }

            .benefit-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 18px;
            }

            .benefit-card {
                min-height: 205px;
                padding: 24px;
            }

        }

        /* ==========================================
   MOBILE
========================================== */

        @media (max-width: 767px) {

            .benefit-section {
                padding: 56px 0 60px;
            }

            .benefit-section .section-head {
                margin-bottom: 26px;
            }

            .benefit-section .section-head h2 {
                font-size: 29px;
                line-height: 1.25;
                letter-spacing: -0.025em;
            }

            .benefit-section .badge-pill {
                margin-bottom: 18px;
                font-size: 13px;
            }

            .benefit-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .benefit-card {
                min-height: auto;
                padding: 24px 22px 26px;

                border-radius: 14px;
            }

            .b-num {
                width: 36px;
                height: 36px;
                margin-bottom: 20px;
                font-size: 13px;
            }

            .benefit-card h4 {
                font-size: 16px;
            }

            .benefit-card p {
                font-size: 14px;
                line-height: 1.65;
            }

        }

        /* ==========================================
   SMALL MOBILE
========================================== */

        @media (max-width: 380px) {

            .benefit-section .section-head h2 {
                font-size: 26px;
            }

            .benefit-card {
                padding: 22px 20px 24px;
            }

        }

        /* =========================================================
   HELP DESK — IMPLEMENTATION PROCESS
========================================================= */

        .cs-process-section {
            position: relative;
            padding: 105px 0 115px;
            background: #ffffff;
            overflow: hidden;
        }

        /* Optional subtle background texture */

        .cs-process-section::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .35;

            background-image:
                linear-gradient(rgba(179, 143, 81, .035) 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    rgba(179, 143, 81, .035) 1px,
                    transparent 1px);

            background-size: 72px 72px;
        }


        /* =========================================================
   SECTION HEADING
========================================================= */

        .cs-process-heading {
            position: relative;
            margin-bottom: 54px;
        }

        .cs-process-heading .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 24px;
            padding: 9px 16px;
            border: 1px solid #dce1e8;
            border-radius: 999px;
            background: #ffffff;
            color: #26334c;
            font-size: 1rem;
            font-weight: 500;
        }

        .cs-process-heading .dot {
            width: 7px;
            height: 7px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #b38f51;
        }

        .cs-process-heading h2 {
            margin: 0 0 15px;
            color: #070d24;
            font-size: clamp(30px, 3.2vw, 42px);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -.035em;
        }

        .cs-process-heading p {
            margin: 0;
            color: #657087;
            font-size: 1.2rem;
            font-weight: 400;
            line-height: 1.75;
        }


        /* =========================================================
   TIMELINE
========================================================= */

        .cs-process-timeline {
            position: relative;
            margin: 0 auto;
            padding: 0;
        }

        /* Vertical connector */

        .cs-process-timeline::before {
            content: "";

            position: absolute;

            top: 32px;
            bottom: 32px;
            left: 31px;

            width: 1px;

            background: linear-gradient(to bottom,
                    rgba(179, 143, 81, .65),
                    rgba(179, 143, 81, .18));
        }


        /* =========================================================
   TIMELINE ITEM
========================================================= */

        .cs-process-item {
            position: relative;

            display: grid;
            grid-template-columns: 64px minmax(0, 1fr);
            gap: 24px;

            align-items: start;

            margin-bottom: 24px;
        }

        .cs-process-item:last-child {
            margin-bottom: 0;
        }


        /* =========================================================
   NUMBER CIRCLE
========================================================= */

        .cs-process-number {
            position: relative;
            z-index: 2;

            width: 64px;
            height: 64px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #b38f51;
            border-radius: 50%;

            background: #ffffff;
            color: #987536;

            font-size: 15px;
            font-weight: 700;
            letter-spacing: -.02em;

            box-shadow:
                0 0 0 7px #ffffff;
        }


        /* =========================================================
   PROCESS CARD
========================================================= */

        .cs-process-card {
            position: relative;

            min-height: 150px;
            padding: 28px 32px;

            border: 1px solid #e7dfd1;
            border-radius: 16px;

            background: #ffffff;

            transition:
                transform .25s ease,
                border-color .25s ease,
                box-shadow .25s ease;
        }

        /* Gold accent on left */

        .cs-process-card::before {
            content: "";

            position: absolute;
            top: 22px;
            bottom: 22px;
            left: -1px;

            width: 3px;

            border-radius: 0 4px 4px 0;

            background: #b38f51;

            opacity: 0;

            transition: opacity .25s ease;
        }


        /* =========================================================
   CARD TOP
========================================================= */

        .cs-process-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            margin-bottom: 12px;
        }

        .cs-process-step {
            display: inline-block;
            color: #b38f51;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .cs-process-arrow {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border: 1px solid #e9e0d1;
            border-radius: 50%;

            color: #b38f51;
            background: #faf8f4;
        }

        .cs-process-arrow svg {
            width: 16px;
            height: 16px;
        }


        /* =========================================================
   CARD CONTENT
========================================================= */

        .cs-process-card h3 {
            margin: 0 0 10px;

            color: #070d24;

            font-size: 19px;
            font-weight: 700;
            line-height: 1.35;
            letter-spacing: -.02em;
        }

        .cs-process-card p {
            margin: 0;
            color: #69748a;
            font-size: 1.2rem;
            font-weight: 400;
            line-height: 1.7;
        }


        /* =========================================================
   HOVER EFFECT
========================================================= */

        @media (hover: hover) and (pointer: fine) {

            .cs-process-card:hover {
                transform: translateY(-3px);

                border-color: rgba(179, 143, 81, .65);

                box-shadow:
                    0 12px 32px rgba(7, 13, 36, .055);
            }

            .cs-process-card:hover::before {
                opacity: 1;
            }

            .cs-process-card:hover .cs-process-arrow {
                background: #b38f51;
                color: #ffffff;
                border-color: #b38f51;
            }

        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 991px) {

            .cs-process-section {
                padding: 80px 0 90px;
            }

            .cs-process-heading {
                margin-bottom: 42px;
            }

            .cs-process-timeline {
                max-width: 760px;
            }

            .cs-process-item {
                grid-template-columns: 58px minmax(0, 1fr);
                gap: 20px;
            }

            .cs-process-number {
                width: 58px;
                height: 58px;
            }

            .cs-process-timeline::before {
                left: 28px;
            }

            .cs-process-card {
                padding: 25px 28px;
            }

            .cs-process-card h3 {
                font-size: 18px;
            }

        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 767px) {

            .cs-process-section {
                padding: 65px 0 75px;
            }

            .cs-process-heading {
                margin-bottom: 35px;
            }

            .cs-process-heading .badge-pill {
                margin-bottom: 20px;
                padding: 8px 14px;
                font-size: 13px;
            }

            .cs-process-heading h2 {
                font-size: 29px;
                line-height: 1.2;
                letter-spacing: -.025em;
            }

            .cs-process-heading p {
                font-size: 14px;
                line-height: 1.7;
            }

            .cs-process-item {
                grid-template-columns: 44px minmax(0, 1fr);
                gap: 14px;

                margin-bottom: 20px;
            }

            .cs-process-number {
                width: 44px;
                height: 44px;

                box-shadow:
                    0 0 0 5px #ffffff;

                font-size: 12px;
            }

            .cs-process-timeline::before {
                top: 22px;
                bottom: 22px;
                left: 21px;
            }

            .cs-process-card {
                min-height: auto;
                padding: 22px 20px;
                border-radius: 13px;
            }

            .cs-process-card::before {
                top: 18px;
                bottom: 18px;
            }

            .cs-process-card-top {
                margin-bottom: 10px;
            }

            .cs-process-step {
                font-size: 10px;
            }

            .cs-process-arrow {
                width: 28px;
                height: 28px;
            }

            .cs-process-arrow svg {
                width: 14px;
                height: 14px;
            }

            .cs-process-card h3 {
                font-size: 16px;
                line-height: 1.4;
            }

            .cs-process-card p {
                font-size: 13px;
                line-height: 1.7;
            }

        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 380px) {

            .cs-process-section {
                padding: 52px 0 60px;
            }

            .cs-process-item {
                grid-template-columns: 38px minmax(0, 1fr);
                gap: 12px;
            }

            .cs-process-number {
                width: 38px;
                height: 38px;

                box-shadow:
                    0 0 0 4px #ffffff;

                font-size: 11px;
            }

            .cs-process-timeline::before {
                left: 18px;
            }

            .cs-process-card {
                padding: 18px 16px;
            }

            .cs-process-card h3 {
                font-size: 15px;
            }

            .cs-process-card p {
                font-size: 13px;
            }

        }

        /* =========================================================
   PROFESSIONAL TESTIMONIAL
========================================================= */

        .testimonial-section {
            padding: 0 0 90px;
            background: #fff;
        }


        /* =========================================================
   CARD
========================================================= */

        .testimonial-card {
            position: relative;

            display: flex;
            align-items: flex-start;

            gap: 22px;

            width: 100%;

            padding: 30px 36px;

            background:
                linear-gradient(135deg,
                    #fcfbf8 0%,
                    #ffffff 100%);

            border: 1px solid #e6dfd3;

            border-radius: 16px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(15, 20, 30, 0.025);

            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-2px);

            border-color: rgba(179, 143, 81, .45);

            box-shadow:
                0 14px 35px rgba(15, 20, 30, .06);
        }


        /* =========================================================
   GOLD LEFT ACCENT
========================================================= */

        .testimonial-accent {
            position: absolute;

            left: 0;
            top: 20px;
            bottom: 20px;

            width: 3px;

            background: #b38f51;

            border-radius: 0 4px 4px 0;
        }


        /* =========================================================
   QUOTE ICON
========================================================= */

        .testimonial-quote-icon {
            flex: 0 0 38px;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1px;
            background: #f5eee2;
            border: 1px solid #eadfcf;
            border-radius: 10px;
            color: #b38f51;
        }

        .testimonial-quote-icon span {
            position: relative;
            top: 3px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 27px;
            line-height: 1;
            font-weight: 700;
        }


        /* =========================================================
   CONTENT
========================================================= */

        .testimonial-content {
            flex: 1;

            min-width: 0;
        }


        /* =========================================================
   QUOTE TEXT
========================================================= */

        .testimonial-quote {
            margin: 0 0 14px;
            color: #11151c;
            font-size: 1.2rem;

            line-height: 1.65;

            font-weight: 500;

            letter-spacing: -.05px;
        }


        /* =========================================================
   AUTHOR
========================================================= */

        .testimonial-author {
            display: flex;
            align-items: center;
            flex-wrap: wrap;

            gap: 9px;

            font-size: 12px;

            line-height: 1.5;
        }

        .testimonial-author strong {
            color: #080a0e;
            font-size: 1rem;
            font-weight: 700;
        }

        .testimonial-author>span:last-child {
            color: #737b89;
            font-weight: 400;
            font-size: 1rem;
        }


        /* Small gold separator */

        .author-dot {
            width: 4px;
            height: 4px;
            flex: 0 0 auto;
            background: #b38f51;
            border-radius: 50%;
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 767px) {

            .testimonial-section {
                padding-bottom: 70px;
            }

            .testimonial-card {
                gap: 16px;

                padding: 24px 23px;

                border-radius: 14px;
            }

            .testimonial-quote-icon {
                flex-basis: 34px;

                width: 34px;
                height: 34px;

                border-radius: 9px;
            }

            .testimonial-quote-icon span {
                font-size: 24px;
            }

            .testimonial-quote {
                font-size: 14px;

                line-height: 1.6;

                margin-bottom: 12px;
            }

            .testimonial-author {
                font-size: 11px;

                gap: 7px;
            }

            .testimonial-accent {
                top: 17px;
                bottom: 17px;
            }
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 480px) {

            .testimonial-section {
                padding-bottom: 60px;
            }

            .testimonial-card {
                gap: 13px;

                padding: 20px 18px;

                border-radius: 12px;
            }

            .testimonial-quote-icon {
                flex-basis: 30px;

                width: 30px;
                height: 30px;
            }

            .testimonial-quote-icon span {
                font-size: 21px;
            }

            .testimonial-quote {
                font-size: 13px;

                line-height: 1.65;
            }

            .testimonial-author {
                align-items: flex-start;

                flex-direction: column;

                gap: 2px;
            }

            .author-dot {
                display: none;
            }

            .testimonial-author>span:last-child {
                font-size: 11px;
            }

            .testimonial-accent {
                top: 15px;
                bottom: 15px;

                width: 2px;
            }
        }

        /* FAQ */
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
            font-size: .96rem;
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
            font-size: 1.2rem;
            line-height: 1.7;
        }

        /* CTA */
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
            max-width: 560px;
        }

        .careers-copy h2 {
            color: #fff;
            font-size: clamp(1.4rem, 2.2vw, 1.85rem);
            margin: 12px 0 10px;
            font-weight: 700;
        }

        .careers-copy p {
            color: rgba(255, 255, 255, .7);
            font-size: .96rem;
        }

        .careers-actions {
            position: relative;
            z-index: 2;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        @media (max-width: 980px) {
            .body-layout {
                grid-template-columns: 1fr;
            }

            .sys-sidebar {
                position: static;
            }

            .benefit-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .benefit-grid {
                grid-template-columns: 1fr;
            }

            .related-single {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="sep">/</li>
                <li><a href="customer-support.php">Customer Support</a></li>
                <li class="sep">/</li>
                <li class="current"><?php echo htmlspecialchars($system['abbr']); ?></li>
            </ul>
        </div>
    </div>


    <!-- HERO -->
    <div class="sys-hero">
        <div class="container">
            <div class="sys-hero-inner">

                <div class="sys-hero-main">

                    <div class="sys-hero-icon">
                        <?php echo cs_icon($csIcons, $system['icon']); ?>
                    </div>

                    <div class="sys-hero-text">

                        <span class="eyebrow">
                            <?php echo htmlspecialchars($system['abbr']); ?>
                        </span>

                        <h1>
                            <?php echo htmlspecialchars($system['title']); ?>
                        </h1>

                        <p class="tagline">
                            <?php echo htmlspecialchars($system['tagline']); ?>
                        </p>

                    </div>

                </div>

                <div class="sys-hero-stat">

                    <strong>
                        <?php echo htmlspecialchars($system['cover_stat']['value']); ?>
                    </strong>

                    <span>
                        <?php echo htmlspecialchars($system['cover_stat']['label']); ?>
                    </span>

                </div>

            </div>
        </div>
    </div>

    <!-- OVERVIEW + FEATURES + SIDEBAR -->
    <section>
        <div class="container">
            <div class="body-layout">
                <div class="main-copy">
                    <p class="lede"><?php echo htmlspecialchars($system['overview']); ?></p>

                    <div class="section-head" style="margin-bottom:20px;">
                        <div class="badge-pill mb-3"><span class="dot"></span> What's Included</div>
                        <h2>What you get with <?php echo htmlspecialchars($system['abbr']); ?></h2>
                    </div>
                    <div class="feature-list">
                        <?php foreach ($system['features'] as $f): ?>
                            <div class="feature-item">
                                <span class="fi-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <path d="M5 13l4 4L19 7" />
                                    </svg></span>
                                <span class="fi-text"><?php echo htmlspecialchars($f); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="section-head" style="margin-top:40px;margin-bottom:6px;">
                        <div class="badge-pill mb-3"><span class="dot"></span> Integrates With</div>
                    </div>
                    <div class="integration-chips">
                        <?php foreach ($system['integrations'] as $intg): ?>
                            <span><?php echo htmlspecialchars($intg); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <aside class="sys-sidebar">
                    <div class="sidebar-card">
                        <span class="sc-label">Support Channels</span>
                        <ul class="sidebar-nav">
                            <?php foreach ($systems as $s): ?>
                                <li>
                                    <a href="customer-support-detail.php?slug=<?php echo urlencode($s['slug']); ?>"
                                        style="<?php echo $s['slug'] === $system['slug'] ? 'background:#f7f4ee;color:#070d24;font-weight:600;' : ''; ?>">
                                        <?php echo htmlspecialchars($s['abbr']); ?> &mdash; <?php echo htmlspecialchars($s['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar-card sidebar-cta">
                        <h4>Ready to start?</h4>
                        <p>Tell us about your support volume and we'll follow up with next steps within one business day.</p>
                        <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="benefit-section">
        <div class="container">

            <div class="section-head">

                <div class="badge-pill">
                    <span class="dot"></span>
                    Why It Matters
                </div>

                <h2>
                    What changes once
                    <?php echo htmlspecialchars($system['abbr']); ?>
                    is running
                </h2>

            </div>

            <div class="benefit-grid">

                <?php foreach ($system['benefits'] as $i => $b): ?>

                    <div class="benefit-card">

                        <span class="b-num">
                            <?php echo str_pad(
                                $i + 1,
                                2,
                                '0',
                                STR_PAD_LEFT
                            ); ?>
                        </span>

                        <h4>
                            <?php echo htmlspecialchars($b['title']); ?>
                        </h4>

                        <p>
                            <?php echo htmlspecialchars($b['desc']); ?>
                        </p>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- PROCESS -->
    <section class="cs-process-section">
        <div class="container">

            <div class="cs-process-heading">
                <div class="badge-pill">
                    <span class="dot"></span>
                    How We Roll It Out
                </div>

                <h2>Implementation process</h2>

                <p>
                    The same disciplined rollout applies whether this
                    runs standalone or alongside your other support channel.
                </p>
            </div>

            <div class="cs-process-timeline">

                <?php foreach ($system['process'] as $i => $step): ?>

                    <div class="cs-process-item">

                        <!-- Number -->
                        <div class="cs-process-number">
                            <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                        </div>

                        <!-- Content -->
                        <div class="cs-process-card">

                            <div class="cs-process-card-top">

                                <span class="cs-process-step">
                                    STEP <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                                <span class="cs-process-arrow">
                                    <svg viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>
                                </span>

                            </div>

                            <h3>
                                <?php echo htmlspecialchars($step['title']); ?>
                            </h3>

                            <p>
                                <?php echo htmlspecialchars($step['desc']); ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- =========================================================
     TESTIMONIAL
========================================================= -->
    <section class="testimonial-section">

        <div class="container">

            <div class="testimonial-card">

                <!-- Gold quote icon -->
                <div class="testimonial-quote-icon">
                    <span>&ldquo;</span>
                </div>

                <!-- Testimonial content -->
                <div class="testimonial-content">

                    <p class="testimonial-quote">
                        <?php echo htmlspecialchars($system['testimonial']['quote']); ?>
                    </p>

                    <div class="testimonial-author">

                        <strong>
                            <?php echo htmlspecialchars($system['testimonial']['author']); ?>
                        </strong>

                        <span class="author-dot"></span>

                        <span>
                            <?php echo htmlspecialchars($system['testimonial']['role']); ?>
                        </span>

                    </div>

                </div>

                <!-- Decorative gold line -->
                <div class="testimonial-accent"></div>

            </div>

        </div>

    </section>

    <!-- FAQ -->
    <section style="padding-top:100px;">
        <div class="container">
            <div class="section-head">
                <div class="badge-pill mb-3"><span class="dot"></span> Common Questions</div>
                <h2>Frequently asked about <?php echo htmlspecialchars($system['abbr']); ?></h2>
            </div>
            <div id="faqList">
                <?php foreach ($system['faqs'] as $i => $faq): ?>
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


    <!-- CTA -->
    <section class="container" style="padding-top:0;">
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow" style="color:#b38f51;">Ready When You Are</span>
                <h2>Let's talk about your <?php echo htmlspecialchars($system['abbr']); ?> setup</h2>
                <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
            </div>
            <div class="careers-actions">
                <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                <a href="customer-support.php" class="btn btn-outline-light">View All Channels</a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

    <div class="container" style="padding:100px 24px;text-align:center;">
        <h1 style="font-size:1.8rem;font-weight:700;color:#070d24;margin-bottom:12px;">Channel not found</h1>
        <p style="color:#6c7280;margin-bottom:24px;">We couldn't find that support channel. It may have been renamed or removed.</p>
        <a href="customer-support.php" class="btn btn-gold">Browse Customer Support</a>
    </div>

<?php endif; ?>

<?php
include_once('elements/footer.php');
?>