<?php
$opsPath = __DIR__ . '/data/operations-logistics.json';
$systems = [];
if (file_exists($opsPath)) {
    $json = file_get_contents($opsPath);
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
    'title' => ($system ? $system['title'] . ' (' . $system['abbr'] . ')' : 'Operations & Logistics') . ' | Devotion Technologies - Technology Experts & Innovators',
    'description' => $system ? $system['tagline'] : 'Operations and logistics systems built by Devotion Technologies.',
    'keywords' => 'Devotion Technologies ' . ($system ? strtolower($system['abbr']) : 'logistics') . ', operations software, logistics systems',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$opsIcons = [
    'warehouse' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 10.5L12 4l9 6.5" /><path d="M5 9.5V20h14V9.5" /><path d="M9.5 20v-6h5v6" /></svg>',
    'boxes'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 8l6-3.5L15 8l-6 3.5L3 8z" /><path d="M3 8v7l6 3.5M15 8v7l-6 3.5M15 8l6-3.5v7L15 15" /></svg>',
    'clipboard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="5" y="4" width="14" height="17" rx="2" /><path d="M9 3.5h6v3H9z" /><path d="M8.5 11h7M8.5 15h7" /></svg>',
    'network'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="5" cy="6" r="2.3" /><circle cx="19" cy="6" r="2.3" /><circle cx="12" cy="18" r="2.3" /><path d="M6.8 7.6L11 15.5M17.2 7.6L13 15.5" /></svg>',
    'truck'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="7" width="12" height="10" rx="1.2" /><path d="M14 10.5h4.2L21 13.8V17h-3" /><circle cx="7" cy="18.5" r="1.6" /><circle cx="17" cy="18.5" r="1.6" /></svg>',
];
function ops_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['boxes'];
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

        .section-head h2 {
            font-size: clamp(1.4rem, 2.2vw, 1.9rem);
            font-weight: 700;
            color: #000;
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
            color: #000;
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
            color: #000;
            font-weight: 600;
        }

        .breadcrumb-bar .sep {
            color: #c7cbd3;
        }

        /* =========================================
   SYSTEM HERO — PREMIUM NAVY
========================================= */

        .sys-hero {
            position: relative;
            overflow: hidden;
            background-image: url(../d-tech/assets/images/banner-img.png);
            background-repeat: no-repeat;
            color: #000;
        }

        /* Subtle architectural grid */
        .sys-hero::before {
            content: "";
            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(#00000011 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    #00000011 1px,
                    transparent 1px);

            background-size: 56px 56px;
            pointer-events: none;
        }

        /* Gold top accent */
        .sys-hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #B38F51;
        }

        .sys-hero .container {
            position: relative;
            z-index: 1;
        }

        /* Main Layout */
        .sys-hero-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;

            min-height: 215px;
            padding: 40px 0;
        }

        /* Left Content */
        .sys-hero-main {
            display: flex;
            align-items: center;
            gap: 24px;
            min-width: 0;
        }

        /* Icon */
        .sys-hero-icon {
            width: 68px;
            height: 68px;

            flex: 0 0 68px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 18px;

            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, 0.09),
                    rgba(255, 255, 255, 0.025));

            color: #B38F51;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.18);
        }

        .sys-hero-icon svg {
            width: 31px;
            height: 31px;
        }

        /* Text */
        .sys-hero-text {
            min-width: 0;
        }

        .sys-hero-eyebrow {
            display: block;

            margin-bottom: 7px;

            color: #B38F51;

            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        .sys-hero h1 {
            margin: 0;

            color: #000;

            font-size: clamp(28px, 3vw, 40px);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -1px;
        }

        .sys-hero-tagline {
            margin: 10px 0 0;
            color: #000;
            font-size: 1.2rem;
            line-height: 1.6;
        }

        /* Right Stat */
        .sys-hero-stat {
            flex: 0 0 auto;

            min-width: 220px;

            padding-left: 38px;

            border-left: 1px solid rgba(255, 255, 255, 0.16);

            text-align: right;
        }

        .sys-hero-stat strong {
            display: block;

            color: #B38F51;

            font-size: clamp(32px, 3vw, 42px);
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .sys-hero-stat span {
            display: block;
            margin-top: 8px;
            color: #000;
            font-size: 1.2rem;
            line-height: 1.5;
        }

        /* =========================================================
   SYSTEM OVERVIEW
========================================================= */

        .system-overview-section {
            padding: 35px 0 90px;
        }

        .body-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 300px;
            gap: 50px;
            align-items: start;
        }


        /* =========================================================
   MAIN CONTENT
========================================================= */

        .main-copy {
            min-width: 0;
        }

        .overview-block {
            margin-bottom: 34px;
        }

        .lede {
            max-width: 950px;
            margin: 0;

            color: #24314a;

            font-size: 17px;
            line-height: 1.75;
            font-weight: 400;
        }


        /* =========================================================
   SECTION HEAD
========================================================= */

        .section-head {
            margin-bottom: 22px;
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 9px 15px;

            border: 1px solid #e7dfd1;
            border-radius: 50px;

            background: #ffffff;

            color: #151515;

            font-size: 13px;
            font-weight: 600;

            box-shadow: 0 4px 15px rgba(20, 20, 20, 0.035);
        }

        .badge-pill .dot {
            width: 8px;
            height: 8px;

            display: inline-block;

            border-radius: 50%;

            background: #b38f51;

            box-shadow: 0 0 0 4px rgba(179, 143, 81, 0.10);
        }

        .section-head h2 {
            margin: 20px 0 0;

            color: #090909;

            font-size: clamp(28px, 3vw, 36px);
            line-height: 1.2;

            font-weight: 700;
            letter-spacing: -0.7px;
        }

        .heading-accent {
            color: #b38f51;
        }


        /* =========================================================
   FEATURE LIST
========================================================= */

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .feature-item {
            position: relative;

            min-height: 72px;

            display: flex;
            align-items: center;

            padding: 14px 18px;

            border: 1px solid #e8e0d4;
            border-radius: 13px;

            background: #fcfbf9;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                background 0.25s ease,
                box-shadow 0.25s ease;
        }

        .feature-item:hover {
            transform: translateX(4px);

            border-color: rgba(179, 143, 81, 0.45);

            background: #ffffff;

            box-shadow:
                0 8px 25px rgba(20, 20, 20, 0.055);
        }


        /* Number */

        .feature-number {
            width: 36px;

            flex-shrink: 0;

            color: #a69e92;

            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }


        /* Check */

        .fi-check {
            width: 34px;
            height: 34px;

            flex-shrink: 0;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            margin-right: 15px;

            border-radius: 50%;

            color: #ffffff;
            background: #080808;
        }

        .fi-check svg {
            width: 15px;
            height: 15px;
        }


        /* Text */

        .fi-text {
            color: #111111;

            font-size: 15px;
            line-height: 1.5;

            font-weight: 500;
        }


        /* Arrow */

        .feature-arrow {
            margin-left: auto;

            width: 32px;
            height: 32px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            color: #b38f51;

            opacity: 0;

            transform: translate(-5px, 5px);

            transition:
                opacity 0.25s ease,
                transform 0.25s ease;
        }

        .feature-item:hover .feature-arrow {
            opacity: 1;
            transform: translate(0, 0);
        }


        /* =========================================================
   INTEGRATIONS
========================================================= */

        .integrations-block {
            margin-top: 48px;
        }

        .integration-heading {
            margin-bottom: 18px;
        }

        .integration-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .integration-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 10px 14px;

            border: 1px solid #e8e0d4;
            border-radius: 50px;

            background: #ffffff;

            color: #202020;

            font-size: 13px;
            font-weight: 500;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .integration-chip i {
            color: #b38f51;
            font-size: 13px;
        }

        .integration-chip:hover {
            transform: translateY(-2px);

            border-color: rgba(179, 143, 81, 0.45);

            background: #fbf8f2;
        }


        /* =========================================================
   SIDEBAR
========================================================= */

        .sys-sidebar {
            position: sticky;
            top: 100px;

            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-card {
            border: 1px solid #e5ded3;
            border-radius: 17px;

            background: #ffffff;

            overflow: hidden;
        }


        /* =========================================================
   SYSTEMS CARD
========================================================= */

        .systems-card {
            padding: 25px 20px;
        }

        .sidebar-card-header {
            padding: 0 2px 16px;
        }

        .sidebar-label {
            display: block;

            margin-bottom: 5px;

            color: #b38f51;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .sidebar-card-header h3 {
            margin: 0;

            color: #111111;

            font-size: 21px;
            font-weight: 700;
        }


        /* =========================================================
   SIDEBAR NAV
========================================================= */

        .sidebar-nav {
            list-style: none;

            margin: 0;
            padding: 0;
        }

        .sidebar-nav li {
            margin: 3px 0;
        }

        .sidebar-nav a {
            position: relative;

            min-height: 55px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 10px;

            padding: 10px 11px;

            border-radius: 10px;

            color: #727887;

            text-decoration: none;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .sidebar-nav a:hover {
            color: #111111;

            background: #f8f6f2;
        }

        .sidebar-nav a.active {
            color: #111111;

            background: #f7f4ee;

            box-shadow:
                inset 3px 0 0 #b38f51;
        }

        .system-link-content {
            display: flex;
            flex-direction: column;

            gap: 2px;

            line-height: 1.35;
        }

        .system-link-content strong {
            color: inherit;

            font-size: 13px;
            font-weight: 600;
        }

        .system-link-content span {
            color: inherit;

            font-size: 12px;
            font-weight: 400;
        }

        .sidebar-nav a.active .system-link-content span {
            color: #252525;
        }

        .sidebar-nav a>i {
            flex-shrink: 0;

            color: #b38f51;

            font-size: 13px;

            opacity: 0;

            transform: translate(-4px, 4px);

            transition:
                opacity 0.2s ease,
                transform 0.2s ease;
        }

        .sidebar-nav a:hover>i,
        .sidebar-nav a.active>i {
            opacity: 1;

            transform: translate(0, 0);
        }


        /* =========================================================
   SIDEBAR CTA
========================================================= */

        .sidebar-cta {
            position: relative;

            padding: 25px 21px;

            color: #ffffff;

            background:
                radial-gradient(circle at 100% 0%,
                    rgba(179, 143, 81, 0.24),
                    transparent 38%),
                linear-gradient(145deg,
                    #050505 0%,
                    #101010 100%);

            border-color: #171717;
        }

        .cta-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 19px;

            border: 1px solid rgba(179, 143, 81, 0.35);
            border-radius: 10px;

            color: #b38f51;

            background: rgba(179, 143, 81, 0.08);
        }

        .cta-icon i {
            font-size: 17px;
        }

        .sidebar-cta-label {
            display: block;

            margin-bottom: 8px;

            color: #b38f51;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .sidebar-cta h4 {
            margin: 0 0 9px;

            color: #ffffff;

            font-size: 21px;
            font-weight: 700;
        }

        .sidebar-cta p {
            margin: 0 0 21px;

            color: rgba(255, 255, 255, 0.62);

            font-size: 13px;
            line-height: 1.65;
        }


        /* CTA BUTTON */

        .sidebar-cta-button {
            width: 100%;
            min-height: 49px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 16px;

            border-radius: 10px;

            color: #ffffff;

            background: #b38f51;

            text-decoration: none;

            font-size: 13px;
            font-weight: 600;

            transition:
                background 0.25s ease,
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .sidebar-cta-button:hover {
            color: #ffffff;

            background: #c19b5b;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(179, 143, 81, 0.25);
        }

        .sidebar-cta-button i {
            font-size: 14px;

            transition: transform 0.25s ease;
        }

        .sidebar-cta-button:hover i {
            transform: translate(2px, -2px);
        }


        /* =========================================================
   RESPONSIVE — TABLET
========================================================= */

        @media (max-width: 991px) {

            .body-layout {
                grid-template-columns: minmax(0, 1fr) 270px;
                gap: 30px;
            }

            .sys-sidebar {
                top: 80px;
            }

            .feature-item {
                min-height: 68px;
            }

            .feature-number {
                width: 28px;
            }

            .fi-text {
                font-size: 14px;
            }
        }


        /* =========================================================
   RESPONSIVE — MOBILE
========================================================= */

        @media (max-width: 767px) {

            .system-overview-section {
                padding: 20px 0 60px;
            }

            .body-layout {
                display: flex;
                flex-direction: column;

                gap: 40px;
            }

            .main-copy {
                width: 100%;
            }

            .lede {
                font-size: 15px;
                line-height: 1.7;
            }

            .section-head h2 {
                font-size: 27px;
            }

            .feature-list {
                gap: 9px;
            }

            .feature-item {
                min-height: 64px;

                padding: 12px 13px;

                border-radius: 11px;
            }

            .feature-number {
                display: none;
            }

            .fi-check {
                width: 31px;
                height: 31px;

                margin-right: 12px;
            }

            .fi-check svg {
                width: 14px;
                height: 14px;
            }

            .fi-text {
                font-size: 14px;
            }

            .feature-arrow {
                display: none;
            }

            .integrations-block {
                margin-top: 38px;
            }

            .integration-chips {
                gap: 7px;
            }

            .integration-chip {
                padding: 9px 12px;

                font-size: 12px;
            }

            .sys-sidebar {
                position: static;

                width: 100%;
            }

            .systems-card {
                padding: 22px 17px;
            }

            .sidebar-cta {
                padding: 24px 20px;
            }
        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 420px) {

            .section-head h2 {
                font-size: 24px;
            }

            .badge-pill {
                padding: 8px 13px;
                font-size: 12px;
            }

            .fi-text {
                font-size: 13px;
            }

            .integration-chip {
                font-size: 11.5px;
            }
        }

        /* =========================================
   BENEFITS SECTION
========================================= */

        .benefit-section {
            position: relative;
            overflow: hidden;
            padding: 105px 0 120px;
            background:
                radial-gradient(circle at 50% 0%,
                    rgba(179, 143, 81, 0.07),
                    transparent 42%),
                #f8f6f1;
        }

        /* Container */
        .benefit-container {
            position: relative;
            z-index: 2;
        }

        /* =========================================
   SECTION HEADER
========================================= */

        .benefit-section .section-head {
            max-width: 1100px;
            margin-bottom: 48px;
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 17px;
            margin-bottom: 22px;

            border: 1px solid rgba(179, 143, 81, 0.35);
            border-radius: 50px;

            background: rgba(255, 255, 255, 0.75);

            color: #202020;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.01em;

            box-shadow: 0 5px 18px rgba(30, 25, 15, 0.04);
        }

        .badge-pill .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #b38f51;

            box-shadow: 0 0 0 4px rgba(179, 143, 81, 0.10);
        }

        .benefit-section .section-head h2 {
            margin: 0;
            color: #111820;
            font-size: clamp(38px, 4vw, 30px);
            line-height: 1.08;
            letter-spacing: -0.045em;
            font-weight: 750;
        }

        .benefit-section .section-head h2 span {
            color: #b38f51;
        }

        .heading-line {
            width: 92px;
            height: 5px;

            margin-top: 27px;

            border-radius: 20px;
            background: #b38f51;
        }

        /* =========================================
   BENEFIT GRID
========================================= */

        .benefit-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 28px;
        }

        /* =========================================
   BENEFIT CARD
========================================= */

        .benefit-card {
            position: relative;
            min-height: 305px;

            padding: 27px 30px 31px;

            overflow: hidden;

            border: 1px solid rgba(179, 143, 81, 0.25);
            border-radius: 20px;

            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, 0.98),
                    rgba(255, 255, 255, 0.90));

            box-shadow:
                0 12px 35px rgba(26, 23, 18, 0.055),
                0 2px 8px rgba(26, 23, 18, 0.025);

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }

        /* Gold left accent */
        .benefit-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;

            width: 5px;

            background: linear-gradient(180deg,
                    #b38f51,
                    rgba(179, 143, 81, 0.35));

            border-radius: 20px 0 0 20px;
        }

        .benefit-card:hover {
            transform: translateY(-8px);

            border-color: rgba(179, 143, 81, 0.45);

            box-shadow:
                0 25px 55px rgba(26, 23, 18, 0.10),
                0 8px 18px rgba(179, 143, 81, 0.08);
        }

        /* =========================================
   CARD TOP
========================================= */

        .benefit-card-top {
            position: relative;

            display: flex;
            align-items: center;

            min-height: 75px;
        }

        /* Icon */
        .benefit-icon {
            width: 68px;
            height: 68px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: rgba(179, 143, 81, 0.10);

            color: #b38f51;

            flex-shrink: 0;
        }

        .benefit-icon svg {
            width: 37px;
            height: 37px;

            stroke: currentColor;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Small active number */
        .b-num {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            width: 50px;
            height: 50px;

            margin-left: 22px;

            border-radius: 11px;

            background: linear-gradient(145deg,
                    #b38f51,
                    #967438);

            color: #fff;

            font-size: 15px;
            font-weight: 700;

            box-shadow:
                0 7px 18px rgba(179, 143, 81, 0.22);
        }

        /* Decorative large number */
        .card-number {
            position: absolute;
            right: -2px;
            top: -4px;

            color: rgba(179, 143, 81, 0.075);

            font-size: 58px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -0.06em;

            pointer-events: none;
        }

        /* =========================================
   DIVIDER
========================================= */

        .benefit-divider {
            width: 100%;
            height: 1px;

            margin: 21px 0 25px;

            background: linear-gradient(90deg,
                    rgba(179, 143, 81, 0.45),
                    rgba(179, 143, 81, 0.08),
                    transparent);
        }

        /* =========================================
   CONTENT
========================================= */

        .benefit-content h4 {
            margin: 0 0 10px;

            color: #10151a;

            font-size: 21px;
            line-height: 1.3;
            font-weight: 750;
            letter-spacing: -0.02em;
        }

        .benefit-content p {
            margin: 0;

            max-width: 440px;

            color: #647080;

            font-size: 16px;
            line-height: 1.65;
            font-weight: 400;
        }

        /* =========================================
   DECORATIVE ELEMENTS
========================================= */

        .benefit-decoration {
            position: absolute;

            width: 240px;
            height: 240px;

            border-radius: 50%;

            border: 1px solid rgba(179, 143, 81, 0.10);

            pointer-events: none;
        }

        .benefit-decoration::after {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            border-radius: 50%;

            border: 1px solid rgba(179, 143, 81, 0.08);
        }

        .benefit-decoration-top {
            top: -150px;
            left: -100px;
        }

        .benefit-decoration-top::after {
            top: 35px;
            left: 35px;
        }

        .benefit-decoration-bottom {
            right: -150px;
            bottom: -160px;
        }

        .benefit-decoration-bottom::after {
            right: 35px;
            bottom: 35px;
        }

        /* =========================================
   RESPONSIVE
========================================= */

        @media (max-width: 1100px) {

            .benefit-section {
                padding: 85px 0 95px;
            }

            .benefit-grid {
                gap: 20px;
            }

            .benefit-card {
                padding: 24px;
            }

            .benefit-content h4 {
                font-size: 19px;
            }

            .benefit-content p {
                font-size: 15px;
            }
        }

        @media (max-width: 850px) {

            .benefit-section .section-head {
                margin-bottom: 35px;
            }

            .benefit-section .section-head h2 {
                font-size: 42px;
            }

            .benefit-grid {
                grid-template-columns: 1fr;
            }

            .benefit-card {
                min-height: auto;
                padding: 27px 30px 30px;
            }

            .benefit-content p {
                max-width: 650px;
            }
        }

        @media (max-width: 576px) {

            .benefit-section {
                padding: 70px 0 75px;
            }

            .benefit-section .section-head h2 {
                font-size: 34px;
                line-height: 1.12;
            }

            .badge-pill {
                font-size: 13px;
                padding: 8px 14px;
            }

            .heading-line {
                width: 70px;
                height: 4px;
                margin-top: 21px;
            }

            .benefit-card {
                padding: 23px 22px 26px;
                border-radius: 17px;
            }

            .benefit-icon {
                width: 58px;
                height: 58px;
            }

            .benefit-icon svg {
                width: 31px;
                height: 31px;
            }

            .b-num {
                width: 44px;
                height: 44px;
                margin-left: 15px;
                font-size: 14px;
            }

            .card-number {
                font-size: 45px;
            }

            .benefit-content h4 {
                font-size: 18px;
            }

            .benefit-content p {
                font-size: 14px;
                line-height: 1.6;
            }
        }

        /* =========================================
   IMPLEMENTATION PROCESS
========================================= */

        .process-section {
            position: relative;
            overflow: hidden;
            padding: 110px 0 125px;
        }

        .process-container {
            position: relative;
            z-index: 2;
        }

        /* =========================================
   HEADER
========================================= */

        .process-head {
            margin-bottom: 62px;
        }

        .process-head .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 17px;
            margin-bottom: 22px;
            border: 1px solid rgba(179, 143, 81, 0.35);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.8);
            color: #202020;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(30, 25, 15, 0.04);
        }

        .process-head .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #b38f51;
            box-shadow:
                0 0 0 4px rgba(179, 143, 81, 0.10);
        }

        .process-head h2 {
            margin: 0 0 15px;
            color: #111820;
            font-size: clamp(40px, 4vw, 30px);
            line-height: 1.08;
            font-weight: 750;
            letter-spacing: -0.045em;
        }

        .process-head h2 span {
            color: #b38f51;
        }

        .process-head p {
            margin: 0;
            color: #687386;
            font-size: 1.2rem;
            line-height: 1.65;
        }

        /* =========================================
   TIMELINE
========================================= */

        .process-timeline {
            position: relative;
            margin: 0 auto;
        }

        /* Vertical line */
        .process-timeline::before {
            content: "";
            position: absolute;
            left: 34px;
            top: 35px;
            bottom: 35px;
            width: 2px;
            background: linear-gradient(to bottom,
                    rgba(179, 143, 81, 0.65),
                    rgba(179, 143, 81, 0.15));
        }

        /* =========================================
   TIMELINE ITEM
========================================= */

        .process-item {
            position: relative;

            display: grid;
            grid-template-columns: 70px 1fr;

            column-gap: 28px;

            margin-bottom: 32px;
        }

        .process-item:last-child {
            margin-bottom: 0;
        }

        /* =========================================
   MARKER
========================================= */

        .process-marker {
            position: relative;
            z-index: 3;

            width: 70px;
            height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(179, 143, 81, 0.55);
            border-radius: 50%;

            background: #fbfaf7;

            box-shadow:
                0 0 0 8px rgba(251, 250, 247, 0.9);
        }

        .process-marker span {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: linear-gradient(145deg,
                    #b38f51,
                    #967438);

            color: #fff;

            font-size: 14px;
            font-weight: 700;

            box-shadow:
                0 7px 18px rgba(179, 143, 81, 0.20);
        }

        /* =========================================
   PROCESS CARD
========================================= */

        .process-card {
            position: relative;

            min-height: 150px;

            padding: 28px 32px;

            overflow: hidden;

            border: 1px solid rgba(179, 143, 81, 0.22);
            border-radius: 18px;

            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, 0.98),
                    rgba(255, 255, 255, 0.88));

            box-shadow:
                0 12px 35px rgba(26, 23, 18, 0.045),
                0 2px 8px rgba(26, 23, 18, 0.025);

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }

        /* Gold accent */
        .process-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 4px;

            border-radius: 18px 0 0 18px;

            background: linear-gradient(180deg,
                    #b38f51,
                    rgba(179, 143, 81, 0.25));
        }

        .process-card:hover {
            transform: translateX(7px);

            border-color: rgba(179, 143, 81, 0.42);

            box-shadow:
                0 22px 50px rgba(26, 23, 18, 0.09),
                0 7px 20px rgba(179, 143, 81, 0.07);
        }

        /* =========================================
   CARD TOP
========================================= */

        .process-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 11px;
        }

        .process-step-label {
            color: #b38f51;

            font-size: 11px;
            font-weight: 750;

            letter-spacing: 0.13em;
        }

        .process-card-number {
            position: absolute;

            right: 22px;
            top: 12px;

            color: rgba(179, 143, 81, 0.065);

            font-size: 70px;
            line-height: 1;

            font-weight: 800;
            letter-spacing: -0.07em;

            pointer-events: none;
        }

        /* =========================================
   CARD CONTENT
========================================= */

        .process-card h4 {
            position: relative;
            z-index: 2;

            margin: 0 0 8px;

            color: #10151a;

            font-size: 20px;
            line-height: 1.3;

            font-weight: 750;
            letter-spacing: -0.02em;
        }

        .process-card p {
            position: relative;
            z-index: 2;

            max-width: 780px;

            margin: 0;

            color: #687386;

            font-size: 15.5px;
            line-height: 1.65;
        }

        /* =========================================
   BACKGROUND DECORATION
========================================= */

        .process-bg-circle {
            position: absolute;

            width: 320px;
            height: 320px;

            border: 1px solid rgba(179, 143, 81, 0.08);

            border-radius: 50%;

            pointer-events: none;
        }

        .process-bg-circle::after {
            content: "";

            position: absolute;

            width: 210px;
            height: 210px;

            border: 1px solid rgba(179, 143, 81, 0.06);

            border-radius: 50%;
        }

        .process-bg-circle-1 {
            top: -210px;
            right: -130px;
        }

        .process-bg-circle-1::after {
            top: 54px;
            left: 54px;
        }

        .process-bg-circle-2 {
            bottom: -220px;
            left: -160px;
        }

        .process-bg-circle-2::after {
            bottom: 54px;
            right: 54px;
        }

        /* =========================================
   RESPONSIVE
========================================= */

        @media (max-width: 900px) {

            .process-section {
                padding: 90px 0 100px;
            }

            .process-head {
                margin-bottom: 48px;
            }

            .process-head h2 {
                font-size: 44px;
            }

            .process-item {
                grid-template-columns: 60px 1fr;
                column-gap: 20px;
            }

            .process-marker {
                width: 60px;
                height: 60px;
            }

            .process-marker span {
                width: 45px;
                height: 45px;
            }

            .process-timeline::before {
                left: 29px;
            }

            .process-card {
                padding: 25px 27px;
            }
        }

        @media (max-width: 600px) {

            .process-section {
                padding: 70px 0 80px;
            }

            .process-head {
                margin-bottom: 40px;
            }

            .process-head h2 {
                font-size: 35px;
            }

            .process-head p {
                font-size: 15px;
            }

            .process-item {
                grid-template-columns: 48px 1fr;
                column-gap: 14px;
                margin-bottom: 22px;
            }

            .process-timeline::before {
                left: 23px;
                top: 25px;
                bottom: 25px;
            }

            .process-marker {
                width: 48px;
                height: 48px;

                box-shadow:
                    0 0 0 5px rgba(251, 250, 247, 0.9);
            }

            .process-marker span {
                width: 36px;
                height: 36px;

                font-size: 11px;
            }

            .process-card {
                min-height: auto;

                padding: 21px 20px 23px;

                border-radius: 15px;
            }

            .process-card h4 {
                font-size: 17px;
            }

            .process-card p {
                font-size: 14px;
                line-height: 1.6;
            }

            .process-step-label {
                font-size: 9px;
            }

            .process-card-number {
                font-size: 48px;
                right: 14px;
                top: 10px;
            }
        }

        /* =========================================
   TESTIMONIAL SECTION
========================================= */

        .testimonial-section {
            position: relative;
            overflow: hidden;
            padding: 110px 0 110px;
            background: #fbfaf7;
        }

        .testimonial-section .container {
            position: relative;
            z-index: 2;
        }

        /* =========================================
   TESTIMONIAL CARD
========================================= */

        .testimonial-card {
            position: relative;

            display: flex;
            align-items: flex-start;
            margin: 0 auto;

            padding: 42px 52px;

            overflow: hidden;

            border: 1px solid rgba(179, 143, 81, 0.28);
            border-radius: 22px;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, 0.98),
                    rgba(250, 248, 243, 0.95));

            box-shadow:
                0 20px 55px rgba(30, 26, 18, 0.065),
                0 4px 14px rgba(30, 26, 18, 0.025);
        }

        /* Gold vertical accent */
        .testimonial-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 5px;

            background: linear-gradient(180deg,
                    #b38f51,
                    rgba(179, 143, 81, 0.25));
        }

        /* =========================================
   QUOTE ICON
========================================= */

        .testimonial-quote-icon {
            flex: 0 0 58px;

            width: 58px;
            height: 58px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 28px;

            border-radius: 16px;

            background: rgba(179, 143, 81, 0.11);

            color: #b38f51;
        }

        .testimonial-quote-icon svg {
            width: 31px;
            height: 31px;

            stroke: currentColor;
            stroke-width: 1.4;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* =========================================
   CONTENT
========================================= */

        .testimonial-content {
            position: relative;
            z-index: 2;

            flex: 1;
        }

        .testimonial-label {
            margin-bottom: 13px;

            color: #b38f51;

            font-size: 11px;
            font-weight: 750;

            letter-spacing: 0.15em;
        }

        .testimonial-card .quote {
            max-width: 940px;

            margin: 0 0 25px;

            color: #111820;

            font-size: clamp(19px, 2vw, 24px);
            line-height: 1.55;

            font-weight: 500;
            letter-spacing: -0.015em;
        }

        /* =========================================
   AUTHOR
========================================= */

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .author-line {
            width: 30px;
            height: 2px;

            border-radius: 10px;

            background: #b38f51;
        }

        .testimonial-author strong {
            color: #111820;

            font-size: 14px;
            font-weight: 750;
        }

        .testimonial-author span {
            margin-left: 7px;

            color: #687386;

            font-size: 14px;
        }

        /* =========================================
   LARGE DECORATIVE QUOTE
========================================= */

        .testimonial-mark {
            position: absolute;

            right: 32px;
            bottom: -30px;

            color: rgba(179, 143, 81, 0.07);

            font-family: Georgia, serif;

            font-size: 180px;
            line-height: 1;

            font-weight: 700;

            pointer-events: none;
        }

        /* =========================================
   BACKGROUND DECORATION
========================================= */

        .testimonial-bg {
            position: absolute;

            width: 250px;
            height: 250px;

            left: -150px;
            bottom: -180px;

            border: 1px solid rgba(179, 143, 81, 0.08);

            border-radius: 50%;
        }

        .testimonial-bg::after {
            content: "";

            position: absolute;

            width: 170px;
            height: 170px;

            left: 38px;
            top: 38px;

            border: 1px solid rgba(179, 143, 81, 0.06);

            border-radius: 50%;
        }

        /* =========================================
   HOVER
========================================= */

        .testimonial-card {
            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);

            border-color: rgba(179, 143, 81, 0.42);

            box-shadow:
                0 28px 65px rgba(30, 26, 18, 0.09),
                0 8px 20px rgba(179, 143, 81, 0.06);
        }

        /* =========================================
   TABLET
========================================= */

        @media (max-width: 768px) {

            .testimonial-section {
                padding: 10px 0 85px;
            }

            .testimonial-card {
                padding: 34px 32px;
            }

            .testimonial-quote-icon {
                flex-basis: 52px;

                width: 52px;
                height: 52px;

                margin-right: 22px;
            }

            .testimonial-card .quote {
                font-size: 18px;
            }

            .testimonial-mark {
                font-size: 140px;
            }
        }

        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 576px) {

            .testimonial-section {
                padding: 5px 0 70px;
            }

            .testimonial-card {
                display: block;

                padding: 28px 23px 30px;

                border-radius: 17px;
            }

            .testimonial-quote-icon {
                width: 48px;
                height: 48px;

                margin: 0 0 20px;

                border-radius: 13px;
            }

            .testimonial-quote-icon svg {
                width: 26px;
                height: 26px;
            }

            .testimonial-label {
                font-size: 9px;
                margin-bottom: 10px;
            }

            .testimonial-card .quote {
                font-size: 17px;
                line-height: 1.55;

                margin-bottom: 22px;
            }

            .testimonial-author {
                align-items: flex-start;
            }

            .author-line {
                margin-top: 7px;
                flex-shrink: 0;
            }

            .testimonial-author strong,
            .testimonial-author span {
                font-size: 12px;
            }

            .testimonial-author span {
                display: block;
                margin: 3px 0 0;
            }

            .testimonial-mark {
                right: 10px;
                bottom: -22px;
                font-size: 110px;
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
            color: #000;
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
            font-size: .92rem;
            line-height: 1.7;
        }

        /* =========================================
   RELATED SYSTEMS
========================================= */

        .related-systems {
            position: relative;
            overflow: hidden;
            padding: 105px 0 120px;
            background:
                radial-gradient(circle at 15% 20%,
                    rgba(179, 143, 81, 0.07),
                    transparent 32%),
                #f8f6f1;
        }

        .related-container {
            position: relative;
            z-index: 2;
        }

        /* =========================================
   HEADER
========================================= */

        .related-head {
            margin-bottom: 48px;
        }

        .related-head .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 17px;
            margin-bottom: 21px;
            border: 1px solid rgba(179, 143, 81, 0.35);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.8);
            color: #202020;
            font-size: 14px;
            font-weight: 600;
            box-shadow:
                0 6px 20px rgba(30, 25, 15, 0.04);
        }

        .related-head .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #b38f51;
            box-shadow:
                0 0 0 4px rgba(179, 143, 81, 0.10);
        }

        .related-head h2 {
            margin: 0 0 14px;
            color: #111820;
            font-size: clamp(38px, 4vw, 30px);
            line-height: 1.08;
            font-weight: 750;
            letter-spacing: -0.045em;
        }

        .related-head h2 span {
            color: #b38f51;
        }

        .related-head p {
            margin: 0;
            color: #687386;
            font-size: 1.2rem;
            line-height: 1.65;
        }

        /* =========================================
   GRID
========================================= */

        .related-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 20px;
        }

        /* =========================================
   CARD
========================================= */

        .related-card {
            position: relative;

            display: flex;
            flex-direction: column;

            min-height: 280px;

            padding: 25px 25px 22px;

            overflow: hidden;

            text-decoration: none;

            border: 1px solid rgba(179, 143, 81, 0.23);
            border-radius: 19px;

            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, 0.98),
                    rgba(255, 255, 255, 0.88));

            box-shadow:
                0 12px 35px rgba(26, 23, 18, 0.045),
                0 2px 8px rgba(26, 23, 18, 0.025);

            transition:
                transform 0.35s ease,
                border-color 0.35s ease,
                box-shadow 0.35s ease;
        }

        /* Gold side accent */
        .related-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;
            bottom: 0;

            width: 4px;

            border-radius: 19px 0 0 19px;

            background:
                linear-gradient(180deg,
                    #b38f51,
                    rgba(179, 143, 81, 0.20));

            transform: scaleY(0.25);
            transform-origin: top;

            transition: transform 0.35s ease;
        }

        /* Hover */
        .related-card:hover {
            transform: translateY(-8px);

            border-color:
                rgba(179, 143, 81, 0.45);

            box-shadow:
                0 25px 55px rgba(26, 23, 18, 0.09),
                0 8px 20px rgba(179, 143, 81, 0.07);
        }

        .related-card:hover::before {
            transform: scaleY(1);
        }

        /* =========================================
   CARD HEADER
========================================= */

        .related-card-header {
            position: relative;

            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        /* Icon */
        .r-icon {
            width: 58px;
            height: 58px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 15px;

            background:
                rgba(179, 143, 81, 0.11);

            color: #b38f51;

            transition:
                transform 0.35s ease,
                background 0.35s ease;
        }

        .r-icon svg {
            width: 29px;
            height: 29px;

            stroke: currentColor;
            fill: none;

            stroke-width: 1.5;

            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .related-card:hover .r-icon {
            transform: scale(1.08);

            background:
                rgba(179, 143, 81, 0.16);
        }

        /* =========================================
   NUMBER
========================================= */

        .r-number {
            color: rgba(179, 143, 81, 0.18);

            font-size: 42px;
            line-height: 1;

            font-weight: 800;

            letter-spacing: -0.06em;
        }

        /* =========================================
   CONTENT
========================================= */

        .related-content {
            margin-top: 30px;
        }

        .related-label {
            display: block;
            margin-bottom: 9px;
            color: #b38f51;
            font-size: 1rem;
            line-height: 1;
            font-weight: 600;
            letter-spacing: 0.15em;
        }

        .related-card h4 {
            margin: 0 0 7px;

            color: #111820;

            font-size: 23px;
            line-height: 1.15;

            font-weight: 750;

            letter-spacing: -0.025em;
        }

        .related-title {
            display: block;
            color: #687386;
            font-size: 1rem;
            line-height: 1.55;
        }

        /* =========================================
   ARROW
========================================= */

        .related-arrow {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid rgba(179, 143, 81, 0.13);
            color: #687386;
            font-size: 1rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .related-arrow svg {
            width: 19px;
            height: 19px;
            stroke: currentColor;
            stroke-width: 1.6;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition:
                transform 0.3s ease;
        }

        .related-card:hover .related-arrow {
            color: #b38f51;
        }

        .related-card:hover .related-arrow svg {
            transform: translateX(5px);
        }

        /* =========================================
   BACKGROUND DECORATION
========================================= */

        .related-bg {
            position: absolute;

            width: 320px;
            height: 320px;

            border: 1px solid rgba(179, 143, 81, 0.07);

            border-radius: 50%;

            pointer-events: none;
        }

        .related-bg::after {
            content: "";

            position: absolute;

            width: 210px;
            height: 210px;

            border: 1px solid rgba(179, 143, 81, 0.055);

            border-radius: 50%;
        }

        .related-bg-1 {
            top: -220px;
            left: -160px;
        }

        .related-bg-1::after {
            top: 54px;
            left: 54px;
        }

        .related-bg-2 {
            right: -180px;
            bottom: -220px;
        }

        .related-bg-2::after {
            right: 54px;
            bottom: 54px;
        }

        /* =========================================
   TABLET
========================================= */

        @media (max-width: 1050px) {

            .related-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .related-card {
                min-height: 260px;
            }
        }

        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 600px) {

            .related-systems {
                padding: 75px 0 80px;
            }

            .related-head {
                margin-bottom: 35px;
            }

            .related-head h2 {
                font-size: 35px;
            }

            .related-head p {
                font-size: 14px;
            }

            .related-grid {
                grid-template-columns: 1fr;

                gap: 16px;
            }

            .related-card {
                min-height: 235px;

                padding: 22px;
            }

            .related-content {
                margin-top: 25px;
            }

            .related-card h4 {
                font-size: 21px;
            }

            .related-title {
                font-size: 13px;
            }

            .r-number {
                font-size: 36px;
            }
        }

        /* =========================================
   PREMIUM CTA SECTION
========================================= */

        .cta-section {
            padding-top: 100px;
            padding-bottom: 30px;
        }

        .premium-cta {
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;

            min-height: 250px;
            padding: 48px 52px;

            border-radius: 26px;

            background:
                radial-gradient(circle at 90% 20%,
                    rgba(179, 143, 81, 0.16),
                    transparent 28%),
                linear-gradient(120deg,
                    #030812 0%,
                    #081126 48%,
                    #152752 100%);

            border: 1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }


        /* =========================================
   GOLD GLOW
========================================= */

        .cta-glow {
            position: absolute;
            width: 300px;
            height: 300px;

            right: -100px;
            top: -160px;

            background: rgba(179, 143, 81, 0.18);

            filter: blur(70px);
            border-radius: 50%;

            pointer-events: none;
        }


        /* =========================================
   CONTENT
========================================= */

        .cta-content {
            position: relative;
            z-index: 2;

            max-width: 650px;
        }

        .cta-eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 13px;

            color: #b38f51;

            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .cta-dot {
            width: 7px;
            height: 7px;

            background: #b38f51;
            border-radius: 50%;

            box-shadow: 0 0 12px rgba(179, 143, 81, 0.7);
        }


        /* =========================================
   HEADING
========================================= */

        .cta-content h2 {
            margin: 0 0 12px;

            color: #ffffff;

            font-size: clamp(28px, 3vw, 38px);
            line-height: 1.15;
            font-weight: 700;

            letter-spacing: -0.8px;
        }

        .cta-content h2 span {
            color: #b38f51;
        }


        /* =========================================
   DESCRIPTION
========================================= */

        .cta-content p {
            max-width: 610px;

            margin: 0;

            color: rgba(255, 255, 255, 0.72);

            font-size: 15px;
            line-height: 1.7;
        }


        /* =========================================
   BUTTONS
========================================= */

        .cta-actions {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 13px;

            flex-shrink: 0;
        }

        .cta-btn {
            min-width: 185px;
            height: 52px;

            padding: 0 19px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;

            border-radius: 11px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            transition:
                transform 0.25s ease,
                background 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .cta-btn i {
            font-size: 15px;
            transition: transform 0.25s ease;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
        }

        .cta-btn:hover i {
            transform: translate(2px, -2px);
        }


        /* Primary Button */

        .cta-btn-primary {
            color: #ffffff;

            background: #b38f51;

            border: 1px solid #b38f51;

            box-shadow:
                0 8px 22px rgba(179, 143, 81, 0.22);
        }

        .cta-btn-primary:hover {
            color: #ffffff;

            background: #c09a5a;

            border-color: #c09a5a;

            box-shadow:
                0 12px 28px rgba(179, 143, 81, 0.30);
        }


        /* Secondary Button */

        .cta-btn-secondary {
            color: #ffffff;

            background: rgba(255, 255, 255, 0.025);

            border: 1px solid rgba(255, 255, 255, 0.28);

            backdrop-filter: blur(8px);
        }

        .cta-btn-secondary:hover {
            color: #ffffff;

            background: rgba(255, 255, 255, 0.08);

            border-color: rgba(255, 255, 255, 0.50);
        }


        /* =========================================
   DECORATIVE ELEMENT
========================================= */

        .cta-decoration {
            position: absolute;

            right: 32px;
            bottom: 20px;

            display: flex;
            gap: 6px;

            opacity: 0.35;
        }

        .cta-decoration span {
            display: block;

            width: 4px;
            height: 4px;

            border-radius: 50%;

            background: #b38f51;
        }


        /* =========================================
   TABLET
========================================= */

        @media (max-width: 991px) {

            .cta-section {
                padding-top: 70px;
            }

            .premium-cta {
                gap: 35px;
                padding: 42px;
            }

            .cta-content h2 {
                font-size: 30px;
            }

            .cta-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .cta-btn {
                min-width: 175px;
            }
        }


        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 767px) {

            .cta-section {
                padding-top: 55px;
                padding-left: 15px;
                padding-right: 15px;
            }

            .premium-cta {
                display: block;

                min-height: auto;

                padding: 34px 25px;

                border-radius: 20px;
            }

            .cta-content {
                max-width: 100%;
            }

            .cta-eyebrow {
                font-size: 13px;
                margin-bottom: 12px;
            }

            .cta-content h2 {
                font-size: 27px;
                line-height: 1.2;
                letter-spacing: -0.4px;
            }

            .cta-content p {
                font-size: 14px;
                line-height: 1.65;
            }

            .cta-actions {
                margin-top: 27px;

                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .cta-btn {
                width: 100%;
                min-width: 0;
                height: 50px;
            }

            .cta-decoration {
                right: 20px;
                bottom: 15px;
            }
        }


        /* =========================================
   SMALL MOBILE
========================================= */

        @media (max-width: 400px) {

            .premium-cta {
                padding: 30px 20px;
            }

            .cta-content h2 {
                font-size: 24px;
            }

            .cta-content p {
                font-size: 13.5px;
            }
        }
    </style>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="sep">/</li>
                <li><a href="operations-logistics.php">Operations &amp; Logistics</a></li>
                <li class="sep">/</li>
                <li class="current"><?php echo htmlspecialchars($system['abbr']); ?></li>
            </ul>
        </div>
    </div>

    <!-- SYSTEM HERO -->
    <section class="sys-hero">
        <div class="container">
            <div class="sys-hero-inner">

                <!-- Left Content -->
                <div class="sys-hero-main">

                    <div class="sys-hero-icon">
                        <?php echo ops_icon($opsIcons, $system['icon']); ?>
                    </div>

                    <div class="sys-hero-text">

                        <span class="sys-hero-eyebrow">
                            <?php echo htmlspecialchars($system['abbr']); ?>
                        </span>

                        <h1>
                            <?php echo htmlspecialchars($system['title']); ?>
                        </h1>

                        <p class="sys-hero-tagline">
                            <?php echo htmlspecialchars($system['tagline']); ?>
                        </p>

                    </div>

                </div>

                <!-- Right Stat -->
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
    </section>

    <!-- OVERVIEW + FEATURES + SIDEBAR -->
    <section class="system-overview-section">
        <div class="container">

            <div class="body-layout">

                <!-- =========================
                 MAIN CONTENT
            ========================== -->
                <main class="main-copy">

                    <!-- Overview -->
                    <div class="overview-block">
                        <p class="lede">
                            <?php echo htmlspecialchars($system['overview']); ?>
                        </p>
                    </div>


                    <!-- Features -->
                    <div class="features-block">

                        <div class="section-head">
                            <div class="badge-pill">
                                <span class="dot"></span>
                                What's Included
                            </div>

                            <h2>
                                What you get with
                                <span class="heading-accent">
                                    <?php echo htmlspecialchars($system['abbr']); ?>
                                </span>
                            </h2>
                        </div>


                        <div class="feature-list">

                            <?php foreach ($system['features'] as $index => $f): ?>

                                <div class="feature-item">

                                    <span class="feature-number">
                                        <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                    </span>

                                    <span class="fi-check">
                                        <svg viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="3">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>

                                    <span class="fi-text">
                                        <?php echo htmlspecialchars($f); ?>
                                    </span>

                                    <span class="feature-arrow">
                                        <i class="bi bi-arrow-up-right"></i>
                                    </span>

                                </div>

                            <?php endforeach; ?>

                        </div>
                    </div>


                    <!-- Integrations -->
                    <div class="integrations-block">

                        <div class="section-head integration-heading">
                            <div class="badge-pill">
                                <span class="dot"></span>
                                Integrates With
                            </div>
                        </div>

                        <div class="integration-chips">

                            <?php foreach ($system['integrations'] as $intg): ?>

                                <span class="integration-chip">
                                    <i class="bi bi-check2"></i>
                                    <?php echo htmlspecialchars($intg); ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </main>


                <!-- =========================
                 SIDEBAR
            ========================== -->
                <aside class="sys-sidebar">

                    <!-- Systems Navigation -->
                    <div class="sidebar-card systems-card">

                        <div class="sidebar-card-header">
                            <span class="sidebar-label">Explore</span>

                            <h3>All Systems</h3>
                        </div>

                        <ul class="sidebar-nav">

                            <?php foreach ($systems as $s): ?>

                                <li>
                                    <a
                                        href="operations-logistics-detail.php?slug=<?php echo urlencode($s['slug']); ?>"
                                        class="<?php echo $s['slug'] === $system['slug'] ? 'active' : ''; ?>">

                                        <span class="system-link-content">
                                            <strong>
                                                <?php echo htmlspecialchars($s['abbr']); ?>
                                            </strong>

                                            <span>
                                                <?php echo htmlspecialchars($s['title']); ?>
                                            </span>
                                        </span>

                                        <i class="bi bi-arrow-up-right"></i>

                                    </a>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>


                    <!-- CTA -->
                    <div class="sidebar-card sidebar-cta">

                        <div class="cta-icon">
                            <i class="bi bi-chat-square-text"></i>
                        </div>

                        <span class="sidebar-cta-label">
                            LET'S TALK
                        </span>

                        <h4>
                            Ready to start?
                        </h4>

                        <p>
                            Tell us about your operation and we'll follow up
                            with next steps within one business day.
                        </p>

                        <a href="#" class="sidebar-cta-button">
                            <span>Book A Discovery Call</span>
                            <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>

                </aside>

            </div>

        </div>
    </section>

    <!-- BENEFITS -->
    <section class="benefit-section">
        <div class="benefit-decoration benefit-decoration-top"></div>
        <div class="benefit-decoration benefit-decoration-bottom"></div>

        <div class="container benefit-container">

            <div class="section-head">
                <div class="badge-pill">
                    <span class="dot"></span>
                    Why It Matters
                </div>

                <h2>
                    What changes once
                    <span><?php echo htmlspecialchars($system['abbr']); ?></span>
                    is running
                </h2>

                <div class="heading-line"></div>
            </div>

            <div class="benefit-grid">

                <?php foreach ($system['benefits'] as $i => $b): ?>

                    <div class="benefit-card">

                        <div class="benefit-card-top">

                            <div class="benefit-icon">
                                <?php if ($i == 0): ?>
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M3 7.5L12 3l9 4.5-9 4.5L3 7.5Z" />
                                        <path d="M3 7.5V16l9 5 9-5V7.5" />
                                        <path d="M12 12v9" />
                                        <path d="M7.5 5.25v5.5" />
                                        <circle cx="17.5" cy="17.5" r="3.5" />
                                        <path d="M17.5 15.8v1.9l1.2.8" />
                                    </svg>

                                <?php elseif ($i == 1): ?>
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M12 3v4" />
                                        <path d="M12 17v4" />
                                        <path d="M3 12h4" />
                                        <path d="M17 12h4" />
                                        <path d="M5.64 5.64l2.83 2.83" />
                                        <path d="M15.53 15.53l2.83 2.83" />
                                        <path d="M18.36 5.64l-2.83 2.83" />
                                        <path d="M8.47 15.53l-2.83 2.83" />
                                        <path d="M9 9h6v6H9z" />
                                    </svg>

                                <?php else: ?>
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <circle cx="9" cy="8" r="3" />
                                        <circle cx="17" cy="9" r="2.5" />
                                        <path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6" />
                                        <path d="M14 14.5c.9-.5 1.9-.8 3-.8 2.8 0 5 2.2 5 5" />
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <span class="b-num">
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                            <span class="card-number">
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                        </div>

                        <div class="benefit-divider"></div>

                        <div class="benefit-content">
                            <h4>
                                <?php echo htmlspecialchars($b['title']); ?>
                            </h4>

                            <p>
                                <?php echo htmlspecialchars($b['desc']); ?>
                            </p>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- PROCESS -->
    <section class="process-section">
        <div class="process-bg-circle process-bg-circle-1"></div>
        <div class="process-bg-circle process-bg-circle-2"></div>

        <div class="container process-container">

            <!-- Section Header -->
            <div class="section-head process-head">

                <div class="badge-pill">
                    <span class="dot"></span>
                    How We Roll It Out
                </div>

                <h2>
                    Implementation
                    <span>process</span>
                </h2>

                <p>
                    The same disciplined rollout applies whether this is a standalone
                    system or part of the full pipeline.
                </p>

            </div>

            <!-- Timeline -->
            <div class="process-timeline">

                <?php foreach ($system['process'] as $i => $step): ?>

                    <div class="process-item">

                        <!-- Timeline Number -->
                        <div class="process-marker">
                            <span>
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>
                        </div>

                        <!-- Timeline Card -->
                        <div class="process-card">

                            <div class="process-card-top">

                                <span class="process-step-label">
                                    STEP <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                                <span class="process-card-number">
                                    <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                            </div>

                            <h4>
                                <?php echo htmlspecialchars($step['title']); ?>
                            </h4>

                            <p>
                                <?php echo htmlspecialchars($step['desc']); ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="testimonial-section">
        <div class="testimonial-bg"></div>

        <div class="container">

            <div class="testimonial-card">

                <div class="testimonial-quote-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M9.5 11H5.5C5.5 7.7 7.1 5.6 10 4.5" />
                        <path d="M18.5 11H14.5C14.5 7.7 16.1 5.6 19 4.5" />
                        <path d="M5.5 11C4.1 11 3 12.1 3 13.5V16.5C3 17.9 4.1 19 5.5 19H8.5C9.9 19 11 17.9 11 16.5V13.5C11 12.1 9.9 11 8.5 11H5.5Z" />
                        <path d="M14.5 11C13.1 11 12 12.1 12 13.5V16.5C12 17.9 13.1 19 14.5 19H17.5C18.9 19 20 17.9 20 16.5V13.5C20 12.1 18.9 11 17.5 11H14.5Z" />
                    </svg>
                </div>

                <div class="testimonial-content">

                    <div class="testimonial-label">
                        CLIENT EXPERIENCE
                    </div>

                    <p class="quote">
                        <?php echo htmlspecialchars($system['testimonial']['quote']); ?>
                    </p>

                    <div class="testimonial-author">

                        <div class="author-line"></div>

                        <div>
                            <strong>
                                <?php echo htmlspecialchars($system['testimonial']['author']); ?>
                            </strong>

                            <span>
                                <?php echo htmlspecialchars($system['testimonial']['role']); ?>
                            </span>
                        </div>

                    </div>

                </div>

                <div class="testimonial-mark">”</div>

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

    <!-- RELATED SYSTEMS -->
    <section class="related-systems">
        <div class="related-bg related-bg-1"></div>
        <div class="related-bg related-bg-2"></div>

        <div class="container related-container">

            <div class="section-head related-head">

                <div class="badge-pill">
                    <span class="dot"></span>
                    Pairs Well With
                </div>

                <h2>
                    Other systems in the
                    <span>fulfillment pipeline</span>
                </h2>

                <p>
                    Connect the systems that keep your operations moving,
                    from warehouse to order management and final delivery.
                </p>

            </div>

            <div class="related-grid">

                <?php foreach ($otherSystems as $i => $rel): ?>

                    <a href="operations-logistics-detail.php?slug=<?php echo urlencode($rel['slug']); ?>"
                        class="related-card">

                        <div class="related-card-header">

                            <div class="r-icon">
                                <?php echo ops_icon($opsIcons, $rel['icon']); ?>
                            </div>

                            <span class="r-number">
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                        </div>

                        <div class="related-content">


                            <span class="related-label">CONNECTED SYSTEM</span>
                            <h4>
                                <?php echo htmlspecialchars($rel['abbr']); ?>
                            </h4>

                            <span class="related-title">
                                <?php echo htmlspecialchars($rel['title']); ?>
                            </span>

                        </div>

                        <div class="related-arrow">
                            <span>Explore</span>

                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M5 12h14" />
                                <path d="M13 6l6 6-6 6" />
                            </svg>
                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="container cta-section">
        <div class="premium-cta">

            <div class="cta-glow"></div>

            <div class="cta-content">
                <div class="cta-eyebrow">
                    <span class="cta-dot"></span>
                    Ready When You Are
                </div>

                <h2>
                    Let's talk about your
                    <span><?php echo htmlspecialchars($system['abbr']); ?></span>
                    setup
                </h2>

                <p>
                    Book a discovery call and we'll tell you honestly whether we're
                    the right fit — no obligation, no generic pitch deck.
                </p>
            </div>

            <div class="cta-actions">
                <a href="#" class="cta-btn cta-btn-primary">
                    <span>Book A Discovery Call</span>
                    <i class="bi bi-arrow-up-right"></i>
                </a>

                <a href="operations-logistics.php" class="cta-btn cta-btn-secondary">
                    <span>View All Systems</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="cta-decoration">
                <span></span>
                <span></span>
                <span></span>
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
        <h1 style="font-size:1.8rem;font-weight:700;color:#000;margin-bottom:12px;">System not found</h1>
        <p style="color:#6c7280;margin-bottom:24px;">We couldn't find that system. It may have been renamed or removed.</p>
        <a href="operations-logistics.php" class="btn btn-gold">Browse Operations &amp; Logistics</a>
    </div>

<?php endif; ?>

<?php
include_once('elements/footer.php');
?>