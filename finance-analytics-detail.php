<?php
$finPath = __DIR__ . '/data/finance-analytics.json';
$systems = [];
if (file_exists($finPath)) {
    $json = file_get_contents($finPath);
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
    'title' => ($system ? $system['title'] . ' (' . $system['abbr'] . ')' : 'Finance & Analytics') . ' | Devotion Technologies - Technology Experts & Innovators',
    'description' => $system ? $system['tagline'] : 'Finance and analytics systems built by Devotion Technologies.',
    'keywords' => 'Devotion Technologies ' . ($system ? strtolower($system['abbr']) : 'finance') . ', finance software, analytics systems',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$finIcons = [
    'bank'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9.5L12 4l9 5.5" /><path d="M4.5 9.5V19M9 9.5V19M15 9.5V19M19.5 9.5V19" /><path d="M3 19h18" /></svg>',
    'chart'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V10M9.5 19V5M15 19v-7M20 19V9" /><path d="M3 19h18" /></svg>',
    'invoice' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="5" y="3.5" width="14" height="17" rx="1.6" /><path d="M8.5 8.5h7M8.5 12h7M8.5 15.5h4" /></svg>',
    'card'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="6" width="19" height="13" rx="2" /><path d="M2.5 10.5h19" /><path d="M6 15h4" /></svg>',
];
function fin_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['chart'];
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
   FINANCE SYSTEM HERO
========================================== */

        .finance-system-hero {
            isolation: isolate;
            position: relative;
            overflow: hidden;
            background-image: url(../d-tech/assets/images/banner-img.png);
            background-repeat: no-repeat;
            color: #000;
        }

        .finance-system-hero::before {
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

        .finance-system-hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #B38F51;
        }

        /* Subtle grid texture */

        .finance-hero-grid {
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
            background-repeat: no-repeat;
            background-size: 56px 56px;
        }

        /* Soft decorative glow */


        /* Hero layout */

        .finance-hero-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;

            min-height: 255px;
            padding: 52px 0;
        }

        /* Left content */

        .finance-hero-content {
            flex: 1;
            min-width: 0;
        }

        /* Icon + Text */

        .finance-hero-top {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        /* Icon box */

        .finance-system-icon {
            width: 68px;
            height: 68px;
            flex: 0 0 68px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 18px;
            background: #00000011;
            color: #b38f51;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .finance-system-icon svg {
            width: 40px;
            height: 40px;
        }

        /* System meta */

        .finance-system-meta {
            min-width: 0;
        }

        /* ERP / IMS / POS */

        .finance-system-abbr {
            display: block;

            margin-bottom: 8px;

            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #b38f51;
        }

        /* Heading */

        .finance-system-meta h1 {
            margin: 0;

            max-width: 720px;

            font-size: clamp(30px, 3.1vw, 46px);
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: -.035em;

            color: #000;
        }

        /* Tagline */

        .finance-system-meta p {
            margin: 12px 0 0;

            max-width: 620px;

            font-size: 1.2rem;
            font-weight: 400;
            line-height: 1.65;

            color: #000;
        }

        /* Bottom label */

        .finance-hero-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-top: 30px;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: .02em;

            color: #000;
        }

        .finance-label-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;
            background: #b38f51;
        }

        /* ==========================================
   STAT HIGHLIGHT
========================================== */

        .finance-hero-highlight {
            flex: 0 0 260px;
            border-left: 1px solid rgba(255, 255, 255, .16);
        }

        /* Small label */

        .finance-stat-label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #000;
        }

        /* Big value */

        .finance-stat-value {
            font-size: clamp(38px, 4vw, 52px);
            font-weight: 700;
            line-height: 1;
            letter-spacing: -.045em;
            white-space: nowrap;

            color: #b38f51;
        }

        /* Stat description */

        .finance-stat-description {
            margin: 12px 0 0;
            font-size: 1.2rem;
            line-height: 1.6;

            color: #000;
        }

        /* ==========================================
   RESPONSIVE
========================================== */

        @media (max-width: 991px) {

            .finance-hero-inner {
                gap: 40px;
                padding: 44px 0;
            }

            .finance-hero-highlight {
                width: 220px;
                flex-basis: 220px;
                padding-left: 30px;
            }

            .finance-system-meta h1 {
                font-size: 34px;
            }

        }

        @media (max-width: 767px) {

            .finance-hero-inner {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 30px;

                min-height: auto;
                padding: 38px 0 42px;
            }

            .finance-hero-top {
                align-items: flex-start;
                gap: 16px;
            }

            .finance-system-icon {
                width: 56px;
                height: 56px;
                flex-basis: 56px;
                border-radius: 15px;
            }

            .finance-system-icon svg {
                width: 27px;
                height: 27px;
            }

            .finance-system-abbr {
                margin-bottom: 7px;
                font-size: 11px;
            }

            .finance-system-meta h1 {
                font-size: 29px;
                line-height: 1.2;
                letter-spacing: -.025em;
            }

            .finance-system-meta p {
                margin-top: 10px;
                font-size: 14px;
                line-height: 1.6;
            }

            .finance-hero-label {
                margin-top: 24px;
            }

            .finance-hero-highlight {
                width: 100%;
                flex: none;

                padding: 24px 0 0;

                border-top: 1px solid rgba(255, 255, 255, .15);
                border-left: 0;
            }

            .finance-stat-value {
                font-size: 42px;
            }

            .finance-stat-description {
                margin-top: 8px;
                max-width: 260px;
            }

        }

        @media (max-width: 380px) {

            .finance-system-meta h1 {
                font-size: 25px;
            }

            .finance-hero-top {
                gap: 12px;
            }

        }

        /* BODY LAYOUT */
        .body-layout {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 50px;
            padding: 48px 0px 56px 0px;
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
            color: #000;
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
            color: #000;
        }

        /* SIDEBAR */
        .sys-sidebar {
            position: sticky;
            top: 105px;
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

        /* =========================================
        BENEFITS SECTION
        ========================================= */

        .benefit-section {
            background: #f7f4ee;
            padding: 96px 0 80px;
            overflow: hidden;
        }


        /* Section Heading */

        .benefit-head {
            margin-bottom: 36px;
        }

        .benefit-head .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #dededb;
            border-radius: 999px;
            padding: 8px 14px;
            color: #273b5b;
            font-size: 15px;
            font-weight: 500;
        }

        .benefit-head .dot {
            width: 8px;
            height: 8px;
            background: #b38f51;
            border-radius: 50%;
            display: inline-block;
        }

        .benefit-head h2 {
            color: #070d24;
            font-size: clamp(28px, 3vw, 38px);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -1px;
            margin: 0;
        }

        /* Benefits Grid */

        .benefit-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        /* Benefit Card */

        .benefit-card {
            background: #ffffff;
            border: 1px solid #e4dfd5;
            border-radius: 16px;
            padding: 26px 26px 28px;
            min-height: 216px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }

        /* Number */

        .b-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: #f7f4ee;
            border-radius: 10px;
            color: #b38f51;
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 18px;
        }

        /* Card Title */

        .benefit-card h4 {
            color: #070d24;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.35;

            margin: 0 0 10px;
        }

        /* Card Description */

        .benefit-card p {
            color: #647087;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.6;
            margin: 0;
            max-width: 340px;
        }

        /* Hover */

        @media (hover: hover) and (pointer: fine) {

            .benefit-card:hover {
                transform: translateY(-4px);
                border-color: #b38f51;
                box-shadow: 0 14px 35px rgba(7, 13, 36, 0.06);
            }

            .benefit-card:hover .b-num {
                background: #b38f51;
                color: #ffffff;
            }

        }

        /* =========================================
        RESPONSIVE DESIGN
        ========================================= */

        @media (max-width: 991px) {

            .benefit-section {
                padding: 75px 0 65px;
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

        @media (max-width: 575px) {

            .benefit-section {
                padding: 60px 0 50px;
            }

            .benefit-section .container {
                padding: 0 20px;
            }

            .benefit-head {
                margin-bottom: 28px;
            }

            .benefit-head h2 {
                font-size: 28px;
                letter-spacing: -0.5px;
            }

            .benefit-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .benefit-card {
                min-height: auto;
                padding: 24px;
                border-radius: 14px;
            }

            .benefit-card h4 {
                font-size: 16px;
            }

            .benefit-card p {
                font-size: 15px;
                max-width: none;
            }

        }

        /* =========================================
   IMPLEMENTATION PROCESS
========================================= */

        .implementation-section {
            background: #ffffff;
            padding: 88px 0 100px;
        }

        /* Section Heading */

        .implementation-head {
            margin-bottom: 36px;
        }

        .implementation-head .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: 1px solid #dce1e8;
            border-radius: 999px;
            background: #ffffff;
            color: #273b5b;
            font-size: 15px;
            font-weight: 500;
        }

        .implementation-head .dot {
            width: 8px;
            height: 8px;
            background: #b38f51;
            border-radius: 50%;
        }

        .implementation-head h2 {
            color: #070d24;
            font-size: clamp(28px, 3vw, 38px);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -1px;
            margin: 0 0 12px;
        }

        .implementation-head p {
            color: #647087;
            font-size: 1rem;
            line-height: 1.6;
            margin: 0;
        }

        /* =========================================
   TIMELINE
========================================= */

        .timeline {
            position: relative;
            margin-top: 34px;
            display: flex;
            flex-direction: column;
        }

        /* Vertical Connector */

        .timeline::before {
            content: "";
            position: absolute;
            left: 22px;
            top: 23px;
            bottom: 23px;
            width: 2px;
            background: #e5dccb;
        }

        /* Timeline Item */

        .timeline-item {
            position: relative;

            display: grid;
            grid-template-columns: 46px minmax(0, 1fr);

            column-gap: 20px;

            align-items: start;

            margin-bottom: 30px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        /* Number Circle */

        .timeline-num {
            position: relative;
            z-index: 2;

            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 2px solid #b38f51;
            border-radius: 50%;

            background: #ffffff;

            color: #8f6c35;

            font-size: 14px;
            font-weight: 700;

            line-height: 1;
        }

        /* Timeline Card */

        .timeline-body {
            background: #ffffff;

            border: 1px solid #e5dfd4;
            border-radius: 14px;

            padding: 23px 26px 25px;

            min-height: 120px;

            transition:
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                transform 0.25s ease;
        }

        /* Card Heading */

        .timeline-body h4 {
            color: #070d24;

            font-size: 17px;
            font-weight: 700;
            line-height: 1.4;

            margin: 0 0 6px;
        }

        /* Card Description */

        .timeline-body p {
            color: #647087;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.6;
            margin: 0;
        }

        /* Hover */

        @media (hover: hover) and (pointer: fine) {

            .timeline-item:hover .timeline-body {
                border-color: #b38f51;
                box-shadow: 0 10px 28px rgba(7, 13, 36, 0.05);
                transform: translateY(-2px);
            }

            .timeline-item:hover .timeline-num {
                background: #b38f51;
                color: #ffffff;
            }

        }

        /* =========================================
   TABLET
========================================= */

        @media (max-width: 991px) {

            .implementation-section {
                padding: 72px 0 80px;
            }

            .timeline {
                max-width: 100%;
            }

            .timeline-item {
                margin-bottom: 24px;
            }

            .timeline-body {
                padding: 22px 24px;
            }

        }

        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 575px) {

            .implementation-section {
                padding: 60px 0 65px;
            }

            .implementation-section .container {
                padding: 0 20px;
            }

            .implementation-head {
                margin-bottom: 28px;
            }

            .implementation-head h2 {
                font-size: 28px;
                letter-spacing: -0.5px;
            }

            .implementation-head p {
                font-size: 15px;
            }

            .timeline {
                margin-top: 28px;
            }

            .timeline::before {
                left: 18px;
                top: 20px;
                bottom: 20px;
            }

            .timeline-item {
                grid-template-columns: 38px minmax(0, 1fr);
                column-gap: 14px;
                margin-bottom: 18px;
            }

            .timeline-num {
                width: 38px;
                height: 38px;

                font-size: 12px;
            }

            .timeline-body {
                padding: 19px 18px 20px;
                border-radius: 12px;
                min-height: auto;
            }

            .timeline-body h4 {
                font-size: 16px;
                margin-bottom: 7px;
            }

            .timeline-body p {
                font-size: 14px;
                line-height: 1.6;
            }

        }

        /* =========================================
   PREMIUM TESTIMONIAL SECTION
========================================= */

        /* Main Card */

        .testimonial-card {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 32px;
            overflow: hidden;
            padding: 48px 56px;
            background: #fbfaf7;
            border: 1px solid #e8e0d3;
            border-radius: 20px;

            box-shadow: 0 12px 35px rgba(7, 13, 36, 0.035);
        }

        /* Quote Icon */

        .testimonial-quote-icon {
            flex: 0 0 54px;
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b38f51;
            background: #f3ede3;
            border-radius: 14px;
        }

        .testimonial-quote-icon svg {
            width: 27px;
            height: 27px;
        }

        /* Content */

        .testimonial-content {
            flex: 1;
            min-width: 0;
        }

        /* Eyebrow */

        .testimonial-eyebrow {
            display: block;

            margin-bottom: 18px;

            color: #b38f51;

            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* Quote */

        .testimonial-quote {
            margin: 0 0 30px;
            color: #070d24;

            font-size: clamp(20px, 2vw, 20px);
            font-weight: 500;
            line-height: 1.55;
            letter-spacing: -0.45px;
        }

        /* Author */

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        /* Avatar */

        .author-avatar {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            color: #fff;
            background: #070d24;

            border-radius: 50%;

            font-size: 15px;
            font-weight: 700;
        }

        /* Author Info */

        .author-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .author-info strong {
            color: #070d24;

            font-size: 14px;
            font-weight: 700;
        }

        .author-info span {
            color: #7b8190;

            font-size: 13px;
            line-height: 1.5;
        }

        /* Gold Accent */

        .testimonial-accent {
            position: absolute;

            top: 0;
            right: 0;

            width: 5px;
            height: 100%;

            background: #b38f51;
            border-radius: 0 20px 20px 0;
        }


        /* =========================================
   RESPONSIVE
========================================= */

        @media (max-width: 767px) {

            .testimonial-section {
                padding-bottom: 55px;
            }

            .testimonial-card {
                flex-direction: column;
                gap: 22px;

                padding: 30px 24px;

                border-radius: 16px;
            }

            .testimonial-quote-icon {
                width: 48px;
                height: 48px;
            }

            .testimonial-quote {
                font-size: 20px;
                line-height: 1.55;
                letter-spacing: -0.2px;
            }

            .testimonial-eyebrow {
                margin-bottom: 14px;
            }

            .testimonial-author {
                gap: 11px;
            }

            .testimonial-accent {
                width: 4px;
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
            font-size: 1rem;
            line-height: 1.7;
        }

        /* =========================================
   RELATED SYSTEMS
========================================= */

        .related-systems {
            padding: 88px 0 100px;
            background: #f7f5f0;
        }

        /* Section Heading */

        .related-head {
            margin-bottom: 30px;
        }

        .related-head h2 {
            margin-bottom: 12px;
            color: #070d24;
        }

        .related-head p {
            margin: 0;
            color: #697286;
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* Grid */

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        /* Card */

        .related-card {
            position: relative;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            min-height: 245px;
            padding: 25px;

            overflow: hidden;

            color: #070d24;
            text-decoration: none;

            background: #fff;
            border: 1px solid #e6dfd3;
            border-radius: 18px;

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        /* Top Row */

        .related-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        /* Icon */

        .r-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #b38f51;
            background: #f3eadb;

            border-radius: 13px;

            transition:
                background 0.3s ease,
                color 0.3s ease;
        }

        .r-icon svg {
            width: 22px;
            height: 22px;
        }

        /* Arrow */

        .related-arrow {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #9a9eaa;
            background: #faf9f6;

            border: 1px solid #eee8df;
            border-radius: 50%;

            opacity: 0;
            transform: translate(-5px, 5px);

            transition:
                opacity 0.3s ease,
                transform 0.3s ease,
                color 0.3s ease,
                background 0.3s ease;
        }

        .related-arrow svg {
            width: 16px;
            height: 16px;
        }

        /* Card Content */

        .related-card-copy {
            margin-top: 30px;
        }

        /* Code */

        .related-code {
            display: block;

            margin-bottom: 9px;

            color: #b38f51;

            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        /* Title */

        .related-card h4 {
            margin: 0;
            color: #070d24;
            font-size: 19px;
            font-weight: 700;
            line-height: 1.4;
            letter-spacing: -0.3px;
        }

        /* Explore Link */

        .related-link-text {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 24px;
            color: #747b8c;
            font-size: 1rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .related-link-text svg {
            width: 15px;
            height: 15px;

            transition: transform 0.3s ease;
        }


        /* =========================================
   HOVER EFFECT
========================================= */

        @media (hover: hover) and (pointer: fine) {

            .related-card:hover {
                color: #070d24;

                border-color: #b38f51;

                box-shadow: 0 18px 40px rgba(7, 13, 36, 0.07);

                transform: translateY(-5px);
            }

            .related-card:hover .r-icon {
                color: #fff;
                background: #b38f51;
            }

            .related-card:hover .related-arrow {
                opacity: 1;
                color: #b38f51;
                background: #f7f1e7;

                transform: translate(0, 0);
            }

            .related-card:hover .related-link-text {
                color: #b38f51;
            }

            .related-card:hover .related-link-text svg {
                transform: translateX(4px);
            }

        }


        /* =========================================
   RESPONSIVE
========================================= */

        @media (max-width: 991px) {

            .related-systems {
                padding: 65px 0 75px;
            }

            .related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

        }

        @media (max-width: 575px) {

            .related-systems {
                padding: 55px 0 60px;
            }

            .related-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .related-card {
                min-height: 210px;
                padding: 23px;
            }

            .related-card-copy {
                margin-top: 25px;
            }

            .related-card h4 {
                font-size: 18px;
            }

            .related-arrow {
                opacity: 1;
                transform: none;
            }

        }

        /* =========================================
   ERP CTA SECTION
========================================= */

        .cta-section {
            padding-top: 0;
            padding-bottom: 90px;
        }

        .erp-cta {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 45px;

            overflow: hidden;

            padding: 52px 48px;

            background:
                linear-gradient(110deg,
                    #070d24 0%,
                    #101d42 100%);

            border-radius: 24px;

            isolation: isolate;
        }

        /* Content */

        .erp-cta-content {
            position: relative;
            z-index: 2;

            flex: 1;
            min-width: 0;
        }

        .erp-cta-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 15px;

            color: #b38f51;

            font-size: 14px;
            font-weight: 500;
            line-height: 1.5;
        }

        .cta-dot {
            width: 7px;
            height: 7px;

            flex-shrink: 0;

            background: #b38f51;
            border-radius: 50%;
        }

        /* Heading */

        .erp-cta h2 {
            max-width: 650px;

            margin: 0 0 10px;

            color: #fff;

            font-size: clamp(26px, 3vw, 34px);
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.8px;
        }

        /* Description */

        .erp-cta p {
            max-width: 620px;

            margin: 0;

            color: #c4cad9;

            font-size: 15px;
            line-height: 1.7;
        }

        /* Actions */

        .erp-cta-actions {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 14px;

            flex-shrink: 0;
        }

        /* Primary Button */

        .erp-cta .cta-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;

            min-height: 50px;
            padding: 0 25px;

            white-space: nowrap;
        }

        .cta-primary svg {
            width: 17px;
            height: 17px;

            transition: transform 0.25s ease;
        }

        /* Secondary Button */

        .erp-cta .cta-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 50px;
            padding: 0 25px;

            white-space: nowrap;
        }

        /* Decorative Glow */

        .cta-glow {
            position: absolute;
            z-index: 0;

            top: -130px;
            right: -70px;

            width: 350px;
            height: 350px;

            background: radial-gradient(circle,
                    rgba(179, 143, 81, 0.20) 0%,
                    rgba(179, 143, 81, 0.06) 35%,
                    transparent 70%);

            pointer-events: none;
        }


        /* =========================================
   HOVER
========================================= */

        @media (hover: hover) and (pointer: fine) {

            .erp-cta .cta-primary:hover svg {
                transform: translateX(4px);
            }

        }


        /* =========================================
   RESPONSIVE
========================================= */

        @media (max-width: 991px) {

            .erp-cta {
                gap: 30px;
                padding: 42px 35px;
            }

            .erp-cta-actions {
                flex-direction: column;
                align-items: stretch;
                min-width: 205px;
            }

            .erp-cta .cta-primary,
            .erp-cta .cta-secondary {
                width: 100%;
            }

        }

        @media (max-width: 767px) {

            .cta-section {
                padding-bottom: 55px;
            }

            .erp-cta {
                flex-direction: column;
                align-items: stretch;
                gap: 28px;

                padding: 34px 25px;

                border-radius: 18px;
            }

            .erp-cta h2 {
                font-size: 27px;
                line-height: 1.3;
            }

            .erp-cta p {
                font-size: 14px;
                line-height: 1.7;
            }

            .erp-cta-actions {
                width: 100%;
                min-width: 0;
                gap: 12px;
            }

            .erp-cta .cta-primary,
            .erp-cta .cta-secondary {
                width: 100%;
                min-height: 52px;
            }

        }
    </style>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="sep">/</li>
                <li><a href="finance-analytics.php">Finance &amp; Analytics</a></li>
                <li class="sep">/</li>
                <li class="current"><?php echo htmlspecialchars($system['abbr']); ?></li>
            </ul>
        </div>
    </div>

    <!-- SYSTEM HERO -->
    <section class="finance-system-hero">
        <div class="finance-hero-grid"></div>

        <div class="container">
            <div class="finance-hero-inner">

                <!-- Left: System Information -->
                <div class="finance-hero-content">

                    <div class="finance-hero-top">

                        <!-- System Icon -->
                        <div class="finance-system-icon">
                            <?php echo fin_icon($finIcons, $system['icon']); ?>
                        </div>

                        <div class="finance-system-meta">

                            <!-- System Abbreviation -->
                            <span class="finance-system-abbr">
                                <?php echo htmlspecialchars($system['abbr']); ?>
                            </span>

                            <!-- Main Heading -->
                            <h1>
                                <?php echo htmlspecialchars($system['title']); ?>
                            </h1>

                            <!-- Tagline -->
                            <p>
                                <?php echo htmlspecialchars($system['tagline']); ?>
                            </p>

                        </div>

                    </div>

                    <!-- Optional Trust / System Label -->
                    <div class="finance-hero-label">
                        <span class="finance-label-dot"></span>
                        Business Management Solution
                    </div>

                </div>

                <!-- Right: Highlight Statistic -->
                <div class="finance-hero-highlight">

                    <span class="finance-stat-label">
                        Key Performance
                    </span>

                    <div class="finance-stat-value">
                        <?php echo htmlspecialchars($system['cover_stat']['value']); ?>
                    </div>

                    <p class="finance-stat-description">
                        <?php echo htmlspecialchars($system['cover_stat']['label']); ?>
                    </p>

                </div>

            </div>
        </div>
    </section>

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
                        <span class="sc-label">All Systems</span>
                        <ul class="sidebar-nav">
                            <?php foreach ($systems as $s): ?>
                                <li>
                                    <a href="finance-analytics-detail.php?slug=<?php echo urlencode($s['slug']); ?>"
                                        style="<?php echo $s['slug'] === $system['slug'] ? 'background:#f7f4ee;color:#070d24;font-weight:600;' : ''; ?>">
                                        <?php echo htmlspecialchars($s['abbr']); ?> &mdash; <?php echo htmlspecialchars($s['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar-card sidebar-cta">
                        <h4>Ready to start?</h4>
                        <p>Tell us about your finance stack and we'll follow up with next steps within one business day.</p>
                        <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="benefit-section">
        <div class="container">

            <div class="section-head benefit-head">
                <div class="badge-pill mb-3">
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

                    <article class="benefit-card">

                        <span class="b-num">
                            <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                        </span>

                        <h4>
                            <?php echo htmlspecialchars($b['title']); ?>
                        </h4>

                        <p>
                            <?php echo htmlspecialchars($b['desc']); ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- PROCESS -->
    <section class="implementation-section">
        <div class="container">

            <!-- Section Heading -->
            <div class="section-head implementation-head">

                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    How We Roll It Out
                </div>

                <h2>Implementation process</h2>

                <p>
                    The same disciplined rollout applies whether this is a
                    standalone system or part of the full finance stack.
                </p>

            </div>

            <!-- Timeline -->
            <div class="timeline">

                <?php foreach ($system['process'] as $i => $step): ?>

                    <div class="timeline-item">

                        <!-- Step Number -->
                        <div class="timeline-num">
                            <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                        </div>

                        <!-- Step Content -->
                        <div class="timeline-body">

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
        <div class="container">
            <div class="testimonial-card">

                <!-- Decorative Quote -->
                <div class="testimonial-quote-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 11H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5v8Zm0 0v4a4 4 0 0 1-4 4" />
                        <path d="M21 11h-5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5v8Zm0 0v4a4 4 0 0 1-4 4" />
                    </svg>
                </div>

                <div class="testimonial-content">

                    <span class="testimonial-eyebrow">
                        Client Perspective
                    </span>

                    <blockquote class="testimonial-quote">
                        <?php echo htmlspecialchars($system['testimonial']['quote']); ?>
                    </blockquote>

                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <?php
                            echo strtoupper(
                                substr($system['testimonial']['author'], 0, 1)
                            );
                            ?>
                        </div>

                        <div class="author-info">
                            <strong>
                                <?php echo htmlspecialchars($system['testimonial']['author']); ?>
                            </strong>

                            <span>
                                <?php echo htmlspecialchars($system['testimonial']['role']); ?>
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Decorative Accent -->
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

    <!-- RELATED SYSTEMS -->
    <section class="related-systems">
        <div class="container">

            <div class="section-head related-head">

                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    Pairs Well With
                </div>

                <h2>Other systems in the finance stack</h2>

                <p>
                    Connect the systems your business needs to manage
                    finance, operations and growth from one place.
                </p>

            </div>

            <div class="related-grid">

                <?php foreach ($otherSystems as $rel): ?>

                    <a href="finance-analytics-detail.php?slug=<?php echo urlencode($rel['slug']); ?>"
                        class="related-card">

                        <div class="related-card-top">

                            <div class="r-icon">
                                <?php echo fin_icon($finIcons, $rel['icon']); ?>
                            </div>

                            <span class="related-arrow">
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

                        <div class="related-card-copy">

                            <span class="related-code">
                                <?php echo htmlspecialchars($rel['abbr']); ?>
                            </span>

                            <h4>
                                <?php echo htmlspecialchars($rel['title']); ?>
                            </h4>

                            <span class="related-link-text">
                                Explore system
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

                    </a>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="container cta-section" style="padding-top:100px;">
        <div class="erp-cta">

            <div class="erp-cta-content">

                <span class="erp-cta-eyebrow">
                    <span class="cta-dot"></span>
                    Ready When You Are
                </span>

                <h2>
                    Let's talk about your
                    <?php echo htmlspecialchars($system['abbr']); ?> setup
                </h2>

                <p>
                    Book a discovery call and we'll tell you honestly
                    whether we're the right fit — no obligation,
                    no generic pitch deck.
                </p>

            </div>

            <div class="erp-cta-actions">

                <a href="#" class="btn btn-gold cta-primary">
                    Book A Discovery Call
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m13 6 6 6-6 6" />
                    </svg>
                </a>

                <a href="finance-analytics.php"
                    class="btn btn-outline-light cta-secondary">
                    View All Systems
                </a>

            </div>

            <!-- Decorative background accent -->
            <div class="cta-glow"></div>

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
        <h1 style="font-size:1.8rem;font-weight:700;color:#070d24;margin-bottom:12px;">System not found</h1>
        <p style="color:#6c7280;margin-bottom:24px;">We couldn't find that system. It may have been renamed or removed.</p>
        <a href="finance-analytics.php" class="btn btn-gold">Browse Finance &amp; Analytics</a>
    </div>

<?php endif; ?>

<?php
include_once('elements/footer.php');
?>